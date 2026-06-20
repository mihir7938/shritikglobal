<?php

namespace App\Services;

use App\Models\CustomerBank;

class CustomerBankService
{

    public function getAllCustomerBanks($per_page = -1)
    {
        if($per_page == -1){
            return CustomerBank::orderBy('created_at')->get();    
        }
        return CustomerBank::orderBy('created_at')->paginate($per_page);
    }

    public function getCustomerBankById($id)
    {
        return CustomerBank::find($id);
    }

    public function create($data)
    {
        return CustomerBank::create($data);
    }

    public function update($customer_banks, $data)
    {
        return $customer_banks->update($data);
    }

    public function delete($customer_banks)
    {
        return $customer_banks->delete($customer_banks);
    }
}
