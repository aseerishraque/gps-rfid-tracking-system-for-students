
<?php $__env->startSection('title'); ?>
    Apply For Leave
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="m-3 row justify-content-center">
        <div class="col-md-4">
            <div class="card" >
                <div class="card-body">
                    <h5 class="card-title">Classroom - <?php echo e($classroom_name); ?></h5>
                    <?php echo $__env->make('includes.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <form action="<?php echo e(route('leave.apply.post', $classroom_id)); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="Subject">Subject</label>
                            <input required value="<?php echo e(old('subject')); ?>" name="subject" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Section">Description</label>
                            <textarea required name="description" class="form-control" cols="30" rows="10">
                                   <?php echo e(old('description')); ?>

                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="Document">Document(Optional)</label>
                            <input name="document" type="file" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="StartDate">Start Date</label>
                            <input required value="<?php echo e(old('start_date')); ?>" name="start_date" type="date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="EndDate">End Date</label>
                            <input required value="<?php echo e(old('end_date')); ?>" name="end_date" type="date" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Apply</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\gps-rfid-tracking-system-for-students\resources\views/pages/leave/create.blade.php ENDPATH**/ ?>