

<?php $__env->startSection('title','KeranjangMu'); ?>

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
					<h3>Pesanan Diterima</h3>
					<nav class="d-flex align-items-center page_link">
						<a href="<?php echo e(url ('/')); ?>">Halaman<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Invoice</a>
					</nav>
				</div>
			</div>
        </div>
    </div>
</section>
<!-- End Banner Area -->
<!--================Order Details Area =================-->
<section class="order_details p_120">
		<div class="container">
			<h3 class="title_confirmation">Terima kasih, pesanan anda telah kami terima.</h3>
			<div class="row order_d_inner">
				<div class="col-lg-6">
					<div class="details_item">
						<h4>Informasi Pesanan</h4>
						<ul class="list">
							<li>
								<a href="#">
                  <span>Invoice</span> : <?php echo e($order->invoice); ?></a>
							</li>
							<li>
								<a href="#">
                  <span>Tanggal</span> : <?php echo e($order->created_at); ?></a>
							</li>
							<li>
								<a href="#">
                  <span>Total</span> : Rp <?php echo e(number_format($order->subtotal)); ?></a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="details_item">
						<h4>Informasi Pemesan</h4>
						<ul class="list">
							<li>
								<a href="#">
                  <span>Alamat</span> : <?php echo e($order->customer_address); ?></a>
							</li>
							<li>
								<a href="#">
                  <span>Kota</span> : <?php echo e($cityName); ?></a>
							</li>
							<li>
								<a href="#">
									<span>Country</span> : Indonesia</a>
							</li>
						</ul>
						<th><a href="<?php echo e(route('customer.order_pdf', $order->invoice)); ?>" target="_blank"><strong><?php echo e($order->invoice); ?></strong></a></th>
						
					</div>
				</div>
			</div>
		</div>
	</section>
  <!--================End Order Details Area =================-->
    

<?php $__env->stopSection(); ?>


<?php $__env->startPush('js'); ?>
<script src="<?php echo e(asset('assets/frontend/js/jquery.nice-select.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/koperasi/resources/views/ecommerce/checkout_finish.blade.php ENDPATH**/ ?>