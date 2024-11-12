<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="description" content="BITAC IMS - Customer Relationship Management (CRM) ">
    <meta name="author" content="BITAC IMS">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="keywords" content="BITAC IMS - Login, Register">

    <!-- FAVICON -->
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    <!-- TITLE -->
    <title> BITAC IMS - Login</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- ICONS CSS -->
    <link href="/assets/css/icons.css" rel="stylesheet">
    <link href="/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="/assets/css/plugin.css" rel="stylesheet">

    <link href="/assets/css/sweetalert.min.css" rel="stylesheet" />
    <link href="/assets/css/animate.min.css" rel="stylesheet" />

    <!-- APP CSS & APP SCSS -->
    <link rel="stylesheet" href="/assets/css/app.0dd9712c.css">
    <link rel="stylesheet" href="/assets/css/app.4b443544.css">
    <link rel="stylesheet" href="/assets/css/custom.css">

    <style>
    .background--fullscreen {
        position: fixed;
        top: 0;
        right: 0;
        left: 0;
        z-index: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
    }

    .background {
        overflow: hidden;
    }

    .card-border {
        padding: 10px !important;
        border: 5px solid #e8e8f7;
    }
    </style>


</head>

<body class="main-body leftmenu ltr light-theme">

    <!--- cruds LOADER -->
    <div id="cruds-loader">
        <img src="/assets/fonts/loader.svg" class="loader-img" alt="loader">
    </div>
    <!--- END cruds LOADER -->

    <!-- PAGE -->

    <div class="page main-signin-wrapper">

        <?php echo $__env->yieldContent('content'); ?>

    </div>
    <!-- END PAGE -->

    <!-- SCRIPTS -->

    <!-- JQUERY JS -->
    <script src="/assets/js/jquery.min.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>

    <!-- PERFECT-SCROLLBAR JS -->
    <script src="/assets/js/perfect-scrollbar.min.js"></script>

    <!-- SELECT2 JS -->
    <script src="/assets/js/select2.min.js"></script>


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- BOOTSTRAP SHOW PASSWORD JS -->
    <script src="/assets/js/bootstrap-show-password.min.js"></script>

    <!-- GENERATE-OTP JS -->
    <script src="/assets/js/generate-otp.js"></script>


    <!-- STICKY JS-->
    <script src="/assets/js/sticky.js"></script>

    <!-- APP JS -->
    <script src="/assets/js/app.js"></script>

    <!-- END SCRIPTS -->

    <?php echo $__env->yieldContent('scripts'); ?>

<script>
    
    $(document).ready(function() {
        
    
    var open = 'fa-eye-slash';
    var close = 'fa-eye';
    var ele = document.getElementById('password');
    var ele2 = document.getElementById('password2');
    
    document.getElementById('toggleBtn').onclick = function() {
         if( this.classList.contains(open) ) {
        ele.type="password";
        this.classList.remove(open);
        this.className += ' '+close;
      } else {
        ele.type="text";
        this.classList.remove(close);
        this.className += ' '+open;
      } 
    }
    
    });
    </script>


</body>

</html><?php /**PATH /home/nayem/Documents/Bitac/projects/store_management_system/resources/views/layouts/app.blade.php ENDPATH**/ ?>