<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\models\Owner;
use Illuminate\Http\Request;
use Session;
use Auth;
use DB;

class OwnersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
        public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $owners=DB::table('owners')
        ->join('users','users.id','=','owners.user_id')
        ->get();
       

      //return $owners;
        return view('admin.owners.index', compact('owners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.owners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $user =Auth::user()->id;        
        $requestData = $request->all();        
        $requestData=array_merge($requestData, array("user_id"=>$user));;
        Owner::create($requestData);

        Session::flash('flash_message', 'Owner added!');
//return $requestData;
   return redirect('admin/owners');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $owner = Owner::findOrFail($id);

        return view('admin.owners.show', compact('owner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $owner = Owner::findOrFail($id);

        return view('admin.owners.edit', compact('owner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $requestData = $request->all();
        
        $owner = Owner::findOrFail($id);
        $owner->update($requestData);

        Session::flash('flash_message', 'Owner updated!');

        return redirect('admin/owners');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Owner::destroy($id);

        Session::flash('flash_message', 'Owner deleted!');

        return redirect('admin/owners');
    }
}
