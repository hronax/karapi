<div class="form-group {{ $errors->has('pair_number') ? 'has-error' : ''}}">
    {!! Form::label('pair_number', trans('admin.pairs.columns.pair_number'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('pair_number', null, ['class' => 'form-control']) !!}
        {!! $errors->first('pair_number', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('time_start') ? 'has-error' : ''}}">
    {!! Form::label('time_start', trans('admin.pairs.columns.time_start'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('time_start', null, ['class' => 'form-control']) !!}
        {!! $errors->first('time_start', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('time_end') ? 'has-error' : ''}}">
    {!! Form::label('time_end', trans('admin.pairs.columns.time_end'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('time_end', null, ['class' => 'form-control']) !!}
        {!! $errors->first('time_end', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('building_id') ? 'has-error' : ''}}">
    {!! Form::label('building_id', trans('admin.pairs.columns.building'), ['class' => 'col-md-4 control-label']) !!}
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
