@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('admin.news.single') }} #{{ $news->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/news') }}" title="{{ trans('admin.actions.back') }}"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> {{ trans('admin.actions.back') }}</button></a>
                        <a href="{{ url('/admin/news/' . $news->id . '/edit') }}" title="{{ trans('admin.actions.edit') }} {{ trans('admin.news.single_r') }}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> {{ trans('admin.actions.edit') }}</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/news', $news->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> '.trans('admin.actions.delete'), array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => trans('admin.actions.delete').' '.trans('admin.news.single_r'),
                                    'onclick'=>'return confirm("'.trans('admin.actions.confirm_delete').'")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $news->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> {{ trans('admin.news.columns.title') }} </th>
                                        <td> {{ $news->title }} </td>
                                    </tr>
                                    <tr>
                                        <th> {{ trans('admin.news.columns.type') }} </th>
                                        <td> {{ $news->type == 1 ? 'Анонс' : 'Новость' }} </td>
                                    </tr>
                                    <tr>
                                        <th> {{ trans('admin.news.columns.is_top') }} </th>
                                        <td> {{ $news->is_top ? trans('admin.news.types.top') : trans('admin.news.types.regular') }} </td>
                                    </tr>
                                    <tr>
                                        <th> {{ trans('admin.news.columns.period') }} </th>
                                        <td> {{ $news->period }} </td>
                                    </tr>
                                    <tr>
                                        <th> {{ trans('admin.news.columns.category') }} </th>
                                        <td> {{ $news->category->name }} </td>
                                    </tr>
                                    <tr>
                                        <th> {{ trans('admin.news.columns.image') }} </th>
                                        <td> <img src="/thumbnails/news/{{ $news->image_name }}" /> </td>
                                    </tr>
                                    <tr>
                                        <th> {{ trans('admin.news.columns.text') }} </th>
                                        <td> {{ $news->text }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
