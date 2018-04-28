<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
class CoopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // if(!Right::check('Partner', 'l'))
        // {
        //     return view('permissions.no');
        // }
        $data['coops'] = DB::table('coops')
            ->where('active',1)
            ->paginate(18);
        return view('coops.index', $data);
    }
    // load create form
    public function create()
    {
        // if(!Right::check('Partner', 'i'))
        // {
        //     return view('permissions.no');
        // }
        return view('coops.create');
    }
    // save new category
    public function save(Request $r)
    {
        $file_name = '';
        if($r->logo) {
            $file = $r->file('logo');
            $file_name = $file->getClientOriginalName();
            $destinationPath = 'uploads/coops/';
            $file->move($destinationPath, $file_name);
        }
        $data = array(
            'name' => $r->name,
            'address' => $r->address,
            'contact' => $r->contact,
            'logo' => $file_name,
            'sequence' => $r->sequence,
            'url' => $r->url
        );
        
        $i = DB::table('coops')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', 'New cooperated company has been created successfully!');
            return redirect('/coop/create');
        }
        else
        {
            $r->session()->flash('sms1', 'Fail to create new cooperated company!');
            return redirect('/coop/create')->withInput();
        }
    }
    // delete
    public function delete($id)
    {
        // if(!Right::check('Partner', 'd'))
        // {
        //     return view('permissions.no');
        // }
        DB::table('coops')->where('id', $id)->update(['active'=>0]);
        return redirect('/coop');
    }
    public function edit($id)
    {
        // if(!Right::check('Partner', 'u'))
        // {
        //     return view('permissions.no');
        // }
        $data['partner'] = DB::table('coops')
            ->where('id', $id)->first();
        return view('coops.edit', $data);
    }
    // update partner 
    public function update(Request $r)
    {
        $data = array(
                'name' => $r->name,
                'address' => $r->address,
                'contact' => $r->contact,
                'sequence' => $r->sequence,
                'url' => $r->url
            );
        if ($r->logo) {
            $file = $r->file('logo');
            $file_name = $file->getClientOriginalName();
            $destinationPath = 'uploads/coops/';
            $file->move($destinationPath, $file_name);
            $data = array(
                'logo' => $file_name
            );
        } 
        $sms = "All changes have been saved successfully.";
        $sms1 = "Fail to to save changes, please check again!";
        $i = DB::table('coops')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/coop/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/coop/edit/'.$r->id);
        }
    }
}
