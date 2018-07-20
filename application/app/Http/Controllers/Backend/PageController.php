<?php

namespace App\Http\Controllers\Backend;

use App\Models\Page;

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

class PageController extends Controller
{
    public function index()
	{
		$index = Page::all();

        $data = '';
        foreach ($index as $list) {
            eval("\$".$list->for." = App\Models\Page::find(".$list->id.");");
            $data[] = [$list->for];
        }

	    return view('backend.page.index')->with(compact($data));
	}

	public function update(Request $request)
	{

        if($request->null == 'N')
        {
            $validator = Validator::make($request->all(), [
                'value' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput()->with($request->modal.'-error', 'Something Errors');
            }
        }

        switch ($request->type) {
            case 'integer':
            	$message = [
		            'value.interger' => 'This field integer only.',
				];

                $validator = Validator::make($request->all(), [
                    'value' => 'interger|nullable',
                ], $message);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput()->with($request->modal.'-error', 'Something Errors');
                }
            case 'numeric':

            	$message = [
		            'value.numeric' => 'This field numeric only.',
				];

                $validator = Validator::make($request->all(), [
                    'value' => 'numeric|nullable',
                ], $message);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput()->with($request->modal.'-error', 'Something Errors');
                }
            case 'image':
            	$message = [
		            'value.numeric' => 'This field numeric only.',
				];

                $validator = Validator::make($request->all(), [
                    'value' => 'image|nullable',
                ], $message);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput()->with($request->modal.'-error', 'Something Errors');
                }
            default:
                break;
        }

        $index = Page::where('for', $request->for)->first();

        if($request->type == 'array')
        {
            $value = $request->value ? implode($request->value, ', ') : null;
        }
        else if($request->type == 'image')
        {
        	if (isset($request->remove_value))
	        {
	            if($index->value != null)
	            {
	                File::delete($index->value);
	                $value = null;
	            }
	        }
	        else
	        {
	            if ($request->hasFile('value'))
	            {
	                $pathSource = 'upload/page/';
	                $image     = $request->file('value');
	                $filename   = time() . '-' . $image->getClientOriginalName();
	                if($image->move($pathSource, $filename))
	                {
	                    if($index->value != null)
	                    {
	                        File::delete($index->value);
	                    }
	                    $value = $pathSource . $filename;
	                }
	            }
	        }
        }
        else
        {
            $value = $request->value;
        }

        $index->value = $value;

        $index->save();

        return redirect()->back()->with('success', 'Data has been updated');

    }

    public function get(Request $request)
	{
        $index = Page::where('for', $request->for)->first();

        return $index->value;

    }
}
