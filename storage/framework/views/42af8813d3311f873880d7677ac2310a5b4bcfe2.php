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
					<h3><?php echo e($product->name); ?></h3>
					<nav class="d-flex align-items-center page_link">
						<a href="<?php echo e(url ('/')); ?>">Halaman<span class="lnr lnr-arrow-right"></span></a>
						<a href="#"><?php echo e($product->name); ?></a>
					</nav>
				</div>
			</div>
        </div>
    </div>
</section>
<!-- End Banner Area -->


	<!--================Single Product Area =================-->
	<div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="caraosel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="<?php echo e(asset('storage/products/' .$product->image)); ?>" alt="<?php echo e($product->name); ?>">
                            </div>
                        </div>
                    </div>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
						<h3><?php echo e($product->name); ?></h3>
						<h2>Rp <?php echo e(number_format($product->price)); ?></h2>
						<ul class="list">
							<li>
                                <a class="active" href="#">
                                    <span> Kategori </span> : <?php echo e($product->category->name); ?></a>
							</li>
						</ul>
						<p> <?php echo e($product->desc); ?> </p>
						<form action="<?php echo e(route('front.cart')); ?>" method="POST">
							<?php echo csrf_field(); ?>
						<div class="product_count">
							<label for="qty">Quantity:</label>
                            <input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty">
							<input type="hidden" name="product_id" value="<?php echo e($product->id); ?>" class="form-control">
							<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN ( sst )) result.value++; return false;"
							class="increase items-count" type="button">
								<i class="lnr lnr-chevron-up"></i>
							</button>
							<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN ( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
							class="reduced items-count" type="button">
								<i class="lnr lnr-chevron-down"></i>
							</button>
						</div>
						<div class="card_area">
							<button class="btn btn-danger waves-effect">Add to Cart</button>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--================End Single Product Area =================-->

	<!--================Product Description Area =================-->
	<section class="product_description_area">
		<div class="container">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
					 aria-selected="false">Specification</a>
				</li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab" style="color:black">
                    <?php echo $product->description; ?>

				</div>
				<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					<div class="table-responsive">
						<table class="table">
							<tbody>
								<tr>
									<td>
										<h5>Berat</h5>
									</td>
									<td>
										<h5><?php echo e($product->weight); ?> kg</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Harga</h5>
									</td>
									<td>
										<h5>Rp <?php echo e(number_format($product->price)); ?></h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Kategori</h5>
									</td>
									<td>
										<h5><?php echo e($product->category->name); ?></h5>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
					<div class="row">
						<div class="col-lg-6">
							<div class="comment_list">
								<div class="review_item">
									<div class="media">
										<div class="d-flex">
											<img src="<?php echo e(asset('assets/frontend/img/product/review-1.png')); ?>" alt="">
										</div>
										<div class="media-body">
											<h4>Blake Ruiz</h4>
											<h5>12th Feb, 2018 at 05:56 pm</h5>
											<a class="reply_btn" href="#">Reply</a>
										</div>
									</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
										dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
										commodo</p>
								</div>
								<div class="review_item reply">
									<div class="media">
										<div class="d-flex">
											<img src="<?php echo e(asset('assets/frontend/img/product/review-2.png')); ?>" alt="">
										</div>
										<div class="media-body">
											<h4>Blake Ruiz</h4>
											<h5>12th Feb, 2018 at 05:56 pm</h5>
											<a class="reply_btn" href="#">Reply</a>
										</div>
									</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
										dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
										commodo</p>
								</div>
								<div class="review_item">
									<div class="media">
										<div class="d-flex">
											<img src="<?php echo e(asset('assets/frontend/img/product/review-3.png')); ?>" alt="">
										</div>
										<div class="media-body">
											<h4>Blake Ruiz</h4>
											<h5>12th Feb, 2018 at 05:56 pm</h5>
											<a class="reply_btn" href="#">Reply</a>
										</div>
									</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
										dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
										commodo</p>
								</div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</section>
	<!--================End Product Description Area =================-->
<?php $__env->stopSection(); ?>


<?php $__env->startPush('js'); ?>

<script src="<?php echo e(asset('assets/frontend/js/home/scripts.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/js/home/swiper.js')); ?>"></script>
<script $(document).ready(function(){
  $(".owl-carousel").owlCarousel();
});
</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Koperasi-Blog\resources\views/ecommerce/show.blade.php ENDPATH**/ ?>