<?php
/**
 * Created by PhpStorm.
 * User: zeenomlabs
 * Date: 3/15/2016
 * Time: 9:56 PM
 */

namespace App\Http\Requests\Requests\Auth;


use App\Http\Requests\Interfaces\RequestInterface;
use App\Http\Requests\Request;
use App\Http\Validators\Validators\UserValidators\AddUserValidator;
use App\Transformers\Request\AuthenticateUserTransformer;
use App\Transformers\Request\RegisterUserTransformer;

class RegistrationRequest extends Request implements RequestInterface{

    public $validator = null;
    public function __construct(){
        parent::__construct(new RegisterUserTransformer($this->getOriginalRequest()));
        $this->validator = new AddUserValidator($this->getOriginalRequest());
    }

    public function authorize(){
        return true;
    }

    public function validate(){
        return $this->validator->validate();
    }
} 