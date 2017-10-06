@extends('layouts.app')

@section('content')
<div class="container">
 <ol class="breadcrumb">
                <li><a href="index.htm">Home</a></li>
                <li><a href="../../admin/banks">Bank</a></li>
                <li class="active">Detail Bank</li>
            </ol><br>
            <div class="col-sm-12">
                  <div class="panel panel-primary">
                     
                      <div class="panel-body">
        <a href="{{ url('admin/banks/' . $bank->bank_id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Bank"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>

        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['admin/banks', $bank->bank_id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Bank',
                    'onclick'=>'return confirm("Confirm delete?")'
            ))!!}
        {!! Form::close() !!}
    </h1>
<br>
<br>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $bank->bank_id }}</td>
                </tr>
                <tr><th> Bank Name </th><td> {{ $bank->bank_name }} </td></tr><tr></tr>
            </tbody>
        </table>
    </div>

</div>
</div>
</div>
</div>
@endsection
