@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Changes <a href="{{ url('/admin/changes/create') }}" class="btn btn-primary btn-xs" title="Add New Change"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> Detaccount Id </th><th> Choise </th><th> Value </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($changes as $item)
                <tr>
                    <td>1</td>
                    <td>{{ $item->detaccount_id }}</td><td>{{ $item->choise }}</td><td>{{ $item->value }}</td>
                    <td>
                        <a href="{{ url('/admin/changes/' . $item->change_id) }}" class="btn btn-success btn-xs" title="View Change"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/admin/changes/' . $item->change_id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Change"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/changes', $item->change_id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Change" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Change',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            )) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $changes->render() !!} </div>
    </div>

</div>
@endsection
