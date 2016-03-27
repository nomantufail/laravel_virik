<?php
/**
 * Created by PhpStorm.
 * User: JR Tech
 * Date: 3/16/2016
 * Time: 9:55 AM
 */

namespace App\Libs\Auth;


use App\Libs\Auth\Traits\TokenGenerator;
use App\Models\Sql\User;

class Api extends Authenticate implements AuthInterface
{
    use TokenGenerator;

    private $accessToken = null;

    public function __construct(){
        parent::__construct();
    }

    public function login(array $credentials){
        $this->setAccessToken($this->generateToken($credentials));
        $authenticatedUser = $this->users->getFirst($credentials);
        $authenticatedUser->access_token = $this->getAccessToken();
        if(!$this->users->update($authenticatedUser))
            return false;
        return $authenticatedUser;
    }

    public function authenticate()
    {
        return ($this->user() == null)?false: true;
    }

    public function user()
    {
        return $this->users->getByToken($this->getAccessToken());
    }
    /**
     * @return null
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * @param null $accessToken
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
    }

}