<?php

namespace App\Http\Controllers\Backend;

use App\Constants\DepartmentConstant;
use App\Services\UserService;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
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

    public function editProfile(Request $request){
        $user = User::find($request->user_id);
        $data = $request->except('user_id');
        $data['password'] = bcrypt($data['password']);
        $user->update($data);
        return response()->json([
           'success' => true
        ]);
    }
}
