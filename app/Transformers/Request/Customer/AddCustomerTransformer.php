<?php
/**
 * Created by PhpStorm.
 * User: zeenomlabs
 * Date: 3/15/2016
 * Time: 9:54 PM
 */

namespace App\Transformers\Request\Customer;


use App\Transformers\Request\RequestTransformer;

class AddCustomerTransformer extends RequestTransformer{

    public function transform(){
        return $this->request->all();
    }
} 