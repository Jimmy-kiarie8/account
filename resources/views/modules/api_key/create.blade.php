@extends('layouts.modules')

@section('title', trans('modules.api_key'))

@section('content')
    <div class="card">
        {!! Form::open([
            'route' => 'apps.api-key.store',
            'id' => 'form-app',
            '@submit.prevent' => 'onSubmit',
            'files' => true,
            'role' => 'form',
            'class' => 'form-loading-button'
        ]) !!}

            <div class="card-body">
                <div class="row">
                    {{ Form::textGroup('api_key', trans('modules.api_key'), 'key', ['required' => 'required', 'placeholder' => trans('general.form.enter', ['field' => trans('modules.api_key')])], setting('apps.api_key', null), 'col-md-12') }}

                    <div class="col-md-12">
                            <small>{!! trans('modules.get_api_key', ['url' => 'http://127.0.0.1:8000/dashboard']) !!}</small>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="row float-right">
                    {{ Form::saveButtons('apps.home.index') }}
                </div>
            </div>

        {!! Form::close() !!}
    </div>
@endsection

@push('scripts_start')
    <script src="{{ asset('js/modules/apps.js?v=' . version('short')) }}"></script>
@endpush
