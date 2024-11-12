
<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="row">
        <div class="col-md-12">
            <div class="card-body">
                <div class="card-header">
                    <?php echo e(trans('cruds.requisition_list')); ?>

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
                                    <?php echo e(trans('cruds.requisition_code')); ?>

                                </th>
                                <th>
                                    <?php echo e(trans('cruds.requisition_date')); ?>

                                </th>
                                <th>
                                    <?php echo e(trans('cruds.section')); ?>

                                </th>
                                <th>
                                    <?php echo e(trans('cruds.branch')); ?>

                                </th>
                                <th>
                                    <?php echo e(trans('cruds.status')); ?>

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $requisitions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $requisition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr data-entry-id="<?php echo e($requisition->id); ?>">
                                <td>

                                </td>
                                <td>
                                    <?php if(show()): ?>
                                    <a class="btn btn-xs btn-primary" href="<?php echo e(route('admin.requisition.show', $requisition->id)); ?>" data-placement="top" data-toggle="tooltip" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <?php endif; ?>

                                    <?php if($requisition->status == 'Pending'): ?>

                                    <?php if(edit()): ?>
                                    <a class="btn btn-xs btn-info" href="<?php echo e(route('admin.requisition.edit', $requisition->id)); ?>" data-placement="top" data-toggle="tooltip" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <?php endif; ?>

                                    <?php if(edit()): ?>
                                    <a class="btn btn-xs btn-warning" href="/admin/section_requisition_management/requisition/approved/<?php echo e($requisition->id); ?>" data-placement="top" data-toggle="tooltip" title="Click to Approved Requisition">
                                        <i class="fas fa-refresh"></i>
                                    </a>
                                    <?php endif; ?>

                                    <?php if(delete()): ?>
                                    <form action="<?php echo e(route('admin.requisition.destroy', $requisition->id)); ?>" method="POST"
                                        onsubmit="return confirm('<?php echo e(trans('cruds.areYouSure')); ?>');"
                                        style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                        <button type="submit" class="btn btn-xs btn-danger" data-placement="top" data-toggle="tooltip" title="Delete">
                                            <i class="fas fa-trash"></i></button>
                                    </form>
                                    <?php endif; ?>

                                    <?php endif; ?>
                                </td>
                                
                                <td>
                                    <?php echo e($requisition->requisition_code ?? ''); ?>

                                </td>
                                <td>
                                    <?php echo e($requisition->requisition_date ?? ''); ?>

                                </td>
                                <td>
                                    <?php echo e(isset($requisition->section)?$requisition->section->section_name:''); ?>

                                </td>
                                <td>
                                    <?php echo e(isset($requisition->branch)?$requisition->branch->short_name:''); ?>

                                </td>
                                <td>
                                    <?php echo e($requisition->status ?? ''); ?>

                                </td>
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
    let route = "<?php echo e(route('admin.section_requisition_management.requisition.massDestroy')); ?>";
    let hasPermission = 0;
    <?php if (delete()) {?>
    hasPermission = 1;
    <?php }?>
    deleteSelected(route, hasPermission);
})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nayem/Documents/projects/store_management/resources/views/admin/requisitions/index.blade.php ENDPATH**/ ?>