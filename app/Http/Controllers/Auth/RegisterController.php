<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Str;
use App\TuitionClass;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Rules\PhoneNumber;

class RegisterController extends Controller
{
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
    protected $redirectTo = RouteServiceProvider::LOGIN;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $data['telephone'] = '+94' . ltrim($data['telephone'],'0');
        return Validator::make($data, [
            'name' => ['required'],
            'telephone' => ['required','unique:users,telephone'],
            'address_line' => ['required'],
            'school' => ['required'],
            'day' => ['required'],
            'month' => ['required'],
            'year' => ['required'],
            'gender' => ['required'],
            'ol_year' => ['required'],
            'tuition_class' => ['required'],
            'password' => ['required']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $date = \DateTime::createfromFormat('Y-m-d',$data['year'].'-'.$data['month'].'-'.$data['day']);
        $t_class = TuitionClass::findOrFail($data['tuition_class']);
        $user = User::create([
            'name' => $data['name'],
            'email' => Str::random(50).'@dummy.com' ,
            'password' => Hash::make($data['password']),
            'telephone' => '+94' . ltrim($data['telephone'],'0'),
            'address_line' => $data['address_line'],
            'district' => 'null',
            'province' => 'null',
            'school' => $data['school'],
            'postal_code' => 'null',
            'birth_day' => $date,
            'gender' => $data['gender'],
            'ol_year' => $data['ol_year'],
            'tuition_class' => $t_class->name,
            'tuition_class_code' => $t_class->code,
            'username' => Str::random(64),
            'reg_number' => '',
            'slang' => Str::random(16)
        ]);
        $user->reg_number = substr($data['ol_year'],2,2).'/'.$t_class->code.'/'.$user->id;
        $user->email_verified_at = now();
        $user->save();
        return $user;
    }

    // public function register(Request $request)
    // {
    //     $this->validator($request->all())->validate();
    //     event(new Registered($user = $this->create($request->all())));
    //     \Auth::logout();
    //     return $this->registered($request, $user) ?: redirect($this->redirectPath());
    // }
}
