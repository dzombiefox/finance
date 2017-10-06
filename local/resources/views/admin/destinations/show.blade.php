@extends('layouts.app')

@section('content')
<div class="container">

   <ol class="breadcrumb">
                <li><a href="index.htm">Home</a></li>
                <li><a href="{{url('admin/destinations')}}">Destinations</a></li>
                <li class="active">View Destinations</li>
            </ol><br>
               <div class="panel panel-primary">                     
               <div class="panel-body">
        <a href="{{ url('admin/destinations/' . $destination->destination_id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Destination"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['admin/destinations', $destination->destination_id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Destination',
                    'onclick'=>'return confirm("Confirm delete?")'
            ))!!}
        {!! Form::close() !!}
   </br>
   <br>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $destination->destination_id }}</td>
                </tr>
                <tr><th> Destination Name </th><td> {{ $destination->destination_name }} </td></tr><tr><th> User Id </th><td> {{ $destination->user_id }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
</div>
</div>
@endsection
