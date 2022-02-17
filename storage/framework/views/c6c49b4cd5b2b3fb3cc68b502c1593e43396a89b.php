
<?php $__env->startSection('title'); ?>
    Users
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <!-- data table start -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title float-left">Users List</h4>
                    <p class="float-right mb-2">
                        <a class="btn btn-primary text-white" href="<?php echo e(route('users.create')); ?>">Create New User</a>
                    </p>
                    <div class="clearfix"></div>
                    <div class="data-tables">
                        <?php echo $__env->make('includes.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <table width="100%" id="dataTable" class="text-center">
                            <thead class="bg-light text-capitalize">
                            <tr>
                                <th width="5%">Sl</th>
                                <th width="10%">Name</th>
                                <th width="10%">Username</th>
                                <th width="10%">Roles</th>
                                <th width="15%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->index+1); ?></td>
                                    <td><?php echo e($user->name); ?></td>
                                    <td><?php echo e($user->username); ?></td>
                                    <td>
                                        <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span class="badge badge-info mr-1">
                                                <?php echo e($role->name); ?>

                                            </span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-success text-white" href="<?php echo e(route('users.edit', $user->id)); ?>">Edit</a>

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_<?php echo e($user->id); ?>">
                                            Delete
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="delete_<?php echo e($user->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Warning!</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure to Delete - <span class="text-danger"><?php echo e($user->name); ?></span>  ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <a class="btn btn-danger text-white" href="<?php echo e(route('users.destroy', $user->id)); ?>"
                                                           onclick="event.preventDefault(); document.getElementById('delete-form-<?php echo e($user->id); ?>').submit();">
                                                            Delete
                                                        </a>

                                                        <form id="delete-form-<?php echo e($user->id); ?>" action="<?php echo e(route('users.destroy', $user->id)); ?>" method="POST" style="display: none;">
                                                            <?php echo method_field('DELETE'); ?>
                                                            <?php echo csrf_field(); ?>
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
        <!-- data table end -->

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('datatable-styles'); ?>
    <?php echo $__env->make('includes.datatable-styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('datatable-scripts'); ?>
    <?php echo $__env->make('includes.datatable-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\gps-rfid-tracking-system-for-students\resources\views/pages/users/index.blade.php ENDPATH**/ ?>