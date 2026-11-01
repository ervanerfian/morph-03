<!doctype html>
<html lang="en">

<head>
    <?php $title = "Team Board"; include('partials/title-meta.php'); ?> 
    
<?php include('./partials/head-css.php'); ?>
</head>

<body>
    <div class="wrapper">
        <?php $subtitle = "Apps"; $title = "Team Board"; include('./partials/topbar.php'); ?> 
        
        <?php include('./partials/sidenav.php'); ?>

        <!-- Start Page Content here -->
         <div class="page-content">
            <main>
                <div class="container-fluid">
                    <div class="my-5 flex items-center justify-between">
                        <div class="grow">
                            <h4 class="mb-1.25 page-main-title">Manage Teams</h4>
                            <p class="text-default-400">Assign roles to streamline teamwork and secure access.</p>
                        </div>
                        <div class="text-end">
                            <a href="#addTeamModal" class="btn bg-success text-white hover:bg-success-hover" aria-haspopup="dialog" aria-expanded="false" aria-controls="addTeamModal" data-hs-overlay="#addTeamModal"> <i class="iconify tabler--plus"></i> Add New Team </a>
                        </div>
                    </div>

                    <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-base">
                        <div class="card h-full">
                            <div class="card-header">
                                <h4 class="card-title">
                                    IT-01 - Design Team
                                    <span class="badge badge-label ms-2.5 bg-primary text-white">New</span>
                                </h4>

                                <!-- Dropdown -->
                                <div class="relative ms-auto">
                                    <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                        <button type="button" class="hs-dropdown-toggle text-default-400 text-lg" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                            <i class="iconify tabler--dots-vertical"></i>
                                        </button>

                                        <div class="hs-dropdown-menu" role="menu" aria-orientation="vertical">
                                            <a class="dropdown-item" href="#">
                                                <i class="iconify tabler--share"></i>
                                                View
                                            </a>

                                            <a class="dropdown-item" href="#">
                                                <i class="iconify tabler--edit"></i>
                                                Edit
                                            </a>

                                            <a class="dropdown-item text-danger" href="#">
                                                <i class="iconify tabler--trash"></i>
                                                Remove
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body flex justify-between flex-col h-full">
                                <div class="grid md:grid-cols-2 gap-base mb-5">
                                    <div>
                                        <p class="text-default-400 mb-2.5">Total 4 members</p>

                                        <div class="flex items-center -space-x-2">
                                            <div>
                                                <img src="assets/images/users/user-7.jpg" alt="" class="size-8 rounded-full transition-all hover:-translate-y-0.5" />
                                            </div>
                                            <div>
                                                <img src="assets/images/users/user-8.jpg" alt="" class="size-8 rounded-full transition-all hover:-translate-y-0.5" />
                                            </div>
                                            <div>
                                                <img src="assets/images/users/user-9.jpg" alt="" class="size-8 rounded-full transition-all hover:-translate-y-0.5" />
                                            </div>
                                            <div>
                                                <img src="assets/images/users/user-10.jpg" alt="" class="size-8 rounded-full transition-all hover:-translate-y-0.5" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex items-start gap-2.5">
                                        <span class="flex items-center justify-center bg-light size-8 rounded-full">
                                            <i class="iconify tabler--medal text-dark text-base"></i>
                                        </span>
                                        <div>
                                            <h6 class="text-default-400 mb-1.25 text-xs uppercase">Ranking</h6>
                                            <p class="font-medium">#5</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="pb-base">
                                    <p class="text-default-400 mb-4">The Design Team focuses on creating intuitive user experiences and visually appealing interfaces. We handle UI/UX design, prototyping, and brand consistency across all digital products.</p>
                                </div>

                                <div class="mb-5">
                                    <div class="mb-2.5 flex items-center justify-between">
                                        <p class="text-default-400 text-sm font-semibold">Status of current project</p>
                                        <p class="font-semibold">65%</p>
                                    </div>
                                    <div class="bg-default-100 flex h-1.25 w-full overflow-hidden rounded-full" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                        <div class="bg-primary flex flex-col justify-center overflow-hidden rounded-full rounded-e-none text-center text-xs whitespace-nowrap text-white transition duration-500" style="width: 65%"></div>
                                    </div>
                                </div>

                                <div class="flex justify-between items-center">
                                    <span class="text-default-400 text-xs">
                                        <i class="iconify tabler--clock me-1.25 align-middle text-xs"></i>
                                        Updated 1 hour ago
                                    </span>
                                    <a href="#" class="btn btn-sm bg-primary rounded-full text-white">Details</a>
                                </div>
                            </div>
                        </div>

                        <div class="card h-full">
                            <div class="card-header">
                                <h4 class="card-title">
                                    IT-02 - Development Team
                                    <span class="badge badge-label ms-2.5 bg-success text-white">Active</span>
                                </h4>

                                <!-- Dropdown -->
                                <div class="relative ms-auto">
                                    <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                        <button type="button" class="hs-dropdown-toggle text-default-400 text-lg" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                            <i class="iconify tabler--dots-vertical"></i>
                                        </button>

                                        <div class="hs-dropdown-menu" role="menu" aria-orientation="vertical">
                                            <a class="dropdown-item" href="#">
                                                <i class="iconify tabler--share"></i>
                                                View
                                            </a>

                                            <a class="dropdown-item" href="#">
                                                <i class="iconify tabler--edit"></i>
                                                Edit
                                            </a>

                                            <a class="dropdown-item text-danger" href="#">
                                                <i class="iconify tabler--trash"></i>
                                                Remove
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body flex justify-between flex-col h-full">
                                <div class="grid md:grid-cols-2 gap-base mb-5">
                                    <div>
                                        <p class="text-default-400 mb-2.5">Total 6 members</p>

                                        <div class="flex items-center -space-x-2">
                                            <div>
                                                <img src="assets/images/users/user-1.jpg" alt="" class="size-8 rounded-full transition-all hover:-translate-y-0.5" />
                                            </div>
                                            <div>
                                                <img src="assets/images/users/user-2.jpg" alt="" class="size-8 rounded-full transition-all hover:-translate-y-0.5" />
                                            </div>
                                            <div>
                                                <img src="assets/images/users/user-3.jpg" alt="" class="size-8 rounded-full transition-all hover:-translate-y-0.5" />
                                            </div>
                                            <div>
                                                <img src="assets/images/users/user-4.jpg" alt="" class="size-8 rounded-full transition-all hover:-translate-y-0.5" />
                                            </div>
                                            <div>
                                                <img src="assets/images/users/user-5.jpg" alt="" class="size-8 rounded-full transition-all hover:-translate-y-0.5" />
                                            </div>

                                            <div>
                                                <span class="flex items-center justify-center size-8 text-white bg-primary rounded-full font-bold transition-all hover:-translate-y-0.5">1+</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex items-start gap-2.5">
                                        <span class="flex items-center justify-center bg-light size-8 rounded-full">
                                            <i class="iconify tabler--medal text-dark text-base"></i>
                                        </span>
                                        <div>
                                            <h6 class="text-default-400 mb-1.25 text-xs uppercase">Ranking</h6>
                                            <p class="font-medium">#2</p>
                                        </div>
                                    </div>
                                </div>

                                <p class="text-default-400 mb-5">Responsible for application logic, backend development, API integration, and performance optimization across platforms.</p>

                                <div class="mb-5">
                                    <div class="mb-2.5 flex items-center justify-between">
                                        <p class="text-default-400 text-sm font-semibold">Current Sprint Progress</p>
                                        <p class="font-semibold">82%</p>
                                    </div>
                                    <div class="bg-default-200 flex h-1.25 w-full overflow-hidden rounded-full" role="progressbar" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100">
                                        <div class="bg-primary flex flex-col justify-center overflow-hidden rounded-full rounded-e-none text-center text-xs whitespace-nowrap text-white transition duration-500" style="width: 82%"></div>
                                    </div>
                                </div>

                                <div class="flex justify-between items-center">
                                    <span class="text-default-400 text-xs">
                                        <i class="iconify tabler--clock me-1.25 align-middle text-xs"></i>
                                        Updated 3 hour ago
                                    </span>
                                    <a href="#" class="btn btn-sm bg-primary rounded-full text-white">Details</a>
                                </div>
                            </div>
                        </div>

                        <div class="card h-full">
                            <div class="card-header">
                                <h4 class="card-title">
                                    IT-03 - QA Team
                                    <span class="badge badge-label ms-2.5 bg-warning text-white">Ongoing</span>
                                </h4>

                                <!-- Dropdown -->
                                <div class="relative ms-auto">
                                    <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                        <button type="button" class="hs-dropdown-toggle text-default-400 text-lg" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                            <i class="iconify tabler--dots-vertical"></i>
                                        </button>

                                        <div class="hs-dropdown-menu" role="menu" aria-orientation="vertical">
                                            <a class="dropdown-item" href="#">
                                                <i class="iconify tabler--share"></i>
                                                View
                                            </a>

                                            <a class="dropdown-item" href="#">
                                                <i class="iconify tabler--edit"></i>
                                                Edit
                                            </a>

                                            <a class="dropdown-item text-danger" href="#">
                                                <i class="iconify tabler--trash"></i>
                                                Remove
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body flex justify-between flex-col h-full">
                                <div class="grid md:grid-cols-2 gap-base mb-5">
                                    <div>
                                        <p class="text-default-400 mb-2.5">Total 5 members</p>

                                        <div class="flex items-center -space-x-2">
                                            <div>
                                                <img src="assets/images/users/user-10.jpg" alt="" class="size-8 rounded-full transition-all hover:-translate-y-0.5" />
                                            </div>
                                            <div>
                                                <img src="assets/images/users/user-9.jpg" alt="" class="size-8 rounded-full transition-all hover:-translate-y-0.5" />
                                            </div>
                                            <div>
                                                <img src="assets/images/users/user-8.jpg" alt="" class="size-8 rounded-full transition-all hover:-translate-y-0.5" />
                                            </div>
                                            <div>
                                                <img src="assets/images/users/user-7.jpg" alt="" class="size-8 rounded-full transition-all hover:-translate-y-0.5" />
                                            </div>
                                            <div>
                                                <img src="assets/images/users/user-6.jpg" alt="" class="size-8 rounded-full transition-all hover:-translate-y-0.5" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex items-start gap-2.5">
                                        <span class="flex items-center justify-center bg-light size-8 rounded-full">
                                            <i class="iconify tabler--medal text-dark text-base"></i>
                                        </span>
                                        <div>
                                            <h6 class="text-default-400 mb-1.25 text-xs uppercase">Ranking</h6>
                                            <p class="font-medium">#3</p>
                                        </div>
                                    </div>
                                </div>

                                <p class="text-default-400 mb-5">Ensures software stability, conducts manual & automated tests, maintains bug reports & release validation.</p>

                                <div class="mb-5">
                                    <div class="mb-2.5 flex items-center justify-between">
                                        <p class="text-default-400 text-sm font-semibold">Testing Cycle Progress</p>
                                        <p class="font-semibold">74%</p>
                                    </div>
                                    <div class="bg-default-200 flex h-1.25 w-full overflow-hidden rounded-full" role="progressbar" aria-valuenow="74" aria-valuemin="0" aria-valuemax="100">
                                        <div class="bg-primary flex flex-col justify-center overflow-hidden rounded-full rounded-e-none text-center text-xs whitespace-nowrap text-white transition duration-500" style="width: 74%"></div>
                                    </div>
                                </div>

                                <div class="flex justify-between items-center">
                                    <span class="text-default-400 text-xs">
                                        <i class="iconify tabler--clock me-1.25 align-middle text-xs"></i>
                                        Updated yesterday
                                    </span>
                                    <a href="#" class="btn btn-sm bg-primary rounded-full text-white">Details</a>
                                </div>
                            </div>
                        </div>

                        <div class="card h-full">
                            <div class="card-header">
                                <h4 class="card-title">
                                    MK-01 - Marketing Team
                                    <span class="badge badge-label ms-2.5 bg-info text-white">Active</span>
                                </h4>

                                <!-- Dropdown -->
                                <div class="relative ms-auto">
                                    <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                        <button type="button" class="hs-dropdown-toggle text-default-400 text-lg" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                            <i class="iconify tabler--dots-vertical"></i>
                                        </button>

                                        <div class="hs-dropdown-menu" role="menu" aria-orientation="vertical">
                                            <a class="dropdown-item" href="#">
                                                <i class="iconify tabler--share"></i>
                                                View
                                            </a>

                                            <a class="dropdown-item" href="#">
                                                <i class="iconify tabler--edit"></i>
                                                Edit
                                            </a>

                                            <a class="dropdown-item text-danger" href="#">
                                                <i class="iconify tabler--trash"></i>
                                                Remove
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body flex justify-between flex-col h-full">
                                <div class="grid md:grid-cols-2 gap-base mb-5">
                                    <div>
                                        <p class="text-default-400 mb-2.5">Total 8 members</p>

                                        <div class="flex items-center -space-x-2">
                                            <div>
                                                <img src="assets/images/users/user-3.jpg" alt="" class="size-8 rounded-full transition-all hover:-translate-y-0.5" />
                                            </div>
                                            <div>
                                                <img src="assets/images/users/user-5.jpg" alt="" class="size-8 rounded-full transition-all hover:-translate-y-0.5" />
                                            </div>
                                            <div>
                                                <img src="assets/images/users/user-7.jpg" alt="" class="size-8 rounded-full transition-all hover:-translate-y-0.5" />
                                            </div>
                                            <div>
                                                <img src="assets/images/users/user-9.jpg" alt="" class="size-8 rounded-full transition-all hover:-translate-y-0.5" />
                                            </div>
                                            <div>
                                                <img src="assets/images/users/user-1.jpg" alt="" class="size-8 rounded-full transition-all hover:-translate-y-0.5" />
                                            </div>

                                            <div>
                                                <span class="flex items-center justify-center size-8 text-white bg-primary rounded-full font-bold transition-all hover:-translate-y-0.5">3+</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex items-start gap-2.5">
                                        <span class="flex items-center justify-center bg-light size-8 rounded-full">
                                            <i class="iconify tabler--medal text-dark text-base"></i>
                                        </span>
                                        <div>
                                            <h6 class="text-default-400 mb-1.25 text-xs uppercase">Ranking</h6>
                                            <p class="font-medium">#4</p>
                                        </div>
                                    </div>
                                </div>

                                <p class="text-default-400 mb-5">Handles brand messaging, campaigns, email automation, awareness growth & product launch communication.</p>

                                <div class="mb-5">
                                    <div class="mb-2.5 flex items-center justify-between">
                                        <p class="text-default-400 text-sm font-semibold">Campaign Performance</p>
                                        <p class="font-semibold">58%</p>
                                    </div>
                                    <div class="bg-default-200 flex h-1.25 w-full overflow-hidden rounded-full" role="progressbar" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100">
                                        <div class="bg-primary flex flex-col justify-center overflow-hidden rounded-full rounded-e-none text-center text-xs whitespace-nowrap text-white transition duration-500" style="width: 58%"></div>
                                    </div>
                                </div>

                                <div class="flex justify-between items-center">
                                    <span class="text-default-400 text-xs">
                                        <i class="iconify tabler--clock me-1.25 align-middle text-xs"></i>
                                        Updated 5 hours ago
                                    </span>
                                    <a href="#" class="btn btn-sm bg-primary rounded-full text-white">Details</a>
                                </div>
                            </div>
                        </div>

                        <div class="card h-full">
                            <div class="card-header">
                                <h4 class="card-title">
                                    FN-01 - Finance Team
                                    <span class="badge badge-label ms-2.5 bg-secondary text-white">Stable</span>
                                </h4>

                                <!-- Dropdown -->
                                <div class="relative ms-auto">
                                    <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                        <button type="button" class="hs-dropdown-toggle text-default-400 text-lg" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                            <i class="iconify tabler--dots-vertical"></i>
                                        </button>

                                        <div class="hs-dropdown-menu" role="menu" aria-orientation="vertical">
                                            <a class="dropdown-item" href="#">
                                                <i class="iconify tabler--share"></i>
                                                View
                                            </a>

                                            <a class="dropdown-item" href="#">
                                                <i class="iconify tabler--edit"></i>
                                                Edit
                                            </a>

                                            <a class="dropdown-item text-danger" href="#">
                                                <i class="iconify tabler--trash"></i>
                                                Remove
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body flex justify-between flex-col h-full">
                                <div class="grid md:grid-cols-2 gap-base mb-5">
                                    <div>
                                        <p class="text-default-400 mb-2.5">Total 3 members</p>

                                        <div class="flex items-center -space-x-2">
                                            <div>
                                                <img src="assets/images/users/user-7.jpg" alt="" class="size-8 rounded-full transition-all hover:-translate-y-0.5" />
                                            </div>
                                            <div>
                                                <img src="assets/images/users/user-9.jpg" alt="" class="size-8 rounded-full transition-all hover:-translate-y-0.5" />
                                            </div>
                                            <div>
                                                <img src="assets/images/users/user-6.jpg" alt="" class="size-8 rounded-full transition-all hover:-translate-y-0.5" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex items-start gap-2.5">
                                        <span class="flex items-center justify-center bg-light size-8 rounded-full">
                                            <i class="iconify tabler--medal text-dark text-base"></i>
                                        </span>
                                        <div>
                                            <h6 class="text-default-400 mb-1.25 text-xs uppercase">Ranking</h6>
                                            <p class="font-medium">#1</p>
                                        </div>
                                    </div>
                                </div>

                                <p class="text-default-400 mb-5">Maintains accounts, revenue reporting, budgeting, compliance tracking & payroll processing.</p>

                                <div class="mb-5">
                                    <div class="mb-2.5 flex items-center justify-between">
                                        <p class="text-default-400 text-sm font-semibold">Quarterly Closure Progress</p>
                                        <p class="font-semibold">91%</p>
                                    </div>
                                    <div class="bg-default-200 flex h-1.25 w-full overflow-hidden rounded-full" role="progressbar" aria-valuenow="91" aria-valuemin="0" aria-valuemax="100">
                                        <div class="bg-primary flex flex-col justify-center overflow-hidden rounded-full rounded-e-none text-center text-xs whitespace-nowrap text-white transition duration-500" style="width: 91%"></div>
                                    </div>
                                </div>

                                <div class="flex justify-between items-center">
                                    <span class="text-default-400 text-xs">
                                        <i class="iconify tabler--clock me-1.25 align-middle text-xs"></i>
                                        Updated 2 days ago
                                    </span>
                                    <a href="#" class="btn btn-sm bg-primary rounded-full text-white">Details</a>
                                </div>
                            </div>
                        </div>

                        <div class="card h-full">
                            <div class="card-header">
                                <h4 class="card-title">
                                    CS-01 - Customer Success Team
                                    <span class="badge badge-label ms-2.5 bg-danger text-white">Busy</span>
                                </h4>

                                <!-- Dropdown -->
                                <div class="relative ms-auto">
                                    <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                        <button type="button" class="hs-dropdown-toggle text-default-400 text-lg" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                            <i class="iconify tabler--dots-vertical"></i>
                                        </button>

                                        <div class="hs-dropdown-menu" role="menu" aria-orientation="vertical">
                                            <a class="dropdown-item" href="#">
                                                <i class="iconify tabler--share"></i>
                                                View
                                            </a>

                                            <a class="dropdown-item" href="#">
                                                <i class="iconify tabler--edit"></i>
                                                Edit
                                            </a>

                                            <a class="dropdown-item text-danger" href="#">
                                                <i class="iconify tabler--trash"></i>
                                                Remove
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body flex justify-between flex-col h-full">
                                <div class="grid md:grid-cols-2 gap-base mb-5">
                                    <div>
                                        <p class="text-default-400 mb-2.5">Total 7 members</p>

                                        <div class="flex items-center -space-x-2">
                                            <div>
                                                <img src="assets/images/users/user-7.jpg" alt="" class="size-8 rounded-full transition-all hover:-translate-y-0.5" />
                                            </div>
                                            <div>
                                                <img src="assets/images/users/user-4.jpg" alt="" class="size-8 rounded-full transition-all hover:-translate-y-0.5" />
                                            </div>
                                            <div>
                                                <img src="assets/images/users/user-2.jpg" alt="" class="size-8 rounded-full transition-all hover:-translate-y-0.5" />
                                            </div>
                                            <div>
                                                <img src="assets/images/users/user-1.jpg" alt="" class="size-8 rounded-full transition-all hover:-translate-y-0.5" />
                                            </div>
                                            <div>
                                                <img src="assets/images/users/user-10.jpg" alt="" class="size-8 rounded-full transition-all hover:-translate-y-0.5" />
                                            </div>

                                            <div>
                                                <span class="flex items-center justify-center size-8 text-white bg-primary rounded-full font-bold transition-all hover:-translate-y-0.5">2+</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex items-start gap-2.5">
                                        <span class="flex items-center justify-center bg-light size-8 rounded-full">
                                            <i class="iconify tabler--medal text-dark text-base"></i>
                                        </span>
                                        <div>
                                            <h6 class="text-default-400 mb-1.25 text-xs uppercase">Ranking</h6>
                                            <p class="font-medium">#6</p>
                                        </div>
                                    </div>
                                </div>

                                <p class="text-default-400 mb-5">Onboards new clients, resolves customer issues, monitors usage retention & improves satisfaction scores.</p>

                                <div class="mb-5">
                                    <div class="mb-2.5 flex items-center justify-between">
                                        <p class="text-default-400 text-sm font-semibold">SLA Response Performance</p>
                                        <p class="font-semibold">48%</p>
                                    </div>
                                    <div class="bg-default-200 flex h-1.25 w-full overflow-hidden rounded-full" role="progressbar" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100">
                                        <div class="bg-primary flex flex-col justify-center overflow-hidden rounded-full rounded-e-none text-center text-xs whitespace-nowrap text-white transition duration-500" style="width: 48%"></div>
                                    </div>
                                </div>

                                <div class="flex justify-between items-center">
                                    <span class="text-default-400 text-xs">
                                        <i class="iconify tabler--clock me-1.25 align-middle text-xs"></i>
                                        Updated 4 hours ago
                                    </span>
                                    <a href="#" class="btn btn-sm bg-primary rounded-full text-white">Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <?php include('./partials/footer.php'); ?>

            <div id="addTeamModal" class="hs-overlay pointer-events-none fixed start-0 top-0 z-80 hidden size-full overflow-x-hidden overflow-y-auto" role="dialog" tabindex="-1" aria-labelledby="addTeamModalLabel">
                <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 m-3 flex min-h-[calc(100%-56px)] scale-95 items-center opacity-0 transition-all duration-200 ease-in-out md:mx-auto md:w-full md:max-w-lg">
                    <div class="card pointer-events-auto flex w-full flex-col">
                        <div class="card-header p-5">
                            <h3 id="addTeamModalLabel" class="font-bold">Add New Team</h3>
                            <button type="button" aria-label="Close" data-hs-overlay="#addTeamModal">
                                <i class="iconify tabler--x text-2xl align-middle text-default-600"></i>
                            </button>
                        </div>

                        <div class="card-body">
                            <!-- Team Name -->
                            <div class="mb-5">
                                <label class="form-label">Team Name</label>
                                <input type="text" class="form-input" placeholder="e.g., Creative Design Team" required />
                            </div>

                            <!-- Team Code / Short Label -->
                            <div class="mb-5">
                                <label class="form-label">Team Code</label>
                                <input type="text" class="form-input" placeholder="e.g., IT-01" required />
                            </div>

                            <!-- Team Status -->
                            <div class="mb-5">
                                <label class="form-label">Status</label>
                                <select class="form-select">
                                    <option value="New" selected>New</option>
                                    <option value="Active">Active</option>
                                    <option value="Ongoing">Ongoing</option>
                                    <option value="Busy">Busy</option>
                                    <option value="Stable">Stable</option>
                                </select>
                            </div>

                            <!-- Members -->
                            <div class="mb-5">
                                <label class="form-label">Team Members</label>
                                <select class="form-select" multiple>
                                    <option value="1">Liam Carter</option>
                                    <option value="2">Ava Mitchell</option>
                                    <option value="3">Noah Parker</option>
                                    <option value="4">Emma Scott</option>
                                    <option value="5">Logan Brooks</option>
                                    <option value="6">Sophie Adams</option>
                                    <option value="7">Ethan Hall</option>
                                </select>
                                <div class="text-2xs text-default-400 mt-1">Hold Ctrl (Windows) or Cmd (Mac) to select multiple users.</div>
                            </div>

                            <!-- Description -->
                            <div>
                                <label class="form-label">Description</label>
                                <textarea class="form-textarea" rows="3" placeholder="Brief team responsibilities..."></textarea>
                            </div>
                        </div>

                        <div class="border-default-300 flex items-center justify-end gap-2 border-t p-5">
                            <button type="button" class="btn bg-light hover:text-primary" data-hs-overlay="#addTeamModal">Cancel</button>

                            <button type="button" class="btn bg-success text-white hover:bg-success-hover">
                                <i class="iconify tabler--check"></i>
                                Save Team
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
</body>

</html>