<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\models\Bank;
use Illuminate\Http\Request;
use Session;
use DB;
use Auth;
class BanksController extends Controller
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
          $banks=DB::table('banks')
        ->join('users','users.id','=','banks.user_id')
        ->get();

       //return $banks;
        return view('admin.banks.index', compact('banks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.banks.create');
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
        Bank::create($requestData);

      //  Session::flash('flash_message', 'Bank added!');

        return redirect('admin/banks');//
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
        $bank = Bank::findOrFail($id);
return view('admin.banks.show', compact('bank'));
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
        $bank = Bank::findOrFail($id);

        return view('admin.banks.edit', compact('bank'));
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
        
        $bank = Bank::findOrFail($id);
        $bank->update($requestData);

        Session::flash('flash_message', 'Bank updated!');

        return redirect('admin/banks');
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
        Bank::destroy($id);

        Session::flash('flash_message', 'Bank deleted!');

        return redirect('admin/banks');
    }
}
