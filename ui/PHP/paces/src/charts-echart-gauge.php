<!doctype html>
<html lang="en">

<head>
    <?php $title = "Gauge Echart"; include('partials/title-meta.php'); ?>

    <?php include('./partials/head-css.php'); ?>
</head>

<body>
    <div class="wrapper">
        <?php $subtitle = "Charts"; $title = "Gauge Echart"; include('./partials/topbar.php'); ?>

        <?php include('./partials/sidenav.php'); ?>

        <!-- Start Page Content here -->
        <div class="page-content">
            <main>

                <?php $subtitle = "Charts"; $title = "Gauge Echart"; include('./partials/page-title.php'); ?>

                <div class="container-fluid">
                    <div class="grid xl:grid-cols-2 gap-base">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Basic Gauge Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-basic-gauge" style="min-height: 300px"></div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Speed Stage Gauge Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-speed-stage-gauge" style="min-height: 300px"></div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Ring Gauge Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-ring-gauge" style="min-height: 300px"></div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Temperature Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-temperature-gauge" style="min-height: 300px"></div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Multi Ring Gauge Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-multiring-gauge" style="min-height: 300px"></div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Multi Gauge Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-multi-gauge" style="min-height: 300px"></div>
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
    <script src="assets/js/pages/chart-echart-gauge.js"></script>
</body>

</html>