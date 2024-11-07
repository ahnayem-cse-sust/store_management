<div class="row">
    <div class="col-md-12">
        <fieldset>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered mg-b-0 table-ps_item">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Item Name & Description</th>
                                    <th>Unit</th>
                                    <th>Order Quantity</th>
                                    <th>Receive Quantity</th>
                                    <th>U.Price</th>
                                    <th>T.Price</th>
                                    <th>P.Code</th>
                                    <th>Page</th>
                                    <th style="width:100px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($psDetails))
                                @foreach($psDetails as $key => $value)

                                <tr>
                                    <td class="serial">{{ ($key + 1)}}
                                        
                                    </td>
                                    <td>{{ isset($value->item)?$value->item->item_name:'' }}
                                        <input type="hidden" value="{{$value->id}}" name="material_receive_item_id[]" />
                                        <input type="hidden" value="{{$ps->id}}" name="ps_id[]" />
                                        <input type="hidden" value="{{$ps->requisition_id}}" name="requisition_id[]" />
                                        <input type="hidden" value="{{$ps->job_id}}" name="job_id[]" />
                                        <input type="hidden" value="{{$value->branch_id}}" name="branch_id[]" />
                                        <input type="hidden" value="{{$value->warehouse_id}}" name="warehouse_id[]" />
                                        <input type="hidden" value="{{$value->item_id}}" name="item_id[]" />
                                        <input type="hidden" value="{{$value->group_id}}" name="group_id[]" />
                                        <input type="hidden" value="{{$value->subgroup_id}}" name="subgroup_id[]" />
                                        <input type="hidden" value="{{$value->unit_id}}" name="unit_id[]" />
                                        <input type="hidden" value="{{$value->sale_price}}" name="sale_price[]" />
                                        <input type="hidden" value="{{$value->quantity}}" name="order_quantity[]" />
                                        <input type="hidden" value="{{$value->quantity}}" name="receive_quantity[]" />
                                        <input type="hidden" value="{{$value->total_price}}" name="total_price[]" />
                                    </td>
                                    <td>{{ isset($value->item)?isset($value->item->unit)?$value->item->unit->unit_name:'':'' }}
                                    </td>
                                    <td style="text-align:right;">{{ $value->quantity }}</td>
                                    <td style="text-align:right;">{{ $value->quantity }}</td>
                                    <td style="text-align:right;">{{$value->sale_price}}</td>
                                    <td style="text-align:right;">{{ $value->total_price }}</td>
                                    <td>{{ isset($value->item)?$value->item->item_code:'' }}</td>
                                    <td>{{ isset($value->item)?$value->item->page_location:'' }}
                                    </td>
                                     <td class="text-center">
                                        <a href="javascript:void(0)" data-ps_item_id="{{$value->id}}"
                                            class="btn btn-info btn-sm editRow"><i class="fas fa-edit"></i></a>
                                        <a href="javascript:void(0)" data-ps_item_id="{{$value->id}}"
                                            class="btn btn-danger btn-sm deleteRow"><i class="fas fa-times"></i></a>
                                    </td>
                                </tr>
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