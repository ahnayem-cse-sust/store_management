
<?php $__env->startSection('content'); ?>
<div class="row row-sm">
    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card border custom-card">
            <div class="card-header custom-card-header">
                <h5 class="main-content-label mb-0">
                    <?php echo e(trans('cruds.create')); ?> <?php echo e(trans('cruds.material_receive')); ?>

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
                <form action="<?php echo e(route("admin.material_receive.store")); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-2 tx-semibold"><?php echo e(__('cruds.mrfor')); ?>

                                </p>
                                <select id="mrfor_id" name="mrfor_id" class="form-control select2">
                                    <?=options('requisitionfors', array(), array('requisitionfor_name'), 'id', '', 'id', 'asc', trans('cruds.select'), isset($requisition) ? $requisition->mrfor_id : 0)?>
                                </select>
                                <?php if($errors->has('mrfor_id')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('mrfor_id')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <input type="hidden" name="update_id" id="update_id"
                                value="<?php echo e(isset($material_receive)?$material_receive->id:0); ?>">
                            <div class="form-group <?php echo e($errors->has('material_receive_code') ? 'has-error' : ''); ?>">
                                <p class="mg-b-0 tx-semibold"><?php echo e(trans('cruds.material_receive_code')); ?> (<span
                                        class="required">*</span>)</p>
                                <input type="text" id="material_receive_code" name="material_receive_code"
                                    data-model="MaterialReceive" data-prefix="MR"
                                    data-update_id="<?php echo e(isset($material_receive) ? $material_receive->id : 0); ?>"
                                    class="form-control unique_code"
                                    placeholder="<?php echo e(trans('cruds.material_receive_code')); ?>"
                                    value="<?php echo e(old('material_receive_code', isset($material_receive) ? $material_receive->material_receive_code : '')); ?>"
                                    required>
                                <?php if($errors->has('material_receive_code')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('material_receive_code')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('material_receive_date') ? 'has-error' : ''); ?>">
                                <p class="mg-b-0 tx-semibold"><?php echo e(trans('cruds.material_receive_date')); ?> (<span
                                        class="required">*</span>)</p>
                                <input type="text" id="material_receive_date" name="material_receive_date"
                                    class="form-control datepicker-date"
                                    placeholder="<?php echo e(trans('cruds.material_receive_date')); ?>"
                                    value="<?php echo e(old('material_receive_date', isset($material_receive) ? $material_receive->material_receive_date : date('Y-m-d'))); ?>"
                                    required>
                                <?php if($errors->has('material_receive_date')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('material_receive_date')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-0 tx-semibold"><?php echo e(__('cruds.job_name')); ?>

                                </p>
                                <input type="text" id="job_no" name="job_no" class="form-control" readonly />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('purchase_order_no') ? 'has-error' : ''); ?>">
                                <p class="mg-b-0 tx-semibold"><?php echo e(trans('cruds.purchase_order_no')); ?> (<span
                                        class="required">*</span>)</p>
                                <input type="text" id="purchase_order_no" name="purchase_order_no" class="form-control"
                                    placeholder="<?php echo e(trans('cruds.purchase_order_no')); ?>"
                                    value="<?php echo e(old('purchase_order_no', isset($material_receive) ? $material_receive->purchase_order_no : '')); ?>"
                                    required>
                                <?php if($errors->has('purchase_order_no')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('purchase_order_no')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('purchase_order_date') ? 'has-error' : ''); ?>">
                                <p class="mg-b-0 tx-semibold"><?php echo e(trans('cruds.purchase_order_date')); ?> (<span
                                        class="required">*</span>)</p>
                                <input type="text" id="purchase_order_date" name="purchase_order_date"
                                    class="form-control datepicker-date"
                                    placeholder="<?php echo e(trans('cruds.purchase_order_date')); ?>"
                                    value="<?php echo e(old('purchase_order_date', isset($material_receive) ? $material_receive->purchase_order_date : date('Y-m-d'))); ?>"
                                    required>
                                <?php if($errors->has('purchase_order_date')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('purchase_order_date')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('requisition_order_no') ? 'has-error' : ''); ?>">
                                <p class="mg-b-0 tx-semibold"><?php echo e(trans('cruds.requisition_order_no')); ?> (<span
                                        class="required">*</span>)</p>
                                <input type="text" id="requisition_order_no" name="requisition_order_no"
                                    class="form-control" placeholder="<?php echo e(trans('cruds.requisition_order_no')); ?>"
                                    value="<?php echo e(old('requisition_order_no', isset($material_receive) ? $material_receive->requisition_order_no : '')); ?>"
                                    readonly required>
                                <?php if($errors->has('requisition_order_no')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('requisition_order_no')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('requisition_order_date') ? 'has-error' : ''); ?>">
                                <p class="mg-b-0 tx-semibold"><?php echo e(trans('cruds.requisition_order_date')); ?> (<span
                                        class="required">*</span>)</p>
                                <input type="text" id="requisition_order_date" name="requisition_order_date"
                                    class="form-control" placeholder="<?php echo e(trans('cruds.requisition_order_date')); ?>"
                                    value="<?php echo e(old('requisition_order_date', isset($material_receive) ? $material_receive->requisition_order_date : '')); ?>"
                                    readonly required>
                                <?php if($errors->has('requisition_order_date')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('requisition_order_date')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('inspection_name') ? 'has-error' : ''); ?>">
                                <p class="mg-b-0 tx-semibold"><?php echo e(trans('cruds.inspector_remarks')); ?> (<span
                                        class="required">*</span>)</p>
                                <input type="text" id="inspection_name" name="inspection_name" class="form-control"
                                    placeholder="<?php echo e(trans('cruds.inspector_remarks')); ?>"
                                    value="<?php echo e(old('inspection_name', isset($material_receive) ? $material_receive->inspection_name : '')); ?>"
                                    required>
                                <?php if($errors->has('inspection_name')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('inspection_name')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-0 tx-semibold"><?php echo e(__('cruds.inspector_by')); ?> (<span
                                        class="required">*</span>)
                                </p>
                                <select id="inspection_id" name="inspection_id" class="form-control select2" required>
                                    <?=options('inspectors', array(), array('inspector_code', 'inspector_name'), 'id', '', 'id', 'asc', trans('cruds.select'), isset($material_receive) ? $material_receive->inspection_id : 0)?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('description') ? 'has-error' : ''); ?>">
                                <p class="mg-b-0 tx-semibold"><?php echo e(trans('cruds.warehouse_remarks')); ?> (<span
                                        class="required">*</span>)</p>
                                <input type="text" id="description" name="description" class="form-control"
                                    placeholder="<?php echo e(trans('cruds.warehouse_remarks')); ?>"
                                    value="<?php echo e(old('description', isset($material_receive) ? $material_receive->description : '')); ?>"
                                    required>
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
                            <div class="row justify-content-center">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <p class="mg-b-0 tx-semibold"><?php echo e(__('cruds.vendor')); ?>

                                        </p>
                                        <select id="vendor_id" name="vendor_id" class="form-control select2">
                                            <?=options('vendors', array(), array('vendor_code', 'vendor_name'), 'id', '', 'id', 'asc', trans('cruds.select'), isset($material_receive) ? $material_receive->vendor_id : 0)?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('challan_no') ? 'has-error' : ''); ?>">
                                <p class="mg-b-0 tx-semibold">Challan No.(<span class="required">*</span>)</p>
                                <input type="number" id="challan_no" name="challan_no" class="form-control"
                                    placeholder="Challan No."
                                    value="<?php echo e(old('challan_no', isset($material_receive) ? $material_receive->challan_no : '')); ?>"
                                    required>
                                <?php if($errors->has('challan_no')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('challan_no')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('challan_date') ? 'has-error' : ''); ?>">
                                <p class="mg-b-0 tx-semibold">Challan Date (<span class="required">*</span>)</p>
                                <input type="text" id="challan_date" name="challan_date"
                                    class="form-control datepicker-date" placeholder="Challa Date"
                                    value="<?php echo e(old('challan_date', isset($material_receive) ? $material_receive->challan_date : date('Y-m-d'))); ?>"
                                    required>
                                <?php if($errors->has('challan_date')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('challan_date')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('bill_no') ? 'has-error' : ''); ?>">
                                <p class="mg-b-0 tx-semibold"><?php echo e(trans('cruds.bill_no')); ?> (<span
                                        class="required">*</span>)</p>
                                <input type="text" id="bill_no" name="bill_no" class="form-control"
                                    placeholder="<?php echo e(trans('cruds.bill_no')); ?>"
                                    value="<?php echo e(old('bill_no', isset($material_receive) ? $material_receive->bill_no : '')); ?>"
                                    required>
                                <?php if($errors->has('bill_no')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('bill_no')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('bill_date') ? 'has-error' : ''); ?>">
                                <p class="mg-b-0 tx-semibold"><?php echo e(trans('cruds.bill_date')); ?> (<span
                                        class="required">*</span>)</p>
                                <input type="text" id="bill_date" name="bill_date" class="form-control datepicker-date"
                                    placeholder="<?php echo e(trans('cruds.bill_date')); ?>"
                                    value="<?php echo e(old('bill_date', isset($material_receive) ? $material_receive->bill_date : date('Y-m-d'))); ?>"
                                    required>
                                <?php if($errors->has('bill_date')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('bill_date')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row justify-content-center">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <p class="mg-b-0 tx-semibold"><?php echo e(__('cruds.ps_code')); ?> (<span
                                                class="required">*</span>)
                                        </p>
                                        <select id="ps_id_search" name="ps_id_search[]"
                                            class="form-control select2-multiple" multiple required>
                                            <?=options('pss', [['status', '=', 'Approved']], array(), 'id', 'ps_code', 'id', 'desc', trans('cruds.select'), isset($ps_ids) ? $ps_ids : [])?>
                                        </select>
                                        <?php if($errors->has('ps_id')): ?>
                                        <em class="invalid-feedback">
                                            <?php echo e($errors->first('ps_id')); ?>

                                        </em>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>

                        <div class="col-md-3" style="display: none;">

                            <div class="form-group">
                                <p class="mg-b-0 tx-semibold"><?php echo e(__('cruds.branch')); ?> (<span class="required">*</span>)
                                </p>
                                <select id="branch_id" name="branch_id" class="form-control select2" required>
                                    <?=options('branches', array(), array(), 'id', 'short_name', 'id', 'asc', trans('cruds.select'), 1)?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="hidden" id="material_receive_item_id" value="0">
                                <input type="hidden" id="ps_id" value="0">
                                <input type="hidden" id="requisition_id" value="0">
                                <input type="hidden" id="job_id" value="0">
                                <p class="mg-b-0 tx-semibold"><?php echo e(__('cruds.warehouse')); ?> (<span
                                        class="required">*</span>)
                                </p>
                                <select id="warehouse_id" name="warehouse_id" class="form-control select2">
                                    <?=options('warehouses', array('type' => 'Main'), array('warehouse_code', 'warehouse_name'), 'id', '', 'id', 'asc', trans('cruds.select'), 0)?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-0 tx-semibold"><?php echo e(__('cruds.group')); ?>

                                </p>
                                <select id="group_id" name="group_id" class="form-control select2">
                                    <?=options('groups', array(), array(), 'id', 'group_name', 'id', 'asc', trans('cruds.select'), 0)?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('subgroup_id') ? 'has-error' : ''); ?>">
                                <p class="mg-b-0 tx-semibold"><?php echo e(__('cruds.subgroup')); ?>

                                </p>
                                <select id="subgroup_id" name="subgroup_id" class="form-control select2">
                                    <?=options('subgroups', array(), array(), 'id', 'subgroup_name', 'id', 'asc', trans('cruds.select'), 0)?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('item_id') ? 'has-error' : ''); ?>">
                                <p class="mg-b-0 tx-semibold"><?php echo e(__('cruds.item')); ?> (<span class="required">*</span>)
                                </p>

                                <select id="item_id" name="item_id" class="form-control select2">
                                    <?=options('items', array(), array('item_code', 'item_name'), 'id', '', 'id', 'asc', trans('cruds.select'), 0, ['item_code', 'group_id', 'subgroup_id', 'unit_id', 'sale_price', 'page_location', 'volume_location'])?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('unit_id') ? 'has-error' : ''); ?>">
                                <p class="mg-b-0 tx-semibold"><?php echo e(__('cruds.unit')); ?> (<span class="required">*</span>)
                                </p>
                                <select id="unit_id" name="unit_id" class="form-control select2">
                                    <?=options('units', array(), array(), 'id', 'unit_name', 'id', 'asc', trans('cruds.select'), 0)?>
                                </select>
                                <?php if($errors->has('unit_id')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('unit_id')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('sale_price') ? 'has-error' : ''); ?>">
                                <p class="mg-b-0 tx-semibold"><?php echo e(trans('cruds.price')); ?></p>
                                <input type="number" id="sale_price" name="sale_price" class="form-control"
                                    placeholder="<?php echo e(trans('cruds.price')); ?>" value="<?php echo e(old('sale_price')); ?>">
                                <?php if($errors->has('sale_price')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('sale_price')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('receive_quantity') ? 'has-error' : ''); ?>">
                                <p class="mg-b-0 tx-semibold"><?php echo e(trans('cruds.receive_quantity')); ?> (<span
                                        class="required">*</span>)</p>
                                <input type="number" id="receive_quantity" name="receive_quantity" class="form-control"
                                    placeholder="<?php echo e(trans('cruds.receive_quantity')); ?>"
                                    value="<?php echo e(old('receive_quantity')); ?>">
                                <input type="hidden" name="order_quantity" id="order_quantity">
                                <?php if($errors->has('receive_quantity')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('receive_quantity')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('present_stock') ? 'has-error' : ''); ?>">
                                <p class="mg-b-0 tx-semibold"><?php echo e(trans('cruds.present_stock')); ?></p>
                                <input type="number" id="present_stock" name="present_stock" class="form-control"
                                    placeholder="<?php echo e(trans('cruds.present_stock')); ?>" value="<?php echo e(old('present_stock')); ?>"
                                    readonly>
                                <?php if($errors->has('present_stock')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('present_stock')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="javascript:void(0)" class="btn btn-warning float-end btnAddNew">
                                    <i class="fas fa-plus"></i> Add
                                </a>
                            </div>
                        </div>
                        <div class="col-md-12" id="content">
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-bordered mg-b-0 table-ps_item">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Item Name & Description</th>
                                            <th>Unit</th>
                                            <th>Order Qty</th>
                                            <th>Receive Qty</th>
                                            <th>U.Price</th>
                                            <th>T.Price</th>
                                            <th>Volume</th>
                                            <th>Page</th>
                                            <th style="width:100px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($material_receive->material_receiveDetails)): ?>
                                        <?php $__currentLoopData = $material_receive->material_receiveDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(($key + 1)); ?>

                                                <input type="hidden" value="<?php echo e($value->id); ?>"
                                                    name="material_receive_item_id[]" />
                                                <input type="hidden" value="<?php echo e($value->requisition_id); ?>"
                                                    name="requisition_id[]" />
                                                <input type="hidden" value="<?php echo e($value->job_id); ?>" name="job_id[]" />
                                                <input type="hidden" value="<?php echo e($value->ps_id); ?>" name="ps_id[]" />
                                                <input type="hidden" value="<?php echo e($value->item_id); ?>" name="item_id[]" />
                                                <input type="hidden" value="<?php echo e($value->group_id); ?>" name="group_id[]" />
                                                <input type="hidden" value="<?php echo e($value->subgroup_id); ?>"
                                                    name="subgroup_id[]" />
                                                <input type="hidden" value="<?php echo e($value->unit_id); ?>" name="unit_id[]" />
                                                <input type="hidden" value="<?php echo e($value->sale_price); ?>"
                                                    name="sale_price[]" />
                                                <input type="hidden" value="<?php echo e($value->order_quantity); ?>"
                                                    name="order_quantity[]" />
                                                <input type="hidden" value="<?php echo e($value->receive_quantity); ?>"
                                                    name="receive_quantity[]" />
                                                <input type="hidden" value="<?php echo e($value->total_price); ?>"
                                                    name="total_price[]" />
                                                <input type="hidden" value="<?php echo e($value->branch_id); ?>" name="branch_id[]" />
                                                <input type="hidden" value="<?php echo e($value->warehouse_id); ?>"
                                                    name="warehouse_id[]" />
                                            </td>
                                            <td><?php echo e(isset($value->item)?$value->item->item_name:''); ?></td>
                                            <td><?php echo e(isset($value->item)?isset($value->item->unit)?$value->item->unit->unit_name:'':''); ?>

                                            </td>
                                            <td><?php echo e($value->quantity); ?>

                                            </td>
                                            <td><?php echo e($value->quantity); ?>

                                            </td>
                                            <td><?php echo e($value->sale_price); ?>

                                            </td>
                                            <td><?php echo e($value->total_price); ?>

                                            </td>
                                            <td><?php echo e(isset($value->item)?$value->item->volume_location:''); ?></td>
                                            <td><?php echo e(isset($value->item)?$value->item->page_location:''); ?></td>
                                            <td class="text-center">
                                                <a href="javascript:void(0)"
                                                    data-material_receive_item_id="<?php echo e($value->id); ?>"
                                                    class="btn btn-info btn-sm editRow"><i class="fas fa-edit"></i></a>
                                                <a href="javascript:void(0)"
                                                    data-material_receive_item_id="<?php echo e($value->id); ?>"
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
                        <?php if(isset($material_receive->material_receiveDetails)): ?>
                        <div class="col-md-12 mt-2">
                            <input class="btn btn-danger float-end" type="submit" value="<?php echo e(trans('cruds.save')); ?>">
                        </div>
                        <?php endif; ?>
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
    let select_item, item_id, item_name, group_id, subgroup_id, unit_id, sale_price;
    select_item = $('#item_id :selected');
    item_id = select_item.val();
    item_name = select_item.text();
    group_id = select_item.data('group_id');
    subgroup_id = select_item.data('subgroup_id');
    unit_id = select_item.data('unit_id');
    sale_price = select_item.data('sale_price');
    $('#sale_price').val(sale_price);
    $('#unit_id').val(unit_id).trigger('change');
    branch_id = $('#branch_id').val();
    warehouse_id = $('#warehouse_id').val();
    balance = presentStock(branch_id, warehouse_id, group_id, subgroup_id, item_id, '', '');
    $('#present_stock').val(balance);
})
$(document).on('click', '.btnAddNew', function() {
    let material_receive_item_id, select_item, item_id, item_name, item_code, group_id, group_name, subgroup_id,
        subgroup_name, unit_id,
        unit_name, sale_price, total_price = 0,
        order_quantity, receive_quantity, present_stock,
        html, tr, editRow, deleteRow, page_location, volume_location, branch_id, warehouse_id, ps_id,
        requisition_id, job_id;
    select_item = $('#item_id :selected');
    item_id = select_item.val();
    item_name = select_item.text();
    item_code = select_item.data('item_code');
    unit_id = select_item.data('unit_id');
    group_id = select_item.data('group_id');
    subgroup_id = select_item.data('subgroup_id');
    page_location = select_item.data('page_location');
    volume_location = select_item.data('volume_location');


    ps_id = $('#ps_id').val();
    requisition_id = $('#requisition_id').val();
    job_id = $('#job_id').val();


    item_name = $('#item_id :selected').text();
    group_name = $('#group_id :selected').text();
    unit_name = $('#unit_id :selected').text();
    present_stock = $('#present_stock').val();
    order_quantity = $('#order_quantity').val();
    receive_quantity = $('#receive_quantity').val();
    receive_quantity = +receive_quantity;
    subgroup_name = $('#subgroup_id :selected').text();
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
    branch_id = $('#branch_id').val();
    warehouse_id = $('#warehouse_id').val();
    material_receive_item_id = $('#material_receive_item_id').val();
    // group_id = $('#group_id').val();
    if (!branch_id || !warehouse_id || !item_id || !receive_quantity) {
        SWAL_ALERT("", "");
        return false;
    }
    //subgroup_id = $('#subgroup_id').val();
    //unit_id = $('#unit_id').val();
    sale_price = $('#sale_price').val();
    sale_price = +sale_price;
    total_price = receive_quantity * sale_price;
    html = '<input type="hidden" value="' + material_receive_item_id + '" name="material_receive_item_id[]"/>';
    html += '<input type="hidden" value="' + ps_id + '" name="ps_id[]"/>';
    html += '<input type="hidden" value="' + requisition_id + '" name="requisition_id[]"/>';
    html += '<input type="hidden" value="' + job_id + '" name="job_id[]"/>';
    html += '<input type="hidden" value="' + item_id + '" name="item_id[]"/>';
    html += '<input type="hidden" value="' + group_id + '" name="group_id[]"/>';
    html += '<input type="hidden" value="' + subgroup_id + '" name="subgroup_id[]"/>';
    html += '<input type="hidden" value="' + unit_id + '" name="unit_id[]"/>';
    html += '<input type="hidden" value="' + order_quantity + '" name="order_quantity[]"/>';
    html += '<input type="hidden" value="' + receive_quantity + '" name="receive_quantity[]"/>';
    html += '<input type="hidden" value="' + sale_price + '" name="sale_price[]"/>';
    html += '<input type="hidden" value="' + total_price + '" name="total_price[]"/>';
    html += '<input type="hidden" value="' + branch_id + '" name="branch_id[]"/>';
    html += '<input type="hidden" value="' + warehouse_id + '" name="warehouse_id[]"/>';

    editRow = '<a href="javascript:void(0)" data-material_receive_item_id = "' + material_receive_item_id +
        '" class="btn btn-info btn-sm editRow"><i class="fas fa-edit"></i></a>';
    deleteRow = '<a href="javascript:void(0)" data-material_receive_item_id = "' + material_receive_item_id +
        '" class="btn btn-danger btn-sm deleteRow"><i class="fas fa-times"></i></a>';

    tr = '<tr>'
    tr += '<td class="serial"></td>'
    tr += '<td>' + html + item_name + '</td>'
    tr += '<td>' + unit_name + '</td>'
    tr += '<td style="text-align:right;">' + order_quantity + '</td>'
    tr += '<td style="text-align:right;">' + receive_quantity + '</td>'
    tr += '<td style="text-align:right;">' + sale_price + '</td>'
    tr += '<td style="text-align:right;">' + total_price + '</td>'
    tr += '<td>' + volume_location + '</td>'
    tr += '<td>' + page_location + '</td>'
    tr += '<td style="text-align:center">' + editRow + ' ' + deleteRow + '</td>'
    tr += '</tr>';
    $('#draftbox').show();
    $('.submit-div').show();
    if (prev_tr != '') {
        prev_tr.replaceWith(tr);
        prev_tr = '';
    } else {
        $('table.table-ps_item tbody').append(tr);
    }
    clearField();
})

$(document).on('click', '.editRow', function() {
    let material_receive_item_id, group_id, subgroup_id, item_id = 0,
        unit_id, sale_price, tr, branch_id, warehouse_id, ps_id, requisition_id, job_id;
    tr = $(this).closest('tr');
    prev_tr = tr;
    material_receive_item_id = tr.find('input[name="material_receive_item_id[]"]').val();
    ps_id = tr.find('input[name="ps_id[]"]').val();
    requisition_id = tr.find('input[name="requisition_id[]"]').val();
    job_id = tr.find('input[name="job_id[]"]').val();
    item_id = tr.find('input[name="item_id[]"]').val();
    group_id = tr.find('input[name="group_id[]"]').val();
    subgroup_id = tr.find('input[name="subgroup_id[]"]').val();
    unit_id = tr.find('input[name="unit_id[]"]').val();
    order_quantity = tr.find('input[name="order_quantity[]"]').val();
    receive_quantity = tr.find('input[name="receive_quantity[]"]').val();
    sale_price = tr.find('input[name="sale_price[]"]').val();
    total_price = tr.find('input[name="total_price[]"]').val();
    branch_id = tr.find('input[name="branch_id[]"]').val();
    warehouse_id = tr.find('input[name="warehouse_id[]"]').val();
    $('#material_receive_item_id').val(material_receive_item_id);
    $('#ps_id').val(ps_id);
    $('#requisition_id').val(requisition_id);
    $('#job_id').val(job_id);
    // console.log(item_id)

    $('#order_quantity').val(order_quantity);
    $('#receive_quantity').val(receive_quantity);
    $('#group_id').val(group_id).trigger('change');
    $('#branch_id').val(branch_id).trigger('change');
    $('#warehouse_id').val(warehouse_id).trigger('change');
    setTimeout(() => {
        $('#subgroup_id').val(subgroup_id).trigger('change');
    }, 1000);
    setTimeout(() => {
        console.log(item_id)
        $('#item_id').val(item_id).trigger('change');
    }, 2000);
    setTimeout(() => {
        $('#sale_price').val(sale_price);
        $('#unit_id').val(unit_id).trigger('change');
    }, 2500);
    $('#total_price').val(total_price);
})
$(document).on('click', '.deleteRow', function() {
    let material_receive_item_id, row, msg;
    material_receive_item_id = $(this).data('material_receive_item_id');
    row = $(this).closest('tr');
    msg = confirm('Are you sure to delete this record?');
    if (msg) {
        if (material_receive_item_id > 0) {
            formUrl = "<?php echo e(route('admin.crud.remove')); ?>";
            formData = {
                table: 'RequisitionDetails',
                column: 'id',
                value: material_receive_item_id
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
        setSerial('table-ps_item');
    }
    var rowCount = $('.table-ps_item tbody>tr').length;
    if (rowCount <= 0) {
        $('.submit-div').hide();
    } else {
        $('.submit-div').show();
    }
})

function clearField() {
    $('#material_receive_item_id').val('0');
    $('#item_id').val('').trigger('change');
    //$('#group_id').val('').trigger('change');
    $('#unit_id').val('').trigger('change');
    $('#order_quantity').val('');
    $('#receive_quantity').val('');
    //$('#subgroup_id').val('').trigger('change');
    $('#sale_price').val('');
    $('#ps_id').val('');
    $('#requisition_id').val('');
    $('#job_id').val('');
    setSerial('table-ps_item');
}

$(document).on('change', '#ps_id_search', function() {
    let ps_id, url;
    ps_id = $(this).val();
    if (!ps_id) {
        $('#content').empty();
        $('#requisition_order_no').val('');
        $('#requisition_order_date').val('');
        $('#job_no').val('');
        return;
    }
    url = '/admin/main_warehouse_management/material_receive/initialize';
    $.ajax({
            async: false,
            headers: {
                'x-csrf-token': _token
            },
            method: 'POST',
            url: url,
            data: {
                ps_id: ps_id
            }
        })
        .done(function(data) {
            if (data) {
                $('#content').html(data.page);
                $('#requisition_order_no').val(data.requisition_codes);
                $('#requisition_order_date').val(data.requisition_dates);
                $('#job_no').val(data.job_names);
            }
        })
    /*     setTimeout(() => {
            GenerateCode();
        }, 1000); */
})

$(document).on('change', '#mrfor_id', function(params) {
    let mrfor_id, mrfor, where = [];
    mrfor_id = $(this).val();
    mrfor = $('#mrfor_id :selected').text();
    where.push(['mrfor_id', '=', mrfor_id]);
    prefix = mrfor.substring(0, 3);
    model = 'MaterialReceive';
    field = 'material_receive_code';
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
            $('#material_receive_code').val(data);
        })

})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nayem/Documents/projects/store_management/resources/views/admin/material_receives/create.blade.php ENDPATH**/ ?>