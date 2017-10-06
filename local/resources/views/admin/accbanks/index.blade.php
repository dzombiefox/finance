@extends('layouts.app')

@section('content')
<div class="container">

            <ol class="breadcrumb">
                <li><a href="index.htm">Home</a></li>
                <li>Account Bank</li>
                <li class="active">Data Account Bank</li>
            </ol><br>
   <div class="panel panel-indigo">
<div class="panel-body collapse in">
        <table class="table table-bordered table-striped table-hover tables">
            <thead>
                <tr>
                    <th>No</th><th> Coa Code </th><th> Bank  </th><th> Owner </th><th> No Rekening </th>
                    <th>Currency</th>
                    <th><a href="{{ url('/admin/accbanks/create') }}" class="btn btn-primary btn-sm pull-right" title="Add New Account">Add New</a></th>
                </tr>
            </thead>
            <tbody>
              {{-- */$x=0;/* --}}
            @foreach($accbanks as $item)
             {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x}}</td>
                    <td>{{ $item->coa_code }}</td><td>{{ $item->bank_name }}</td><td>{{ $item->owner_name }}</td>

                    <td>{{

                    wordwrap($item->reknumber,3,".",true) }}-{{$item->accbanks_desc}}</td>
                    <td>{{ $item->currency }}</td>
                    <td>
                     
                        <a href="{{ url('/admin/accbanks/' . $item->accbank_id) }}" class="btn btn-success btn-xs" title="View Accbank"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/admin/accbanks/' . $item->accbank_id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Accbank"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/accbanks', $item->accbank_id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Accbank" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Accbank',
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
