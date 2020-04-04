

<?php $__env->startSection('title','Koperasi Karyawan UMG'); ?>

<?php $__env->startPush('css'); ?>
      <link href="<?php echo e(asset('assets/frontend/css/home/styles.css')); ?>" rel="stylesheet">

      <link href="<?php echo e(asset('assets/frontend/css/home/responsive.css')); ?>" rel="stylesheet">

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>


	<!-- start banner Area -->
	<section class="banner-area">
		<div class="container">
			<div class="row fullscreen align-items-center justify-content-start">
				<div class="col-lg-12">
					<div class="active-banner-slider owl-carousel">
						<!-- single-slide -->
						<div class="row single-slide align-items-center d-flex">
							<div class="col-lg-5 col-md-6">
								<div class="banner-content">
									<h1><br>Bebas pilih menu <br>Sesukamu!</h1>
									<p>Berbagai menu dengan lauk melimpah yang cocok untuk acara makan bersama.</p>
								</div>
							</div>
							<div class="col-lg-5">
								<div class="banner-img">
									<img class="img-fluid" src="<?php echo e(asset('assets/frontend/img/banner/banner-img-1.png')); ?>" alt="">
								</div>
							</div>
						</div>
						<!-- single-slide -->
						<div class="row single-slide">
							<div class="col-lg-5">
								<div class="banner-content">
									<h1><br>Kita buat dari<br>Bahan Segar!</h1>
									<p>Berbagai menu dengan lauk melimpah yang cocok untuk acara makan bersama.</p>
								</div>
							</div>
							<div class="col-lg-7">
								<div class="banner-img">
									<img class="img-fluid" src="<?php echo e(asset('assets/frontend/img/banner/banner-img-2.png')); ?>" alt="">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->


	
	<!-- start product Area -->
	<section class="owl-carousel active-product-area section_gap">
		<!-- single product slide -->
		<div class="single-product-slider">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6 text-center">
						<div class="section-title">
							<h1>Produk Terbaru Kami</h1>
							<p>Berbagai menu dengan lauk melimpah yang cocok untuk acara makan bersama.</p>
						</div>
					</div>
				</div>
				<div class="row">
					<!-- single product -->
					<section class="lattest-product-area pb-40 category-list">
                    <div class="row">                
                    <!-- Proses Looping data produk, disamakan kode yang ada di halaman  -->     
                        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> 
                            <div class="single-product col-lg-4 col-md-6">
                                <div class="f_p_item">
                                    <div class="f_p_img">
                                        <img class="img-fluid" src="<?php echo e(asset('storage/products/' . $row->image)); ?>" width="50%" height="50%" alt="<?php echo e($row->name); ?>">
                                            <div class="p_icon">
                                                <a href="<?php echo e(url ('/product/' . $row->slug)); ?>">
                                                    <i class="lnr lnr-cart"></i>
                                                </a>
                                            </div>
                                    </div>
                                    <a href="<?php echo e(url('/product/' . $row->slug)); ?>">
                                        <h4><?php echo e($row->name); ?> </h4>
                                    </a>
                                    <h5>Rp <?php echo e(number_format($row->price)); ?></h5>
                                </div>
                            </div>
                        
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

						<div class="col-md-12">
						<h3 class="text-center">Tidak ada produk</h3>
						</div>

                        <!-- Proses Looping data product, sama dengan code yang ada di halaman -->
                        </div>
                        <?php endif; ?>
				</section>
				</div>
			</div>
		</div>
	</section>
	<!-- end product Area -->

<?php $__env->stopSection(); ?>


<?php $__env->startPush('js'); ?>

<script src="<?php echo e(asset('assets/frontend/js/home/scripts.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/js/home/swiper.js')); ?>"></script>
<script $(document).ready(function(){
  $(".owl-carousel").owlCarousel();
});
</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/koperasi/resources/views/ecommerce/index.blade.php ENDPATH**/ ?>