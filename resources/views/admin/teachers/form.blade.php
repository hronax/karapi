<div class="form-group {{ $errors->has('fio') ? 'has-error' : ''}}">
    {!! Form::label('fio', trans('admin.teachers.columns.fio'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('fio', null, ['class' => 'form-control']) !!}
        {!! $errors->first('fio', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : trans('admin.actions.create'), ['class' => 'btn btn-primary']) !!}
    </div>
</div>
