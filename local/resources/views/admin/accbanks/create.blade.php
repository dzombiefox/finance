@extends('layouts.app')

@section('content')
<div class="container">
<ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Account Bank</a></li>
  <li class="active">Create</li>
</ol>
<br>
<div class="col-sm-12">
                  <div class="panel panel-primary">
                     
                      <div class="panel-body">
    {!! Form::open(['url' => '/admin/accbanks', 'class' => 'form-horizontal', 'files' => true]) !!}

                    <div class="form-group {{ $errors->has('coa_code') ? 'has-error' : ''}}">
                {!! Form::label('coa_code', 'Coa Code', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('coa_code', null, ['class' => 'form-control' ,'required']) !!}
                    {!! $errors->first('coa_code', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <!--<div class="form-group {{ $errors->has('bank_id') ? 'has-error' : ''}}">
                {!! Form::label('bank_id', 'Bank Id', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('bank_id', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('bank_id', '<p class="help-block">:message</p>') !!}
                </div>-->

             <div class="form-group {{ $errors->has('bank_id') ? 'has-error' : ''}}">
            {!! Form::label('Bank', 'Bank ', ['class' => 'col-sm-3 control-label']) !!}
         <div class="col-sm-6">
          <select class="form-control" name="bank_id">
            @foreach($bank as $bank)
              <option value="{{$bank->bank_id}}">{{$bank->bank_name}}</option>
            @endforeach
          </select>
         </div>

            </div>
          <!--  <div class="form-group {{ $errors->has('owner_id') ? 'has-error' : ''}}">
                {!! Form::label('owner_id', 'Owner Id', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('owner_id', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('owner_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>-->

        <div class="form-group {{ $errors->has('owner_id') ? 'has-error' : ''}}">
            {!! Form::label('Owner', 'Owner ', ['class' => 'col-sm-3 control-label']) !!}
         <div class="col-sm-6">
          <select class="form-control" name="owner_id">
            @foreach($owner as $owner)
              <option value="{{$owner->owner_id}}">{{$owner->owner_name}}</option>
            @endforeach
          </select>
         </div>

            </div> 
            <div class="form-group {{ $errors->has('reknumber') ? 'has-error' : ''}}">
                {!! Form::label('reknumber', 'Reknumber', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('reknumber', null, ['class' => 'form-control','onkeypress'=>'return isNumberKey(event)','required']) !!}
                    {!! $errors->first('reknumber', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('accbanks_desc') ? 'has-error' : ''}}">
                {!! Form::label('Currency', 'Currency', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('currency', null, ['class' => 'form-control','required']) !!}
                    {!! $errors->first('currency', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
           <div class="form-group {{ $errors->has('accbanks_desc') ? 'has-error' : ''}}">
                {!! Form::label('accbanks_desc', 'Description', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('accbanks_desc', null, ['class' => 'form-control','required']) !!}
                    {!! $errors->first('reknumber', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-3">
                {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
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