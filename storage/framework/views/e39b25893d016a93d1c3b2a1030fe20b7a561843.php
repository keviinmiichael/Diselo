
<nav id="main-menu" class="navbar" role="navigation">
    <!-- Nested Container Starts -->
    <div class="container">
        <!-- Nav Header Starts -->
        <div class="navbar-header">
            <button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-cat-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <i class="fa fa-bars"></i>
            </button>
        </div>
        <!-- Nav Header Ends -->
        <!-- Navbar Cat collapse Starts -->
        <div class="collapse navbar-collapse navbar-cat-collapse">
            <ul class="nav navbar-nav">

                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($category->subcategories->count()): ?>
                        <li class="dropdown">
                            <a href="<?php echo e($category->slug); ?>" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="10"><?php echo e($category->name); ?></a>
                            <ul class="dropdown-menu" role="menu">
                                <?php $__currentLoopData = $category->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a tabindex="-1" href="/<?php echo e($category->slug); ?>/<?php echo e($subcategory->slug); ?>"><?php echo e($subcategory->name); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li><a href="/<?php echo e($category->slug); ?>"><?php echo e($category->name); ?></a></li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </ul>
        </div>
        <!-- Navbar Cat collapse Ends -->
    </div>
    <!-- Nested Container Starts -->
</nav>
