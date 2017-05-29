<div class="form-group {{ $errors->has('code') ? 'has-error' : ''}}">
    {!! Form::label('code', trans('admin.auditories.columns.code'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('code', null, ['class' => 'form-control']) !!}
        {!! $errors->first('code', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('building_id') ? 'has-error' : ''}}">
    {!! Form::label('building_id', trans('admin.auditories.columns.building'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('building_id', App\Building::all()->pluck('name', 'id'), null, ['class' => 'form-control']) !!}
        {!! $errors->first('building_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : trans('admin.actions.create'), ['class' => 'btn btn-primary']) !!}
    </div>
</div>
