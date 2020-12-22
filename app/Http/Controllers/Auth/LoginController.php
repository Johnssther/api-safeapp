<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;


class LoginController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('username', $request->username)->first();
        dd($user);
        dd( $request->all() );

        $query = User::query();
        $data = $query->get();

        return response()->json($data);
    }
}