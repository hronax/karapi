<div class="form-group {{ $errors->has('code') ? 'has-error' : ''}}">
    {!! Form::label('code', trans('admin.groups.columns.code'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('code', null, ['class' => 'form-control']) !!}
        {!! $errors->first('code', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('course_number') ? 'has-error' : ''}}">
    {!! Form::label('course_number', trans('admin.groups.columns.course_number'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('course_number', null, ['class' => 'form-control']) !!}
        {!! $errors->first('course_number', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('specialization_id') ? 'has-error' : ''}}">
    {!! Form::label('specialization_id', trans('admin.groups.columns.specialization'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('specialization_id', specializationsWithDepartmentsList(), null, ['class' => 'form-control select2']) !!}
        {!! $errors->first('specialization_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : trans('admin.actions.create'), ['class' => 'btn btn-primary']) !!}
    </div>
</div>
