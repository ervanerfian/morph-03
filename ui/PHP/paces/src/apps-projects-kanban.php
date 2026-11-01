<!doctype html>
<html lang="en">

<head>
    <?php $title = "Kanban Board"; include('partials/title-meta.php'); ?>

    <?php include('./partials/head-css.php'); ?>
</head>

<body>
    <div class="wrapper">
        <?php $subtitle = "Apps"; $title = "Kanban Board"; include('./partials/topbar.php'); ?>

        <?php include('./partials/sidenav.php'); ?>

        <!-- Start Page Content here -->
        <div class="page-content">
            <main class="pb-0!">

                <?php $subtitle = "Apps"; $title = "Kanban Board"; include('./partials/page-title.php'); ?>

                <div class="container-fluid">
                    <div class="card h-[calc(100vh-200px)]">
                        <div class="card-header">
                            <div class="flex gap-base flex-wrap items-center">
                                <!-- Search Bar -->
                                <div class="input-icon-group">
                                    <i class="iconify tabler--search input-icon"></i>
                                    <input type="text" class="form-input" placeholder="Search by task name, assignee..." />
                                </div>

                                <!-- Filter Controls -->
                                <div class="flex items-center gap-2.5">
                                    <!-- Team Filter -->
                                    <div class="input-icon-group">
                                        <i class="iconify tabler--users input-icon"></i>
                                        <select class="form-select">
                                            <option selected>Team</option>
                                            <option value="Product">Product</option>
                                            <option value="Engineering">Engineering</option>
                                            <option value="UX Design">UX Design</option>
                                            <option value="Customer Success">Customer Success</option>
                                            <option value="Support">Support</option>
                                        </select>
                                    </div>

                                    <!-- Priority Filter -->
                                    <div class="input-icon-group">
                                        <i class="iconify tabler--flag input-icon"></i>
                                        <select class="form-select">
                                            <option selected>Priority</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Medium">Medium</option>
                                            <option value="High">High</option>
                                            <option value="Urgent">Urgent</option>
                                        </select>
                                    </div>

                                    <!-- Status Filter -->
                                    <div class="input-icon-group">
                                        <i class="iconify tabler--circle-check input-icon"></i>
                                        <select class="form-select">
                                            <option selected>Status</option>
                                            <option value="To Do">To Do</option>
                                            <option value="In Progress">In Progress</option>
                                            <option value="Review">Review</option>
                                            <option value="Completed">Completed</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Apply Filter Button -->
                            <div>
                                <button class="btn bg-primary text-white hover:bg-primary-hover" aria-haspopup="dialog" aria-expanded="false" aria-controls="addTaskModal" data-hs-overlay="#addTaskModal">
                                    <i class="iconify tabler--plus"></i>
                                    Add New Task
                                </button>
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <div class="bg-light/40 flex items-stretch overflow-x-auto">
                                <!-- TODO Data-->
                                <div class="w-85 min-w-84 border-default-300 border-e border-dashed">
                                    <div class="flex items-center px-5 py-2.5">
                                        <h5>To Do (5)</h5>
                                        <a href="#!" class="bg-primary ms-auto inline-flex size-7.75 items-center justify-center rounded-full text-white">
                                            <i class="iconify tabler--plus text-sm text-white"></i>
                                        </a>
                                    </div>
                                    <div class="h-[calc(100vh-332px)] px-3 pb-3" data-simplebar data-simplebar-md>
                                        <ul data-plugins="sortable" class="space-y-2.5">
                                            <li>
                                                <div class="card border border-light hover:shadow-lg!">
                                                    <div class="card-body">
                                                        <div class="mb-2.75 flex items-center justify-between">
                                                            <div>
                                                                <span class="badge badge-label font-semibold bg-danger/15 text-danger"> High </span>
                                                            </div>

                                                            <!-- Dropdown -->
                                                            <div class="relative ms-auto -mt-3">
                                                                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                                                    <button type="button" class="hs-dropdown-toggle btn btn-icon size-7.75 text-default-400 hover:bg-default-100" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                                                        <i class="iconify tabler--dots-vertical text-base"></i>
                                                                    </button>

                                                                    <div class="hs-dropdown-menu" role="menu" aria-orientation="vertical">
                                                                        <div class="space-y-0.5">
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--share"></i>
                                                                                Share
                                                                            </a>

                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--edit"></i>
                                                                                Edit
                                                                            </a>

                                                                            <a class="dropdown-item text-danger" href="#">
                                                                                <i class="iconify tabler--trash"></i>
                                                                                Delete
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <h5 class="mb-2.5">
                                                            <a href="#!" class="hover:text-primary" draggable="false">Design onboarding flow for new user sign-up journey.</a>
                                                        </h5>

                                                        <div class="flex items-center mb-2.5">
                                                            <img src="assets/images/users/user-5.jpg" class="rounded-full me-2.5" width="28" height="28" alt="" draggable="false" />
                                                            <span class="text-default-400 font-medium">Ava Mitchell</span>
                                                        </div>

                                                        <div class="flex justify-between -mb-1.25 items-center text-default-500">
                                                            <span>4 Days</span>
                                                            <span><i class="iconify tabler--list-check"></i> 3</span>
                                                            <span><i class="iconify tabler--link"></i> 2</span>
                                                            <span><i class="iconify tabler--messages"></i> 9</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="card border border-light hover:shadow-lg!">
                                                    <div class="card-body">
                                                        <div class="mb-2.75 flex items-center justify-between">
                                                            <div>
                                                                <span class="badge badge-label font-semibold bg-success/15 text-success"> Normal </span>
                                                            </div>

                                                            <!-- Dropdown -->
                                                            <div class="relative ms-auto -mt-3">
                                                                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                                                    <button type="button" class="hs-dropdown-toggle btn btn-icon size-7.75 text-default-400 hover:bg-default-100" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                                                        <i class="iconify tabler--dots-vertical text-base"></i>
                                                                    </button>

                                                                    <div class="hs-dropdown-menu" role="menu" aria-orientation="vertical">
                                                                        <div class="space-y-0.5">
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--share"></i>
                                                                                Share
                                                                            </a>

                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--edit"></i>
                                                                                Edit
                                                                            </a>

                                                                            <a class="dropdown-item text-danger" href="#">
                                                                                <i class="iconify tabler--trash"></i>
                                                                                Delete
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <h5 class="mb-2.5">
                                                            <a href="#!" class="hover:text-primary" draggable="false">Create dark/light theme switcher with local storage.</a>
                                                        </h5>

                                                        <div class="flex items-center mb-2.5">
                                                            <img src="assets/images/users/user-8.jpg" class="rounded-full me-2.5" width="28" height="28" alt="" draggable="false" />
                                                            <span class="text-default-400 font-medium">Mia Johnson</span>
                                                        </div>

                                                        <div class="flex justify-between -mb-1.25 items-center text-default-500">
                                                            <span>2 Days</span>
                                                            <span><i class="iconify tabler--list-check"></i> 4</span>
                                                            <span><i class="iconify tabler--link"></i> 1</span>
                                                            <span><i class="iconify tabler--messages"></i> 6</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="card border border-light hover:shadow-lg!">
                                                    <div class="card-body">
                                                        <div class="mb-2.75 flex items-center justify-between">
                                                            <div>
                                                                <span class="badge badge-label font-semibold bg-warning/15 text-warning"> Medium </span>
                                                            </div>

                                                            <!-- Dropdown -->
                                                            <div class="relative ms-auto -mt-3">
                                                                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                                                    <button type="button" class="hs-dropdown-toggle btn btn-icon size-7.75 text-default-400 hover:bg-default-100" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                                                        <i class="iconify tabler--dots-vertical text-base"></i>
                                                                    </button>

                                                                    <div class="hs-dropdown-menu" role="menu" aria-orientation="vertical">
                                                                        <div class="space-y-0.5">
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--share"></i>
                                                                                Share
                                                                            </a>

                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--edit"></i>
                                                                                Edit
                                                                            </a>

                                                                            <a class="dropdown-item text-danger" href="#">
                                                                                <i class="iconify tabler--trash"></i>
                                                                                Delete
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <h5 class="mb-2.5">
                                                            <a href="#!" class="hover:text-primary" draggable="false">Write documentation for project setup and deployment.</a>
                                                        </h5>

                                                        <div class="flex items-center mb-2.5">
                                                            <img src="assets/images/users/user-9.jpg" class="rounded-full me-2.5" width="28" height="28" alt="" draggable="false" />
                                                            <span class="text-default-400 font-medium">Emma Scott</span>
                                                        </div>

                                                        <div class="flex justify-between -mb-1.25 items-center text-default-500">
                                                            <span>6 Days</span>
                                                            <span><i class="iconify tabler--list-check"></i> 3</span>
                                                            <span><i class="iconify tabler--link"></i> 1</span>
                                                            <span><i class="iconify tabler--messages"></i> 10</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="card border border-light hover:shadow-lg!">
                                                    <div class="card-body">
                                                        <div class="mb-2.75 flex items-center justify-between">
                                                            <div>
                                                                <span class="badge badge-label font-semibold bg-danger/15 text-danger"> High </span>
                                                            </div>

                                                            <!-- Dropdown -->
                                                            <div class="relative ms-auto -mt-3">
                                                                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                                                    <button type="button" class="hs-dropdown-toggle btn btn-icon size-7.75 text-default-400 hover:bg-default-100" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                                                        <i class="iconify tabler--dots-vertical text-base"></i>
                                                                    </button>

                                                                    <div class="hs-dropdown-menu" role="menu" aria-orientation="vertical">
                                                                        <div class="space-y-0.5">
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--share"></i>
                                                                                Share
                                                                            </a>

                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--edit"></i>
                                                                                Edit
                                                                            </a>

                                                                            <a class="dropdown-item text-danger" href="#">
                                                                                <i class="iconify tabler--trash"></i>
                                                                                Delete
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <h5 class="mb-2.5">
                                                            <a href="#!" class="hover:text-primary" draggable="false">Fix payment failed callback issue in checkout API.</a>
                                                        </h5>

                                                        <div class="flex items-center mb-2.5">
                                                            <img src="assets/images/users/user-3.jpg" class="rounded-full me-2.5" width="28" height="28" alt="" draggable="false" />
                                                            <span class="text-default-400 font-medium">Noah Parker</span>
                                                        </div>

                                                        <div class="flex justify-between -mb-1.25 items-center text-default-500">
                                                            <span>1 Days</span>
                                                            <span><i class="iconify tabler--list-check"></i> 5</span>
                                                            <span><i class="iconify tabler--link"></i> 2</span>
                                                            <span><i class="iconify tabler--messages"></i> 14</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="card border border-light hover:shadow-lg!">
                                                    <div class="card-body">
                                                        <div class="mb-2.75 flex items-center justify-between">
                                                            <div>
                                                                <span class="badge badge-label font-semibold bg-danger text-white"> Urgent </span>
                                                            </div>

                                                            <!-- Dropdown -->
                                                            <div class="relative ms-auto -mt-3">
                                                                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                                                    <button type="button" class="hs-dropdown-toggle btn btn-icon size-7.75 text-default-400 hover:bg-default-100" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                                                        <i class="iconify tabler--dots-vertical text-base"></i>
                                                                    </button>

                                                                    <div class="hs-dropdown-menu" role="menu" aria-orientation="vertical">
                                                                        <div class="space-y-0.5">
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--share"></i>
                                                                                Share
                                                                            </a>

                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--edit"></i>
                                                                                Edit
                                                                            </a>

                                                                            <a class="dropdown-item text-danger" href="#">
                                                                                <i class="iconify tabler--trash"></i>
                                                                                Delete
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <h5 class="mb-2.5">
                                                            <a href="#!" class="hover:text-primary" draggable="false">Resolve server downtime and restore access logs.</a>
                                                        </h5>

                                                        <div class="flex items-center mb-2.5">
                                                            <img src="assets/images/users/user-7.jpg" class="rounded-full me-2.5" width="28" height="28" alt="" draggable="false" />
                                                            <span class="text-default-400 font-medium">Lucas Martin</span>
                                                        </div>

                                                        <div class="flex justify-between -mb-1.25 items-center text-default-500">
                                                            <span>8 Days</span>
                                                            <span><i class="iconify tabler--list-check"></i> 7</span>
                                                            <span><i class="iconify tabler--link"></i> 3</span>
                                                            <span><i class="iconify tabler--messages"></i> 18</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- end TODO Data-->

                                <!-- IN Progress Data-->
                                <div class="w-85 min-w-84 border-default-300 border-e border-dashed">
                                    <div class="flex items-center px-5 py-2.5">
                                        <h5>In Progress (3)</h5>
                                        <a href="#!" class="bg-primary ms-auto inline-flex size-7.75 items-center justify-center rounded-full text-white">
                                            <i class="iconify tabler--plus text-sm text-white"></i>
                                        </a>
                                    </div>
                                    <div class="h-[calc(100vh-332px)] px-3 pb-3" data-simplebar data-simplebar-md>
                                        <ul data-plugins="sortable" class="space-y-2.5">
                                            <li>
                                                <div class="card border border-light hover:shadow-lg!">
                                                    <div class="card-body">
                                                        <div class="mb-2.75 flex items-center justify-between">
                                                            <div>
                                                                <span class="badge badge-label font-semibold bg-danger/15 text-danger"> High </span>
                                                            </div>

                                                            <!-- Dropdown -->
                                                            <div class="relative ms-auto -mt-3">
                                                                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                                                    <button type="button" class="hs-dropdown-toggle btn btn-icon size-7.75 text-default-400 hover:bg-default-100" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                                                        <i class="iconify tabler--dots-vertical text-base"></i>
                                                                    </button>

                                                                    <div class="hs-dropdown-menu" role="menu" aria-orientation="vertical">
                                                                        <div class="space-y-0.5">
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--share"></i>
                                                                                Share
                                                                            </a>

                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--edit"></i>
                                                                                Edit
                                                                            </a>

                                                                            <a class="dropdown-item text-danger" href="#">
                                                                                <i class="iconify tabler--trash"></i>
                                                                                Delete
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <h5 class="mb-2.5">
                                                            <a href="#!" class="hover:text-primary" draggable="false">Implement role-based access control for admin panel.</a>
                                                        </h5>

                                                        <div class="flex items-center mb-2.5">
                                                            <img src="assets/images/users/user-4.jpg" class="rounded-full me-2.5" width="28" height="28" alt="" draggable="false" />
                                                            <span class="text-default-400 font-medium">Sophia Wilson</span>
                                                        </div>

                                                        <div class="flex justify-between -mb-1.25 items-center text-default-500">
                                                            <span>3 Days</span>
                                                            <span><i class="iconify tabler--list-check"></i> 5</span>
                                                            <span><i class="iconify tabler--link"></i> 4</span>
                                                            <span><i class="iconify tabler--messages"></i> 11</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="card border border-light hover:shadow-lg!">
                                                    <div class="card-body">
                                                        <div class="mb-2.75 flex items-center justify-between">
                                                            <div>
                                                                <span class="badge badge-label font-semibold bg-warning/15 text-warning"> Medium </span>
                                                            </div>

                                                            <!-- Dropdown -->
                                                            <div class="relative ms-auto -mt-3">
                                                                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                                                    <button type="button" class="hs-dropdown-toggle btn btn-icon size-7.75 text-default-400 hover:bg-default-100" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                                                        <i class="iconify tabler--dots-vertical text-base"></i>
                                                                    </button>

                                                                    <div class="hs-dropdown-menu" role="menu" aria-orientation="vertical">
                                                                        <div class="space-y-0.5">
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--share"></i>
                                                                                Share
                                                                            </a>

                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--edit"></i>
                                                                                Edit
                                                                            </a>

                                                                            <a class="dropdown-item text-danger" href="#">
                                                                                <i class="iconify tabler--trash"></i>
                                                                                Delete
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <h5 class="mb-2.5">
                                                            <a href="#!" class="hover:text-primary" draggable="false">Refactor project directory structure for clarity.</a>
                                                        </h5>

                                                        <div class="flex items-center mb-2.5">
                                                            <img src="assets/images/users/user-7.jpg" class="rounded-full me-2.5" width="28" height="28" alt="" draggable="false" />
                                                            <span class="text-default-400 font-medium">Hannah Green</span>
                                                        </div>

                                                        <div class="flex justify-between -mb-1.25 items-center text-default-500">
                                                            <span>5 Days</span>
                                                            <span><i class="iconify tabler--list-check"></i> 3</span>
                                                            <span><i class="iconify tabler--link"></i> 1</span>
                                                            <span><i class="iconify tabler--messages"></i> 7</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="card border border-light hover:shadow-lg!">
                                                    <div class="card-body">
                                                        <div class="mb-2.75 flex items-center justify-between">
                                                            <div>
                                                                <span class="badge badge-label font-semibold bg-danger text-white"> Urgent </span>
                                                            </div>

                                                            <!-- Dropdown -->
                                                            <div class="relative ms-auto -mt-3">
                                                                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                                                    <button type="button" class="hs-dropdown-toggle btn btn-icon size-7.75 text-default-400 hover:bg-default-100" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                                                        <i class="iconify tabler--dots-vertical text-base"></i>
                                                                    </button>

                                                                    <div class="hs-dropdown-menu" role="menu" aria-orientation="vertical">
                                                                        <div class="space-y-0.5">
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--share"></i>
                                                                                Share
                                                                            </a>

                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--edit"></i>
                                                                                Edit
                                                                            </a>

                                                                            <a class="dropdown-item text-danger" href="#">
                                                                                <i class="iconify tabler--trash"></i>
                                                                                Delete
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <h5 class="mb-2.5">
                                                            <a href="#!" class="hover:text-primary" draggable="false">Resolve 500 errors occurring on user authentication.</a>
                                                        </h5>

                                                        <div class="flex items-center mb-2.5">
                                                            <img src="assets/images/users/user-9.jpg" class="rounded-full me-2.5" width="28" height="28" alt="" draggable="false" />
                                                            <span class="text-default-400 font-medium">Evelyn Clark</span>
                                                        </div>

                                                        <div class="flex justify-between -mb-1.25 items-center text-default-500">
                                                            <span>6 Days</span>
                                                            <span><i class="iconify tabler--list-check"></i> 8</span>
                                                            <span><i class="iconify tabler--link"></i> 5</span>
                                                            <span><i class="iconify tabler--messages"></i> 21</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- end IN Progress Data-->

                                <!-- In Review Data-->
                                <div class="w-85 min-w-84 border-default-300 border-e border-dashed">
                                    <div class="flex items-center px-5 py-2.5">
                                        <h5>In Review (4)</h5>
                                        <a href="#!" class="bg-primary ms-auto inline-flex size-7.75 items-center justify-center rounded-full text-white">
                                            <i class="iconify tabler--plus text-sm text-white"></i>
                                        </a>
                                    </div>
                                    <div class="h-[calc(100vh-332px)] px-3 pb-3" data-simplebar data-simplebar-md>
                                        <ul data-plugins="sortable" class="space-y-2.5">
                                            <li>
                                                <div class="card border border-light hover:shadow-lg!">
                                                    <div class="card-body">
                                                        <div class="mb-2.75 flex items-center justify-between">
                                                            <div>
                                                                <span class="badge badge-label font-semibold bg-warning/15 text-warning"> Medium </span>
                                                            </div>

                                                            <!-- Dropdown -->
                                                            <div class="relative ms-auto -mt-3">
                                                                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                                                    <button type="button" class="hs-dropdown-toggle btn btn-icon size-7.75 text-default-400 hover:bg-default-100" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                                                        <i class="iconify tabler--dots-vertical text-base"></i>
                                                                    </button>

                                                                    <div class="hs-dropdown-menu" role="menu" aria-orientation="vertical">
                                                                        <div class="space-y-0.5">
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--share"></i>
                                                                                Share
                                                                            </a>

                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--edit"></i>
                                                                                Edit
                                                                            </a>

                                                                            <a class="dropdown-item text-danger" href="#">
                                                                                <i class="iconify tabler--trash"></i>
                                                                                Delete
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <h5 class="mb-2.5">
                                                            <a href="#!" class="hover:text-primary" draggable="false">Add placeholder loading animations (skeleton screens).</a>
                                                        </h5>

                                                        <div class="flex items-center mb-2.5">
                                                            <img src="assets/images/users/user-10.jpg" class="rounded-full me-2.5" width="28" height="28" alt="" draggable="false" />
                                                            <span class="text-default-400 font-medium">Benjamin Hill</span>
                                                        </div>

                                                        <div class="flex justify-between -mb-1.25 items-center text-default-500">
                                                            <span>4 Days</span>
                                                            <span><i class="iconify tabler--list-check"></i> 4</span>
                                                            <span><i class="iconify tabler--link"></i> 0</span>
                                                            <span><i class="iconify tabler--messages"></i> 8</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="card border border-light hover:shadow-lg!">
                                                    <div class="card-body">
                                                        <div class="mb-2.75 flex items-center justify-between">
                                                            <div>
                                                                <span class="badge badge-label font-semibold bg-success/15 text-success"> Normal </span>
                                                            </div>

                                                            <!-- Dropdown -->
                                                            <div class="relative ms-auto -mt-3">
                                                                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                                                    <button type="button" class="hs-dropdown-toggle btn btn-icon size-7.75 text-default-400 hover:bg-default-100" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                                                        <i class="iconify tabler--dots-vertical text-base"></i>
                                                                    </button>

                                                                    <div class="hs-dropdown-menu" role="menu" aria-orientation="vertical">
                                                                        <div class="space-y-0.5">
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--share"></i>
                                                                                Share
                                                                            </a>

                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--edit"></i>
                                                                                Edit
                                                                            </a>

                                                                            <a class="dropdown-item text-danger" href="#">
                                                                                <i class="iconify tabler--trash"></i>
                                                                                Delete
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <h5 class="mb-2.5">
                                                            <a href="#!" class="hover:text-primary" draggable="false">Improve success/error toast notification styles.</a>
                                                        </h5>

                                                        <div class="flex items-center mb-2.5">
                                                            <img src="assets/images/users/user-6.jpg" class="rounded-full me-2.5" width="28" height="28" alt="" draggable="false" />
                                                            <span class="text-default-400 font-medium">Andrew Carter</span>
                                                        </div>

                                                        <div class="flex justify-between -mb-1.25 items-center text-default-500">
                                                            <span>5 Days</span>
                                                            <span><i class="iconify tabler--list-check"></i> 1</span>
                                                            <span><i class="iconify tabler--link"></i> 0</span>
                                                            <span><i class="iconify tabler--messages"></i> 3</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="card border border-light hover:shadow-lg!">
                                                    <div class="card-body">
                                                        <div class="mb-2.75 flex items-center justify-between">
                                                            <div>
                                                                <span class="badge badge-label font-semibold bg-danger/15 text-danger"> High </span>
                                                            </div>

                                                            <!-- Dropdown -->
                                                            <div class="relative ms-auto -mt-3">
                                                                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                                                    <button type="button" class="hs-dropdown-toggle btn btn-icon size-7.75 text-default-400 hover:bg-default-100" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                                                        <i class="iconify tabler--dots-vertical text-base"></i>
                                                                    </button>

                                                                    <div class="hs-dropdown-menu" role="menu" aria-orientation="vertical">
                                                                        <div class="space-y-0.5">
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--share"></i>
                                                                                Share
                                                                            </a>

                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--edit"></i>
                                                                                Edit
                                                                            </a>

                                                                            <a class="dropdown-item text-danger" href="#">
                                                                                <i class="iconify tabler--trash"></i>
                                                                                Delete
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <h5 class="mb-2.5">
                                                            <a href="#!" class="hover:text-primary" draggable="false">Integrate analytics dashboard with real-time API data.</a>
                                                        </h5>

                                                        <div class="flex items-center mb-2.5">
                                                            <img src="assets/images/users/user-7.jpg" class="rounded-full me-2.5" width="28" height="28" alt="" draggable="false" />
                                                            <span class="text-default-400 font-medium">Logan Brooks</span>
                                                        </div>

                                                        <div class="flex justify-between -mb-1.25 items-center text-default-500">
                                                            <span>3 Days</span>
                                                            <span><i class="iconify tabler--list-check"></i> 6</span>
                                                            <span><i class="iconify tabler--link"></i> 3</span>
                                                            <span><i class="iconify tabler--messages"></i> 12</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="card border border-light hover:shadow-lg!">
                                                    <div class="card-body">
                                                        <div class="mb-2.75 flex items-center justify-between">
                                                            <div>
                                                                <span class="badge badge-label font-semibold bg-warning/15 text-warning"> Medium </span>
                                                            </div>

                                                            <!-- Dropdown -->
                                                            <div class="relative ms-auto -mt-3">
                                                                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                                                    <button type="button" class="hs-dropdown-toggle btn btn-icon size-7.75 text-default-400 hover:bg-default-100" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                                                        <i class="iconify tabler--dots-vertical text-base"></i>
                                                                    </button>

                                                                    <div class="hs-dropdown-menu" role="menu" aria-orientation="vertical">
                                                                        <div class="space-y-0.5">
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--share"></i>
                                                                                Share
                                                                            </a>

                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--edit"></i>
                                                                                Edit
                                                                            </a>

                                                                            <a class="dropdown-item text-danger" href="#">
                                                                                <i class="iconify tabler--trash"></i>
                                                                                Delete
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <h5 class="mb-2.5">
                                                            <a href="#!" class="hover:text-primary" draggable="false">Add pagination support to activity feed list.</a>
                                                        </h5>

                                                        <div class="flex items-center mb-2.5">
                                                            <img src="assets/images/users/user-1.jpg" class="rounded-full me-2.5" width="28" height="28" alt="" draggable="false" />
                                                            <span class="text-default-400 font-medium">Mark Evans</span>
                                                        </div>

                                                        <div class="flex justify-between -mb-1.25 items-center text-default-500">
                                                            <span>4 Days</span>
                                                            <span><i class="iconify tabler--list-check"></i> 3</span>
                                                            <span><i class="iconify tabler--link"></i> 1</span>
                                                            <span><i class="iconify tabler--messages"></i> 5</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- end In Review Data-->

                                <!-- Done Data-->
                                <div class="w-85 min-w-84 border-default-300 border-e border-dashed">
                                    <div class="flex items-center px-5 py-2.5">
                                        <h5>Done (2)</h5>
                                        <a href="#!" class="bg-primary ms-auto inline-flex size-7.75 items-center justify-center rounded-full text-white">
                                            <i class="iconify tabler--plus text-sm text-white"></i>
                                        </a>
                                    </div>
                                    <div class="h-[calc(100vh-332px)] px-3 pb-3" data-simplebar data-simplebar-md>
                                        <ul data-plugins="sortable" class="space-y-2.5">
                                            <li>
                                                <div class="card border border-light hover:shadow-lg!">
                                                    <div class="card-body">
                                                        <div class="mb-2.75 flex items-center justify-between">
                                                            <div>
                                                                <span class="badge badge-label font-semibold bg-success/15 text-success"> Completed </span>
                                                            </div>

                                                            <!-- Dropdown -->
                                                            <div class="relative ms-auto -mt-3">
                                                                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                                                    <button type="button" class="hs-dropdown-toggle btn btn-icon size-7.75 text-default-400 hover:bg-default-100" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                                                        <i class="iconify tabler--dots-vertical text-base"></i>
                                                                    </button>

                                                                    <div class="hs-dropdown-menu" role="menu" aria-orientation="vertical">
                                                                        <div class="space-y-0.5">
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--share"></i>
                                                                                Share
                                                                            </a>

                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--edit"></i>
                                                                                Edit
                                                                            </a>

                                                                            <a class="dropdown-item text-danger" href="#">
                                                                                <i class="iconify tabler--trash"></i>
                                                                                Delete
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <h5 class="mb-2.5">
                                                            <a href="#!" class="hover:text-primary" draggable="false">Completed UI redesign for profile settings page.</a>
                                                        </h5>

                                                        <div class="flex items-center mb-2.5">
                                                            <img src="assets/images/users/user-3.jpg" class="rounded-full me-2.5" width="28" height="28" alt="" draggable="false" />
                                                            <span class="text-default-400 font-medium">Harper Lee</span>
                                                        </div>

                                                        <div class="flex justify-between -mb-1.25 items-center text-default-500">
                                                            <span>Completed</span>
                                                            <span><i class="iconify tabler--list-check"></i> 4</span>
                                                            <span><i class="iconify tabler--link"></i> 1</span>
                                                            <span><i class="iconify tabler--messages"></i> 3</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="card border border-light hover:shadow-lg!">
                                                    <div class="card-body">
                                                        <div class="mb-2.75 flex items-center justify-between">
                                                            <div>
                                                                <span class="badge badge-label font-semibold bg-success/15 text-success"> Completed </span>
                                                            </div>

                                                            <!-- Dropdown -->
                                                            <div class="relative ms-auto -mt-3">
                                                                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                                                    <button type="button" class="hs-dropdown-toggle btn btn-icon size-7.75 text-default-400 hover:bg-default-100" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                                                        <i class="iconify tabler--dots-vertical text-base"></i>
                                                                    </button>

                                                                    <div class="hs-dropdown-menu" role="menu" aria-orientation="vertical">
                                                                        <div class="space-y-0.5">
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--share"></i>
                                                                                Share
                                                                            </a>

                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--edit"></i>
                                                                                Edit
                                                                            </a>

                                                                            <a class="dropdown-item text-danger" href="#">
                                                                                <i class="iconify tabler--trash"></i>
                                                                                Delete
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <h5 class="mb-2.5">
                                                            <a href="#!" class="hover:text-primary" draggable="false">Launched new email notification templating system.</a>
                                                        </h5>

                                                        <div class="flex items-center mb-2.5">
                                                            <img src="assets/images/users/user-5.jpg" class="rounded-full me-2.5" width="28" height="28" alt="" draggable="false" />
                                                            <span class="text-default-400 font-medium">Jacob Miller</span>
                                                        </div>

                                                        <div class="flex justify-between -mb-1.25 items-center text-default-500">
                                                            <span>Completed</span>
                                                            <span><i class="iconify tabler--list-check"></i> 5</span>
                                                            <span><i class="iconify tabler--link"></i> 0</span>
                                                            <span><i class="iconify tabler--messages"></i> 2</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- end Done Data-->
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <?php include('./partials/footer.php'); ?>

            <div id="addTaskModal" class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 pointer-events-none fixed start-0 top-0 z-80 hidden size-full overflow-x-hidden overflow-y-auto" role="dialog" tabindex="-1" aria-labelledby="addTaskModalLabel">
                <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 m-3 flex scale-95 items-center opacity-0 transition-all duration-200 ease-in-out md:mx-auto md:w-full md:max-w-lg lg:max-w-lg min-h-[calc(100%-56px)]">
                    <div class="card pointer-events-auto flex w-full flex-col">
                        <div class="card-header p-5">
                            <h3 id="addTaskModalLabel" class="text-sm">Add New Task</h3>
                            <button type="button" aria-label="Close" data-hs-overlay="#addTaskModal">
                                <i class="iconify tabler--x text-xl"></i>
                            </button>
                        </div>

                        <div class="overflow-y-auto card-body">
                            <form id="taskForm">
                                <!-- Task Title -->
                                <div class="mb-5">
                                    <label class="form-label">Task Title</label>
                                    <input type="text" class="form-input" placeholder="Enter task name..." required />
                                </div>

                                <!-- Assignee -->
                                <div class="mb-5">
                                    <label class="form-label">Assign To</label>
                                    <select class="form-select">
                                        <option selected disabled>Select user</option>
                                        <option value="Liam Carter">Liam Carter</option>
                                        <option value="Ava Mitchell">Ava Mitchell</option>
                                        <option value="Noah Parker">Noah Parker</option>
                                        <option value="Emma Scott">Emma Scott</option>
                                        <option value="Logan Brooks">Logan Brooks</option>
                                    </select>
                                </div>

                                <!-- Priority -->
                                <div class="mb-5">
                                    <label class="form-label">Priority</label>
                                    <select class="form-select">
                                        <option value="Normal" selected>Normal</option>
                                        <option value="Medium">Medium</option>
                                        <option value="High">High</option>
                                        <option value="Urgent">Urgent</option>
                                    </select>
                                </div>

                                <!-- Due Date -->
                                <div class="mb-5">
                                    <label class="form-label">Due Date</label>
                                    <input type="date" class="form-input" data-provider="flatpickr" data-date-format="d M, Y" />
                                </div>

                                <!-- Description -->
                                <div class="mb-5">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-textarea" rows="3" placeholder="Brief details..."></textarea>
                                </div>
                            </form>
                        </div>

                        <div class="border-default-300 flex items-center justify-end gap-x-2 border-t p-5">
                            <button type="button" class="btn bg-light hover:text-primary" data-hs-overlay="#addTaskModal">Cancel</button>

                            <button type="button" class="btn bg-primary text-white hover:bg-primary-hover">
                                <i class="iconify tabler--check"></i>
                                Save Task
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page content -->
    </div>

    <?php include('./partials/customizer.php'); ?>

    <?php include('./partials/footer-scripts.php'); ?>

    <!-- Sortable js -->
    <script src="assets/plugins/sortablejs/Sortable.min.js"></script>
    
    <!-- Kanban Page js -->
    <script src="assets/js/pages/apps-kanban.js"></script>
</body>

</html>