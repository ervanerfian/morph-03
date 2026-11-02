<!doctype html>
<html lang="en">

<head>
    <?php $title = "Heatmap Echart"; include('partials/title-meta.php'); ?>

    <?php include('./partials/head-css.php'); ?>
</head>

<body>
    <div class="wrapper">
        <?php $subtitle = "Charts"; $title = "Heatmap Echart"; include('./partials/topbar.php'); ?>

        <?php include('./partials/sidenav.php'); ?>

        <!-- Start Page Content here -->
        <div class="page-content">
            <main>

                <?php $subtitle = "Charts"; $title = "Heatmap Echart"; include('./partials/page-title.php'); ?>

                <div class="container-fluid">
                    <div class="grid xl:grid-cols-2 gap-base">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Heatmap Echart</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-heatmap" style="min-height: 300px"></div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Heatmap Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-heatmap3" style="min-height: 300px"></div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Heatmap - 20K Data Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-heatmap4" style="min-height: 300px"></div>
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
    <script src="assets/js/pages/chart-echart-heatmap.js"></script>
</body>

</html>