<?php

namespace App\Services;

use App\Models\SubProduct;

class SubProductService
{

    public function getAllSubProducts($per_page = -1)
    {
        if($per_page == -1){
            return SubProduct::orderBy('created_at')->get();    
        }
        return SubProduct::orderBy('created_at')->paginate($per_page);
    }

    public function getSubProductById($id)
    {
        return SubProduct::find($id);
    }

    public function create($data)
    {
        return SubProduct::create($data);
    }

    public function update($sub_products, $data)
    {
        return $sub_products->update($data);
    }

    public function delete($sub_products)
    {
        return $sub_products->delete($sub_products);
    }
    public function getActiveSubProducts()
    {
        return SubProduct::orderBy('created_at')->where('status', 1)->get();
    }
}
