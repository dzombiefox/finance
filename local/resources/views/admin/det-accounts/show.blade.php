@extends('layouts.app')

@section('content')
<div class="container">

    <h1>DetAccount {{ $detaccount->detaccount_id }}
        <a href="{{ url('admin/det-accounts/' . $detaccount->detaccount_id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit DetAccount"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['admin/detaccounts', $detaccount->detaccount_id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete DetAccount',
                    'onclick'=>'return confirm("Confirm delete?")'
            ))!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $detaccount->detaccount_id }}</td>
                </tr>
                <tr><th> Account Id </th><td> {{ $detaccount->account_id }} </td></tr><tr><th> Detaccount Name </th><td> {{ $detaccount->detaccount_name }} </td></tr><tr><th> Detaccount Tr </th><td> {{ $detaccount->detaccount_tr }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
