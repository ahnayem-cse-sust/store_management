
<?php $__env->startSection('content'); ?>

<style>
    table tr td span{
    padding: 0 10px;
    border-top: 1px solid #000;
}
</style>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('cruds.show')); ?> <?php echo e(trans('cruds.challan')); ?>

    </div>

    <div class="card-body">
        <div class="mb-2 bg-bisque">
            <br>
            <div>
                <h2 class="text-center">Bangladesh Industrial Technical Assistance Center (BITAC), Dhaka</h2>
                <h3 class="text-center">116 (Kha), Tejgoan Industrial Area, Dhaka-1208</h3>
                <h4 class="text-center"><u>Requisition Delivery</u></h4>
            </div>
            <div class="mb-3" style="width: 80%;margin:0 auto;">
                <table class="table1 table-bordered1 table-striped1" style="width:100%">
                    <tbody>
                        <tr>
                            <th><?php echo e(__('cruds.challan_no')); ?> </th>
                            <td>: <?php echo e($challan->challan_code); ?></td>
                            <th style="width:150px;"><?php echo e(__('cruds.challan_date')); ?></th>
                            <td>: <?php echo e($challan->challan_date); ?></td>
                        </tr>
                        <tr>
                            <th><?php echo e(__('cruds.requisition_code')); ?></th>
                            <td>: <?php echo e(isset($challan->requisition)?$challan->requisition->requisition_code:''); ?></td>
                            <th><?php echo e(__('cruds.requisition_date')); ?></th>
                            <td>: <?php echo e(isset( $challan->requisition)?$challan->requisition->requisition_date:''); ?></td>
                        </tr>
                        <tr>
                            <th><?php echo e(__('cruds.delivery_man')); ?></th>
                            <td>: <?php echo e($challan->delivery_man); ?></td>
                            <th><?php echo e(__('cruds.delivery_place')); ?></th>
                            <td>: <?php echo e($challan->delivery_place); ?></td>
                        </tr>
                        <tr>
                            <th><?php echo e(__('cruds.branch')); ?></th>
                            <td>: <?php echo e(isset($challan->branch)?$challan->branch->short_name:''); ?></td>
                            <th><?php echo e(__('cruds.section')); ?></th>
                            <td>: <?php echo e(isset($challan->section)?$challan->section->section_name:''); ?></td>
                        </tr>
                        <br>
                        <tr>
                            <th><?php echo e(__('cruds.product_receive_by')); ?></th>
                            <td>: <?php echo e(isset($challan->requisition)?$challan->requisition->receive_by:''); ?></td>
                            <th><?php echo e(__('cruds.party')); ?></th>
                            <td>: <?php echo e(isset($challan->party)?$challan->party->party_name:''); ?></td>
                        </tr>
                        <tr>
                            <th><?php echo e(__('cruds.remarks')); ?></th>
                            <td colspan="3">: <?php echo e($challan->description); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <br>
            <div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th><?php echo e(trans('cruds.sl')); ?></th>
                            <th>
                                <?php echo e(trans('cruds.item')); ?>

                            </th>
                            <th><?php echo e(__('cruds.unit')); ?></th>
                            <th><?php echo e(__('cruds.quantity')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($challan->challanDetails)): ?>
                        <?php $__currentLoopData = $challan->challanDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(($key + 1)); ?>

                            </td>
                            <td><?php echo e(isset($value->item)?$value->item->item_name:''); ?></td>
                            <td><?php echo e(isset($value->item)?isset($value->item->unit)?$value->item->unit->unit_name:'':''); ?>

                            </td>
                            <td><?php echo e($value->delivered_quantity); ?>

                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <br>
            <br>
            <div>
                <table width="100%">
                    <tbody>
                        <tr>
                            <td style="width:20%;text-align:center;"><?php echo e($challan->createdBy->name); ?><br/><span>Created By</span><br></td>
                            <td style="width:20%;text-align:center;"><span>Received By</span></td>
                            <td style="width:20%;text-align:center;"><span>Store Keeper</span></td>
                            <td style="width:20%;text-align:center;"><span>Assistant Store Officer</span></td>
                            <td style="width:20%;text-align:center;"><span>Store Officer</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>

            <a class="btn btn-warning ripple" href="<?php echo e(route('admin.delivery.index')); ?>">
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nayem/Documents/projects/store_management/resources/views/admin/requision_delivery/show.blade.php ENDPATH**/ ?>