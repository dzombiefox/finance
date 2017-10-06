@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Options <a href="{{ url('/admin/options/create') }}" class="btn btn-primary btn-xs" title="Add New Option"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> Option Name </th><th> User Id </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
             {{-- */$x=0;/* --}}
            @foreach($options as $item)
               {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->option_name }}</td><td>{{ $item->user_id }}</td>
                    <td>
                        <a href="{{ url('/admin/options/' . $item->option_id) }}" class="btn btn-success btn-xs" title="View Option"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/admin/options/' . $item->option_id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Option"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/options', $item->option_id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Option" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Option',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            )) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $options->render() !!} </div>
    </div>

</div>
@endsection
