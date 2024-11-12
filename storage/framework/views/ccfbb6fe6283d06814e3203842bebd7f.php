
<?php $__env->startSection('content'); ?>
<div class="row row-sm">
    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card border custom-card">
            <div class="card-header custom-card-header">
                <h5 class="main-content-label mb-0">
                    <?php echo e(trans('cruds.create')); ?> <?php echo e(trans('cruds.item')); ?>

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
                <form action="<?php echo e(route("admin.item.store")); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('item_code') ? 'has-error' : ''); ?>">
                                <p class="mg-b-10 tx-semibold"><?php echo e(trans('cruds.item_code')); ?> (<span
                                        class="required">*</span>)</p>
                                <input type="text" id="item_code" name="item_code" data-model="Item" data-prefix="IP" data-update_id="<?php echo e(isset($item) ? $item->id : 0); ?>" class="form-control unique_code"
                                    placeholder="<?php echo e(trans('cruds.item_code')); ?>"
                                    value="<?php echo e(old('item_code', isset($item) ? $item->item_code : '')); ?>" required>
                                <?php if($errors->has('item_code')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('item_code')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('item_name') ? 'has-error' : ''); ?>">
                                <p class="mg-b-10 tx-semibold"><?php echo e(trans('cruds.item_name')); ?> (<span
                                        class="required">*</span>)</p>
                                <input type="text" id="item_name" name="item_name" class="form-control"
                                    placeholder="<?php echo e(trans('cruds.item_name')); ?>"
                                    value="<?php echo e(old('item_name', isset($item) ? $item->item_name : '')); ?>" required>
                                <?php if($errors->has('item_name')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('item_name')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-10 tx-semibold"><?php echo e(__('cruds.group')); ?> (<span class="required">*</span>)
                                </p>
                                <select id="group_id" name="group_id" class="form-control select2" required>
                                    <?=options('groups', array(), array(), 'id', 'group_name', 'id', 'asc', trans('cruds.select'), isset($item) ? $item->group_id : 0)?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('subgroup_id') ? 'has-error' : ''); ?>">
                                <p class="mg-b-10 tx-semibold"><?php echo e(__('cruds.subgroup')); ?> (<span
                                        class="required">*</span>)
                                </p>
                                <select id="subgroup_id" name="subgroup_id" class="form-control select2" required>
                                    <?=options('subgroups', array(), array(), 'id', 'subgroup_name', 'id', 'asc', trans('cruds.select'), isset($item) ? $item->subgroup_id : 0)?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('unit_id') ? 'has-error' : ''); ?>">
                                <p class="mg-b-10 tx-semibold"><?php echo e(__('cruds.unit')); ?> (<span class="required">*</span>)
                                </p>
                                <select id="unit_id" name="unit_id" class="form-control select2" required>
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
                            <div class="form-group <?php echo e($errors->has('manufacturer_id') ? 'has-error' : ''); ?>">
                                <p class="mg-b-10 tx-semibold"><?php echo e(__('cruds.manufacturer')); ?>

                                </p>
                                <select id="manufacturer_id" name="manufacturer_id" class="form-control select2">
                                    <?=options('manufacturers', array(), array(), 'id', 'manufacturer_name', 'id', 'asc', trans('cruds.select'), isset($item) ? $item->manufacturer_id : 0)?>
                                </select>
                                <?php if($errors->has('manufacturer_id')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('manufacturer_id')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('brand_id') ? 'has-error' : ''); ?>">
                                <p class="mg-b-10 tx-semibold"><?php echo e(__('cruds.brand')); ?> 
                                </p>
                                <select id="brand_id" name="brand_id" class="form-control select2">
                                    <?=options('brands', array(), array(), 'id', 'brand_name', 'id', 'asc', trans('cruds.select'), isset($item) ? $item->brand_id : 0)?>
                                </select>
                                <?php if($errors->has('brand_id')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('brand_id')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('model_id') ? 'has-error' : ''); ?>">
                                <p class="mg-b-10 tx-semibold"><?php echo e(__('cruds.model')); ?> 
                                </p>
                                <select id="model_id" name="model_id" class="form-control select2">
                                    <?=options('models', array(), array(), 'id', 'model_name', 'id', 'asc', trans('cruds.select'), isset($item) ? $item->model_id : 0)?>
                                </select>
                                <?php if($errors->has('model_id')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('model_id')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('purchase_price') ? 'has-error' : ''); ?>">
                                <p class="mg-b-10 tx-semibold"><?php echo e(trans('cruds.purchase_price')); ?> (<span class="required">*</span>)</p>
                                <input type="number" id="purchase_price" name="purchase_price" class="form-control"
                                    placeholder="<?php echo e(trans('cruds.purchase_price')); ?>"
                                    value="<?php echo e(old('purchase_price', isset($item) ? $item->purchase_price : 0)); ?>" required>
                                <?php if($errors->has('purchase_price')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('purchase_price')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('cost_price') ? 'has-error' : ''); ?>">
                                <p class="mg-b-10 tx-semibold"><?php echo e(trans('cruds.cost_price')); ?> (<span class="required">*</span>)</p>
                                <input type="number" id="cost_price" name="cost_price" class="form-control"
                                    placeholder="<?php echo e(trans('cruds.cost_price')); ?>"
                                    value="<?php echo e(old('cost_price', isset($item) ? $item->cost_price : 0)); ?>" required>
                                <?php if($errors->has('cost_price')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('cost_price')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('sale_price') ? 'has-error' : ''); ?>">
                                <p class="mg-b-10 tx-semibold"><?php echo e(trans('cruds.sale_price')); ?> (<span class="required">*</span>)</p>
                                <input type="number" id="sale_price" name="sale_price" class="form-control"
                                    placeholder="<?php echo e(trans('cruds.sale_price')); ?>"
                                    value="<?php echo e(old('sale_price', isset($item) ? $item->sale_price : 0)); ?>" required>
                                <?php if($errors->has('sale_price')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('sale_price')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('sku') ? 'has-error' : ''); ?>">
                                <p class="mg-b-10 tx-semibold"><?php echo e(trans('cruds.sku')); ?></p>
                                <input type="text" id="sku" name="sku" class="form-control"
                                    placeholder="<?php echo e(trans('cruds.sku')); ?>"
                                    value="<?php echo e(old('sku', isset($item) ? $item->sku : '')); ?>">
                                <?php if($errors->has('sku')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('sku')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-10 tx-semibold"><?php echo e(__('cruds.branch_name')); ?> (<span
                                        class="required">*</span>)
                                </p>
                                <select id="branch_id" name="branch_id" class="form-control select2" required>
                                    <?=options('branches', array(), array(), 'id', 'short_name', 'id', 'asc', trans('cruds.select'), 1)?>
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
                                <p class="mg-b-10 tx-semibold"><?php echo e(__('cruds.room_name')); ?> 
                                </p>
                                <select id="room_id" name="room_id" class="form-control select2">
                                    <?=options('rooms', array(), array('room_name','room_code'), 'id', '', 'id', 'asc', trans('cruds.select'), isset($item) ? $item->room_id : 0)?>
                                </select>
                                <?php if($errors->has('room_id')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('room_id')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-10 tx-semibold"><?php echo e(__('cruds.rack_name')); ?>

                                </p>
                                <select id="rack_id" name="rack_id" class="form-control select2">
                                    <?=options('racks', array(), array('rack_name','rack_code'), 'id', '', 'id', 'asc', trans('cruds.select'), isset($item) ? $item->rack_id : 0)?>
                                </select>
                                <?php if($errors->has('rack_id')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('rack_id')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-10 tx-semibold"><?php echo e(__('cruds.shelf_name')); ?> 
                                </p>
                                <select id="shelf_id" name="shelf_id" class="form-control select2">
                                    <?=options('shelfs', array(), array('shelf_name','shelf_code'), 'id', '', 'id', 'asc', trans('cruds.select'), isset($item) ? $item->shelf_id : 0)?>
                                </select>
                                <?php if($errors->has('shelf_id')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('shelf_id')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-10 tx-semibold"><?php echo e(__('cruds.page_location')); ?>

                                </p>
                                <select id="page_location" name="page_location" class="form-control select2">
                                    <option value="">--<?php echo e(__('cruds.select')); ?>--</option>
                                    <?=option(range(1,5000),trans('cruds.select'),isset($item) ? ($item->page_location - 1 ) : '')?>
                                </select>
                                <?php if($errors->has('page_location')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('page_location')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <?php
                                $where = [] ;
                                if(isset($item)){
                                    $where[] = ['subgroup_id','=',$item->subgroup_id] ;
                                }
                            ?>
                            <div class="form-group <?php echo e($errors->has('volume_location') ? 'has-error' : ''); ?>">
                                <p class="mg-b-10 tx-semibold"><?php echo e(trans('cruds.volume_location')); ?></p>
                                <select id="volume_location" name="volume_location" class="form-control select2">
                                    <?=options('subgroupvolumes', $where, array(), 'subgroupvolume_name', 'subgroupvolume_name', 'id', 'asc', trans('cruds.select'), isset($item) ? $item->volume_location : '')?>
                                </select>
                                <?php if($errors->has('volume_location')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('volume_location')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('description') ? 'has-error' : ''); ?>">
                                <p class="mg-b-10 tx-semibold"><?php echo e(trans('cruds.description')); ?></p>
                                <input type="text" id="description" name="description" class="form-control"
                                    placeholder="<?php echo e(trans('cruds.description')); ?>"
                                    value="<?php echo e(old('description', isset($item) ? $item->description : '')); ?>">
                                <?php if($errors->has('description')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('description')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        

                        <div class="col-md-3">
                            <input type="hidden" name="update_id" id="update_id" value="<?php echo e(isset($item)?$item->id:0); ?>">
                            <input class="btn btn-danger mt-4" type="submit" value="<?php echo e(trans('cruds.save')); ?>">
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
    $(document).on('change','#room_id',function(){
       let room_id,where = [],select ;
       room_id = $(this).val() ;
       select = "<?php echo e(__('cruds.select')); ?>";
       where.push(['room_id','=',room_id]);
       response = getData("/crud/get","Rack",where,'get',[]);
        options = `<option value=''>${select}</option>`;
        if (response) {
            $.each(response, function(index, value) {
                options +=
                    `<option value='${value.id}'>${value.rack_name} - ${value.rack_code}</option>`;
            })
        }
        $('#rack_id').html(options).trigger('change');
    })
    $(document).on('change','#rack_id',function(){
       let rack_id,where = [],select ;
       rack_id = $(this).val() ;
       select = "<?php echo e(__('cruds.select')); ?>";
       where.push(['rack_id','=',rack_id]);
       response = getData("/crud/get","Shelf",where,'get',[]);
        options = `<option value=''>${select}</option>`;
        if (response) {
            $.each(response, function(index, value) {
                options +=
                    `<option value='${value.id}'>${value.shelf_name} - ${value.shelf_code}</option>`;
            })
        }
        $('#shelf_id').html(options).trigger('change');
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nayem/Documents/projects/store_management/resources/views/admin/items/create.blade.php ENDPATH**/ ?>