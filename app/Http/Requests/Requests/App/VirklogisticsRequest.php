<?php
/**
 * Created by PhpStorm.
 * User: zeenomlabs
 * Date: 3/15/2016
 * Time: 9:56 PM
 */

namespace App\Http\Requests\Requests\App;


use App\Http\Requests\Interfaces\RequestInterface;
use App\Http\Requests\Request;
use App\Http\Validators\Validators\UserValidators\AddUserValidator;
use App\Transformers\Request\AddUserTransformer;
use App\Transformers\Request\VirklogisticsAppRequestTransformer;

class VirklogisticsRequest extends Request implements RequestInterface{

    public $validator;
    public function __construct(){
        parent::__construct(new VirklogisticsAppRequestTransformer($this->getOriginalRequest()));
        $this->validator = null;
    }

    public function authorize(){
        return true;
    }

    public function validate(){
        return true;
    }
} 