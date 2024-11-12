<style>
.table th,
.table td {
    padding: .75rem;
    vertical-align: middle;
    padding: 2px 15px;
    line-height: 1.462;
    border-top: 0;
}

.rqd {
    background-color: bisque;
    padding: 10px;
    padding-bottom: 1px;
}

.rqd-middle {
    background-color: #C2C2C2;
    padding: 10px;
    padding-bottom: 1px;
}
</style>
<div class="row row-sm">
    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="rqd">
            <table class="table table-bordered table-striped1">
                <tbody>
                    <tr>
                        <th colspan="4">
                            <h4 class="text-center">Section Requisition Delivery Order</h4>
                        </th>
                    </tr>
                    <tr>
                        <th style="width:150px;"><?php echo e(__('cruds.requisition_date')); ?>

                            <input type="hidden" name="requisition_id" value="<?php echo e($requisition->id); ?>">
                        </th>
                        <td><?php echo e($requisition->requisition_date); ?></td>
                        <th style="width:150px;"><?php echo e(__('cruds.requisition_code')); ?></th>
                        <td><?php echo e($requisition->requisition_code); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo e(__('cruds.branch')); ?></th>
                        <td><?php echo e(isset($requisition->branch)?$requisition->branch->short_name:''); ?></td>
                        <th><?php echo e(__('cruds.section')); ?></th>
                        <td><?php echo e(isset($requisition->section)?$requisition->section->section_name:''); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo e(__('cruds.product_receive_by')); ?></th>
                        <td><?php echo e($requisition->receive_by); ?></td>
                        <th><?php echo e(__('cruds.party')); ?></th>
                        <td>
                            <?php echo e(isset($requisition->party)?$requisition->party->party_name:''); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="rqd-middle">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group <?php echo e($errors->has('description') ? 'has-error' : ''); ?>">
                        <p class="mg-b-2 tx-semibold"><?php echo e(trans('cruds.remarks')); ?></p>
                        <input type="text" id="description" name="description" class="form-control"
                            placeholder="<?php echo e(trans('cruds.description')); ?>"
                            value="<?php echo e(old('description', isset($requisition) ? $requisition->description : '')); ?>">
                        <?php if($errors->has('description')): ?>
                        <em class="invalid-feedback">
                            <?php echo e($errors->first('description')); ?>

                        </em>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group <?php echo e($errors->has('challan_code') ? 'has-error' : ''); ?>">
                        <p class="mg-b-2 tx-semibold"><?php echo e(trans('cruds.challan_no')); ?> (<span class="required">*</span>)
                        </p>
                        <input type="text" id="challan_code" name="challan_code" class="form-control unique_code"
                            placeholder="<?php echo e(trans('cruds.challan_code')); ?>" value="" data-model="Challan"
                            data-prefix="CH" data-update_id="0" readonly required>
                        <?php if($errors->has('challan_code')): ?>
                        <em class="invalid-feedback">
                            <?php echo e($errors->first('challan_code')); ?>

                        </em>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group <?php echo e($errors->has('challan_date') ? 'has-error' : ''); ?>">
                        <p class="mg-b-2 tx-semibold"><?php echo e(trans('cruds.challan_date')); ?>(<span class="required">*</span>)
                        </p>
                        <input type="text" id="challan_date" name="challan_date" class="form-control datepicker-date"
                            placeholder="<?php echo e(trans('cruds.challan_date')); ?>" value="<?php echo e(date('Y-m-d')); ?>">
                        <?php if($errors->has('challan_date')): ?>
                        <em class="invalid-feedback">
                            <?php echo e($errors->first('challan_date')); ?>

                        </em>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <p class="mg-b-2 tx-semibold"><?php echo e(__('cruds.delivery_man')); ?> (<span class="required">*</span>)
                        </p>
                        <input type="text" id="delivery_man" name="delivery_man" class="form-control"
                            placeholder="<?php echo e(__('cruds.delivery_man')); ?>" required>
                        <?php if($errors->has('delivery_man')): ?>
                        <em class="invalid-feedback">
                            <?php echo e($errors->first('delivery_man')); ?>

                        </em>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <p class="mg-b-2 tx-semibold"><?php echo e(__('cruds.delivery_place')); ?> (<span class="required">*</span>)
                        </p>
                        <input type="text" id="delivery_place" name="delivery_place"
                            placeholder="<?php echo e(__('cruds.delivery_place')); ?>" class="form-control" required>
                        <?php if($errors->has('delivery_place')): ?>
                        <em class="invalid-feedback">
                            <?php echo e($errors->first('delivery_place')); ?>

                        </em>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="rqd">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th><?php echo e(__('cruds.sl')); ?></th>
                        <th><?php echo e(__('cruds.item_name')); ?></th>
                        <th><?php echo e(__('cruds.unit')); ?></th>
                        <th><?php echo e(__('cruds.stock')); ?></th>
                        <th><?php echo e(__('cruds.order_qty')); ?></th>
                        <th><?php echo e(__('cruds.delivered_qty')); ?></th>
                        <th><?php echo e(__('cruds.undelivered_qty')); ?></th>
                        <th><?php echo e(__('cruds.currrent_delivered_qty')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($requisition->requisitionDetails)): ?>
                    <?php $__currentLoopData = $requisition->requisitionDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php

                    $ordered_quantity = $value->quantity ;
                    $where = [] ;
                    $where[] = ['requisition_details_id','=',$value->id] ;
                    $where[] = ['item_id','=',$value->item_id] ;
                    $delivered_quantity = \App\ChallanDetails::where($where)->sum('delivered_quantity');
                    $delivered_quantity = isset($delivered_quantity)?$delivered_quantity:0;
                    $undelivered_quantity = $ordered_quantity - $delivered_quantity ;

                    $current_delivery_quantity = $undelivered_quantity ;

                    $where = [] ;
                    $where[] = ['branch_id','=',$value->branch_id];
                    $where[] = ['warehouse_id','=',$value->warehouse_id];
                    $where[] = ['group_id','=',$value->group_id];
                    $where[] = ['subgroup_id','=',$value->subgroup_id];
                    $where[] = ['item_id','=',$value->item_id];

                    $presentStock =
                    presentStock($value->branch_id,$value->warehouse_id,$value->group_id,$value->subgroup_id,$value->item_id,'','');

                    if($undelivered_quantity > $presentStock){
                    $current_delivery_quantity = 0 ;
                    }
                    ?>
                    <tr>
                        <td><?php echo e(($key + 1)); ?>

                            <input type="hidden" name="requisition_details_id[]" value="<?php echo e($value->id); ?>">
                            <input type="hidden" name="item_id[]" value="<?php echo e($value->item_id); ?>">
                            <input type="hidden" name="group_id[]" value="<?php echo e($value->group_id); ?>">
                            <input type="hidden" name="subgroup_id[]" value="<?php echo e($value->subgroup_id); ?>">
                            <input type="hidden" name="unit_id[]" value="<?php echo e($value->unit_id); ?>">
                            <input type="hidden" name="ordered_quantity[]" value="<?php echo e($value->quantity); ?>">
                            <input type="hidden" name="sale_price[]" value="<?php echo e($value->sale_price); ?>">
                        </td>
                        <td><?php echo e(isset($value->item)?$value->item->item_name:''); ?></td>
                        <td><?php echo e(isset($value->item)?isset($value->item->unit)?$value->item->unit->unit_name:'':''); ?>

                        </td>
                        <td style="text-align: right;" class="presentStock"><?php echo e($presentStock); ?></td>
                        <td style="text-align: right;" class="ordered_quantity"><?php echo e($value->quantity); ?></td>
                        <td style="text-align: right;" class="delivered_quantity"><?php echo e($delivered_quantity); ?></td>
                        <td style="text-align: right;" class="undelivered_quantity"><?php echo e($undelivered_quantity); ?></td>
                        <td style="text-align: right;">
                            <input type="number" name="delivered_quantity[]"
                                class="form-control current_delivered_quantity"
                                value="<?php echo e($current_delivery_quantity); ?>">
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <tr>
                        <td colspan="8" class="text-center">
                            <button type="submit"
                                class="btn btn-warning mt-1 mb-1"><?php echo e(__('cruds.confirm_delivery_order')); ?></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
$(".datepicker-date").bootstrapdatepicker({
    format: "yyyy-mm-dd",
    viewMode: "date",
    autoclose: !0,
    multidateSeparator: "-"
}).on('keypress', function() {
    return false;
})
GenerateCode();

$(document).on('keyup', '.current_delivered_quantity', function() {
    let row, current_delivered_quantity, undelivered_quantity;
    row = $(this).closest('tr');
    current_delivered_quantity = $(this).val();
    current_delivered_quantity = +current_delivered_quantity;
    undelivered_quantity = row.find('td.undelivered_quantity').text();
    undelivered_quantity = +undelivered_quantity;
    presentStock = row.find('td.presentStock').text();
    presentStock = +presentStock;

    if (current_delivered_quantity > presentStock) {
        current_delivered_quantity = presentStock;
        $(this).val(current_delivered_quantity);
        if (current_delivered_quantity > undelivered_quantity) {
            current_delivered_quantity = undelivered_quantity;
            $(this).val(current_delivered_quantity);
        }
    }
})
</script><?php /**PATH /home/nayem/Documents/projects/store_management/resources/views/admin/requision_delivery/initialize.blade.php ENDPATH**/ ?>