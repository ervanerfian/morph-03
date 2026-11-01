<!doctype html>
<html lang="en">

<head>
    <?php $title = "Area Echart"; include('partials/title-meta.php'); ?>

    <?php include('./partials/head-css.php'); ?>
</head>

<body>
    <div class="wrapper">
        <?php $subtitle = "Charts"; $title = "Area Echart"; include('./partials/topbar.php'); ?>

        <?php include('./partials/sidenav.php'); ?>

        <!-- Start Page Content here -->
        <div class="page-content">
            <main>

                <?php $subtitle = "Charts"; $title = "Area Echart"; include('./partials/page-title.php'); ?>

                <div class="container-fluid">
                    <div class="grid xl:grid-cols-2 gap-base">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Area Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-line" style="min-height: 300px"></div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Stacked Area Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-line-stacked" style="min-height: 300px"></div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Area with Marker</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-line-marker" style="min-height: 300px"></div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Dynamic Area</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-dynamic-line" style="min-height: 300px"></div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Step Area</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-step-line" style="min-height: 300px"></div>
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
    <script src="assets/js/pages/chart-echart-area.js"></script>
</body>

</html>