
<?php $__env->startSection('content'); ?>
<style>
fieldset {
    background-color: #eeeeee;
}


legend {
    background-color: #66cc00;
    color: white !important;
    width: inherit !important;
    float: none !important;
    display: block;
    /* width: 100%; */
    /* max-width: 100%; */
    padding: 0 10px;
    margin-bottom: .5rem;
    font-size: 1.5rem;
    line-height: inherit;
    color: inherit;
    white-space: normal;
    border-radius: 5px;
}

fieldset {
    min-width: 0;
    padding: inherit;
    margin: inherit;
    border: 1px solid #000 !important;
}

.table-bordered,
.table-bordered th,
.table-bordered td {
    border: 1px solid gray !important;
    text-align: center;
}

.submit-div1 {
    display: none;
}
</style>
<div class="row row-sm">
    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card border custom-card">
            <div class="card-header custom-card-header">
                <h5 class="main-content-label mb-0">
                    <?php echo e(trans('cruds.create')); ?> <?php echo e(trans('cruds.requisition')); ?>

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
                <form action="<?php echo e(route("admin.requisition.store")); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-2 tx-semibold"><?php echo e(__('cruds.requisitionfor')); ?>

                                </p>
                                <select id="requisitionfor_id" name="requisitionfor_id" class="form-control select2"
                                    >
                                    <?=options('requisitionfors', array(), array('requisitionfor_name'), 'id', '', 'id', 'asc', trans('cruds.select'), isset($requisition) ? $requisition->requisitionfor_id : 0)?>
                                </select>
                                <?php if($errors->has('requisitionfor_id')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('requisitionfor_id')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('requisition_code') ? 'has-error' : ''); ?>">
                                <p class="mg-b-2 tx-semibold"><?php echo e(trans('cruds.requisition_code')); ?> (<span
                                        class="required">*</span>)</p>
                                <input type="text" id="requisition_code" name="requisition_code"
                                    data-model="Requisition" data-prefix="RQ"
                                    data-update_id="<?php echo e(isset($requisition) ? $requisition->id : 0); ?>"
                                    class="form-control unique_code" placeholder="<?php echo e(trans('cruds.requisition_code')); ?>"
                                    value="<?php echo e(old('requisition_code', isset($requisition) ? $requisition->requisition_code : '')); ?>"
                                    required>
                                <?php if($errors->has('requisition_code')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('requisition_code')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('requisition_date') ? 'has-error' : ''); ?>">
                                <p class="mg-b-2 tx-semibold"><?php echo e(trans('cruds.requisition_date')); ?> (<span
                                        class="required">*</span>)</p>
                                <input type="text" id="requisition_date" name="requisition_date"
                                    class="form-control datepicker-date"
                                    placeholder="<?php echo e(trans('cruds.requisition_date')); ?>" value="<?php echo e(date('Y-m-d')); ?>"
                                    value="<?php echo e(old('requisition_date', isset($requisition) ? $requisition->requisition_date : '')); ?>"
                                    required>
                                <?php if($errors->has('requisition_date')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('requisition_date')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('requisition_delivery_date') ? 'has-error' : ''); ?>">
                                <p class="mg-b-2 tx-semibold"><?php echo e(trans('cruds.requisition_delivery_date')); ?></p>
                                <input type="text" id="requisition_delivery_date" name="requisition_delivery_date"
                                    class="form-control datepicker-date"
                                    placeholder="<?php echo e(trans('cruds.requisition_delivery_date')); ?>"
                                    value="<?php echo e(old('requisition_delivery_date', isset($requisition) ? $requisition->requisition_delivery_date : '')); ?>">
                                <?php if($errors->has('requisition_delivery_date')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('requisition_delivery_date')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-2 tx-semibold"><?php echo e(__('cruds.job_name')); ?>

                                </p>
                                <select id="job_id" name="job_id" class="form-control select2">
                                    <?=options('jobs', array(), array('job_name'), 'id', '', 'id', 'asc', trans('cruds.select'), isset($requisition) ? $requisition->job_id : 0)?>
                                </select>
                                <?php if($errors->has('job_id')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('job_id')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-2 tx-semibold"><?php echo e(__('cruds.party')); ?>

                                </p>
                                <select id="party_id" name="party_id" class="form-control select2">
                                    <?=options('party', array(), array('party_code', 'party_name'), 'id', '', 'id', 'asc', trans('cruds.select'), isset($requisition) ? $requisition->party_id : 0)?>
                                </select>
                                <?php if($errors->has('party_id')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('party_id')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-2 tx-semibold"><?php echo e(__('cruds.branch_name')); ?> (<span
                                        class="required">*</span>)
                                </p>
                                <select id="branch_id" name="branch_id" class="form-control select2" required>
                                    <?=options('branches', array(), array(), 'id', 'short_name', 'id', 'asc', trans('cruds.select'), isset($requisition) ? $requisition->branch_id : 1)?>
                                </select>
                                <?php if($errors->has('branch_id')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('branch_id')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-2 tx-semibold"><?php echo e(__('cruds.section')); ?> (<span class="required">*</span>)
                                </p>
                                <select id="section_id" name="section_id" class="form-control select2" required>
                                    <?=options('sections', array(), array('section_name', 'section_code'), 'id', '', 'id', 'asc', trans('cruds.select'), isset($requisition) ? $requisition->section_id : 0)?>
                                </select>
                                <?php if($errors->has('section_id')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('section_id')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-2 tx-semibold"><?php echo e(__('cruds.warehouse')); ?> (<span
                                        class="required">*</span>)
                                </p>
                                <select id="warehouse_id" name="warehouse_id" class="form-control select2" required>
                                    <?=options('warehouses', array('type'=>'Main'), array('warehouse_code', 'warehouse_name'), 'id', '', 'id', 'asc', '', isset($requisition) ? $requisition->warehouse_id : 0)?>
                                </select>
                                <?php if($errors->has('warehouse_id')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('warehouse_id')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('receive_by') ? 'has-error' : ''); ?>">
                                <p class="mg-b-2 tx-semibold"><?php echo e(trans('cruds.product_receive_by')); ?></p>
                                <input type="text" id="receive_by" name="receive_by" class="form-control"
                                    placeholder="<?php echo e(trans('cruds.product_receive_by')); ?>"
                                    value="<?php echo e(old('receive_by', isset($requisition) ? $requisition->receive_by : '')); ?>">
                                <?php if($errors->has('receive_by')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('receive_by')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
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
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <div class="col-md-12">
                            <fieldset>
                                <legend>Choose item to Requisition</legend>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <p class="mg-b-10 tx-semibold"><?php echo e(__('cruds.group')); ?>

                                            </p>
                                            <select id="group_id" name="group_id" class="form-control select2">
                                                <?=options('groups', array(), array(), 'id', 'group_name', 'id', 'asc', trans('cruds.select'), isset($item) ? $item->group_id : 0)?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group <?php echo e($errors->has('subgroup_id') ? 'has-error' : ''); ?>">
                                            <p class="mg-b-10 tx-semibold"><?php echo e(__('cruds.subgroup')); ?>

                                            </p>
                                            <select id="subgroup_id" name="subgroup_id" class="form-control select2">
                                                <?=options('subgroups', array(), array(), 'id', 'subgroup_name', 'id', 'asc', trans('cruds.select'), isset($item) ? $item->subgroup_id : 0)?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="hidden" id="requisition_item_id" value="0">
                                        <div class="form-group <?php echo e($errors->has('item_id') ? 'has-error' : ''); ?>">
                                            <p class="mg-b-10 tx-semibold"><?php echo e(__('cruds.item')); ?> (<span
                                                    class="required">*</span>)
                                            </p>
                                            <select id="item_id" name="item_id" class="form-control select2">
                                                <?=options('items', array(), array('item_code','item_name'), 'id', '', 'id', 'asc', trans('cruds.select'), isset($item) ? $item->subgroup_id : 0, ['item_code', 'group_id', 'subgroup_id', 'unit_id', 'sale_price', 'page_location'])?>
                                            </select>
                                        </div>
                                    </div>
                                    <!--<div class="col-md-3">-->
                                    <!--    <div class="form-group <?php echo e($errors->has('sale_price') ? 'has-error' : ''); ?>">-->
                                    <!--        <p class="mg-b-2 tx-semibold"><?php echo e(trans('cruds.sale_price')); ?></p>-->
                                    <!--        <input type="number" id="sale_price" name="sale_price" class="form-control"-->
                                    <!--            placeholder="<?php echo e(trans('cruds.sale_price')); ?>"-->
                                    <!--            value="<?php echo e(old('sale_price', isset($requisition) ? $requisition->sale_price : '')); ?>">-->
                                    <!--        <?php if($errors->has('sale_price')): ?>-->
                                    <!--        <em class="invalid-feedback">-->
                                    <!--            <?php echo e($errors->first('sale_price')); ?>-->
                                    <!--        </em>-->
                                    <!--        <?php endif; ?>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <div class="col-md-3">
                                        <div class="form-group <?php echo e($errors->has('unit_id') ? 'has-error' : ''); ?>">
                                            <p class="mg-b-10 tx-semibold"><?php echo e(__('cruds.unit')); ?> (<span
                                                class="required">*</span>)
                                            </p>
                                            <select id="unit_id" name="unit_id" class="form-control select2" disabled>
                                                <?=options('units', array(), array(), 'id', 'unit_name', 'id', 'asc', trans('cruds.select'), isset($item) ? $item->unit_id : 0)?>
                                            </select>
                                            <?php if($errors->has('unit_id')): ?>
                                            <em class="invalid-feedback">
                                                <?php echo e($errors->first('unit_id')); ?>

                                            </em>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group <?php echo e($errors->has('present_stock') ? 'has-error' : ''); ?>">
                                            <p class="mg-b-2 tx-semibold"><?php echo e(trans('cruds.present_stock')); ?></p>
                                            <input type="number" id="present_stock" name="present_stock"
                                                class="form-control" placeholder="<?php echo e(trans('cruds.present_stock')); ?>"
                                                value="<?php echo e(old('present_stock', isset($requisition) ? $requisition->present_stock : '')); ?>"
                                                readonly>
                                            <?php if($errors->has('present_stock')): ?>
                                            <em class="invalid-feedback">
                                                <?php echo e($errors->first('present_stock')); ?>

                                            </em>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group <?php echo e($errors->has('quantity') ? 'has-error' : ''); ?>">
                                            <p class="mg-b-2 tx-semibold"><?php echo e(trans('cruds.quantity')); ?>(<span
                                                    class="required">*</span>)</p>
                                            <input type="number" id="quantity" name="quantity" class="form-control"
                                                placeholder="<?php echo e(trans('cruds.quantity')); ?>"
                                                value="<?php echo e(old('quantity', isset($requisition) ? $requisition->quantity : '')); ?>">
                                            <?php if($errors->has('quantity')): ?>
                                            <em class="invalid-feedback">
                                                <?php echo e($errors->first('quantity')); ?>

                                            </em>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <a href="javascript:void(0)" class="btn btn-warning mt-4  btnAddNew"><i
                                                    class="fas fa-plus"></i> Add</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <hr>
                                        <div class="table-responsive">
                                            <table class="table table-bordered mg-b-0 table-requisition_item">
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
                                                        <th style="width:100px;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if(isset($requisition->requisitionDetails)): ?>
                                                    <?php $__currentLoopData = $requisition->requisitionDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e(($key + 1)); ?>

                                                            <input type="hidden" value="<?php echo e($value->id); ?>"
                                                                name="requisition_item_id[]" />
                                                            <input type="hidden" value="<?php echo e($value->item_id); ?>"
                                                                name="item_id[]" />
                                                            <input type="hidden" value="<?php echo e($value->group_id); ?>"
                                                                name="group_id[]" />
                                                            <input type="hidden" value="<?php echo e($value->subgroup_id); ?>"
                                                                name="subgroup_id[]" />
                                                            <input type="hidden" value="<?php echo e($value->unit_id); ?>"
                                                                name="unit_id[]" />
                                                            <input type="hidden" value="<?php echo e($value->sale_price); ?>"
                                                                name="sale_price[]" />
                                                            <input type="hidden" value="<?php echo e($value->quantity); ?>"
                                                                name="quantity[]" />
                                                            <input type="hidden" value="<?php echo e($value->total_price); ?>"
                                                                name="total_price[]" />
                                                        </td>
                                                        <td><?php echo e(isset($value->item)?$value->item->item_name:''); ?></td>
                                                        <td><?php echo e(isset($value->item)?isset($value->item->unit)?$value->item->unit->unit_name:'':''); ?>

                                                        </td>
                                                        <td><?php echo e($value->quantity); ?>

                                                        </td>
                                                        <td><?php echo e($value->sale_price); ?>

                                                        </td>
                                                        <td><?php echo e($value->total_price); ?>

                                                        </td>
                                                        <td><?php echo e(isset($value->item)?$value->item->item_code:''); ?></td>
                                                        <td><?php echo e(isset($value->item)?$value->item->page_location:''); ?>

                                                        </td>
                                                        <td class="text-center">
                                                            <a href="javascript:void(0)"
                                                                data-requisition_item_id="<?php echo e($value->id); ?>"
                                                                class="btn btn-info btn-sm editRow"><i
                                                                    class="fas fa-edit"></i></a>
                                                            <a href="javascript:void(0)"
                                                                data-requisition_item_id="<?php echo e($value->id); ?>"
                                                                class="btn btn-danger btn-sm deleteRow"><i
                                                                    class="fas fa-times"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                            </fieldset>
                        </div>
                        <div class="col-md-12 mt-2 submit-div" <?php if(!isset($requisition->requisitionDetails) ||
                            !count($requisition->requisitionDetails)): ?> style="display:none;"
                            <?php endif; ?>>
                            <input type="hidden" name="update_id" id="update_id"
                                value="<?php echo e(isset($requisition)?$requisition->id:0); ?>">
                            <input class="btn btn-danger float-end" type="submit" value="<?php echo e(trans('cruds.save')); ?>">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>
<script>
var prev_tr = '';
$(document).on('change', '#item_id', function() {
    let branch_id,warehouse_id,select_item, item_id, item_name, group_id, subgroup_id, unit_id, sale_price;
    select_item = $('#item_id :selected');
    item_id = select_item.val();
    item_name = select_item.text();
    group_id = select_item.data('group_id');
    subgroup_id = select_item.data('subgroup_id');
    unit_id = select_item.data('unit_id');
    sale_price = select_item.data('sale_price');
    $('#sale_price').val(sale_price);
    $('#unit_id').val(unit_id).trigger('change');
    branch_id = $('#branch_id').val() ; 
    warehouse_id = $('#warehouse_id').val() ;
    balance = presentStock(branch_id,warehouse_id,group_id,subgroup_id,item_id,'','');
    $('#present_stock').val(balance);

})
$(document).on('click', '.btnAddNew', function() {
    let requisition_code,requisition_date,job_id,party_id,branch_id,section_id,warehouse_id, requisition_item_id, select_item, item_id, item_name, item_code, group_id, group_name, subgroup_id,
        subgroup_name, unit_id,
        unit_name, sale_price, total_price = 0,
        quantity, present_stock,
        html, tr, editRow, deleteRow, page_location;
    select_item = $('#item_id :selected');
    item_id = select_item.val();
    item_name = select_item.text();
    item_code = select_item.data('item_code');
    unit_id = select_item.data('unit_id');
    group_id = select_item.data('group_id');
    subgroup_id = select_item.data('subgroup_id');
    page_location = select_item.data('page_location');

    item_name = $('#item_id :selected').text();
    group_name = $('#group_id :selected').text();
    unit_name = $('#unit_id :selected').text();
    present_stock = $('#present_stock').val();
    quantity = $('#quantity').val();
    quantity = +quantity;
    subgroup_name = $('#subgroup_id :selected').text();

    requisition_code = $('#requisition_code').val();
    requisition_date = $('#requisition_date').val();
    job_id = $('#job_id').val();
    party_id = $('#party_id').val();
    branch_id = $('#branch_id').val();
    section_id = $('#section_id').val();
    warehouse_id = $('#warehouse_id').val();
    if (group_name == '--Select--') {
        group_name = '';
    }
    if (unit_name == '--Select--') {
        unit_name = '';
    }
    if (subgroup_name == '--Select--') {
        subgroup_name = '';
    }
    item_id = $('#item_id').val();
    requisition_item_id = $('#requisition_item_id').val();
    // group_id = $('#group_id').val();
    if (!requisition_code || !requisition_date || !branch_id || !section_id || !warehouse_id || !item_id || !quantity) {
        SWAL_ALERT("", "");
        return false;
    }
    //subgroup_id = $('#subgroup_id').val();
    //unit_id = $('#unit_id').val();
    sale_price = $('#sale_price').val();
    sale_price = +sale_price;
    total_price = quantity * sale_price;
    html = '<input type="hidden" value="' + requisition_item_id + '" name="requisition_item_id[]"/>';
    html += '<input type="hidden" value="' + item_id + '" name="item_id[]"/>';
    html += '<input type="hidden" value="' + group_id + '" name="group_id[]"/>';
    html += '<input type="hidden" value="' + subgroup_id + '" name="subgroup_id[]"/>';
    html += '<input type="hidden" value="' + unit_id + '" name="unit_id[]"/>';
    html += '<input type="hidden" value="' + quantity + '" name="quantity[]"/>';
    html += '<input type="hidden" value="' + sale_price + '" name="sale_price[]"/>';
    html += '<input type="hidden" value="' + total_price + '" name="total_price[]"/>';

    editRow = '<a href="javascript:void(0)" data-requisition_item_id = "' + requisition_item_id +
        '" class="btn btn-info btn-sm editRow"><i class="fas fa-edit"></i></a>';
    deleteRow = '<a href="javascript:void(0)" data-requisition_item_id = "' + requisition_item_id +
        '" class="btn btn-danger btn-sm deleteRow"><i class="fas fa-times"></i></a>';

    tr = '<tr>'
    tr += '<td class="serial"></td>'
    tr += '<td>' + html + item_name + '</td>'
    tr += '<td>' + unit_name + '</td>'
    tr += '<td>' + quantity + '</td>'
    tr += '<td>' + sale_price + '</td>'
    tr += '<td>' + total_price + '</td>'
    tr += '<td>' + item_code + '</td>'
    tr += '<td>' + page_location + '</td>'
    tr += '<td style="text-align:center">' + editRow + ' ' + deleteRow + '</td>'
    tr += '</tr>';
    $('#draftbox').show();
    $('.submit-div').show();
    if (prev_tr != '') {
        prev_tr.replaceWith(tr);
        prev_tr = '';
    } else {
        $('table.table-requisition_item tbody').append(tr);
    }
    clearField();
})

$(document).on('click', '.editRow', function() {
    let requisition_item_id, group_id, subgroup_id,item_id = 0 , unit_id, sale_price, tr;
    tr = $(this).closest('tr');
    prev_tr = tr;
    requisition_item_id = tr.find('input[name="requisition_item_id[]"]').val();
    item_id = tr.find('input[name="item_id[]"]').val();
    group_id = tr.find('input[name="group_id[]"]').val();
    subgroup_id = tr.find('input[name="subgroup_id[]"]').val();
    unit_id = tr.find('input[name="unit_id[]"]').val();
    quantity = tr.find('input[name="quantity[]"]').val();
    sale_price = tr.find('input[name="sale_price[]"]').val();
    total_price = tr.find('input[name="total_price[]"]').val();
    $('#requisition_item_id').val(requisition_item_id);
    $('#unit_id').val(unit_id).trigger('change');
    $('#quantity').val(quantity).trigger('change');
    $('#group_id').val(group_id).trigger('change');
    setTimeout(() => {
        $('#subgroup_id').val(subgroup_id).trigger('change');
    }, 1000);
    setTimeout(() => {
        $('#item_id').val(item_id).trigger('change');
    }, 1500);
    setTimeout(() => {
        $('#sale_price').val(sale_price);
    }, 2000);
    $('#total_price').val(total_price);
})
$(document).on('click', '.deleteRow', function() {
    let requisition_item_id, row, msg;
    requisition_item_id = $(this).data('requisition_item_id');
    row = $(this).closest('tr');
    msg = confirm('Are you sure to delete this record?');
    if (msg) {
        if (requisition_item_id > 0) {
            formUrl = "<?php echo e(route('admin.crud.remove')); ?>";
            formData = {
                table: 'RequisitionDetails',
                column: 'id',
                value: requisition_item_id
            };
            $.ajax({
                headers: {
                    'x-csrf-token': _token
                },
                method: 'POST',
                data: formData,
                url: formUrl
            }).done(function(response) {
                if (response == 1) {
                    row.remove();
                }
            })
        } else {
            row.remove();
        }
        setSerial('table-requisition_item');
    }
    var rowCount = $('.table-requisition_item tbody>tr').length;
    if (rowCount <= 0) {
        $('.submit-div').hide();
    } else {
        $('.submit-div').show();
    }
})

function clearField() {
    $('#requisition_item_id').val('0');
    $('#item_id').val('').trigger('change');
    //$('#group_id').val('').trigger('change');
    $('#unit_id').val('').trigger('change');
    $('#quantity').val('').trigger('change');
    //$('#subgroup_id').val('').trigger('change');
    $('#sale_price').val('');
    setSerial('table-requisition_item');
}
$(document).on('change', '#requisitionfor_id', function(params) {
    let requisitionfor_id, requisitionfor, where = [];
    requisitionfor_id = $(this).val();
    requisitionfor = $('#requisitionfor_id :selected').text();
    where.push(['requisitionfor_id', '=', requisitionfor_id]);
    prefix = requisitionfor.substring(0, 3);
    model = 'Requisition';
    field = 'requisition_code';
    url = '/admin/crud/generate-code';
    $.ajax({
            async: false,
            headers: {
                'x-csrf-token': _token
            },
            method: 'POST',
            url: url,
            data: {
                prefix: prefix,
                field: field,
                model: model,
                where: where,
            }
        })
        .done(function(data) {
            $('#requisition_code').val(data);
        })

})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nayem/Documents/projects/store_management/resources/views/admin/requisitions/create.blade.php ENDPATH**/ ?>