<?php

namespace App\Services\Marketing;

use App\Models\Customer;
use App\Models\Source;

class SourceService
{
    public $source,$customer;

    public function __construct(Source $source,Customer $customer)
    {
        $this->source = $source;
        $this->customer = $customer;
    }

    public function index($search = null){
        $data = $this->source->search($search);
        return $data;
    }

    public function update($data,$id){
        $this->source->find($id)->update($data);
        return 1;
    }

    public function delete($id){
        $customer = $this->customer->where('source_id',$id)->first();
        if ($customer){
            return false;
        }
        return $this->source->find($id)->delete();
    }

}