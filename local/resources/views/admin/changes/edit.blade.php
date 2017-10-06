@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Edit Change {{ $change->id }}</h1>

    {!! Form::model($change, [
        'method' => 'PATCH',
        'url' => ['/admin/changes', $change->change_id],
        'class' => 'form-horizontal',
        'files' => true
    ]) !!}

                    <div class="form-group {{ $errors->has('detaccount_id') ? 'has-error' : ''}}">
                {!! Form::label('detaccount_id', 'Detaccount Id', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('detaccount_id', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('detaccount_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('choise') ? 'has-error' : ''}}">
                {!! Form::label('choise', 'Choise', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('choise', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('choise', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('value') ? 'has-error' : ''}}">
                {!! Form::label('value', 'Value', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('value', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('value', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
                {!! Form::label('user_id', 'User Id', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
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
@endsection