<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Helper;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request){

        //login user
        if(!Auth::attempt($request->only('email','password'))){
            Helper::sendError('Email or password is wroing!!!');
        }
        //send respone
        return new UserResource(auth()->user());
    }
}
