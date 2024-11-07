<div class="row">
    <div class="col-md-3" style="display:none">
        <input type="hidden" name="requisition_id" value="{{ isset($requisition) ? $requisition->id : 0 }}">
        <div class="form-group">
            <p class="mg-b-2 tx-semibold">{{__('cruds.job_name')}} (<span class="required">*</span>)
            </p>
            <select id="job_id" name="job_id" class="form-control select2">
                <?=options('jobs', array(), array('job_name'), 'id', '', 'id', 'asc', trans('cruds.select'), isset($requisition) ? $requisition->job_id : 0)?>
            </select>
            @if($errors->has('job_id'))
            <em class="invalid-feedback">
                {{ $errors->first('job_id') }}
            </em>
            @endif
        </div>
    </div>
    <div class="col-md-3" style="display:none">
        <div class="form-group">
            <p class="mg-b-2 tx-semibold">{{__('cruds.party')}} (<span class="required">*</span>)
            </p>
            <select id="party_id" name="party_id" class="form-control select2">
                <?=options('party', array(), array('party_code', 'party_name'), 'id', '', 'id', 'asc', trans('cruds.select'), isset($requisition) ? $requisition->party_id : 0)?>
            </select>
            @if($errors->has('party_id'))
            <em class="invalid-feedback">
                {{ $errors->first('party_id') }}
            </em>
            @endif
        </div>
    </div>

    <div class="col-md-3" style="display:none">
        <div class="form-group">
            <p class="mg-b-2 tx-semibold">{{__('cruds.branch_name')}} (<span class="required">*</span>)
            </p>
            <select id="branch_id" name="branch_id" class="form-control select2" required>
                <?=options('branches', array(), array(), 'id', 'short_name', 'id', 'asc', trans('cruds.select'), isset($requisition) ? $requisition->branch_id : 1)?>
            </select>
            @if($errors->has('branch_id'))
            <em class="invalid-feedback">
                {{ $errors->first('branch_id') }}
            </em>
            @endif
        </div>
    </div>
    <div class="col-md-3" style="display:none">
        <div class="form-group">
            <p class="mg-b-2 tx-semibold">{{__('cruds.section')}} (<span class="required">*</span>)
            </p>
            <select id="section_id" name="section_id" class="form-control select2" required>
                <?=options('sections', array(), array('section_name', 'section_code'), 'id', '', 'id', 'asc', trans('cruds.select'), isset($requisition) ? $requisition->section_id : 0)?>
            </select>
            @if($errors->has('section_id'))
            <em class="invalid-feedback">
                {{ $errors->first('section_id') }}
            </em>
            @endif
        </div>
    </div>
    <div class="col-md-3" style="display:none">
        <div class="form-group">
            <p class="mg-b-2 tx-semibold">{{__('cruds.warehouse')}} (<span class="required">*</span>)
            </p>
            <select id="warehouse_id" name="warehouse_id" class="form-control select2" required>
                <?=options('warehouses', array('type' => 'Main'), array('warehouse_code', 'warehouse_name'), 'id', '', 'id', 'asc', '', isset($requisition) ? $requisition->warehouse_id : 0)?>
            </select>
            @if($errors->has('warehouse_id'))
            <em class="invalid-feedback">
                {{ $errors->first('warehouse_id') }}
            </em>
            @endif
        </div>
    </div>
    <div class="col-md-3" style="display:none">
        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
            <p class="mg-b-2 tx-semibold">{{ trans('cruds.remarks') }}</p>
            <input type="text" id="description" name="description" class="form-control"
                placeholder="{{ trans('cruds.description') }}"
                value="{{ old('description', isset($requisition) ? $requisition->description : '') }}">
            @if($errors->has('description'))
            <em class="invalid-feedback">
                {{ $errors->first('description') }}
            </em>
            @endif
        </div>
    </div>
    <div class="col-md-12">
        <fieldset>
            <legend>PS items</legend>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive" id="content">
                        <table class="table table-bordered mg-b-0 table-ps_item">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Item Name & Description</th>
                                    <th>Unit</th>
                                    <th>Qty</th>
                                    <th>U.Price</th>
                                    <th>T.Price</th>
                                    <th>P.Code</th>
                                    <th>Page</th>
                                    <!-- <th style="width:100px;">Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($requisition->requisitionDetails))
                                @foreach($requisition->requisitionDetails as $key => $value)


                                @php
                                $ordered_quantity = $value->quantity ;
                                $where = [] ;
                                $where[] = ['requisition_details_id','=',$value->id] ;
                                $where[] = ['item_id','=',$value->item_id] ;
                                $delivered_quantity = \App\ChallanDetails::where($where)->sum('delivered_quantity');
                                $delivered_quantity = isset($delivered_quantity)?$delivered_quantity:0;
                                $undelivered_quantity = $ordered_quantity - $delivered_quantity ;

                                $total_price = $undelivered_quantity * $value->sale_price ;

                                
                                @endphp

                                <?php if($undelivered_quantity > 0){ ?>
                                <tr>
                                    <td>{{ ($key + 1)}}
                                        <input type="hidden" value="{{$value->id}}" name="ps_item_id[]" />
                                        <input type="hidden" value="{{$value->item_id}}" name="item_id[]" />
                                        <input type="hidden" value="{{$value->group_id}}" name="group_id[]" />
                                        <input type="hidden" value="{{$value->subgroup_id}}" name="subgroup_id[]" />
                                        <input type="hidden" value="{{$value->unit_id}}" name="unit_id[]" />
                                        <input type="hidden" value="{{$value->sale_price}}" name="sale_price[]" />
                                        <input type="hidden" value="{{$undelivered_quantity}}" name="quantity[]" />
                                        <input type="hidden" value="{{$total_price}}" name="total_price[]" />
                                    </td>
                                    <td>{{ isset($value->item)?$value->item->item_name:'' }}</td>
                                    <td>{{ isset($value->item)?isset($value->item->unit)?$value->item->unit->unit_name:'':'' }}
                                    </td>
                                    <td>{{$undelivered_quantity}}
                                    </td>
                                    <td>{{$value->sale_price}}
                                    </td>
                                    <td>{{ $total_price }}
                                    </td>
                                    <td>{{ isset($value->item)?$value->item->item_code:'' }}</td>
                                    <td>{{ isset($value->item)?$value->item->page_location:'' }}
                                    </td>
                                    <!-- <td class="text-center">
                                        <a href="javascript:void(0)" data-ps_item_id="{{$value->id}}"
                                            class="btn btn-info btn-sm editRow"><i class="fas fa-edit"></i></a>
                                        <a href="javascript:void(0)" data-ps_item_id="{{$value->id}}"
                                            class="btn btn-danger btn-sm deleteRow"><i class="fas fa-times"></i></a>
                                    </td> -->
                                </tr>
                                <?php } ?>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </fieldset>
    </div>
    <div class="col-md-12 mt-2">
        <input class="btn btn-danger float-end" type="submit" value="{{ trans('cruds.save') }}">
    </div>
</div>