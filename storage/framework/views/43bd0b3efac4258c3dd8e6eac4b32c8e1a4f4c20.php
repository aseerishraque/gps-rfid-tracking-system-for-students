<?php $__env->startSection('title'); ?>
    Leave Approves
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Classroom:</label>
                                <select name="classroom" class="form-control">
                                    <option value="">---Select Classroom---</option>
                                    <option value="">---Class - 10</option>
                                    <option value="">---Class - 9</option>
                                    <option value="">---Class - 6</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <button type="button" class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                    </div>

                    <div class="single-table">
                        <div class="table-responsive">
                            <table id="dataTable" class="table text-center">
                                <thead class="text-uppercase bg-dark">
                                <tr class="text-white">
                                    <th scope="col">SL</th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Classroom</th>
                                    <th scope="col">Date</th>


                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $approves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $req): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th scope="row"><?php echo e($loop->index+1); ?></th>
                                        <th scope="row"><?php echo e($req->student_id); ?></th>
                                        <td><?php echo e($req->student_name); ?></td>
                                        <td><?php echo e($req->classroom_name); ?></td>
                                        <td><?php echo e($req->start_date.'-'.$req->end_date); ?></td>





































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

<?php echo $__env->make('layouts.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\gps-rfid-tracking-system-for-students\resources\views/pages/approves.blade.php ENDPATH**/ ?>