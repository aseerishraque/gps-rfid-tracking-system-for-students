<div class="sidebar-menu">
    <div class="sidebar-header">



        <!-- <h3 class="text-white text-center">Attendance Management</h3> -->
        <h3 class="text-white text-center">AMS</h3>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="<?php echo e(Route::is('dashboard.admin') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('admin.classrooms')); ?>"><i class="ti-dashboard"></i><span>Dashboard</span></a>
                    </li>
                    <li class="<?php echo e(Route::is('admin.classrooms') || Route::is('classrooms.create') ? 'active' : ''); ?>">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>Classrooms</span></a>
                        <ul class="collapse">
                            <li class="<?php echo e(Route::is('admin.classrooms') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.classrooms')); ?>">Classrooms<span class="badge badge-light">4</span></a></li>
                            <li class="<?php echo e(Route::is('classrooms.create') ? 'active' : ''); ?>"><a href="<?php echo e(route('classrooms.create')); ?>">Create Classrooms</a></li>
                        </ul>
                    </li>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("Admin.Reports")): ?>
                    <li class="<?php echo e(Route::is('reports.daily') ||
                                  Route::is('reports.monthly') ||
                                  Route::is('reports.yearly') ? 'active' : ''); ?>">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i>
                            <span>
                                Reports
                            </span></a>
                        <ul class="collapse">
                            <li class="<?php echo e(Route::is('reports.daily') ? 'active' : ''); ?>"><a href="<?php echo e(route('reports.daily')); ?>">Daily</a></li>
                            <li class="<?php echo e(Route::is('reports.monthly') ? 'active' : ''); ?>"><a href="<?php echo e(route('reports.monthly')); ?>">Monthly</a></li>

                        </ul>
                    </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("Admin.RFID")): ?>
                    <li class="<?php echo e(Route::is('rfid.logs') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('rfid.logs')); ?>"><i class="ti-layout-sidebar-left"></i>
                            <span>
                                RFID Logs(in/out)
                            </span></a>
                    </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("Admin.Leave Approval")): ?>
                    <li class="<?php echo e(Route::is('leave.requests') ||
                                  Route::is('leave.approves') ? 'active' : ''); ?>">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i>
                            <span>
                              Leave Approval
                            </span></a>
                        <ul class="collapse">
                            <li class="<?php echo e(Route::is('leave.requests') ? 'active' : ''); ?>"><a href="<?php echo e(route('leave.requests')); ?>">Requests <span class="badge badge-light">4</span></a></li>
                            <li class="<?php echo e(Route::is('leave.approves') ? 'active' : ''); ?>"><a href="<?php echo e(route('leave.approves')); ?>">All Approves <span class="badge badge-light">4</span></a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("Admin.Users")): ?>











                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("Admin.Roles and Permission")): ?>
                    <li class="<?php echo e(Route::is('roles.index') ||
                                  Route::is('permissions.index') ||
                                  Route::is('roles.create') ? 'active' : ''); ?>">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i>
                            <span>
                              Roles & Permissions
                            </span></a>
                        <ul class="collapse">
                            <li class="<?php echo e(Route::is('roles.create') ? 'active' : ''); ?>"><a href="<?php echo e(route('roles.create')); ?>">Create Role<span class="badge badge-light">4</span></a></li>
                            <li class="<?php echo e(Route::is('roles.index') ? 'active' : ''); ?>"><a href="<?php echo e(route('roles.index')); ?>">All Roles <span class="badge badge-light">4</span></a></li>
                            <li class="<?php echo e(Route::is('permissions.index') ? 'active' : ''); ?>"><a href="<?php echo e(route('permissions.index')); ?>">All Permissions <span class="badge badge-light">4</span></a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("Admin.Users")): ?>
                    <li class="<?php echo e(Route::is('users.*') ? 'active' : ''); ?>">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i>
                            <span>
                              Users
                            </span></a>
                        <ul class="collapse">
                            <li class="<?php echo e(Route::is('users.create') ? 'active' : ''); ?>"><a href="<?php echo e(route('users.create')); ?>">Create User<span class="badge badge-light">4</span></a></li>
                            <li class="<?php echo e(Route::is('users.index') ? 'active' : ''); ?>"><a href="<?php echo e(route('users.index')); ?>">All Users <span class="badge badge-light">4</span></a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>
</div>
<?php /**PATH F:\gps-rfid-tracking-system-for-students\resources\views/includes/sidebar.blade.php ENDPATH**/ ?>