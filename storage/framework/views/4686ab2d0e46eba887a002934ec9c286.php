
<?php $__env->startSection('content'); ?>
<div class="row row-sm">
    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card border custom-card">
            <div class="card-header custom-card-header">
                <h5 class="main-content-label mb-0">
                    <?php echo e(trans('cruds.requisition_delivery')); ?>

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
                <form action="<?php echo e(route('admin.delivery.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row justify-content-center">
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-10 tx-semibold"><?php echo e(__('cruds.requisition_no')); ?> (<span
                                        class="required">*</span>)
                                </p>
                                <select id="requisition_id" name="requisition_id" class="form-control select2" required>
                                    <?=options('requisitions', [['status', '=', 'Approved']], array(), 'id', 'requisition_code', 'id', 'desc', trans('cruds.select'), 0)?>
                                </select>
                                <?php if($errors->has('requisition_id')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('requisition_id')); ?>

                                </em>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div id="content">

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
$(document).on('change', '#requisition_id', function() {
    let requisition_id, url;
    requisition_id = $(this).val();
    if (!requisition_id) {
        $('#content').empty();
        return;
    }
    url = '/admin/main_warehouse_management/delivery/initialize';
    $.ajax({
            async: false,
            headers: {
                'x-csrf-token': _token
            },
            method: 'POST',
            url: url,
            data: {
                requisition_id: requisition_id
            }
        })
        .done(function(data) {
            $('#content').html(data);
        })
    /*     setTimeout(() => {
            GenerateCode();
        }, 1000); */
})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nayem/Documents/projects/store_management/resources/views/admin/requision_delivery/create.blade.php ENDPATH**/ ?>