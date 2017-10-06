@extends('layouts.app')

@section('content')

<div class="container">
 <ol class="breadcrumb">
                <li><a href="index.htm">Home</a></li>
                <li><a href="{{url('admin/accounts')}}">Accounts</a></li>
                <li class="active">Detail Account</li>
            </ol><br>
 <div class="col-sm-12">
                  <div class="panel panel-primary">
                     
                      <div class="panel-body">      
                        <a href="{{ url('admin/accounts/' . $account->account_id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Account"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['admin/accounts', $account->account_id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Account',
                    'onclick'=>'return confirm("Confirm delete?")'
            ))!!}
        {!! Form::close() !!}
    </h1>
   <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover table-condensed" id="detailTable">
            <thead>
                <tr>
                    <th ></th>
                    <th>Date</th>
                    <th>A/C No</th>
                    <th> Account Name </th>
                    <th> Account Tr/Bg </th>
                    <th> Debit </th>
                    <th> Credit </th>
                    <th> Destination</th>
                    <th> Category</th>
                    <th> Option</th>
                   <th>Account Total</th>
                </tr>
            </thead>
            <tbody>
             <tr>
             <td>#</td>
             <td><strong>{{$account->account_date}}</strong></td>
             <td>{{ wordwrap($account->reknumber,3,".",true) }}-{{$account->accbanks_desc}}</td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>

             <td>{{ number_format($account->account_total,2,',','.') }} </td>
             </tr>
<?php 
$totalDebit=0;
$totalCredit=0;
?>  
             {{-- */$x=0;/* --}}
            @foreach($detaccounts as $item)
            <?php 
$totalDebit+=$item->debit;
$totalCredit+=$item->credit; 
?>
             {{-- */$x++;/* --}}
                <tr>

                  <td>{{ $x }}</td>
                  <td></td>
                  <td>{{ $item->detaccount_name }}</td>
                  <td>{{ $item->detaccount_tr }}</td>
                  <td>{{ number_format($item->debit,2,',','.')}}</td>
                  <td>{{ number_format($item->credit,2,',','.')}}</td>
                  <td>{{ $item->destination_name }}</td>
                  <td>{{ $item->category_name }}</td>
                  <td>{{ $item->item_name }}</td>
                  <td></td>
                  <td></td>    
                </tr>
            @endforeach
<tr>

<td colspan="11" style="text-align: right"><font style="color:red;"><strong>{{number_format($item->account_total+($totalDebit-$totalCredit),2,',','.')}}</strong></font></td>
</tr>
            </tbody>
        </table>
       </div>
       </div>
       </div>
    </div>
</div>

@endsection
