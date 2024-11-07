@extends('layouts.admin')
@section('content')
@section('title',isset($rack)?$rack->rack_name:'')

<div class="row row-sm">
    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card border custom-card">
            <div class="card-header custom-card-header">
                <h5 class="main-content-label mb-0">{{ trans('cruds.rack') }}</h5>
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
                                {{ trans('cruds.rack_code') }}
                            </th>
                            <th>
                                {{ $rack->rack_code }}
                            </th>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.branch_name') }}
                            </th>
                            <th>
                                 {{ isset($rack->branch)?$rack->branch->short_name : '' }} 
                            </th>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.room_name') }}
                            </th>
                            <th>
                                 {{ isset($rack->room)?$rack->room->room_name : '' }} 
                            </th>
                        </tr>
                        <tr>
                            <th style="width: 120px ;">
                                {{ trans('cruds.rack_name') }}
                            </th>
                            <td>
                                {{ $rack->rack_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.description') }}
                            </th>
                            <th>
                                {{ $rack->description }}
                            </th>
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