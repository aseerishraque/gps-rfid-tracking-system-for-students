
<!-- jquery latest version -->
<script src="<?php echo e(asset('assets/js/vendor/jquery-2.2.4.min.js')); ?>"></script>
<!-- bootstrap 4 js -->
<script src="<?php echo e(asset('assets/js/popper.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/owl.carousel.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/metisMenu.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/jquery.slimscroll.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/jquery.slicknav.min.js')); ?>"></script>

<!-- start chart js -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script> -->
<!-- start highcharts js -->
<!-- <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script> -->
<!-- start amcharts -->
<!-- <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/ammap.js"></script>
<script src="https://www.amcharts.com/lib/3/maps/js/worldLow.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script> -->
<!-- all line chart activation -->
<!-- <script src="<?php echo e(asset('assets/js/line-chart.js')); ?>"></script> -->
<!-- all pie chart -->
<!-- <script src="<?php echo e(asset('assets/js/pie-chart.js')); ?>"></script> -->
<!-- all bar chart -->
<!-- <script src="<?php echo e(asset('assets/js/bar-chart.js')); ?>"></script> -->
<!-- all map chart -->
<!-- <script src="<?php echo e(asset('assets/js/maps.js')); ?>"></script> -->

<?php echo $__env->yieldContent('datatable-scripts'); ?>


<!-- others plugins -->
<script src="<?php echo e(asset('assets/js/plugins.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/scripts.js')); ?>"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    <?php if(session()->has('success')): ?>
        toastr.success('<?php echo e(session()->get('success')); ?>', 'Success');
    <?php endif; ?>
    <?php if(session()->has('error')): ?>
        toastr.error('<?php echo e(session()->get('error')); ?>', 'Error');
    <?php endif; ?>
</script>
<?php echo $__env->yieldContent('custom-scripts'); ?>
<?php /**PATH F:\gps-rfid-tracking-system-for-students\resources\views/includes/scripts.blade.php ENDPATH**/ ?>