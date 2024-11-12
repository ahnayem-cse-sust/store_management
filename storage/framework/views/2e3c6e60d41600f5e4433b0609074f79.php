
<?php $__env->startSection('content'); ?>
<div class="row row-sm">
    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card border custom-card">
            <div class="card-header custom-card-header">
                <h5 class="main-content-label mb-0">
                    <?php echo e(trans('cruds.create')); ?> <?php echo e(trans('cruds.job')); ?>

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
                <form action="<?php echo e(route("admin.job.store")); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('job_code') ? 'has-error' : ''); ?>">
                                <p class="mg-b-10 tx-semibold"><?php echo e(trans('cruds.job_code')); ?> (<span
                                        class="required">*</span>)</p>
                                <input type="text" id="job_code" name="job_code" data-model="Job" data-prefix="JN" data-update_id="<?php echo e(isset($job) ? $job->id : 0); ?>" class="form-control unique_code"
                                    placeholder="<?php echo e(trans('cruds.job_code')); ?>"
                                    value="<?php echo e(old('job_code', isset($job) ? $job->job_code : '')); ?>" required>
                                <?php if($errors->has('job_code')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('job_code')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('job_name') ? 'has-error' : ''); ?>">
                                <p class="mg-b-10 tx-semibold"><?php echo e(trans('cruds.job_name')); ?> (<span
                                        class="required">*</span>)</p>
                                <input type="text" id="job_name" name="job_name" class="form-control"
                                    placeholder="<?php echo e(trans('cruds.job_name')); ?>"
                                    value="<?php echo e(old('job_name', isset($job) ? $job->job_name : '')); ?>" required>
                                <?php if($errors->has('job_name')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('job_name')); ?>

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
                            <div class="form-group <?php echo e($errors->has('description') ? 'has-error' : ''); ?>">
                                <p class="mg-b-10 tx-semibold"><?php echo e(trans('cruds.description')); ?></p>
                                <input type="text" id="description" name="description" class="form-control"
                                    placeholder="<?php echo e(trans('cruds.description')); ?>"
                                    value="<?php echo e(old('description', isset($job) ? $job->description : '')); ?>">
                                <?php if($errors->has('description')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('description')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <input type="hidden" name="update_id" id="update_id" value="<?php echo e(isset($job)?$job->id:0); ?>">
                            <input class="btn btn-danger" type="submit" value="<?php echo e(trans('cruds.save')); ?>">
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
    url = '/admin/job_management/jobs/get_acl_office';
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nayem/Documents/projects/store_management/resources/views/admin/jobs/create.blade.php ENDPATH**/ ?>