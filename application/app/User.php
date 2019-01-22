<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Session;

use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'email', 'password', 'active', 'id_role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getRole()
    {
        return $this->belongsTo('App\Models\Role', 'id_role');
    }

    public function getLeader()
    {
        return $this->belongsTo('App\User', 'leader');
    }

    public function hasAccess(string $permission) : bool
    {
        $permission_arr = explode(', ', $this->getRole->permission);
        $grant_arr      = explode(', ', $this->grant);
        $denied_arr     = explode(', ', $this->denied);

        if((in_array($permission, $permission_arr) || in_array($permission, $grant_arr)) && !in_array($permission, $denied_arr)) {
            return true;
        }
        return false;
    }

    public function setImpersonating($id)
    {
        Session::put('impersonate', $id);
        Session::put('original', Auth::id());

        Auth::logout();
        Auth::loginUsingId($id);
    }

    public function stopImpersonating()
    {
        Auth::logout();
        Auth::loginUsingId(Session::get('original'));

        Session::forget('impersonate');
        Session::forget('original');
    }

    public function isImpersonating()
    {
        return Session::has('impersonate');
    }

    public static function keypermission()
    {
        $array = 
        [
            // accessUser
            [
                'name' => 'User',
                'id' => 'user',
                'data' => 
                [
                    [
                        'name' => 'All User',
                        'value' => 'all-user'
                    ],
                    [
                        'name' => 'List',
                        'value' => 'list-user'
                    ],
                    [
                        'name' => 'Create',
                        'value' => 'create-user'
                    ],
                    [
                        'name' => 'Edit',
                        'value' => 'edit-user'
                    ],
                    [
                        'name' => 'Delete',
                        'value' => 'delete-user'
                    ],
                    [
                        'name' => 'Active',
                        'value' => 'active-user'
                    ],
                    [
                        'name' => 'Access',
                        'value' => 'access-user'
                    ],
                    [
                        'name' => 'Impersonate',
                        'value' => 'impersonate-user'
                    ],
                ]
            ],

            // accessRole
            [
                'name' => 'Role',
                'id' => 'role',
                'data' => 
                [
                    [
                        'name' => 'List',
                        'value' => 'list-role'
                    ],
                    [
                        'name' => 'Create',
                        'value' => 'create-role'
                    ],
                    [
                        'name' => 'Edit',
                        'value' => 'edit-role'
                    ],
                    [
                        'name' => 'Delete',
                        'value' => 'delete-role'
                    ],
                    [
                        'name' => 'Active',
                        'value' => 'active-role'
                    ],
                ]
            ],
        ];

        return $array;
    }
}
