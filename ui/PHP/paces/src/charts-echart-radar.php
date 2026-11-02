<!doctype html>
<html lang="en">

<head>
    <?php $title = "Radar Echart"; include('partials/title-meta.php'); ?>

    <?php include('./partials/head-css.php'); ?>
</head>

<body>
    <div class="wrapper">
        <?php $subtitle = "Charts"; $title = "Radar Echart"; include('./partials/topbar.php'); ?>

        <?php include('./partials/sidenav.php'); ?>

        <!-- Start Page Content here -->
        <div class="page-content">
            <main>

                <?php $subtitle = "Charts"; $title = "Radar Echart"; include('./partials/page-title.php'); ?>

                <div class="container-fluid">
                    <div class="grid xl:grid-cols-2 gap-base">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Basic Radar Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-basic-radar" style="min-height: 300px"></div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Proportion of Browsers</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-radar1" style="min-height: 300px"></div>
                            </div>
                        </div>

                        <div class="col-span-2">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Customized Radar Chart</h4>
                                </div>
                                <div class="card-body">
                                    <div id="chart-radar2" style="min-height: 300px"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-span-2">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Multiple Radar Chart</h4>
                                </div>
                                <div class="card-body">
                                    <div id="chart-radar3" style="min-height: 300px"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
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
    <script src="assets/js/pages/chart-echart-radar.js"></script>
</body>

</html>