<?php

namespace ProactiveAnts\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use ProactiveAnts\Admin\AdminUser;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller 
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    protected function guard(){
        return Auth::guard('admin');
    }

    use AuthenticatesUsers;

    protected $redirectTo = '/adm/dashboard';

    public function login()
    {
        return view('admin::auth.login');
    }

    public function postLogin(Request $request)
    {
        $this->validator($request);

        if(Auth::guard('admin')->attempt($request->only('email','password'),$request->filled('remember'))){
            return redirect()
                ->intended(route('admin.dashboard'))
                ->with('status', 'You are Logged');
        }

        return $this->loginFailed();
        
    }

    private function validator(Request $request)
    {
        $rules = [
            'email' => 'required|email|exists:adm_admin_users,email',
            'password' => 'required'
        ];

        $messages = [
            'email.exists' => 'These credentials do not match our records'
        ];

        $request->validate($rules, $messages);

    }

    private function loginFailed()
    {
        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Login failed, please try again');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('adm/login');
    }
}