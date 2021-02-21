<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    //
    public function login(Request $request){
        
        $link = 'http://localhost:8081/';

        $http = new \GuzzleHttp\Client;
        try {
            $response = $http->post(config('services.passport.login_endpoint'), [//$link.'oauth/token'
                'form_params'=>[
                    'grant_type' => 'password',
                    'client_id' => config('services.passport.client_id'),//2
                    'client_secret' => config('services.passport.client_secret'),//'Kw27CxacbgbDVrgKGO0FalB2aCTiJueyJ0hk3eD1'
                    'username' => $request->username,//'klehner@example.net',//
                    'password' =>  $request->password//'password'//
                ]
            ]);
            return $response->getBody();
        }catch(\GuzzleHttp\Exception\BadResponseException $e){
            if($e->getCode()==400){
                return response()->json('Invalid request. Please enter a username or password. ', $e->getCode());
            }else if($e->getCode()==401){
                return response()->json('Your credentials are incorrect. Please try again', $e->getCode()); 
            }
            return response()->json('Something went wrong on the server.', $e->getCode());
        }
        
        
    }

    public function register(Request $request){
        
       $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
       ]);

       return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
       ]);
        
        
    }

    public function logout(){
        
        auth()->user()->tokens->each(function ($token, $key){
            $token->delete();
        });
         
        return response()->json("Logged out successfully!",200); 
         
     }
}