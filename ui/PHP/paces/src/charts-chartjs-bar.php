<!doctype html>
<html lang="en">

<head>
    <?php $title = "Bar Charts"; include('partials/title-meta.php'); ?>

    <?php include('./partials/head-css.php'); ?>
</head>

<body>
    <div class="wrapper">
        <?php $subtitle = "Charts"; $title = "Bar Charts"; include('./partials/topbar.php'); ?>

        <?php include('./partials/sidenav.php'); ?>

        <!-- Start Page Content here -->
        <div class="page-content">
            <main>

                <?php $subtitle = "Charts"; $title = "Bar Charts"; include('./partials/page-title.php'); ?>

                <div class="container-fluid">
                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-base">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Basic Bar</h5>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div class="mt-3" style="height: 300px">
                                        <canvas id="basic-bar-chart"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body-->
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Border Radius</h5>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div class="mt-3" style="height: 300px">
                                        <canvas id="border-radius-bar-chart"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body-->
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Floating</h5>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div class="mt-3" style="height: 300px">
                                        <canvas id="floating-bar-chart"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body-->
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Horizontal</h5>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div class="mt-3" style="height: 300px">
                                        <canvas id="horizontal-bar-chart"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body-->
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Stacked</h5>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div class="mt-3" style="height: 300px">
                                        <canvas id="stacked-bar-chart"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body-->
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Stacked with Groups</h5>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div class="mt-3" style="height: 300px">
                                        <canvas id="stacked-groups-bar-chart"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body-->
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Vertical</h5>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div class="mt-3" style="height: 300px">
                                        <canvas id="vertical-bar-chart"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body-->
                        </div>
                        <!-- end card -->
                    </div>
                </div>
            </main>

            <?php include('./partials/footer.php'); ?>
        </div>
        <!-- End Page content -->
    </div>

    <?php include('./partials/customizer.php'); ?>

    <?php include('./partials/footer-scripts.php'); ?>

    <!-- ChartJs Plugin Js -->
    <script src="assets/plugins/chartjs/chart.umd.js"></script>

    <!-- Area chart Demo js -->
    <script src="assets/js/pages/chartjs-bar.js"></script>
</body>

</html>