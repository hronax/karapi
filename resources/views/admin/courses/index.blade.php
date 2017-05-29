@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('admin.main_menu.courses') }}</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/courses/create') }}" class="btn btn-success btn-sm" title="{{ trans('admin.actions.new') }} {{ trans('admin.courses.single_r') }}">
                            <i class="fa fa-plus" aria-hidden="true"></i> {{ trans('admin.actions.new') }}
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/courses', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                                        <th>{{ trans('admin.courses.columns.name') }}</th>
                                        <th>{{ trans('admin.courses.columns.description') }}</th>
                                        <th>{{ trans('admin.courses.columns.start_date') }}</th>
                                        <th>{{ trans('admin.actions.th') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($courses as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->start_date }}</td>
                                        <td>
                                            <a href="{{ url('/admin/courses/' . $item->id) }}" title="{{ trans('admin.actions.view') }} {{ trans('admin.courses.single_r') }}"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                            <a href="{{ url('/admin/courses/' . $item->id . '/edit') }}" title="{{ trans('admin.actions.edit') }} {{ trans('admin.courses.single_r') }}"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/courses', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => trans('admin.actions.delete').' '.trans('admin.courses.single_r'),
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $courses->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
