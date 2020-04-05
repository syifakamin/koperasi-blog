

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
					<h3>Checkout</h3>
					<nav class="d-flex align-items-center page_link">
						<a href="<?php echo e(url ('/')); ?>">Halaman<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Checkout</a>
					</nav>
				</div>
			</div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<section class="checkout_area section_gap">
    <div class="container">
        <div class="billing_details">
            <div class="row">
                <div class="col-lg-8">
                    <h3> Informasi Pengiriman </h3>
                    <?php if(session('error')): ?>
                    <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
                    <?php endif; ?>

                    <form class="row contact_form" action="<?php echo e(route('front.store_checkout')); ?>" method="post" novalidate="novalidate">
                        <?php echo csrf_field(); ?>
                        <div class="col-md-12 form-group p_star">
                            <label for="">Nama Lengkap</label>
                            <input type="text" class="form_control" id="first" name="customer_name" required>

                            <!-- untuk menampilkan jika terdapat error validasi -->
                            <p class="text-danger"><?php echo e($errors->first('customer_name')); ?></p>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <label for="">No Telp</label>
                            <input type="text" class="form-control" id="number" name="customer_phone" required>
                            <p class="text-danger"><?php echo e($errors->first('customer_phone')); ?> </p>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <label for="">E-Mail</label>
                            <input type="text" class="form-control" id="email" name="email" value="<?php echo e(auth()->guard('customer')->user()->email); ?>" required <?php echo e(auth()->guard('customer')->check() ? 'readonly':''); ?>> required>
                            <p class="text-danger"><?php echo e($errors->first('email')); ?> </p>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <label for="">Alamat Lengkap</label>
                            <input type="text" class="form-control" id="add1" name="customer_address" required>
                            <p class="text-danger"><?php echo e($errors->first('customer_address')); ?> </p>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <label for="">Propinsi</label>
                            <select type="form-control" class="form-control province_id" name="province_id" id="province_id" >
                                <option value="">Pilih Propinsi</option>
                                <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <ul class="text-danger"><?php echo e($errors->first('province_id')); ?></ul>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <label for="">Kabupaten / kota</label>
                            <select type="form-control" class="city_id" name="city_id" id="city_id">
                                <option value="">Pilih Kabupaten/kota</option>
                            </select>
                            <p class="text-danger"><?php echo e($errors->first('city_id')); ?></p>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <label for="">Kecamatan</label>
                            <select type="form-control" class="district_id" name="district_id" id="district_id" >
                                <option value="">Pilih Kecamatan</option>
                            </select>
                            <p class="text-danger"><?php echo e($errors->first('district_id')); ?></p>
                        </div>
</div>
                            <div class="col-lg-4">
                                <div class="order_box">
                                    <h2>Ringkasan Pesanan</h2>
                                    <ul class="list">
                                        <li>
                                            <a href="#">Produk
                                                <span>Total</span>
                                            </a>
                                        </li>
                                        <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <a href="#"><?php echo e(\Str::limit($cart['product_name'], 10)); ?>

                                                <span class="middle">x <?php echo e($cart['qty']); ?></span>
                                                <span class="last"> Rp <?php echo e(number_format($cart['product_price'])); ?></span>
                                            </a>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                    <ul class="list list_2">
                                        <li>
                                            <a href="#">Subtotal
                                                <span> Rp <?php echo e(number_format($subtotal)); ?></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">Pengiriman
                                                <span> Rp 0</span>
                                            </a>
                                        </li>       
                                        <li>
                                            <a href="#">total
                                                <span> Rp <?php echo e(number_format($subtotal)); ?></span>
                                            </a>
                                        </li>
                                    </ul>
                                    <button class="btn-primary">Bayar Pesanan</button>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </form>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

<script>
       $('#province_id').on('change', function() {
            //MAKA AKAN MELAKUKAN REQUEST KE URL /API/CITY
            //DAN MENGIRIMKAN DATA PROVINCE_ID
            $.ajax({
                url: "<?php echo e(url('/api/city')); ?>",
                type: "GET",
                data: { province_id: $(this).val() },
                success: function(html){
                    //SETELAH DATA DITERIMA, SELEBOX DENGAN ID CITY_ID DI KOSONGKAN
                    $('.city_id').empty()
                    //KEMUDIAN APPEND DATA BARU YANG DIDAPATKAN DARI HASIL REQUEST VIA AJAX
                    //UNTUK MENAMPILKAN DATA KABUPATEN / KOTA
                    $('.city_id').append('<option value="">Pilih Kabupaten/Kota</option>')
                    $.each(html.data, function(key, item) {
                        $('.city_id').append('<option value="'+item.id+'">'+item.name+'</option>')
                    })
                }
            });
        })

        $('#city_id').on('change', function() {
            $.ajax({
                url: "<?php echo e(url('/api/district')); ?>",
                type: "GET",
                data: { city_id: $(this).val() },
                success: function(html){
                    $('#district_id').empty()
                    $('#district_id').append('<option value="">Pilih Kecamatan</option>')
                    $.each(html.data, function(key, item) {
                        $('#district_id').append('<option value="'+item.id+'">'+item.name+'</option>')
                    })
                }
            });
        })
    </script>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/koperasi/resources/views/ecommerce/checkout.blade.php ENDPATH**/ ?>