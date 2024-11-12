
<?php $__env->startSection('content'); ?>
<div class="row row-sm">
    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card border custom-card">
            <div class="card-header custom-card-header">
                <h5 class="main-content-label mb-0">
                    <?php echo e(trans('cruds.create')); ?> <?php echo e(trans('cruds.user')); ?>

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
                <form action="<?php echo e(route("admin.users.store")); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group <?php echo e($errors->has('user_code') ? 'has-error' : ''); ?>">
                                <label for="user_code"><?php echo e(trans('cruds.user_code')); ?> (<span
                                        class="required">*</span>)</label>
                                <input type="text" id="user_code" name="user_code"  data-model="User" data-prefix="EMP" data-update_id="<?php echo e(isset($user) ? $user->user_code : 0); ?>"  class="form-control unique_code"
                                    value="<?php echo e(old('user_code', isset($user) ? $user->user_code : '')); ?>" required>
                                <?php if($errors->has('user_code')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('user_code')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group <?php echo e($errors->has('roles') ? 'has-error' : ''); ?>">
                                <label for="roles"><?php echo e(trans('cruds.user_role')); ?> (<span class="required">*</span>)
                                    
                                </label>
                                <select name="roles[]" id="roles" class="form-control select2" required>
                                    <option value="">--Select--</option>
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $roles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($id); ?>"
                                        <?php echo e((in_array($id, old('roles', [])) || isset($user) && $user->roles->contains($id)) ? 'selected' : ''); ?>>
                                        <?php echo e($roles); ?>

                                    </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('roles')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('roles')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group <?php echo e($errors->has('acl') ? 'has-error' : ''); ?>">
                                <label for="acl"><?php echo e(trans('cruds.acl')); ?> (<span
                                        class="required">*</span>)
                                    <span class="btn btn-info btn-xs select-all"><?php echo e(trans('cruds.select_all')); ?></span>
                                    <span class="btn btn-info btn-xs deselect-all"><?php echo e(trans('cruds.deselect_all')); ?></span>
                                </label>
                                <select id="acl" name="acl[]" class="form-control select2-multiple" multiple required>
                                    <?=options('branches', array(), array(), 'id', 'short_name', 'id', 'asc', '', isset($user)?$user->acl:[1])?>
                                </select>
                                <?php if($errors->has('acl')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('acl')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group <?php echo e($errors->has('office_id') ? 'has-error' : ''); ?>">
                                <label for="office_id"><?php echo e(trans('cruds.entry_office')); ?> (<span
                                        class="required">*</span>)
                                </label>
                                <select id="office_id" name="office_id" class="form-control select2" required>
                                    <?=options('branches', array(), array(), 'id', 'short_name', 'id', 'asc', '',1)?>
                                </select>
                                <?php if($errors->has('office_id')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('office_id')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group <?php echo e($errors->has('section_id') ? 'has-error' : ''); ?>">
                                <label for="section_id"><?php echo e(trans('cruds.section')); ?> (<span
                                        class="required">*</span>)
                                </label>
                                <select id="section_id" name="section_id" class="form-control select2" required>
                                    <?=options('sections', array(), array(), 'id', 'section_name', 'id', 'asc', trans('cruds.select'), isset($user) ? $user->section_id : '')?>
                                </select>
                                <?php if($errors->has('section_id')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('section_id')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                                <label for="name"><?php echo e(trans('cruds.user_name')); ?> (<span
                                        class="required">*</span>)</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    value="<?php echo e(old('name', isset($user) ? $user->name : '')); ?>" required>
                                <?php if($errors->has('name')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('name')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group <?php echo e($errors->has('designation_id') ? 'has-error' : ''); ?>">
                                <label for="designation_id"><?php echo e(trans('cruds.designation')); ?> (<span
                                        class="required">*</span>)
                                </label>
                                <select id="designation_id" name="designation_id" class="form-control select2" required>
                                    <?=options('designations', array(), array(), 'id', 'designation_name', 'id', 'asc', trans('cruds.select'), isset($user) ? $user->designation_id : '')?>
                                </select>
                                <?php if($errors->has('designation_id')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('designation_id')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group <?php echo e($errors->has('epf_no') ? 'has-error' : ''); ?>">
                                <label for="epf_no"><?php echo e(trans('cruds.epf_no')); ?> (<span
                                        class="required">*</span>)</label>
                                <input type="text" id="epf_no" name="epf_no" class="form-control"
                                    value="<?php echo e(old('epf_no', isset($user) ? $user->epf_no : '')); ?>" required>
                                <?php if($errors->has('epf_no')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('epf_no')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group <?php echo e($errors->has('mobile_no') ? 'has-error' : ''); ?>">
                                <label for="mobile_no"><?php echo e(trans('cruds.mobile_no')); ?> (<span
                                        class="required">*</span>)</label>
                                <input type="text" id="mobile_no" name="mobile_no" class="form-control mobile-number"
                                    value="<?php echo e(old('mobile_no', isset($user) ? $user->mobile_no : '')); ?>" required>
                                <?php if($errors->has('name')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('mobile_no')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                                <label for="email"><?php echo e(trans('cruds.email')); ?> (<span class="required">*</span>)
                                </label>
                                <input type="email" id="email" name="email" class="form-control"
                                    value="<?php echo e(old('email', isset($user) ? $user->email : '')); ?>" required>
                                <?php if($errors->has('email')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('email')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
                                <label for="password"><?php echo e(trans('cruds.password')); ?> (<span
                                        class="required">*</span>)</label>
                                <input type="password" id="password" name="password" value="<?php echo e(isset($user)?$user->human_password:''); ?>" class="form-control" required>
                                <?php if($errors->has('password')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('password')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group <?php echo e($errors->has('signature') ? 'has-error' : ''); ?>">
                                <label for="signature"><?php echo e(trans('cruds.signature')); ?></label>
                                <input type="file" name="signature" id="signature"
                                    class="form-control">
                                <?php if($errors->has('signature')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('signature')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group <?php echo e($errors->has('profile_photo') ? 'has-error' : ''); ?>">
                                <label for="profile_photo"><?php echo e(trans('cruds.profile_photo')); ?></label>
                                <input type="file" name="profile_photo" id="profile_photo"
                                    class="form-control">
                                <?php if($errors->has('profile_photo')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('profile_photo')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <input type="hidden" name="update_id" id="update_id" value="<?php echo e(isset($user)?$user->id:0); ?>">
                            <input class="btn btn-danger float-start mt-4" type="submit" value="<?php echo e(trans('cruds.save')); ?>">
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
    $(document).on('change','#acl_country',function (params) {
        let acl_country,url ;
        acl_country = $(this).val();
        acl = $('#acl');
        url = '/admin/user_management/users/get_acl_office';
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
                if(response){
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nayem/Documents/projects/store_management/resources/views/admin/users/create.blade.php ENDPATH**/ ?>