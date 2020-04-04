

<?php $__env->startSection('title','Hubungi Kami - Koperasi Karyawan UMG'); ?>

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
					<h3>Hubungi Kami</h3>
					<nav class="d-flex align-items-center page_link">
						<a href="<?php echo e(url ('/')); ?>">Halaman<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Hubungi Kami</a>
					</nav>
				</div>
			</div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

	<!--================Contact Area =================-->
	<section class="contact_area section_gap_bottom">
		<div class="container">
			<div id="mapBox" class="mapBox" data-lat="-7.160721" data-lon="112.615868" data-zoom="13" data-info="Universitas Muhammadiyah Gresik, Jl. Sumatera No.101, Setingi, Randuagung, Kec. Gresik, Kabupaten Gresik, Jawa Timur 61121"
			 data-mlat="-7.160721" data-mlon="112.615868">
			</div>
			<div class="row">
				<div class="col-lg-3">
					<div class="contact_info">
						<div class="info_item">
							<i class="lnr lnr-home"></i>
							<h6>Universitas Muhammadiyah Gresik, Gresik</h6>
							<p>Jl. Sumatera No.101, Setingi, Randuagung, Kec. Gresik </p>
						</div>
						<div class="info_item">
							<i class="lnr lnr-phone-handset"></i>
							<h6><a href="#">+628123312492</a></h6>
							<p>Senin - Jum'at, 08:00 - 15:00</p>
						</div>
						<div class="info_item">
							<i class="lnr lnr-envelope"></i>
							<h6><a href="#">KoperasiUMG@umg.ac.id</a></h6>
							<p>Kritik dan saran Kami terima </p>
						</div>
					</div>
				</div>
				<div class="col-lg-9">
					<form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'">
							</div>
							<div class="form-group">
								<input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<textarea class="form-control" name="message" id="message" rows="1" placeholder="Enter Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'"></textarea>
							</div>
						</div>
						<div class="col-md-12 text-right">
							<button type="submit" value="submit" class="primary-btn">Send Message</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!--================Contact Area =================-->


<?php $__env->stopSection(); ?>


<?php $__env->startPush('js'); ?>

<script src="<?php echo e(asset('assets/frontend/js/home/scripts.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/js/home/swiper.js')); ?>"></script>
<script $(document).ready(function(){
  $(".owl-carousel").owlCarousel();
});
</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/koperasi/resources/views/ecommerce/contact.blade.php ENDPATH**/ ?>