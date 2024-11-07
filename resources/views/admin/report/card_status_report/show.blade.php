@extends('layouts.admin')
@section('content')
<div class="row row-sm">
    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card border custom-card">
            <div class="card-header custom-card-header">
                <h5 class="main-content-label mb-0">
                    {{ trans('cruds.product_stock_report') }}
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
                <div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th rowspan="2">SL </th>
                                <th rowspan="2">Product </th>
                                <th rowspan="2">Group </th>
                                <th rowspan="2">Product Sub-Group </th>
                                <th rowspan="2">Product Item Unit </th>
                                <th rowspan="2">MS </th>
                                <th colspan="2">Tools Store </th>
                                <th rowspan="2">Total</th>
                            <tr>
                                <th>TS </th>
                                <th>Card </th>
                            </tr>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($cards))
                            @foreach ($cards as $key=>$value)
                            <tr>
                                <td>{{ $key +1 }}</td>
                                <td>
                                    {{ $value->item->item_code . ' - ' . $value->item->item_name }}
                                </td>
                                <td>{{ isset($value->group)?$value->group->group_name:''}}</td>
                                <td>{{ isset($value->subgroup)?$value->subgroup->subgroup_name:''}}</td>
                                <td>{{ isset($value->unit)?$value->unit->unit_name:''}}</td>
                                <td class="text-center">{{ $value->ms }}</td>
                                <td class="text-center">

                                    {{ $value->ts }}

                                </td>
                                <td class="text-center">{{ $value->card_quantity }}</td>
                                <td class="text-center">{{ $value->ms + $value->ts + $value->card_quantity }}</td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
