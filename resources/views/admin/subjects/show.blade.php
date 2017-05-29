@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('admin.subjects.single') }} #{{ $subject->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/subjects') }}" title="{{ trans('admin.actions.back') }}"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> {{ trans('admin.actions.back') }}</button></a>
                        <a href="{{ url('/admin/subjects/' . $subject->id . '/edit') }}" title="{{ trans('admin.actions.back') }} {{ trans('admin.subjects.single_r') }}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> {{ trans('admin.actions.edit') }}</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/subjects', $subject->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> '.trans('admin.actions.delete'), array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => trans('admin.actions.delete').' '.trans('admin.subjects.single_r'),
                                    'onclick'=>'return confirm("'.trans('admin.actions.confirm_delete').'")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $subject->id }}</td>
                                    </tr>
                                    <tr><th> {{ trans('admin.subjects.columns.name') }} </th><td> {{ $subject->name }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
