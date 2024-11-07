@extends('layouts.admin')
@section('content')
@section('title',isset($manufacturer)?$manufacturer->manufacturer_name:'')

<div class="row row-sm">
    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card border custom-card">
            <div class="card-header custom-card-header">
                <h5 class="main-content-label mb-0">{{ trans('cruds.manufacturer') }}</h5>
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
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.manufacturer_code') }}
                            </th>
                            <td>
                                {{ $manufacturer->manufacturer_code }}
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 170px ;">
                                {{ trans('cruds.manufacturer_name') }}
                            </th>
                            <td>
                                {{ $manufacturer->manufacturer_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manufacturer_address') }}
                            </th>
                            <td>
                                {{ $manufacturer->manufacturer_address }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.country_of_origin') }}
                            </th>
                            <td>
                                {{ $manufacturer->country_of_origin }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.contact_person') }}
                            </th>
                            <td>
                                {{ $manufacturer->contact_person }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.contact_no') }}
                            </th>
                            <td>
                                {{ $manufacturer->contact_no }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.email_address') }}
                            </th>
                            <td>
                                {{ $manufacturer->email_address }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <a class="btn ripple btn-warning btn-rounded" href="{{ url()->previous() }}">
                    {{ trans('cruds.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection