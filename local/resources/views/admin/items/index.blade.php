@extends('layouts.app')

@section('content')
<div class="container">
  <ol class="breadcrumb">
                <li><a href="index.htm">Home</a></li>
                <li>Itmes</li>
                <li class="active">Data Items</li>
            </ol><br>
              <div class="panel panel-indigo">
<div class="panel-body collapse in">
  
        <table class="table table-bordered table-striped table-hover tables">
            <thead>
                <tr>
                    <th>No</th><th> Item Name </th><th> Item Desc </th><th> User Create </th><th><a href="{{ url('/admin/items/create') }}"class="btn btn-primary btn-sm pull-right" title="Add New Owner">Add New</a></th>
                </tr>
            </thead>
            <tbody>
              {{-- */$x=0;/* --}}
            @foreach($items as $item)
             {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->item_name }}</td><td>{{ $item->item_desc }}</td><td>{{ $item->name }}</td>
                    <td>
                        <a href="{{ url('/admin/items/' . $item->item_id) }}" class="btn btn-success btn-xs" title="View Item"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/admin/items/' . $item->item_id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/items', $item->item_id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Item" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Item',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            )) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
       
    </div>
</div>
</div>
@endsection
