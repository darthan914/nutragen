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
use File;
use Validator;

use Datatables;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
	{
        $role = Role::all();

    	return view('backend.user.index', compact('request', 'role'));
	}

    public function datatables(Request $request)
    {
        $f_role   = $this->filter($request->f_role);
        $f_active = $this->filter($request->f_active);

        $index = User::select('users.*', 'role.name as role')->join('role', 'role.id', 'users.id_role')->where('level', '<=', Auth::user()->level);

        if(!Auth::user()->can('all-user'))
        {
            $index->where('id', Auth::id())
                ->orWhere('leader', Auth::id())
                ->orWhere(function ($query) {
                    $query->where('active', -1)
                          ->where('id_role', Auth::user()->id_role);
                });
        }

        if(!Auth::user()->can('allRole-user'))
        {
            $index->where('id_role', Auth::user()->id_role);
        }

        if($f_role != '' && Auth::user()->can('allPosition-user'))
        {
            $index->where('id_position', $f_role);
        }

        if($f_active != '' && $f_active == 1)
        {
            $index->where('active', 1);
        }
        else if ($f_active === '0')
        {
            $index->where('active', '<>', 1);
        }

        $index = $index->get();

        $datatables = Datatables::of($index);

        $datatables->addColumn('action', function ($index) {
            $html = '';

            if(Auth::user()->can('edit-user') && $this->usergrant($index->id, 'all-user'))
            {
                $html .= '
                    <a href="' . route('backend.user.edit', ['id' => $index->id]) . '" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
                ';
            }

            if (Auth::user()->can('active-user') && $this->usergrant($index->id, 'all-user') && $index->id != Auth::id())
            {
                if($index->active)
                {
                    $html .= '
                        <button class="btn btn-xs btn-dark inactive-user" data-toggle="modal" data-target="#inactive-user" data-id="'.$index->id.'"><i class="fa fa-eye-slash"></i></button>
                    ';
                }
                else
                {
                    $html .= '
                        <button class="btn btn-xs btn-info active-user" data-toggle="modal" data-target="#active-user" data-id="'.$index->id.'"><i class="fa fa-eye"></i></button>
                    ';
                }
            }

            if(Auth::user()->can('access-user') && $this->usergrant($index->id, 'all-user'))
            {
                $html .= '
                    <a href="' . route('backend.user.access', ['id' => $index->id]) . '" class="btn btn-xs btn-default"><i class="fa fa-key"></i></a>
                ';
            }


            if(Auth::user()->can('delete-user') && $this->usergrant($index->id, 'all-user') && $index->id != Auth::id())
            {
                $html .= '
                    <button class="btn btn-xs btn-danger delete-user" data-toggle="modal" data-target="#delete-user" data-id="'.$index->id.'"><i class="fa fa-trash"></i></button>
                ';
            }

            if(Auth::user()->can('impersonate-user') && $this->usergrant($index->id, 'all-user') && $index->id != Auth::id())
            {
                $html .= '
                    <button class="btn btn-xs btn-info impersonate-user" data-toggle="modal" data-target="#impersonate-user" data-id="'.$index->id.'"><i class="fa fa-sign-in"></i></button>
                ';
            }
                
            return $html;
        });

        $datatables->editColumn('active', function ($index) {
            $html = '';
            if($index->active)
            {
                $html .= '
                    <span class="label label-info">Active</span>
                ';
            }
            else
            {
                $html .= '
                    <span class="label label-default">Inactive</span>
                ';
            }
            return $html;
        });

        $datatables->addColumn('check', function ($index) {
            $html = '';

            if($index->id != Auth::id())
            {
                $html .= '
                    <input type="checkbox" class="check" value="' . $index->id . '" name="id[]" form="action">
                ';
            }

            return $html;
        });

        $datatables->editColumn('id_role', function ($index) {
            return $index->getRole->name;
        });

        $datatables = $datatables->make(true);
        return $datatables;
    }

	public function create()
    {
        $config    = Config::all();
        $data = '';
        foreach ($config as $list) {
            eval("\$".$list->for." = App\Models\Config::find(".$list->id.");");
            $data[] = $list->for;
        }

        $role        = Role::whereNotIn('code', explode(', ', $super_admin_role->value))->where('active', 1)->get();
        $super_admin = Role::whereIn('code', explode(', ', $super_admin_role->value))->where('active', 1)->get();
        $leader      = User::where('level', '>', 0)->get();

    	return view('backend.user.create', compact('role', 'leader', 'super_admin', $data));
    }

	public function store(Request $request)
    {
        $message = [
            'name.required' => 'This Field Required.',
            'email.required' => 'This Field Required.',
            'email.unique' => 'Email already exist.',
            'password.required' => 'This Field Required.',
            'password.confirmed' => 'Password doesn\'t match.',
            'password_user.required' => 'Enter your password.',
            'avatar.image' => 'Image file only.',
        ];

        $validator = Validator::make($request->all(), [
            'name'          => 'required',
            'email'         => 'required|unique:users,email',
            'password'      => 'required|confirmed',
            'avatar'        => 'image',
        ], $message);

        $validator->after(function ($validator) use ($request) {
            if (!Hash::check($request->password_user, Auth::user()->password)) {
                $validator->errors()->add('password_user', 'Password invalid');
            }
        });

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


    	$index = new User;

        $index->name     = $request->name;
        $index->email    = $request->email;
        $index->password = bcrypt($request->password);

        if(Auth::user()->can('role-user'))
        {
            $index->id_role   = $request->id_role;
        }


        if(Auth::user()->can('active-user'))
        {
            $index->active = $request->active;
        }

        if ($request->hasFile('avatar'))
        {
            $pathSource = 'upload/user/avatar/';
            $image      = $request->file('avatar');
            $filename   = time() . '-' . $image->getClientOriginalName();
            if($image->move($pathSource, $filename))
            {
                if($index->avatar != '')
                {
                    File::delete($index->avatar);
                }
                $index->avatar = $pathSource . $filename;
            }
        }

        $index->level  = $request->level ?? 0;
        $index->leader = $request->leader;
        
        $index->save();

    	return redirect()->route('backend.user')->with('success', 'Data has been added');
    }

    public function edit($id)
    {
    	$config    = Config::all();
        $data = '';
        foreach ($config as $list) {
            eval("\$".$list->for." = App\Models\Config::find(".$list->id.");");
            $data[] = $list->for;
        }

        $index = User::find($id);

        if(!$this->usergrant($index->id, 'all-user') || !$this->levelgrant($index->id))
        {
            return redirect()->route('backend.user')->with('failed', 'Access Denied');
        }
        
        $role        = Role::whereNotIn('code', explode(', ', $super_admin_role->value))->where('active', 1)->get();
        $super_admin = Role::whereIn('code', explode(', ', $super_admin_role->value))->where('active', 1)->get();
        $leader      = User::where('level', '>', 0)->get();

    	return view('backend.user.edit')->with(compact('index', 'role', 'leader', 'super_admin', $data));
    }

    public function update($id, Request $request)
    {
        $index = User::find($id);

        if(!$this->usergrant($index->id, 'all-user'))
        {
            return redirect()->route('backend.user')->with('failed', 'Access denied');
        }

    	$message = [
            'name.required' => 'This Field Required.',
            'email.required' => 'This Field Required.',
            'email.unique' => 'Email already exist.',
            'password.required' => 'This Field Required.',
            'password.confirmed' => 'Password doesn\'t match.',
            'password_user.required' => 'Enter your password.',
            'avatar.image' => 'Image file only.',
        ];

        $validator = Validator::make($request->all(), [
            'name'          => 'required',
            'email'         => 'required|unique:users,email,'.$id,
            'password'      => 'confirmed',
            'avatar'        => 'image',
        ], $message);

        $validator->after(function ($validator) use ($request) {
            if (!Hash::check($request->password_user, Auth::user()->password)) {
                $validator->errors()->add('password_user', 'Password Invalid');
            }
        });

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $index->name       = $request->name;
        $index->email      = $request->email;
        $index->password   = $request->password != '' ? bcrypt($request->password) : $index->password;

        if(Auth::user()->can('role-user'))
        {
            $index->id_role   = $request->id_role;
        }

        if(Auth::user()->can('active-user'))
        {
            $index->active = $request->active;
        }

        if (isset($request->remove_avatar))
        {
            if($index->avatar != '')
            {
                File::delete($index->avatar);
                $index->avatar = '';
            }
        }
        else
        {
        	if ($request->hasFile('avatar'))
	        {
	            $pathSource = 'upload/user/avatar/';
	            $image      = $request->file('avatar');
	            $filename   = time() . '-' . $image->getClientOriginalName();
	            if($image->move($pathSource, $filename))
	            {
	                if($index->avatar != '')
	                {
	                    File::delete($index->avatar);
	                }
	                $index->avatar = $pathSource . $filename;
	            }
	        }
        }

        $index->level  = $request->level ?? $index->level;
        $index->leader = $request->leader;
        
        $index->save();

    	return redirect()->route('backend.user')->with('success', 'Data has been updated');
    }

    public function delete($id)
    {
    	if(Auth::id() == $id)
    	{
            Session::flash('warning', 'Access Denied');
    		return redirect()->route('backend.user');
    	}

    	User::destroy($id);

    	return redirect()->route('backend.user')->with('success', 'Data has been deleted');
    }

    public function action(Request $request)
    {
    	if($request->action == 'delete')
    	{
    		User::destroy($request->id);
            return redirect()->route('backend.user')->with('success', 'Data has been deleted');
    	}
    	else if($request->action == 'enable')
    	{
    		$index = User::whereIn('id', $request->id)->update(['active' => 1]);
            return redirect()->route('backend.user')->with('success', 'Data has been actived');
    	}
    	else if($request->action == 'disable')
    	{
    		$index = User::whereIn('id', $request->id)->update(['active' => 0]);
            return redirect()->route('backend.user')->with('success', 'Data has been deactivaed');
    	}
    }

    public function active(Request $request)
    {
        if(Auth::id() == $request->id)
        {
            Session::flash('warning', 'Access Denied');
            return redirect()->route('backend.user');
        }
        
        $index = User::find($request->id);

        if ($index->active == 0)
        {
            $index->active = 1;
            $index->save();
            return redirect()->back()->with('success', 'Data has been actived');
        } 
        else if ($index->active == 1)
        {
            $index->active = 0;
            $index->save();
            return redirect()->back()->with('success', 'Data has been deactivaed');
        }
    }

    public function access($id)
    {
        $index = User::find($id);
        $key = User::keypermission();

        return view('backend.user.access')->with(compact('index', 'key'));
    }

    public function accessUpdate($id, Request $request)
    {
        $index = User::find($id);

        $message = [
            'password.required' => 'Password Required.',
        ];

        $validator = Validator::make($request->all(), [
            'password'        => 'required',
        ], $message);

        $validator->after(function ($validator) use ($request) {
            if (!Hash::check($request->password, Auth::user()->password)) {
                $validator->errors()->add('password', 'Password Invalid');
            }
        });

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $grant  = $request->grant ? implode($request->grant, ', ') : '';
        $denied = $request->denied ? implode($request->denied, ', ') : '';
        
        $index->grant  = $grant;
        $index->denied = $denied;
        
        $index->save();
        
        return redirect()->route('backend.user')->with('success', 'Data has been updated');
    }

    public function impersonate(Request $request)
    {
        $message = [
            'password.required' => 'This field required.',
        ];

        $validator = Validator::make($request->all(), [
            'password'        => 'required',
        ], $message);

        $validator->after(function ($validator) use ($request) {
            if (!Hash::check($request->password, Auth::user()->password)) {
                $validator->errors()->add('password', 'Password Invalid');
            }
        });

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('impersonate-user-error', '');
        }

        $index = User::find($request->id);

        if(true)
        {
            Auth::user()->setImpersonating($index->id);

        }
        else
        {
            return redirect()->back()->with('failed', 'Can\'t Impersonate');
        }


        return redirect()->route('backend.home')->with('success', 'Masuk sebagai '. $index->fullname);
    }

    public function leave()
    {
        Auth::user()->stopImpersonating();

        return redirect()->route('backend.user')->with('success', 'Back as original user');
    }
}
