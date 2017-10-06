@extends('layouts.app')

@section('content')
<div class="container">
 <ol class="breadcrumb">
                <li><a href="index.htm">Home</a></li>
                <li><a href="{{url('admin/owners')}}">Owners</a></li>
                <li class="active">Detail Owners</li>
            </ol><br>
             <div class="col-sm-12">
                  <div class="panel panel-primary">
                     
                      <div class="panel-body">
            <a href="{{ url('admin/owners/' . $owner->owner_id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Owner"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
       
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['admin/owners', $owner->owner_id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Owner',
                    'onclick'=>'return confirm("Confirm delete?")'
            ))!!}
        {!! Form::close() !!}
   <br>
   <br>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $owner->owner_id }}</td>
                </tr>
                <tr><th> Owner Name </th><td> {{ $owner->owner_name }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
</div>
</div>
</div>
@endsection
