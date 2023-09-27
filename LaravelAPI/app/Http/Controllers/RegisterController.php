<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Helper;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request){

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        $user_role = Role::where(['name'=> 'user'])->first();
        if($user_role){
            $user->assignRole($user_role);
        }


        //send respone
        return new UserResource($user);
    }
}
