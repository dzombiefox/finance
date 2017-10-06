@extends('layouts.app')

@section('content')
<div class="container">
 <ol class="breadcrumb">
                <li><a href="index.htm">Home</a></li>
                <li><a href="{{url('admin/owners/') }}">Owner</a></li>
                <li class="active">Create Owner</li>
            </ol><br>
<div class="col-sm-12">
                  <div class="panel panel-primary">
                     
                      <div class="panel-body">
    {!! Form::open(['url' => '/admin/owners', 'class' => 'form-horizontal', 'files' => true]) !!}

                    <div class="form-group {{ $errors->has('owner_name') ? 'has-error' : ''}}">
                {!! Form::label('owner_name', 'Owner Name', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('owner_name', null, ['class' => 'form-control','required']) !!}
                    {!! $errors->first('owner_name', '<p class="help-block">:message</p>') !!}
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