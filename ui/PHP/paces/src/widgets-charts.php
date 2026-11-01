<!doctype html>
<html lang="en">

<head>
    <?php $title = "Charts"; include('partials/title-meta.php'); ?>

    <?php include('./partials/head-css.php'); ?>
</head>

<body>
    <div class="wrapper">
        <?php $subtitle = "Widgets"; $title = "Charts"; include('./partials/topbar.php'); ?>

        <?php include('./partials/sidenav.php'); ?>

        <!-- Start Page Content here -->
        <div class="page-content">
            <main>
                <?php $subtitle = "Widgets"; $title = "Charts"; include('./partials/page-title.php'); ?>

                <div class="container-fluid">
                    <div class="grid xl:grid-cols-4 md:grid-cols-2 grid-cols-1 mb-5 gap-base">
                        <!-- Leads Generated -->
                        <div class="card h-full">
                            <div class="card-body">
                                <div class="grid grid-cols-2 gap-base items-center">
                                    <div>
                                        <h5 class="text-default-400 text-sm uppercase text-truncate mb-2" title="Leads Generated">Leads Generated</h5>
                                        <div class="flex items-center gap-2.5 my-5">
                                            <div>
                                                <span class="size-9 bg-light flex justify-center items-center rounded-full">
                                                    <i class="iconify tabler--users size-5.5"></i>
                                                </span>
                                            </div>
                                            <h3 class="text-xl font-bold"><span data-target="48.2">0</span>k</h3>
                                        </div>
                                        <p class="text-default-400 flex items-center">
                                            <span class="text-success me-2.5 flex items-center gap-1.25 text-sm"
                                                >5.12%
                                                <i class="iconify tabler--trending-up ms-1"></i>
                                            </span>
                                            <span class="text-nowrap text-default-400">2.3k Up</span>
                                        </p>
                                    </div>

                                    <div class="text-end">
                                        <div id="leads-generated-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- card-body -->
                        </div>
                        <!-- card -->

                        <!-- Qualified Leads -->
                        <div class="card h-full">
                            <div class="card-body">
                                <div class="grid grid-cols-2 gap-base items-center">
                                    <div>
                                        <h5 class="text-default-400 text-sm uppercase text-truncate mb-2" title="Qualified Leads">Qualified Leads</h5>
                                        <div class="flex items-center gap-2.5 my-5">
                                            <div>
                                                <span class="size-9 bg-light flex justify-center items-center rounded-full">
                                                    <i class="iconify tabler--user-check size-5.5"></i>
                                                </span>
                                            </div>
                                            <h3 class="text-xl font-bold"><span data-target="12.8">0</span>k</h3>
                                        </div>

                                        <p class="text-default-400 flex items-center">
                                            <span class="text-danger me-2.5 flex items-center gap-1.25 text-sm"
                                                >3.45%
                                                <i class="iconify tabler--trending-down ms-1"></i>
                                            </span>
                                            <span class="text-nowrap text-default-400">0.4k Down</span>
                                        </p>
                                    </div>

                                    <div class="flex justify-end">
                                        <div id="qualified-leads-chart" class="text-end"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- card-body -->
                        </div>
                        <!-- card -->

                        <!-- Deals Closed -->
                        <div class="card h-full">
                            <div class="card-body">
                                <div class="grid grid-cols-2 gap-base items-center">
                                    <div>
                                        <h5 class="text-default-400 text-sm uppercase text-truncate mb-2" title="Deals Closed">Deals Closed</h5>
                                        <div class="flex items-center gap-2.5 my-5">
                                            <div>
                                                <span class="size-9 bg-light flex justify-center items-center rounded-full">
                                                    <i class="iconify tabler--briefcase size-5.5"></i>
                                                </span>
                                            </div>
                                            <h3 class="text-xl font-bold"><span data-target="9.75">0</span>k</h3>
                                        </div>

                                        <p class="text-default-400 flex items-center gap-1.25">
                                            <span class="text-success me-2.5 flex items-center gap-1.25 text-sm">2.94% <i class="iconify tabler--trending-up ms-1"></i></span>
                                            <span class="text-nowrap text-default-400">1.1k Up</span>
                                        </p>
                                    </div>

                                    <div class="text-end">
                                        <div id="deals-closed-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- card-body -->
                        </div>
                        <!-- card -->

                        <!-- Revenue Generated -->
                        <div class="card h-full">
                            <div class="card-body">
                                <div class="grid grid-cols-2 gap-base items-center">
                                    <div>
                                        <h5 class="text-default-400 text-sm uppercase text-truncate mb-2" title="Revenue Generated">Revenue Generated</h5>
                                        <div class="flex items-center gap-2.5 my-5">
                                            <div>
                                                <span class="size-9 bg-light flex justify-center items-center rounded-full">
                                                    <i class="iconify tabler--currency-dollar size-5.5"></i>
                                                </span>
                                            </div>
                                            <h3 class="text-xl font-bold">$<span data-target="5.63">0</span>M</h3>
                                        </div>

                                        <p class="text-default-400 flex items-center gap-1.25">
                                            <span class="text-success me-2.5 flex items-center gap-1.25 text-sm">4.21% <i class="iconify tabler--trending-up ms-1"></i></span>
                                            <span class="text-nowrap text-default-400">$32.4k Up</span>
                                        </p>
                                    </div>

                                    <div class="text-end">
                                        <div id="revenue-generated-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- card-body -->
                        </div>
                        <!-- card -->
                    </div>

                    <div class="grid xl:grid-cols-4 md:grid-cols-2 grid-cols-1 mb-5 gap-base">
                        <!-- Revenue Widget -->
                        <div class="card">
                            <div class="card-header flex py-3.75 px-5 border-0 justify-between items-center">
                                <h5 class="card-title mb-0">Total Revenue</h5>
                                <span class="badge bg-success/10 text-success">+8.2%</span>
                            </div>

                            <div class="card-body">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <h3 class="mb-1.25 font-normal text-xl">$<span data-target="1240">0</span>K</h3>
                                        <p class="text-default-400">This Quarter</p>
                                    </div>

                                    <div class="text-end w-1/2">
                                        <div id="total-revenue-chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Expenses Widget -->
                        <div class="card">
                            <div class="card-header flex py-3.75 px-5 border-0 justify-between items-center">
                                <h5 class="card-title mb-0">Total Expenses</h5>
                                <span class="badge bg-danger/10 text-danger">-2.1%</span>
                            </div>
                            <div class="card-body">
                                <div class="flex justify-between items-center">
                                    <div class="text-end w-1/2">
                                        <div id="total-expenses-chart"></div>
                                    </div>
                                    <div class="text-end ms-5">
                                        <h3 class="mb-1.25 font-normal text-xl">$<span data-target="840">0</span>K</h3>
                                        <p class="text-default-400">This Quarter</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Net Profit Widget -->
                        <div class="card">
                            <div class="card-header flex py-3.75 px-5 border-0 justify-between items-center">
                                <h5 class="card-title mb-0">Net Profit</h5>
                                <span class="badge bg-info/10 text-info">Stable</span>
                            </div>
                            <div class="card-body">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <h3 class="mb-1.25 font-normal text-xl">$<span data-target="400">0</span>K</h3>
                                        <p class="text-default-400">This Quarter</p>
                                    </div>
                                    <div class="text-end w-1/2">
                                        <div id="net-profit-chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Cash Flow Widget -->
                        <div class="card">
                            <div class="card-header flex py-3.75 px-5 border-0 justify-between items-center">
                                <h5 class="card-title mb-0">Cash Flow</h5>
                                <span class="badge bg-warning/10 text-warning">+5.6%</span>
                            </div>
                            <div class="card-body">
                                <div class="flex justify-between items-center">
                                    <div class="text-end w-1/2">
                                        <div id="cash-flow-chart"></div>
                                    </div>
                                    <div class="text-end ms-5">
                                        <h3 class="mb-1.25 font-normal text-xl">$<span data-target="720">0</span>K</h3>
                                        <p class="text-default-400">This Quarter</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col-->
                    </div>

                    <div class="grid xl:grid-cols-4 grid-cols-1 mb-5 gap-base">
                        <div class="col-span-1">
                            <div class="card h-full">
                                <div class="card-header justify-between">
                                    <h4 class="card-title">Project Status Breakdown</h4>
                                    <div class="ms-auto">
                                        <div class="hs-dropdown inline-flex [--placement:bottom-right]">
                                            <button type="button" class="hs-dropdown-toggle btn btn-icon size-8 border-default-300 hover:border-default-400/75" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                                <i class="iconify tabler--dots-vertical text-sm"></i>
                                            </button>

                                            <div class="hs-dropdown-menu" role="menu" aria-orientation="vertical">
                                                <div class="space-y-0.5">
                                                    <a href="#" class="dropdown-item">
                                                        <i class="iconify tabler--eye"></i>
                                                        View All Status Details
                                                    </a>

                                                    <a href="#" class="dropdown-item">
                                                        <i class="iconify tabler--filter-2"></i>
                                                        Filter by Status
                                                    </a>

                                                    <a href="#" class="dropdown-item">
                                                        <i class="iconify tabler--calendar"></i>
                                                        Change Date Range
                                                    </a>

                                                    <a href="#" class="dropdown-item">
                                                        <i class="iconify tabler--download"></i>
                                                        Export Breakdown
                                                    </a>

                                                    <div class="border-default-300 my-2.5 border-t"></div>

                                                    <a href="#" class="dropdown-item text-danger!">
                                                        <i class="iconify tabler--refresh"></i>
                                                        Reset Status View
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body pt-0">
                                    <div id="project-status-chart" class="apex-charts"></div>

                                    <div class="grid grid-cols-2 gap-base mt-2.5">
                                        <div>
                                            <div class="flex justify-between items-center p-1.25">
                                                <div>
                                                    <i class="iconify tabler--circle-filled text-xs me-1.25 text-secondary"></i>
                                                    <span class="font-semibold">Completed</span>
                                                </div>
                                                <span class="font-semibold text-default-400 float-end"><i class="iconify tabler--chevron-down text-danger"></i> 965</span>
                                            </div>

                                            <div class="flex justify-between items-center p-1.25">
                                                <div>
                                                    <i class="iconify tabler--circle-filled text-xs me-1.25 text-warning"></i>
                                                    <span class="font-semibold">In Progress</span>
                                                </div>
                                                <span class="font-semibold text-default-400 float-end"><i class="iconify tabler--chevron-up text-success"></i> 75</span>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="flex justify-between items-center p-1.25">
                                                <div>
                                                    <i class="iconify tabler--circle-filled text-xs me-1.25 text-secondary"></i>
                                                    <span class="font-semibold"> Yet to Start</span>
                                                </div>
                                                <span class="font-semibold text-default-400 float-end"><i class="iconify tabler--chevron-up text-success"></i> 102</span>
                                            </div>

                                            <div class="flex justify-between items-center p-1.25">
                                                <div>
                                                    <i class="iconify tabler--circle-filled text-xs me-1.25 text-danger"></i>
                                                    <span class="font-semibold">Cancelled</span>
                                                </div>
                                                <span class="font-semibold text-default-400 float-end"><i class="iconify tabler--chevron-down text-danger"></i> 96</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card-->
                        </div>

                        <div class="xl:col-span-2 col-span-1">
                            <div class="card h-full">
                                <div class="card-header justify-between">
                                    <h4 class="card-title">Projects Performance Overview</h4>
                                    <div class="ms-auto">
                                        <div class="hs-dropdown inline-flex [--placement:bottom-right]">
                                            <button type="button" class="hs-dropdown-toggle btn btn-icon size-8 border-default-300 hover:border-default-400/75" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                                <i class="iconify tabler--dots-vertical text-sm"></i>
                                            </button>

                                            <div class="hs-dropdown-menu" role="menu" aria-orientation="vertical">
                                                <div class="space-y-0.5">
                                                    <a href="#" class="dropdown-item">
                                                        <i class="iconify tabler--chart-histogram"></i>
                                                        View Detailed Report
                                                    </a>

                                                    <a href="#" class="dropdown-item">
                                                        <i class="iconify tabler--filter-2"></i>
                                                        Filter by Status
                                                    </a>

                                                    <a href="#" class="dropdown-item">
                                                        <i class="iconify tabler--calendar"></i>
                                                        Select Date Range
                                                    </a>

                                                    <a href="#" class="dropdown-item">
                                                        <i class="iconify tabler--download"></i>
                                                        Export as CSV
                                                    </a>

                                                    <div class="border-default-300 my-2.5 border-t"></div>

                                                    <a href="#" class="dropdown-item text-danger!">
                                                        <i class="iconify tabler--refresh"></i>
                                                        Reset Analytics
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="grid md:grid-cols-4 grid-cols-2 text-center gap-2.5">
                                        <div class="border bg-light/15 border-dashed border-light p-2.5 rounded">
                                            <h4 class="text-lg mb-2"><span data-target="7,845">0</span></h4>
                                            <p class="text-default-400">Number of Projects</p>
                                        </div>

                                        <div class="border bg-light/15 border-dashed border-light p-2.5 rounded">
                                            <h4 class="text-lg mb-2"><span data-target="289">0</span></h4>
                                            <p class="text-default-400">Active Projects</p>
                                        </div>

                                        <div class="border bg-light/15 border-dashed border-light p-2.5 rounded">
                                            <h4 class="text-lg mb-2">$<span data-target="982.5">0</span>k</h4>
                                            <p class="text-default-400">Revenue</p>
                                        </div>

                                        <div class="border bg-light/15 border-dashed border-light p-2.5 rounded">
                                            <h4 class="text-lg mb-2">~<span data-target="12,559">0</span>h</h4>
                                            <p class="text-default-400">Working Hours</p>
                                        </div>
                                    </div>

                                    <div>
                                        <div id="dash-projects-overviews" class="apex-charts"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card-->
                        </div>

                        <div class="col-span-1">
                            <div class="card h-full">
                                <div class="card-header justify-between">
                                    <h4 class="card-title">Store Performance Analytics</h4>
                                    <div>
                                        <a href="#" class="btn btn-sm btn-default border border-default-300 hover:border-default-500"><i class="iconify tabler--refresh me-1"></i> Refresh</a>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div id="total-sales-chart" class="apex-charts"></div>

                                    <div class="text-center">
                                        <span class="badge border border-light text-dark rounded-full p-1.25 px-2.5 rounded-pill text-xs"><i class="iconify tabler--star-filled text-success me-1.25"></i> GOOD SALES</span>
                                    </div>

                                    <div class="overflow-x-auto mt-3">
                                        <table class="w-full text-2xs whitespace-nowrap">
                                            <thead class="bg-default-100 text-2xs uppercase">
                                                <tr>
                                                    <th class="text-start p-2">Page</th>
                                                    <th class="text-start p-2">Views</th>
                                                    <th class="text-start p-2">B. Rate</th>
                                                </tr>
                                            </thead>

                                            <tbody class="text-sm">
                                                <tr>
                                                    <td class="p-2">
                                                        <a href="javascript:void(0);" class="text-default-500"> /paces/dashboard-analytics </a>
                                                    </td>
                                                    <td class="p-2">25</td>
                                                    <td class="p-2">87.5%</td>
                                                </tr>

                                                <tr>
                                                    <td class="p-2">
                                                        <a href="javascript:void(0);" class="text-default-500"> /paces/dashboard-crm </a>
                                                    </td>
                                                    <td class="p-2">15</td>
                                                    <td class="p-2">21.48%</td>
                                                </tr>

                                                <tr>
                                                    <td class="p-2">
                                                        <a href="javascript:void(0);" class="text-default-500"> /ubold/dashboard </a>
                                                    </td>
                                                    <td class="p-2">10</td>
                                                    <td class="p-2">63.59%</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- end card-->
                        </div>
                    </div>

                    <div class="grid xl:grid-cols-2 grid-cols-1 gap-base">
                        <div class="card h-full">
                            <div class="card-header md:py-0 pt-6 pb-0">
                                <h4 class="card-title">Sales Report<span class="text-default-400 text-sm font-normal ms-1">(25822 Orders)</span></h4>

                                <div>
                                    <nav class="flex gap-x-1" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
                                        <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-primary hs-tab-active:text-primary md:py-4.25 py-3 px-4 inline-flex items-center border-b border-transparent text-sm whitespace-nowrap hover:text-primary focus:outline-hidden focus:text-primary disabled:opacity-50 disabled:pointer-events-none active" id="today" aria-selected="true" data-hs-tab="#today-tab" aria-controls="today-tab" role="tab">Today</button>

                                        <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-primary hs-tab-active:text-primary md:py-4.25 py-3 px-4 inline-flex items-center border-b border-transparent text-sm whitespace-nowrap hover:text-primary focus:outline-hidden focus:text-primary disabled:opacity-50 disabled:pointer-events-none" id="monthly" aria-selected="false" data-hs-tab="#monthly-tab" aria-controls="monthly-tab" role="tab">Monthly</button>

                                        <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-primary hs-tab-active:text-primary md:py-4.25 py-3 px-4 inline-flex items-center border-b border-transparent text-sm whitespace-nowrap hover:text-primary focus:outline-hidden focus:text-primary disabled:opacity-50 disabled:pointer-events-none" id="annual" aria-selected="false" data-hs-tab="#annual-atb" aria-controls="annual-atb" role="tab">Annual</button>
                                    </nav>
                                </div>
                            </div>

                            <div>
                                <div class="bg-light/25 border-b border-default-300 border-dashed">
                                    <div class="grid md:grid-cols-3 grid-cols-2 md:gap-base text-center">
                                        <div>
                                            <p class="text-default-400 mt-5 mb-1.25">Revenue</p>
                                            <h4 class="flex justify-center items-center mb-4 text-lg">
                                                <i class="iconify tabler--wallet text-success me-1.25"></i>
                                                <span>$<span data-target="78,224.68">78,224.68</span></span>
                                            </h4>
                                        </div>

                                        <div>
                                            <p class="text-default-400 mt-5 mb-1.25">Orders</p>
                                            <h4 class="flex justify-center items-center mb-4 text-lg">
                                                <i class="iconify tabler--basket text-success me-1.25"></i>
                                                <span><span data-target="8541">8,541</span></span>
                                            </h4>
                                        </div>

                                        <div>
                                            <p class="text-default-400 mt-5 mb-1.25">Growth Rate</p>
                                            <h4 class="flex justify-center items-center mb-4 text-lg">
                                                <i class="iconify tabler--trending-up text-success me-1.25"></i>
                                                <span><span data-target="25.3">25.30</span>%</span>
                                            </h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-5 pt-1.25 relative">
                                    <div class="absolute text-start start-2/25 p-5 z-10 max-w-87.5 hidden md:block">
                                        <h5 class="text-sm mb-2">Today's Earning: $8,975.30</h5>
                                        <p class="text-default-400 mt-2">Property PS007 is not receiving hits. Either your site is not receiving any sessions.</p>
                                    </div>
                                    <div>
                                        <div id="sales-report-chart" class="apex-charts"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card-->

                        <div class="card h-full">
                            <div class="card-header justify-between">
                                <h4 class="card-title">Financial Overview</h4>
                                <div class="ms-auto">
                                    <div class="ms-auto">
                                        <div class="hs-dropdown inline-flex [--placement:bottom-right]">
                                            <button type="button" class="hs-dropdown-toggle btn btn-icon size-8 border-default-300 hover:border-default-400/75" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                                <i class="iconify tabler--dots-vertical text-sm"></i>
                                            </button>

                                            <div class="hs-dropdown-menu" role="menu" aria-orientation="vertical">
                                                <div class="space-y-0.5">
                                                    <a href="#" class="dropdown-item">
                                                        <i class="iconify tabler--refresh"></i>
                                                        Refresh Data
                                                    </a>

                                                    <a href="#" class="dropdown-item">
                                                        <i class="iconify tabler--chart-bar"></i>
                                                        View Analytics
                                                    </a>

                                                    <a href="#" class="dropdown-item">
                                                        <i class="iconify tabler--filter-2"></i>
                                                        Change Date Range
                                                    </a>

                                                    <a href="#" class="dropdown-item">
                                                        <i class="iconify tabler--download"></i>
                                                        Filter Report
                                                    </a>

                                                    <div class="border-default-300 my-2.5 border-t"></div>

                                                    <a href="#" class="dropdown-item text-danger!">
                                                        <i class="iconify tabler--download"></i>
                                                        Export Data
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="bg-light/25 border-b border-default-300 border-dashed">
                                    <div class="grid md:grid-cols-4 grid-cols-2 gap-base text-center">
                                        <div>
                                            <p class="text-default-400 mt-5 mb-1.25">Revenue</p>
                                            <h4 class="mb-5 flex items-center justify-center text-lg">
                                                <i class="iconify tabler--square-rounded-arrow-down text-success me-1.25 text-lg"></i>
                                                <span class="font-semibold">$<span data-target="29.56">0</span>k</span>
                                            </h4>
                                        </div>

                                        <div>
                                            <p class="text-default-400 mt-5 mb-1.25">Expenses</p>
                                            <h4 class="mb-5 flex items-center justify-center text-lg">
                                                <i class="iconify tabler--square-rounded-arrow-up text-danger me-1.25 text-lg"></i>
                                                <span class="font-semibold">$<span data-target="15.08">0</span>k</span>
                                            </h4>
                                        </div>

                                        <div>
                                            <p class="text-default-400 mt-5 mb-1.25">Investment</p>
                                            <h4 class="mb-5 flex items-center justify-center text-lg">
                                                <i class="iconify tabler--chart-infographic me-1.25 text-lg"></i>
                                                <span class="font-semibold">$<span data-target="3.67">0</span>k</span>
                                            </h4>
                                        </div>

                                        <div>
                                            <p class="text-default-400 mt-5 mb-1.25">Savings</p>
                                            <h4 class="mb-5 flex items-center justify-center text-lg">
                                                <i class="iconify tabler--pig me-1.25 text-lg"></i>
                                                <span class="font-semibold">$<span data-target="6.72">0</span>k</span>
                                            </h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-2.5">
                                    <div>
                                        <div id="financial-overview-chart" class="apex-charts"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card-->
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

    <!-- Apex Chart js -->
    <script src="assets/plugins/apexcharts/apexcharts.min.js"></script>

    <!-- Chart Widgets js -->
    <script src="assets/js/pages/widgets-charts.js"></script>
</body>

</html>