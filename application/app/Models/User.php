<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Session;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'email', 'password', 'active', 'id_role', 'level'
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
        return $this->belongsTo('App\Models\User', 'leader');
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
                        'name' => 'All Role User',
                        'value' => 'allRole-user'
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
                    [
                        'name' => 'Change Role',
                        'value' => 'role-user'
                    ],
                    [
                        'name' => 'Change Level',
                        'value' => 'level-user'
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

            // accessInbox
            [
                'name' => 'Inbox',
                'id' => 'inbox',
                'data' => 
                [
                    [
                        'name' => 'List',
                        'value' => 'list-inbox'
                    ],
                    [
                        'name' => 'Mark Read',
                        'value' => 'read-inbox'
                    ],
                    [
                        'name' => 'View',
                        'value' => 'view-inbox'
                    ],
                    [
                        'name' => 'Delete',
                        'value' => 'delete-inbox'
                    ],
                ]
            ],

            // accessNews
            [
                'name' => 'News',
                'id' => 'news',
                'data' => 
                [
                    [
                        'name' => 'List',
                        'value' => 'list-news'
                    ],
                    [
                        'name' => 'Create',
                        'value' => 'create-news'
                    ],
                    [
                        'name' => 'Edit',
                        'value' => 'edit-news'
                    ],
                    [
                        'name' => 'Delete',
                        'value' => 'delete-news'
                    ],
                    [
                        'name' => 'Publish',
                        'value' => 'publish-news'
                    ],
                ]
            ],

            // accessPartner
            [
                'name' => 'Partner',
                'id' => 'partner',
                'data' => 
                [
                    [
                        'name' => 'List',
                        'value' => 'list-partner'
                    ],
                    [
                        'name' => 'Create',
                        'value' => 'create-partner'
                    ],
                    [
                        'name' => 'Edit',
                        'value' => 'edit-partner'
                    ],
                    [
                        'name' => 'Delete',
                        'value' => 'delete-partner'
                    ],
                    [
                        'name' => 'Publish',
                        'value' => 'publish-partner'
                    ],
                ]
            ],

            // accessDistribution
            [
                'name' => 'Distribution',
                'id' => 'distribution',
                'data' => 
                [
                    [
                        'name' => 'List',
                        'value' => 'list-distribution'
                    ],
                    [
                        'name' => 'Create',
                        'value' => 'create-distribution'
                    ],
                    [
                        'name' => 'Edit',
                        'value' => 'edit-distribution'
                    ],
                    [
                        'name' => 'Delete',
                        'value' => 'delete-distribution'
                    ],
                    [
                        'name' => 'Publish',
                        'value' => 'publish-distribution'
                    ],
                ]
            ],

            // accessLicense
            [
                'name' => 'License',
                'id' => 'license',
                'data' => 
                [
                    [
                        'name' => 'List',
                        'value' => 'list-license'
                    ],
                    [
                        'name' => 'Create',
                        'value' => 'create-license'
                    ],
                    [
                        'name' => 'Edit',
                        'value' => 'edit-license'
                    ],
                    [
                        'name' => 'Delete',
                        'value' => 'delete-license'
                    ],
                    [
                        'name' => 'Publish',
                        'value' => 'publish-license'
                    ],
                ]
            ],

            // accessProduct
            [
                'name' => 'Product',
                'id' => 'product',
                'data' => 
                [
                    [
                        'name' => 'List',
                        'value' => 'list-product'
                    ],
                    [
                        'name' => 'Create',
                        'value' => 'create-product'
                    ],
                    [
                        'name' => 'Edit',
                        'value' => 'edit-product'
                    ],
                    [
                        'name' => 'Delete',
                        'value' => 'delete-product'
                    ],
                    [
                        'name' => 'Publish',
                        'value' => 'publish-product'
                    ],
                ]
            ],
        ];

        return $array;
    }
}
