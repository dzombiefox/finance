@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Detaccounts <a href="{{ url('/admin/det-accounts/create') }}" class="btn btn-primary btn-xs" title="Add New DetAccount"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> Account Id </th><th> Detaccount Name </th><th> Detaccount Tr </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
             {{-- */$x=0;/* --}}
            @foreach($detaccounts as $item)
             {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->account_id }}</td><td>{{ $item->detaccount_name }}</td><td>{{ $item->detaccount_tr }}</td>
                    <td>
                        <a href="{{ url('/admin/det-accounts/' . $item->detaccount_id) }}" class="btn btn-success btn-xs" title="View DetAccount"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/admin/det-accounts/' . $item->detaccount_id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit DetAccount"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/det-accounts', $item->detaccount_id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete DetAccount" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete DetAccount',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            )) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $detaccounts->render() !!} </div>
    </div>

</div>
@endsection
