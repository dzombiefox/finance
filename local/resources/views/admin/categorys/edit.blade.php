@extends('layouts.app')

@section('content')
<div class="container">
 <ol class="breadcrumb">
                <li><a href="index.htm">Home</a></li>
                <li><a href="{{url('admin/categorys')}}">Bank</a></li>
                <li class="active">Edit Bank</li>
            </ol><br>
                   <div class="panel panel-primary">
                     
                      <div class="panel-body">  

    {!! Form::model($category, [
        'method' => 'PATCH',
        'url' => ['/admin/categorys', $category->category_id],
        'class' => 'form-horizontal',
        'files' => true
    ]) !!}

                    <div class="form-group {{ $errors->has('category_name') ? 'has-error' : ''}}">
                {!! Form::label('category_name', 'Category Name', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('category_name', null, ['class' => 'form-control','required']) !!}
                    {!! $errors->first('category_name', '<p class="help-block">:message</p>') !!}
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