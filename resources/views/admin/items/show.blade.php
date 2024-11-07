@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.show') }} {{ trans('cruds.item') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped1">
                <tbody>
                    <tr>
                        <th style="width: 130px;">{{ __('cruds.item_code') }}</th>
                        <td>{{ $item->item_code }}</td>
                        <th style="width: 130px;">{{ __('cruds.item_name') }}</th>
                        <td>{{ $item->item_name }}</td>
                    </tr>
                    <tr>
                        
                        <th>{{ __('cruds.group') }}</th>
                        <td>{{ isset($item->group)?$item->group->group_name:'' }}</td>
                        <th>{{ __('cruds.subgroup') }}</th>
                        <td>{{ isset($item->subgroup)?$item->subgroup->subgroup_name:'' }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('cruds.unit_name') }}</th>
                        <td>{{ isset($item->unit)?$item->unit->unit_name:'' }}</td>
                        <th>{{ __('cruds.manufacturer') }}</th>
                        <td>{{ isset($item->manufacturer)?$item->manufacturer->manufacturer_name:'' }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('cruds.brand_name') }}</th>
                        <td>{{ isset($item->brand)?$item->brand->brand_name:'' }}</td>
                        <th>{{ __('cruds.model') }}</th>
                        <td>{{ isset($item->model)?$item->model->model_name:'' }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('cruds.volume_page') }}</th>
                        <td>{{ $item->volume_location.' - '.$item->page_location }}</td>
                        <th>{{ __('cruds.room_name') }}</th>
                        <td>{{ isset($item->room)?$item->room->room_name:'' }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('cruds.rack_name') }}</th>
                        <td>{{ isset($item->rack)?$item->rack->rack_name:'' }}</td>
                        <th>{{ __('cruds.shelf_name') }}</th>
                        <td>{{ isset($item->shelf)?$item->shelf->shelf_name:'' }}</td>
                    </tr>

                    <tr>
                        <th>{{ __('cruds.purchase_price') }}</th>
                        <td>{{ $item->purchase_price }}</td>
                        <th>{{ __('cruds.sale_price') }}</th>
                        <td>{{ $item->sale_price }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('cruds.sku') }}</th>
                        <td>{{ $item->sku }}</td>
                        <th>{{ __('cruds.description') }}</th>
                        <td>{{ $item->description }}</td>
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