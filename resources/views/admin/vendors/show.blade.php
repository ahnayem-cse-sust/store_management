@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.show') }} {{ trans('cruds.vendor') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th style="width: 150px;">{{ __('cruds.vendor_code') }}</th>
                        <td>{{ $vendor->vendor_code }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('cruds.vendor_name') }}</th>
                        <td>{{ $vendor->vendor_name }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('cruds.address') }}</th>
                        <td>{{ $vendor->address }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('cruds.contact_person') }}</th>
                        <td>{{ $vendor->contact_person }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('cruds.contact_no') }}</th>
                        <td>{{ $vendor->contact_no }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('cruds.email') }}</th>
                        <td>{{ $vendor->email }}</td>
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