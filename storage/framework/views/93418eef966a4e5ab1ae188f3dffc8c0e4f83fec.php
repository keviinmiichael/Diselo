<div class="row">
    <div class="col-md-3">
        <select name="size[]" id="select-zise-${time}" class="form-control">
            <?php $__currentLoopData = $availableSizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($size->id); ?>"><?php echo e($size->value); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="col-md-4">
        <select name="color[]" id="select-color-${time}" class="form-control">
            <?php $__currentLoopData = $availableColors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($color->id); ?>"><?php echo e($color->value); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="col-md-4">
        <input type="text" name="amount[]" class="amount form-control" value="1" size="1" min="1" max="<?php echo e($availableStock->amount); ?>" />
    </div>
    <div class="col-sm-1">
        <p>
            <a href="remover" class="btn btn-default"><span class="fa fa-trash"></span></a>
        </p>
    </div>
</div>