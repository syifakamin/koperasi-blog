<?php $__env->startSection('title','Koperasi Karyawan UMG'); ?>

<?php $__env->startPush('css'); ?>
      <link href="<?php echo e(asset('assets/frontend/css/home/styles.css')); ?>" rel="stylesheet">

      <link href="<?php echo e(asset('assets/frontend/css/home/responsive.css')); ?>" rel="stylesheet">

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h3>Kategori Produk</h3>
					<nav class="d-flex align-items-center">
						<a href="index.html">Halaman<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.html">Produk</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
    <!-- End Banner Area -->
    
    <div class="container">
		<div class="row">
			<div class="col-xl-3 col-lg-4 col-md-5">
				<div class="sidebar-categories">
					<div class="head">Kategori Produk</div>
                    <!-- proses buat wideget category -->
                    <div class="main-nav-list">
                        <ul class="main-categories">

                        <!-- Proses Looping data Kategori -->
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="main-nav-list">
                            <!-- Jika ada child, maka kategori akan mengexpand data dibawah -->
                            <a href="<?php echo e($category->child_count > 0 ? '#':url('/category/' . $category->slug)); ?>"><?php echo e($category->name); ?></a>

                            <!-- Proses looping data child kategori -->
                            <?php $__currentLoopData = $category->child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <ul class="main-nav-list">
                                <li class="main-nav-list">
                                    <a href="<?php echo e(url('/category/' . $child->slug)); ?>"><?php echo e($child->name); ?></a>
                                </li>
                            </ul>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>

				</div>
			</div>
			<div class="col-xl-9 col-lg-8 col-md-7">

				<!-- Start Best Seller -->
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
                <!-- End Best Seller -->
                <!-- Generate Pagination Produk -->
                <div class="row">
                        <?php echo e($products->links()); ?>

                    </div>
			</div>
		</div>
	</div>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('js'); ?>
<script src="<?php echo e(asset('assets/frontend/js/jquery.nice-select.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/js/home/scripts.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/js/home/swiper.js')); ?>"></script>
<script $(document).ready(function(){
  $(".owl-carousel").owlCarousel();
});
</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Koperasi-Blog\resources\views/ecommerce/product.blade.php ENDPATH**/ ?>