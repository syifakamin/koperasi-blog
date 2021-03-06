<?php $__env->startSection('title','Koperasi Karyawan UMG'); ?>

<?php $__env->startPush('css'); ?>
      <link href="<?php echo e(asset('assets/frontend/css/home/styles.css')); ?>" rel="stylesheet">

      <link href="<?php echo e(asset('assets/frontend/css/home/responsive.css')); ?>" rel="stylesheet">

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="banner_inner d-flex align-items-center">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h3>Keranjang Belanja</h3>
					<nav class="d-flex align-items-center page_link">
						<a href="<?php echo e(url ('/')); ?>">Halaman<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Keranjang Belanja</a>
					</nav>
				</div>
			</div>
        </div>
    </div>
</section>
<!-- End Banner Area -->



    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
			<form action="<?php echo e(route('front.update_cart')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Produk</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
						<!-- Looping data dari variable carts -->
						<?php if(! empty($carts)): ?>
                        <?php $__empty_1 = true; $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex" style="max-width: 10%;">
                                            <img src="<?php echo e(asset('storage/products/' .$row['product_image'])); ?>" width="auto" height="auto" alt="<?php echo e($row['product_name']); ?>">
                                        </div>
                                        <div class="media-body">
                                            <p><?php echo e($row['product_name']); ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>Rp <?php echo e(number_format($row['product_price'])); ?></h5>
                                </td>
                                <td>
                                    <div class="product_count">
                     					<input type="text" name="qty[]" id="sst<?php echo e($row['product_id']); ?>" maxlength="12" value="<?php echo e($row['qty']); ?>" title="Quantity:" class="input-text qty">
                                        <input type="hidden" name="product_id[]" value="<?php echo e($row['product_id']); ?>" class="form-control"> 
										<button onclick="var result = document.getElementById('sst<?php echo e($row['product_id']); ?>'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
										 class="increase items-count" type="button">
											<i class="lnr lnr-chevron-up"></i>
										</button>
										<button onclick="var result = document.getElementById('sst<?php echo e($row['product_id']); ?>'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
										 class="reduced items-count" type="button">
											<i class="lnr lnr-chevron-down"></i>
										</button>
									</div>
								</td>
								<td>
                                    <h5>Rp <?php echo e(number_format($row['product_price'] * $row['qty'])); ?></h5>
								</td>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="4">Tidak ada belanjaan</td>
                            </tr>
							<?php endif; ?>
							<?php endif; ?>
							<tr class="bottom_button">
								<td>
									<button class="btn btn-primary waves-effect">Update</button>
								</td>
								<td></td>
								<td></td>
								<td></td>
                            </tr>
                            </form>
							<tr>
								<td>

								</td>
								<td>

								</td>
								<td>
									<h5>Subtotal</h5>
								</td>
								<td>
                                    <h5>Rp <?php echo e(number_format($subtotal)); ?></h5>
								</td>
							</tr>
							<tr class="out_button_area">
								<td></td>
								<td></td>
								<td></td>
								<td>
									<div class="checkout_btn_inner">
										<a class="btn btn-secondary waves-effect" href="<?php echo e(route('front.product')); ?>">Kembali Belanja</a>
										<a class="btn btn-success waves-effect" href="<?php echo e(route('front.checkout')); ?>">Checkout</a>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->
<?php $__env->stopSection(); ?>


<?php $__env->startPush('js'); ?>
<script src="<?php echo e(asset('assets/frontend/js/jquery.nice-select.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Koperasi-Blog\resources\views/ecommerce/cart.blade.php ENDPATH**/ ?>