<?php

namespace App\Http\Controllers\Backend;

use App\Constants\DepartmentConstant;
use App\Services\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public $user;
    public function __construct(UserService $user)
    {
        $this->user = $user;
    }

    public function getUser(){
        $user = Auth::user();
        return response()->json([
            'user' => $user
        ]);
    }
}
