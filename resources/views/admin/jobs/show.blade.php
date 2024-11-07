@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.show') }} {{ trans('cruds.job') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th style="width:150px;">{{ __('cruds.branch') }}</th>
                        <td>{{ isset($job->branch)?$job->branch->branch_name:'' }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('cruds.job_code') }}</th>
                        <td>{{ $job->job_code }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('cruds.job_name') }}</th>
                        <td>{{ $job->job_name }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('cruds.description') }}</th>
                        <td>{{ $job->description }}</td>
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