
<nav id="main-menu" class="navbar" role="navigation">
    <!-- Nested Container Starts -->
    <div class="container">
        <!-- Nav Header Starts -->
        <div class="navbar-header">
          <div class="hidden-sm hidden-md hidden-lg">

            <form class="search" action="/productos/search" method="get">
                  <div id="search">
                      <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Buscar">
                        <span class="input-group-btn">
  							  <button class="btn" type="submit">
  								  <i class="fa fa-search"></i>
  							  </button>
                        </span>
                      </div>
                  </div>
              </form>

            </div>


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
