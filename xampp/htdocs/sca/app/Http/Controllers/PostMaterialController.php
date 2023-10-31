<?php
/*
@author:Zeeshan Zahid
@email: mzeshanzahid@gmail.com
*/
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Site\councilMember;
use App\Models\Site\PostMaterial;
use Yajra\Datatables\Datatables;
use App\Models\Site\QuestionFeedback;
use App\Models\Site\User;
use App\Models\Site\AppUser;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;
use App\Models\Site\Question;
use App\Models\Site\District;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Validator;
use Auth;
use DB;
use URL;

class PostMaterialController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index($type = false, $selectedId = false, $selectedSection = false)
    {
        if(!hasPrivilege('videos_documents','can_view')){
            return view('admin.unauthorized');
        }
        $title = 'Videos';
        if(!$selectedSection || $selectedSection == 'feedback'){
            $feedback_class = 'active';
            $question_class = '';
        }else{
            $feedback_class = '';
            $question_class = 'active';
        }

        if(!$type || $type == 'video'){
            $materialtype = 'video';

            $where = array('pm_type'=>'video');

            if(hasPrivilege('inactive_videos_documents','can_view')){
                $postmaterials = PostMaterial::Videos()->get();
            }else{
                $where['pm_status'] = 1;
                $postmaterials = PostMaterial::ActiveVideos()->get();
            }

            if($selectedId){
                $selectedmaterial = PostMaterial::where($where)->findorfail($selectedId);
            }else{
                $selectedmaterial = PostMaterial::where($where)->orderBy('pm_id', 'DESC')->first();
            }



        }else if($type && $type == 'attachment'){
            $title = 'Images';
            $materialtype = 'attachment';

            $where = array('pm_type'=>'attachment');

            if(hasPrivilege('inactive_videos_documents','can_view')){
                $postmaterials = PostMaterial::Attachments()->get();
            }else{
                $where['pm_status'] = 1;
                $postmaterials = PostMaterial::ActiveAttachments()->get();
            }

            if($selectedId){
                $selectedmaterial = PostMaterial::where($where)->findorfail($selectedId);
            }else{
                $selectedmaterial = PostMaterial::where($where)->orderBy('pm_id', 'DESC')->first();
            }

        }

        $questions = $feedbacks = false;
        if($selectedmaterial){
            $user = Auth::id();
            $current_user=User::find($user);
            $questions = Question::UnAnsweredQuestions($selectedmaterial->pm_id, $user)->Paginate('3');


            $feedbacks = DB::table('questions')
                ->join('questions_feedbacks', 'questions.q_id', '=', 'questions_feedbacks.q_idFk')
                ->join('app_users', 'app_users.au_id', '=', 'questions_feedbacks.au_idFk')
                ->join('school', 'school.school_id', '=', 'app_users.au_school_idFk')
                ->where('questions.pm_idFk', $selectedmaterial->pm_id)
                ->where('questions.q_status', 1);
            $user_role_id=$current_user->getUserRole->role->id;
            if($user_role_id == 4){
                $feedbacks =  $feedbacks->where('app_users.au_id', $user);
            }

            $feedbacks =  $feedbacks->select('questions.*', 'questions_feedbacks.qf_option', 'questions_feedbacks.activity_datetime', 'app_users.au_name', 'app_users.au_picture', 'school.school_name')
                ->Paginate('3');
        }

        return view('postmaterial.index', compact('postmaterials', 'selectedmaterial', 'materialtype', 'questions', 'feedbacks', 'title', 'question_class', 'feedback_class'));
    }

    public function paginateContent(Request $request, $type = false, $selectedId = false)
    {


        $pm_id = $request->pm_id;
        $user = Auth::id();

        if($request->type=='feedback'){
            if(!hasPrivilege('feedbacks','can_view')){
                return view('admin.unauthorized');
            }
            $current_user=User::find($user);
            $feedbacks = DB::table('questions')
                ->join('questions_feedbacks', 'questions.q_id', '=', 'questions_feedbacks.q_idFk')
                ->join('app_users', 'app_users.au_id', '=', 'questions_feedbacks.au_idFk')
                ->join('school', 'school.school_id', '=', 'app_users.au_school_idFk')
                ->where('questions.pm_idFk', $pm_id)
                ->where('questions.q_status', 1);
                $user_role_id=$current_user->getUserRole->role->id;
                if($user_role_id == 4){
                    $feedbacks =  $feedbacks->where('app_users.au_id', $user);
                }
            $feedbacks =  $feedbacks->select('questions.*', 'questions_feedbacks.qf_option', 'questions_feedbacks.activity_datetime', 'app_users.au_name', 'app_users.au_picture', 'school.school_name')
                ->Paginate('3');
            return Response::json(View::make('postmaterial.questionfeedbacks', ['feedbacks' => $feedbacks])->render());
        }else{
            if(!hasPrivilege('feedbacks','can_add')){
                return view('admin.unauthorized');
            }

            $questions = Question::UnAnsweredQuestions($pm_id, $user)->Paginate('3');
            return Response::json(View::make('postmaterial.questions', ['questions' => $questions])->render());
        }

    }

    public function create($type = 'video')
    {
        if(!hasPrivilege('videos_documents','can_add')){
            return view('admin.unauthorized');
        }

        $postmaterial = new PostMaterial();
        return view('postmaterial.create'.$type, compact('postmaterial'));
    }

    public function storeVideo(Request $request)
    {
        if(!hasPrivilege('videos_documents','can_add')){
            return view('admin.unauthorized');
        }

        $validator = Validator::make($request->all(),
            [
                'pm_title'=>'required|min:4|max:100',
                'pm_description'=>'required|min:10|max:255',
                // 'pm_path'=>'required|url',
                'pm_date'=>'required',
                'pm_path' => 'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:35840|required',
                'thumbnail' => 'image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:max_width=250,max_height=150|required',
            ],
            [
                'pm_title.required'       => 'The Title field is required',
                'pm_title.min'        => 'The Title field minimum length must be 4',
                'pm_title.max'        => 'The Title field maximum length must be 100',
                'pm_description.required'       => 'The Description field is required',
                'pm_description.min'        => 'The Description minimum field length must be 10',
                'pm_description.max'        => 'The Description maximum field length must be 255',
                // 'pm_path.required'       => 'The Video URL field is required',
                // 'pm_path.url'       => 'The Video URL field format is invalid',
                'pm_path.required'       => 'Please select Video',
                'pm_path.max'       => 'Maximum size to upload is 35MB',
                'pm_path.mimes'       => 'The Video must be a file of type: mpeg, ogg, mp4, webm, 3gp, mov, flv, avi, wmv, ts.',
                'pm_date.required'       => 'The Date field is required',


            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $path =  $this->uploadFile($request->file('pm_path'), 'post_materials/videos');

        $picture = "";
        $picture =  $this->uploadFile($request->file('thumbnail'), 'post_materials/thumbnails');

        //uncomment if its optional
        // if($request->file('thumbnail')){
        //     $validator = Validator::make($request->all(), [
        //                             'thumbnail' => 'image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:max_width=250,max_height=150',
        //                         ]);
        //     if ($validator->fails()) {
        //         return back()->withErrors($validator)->withInput();
        //     }
        //     $picture =  $this->uploadFile($request->file('thumbnail'), 'post_materials/thumbnails');
        // }

        PostMaterial::create([
            'pm_title'=>$request->pm_title,
            'pm_description'=>$request->pm_description,
            'pm_path'=>$path,
            'pm_date'=>date('Y-m-d', strtotime($request->pm_date)),
            'pm_type'=>'video',
            'pm_thumbnail'            => $picture,
            'created_by'            => Auth::id(),
        ]);
        $last_id = DB::getPDO()->lastInsertId();

        //save and send message on user phone number
        $url = URL::to('');
        $video_url = $url.'/home/video/'.$last_id;
        $title = 'Video Added';
        $desc = 'A new Video with title '.$request->pm_title.' has been created. click here '.$video_url;

        //send_notifications_to_all_users($title, $desc, $video_url);


        return redirect('home/video')->with('status', 'Video added successfully!');
    }

    public function storeAttachment(Request $request)
    {
        if(!hasPrivilege('videos_documents','can_add')){
            return view('admin.unauthorized');
        }
       /* dd($request->file('thumbnail'));
        exit;*/

        $validator = Validator::make($request->all(),
            [
                'pm_title'=>'required|min:4|max:100',
                'pm_description'=>'required|min:10|max:255',
                'pm_date'=>'required',
            ],
            [
                'pm_title.required'       => 'The Title field is required',
                'pm_title.min'        => 'The Title field minimum length must be 4',
                'pm_title.max'        => 'The Title field maximum length must be 100',
                'pm_description.required'       => 'The Description field is required',
                'pm_description.min'        => 'The Description field minimum length must be 10',
                'pm_description.max'        => 'The Description field maximum length must be 255',
                'pm_date.required'       => 'The Date field is required',


            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $validator = Validator::make($request->all(), [
                                    'image' => 'image|mimes:jpeg,png,jpg,gif|required|max:2048',
                                ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $picture = "";
        if($request->file('thumbnail')){
            $validator = Validator::make($request->all(), [
                                    'thumbnail' => 'image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:max_width=250,max_height=150',
                                ]);
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            $picture =  $this->uploadFile($request->file('thumbnail'), 'post_materials/thumbnails');
        }


        $path =  $this->uploadFile($request->file('image'), 'post_materials/attachments');

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        PostMaterial::create([
            'pm_title'=>$request->pm_title,
            'pm_description'=>$request->pm_description,
            'pm_path'=>$path,
            'pm_date'=>date('Y-m-d', strtotime($request->pm_date)),
            'pm_type'=>'attachment',
            'pm_thumbnail'            => $picture,
            'created_by'            => Auth::id(),
        ]);
         $last_id = DB::getPDO()->lastInsertId();

       /* //save and send message on user phone number
        $url = URL::to('');
        $attachment_url = $url.'/home/attachment/'.$last_id;
        $title = 'Attachment Added';
        $desc = 'A new Attachment with title '.$request->pm_title.' has been created. click here '.$attachment_url;

        send_notifications_to_all_users($title, $desc, $attachment_url);*/


        return redirect('home/attachment')->with('status', 'Image added successfully!');
    }

    public function edit(PostMaterial $postmaterial)
    {
        if(!hasPrivilege('videos_documents','can_edit')){
            return view('admin.unauthorized');
        }


        return view('postmaterial.edit', compact('postmaterial'));
    }

    public function update(Request $request, PostMaterial $postmaterial)
    {
        if(!hasPrivilege('videos_documents','can_edit')){
            return view('admin.unauthorized');
        }

         $validator = Validator::make($request->all(),
            [
                'pm_title'=>'required|min:4|max:100',
                'pm_description'=>'required|min:10|max:255',
                'pm_date'=>'required',
            ],
            [
                'pm_title.required'       => 'The Title field is required',
                'pm_title.min'        => 'The Title field minimum length must be 4',
                'pm_title.max'        => 'The Title field maximum length must be 100',
                'pm_description.required'       => 'The Description field is required',
                'pm_description.min'        => 'The Description field minimum length must be 10',
                'pm_description.max'        => 'The Description field maximum length must be 255',
                'pm_date.required'       => 'The Date field is required',


            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if($postmaterial->pm_type == 'video'){
            $validator = Validator::make($request->all(),
            [
                 'pm_path' => 'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:35840',
            ],[
                'pm_path.max'       => 'Maximum size to upload is 35MB',
                'pm_path.mimes'       => 'The Video must be a file of type: mpeg, ogg, mp4, webm, 3gp, mov, flv, avi, wmv, ts.',
            ]);
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            if($request->file('pm_path')){
                $path =  $this->uploadFile($request->file('pm_path'), 'post_materials/videos');
                $postmaterial->pm_path = $path;
            }
        }

        if($request->file('image')){
            $validator = Validator::make($request->all(), [
                                    'image' => 'image|mimes:jpeg,png,jpg,gif|required|max:2048',
                                ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $path =  $this->uploadFile($request->file('image'), 'post_materials/attachments');
            $postmaterial->pm_path = $path;
        }

        $picture = "";
        if($request->file('thumbnail')){
            $validator = Validator::make($request->all(), [
                                    'thumbnail' => 'image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:max_width=250,max_height=150',
                                ]);
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            $picture =  $this->uploadFile($request->file('thumbnail'), 'post_materials/thumbnails');
            $postmaterial->pm_thumbnail = $picture;
        }

        $postmaterial->pm_title = $request->pm_title;
        $postmaterial->pm_description = $request->pm_description;
        $postmaterial->pm_date = date('Y-m-d', strtotime($request->pm_date));
        $postmaterial->updated_by = Auth::id();
        $postmaterial->update();
        return redirect('home/'.$postmaterial->pm_type)->with('status', 'updated successfully!');
    }

    public function updateStatus(Request $request){
        if(!hasPrivilege('videos_documents','can_delete')){
            return view('admin.unauthorized');
        }

        $postmaterial = PostMaterial::findorfail($request->pm_id);
        if($postmaterial->pm_status == 1){
            $newstatus = 0;
        }else{
            $newstatus = 1;
        }
        $postmaterial->pm_status = $newstatus;
        $postmaterial->updated_by = Auth::id();
        $postmaterial->update();
        echo $newstatus;
    }

    public function postViewers(PostMaterial $pm)
    {
        if(!hasPrivilege('videos_documents_viewers','can_view')){
            return view('admin.unauthorized');
        }
        $title = 'Post Viewers';
        $routeParam = $pm->pm_id;
        $heading = 'Post Viewers ('.$pm->pm_title.')';
        $type = 'viewers';

        return view('postmaterial.postnonviewers', compact('routeParam', 'title', 'heading', 'type'));
    }

    public function postNonViewers(PostMaterial $pm)
    {
        if(!hasPrivilege('videos_documents_viewers','can_view')){
            return view('admin.unauthorized');
        }
        $title = 'Post Non-Viewers';
        $routeParam = $pm->pm_id;
        $heading = 'Post Non-Viewers ('.$pm->pm_title.')';
        $type = 'nonviewers';

        return view('postmaterial.postnonviewers', compact('routeParam', 'title', 'heading', 'type'));
    }

    public function postNonViewersListing($pm_id, $type){


        DB::statement(DB::raw('set @rownum=0'));
        $query = AppUser::NotDeleted();
        if($type=='viewers'){
            $query = $query->whereHas('postViewers', function ($query) use($pm_id) {
                $query->where('pm_idFk', $pm_id);
            });
        }else{
            $query = $query->whereDoesntHave('postViewers', function ($query) use($pm_id) {
                $query->where('pm_idFk', $pm_id);
            });
        }

        $query = $query->orderBy('au_id', 'DESC')->get(['*', DB::raw('@rownum  := @rownum  + 1 AS rownum')]);




        $data =  Datatables::of($query)
                ->addColumn('picture_path',function($query){
                    return '<img src="'.$query->picture_path.'" alt="" class="img-responsive img-circle" width="30px">';
                })
                ->addColumn('au_school_idFk',function($query){
                    return optional($query->school)->school_name;
                })
                ->addColumn('au_tehsil_idFk',function($query){
                    return optional($query->tehsil)->tehsil_name;
                })
                ->addColumn('au_district_idFk',function($query){
                    return optional($query->district)->district_name;
                })
                ->addColumn('au_last_login_at',function($query){
                    return ($query->au_last_login_at != '' ? date('d-m-Y H:i:s', strtotime($query->au_last_login_at)) : '');
                })
                ->addColumn('au_app_spent_time',function($query){
                    return $query->au_app_spent_time;
                });

                if(hasPrivilege('council_members','can_view')){
                    $data->addColumn('total_members',function($query){
                        return '<a href="'.url("councilmembers/$query->au_id").'" class="btn badge btn-member">'.$query->councilMembers->count().' Members</a>';
                    });
                }

                    $data->addColumn('edit',function($query){
                        $edit = '';
                        if(hasPrivilege('app_users','can_edit')){
                            $edit = '<a href="'.url("appusers/$query->au_id/edit").'"><i class="fa fa-edit"></i></a> | ';
                        }
                        return $edit. '<a href="'.url("appusers/$query->au_id").'"><i class="fa fa-eye"></i></a>';
                    });

                $data->rawColumns(['picture_path', 'total_members', 'edit']);

                // ->make(true);
                return $data->make(true);
    }

    private function uploadFile($requested_file, $path_destination){

            if(!$requested_file)
                return false;


            $custom_file_name   = date("YmdHis")."_".rand(11111, 99999).rand(100,999).".".$requested_file->getClientOriginalExtension();
            // $path_destination   = 'post_materials/thumbnails';

            $savedFile = Storage::putFileAs(
                            $path_destination, $requested_file, $custom_file_name
                );
            if($savedFile){
                return $custom_file_name;
            }
            return false;
    }

    private function validateFile($pic_name,$request){

        if($pic_name == 'thumbnail'){
            $validator = Validator::make($request->all(), [
                                    $pic_name => 'image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:max_width=250,max_height=150',
                                ]);
        }else{

            $validator = Validator::make($request->all(), [
                                    'image' => 'image|mimes:jpeg,png,jpg,gif|required|max:2048',
                                ]);
        }

       return back()->withErrors($validator)->withInput();

    }



}
