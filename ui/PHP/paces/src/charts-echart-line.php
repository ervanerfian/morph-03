<!doctype html>
<html lang="en">

<head>
    <?php $title = "Line Echart"; include('partials/title-meta.php'); ?>

    <?php include('./partials/head-css.php'); ?>
</head>

<body>
    <div class="wrapper">
        <?php $subtitle = "Charts"; $title = "Line Echart"; include('./partials/topbar.php'); ?>

        <?php include('./partials/sidenav.php'); ?>

        <!-- Start Page Content here -->
        <div class="page-content">
            <main>

                <?php $subtitle = "Charts"; $title = "Line Echart"; include('./partials/page-title.php'); ?>

                <div class="container-fluid">
                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-base">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Line Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-line" style="min-height: 300px"></div>
                            </div>
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Line Stacked Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-line-stacked" style="min-height: 300px"></div>
                            </div>
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Line Marker</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-line-marker" style="min-height: 300px"></div>
                            </div>
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Dynamic Line</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-dynamic-line" style="min-height: 300px"></div>
                            </div>
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Step Line</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-step-line" style="min-height: 300px"></div>
                            </div>
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Line Y Category</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-line-y-category" style="min-height: 300px"></div>
                            </div>
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

    <!-- E Charts js -->
    <script src="assets/plugins/echarts/echarts.min.js"></script>

    <!-- E Charts Demo js -->
    <script src="assets/js/pages/chart-echart-line.js"></script>
</body>

</html>