<div class="form-group {{ $errors->has('group_id') ? 'has-error' : ''}}">
    {!! Form::label('group_id', trans('admin.exams.columns.group'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('group_id', App\Group::all()->pluck('code', 'id'), null, ['class' => 'form-control select2']) !!}
        {!! $errors->first('group_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('subject_id') ? 'has-error' : ''}}">
    {!! Form::label('subject_id', trans('admin.exams.columns.subject'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('subject_id', App\Subject::all()->pluck('name', 'id'), null, ['class' => 'form-control select2']) !!}
        {!! $errors->first('subject_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    {!! Form::label('type', trans('admin.exams.columns.type'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('type', [1 => trans('admin.exams.types.exam'), trans('admin.exams.types.zalik')], null, ['class' => 'form-control']) !!}
        {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('auditory_id') ? 'has-error' : ''}}">
    {!! Form::label('auditory_id', trans('admin.exams.columns.auditory'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('auditory_id', auditoriesWithBuildingsList(), null, ['class' => 'form-control select2']) !!}
        {!! $errors->first('auditory_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('teacher_id') ? 'has-error' : ''}}">
    {!! Form::label('teacher_id', trans('admin.exams.columns.teacher'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('teacher_id', App\Teacher::all()->pluck('fio', 'id'), null, ['class' => 'form-control select2']) !!}
        {!! $errors->first('teacher_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('pass_date') ? 'has-error' : ''}}">
    {!! Form::label('pass_date', trans('admin.exams.columns.pass_date'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <div class='input-group date' id='datetimepicker1'>
            {!! Form::text('pass_date', null, ['class' => 'form-control']) !!}
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
            {!! $errors->first('pass_date', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : trans('admin.actions.create'), ['class' => 'btn btn-primary']) !!}
    </div>
</div>


<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker();
    });
</script>