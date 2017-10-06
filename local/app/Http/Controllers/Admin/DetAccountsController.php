<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\models\DetAccount;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
class DetAccountsController extends Controller
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
        $detaccounts = DetAccount::paginate(25);

        return view('admin.det-accounts.index', compact('detaccounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.det-accounts.create');
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
        
        $requestData = $request->all();
       // $debit = $request->input('debit');
        $debit =str_replace(',', '', $request->input('debit'));
        $credit =str_replace(',', '', $request->input('credit'));
        $requestData =array_merge($requestData, array("debit"=>$debit,"credit"=>$credit));
        //return $requestData;
        //$temp = array_keys($requestData);
        //return $requestData[$temp[2]];
      //  $debit=str_replace(',', '.', $form);
        DetAccount::create($requestData);

        //Session::flash('flash_message', 'DetAccount added!');

        return Redirect::back()->with('message','Operation Successful !');
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
        $detaccount = DetAccount::findOrFail($id);

        return view('admin.det-accounts.show', compact('detaccount'));
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
        $detaccount = DetAccount::findOrFail($id);

        return view('admin.det-accounts.edit', compact('detaccount'));
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
        $name=$request->name;
        $debit=str_replace(',','',$request->dbt);
        $credit=str_replace(',','',$request->crt);
        $data= array(
            'detaccount_name'=>$name,
            'debit' => $debit,
            'credit'=>$credit);
        $detaccount = DetAccount::findOrFail($request->idDet);
        $detaccount->update($data);
return Redirect::back();
        // return redirect('admin/det-accounts');
       // return  $requestData;
        // $detaccount = DetAccount::findOrFail($id);
        // $detaccount->update($requestData);

        // Session::flash('flash_message', 'DetAccount updated!');

        // return redirect('admin/det-accounts');
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
        DetAccount::destroy($id);

        Session::flash('flash_message', 'DetAccount deleted!');

        return Redirect::back()->with('message','Operation Successful !');
    }
}
