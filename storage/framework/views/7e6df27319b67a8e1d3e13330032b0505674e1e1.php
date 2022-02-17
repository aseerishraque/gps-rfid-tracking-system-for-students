<?php $__env->startSection('title'); ?>
    Leave Requests
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('includes.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                                    <?php $__currentLoopData = $classrooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classroom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($classroom->id); ?>">---<?php echo e($classroom->name); ?>---</option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Filter</button>
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

                                    <th scope="col">Approve</th>
                                </tr>
                                </thead>
                                <tbody>
                           <?php $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $req): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e($loop->index+1); ?></th>
                                    <th scope="row"><?php echo e($req->student_id); ?></th>
                                    <td><?php echo e($req->student_name); ?></td>
                                    <td><?php echo e($req->classroom_name); ?></td>
                                    <td><?php echo e($req->start_date.'-'.$req->end_date); ?></td>



                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#aprove_<?php echo e($req->id); ?>">
                                            Click
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="aprove_<?php echo e($req->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Alert !</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure to Approve ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <form action="<?php echo e(route('leave.approve-request', $req->id)); ?>" method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <button type="submit" class="btn btn-primary">Approve</button>
                                                        </form>
                                                        <form action="<?php echo e(route('leave.approve-decline', $req->id)); ?>" method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <button type="submit" class="btn btn-danger">Decline</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
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

<?php echo $__env->make('layouts.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\gps-rfid-tracking-system-for-students\resources\views/pages/requests.blade.php ENDPATH**/ ?>