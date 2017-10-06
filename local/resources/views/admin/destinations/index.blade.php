@extends('layouts.app')

@section('content')
<div class="container">

    <ol class="breadcrumb">
                <li><a href="index.htm">Home</a></li>
                <li>Destinations</li>
                <li class="active">Data Destinations</li>
            </ol><br>
              <div class="panel panel-indigo">
<div class="panel-body collapse in">
        <table class="table table-bordered table-striped table-hover tables">
            <thead>
                <tr>
                    <th>S.No</th><th> Destination Name </th><th> User Create </th><th><a href="{{ url('/admin/destinations/create') }}"class="btn btn-primary btn-sm pull-right" title="Add New Owner">Add New</a></th>
                </tr>
            </thead>
            <tbody>
             {{-- */$x=0;/* --}}
            @foreach($destinations as $item)
             {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->destination_name }}</td><td>{{ $item->name }}</td>
                    <td>
                        <a href="{{ url('/admin/destinations/' . $item->destination_id) }}" class="btn btn-success btn-xs" title="View Destination"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/admin/destinations/' . $item->destination_id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Destination"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/destinations', $item->destination_id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Destination" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Destination',
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
