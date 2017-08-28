<h3 class="side-heading">Categorías</h3>
<div class="list-group categories">
    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="/<?php echo e($category->slug); ?>" class="list-group-item">
            <i class="fa fa-angle-right"></i> <?php echo e($category->name); ?>

        </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<!-- Filters Options Starts -->
<h3 class="side-heading">Filtros</h3>
<form class="list-group" accept-charset="utf-8">
	<div class="list-group-item">
		Talles
	</div>
	<div class="list-group-item">
		<div class="filter-group">
			<label class="checkbox">
				<input name="sizes[]" type="checkbox" value="1" <?php if(request()->has('sizes') && in_array(1, request('sizes'))): ?> checked <?php endif; ?> />
				XS
			</label>
			<label class="checkbox">
				<input name="sizes[]" type="checkbox" value="2" <?php if(request()->has('sizes') && in_array(2, request('sizes'))): ?> checked <?php endif; ?> />
				S
			</label>
			<label class="checkbox">
				<input name="sizes[]" type="checkbox" value="3" <?php if(request()->has('sizes') && in_array(3, request('sizes'))): ?> checked <?php endif; ?>) />
				M
			</label>
			<label class="checkbox">
				<input name="sizes[]" type="checkbox" value="4" <?php if(request()->has('sizes') && in_array(4, request('sizes'))): ?> checked <?php endif; ?> />
				L
			</label>
			<label class="checkbox">
				<input name="sizes[]" type="checkbox" value="5" <?php if(request()->has('sizes') && in_array(5, request('sizes'))): ?> checked <?php endif; ?> />
				XL
			</label>
			<?php if(isset($_GET['page'])): ?> <input type="hidden" name="page" value="<?php echo e($_GET['page']); ?>"> <?php endif; ?>
		</div>
	</div>
	<div class="list-group-item">
		<button type="submit" class="btn btn-main">Filtrar</button>
	</div>
</form>
<!-- Filters Options Ends -->
