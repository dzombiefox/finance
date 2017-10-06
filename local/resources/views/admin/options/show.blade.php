@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Option {{ $option->option_id }}
        <a href="{{ url('admin/options/' . $option->option_id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Option"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['admin/options', $option->option_id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Option',
                    'onclick'=>'return confirm("Confirm delete?")'
            ))!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $option->option_id }}</td>
                </tr>
                <tr><th> Option Name </th><td> {{ $option->option_name }} </td></tr><tr><th> User Id </th><td> {{ $option->user_id }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
