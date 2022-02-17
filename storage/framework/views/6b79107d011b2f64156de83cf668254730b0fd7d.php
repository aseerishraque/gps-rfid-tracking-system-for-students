<?php $__env->startSection('title'); ?>
   RFID Logs
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo e(route('rfid.logs.filter')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Classroom:</label>
                                    <select name="classroom_id" class="form-control">
                                        <option value="">---Select Classroom---</option>
                                        <?php $__currentLoopData = $classrooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classroom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($classroom->id); ?>"> --- <?php echo e($classroom->name); ?> ---</option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Date Start</label>
                                    <input value="<?php echo e(date('Y-m-d')); ?>" type="date" class="form-control" name="start_date">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Date End</label>
                                    <input value="<?php echo e(date('Y-m-d')); ?>" type="date" class="form-control" name="end_date">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary">Filter</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="single-table">
                        <div class="table-responsive">
                            <table id="dataTable" class="table text-center">
                                <thead class="text-uppercase bg-dark">
                                <tr class="text-white">
                                    <th scope="col">SL</th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">IN</th>
                                    <th scope="col">OUT</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th scope="row"><?php echo e($loop->index + 1); ?></th>
                                        <th scope="row"><?php echo e($log->id); ?></th>
                                        <th scope="row"><?php echo e($log->username); ?></th>
                                        <td><?php echo e($log->name); ?></td>
                                        <td><?php echo e($log->in_time); ?></td>
                                        <td><?php echo e($log->out_time); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('datatable-styles'); ?>
    <?php echo $__env->make('includes.datatable-styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('datatable-scripts'); ?>
    <?php echo $__env->make('includes.datatable-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\gps-rfid-tracking-system-for-students\resources\views/pages/rfid-logs.blade.php ENDPATH**/ ?>