<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Register Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users as well as their
      | validation and creation. By default this controller uses a trait to
      | provide this functionality without requiring any additional code.
      |
     */

use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest');
    }

    protected function validator(array $data) {

        return Validator::make($data, [
                    'cnic' => 'required|unique:users,cnic',
                    'email' => 'required|email|max:255|unique:users',
                    'applicant_name' => 'required|string|min:3|max:255',
                    'cell_number' => 'required|unique:users,cell_number|max:13',
                    'password' => 'required|string|min:10|max:255|required_with:c_password|same:c_password',
                    'c_password' => 'required|string|min:10|max:255'
        ]);
    }

    public function registerForm() {
        //return redirect('/')->with('msg_success', 'Schools not allowed to register yet.');
        return view('auth.register');
    }

    protected function create(array $data) {
        $cnic_no = str_replace("-", "", $data['cnic']);
        $cell_number = str_replace("-", "", $data['cell_number']);
        $user = new User();
        $user->applicant_name = $data['applicant_name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->cell_number = $cell_number;
        $user->cnic = $cnic_no;
        $user->active = 1;
        $user->remember_token = '';
        return $user->save();
        //return redirect('/')->with('msg_success', 'User created successfully.');
    }

    public function store(Request $request) {
        //dd($request);
        $this->validate($request, [
            'cnic' => 'required|unique:users,cnic',
            'email' => 'required|email|max:255',
            'applicant_name' => 'required|string|min:3|max:255',
            'cell_number' => 'required|max:13',
            'password' => 'required|string|min:10|max:255|required_with:c_password|same:c_password',
            'c_password' => 'required|string|min:10|max:255'
        ]);

        $cnic_no = str_replace("-", "", $request->input('cnic'));
        $cell_number = str_replace("-", "", $request->input('cell_number'));

        $user = new User();
        $user->applicant_name = $request->input('applicant_name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->cell_number = $cell_number;
        $user->cnic = $cnic_no;
        $user->active = 1;
        $user->remember_token = '';
        $user->save();
        return redirect('/')->with('msg_success', 'User created successfully.');
    }

    public function refreshCaptcha() {
        //return captcha_img('flat');
        return captcha_img('mini2');
    }

    public function refreshCaptchaLogin() {
        //return captcha_img('flat');
        return captcha_img('mini2');
    }

    public function refreshCaptchaRegister() {
        //return captcha_img('flat');
        return captcha_img('mini2');
    }

}
