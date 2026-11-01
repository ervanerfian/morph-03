<!doctype html>
<html lang="en">

<head>
    <?php $title = "Mixed Apexchart"; include('partials/title-meta.php'); ?>

    <?php include('./partials/head-css.php'); ?>
</head>

<body>
    <div class="wrapper">
        <?php $subtitle = "Charts"; $title = "Mixed Apexchart"; include('./partials/topbar.php'); ?>

        <?php include('./partials/sidenav.php'); ?>

        <!-- Start Page Content here -->
        <div class="page-content">
            <main>

                <?php $subtitle = "Charts"; $title = "Mixed Apexchart"; include('./partials/page-title.php'); ?>

                <div class="container-fluid">
                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-base">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Line & Column Chart</h4>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div id="line-column-mixed" class="apex-charts"></div>
                                </div>
                            </div>
                            <!-- end card body-->
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Multiple Y-Axis Chart</h4>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div id="multiple-yaxis-mixed" class="apex-charts"></div>
                                </div>
                            </div>
                            <!-- end card body-->
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Line & Area Chart</h4>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div id="line-area-mixed" class="apex-charts"></div>
                                </div>
                            </div>
                            <!-- end card body-->
                        </div>

                        <!-- end card -->
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Line, Column & Area Chart</h4>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div id="all-mixed" class="apex-charts"></div>
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
    <script src="assets/js/pages/chart-apex-mixed.js"></script>
</body>

</html>