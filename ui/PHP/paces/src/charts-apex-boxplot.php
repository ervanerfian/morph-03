<!doctype html>
<html lang="en">

<head>
    <?php $title = "Boxplot Apexchart"; include('partials/title-meta.php'); ?>

    <?php include('./partials/head-css.php'); ?>
</head>

<body>
    <div class="wrapper">
        <?php $subtitle = "Charts"; $title = "Boxplot Apexchart"; include('./partials/topbar.php'); ?>

        <?php include('./partials/sidenav.php'); ?>

        <!-- Start Page Content here -->
        <div class="page-content">
            <main>

                <?php $subtitle = "Charts"; $title = "Boxplot Apexchart"; include('./partials/page-title.php'); ?>

                <div class="container-fluid">
                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-base">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Basic Boxplot</h4>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div id="basic-boxplot" class="apex-charts"></div>
                                </div>
                            </div>
                            <!-- end card body-->
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Scatter Boxplot</h4>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div id="scatter-boxplot" class="apex-charts"></div>
                                </div>
                            </div>
                            <!-- end card body-->
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Horizontal BoxPlot</h4>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div id="horizontal-boxplot" class="apex-charts"></div>
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

    <!-- Apex Chart js -->
    <script src="assets/plugins/apexcharts/apexcharts.min.js"></script>

    <!-- Apex Chart Polar Area Demo js -->
    <script src="assets/js/pages/chart-apex-boxplot.js"></script>
</body>

</html>