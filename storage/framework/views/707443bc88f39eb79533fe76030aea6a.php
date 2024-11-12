
<?php $__env->startSection('content'); ?>

<div class="row row-sm">
    <div class="col-md-4 col-xl-4 col-xs-12 col-sm-4">
        <div class="card border custom-card">
            <div class="card-header custom-card-header">
                <h5 class="main-content-label mb-0"><?php echo e(trans('cruds.create')); ?>

                    <?php echo e(trans('cruds.group')); ?></h5>
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
                <form action="<?php echo e(route('admin.group.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <p class="mg-b-10 tx-semibold"><?php echo e(__('cruds.group_code')); ?> (<span
                                class="required">*</span>)
                        </p>
                        <input type="text"
                            class="form-control unique_code <?php echo e($errors->has('group_code') ? 'is-invalid' : ''); ?>"
                            name="group_code" id="group_code"
                            placeholder="<?php echo e(__('cruds.group_code')); ?>" data-model="Group" data-prefix="GR" data-update_id="0" required>
                        <?php if($errors->has('group_code')): ?>
                        <em class="invalid-feedback">
                            <?php echo e($errors->first('group_code')); ?>

                        </em>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <p class="mg-b-10 tx-semibold"><?php echo e(__('cruds.group_name')); ?> (<span
                                class="required">*</span>)
                        </p>
                        <input type="text"
                            class="form-control  <?php echo e($errors->has('group_name') ? 'is-invalid' : ''); ?>"
                            name="group_name" id="group_name"
                            placeholder="<?php echo e(__('cruds.group_name')); ?>" required>
                        <?php if($errors->has('group_name')): ?>
                        <em class="invalid-feedback">
                            <?php echo e($errors->first('group_name')); ?>

                        </em>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <p class="mg-b-10 tx-semibold"><?php echo e(__('cruds.group_numeric_name')); ?> (<span
                                class="required">*</span>)
                        </p>
                        <input type="text"
                            class="form-control  <?php echo e($errors->has('group_numeric_name') ? 'is-invalid' : ''); ?>"
                            name="group_numeric_name" id="group_numeric_name"
                            placeholder="<?php echo e(__('cruds.group_numeric_name')); ?>" required>
                        <?php if($errors->has('group_numeric_name')): ?>
                        <em class="invalid-feedback">
                            <?php echo e($errors->first('group_numeric_name')); ?>

                        </em>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <p class="mg-b-10 tx-semibold"><?php echo e(__('cruds.description')); ?> 
                        </p>
                        <input type="text"
                            class="form-control  <?php echo e($errors->has('description') ? 'is-invalid' : ''); ?>"
                            name="description" id="description"
                            placeholder="<?php echo e(__('cruds.description')); ?>">
                        <?php if($errors->has('description')): ?>
                        <em class="invalid-feedback">
                            <?php echo e($errors->first('description')); ?>

                        </em>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="update_id" id="update_id" value="0">
                        <button class="btn ripple btn-warning update" type="submit"><?php echo e(__('cruds.submit')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8 col-xl-8 col-xs-8 col-sm-8">
        <div class="card border custom-card">
            <div class="card-header custom-card-header">
                <h5 class="main-content-label mb-0"><?php echo e(trans('cruds.group')); ?>

                    <?php echo e(trans('cruds.list')); ?></h5>
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
                <div class="table-responsive">
                    <table class=" table table-bordered table-striped table-hover datatable datatable-Income">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    <?php echo e(trans('cruds.actions')); ?>

                                </th>
                                <th><?php echo e(trans('cruds.group_code')); ?></th>
                                <th><?php echo e(trans('cruds.group_name')); ?></th>
                                <th><?php echo e(trans('cruds.group_numeric_name')); ?></th>
                                <th><?php echo e(trans('cruds.description')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr data-entry-id="<?php echo e($group->id); ?>">
                                <td>

                                </td>
                                <td>
                                    <?php if(show()): ?>
                                    <a class="btn btn-xs btn-primary"
                                        href="<?php echo e(route('admin.group.show', $group->id)); ?>">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <?php endif; ?>

                                    <?php if(edit()): ?>
                                    <a class="btn btn-xs btn-info editAction" href="javascript:void(0)"
                                        data-table="Group" data-column="id" data-value="<?php echo e($group->id); ?>">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <?php endif; ?>

                                    <?php if(delete()): ?>
                                    <form action="<?php echo e(route('admin.group.destroy', $group->id)); ?>"
                                        method="POST" onsubmit="return confirm('<?php echo e(trans('cruds.areYouSure')); ?>');"
                                        style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                        <button type="submit" class="btn btn-xs btn-danger">
                                            <i class="fas fa-trash"></i></button>
                                    </form>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($group->group_code ?? ''); ?></td>
                                <td><?php echo e($group->group_name ?? ''); ?></td>
                                <td><?php echo e($group->group_numeric_name ?? ''); ?></td>
                                <td><?php echo e($group->description ?? ''); ?></td>
                                
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
    let route = "<?php echo e(route('admin.inventory_management.group.massDestroy')); ?>";
    let hasPermission = 0;
    <?php if (delete()) {?>
    hasPermission = 1;
    <?php }?>
    deleteSelected(route, hasPermission);
})

$(document).on("click", ".editAction", function() {
    let response = editAction(this);
    console.log(response);
    $("#update_id").val(response.id);
    $("#group_code").attr("data-update_id",response.id);
    $("#group_code").val(response.group_code);
    $("#group_name").val(response.group_name);
    $("#group_numeric_name").val(response.group_numeric_name);
    $("#description").val(response.description);
    changeSubmitButtonCaption();
})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nayem/Documents/projects/store_management/resources/views/admin/group/index.blade.php ENDPATH**/ ?>