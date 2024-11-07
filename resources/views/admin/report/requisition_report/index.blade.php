@extends('layouts.admin')
@section('content')
<div class="row row-sm">
    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card border custom-card">
            <div class="card-header custom-card-header">
                <h5 class="main-content-label mb-0">
                    {{ trans('cruds.requisition_report') }}
                </h5>
                <div class="card-options">
                    <a href="javascript:;" class="card-options-collapse py-0" data-bs-toggle="card-collapse"><i
                            class="fe fe-chevron-up"></i></a>
                    <a href="javascript:;" class="card-options-fullscreen py-0" data-bs-toggle="card-fullscreen"><i
                            class="fe fe-maximize"></i></a>
                    <a href="javascript:;" class="card-options-remove py-0" data-bs-toggle="card-remove"><i
                            class="fe fe-x"></i></a>
                </div>
            </div>
            <div class="card-body">
                <form action="/admin/report_management/report/generate-requisition-report" method="GET">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-10 tx-semibold">{{__('cruds.job')}}
                                </p>
                                <select id="job_id" name="job_id" class="form-control select2">
                                    <?=options('jobs', array(), array(), 'id', 'job_name', 'id', 'asc', trans('cruds.select'), !empty($job_id) ? $job_id : 0)?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-10 tx-semibold">{{__('cruds.section')}}
                                </p>
                                <select id="section_id" name="section_id" class="form-control select2">
                                    <?=options('sections', array(), array(), 'id', 'section_name', 'id', 'asc', trans('cruds.select'), !empty($section_id) ? $section_id : 0)?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-10 tx-semibold">{{__('cruds.date_from')}}
                                </p>
                                <input type="text" id="date_from" name="date_from" class="form-control datepicker-date"
                                    value="{{ !empty($date_from)?$date_from:date('Y-m-d') }}">
                                @if($errors->has('date_from'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('date_from') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-10 tx-semibold">{{__('cruds.date_to')}}
                                </p>
                                <input type="text" id="date_to" name="date_to" class="form-control datepicker-date"
                                    value="{{ !empty($date_to)?$date_to:date('Y-m-d') }}">
                                @if($errors->has('date_to'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('date_to') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-10 tx-semibold">{{__('cruds.status')}}
                                </p>
                                <select id="status" name="status" class="form-control select2">
                                    <option></option>
                                    <option value="Pending" @if(isset($status)) @if($status == 'Pending') {{ 'selected' }} @endif @endif>Pending</option>
                                    <option value="Approved" @if(isset($status)) @if($status == 'Approved') {{ 'selected' }} @endif @endif>Approved</option>
                                    <option value="Delivered" @if(isset($status)) @if($status == 'Delivered') {{ 'selected' }} @endif @endif>Delivered</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <button type="submit" class="btn btn-warning mt-4">
                                    <i class="fas fa-search">Search</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <br>
            <br>
            @isset($requisitions)
            <div class="card-body">
                <div class="table-responsive">
                    <table class=" table table-bordered">
                        <thead>
                            <tr>
                                <th>{{ __('cruds.sl') }}</th>
                                <th>
                                    {{ trans('cruds.requisition_code') }}
                                </th>
                                <th>
                                    {{ trans('cruds.requisition_date') }}
                                </th>
                                <th>
                                    {{ trans('cruds.section') }}
                                </th>
                                <th>
                                    {{ trans('cruds.job_name') }}
                                </th>
                                <th>
                                    {{ trans('cruds.status') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($requisitions as $key => $requisition)
                            <tr data-entry-id="{{ $requisition->id }}">
                                <td>{{ ($key+1) }}</td>
                                <td>
                                   <a href="/admin/section_requisition_management/requisition/{{ $requisition->id }}" target="_blank">
                                    {{ $requisition->requisition_code ?? '' }}
                                </a>
                                </td>
                                <td>
                                    {{ $requisition->requisition_date ?? '' }}
                                </td>
                                <td>
                                    {{ isset($requisition->section)?$requisition->section->section_name:'' }}
                                </td>
                                <td>
                                    {{ isset($requisition->job)?$requisition->job->job_name:'' }}
                                </td>
                                <td>
                                    {{ $requisition->status ?? '' }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endisset
        </div>
    </div>
</div>
@endsection