<?php
/**
 * Created by PhpStorm.
 * User: JR Tech
 * Date: 3/16/2016
 * Time: 9:57 AM
 */

namespace App\Repositories\Repositories\Sql;


use App\Models\Sql\Customer;
use App\Repositories\Interfaces\Repositories\CustomersRepoInterface;

class CustomersRepository extends SqlRepository implements CustomersRepoInterface
{
    private $customerTransformer;
    private $customers = null;
    public function __construct(){
        $this->customerTransformer = null;
        $this->customers = new Customer();
    }

    public function all()
    {
        return $this->customers->all();
    }

    public function getFirst(array $where = [])
    {
        return $this->customers->where($where)->get()->first();
    }

    public function getById($id)
    {
        return $this->customers->find($id);
    }

    public function update($customer)
    {
        $customer->save();
        return true;
    }

    public function store($customerInfo)
    {
        $customer = $this->customers->create($customerInfo);
        return ($customer == null)?null:$customer->id;
    }

    public function delete($userId)
    {
        return $this->customers->destroy($userId);
    }
}
