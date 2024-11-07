
<?php $__env->startSection('content'); ?>
<div class="row row-sm">
    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card border custom-card">
            <div class="card-header custom-card-header">
                <h5 class="main-content-label mb-0">
                    <?php echo e(trans('cruds.create')); ?> <?php echo e(trans('cruds.vendor')); ?>

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
                <form action="<?php echo e(route("admin.vendor.store")); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('vendor_code') ? 'has-error' : ''); ?>">
                                <p class="mg-b-10 tx-semibold"><?php echo e(trans('cruds.vendor_code')); ?> (<span
                                        class="required">*</span>)</p>
                                <input type="text" id="vendor_code" name="vendor_code" data-model="Vendor" data-prefix="SP" data-update_id="<?php echo e(isset($vendor) ? $vendor->id : 0); ?>" class="form-control unique_code"
                                    placeholder="<?php echo e(trans('cruds.vendor_code')); ?>"
                                    value="<?php echo e(old('vendor_code', isset($vendor) ? $vendor->vendor_code : '')); ?>" required>
                                <?php if($errors->has('vendor_code')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('vendor_code')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('vendor_name') ? 'has-error' : ''); ?>">
                                <p class="mg-b-10 tx-semibold"><?php echo e(trans('cruds.vendor_name')); ?> (<span
                                        class="required">*</span>)</p>
                                <input type="text" id="vendor_name" name="vendor_name" class="form-control"
                                    placeholder="<?php echo e(trans('cruds.vendor_name')); ?>"
                                    value="<?php echo e(old('vendor_name', isset($vendor) ? $vendor->vendor_name : '')); ?>" required>
                                <?php if($errors->has('vendor_name')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('vendor_name')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('address') ? 'has-error' : ''); ?>">
                                <p class="mg-b-10 tx-semibold"><?php echo e(trans('cruds.address')); ?></p>
                                <input type="text" id="address" name="address" class="form-control"
                                    placeholder="<?php echo e(trans('cruds.address')); ?>"
                                    value="<?php echo e(old('address', isset($vendor) ? $vendor->address : '')); ?>">
                                <?php if($errors->has('address')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('address')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('contact_person') ? 'has-error' : ''); ?>">
                                <p class="mg-b-10 tx-semibold"><?php echo e(trans('cruds.contact_person')); ?></p>
                                <input type="text" id="contact_person" name="contact_person" class="form-control"
                                    placeholder="<?php echo e(trans('cruds.contact_person')); ?>"
                                    value="<?php echo e(old('contact_person', isset($vendor) ? $vendor->contact_person : '')); ?>">
                                <?php if($errors->has('contact_person')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('contact_person')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('contact_no') ? 'has-error' : ''); ?>">
                                <p class="mg-b-10 tx-semibold"><?php echo e(trans('cruds.contact_no')); ?></p>
                                <input type="text" id="contact_no" name="contact_no" class="form-control"
                                    placeholder="<?php echo e(trans('cruds.contact_no')); ?>"
                                    value="<?php echo e(old('contact_no', isset($vendor) ? $vendor->contact_no : '')); ?>">
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
                                    value="<?php echo e(old('email', isset($vendor) ? $vendor->email : '')); ?>">
                                <?php if($errors->has('email')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('email')); ?>

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
                            <input type="hidden" name="update_id" id="update_id" value="<?php echo e(isset($vendor)?$vendor->id:0); ?>">
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\bitac_ims\resources\views/admin/vendors/create.blade.php ENDPATH**/ ?>