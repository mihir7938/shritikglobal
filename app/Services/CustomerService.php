<?php

namespace App\Services;

use App\Models\Customer;

class CustomerService
{

    public function getAllCustomers($per_page = -1)
    {
        if($per_page == -1){
            return Customer::orderBy('doj', 'desc')->get();    
        }
        return Customer::orderBy('doj', 'desc')->paginate($per_page);
    }

    public function getCustomerById($id)
    {
        return Customer::find($id);
    }

    public function create($data)
    {
        return Customer::create($data);
    }

    public function update($customers, $data)
    {
        return $customers->update($data);
    }

    public function delete($customers)
    {
        return $customers->delete($customers);
    }
}
