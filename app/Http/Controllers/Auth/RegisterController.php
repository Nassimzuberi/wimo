<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

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
    protected $redirectTo = RouteServiceProvider::COMPTE;

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
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:191'],
            'last_name' => ['required', 'string', 'max:191'],
            'birthday'=>['required','date'],
            'gender'=>['required'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'img' => ['image']
        ],
        [
            'email.unique' => "L'adresse mail est déjà utilisé."
        ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if($user = User::create([
            'first_name' => $data['first_name'],
            'last_name'=>$data['last_name'],
            'birthday'=>$data['birthday'],
            'gender'=>$data["gender"],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'api_token' => Str::random(80)
        ])){
            if(array_key_exists('img',$data)) {
                if(config('app.env') === 'production'){
                    $user->update(['avatar' => Storage::disk()->putFile('users',$data['img'],'public')]);
                } else {
                    $user->update(['avatar' => $data['img']->store('users','public']);
                }
            }
        }

        return $user;
    }
}
