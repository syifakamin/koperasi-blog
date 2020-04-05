<?php $__env->startSection('title','Edit Category Page'); ?>

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

        <form action="<?php echo e(route('product.update', $product->id)); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <?php echo method_field('PUT'); ?>

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Product</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nama Produk</label>
                                <input type="text" name="name" class="form-control" value="<?php echo e($product->name); ?>" require>
                                <p class="text-danger"><?php echo e($errors->first('name')); ?></p>
                            </div>
                            <div class="form-group">
                                <label for="description">Deskripsi</label>
                                <textarea name="description" id="description" class="form-control"><?php echo e($product->description); ?> </textarea>
                                <p class="text-danger"><?php echo e($errors->first('description')); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control" require>
                                    <option value="1" <?php echo e($product->status == '1' ? 'selected':''); ?>>publish</option>
                                    <option value="0" <?php echo e($product->status == '0' ? 'selected':''); ?>>draft</option>
                                </select>
                                <p class="text-danger"><?php echo e($errors->first('status')); ?>/</p>
                            </div>
                            <div class="form-group">
                                <label for="category_id">Kategori</label>
                                <select name="category_id" class="form-control" require>
                                    <option value="">Pilih</option>
                                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($row->id); ?>" <?php echo e($product->category_id == $row->id ? 'select':''); ?>><?php echo e($row->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <p class="text-danger"><?php echo e($errors->first('category_id')); ?>/</p>
                            </div>
                            <div class="form-group">
                                <label for="price"> Harga </label>
                                <input type="number" name="price" class="form-control" value="<?php echo e($product->price); ?>" require>
                                <p class="text-danger"><?php echo e($errors->first ('price')); ?></p>
                            </div>
                            <div class="form-group">
                                <label for="price">harga</label>
                                <input type="number" name="price" class="form-control" value="<?php echo e($product->price); ?>" require>
                                <p class="text-danger"><?php echo e($errors->first('price')); ?></p>
                            </div>
                            <div class="form-group">
                                <label for="weight">Berat</label>
                                <input type="number" name="weight" class="form-control" value="<?php echo e($product->weight); ?>" require>
                                <p class="text-danger"><?php echo e($errors->first('weight')); ?></p>
                            </div>

                            <div class="form-group">
                                <label for="image">Foto Produk</label>
                                <br>

                                <img src="<?php echo e(asset('storage/product/' .$product->image)); ?>" width="100px" height="100px" alt="<?php echo e($product->name); ?>">
                                <hr>
                                <input type="file" name="image" class="form-control">
                                <p><strong>Biarkan Kosong bila tidak ingin mengganti gambar</strong></p>
                                <p class="text-danger"><?php echo e($errors->first('image')); ?></p>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-sm">Update</button>
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
<script src="http://cdn.ckeditor.com/4.13.0/standart/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');
</script>
<script src="<?php echo e(asset('assets/frontend/js/home/scripts.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/js/home/swiper.js')); ?>"></script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.backend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Koperasi-Blog\resources\views/admin/products/edit.blade.php ENDPATH**/ ?>