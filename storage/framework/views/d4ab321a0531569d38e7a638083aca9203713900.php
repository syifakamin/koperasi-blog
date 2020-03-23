<?php $__env->startSection('title','Mass Upload Page'); ?>

<?php $__env->startPush('css'); ?>
      <link href="<?php echo e(asset('assets/frontend/css/home/styles.css')); ?>" rel="stylesheet">

      <link href="<?php echo e(asset('assets/frontend/css/home/responsive.css')); ?>" rel="stylesheet">

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Product</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <form action="<?php echo e(route('product.saveBulk')); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <?php if(session('success')): ?>
                                <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                            <?php endif; ?>

                            <div class="form-group">
                                <label for="category_id">Kategori</label>
                                <select name="category_id" class="form-control">
                                    <option value="">pilih</option>
                                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($row->id); ?>" <?php echo e(old('category_id') == $row->id ? 'selected':''); ?>><?php echo e($row->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <p class="text-danger"><?php echo e($errors->first('category_id')); ?></p>
                            </div>
                            <div class="form-group">
                                <label for="file">File Excel</label>
                                <input type="file" name="file" class="form-control" value="<?php echo e(old('file')); ?>" required>
                                <p class="text-danger"><?php echo e($errors->first('file')); ?></p>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-sm">Upload</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('js'); ?>

<script src="<?php echo e(asset('assets/frontend/js/home/scripts.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/js/home/swiper.js')); ?>"></script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.backend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Koperasi-Blog\resources\views/admin/products/bulk.blade.php ENDPATH**/ ?>