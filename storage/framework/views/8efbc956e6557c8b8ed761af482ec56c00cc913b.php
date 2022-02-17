
<?php $__env->startSection('title'); ?>
    Track Students
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="m-3 row justify-content-center">
        <div class="col-md-12">
            <div class="card" >
                <div class="card-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input id="is_rfid" checked value="1" type="checkbox" aria-label="Checkbox for following text input">
                            </div>
                        </div>
                        <input value="Do you want check RFID of Students?" readonly type="text" class="form-control" aria-label="Text input with checkbox">
                    </div>
                    <div class="form-group w-25 float-left mr-3">
                        <input id="attd_date" value="<?php echo e(date('Y-m-d')); ?>" type="date" class="form-control">
                    </div>
                    <button class="btn btn-primary mb-2" id="student-gps-fetch-control">
                        <i class="fa fa-map-marker-alt mr-2"></i>
                        1. Fetch Student GPS
                    </button>
                    <span id="set-boundary"></span>
                    <button class="btn btn-primary mb-2 d-none" id="create-polygon">2. Set Boundary</button>
                    <!-- <button class="btn btn-danger mb-2" id="student-gps-fetch-control">
                        <i class="fa fa-stop mr-2"></i>
                        Stop Student Data Fetching
                    </button> -->
                    <button class="btn btn-primary mb-2 d-none" id="take-attendance">3. Take Attendance</button>
                    <!-- <button class="btn btn-primary" id="current-location">Get location</button> -->
                    <div id="student-attended"></div>
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-scripts'); ?>
   <!-- <?php echo $__env->make('includes.code-refresh-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> -->
   <?php echo $__env->make('includes.gmaps.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\gps-rfid-tracking-system-for-students\resources\views/pages/classrooms/track.blade.php ENDPATH**/ ?>