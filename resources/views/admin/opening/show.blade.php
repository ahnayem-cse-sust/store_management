@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.show') }} {{ trans('cruds.opening') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped1">
                <tbody>
                    <tr>
                        <th style="width: 130px;">{{ __('cruds.opening_code') }}</th>
                        <td>{{ $opening->opening_code }}</td>
                    </tr>
                    <tr>
                        <th style="width: 130px;">{{ __('cruds.opening_date') }}</th>
                        <td>{{ $opening->opening_date }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('cruds.group') }}</th>
                        <td>{{ isset($opening->group)?$opening->group->group_name:'' }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('cruds.subgroup') }}</th>
                        <td>{{ isset($opening->subgroup)?$opening->subgroup->subgroup_name:'' }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('cruds.item_name') }}</th>
                        <td>{{ isset($opening->item)?$opening->item->item_name:'' }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('cruds.opening_quantity') }}</th>
                        <td>{{ $opening->opening_quantity }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('cruds.opening_price') }}</th>
                        <td>{{ $opening->opening_price }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('cruds.remarks') }}</th>
                        <td>{{ $opening->description }}</td>
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