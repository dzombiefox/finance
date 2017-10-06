@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Change {{ $change->id }}
        <a href="{{ url('admin/changes/' . $change->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Change"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['admin/changes', $change->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Change',
                    'onclick'=>'return confirm("Confirm delete?")'
            ))!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $change->id }}</td>
                </tr>
                <tr><th> Detaccount Id </th><td> {{ $change->detaccount_id }} </td></tr><tr><th> Choise </th><td> {{ $change->choise }} </td></tr><tr><th> Value </th><td> {{ $change->value }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
