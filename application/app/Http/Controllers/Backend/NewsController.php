<?php

namespace App\Http\Controllers\Backend;

use App\Models\News;
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

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
	{
    	return view('backend.news.index', compact('request'));
	}

    public function datatables(Request $request)
    {
        $f_publish   = $this->filter($request->f_publish);

        $index = News::select('*');

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

            if(Auth::user()->can('edit-news'))
            {
                $html .= '
                    <a href="' . route('backend.news.edit', ['id' => $index->id]) . '" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
                ';
            }

            if(Auth::user()->can('delete-news'))
            {
                $html .= '
                    <button class="btn btn-xs btn-danger delete-news" data-toggle="modal" data-target="#delete-news" data-id="'.$index->id.'"><i class="fa fa-trash"></i></button>
                ';
            }

            if (Auth::user()->can('publish-news'))
            {
                if($index->flag_publish)
                {
                    $html .= '
                        <button class="btn btn-xs btn-dark publish-news" data-toggle="modal" data-target="#publish-news" data-id="'.$index->id.'">Unpublish</button>
                    ';
                }
                else
                {
                    $html .= '
                        <button class="btn btn-xs btn-success publish-news" data-toggle="modal" data-target="#publish-news" data-id="'.$index->id.'">Publish</button>
                    ';
                }
            }

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
    	return view('backend.news.create');
    }

	public function store(Request $request)
    {
        $message = [
            'slug_url.required' => 'This Field Required.',
            'slug_url.unique' => 'Slug Url already exist.',
            'title.required' => 'This Field Required.',
            'content.required' => 'This Field Required.',
            'author.required' => 'This Field Required.',
            'photo.image' => 'Image file only.',
        ];

        $validator = Validator::make($request->all(), [
            'slug_url' => 'required|unique:news,slug_url',
            'title'    => 'required',
            'content'  => 'required',
            'author'   => 'required',
            'photo'    => 'image',
        ], $message);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


    	$index = new News;

        $index->slug_url     = $request->slug_url;
        $index->title        = $request->title;
        $index->description  = $request->description;
        $index->content      = $request->content;
        $index->photo        = $request->photo;
        $index->flag_publish = $request->flag_publish;
        $index->author       = $request->author;
        $index->id_created   = Auth::id();
        $index->version      = 1;

        if ($request->hasFile('photo'))
        {
            $pathSource = 'upload/news/';
            $image      = $request->file('photo');
            $filename   = time() . '-' . $image->getClientOriginalName();
            if($image->move($pathSource, $filename))
            {
                $index->photo = $pathSource . $filename;
            }
        }

        $index->meta_title       = $request->meta_title;
        $index->meta_description = $request->meta_description;
        $index->meta_url         = $request->meta_url;

        if ($request->hasFile('meta_image'))
        {
            $pathSource = 'upload/news/meta/';
            $image2     = $request->file('meta_image');
            $filename   = time() . '-' . $image2->getClientOriginalName();
            if($image2->move($pathSource, $filename))
            {
                $index->meta_image = $pathSource . $filename;
            }
        }

        $index->save();

    	return redirect()->route('backend.news')->with('success', 'Data has been added');
    }

    public function edit($id)
    {
        $index = News::find($id);

        if($index == '')
        {
        	return redirect()->back()->with('failed', 'Data not exist');
        }

    	return view('backend.news.edit')->with(compact('index'));
    }

    public function update($id, Request $request)
    {
        $index = News::find($id);

        if($index == '')
        {
        	return redirect()->back()->with('failed', 'Data not exist');
        }

        if($index->version != $request->version)
        {
        	return redirect()->back()->with('failed', 'Failed to update, someone already updated, check before update');
        }

    	$message = [
            'slug_url.required' => 'This Field Required.',
            'slug_url.unique' => 'Slug Url already exist.',
            'title.required' => 'This Field Required.',
            'content.required' => 'This Field Required.',
            'author.required' => 'This Field Required.',
            'photo.image' => 'Image file only.',
        ];

        $validator = Validator::make($request->all(), [
            'slug_url' => 'required|unique:news,slug_url,'.$id,
            'title'    => 'required',
            'content'  => 'required',
            'author'   => 'required',
            'photo'    => 'image',
        ], $message);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $index->slug_url     = $request->slug_url;
        $index->title        = $request->title;
        $index->description  = $request->description;
        $index->content      = $request->content;
        $index->photo        = $request->photo;
        $index->flag_publish = $request->flag_publish;
        $index->author       = $request->author;
        $index->id_updated   = Auth::id();
        $index->version      = $request->version + 1;

        if (isset($request->remove_photo))
        {
            if($index->photo != null)
            {
                File::delete($index->photo);
                $index->photo = null;
            }
        }
        else
        {
        	if ($request->hasFile('photo'))
	        {
	            $pathSource = 'upload/news/';
	            $image      = $request->file('photo');
	            $filename   = time() . '-' . $image->getClientOriginalName();
	            if($image->move($pathSource, $filename))
	            {
	                if($index->photo != null)
	                {
	                    File::delete($index->photo);
	                }
	                $index->photo = $pathSource . $filename;
	            }
	        }
        }
        
        $index->meta_title       = $request->meta_title;
        $index->meta_description = $request->meta_description;
        $index->meta_url         = $request->meta_url;

        if (isset($request->remove_meta_image))
        {
            if($index->meta_image != null)
            {
                File::delete($index->meta_image);
                $index->meta_image = null;
            }
        }
        else
        {
            if ($request->hasFile('meta_image'))
            {
                $pathSource = 'upload/news/meta/';
                $image2     = $request->file('meta_image');
                $filename   = time() . '-' . $image2->getClientOriginalName();
                if($image2->move($pathSource, $filename))
                {
                    if($index->meta_image != null)
                    {
                        File::delete($index->meta_image);
                    }
                    $index->meta_image = $pathSource . $filename;
                }
            }
        }

        $index->save();

    	return redirect()->route('backend.news')->with('success', 'Data has been updated');
    }

    public function delete(Request $request)
    {
    	if(News::find($request->id))
		{
			News::destroy($request->id);

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
            News::destroy($request->id);
            return redirect()->back()->with('success', 'Data Has Been Deleted');
        }
        else if($request->action == 'publish')
    	{
    		$index = News::whereIn('id', $request->id)->update(['flag_publish' => 1]);
            return redirect()->back()->with('success', 'Data has been set publish');
    	}
    	else if($request->action == 'unpublish')
    	{
    		$index = News::whereIn('id', $request->id)->update(['flag_publish' => 0]);
            return redirect()->back()->with('success', 'Data has been set unpublish');
    	}

        return redirect()->back()->with('success', 'Access Denied');
    }

    public function publish(Request $request)
    {
        $index = News::find($request->id);

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
