<!doctype html>
<html lang="en">

<head>
    <?php $title = "Analytics"; include('partials/title-meta.php'); ?>

    <?php include('./partials/head-css.php'); ?>
</head>

<body>
    <div class="wrapper">
        <?php $subtitle = "Dashboard"; $title = "Analytics"; include('./partials/topbar.php'); ?>

        <?php include('./partials/sidenav.php'); ?>

        <!-- Start Page Content here -->
        <div class="page-content">
            <main>

                <?php $subtitle = "Dashboard"; $title = "Analytics"; include('./partials/page-title.php'); ?>

                <div class="container-fluid">
                    <div class="grid xl:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-base mb-base">
                        <div class="card h-full">
                            <div class="card-body">
                                <div class="flex flex-wrap justify-between items-start">
                                    <div>
                                        <h4 class="mb-2.5 text-default-400 text-[13px] uppercase font-bold">Total Orders</h4>
                                        <div class="flex items-center gap-2.5 mb-2.5 py-1.25">
                                            <div class="size-9 bg-success flex justify-center items-center text-white rounded-full">
                                                <i class="iconify tabler--basket text-xl text-white"></i>
                                            </div>

                                            <h3 class="text-xl">$<span data-target="659.8">0</span>k</h3>
                                            <span class="badge text-sm py-0 bg-danger/15 text-danger"><i class="iconify tabler--arrow-down align-middle"></i> 3.21%</span>
                                        </div>
                                    </div>

                                    <!-- Filter -->
                                    <div class="input-icon-group">
                                        <i class="iconify tabler--calendar input-icon text-default-400"></i>
                                        <select class="form-select form-select-sm">
                                            <option value="All">All Time</option>
                                            <option value="today">Today</option>
                                            <option value="last_7_days">Last 7 Days</option>
                                            <option value="last_30_days">Last 30 Days</option>
                                            <option value="last_90_days" selected="">Last 90 Days</option>
                                            <option value="this_month">This Month</option>
                                            <option value="last_month">Last Month</option>
                                        </select>
                                    </div>
                                </div>

                                <div>
                                    <div id="total-orders-chart" class="apex-charts"></div>
                                </div>
                            </div>
                            <!-- end card-body-->
                        </div>
                        <!-- end card-->

                        <div class="card h-full">
                            <div class="card-body">
                                <div class="flex justify-between items-start flex-wrap">
                                    <div>
                                        <h4 class="mb-2.5 text-default-400 text-[13px] uppercase font-bold">Total Visitors</h4>
                                        <div class="flex items-center gap-2.5 mb-2.5 py-1.25">
                                            <div>
                                                <span class="size-9 bg-secondary text-white flex justify-center items-center rounded-full">
                                                    <i class="iconify tabler--eye text-xl"></i>
                                                </span>
                                            </div>

                                            <h3 class="text-xl"><span data-target="82.3">82.30</span>M</h3>
                                            <span class="badge text-sm py-0 ms-auto bg-success/15 text-success"> <i class="iconify tabler--arrow-up align-middle"></i> 6.84% </span>
                                        </div>
                                    </div>

                                    <!-- Filter -->
                                    <div class="input-icon-group">
                                        <i class="iconify tabler--calendar input-icon text-default-400"></i>
                                        <select class="form-select form-select-sm">
                                            <option value="All">All Time</option>
                                            <option value="today">Today</option>
                                            <option value="last_7_days">Last 7 Days</option>
                                            <option value="last_30_days">Last 30 Days</option>
                                            <option value="last_90_days" selected="">Last 90 Days</option>
                                            <option value="this_month">This Month</option>
                                            <option value="last_month">Last Month</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="flex justify-between gap-1.25">
                                    <div style="width: 69.4%">
                                        <p class="mb-1.25 mt-2.5 text-default-400 uppercase text-sm font-medium">Mobile Phone</p>
                                        <h3 class="font-normal mb-2.5 text-lg">69.40%</h3>
                                        <div class="w-full h-3 bg-default-200 rounded-s-sm overflow-hidden mb-1.25">
                                            <div class="h-full bg-secondary w-full"></div>
                                        </div>
                                        <p class="text-default-400">41,927 Sessions</p>
                                    </div>

                                    <div style="width: 30.6%">
                                        <p class="mb-1.25 mt-2.5 text-default-400 uppercase text-sm font-medium">Desktop</p>
                                        <h3 class="font-normal mb-2.5 text-lg">30.60%</h3>
                                        <div class="w-full h-3 bg-default-200 rounded-e-sm overflow-hidden mb-1.25">
                                            <div class="h-full bg-info w-full"></div>
                                        </div>
                                        <p class="text-default-400">18,476 Sessions</p>
                                    </div>
                                </div>

                                <div class="overflow-x-auto mt-5 -mb-2.5">
                                    <table class="table table-sm whitespace-nowrap table-borderless">
                                        <thead class="bg-default-100 text-2xs uppercase thead-sm">
                                            <tr>
                                                <th class="p-2 text-start">Goal</th>
                                                <th class="p-2 text-start">Completed</th>
                                                <th class="p-2 text-start">Target</th>
                                                <th class="p-2 text-start">Progress</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>Total Visitors</td>
                                                <td>824,300</td>
                                                <td>1,000,000</td>
                                                <td>82%</td>
                                            </tr>
                                            <tr>
                                                <td>Mobile Traffic</td>
                                                <td>41,927</td>
                                                <td>60,000</td>
                                                <td>69%</td>
                                            </tr>
                                            <tr>
                                                <td>Desktop Traffic</td>
                                                <td>18,476</td>
                                                <td>30,000</td>
                                                <td>61%</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end card-->

                        <div class="card h-full lg:col-span-1 md:col-span-2">
                            <div class="card-body">
                                <div class="flex justify-between items-start flex-wrap">
                                    <div>
                                        <h4 class="mb-2.5 text-default-400 text-[13px] uppercase font-bold">Total Subscribers</h4>
                                        <div class="flex items-center gap-2.5 mb-2.5 py-1.25">
                                            <div>
                                                <span class="size-9 bg-info text-white flex justify-center items-center rounded-full">
                                                    <i class="iconify tabler--mail text-xl"></i>
                                                </span>
                                            </div>
                                            <h3 class="text-xl"><span data-target="55.60">55.60</span>k</h3>
                                            <span class="badge text-sm py-0 ms-auto bg-success/15 text-success"> <i class="iconify tabler--arrow-up align-middle"></i> 4.87% </span>
                                        </div>
                                    </div>

                                    <!-- Filter -->
                                    <div class="input-icon-group">
                                        <i class="iconify tabler--calendar input-icon text-default-400"></i>
                                        <select class="form-select form-select-sm">
                                            <option value="All">All Time</option>
                                            <option value="today">Today</option>
                                            <option value="last_7_days">Last 7 Days</option>
                                            <option value="last_30_days">Last 30 Days</option>
                                            <option value="last_90_days" selected="">Last 90 Days</option>
                                            <option value="this_month">This Month</option>
                                            <option value="last_month">Last Month</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Email Marketing -->
                                <div class="mt-2.5 pt-1.25">
                                    <div class="flex items-center justify-between mb-2.5">
                                        <h5 class="text-sm font-semibold">Email Marketing</h5>

                                        <div class="flex items-center text-sm">
                                            <span>+ <span data-target="34,920">0</span></span>

                                            <span class="flex items-center mx-6">
                                                <i class="iconify tabler--circle-filled text-default-200 size-2.5"></i>
                                            </span>

                                            <span>27.41%</span>
                                        </div>
                                    </div>

                                    <!-- Progress Bar -->
                                    <div class="w-full h-1.25 bg-default-100 rounded mb-1.25">
                                        <div class="h-full bg-secondary rounded-s-sm" style="width: 27.41%" aria-valuenow="27.41" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>

                                <!-- Social Marketing -->
                                <div class="mt-5">
                                    <div class="flex items-center justify-between mb-2.5">
                                        <h5 class="text-sm font-semibold">Social Marketing</h5>

                                        <div class="flex items-center text-sm">
                                            <span>+ <span data-target="58,775">0</span></span>

                                            <span class="flex items-center mx-6">
                                                <i class="iconify tabler--circle-filled text-default-200 size-2.5"></i>
                                            </span>

                                            <span>46.13%</span>
                                        </div>
                                    </div>

                                    <!-- Progress Bar -->
                                    <div class="w-full h-1.25 bg-default-100 rounded mb-1.25">
                                        <div class="h-full bg-info rounded-s-sm" style="width: 46.13%" aria-valuenow="27.41" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>

                                <!-- Direct -->
                                <div class="mt-5">
                                    <div class="flex items-center justify-between mb-2.5">
                                        <h5 class="text-sm font-semibold">Direct</h5>

                                        <div class="flex items-center text-sm">
                                            <span>+ <span data-target="33,645">0</span></span>

                                            <span class="flex items-center mx-6">
                                                <i class="iconify tabler--circle-filled text-default-200 size-2.5"></i>
                                            </span>

                                            <span>26.46%</span>
                                        </div>
                                    </div>

                                    <!-- Progress Bar -->
                                    <div class="w-full h-1.25 bg-default-100 rounded mb-1.25">
                                        <div class="h-full bg-success rounded-s-sm" style="width: 26.46%" aria-valuenow="27.41" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>

                                <!-- Milestone Card -->
                                <div class="p-2.5 mt-5 border border-dashed border-default-300 rounded">
                                    <div class="md:flex items-center md:justify-between gap-2.5">
                                        <div class="flex items-center gap-2.5">
                                            <div>
                                                <div class="size-12 flex justify-center items-center rounded-full bg-warning/15 text-warning">
                                                    <i class="iconify tabler--medal text-4xl"></i>
                                                </div>
                                            </div>

                                            <div>
                                                <h5 class="text-md font-semibold">Congratulations !...</h5>
                                                <p class="text-sm text-default-400">You've reached a new subscriber milestone.</p>
                                            </div>
                                        </div>

                                        <div class="ms-auto">
                                            <h4 class="mt-1.25 font-semibold text-md">29.4k</h4>
                                            <span class="text-default-400 font-semibold text-xs">SUBSCRIBERS</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card-->
                    </div>
                    <!-- end row-->

                    <div class="grid xl:grid-cols-4 grid-cols-1 gap-base mb-base">
                        <div class="xl:col-span-3">
                            <div class="card h-full">
                                <div class="card-header justify-between">
                                    <h4 class="card-title">Sessions Overview <span class="text-default-400 text-sm font-normal">(609.5k Sessions)</span></h4>

                                    <div>
                                        <a href="#" class="btn btn-sm border-default-300 hover:border-default-400 hover:bg-default-50"> <i class="iconify tabler--cloud-upload"></i> Export </a>

                                        <a href="#" class="btn btn-sm bg-light hover:text-primary"> <i class="iconify tabler--download"></i> Import </a>
                                    </div>
                                </div>

                                <div class="card-body p-0">
                                    <div class="border-b border-default-300">
                                        <nav class="grid md:grid-cols-4 grid-cols-1" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
                                            <button type="button" class="nav-link hs-tab-active:border-primary py-5 px-4 flex items-center justify-center gap-x-2.5 border-b border-transparent text-start active" id="session-users" aria-selected="true" data-hs-tab="#tab-users-tab" aria-controls="users-tab" role="tab">
                                                <div>
                                                    <div class="size-9 flex justify-center items-center rounded-full bg-info/15 text-info">
                                                        <i class="iconify tabler--users text-xl"></i>
                                                    </div>
                                                </div>

                                                <span class="flex flex-col">
                                                    <span class="text-default-400 font-medium">Users</span>
                                                    <p class="text-lg font-semibold text-default-900">
                                                        <span data-target="39.03">39.03</span>k
                                                        <span class="text-success text-sm ms-2.5 inline-flex items-center"> <i class="iconify tabler--arrow-up align-middle"></i> 3.02% </span>
                                                    </p>
                                                </span>
                                            </button>

                                            <button type="button" class="nav-link hs-tab-active:border-primary py-5 px-4 flex items-center justify-center gap-x-2.5 border-b border-transparent text-start" id="total-sessions" aria-selected="false" data-hs-tab="#tab-total-sessions" aria-controls="total-sessions" role="tab">
                                                <div>
                                                    <div class="size-9 flex justify-center items-center rounded-full bg-info/15 text-info">
                                                        <i class="iconify tabler--eye text-xl"></i>
                                                    </div>
                                                </div>
                                                <span class="flex flex-col">
                                                    <span class="text-default-400 font-medium">Sessions</span>
                                                    <p class="text-lg font-semibold text-default-900">
                                                        <span data-target="42.15">42.15</span>k
                                                        <span class="text-danger text-sm ms-2.5 inline-flex items-center"> <i class="iconify tabler--arrow-down align-middle"></i> 4.78% </span>
                                                    </p>
                                                </span>
                                            </button>

                                            <button type="button" class="nav-link hs-tab-active:border-primary py-5 px-4 flex items-center justify-center gap-x-2.5 border-b border-transparent text-start" id="session-bounce-rate" aria-selected="false" data-hs-tab="#tab-session-bounce-rate" aria-controls="session-bounce-rate" role="tab">
                                                <div>
                                                    <div class="size-9 flex justify-center items-center rounded-full bg-info/15 text-info">
                                                        <i class="iconify tabler--trending-up text-xl"></i>
                                                    </div>
                                                </div>
                                                <span class="flex flex-col">
                                                    <span class="text-default-400 font-medium">Bounce Rate</span>
                                                    <p class="text-lg font-semibold text-default-900">
                                                        <span data-target="21.20">21.20</span>k
                                                        <span class="text-danger text-sm ms-2.5 inline-flex items-center"> <i class="iconify tabler--arrow-down align-middle"></i> 31.39% </span>
                                                    </p>
                                                </span>
                                            </button>

                                            <button type="button" class="nav-link hs-tab-active:border-primary py-5 px-4 flex items-center justify-center gap-x-2.5 border-b border-transparent text-start" id="session-duration" aria-selected="false" data-hs-tab="#tab-session-duration" aria-controls="session-duration" role="tab">
                                                <div>
                                                    <div class="size-9 flex justify-center items-center rounded-full bg-info/15 text-info">
                                                        <i class="iconify tabler--clock text-xl"></i>
                                                    </div>
                                                </div>
                                                <span class="flex flex-col">
                                                    <span class="text-default-400 font-medium">Session Duration</span>
                                                    <p class="text-lg font-semibold text-default-900">
                                                        <span>3m 12s</span>
                                                        <span class="text-success text-sm ms-2.5 inline-flex items-center"> <i class="iconify tabler--arrow-up align-middle"></i> 7.92% </span>
                                                    </p>
                                                </span>
                                            </button>
                                        </nav>
                                    </div>

                                    <div class="p-5">
                                        <div id="sessions-overview-users" class="apex-charts"></div>
                                    </div>
                                </div>
                                <!-- end card-body -->
                            </div>
                            <!-- end card-->
                        </div>

                        <div class="card h-full">
                            <div class="card-header justify-between">
                                <h4 class="card-title">Audience Insights</h4>
                                <div class="hs-dropdown [--placement:bottom-right] ms-auto">
                                    <a href="#" class="hs-dropdown-toggle btn btn-sm btn-icon border-default-300 hover:text-primary">
                                        <i class="iconify tabler--dots-vertical text-base"></i>
                                    </a>
                                    <ul class="hs-dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="#"> <i class="iconify tabler--chart-bar me-1"></i> View Detailed Report </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#"> <i class="iconify tabler--download me-1"></i> Export Analytics </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#"> <i class="iconify tabler--filter-2 me-1"></i> Apply Filters </a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider" />
                                        </li>
                                        <li>
                                            <a class="dropdown-item text-danger" href="#"> <i class="iconify tabler--trash me-1"></i> Remove Widget </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="card-body p-0">
                                <div class="grid grid-cols-2">
                                    <div class="col">
                                        <div class="border-b p-3 border-e border-dashed border-default-300">
                                            <h3 class="mb-0 flex gap-2.5 items-center justify-center text-xl">
                                                <i class="iconify tabler--users"></i>
                                                <span id="active-users-count" class="font-normal">125</span>
                                            </h3>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="border-b p-3 border-e border-dashed border-default-300">
                                            <h3 class="mb-0 flex gap-2.5 items-center justify-center text-xl">
                                                <i class="iconify tabler--device-analytics"></i>
                                                <span id="active-views-count" class="font-normal">125</span>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row-->
                            </div>

                            <div class="card-body">
                                <div id="total-users-chart" class="apex-charts"></div>

                                <div class="table-responsive overflow-x-auto mt-2.5">
                                    <table class="table table-sm whitespace-nowrap table-borderless">
                                        <thead class="bg-light/50">
                                            <tr class="uppercase text-2xs">
                                                <th>Page</th>
                                                <th>Views</th>
                                                <th>B. Rate</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>
                                                    <a href="javascript:void(0);" class="text-default-400">/dashboard-analytics</a>
                                                </td>
                                                <td>25</td>
                                                <td>87.5%</td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <a href="javascript:void(0);" class="text-default-400">/dashboard-crm</a>
                                                </td>
                                                <td>15</td>
                                                <td>21.48%</td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <a href="javascript:void(0);" class="text-default-400">/ubold/dashboard</a>
                                                </td>
                                                <td>10</td>
                                                <td>63.59%</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- end .table-responsive-->
                                <div class="text-center mt-2">
                                    <a href="#" class="btn btn-sm bg-secondary hover:bg-secondary-hover text-white font-semibold">View All <i class="iconify tabler--arrow-right"></i></a>
                                </div>
                            </div>
                            <!-- end card-body-->
                        </div>
                        <!-- end card-->
                    </div>

                    <div class="grid xl:grid-cols-12 grid-cols-1 gap-base mb-base">
                        <div class="xl:col-span-7">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title flex items-center gap-2">
                                        User Geography Intelligence

                                        <div class="hs-tooltip [--placement:top]">
                                            <button type="button" class="hs-tooltip-toggle">
                                                <i class="iconify tabler--info-circle text-default-400 mt-2"></i>
                                                <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-default-800 text-xs font-medium text-default-50 rounded-md" role="tooltip">
                                                    Deep insight into user<br />
                                                    distribution across the globe.
                                                </span>
                                            </button>
                                        </div>
                                    </h4>

                                    <div class="hs-dropdown [--placement:bottom-right] ms-auto">
                                        <button class="hs-dropdown-toggle btn btn-sm btn-icon border-default-300 hover:text-primary">
                                            <i class="iconify tabler--dots-vertical text-base"></i>
                                        </button>
                                        <ul class="hs-dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="#"><i class="iconify tabler--map me-1"></i> Open Geo Visualization</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#"><i class="iconify tabler--download me-1"></i> Export Geo Metrics</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#"><i class="iconify tabler--filter-2 me-1"></i> Country Filters</a>
                                            </li>
                                            <li>
                                                <hr class="dropdown-divider" />
                                            </li>
                                            <li>
                                                <a class="dropdown-item text-danger" href="#"><i class="iconify tabler--trash me-1"></i> Remove Widget</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="card-body pt-0">
                                    <div class="grid md:grid-cols-12 grid-cols-1 items-center md:gap-base">
                                        <div class="md:col-span-7">
                                            <div id="session-by-countries" style="height: 300px" width="515"></div>
                                        </div>

                                        <div class="md:col-span-5">
                                            <div class="md:p-5 p-2.5">
                                                <!-- Country Data -->
                                                <div class="flex justify-between items-center">
                                                    <p class="flex items-center mb-1.25">
                                                        <img src="assets/images/flags/us.svg" alt="user-image" class="me-1.25 size-5 rounded-full" />
                                                        <span class="align-middle">United States</span>
                                                    </p>
                                                    <div>
                                                        <h5 class="font-semibold">67.5k</h5>
                                                    </div>
                                                </div>

                                                <div class="flex items-center gap-2.5 mb-5">
                                                    <!-- Progress -->
                                                    <div class="flex-1">
                                                        <div class="h-1.25 w-full rounded-full bg-default-100 overflow-hidden">
                                                            <div class="h-full rounded-e-none bg-secondary" style="width: 72.15%" role="progressbar" aria-valuenow="72.15" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>

                                                    <!-- Percentage -->
                                                    <div>
                                                        <p class="text-sm text-default-400">72.15%</p>
                                                    </div>
                                                </div>

                                                <!-- Country Data -->
                                                <div class="flex justify-between items-center">
                                                    <p class="flex items-center mb-1.25">
                                                        <img src="assets/images/flags/in.svg" alt="user-image" class="me-1.25 size-5 rounded-full" />
                                                        <span class="align-middle">India</span>
                                                    </p>
                                                    <div>
                                                        <h5 class="font-semibold">7.92k</h5>
                                                    </div>
                                                </div>

                                                <div class="flex items-center gap-2.5 mb-5">
                                                    <!-- Progress -->
                                                    <div class="flex-1">
                                                        <div class="h-1.25 w-full rounded-full bg-default-100 overflow-hidden">
                                                            <div class="h-full rounded-e-none bg-info" style="width: 28.65%" role="progressbar" aria-valuenow="28.65" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>

                                                    <!-- Percentage -->
                                                    <div>
                                                        <p class="text-sm text-default-400">28.65%</p>
                                                    </div>
                                                </div>

                                                <!-- Country Data -->
                                                <div class="flex justify-between items-center">
                                                    <p class="flex items-center mb-1.25">
                                                        <img src="assets/images/flags/br.svg" alt="user-image" class="me-1.25 size-5 rounded-full" />
                                                        <span class="align-middle">Brazil</span>
                                                    </p>
                                                    <div>
                                                        <h5 class="font-semibold">89.05k</h5>
                                                    </div>
                                                </div>

                                                <div class="flex items-center gap-2.5 mb-5">
                                                    <!-- Progress -->
                                                    <div class="flex-1">
                                                        <div class="h-1.25 w-full rounded-full bg-default-100 overflow-hidden">
                                                            <div class="h-full rounded-e-none bg-warning" style="width: 62.5%" role="progressbar" aria-valuenow="62.5" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>

                                                    <!-- Percentage -->
                                                    <div>
                                                        <p class="text-sm text-default-400">62.5%</p>
                                                    </div>
                                                </div>

                                                <!-- Country Data -->
                                                <div class="flex justify-between items-center">
                                                    <p class="flex items-center mb-1.25">
                                                        <img src="assets/images/flags/ca.svg" alt="user-image" class="me-1.25 size-5 rounded-full" />
                                                        <span class="align-middle">Canada</span>
                                                    </p>
                                                    <div>
                                                        <h5 class="font-semibold">5.3k</h5>
                                                    </div>
                                                </div>

                                                <div class="flex items-center gap-2.5">
                                                    <!-- Progress -->
                                                    <div class="flex-1">
                                                        <div class="h-1.25 w-full rounded-full bg-default-100 overflow-hidden">
                                                            <div class="h-full rounded-e-none bg-success" style="width: 42.2%" role="progressbar" aria-valuenow="42.2" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>

                                                    <!-- Percentage -->
                                                    <div>
                                                        <p class="text-sm text-default-400">42.2%</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card-body-->
                            </div>
                            <!-- end card-->
                        </div>
                        <!-- end col-->

                        <div class="xl:col-span-5">
                            <div class="card h-full">
                                <div class="card-header justify-between">
                                    <h4 class="card-title flex items-center gap-2">
                                        Top Traffic Sources

                                        <div class="hs-tooltip [--placement:top]">
                                            <button type="button" class="hs-tooltip-toggle">
                                                <i class="iconify tabler--info-circle text-default-400 mt-2"></i>
                                                <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-default-800 text-xs font-medium text-default-50 rounded-md" role="tooltip">
                                                    Shows which channels drive<br />
                                                    the most traffic.
                                                </span>
                                            </button>
                                        </div>
                                    </h4>

                                    <div class="hs-dropdown [--placement:bottom-right] ms-auto">
                                        <a href="#" class="hs-dropdown-toggle btn btn-sm btn-icon border-default-300">
                                            <i class="iconify tabler--dots-vertical text-base"></i>
                                        </a>
                                        <ul class="hs-dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="#"> <i class="iconify tabler--chart-bar me-1"></i> View Detailed Report </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#"> <i class="iconify tabler--download me-1"></i> Export Traffic Data </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#"> <i class="iconify tabler--filter-2 me-1"></i> Filter by Source </a>
                                            </li>
                                            <li>
                                                <hr class="dropdown-divider" />
                                            </li>
                                            <li>
                                                <a class="dropdown-item text-danger" href="#"> <i class="iconify tabler--trash me-1"></i> Remove Widget </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="grid md:grid-cols-2 grid-cols-1 gap-base">
                                        <div>
                                            <div class="relative h-10 bg-warning/10 w-full mb-5">
                                                <div class="absolute size-full px-3.75 z-10 flex justify-between items-center">
                                                    <div class="flex items-center">
                                                        <img src="assets/images/logos/google.svg" alt="user-image" class="me-1.25 h-6" />
                                                        <span class="font-semibold text-md">Google</span>
                                                    </div>
                                                    <span class="font-semibold text-sm text-default-400 text-end">87.8k</span>
                                                </div>
                                                <div class="h-full absolute flex overflow-hidden bg-warning/20" style="width: 72%"></div>
                                            </div>

                                            <div class="relative h-10 bg-danger/10 w-full mb-5">
                                                <div class="absolute size-full px-3.75 z-10 flex justify-between items-center">
                                                    <div class="flex items-center">
                                                        <img src="assets/images/logos/instagram.svg" alt="user-image" class="me-1.25 h-6" />
                                                        <span class="font-semibold text-md">Instagram</span>
                                                    </div>
                                                    <span class="font-semibold text-sm text-default-400 text-end">42.9k</span>
                                                </div>
                                                <div class="h-full absolute flex overflow-hidden bg-danger/20" style="width: 30%"></div>
                                            </div>

                                            <div class="relative h-10 bg-info/10 w-full mb-5">
                                                <div class="absolute size-full px-3.75 z-10 flex justify-between items-center" class="flex items-center">
                                                    <div class="flex items-center">
                                                        <img src="assets/images/logos/linkedin.svg" alt="user-image" class="me-1.25 h-6" />
                                                        <span class="font-semibold text-md">LinkedIn</span>
                                                    </div>
                                                    <span class="font-semibold text-sm text-default-400 text-end">58.5k</span>
                                                </div>
                                                <div class="h-full absolute flex overflow-hidden bg-info/20" style="width: 43%"></div>
                                            </div>

                                            <div class="relative h-10 bg-secondary/10 w-full mb-5">
                                                <div class="absolute size-full px-3.75 z-10 flex justify-between items-center" class="flex items-center">
                                                    <div class="flex items-center">
                                                        <img src="assets/images/logos/dribbble.svg" alt="user-image" class="me-1.25 h-6" />
                                                        <span class="font-semibold text-md">Dribbble</span>
                                                    </div>
                                                    <span class="font-semibold text-sm text-default-400 text-end">2.85k</span>
                                                </div>
                                                <div class="h-full absolute flex overflow-hidden bg-secondary/20" style="width: 12%"></div>
                                            </div>

                                            <div class="relative h-10 bg-primary/10 w-full">
                                                <div class="absolute size-full px-3.75 z-10 flex justify-between items-center">
                                                    <div class="flex items-center">
                                                        <img src="assets/images/logos/messenger.svg" alt="user-image" class="me-1.25 h-6" />
                                                        <span class="font-semibold text-md">Messenger</span>
                                                    </div>
                                                    <span class="font-semibold text-sm text-default-400 text-end">9.08k</span>
                                                </div>
                                                <div class="h-full absolute flex overflow-hidden bg-primary/20" style="width: 18%"></div>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="relative h-10 bg-primary/10 w-full mb-5">
                                                <div class="absolute size-full px-3.75 z-10 flex justify-between items-center">
                                                    <div class="flex items-center">
                                                        <img src="assets/images/logos/meta.svg" alt="user-image" class="me-1.25 h-4.5" />
                                                        <span class="font-semibold text-md">Meta</span>
                                                    </div>
                                                    <span class="font-semibold text-sm text-default-400 text-end">77.7k</span>
                                                </div>
                                                <div class="h-full absolute flex overflow-hidden bg-primary/20" style="width: 66%"></div>
                                            </div>

                                            <div class="relative h-10 bg-success/10 w-full mb-5">
                                                <div class="absolute size-full px-3.75 z-10 flex justify-between items-center">
                                                    <div class="flex items-center">
                                                        <img src="assets/images/logos/telegram.svg" alt="user-image" class="me-1.25 h-6" />
                                                        <span class="font-semibold text-md">Telegram</span>
                                                    </div>
                                                    <span class="font-semibold text-sm text-default-400 text-end">31.5k</span>
                                                </div>
                                                <div class="h-full absolute flex overflow-hidden bg-success/20" style="width: 46%"></div>
                                            </div>

                                            <div class="relative h-10 bg-dark/10 w-full mb-5">
                                                <div class="absolute size-full px-3.75 z-10 flex justify-between items-center">
                                                    <div class="flex items-center">
                                                        <img src="assets/images/logos/x.svg" alt="user-image" class="me-1.25 h-4" />
                                                        <span class="font-semibold text-md">Twitter X</span>
                                                    </div>
                                                    <span class="font-semibold text-sm text-default-400 text-end">22.6k</span>
                                                </div>
                                                <div class="h-full absolute flex overflow-hidden bg-dark/20" style="width: 29%"></div>
                                            </div>

                                            <div class="relative h-10 bg-danger/10 w-full mb-5">
                                                <div class="absolute size-full px-3.75 z-10 flex justify-between items-center">
                                                    <div class="flex items-center">
                                                        <img src="assets/images/logos/whatsapp.svg" alt="user-image" class="me-1.25 h-6" />
                                                        <span class="font-semibold text-md">WhatsApp</span>
                                                    </div>
                                                    <span class="font-semibold text-sm text-default-400 text-end">3.1k</span>
                                                </div>
                                                <div class="h-full absolute flex overflow-hidden bg-danger/20" style="width: 18%"></div>
                                            </div>

                                            <div class="relative h-10 bg-warning/10 w-full">
                                                <div class="absolute size-full px-3.75 z-10 flex justify-between items-center">
                                                    <div class="flex items-center">
                                                        <img src="assets/images/logos/snapchat.svg" alt="user-image" class="me-1.25 h-7" />
                                                        <span class="font-semibold text-md">Snapchat</span>
                                                    </div>
                                                    <span class="font-semibold text-sm text-default-400 text-end">5.8k</span>
                                                </div>
                                                <div class="h-full absolute flex overflow-hidden bg-warning/20" style="width: 9%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="grid xl:grid-cols-4 grid-cols-1 gap-base">
                        <div class="card h-full">
                            <div class="card-header">
                                <h4 class="card-title">Sessions by Browser</h4>

                                <div class="hs-dropdown [--placement:bottom-right] ms-auto">
                                    <button class="hs-dropdown-toggle btn btn-sm btn-default btn-icon">
                                        <i class="iconify tabler--dots-vertical text-base"></i>
                                    </button>

                                    <ul class="hs-dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="#"> <i class="iconify tabler--report me-1"></i> View Browser Report </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#"> <i class="iconify tabler--download me-1"></i> Export Session Data </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#"> <i class="iconify tabler--filter-2 me-1"></i> Filter Browsers </a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider" />
                                        </li>
                                        <li>
                                            <a class="dropdown-item text-danger" href="#"> <i class="iconify tabler--trash me-1"></i> Remove Widget </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="card-body py-2 px-0">
                                <div class="px-2" data-simplebar style="height: 364px">
                                    <div class="flex justify-between items-center p-2.5">
                                        <div class="flex items-center gap-1.25">
                                            <img src="assets/images/browsers/chrome.svg" alt="user-image" class="me-1.25 h-6.5" />
                                            <span class="font-semibold text-md">Chrome</span>
                                        </div>
                                        <span class="font-semibold text-default-400 text-end">62.5%</span>
                                        <span class="font-semibold text-default-400 text-end"><i class="iconify tabler--arrow-down text-danger"></i> 5.06%</span>
                                    </div>

                                    <div class="flex justify-between items-center p-2.5">
                                        <div class="flex items-center gap-1.25">
                                            <img src="assets/images/browsers/firefox.svg" alt="user-image" class="me-1.25 h-6.5" />
                                            <span class="font-semibold text-md">Firefox</span>
                                        </div>
                                        <span class="font-semibold text-default-400 text-end">12.3%</span>
                                        <span class="font-semibold text-default-400 text-end"><i class="iconify tabler--arrow-down text-danger"></i> 1.5%</span>
                                    </div>

                                    <div class="flex justify-between items-center p-2.5">
                                        <div class="flex items-center gap-1.25">
                                            <img src="assets/images/browsers/safari.svg" alt="user-image" class="me-1.25 h-6.5" />
                                            <span class="font-semibold text-md">Safari</span>
                                        </div>
                                        <span class="font-semibold text-default-400 text-end">9.86%</span>
                                        <span class="font-semibold text-default-400 text-end"><i class="iconify tabler--arrow-up text-success"></i> 1.03%</span>
                                    </div>

                                    <div class="flex justify-between items-center p-2.5">
                                        <div class="flex items-center gap-1.25">
                                            <img src="assets/images/browsers/brave.svg" alt="user-image" class="me-1.25 h-6.5" />
                                            <span class="font-semibold text-md">Brave</span>
                                        </div>
                                        <span class="font-semibold text-default-400 text-end">3.15%</span>
                                        <span class="font-semibold text-default-400 text-end"><i class="iconify tabler--arrow-down text-danger"></i> 0.3%</span>
                                    </div>

                                    <div class="flex justify-between items-center p-2.5">
                                        <div class="flex items-center gap-1.25">
                                            <img src="assets/images/browsers/opera.svg" alt="user-image" class="me-1.25 h-6.5" />
                                            <span class="font-semibold text-md">Opera</span>
                                        </div>
                                        <span class="font-semibold text-default-400 text-end">3.01%</span>
                                        <span class="font-semibold text-default-400 text-end"><i class="iconify tabler--arrow-up text-success"></i> 1.58%</span>
                                    </div>

                                    <div class="flex justify-between items-center p-2.5">
                                        <div class="flex items-center gap-1.25">
                                            <img src="assets/images/browsers/tor.svg" alt="user-image" class="me-1.25 h-6.5" />
                                            <span class="font-semibold text-md">Tor</span>
                                        </div>
                                        <span class="font-semibold text-default-400 text-end">2.8%</span>
                                        <span class="font-semibold text-default-400 text-end"><i class="iconify tabler--arrow-up text-success"></i> 0.01%</span>
                                    </div>

                                    <div class="flex justify-between items-center p-2.5">
                                        <div class="flex items-center gap-1.25">
                                            <img src="assets/images/browsers/edge.svg" alt="user-image" class="me-1.25 h-6.5" />
                                            <span class="font-semibold text-md">Edge</span>
                                        </div>
                                        <span class="font-semibold text-default-400 text-end">4.25%</span>
                                        <span class="font-semibold text-default-400 text-end"> <i class="iconify tabler--arrow-up text-success"></i> 0.75% </span>
                                    </div>

                                    <div class="flex justify-between items-center p-2.5">
                                        <div class="flex items-center gap-1.25">
                                            <img src="assets/images/browsers/globe.svg" alt="user-image" class="me-1.25 h-6.5" />
                                            <span class="font-semibold text-md">Other</span>
                                        </div>
                                        <span class="font-semibold text-default-400 text-end">6.38%</span>
                                        <span class="font-semibold text-default-400 text-end"><i class="iconify tabler--arrow-up text-success"></i> 3.6%</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="xl:col-span-3">
                            <div data-table data-table-rows-per-page="5" class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Page Analytics Overview</h4>

                                    <div class="flex items-center gap-2.5">
                                        <!-- Delete Selected -->
                                        <button data-table-delete-selected class="btn bg-danger text-white hover:bg-danger-hover hidden">Delete Selected</button>

                                        <!-- Search -->
                                        <div class="input-icon-group">
                                            <i class="iconify tabler--search input-icon"></i>
                                            <input data-table-search type="text" type="search" placeholder="Search pages..." class="form-input" />
                                        </div>
                                        <!-- Rows Per Page -->
                                        <div>
                                            <select data-table-set-rows-per-page class="form-select form-control my-1 my-md-0">
                                                <option value="5">5 rows</option>
                                                <option value="10" selected>10 rows</option>
                                                <option value="15">15 rows</option>
                                                <option value="20">20 rows</option>
                                                <option value="50">50 rows</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-wrapper table-responsive">
                                    <table class="table text-center table-hover whitespace-nowrap">
                                        <thead class="bg-light/25 thead-sm text-2xs">
                                            <tr class="uppercase table-nowrap">
                                                <th scope="col" style="width: 1%">
                                                    <input data-table-select-all class="form-checkbox form-checkbox-light text-sm" type="checkbox" />
                                                </th>
                                                <th data-table-sort>Page Path</th>
                                                <th data-table-sort>Top Referral Source</th>
                                                <th data-table-sort>Page Views</th>
                                                <th data-table-sort>Avg Time on Page</th>
                                                <th data-table-sort>Bounce Rate</th>
                                                <th data-table-sort>Conversion Rate</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <!-- Row 1 -->
                                            <tr class="text-start">
                                                <td><input class="form-checkbox form-checkbox-light" type="checkbox" /></td>
                                                <td>/dashboard</td>
                                                <td>Direct</td>
                                                <td><i class="iconify tabler--eye me-1.25"></i> 3,980</td>
                                                <td><i class="iconify tabler--clock me-1.25"></i> 02m:12s</td>
                                                <td>19.5%</td>
                                                <td>4.3%</td>
                                                <td>
                                                    <div class="flex items-center justify-center gap-1.25">
                                                        <a href="javascript:void(0);" data-table-delete-row class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-900">
                                                            <i class="iconify tabler--trash text-base"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Row 2 -->
                                            <tr class="text-start">
                                                <td><input class="form-checkbox form-checkbox-light" type="checkbox" /></td>
                                                <td>/pricing</td>
                                                <td>Google</td>
                                                <td><i class="iconify tabler--eye me-1.25"></i> 1,742</td>
                                                <td><i class="iconify tabler--clock me-1.25"></i> 01m:49s</td>
                                                <td>22.1%</td>
                                                <td>6.7%</td>
                                                <td>
                                                    <div class="flex items-center justify-center gap-1.25">
                                                        <a href="javascript:void(0);" data-table-delete-row class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-900">
                                                            <i class="iconify tabler--trash text-base"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Row 3 -->
                                            <tr class="text-start">
                                                <td><input class="form-checkbox form-checkbox-light" type="checkbox" /></td>
                                                <td>/features</td>
                                                <td>LinkedIn</td>
                                                <td><i class="iconify tabler--eye me-1.25"></i> 2,310</td>
                                                <td><i class="iconify tabler--clock me-1.25"></i> 02m:05s</td>
                                                <td>17.8%</td>
                                                <td>5.4%</td>
                                                <td>
                                                    <div class="flex items-center justify-center gap-1.25">
                                                        <a href="javascript:void(0);" data-table-delete-row class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-900">
                                                            <i class="iconify tabler--trash text-base"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Row 4 -->
                                            <tr class="text-start">
                                                <td><input class="form-checkbox form-checkbox-light" type="checkbox" /></td>
                                                <td>/blog/how-to-boost-sales</td>
                                                <td>Twitter</td>
                                                <td><i class="iconify tabler--eye me-1.25"></i> 1,128</td>
                                                <td><i class="iconify tabler--clock me-1.25"></i> 03m:14s</td>
                                                <td>14.9%</td>
                                                <td>2.2%</td>
                                                <td>
                                                    <div class="flex items-center justify-center gap-1.25">
                                                        <a href="javascript:void(0);" data-table-delete-row class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-900">
                                                            <i class="iconify tabler--trash text-base"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Row 5 -->
                                            <tr class="text-start">
                                                <td><input class="form-checkbox form-checkbox-light" type="checkbox" /></td>
                                                <td>/docs/get-started</td>
                                                <td>Reddit</td>
                                                <td><i class="iconify tabler--eye me-1.25"></i> 2,540</td>
                                                <td><i class="iconify tabler--clock me-1.25"></i> 04m:01s</td>
                                                <td>11.2%</td>
                                                <td>7.9%</td>
                                                <td>
                                                    <div class="flex items-center justify-center gap-1.25">
                                                        <a href="javascript:void(0);" data-table-delete-row class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-900">
                                                            <i class="iconify tabler--trash text-base"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Row 6 -->
                                            <tr class="text-start">
                                                <td><input class="form-checkbox form-checkbox-light" type="checkbox" /></td>
                                                <td>/signup</td>
                                                <td>Newsletter</td>
                                                <td><i class="iconify tabler--eye me-1.25"></i> 3,780</td>
                                                <td><i class="iconify tabler--clock me-1.25"></i> 02m:29s</td>
                                                <td>28.5%</td>
                                                <td>9.1%</td>
                                                <td>
                                                    <div class="flex items-center justify-center gap-1.25">
                                                        <a href="javascript:void(0);" data-table-delete-row class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-900">
                                                            <i class="iconify tabler--trash text-base"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Row 7 -->
                                            <tr class="text-start">
                                                <td><input class="form-checkbox form-checkbox-light" type="checkbox" /></td>
                                                <td>/account/settings</td>
                                                <td>Instagram</td>
                                                <td><i class="iconify tabler--eye me-1.25"></i> 1,690</td>
                                                <td><i class="iconify tabler--clock me-1.25"></i> 01m:36s</td>
                                                <td>16.3%</td>
                                                <td>3.9%</td>
                                                <td>
                                                    <div class="flex items-center justify-center gap-1.25">
                                                        <a href="javascript:void(0);" data-table-delete-row class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-900">
                                                            <i class="iconify tabler--trash text-base"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Row 8-->
                                            <tr class="text-start">
                                                <td><input class="form-checkbox form-checkbox-light" type="checkbox" /></td>
                                                <td>/reports/weekly-performance</td>
                                                <td>Direct</td>
                                                <td><i class="iconify tabler--eye me-1.25"></i> 2,245</td>
                                                <td><i class="iconify tabler--clock me-1.25"></i> 02m:08s</td>
                                                <td>17.2%</td>
                                                <td>4.1%</td>
                                                <td>
                                                    <div class="flex items-center justify-center gap-1.25">
                                                        <a href="javascript:void(0);" data-table-delete-row class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-900">
                                                            <i class="iconify tabler--trash text-base"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Row 9-->
                                            <tr class="text-start">
                                                <td><input class="form-checkbox form-checkbox-light" type="checkbox" /></td>
                                                <td>/help/faq</td>
                                                <td>Google</td>
                                                <td><i class="iconify tabler--eye me-1.25"></i> 3,015</td>
                                                <td><i class="iconify tabler--clock me-1.25"></i> 01m:23s</td>
                                                <td>23.9%</td>
                                                <td>2.8%</td>
                                                <td>
                                                    <div class="flex items-center justify-center gap-1.25">
                                                        <a href="javascript:void(0);" data-table-delete-row class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-900">
                                                            <i class="iconify tabler--trash text-base"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Row 10-->
                                            <tr class="text-start">
                                                <td><input class="form-checkbox form-checkbox-light" type="checkbox" /></td>
                                                <td>/products</td>
                                                <td>Instagram</td>
                                                <td><i class="iconify tabler--eye me-1.25"></i> 4,680</td>
                                                <td><i class="iconify tabler--clock me-1.25"></i> 02m:51s</td>
                                                <td>18.4%</td>
                                                <td>6.3%</td>
                                                <td>
                                                    <div class="flex items-center justify-center gap-1.25">
                                                        <a href="javascript:void(0);" data-table-delete-row class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-900">
                                                            <i class="iconify tabler--trash text-base"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Row 11-->
                                            <tr class="text-start">
                                                <td><input class="form-checkbox form-checkbox-light" type="checkbox" /></td>
                                                <td>/downloads</td>
                                                <td>Referral</td>
                                                <td><i class="iconify tabler--eye me-1.25"></i> 1,395</td>
                                                <td><i class="iconify tabler--clock me-1.25"></i> 03m:22s</td>
                                                <td>13.6%</td>
                                                <td>7.4%</td>
                                                <td>
                                                    <div class="flex items-center justify-center gap-1.25">
                                                        <a href="javascript:void(0);" data-table-delete-row class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-900">
                                                            <i class="iconify tabler--trash text-base"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Row 12-->
                                            <tr class="text-start">
                                                <td><input class="form-checkbox form-checkbox-light" type="checkbox" /></td>
                                                <td>/contact</td>
                                                <td>Facebook</td>
                                                <td><i class="iconify tabler--eye me-1.25"></i> 2,920</td>
                                                <td><i class="iconify tabler--clock me-1.25"></i> 01m:41s</td>
                                                <td>21.7%</td>
                                                <td>3.6%</td>
                                                <td>
                                                    <div class="flex items-center justify-center gap-1.25">
                                                        <a href="javascript:void(0);" data-table-delete-row class="btn border-default-300 hover:border-default-400 btn-icon btn-sm text-default-900">
                                                            <i class="iconify tabler--trash text-base"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="card-footer">
                                    <div data-table-pagination-info="entries"></div>
                                    <div data-table-pagination></div>
                                </div>
                            </div>
                        </div>
                        <!-- end col-->
                    </div>
                    <!-- row-->
                </div>
            </main>

            <?php include('./partials/footer.php'); ?>
        </div>
        <!-- End Page content -->
    </div>

    <?php include('./partials/customizer.php'); ?>

    <?php include('./partials/footer-scripts.php'); ?>

    <!-- Apex Chart js -->
    <script src="assets/plugins/apexcharts/apexcharts.min.js"></script>

    <!-- Vector Map Js -->
    <script src="assets/plugins/jsvectormap/jsvectormap.min.js"></script>
    <script src="assets/js/maps/world-merc.js"></script>
    <script src="assets/js/maps/world.js"></script>

    <!-- Custom table -->
    <script src="assets/js/pages/custom-table.js"></script>

    <!-- Dashboard js -->
    <script src="assets/js/pages/dashboard-analytics.js"></script>
</body>

</html>