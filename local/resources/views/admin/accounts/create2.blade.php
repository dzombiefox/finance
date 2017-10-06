@extends('layouts.app')

@section('content')
<script type="text/javascript">
function enableDetails(){
    $('#destiny').select2('enable', true);  
    $('#category').select2('enable', true); 
    $('#item').select2('enable', true); 
    // $("#at").prop('disabled', false);  
    $("#acn").prop('disabled', false); 
    $("#tr").prop('disabled', false);   
    $("#debit").prop('disabled', false);  
    $("#credit").prop('disabled', false);
}

$(document).ready(function(){
 $('#item option[value="3"]').prop('selected', true);
 disableAll();
$("#category").select2();
$("#item").select2();
$("#destiny").select2();
 var frm = $('#form-save');
 var detail= $('#form-detail');
     frm.submit(function(e) {
      var account_date=$("#account_date").val();
      var at=$("#at").val();
                        if(account_date==""){
                        $(".warning").html('<div class="alert alert-danger">Date empty !!</div>');
                        $("#account_date").focus();
                        }
                        else if(at==""){
                           $(".warning").html('<div class="alert alert-danger">Account Total empty !!</div>');
                        $("#at").focus();
                        }
                        else{
                           $.ajax({
                                    type: frm.attr('method'),
                                    url: frm.attr('action'),
                                    data: frm.serialize(),
                                    success: function (data) {
                                        $("#at").attr("disabled", 'disabled');;  
                                        $("#id").val(data);
                                        // $("#at").val("");                                        
                                        $("#an").prop('disabled', true);
                                        $("#account_date").prop('disabled', true);
                                        $("#saveac").prop('disabled', true);
                                        $("#savedt").removeAttr('disabled');
                                        $('#accbank').select2('enable', false);

                                         enableDetails();
                                         $(".warning").html('<div class="alert alert-success">Success Add Account</div>');
                                    }
                                });
                         }
                                        e.preventDefault();
            });

    detail.submit(function(e){
        var acn=$("#acn").val();
        var tra=$("#tr").val();
        var debit=$("#debit").val();
        var credit=$("#credit").val();
        var item=$("#item option:selected").text();
        var category=$("#category option:selected").text();
        var destiny=$("#destiny option:selected").text();
        var deb=debit.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
        var cre=credit.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
        var data=detail.serialize();  
        var acn=$("#acn").val();
        var tr=$("#tr").val();
        var debit=$("#debit").val();
        var credit=$("#credit").val();
        if(acn==""){
        $("#acn").focus();          
        }
        else if(tr==""){
          $("#tr").focus();
        }
        else if(debit==""){
          $("#debit").focus();
        }
        else if(credit==""){
          $("#credit").focus();
        }
        else{
              $.ajax({
                        type: detail.attr('method'),
                        url: detail.attr('action'),
                        data: detail.serialize(),
                        success: function (data) {                                                                     
                        $('#detailTable').append('<tr><td>'+acn+'</td><td>'+tra+'</td><td>'+deb+'</td><td>'+cre+'</td><td>'+item+'</td><td>'+category+'</td><td>'+destiny+'</td></tr>');
                        $("#acn").val("");
                        $("#tra").val("");
                        $("#debit").val("");
                        $("#credit").val("");
                        $("#tr").val("");
                       }

 
       
    });
            }
e.preventDefault();  
  });
  });

</script>
<div class="container">

<ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="{{url('admin/accounts')}}">Data Account</a></li>
  <li class="active">Create Account</li>
</ol>
<br>
            <div class="warning"></div>

<div class="col-sm-12">
                  <div class="panel panel-primary">
                     
                      <div class="panel-body">
   
         <a  class="btn btn-danger btn-custom pull-right" title="Edit Account" id="create">Create</a>
    

    {!! Form::open(['url' => '/admin/accounts', 'class' => 'form-horizontal custom-form','id' => 'form-save', 'files' => true]) !!}
   
 <div class="form-group ">
 
   <div class="col-sm-10">
    <div class="row">
    <div class="col-sm-4">
        {!! Form::text('account_date', null, ['class' => 'form-control','id'=>'account_date','placeholder'=>'Date','readonly']) !!}
     </div>
        <div class="col-sm-4">
          <select style="width: 100%" name="accbank_id" id="accbank">
            @foreach($accbank as $accbank)
              <option value="{{$accbank->accbank_id}}">{{
wordwrap($accbank->reknumber,3,".",true) 

              }}-{{$accbank->accbanks_desc}}</option>
            @endforeach
          </select>
         </div>
     <!--<div class="col-sm-4">
        {!! Form::text('account_number', null, ['class' => 'form-control','id'=>'an','placeholder'=>'Account Number']) !!}
     </div>
      -->
     <div class="col-sm-4 ">
      {!! Form::text('account_total', null, ['class' => 'form-control','id'=>'at','placeholder'=>'Account Total']) !!}
     </div>
     <!--nested col-sm-3-->


      
     </div><!-- /.form-group > .row -->
    </div><!-- /.col-sm-9 -->
     <div class="form-group">
   <div class="col-sm-offset-3 col-sm3">
    {!! Form::submit('Save', ['class' => 'btn btn-primary btn-custom','id'=>'saveac']) !!}
    </div><!-- /.col-sm-offset-3 col-sm-9 -->
   </div>
   </div>

               
{!! Form::close() !!}


 

{!! Form::open(['url' => '/admin/det-accounts', 'class' => 'form-horizontal custom-form ', 'id'=>'form-detail','files' => true]) !!}
<div class="row">

    <div class="col-md-12">
        <div class="panel panel-blue">
            <div class="panel-heading"><h4>Detail Account</h4></div>
            <div class="panel-body">
<input type="hidden" id="id" name="account_id"/>
 <div class="form-group ">
  
   <div class="col-sm-12 form-group-sm ">
     <div class="row">     
<div class="col-sm-4">
<label for="focusedinput" class="col-sm-5 control-label">Destination</label>

          <select style="width: 100%" name="destination_id" id="destiny">
            @foreach($destination as $destination)
              <option value="{{$destination->destination_id}}">

              {{$destination->destination_name}}</option>
            @endforeach
          </select>
         </div>
     <!--nested col-sm-3-->
     
     <div class="col-sm-4">
     <label for="focusedinput" class="col-sm-5 control-label">Category</label>
          <select style="width: 100%" name="category_id" id="category">
            @foreach($category as $category)
              <option value="{{$category->category_id}}">

              {{$category->category_name}}</option>
            @endforeach
          </select>
         </div>

     <div class="col-sm-4">
     <label for="focusedinput" class="col-sm-5 control-label">Option</label>
          <select style="width: 100%" name="item_id" id="item">
            @foreach($item as $item)
              <option value="{{$item->item_id}}">

              {{$item->item_name}}</option>
            @endforeach
          </select>
         </div>  
     
</div> 
    <br>
<div class="row">
     <div class="col-sm-4 ">
     <label for="focusedinput" class="col-sm-5 control-label">Name</label>
         {!! Form::text('detaccount_name', null, ['class' => 'form-control','id'=>'acn','placeholder'=>'Account Name']) !!}
     </div>

          <div class="col-sm-3  ">
 <label for="focusedinput" class="col-sm-5 control-label">TR/BG</label>
      {!! Form::text('detaccount_tr', null, ['class' => 'form-control','id'=>'tr','placeholder'=>'tr/bg']) !!}
     </div>
 <div class="col-sm-2  ">
 <label for="focusedinput" class="col-sm-5 control-label">Debit</label>
      {!! Form::text('debit', null, ['class' => 'form-control','id'=>'debit','placeholder'=>'Debit']) !!}
     </div>
     <div class="col-sm-2 ">
      <label for="focusedinput" class="col-sm-5 control-label">Kredit</label>
      {!! Form::text('credit', null, ['class' => 'form-control','id'=>'credit','placeholder'=>'Kredit']) !!}
     </div>
   <div class="col-sm-1">
     <label for="focusedinput" class="col-sm-5 control-label">&nbsp;</label>
    {!! Form::submit('Save', ['class' => 'btn  btn-primary btn-custom pull-right','id'=>'savedt']) !!}
    </div><!-- /.col-sm-offset-3 col-sm-9 -->
   
 </div>
    </div><!-- /.col-sm-9 -->
</div>

        </div>
    </div>
</div>

      
    {!! Form::close() !!}
 
  
<table class="table table-bordered table-condensed " id="detailTable">
<thead>
<th>Account Name</th>
<th>TR/BG</th>
<th>Debit</th>
<th>Kredit</th>
<th>Option</th>
<th>Category</th>
<th>Destination</th>
</thead>
</table>

</div>

</div>
</div>
</div>

 
@endsection

