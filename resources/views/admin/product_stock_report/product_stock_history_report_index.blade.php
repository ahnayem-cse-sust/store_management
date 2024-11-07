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
                <form action="/admin/report_management/generate-product-stock-history-report" method="GET">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-10 tx-semibold">{{__('cruds.group')}}
                                </p>
                                <select id="group_id" name="group_id" class="form-control select2">
                                    <?=options('groups', array(), array(), 'id', 'group_name', 'id', 'asc', trans('cruds.select'), isset($group_id) ? $group_id : 0)?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group {{ $errors->has('subgroup_id') ? 'has-error' : '' }}">
                                <p class="mg-b-10 tx-semibold">{{__('cruds.subgroup')}}
                                </p>
                                <select id="subgroup_id" name="subgroup_id" class="form-control select2">
                                    <?=options('subgroups', array(), array(), 'id', 'subgroup_name', 'id', 'asc', trans('cruds.select'), isset($subgroup_id) ? $subgroup_id : 0)?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-10 tx-semibold">{{__('cruds.item_name')}}
                                </p>
                                <select id="item_id" name="item_id" class="form-control select2">
                                    <?=options('items', array(), array('item_code', 'item_name'), 'id', '', 'id', 'asc', trans('cruds.select'), isset($item_id) ? $item_id : 0)?>
                                </select>
                                @if($errors->has('item_id'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('item_id') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-10 tx-semibold">{{__('cruds.date_from')}}
                                </p>
                                <input type="text" id="date_form" name="date_form" class="form-control datepicker-date" value="{{ date('Y-m-d') }}">
                                @if($errors->has('date_form'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('date_form') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-10 tx-semibold">{{__('cruds.date_to')}}
                                </p>
                                <input type="text" id="date_to" name="date_to" class="form-control datepicker-date" value="{{ date('Y-m-d') }}">
                                @if($errors->has('date_to'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('date_to') }}
                                </em>
                                @endif
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
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <th>Date </th>
                            <th>Code </th>
                            <th>MS IN MR </th>
                            <th>MS OUT Req Del </th>
                            <th>MS OUT TS</th>
                            <th>MS Demage</th>
                            <th>MS Balance </th>
                            <th>TS IN MS </th>
                            <th>TS IN Card </th>
                            <th>TS Demage</th>
                            <th>TS Balance </th>
                            <th>Card IN TS</th>
                            <th>Card OUT TS</th>
                            <th>Card Balance </th>
                            <th>Balance</th>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection