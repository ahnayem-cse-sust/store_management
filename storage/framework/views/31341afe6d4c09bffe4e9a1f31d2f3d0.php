
<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('cruds.show')); ?> <?php echo e(trans('cruds.user')); ?>

    </div>

    <div class="card-body">
        <?php
            $acl = explode(',',$user->acl);
            $acls = \App\Branch::whereIn('id',$acl)->get();
        ?>
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.user_code')); ?>

                        </th>
                        <td>
                            <?php echo e($user->user_code); ?>

                        </td>
                    </tr>
                    <tr>
                        <th style="width:200px;">
                            <?php echo e(trans('cruds.user_role')); ?>

                        </th>
                        <td>
                            <?php echo e(isset($user->role)?$user->role->title:''); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.acl')); ?>

                        </th>
                        <td>
                            <?php $__currentLoopData = $acls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $office): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($office->short_name); ?> <br>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.entry_office')); ?>

                        </th>
                        <td>
                            <?php echo e(isset($user->office)?$user->office->short_name:''); ?>

                         </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.section')); ?>

                        </th>
                        <td>
                            <?php echo e(isset($user->section)?$user->section->section_name:''); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.user_name')); ?>

                        </th>
                        <td>
                            <?php echo e($user->name); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.designation')); ?>

                        </th>
                        <td>
                            <?php echo e(isset($user->designation)?$user->designation->designation_name:''); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.epf_no')); ?>

                        </th>
                        <td>
                            <?php echo e($user->epf_no); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.mobile_no')); ?>

                        </th>
                        <td>
                            <?php echo e($user->mobile_no); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.email')); ?>

                        </th>
                        <td>
                            <?php echo e($user->email); ?>

                        </td>
                    </tr>
                </tbody>
            </table>
            <a class="btn btn-warning ripple" href="<?php echo e(url()->previous()); ?>">
                <?php echo e(trans('cruds.back_to_list')); ?>

            </a>
        </div>

        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
        <div class="tab-content">

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nayem/Documents/projects/store_management/resources/views/admin/users/show.blade.php ENDPATH**/ ?>