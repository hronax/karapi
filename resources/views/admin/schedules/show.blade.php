@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('admin.schedule.single') }} #{{ $schedule->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/schedules') }}" title="{{ trans('admin.actions.back') }}"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> {{ trans('admin.actions.back') }}</button></a>
                        <a href="{{ url('/admin/schedules/' . $schedule->id . '/edit') }}" title="{{ trans('admin.actions.back') }} {{ trans('admin.schedules.single_r') }}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> {{ trans('admin.actions.edit') }}</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/schedules', $schedule->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> '.trans('admin.actions.delete'), array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => trans('admin.actions.delete').' '.trans('admin.schedules.single_r'),
                                    'onclick'=>'return confirm("'.trans('admin.actions.confirm_delete').'")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $schedule->id }}</td>
                                    </tr>
                                    <tr><th> {{ trans('admin.schedule.columns.group') }} </th><td> {{ $schedule->group->code }} </td></tr>
                                    <tr><th> {{ trans('admin.schedule.columns.subject') }} </th><td> {{ $schedule->subject->name }} </td></tr>
                                    <tr><th> {{ trans('admin.schedule.columns.teacher') }} </th><td> {{ $schedule->teacher->fio }} </td></tr>
                                    <tr><th> {{ trans('admin.schedule.columns.pair_number') }} </th><td> {{ $schedule->pair->pair_number  }} </td></tr>
                                    <tr><th> {{ trans('admin.schedule.columns.auditory') }} </th><td> {{ $schedule->auditory->code }} </td></tr>
                                    <tr><th> {{ trans('admin.schedule.columns.position') }} </th><td> {{ trans('admin.schedule.positions.pos'.$schedule->position) }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
