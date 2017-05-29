@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('admin.pairs.single') }} #{{ $pair->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/pairs') }}" title="{{ trans('admin.actions.back') }}"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> {{ trans('admin.actions.back') }}</button></a>
                        <a href="{{ url('/admin/pairs/' . $pair->id . '/edit') }}" title="{{ trans('admin.actions.back') }} {{ trans('admin.pairs.single_r') }}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> {{ trans('admin.actions.edit') }}</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/pairs', $pair->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> '.trans('admin.actions.delete'), array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => trans('admin.actions.delete').' '.trans('admin.pairs.single_r'),
                                    'onclick'=>'return confirm("'.trans('admin.actions.confirm_delete').'")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $pair->id }}</td>
                                    </tr>
                                    <tr><th> {{ trans('admin.pairs.columns.pair_number') }} </th><td> {{ $pair->pair_number }} </td></tr>
                                    <tr><th> {{ trans('admin.pairs.columns.time_start') }} </th><td> {{ $pair->time_start }} </td></tr>
                                    <tr><th> {{ trans('admin.pairs.columns.time_end') }} </th><td> {{ $pair->time_end }} </td></tr>
                                    <tr><th> {{ trans('admin.pairs.columns.building') }} </th><td> {{ $pair->building->name }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
