<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
class LoginController extends Controller
{
 public function login(Request $request)
 {
//       $http = new GuzzleHttp\Client;
    //       try {
    //         $response = $http->post('http://localhost/laravel/latest5.8+/exclusive/public/oauth/token', [
    //             'form_params' => [
    //             'grant_type' => 'password',
    //             'client_id' => 2,
    //             'client_secret' => '9AvBHgQsvJHwe4RVorurrgbp9rO1neZG1zBhhI1o',
    //             'username' => $request->username,
    //             'password' => $request->password,
    //             ],
    //             ]);
            
    //             return $response->getBody();//code...
    //       } catch (\GuzzleHttp\Exception\BadResponseException $e) {
    //           if ($e->getCode()==400) {
    //               return response()->json('invalid request please enter your username and password');
    //           }elseif ($e->getCode()==401) {
    //             return response()->json('your cridentials are incorrect please try again');

    //           }

    //           return response()->json('Opps, something went wrong on the server');

    //       }


//   }

$validator=$request->validate([
    'username' => ['required', 'string', 'max:255'],
    'password' => ['required', 'string', 'min:6'],
]);

if (Auth::attempt(['username'=>request('username'),'password'=>request('password')])){
    $user=Auth::user();
    $success['token']=$user->createToken('MyApp')->accessToken;
    return response()->json(['success'=>$success],200);
}
else{
    return response()->json(['error'=>"Unauthorized"],401);

 }
 }

 
public function logout(Request $request)
{
    $request->user()->token()->revoke();
    return response()->json(['success'=>"SuccessFully logged out"],200);
    
}

}