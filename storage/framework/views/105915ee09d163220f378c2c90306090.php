
<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="row">
        <div class="col-md-12">
            <div class="card-body">
                <div class="card-header">
                    <?php echo e(trans('cruds.challan_list')); ?>

                </div>
                <div class="table-responsive">
                    <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                        <thead>
                            <tr>
                                <th>
                                    <?php echo e(trans('cruds.requisition_code')); ?>

                                </th>
                                <th>
                                    <?php echo e(trans('cruds.sl')); ?>

                                </th>
                                <th>
                                    <?php echo e(trans('cruds.challan_no')); ?>

                                </th>
                                <th>
                                    <?php echo e(trans('cruds.item')); ?>

                                </th>
                                <th><?php echo e(__('cruds.unit')); ?></th>
                                <th><?php echo e(__('cruds.quantity')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $prev_requisition = '' ;
                            $curr_requisition = '' ;
                            $prev_challan = '' ;
                            $curr_challan = '' ;
                            $requisition_row = 0 ;
                            $challan_row = 0 ;
                            $sl = 0 ;
                            ?>
                            <?php $__currentLoopData = $challans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $challan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            $curr_requisition = $challan->requisition_id ;
                            $curr_challan = $challan->challan_id ;
                            if($prev_requisition != $curr_requisition){
                            $requisition_row = $challan->where('requisition_id',$curr_requisition)->count() ;
                            }
                            if($prev_challan != $curr_challan){
                            $challan_row = $challan->where('challan_id',$curr_challan)->count() ;
                            }

                            ?>
                            <tr data-entry-id="<?php echo e($challan->id); ?>">
                                <?php if($prev_requisition != $curr_requisition): ?>
                                <td rowspan="<?php echo e($requisition_row); ?>">
                                    <?php echo e($challan->requisition_code ?? ''); ?>

                                </td>
                                <?php endif; ?>
                                <?php if($prev_challan != $curr_challan): ?>
                                <td rowspan="<?php echo e($challan_row); ?>"><?php echo e((++$sl)); ?></td>
                                <td rowspan="<?php echo e($challan_row); ?>">
                                    <a href="<?php echo e(route('admin.delivery.show', $challan->challan_id)); ?>">
                                        <?php echo e($challan->challan_code ?? ''); ?>

                                    </a>
                                </td>
                                <?php endif; ?>
                                <td>
                                    <?php echo e($challan->item_name ?? ''); ?>

                                </td>
                                <td> <?php echo e($challan->unit_name ?? ''); ?></td>
                                <td><?php echo e($challan->delivered_quantity ?? ''); ?></td>
                            </tr>
                            <?php
                            $prev_requisition = $curr_requisition ;
                            $prev_challan = $curr_challan ;
                            ?>
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


</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nayem/Documents/projects/store_management/resources/views/admin/requision_delivery/index.blade.php ENDPATH**/ ?>