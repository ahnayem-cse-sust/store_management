@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.show') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped1">
                <tbody>
                    <tr>
                        <th>{{ __('cruds.branch_name') }}</th>
                        <td>{{ isset($demageitem->branch)?$demageitem->branch->short_name:'' }}</td>
                        <th>{{ __('cruds.warehouse') }}</th>
                        <td>{{ isset($demageitem->warehouse)?$demageitem->warehouse->warehouse_name:'' }}</td>
                    </tr>
                    <tr>
                        <th style="width: 130px;">{{ __('cruds.demageitem_code') }}</th>
                        <td>{{ $demageitem->demageitem_code }}</td>
                        <th style="width: 130px;">{{ __('cruds.item') }}</th>
                        <td>{{ isset($demageitem->item)?$demageitem->item->item_name:'' }}</td>
                    </tr>
                    <tr>
                        
                        <th>{{ __('cruds.group') }}</th>
                        <td>{{ isset($demageitem->group)?$demageitem->group->group_name:'' }}</td>
                        <th>{{ __('cruds.subgroup') }}</th>
                        <td>{{ isset($demageitem->subgroup)?$demageitem->subgroup->subgroup_name:'' }}</td>
                    </tr>
                    
                    <tr>
                        <th>{{ __('cruds.quantity') }}</th>
                        <td>{{ $demageitem->quantity }}</td>
                        <th>{{ __('cruds.demage_by') }}</th>
                        <td>{{ isset($demageitem->demageBy)?$demageitem->demageBy->name:'' }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('cruds.remarks') }}</th>
                        <td colspan="3">{{ $demageitem->description }}</td>
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