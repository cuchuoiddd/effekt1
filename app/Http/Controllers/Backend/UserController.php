<?php

namespace App\Http\Controllers\Backend;

use App\Constants\DepartmentConstant;
use App\Services\UserService;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public $user;
    public function __construct(UserService $user)
    {
        $this->user = $user;
    }

    public function getAllSale(){
        $search['searchDepartment'] = DepartmentConstant::SALE;
        $user = $this->user->getAll($search);
        return $user;
    }
}
