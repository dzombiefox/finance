@extends('layouts.app')
@section('content')
<div class="container">
<button class="btn btn-primary btn-xs  pull-right" onclick="jQuery('.panel').print()">Print</button>
<div class="panel panel-primary ">
<div class="panel-body ">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h3>Report Bank</h3>
    		</div>
    		
    	
    		
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		
    				<div class="table-responsive datagrid">
    					<table class="table table-condensed">

    						<thead>
                             <tr>
                        <td colspan="3"><label class="label label-primary" style="font-size:13px">Cash In</label></td>
                        </tr>
                                <tr>
        							<td><strong>Item</strong></td>
        							<td class="text-center"><strong>Category</strong></td>
        							<td class="text-right"><strong>Total</strong></td>
        							
                                </tr>
    						</thead>
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
    							 {{-- */$totalCashIn=0;/* --}}
    						  @foreach($cashIn as $item)
    							<tr>
    								<td>{{$item->item_name}}</td>
    								<td align="center">{{$item->category_name}}</td>
    								<td align="right"><strong>{{ number_format($item->total_debit ,2,',','.')}}</strong>
    								</td>

    								
    							</tr>
                              {{-- */$totalCashIn+=$item->total_debit;/* --}}
    							@endforeach
    							<tr bgcolor="#4f8edc" >
    								<td colspan="2"><strong><font color="white" style="font-size:13px">Total :</font></strong></td>
    								<td align="right">
                                        <font color="white" style="font-size:13px">
    								<strong>{{ number_format($totalCashIn ,2,',','.')}}</strong>
                                    </font>
    								</td>
    							</tr>
    						</tbody>
    					</table>
                        <br>
                        <table class="table table-condensed">
                            <thead>
                             <tr>
                        <td colspan="3"><label class="label label-primary" style="font-size:13px">Cash Out</label></td>
                        </tr>
                                <tr>
                                    <td><strong>Item</strong></td>
                                    <td class="text-center"><strong>Category</strong></td>
                                    <td class="text-right"><strong>Total</strong></td>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                 {{-- */$totalCashOut=0;/* --}}
                              @foreach($cashOut as $data)
                                <tr>
                                    <td>{{$data->item_name}}</td>
                                    <td align="center">{{$data->category_name}}</td>
                                    <td align="right"><strong>{{ number_format($data->total_credit ,2,',','.')}}</strong>
                                    </td>

                                    
                                </tr>
                              {{-- */$totalCashOut+=$data->total_credit;/* --}}
                                @endforeach
                                <tr bgcolor="#4f8edc" style='color:white'>
                                    <td colspan="2"> <font color="white" style="font-size:13px"><strong>Total :</strong></font></td>
                                    <td align="right"> <font color="white" style="font-size:13px"><strong>{{ number_format($totalCashOut ,2,',','.')}}</strong></font></td>
                                </tr>
                            </tbody>
                        </table>
    				</div>
    			</div>
    		


  
    </div>
    
    	
<div class="row">
    			<div class="col-xs-6">
    				<address>
    					<strong>Begining Balance:</strong><br>
    					<label class="label label-danger"><strong>{{ number_format($totalAccount->total_account ,2,',','.')}}</strong></label>
    				</address>
    			</div>
    			
    		
<div class="col-xs-6 text-right">
    				<address>
    					<strong>Ending balance:</strong><br>
    					<label class="label label-danger">
    					<strong>{{ number_format($totalCashIn+$totalAccount->total_account-$totalCashOut ,2,',','.')}}</strong></label>
<br><br>
    				</address>
    			</div>
  </div>




    </div>

    </div>

</div>

@endsection
