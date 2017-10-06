<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\Change;
use App\models\DetAccount;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
class ChangesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $changes = Change::paginate(25);

        return view('admin.changes.index', compact('changes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.changes.create');
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
        $option=$request->options;
       
        $option=$request->options;
        $data = DetAccount::findOrFail($request->detaccount_id);
        $debit=$data->debit;
        $credit=$data->credit;
        $coise=$request->choise;
        if($option==0){
            if($coise=="+"){
                $result=$debit+$request->value;
            }
            else{
                $result=$debit-$request->value;
            }
            $array= array('debit' => $result);
            $data->update($array);
                       }
        else{
                 if($coise=="+"){
                    $result=$credit+$request->value;
                }
                else{
                    $result=$credit-$request->value;
                }
                $array= array('credit' => $result);
                $data->update($array);

            }
        // $result=$debit.$coise.$request->value;
        Change::create($requestData);
        return Redirect::back();

     
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
        $change = Change::findOrFail($id);

        return view('admin.changes.show', compact('change'));
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
        $change = Change::findOrFail($id);

        return view('admin.changes.edit', compact('change'));
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
        
        $change = Change::findOrFail($id);
        $change->update($requestData);

        Session::flash('flash_message', 'Change updated!');

        return redirect('admin/changes');
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
         $change = Change::findOrFail($id);
         $choise=$change->choise;
         $value=$change->value;
         $opt=$change->options;
         $idDet=$change->detaccount_id;

         $data=DetAccount::findOrFail($idDet);
         $debit=$data->debit;
         $credit=$data->credit;

         if($opt==0){
            if($choise=="+"){
                $result=$debit-$value;
            }
            else{
                $result=$debit+$value;
            }
            $array= array('debit' => $result);
            $data->update($array);

         }
         else{
              if($choise=="+"){
                $result=$credit-$value;
            }
            else{
                $result=$credit+$value;
            }
            $array= array('credit' => $result);
            $data->update($array);

         }
         Change::destroy($id);

        // Session::flash('flash_message', 'Change deleted!');

        // return redirect('admin/changes');
    }
}
