<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;


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
    protected $redirectTo = '/home';

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
    protected function validator(Request $request)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $request)
    {
        $validator=$request->validate([
            'nickname' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'phoneNo' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = new User();
        
            $user->nickname = $request->input('nickname');
            $user->phoneNo = $request->input('phoneNo');
            $user->category = $request->input('category');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->save();

        return response()->json($request->input('nickname'), 200);

    }

    public function checkUser(Request $request)
    {
       $user=User::where("nickname",$request->input('nickname'))->first();
       if(count($user) >=1 ){
           return response()->json($user,402);
       }else{
           return response()->json("good", 200);
       }
    }

    public function checkEmail(Request $request)
    {
       $user=User::where("email",$request->input('email'))->first();
       if(count($user) >=1 ){
           return response()->json($user,402);
       }else{
           return response()->json("good", 200);
       }
    }
}
