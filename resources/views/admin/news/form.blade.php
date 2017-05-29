<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    {!! Form::label('title', trans('admin.news.columns.title'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('text') ? 'has-error' : ''}}">
    {!! Form::label('text', trans('admin.news.columns.text'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('text', null, ['class' => 'form-control']) !!}
        {!! $errors->first('text', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('period') ? 'has-error' : ''}}">
    {!! Form::label('period', trans('admin.news.columns.period'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('period', null, ['class' => 'form-control']) !!}
        {!! $errors->first('period', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    {!! Form::label('type', trans('admin.news.columns.type'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('type', [1 => trans('admin.news.types.announce'), trans('admin.news.types.news')], null, ['class' => 'form-control']) !!}
        {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
    {!! Form::label('category_id', trans('admin.news.columns.category'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('category_id', App\Category::all()->pluck('name', 'id'), null, ['class' => 'form-control']) !!}
        {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('is_top') ? 'has-error' : ''}}">
    {!! Form::label('is_top', trans('admin.news.columns.is_top'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('is_top', [trans('admin.news.types.regular'), trans('admin.news.types.top')], null, ['class' => 'form-control']) !!}
        {!! $errors->first('is_top', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('image_name') ? 'has-error' : ''}}">
    {!! Form::label('image_name', trans('admin.news.columns.image'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::file('image_name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('image_name', '<p class="help-block">:message</p>') !!}
    </div>
    @if(isset($news))
        <div class="col-md-6">
            <img src="/thumbnails/news/{{ $news->image_name }}" />
        </div>
    @endif
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : trans('admin.actions.create'), ['class' => 'btn btn-primary']) !!}
    </div>
</div>
