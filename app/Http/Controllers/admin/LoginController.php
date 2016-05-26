<?php

namespace App\Http\Controllers\admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class LoginController extends Controller
{
    // show the form
    public function showLogin()
    {
        return view('admin.login');
    }

    //Login and Authentication
    public function postLogin(Request $request)
    {
        $data = Input::all();
        $rules = array(
            'username' => 'required',
            'password' => 'required',
        );
        $validator = Validator::make($data, $rules);

        if ($validator->fails())
        {
            return Redirect::to('login')
                ->withInput(Input::except('password'))
                ->withErrors($validator);
        }else {


            $userdata = array(
                'username' => Input::get('username'),
                'password' => Input::get('password')
            );

            $remember = (Input::has('remember')) ? true : false;

            if (Auth::validate($userdata)) {
                if (Auth::attempt($userdata,$remember)) {
                    return view('admin.home');
                }
            }
            else {

                Session::flash('error', 'فیلد کاربری یا رمز عبور اشتباه می باشد');
                return Redirect::to('/login');
            }
        }
    }

    //Display Reset Password Page
    public function resetPassword()
    {
        return view('admin.loginproblem.problem');
    }
    
    //Select Email or Phone for Reset Password
    public function selectpost(Request $request)
    {
        $select = (int)$request->input('selectpost');

        if($select === 0)
        {
            return view('admin.loginproblem.email');
        }
        elseif($select === 1)
        {
          return view('admin.loginproblem.phone');
        }

    }

    public function linkEmailshow()
    {
        return view('admin.loginproblem.email');
    }
   
    public function linkEmail()
   {
     $email = array('email' => Input::get('email'));
     $user = User::where('email',$email)->count();
     if ($user > 0) {

         $token = Str::random(60);
         $email =  implode(" ",$email);

         $user_reset = DB::table('password_resets')->where('email',$email)->count();

         if($user_reset > 0)
         {
             DB::table('password_resets')->where('email', $email)->update(['token' => $token]);
         }else
         {
             DB::table('password_resets')->insert(['email' => $email, 'token' => $token]);
         }
         $this->linkSend($email,$token);
        return  Redirect::to('reset/password/email')->with('message_email',"لینک ریست پسورد به ایمیل شما فرستاده شد!");

     }else{
     return Redirect::to('reset/password/email')->with('error_email','پست الکترونیکی موجود نیست!');

     }
   }

    public function linkSend($email,$token)
    {
//        dd(Config::get('mail'));
        return Mail::send('emails.email', compact('token', 'email'), function ($message) use ($email, $token) {
            $message->to($email)->subject('Password Reset');
            
        });
    }
    
    public function resetPass($token,$email)
    {
        $users = DB::table('password_resets')->where('email',$email)->get();
        foreach ($users as $user)
        {
            $db_token = $user->token;
            $db_email = $user->email;
            if($email == $db_email && $token == $db_token ){
                return view('admin.loginproblem.reset',compact('token','email'));
            }
        }
    }
    
    public function resetPassComplete(Request $request)
    {
//        $this->validate($request, [
//            'email' => 'required|unique:posts|max:255',
//            'password' => 'required|max:100|min:5|same:password_confirmation',
//            'password_confirmation' => 'required'
//        ]);

//        $validator = Validator::make($request->all(), [
//            'email' => 'required|unique:posts|max:255',
//            'password' => 'required|max:100|min:5|same:password_confirmation',
//            'password_confirmation' => 'required'
//        ]);
//        if ($validator->fails()) {
////            return back()
////                ->withErrors($validator)
////                ->withInput();
//            echo "fsfsfsf";
//        }

        $email = $request->input('email');
        $new_password = bcrypt($request->input('password'));
        User::where('email', $email)->update(['password' => $new_password]);
        DB::table('password_resets')->where('email', $email)->update(['token' => 0]);
        return Redirect::to('/login')->with('reset_message','رمز عبور تغییر یافت.لطفا وارد شوید!');
    }

    public function resetphone()
    {
        $phone = array('phone' => Input::post('phone'));
        

    }

}
