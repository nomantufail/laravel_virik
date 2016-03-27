<?php
/**
 * Created by PhpStorm.
 * User: zeenomlabs
 * Date: 3/15/2016
 * Time: 9:56 PM
 */

namespace App\Http\Requests\Requests\Customer;


use App\Http\Requests\Interfaces\RequestInterface;
use App\Http\Requests\Request;
use App\Http\Validators\Validators\CustomerValidators\AddCustomerValidator;
use App\Transformers\Request\Customer\AddCustomerTransformer;

class AddCustomerRequest extends Request implements RequestInterface{

    public $validator;
    public function __construct(){
        parent::__construct(new AddCustomerTransformer($this->getOriginalRequest()));

        $this->validator = new AddCustomerValidator($this->getOriginalRequest());
    }

    public function getCustomerInfo()
    {
        $authUser = $this->authenticator->user();
        return [
            'name' => $this->get('name'),
            'email' => $this->get('email'),
            'phone' => $this->get('phone'),
            'address' => $this->get('address'),
            'id_card' => $this->get('id_card'),
            'created_by' => $authUser->id,
            'updated_by' => $authUser->id,
        ];
    }

    public function authorize(){
        return true;
    }

    public function validate(){
        return $this->validator->validate();
    }
} 