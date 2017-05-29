<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', trans('admin.courses.columns.name'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    {!! Form::label('description', trans('admin.courses.columns.description'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('start_date') ? 'has-error' : ''}}">
    {!! Form::label('start_date', trans('admin.courses.columns.start_date'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('start_date', null, ['class' => 'form-control']) !!}
        {!! $errors->first('start_date', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('image_name') ? 'has-error' : ''}}">
    {!! Form::label('image_name', trans('admin.courses.columns.image'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::file('image_name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('image_name', '<p class="help-block">:message</p>') !!}
    </div>
    @if(isset($course))
        <div class="col-md-6">
            <img src="/thumbnails/courses/{{ $course->image_name }}" />
        </div>
    @endif
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : trans('admin.actions.create'), ['class' => 'btn btn-primary']) !!}
    </div>
</div>
