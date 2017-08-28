<?php $__env->startSection('title', 'Diselo'); ?>
<?php $__env->startSection('description', 'home'); ?>


<?php $__env->startSection('body'); ?>
<!-- Main Container Starts -->
<div class="main-container container">
	
	<h2 class="main-heading text-center">Pedido exitoso</h2>

	<div>
		<p class="text-center">Para abonar su pedido puede hacerlo orem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt, ut</p>
		<p class="text-center">Puede ponser en contacto con nosotros Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure, sint.</p>
	</div>
	
	<!-- Shopping Cart Table Starts -->
	<div class="table-responsive shopping-cart-table">
		<table class="table table-bordered">
			<thead>
				<tr>
					<td class="text-center">
						Detalles
					</td>
					<td class="text-center">
						Talle
					</td>
					<td class="text-center">
						Color
					</td>
					<td class="text-center">
						Cantidad
					</td>
					<td class="text-center">
						Precio Unitario
					</td>
					<td class="text-center">
						Total
					</td>
				</tr>
			</thead>
			<!-- INICIO DE PRODUCTO -->
			<tbody>
				<?php  $total = 0;  ?>
				<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php $__currentLoopData = session('cart.'.$product->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						 <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td class="text-center">
									<?php echo e($product->name); ?>

								</td>
								<td class="text-center">
									<?php echo e(\App\Size::find($size)->value); ?>

								</td>
								<td class="text-center">
									<?php echo e(\App\Color::find($item[0])->value); ?>

								</td>
								<td class="text-center">
									<?php echo e($item[1]); ?>

								</td>
								<td class="text-center">
									$ <?php echo e($product->price); ?>

								</td>
								<td class="text-center total">
									$ <?php echo e($item[1] * $product->price); ?>

								</td>
								<?php  $total += $item[1] * $product->price;  ?>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
			<tfoot>
				<tr>
				  <td colspan="5" class="text-right">
					<strong>Total :</strong>
				  </td>
				  <td class="text-center">
					<span class="total-final">$ <?php echo e($total); ?></span>
				  </td>
				</tr>
			</tfoot>
		</table>
	</div>
	<!-- Shopping Cart Table Ends -->

</div>
<!-- Main Container Ends -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>