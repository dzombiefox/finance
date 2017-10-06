@extends('layouts.app')

@section('content')
<div class="container">
  <ol class="breadcrumb">
                <li><a href="index.htm">Home</a></li>
                <li>Owner</li>
                <li class="active">Data Owner</li>
            </ol><br>

   
   <div class="panel panel-indigo">
<div class="panel-body collapse in">
        <table class="table table-bordered table-striped table-hover tables">
            <thead>
                <tr>
                    <th>No</th><th> Owner Name </th><th> User Create </th><th><a href="{{ url('/admin/owners/create') }}"class="btn btn-primary btn-sm pull-right" title="Add New Owner">Add New</a></th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($owners as $item)
            {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x}}</td>
                    <td>{{ $item->owner_name }}</td><td>{{ $item->name }}</td>
                    <td>
                        <a href="{{ url('/admin/owners/' . $item->owner_id) }}" class="btn btn-success btn-xs" title="View Owner"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/admin/owners/' . $item->owner_id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Owner"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/owners', $item->owner_id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Owner" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Owner',
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
