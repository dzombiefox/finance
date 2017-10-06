@extends('layouts.app')

@section('content')
<div class="container">
<ol class="breadcrumb">
                <li><a href="index.htm">Home</a></li>
                <li><a href="{{url('admin/categorys')}}">Bank</a></li>
                <li class="active">Detail Category</li>
            </ol><br>
                  <div class="panel panel-primary">
                     
                      <div class="panel-body">
   
        <a href="{{ url('admin/categorys/' . $category->category_id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Category"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        

        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['admin/categorys', $category->category_id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Category',
                    'onclick'=>'return confirm("Confirm delete?")'
            ))!!}
        {!! Form::close() !!}
<br>
<br>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $category->category_id }}</td>
                </tr>
                <tr><th> Category Name </th><td> {{ $category->category_name }} </td></tr><tr><th> Users Id </th><td> {{ $category->users_id }} </td></tr>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
@endsection
