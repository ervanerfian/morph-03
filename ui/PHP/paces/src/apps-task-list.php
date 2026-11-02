<!doctype html>
<html lang="en">

<head>
    <?php $title = "Tasks"; include('partials/title-meta.php'); ?>

    <?php include('./partials/head-css.php'); ?>
</head>

<body>
    <div class="wrapper">
        <?php $subtitle = "Apps"; $title = "Tasks"; include('./partials/topbar.php'); ?>

        <?php include('./partials/sidenav.php'); ?>

        <!-- Start Page Content here -->
        <div class="page-content">
            <main>

                <?php $subtitle = "Apps"; $title = "Tasks"; include('./partials/page-title.php'); ?>

                <div class="container-fluid">
                    <div data-table data-table-rows-per-page="8" class="card mb-base">
                        <div class="card-header">
                            <div class="flex gap-base w-full items-center justify-between">
                                <div class="flex gap-2.5">
                                    <!-- Search -->
                                    <div class="input-icon-group">
                                        <i class="iconify tabler--search input-icon"></i>
                                        <input data-table-search type="search" class="form-input" placeholder="Search task..." />
                                    </div>

                                    <!-- Delete Selected -->
                                    <button data-table-delete-selected class="btn bg-danger text-white hover:bg-danger-hover hidden">Delete</button>
                                </div>

                                <div class="flex flex-wrap items-center gap-2.5">
                                    <span class="font-semibold me-2.5">Filter By:</span>

                                    <!-- Task Status Filter -->
                                    <div class="input-icon-group">
                                        <i class="iconify tabler--list-check input-icon"></i>
                                        <select data-table-filter="status" class="form-select">
                                            <option value="All">Task Status</option>
                                            <option value="New">New</option>
                                            <option value="In Progress">In Progress</option>
                                            <option value="Completed">Completed</option>
                                            <option value="In Review">In Review</option>
                                            <option value="Cancelled">Cancelled</option>
                                        </select>
                                    </div>

                                    <!-- Priority Filter -->
                                    <div class="input-icon-group">
                                        <i class="iconify tabler--alert-triangle input-icon"></i>

                                        <select data-table-filter="priority" class="form-select">
                                            <option value="All">Priority</option>
                                            <option value="High">High</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                        </select>
                                    </div>

                                    <!-- Records Per Page -->
                                    <div>
                                        <select data-table-set-rows-per-page class="form-select">
                                            <option value="5">5</option>
                                            <option value="10" selected>10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="flex gap-1.5">
                                    <a href="apps-task-create.php" class="btn bg-primary text-white hover:bg-primary-hover">
                                        <i class="iconify tabler--plus text-base"></i>
                                        Add Task
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="table-wrapper">
                            <table class="table table-hover table-custom table-centered table-select table-hover w-full">
                                <thead class="thead-sm">
                                    <tr class="bg-light/25 text-2xs uppercase">
                                        <th class="w-[1%]">
                                            <input data-table-select-all class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" />
                                        </th>
                                        <th data-table-sort>Task Title</th>
                                        <th data-table-sort>Assigned To</th>
                                        <th data-table-sort>Due Date</th>
                                        <th data-table-sort>Progress</th>
                                        <th data-table-sort data-column="status">Status</th>
                                        <th data-table-sort data-column="priority">Priority</th>
                                        <th data-table-sort>Comments</th>
                                        <th class="text-center w-[1%]">Actions</th>
                                    </tr>
                                </thead>

                                <tbody class="whitespace-nowrap">
                                    <!-- Task 1 -->
                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" />
                                        </td>
                                        <td>
                                            <h5>
                                                <a href="apps-task-details.php" class="hover:text-primary">Complete Presentation Slides for Meeting</a>
                                            </h5>
                                            <p class="text-default-400 text-xs">
                                                Created: 9 May, 2025
                                                <small class="text-default-400 text-2xs">10:10 AM</small>
                                            </p>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <div class="size-8">
                                                    <img src="assets/images/users/user-2.jpg" alt="Cruise ⚒️" class="rounded-full" />
                                                </div>
                                                <div>
                                                    <h6 class="font-semibold">Cruise ⚒️</h6>
                                                    <p class="text-default-400 text-xs">+2 members</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-1.25">
                                                <i class="iconify tabler--calendar text-default-400 text-sm"></i>
                                                Today
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-1.25">
                                                <i class="iconify tabler--list-details text-default-400 text-sm"></i>
                                                0/7
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge border-warning text-warning border">New</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-danger/15 text-danger">High</span>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-1.25">
                                                <i class="iconify tabler--messages text-default-400 text-sm"></i>
                                                1
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex justify-center gap-1.25">
                                                <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400">
                                                    <i class="iconify tabler--eye text-base"></i>
                                                </a>
                                                <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400">
                                                    <i class="iconify tabler--edit text-base"></i>
                                                </a>
                                                <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400" data-table-delete-row>
                                                    <i class="iconify tabler--trash text-base"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Task 2 -->
                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" />
                                        </td>
                                        <td>
                                            <h5>
                                                <a href="apps-task-details.php" class="hover:text-primary">Finalize Product Roadmap for Launch</a>
                                            </h5>
                                            <p class="text-default-400 text-xs">
                                                Created: 8 Oct, 2025
                                                <small class="text-default-400 text-2xs">2:30 PM</small>
                                            </p>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <div class="size-8">
                                                    <img src="assets/images/users/user-5.jpg" alt="Maria 💻" class="rounded-full" />
                                                </div>
                                                <div>
                                                    <h6 class="font-semibold">Maria 💻</h6>
                                                    <p class="text-default-400 text-xs">+2 members</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-1.25">
                                                <i class="iconify tabler--calendar text-default-400 text-sm"></i>
                                                29 Oct, 2025
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-1.25">
                                                <i class="iconify tabler--list-details text-default-400 text-sm"></i>
                                                5/10
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge border-success text-success border">In Progress</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-warning/15 text-warning">Medium</span>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-1.25">
                                                <i class="iconify tabler--messages text-default-400 text-sm"></i>
                                                14
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex justify-center gap-1.25">
                                                <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400">
                                                    <i class="iconify tabler--eye text-base"></i>
                                                </a>
                                                <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400">
                                                    <i class="iconify tabler--edit text-base"></i>
                                                </a>
                                                <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400" data-table-delete-row>
                                                    <i class="iconify tabler--trash text-base"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Task 3 -->
                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" />
                                        </td>
                                        <td>
                                            <h5>
                                                <a href="apps-task-details.php" class="hover:text-primary">Design Marketing Campaign Assets</a>
                                            </h5>
                                            <p class="text-default-400 text-xs">
                                                Created: 6 Oct, 2025
                                                <small class="text-default-400 text-2xs">5:45 PM</small>
                                            </p>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <div class="size-8">
                                                    <img src="assets/images/users/user-3.jpg" alt="Kevin" class="rounded-full" />
                                                </div>
                                                <div>
                                                    <h6 class="font-semibold">Kevin</h6>
                                                    <p class="text-default-400 text-xs">+1 member</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-1.25">
                                                <i class="iconify tabler--calendar text-default-400 text-sm"></i>
                                                29 Oct, 2025
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-1.25">
                                                <i class="iconify tabler--list-details text-default-400 text-sm"></i>
                                                6/8
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge border-success text-success border">In Progress</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-danger/15 text-danger">High</span>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-1.25">
                                                <i class="iconify tabler--messages text-default-400 text-sm"></i>
                                                9
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex justify-center gap-1.25">
                                                <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400">
                                                    <i class="iconify tabler--eye text-base"></i>
                                                </a>
                                                <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400">
                                                    <i class="iconify tabler--edit text-base"></i>
                                                </a>
                                                <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400" data-table-delete-row>
                                                    <i class="iconify tabler--trash text-base"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Task 4 -->
                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" />
                                        </td>
                                        <td>
                                            <h5>
                                                <a href="apps-task-details.php" class="hover:text-primary">Prepare Monthly Financial Report</a>
                                            </h5>
                                            <p class="text-default-400 text-xs">
                                                Created: 4 Oct, 2025
                                                <small class="text-default-400 text-2xs">11:00 AM</small>
                                            </p>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <div class="size-8">
                                                    <img src="assets/images/users/user-4.jpg" alt="Thomas 🏠" class="rounded-full" />
                                                </div>
                                                <div>
                                                    <h6 class="font-semibold">Thomas 🏠</h6>
                                                    <p class="text-default-400 text-xs">+1 member</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-1.25">
                                                <i class="iconify tabler--calendar text-danger text-sm"></i>
                                                20 Sep, 2025
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-1.25">
                                                <i class="iconify tabler--list-details text-default-400 text-sm"></i>
                                                2/5
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge border-success text-success border">In Progress</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-warning/15 text-warning">Medium</span>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-1.25">
                                                <i class="iconify tabler--messages text-default-400 text-sm"></i>
                                                6
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex justify-center gap-1.25">
                                                <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400">
                                                    <i class="iconify tabler--eye text-base"></i>
                                                </a>
                                                <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400">
                                                    <i class="iconify tabler--edit text-base"></i>
                                                </a>
                                                <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400" data-table-delete-row>
                                                    <i class="iconify tabler--trash text-base"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Task 5 -->
                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" />
                                        </td>
                                        <td>
                                            <h5>
                                                <a href="apps-task-details.php" class="hover:text-primary">Conduct Team Retrospective Meeting</a>
                                            </h5>
                                            <p class="text-default-400 text-xs">
                                                Created: 2 Oct, 2025
                                                <small class="text-default-400 text-2xs">4:00 PM</small>
                                            </p>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <div class="size-8">
                                                    <img src="assets/images/users/user-6.jpg" alt="James" class="rounded-full" />
                                                </div>
                                                <div>
                                                    <h6 class="font-semibold">James</h6>
                                                    <p class="text-default-400 text-xs">Solo</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-1.25">
                                                <i class="iconify tabler--calendar text-default-400 text-sm"></i>
                                                Yesterday
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-1.25">
                                                <i class="iconify tabler--list-details text-default-400 text-sm"></i>
                                                4/4
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge border-success text-success border">Completed</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-success/15 text-success">Low</span>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-1.25">
                                                <i class="iconify tabler--messages text-default-400 text-sm"></i>
                                                2
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex justify-center gap-1.25">
                                                <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400">
                                                    <i class="iconify tabler--eye text-base"></i>
                                                </a>
                                                <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400">
                                                    <i class="iconify tabler--edit text-base"></i>
                                                </a>
                                                <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400" data-table-delete-row>
                                                    <i class="iconify tabler--trash text-base"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Task 6 -->
                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" />
                                        </td>
                                        <td>
                                            <h5>
                                                <a href="apps-task-details.php" class="hover:text-primary">Review UI/UX Prototype for Dashboard</a>
                                            </h5>
                                            <p class="text-default-400 text-xs">
                                                Created: 1 Oct, 2025
                                                <small class="text-default-400 text-2xs">9:45 AM</small>
                                            </p>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <div class="size-8">
                                                    <img src="assets/images/users/user-7.jpg" alt="Sophia 🚀" class="rounded-full" />
                                                </div>
                                                <div>
                                                    <h6 class="font-semibold">Sophia 🚀</h6>
                                                    <p class="text-default-400 text-xs">+3 members</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-1.25">
                                                <i class="iconify tabler--calendar text-default-400 text-sm"></i>
                                                22 Oct, 2025
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-1.25">
                                                <i class="iconify tabler--list-details text-default-400 text-sm"></i>
                                                1/6
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge border-warning text-warning border">New</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-danger/15 text-danger">High</span>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-1.25">
                                                <i class="iconify tabler--messages text-default-400 text-sm"></i>
                                                11
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex justify-center gap-1.25">
                                                <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400">
                                                    <i class="iconify tabler--eye text-base"></i>
                                                </a>
                                                <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400">
                                                    <i class="iconify tabler--edit text-base"></i>
                                                </a>
                                                <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400" data-table-delete-row>
                                                    <i class="iconify tabler--trash text-base"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Task 7 -->
                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" />
                                        </td>
                                        <td>
                                            <h5>
                                                <a href="apps-task-details.php" class="hover:text-primary">Update Documentation and API References</a>
                                            </h5>
                                            <p class="text-default-400 text-xs">
                                                Created: 28 Sep, 2025
                                                <small class="text-default-400 text-2xs">1:20 PM</small>
                                            </p>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <div class="size-8">
                                                    <img src="assets/images/users/user-8.jpg" alt="Liam" class="rounded-full" />
                                                </div>
                                                <div>
                                                    <h6 class="font-semibold">Liam</h6>
                                                    <p class="text-default-400 text-xs">+1 member</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-1.25">
                                                <i class="iconify tabler--calendar text-danger text-sm"></i>
                                                19 Sep, 2025
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-1.25">
                                                <i class="iconify tabler--list-details text-default-400 text-sm"></i>
                                                7/8
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge border-danger text-danger border">Cancelled</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-warning/15 text-warning">Medium</span>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-1.25">
                                                <i class="iconify tabler--messages text-default-400 text-sm"></i>
                                                5
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex justify-center gap-1.25">
                                                <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400">
                                                    <i class="iconify tabler--eye text-base"></i>
                                                </a>
                                                <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400">
                                                    <i class="iconify tabler--edit text-base"></i>
                                                </a>
                                                <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400" data-table-delete-row>
                                                    <i class="iconify tabler--trash text-base"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Task 8 -->
                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" />
                                        </td>
                                        <td>
                                            <h5>
                                                <a href="apps-task-details.php" class="hover:text-primary">Implement User Authentication Module</a>
                                            </h5>
                                            <p class="text-default-400 text-xs">
                                                Created: 10 Oct, 2025
                                                <small class="text-default-400 text-2xs">9:00 AM</small>
                                            </p>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <div class="size-8">
                                                    <img src="assets/images/users/user-9.jpg" alt="Olivia" class="rounded-full" />
                                                </div>
                                                <div>
                                                    <h6 class="font-semibold">Olivia</h6>
                                                    <p class="text-default-400 text-xs">+2 members</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-1.25">
                                                <i class="iconify tabler--calendar text-default-400 text-sm"></i>
                                                Tomorrow
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-1.25">
                                                <i class="iconify tabler--list-details text-default-400 text-sm"></i>
                                                3/10
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge border-warning text-warning border">New</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-danger/15 text-danger">High</span>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-1.25">
                                                <i class="iconify tabler--messages text-default-400 text-sm"></i>
                                                8
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex justify-center gap-1.25">
                                                <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400">
                                                    <i class="iconify tabler--eye text-base"></i>
                                                </a>
                                                <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400">
                                                    <i class="iconify tabler--edit text-base"></i>
                                                </a>
                                                <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400" data-table-delete-row>
                                                    <i class="iconify tabler--trash text-base"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Task 9 -->
                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" />
                                        </td>
                                        <td>
                                            <h5>
                                                <a href="apps-task-details.php" class="hover:text-primary">Write Test Cases for API Endpoints</a>
                                            </h5>
                                            <p class="text-default-400 text-xs">
                                                Created: 9 Oct, 2025
                                                <small class="text-default-400 text-2xs">10:45 AM</small>
                                            </p>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <div class="size-8">
                                                    <img src="assets/images/users/user-10.jpg" alt="Ethan" class="rounded-full" />
                                                </div>
                                                <div>
                                                    <h6 class="font-semibold">Ethan</h6>
                                                    <p class="text-default-400 text-xs">Solo</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-1.25">
                                                <i class="iconify tabler--calendar text-default-400 text-sm"></i>
                                                12 Nov, 2025
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-1.25">
                                                <i class="iconify tabler--list-details text-default-400 text-sm"></i>
                                                1/8
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge border-warning text-warning border">In Review</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-warning/15 text-warning">Medium</span>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-1.25">
                                                <i class="iconify tabler--messages text-default-400 text-sm"></i>
                                                3
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex justify-center gap-1.25">
                                                <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400">
                                                    <i class="iconify tabler--eye text-base"></i>
                                                </a>
                                                <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400">
                                                    <i class="iconify tabler--edit text-base"></i>
                                                </a>
                                                <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400" data-table-delete-row>
                                                    <i class="iconify tabler--trash text-base"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Task 10 -->
                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" />
                                        </td>
                                        <td>
                                            <h5>
                                                <a href="apps-task-details.php" class="hover:text-primary">Migrate Legacy Data to New Database</a>
                                            </h5>
                                            <p class="text-default-400 text-xs">
                                                Created: 5 Oct, 2025
                                                <small class="text-default-400 text-2xs">8:00 PM</small>
                                            </p>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <div class="size-8">
                                                    <img src="assets/images/users/user-4.jpg" alt="Charlotte" class="rounded-full" />
                                                </div>
                                                <div>
                                                    <h6 class="font-semibold">Charlotte</h6>
                                                    <p class="text-default-400 text-xs">+1 member</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-1.25">
                                                <i class="iconify tabler--calendar text-default-400 text-sm"></i>
                                                Next Week
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-1.25">
                                                <i class="iconify tabler--list-details text-default-400 text-sm"></i>
                                                2/12
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge border-success text-success border">In Progress</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-warning/15 text-warning">Medium</span>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-1.25">
                                                <i class="iconify tabler--messages text-default-400 text-sm"></i>
                                                10
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex justify-center gap-1.25">
                                                <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400">
                                                    <i class="iconify tabler--eye text-base"></i>
                                                </a>
                                                <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400">
                                                    <i class="iconify tabler--edit text-base"></i>
                                                </a>
                                                <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400" data-table-delete-row>
                                                    <i class="iconify tabler--trash text-base"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Task 11 -->
                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" />
                                        </td>
                                        <td>
                                            <h5>
                                                <a href="apps-task-details.php" class="hover:text-primary">QA Review and Regression Testing</a>
                                            </h5>
                                            <p class="text-default-400 text-xs">
                                                Created: 3 Oct, 2025
                                                <small class="text-default-400 text-2xs">3:10 PM</small>
                                            </p>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <div class="size-8">
                                                    <img src="assets/images/users/user-2.jpg" alt="Grace" class="rounded-full" />
                                                </div>
                                                <div>
                                                    <h6 class="font-semibold">Grace</h6>
                                                    <p class="text-default-400 text-xs">QA Team</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-1.25">
                                                <i class="iconify tabler--calendar text-default-400 text-sm"></i>
                                                12 Sep, 2025
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-1.25">
                                                <i class="iconify tabler--list-details text-default-400 text-sm"></i>
                                                9/10
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge border-danger text-danger border">Cancelled</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-danger/15 text-danger">High</span>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-1.25">
                                                <i class="iconify tabler--messages text-default-400 text-sm"></i>
                                                17
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex justify-center gap-1.25">
                                                <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400">
                                                    <i class="iconify tabler--eye text-base"></i>
                                                </a>
                                                <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400">
                                                    <i class="iconify tabler--edit text-base"></i>
                                                </a>
                                                <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400" data-table-delete-row>
                                                    <i class="iconify tabler--trash text-base"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Task 12 -->
                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" />
                                        </td>
                                        <td>
                                            <h5>
                                                <a href="apps-task-details.php" class="hover:text-primary">Optimize Application Performance Metrics</a>
                                            </h5>
                                            <p class="text-default-400 text-xs">
                                                Created: 1 Oct, 2025
                                                <small class="text-default-400 text-2xs">12:05 PM</small>
                                            </p>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <div class="size-8">
                                                    <img src="assets/images/users/user-6.jpg" alt="Noah" class="rounded-full" />
                                                </div>
                                                <div>
                                                    <h6 class="font-semibold">Noah</h6>
                                                    <p class="text-default-400 text-xs">DevOps</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-1.25">
                                                <i class="iconify tabler--calendar text-default-400 text-sm"></i>
                                                18 Oct, 2025
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-1.25">
                                                <i class="iconify tabler--list-details text-default-400 text-sm"></i>
                                                2/7
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge border-success text-success border">In Progress</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-warning/15 text-warning">Medium</span>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-1.25">
                                                <i class="iconify tabler--messages text-default-400 text-sm"></i>
                                                6
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex justify-center gap-1.25">
                                                <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400">
                                                    <i class="iconify tabler--eye text-base"></i>
                                                </a>
                                                <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400">
                                                    <i class="iconify tabler--edit text-base"></i>
                                                </a>
                                                <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400" data-table-delete-row>
                                                    <i class="iconify tabler--trash text-base"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="card-footer">
                            <div data-table-pagination-info="tasks"></div>
                            <div data-table-pagination></div>
                        </div>
                    </div>
                </div>
            </main>

            <?php include('./partials/footer.php'); ?>
        </div>
        <!-- End Page content -->
    </div>

    <?php include('./partials/customizer.php'); ?>

    <?php include('./partials/footer-scripts.php'); ?>

    <!-- Custom table -->
    <script src="assets/js/pages/custom-table.js"></script>
</body>

</html>