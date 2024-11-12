
<?php $__env->startSection('content'); ?>
<style>
    table tr td span {
    padding: 0 10px;
    border-top: 1px solid #000;
}
</style>
<div class="card">
    <div class="card-header">
        <?php echo e(trans('cruds.show')); ?> <?php echo e(trans('cruds.requisition')); ?>

    </div>

    <div class="card-body">
        <div class="mb-2 bg-bisque">
            
            <br>
            <div>
                <h2 class="text-center">Bangladesh Industrial Technical Assistance Center (BITAC), Dhaka</h2>
                <h3 class="text-center">116 (Kha), Tejgoan Industrial Area, Dhaka-1208</h3>
                <h4 class="text-center"><u> Item Requisition Slip </u></h4>
            </div>
            
            
            <div style="width: 80%;margin:0 auto;">
                <table class="table1 table-bordered1 table-striped1"  style="width:100%">
                    <tbody>
                        <tr>
                            <th><?php echo e(__('cruds.requisition_code')); ?></th>
                            <td colspan="3">: <?php echo e($requisition->requisition_code); ?></td>
                        </tr>
                        <tr>
                            <th style="width:215px;"><?php echo e(__('cruds.requisition_date')); ?></th>
                            <td style="width:35%;">: <?php echo e($requisition->requisition_date); ?></td>
                            <th style="width:350px;"><?php echo e(__('cruds.requisition_delivery_date')); ?></th>
                            <td style="width:25%;">: <?php echo e($requisition->requisition_delivery_date); ?></td>
                        </tr>
                        <tr>
                            <th><?php echo e(__('cruds.job_name')); ?></th>
                            <td>: <?php echo e(isset($requisition->job)?$requisition->job->job_name:''); ?></td>
                            <th><?php echo e(__('cruds.party')); ?></th>
                            <td>: <?php echo e(isset($requisition->party)?$requisition->party->party_name:''); ?></td>
                        </tr>
                        <tr>
                            <th><?php echo e(__('cruds.branch')); ?></th>
                            <td>: <?php echo e(isset($requisition->branch)?$requisition->branch->short_name:''); ?></td>
                            <th><?php echo e(__('cruds.section')); ?></th>
                            <td>: <?php echo e(isset($requisition->section)?$requisition->section->section_name:''); ?></td>
                        </tr>
                        <tr>
                            <th><?php echo e(__('cruds.created_by')); ?></th>
                            <td>: <?php echo e(isset($requisition->createdBy)?$requisition->createdBy->name:''); ?></td>
                            <th><?php echo e(__('cruds.warehouse')); ?></th>
                            <td>: <?php echo e(isset($requisition->warehouse)?$requisition->warehouse->warehouse_name:''); ?></td>
                        </tr>
                        <tr>
                            <th><?php echo e(__('cruds.product_receive_by')); ?></th>
                            <td colspan="3">: <?php echo e($requisition->receive_by); ?></td>
                        </tr>
                        <tr>
                            <th><?php echo e(__('cruds.remarks')); ?></th>
                            <td colspan="3">: <?php echo e($requisition->description); ?></td>
                        </tr>
                    </tbody>
                </table><br>
            </div>
            <div>
                <table class="table table-bordered">
                    <thead>
                        <!--<tr>-->
                        <!--    <th>SL</th>-->
                        <!--    <th>Item Name & Description</th>-->
                        <!--    <th>Unit</th>-->
                        <!--    <th>Qty</th>-->
                        <!--    <th>U.Price</th>-->
                        <!--    <th>T.Price</th>-->
                        <!--    <th>P.Code</th>-->
                        <!--    <th>Page</th>-->
                        <!--</tr>-->
                        
                        <tr>
                            <th>SL</th>
                            <th>Item Name & Description</th>
                            <th>Unit</th>
                            <th>Req Qty</th>
                            <th>Del Qty</th>
                            <th>U.Price</th>
                            <th>T.Price</th>
                            <th>Item Code</th>
                            <th>Page</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($requisition->requisitionDetails)): ?>
                        <?php $__currentLoopData = $requisition->requisitionDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!--<tr>-->
                        <!--    <td><?php echo e(($key + 1)); ?> </td>-->
                        <!--    <td><?php echo e(isset($value->item)?$value->item->item_name:''); ?></td>-->
                        <!--    <td><?php echo e(isset($value->item)?isset($value->item->unit)?$value->item->unit->unit_name:'':''); ?></td>-->
                        <!--    <td style="text-align: right;"><?php echo e($value->quantity); ?> </td>-->
                        <!--    <td style="text-align: right;"><?php echo e($value->sale_price); ?> </td>-->
                        <!--    <td style="text-align: right;"><?php echo e($value->total_price); ?> </td>-->
                        <!--    <td><?php echo e(isset($value->item)?$value->item->item_code:''); ?></td>-->
                        <!--    <td><?php echo e(isset($value->item)?$value->item->item_code:''); ?></td>-->
                        <!--    <td style="text-align: right;"><?php echo e(isset($value->item)?$value->item->page_location:''); ?></td>-->
                        <!--</tr>-->
                        <tr>
                            <td><?php echo e(($key + 1)); ?> </td>
                            <td><?php echo e(isset($value->item)?$value->item->item_name:''); ?></td>
                            <td style="text-align: center;"><?php echo e(isset($value->item)?isset($value->item->unit)?$value->item->unit->unit_name:'':''); ?></td>
                            <td style="text-align: center;"><?php echo e($value->quantity); ?> </td>
                            <td style="text-align: center;"><?php echo e($value->sale_price); ?> </td>
                            <td style="text-align: center;">0 </td>
                            <td style="text-align: right;">0</td>
                            <td style="text-align: center;"><?php echo e(isset($value->item)?$value->item->item_code:''); ?></td>
                            <td style="text-align: center;"><?php echo e(isset($value->item)?$value->item->page_location:''); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <br>
            <br><br>
            <div>
                <table width="100%">
                    <tr>
                        <td class="text-center"><span>Approval Officer</span></td>
                        <td class="text-center"><span>Item Receiver</span></td>
                        <td class="text-center"><span>Store Keeper</span></td>
                        <td class="text-center"><span>Assistant Store Officer</span></td>
                        <td class="text-center"><span>Store Officer</span></td>
                    </tr>
                </table>
            </div>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nayem/Documents/projects/store_management/resources/views/admin/requisitions/show.blade.php ENDPATH**/ ?>