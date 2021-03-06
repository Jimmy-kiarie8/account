@extends('layouts.admin')

@section('title', trans('general.title.edit', ['type' => trans_choice('general.dashboards', 1)]))

@section('content')
    <div class="card">
        {!! Form::model($dashboard, [
            'id' => 'dashboard',
            'method' => 'PATCH',
            'route' => ['dashboards.update', $dashboard->id],
            '@submit.prevent' => 'onSubmit',
            '@keydown' => 'form.errors.clear($event.target.name)',
            'files' => true,
            'role' => 'form',
            'class' => 'form-loading-button',
            'novalidate' => true,
        ]) !!}

            <div class="card-body">
                <div class="row">
                    {{ Form::textGroup('name', trans('general.name'), 'font') }}

                    @permission('read-auth-users')
                        {{ Form::checkboxGroup('users', trans_choice('general.users', 2), $users, 'name') }}
                    @endpermission

                    {{ Form::radioGroup('enabled', trans('general.enabled'), $dashboard->enabled) }}
                </div>
            </div>

            @permission('update-common-dashboards')
                <div class="card-footer">
                    <div class="row float-right">
                        {{ Form::saveButtons('dashboards.index') }}
                    </div>
                </div>
            @endpermission
        {!! Form::close() !!}
    </div>
@endsection

@push('scripts_start')
    <script src="{{ asset('js/common/dashboards.js?v=' . version('short')) }}"></script>
@endpush
