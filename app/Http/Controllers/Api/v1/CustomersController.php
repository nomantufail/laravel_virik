<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Requests\Customer\AddCustomerRequest;
use App\Http\Responses\Responses\ApiResponse;
use App\Repositories\Interfaces\Repositories\CustomersRepoInterface;

class CustomersController extends ApiController
{
    private $customers;
    public $response;
    public function __construct(ApiResponse $apiResponse, CustomersRepoInterface $customersRepository)
    {
        $this->response = $apiResponse;
        $this->customers = $customersRepository;
    }

    public function index()
    {
        return $this->response->respond(['data'=>[
            'customers'=> $this->customers->all(),
        ]]);
    }

    public function store(AddCustomerRequest $request)
    {
        $customerId = $this->customers->store($request->getCustomerInfo());
        return $this->response->respond(['data' =>[
            'customer'=> $this->customers->getById($customerId)
        ]]);
    }

}
