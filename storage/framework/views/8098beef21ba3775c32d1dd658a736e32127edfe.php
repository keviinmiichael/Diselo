<?php  $col_md = $col_md ?? '4'  ?>
<div class="col-md-<?php echo e($col_md); ?> col-sm-6">
    <div class="product-col">
        <div class="image">
            <img src="/content/products/250x320/<?php echo e($product->thumb); ?>" alt="<?php echo e($product->name); ?>" class="img-responsive" />
        </div>
        <div class="caption">
            <h4><a href="/productos/<?php echo e($product->slug); ?>"><?php echo e($product->name); ?></a></h4>
            <div class="description">
                <?php echo e(str_limit($product->description, 80)); ?>

            </div>
            <div class="price">
                <span class="price-new">$<?php echo e($product->price); ?></span>
            </div>
            <div class="cart-button button-group">
                <a data-remodal-target="modal-<?php echo e($product->id); ?>" class="btn btn-cart">
                    <i class="fa fa-shopping-cart hidden-sm hidden-xs"></i>
                    Agregar al carrito
                </a>
            </div>
        </div>
        <?php echo $__env->make('front.products.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
</div>
