<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Validator,Auth};
use App\Models\{Farmer,User};
// use App\Models\User;

class AuthenticationController extends Controller
{
    public function sign_up(Request $request){
        $rule = [
            'name' => 'required|min:5|string',
            'phone' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|min:8'
        ];
        $validator = Validator::make($request->all(), $rule);
        if ($validator->fails()){
            return response()->json(['message' => false , 'error' =>$validator->errors()],400);
        }else {
            $farmers = User::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
            
            $token = $farmers->createToken('API Token')->plainTextToken;

            return response()->json(['message' => "success", 'token' => $token],200);
        };
    }
    public function Login(Request $request){
        $rule = [
            'email' => 'required|string',
            'password' => 'required'
        ];
        $validator = Validator::make($request->all(), $rule); 
        if($validator->fails()){
            return response()->json(['message' => false , 'error' =>$validator->errors()],400);
        }else{
            $info = $request->only('email','password');
            if(Auth::attempt($info)){
                $farmer = Auth::user();
                $token = $farmer->createToken('API Token')->plainTextToken;
                return response()->json(['message' => 'success', 'token' => $token],200);
            }else{
                return response()->json(['message' => false],400);
            }
        }
    }
    public function sign_out(Request $request){
        $user = $request->user();
        $user->tokens()->delete();
        return response()->json(['message'=>'log out success.','success' => true],200);
    }
}
