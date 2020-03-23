<?php $__env->startSection('title','Edit Category Page'); ?>

<?php $__env->startPush('css'); ?>
      <link href="<?php echo e(asset('assets/frontend/css/home/styles.css')); ?>" rel="stylesheet">

      <link href="<?php echo e(asset('assets/frontend/css/home/responsive.css')); ?>" rel="stylesheet">

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li> 
        <li class="breadcrumb-item active">Edit Kategori</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="header bg-blue">
                            <h4 class="card-title">Edit Kategori</h4>
                        </div>
                        <div class="card-body">
                            
                          	<!-- ROUTINGNYA MENGIRIMKAN ID CATEGORY YANG AKAN DIEDIT -->
                            <form action="<?php echo e(route('category.update', $category->id)); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                 
                                <div class="form-group">
                                    <label for="name">Kategori</label>
                                    <input type="text" name="name" class="form-control" value="<?php echo e($category->name); ?>" required>
                                    <p class="text-danger"><?php echo e($errors->first('name')); ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="parent_id">Kategori</label>
                                    <select name="parent_id" class="form-control">
                                        <option value="">None</option>
                                        <?php $__currentLoopData = $parent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      
                                      	<!-- TERDAPAT TERNARY OPERATOR UNTUK MENGECEK JIKA PARENT_ID SAMA DENGAN ID CATEGORY PADA LIST PARENT, MAKA OTOMATIS SELECTED -->
                                        <option value="<?php echo e($row->id); ?>" <?php echo e($category->parent_id == $row->id ? 'selected':''); ?>><?php echo e($row->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <p class="text-danger"><?php echo e($errors->first('name')); ?></p>
                                </div>
                                <br>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('js'); ?>

<script src="<?php echo e(asset('assets/frontend/js/home/scripts.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/js/home/swiper.js')); ?>"></script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.backend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Koperasi-Blog\resources\views/admin/categories/edit.blade.php ENDPATH**/ ?>