<!doctype html>
<html lang="en">

<head>
    <?php $title = "Other Echart"; include('partials/title-meta.php'); ?>

    <?php include('./partials/head-css.php'); ?>
</head>

<body>
    <div class="wrapper">
        <?php $subtitle = "Charts"; $title = "Other Echart"; include('./partials/topbar.php'); ?>

        <?php include('./partials/sidenav.php'); ?>

        <!-- Start Page Content here -->
        <div class="page-content">
            <main>

                <?php $subtitle = "Charts"; $title = "Other Echart"; include('./partials/page-title.php'); ?>

                <div class="container-fluid">
                    <div class="grid xl:grid-cols-2 gap-base">
                        <div class="card">
                            <div class="card-header border-none">
                                <h4 class="card-title">Pictorialbar Dotted Chart</h4>
                            </div>
                            <div class="card-body p-3 pt-0">
                                <div id="echart-pictorialbar-dotted" class="rounded-md overflow-hidden" style="min-height: 400px"></div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Basic Sunburst Chart</h4>
                            </div>
                            <div class="card-body p-2 pt-0">
                                <div id="echar-basic-sunburst" style="min-height: 399px"></div>
                            </div>
                        </div>

                        <div class="col-span-2">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Nested Pie Chart</h4>
                                </div>
                                <div class="card-body">
                                    <div id="chart-pie-nest" style="min-height: 600px"></div>
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
    <script src="assets/js/pages/chart-echart-other.js"></script>

</body>

</html>