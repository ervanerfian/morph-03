<!doctype html>
<html lang="en">

<head>
    <?php $title = "Candlestick Echart"; include('partials/title-meta.php'); ?>

    <?php include('./partials/head-css.php'); ?>
</head>

<body>
    <div class="wrapper">
        <?php $subtitle = "Charts"; $title = "Candlestick Echart"; include('./partials/topbar.php'); ?>

        <?php include('./partials/sidenav.php'); ?>

        <!-- Start Page Content here -->
        <div class="page-content">
            <main>

                <?php $subtitle = "Charts"; $title = "Candlestick Echart"; include('./partials/page-title.php'); ?>

                <div class="container-fluid">
                    <div class="space-y-5">
                        <div>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Basic Candlestick Chart</h4>
                                </div>
                                <div class="card-body">
                                    <div id="chart-basic-candlestick" style="min-height: 400px"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Mixed Candlestick Chart</h4>
                                </div>
                                <div class="card-body">
                                    <div id="chart-mixed-candlestick" style="min-height: 400px"></div>
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
    <script src="assets/js/pages/chart-echart-candlestick.js"></script>
</body>

</html>