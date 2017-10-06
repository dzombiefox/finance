@extends('layouts.app')

@section('content')
<div class="container">

   <ol class="breadcrumb">
                <li><a href="index.htm">Home</a></li>
                <li><a href="{{url('admin/accbanks')}}">Account Bank</a></li>
                <li class="active">Edit Account Bank</li>
            </ol><br>
  
<div class="col-sm-12">
                  <div class="panel panel-primary">
                     
                      <div class="panel-body">
    {!! Form::model($accbank, [
        'method' => 'PATCH',
        'url' => ['/admin/accbanks', $accbank->accbank_id],
        'class' => 'form-horizontal',
        'files' => true
    ]) !!}

                    <div class="form-group {{ $errors->has('coa_code') ? 'has-error' : ''}}">
                {!! Form::label('coa_code', 'Coa Code', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('coa_code', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('coa_code', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('bank_id') ? 'has-error' : ''}}">
                  {!! Form::label('bank_id', 'Bank ', ['class' => 'col-sm-3 control-label']) !!}
                   <div class="col-sm-6">
                  <select class="form-control" name="bank_id" selected>
                  @foreach($bank as $bank)
                <option value="{{ $bank->bank_id }}"   @if($bank->bank_id==$accbank->bank_id) selected='selected' @endif >{{ $bank->bank_name }}</option>
                  @endforeach
                  </select>
                  </div>
            </div>
            <div class="form-group {{ $errors->has('owner_id') ? 'has-error' : ''}}">
                  {!! Form::label('owner_id', 'Owner ', ['class' => 'col-sm-3 control-label']) !!}
                   <div class="col-sm-6">
                  <select class="form-control" name="owner_id" selected>
                  @foreach($owner as $owner)
                <option value="{{ $owner->owner_id }}"   @if($owner->owner_id==$accbank->owner_id) selected='selected' @endif >{{ $owner->owner_name }}</option>
                  @endforeach
                  </select>
                  </div>
            </div>
            
            <div class="form-group {{ $errors->has('reknumber') ? 'has-error' : ''}}">
                {!! Form::label('reknumber', 'Reknumber', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('reknumber', null, ['class' => 'form-control','onkeypress'=>'return isNumberKey(event)']) !!}
                    {!! $errors->first('reknumber', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        <div class="form-group {{ $errors->has('reknumber') ? 'has-error' : ''}}">
                {!! Form::label('currency', 'Currency', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('currency', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('reknumber', '<p class="help-block">:message</p>') !!}
                </div>
                </div>
       
          <div class="form-group {{ $errors->has('accbanks_desc') ? 'has-error' : ''}}">
                {!! Form::label('accbanks_desc', 'Description', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('accbanks_desc', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('reknumber', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-3">
                {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
            </div>
        </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</div>
</div>
</div>
</div>
@endsection