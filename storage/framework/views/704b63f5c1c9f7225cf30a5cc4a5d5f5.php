<table class="table">
    <thead>
        <tr>
            <th><?php echo e(__('cruds.sl')); ?></th>
            <th><?php echo e(__('cruds.item_name')); ?></th>
            <th><?php echo e(__('cruds.opening_quantity')); ?></th>
            <th><?php echo e(__('cruds.opening_price')); ?></th>
            <th><?php echo e(__('cruds.actions')); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php if(isset($values)): ?>
        <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e(($key+1)); ?>

                <input type="hidden" name="item_id[]" value="<?php echo e($value->id); ?>">
            </td>
            <td><?php echo e($value->item_name); ?></td>
            <td>
                <input type="number" name="opening_quantity[]" class="form-control"
                    placeholder="<?php echo e(trans('cruds.opening_quantity')); ?>"
                    value="<?php echo e(old('opening_quantity', isset($opening) ? $opening->opening_quantity : '')); ?>" required>
            </td>
            <td>
                <input type="number" name="opening_price[]" class="form-control"
                    placeholder="<?php echo e(trans('cruds.opening_price')); ?>"
                    value="<?php echo e(old('opening_price', isset($opening) ? $opening->opening_price : '')); ?>">
            </td>
            <td>
                <a href="javascript:void(0)" class="btn btn-warning btnSaveOrUpdate">
                    Save
                </a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </tbody>
</table>
<div class="col-md-3" <?php if(!count($values)): ?> style="display:none;" <?php endif; ?>>
    <input class="btn btn-danger" type="submit" value="<?php echo e(trans('cruds.save')); ?>">
</div>
<script>

</script><?php /**PATH /home/nayem/Documents/projects/store_management/resources/views/admin/opening/item_list.blade.php ENDPATH**/ ?>