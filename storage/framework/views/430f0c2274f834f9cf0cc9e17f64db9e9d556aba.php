<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left"><?php echo $__env->yieldContent('title'); ?></h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="index.html">Home</a></li>
                    <li><span><?php echo $__env->yieldContent('title'); ?></span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            <div class="user-profile pull-right">
                <img class="avatar user-thumb" src="<?php echo e(asset('assets/images/author/avatar.png')); ?>" alt="avatar">
                <h4 class="user-name dropdown-toggle" data-toggle="dropdown"> <?php echo e(auth()->user()->name); ?> <i class="fa fa-angle-down"></i></h4>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Message</a>
                    <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>">Log Out</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH F:\gps-rfid-tracking-system-for-students\resources\views/includes/page-title.blade.php ENDPATH**/ ?>