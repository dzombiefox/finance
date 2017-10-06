<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\Accbank;
use App\models\Account;
use App\models\DetAccount;
use App\models\Item;
use App\models\Destination;
use App\models\Category;
use Illuminate\Http\Request;
use Session;
use Input;
use View;
use DB;
use Auth;
use Illuminate\Support\Facades\Redirect;
class AccountsController extends Controller
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
    function viewDetail(){
        $accounts="ok";
       return view('admin.accounts.createDetail', compact('accounts'));
    

    }
    public function index()
    {
        //$accounts = Account::paginate(25);
        $accounts=DB::table('accounts')
        ->join('accbanks','accbanks.accbank_id','=','accounts.accbank_id')
        ->join('users','users.id','=','accounts.users_id')
        ->get();

     return view('admin.accounts.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */


    public function create()
    {
        $category=Category::all(['category_id','category_name']);
        $item=Item::all(['item_id','item_name']);
        $destination=Destination::all(['destination_id','destination_name']);
        $accbank=Accbank::all(['accbank_id','reknumber','accbanks_desc']);
        return view('admin.accounts.create',compact('accbank','category','item','destination'));
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
        $user=Auth::user()->id;   
        $requestData = $request->all();
        $requestData =array_merge($requestData, array("users_id"=>$user));
         Account::create($requestData);
         $id=DB::getPdo()->lastInsertId();
         return $id;
     //return $requestData;
     //   $ko=Input::get('account_number');
      //  Account::create($requestData);
   //   $acco = Account::findOrFail(DB::getPdo()->lastInsertId());
      
//viewDetail();
        //Account::create($requestData);

       // Session::flash('flash_message', 'Account added!');
       
     //  return view('admin.accounts.createDetail',compact('account'));
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
        $account = DB::table('accounts')
        ->join('accbanks','accbanks.accbank_id','=','accounts.accbank_id')
        ->where('accounts.account_id','=',$id)->first();
          $idDetail=$account ->account_id;
          $detaccounts=DB::table('detaccounts')
        ->join('accounts','accounts.account_id','=','detaccounts.account_id')
        ->join('accbanks','accbanks.accbank_id','=','accounts.accbank_id')
        ->where('detaccounts.account_id','=',$idDetail)
        ->join('items','items.item_id','=','detaccounts.item_id')
        ->join('destinations','destinations.destination_id','=','detaccounts.destination_id')
        ->join('categorys','categorys.category_id','=','detaccounts.category_id')
        ->get();
       return view('admin.accounts.show', compact('account','detaccounts'));
   
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
        $category=Category::all(['category_id','category_name']);
        $item=Item::all(['item_id','item_name']);
        $destination=Destination::all(['destination_id','destination_name']);
        $accbank=Accbank::all(['accbank_id','reknumber','accbanks_desc']);
        //$account = Account::findOrFail($id);
        $account = DB::table('accounts')
            ->join('accbanks','accbanks.accbank_id','=','accounts.accbank_id')
            ->where('accounts.account_id','=',$id)->first();

      // $idDetail=$account ->account_id;
       $idDetail=$account ->account_id;
       $detaccounts=DB::table('detaccounts')
        ->join('accounts','accounts.account_id','=','detaccounts.account_id')
        ->join('accbanks','accbanks.accbank_id','=','accounts.accbank_id')
        ->join('items','items.item_id','=','detaccounts.item_id')
        ->join('destinations','destinations.destination_id','=','detaccounts.destination_id')
        ->join('categorys','categorys.category_id','=','detaccounts.category_id')
        ->where('detaccounts.account_id','=',$idDetail)
            ->get();


        return view('admin.accounts.edit', compact('account','accbank','detaccounts','category','item','destination'));
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
        $account = Account::findOrFail($id);
        $account->update($requestData);
        Session::flash('flash_message', 'Account updated!');
        return Redirect::back()->with('message','Operation Successful !');
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
        Account::destroy($id);

        Session::flash('flash_message', 'Account deleted!');

        return redirect('admin/accounts');
    }

    public function getData($date1,$date2){
     // return $date2;
$accounts =DB::table('accounts')
        ->join('accbanks','accbanks.accbank_id','=','accounts.accbank_id')
        ->join('users','users.id','=','accounts.users_id')
        ->whereBetween('account_date', [$date1, $date2])           
        ->get();
$detaccounts=DB::table('detaccounts')
        ->join('accounts','accounts.account_id','=','detaccounts.account_id')
        ->join('accbanks','accbanks.accbank_id','=','accounts.accbank_id')
        ->join('items','items.item_id','=','detaccounts.item_id')
        ->join('destinations','destinations.destination_id','=','detaccounts.destination_id')
        ->join('categorys','categorys.category_id','=','detaccounts.category_id')
        ->get();       
       
return view("/admin/accounts/reportData",compact('accounts','detaccounts'));

   }
public function getReportAll($date1,$date2){

$totalAccount=DB::table('accounts')
                ->select(DB::raw('SUM(account_total) as total_account'))
                ->first();

$cashIn=DB::table('detaccounts')
                ->select('item_name','category_name', DB::raw('SUM(debit) as total_debit'))
                ->join('accounts','accounts.account_id','=','detaccounts.account_id')
                ->join('accbanks','accbanks.accbank_id','=','accounts.accbank_id')
                ->join('items','items.item_id','=','detaccounts.item_id')
                ->join('destinations','destinations.destination_id','=','detaccounts.destination_id')
                ->join('categorys','categorys.category_id','=','detaccounts.category_id')
                ->whereBetween('account_date', [$date1, $date2])
                ->groupBy('detaccounts.item_id','detaccounts.category_id')          
                ->get();
$cashOut=DB::table('detaccounts')
                ->select('item_name','category_name', DB::raw('SUM(credit) as total_credit'))
                ->join('accounts','accounts.account_id','=','detaccounts.account_id')
                ->join('accbanks','accbanks.accbank_id','=','accounts.accbank_id')
                ->join('items','items.item_id','=','detaccounts.item_id')
                ->join('destinations','destinations.destination_id','=','detaccounts.destination_id')
                ->join('categorys','categorys.category_id','=','detaccounts.category_id')
                ->whereBetween('account_date', [$date1, $date2])
                ->groupBy('detaccounts.item_id','detaccounts.category_id')          
                ->get();
           // return $cashOut;
            return view("/admin/accounts/reportAll",compact('totalAccount','cashIn','cashOut'));
//return $totalAccount;
}
public function report(){
     return view("/admin/accounts/report");

}


public function getDebit($id){
    $query=DB::table('changes')
    ->where('detaccount_id','=',$id)
    ->where('options','=',0)->get();
    
    return $query;
}
public function getCredit($id){
    $query=DB::table('changes')
    ->where('detaccount_id','=',$id)
    ->where('options','=',1)->get();
    
    return $query;
}
}
