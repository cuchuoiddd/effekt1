<?php
/**
 * Created by PhpStorm.
 * User: Ominext
 * Date: 2019-06-25
 * Time: 10:59 AM
 */

namespace App\Services;

use App\User;

class UserService
{
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getAll($search = null)
    {
        $data = $this->user->search($search);
        return $data;
    }

}
