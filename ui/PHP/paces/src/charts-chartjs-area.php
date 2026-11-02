<!doctype html>
<html lang="en">

<head>
    <?php $title = "Area Charts"; include('partials/title-meta.php'); ?>

    <?php include('./partials/head-css.php'); ?>
</head>

<body>
    <div class="wrapper">
        <?php $subtitle = "Charts"; $title = "Area Charts"; include('./partials/topbar.php'); ?>

        <?php include('./partials/sidenav.php'); ?>

        <!-- Start Page Content here -->
        <div class="page-content">
            <main>

                <?php $subtitle = "Charts"; $title = "Area Charts"; include('./partials/page-title.php'); ?>

                <div class="container-fluid">
                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-base">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Basic Area</h5>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div class="mt-3" style="height: 300px">
                                        <canvas id="basic-area-chart"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body-->
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Different Dataset</h5>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div class="mt-3" style="height: 300px">
                                        <canvas id="different-dataset-area-chart"></canvas>
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
                                        <canvas id="stacked-area-chart"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body-->
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Boundaries</h5>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div class="mt-3" style="height: 300px">
                                        <canvas id="boundaries-area-chart"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body-->
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Draw Time</h5>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div class="mt-3" style="height: 300px">
                                        <canvas id="draw-time-chart"></canvas>
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
    <script src="assets/js/pages/chartjs-area.js"></script>
</body>

</html>