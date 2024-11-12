
<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="row">
        <div class="col-md-12">
            <div class="card-body">
                <div class="card-header">
                    <?php echo e(trans('cruds.opening_list')); ?>

                </div>
                <div class="table-responsive">
                    <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    <?php echo e(trans('cruds.actions')); ?>

                                </th>
                                <th>
                                    <?php echo e(trans('cruds.opening_code')); ?>

                                </th>
                                <th>
                                    <?php echo e(trans('cruds.opening_date')); ?>

                                </th>
                                <th>
                                    <?php echo e(trans('cruds.warehouse')); ?>

                                </th>
                                <th>
                                    <?php echo e(trans('cruds.group')); ?>

                                </th>
                                <th>
                                    <?php echo e(trans('cruds.subgroup')); ?>

                                </th>
                                <th><?php echo e(__('cruds.item')); ?></th>
                                <th><?php echo e(__('cruds.opening_quantity')); ?></th>
                                <th><?php echo e(__('cruds.opening_price')); ?></th>
                                <th><?php echo e(__('cruds.description')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $openings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $opening): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr data-entry-id="<?php echo e($opening->id); ?>">
                                <td>

                                </td>
                                <td>
                                    <?php if(show()): ?>
                                    <a class="btn btn-xs btn-primary" href="<?php echo e(route('admin.opening.show', $opening->id)); ?>">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <?php endif; ?>
                                    
                                    <?php if(delete()): ?>
                                    <form action="<?php echo e(route('admin.opening.destroy', $opening->id)); ?>" method="POST"
                                        onsubmit="return confirm('<?php echo e(trans('cruds.areYouSure')); ?>');"
                                        style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                        <button type="submit" class="btn btn-xs btn-danger">
                                            <i class="fas fa-trash"></i></button>
                                    </form>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php echo e($opening->opening_code ?? ''); ?>

                                </td>
                                <td>
                                    <?php echo e($opening->opening_date ?? ''); ?>

                                </td>
                                <td>
                                    <?php echo e(isset($opening->warehouse)?$opening->warehouse->warehouse_name:''); ?>

                                </td>
                                <td>
                                    <?php echo e(isset($opening->group)?$opening->group->group_name:''); ?>

                                </td>
                                <td>
                                    <?php echo e(isset($opening->subgroup)?$opening->subgroup->subgroup_name:''); ?>

                                </td>
                                <td>
                                    <?php echo e(isset($opening->item)?$opening->item->item_name:''); ?>

                                </td>
                                <td><?php echo e($opening->opening_quantity ?? ''); ?></td>
                                <td><?php echo e($opening->opening_price ?? ''); ?></td>
                                <td><?php echo e($opening->description ?? ''); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>
<script>
$(function() {
    let route = "<?php echo e(route('admin.inventory_management.opening.massDestroy')); ?>";
    let hasPermission = 0;
    <?php if (delete()) {?>
    hasPermission = 1;
    <?php }?>
    deleteSelected(route, hasPermission);
})

$(document).on("click", ".editAction", function() {
    let response = editAction(this);
    acl = response.acl;
    acl = acl.split(',');
    $("#update_id").val(response.id);
    $("#name").val(response.name);
    $("#email").val(response.email);
    $("#roles").val(response.role_id).trigger('change');
    
    $("#country_id").val(response.country_id).trigger('change');
    setTimeout(() => {
        $("#acl").val(acl).trigger('change');
        $("#office_id").val(response.office_id).trigger('change');
    }, 1000);
})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nayem/Documents/projects/store_management/resources/views/admin/opening/index.blade.php ENDPATH**/ ?>