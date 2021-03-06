@extends('layouts.app')

@section('content')
<div class="container">

<ol class="breadcrumb">
                <li><a href="index.htm">Home</a></li>
                <li><a href="{{url('admin/items')}}">Items</a></li>
                <li class="active">Edit Item</li>
            </ol><br>
   <div class="panel panel-primary">
                     
                      <div class="panel-body">
    {!! Form::model($item, [
        'method' => 'PATCH',
        'url' => ['/admin/items', $item->item_id],
        'class' => 'form-horizontal',
        'files' => true
    ]) !!}

                    <div class="form-group {{ $errors->has('item_name') ? 'has-error' : ''}}">
                {!! Form::label('item_name', 'Item Name', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('item_name', null, ['class' => 'form-control' ,'required']) !!}
                    {!! $errors->first('item_name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('item_desc') ? 'has-error' : ''}}">
                {!! Form::label('item_desc', 'Item Desc', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('item_desc', null, ['class' => 'form-control' ,'required']) !!}
                    {!! $errors->first('item_desc', '<p class="help-block">:message</p>') !!}
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
@endsection