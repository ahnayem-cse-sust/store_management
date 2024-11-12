
<?php $__env->startSection('content'); ?>
<div class="row row-sm">
    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card border custom-card">
            <div class="card-header custom-card-header">
                <h5 class="main-content-label mb-0">
                    <?php echo e(trans('cruds.product_stock_report')); ?>

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
                <form action="/admin/report_management/generate-product-stock-report" method="GET">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-10 tx-semibold"><?php echo e(__('cruds.group')); ?>

                                </p>
                                <select id="group_id" name="group_id" class="form-control select2">
                                    <?=options('groups', array(), array(), 'id', 'group_name', 'id', 'asc', trans('cruds.select'), isset($group_id) ? $group_id : 0)?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('subgroup_id') ? 'has-error' : ''); ?>">
                                <p class="mg-b-10 tx-semibold"><?php echo e(__('cruds.subgroup')); ?>

                                </p>
                                <select id="subgroup_id" name="subgroup_id" class="form-control select2">
                                    <?=options('subgroups', array(), array(), 'id', 'subgroup_name', 'id', 'asc', trans('cruds.select'), isset($subgroup_id) ? $subgroup_id : 0)?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-10 tx-semibold"><?php echo e(__('cruds.item_name')); ?>

                                </p>
                                <select id="item_id" name="item_id" class="form-control select2">
                                    <?=options('items', array(), array('item_code', 'item_name'), 'id', '', 'id', 'asc', trans('cruds.select'), isset($item_id) ? $item_id : 0)?>
                                </select>
                                <?php if($errors->has('item_id')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('item_id')); ?>

                                </em>
                                <?php endif; ?>
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
                <div>
                    <table class="table table-bordered">
                        <thead>
                            <th>SL </th>
                            <th>Product </th>
                            <th>Group </th>
                            <th>Product Sub-Group </th>
                            <th>Product Item Unit </th>
                            <th>MS </th>
                            <th>TS </th>
                            <th>Card </th>
                            <th>Damage</th>
                            
                        </thead>
                        <tbody>
                            <?php if(isset($items)): ?>
                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($key +1); ?></td>
                                <td>
                                    <a href="/admin/inventory_management/item/<?php echo e($value->id); ?>" target="_blank">
                                    <?php echo e($value->item_code . ' - ' . $value->item_name); ?>

                                </a>
                                </td>
                                <td><?php echo e(isset($value->group)?$value->group->group_name:''); ?></td>
                                <td><?php echo e(isset($value->subgroup)?$value->subgroup->subgroup_name:''); ?></td>
                                <td><?php echo e(isset($value->unit)?$value->unit->unit_name:''); ?></td>
                                <td class="text-center"><?php echo e($value->ms); ?></td>
                                
                                <td class="text-center"><?php echo e($value->ts); ?></td>
                                <td class="text-center"><?php echo e($value->card_quantity); ?></td>
                                <td class="text-center"><?php echo e($value->demage_quantity); ?></td>
                                

                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nayem/Documents/projects/store_management/resources/views/admin/product_stock_report/product_stock_report_index.blade.php ENDPATH**/ ?>