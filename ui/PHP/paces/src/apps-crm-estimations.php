<!doctype html>
<html lang="en">

<head>
    <?php $title = "Estimations"; include('partials/title-meta.php'); ?>

    <?php include('./partials/head-css.php'); ?>
</head>

<body>
    <div class="wrapper">
        <?php $subtitle = "CRM"; $title = "Estimations"; include('./partials/topbar.php'); ?>

        <?php include('./partials/sidenav.php'); ?>

        <!-- Start Page Content here -->
        <div class="page-content">
            <main>

                <?php $subtitle = "CRM"; $title = "Estimations"; include('./partials/page-title.php'); ?>

                <div class="container-fluid">
                    <div class="mb-2.5 grid grid-cols-1 gap-2.5 md:grid-cols-2 lg:grid-cols-5">
                        <!-- Total Estimations Widget -->
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-5 flex justify-between">
                                    <h5 class="text-lg">52</h5>
                                    <span class="flex items-center gap-1">
                                        +15.7%
                                        <i class="iconify tabler--arrow-up text-success"></i>
                                    </span>
                                </div>
                                <p class="text-default-400">Total estimations created</p>
                            </div>
                        </div>

                        <!-- Approved Estimations Widget -->
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-5 flex justify-between">
                                    <h5 class="text-lg">24</h5>
                                    <span class="flex items-center gap-1">
                                        +10.2%
                                        <i class="iconify tabler--arrow-up text-success"></i>
                                    </span>
                                </div>
                                <p class="text-default-400">Approved estimations</p>
                            </div>
                        </div>

                        <!-- Declined Estimations Widget -->
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-5 flex justify-between">
                                    <h5 class="text-lg">8</h5>
                                    <span class="flex items-center gap-1">
                                        -3.9%
                                        <i class="iconify tabler--arrow-down text-danger"></i>
                                    </span>
                                </div>
                                <p class="text-default-400">Declined estimations</p>
                            </div>
                        </div>

                        <!-- Highest Estimation Value Widget -->
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-5 flex justify-between">
                                    <h5 class="text-lg">$138,500</h5>
                                    <span class="flex items-center gap-1">
                                        Top value
                                        <i class="iconify tabler--currency-dollar text-success"></i>
                                    </span>
                                </div>
                                <p class="text-default-400">Highest estimation value</p>
                            </div>
                        </div>

                        <!-- Avg. Estimation Review Time Widget -->
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-5 flex justify-between">
                                    <h5 class="text-lg">
                                        2.8
                                        <small class="text-2xs">days</small>
                                    </h5>
                                    <span class="flex items-center gap-1">
                                        +1.1%
                                        <i class="iconify tabler--clock text-warning"></i>
                                    </span>
                                </div>
                                <p class="text-default-400">Avg. review time</p>
                            </div>
                        </div>
                    </div>

                    <div data-table data-table-rows-per-page="8" class="card">
                        <div class="card-header">
                            <div class="flex flex-wrap gap-2.5">
                                <div class="input-icon-group">
                                    <i class="iconify tabler--search input-icon"></i>
                                    <input data-table-search type="search" type="search" placeholder="Search deals..." class="form-input" />
                                </div>

                                <button type="button" class="btn bg-primary text-white hover:bg-primary-hover" aria-haspopup="dialog" aria-expanded="false" aria-controls="createEstimationModal" data-hs-overlay="#createEstimationModal">
                                    <i class="iconify tabler--plus"></i>
                                    New Estimation
                                </button>

                                <button data-table-delete-selected class="btn bg-danger text-white hover:bg-danger-hover hidden">Delete</button>
                            </div>

                            <div class="flex flex-wrap items-center gap-2.5 md:flex-nowrap">
                                <span class="me-2.5 font-semibold">Filter By:</span>

                                <!-- Status Filter -->
                                <div class="input-icon-group">
                                    <i class="iconify tabler--arrows-shuffle input-icon"></i>
                                    <select data-table-filter="status" class="form-select">
                                        <option value="">Status</option>
                                        <option value="Approved">Approved</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Declined">Declined</option>
                                        <option value="Sent">Sent</option>
                                        <option value="In Review">In Review</option>
                                    </select>
                                </div>

                                <!-- Value Range Filter -->
                                <div class="input-icon-group">
                                    <i class="iconify tabler--currency-dollar input-icon"></i>
                                    <select data-table-range-filter="value" class="form-select">
                                        <option value="">Value Range</option>
                                        <option value="0-5000">$0 - $5,000</option>
                                        <option value="5001-10000">$5,001 - $10,000</option>
                                        <option value="10001-20000">$10,001 - $20,000</option>
                                        <option value="20001-50000">$20,001 - $50,000</option>
                                        <option value="50000+">$50,000+</option>
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
                        </div>

                        <div class="table-wrapper">
                            <table class="table table-hover">
                                <thead class="thead-sm">
                                    <tr class="bg-light/25 text-2xs uppercase">
                                        <th class="w-[1%]">
                                            <input data-table-select-all class="form-checkbox form-checkbox-light size-4.5" type="checkbox" id="select-all-estimations" />
                                        </th>
                                        <th data-table-sort>Estimate ID</th>
                                        <th>Project</th>
                                        <th>Client</th>
                                        <th data-table-sort data-column="value">Estimated Value</th>
                                        <th>Estimated By</th>
                                        <th data-table-sort>Created</th>
                                        <th data-table-sort>Expected Close</th>
                                        <th data-table-sort data-column="status">Status</th>
                                        <th class="text-center w-[1%]">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <!-- Row 1 -->
                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" />
                                        </td>
                                        <td class="font-semibold hover:text-primary">#EST00042</td>
                                        <td>CRM System Redesign</td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <div>
                                                    <div class="btn btn-icon border-default-300 size-8 rounded-full border border-dashed">
                                                        <img src="assets/images/logos/airbnb.svg" alt="Product" class="size-5" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <a href="#!" class="hover:text-primary">Airbnb</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>$25,000</td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <div>
                                                    <img src="assets/images/users/user-5.jpg" alt="avatar-5" class="size-6 rounded-full" />
                                                </div>
                                                <div>
                                                    <a href="#!" class="hover:text-primary">Jason Miller</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            15 Jul, 2025
                                            <small class="text-default-400 ms-1">09:30 AM</small>
                                        </td>
                                        <td>
                                            05 Aug, 2025
                                            <small class="text-default-400 ms-1">06:00 PM</small>
                                        </td>
                                        <td>
                                            <span class="badge badge-label bg-info/15 text-info">In Review</span>
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

                                    <!-- Row 2 -->
                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" />
                                        </td>
                                        <td class="font-semibold hover:text-primary">#EST00043</td>
                                        <td>Lead Tracking Module</td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <div>
                                                    <div class="btn btn-icon border-default-300 size-8 rounded-full border border-dashed">
                                                        <img src="assets/images/logos/amazon.svg" alt="Product" class="size-5" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <a href="#!" class="hover:text-primary">Amazon</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>$14,200</td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <div>
                                                    <img src="assets/images/users/user-4.jpg" alt="avatar-4" class="size-6 rounded-full" />
                                                </div>
                                                <div>
                                                    <a href="#!" class="hover:text-primary">Ava Green</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            17 Jul, 2025
                                            <small class="text-default-400 ms-1">10:15 AM</small>
                                        </td>
                                        <td>
                                            02 Aug, 2025
                                            <small class="text-default-400 ms-1">04:30 PM</small>
                                        </td>
                                        <td>
                                            <span class="badge badge-label bg-success/15 text-success">Approved</span>
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

                                    <!-- Row 3 -->
                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" />
                                        </td>
                                        <td class="font-semibold hover:text-primary">#EST00044</td>
                                        <td>Marketing Automation</td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <div>
                                                    <div class="btn btn-icon border-default-300 size-8 rounded-full border border-dashed">
                                                        <img src="assets/images/logos/apple.svg" alt="Product" class="size-5" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <a href="#!" class="hover:text-primary">Apple Inc.</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>$32,000</td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <div>
                                                    <img src="assets/images/users/user-2.jpg" alt="avatar-2" class="size-6 rounded-full" />
                                                </div>
                                                <div>
                                                    <a href="#!" class="hover:text-primary">Liam Scott</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            18 Jul, 2025
                                            <small class="text-default-400 ms-1">01:40 PM</small>
                                        </td>
                                        <td>
                                            10 Aug, 2025
                                            <small class="text-default-400 ms-1">01:00 PM</small>
                                        </td>
                                        <td>
                                            <span class="badge badge-label bg-warning/15 text-warning">Pending</span>
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

                                    <!-- Row 4 -->
                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" />
                                        </td>
                                        <td class="font-semibold hover:text-primary">#EST00045</td>
                                        <td>Sales Pipeline Setup</td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <div>
                                                    <div class="btn btn-icon border-default-300 size-8 rounded-full border border-dashed">
                                                        <img src="assets/images/logos/asana.svg" alt="Product" class="size-5" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <a href="#!" class="hover:text-primary">Asana Studio</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>$21,800</td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <div>
                                                    <img src="assets/images/users/user-3.jpg" alt="avatar-3" class="size-6 rounded-full" />
                                                </div>
                                                <div>
                                                    <a href="#!" class="hover:text-primary">Noah Carter</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            19 Jul, 2025
                                            <small class="text-default-400 ms-1">03:00 PM</small>
                                        </td>
                                        <td>
                                            08 Aug, 2025
                                            <small class="text-default-400 ms-1">05:45 PM</small>
                                        </td>
                                        <td>
                                            <span class="badge badge-label bg-danger/15 text-danger">Declined</span>
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

                                    <!-- Row 5 -->
                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" />
                                        </td>
                                        <td class="font-semibold hover:text-primary">#EST00046</td>
                                        <td>Support Portal Development</td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <div>
                                                    <div class="btn btn-icon border-default-300 size-8 rounded-full border border-dashed">
                                                        <img src="assets/images/logos/dropbox.svg" alt="Product" class="size-5" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <a href="#!" class="hover:text-primary">Dropbox Inc.</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>$27,500</td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <div>
                                                    <img src="assets/images/users/user-1.jpg" alt="avatar-1" class="size-6 rounded-full" />
                                                </div>
                                                <div>
                                                    <a href="#!" class="hover:text-primary">Emily Stone</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            20 Jul, 2025
                                            <small class="text-default-400 ms-1">11:20 AM</small>
                                        </td>
                                        <td>
                                            15 Aug, 2025
                                            <small class="text-default-400 ms-1">09:00 AM</small>
                                        </td>
                                        <td>
                                            <span class="badge badge-label bg-info/15 text-info">In Review</span>
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

                                    <!-- Row 6 -->
                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" />
                                        </td>
                                        <td class="font-semibold hover:text-primary">#EST00047</td>
                                        <td>Client Onboarding System</td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <div>
                                                    <div class="btn btn-icon border-default-300 size-8 rounded-full border border-dashed">
                                                        <img src="assets/images/logos/figma.svg" alt="Product" class="size-5" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <a href="#!" class="hover:text-primary">Figma Design</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>$16,600</td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <div>
                                                    <img src="assets/images/users/user-6.jpg" alt="avatar-6" class="size-6 rounded-full" />
                                                </div>
                                                <div>
                                                    <a href="#!" class="hover:text-primary">Sophia White</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            21 Jul, 2025
                                            <small class="text-default-400 ms-1">02:00 PM</small>
                                        </td>
                                        <td>
                                            06 Aug, 2025
                                            <small class="text-default-400 ms-1">12:00 PM</small>
                                        </td>
                                        <td>
                                            <span class="badge badge-label bg-secondary/15 text-secondary">Sent</span>
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

                                    <!-- Row 7 -->
                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" />
                                        </td>
                                        <td class="font-semibold hover:text-primary">#EST00048</td>
                                        <td>Customer Insights Dashboard</td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <div>
                                                    <div class="btn btn-icon border-default-300 size-8 rounded-full border border-dashed">
                                                        <img src="assets/images/logos/meta.svg" alt="Product" class="size-5" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <a href="#!" class="hover:text-primary">Meta</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>$29,900</td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <div>
                                                    <img src="assets/images/users/user-7.jpg" alt="avatar-7" class="size-6 rounded-full" />
                                                </div>
                                                <div>
                                                    <a href="#!" class="hover:text-primary">Mason Lee</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            22 Jul, 2025
                                            <small class="text-default-400 ms-1">11:00 AM</small>
                                        </td>
                                        <td>
                                            10 Aug, 2025
                                            <small class="text-default-400 ms-1">04:00 PM</small>
                                        </td>
                                        <td>
                                            <span class="badge badge-label bg-info/15 text-info">In Review</span>
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

                                    <!-- Row 8 -->
                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" />
                                        </td>
                                        <td class="font-semibold hover:text-primary">#EST00049</td>
                                        <td>Workflow Automation Engine</td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <div>
                                                    <div class="btn btn-icon border-default-300 size-8 rounded-full border border-dashed">
                                                        <img src="assets/images/logos/slack.svg" alt="Product" class="size-5" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <a href="#!" class="hover:text-primary">Slack</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>$33,750</td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <div>
                                                    <img src="assets/images/users/user-8.jpg" alt="avatar-8" class="size-6 rounded-full" />
                                                </div>
                                                <div>
                                                    <a href="#!" class="hover:text-primary">Olivia James</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            23 Jul, 2025
                                            <small class="text-default-400 ms-1">09:30 AM</small>
                                        </td>
                                        <td>
                                            14 Aug, 2025
                                            <small class="text-default-400 ms-1">11:30 AM</small>
                                        </td>
                                        <td>
                                            <span class="badge badge-label bg-success/15 text-success">Approved</span>
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

                                    <!-- Row 9 -->
                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" />
                                        </td>
                                        <td class="font-semibold hover:text-primary">#EST00050</td>
                                        <td>Partner API Integration</td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <div>
                                                    <div class="btn btn-icon border-default-300 size-8 rounded-full border border-dashed">
                                                        <img src="assets/images/logos/microsoft.svg" alt="Product" class="size-5" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <a href="#!" class="hover:text-primary">Microsoft</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>$17,600</td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <div>
                                                    <img src="assets/images/users/user-9.jpg" alt="avatar-9" class="size-6 rounded-full" />
                                                </div>
                                                <div>
                                                    <a href="#!" class="hover:text-primary">Ella Kim</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            24 Jul, 2025
                                            <small class="text-default-400 ms-1">10:45 AM</small>
                                        </td>
                                        <td>
                                            12 Aug, 2025
                                            <small class="text-default-400 ms-1">03:15 PM</small>
                                        </td>
                                        <td>
                                            <span class="badge badge-label bg-warning/15 text-warning">Pending</span>
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

                                    <!-- Row 10 -->
                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" />
                                        </td>
                                        <td class="font-semibold hover:text-primary">#EST00051</td>
                                        <td>Mobile CRM App Build</td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <div>
                                                    <div class="btn btn-icon border-default-300 size-8 rounded-full border border-dashed">
                                                        <img src="assets/images/logos/openai.svg" alt="Product" class="size-5" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <a href="#!" class="hover:text-primary">ChatGPT</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>$40,000</td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <div>
                                                    <img src="assets/images/users/user-10.jpg" alt="avatar-10" class="size-6 rounded-full" />
                                                </div>
                                                <div>
                                                    <a href="#!" class="hover:text-primary">Daniel Park</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            25 Jul, 2025
                                            <small class="text-default-400 ms-1">02:30 PM</small>
                                        </td>
                                        <td>
                                            20 Aug, 2025
                                            <small class="text-default-400 ms-1">05:00 PM</small>
                                        </td>
                                        <td>
                                            <span class="badge badge-label bg-secondary/15 text-secondary">Sent</span>
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

                                    <!-- Row 11 -->
                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" />
                                        </td>
                                        <td class="font-semibold hover:text-primary">#EST00052</td>
                                        <td>Smart Contact Syncing</td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <div>
                                                    <div class="btn btn-icon border-default-300 size-8 rounded-full border border-dashed">
                                                        <img src="assets/images/logos/shell.svg" alt="Product" class="size-5" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <a href="#!" class="hover:text-primary">Shell Petro.</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>$13,250</td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <div>
                                                    <img src="assets/images/users/user-4.jpg" alt="avatar-4" class="size-6 rounded-full" />
                                                </div>
                                                <div>
                                                    <a href="#!" class="hover:text-primary">Chloe Nguyen</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            26 Jul, 2025
                                            <small class="text-default-400 ms-1">01:10 PM</small>
                                        </td>
                                        <td>
                                            16 Aug, 2025
                                            <small class="text-default-400 ms-1">11:00 AM</small>
                                        </td>
                                        <td>
                                            <span class="badge badge-label bg-danger/15 text-danger">Declined</span>
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
                            <div data-table-pagination-info="proposals"></div>
                            <div data-table-pagination></div>
                        </div>
                    </div>
                </div>
            </main>

            <?php include('./partials/footer.php'); ?>

            <div id="createEstimationModal" class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 pointer-events-none fixed start-0 top-0 z-80 hidden size-full overflow-x-hidden overflow-y-auto" role="dialog" tabindex="-1" aria-labelledby="createEstimationModalLabel">
                <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 m-3 flex scale-95 items-center opacity-0 transition-all duration-200 ease-in-out md:mx-auto md:w-full md:max-w-2xl lg:max-w-3xl">
                    <div class="card pointer-events-auto flex w-full flex-col">
                        <div class="card-header p-5">
                            <h3 id="createEstimationModalLabel" class="text-sm">Create New Estimation</h3>
                            <button type="button" aria-label="Close" data-hs-overlay="#createEstimationModal">
                                <i class="iconify tabler--x text-xl"></i>
                            </button>
                        </div>

                        <div class="overflow-y-auto card-body">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="estimationTitle" class="form-label">Project Name</label>
                                    <input type="text" class="form-input" id="estimationTitle" placeholder="Enter project name" />
                                </div>

                                <div>
                                    <label for="clientName" class="form-label">Client</label>
                                    <input type="text" class="form-input" id="clientName" placeholder="Enter client name" />
                                </div>

                                <div>
                                    <label for="estimatedValue" class="form-label">Estimated Value (USD)</label>
                                    <input type="number" class="form-input" id="estimatedValue" placeholder="e.g. 25000" />
                                </div>

                                <div>
                                    <label for="estimator" class="form-label">Estimated By</label>
                                    <input type="number" class="form-input" id="estimator" placeholder="Enter team member name" />
                                </div>

                                <div>
                                    <label for="proposalStatus" class="form-label">Status</label>
                                    <select class="form-input" id="proposalStatus">
                                        <option value="">Select status</option>
                                        <option value="Approved">Approved</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Declined">Declined</option>
                                        <option value="Sent">Sent</option>
                                        <option value="In Review">In Review</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="estimationTags" class="form-label">Tags</label>
                                    <input type="text" class="form-input" id="estimationTags" placeholder="e.g. CRM, Mobile, API" />
                                </div>

                                <div>
                                    <label for="createdDate" class="form-label">Created Date</label>
                                    <input type="date" data-provider="flatpickr" data-date-format="d M, Y" class="form-input" id="createdDate" />
                                </div>

                                <div>
                                    <label for="expectedCloseDate" class="form-label">Expected Close</label>
                                    <input type="date" data-provider="flatpickr" data-date-format="d M, Y" class="form-input" id="expectedCloseDate" />
                                </div>
                            </div>
                        </div>

                        <div class="border-default-300 flex items-center justify-end gap-x-2 border-t p-5">
                            <button type="button" class="btn bg-light hover:text-primary" data-hs-overlay="#createEstimationModal">Cancel</button>

                            <button type="button" class="btn bg-primary text-white hover:bg-primary-hover">Save Estimation</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page content -->
    </div>

    <?php include('./partials/customizer.php'); ?>

    <?php include('./partials/footer-scripts.php'); ?>

    <!-- Custom table -->
    <script src="assets/js/pages/custom-table.js"></script>
</body>

</html>