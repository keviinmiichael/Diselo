<?php 
    $availableSizes = $product->availableSizes();
    $availableColors = $product->availableColors($availableSizes->first()->id);
    $availableStock = $product->availableStock($availableSizes->first()->id, $availableColors->first()->id);
 ?>

<div class="remodal" data-remodal-id="modal-<?php echo e($product->id); ?>">
    <button data-remodal-action="close" class="remodal-close"></button>
    <form class="selected-items">
        <div class="row">
            <div class="col-sm-3">
                <label for="select-zise-<?php echo e($product->id); ?>">Talle</label>
                <select name="size[]" id="select-zise-<?php echo e($product->id); ?>" class="form-control">
                    <?php $__currentLoopData = $availableSizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($size->id); ?>"><?php echo e($size->value); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-sm-4">
                <label for="select-color-<?php echo e($product->id); ?>">Color</label>
                <select name="color[]" id="select-color-<?php echo e($product->id); ?>" class="form-control">
                    <?php $__currentLoopData = $availableColors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($color->id); ?>"><?php echo e($color->value); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-sm-4">
                <label>Cantidad</label>
                <input type="text" name="amount[]" class="amount form-control" value="1" size="1" min="1" max="<?php echo e($availableStock->amount); ?>" />
            </div>
        </div>
        <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
    </form>
    <div class="row">
        <div class="col-md-12">
            <p class="text-left"><a href="agregar"><span class="fa fa-plus"></span> Más</a></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" style="margin-top: 30px">
            <button data-remodal-action="confirm" class="btn btn-primary agregar-producto">
                <span class="fa fa-spin fa-spinner" style="display: none"></span> 
                Aceptar
            </button>
            <button data-remodal-action="cancel" class="btn btn-danger">Cancelar</button>
        </div>
    </div>
    <textarea style="display: none" class="modal-row-template"><?php echo $__env->make('front.products._modal-row', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></textarea>
</div>