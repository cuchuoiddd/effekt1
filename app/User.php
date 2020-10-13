<?php

namespace App;

use App\Constants\StatusCode;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','phone', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function search($search)
    {
        $search['searchStatus'] = isset($search['searchStatus']) ? $search['searchStatus'] : StatusCode::ACTIVE;
        $docs = self::when(isset($search['searchDepartment']), function ($q) use ($search) {
            return $q->where('department_id', $search['searchDepartment']);
        })->when($search['searchStatus'], function ($q) use ($search) {
            return $q->where('status', $search['searchStatus']);
        })->orderBy('id', 'desc');
        return $docs;
    }
}
