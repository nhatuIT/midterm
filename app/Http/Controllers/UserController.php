<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use JWTAuth;
use JWTAuthException;
use Hash;

class UserController extends Controller
{
    private $user;

    public function __construct(User $user){
        $this->user = $user;
    }
   
    public function register(Request $request){
        $existed = $this->user->whereUsername($request->input('username'));
        if($existed){
            return response()->json([
                'status'=> 200,
                'message'=> 'User existed'
            ]);
        }
        $user = $this->user->create([
          'name' => $request->input('name'),
          'username' => $request->input('username'),
          'email' => $request->input('email'),
          'password' => Hash::make($request->get('password'))
        ]);

        return response()->json([
            'status'=> 200,
            'message'=> 'User created successfully',
            'data'=>$user
        ]);

        
    }
    
    public function login(Request $request){
        $credentials = $request->only('username', 'password');
        $token = null;
        try {
           if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['invalid_username_or_password'], 422);
           }
        } catch (JWTAuthException $e) {
            return response()->json(['failed_to_create_token'], 500);
        }
        return response()->json(compact('token'));
    }

    public function getUserInfo(Request $request){
        $user = JWTAuth::toUser($request->token);
        return response()->json(['result' => $user]);
    }
}
