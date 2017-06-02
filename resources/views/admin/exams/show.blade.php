@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('admin.exams.single') }} #{{ $exam->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/exams') }}" title="{{ trans('admin.actions.back') }}"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> {{ trans('admin.actions.back') }}</button></a>
                        <a href="{{ url('/admin/exams/' . $exam->id . '/edit') }}" title="{{ trans('admin.actions.back') }} {{ trans('admin.exams.single_r') }}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> {{ trans('admin.actions.edit') }}</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/exams', $exam->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> '.trans('admin.actions.delete'), array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => trans('admin.actions.delete').' '.trans('admin.exams.single_r'),
                                    'onclick'=>'return confirm("'.trans('admin.actions.confirm_delete').'")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $exam->id }}</td>
                                    </tr>
                                    <tr><th>{{ trans('admin.exams.columns.group') }}</th><td> {{ $exam->group->code }} </td></tr>
                                    <tr><th>{{ trans('admin.exams.columns.subject') }}</th><td> {{ $exam->subject->name }} </td></tr>
                                    <tr><th>{{ trans('admin.exams.columns.type') }}</th><td> {{ $exam->type == 1 ? trans('admin.exams.types.exam') : trans('admin.exams.types.zalik') }} </td></tr>
                                    <tr><th>{{ trans('admin.exams.columns.auditory') }}</th><td> {{ $exam->auditory->code }} </td></tr>
                                    <tr><th>{{ trans('admin.exams.columns.teacher') }}</th><td> {{ $exam->teacher->fio }} </td></tr>
                                    <tr><th>{{ trans('admin.exams.columns.pass_date') }}</th><td> {{ $exam->pass_date }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
