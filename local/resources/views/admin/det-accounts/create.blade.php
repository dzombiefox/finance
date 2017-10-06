@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Create New DetAccount</h1>
    <hr/>

    {!! Form::open(['url' => '/admin/det-accounts', 'class' => 'form-horizontal', 'files' => true]) !!}

                    <div class="form-group {{ $errors->has('account_id') ? 'has-error' : ''}}">
                {!! Form::label('account_id', 'Account Id', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('account_id', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('account_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('detaccount_name') ? 'has-error' : ''}}">
                {!! Form::label('detaccount_name', 'Detaccount Name', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('detaccount_name', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('detaccount_name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('detaccount_tr') ? 'has-error' : ''}}">
                {!! Form::label('detaccount_tr', 'Detaccount Tr', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('detaccount_tr', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('detaccount_tr', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('debit') ? 'has-error' : ''}}">
                {!! Form::label('debit', 'Debit', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('debit', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('debit', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('credit') ? 'has-error' : ''}}">
                {!! Form::label('credit', 'Credit', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('credit', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('credit', '<p class="help-block">:message</p>') !!}
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
@endsection