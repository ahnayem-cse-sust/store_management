
<?php $__env->startSection('content'); ?>
<div class="row row-sm">
    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card border custom-card">
            <div class="card-header custom-card-header">
                <h5 class="main-content-label mb-0">
                    <?php echo e(trans('cruds.create')); ?> <?php echo e(trans('cruds.inspector')); ?>

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
                <form action="<?php echo e(route("admin.inspector.store")); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('inspector_code') ? 'has-error' : ''); ?>">
                                <p class="mg-b-10 tx-semibold"><?php echo e(trans('cruds.inspector_code')); ?> (<span
                                        class="required">*</span>)</p>
                                <input type="text" id="inspector_code" name="inspector_code" data-model="Inspector"
                                    data-prefix="IN" data-update_id="<?php echo e(isset($inspector) ? $inspector->id : 0); ?>"
                                    class="form-control unique_code" placeholder="<?php echo e(trans('cruds.inspector_code')); ?>"
                                    value="<?php echo e(old('inspector_code', isset($inspector) ? $inspector->inspector_code : '')); ?>"
                                    required>
                                <?php if($errors->has('inspector_code')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('inspector_code')); ?>

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
                                <p class="mg-b-10 tx-semibold"><?php echo e(__('cruds.section_name')); ?> (<span
                                        class="required">*</span>)
                                </p>
                                <select id="section_id" name="section_id" class="form-control select2" required>
                                    <?=options('sections', array(), array(), 'id', 'section_name', 'id', 'asc', trans('cruds.select'), isset($inspector) ? $inspector->section_id : 0)?>
                                </select>
                                <?php if($errors->has('section_id')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('section_id')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('inspector_name') ? 'has-error' : ''); ?>">
                                <p class="mg-b-10 tx-semibold"><?php echo e(trans('cruds.inspector_name')); ?> (<span
                                        class="required">*</span>)</p>
                                <input type="text" id="inspector_name" name="inspector_name" class="form-control"
                                    placeholder="<?php echo e(trans('cruds.inspector_name')); ?>"
                                    value="<?php echo e(old('inspector_name', isset($inspector) ? $inspector->inspector_name : '')); ?>"
                                    required>
                                <?php if($errors->has('inspector_name')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('inspector_name')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('contact_no') ? 'has-error' : ''); ?>">
                                <p class="mg-b-10 tx-semibold"><?php echo e(trans('cruds.contact_no')); ?></p>
                                <input type="text" id="contact_no" name="contact_no" class="form-control"
                                    placeholder="<?php echo e(trans('cruds.contact_no')); ?>"
                                    value="<?php echo e(old('contact_no', isset($inspector) ? $inspector->contact_no : '')); ?>">
                                <?php if($errors->has('contact_no')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('contact_no')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                                <p class="mg-b-10 tx-semibold"><?php echo e(trans('cruds.email')); ?></p>
                                <input type="text" id="email" name="email" class="form-control"
                                    placeholder="<?php echo e(trans('cruds.email')); ?>"
                                    value="<?php echo e(old('email', isset($inspector) ? $inspector->email : '')); ?>">
                                <?php if($errors->has('email')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('email')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <input type="hidden" name="update_id" id="update_id"
                                value="<?php echo e(isset($inspector)?$inspector->id:0); ?>">
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

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nayem/Documents/projects/store_management/resources/views/admin/inspectors/create.blade.php ENDPATH**/ ?>