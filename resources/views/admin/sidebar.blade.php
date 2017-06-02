<div class="col-sm-3 col-md-3 sidebar">
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                {{ trans('admin.main_menu.panel') }}
            </div>
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td {!! Request::is('admin') ? ' class="active"' : '' !!}>
                            <a href="{{ url('/admin') }}">
                                {{ trans('admin.main_menu.home') }}
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-info-sign">
                            </span>{{ trans('admin.main_menu.content') }}</a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse{!! classActiveSegment(['admin/news', 'admin/gifts', 'admin/courses']) !!}">
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <td {!! classActivePath('admin/news') !!}>
                                <a href="{{ url('/admin/news') }}">
                                    {{ trans('admin.main_menu.news') }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td {!! classActivePath('admin/gifts') !!}>
                                <a href="{{ url('/admin/gifts') }}">
                                    {{ trans('admin.main_menu.gifts') }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td {!! classActivePath('admin/courses') !!}>
                                <a href="{{ url('/admin/courses') }}">
                                    {{ trans('admin.main_menu.courses') }}
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-calendar">
                            </span>{{ trans('admin.main_menu.schedule') }}</a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse{!! classActiveSegment(['admin/schedule', 'admin/exams', 'admin/changes']) !!}">
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <td {!! classActivePath('admin/schedule') !!}>
                            <a href="{{ url('/admin/schedules') }}">
                                {{ trans('admin.main_menu.schedule') }}
                            </a>
                            </td>
                        </tr>
                        <tr>
                            <td {!! classActivePath('admin/changes') !!}>
                            <a href="{{ url('/admin/changes') }}">
                                {{ trans('admin.main_menu.changes') }}
                            </a>
                            </td>
                        </tr>
                        <tr>
                            <td {!! classActivePath('admin/exams') !!}>
                            <a href="{{ url('/admin/exams') }}">
                                {{ trans('admin.main_menu.exams') }}
                            </a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-folder-close">
                            </span>{{ trans('admin.main_menu.list') }}</a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse{!! classActiveSegment(['admin/buildings', 'admin/auditories', 'admin/departments', 'admin/specializations', 'admin/groups', 'admin/teachers', 'admin/subjects', 'admin/categories', 'admin/pairs']) !!}">
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <td {!! classActivePath('admin/buildings') !!}>
                                <span class="glyphicon glyphicon-file text-info"></span>
                                <a href="{{ url('/admin/buildings') }}">
                                    {{ trans('admin.main_menu.buildings') }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td {!! classActivePath('admin/auditories') !!}>
                                <span class="glyphicon glyphicon-file text-info"></span>
                                <a href="{{ url('/admin/auditories') }}">
                                    {{ trans('admin.main_menu.auditories') }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td {!! classActivePath('admin/departments') !!}>
                                <span class="glyphicon glyphicon-file text-info"></span>
                                <a href="{{ url('/admin/departments') }}">
                                    {{ trans('admin.main_menu.departments') }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td {!! classActivePath('admin/specializations') !!}>
                                <span class="glyphicon glyphicon-file text-info"></span>
                                <a href="{{ url('/admin/specializations') }}">
                                    {{ trans('admin.main_menu.specializations') }}
                                </a>
<!--                                <span class="badge">42</span>-->
                            </td>
                        </tr>
                        <tr>
                            <td {!! classActivePath('admin/groups') !!}>
                                <span class="glyphicon glyphicon-file text-info"></span>
                                <a href="{{ url('/admin/groups') }}">
                                    {{ trans('admin.main_menu.groups') }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td {!! classActivePath('admin/teachers') !!}>
                                <span class="glyphicon glyphicon-file text-info"></span>
                                <a href="{{ url('/admin/teachers') }}">
                                    {{ trans('admin.main_menu.teachers') }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td {!! classActivePath('admin/subjects') !!}>
                                <span class="glyphicon glyphicon-file text-info"></span>
                                <a href="{{ url('/admin/subjects') }}">
                                    {{ trans('admin.main_menu.subjects') }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td {!! classActivePath('admin/categories') !!}>
                                <span class="glyphicon glyphicon-file text-info"></span>
                                <a href="{{ url('/admin/categories') }}">
                                    {{ trans('admin.main_menu.categories') }}
                                </a>
                            </td>
                        </tr>
                            <td {!! classActivePath('admin/pairs') !!}>
                                <span class="glyphicon glyphicon-file text-info"></span>
                                <a href="{{ url('/admin/pairs') }}">
                                    {{ trans('admin.main_menu.pairs') }}
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-user">
                            </span>Account</a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <td>
                                <a href="http://www.jquery2dotnet.com">Change Password</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="http://www.jquery2dotnet.com">Notifications</a> <span class="label label-info">5</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="http://www.jquery2dotnet.com">Import/Export</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="glyphicon glyphicon-trash text-danger"></span><a href="http://www.jquery2dotnet.com" class="text-danger">
                                    Delete Account</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
