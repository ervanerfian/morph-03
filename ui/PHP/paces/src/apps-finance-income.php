<!doctype html>
<html lang="en">

<head>
    <?php $title = "Income"; include('partials/title-meta.php'); ?>

    <?php include('./partials/head-css.php'); ?>
</head>

<body>
    <div class="wrapper">
        <?php $subtitle = "Finance"; $title = "Income"; include('./partials/topbar.php'); ?>

        <?php include('./partials/sidenav.php'); ?>

        <!-- Start Page Content here -->
        <div class="page-content">
            <main>

                <?php $subtitle = "Finance"; $title = "Income"; include('./partials/page-title.php'); ?>

                <div class="container-fluid">
                    <div class="mb-base grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-base">
                        <!-- Total Income Widget -->
                        <div class="card">
                            <div class="card-body">
                                <div class="flex items-center justify-between">
                                    <div class="bg-primary/15 text-primary flex size-15 items-center justify-center rounded-full">
                                        <i class="iconify tabler--currency-dollar text-2xl"></i>
                                    </div>

                                    <div class="text-end">
                                        <h3 class="mb-3 text-2xl font-normal">$<span data-target="45280">0</span></h3>
                                        <p class="text-default-400">
                                            <span>Total Income</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Received Income Widget -->
                        <div class="card">
                            <div class="card-body">
                                <div class="flex items-center justify-between">
                                    <div class="bg-success/15 text-success flex size-15 items-center justify-center rounded-full">
                                        <i class="iconify tabler--wallet text-2xl"></i>
                                    </div>

                                    <div class="text-end">
                                        <h3 class="mb-3 text-2xl font-normal">$<span data-target="38560">0</span></h3>
                                        <p class="text-default-400">
                                            <span>Received Income</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Payments Widget -->
                        <div class="card">
                            <div class="card-body">
                                <div class="flex items-center justify-between">
                                    <div class="bg-warning/15 text-warning flex size-15 items-center justify-center rounded-full">
                                        <i class="iconify tabler--hourglass text-2xl"></i>
                                    </div>

                                    <div class="text-end">
                                        <h3 class="mb-3 text-2xl font-normal">$<span data-target="4860">0</span></h3>
                                        <p class="text-default-400">
                                            <span>Pending Payments</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Refunded Income Widget -->
                        <div class="card">
                            <div class="card-body">
                                <div class="flex items-center justify-between">
                                    <div class="bg-danger/15 text-danger flex size-15 items-center justify-center rounded-full">
                                        <i class="iconify tabler--credit-card-refund text-2xl"></i>
                                    </div>

                                    <div class="text-end">
                                        <h3 class="mb-3 text-2xl font-normal">$<span data-target="1120">0</span></h3>
                                        <p class="text-default-400">
                                            <span>Refunded Income</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div data-table data-table-rows-per-page="8" class="card">
                        <div class="card-header">
                            <!-- Search -->
                            <div class="flex flex-wrap gap-2.5">
                                <div class="input-icon-group">
                                    <i class="iconify tabler--search input-icon"></i>
                                    <input data-table-search type="search" class="form-input w-auto ps-10" placeholder="Search income..." />
                                </div>

                                <!-- Add New Income -->
                                <div class="flex gap-1">
                                    <a href="#incomeModal" class="btn bg-primary text-white hover:bg-primary-hover" aria-haspopup="dialog" aria-expanded="false" aria-controls="incomeModal" data-hs-overlay="#incomeModal"> <i class="iconify tabler--plus"></i> Add Income </a>
                                </div>

                                <!-- Delete Selected -->
                                <button data-table-delete-selected class="btn bg-danger text-white hover:bg-danger-hover hidden">Delete</button>
                            </div>

                            <div class="flex flex-wrap items-center gap-2.5 lg:flex-nowrap">
                                <div class="flex flex-wrap items-center gap-2.5 md:flex-nowrap">
                                    <div class="items-center gap-2.5 md:flex">
                                        <span class="font-semibold me-2.5">Filter By:</span>

                                        <!-- Source Filter -->
                                        <div class="input-icon-group">
                                            <i class="iconify tabler--briefcase input-icon"></i>
                                            <select data-table-filter="income-source" class="form-select">
                                                <option value="">Source</option>
                                                <option value="Sales">Sales</option>
                                                <option value="Services">Services</option>
                                                <option value="Consulting">Consulting</option>
                                                <option value="Investments">Investments</option>
                                                <option value="Affiliate">Affiliate</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Status Filter -->
                                    <div class="input-icon-group">
                                        <i class="iconify tabler--circle-check input-icon"></i>
                                        <select data-table-filter="status" class="form-select">
                                            <option value="">Status</option>
                                            <option value="Received">Received</option>
                                            <option value="Pending">Pending</option>
                                            <option value="Failed">Failed</option>
                                            <option value="Refunded">Refunded</option>
                                        </select>
                                    </div>

                                    <!-- Records Per Page -->
                                    <div class="relative">
                                        <select data-table-set-rows-per-page class="form-select">
                                            <option value="5">5</option>
                                            <option value="10" selected>10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-wrapper">
                            <table class="table-custom table-select table table-hover">
                                <thead class="thead-sm">
                                    <tr class="bg-light/25 text-2xs uppercase">
                                        <th class="w-[1%]">
                                            <input data-table-select-all class="form-checkbox form-checkbox-light size-4.5" type="checkbox" />
                                        </th>
                                        <th data-table-sort>ID</th>
                                        <th>Income Title</th>
                                        <th data-table-sort data-column="income-source">Source</th>
                                        <th>Payment Type</th>
                                        <th data-table-sort>Amount</th>
                                        <th data-table-sort data-column="status">Status</th>
                                        <th data-table-sort>Date</th>
                                        <th data-table-sort>Received By</th>
                                        <th class="text-center w-[1%]">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" />
                                        </td>
                                        <td>
                                            <a href="#!" class="hover:text-primary font-semibold">#INC-1001</a>
                                        </td>
                                        <td>Website Development Payment</td>
                                        <td data-column="income-source">Services</td>
                                        <td>
                                            <div class="flex items-center">
                                                <img src="assets/images/cards/visa.svg" alt="Visa" class="me-3 h-6.5" height="26" />
                                                <span>**** 3294</span>
                                            </div>
                                        </td>
                                        <td>$1,250.00</td>
                                        <td>
                                            <span class="badge bagde-label bg-success/15 text-success">Received</span>
                                        </td>
                                        <td>
                                            03 Oct, 2025
                                            <small class="text-default-400 text-2xs">11:00 AM</small>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-3">
                                                <img src="assets/images/users/user-3.jpg" alt="Emily Clark" class="size-6 rounded-full" />
                                                <span>Emily Clark</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex justify-center gap-1.5">
                                                <a href="#" class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-800 size-7.75 rounded border">
                                                    <i class="iconify tabler--eye text-base"></i>
                                                </a>
                                                <a href="#" class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-800 size-7.75 rounded border">
                                                    <i class="iconify tabler--edit text-base"></i>
                                                </a>
                                                <a href="#" class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-800 size-7.75 rounded border" data-table-delete-row>
                                                    <i class="iconify tabler--trash text-base"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" />
                                        </td>
                                        <td>
                                            <a href="#!" class="hover:text-primary font-semibold">#INC-1002</a>
                                        </td>
                                        <td>Consulting Fees (Q3)</td>
                                        <td data-column="income-source">Consulting</td>
                                        <td>
                                            <div class="flex items-center">
                                                <img src="assets/images/cards/mastercard.svg" alt="MasterCard" class="me-3 h-6.5" height="26" />
                                                <span>**** 8712</span>
                                            </div>
                                        </td>
                                        <td>$780.00</td>
                                        <td>
                                            <span class="badge bagde-label bg-warning/15 text-warning">Pending</span>
                                        </td>
                                        <td>
                                            01 Oct, 2025
                                            <small class="text-default-400 text-2xs">04:20 PM</small>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-3">
                                                <img src="assets/images/users/user-7.jpg" alt="Daniel Ray" class="size-6 rounded-full" />
                                                <span>Daniel Ray</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex justify-center gap-1.5">
                                                <a href="#" class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-800 size-7.75 rounded border">
                                                    <i class="iconify tabler--eye text-base"></i>
                                                </a>
                                                <a href="#" class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-800 size-7.75 rounded border">
                                                    <i class="iconify tabler--edit text-base"></i>
                                                </a>
                                                <a href="#" class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-800 size-7.75 rounded border" data-table-delete-row>
                                                    <i class="iconify tabler--trash text-base"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" />
                                        </td>
                                        <td>
                                            <a href="#!" class="hover:text-primary font-semibold">#INC-1003</a>
                                        </td>
                                        <td>E-commerce Sales Revenue</td>
                                        <td data-column="income-source">Sales</td>
                                        <td>
                                            <div class="flex items-center">
                                                <img src="assets/images/cards/mastercard.svg" alt="MasterCard" class="me-3 h-6.5" height="26" />
                                                <span>**** 4511</span>
                                            </div>
                                        </td>
                                        <td>$2,430.00</td>
                                        <td>
                                            <span class="badge bagde-label bg-success/15 text-success">Received</span>
                                        </td>
                                        <td>
                                            04 Oct, 2025
                                            <small class="text-default-400 text-2xs">02:35 PM</small>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-3">
                                                <img src="assets/images/users/user-4.jpg" alt="Emma Johnson" class="size-6 rounded-full" />
                                                <span>Emma Johnson</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex justify-center gap-1.5">
                                                <a href="#" class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-800 size-7.75 rounded border">
                                                    <i class="iconify tabler--eye text-base"></i>
                                                </a>
                                                <a href="#" class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-800 size-7.75 rounded border">
                                                    <i class="iconify tabler--edit text-base"></i>
                                                </a>
                                                <a href="#" class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-800 size-7.75 rounded border" data-table-delete-row>
                                                    <i class="iconify tabler--trash text-base"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" />
                                        </td>
                                        <td>
                                            <a href="#!" class="hover:text-primary font-semibold">#INC-1004</a>
                                        </td>
                                        <td>Affiliate Payout - September</td>
                                        <td data-column="income-source">Affiliate</td>
                                        <td>
                                            <div class="flex items-center">
                                                <img src="assets/images/cards/paypal.svg" alt="PayPal" class="me-3 h-6.5" height="26" />
                                                <span>PayPal</span>
                                            </div>
                                        </td>
                                        <td>$645.25</td>
                                        <td>
                                            <span class="badge bagde-label bg-success/15 text-success">Received</span>
                                        </td>
                                        <td>
                                            02 Oct, 2025
                                            <small class="text-default-400 text-2xs">09:30 AM</small>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-3">
                                                <img src="assets/images/users/user-6.jpg" alt="David Wilson" class="size-6 rounded-full" />
                                                <span>David Wilson</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex justify-center gap-1.5">
                                                <a href="#" class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-800 size-7.75 rounded border">
                                                    <i class="iconify tabler--eye text-base"></i>
                                                </a>
                                                <a href="#" class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-800 size-7.75 rounded border">
                                                    <i class="iconify tabler--edit text-base"></i>
                                                </a>
                                                <a href="#" class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-800 size-7.75 rounded border" data-table-delete-row>
                                                    <i class="iconify tabler--trash text-base"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" />
                                        </td>
                                        <td>
                                            <a href="#!" class="hover:text-primary font-semibold">#INC-1005</a>
                                        </td>
                                        <td>Software License Renewal</td>
                                        <td data-column="income-source">Services</td>
                                        <td>
                                            <div class="flex items-center">
                                                <img src="assets/images/cards/visa.svg" alt="Visa" class="me-3 h-6.5" height="26" />
                                                <span>**** 9987</span>
                                            </div>
                                        </td>
                                        <td>$1,120.00</td>
                                        <td>
                                            <span class="badge bagde-label bg-warning/15 text-warning">Pending</span>
                                        </td>
                                        <td>
                                            29 Sep, 2025
                                            <small class="text-default-400 text-2xs">01:15 PM</small>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-3">
                                                <img src="assets/images/users/user-8.jpg" alt="Lucas Martin" class="size-6 rounded-full" />
                                                <span>Lucas Martin</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex justify-center gap-1.5">
                                                <a href="#" class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-800 size-7.75 rounded border">
                                                    <i class="iconify tabler--eye text-base"></i>
                                                </a>
                                                <a href="#" class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-800 size-7.75 rounded border">
                                                    <i class="iconify tabler--edit text-base"></i>
                                                </a>
                                                <a href="#" class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-800 size-7.75 rounded border" data-table-delete-row>
                                                    <i class="iconify tabler--trash text-base"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" />
                                        </td>
                                        <td>
                                            <a href="#!" class="hover:text-primary font-semibold">#INC-1006</a>
                                        </td>
                                        <td>Investment Dividend Q3</td>
                                        <td data-column="income-source">Investments</td>
                                        <td>
                                            <div class="flex items-center">
                                                <img src="assets/images/cards/note.svg" alt="Bank Transfer" class="me-3 h-6.5" height="26" />
                                                <span>Bank Transfer</span>
                                            </div>
                                        </td>
                                        <td>$3,950.50</td>
                                        <td>
                                            <span class="badge bagde-label bg-success/15 text-success">Received</span>
                                        </td>
                                        <td>
                                            27 Sep, 2025
                                            <small class="text-default-400 text-2xs">10:00 AM</small>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-3">
                                                <img src="assets/images/users/user-9.jpg" alt="Olivia Brown" class="size-6 rounded-full" />
                                                <span>Olivia Brown</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex justify-center gap-1.5">
                                                <a href="#" class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-800 size-7.75 rounded border">
                                                    <i class="iconify tabler--eye text-base"></i>
                                                </a>
                                                <a href="#" class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-800 size-7.75 rounded border">
                                                    <i class="iconify tabler--edit text-base"></i>
                                                </a>
                                                <a href="#" class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-800 size-7.75 rounded border" data-table-delete-row>
                                                    <i class="iconify tabler--trash text-base"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" />
                                        </td>
                                        <td>
                                            <a href="#!" class="hover:text-primary font-semibold">#INC-1007</a>
                                        </td>
                                        <td>Advertising Revenue (Google Ads)</td>
                                        <td data-column="income-source">Affiliate</td>
                                        <td>
                                            <div class="flex items-center">
                                                <img src="assets/images/cards/paypal.svg" alt="PayPal" class="me-3 h-6.5" height="26" />
                                                <span>PayPal</span>
                                            </div>
                                        </td>
                                        <td>$870.75</td>
                                        <td>
                                            <span class="badge bagde-label bg-success/15 text-success">Received</span>
                                        </td>
                                        <td>
                                            25 Sep, 2025
                                            <small class="text-default-400 text-2xs">08:10 PM</small>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-3">
                                                <img src="assets/images/users/user-10.jpg" alt="Ethan Brooks" class="size-6 rounded-full" />
                                                <span>Ethan Brooks</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex justify-center gap-1.5">
                                                <a href="#" class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-800 size-7.75 rounded border">
                                                    <i class="iconify tabler--eye text-base"></i>
                                                </a>
                                                <a href="#" class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-800 size-7.75 rounded border">
                                                    <i class="iconify tabler--edit text-base"></i>
                                                </a>
                                                <a href="#" class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-800 size-7.75 rounded border" data-table-delete-row>
                                                    <i class="iconify tabler--trash text-base"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" />
                                        </td>
                                        <td>
                                            <a href="#!" class="hover:text-primary font-semibold">#INC-1008</a>
                                        </td>
                                        <td>Monthly Retainer - Client A</td>
                                        <td data-column="income-source">Consulting</td>
                                        <td>
                                            <div class="flex items-center">
                                                <img src="assets/images/cards/mastercard.svg" alt="MasterCard" class="me-3 h-6.5" height="26" />
                                                <span>**** 4732</span>
                                            </div>
                                        </td>
                                        <td>$2,200.00</td>
                                        <td>
                                            <span class="badge bagde-label bg-success/15 text-success">Received</span>
                                        </td>
                                        <td>
                                            22 Sep, 2025
                                            <small class="text-default-400 text-2xs">12:30 PM</small>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-3">
                                                <img src="assets/images/users/user-7.jpg" alt="Liam Davis" class="size-6 rounded-full" />
                                                <span>Liam Davis</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex justify-center gap-1.5">
                                                <a href="#" class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-800 size-7.75 rounded border">
                                                    <i class="iconify tabler--eye text-base"></i>
                                                </a>
                                                <a href="#" class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-800 size-7.75 rounded border">
                                                    <i class="iconify tabler--edit text-base"></i>
                                                </a>
                                                <a href="#" class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-800 size-7.75 rounded border" data-table-delete-row>
                                                    <i class="iconify tabler--trash text-base"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" />
                                        </td>
                                        <td>
                                            <a href="#!" class="hover:text-primary font-semibold">#INC-1009</a>
                                        </td>
                                        <td>Service Renewal - Hosting Plan</td>
                                        <td data-column="income-source">Services</td>
                                        <td>
                                            <div class="flex items-center">
                                                <img src="assets/images/cards/visa.svg" alt="Visa" class="me-3 h-6.5" height="26" />
                                                <span>**** 2318</span>
                                            </div>
                                        </td>
                                        <td>$399.00</td>
                                        <td>
                                            <span class="badge bagde-label bg-warning/15 text-warning">Pending</span>
                                        </td>
                                        <td>
                                            20 Sep, 2025
                                            <small class="text-default-400 text-2xs">04:05 PM</small>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-3">
                                                <img src="assets/images/users/user-1.jpg" alt="Sophia Turner" class="size-6 rounded-full" />
                                                <span>Sophia Turner</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex justify-center gap-1.5">
                                                <a href="#" class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-800 size-7.75 rounded border">
                                                    <i class="iconify tabler--eye text-base"></i>
                                                </a>
                                                <a href="#" class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-800 size-7.75 rounded border">
                                                    <i class="iconify tabler--edit text-base"></i>
                                                </a>
                                                <a href="#" class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-800 size-7.75 rounded border" data-table-delete-row>
                                                    <i class="iconify tabler--trash text-base"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" />
                                        </td>
                                        <td>
                                            <a href="#!" class="hover:text-primary font-semibold">#INC-1010</a>
                                        </td>
                                        <td>Refund - Cancelled Subscription</td>
                                        <td data-column="income-source">Other</td>
                                        <td>
                                            <div class="flex items-center">
                                                <img src="assets/images/cards/american-express.svg" alt="Amex" class="me-3 h-6.5" height="26" />
                                                <span>**** 9812</span>
                                            </div>
                                        </td>
                                        <td>$-125.00</td>
                                        <td>
                                            <span class="badge bagde-label bg-danger/15 text-danger">Refunded</span>
                                        </td>
                                        <td>
                                            18 Sep, 2025
                                            <small class="text-default-400 text-2xs">05:45 PM</small>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-3">
                                                <img src="assets/images/users/user-2.jpg" alt="Noah Walker" class="size-6 rounded-full" />
                                                <span>Noah Walker</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex justify-center gap-1.5">
                                                <a href="#" class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-800 size-7.75 rounded border">
                                                    <i class="iconify tabler--eye text-base"></i>
                                                </a>
                                                <a href="#" class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-800 size-7.75 rounded border">
                                                    <i class="iconify tabler--edit text-base"></i>
                                                </a>
                                                <a href="#" class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-800 size-7.75 rounded border" data-table-delete-row>
                                                    <i class="iconify tabler--trash text-base"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" />
                                        </td>
                                        <td>
                                            <a href="#!" class="hover:text-primary font-semibold">#INC-1011</a>
                                        </td>
                                        <td>Project Completion Payment - Client B</td>
                                        <td data-column="income-source">Services</td>
                                        <td>
                                            <div class="flex items-center">
                                                <img src="assets/images/cards/note.svg" alt="Bank Transfer" class="me-3 h-6.5" height="26" />
                                                <span>Bank Transfer</span>
                                            </div>
                                        </td>
                                        <td>$3,580.00</td>
                                        <td>
                                            <span class="badge bagde-label bg-success/15 text-success">Received</span>
                                        </td>
                                        <td>
                                            15 Sep, 2025
                                            <small class="text-default-400 text-2xs">03:20 PM</small>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-3">
                                                <img src="assets/images/users/user-4.jpg" alt="Grace Miller" class="size-6 rounded-full" />
                                                <span>Grace Miller</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex justify-center gap-1.5">
                                                <a href="#" class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-800 size-7.75 rounded border">
                                                    <i class="iconify tabler--eye text-base"></i>
                                                </a>
                                                <a href="#" class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-800 size-7.75 rounded border">
                                                    <i class="iconify tabler--edit text-base"></i>
                                                </a>
                                                <a href="#" class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-800 size-7.75 rounded border" data-table-delete-row>
                                                    <i class="iconify tabler--trash text-base"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" />
                                        </td>
                                        <td>
                                            <a href="#!" class="hover:text-primary font-semibold">#INC-1012</a>
                                        </td>
                                        <td>Royalty Income - October</td>
                                        <td data-column="income-source">Other</td>
                                        <td>
                                            <div class="flex items-center">
                                                <img src="assets/images/cards/mastercard.svg" alt="MasterCard" class="me-3 h-6.5" height="26" />
                                                <span>**** 5454</span>
                                            </div>
                                        </td>
                                        <td>$940.00</td>
                                        <td>
                                            <span class="badge bagde-label bg-success/15 text-success">Received</span>
                                        </td>
                                        <td>
                                            12 Sep, 2025
                                            <small class="text-default-400 text-2xs">11:55 AM</small>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-3">
                                                <img src="assets/images/users/user-5.jpg" alt="Chloe Adams" class="size-6 rounded-full" />
                                                <span>Chloe Adams</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex justify-center gap-1.5">
                                                <a href="#" class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-800 size-7.75 rounded border">
                                                    <i class="iconify tabler--eye text-base"></i>
                                                </a>
                                                <a href="#" class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-800 size-7.75 rounded border">
                                                    <i class="iconify tabler--edit text-base"></i>
                                                </a>
                                                <a href="#" class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-800 size-7.75 rounded border" data-table-delete-row>
                                                    <i class="iconify tabler--trash text-base"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="card-footer">
                            <div data-table-pagination-info="Income Records"></div>
                            <div data-table-pagination></div>
                        </div>
                    </div>
                </div>
            </main>

            <?php include('./partials/footer.php'); ?>

            <div id="incomeModal" class="hs-overlay pointer-events-none fixed start-0 top-0 z-80 hidden size-full overflow-x-hidden overflow-y-auto" role="dialog" tabindex="-1" aria-labelledby="incomeModalLabel">
                <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 m-3 flex min-h-[calc(100%-56px)] scale-95 items-center opacity-0 transition-all duration-200 ease-in-out md:mx-auto md:w-full md:max-w-2xl lg:max-w-3xl">
                    <div class="card pointer-events-auto flex w-full flex-col">
                        <div class="card-header p-5">
                            <h3 id="incomeModalLabel" class="font-semibold">Add New Income</h3>
                            <button type="button" aria-label="Close" data-hs-overlay="#incomeModal">
                                <i class="iconify tabler--x text-2xl align-middle text-default-600"></i>
                            </button>
                        </div>

                        <div class="card-body">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- Income Title -->
                                <div class="col-span-1">
                                    <label for="incomeTitle" class="form-label">
                                        Income Title
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" id="incomeTitle" class="form-input" placeholder="Enter income title" required />
                                </div>

                                <!-- Amount -->
                                <div class="col-span-1">
                                    <label for="incomeAmount" class="form-label">
                                        Amount ($)
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="number" step="0.01" id="incomeAmount" class="form-input" placeholder="Enter amount" required />
                                </div>

                                <!-- Source -->
                                <div class="col-span-1">
                                    <label for="incomeSource" class="form-label">
                                        Income Source
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select id="incomeSource" class="form-input" required>
                                        <option value="">Select source</option>
                                        <option value="Sales">Sales</option>
                                        <option value="Services">Services</option>
                                        <option value="Consulting">Consulting</option>
                                        <option value="Investments">Investments</option>
                                        <option value="Affiliate">Affiliate</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>

                                <!-- Payment Type -->
                                <div class="col-span-1">
                                    <label for="incomePayment" class="form-label">Payment Type</label>
                                    <select id="incomePayment" class="form-input">
                                        <option value="">Select payment type</option>
                                        <option value="Credit Card">Credit Card</option>
                                        <option value="Debit Card">Debit Card</option>
                                        <option value="Cash">Cash</option>
                                        <option value="Bank Transfer">Bank Transfer</option>
                                        <option value="PayPal">PayPal</option>
                                    </select>
                                </div>

                                <!-- Client Name -->
                                <div class="col-span-1">
                                    <label for="incomeClient" class="form-label">Client Name</label>
                                    <input type="text" id="incomeClient" class="form-input" placeholder="Enter client or company name" />
                                </div>

                                <!-- Status -->
                                <div class="col-span-1">
                                    <label for="incomeStatus" class="form-label">Status</label>
                                    <select id="incomeStatus" class="form-input">
                                        <option value="Received" selected>Received</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Refunded">Refunded</option>
                                    </select>
                                </div>

                                <!-- Date -->
                                <div class="col-span-1">
                                    <label for="incomeDate" class="form-label">Date & Time</label>
                                    <input type="text" data-provider="flatpickr" data-date-format="d M, Y" data-enable-time id="incomeDate" class="form-input" />
                                </div>

                                <!-- Received By -->
                                <div class="col-span-1">
                                    <label for="incomeReceivedBy" class="form-label">Received By</label>
                                    <div class="flex items-center gap-3">
                                        <img src="assets/images/users/user-5.jpg" alt="user" class="size-6 rounded-full" />
                                        <input type="text" id="incomeReceivedBy" class="form-input" placeholder="Enter receiver name" />
                                    </div>
                                </div>

                                <!-- Notes -->
                                <div class="col-span-1 lg:col-span-2">
                                    <label for="incomeNotes" class="form-label">Notes</label>
                                    <textarea id="incomeNotes" class="form-textarea" rows="3" placeholder="Optional remarks or description"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="border-default-300 flex items-center justify-end gap-2 border-t p-5">
                            <button type="button" class="btn bg-light hover:text-primary" data-hs-overlay="#incomeModal">Cancel</button>

                            <button type="button" class="btn bg-primary text-white hover:bg-primary-hover">
                                <i class="iconify tabler--device-floppy"></i>
                                Save Income
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

    <!-- Custom table -->
    <script src="assets/js/pages/custom-table.js"></script>
</body>

</html>