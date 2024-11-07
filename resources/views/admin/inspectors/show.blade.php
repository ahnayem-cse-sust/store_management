@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.show') }} {{ trans('cruds.inspector') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th style="width: 150px;">{{ __('cruds.inspector_code') }}</th>
                        <td>{{ $inspector->inspector_code }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('cruds.branch_name') }}</th>
                        <td>{{ isset($inspector->branch)?$inspector->branch->short_name:'' }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('cruds.section_name') }}</th>
                        <td>{{ isset($inspector->section)?$inspector->section->section_name:'' }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('cruds.inspector_name') }}</th>
                        <td>{{ $inspector->inspector_name }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('cruds.address') }}</th>
                        <td>{{ $inspector->address }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('cruds.contact_person') }}</th>
                        <td>{{ $inspector->contact_person }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('cruds.contact_no') }}</th>
                        <td>{{ $inspector->contact_no }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('cruds.email') }}</th>
                        <td>{{ $inspector->email }}</td>
                    </tr>
                </tbody>
            </table>
            <a class="btn btn-warning ripple" href="{{ url()->previous() }}">
                {{ trans('cruds.back_to_list') }}
            </a>
        </div>

        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
        <div class="tab-content">

        </div>
    </div>
</div>
@endsection