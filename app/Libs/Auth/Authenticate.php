<?php
/**
 * Created by PhpStorm.
 * User: JR Tech
 * Date: 3/17/2016
 * Time: 12:08 PM
 */

namespace App\Libs\Auth;


use App\Models\Sql\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

abstract class Authenticate
{
    public function attempt(array $credentials)
    {
        $user = User::where('email','=',$credentials['email'])->get()->first();

        if(!$user)
            return false;

        if(!Hash::check($credentials['password'], $user->password))
            return false;

        return true;
    }
}