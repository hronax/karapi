@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('admin.actions.edit') }} {{ trans('admin.pairs.single_r') }} #{{ $pair->id }}</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/pairs') }}" title="{{ trans('admin.actions.back') }}"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> {{ trans('admin.actions.back') }}</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($pair, [
                            'method' => 'PATCH',
                            'url' => ['/admin/pairs', $pair->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('admin.pairs.form', ['submitButtonText' => trans('admin.actions.update')])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
