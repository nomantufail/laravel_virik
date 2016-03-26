<?php
/**
 * Created by PhpStorm.
 * User: zeenomlabs
 * Date: 3/15/2016
 * Time: 9:56 PM
 */

namespace App\Http\Requests\Requests\User;


use App\Http\Requests\Interfaces\RequestInterface;
use App\Http\Requests\Request;
use App\Http\Validators\Validators\UserValidators\AddUserValidator;
use App\Transformers\Request\AddUserTransformer;

class AddUserRequest extends Request implements RequestInterface{

    public $validator;
    public function __construct(){
        parent::__construct(new AddUserTransformer($this->getOriginalRequest()));

        $this->validator = new AddUserValidator($this->getOriginalRequest());
    }

    public function authorize(){
        return true;
    }

    public function validate(){
        return $this->validator->validate();
    }

    public function getUserInfo()
    {
        return [
            'f_name' => $this->get('f_name'),
            'l_name' => $this->get('l_name'),
            'email' => $this->get('email'),
            'password' => $this->get('password'),
            'country_id' => $this->get('country_id'),
            'membership_plan_id' => $this->get('membership_plan_id'),
        ];
    }

    public function getAgencyInfo()
    {
        return [
            'agency' => $this->get('agency')
        ];
    }

    public function userIsAgent()
    {
        return ($this->get('is_agent') == '1')? true : false;
    }
} 