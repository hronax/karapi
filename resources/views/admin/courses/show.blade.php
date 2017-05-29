@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('admin.courses.single') }} #{{ $course->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/courses') }}" title="{{ trans('admin.actions.back') }}"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> {{ trans('admin.actions.back') }}</button></a>
                        <a href="{{ url('/admin/courses/' . $course->id . '/edit') }}" title="{{ trans('admin.actions.back') }} {{ trans('admin.courses.single_r') }}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> {{ trans('admin.actions.edit') }}</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/courses', $course->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> '.trans('admin.actions.delete'), array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => trans('admin.actions.delete').' '.trans('admin.courses.single_r'),
                                    'onclick'=>'return confirm("'.trans('admin.actions.confirm_delete').'")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $course->id }}</td>
                                    </tr>
                                    <tr><th> {{ trans('admin.courses.columns.name') }} </th><td> {{ $course->name }} </td></tr>
                                    <tr><th> {{ trans('admin.courses.columns.description') }} </th><td> {{ $course->description }} </td></tr>
                                    <tr><th> {{ trans('admin.courses.columns.start_date') }} </th><td> {{ $course->start_date }} </td></tr>
                                    <tr><th> {{ trans('admin.courses.columns.image') }} </th><td> <img src="/thumbnails/courses/{{ $course->image_name }}" /> </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
