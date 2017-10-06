@extends('layouts.app')

@section('content')
<script type="text/javascript">
function removeDebit(id){
  $.ajax({
        url: '{{ url('/admin/changes') }}' + '/' + id,
        type:"DELETE",
        data: {_method: 'delete', _token :$('meta[name="csrf-token"]').attr('content')},
        success:function(data){
           location.reload();
        //   alert(data)
        // $('#viewDebit').modal('hide');
        }
  });
}

function removeCredit(id){
  $.ajax({
        url: '{{ url('/admin/changes') }}' + '/' + id,
        type:"DELETE",
        data: {_method: 'delete', _token :$('meta[name="csrf-token"]').attr('content')},
        success:function(data){
           location.reload();
        //   alert(data)
        // $('#viewDebit').modal('hide');
        }
  });
}
function viewDebit(id){

  // $(".value").val("");
  // $(".idDebit").val(id);

  $.ajax({
    type:"GET",
    url:"/finance/admin/getDebit/"+id,
    success:function(data){
      $("#detailDebit > tbody").html("");
        for (i in data)
         {
          var item = data[i];
          $('#detailDebit').append('<tr><td>'+item.choise+'</td><td>&nbsp;</td><td>'+item.value+'</td><td>&nbsp;</td><td><span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete DetAccount" onclick="removeDebit('+item.change_id+')" style="cursor:pointer"/></td></tr>');
                  }
       $('#viewDebit').modal('show');
    }

  });
 
}

function viewCredit(id){

  // $(".value").val("");
  // $(".idDebit").val(id);

  $.ajax({
    type:"GET",
    url:"/finance/admin/getCredit/"+id,
    success:function(data){
      $("#detailCredit > tbody").html("");
        for (i in data)
         {
          var item = data[i];
          $('#detailCredit').append('<tr><td>'+item.choise+'</td><td>&nbsp;</td><td>'+item.value+'</td><td>&nbsp;</td><td><span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete DetAccount" onclick="removeCredit('+item.change_id+')" style="cursor:pointer"/></td></tr>');
                  }
       $('#viewCredit').modal('show');
    }

  });
 
}
function editDebit(id){
  $(".value").val("");
  $(".idDebit").val(id);
  $('#editDebit').modal('show');
}
function editCredit(id){
  $(".value").val("");
  $(".idCredit").val(id);
  $('#editCredit').modal('show');
}
function modalVal(id,debit,kredit,name){
 
  $("#idDet").val(id);
  $("#dbt").val(debit);
  $("#crt").val(kredit);
  $("#name").val(name);
  $('#editValue').modal('show')
}
$(document).ready(function(){
$('#item option[value="3"]').prop('selected', true);
$('#category option[value="4"]').prop('selected', true);
  $("#category").select2();
  $("#item").select2();
  $("#destiny").select2();
   var detail= $('#form-detail');
   detail.submit(function(e){
        var acn=$("#acn").val();
        var tra=$("#tra").val();
        var debit=$("#debit").val();
        var credit=$("#credit").val();
        var option=$("#option").val();
        var destiny=$("#destiny").val();
        var data=detail.serialize();  
               $.ajax({
                        type: detail.attr('method'),
                        url: detail.attr('action'),
                        data: detail.serialize(),
                        success: function (data) {                                   
                        $('#detailTable').append('<tr><td>'+acn+'</td><td>'+tra+'</td><td>'+debit+'</td><td>'+credit+'</td><td>'+option+'</td><td>'+destiny+'</td><td>Remove</td></tr>');
                        $("#acn").val("");
                        $("#tra").val("");
                        $("#debit").val("");
                        $("#credit").val("");
                        location.reload(true)
                         }
                    });

 
    e.preventDefault();      
    });
});
 

</script>

<div class="container">

   <ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="{{url('admin/accounts')}}">Data Account</a></li>
  <li class="active">Edit Acccount</li>
</ol><br>
   <div class="col-sm-12">
                  <div class="panel panel-primary">
                     
                      <div class="panel-body">
    {!! Form::model($account, [
        'method' => 'PATCH',
        'url' => ['/admin/accounts', $account->account_id],
        'class' => 'form-horizontal',
        'files' => true,
        'id'=>'update-detail'
    ]) !!}
<input type="hidden" id="id" name="account_id" value="{{ $account->account_id}}"/>
 <div class="form-group">
 
   <div class="col-sm-10">
    <div class="row">
    <div class="col-sm-4">
        {!! Form::text('account_date', null, ['class' => 'form-control','id'=>'account_date','placeholder'=>'Date','readonly']) !!}
     </div>
        <div class="col-sm-4">

          <select name="accbank_id" id="accbank" style="width: 100%" >
            @foreach($accbank as $accbank)          


<option value="{{ $accbank->accbank_id }}"   @if($accbank->accbank_id==$account->accbank_id) selected='selected' @endif >{{
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
    {!! Form::submit('Update', ['class' => 'btn btn-primary btn-custom','id'=>'saveac']) !!}
    </div><!-- /.col-sm-offset-3 col-sm-9 -->
   </div>
   </div>
    {!! Form::close() !!}
<hr>
{!! Form::open(['url' => '/admin/det-accounts', 'class' => 'form-horizontal custom-form form-group', 'id'=>'form-detailw','files' => true]) !!}
<input type="hidden" id="id" name="account_id" value="{{ $account->account_id}}"/>

   <div class="col-sm-12">
   <div class="col-md-12">
        <div class="panel panel-blue">
            <div class="panel-heading"><h4>Detail Account</h4></div>
            <div class="panel-body">

 <div class="form-group ">
  
   <div class="col-sm-12 form-group-sm ">
     <div class="row">  
     <div class="col-sm-4">
     <label for="focusedinput" class="col-sm-5 control-label">Option</label>
          <select style="width: 100%" name="item_id" id="item">
            @foreach($item as $item)
              <option value="{{$item->item_id}}">

              {{$item->item_name}}</option>
            @endforeach
          </select>
         </div>  
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
<label for="focusedinput" class="col-sm-5 control-label">Destination</label>

          <select style="width: 100%" name="destination_id" id="destiny">
            @foreach($destination as $destination)
              <option value="{{$destination->destination_id}}">

              {{$destination->destination_name}}</option>
            @endforeach
          </select>
         </div>
     <!--nested col-sm-3-->
     



     
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
      {!! Form::text('debit', null, ['class' => 'form-control debit udebit','placeholder'=>'Debit']) !!}
     </div>
     <div class="col-sm-2 ">
      <label for="focusedinput" class="col-sm-5 control-label">Kredit</label>
      {!! Form::text('credit', null, ['class' => 'form-control credit ucredit','placeholder'=>'Kredit']) !!}
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


   </div>



      
    {!! Form::close() !!}
  
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th >No</th>               
                    <th> Detaccount Name </th>
                    <th> Detaccount Tr/Bg </th>
                    <th> Debit </th>
                    <th> Credit </th>
                    <th> Destination </th>
                    <th> Category </th>
                    <th> Option </th>
                   <th>Action</th>
                </tr>
            </thead>
            <tbody>      
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
                  <td>{{ $item->detaccount_name }}</td>
                  <td>{{ $item->detaccount_tr }}</td>
                  <td>
                  @if($item->debit==0)
                  0
                  @endif
                  @if($item->debit!=0)
                  <a href="#" onclick="editDebit({{$item->detaccount_id}})"> {{ number_format($item->debit,2,',','.')}}</a>&nbsp;&nbsp;<i class="fa fa-comments" style="cursor:pointer;float:right" onclick="viewDebit({{$item->detaccount_id}})"></i>  
                  @endif
                  </td>
                  <td>
                  @if($item->credit==0)
                  0
                  @endif
                  @if($item->credit!=0)
                   <a href="#" onclick="editCredit({{$item->detaccount_id}})">{{ number_format($item->credit,2,',','.')}}</a>&nbsp;&nbsp;<i class="fa fa-comments" style="cursor:pointer;float:right" onclick="viewCredit({{$item->detaccount_id}})"></i>  
                  @endif
                  </td>
                  <td>{{ $item->destination_name }}</td>
                  <td>{{ $item->category_name }}</td>
                  <td>{{ $item->item_name }}</td>
                  <td>
                     
                     
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/det-accounts', $item->detaccount_id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete DetAccount" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete DetAccount',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            )) !!}
                        {!! Form::close() !!}      
                        &nbsp;
                        <a class="btn btn-info btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true" title="Edit DetAccount" onclick="modalVal({{$item->detaccount_id}},{{$item->debit}},{{$item->credit}},'{{ $item->detaccount_name }}')" /></a>
                        
                 
                  </td>  

                </tr>

            @endforeach
<tr>
<td colspan="8" style="text-align: right"><font style="color:red;"><strong>{{number_format($item->account_total+($totalDebit-$totalCredit),2,',','.')}}</strong></font></td>

</tr>
            </tbody>
        </table>
       
  
    </div>
    </div>
    </div>
<!-- Edit debit creadit-->
<div id="editValue" class="modal fade" role="dialog">
 {!! Form::model("detaccount", [
        'method' => 'PATCH',
        'url' => ['/admin/det-accounts',1],
        'class' => 'form-horizontal',
        'files' => true
    ]) !!}
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Value</h4>
      </div>
      <div class="modal-body">
                
         {!! Form::hidden('idDet', null, ['class' => 'form-control ','id'=>'idDet']) !!}
              <label for="focusedinput" class="col-sm-5 control-label">Name</label>
         {!! Form::text('name', null, ['class' => 'form-control name','id'=>'name','placeholder'=>'Account Name']) !!}
     <label for="focusedinput" class="col-sm-5 control-label">Debit</label>
         {!! Form::text('dbt', null, ['class' => 'form-control debit','id'=>'dbt','placeholder'=>'Account Name']) !!}
      <label for="focusedinput" class="col-sm-5 control-label">Credit</label>
         {!! Form::text('crt', null, ['class' => 'form-control credit','id'=>'crt','placeholder'=>'Account Name']) !!}
    
      </div>
      <div class="modal-footer">
         <input type="submit" name="" class="btn btn-default" value="Process"/>
      </div>
    </div>

  </div>
    {!! Form::close() !!}
</div>

<!-- Edit debit -->
<div id="editDebit" class="modal fade" role="dialog">
     
 {!! Form::open(['url' => '/admin/changes', 'class' => 'form-horizontal', 'files' => true]) !!}
 <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
 <input type="hidden" name="options" value="0">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Form Debit</h4>
      </div>
      <div class="modal-body">
            
 <!--     <label for="focusedinput" class="col-sm-5 control-label">Debit</label> -->
 
         {!! Form::hidden('detaccount_id', null, ['class' => 'form-control idDebit']) !!}
    <!--  <label for="focusedinput" class="col-sm-5 control-label">Option</label>   -->
    <br>
     <select name="choise" class="form-control">
       <option>-</option>
       <option>+</option>
     </select> 
     <br>
     <!--  <label for="focusedinput" class="col-sm-5 control-label">Value</label> -->
         {!! Form::text('value', null, ['class' => 'form-control value','placeholder'=>'Value','required']) !!}
    <!--   <label for="focusedinput" class="col-sm-5 control-label">Credit</label>
         {!! Form::text('detaccount_name', null, ['class' => 'form-control credit','id'=>'credit','placeholder'=>'Account Name']) !!}
     -->
      </div>
      <div class="modal-footer">
      <input type="submit" name="" class="btn btn-default" value="Process" />
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Update</button> -->
      </div>
    </div>

  </div>
 {!! Form::close() !!}
</div>

<!-- Edit credit -->
<div id="editCredit" class="modal fade" role="dialog">
     
 {!! Form::open(['url' => '/admin/changes', 'class' => 'form-horizontal', 'files' => true]) !!}
 <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
 <input type="hidden" name="options" value="1">

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Form Credit</h4>
      </div>
      <div class="modal-body">
            
 <!--     <label for="focusedinput" class="col-sm-5 control-label">Debit</label> -->
 
         {!! Form::hidden('detaccount_id', null, ['class' => 'form-control idCredit']) !!}
    <!--  <label for="focusedinput" class="col-sm-5 control-label">Option</label>   -->
    <br>
     <select name="choise" class="form-control">
       <option>-</option>
       <option>+</option>
     </select> 
     <br>
     <!--  <label for="focusedinput" class="col-sm-5 control-label">Value</label> -->
         {!! Form::text('value', null, ['class' => 'form-control value','placeholder'=>'Value','required']) !!}
    <!--   <label for="focusedinput" class="col-sm-5 control-label">Credit</label>
         {!! Form::text('detaccount_name', null, ['class' => 'form-control credit','id'=>'credit','placeholder'=>'Account Name']) !!}
     -->
      </div>
      <div class="modal-footer">
      <input type="submit" name="" class="btn btn-default" value="Process" />
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Update</button> -->
      </div>
    </div>

  </div>
 {!! Form::close() !!}
</div>

<!-- Detail Debit -->
<div id="viewDebit" class="modal fade" role="dialog" >
     


  <div class="modal-dialog" style="width:150px">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">View Debit</h4>
      </div>
      <div class="modal-body">
        <table id="detailDebit" style="width:100%">
          

        </table>    

      </div>

    </div>

  </div>

</div>
<!-- Detail Credit -->
<div id="viewCredit" class="modal fade" role="dialog" >
     


  <div class="modal-dialog" style="width:150px">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">View Debit</h4>
      </div>
      <div class="modal-body">
        <table id="detailCredit" style="width:100%">
          

        </table>    

      </div>

    </div>

  </div>

</div>

</div>
@endsection
