<?php
/**
 * Created by PhpStorm.
 * User: JR Tech
 * Date: 3/16/2016
 * Time: 9:55 AM
 */

namespace App\Libs\Auth;


class Web extends Authenticate implements AuthInterface
{
    public function authenticate()
    {
        return false;
    }

    public function login(array $credentials)
    {
        return false;
    }

    public function user()
    {
        return null;
    }
}