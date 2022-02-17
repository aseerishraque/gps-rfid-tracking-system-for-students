
<?php $__env->startSection('title'); ?>
    Classrooms
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('includes.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row m-3">
    <?php if(count($classrooms) > 0): ?>
        <?php $__currentLoopData = $classrooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classroom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4">
            <div class="card">
                <div class="seo-fact sbg1">
                    <div class="card-body">
                        <a href="#">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="seofct-icon"><i class="ti-bookmark-alt"></i> <?php echo e($classroom->name); ?></div>
                                <h2>Section: <?php echo e($classroom->section); ?></h2>
                            </div>
                        </a>
                    <p class="card-text">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("Classrooms.Edit")): ?>
                        <div class="icon-container">
                            <span class="ti-settings text-white"></span>
                            <span class="icon-name"> <a href="<?php echo e(route('classrooms.edit', $classroom->id)); ?>" class="text-white">Edit Classroom</a></span>
                        </div>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("Admin.Take Attendance")): ?>
                        <div class="icon-container">
                            <span class="ti-user text-white"></span>
                            <span class="icon-name"> <a href="<?php echo e(route('attendance.get', $classroom->id)); ?>" class="text-white">Manual Attendance</a></span>
                        </div>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("Admin.Track Students")): ?>
                        <div class="icon-container">
                            <span class="ti-map-alt text-white"></span>
                            <span class="icon-name"> <a href="<?php echo e(route('track.get', $classroom->id)); ?>" class="text-white">Track Students</a></span>
                        </div>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("Students.Apply Leave")): ?>
                        <div class="icon-container">
                            <span class="ti-pencil-alt text-white"></span>
                            <span class="icon-name"> <a href="<?php echo e(route('leave.apply', $classroom->id)); ?>" class="text-white">Apply For Leave</a></span>
                        </div>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("Classrooms.Delete")): ?>
                        <div class="icon-container">
                            <span class="ti-trash text-white"></span>
                            <span class="icon-name">
                                
                                <!-- Delete trigger modal -->
                                <a type="button" class="text-white" data-toggle="modal" data-target="#delete_<?php echo e($classroom->id); ?>">
                                Delete Classroom
                                </a>
                            </span>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="delete_<?php echo e($classroom->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Warning</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure to Delete - <span class="text-danger"><?php echo e($classroom->name); ?></span> ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <form action="<?php echo e(route('classroom.destroy', $classroom->id)); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-primary">Delete Classroom</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </p>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <div class="col-md-12">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#joinModal">
            Join a Classroom
            </button>

            <!-- Modal -->
            <div class="modal fade" id="joinModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Enter the classroom code:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="<?php echo e(route('classroom.join')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label for="InputJoinCode">Join Code:</label>
                                    <input name="join_code" type="text" class="form-control" placeholder="Enter join code">
                                </div>
                                <button type="submit" class="btn btn-primary">Join</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
            </div>

        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\gps-rfid-tracking-system-for-students\resources\views/pages/classrooms/index.blade.php ENDPATH**/ ?>