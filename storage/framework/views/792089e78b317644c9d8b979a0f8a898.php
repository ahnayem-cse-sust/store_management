
<?php $__env->startSection('content'); ?>
<?php if(create()): ?>
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="<?php echo e(route("admin.roles.create")); ?>">
            <?php echo e(trans('cruds.add')); ?> <?php echo e(trans('cruds.role')); ?>

        </a>
    </div>
</div>
<?php endif; ?>
<div class="card">
    <div class="card-header">
        <?php echo e(trans('cruds.role')); ?> <?php echo e(trans('cruds.list')); ?>

    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Role">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            <?php echo e(trans('cruds.sl')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.role')); ?>

                        </th>
                        <!-- <th>
                            <?php echo e(trans('cruds.role.fields.permissions')); ?>

                        </th> -->
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr data-entry-id="<?php echo e($role->id); ?>">
                        <td>

                        </td>
                        <td>
                            <?php echo e(($key + 1)); ?>

                        </td>
                        <td>
                            <?php echo e($role->title ?? ''); ?>

                        </td>
                        <!--  <td>
                                <?php $__currentLoopData = $role->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="badge badge-info"><?php echo e($item->title); ?></span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td> -->
                        <td>
                            <?php if(show()): ?>
                            <a class="btn btn-xs btn-primary" href="<?php echo e(route('admin.roles.show', $role->id)); ?>">
                                <?php echo e(trans('cruds.view')); ?>

                            </a>
                            <?php endif; ?>

                            <?php if(edit()): ?>
                            <a class="btn btn-xs btn-info" href="<?php echo e(route('admin.roles.edit', $role->id)); ?>">
                                <?php echo e(trans('cruds.edit')); ?>

                            </a>
                            <?php endif; ?>

                            <?php if(delete()): ?>
                            <form action="<?php echo e(route('admin.roles.destroy', $role->id)); ?>" method="POST"
                                onsubmit="return confirm('<?php echo e(trans('cruds.areYouSure')); ?>');"
                                style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <input type="submit" class="btn btn-xs btn-danger" value="<?php echo e(trans('cruds.delete')); ?>">
                            </form>
                            <?php endif; ?>

                        </td>

                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>


    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>
<script>
$(function() {
    let route = "<?php echo e(route('admin.user_management.roles.massDestroy')); ?>";
    let hasPermission = 0;
    <?php if (delete()) {?>
    hasPermission = 1;
    <?php }?>
    deleteSelected(route, hasPermission);
})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nayem/Documents/projects/store_management/resources/views/admin/roles/index.blade.php ENDPATH**/ ?>