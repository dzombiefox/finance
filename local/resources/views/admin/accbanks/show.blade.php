@extends('layouts.app')

@section('content')
<div class="container">
<ol class="breadcrumb">
                <li><a href="index.htm">Home</a></li>
                <li><a href="{{url('admin/accbanks')}}">Account Bank</a></li>
                <li class="active">Detail Account Bank</li>
            </ol><br>
   <div class="col-sm-12">
                  <div class="panel panel-primary">
                     
                      <div class="panel-body">
        <a href="{{ url('admin/accbanks/' . $accbank->accbank_id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Accbank"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['admin/accbanks', $accbank->accbank_id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Accbank',
                    'onclick'=>'return confirm("Confirm delete?")'
            ))!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $accbank->accbank_id }}</td>
                </tr>
                <tr>
                <th> Coa Code </th><td> {{ $accbank->coa_code }} </td>
                </tr>
                <tr>
                <th> Bank </th><td> {{ $accbank->bank_name}} </td></tr>
                <tr>
                <th> Owner  </th><td> {{ $accbank->owner_name }} </td>
                </tr>
                <tr>
                <th>Currency  </th><td> {{ $accbank->currency }} </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
</div>
@endsection
