<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('username', $request->username)->first();
        // The passwords match...
        if (Hash::check($request->password, $user->password)) {

            // create string ramdon api_token
            $api_token = Str::random(50);
            
            // set api_token username
            $user->api_token = $api_token;

            // save
            $user->save();
                
            // retun api_tokenfor will requests
            return response()->json(['status' => 'success','api_token' => $api_token]);
        } else {
            return response()->json(['status' => 'fail'],401);
        }
    }

    public function logout(Request $request){
        User::where('api_token', $request->input('api_token'))->update(['api_token' => null]);
        return response()->json(['status' => 'success']);
      }
}