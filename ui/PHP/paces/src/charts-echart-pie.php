<!doctype html>
<html lang="en">

<head>
    <?php $title = "Pie Echart"; include('partials/title-meta.php'); ?>

    <?php include('./partials/head-css.php'); ?>
</head>

<body>
    <div class="wrapper">
        <?php $subtitle = "Charts"; $title = "Pie Echart"; include('./partials/topbar.php'); ?>

        <?php include('./partials/sidenav.php'); ?>

        <!-- Start Page Content here -->
        <div class="page-content">
            <main>

                <?php $subtitle = "Charts"; $title = "Pie Echart"; include('./partials/page-title.php'); ?>

                <div class="container-fluid">
                    <div class="grid grid-cols-2 gap-base">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Basic Pie Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="echart-pie-basic" style="min-height: 300px"></div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Doughnut Pie Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="echart-doughnut-pie-basic" style="min-height: 300px"></div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Doughnut Rounded Pie Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="echart-doughnut-rounded-pie-basic" style="min-height: 300px"></div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Multiple Pie Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="echart-pie-multiple-chart" style="min-height: 300px"></div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Pie Label Align Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="echart-pie-label-align-chart" style="min-height: 300px"></div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Nightingale Map</h4>
                            </div>
                            <div class="card-body">
                                <div id="echart-pie-nightingale-chart" style="min-height: 300px"></div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Pie Edge Align Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="echart-pie-edge-align-chart" style="min-height: 300px"></div>
                            </div>
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

    <!-- E Charts js -->
    <script src="assets/plugins/echarts/echarts.min.js"></script>

    <!-- E Charts Demo js -->
    <script src="assets/js/pages/chart-echart-pie.js"></script>
</body>

</html>