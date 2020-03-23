<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('title'); ?> - <?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo e(asset('assets/backend/plugins/bootstrap/css/bootstrap.css')); ?>" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo e(asset('assets/backend/plugins/node-waves/waves.css')); ?>" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo e(asset('assets/backend/plugins/animate-css/animate.css')); ?>" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="<?php echo e(asset('assets/backend/plugins/morrisjs/morris.css')); ?>" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo e(asset('assets/backend/css/style.css')); ?>" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo e(asset('assets/backend/css/themes/all-themes.css')); ?>" rel="stylesheet" />
    <?php echo $__env->yieldPushContent('css'); ?>
</head>
<body class="theme-blue ">

  <!-- Page Loader -->
  <div class="page-loader-wrapper">
      <div class="loader">
          <div class="preloader">
              <div class="spinner-layer pl-red">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
          </div>
          <p>Please wait...</p>
      </div>
  </div>
  <!-- #END# Page Loader -->
  <!-- Overlay For Sidebars -->
  <div class="overlay"></div>
  <!-- #END# Overlay For Sidebars -->
  <!-- Search Bar -->
  <div class="search-bar">
      <div class="search-icon">
          <i class="material-icons">search</i>
      </div>
      <input type="text" placeholder="START TYPING...">
      <div class="close-search">
          <i class="material-icons">close</i>
      </div>
  </div>
  <!-- #END# Search Bar -->
  <?php echo $__env->make('layouts.backend.partial.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <section>
      <!-- Left Sidebar -->
      <?php echo $__env->make('layouts.backend.partial.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!-- #END# Left Sidebar -->
    
  </section>

  <section class="content">
    <?php echo $__env->yieldContent('content'); ?>

  </section>


      <!-- Jquery Core Js -->
      <script src="<?php echo e(asset('assets/backend/plugins/jquery/jquery.min.js')); ?>"></script>

      <!-- Bootstrap Core Js -->
      <script src="<?php echo e(asset('assets/backend/plugins/bootstrap/js/bootstrap.js')); ?>"></script>

      <!-- Select Plugin Js -->
      <script src="<?php echo e(asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js')); ?>"></script>

      <!-- Slimscroll Plugin Js -->
      <script src="<?php echo e(asset('assets/backend/plugins/jquery-slimscroll/jquery.slimscroll.js')); ?>"></script>

      <!-- Waves Effect Plugin Js -->
      <script src="<?php echo e(asset('assets/backend/plugins/node-waves/waves.js')); ?>"></script>

      <!-- Jquery CountTo Plugin Js -->
      <script src="<?php echo e(asset('assets/backend/plugins/jquery-countto/jquery.countTo.js')); ?>"></script>

      <!-- Morris Plugin Js -->
      <script src="<?php echo e(asset('assets/backend/plugins/raphael/raphael.min.js')); ?>"></script>
      <script src="<?php echo e(asset('assets/backend/plugins/morrisjs/morris.js')); ?>"></script>

      <!-- ChartJs -->
      <script src="<?php echo e(asset('assets/backend/plugins/chartjs/Chart.bundle.js')); ?>"></script>

      <!-- Flot Charts Plugin Js -->
      <script src="<?php echo e(asset('assets/backend/plugins/flot-charts/jquery.flot.js')); ?>"></script>
      <script src="<?php echo e(asset('assets/backend/plugins/flot-charts/jquery.flot.resize.js')); ?>"></script>
      <script src="<?php echo e(asset('assets/backend/plugins/flot-charts/jquery.flot.pie.js')); ?>"></script>
      <script src="<?php echo e(asset('assets/backend/plugins/flot-charts/jquery.flot.categories.js')); ?>"></script>
      <script src="<?php echo e(asset('assets/backend/plugins/flot-charts/jquery.flot.time.js')); ?>"></script>

      <!-- Sparkline Chart Plugin Js -->
      <script src="<?php echo e(asset('assets/backend/plugins/jquery-sparkline/jquery.sparkline.js')); ?>"></script>

      <!-- Custom Js -->
      <script src="<?php echo e(asset('assets/backend/js/admin.js')); ?>"></script>
      <script src="<?php echo e(asset('assets/backend/js/pages/index.js')); ?>"></script>

      <!-- Demo Js -->
      <script src="<?php echo e(asset('assets/backend/js/demo.js')); ?>"></script>

<?php echo $__env->yieldPushContent('js'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\Koperasi-Blog\resources\views/layouts/backend/app.blade.php ENDPATH**/ ?>