<?php

namespace App\Http\Controllers\Backend;

use App\Models\Inbox;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

use Validator;
use Datatables;

class InboxController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        return view('backend.inbox.index')->with(compact('request'));
    }

    public function datatables(Request $request)
    {
    	$f_read = $this->filter($request->f_read);

        $index = Inbox::select('*');

        if($f_read != '' && $f_read == 1)
        {
            $index->where('read', 1);
        }
        else if ($f_read === '0')
        {
            $index->where('read', '<>', 1);
        }

        $datatables = Datatables::of($index);

        $datatables->addColumn('action', function ($index) {
            $html = '';

            if(Auth::user()->can('view-inbox'))
            {
                $html .= '
                    <a href="' . route('backend.inbox.view', ['id' => $index->id]) . '" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>
                ';
            }

            if(Auth::user()->can('delete-inbox'))
            {
                $html .= '
                    <button class="btn btn-xs btn-danger delete-inbox" data-toggle="modal" data-target="#delete-inbox" data-id="'.$index->id.'"><i class="fa fa-trash"></i></button>
                ';
            }

            if (Auth::user()->can('read-inbox'))
            {
                if($index->read)
                {
                    $html .= '
                        <button class="btn btn-xs btn-dark unread-inbox" data-toggle="modal" data-target="#unread-inbox" data-id="'.$index->id.'">Set Unread</button>
                    ';
                }
                else
                {
                    $html .= '
                        <button class="btn btn-xs btn-info read-inbox" data-toggle="modal" data-target="#read-inbox" data-id="'.$index->id.'">Set Read</button>
                    ';
                }
            }
                
            return $html;
        });

        $datatables->editColumn('created_at', function ($index) {
            $html = $index->created_at ? date('d/m/Y H:i:s', strtotime($index->created_at)) : '';

            return $html;
        });

        $datatables->editColumn('read', function ($index) {
            $html = '';
            if($index->read)
            {
                $html .= '
                    <span class="label label-success">Readed</span>
                ';
            }
            else
            {
                $html .= '
                    <span class="label label-default">Unread</span>
                ';
            }
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

    public function view($id)
    {
        $index = Inbox::find($id);

        $index->read = 1;
        $index->save();

        return view('backend.inbox.view')->with(compact('index'));
    }

    public function delete(Request $request)
    {
        Inbox::destroy($request->id);

        return redirect()->back()->with('success', 'Data Has Been Deleted');
    }

    public function action(Request $request)
    {
        if ($request->action == 'delete' && Auth::user()->can('delete-inbox')) {
            Inbox::destroy($request->id);
            return redirect()->back()->with('success', 'Data Has Been Deleted');
        }
        else if($request->action == 'read')
    	{
    		$index = Inbox::whereIn('id', $request->id)->update(['read' => 1]);
            return redirect()->back()->with('success', 'Data has been set readed');
    	}
    	else if($request->action == 'unread')
    	{
    		$index = Inbox::whereIn('id', $request->id)->update(['read' => 0]);
            return redirect()->back()->with('success', 'Data has been set unread');
    	}

        return redirect()->back()->with('success', 'Access Denied');
    }

    public function read(Request $request)
    {
        $index = Inbox::find($request->id);

        if ($index->read == 0)
        {
            $index->read = 1;
            $index->save();
            return redirect()->back()->with('success', 'Data has been set readed');
        } 
        else if ($index->read == 1)
        {
            $index->read = 0;
            $index->save();
            return redirect()->back()->with('success', 'Data has been set unread');
        }
    }
}
