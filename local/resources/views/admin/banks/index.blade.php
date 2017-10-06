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
                    <th>No</th><th> Bank Name </th><th> User Created </th><th> <a href="{{ url('/admin/banks/create') }}" class="btn btn-primary btn-sm pull-right" title="Add New Bank">Add New</a></th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($banks as $item)
             {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x}}</td>
                    <td>{{ $item->bank_name }}</td><td>{{ $item->name }}</td>
                    <td>
                        <a href="{{ url('/admin/banks/' . $item->bank_id) }}" class="btn btn-success btn-xs" title="View Bank" data-toggle="tooltip"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/admin/banks/' . $item->bank_id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Bank"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/banks', $item->bank_id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Bank" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Bank',
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
