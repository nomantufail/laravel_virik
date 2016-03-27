<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Requests\Auth\AuthenticationRequest;
use App\Http\Requests\Requests\Auth\LoginRequest;
use App\Http\Requests\Requests\Auth\RegistrationRequest;
use App\Http\Responses\Responses\ApiResponse;
use App\Libs\Auth\Api as Authenticator;
use App\Models\Sql\User;
use App\Repositories\Interfaces\Repositories\UsersRepoInterface;
use App\Repositories\Repositories\Sql\UsersRepository;
use App\Transformers\Response\UserTransformer;
use Illuminate\Auth\Events\Login;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

class AuthController extends Controller
{
    private $auth;
    private $users;
    private $userTransformer;
    public $response;
    public function __construct
    (
        ApiResponse $response, Authenticator $authenticator,
        UsersRepoInterface $usersRepository, UserTransformer $userTransformer
    )
    {
        $this->auth = $authenticator;
        $this->users = $usersRepository;
        $this->response = $response;
        $this->userTransformer = $userTransformer;
    }
    public function login(LoginRequest $request)
    {
        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ];

        if(!$this->auth->attempt($credentials))
            return $this->response->respondInvalidCredentials();

        $authenticatedUser = $this->auth->login(['email'=>$credentials['email']]);
        if($authenticatedUser == null)
            $this->response->respondInternalServerError();

        return $this->response->respond(['data'=>[
            'authUser' => $authenticatedUser
        ]]);
    }

    public function register(RegistrationRequest $request)
    {
        $userId = $this->users->store($request->getInsertables());
        return $this->response->respond(['data' =>[
            'user'=> $this->users->getById($userId)
        ]]);
    }
}
