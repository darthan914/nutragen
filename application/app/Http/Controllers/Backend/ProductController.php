<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
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

class ProductController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
	{
    	return view('backend.product.index', compact('request'));
	}

    public function datatables(Request $request)
    {
        $f_publish   = $this->filter($request->f_publish);

        $index = Product::select('*');

        if($f_publish != '' && $f_publish == 1)
        {
            $index->where('flag_publish', 1);
        }
        else if ($f_publish === '0')
        {
            $index->where('flag_publish', '<>', 1);
        }

        $index = $index->get();

        $datatables = Datatables::of($index);

        $datatables->addColumn('action', function ($index) {
            $html = '';

            if(Auth::user()->can('edit-product'))
            {
                $html .= '
                    <a href="' . route('backend.product.edit', ['id' => $index->id]) . '" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
                ';
            }

            if(Auth::user()->can('delete-product'))
            {
                $html .= '
                    <button class="btn btn-xs btn-danger delete-product" data-toggle="modal" data-target="#delete-product" data-id="'.$index->id.'"><i class="fa fa-trash"></i></button>
                ';
            }

            if (Auth::user()->can('publish-product'))
            {
                if($index->flag_publish)
                {
                    $html .= '
                        <button class="btn btn-xs btn-dark unpublish-product" data-toggle="modal" data-target="#unpublish-product" data-id="'.$index->id.'">Unpublish</button>
                    ';
                }
                else
                {
                    $html .= '
                        <button class="btn btn-xs btn-success publish-product" data-toggle="modal" data-target="#publish-product" data-id="'.$index->id.'">Publish</button>
                    ';
                }
            }

            return $html;
        });


        $datatables->editColumn('image_logo', function ($index) {
            $html = '';

            $html .= '
                <img src="'. asset($index->image_logo) .'" height="'.($index->image_logo_height ?? 100).'">
            ';
            
            return $html;
        });

        $datatables->editColumn('flag_publish', function ($index) {
            $html = '';
            if($index->flag_publish)
            {
                $html .= '
                    <span class="label label-success">Published</span>
                ';
            }
            else
            {
                $html .= '
                    <span class="label label-default">Unpublish</span>
                ';
            }
            return $html;
        });

        $datatables->editColumn('created_at', function ($index) {
            $html = $index->created_at ? date('d/m/Y H:i:s', strtotime($index->created_at)) : '';

            return $html;
        });

        $datatables->addColumn('check', function ($index) {
            $html = '';


            $html .= '
                <input type="checkbox" class="check" value="' . $index->id . '" name="id[]" form="action">
            ';

            return $html;
        });

        $datatables = $datatables->make(true);
        return $datatables;
    }

    public function create()
    {
    	return view('backend.product.create');
    }

	public function store(Request $request)
    {
        $message = [
            'name.required'                => 'This Field Required.',
            'image_logo.required'          => 'This Field Required.',
            'image_logo.image'             => 'Image file only.',
            'image_logo_height.numeric'    => 'This Field Numeric only.',
            'image_product.required'       => 'This Field Required.',
            'image_product.image'          => 'Image file only.',
            'image_product_height.numeric' => 'This Field Numeric only.',
            'short_description.required'   => 'This Field Required.',
            'description.required'         => 'This Field Required.',
        ];

        $validator = Validator::make($request->all(), [
            'name'                 => 'required',
            'image_logo'           => 'required|image',
            'image_logo_height'    => 'numeric|nullable',
            'image_product'        => 'required|image',
            'image_product_height' => 'numeric|nullable',
            'short_description'    => 'required',
            'description'          => 'required',
        ], $message);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


    	$index = new Product;

        $index->name                 = $request->name;
        $index->image_logo_height    = $request->image_logo_height;
        $index->image_product_height = $request->image_product_height;
        $index->short_description    = $request->short_description;
        $index->description          = $request->description;

        $index->flag_publish = $request->flag_publish;
        $index->id_updated   = Auth::id();
        $index->version      = $request->version + 1;


        if ($request->hasFile('image_logo'))
        {
            $pathSource = 'upload/product/logo/';
            $image      = $request->file('image_logo');
            $filename   = time() . '-' . $image->getClientOriginalName();
            if($image->move($pathSource, $filename))
            {
                $index->image_logo = $pathSource . $filename;
            }
        }

        if ($request->hasFile('image_product'))
        {
            $pathSource = 'upload/product/';
            $image     = $request->file('image_product');
            $filename   = time() . '-' . $image->getClientOriginalName();
            if($image->move($pathSource, $filename))
            {
                $index->image_product = $pathSource . $filename;
            }
        }

        $index->save();

    	return redirect()->route('backend.product')->with('success', 'Data has been added');
    }

    public function edit($id)
    {
        $index = Product::find($id);

        if($index == '')
        {
        	return redirect()->back()->with('failed', 'Data not exist');
        }

    	return view('backend.product.edit')->with(compact('index'));
    }

    public function update($id, Request $request)
    {
        $index = Product::find($id);

        if($index == '')
        {
        	return redirect()->back()->with('failed', 'Data not exist');
        }

        if($index->version != $request->version)
        {
        	return redirect()->back()->with('failed', 'Failed to update, someone already updated, check before update');
        }

    	$message = [
            'name.required'                => 'This Field Required.',
            'image_logo.image'             => 'Image file only.',
            'image_logo_height.numeric'    => 'This Field Numeric only.',
            'image_product.image'          => 'Image file only.',
            'image_product_height.numeric' => 'This Field Numeric only.',
            'short_description.required'   => 'This Field Required.',
            'description.required'         => 'This Field Required.',
        ];

        $validator = Validator::make($request->all(), [
            'name'                 => 'required',
            'image_logo'           => 'image',
            'image_logo_height'    => 'numeric|nullable',
            'image_product'        => 'image',
            'image_product_height' => 'numeric|nullable',
            'short_description'    => 'required',
            'description'          => 'required',
        ], $message);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $index->name                 = $request->name;
        $index->image_logo_height    = $request->image_logo_height;
        $index->image_product_height = $request->image_product_height;
        $index->short_description    = $request->short_description;
        $index->description          = $request->description;

        $index->flag_publish = $request->flag_publish;
        $index->id_updated   = Auth::id();
        $index->version      = $request->version + 1;

    	if ($request->hasFile('image_logo'))
        {
            $pathSource = 'upload/product/logo/';
            $image      = $request->file('image_logo');
            $filename   = time() . '-' . $image->getClientOriginalName();
            if($image->move($pathSource, $filename))
            {
                if($index->image_logo != null)
                {
                    File::delete($index->image_logo);
                }
                $index->image_logo = $pathSource . $filename;
            }
        }

        if ($request->hasFile('image_product'))
        {
            $pathSource = 'upload/product/';
            $image     = $request->file('image_product');
            $filename   = time() . '-' . $image->getClientOriginalName();
            if($image->move($pathSource, $filename))
            {
                if($index->image_product != null)
                {
                    File::delete($index->image_product);
                }
                $index->image_product = $pathSource . $filename;
            }
        }

        $index->save();

    	return redirect()->route('backend.product')->with('success', 'Data has been updated');
    }

    public function delete(Request $request)
    {
    	if(Product::find($request->id))
		{
			Product::destroy($request->id);

	        return redirect()->back()->with('success', 'Data has been deleted');
		}
		else
		{
			return redirect()->back()->with('failed', 'Data not exist');
		}
        
    }

    public function action(Request $request)
    {
        if ($request->action == 'delete' && Auth::user()->can('delete-inbox')) {
            Product::destroy($request->id);
            return redirect()->back()->with('success', 'Data Has Been Deleted');
        }
        else if($request->action == 'publish')
    	{
    		$index = Product::whereIn('id', $request->id)->update(['flag_publish' => 1]);
            return redirect()->back()->with('success', 'Data has been set publish');
    	}
    	else if($request->action == 'unpublish')
    	{
    		$index = Product::whereIn('id', $request->id)->update(['flag_publish' => 0]);
            return redirect()->back()->with('success', 'Data has been set unpublish');
    	}

        return redirect()->back()->with('success', 'Access Denied');
    }

    public function publish(Request $request)
    {
        $index = Product::find($request->id);

        if ($index->flag_publish == 0)
        {
            $index->flag_publish = 1;
            $index->save();
            return redirect()->back()->with('success', 'Data has been set publish');
        } 
        else if ($index->flag_publish == 1)
        {
            $index->flag_publish = 0;
            $index->save();
            return redirect()->back()->with('success', 'Data has been set unpublish');
        }
    }
}
