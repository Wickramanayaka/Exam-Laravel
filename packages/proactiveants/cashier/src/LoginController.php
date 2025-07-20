<?php

namespace ProactiveAnts\Cashier;

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
        $this->middleware('guest:cashier')->except('logout');
    }

    protected function guard(){
        return Auth::guard('cashier');
    }

    use AuthenticatesUsers;

    protected $redirectTo = '/cashier/dashboard';

    public function login()
    {
        return view('cashier::auth.login');
    }

    public function postLogin(Request $request)
    {
        $this->validator($request);

        if(Auth::guard('cashier')->attempt($request->only('email','password'),$request->filled('remember'))){
            return redirect()
                ->intended(route('cashier.dashboard'))
                ->with('status', 'You are Logged');
        }

        return $this->loginFailed();
        
    }

    private function validator(Request $request)
    {
        $rules = [
            'email' => 'required|email|exists:ca_cashiers,email',
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
        Auth::guard('cashier')->logout();
        return redirect('cashier/login');
    }
}