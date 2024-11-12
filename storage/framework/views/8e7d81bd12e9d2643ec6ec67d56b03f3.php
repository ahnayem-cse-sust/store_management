
<?php $__env->startSection('content'); ?>
<div class="row row-sm">
    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card border custom-card">
            <div class="card-header custom-card-header">
                <h5 class="main-content-label mb-0">
                    <?php echo e(trans('cruds.create')); ?> <?php echo e(trans('cruds.party')); ?>

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
                <form action="<?php echo e(route("admin.party.store")); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('party_code') ? 'has-error' : ''); ?>">
                                <p class="mg-b-10 tx-semibold"><?php echo e(trans('cruds.party_code')); ?> (<span
                                        class="required">*</span>)</p>
                                <input type="text" id="party_code" name="party_code" data-model="Party" data-prefix="PR" data-update_id="<?php echo e(isset($party) ? $party->id : 0); ?>" class="form-control unique_code"
                                    placeholder="<?php echo e(trans('cruds.party_code')); ?>"
                                    value="<?php echo e(old('party_code', isset($party) ? $party->party_code : '')); ?>" required>
                                <?php if($errors->has('party_code')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('party_code')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('party_name') ? 'has-error' : ''); ?>">
                                <p class="mg-b-10 tx-semibold"><?php echo e(trans('cruds.party_name')); ?> (<span
                                        class="required">*</span>)</p>
                                <input type="text" id="party_name" name="party_name" class="form-control"
                                    placeholder="<?php echo e(trans('cruds.party_name')); ?>"
                                    value="<?php echo e(old('party_name', isset($party) ? $party->party_name : '')); ?>" required>
                                <?php if($errors->has('party_name')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('party_name')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('address') ? 'has-error' : ''); ?>">
                                <p class="mg-b-10 tx-semibold"><?php echo e(trans('cruds.address')); ?></p>
                                <input type="text" id="address" name="address" class="form-control"
                                    placeholder="<?php echo e(trans('cruds.address')); ?>"
                                    value="<?php echo e(old('address', isset($party) ? $party->address : '')); ?>">
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
                                    value="<?php echo e(old('contact_person', isset($party) ? $party->contact_person : '')); ?>">
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
                                    value="<?php echo e(old('contact_no', isset($party) ? $party->contact_no : '')); ?>">
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
                                    value="<?php echo e(old('email', isset($party) ? $party->email : '')); ?>">
                                <?php if($errors->has('email')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('email')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <input type="hidden" name="update_id" id="update_id" value="<?php echo e(isset($party)?$party->id:0); ?>">
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
$(document).on('change', '#acl_country', function(params) {
    let acl_country, url;
    acl_country = $(this).val();
    acl = $('#acl');
    url = '/admin/party_management/partys/get_acl_office';
    select = "<?php echo e(__('cruds.select')); ?>";
    officeOptions = `<option value=''>${select}</option>`;
    $.ajax({
            async: false,
            headers: {
                'x-csrf-token': _token
            },
            method: 'POST',
            url: url,
            data: {
                acl_country: acl_country,
            }
        })
        .done(function(response) {
            if (response) {
                $.each(response, function(index, value) {
                    officeOptions +=
                        `<option value='${value.id}'>${value.office_name} - ${value.office_name_ar}</option>`;
                })
                acl.html(officeOptions).trigger('change');
            }
        })
})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nayem/Documents/projects/store_management/resources/views/admin/partys/create.blade.php ENDPATH**/ ?>