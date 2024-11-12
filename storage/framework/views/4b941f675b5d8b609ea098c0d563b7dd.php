
<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="row">
        <div class="col-md-12">
            <div class="card-body">
                <div class="card-header">
                    <?php echo e(trans('cruds.vendor_list')); ?>

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
                                    <?php echo e(trans('cruds.vendor_code')); ?>

                                </th>
                                <th>
                                    <?php echo e(trans('cruds.vendor_name')); ?>

                                </th>
                                <th>
                                    <?php echo e(trans('cruds.contact_person')); ?>

                                </th>
                                <th>
                                    <?php echo e(trans('cruds.email')); ?>

                                </th>
                                <th><?php echo e(__('cruds.phone')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr data-entry-id="<?php echo e($vendor->id); ?>">
                                <td>

                                </td>
                                <td>
                                    <?php if(show()): ?>
                                    <a class="btn btn-xs btn-primary" href="<?php echo e(route('admin.vendor.show', $vendor->id)); ?>">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <?php endif; ?>
                                    <?php if(edit()): ?>
                                    <a class="btn btn-xs btn-info" href="<?php echo e(route('admin.vendor.edit', $vendor->id)); ?>">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <?php endif; ?>
                                    <?php if(delete()): ?>
                                    <form action="<?php echo e(route('admin.vendor.destroy', $vendor->id)); ?>" method="POST"
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
                                    <?php echo e($vendor->vendor_code ?? ''); ?>

                                </td>
                                <td>
                                    <?php echo e($vendor->vendor_name ?? ''); ?>

                                </td>
                                <td>
                                    <?php echo e($vendor->contact_person ?? ''); ?>

                                </td>
                                <td> <?php echo e($vendor->email ?? ''); ?></td>
                                <td><?php echo e($vendor->contact_no ?? ''); ?></td>
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
    let route = "<?php echo e(route('admin.section_requisition_management.vendor.massDestroy')); ?>";
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nayem/Documents/projects/store_management/resources/views/admin/vendors/index.blade.php ENDPATH**/ ?>