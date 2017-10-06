<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\Bank;
use App\models\Owner;
use App\models\Accbank;
use Illuminate\Http\Request;
use Session;
use DB;
use Auth;
class AccbanksController extends Controller
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
        $accbanks = Accbank::paginate(25);

         $accbanks=DB::table('accbanks')->join('banks','accbanks.bank_id','=','banks.bank_id')
          ->join('owners','owners.owner_id','=','accbanks.owner_id')
         ->get();
         //return $accbanks;
    return view('admin.accbanks.index', compact('accbanks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $bank=Bank::all(['bank_id','bank_name']);
        $owner=owner::all(['owner_id','owner_name']);
        return view('admin.accbanks.create',compact('bank','owner'));
     
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
        $requestData = array_merge($requestData, array("users_id"=>$user));
        Accbank::create($requestData);
        Session::flash('flash_message', 'Accbank added!');

        return redirect('admin/accbanks');
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
        $accbank=DB::table('accbanks')->join('banks','accbanks.bank_id','=','banks.bank_id')
         ->join('owners','owners.owner_id','=','accbanks.owner_id')
         ->where('accbanks.accbank_id','=',$id)
         ->first();
      
        return view('admin.accbanks.show', compact('accbank'));
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
        $bank=Bank::all(['bank_id','bank_name']);
        $owner=owner::all(['owner_id','owner_name']);
        $accbank=DB::table('accbanks')->join('banks','accbanks.bank_id','=','banks.bank_id')
         ->join('owners','owners.owner_id','=','accbanks.owner_id')
         ->where('accbanks.accbank_id','=',$id)
         ->first();
          
     //return $accbanks;
     return view('admin.accbanks.edit', compact('accbank','bank','owner'));
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
        $accbank = Accbank::findOrFail($id);
        $accbank->update($requestData);

        Session::flash('flash_message', 'Accbank updated!');

        return redirect('admin/accbanks');
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
        Accbank::destroy($id);

        Session::flash('flash_message', 'Accbank deleted!');

        return redirect('admin/accbanks');
    }
}
