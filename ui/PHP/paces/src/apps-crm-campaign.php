<!doctype html>
<html lang="en">

<head>
    <?php $title = "Campaign"; include('partials/title-meta.php'); ?>

    <?php include('./partials/head-css.php'); ?>
</head>

<body>
    <div class="wrapper">
        <?php $subtitle = "CRM"; $title = "Campaign"; include('./partials/topbar.php'); ?> 
        
        <?php include('./partials/sidenav.php'); ?>

        <!-- Start Page Content here -->
        <div class="page-content">
            <main>
                
                <?php $subtitle = "CRM"; $title = "Campaign"; include('./partials/page-title.php'); ?>

                <div class="container-fluid">
                    <div class="mb-2.5 grid grid-cols-1 gap-2.5 md:grid-cols-2 lg:grid-cols-5">
                        <!-- Total Campaigns Widget -->
                        <div class="card">
                            <div class="card-body">
                                <div class="flex">
                                    <div class="flex-1">
                                        <div class="mb-5 flex items-center justify-between">
                                            <h5 class="text-lg">11</h5>
                                            <div class="flex items-center gap-1.5">
                                                <span>+22.2%</span>
                                                <i class="iconify tabler--arrow-up text-success"></i>
                                            </div>
                                        </div>
                                        <p class="text-default-400">Total campaigns launched</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Successful Campaigns Widget -->
                        <div class="card">
                            <div class="card-body">
                                <div class="flex">
                                    <div class="flex-1">
                                        <div class="mb-5 flex items-center justify-between">
                                            <h5 class="text-lg">4</h5>
                                            <div class="flex items-center gap-1.5">
                                                <span>+36.3%</span>
                                                <i class="iconify tabler--arrow-up text-success"></i>
                                            </div>
                                        </div>
                                        <p class="text-default-400">Successful campaigns</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Failed Campaigns Widget -->
                        <div class="card">
                            <div class="card-body">
                                <div class="flex">
                                    <div class="flex-1">
                                        <div class="mb-5 flex items-center justify-between">
                                            <h5 class="text-lg">2</h5>
                                            <div class="flex items-center gap-1.5">
                                                <span>-18.1%</span>
                                                <i class="iconify tabler--arrow-down text-danger"></i>
                                            </div>
                                        </div>
                                        <p class="text-default-400">Failed campaigns</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Highest Campaign Budget Widget -->
                        <div class="card">
                            <div class="card-body">
                                <div class="flex">
                                    <div class="flex-1">
                                        <div class="mb-5 flex items-center justify-between">
                                            <h5 class="text-lg">$85,000</h5>
                                            <div class="flex items-center gap-1.5">
                                                <span>Top spend</span>
                                                <i class="iconify tabler--currency-dollar text-warning"></i>
                                            </div>
                                        </div>
                                        <p class="text-default-400">Highest campaign budget</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Avg. Campaign Duration Widget -->
                        <div class="card">
                            <div class="card-body">
                                <div class="flex">
                                    <div class="flex-1">
                                        <div class="mb-5 flex items-center justify-between">
                                            <h5 class="text-lg">
                                                5.7
                                                <small class="text-2xs">days</small>
                                            </h5>
                                            <div class="flex items-center gap-1.5">
                                                <span>+1.4%</span>
                                                <i class="iconify tabler--clock text-warning"></i>
                                            </div>
                                        </div>
                                        <p class="text-default-400">Avg. campaign duration</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div data-table data-table-rows-per-page="8" class="card">
                        <div class="card-header">
                            <div class="flex flex-wrap gap-2.5">
                                <div class="input-icon-group">
                                    <i class="iconify tabler--search input-icon"></i>
                                    <input data-table-search type="search" type="search" placeholder="Search campaign..." class="form-input" />
                                </div>

                                <button type="button" class="btn bg-primary text-white hover:bg-primary-hover" aria-haspopup="dialog" aria-expanded="false" aria-controls="createCampaignForm" data-hs-overlay="#createCampaignForm">
                                    <i class="iconify tabler--plus"></i>
                                    Create Campaign
                                </button>

                                <button data-table-delete-selected class="btn bg-danger text-white hover:bg-danger-hover hidden">Delete</button>
                            </div>

                            <div class="flex flex-wrap items-center gap-2.5 md:flex-nowrap">
                                <span class="me-2.5 font-semibold text-nowrap">Filter By:</span>

                                <!-- Status Filter -->
                                <div class="input-icon-group">
                                    <i class="iconify tabler--arrows-shuffle input-icon"></i>
                                    <select data-table-filter="status" class="form-select">
                                        <option value="">Status</option>
                                        <option value="Success">Success</option>
                                        <option value="In Progress">In Progress</option>
                                        <option value="Scheduled">Scheduled</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Ongoing">Ongoing</option>
                                    </select>
                                </div>

                                <!-- Budget Range Filter -->
                                <div class="input-icon-group">
                                    <i class="iconify tabler--currency-dollar input-icon"></i>
                                    <select data-table-range-filter="budget" class="form-select">
                                        <option value="">Budget Range</option>
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
                                            <input data-table-select-all class="form-checkbox form-checkbox-light size-4.5" type="checkbox" id="select-all-products" />
                                        </th>
                                        <th data-table-sort>Campaign Name</th>
                                        <th>Creator</th>
                                        <th data-table-sort data-column="budget">Budget</th>
                                        <th>Goals</th>
                                        <th data-table-sort data-column="status">Status</th>
                                        <th>Tags</th>
                                        <th data-table-sort>Date Created</th>
                                        <th class="text-center" style="width: 1%">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <!-- Row 1 -->
                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" />
                                        </td>
                                        <td>Q4 Lead Nurture Campaign</td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <img src="assets/images/users/user-5.jpg" alt="avatar-5" class="size-6 rounded-full" />
                                                <a href="#!" class="hover:text-primary">Jason Miller</a>
                                            </div>
                                        </td>
                                        <td>$12,500</td>
                                        <td>$80,000</td>
                                        <td>
                                            <span class="badge bg-warning/15 text-warning">In Progress</span>
                                        </td>
                                        <td>
                                            <div class="flex gap-1">
                                                <span class="badge badge-label bg-light">Email</span>
                                                <span class="badge badge-label bg-light">Retargeting</span>
                                                <span class="badge badge-label bg-light">Automation</span>
                                            </div>
                                        </td>
                                        <td>
                                            21 Aug, 2025
                                            <small class="text-default-400 ms-1">2:45 PM</small>
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
                                        <td>Holiday Flash Sale</td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <img src="assets/images/users/user-7.jpg" alt="avatar-7" class="size-6 rounded-full" />
                                                <a href="#!" class="hover:text-primary">Sandra Walton</a>
                                            </div>
                                        </td>
                                        <td>$6,000</td>
                                        <td>$30,000</td>
                                        <td>
                                            <span class="badge bg-success/15 text-success">Success</span>
                                        </td>
                                        <td>
                                            <div class="flex gap-1">
                                                <span class="badge badge-label bg-light">Seasonal</span>
                                                <span class="badge badge-label bg-light">SMS</span>
                                            </div>
                                        </td>
                                        <td>
                                            05 Dec, 2024
                                            <small class="text-default-400 ms-1">11:00 AM</small>
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
                                        <td>Product Launch Webinar</td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <img src="assets/images/users/user-4.jpg" alt="avatar-4" class="size-6 rounded-full" />
                                                <a href="#!" class="hover:text-primary">Sandra Walton</a>
                                            </div>
                                        </td>
                                        <td>$10,000</td>
                                        <td>$65,000</td>
                                        <td>
                                            <span class="badge bg-info/15 text-info">Scheduled</span>
                                        </td>
                                        <td>
                                            <div class="flex gap-1">
                                                <span class="badge badge-label bg-light">Webinar</span>
                                                <span class="badge badge-label bg-light">Leads</span>
                                            </div>
                                        </td>
                                        <td>
                                            01 Sep, 2025
                                            <small class="text-default-400 ms-1">9:15 AM</small>
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
                                        <td>Back-to-School Promo</td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <img src="assets/images/users/user-8.jpg" alt="avatar-8" class="size-6 rounded-full" />
                                                <a href="#!" class="hover:text-primary">Ava Nguyen</a>
                                            </div>
                                        </td>
                                        <td>$4,800</td>
                                        <td>$25,000</td>
                                        <td>
                                            <span class="badge bg-danger/15 text-danger">Failed</span>
                                        </td>
                                        <td>
                                            <div class="flex gap-1">
                                                <span class="badge badge-label bg-light">Email</span>
                                                <span class="badge badge-label bg-light">Discount</span>
                                            </div>
                                        </td>
                                        <td>
                                            15 Jul, 2025
                                            <small class="text-default-400 ms-1">4:30 PM</small>
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

                                    <!-- Row 5-->
                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" />
                                        </td>
                                        <td>Spring Email Blast</td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <img src="assets/images/users/user-3.jpg" alt="avatar-3" class="size-6 rounded-full" />
                                                <a href="#!" class="hover:text-primary">Ryan Patel</a>
                                            </div>
                                        </td>
                                        <td>$7,200</td>
                                        <td>$40,000</td>
                                        <td>
                                            <span class="badge bg-success/15 text-success">Success</span>
                                        </td>
                                        <td>
                                            <div class="flex gap-1">
                                                <span class="badge badge-label bg-light">Newsletter</span>
                                                <span class="badge badge-label bg-light">Organic</span>
                                            </div>
                                        </td>
                                        <td>
                                            18 Mar, 2025
                                            <small class="text-default-400 ms-1">1:00 PM</small>
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
                                        <td>Customer Loyalty Program</td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <img src="assets/images/users/user-2.jpg" alt="avatar-2" class="size-6 rounded-full" />
                                                <a href="#!" class="hover:text-primary">Lily Chen</a>
                                            </div>
                                        </td>
                                        <td>$9,500</td>
                                        <td>$70,000</td>
                                        <td>
                                            <span class="badge bg-primary/15 text-primary">Ongoing</span>
                                        </td>
                                        <td>
                                            <div class="flex gap-1">
                                                <span class="badge badge-label bg-light">Rewards</span>
                                                <span class="badge badge-label bg-light">Customer Retention</span>
                                            </div>
                                        </td>
                                        <td>
                                            28 Aug, 2025
                                            <small class="text-default-400 ms-1">10:00 AM</small>
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
                                        <td>Referral Boost Campaign</td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <img src="assets/images/users/user-9.jpg" alt="avatar-9" class="size-6 rounded-full" />
                                                <a href="#!" class="hover:text-primary">Noah Brooks</a>
                                            </div>
                                        </td>
                                        <td>$5,000</td>
                                        <td>$20,000</td>
                                        <td>
                                            <span class="badge bg-success/15 text-success">Success</span>
                                        </td>
                                        <td>
                                            <div class="flex gap-1">
                                                <span class="badge badge-label bg-light">Referral</span>
                                                <span class="badge badge-label bg-light">Growth</span>
                                            </div>
                                        </td>
                                        <td>
                                            04 Jun, 2025
                                            <small class="text-default-400 ms-1">9:00 AM</small>
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
                                        <td>App Download Drive</td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <img src="assets/images/users/user-10.jpg" alt="avatar-10" class="size-6 rounded-full" />
                                                <a href="#!" class="hover:text-primary">Sophia Lee</a>
                                            </div>
                                        </td>
                                        <td>$3,200</td>
                                        <td>$15,000</td>
                                        <td>
                                            <span class="badge bg-warning/15 text-warning">In Progress</span>
                                        </td>
                                        <td>
                                            <div class="flex gap-1">
                                                <span class="badge badge-label bg-light">Mobile</span>
                                                <span class="badge badge-label bg-light">Ads</span>
                                            </div>
                                        </td>
                                        <td>
                                            12 Aug, 2025
                                            <small class="text-default-400 ms-1">3:15 PM</small>
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
                                        <td>Abandoned Cart Recovery</td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <img src="assets/images/users/user-1.jpg" alt="avatar-1" class="size-6 rounded-full" />

                                                <a href="#!" class="hover:text-primary">Lucas Green</a>
                                            </div>
                                        </td>
                                        <td>$2,000</td>
                                        <td>$12,000</td>
                                        <td>
                                            <span class="badge bg-danger/15 text-danger">Failed</span>
                                        </td>
                                        <td>
                                            <div class="flex gap-1">
                                                <span class="badge badge-label bg-light">Email</span>
                                                <span class="badge badge-label bg-light">Recovery</span>
                                            </div>
                                        </td>
                                        <td>
                                            29 Jul, 2025
                                            <small class="text-default-400 ms-1">5:50 PM</small>
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
                                        <td>Local Awareness Campaign</td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <img src="assets/images/users/user-2.jpg" alt="avatar-2" class="size-6 rounded-full" />
                                                <a href="#!" class="hover:text-primary">Isabella Ray</a>
                                            </div>
                                        </td>
                                        <td>$4,700</td>
                                        <td>$28,000</td>
                                        <td>
                                            <span class="badge bg-info/15 text-info">Scheduled</span>
                                        </td>
                                        <td>
                                            <div class="flex gap-1">
                                                <span class="badge badge-label bg-light">Geo Targeting</span>
                                                <span class="badge badge-label bg-light">Brand</span>
                                            </div>
                                        </td>
                                        <td>
                                            02 Sep, 2025
                                            <small class="text-default-400 ms-1">8:10 AM</small>
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
                                        <td>Video Ad Campaign</td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <img src="assets/images/users/user-3.jpg" alt="avatar-3" class="size-6 rounded-full" />
                                                <a href="#!" class="hover:text-primary">Leo White</a>
                                            </div>
                                        </td>
                                        <td>$9,900</td>
                                        <td>$55,000</td>
                                        <td>
                                            <span class="badge bg-primary/15 text-primary">Ongoing</span>
                                        </td>
                                        <td>
                                            <div class="flex gap-1">
                                                <span class="badge badge-label bg-light">YouTube</span>
                                                <span class="badge badge-label bg-light">Video</span>
                                            </div>
                                        </td>
                                        <td>
                                            14 Aug, 2025
                                            <small class="text-default-400 ms-1">12:00 PM</small>
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
                            <div data-table-pagination-info="Campaigns"></div>
                            <div data-table-pagination></div>
                        </div>
                    </div>
                </div>
            </main>

            <?php include('./partials/footer.php'); ?>

            <div id="createCampaignForm" class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 pointer-events-none fixed start-0 top-0 z-80 hidden size-full overflow-x-hidden overflow-y-auto" role="dialog" tabindex="-1" aria-labelledby="createCampaignFormLabel">
                <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 m-3 flex scale-95 items-center opacity-0 transition-all duration-200 ease-in-out md:mx-auto md:w-full md:max-w-2xl lg:max-w-3xl">
                    <div class="border-default-300 pointer-events-auto flex w-full flex-col rounded-md border card">
                        <div class="card-header p-5">
                            <h3 id="createCampaignFormLabel" class="text-sm">Create New Campaign</h3>
                            <button type="button" aria-label="Close" data-hs-overlay="#createCampaignForm">
                                <i class="iconify tabler--x text-xl"></i>
                            </button>
                        </div>

                        <div class="overflow-y-auto card-body">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="campaignName" class="form-label">Campaign Name</label>
                                    <input type="text" class="form-input" id="campaignName" placeholder="Enter campaign Name" />
                                </div>

                                <div>
                                    <label for="CreatorName" class="form-label">Creator</label>
                                    <input type="text" class="form-input" id="CreatorName" placeholder="Enter campaign creator" />
                                </div>

                                <div>
                                    <label for="budget" class="form-label">Budget (USD)</label>
                                    <input type="number" class="form-input" id="budget" placeholder="e.g. 7500" />
                                </div>

                                <div>
                                    <label for="goal" class="form-label">Goal (USD)</label>
                                    <input type="number" class="form-input" id="goal" placeholder="e.g. 7500" />
                                </div>

                                <div>
                                    <label for="Campstatus" class="form-label">Status</label>
                                    <select class="form-input" id="Campstatus">
                                        <option value="">Select status</option>
                                        <option value="Success">Success</option>
                                        <option value="In Progress">In Progress</option>
                                        <option value="Scheduled">Scheduled</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Ongoing">Ongoing</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="tags" class="form-label">Tags</label>
                                    <input type="text" class="form-input" id="tags" placeholder="e.g. Email, Webinar, Retargeting" />
                                </div>

                                <div>
                                    <label for="launchDate" class="form-label">Launch Date</label>
                                    <input type="date" data-provider="flatpickr" data-date-format="d M, Y" class="form-input" id="launchDate" />
                                </div>

                                <div>
                                    <label for="launchTime" class="form-label">Launch Time</label>
                                    <input type="time" data-provider="timepickr" data-time-basic="true" class="form-input" id="launchTime" />
                                </div>
                            </div>
                        </div>

                        <div class="border-default-300 flex items-center justify-end gap-x-2 border-t p-5">
                            <button type="button" class="btn bg-light hover:text-primary" data-hs-overlay="#createCampaignForm">Cancel</button>

                            <button type="button" class="btn bg-primary text-white hover:bg-primary-hover">Save Campaign</button>
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