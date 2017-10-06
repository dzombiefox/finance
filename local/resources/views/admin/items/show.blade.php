@extends('layouts.app')

@section('content')
<div class="container">
<ol class="breadcrumb">
                <li><a href="index.htm">Home</a></li>
                <li><a href="{{url('admin/items')}}">Items</a></li>
                <li class="active">View Item</li>
            </ol><br>
    <div class="panel panel-indigo">
<div class="panel-body collapse in">
        <a href="{{ url('admin/items/' . $item->item_id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['admin/items', $item->item_id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Item',
                    'onclick'=>'return confirm("Confirm delete?")'
            ))!!}
        {!! Form::close() !!}
    <br>
    <br>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $item->item_id }}</td>
                </tr>
                <tr><th> Item Name </th><td> {{ $item->item_name }} </td></tr><tr><th> Item Desc </th><td> {{ $item->item_desc }} </td></tr><tr><th> User Id </th><td> {{ $item->user_id }} </td></tr>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
@endsection
