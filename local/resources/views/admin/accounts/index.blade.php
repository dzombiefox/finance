@extends('layouts.app')

@section('content')
<div class="container">

            <ol class="breadcrumb">
                <li><a href="index.htm">Home</a></li>
                <li>Bank</li>
                <li class="active">Data Bank</li>
            </ol><br>
  
       <div class="panel panel-indigo">
<div class="panel-body collapse in">
        <table class="table table-bordered table-striped table-hover tables">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Date</th>
                    <th> Account Number </th>
                    <th> Account Total </th>
                    <th> Users Created </th>
                    <th> <a href="{{ url('/admin/accounts/create') }}" class="btn btn-primary btn-sm pull-right" title="Add New Account">Add New</a></th>
                </tr>
            </thead>
            <tbody>
              {{-- */$x=0;/* --}}
            @foreach($accounts as $item)
             {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x}}</td>
                    <td>{{ $item->account_date }}</td>
                    <td>  {{wordwrap($item->reknumber,3,".",true) }}-{{$item->accbanks_desc}}</td>
                    <td>{{ number_format($item->account_total ,2,',','.')}}</td><td>{{ $item->name }}</td>
                    <td>
                        <a href="{{ url('/admin/accounts/' . $item->account_id) }}" class="btn btn-success btn-xs" title="View Account"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/admin/accounts/' . $item->account_id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Account"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/accounts', $item->account_id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Account" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Account',
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
