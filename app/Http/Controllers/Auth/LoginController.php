<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Log;
use Hash;
use App\SMSMSL;
use App\Newsletters;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    //use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    
     protected $redirectTo = RouteServiceProvider::HOME;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        if(!session()->has('url.intended'))
        {
            session(['url.intended' => url()->previous()]);
        }
        return view('auth.login');    
    }

    public function authenticated(Request $request, $user)
    {
        if($user->active==0){
            \Auth::logout();
            return redirect('/login')->with('error',"The user has been blocked, please contact " . config('app.name'));
        }

    }

    public function login(Request $request)
    {
        $request->validate([
            'telephone' => 'required',
            'password' => 'required'
        ]);
        $full_telephone = '+94' . substr($request->telephone,1);
        $user = User::where('telephone',$full_telephone)->first();
        if($user==null){
            return redirect()->back()->with('error', "ඔබ ඇතුළත් කළ දුරකථන අංකය හෝ මුරපදය වැරදිය");
        }
        // Check if user is blocked
        if($user->active==0){
            return redirect()->back()->with('error', "ඔබගේ ගිණුම අවහිර කර ඇත, කරුණාකර පරිපාලක අමතන්න.");
        }

        $credentials = ["telephone" => $full_telephone, "password" => $request->password];
        if(Auth::attempt($credentials)){
            return redirect()->intended('/');
        }
        else{
            return redirect()->back()->with('error','ඔබ ඇතුළත් කළ දුරකථන අංකය හෝ මුරපදය වැරදිය');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function forgotPassword()
    {
        return view('auth.forgot_password');
    }

    public function otp(Request $request)
    {
        $request->validate([
            'telephone' => 'required',
        ]);
        $full_telephone = '+94' . substr($request->telephone,1);
        $user = User::where('telephone',$full_telephone)->firstOrFail();
        // Create an Otp and SMS it
        $token = rand(100000,999999);
        $user->otp = $token;
        $user->save();
        
        //$sms = new Newsletters($full_telephone,'OTP for password reset '.$token);
        $sms = new SMSMSL($full_telephone,'OTP for password reset '.$token);
        $sms->send();
        return view('auth.otp',['username' => $user->username]);
    }

    public function username()
    {
        return "username";
    }

    public function reset(Request $request)
    {
        $request->validate([
            'otp' => 'required',
            'password' => 'required',
            'username' => 'required'
        ]);
        $user = User::where('username', $request->username)->where('otp', $request->otp)->first();
        if($user==null){
            return redirect('forgotpassword')->with('error','ඔබ ඇතුළත් කළ OTP අංකය වැරදිය');
        }
        $user->password = \Hash::make($request->password);
        $user->save();
        Auth::login($user);
        return redirect('/');    
    }

}
