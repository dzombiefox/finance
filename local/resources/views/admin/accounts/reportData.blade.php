
@extends('layouts.app')
@section('content')

<?php 
use App\Http\Controllers\Admin\AccountsController;
?>
<div class="container">

 <ol class="breadcrumb">
                <li><a href="index.htm">Home</a></li>
                <li>Account</li>
                <li class="active">Data Account</li>
            </ol><br>
            <button class="btn btn-primary btn-xs  pull-right" onclick="jQuery('.datagrid').print()">Print</button>
<div class="panel panel-indigo">
<div class="panel-body collapse in">
<br>

<div class="datagrid">

<table class="table table-bordered  table-hover table-condensed">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Date</th>
                    <th>Account Number </th>                  
                    <th>Option</th>                  
                    <th>Destination</th>
                    <th>Tr/Bg</th>
                    <th>Account Name</th>
                    <th>Debit</th>
                    <th>Credit</th>
                    <th>Total Account</th>
                    
                </tr>
            </thead>
            <tbody>
              {{-- */$x=0;/* --}}
            @foreach($accounts as $item)
             {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x}}</td>
                    <td><strong>{{ $item->account_date }}</strong></td>
                    <td><strong>{{wordwrap($item->reknumber,3,".",true) }}-{{$item->accbanks_desc}}</strong></td>
                    <td colspan="6" ></td>
                   
                 
                    <td align="right"><strong>{{ number_format($item->account_total ,2,',','.')}}</strong></td>
                    
                </tr>



<?php 
$totalDebit=0;
$totalCredit=0;
?>              
@foreach($detaccounts as $data)
 @if($data->account_id==$item->account_id)
<?php 
$totalDebit+=$data->debit;
$totalCredit+=$data->credit; 
?>
<tr>
      <td colspan="3"></td>
      <td >{{$data->item_name}}</td>
       <td >{{$data->destination_name}}</td>
       <td >{{$data->detaccount_tr}}</td>
       <td >{{$data->detaccount_name}}</td>
       <td align="right">{{ number_format($data->debit ,2,',','.')}}</td>
       <td align="right">{{ number_format($data->credit ,2,',','.')}}</td>
        <td></td>
      </tr>
 @endif



 @endforeach
<tr>

<td colspan="10" style="text-align: right"><font style="color:red;"><strong>{{number_format($item->account_total+($totalDebit-$totalCredit),2,',','.')}}</strong></font></td>
</tr>
            @endforeach
            </tbody>
        </table>
</div>
       
       
        
</div>
</div>

</div>
@endsection
