
<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('cruds.create')); ?> <?php echo e(trans('cruds.role')); ?>

    </div>
    <style>
    .form-check-label {
        text-transform: capitalize;
    }
    </style>

    <div class="card-body">
        <form action="<?php echo e(route("admin.roles.store")); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-group <?php echo e($errors->has('title') ? 'has-error' : ''); ?>">
                <label for="title"><?php echo e(trans('cruds.role')); ?> (<span class="required">*</span>) </label>
                <input type="text" id="title" name="title" class="form-control"
                    value="<?php echo e(old('title', isset($role) ? $role->title : '')); ?>" required>
                <input type="hidden" name="update_id" id="update_id" value="<?php echo e(isset($role)?$role->id:0); ?>">
                <?php if($errors->has('title')): ?>
                <em class="invalid-feedback">
                    <?php echo e($errors->first('title')); ?>

                </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('cruds.role')); ?>

                </p>
            </div>

            <div class="row">
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-2"><?php echo e(__('cruds.access')); ?></div>
                <div class="col-md-2"><?php echo e(__('cruds.create')); ?></div>
                <div class="col-md-2"><?php echo e(__('cruds.edit')); ?></div>
                <div class="col-md-2"><?php echo e(__('cruds.delete')); ?></div>
                <div class="col-md-2"><?php echo e(__('cruds.show')); ?></div>
            </div>
            <?php
            $lang = session('language');
            if (!isset($lang) || empty($lang)) {
            $lang = 'en';
            }
            ?>

            <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row">
                <?php $checked = '';
                if (isset($role)) {
                if (in_array($permission->p_id, $rolePermissions)) {
                $checked = 'checked';
                } else {
                $checked = '';
                }
                }
                ?>
                <div class="col-md-12">
                    <div class="form-check">
                        <input <?php echo e($checked); ?> class="form-check-input root_parent_menu_<?php echo e($permission->menu_id); ?>"
                            data-menu_id="<?php echo e($permission->menu_id); ?>" data-menu_type="main_menu" type="checkbox"
                            value="<?php echo e($permission->p_id); ?>" name="permission_id[]" id="permissions_<?php echo e($permission->p_id); ?>">
                        <label class="form-check-label" for="permissions_<?php echo e($permission->p_id); ?>">
                            <?php echo e($permission->$lang); ?>

                        </label>
                    </div>
                </div>
            </div>
            <?php if(count($permission->sub_permissions)): ?>
            <div class="row" style="margin-left: 10px;">
                <?php $__currentLoopData = $permission->sub_permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $checked = '';
                if (isset($role)) {
                if (in_array($sub_permission->p_id, $rolePermissions)) {
                $checked = 'checked';
                } else {
                $checked = '';
                }
                }
                ?>
                <div class="col-md-2">
                    <div class="form-check">
                        <input <?php echo e($checked); ?>

                            class="form-check-input sub_menu_<?php echo e($sub_permission->menu_id); ?> main_menu_<?php echo e($permission->menu_id); ?> parent_menu_<?php echo e($permission->menu_id); ?>"
                            type="checkbox" data-menu_id="<?php echo e($sub_permission->menu_id); ?>" data-menu_type="sub_menu"
                            value="<?php echo e($sub_permission->p_id); ?>" name="permission_id[]"
                            id="permissions_<?php echo e($sub_permission->p_id); ?>">
                        <label class="form-check-label" for="permissions_<?php echo e($sub_permission->p_id); ?>">
                            <?php echo e($sub_permission->$lang); ?>

                        </label>
                    </div>
                </div>
                <?php $__currentLoopData = $sub_permission->sub_sub_permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_sub_permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $checked = '';
                if (isset($role)) {
                if (in_array($sub_sub_permission->id, $rolePermissions)) {
                $checked = 'checked';
                } else {
                $checked = '';
                }
                }
                ?>
                <div class="col-md-2">
                    <div class="form-check">
                        <input <?php echo e($checked); ?>

                            class="form-check-input sub_menu_<?php echo e($sub_sub_permission->menu_id); ?> main_menu_<?php echo e($permission->menu_id); ?> parent_menu_<?php echo e($permission->menu_id); ?>"
                            type="checkbox" value="<?php echo e($sub_sub_permission->id); ?>" name="permission_id[]"
                            id="permissions_<?php echo e($sub_sub_permission->id); ?>">
                        <label class="form-check-label" for="permissions_<?php echo e($sub_sub_permission->id); ?>"
                            style="display:none;">
                            <?php echo e(str_replace('_',' ',$sub_sub_permission->title)); ?>

                        </label>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php endif; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div>
                <input class="btn ripple btn-success" type="submit" value="<?php echo e(trans('cruds.save')); ?>">
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>
<script>
$(function() {
    $(document).on("click", "input[type=checkbox]", function() {
        let elm, idmenu_type, main_menu;
        elm = $(this);
        id = elm.data('menu_id');
        menu_type = elm.data('menu_type');
        if (menu_type) {
            $('.' + menu_type + '_' + id).not(this).prop('checked', this.checked);
        }
        main_menu = $(this).attr('class').split(' ')[3];
        // $('.root_' + main_menu).not(this).prop('checked', this.checked);
    })
})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nayem/Documents/projects/store_management/resources/views/admin/roles/create.blade.php ENDPATH**/ ?>