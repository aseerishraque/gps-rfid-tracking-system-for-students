
<?php $__env->startSection('title'); ?>
    Monthly Report
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo e(route('reports.monthly.filter')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Classroom:</label>
                                    <select name="classroom_id" class="form-control">
                                        <option value="">---Select Classroom---</option>
                                        <?php $__currentLoopData = $classrooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classroom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($classroom->id); ?>">---<?php echo e($classroom->name); ?>---</option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Month Start</label>
                                    <select required name="start_month" class="form-control">
                                        <option value=""> --- Start Month --- </option>
                                        <?php for($i=1;$i<=12;$i++): ?>
                                            <option value="<?php echo e($i); ?>"> --- <?php echo e(date('F', mktime(0,0,0,$i, 1, date('Y')))); ?> --- </option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Month End</label>
                                    <select required name="end_month" class="form-control">
                                        <option value=""> --- Start Month --- </option>
                                        <?php for($i=1;$i<=12;$i++): ?>
                                            <option value="<?php echo e($i); ?>"> --- <?php echo e(date('F', mktime(0,0,0,$i, 1, date('Y')))); ?> --- </option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                </div>
                            </div>
                        </div>
                    </form>

               <?php $__currentLoopData = $months; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $month): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!-- Sample Month Start-->
                <?php if(isset($classroom_name)): ?>
                    <h3 class="text-center mt-2">Monthly Data of <?php echo e(date('F', mktime(0,0,0,$month->month, 1, date('Y')))); ?> - <?php echo e($classroom_name); ?></h3>
                <?php else: ?>
                    <h3 class="text-center mt-2">Monthly Data of <?php echo e(date('F', mktime(0,0,0,$month->month, 1, date('Y')))); ?></h3>
                <?php endif; ?>
                    <div class="single-table mb-2">
                        <div class="table-responsive">
                            <table id="dataTable" class="table text-center" style="font-size: 10px">
                                <thead class="text-uppercase bg-dark">
                                <tr class="text-white">
                                    <th scope="col">SL</th>
                                    <th scope="col">Student</th>
                                    <?php for($day=1;$day<=31;$day++): ?>
                                        <th><?php echo e($day); ?></th>
                                    <?php endfor; ?>
                                </tr>
                                </thead>
                                <tbody>
                    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="border border-dark"><?php echo e($loop->index + 1); ?></td>
                                    <td class="border border-dark"><?php echo e($student->student_id); ?> <br> <?php echo e($student->name); ?></td>
                        <?php
                            $count_present = 1;
                            $count_absent = 1;
                        ?>
                        <?php for($day=1;$day<=31;$day++): ?>
                            <?php if(isset($data[$student->student_id][$month->month][$day])): ?>
                                <?php if($data[$student->student_id][$month->month][$day] == 1): ?>
                                    <td class="border border-dark bg-success text-white">P <br>
                                        <?php echo e($count_present++); ?>

                                    </td>
                                <?php else: ?>
                                    <td class="border border-dark bg-danger text-white">A <br>
                                        <?php echo e($count_absent++); ?>

                                    </td>
                                <?php endif; ?>
                            <?php else: ?>
                                <td class="border border-dark">
                                    -
                                </td>
                            <?php endif; ?>

                        <?php endfor; ?>
                                </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Sample Month END-->
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>







<?php echo $__env->make('layouts.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\gps-rfid-tracking-system-for-students\resources\views/pages/reports/monthly.blade.php ENDPATH**/ ?>