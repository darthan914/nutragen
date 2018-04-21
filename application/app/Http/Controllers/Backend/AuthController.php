<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Role;
use App\Models\Config;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['showLogin', 'login', 'formRegister', 'register', 'logout']]);
    }

    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('backend.home');
        }
        return view('backend.auth.login');
    }

    public function login(Request $request)
    {
        $role = Role::firstOrCreate(
            ['id' => 1],
            [
                'name'       => 'Administrator',
                'code'       => 'admin',
                'active'     => 1,
                'permission' => 'config, all-user, list-user, create-user, edit-user, delete-user, active-user, access-user, leader-user, impersonate-user, list-role, create-role, edit-role, delete-role, active-role',
            ]
        );

        $user = User::firstOrCreate(
            ['id' => 1], 
            [
                'name'     => 'Super Admin',
                'email'    => 'admin@amadeo.id',
                'password' => bcrypt('amadeo123'),
                'active'   => 1,
                'id_role'  => 1,
            ]
        );

        $super_admin_role = Config::firstOrCreate(
            ['for' => 'super_admin_role'], 
            ['value' => 1]
        );

        $super_admin_user = Config::firstOrCreate(
            ['for' => 'super_admin_user'], 
            ['value' => 1]
        );

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'active' => 1])) {
            return redirect()->route('backend.home');
        } else {
            $query = User::where('email', $request->email);
            $find  = $query->first();
            $check = $query->count();

            if ($check) {
                if ($find->active != 1) {
                    Session::flash('failed', 'Your email not active please inform to team leader');
                    return redirect::back();
                } else {
                    Session::flash('failed', 'Invalid password');
                    return redirect::back();
                }
            } else {
                Session::flash('failed', 'Invalid Username');
                return redirect::back();
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('backend');
    }

    public function password()
    {
        return view('backend.auth.password');
    }

    public function sendPassword()
    {
        return view('backend.auth.password');
    }

    public function resetPassword($token)
    {
        return view('backend.auth.reset');
    }

    public function register(Request $request)
    {
        
        $users = new User;

        $this->validate($request, [
            'username' => 'required|unique:users,username|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
        ]);

        $users->username = $request->username;
        $users->email    = $request->email;
        $users->password = bcrypt($request->password);
        $users->name     = $request->name;

        $users->save();

        Session::flash('success', 'Data has been added, please info to owner website');
        return redirect()->route('admin');
    }

    public function active($id, Request $request)
    {
        $user = User::find($id);

        if ($request->active == -2) {
            $user->delete();

            Session::flash('success', 'Data has been deleted');
            return redirect::back();
        } else {
            $user->active = $request->active;
            $user->save();

            Session::flash('success', 'Data has been change');
            return redirect::back();
        }
    }
}
