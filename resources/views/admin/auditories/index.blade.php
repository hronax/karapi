@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('admin.main_menu.auditories') }}</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/auditories/create') }}" class="btn btn-success btn-sm" title="{{ trans('admin.actions.new') }} {{ trans('admin.auditories.single_r') }}">
                            <i class="fa fa-plus" aria-hidden="true"></i> {{ trans('admin.actions.new') }}
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/auditories', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" value="{{ $keyword }}" placeholder="{{ trans('admin.actions.search') }}">
                            <span class="input-group-btn">
                                <button class="btn btn-default search-btn" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>{{ trans('admin.auditories.columns.code') }}</th>
                                        <th>{{ trans('admin.auditories.columns.building') }}</th>
                                        <th>{{ trans('admin.actions.th') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($auditories as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->code }}</td>
                                        <td>{{ $item->building->name }}</td>
                                        <td>
                                            <a href="{{ url('/admin/auditories/' . $item->id) }}" title="{{ trans('admin.actions.view') }} {{ trans('admin.auditories.single_r') }}"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                            <a href="{{ url('/admin/auditories/' . $item->id . '/edit') }}" title="{{ trans('admin.actions.edit') }} {{ trans('admin.auditories.single_r') }}"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/auditories', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => trans('admin.actions.delete').' '.trans('admin.auditories.single_r'),
                                                        'onclick'=>'return confirm("'.trans('admin.actions.confirm_delete').'")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $auditories->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
