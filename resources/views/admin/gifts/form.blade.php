<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', trans('admin.gifts.columns.name'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    {!! Form::label('description', trans('admin.gifts.columns.description'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    {!! Form::label('price', trans('admin.gifts.columns.price'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('price', null, ['class' => 'form-control']) !!}
        {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('image_name') ? 'has-error' : ''}}">
    {!! Form::label('image_name', trans('admin.gifts.columns.image'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::file('image_name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('image_name', '<p class="help-block">:message</p>') !!}
    </div>
    @if(isset($gift))
        <div class="col-md-6">
            <img src="/thumbnails/gifts/{{ $gift->image_name }}" />
        </div>
    @endif
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : trans('admin.actions.create'), ['class' => 'btn btn-primary']) !!}
    </div>
</div>
