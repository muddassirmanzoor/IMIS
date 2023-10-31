<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use APP\Models\User;
use App\Models\Car_Scratch;
use App\Models\Car_discount;
use Carbon\Carbon;
use Image;
use App\Models\Car;
use App\Models\Brand;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class DealerController extends Controller
{
    public function index(){
        return view('dealer.index');
    }
    public function signin(Request $request){
        if(auth()->attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            if(auth()->user()->type == 2){
                $user = User::where('id',auth()->user()->id)->with('user_info')->first();
                $profile_pic = $user->user_info->thumbnail;
                Session(['profile_pic' => $profile_pic]);
                return redirect()->route('dealer.dashboard');
            }
            Auth::logout();
        }
        Session::flash('message','Email OR Password is incorrect');
        return redirect()->back();
    }
    public function logout(){
          Auth::logout();
        return redirect()->route('dealer.login');
    }
    public function dashboard(){
        return view('dealer.dashboard');
    }

    public function notification(){
        $active = 'notification';
        return view('dealer.notification');
    }
    public function carMain(Request $request){
        $cars = Car::where('user_id',auth()->user()->id)->paginate('4');
         if(!empty($request->search) && !empty($request->category) && !empty($request->brand) && !empty($request->entry)){
            $brand = $request->brand;
            $cars = Car::where('user_id',auth()->user()->id)->where('car_name',$request->search)->where('category',$request->category)->where('company',$request->company)->where('created_at',$request->entry)->wherehas('brand',function($query) use ($brand){
                $query->where('brand',$brand);
            })->paginate('4');
            $cars = Car::where('user_id',auth()->user()->id)->where('car_name',$request->search)->where('car_name',$request->search)->paginate('4');
            // Car::where('user_id',auth()->user()->id)->whereHas('brand', function ($query) use ($search) {
            //     $query->where('brand', $search);
            // })->with(['brand' => function ($query) use ($search) {
            //     $query->where('brand', $search);
            // }])->paginate('8');
            return view('dealer.carmain',compact('cars'));
         }else
         if(!empty($request->search) && !empty($request->category) && !empty($request->brand)){
            $brand = $request->brand;
            $cars = Car::where('user_id',auth()->user()->id)->where('car_name',$request->search)->where('category',$request->category)->where('company',$request->company)->wherehas('brand',function($query) use ($brand){
                $query->where('brand',$brand);
            })->paginate('4');
            return view('dealer.carmain',compact('cars'));
         }else
         if(!empty($request->search) && !empty($request->category) && !empty($request->entry)){
            $cars = Car::where('user_id',auth()->user()->id)->where('car_name',$request->search)->where('category',$request->category)->where('company',$request->company)->where('created_at',$request->entry)->paginate('4');
            return view('dealer.carmain',compact('cars'));
        }else       if(!empty($request->search) && !empty($request->brand) && !empty($request->entry)){
            $brand = $request->brand;
            $cars = Car::where('user_id',auth()->user()->id)->where('car_name',$request->search)->where('company',$request->company)->wherehas('brand',function($query) use ($brand){
                $query->where('brand',$brand);
            })->paginate('4');
            return view('dealer.carmain',compact('cars'));
         }
         else       if(!empty($request->search) && !empty($request->brand) ){
            $brand = $request->brand;
            $cars = Car::where('user_id',auth()->user()->id)->where('car_name',$request->search)->wherehas('brand',function($query) use ($brand){
                $query->where('brand',$brand);
            })->paginate('4');
            return view('dealer.carmain',compact('cars'));
         }
         else       if(!empty($request->search) && !empty($request->category) ){
            $cars = Car::where('user_id',auth()->user()->id)->where('car_name',$request->search)->where('category',$request->category)->paginate('4');
            return view('dealer.carmain',compact('cars'));
        }
         else       if(!empty($request->search) && !empty($request->company) ){
            $cars = Car::where('user_id',auth()->user()->id)->where('car_name',$request->search)->where('category',$request->category)->paginate('4');
            return view('dealer.carmain',compact('cars'));
        }
        else       if(!empty($request->search) ){
            $cars = Car::where('user_id',auth()->user()->id)->where('car_name',$request->search)->paginate('4');
            return view('dealer.carmain',compact('cars'));
        }
         return view('dealer.carmain',compact('cars'));
    }
    public function earning(){
        return view('dealer.earning');
    }
    public function carDispute(){
        return view('dealer.carDispute');
    }
    public function rentingDeal(){
        return view('dealer.rentingdeals');
    }
    public function setting(){
        return view('dealer.setting');
    }
    public function editCar(){
        return view('dealer.editcar');
    }
    public function carDetail($id){
        $car = Car::find($id)->with('brand')->first();
        $car_discount = Car_discount::where('car_id',$id)->first();
        $car_scratch = Car_Scratch::where('car_id',$id)->first();
        return view('dealer.cardetail',compact('car','car_discount','car_scratch'));
    }
    public function addCar(){
        $brands = Brand::all();
        return view('dealer.addcar',compact('brands'));
    }
    public function approvedCar(){
        return view('dealer.approvedcar');
    }
    public function disapprovedCar(){
        return view('dealer.disapprovedcar');
    }
    public function newcarRequest(){
        return view('dealer.newcarrequest');
    }
    public function dealdetail(){
        return view('dealer.dealdetail');
    }

    public function carRegister(Request $request){
        $car_discount = new Car_discount();
        $car_scratch = new Car_Scratch();
        $car = new Car;
        $car->car_name = $request->name;
        $car->car_year = $request->year;
        $car->car_gear_box = $request->gear_box;
        $car->car_engine = $request->engine;
        $car->car_mileage_limit = $request->mileage_limit;
        $car->car_drive = $request->car_drive;
        $car->car_transmission = $request->transmission;
        $car->car_top_speed = $request->top_speed;



        $car->car_pessenger = $request->pessenger;
        $car->car_price_daily = $request->price_daily;
        $car->car_price_monthly = $request->price_monthly;
        $car->car_price_weekly = $request->price_weekly;
        $car->car_insurrance = $request->insurrance;
        $car->city_of_availability = $request->city;
        $car->car_code = '2';
        $car->child_seat_cost = $request->child_seat_cost;
        $car->toll_cost = $request->toll_cost;

        //insert image process start here
          $car_image = [
            0 => ($request->file('first_car_image') != '') ? $request->file('first_car_image') : '',
            1 => ($request->file('second_car_image') != '') ? $request->file('second_car_image') : '',
            2 => ($request->file('third_car_image') != '') ? $request->file('third_car_image') : '',
            3 => ($request->file('fourth_car_image') != '') ? $request->file('fourth_car_image') : '',
            4 => ($request->file('fifth_car_image') != '') ? $request->file('fifth_car_image') : '',
            5 => ($request->file('sixth_car_image') != '') ? $request->file('sixth_car_image') : '',
            6 => ($request->file('seventh_car_image') != '') ? $request->file('seventh_car_image') : '',
            7 => ($request->file('eighth_car_image') != '') ? $request->file('eighth_car_image') : '',
          ];
          $car_scratch_image= [
           0 => ($request->file('first_car_scratch_image') != '') ? $request->file('first_car_scratch_image') : '',
           1 => ($request->file('second_car_scratch_image') != '') ? $request->file('second_car_scratch_image') : '',
           2 => ($request->file('third_car_scratch_image') != '') ? $request->file('third_car_scratch_image') : '',
           3 => ($request->file('fourth_car_scratch_image') != '') ? $request->file('fourth_car_scratch_image') : '',
           4 => ($request->file('fifth_car_scratch_image') != '') ? $request->file('fifth_car_scratch_image') : '',
           5 => ($request->file('sixth_car_scratch_image') != '') ? $request->file('sixth_car_scratch_image') : '',
           6 => ($request->file('seventh_car_scratch_image') != '') ? $request->file('seventh_car_scratch_image') : '',
           7 => ($request->file('eighth_car_scratch_image') != '') ? $request->file('eighth_car_scratch_image') : '',
          ];


          $car_image_array[]='';
          $car_scratch_image_array[]='';
          for($i = 0; $i< 8 ;$i++){
            if($car_image[$i] != ''){
            $car_image_array[] = insertImg($car_image[$i],'car/image/','car/thumb/');
            }
          }


          for($i = 0; $i< 8 ;$i++){
            if($car_scratch_image[$i] != ''){
            $car_scratch_image_array[] = insertImg($car_scratch_image[$i],'car_scratch/image/','car_scratch/thumb/');
            }
          }


        //insert image process end here

        $car->car_image_1 = isset($car_image_array[1]['image']) ? $car_image_array[1]['image'] : '';
        $car->car_image_2 = isset($car_image_array[2]['image']) ? $car_image_array[2]['image'] : '';
        $car->car_image_3 = isset($car_image_array[3]['image']) ? $car_image_array[3]['image'] : '';
        $car->car_image_4 = isset($car_image_array[4]['image']) ? $car_image_array[4]['image'] : '';
        $car->car_image_5 = isset($car_image_array[5]['image']) ? $car_image_array[5]['image'] : '';
        $car->car_image_6 = isset($car_image_array[6]['image']) ? $car_image_array[6]['image'] : '';
        $car->car_image_7 = isset($car_image_array[7]['image']) ? $car_image_array[7]['image'] : '';
        $car->car_image_8 = isset($car_image_array[8]['image']) ? $car_image_array[8]['image'] : '';
        $car->car_thumbnail_1 = isset($car_image_array[1]['thumb']) ? $car_image_array[1]['thumb'] : '';
        $car->car_thumbnail_2 =  isset($car_image_array[2]['thumb']) ? $car_image_array[2]['thumb'] : '';
        $car->car_thumbnail_3 =  isset($car_image_array[3]['thumb']) ? $car_image_array[3]['thumb'] : '';
        $car->car_thumbnail_4 =  isset($car_image_array[4]['thumb']) ? $car_image_array[4]['thumb'] : '';
        $car->car_thumbnail_5 =  isset($car_image_array[5]['thumb']) ? $car_image_array[5]['thumb'] : '';
        $car->car_thumbnail_6 =  isset($car_image_array[6]['thumb']) ? $car_image_array[6]['thumb'] : '';
        $car->car_thumbnail_7 =  isset($car_image_array[7]['thumb']) ? $car_image_array[7]['thumb'] : '';
        $car->car_thumbnail_8 =  isset($car_image_array[8]['thumb']) ? $car_image_array[8]['thumb'] : '';

        $car->user_id = auth()->user()->id;
        $car->brand_id = $request->company;
        $car->type = $request->type;
        $car->category = $request->category;
        $car->is_active = true;
        $car->fuel_type = $request->fuel_type;
        $car->economy = $request->economy_type;
        $car->personal_driver_cost = $request->personal_driver_cost;
        $car->mileage_amount_per_km = $request->mileage_per_km;
        $car->save();

        $car_discount->date_valid = Carbon::now();

        $car_discount->discount_1_day =  $request->amount_1_day;
        $car_discount->discount_2_day = $request->amount_2_day;
        $car_discount->discount_3_day = $request->amount_3_day;
        $car_discount->discount_4_day = $request->amount_4_day;
        $car_discount->discount_5_day = $request->amount_5_day;
        $car_discount->discount_6_10_day = $request->amount_6_10_day;
        $car_discount->discount_11_15_day = $request->amount_11_15_day;
        $car_discount->discount_16_20_day = $request->amount_16_20_day;
        $car_discount->discount_21_25_day = $request->amount_21_25_day;
        $car_discount->discount_26_30_day = $request->amount_26_30_day;
        $car_discount->car_id = $car->id;
        $car_discount->save();

        $car_scratch->car_image1 = isset($car_scratch_image_array[1]['image']) ? $car_scratch_image_array[1]['image'] : '';
        $car_scratch->car_image2 = isset($car_scratch_image_array[2]['image']) ? $car_scratch_image_array[2]['image'] : '';
        $car_scratch->car_image3 = isset($car_scratch_image_array[3]['image']) ? $car_scratch_image_array[3]['image'] : '';
        $car_scratch->car_image4 = isset($car_scratch_image_array[4]['image']) ? $car_scratch_image_array[4]['image'] : '';
        $car_scratch->car_image5 = isset($car_scratch_image_array[5]['image']) ? $car_scratch_image_array[5]['image'] : '';
        $car_scratch->car_image6 = isset($car_scratch_image_array[6]['image']) ? $car_scratch_image_array[6]['image'] : '';
        $car_scratch->car_image7 = isset($car_scratch_image_array[7]['image']) ? $car_scratch_image_array[7]['image'] : '';
        $car_scratch->car_image8 = isset($car_scratch_image_array[8]['image']) ? $car_scratch_image_array[8]['image'] : '';
        $car_scratch->car_image1_thumbnail = isset($car_scratch_image_array[1]['thumb']) ? $car_scratch_image_array[1]['thumb'] : '';
        $car_scratch->car_image2_thumbnail = isset($car_scratch_image_array[2]['thumb']) ? $car_scratch_image_array[2]['thumb'] : '';
        $car_scratch->car_image3_thumbnail = isset($car_scratch_image_array[3]['thumb']) ? $car_scratch_image_array[3]['thumb'] : '';
        $car_scratch->car_image4_thumbnail = isset($car_scratch_image_array[4]['thumb']) ? $car_scratch_image_array[4]['thumb'] : '';
        $car_scratch->car_image5_thumbnail = isset($car_scratch_image_array[5]['thumb']) ? $car_scratch_image_array[5]['thumb'] : '';
        $car_scratch->car_image6_thumbnail = isset($car_scratch_image_array[6]['thumb']) ? $car_scratch_image_array[6]['thumb'] : '';
        $car_scratch->car_image7_thumbnail = isset($car_scratch_image_array[7]['thumb']) ? $car_scratch_image_array[7]['thumb'] : '';
        $car_scratch->car_image8_thumbnail = isset($car_scratch_image_array[8]['thumb']) ? $car_scratch_image_array[8]['thumb'] : '';
        $car_scratch->no_of_minor_dent = $request->no_of_minor_dent;
        $car_scratch->location_of_minor_dent = $request->loc_of_minor_dent;
        $car_scratch->no_of_major_dent = $request->no_of_major_dent;
        $car_scratch->location_of_major_dent = $request->loc_of_major_dent;
        $car_scratch->car_id = $car->id;
        $car_scratch->save();

        if(isset($car) && isset($car_discount) && isset($car_scratch)){
            Session::flash('message','Car Created Successfuly');
            return redirect()->back();
        }else{
            Session::flash('message','Something Went Wrong Plaese Try again');
            return redirect()->back();
        }
    }
    public function notAvailable(){
        return view('dealer.car_not_available');
     }
}
