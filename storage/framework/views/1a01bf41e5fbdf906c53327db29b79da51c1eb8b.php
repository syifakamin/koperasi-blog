<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="<?php echo e(asset('assets/backend/images/user.png')); ?>" width="48" height="48" alt="User" />    
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ">Administrator </div>
            <div class="email">Koperasi Karyawan UMG</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" ">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <form action="<?php echo e(route('logout')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="_method" value="POST">
                    <li><a href="<?php echo e(route('logout')); ?>"><i class="material-icons">input</i>Sign Out</a></li>
                    <button class="btn btn-primary waves-effect" type="submit" name="DELETE"><i class="material-icons" aria-hidden="true"></i>Sign Out</li>
                    </form>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header" i class="material-icons">MAIN</li> Admin Dashboard</li>
            <li>
                <a  href="<?php echo e(url ('administrator/home')); ?>">
                    <i class="material-icons">dashboard</i>
                    <span>Dashboard</span>
                    
                </a>
                <a href="<?php echo e(route ('category.index')); ?>">
                    <i class="material-icons">layers</i>
                    <span>Kategori</span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="<?php echo e(route('product.index')); ?>">
                    <i class="material-icons">collections</i>
                    <span> Produk </span>
                </a>
            </li>
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; 2019 <a href="<?php echo e(route ('front.index')); ?>">Sistem Informasi Catering</a>.
        </div>
        <div class="version">
            <b>Version: </b> 1.0.0
        </div>
    </div>
    <!-- #Footer -->
</aside>
<?php /**PATH C:\xampp\htdocs\Koperasi-Blog\resources\views/layouts/backend/partial/sidebar.blade.php ENDPATH**/ ?>