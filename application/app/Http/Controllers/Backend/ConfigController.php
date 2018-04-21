<?php

namespace App\Http\Controllers\Backend;

use App\Models\Config;
use App\Models\Role;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Cache;

use Session;
use File;
use Hash;
use Validator;
use PDF;
use Excel;

use Datatables;

use App\Http\Controllers\Controller;

class ConfigController extends Controller
{

	public function index()
	{
		$index    = Config::all();
        $role = Role::all();
        $user     = User::all();

        $data = '';
        foreach ($index as $list) {
            eval("\$".$list->for." = App\Models\Config::find(".$list->id.");");
            $data[] = [$list->for];
        }

	    return view('backend.config.index')->with(compact($data, 'role', 'user'));
	}
	

	public function update(Request $request)
	{
        if($request->null == 'N')
        {
            $validator = Validator::make($request->all(), [
                'value' => 'required',
            ]);

            if ($validator->fails()) {
                return 'Data can\'t be null';
            }
        }

        switch ($request->type) {
            case 'integer':
                $validator = Validator::make($request->all(), [
                    'value' => 'interger',
                ]);

                if ($validator->fails()) {
                    return 'Integer input only';
                }
            case 'numeric':
                $validator = Validator::make($request->all(), [
                    'value' => 'numeric',
                ]);

                if ($validator->fails()) {
                    return 'Numeric input only';
                }
            default:
                break;
        }

        $index = Config::where('for', $request->for)->first();

        if($request->type == 'array')
        {
            $value = $request->value ? implode($request->value, ', ') : null;
        }
        else
        {
            $value = $request->value;
        }

        $index->value = $value;

        $index->save();

        return 'Data has been updated';

    }

}
