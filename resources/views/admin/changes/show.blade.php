@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('admin.changes.single') }} #{{ $change->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/changes') }}" title="{{ trans('admin.actions.back') }}"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> {{ trans('admin.actions.back') }}</button></a>
                        <a href="{{ url('/admin/changes/' . $change->id . '/edit') }}" title="{{ trans('admin.actions.back') }} {{ trans('admin.changes.single_r') }}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> {{ trans('admin.actions.edit') }}</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/changes', $change->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> '.trans('admin.actions.delete'), array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => trans('admin.actions.delete').' '.trans('admin.changes.single_r'),
                                    'onclick'=>'return confirm("'.trans('admin.actions.confirm_delete').'")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $change->id }}</td>
                                    </tr>
                                    <tr><th> {{ trans('admin.changes.columns.group') }} </th><td> {{ $change->group->code }} </td></tr>
                                    <tr><th> {{ trans('admin.changes.columns.subject') }} </th><td> {{ $change->subject->name }} </td></tr>
                                    <tr><th> {{ trans('admin.changes.columns.teacher') }} </th><td> {{ $change->teacher->fio }} </td></tr>
                                    <tr><th> {{ trans('admin.changes.columns.auditory') }} </th><td> {{ $change->auditory->code }} </td></tr>
                                    <tr><th> {{ trans('admin.changes.columns.date') }} </th><td> {{ $change->date }} </td></tr>
                                    <tr><th> {{ trans('admin.changes.columns.pair_number') }} </th><td> {{ $change->pair->pair_number }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
