@extends('layouts.app')

@section('content')
<script type="text/javascript">
	$(document).ready(function(){
		$("#date1").datepicker({ dateFormat: 'yy-mm-dd' });
		$("#date2").datepicker({ dateFormat: 'yy-mm-dd' });

$("#view").click(function(){
		var date1=$("#date1").val();
		var date2=$("#date2").val();
		var option=$("#option").val();
		if(date1==""){
			$("#date1").focus();
		}
		else if(date2==""){
			$("#date2").focus()
		}
		else{
		if(option=="1"){
		document.location='getData/'+date1+'/'+date2+'';
			}
			else{
		document.location='getReportAll/'+date1+'/'+date2+'';
			}
		}
		});
	});
</script>
<div class="container">

<ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Report</a></li>
  <li class="active">Data</li>
</ol>
<br>
<div class="col-sm-12">
                  <div class="panel panel-primary">                     
                      <div class="panel-body" style="height:400
                  <div class="col-sm-12">
    <div class="row">
    <div class="col-sm-4">
        {!! Form::text('account_date', null, ['class' => 'form-control','id'=>'date1','placeholder'=>'Date','readonly']) !!}
     </div>
         <div class="col-sm-4">
        {!! Form::text('account_date', null, ['class' => 'form-control','id'=>'date2','placeholder'=>'Date','readonly']) !!}
     </div>

      <div class="col-sm-3">
          <select style="width: 100%"  class="form-control" id="option">
          <option value="0">Report All</option>
          <option value="1">Report Monthly</option>
          </select>
          </select>
     </div>
     <div class="col-sm-1">
    
   
    {!! Form::submit('View', ['class' => 'btn btn-primary btn-custom','id'=>'view']) !!}
  
 
     </div>
     </div>
                      </div>

                  </div>
</div>                      
</div>
@endsection