<!doctype html>
<html lang="en">

<head>
    <?php $title = "Leads"; include('partials/title-meta.php'); ?>

    <?php include('./partials/head-css.php'); ?>
</head>

<body>
    <div class="wrapper">
        <?php $subtitle = "CRM"; $title = "Leads"; include('./partials/topbar.php'); ?>

        <?php include('./partials/sidenav.php'); ?>

        <!-- Start Page Content here -->
        <div class="page-content">
            <main>

                <?php $subtitle = "CRM"; $title = "Leads"; include('./partials/page-title.php'); ?>

                <div class="container-fluid">
                    <div class="mb-1.25 grid grid-cols-1 gap-1.25 md:grid-cols-3 lg:grid-cols-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <p class="text-default-400 mb-1.25">New</p>
                                    <h4 class="text-lg">
                                        <span data-target="547">547</span>
                                    </h4>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <p class="text-default-400 mb-1.25">Contacted</p>
                                    <h4 class="text-lg"><span data-target="469.20">469.20</span> k</h4>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <p class="text-default-400 mb-1.25">Qualified</p>
                                    <h4 class="text-lg">
                                        <span data-target="105">105 k</span>
                                    </h4>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <p class="text-default-400 mb-1.25">Proposal Sent</p>
                                    <h4 class="text-lg"><span data-target="2.84">2.84</span> k</h4>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <p class="text-success mb-1.25">Customers</p>
                                    <h4 class="text-success text-lg"><span data-target="4.98"></span> k</h4>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <p class="text-danger mb-1.25">Lost Leads</p>
                                    <h4 class="text-danger text-lg"><span data-target="2.05"></span> k</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div data-table data-table-rows-per-page="8" class="card">
                        <div class="card-header">
                            <div class="flex flex-wrap gap-2.5">
                                <div class="input-icon-group">
                                    <i class="iconify tabler--search input-icon"></i>
                                    <input type="search" placeholder="Search leads..." class="form-input" />
                                </div>
                                <button data-table-delete-selected class="btn bg-danger text-white hover:bg-danger-hover hidden">Delete</button>

                                <button type="button" class="btn bg-primary text-white hover:bg-primary-hover" aria-haspopup="dialog" aria-expanded="false" aria-controls="addLeadModal" data-hs-overlay="#addLeadModal">
                                    <i class="iconify tabler--plus"></i>
                                    New Leads
                                </button>
                            </div>

                            <div class="flex flex-wrap items-center gap-2.5 md:flex-nowrap">
                                <span class="me-2.5 font-semibold text-nowrap">Filter By:</span>

                                <!-- Status Filter -->
                                <div class="input-icon-group">
                                    <i class="iconify tabler--arrows-shuffle input-icon"></i>
                                    <select data-table-filter="status" class="form-select">
                                        <option value="">Stage</option>
                                        <option value="Qualification">Qualification</option>
                                        <option value="Proposal Sent">Proposal Sent</option>
                                        <option value="Negotiation">Negotiation</option>
                                        <option value="Won">Won</option>
                                        <option value="Lost">Lost</option>
                                    </select>
                                </div>

                                <!-- Price Range Filter -->
                                <div class="input-icon-group">
                                    <i class="iconify tabler--currency-dollar input-icon"></i>
                                    <select data-table-range-filter="amount" class="form-select">
                                        <option value="">Amount Range</option>
                                        <option value="0-1000">$0 - $10,000</option>
                                        <option value="10001-25000">$10,001 - $25,000</option>
                                        <option value="25001-50000">$25,001 - $50,000</option>
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
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" />
                                        </th>
                                        <th data-table-sort>Lead ID</th>
                                        <th>Customer</th>
                                        <th>Company</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th data-table-sort data-column="amount">Amount (USD)</th>
                                        <th>Tags</th>
                                        <th>Assigned</th>
                                        <th data-table-sort data-column="status">Status</th>
                                        <th data-table-sort>Created</th>
                                        <th class="text-center" style="width: 1%">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" />
                                        </td>
                                        <td class="hover:text-primary px-2.25 py-3 font-semibold">#LD007842</td>
                                        <td>R. Thompson</td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <div>
                                                    <div class="btn btn-icon border-default-300 size-8 rounded-full border border-dashed">
                                                        <img src="assets/images/logos/amazon.svg" alt="Product" class="size-5" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <a href="#!" class="hover:text-primary">Amazon Web Services</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>contact&#64;aws.com</td>
                                        <td>+1 206-555-0199</td>
                                        <td>$150,000</td>
                                        <td>
                                            <span class="badge badge-label bg-info/15 text-info">Cloud</span>
                                        </td>
                                        <td>
                                            <img src="assets/images/users/user-10.jpg" alt="avatar-10" class="size-6 rounded-full" />
                                        </td>
                                        <td>
                                            <span class="badge bg-success/15 text-success">In Progress</span>
                                        </td>
                                        <td>12 Jul, 2025</td>
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

                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" />
                                        </td>
                                        <td class="hover:text-primary px-2.25 py-3 font-semibold">#LD007865</td>
                                        <td>S. Kapoor</td>
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
                                        <td>s.kapoor&#64;microt.com</td>
                                        <td>+44 20 7946 0991</td>
                                        <td>$98,500</td>
                                        <td>
                                            <span class="badge badge-label bg-warning/15 text-warning">AI</span>
                                        </td>
                                        <td>
                                            <img src="assets/images/users/user-2.jpg" alt="avatar-2" class="size-6 rounded-full" />
                                        </td>
                                        <td>
                                            <span class="badge bg-primary/15 text-primary">Proposal Sent</span>
                                        </td>
                                        <td>21 Jul, 2025</td>
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

                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" />
                                        </td>
                                        <td class="hover:text-primary px-2.25 py-3 font-semibold">#LD007866</td>
                                        <td>A. Patel</td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <div>
                                                    <div class="btn btn-icon border-default-300 size-8 rounded-full border border-dashed">
                                                        <img src="assets/images/logos/google.svg" alt="Product" class="size-5" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <a href="#!" class="hover:text-primary">Google</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>amit.patel&#64;google.com</td>
                                        <td>+1 650-253-0000</td>
                                        <td>$120,000</td>
                                        <td>
                                            <span class="badge badge-label bg-success/15 text-success">Cloud</span>
                                        </td>
                                        <td>
                                            <img src="assets/images/users/user-3.jpg" alt="avatar-3" class="size-6 rounded-full" />
                                        </td>
                                        <td>
                                            <span class="badge bg-info/15 text-info">Follow Up</span>
                                        </td>
                                        <td>22 Jul, 2025</td>
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

                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" />
                                        </td>
                                        <td class="hover:text-primary px-2.25 py-3 font-semibold">#LD007867</td>
                                        <td>J. Fernandes</td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <div>
                                                    <div class="btn btn-icon border-default-300 size-8 rounded-full border border-dashed">
                                                        <img src="assets/images/logos/airbnb.svg" alt="Product" class="size-5" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <a href="#!" class="hover:text-primary">Airbnb Inc</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>j.fernandes&#64;adobe.com</td>
                                        <td>+1 408-536-6000</td>
                                        <td>$65,000</td>
                                        <td>
                                            <span class="badge badge-label bg-danger/15 text-danger">Design</span>
                                        </td>
                                        <td>
                                            <img src="assets/images/users/user-4.jpg" alt="avatar-4" class="size-6 rounded-full" />
                                        </td>
                                        <td>
                                            <span class="badge bg-warning/15 text-warning">Pending</span>
                                        </td>
                                        <td>23 Jul, 2025</td>
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

                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" />
                                        </td>
                                        <td class="hover:text-primary px-2.25 py-3 font-semibold">#LD007868</td>
                                        <td>M. Zhang</td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <div>
                                                    <div class="btn btn-icon border-default-300 size-8 rounded-full border border-dashed">
                                                        <img src="assets/images/logos/apple.svg" alt="Product" class="size-5" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <a href="#!" class="hover:text-primary">Apple Platforms</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>ming.zhang&#64;apple.com</td>
                                        <td>+1 650-308-7300</td>
                                        <td>$142,000</td>
                                        <td>
                                            <span class="badge badge-label bg-secondary/15 text-secondary">VR</span>
                                        </td>
                                        <td>
                                            <img src="assets/images/users/user-5.jpg" alt="avatar-5" class="size-6 rounded-full" />
                                        </td>
                                        <td>
                                            <span class="badge bg-success/15 text-success">In Progress</span>
                                        </td>
                                        <td>23 Jul, 2025</td>
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

                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" />
                                        </td>
                                        <td class="hover:text-primary px-2.25 py-3 font-semibold">#LD007869</td>
                                        <td>N. Sharma</td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <div>
                                                    <div class="btn btn-icon border-default-300 size-8 rounded-full border border-dashed">
                                                        <img src="assets/images/logos/asana.svg" alt="Product" class="size-5" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <a href="#!" class="hover:text-primary">Asana</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>n.sharma&#64;netflix.com</td>
                                        <td>+1 408-540-3700</td>
                                        <td>$75,500</td>
                                        <td>
                                            <span class="badge badge-label bg-info/15 text-info">Streaming</span>
                                        </td>
                                        <td>
                                            <img src="assets/images/users/user-6.jpg" alt="avatar-6" class="size-6 rounded-full" />
                                        </td>
                                        <td>
                                            <span class="badge bg-danger/15 text-danger">Rejected</span>
                                        </td>
                                        <td>24 Jul, 2025</td>
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

                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" />
                                        </td>
                                        <td class="hover:text-primary px-2.25 py-3 font-semibold">#LD007870</td>
                                        <td>K. Williams</td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <div>
                                                    <div class="btn btn-icon border-default-300 size-8 rounded-full border border-dashed">
                                                        <img src="assets/images/logos/dropbox.svg" alt="Product" class="size-5" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <a href="#!" class="hover:text-primary">Dropbox</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>k.williams&#64;tesila.com</td>
                                        <td>+1 310-420-6600</td>
                                        <td>$110,250</td>
                                        <td>
                                            <span class="badge badge-label bg-dark/15 text-dark">EV</span>
                                        </td>
                                        <td>
                                            <img src="assets/images/users/user-7.jpg" alt="avatar-7" class="size-6 rounded-full" />
                                        </td>
                                        <td>
                                            <span class="badge bg-secondary/15 text-secondary">Negotiation</span>
                                        </td>
                                        <td>24 Jul, 2025</td>
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

                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" />
                                        </td>
                                        <td class="hover:text-primary px-2.25 py-3 font-semibold">#LD007871</td>
                                        <td>L. Mehra</td>
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
                                        <td>l.mehra&#64;airbnb.com</td>
                                        <td>+1 415-555-0102</td>
                                        <td>$87,000</td>
                                        <td>
                                            <span class="badge badge-label bg-danger/15 text-danger">Travel</span>
                                        </td>
                                        <td>
                                            <img src="assets/images/users/user-8.jpg" alt="avatar-1" class="size-6 rounded-full" />
                                        </td>
                                        <td>
                                            <span class="badge bg-primary/15 text-primary">Proposal Sent</span>
                                        </td>
                                        <td>24 Jul, 2025</td>
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

                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" />
                                        </td>
                                        <td class="hover:text-primary px-2.25 py-3 font-semibold">#LD007872</td>
                                        <td>R. Iyer</td>
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
                                        <td>r.iyer&#64;slackhq.com</td>
                                        <td>+1 628-555-0111</td>
                                        <td>$332,000</td>
                                        <td>
                                            <span class="badge badge-label bg-info/15 text-info">Collaboration</span>
                                        </td>
                                        <td>
                                            <img src="assets/images/users/user-9.jpg" alt="avatar-9" class="size-6 rounded-full" />
                                        </td>
                                        <td>
                                            <span class="badge bg-success/15 text-success">In Progress</span>
                                        </td>
                                        <td>24 Jul, 2025</td>
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

                                    <tr>
                                        <td>
                                            <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" />
                                        </td>
                                        <td class="hover:text-primary px-2.25 py-3 font-semibold">#LD007873</td>
                                        <td>E. Fernandez</td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <div>
                                                    <div class="btn btn-icon border-default-300 size-8 rounded-full border border-dashed">
                                                        <img src="assets/images/logos/spotify.svg" alt="Product" class="size-5" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <a href="#!" class="hover:text-primary">Spotify</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>emma.f&#64;spotify.com</td>
                                        <td>+46 31 123 456</td>
                                        <td>$91,7000</td>
                                        <td>
                                            <span class="badge badge-label bg-success/15 text-success">Music</span>
                                        </td>
                                        <td>
                                            <img src="assets/images/users/user-10.jpg" alt="avatar-10" class="size-6 rounded-full" />
                                        </td>
                                        <td>
                                            <span class="badge bg-warning/15 text-warning">Pending</span>
                                        </td>
                                        <td>25 Jul, 2025</td>
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
                            <div data-table-pagination-info="Leads"></div>
                            <div data-table-pagination></div>
                        </div>
                    </div>
                </div>
            </main>

            <?php include('./partials/footer.php'); ?>

            <div id="addLeadModal" class="hs-overlay pointer-events-none fixed start-0 top-0 z-80 hidden size-full overflow-x-hidden overflow-y-auto" role="dialog" tabindex="-1" aria-labelledby="addLeadModalLabel">
                <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 m-3 flex scale-95 items-center opacity-0 transition-all duration-200 ease-in-out md:mx-auto md:w-full md:max-w-2xl lg:max-w-3xl">
                    <div class="border-default-300 pointer-events-auto flex w-full flex-col rounded-md border card">
                        <div class="card-header p-5">
                            <h3 id="addLeadModalLabel" class="text-sm">Add New Lead</h3>
                            <button type="button" aria-label="Close" data-hs-overlay="#addLeadModal">
                                <i class="iconify tabler--x text-xl"></i>
                            </button>
                        </div>

                        <div class="overflow-y-auto card-body">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="leadName" class="form-label">Lead Name</label>
                                    <input type="text" class="form-input" id="leadName" placeholder="Enter Lead name" />
                                </div>

                                <div>
                                    <label for="companyName" class="form-label">Company</label>
                                    <input type="text" class="form-input" id="companyName" placeholder="Enter company name" />
                                </div>

                                <div>
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-input" id="email" placeholder="Enter email" />
                                </div>

                                <div>
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="tel" class="form-input" id="phone" placeholder="+1 234-567-8910" />
                                </div>

                                <div>
                                    <label for="amount" class="form-label">Amount (USD)</label>
                                    <input type="number" class="form-input" id="amount" placeholder="e.g. 50000" />
                                </div>

                                <div>
                                    <label for="Leadstatus" class="form-label">Status</label>
                                    <select class="form-input" id="Leadstatus">
                                        <option value="">Select status</option>
                                        <option>In Progress</option>
                                        <option>Proposal Sent</option>
                                        <option>Follow Up</option>
                                        <option>Pending</option>
                                        <option>Negotiation</option>
                                        <option>Rejected</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="assignedTo" class="form-label">Assign To</label>
                                    <select class="form-input" id="assignedTo">
                                        <option value="">Select user</option>
                                        <option value="1">Emily Carter</option>
                                        <option value="2">Rohan Iyer</option>
                                        <option value="3">Sara Kim</option>
                                        <option value="4">Kevin Nguyen</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="border-default-300 flex items-center justify-end gap-x-2 border-t p-5">
                            <button type="button" class="btn bg-light hover:text-primary" data-hs-overlay="#addLeadModal">Cancel</button>

                            <button type="button" class="btn bg-primary text-white hover:bg-primary-hover">Save Lead</button>
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