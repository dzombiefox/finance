<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\models\Destination;
use Illuminate\Http\Request;
use Session;
use DB;
USE Auth;
class DestinationsController extends Controller
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
          $destinations=DB::table('destinations')
        ->join('users','users.id','=','destinations.user_id')
        ->get();

       return view('admin.destinations.index', compact('destinations'));
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.destinations.create');
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
        $requestData=array_merge($requestData, array("user_id"=>$user));        
        Destination::create($requestData);

        Session::flash('flash_message', 'Destination added!');

        return redirect('admin/destinations');
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
        $destination = Destination::findOrFail($id);

        return view('admin.destinations.show', compact('destination'));
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
        $destination = Destination::findOrFail($id);

        return view('admin.destinations.edit', compact('destination'));
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
        
        $destination = Destination::findOrFail($id);
        $destination->update($requestData);

        Session::flash('flash_message', 'Destination updated!');

        return redirect('admin/destinations');
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
        Destination::destroy($id);

        Session::flash('flash_message', 'Destination deleted!');

        return redirect('admin/destinations');
    }
}
