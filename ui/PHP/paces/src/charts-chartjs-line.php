<!doctype html>
<html lang="en">

<head>
    <?php $title = "Line Charts"; include('partials/title-meta.php'); ?>

    <?php include('./partials/head-css.php'); ?>
</head>

<body>
    <div class="wrapper">

        <?php $subtitle = "Charts"; $title = "Line Charts"; include('./partials/topbar.php'); ?>

        <?php include('./partials/sidenav.php'); ?>

        <!-- Start Page Content here -->
        <div class="page-content">
            <main>

                <?php $subtitle = "Charts"; $title = "Line Charts"; include('./partials/page-title.php'); ?>

                <div class="container-fluid">
                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-base">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Basic Line</h5>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div class="mt-3" style="height: 300px">
                                        <canvas id="basic-line-chart"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body-->
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Interpolation</h5>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div class="mt-3" style="height: 300px">
                                        <canvas id="interpolation-chart"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body-->
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Multi-Axes</h5>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div class="mt-3" style="height: 300px">
                                        <canvas id="multi-axes-chart"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body-->
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Point Styling</h5>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div class="mt-3" style="height: 300px">
                                        <canvas id="point-styling-chart"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body-->
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Line Segment</h5>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div class="mt-3" style="height: 300px">
                                        <canvas id="line-segment-chart"></canvas>
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
    <script src="assets/js/pages/chartjs-line.js"></script>
</body>

</html>