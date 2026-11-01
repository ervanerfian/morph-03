<!doctype html>
<html lang="en">

<head>
    <?php $title = "Bar Apexchart"; include('partials/title-meta.php'); ?>

    <?php include('./partials/head-css.php'); ?>
</head>

<body>
    <div class="wrapper">
        <?php $subtitle = "Charts"; $title = "Bar Apexchart"; include('./partials/topbar.php'); ?>

        <?php include('./partials/sidenav.php'); ?>

        <!-- Start Page Content here -->
        <div class="page-content">
            <main>

                <?php $subtitle = "Charts"; $title = "Bar Apexchart"; include('./partials/page-title.php'); ?>

                <div class="container-fluid">
                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-base">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Basic Bar Charts</h4>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div id="basic-bar" class="apex-charts"></div>
                                </div>
                            </div>
                            <!-- end card body-->
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Grouped Bar Chart</h4>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div id="grouped-bar" class="apex-charts"></div>
                                </div>
                            </div>
                            <!-- end card body-->
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Stacked Bar Chart</h4>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div id="stacked-bar" class="apex-charts"></div>
                                </div>
                            </div>
                            <!-- end card body-->
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">100% Stacked Bar Chart</h4>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div id="full-stacked-bar" class="apex-charts"></div>
                                </div>
                            </div>
                            <!-- end card body-->
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Grouped Stacked Bars</h4>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div id="grouped-stacked-bar" class="apex-charts"></div>
                                </div>
                            </div>
                            <!-- end card body-->
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Bar with Negative Values</h4>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div id="negative-bar" class="apex-charts"></div>
                                </div>
                            </div>
                            <!-- end card body-->
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Reversed Bar Chart</h4>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div id="reversed-bar" class="apex-charts"></div>
                                </div>
                            </div>
                            <!-- end card body-->
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Bar with Image Fill</h4>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div id="image-fill-bar" class="apex-charts"></div>
                                </div>
                            </div>
                            <!-- end card body-->
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Custom DataLabels Bar</h4>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div id="datalables-bar" class="apex-charts"></div>
                                </div>
                            </div>
                            <!-- end card body-->
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Patterned Bar Chart</h4>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div id="pattern-bar" class="apex-charts"></div>
                                </div>
                            </div>
                            <!-- end card body-->
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Bar with Markers</h4>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div id="bar-markers" class="apex-charts"></div>
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

    <!-- Apex Charts js -->
    <script src="assets/plugins/apexcharts/apexcharts.min.js"></script>
    
    <!-- Apex Chart Area Demo js -->
    <script src="assets/js/pages/chart-apex-bar.js"></script>
</body>

</html>