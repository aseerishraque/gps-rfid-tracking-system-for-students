<!doctype html>
<html class="no-js" lang="en">
<?php echo $__env->make('includes.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- preloader area start -->
<div id="preloader">
    <div class="loader"></div>
</div>
<!-- preloader area end -->
<!-- login area start -->
<div class="login-area">
    <div class="container">
        <div class="login-box ptb--100">
            <form action="<?php echo e(route('login.auth')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="login-form-head">
                    <h4>Sign In</h4>
                    <p>Hello there, Sign in and start managing your Attendance Management System Using GPS & RFID</p>
                </div>
                <?php echo $__env->make('includes.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="login-form-body">
                    <div class="form-gp">
                        <label for="exampleInputEmail1">Username</label>
                        <input name="username" type="text">
                        <i class="ti-email"></i>
                        <div class="text-danger"></div>
                    </div>
                    <div class="form-gp">
                        <label for="exampleInputPassword1">Password</label>
                        <input name="password" type="password" id="exampleInputPassword1">
                        <i class="ti-lock"></i>
                        <div class="text-danger"></div>
                    </div>











                    <div class="submit-btn-area">
                        <button id="form_submit" type="submit">Submit <i class="ti-arrow-right"></i></button>
                        <div class="login-other row mt-4">
                            <div class="col-6">
                                <a class="fb-login" href="#">Log in with <i class="fa fa-facebook"></i></a>
                            </div>
                            <div class="col-6">
                                <a class="google-login" href="#">Log in with <i class="fa fa-google"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="form-footer text-center mt-5">
                        <p class="text-muted">Don't have an account? <a href="<?php echo e(route('register.student')); ?>">Sign up</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- login area end -->

<?php echo $__env->make('includes.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH F:\gps-rfid-tracking-system-for-students\resources\views/pages/login.blade.php ENDPATH**/ ?>