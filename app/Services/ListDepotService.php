<?php

namespace App\Services;

use App\Models\Depot;

class ListDepotService
{
    public $depot;

    public function __construct(Depot $depot)
    {
        $this->depot = $depot;
    }

    public function index()
    {
        return $this->depot->all();
    }

    public function create(array $data)
    {
        if($data['user_id']==null){
            $data['user_id'] = 0;
        }
        if($data['user_phone']==null){
            $data['user_phone'] = 0;
        }
        $data['transport_default'] = isset($data['transport_default']) ? json_encode($data['transport_default']) : NULL;
        return $this->depot->create($data);
    }

    public function show($id)
    {
        return $this->depot->with('user')->find($id);
    }

    public function update(array $data, $id)
    {
        if (empty($data)) return false;
        if(isset($data['transport_default'])){
            $data['transport_default'] = json_encode($data['transport_default']);
        }
        if($data['user_id']==null){
            $data['user_id'] = 0;
        }
        if($data['user_phone']==null){
            $data['user_phone'] = 0;
        }
        return $this->depot->find($id)->update($data);
    }

    public function delete($id)
    {
        return $this->depot->find($id)->delete();
    }
}