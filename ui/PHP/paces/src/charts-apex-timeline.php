<!doctype html>
<html lang="en">

<head>
    <?php $title = "Timeline Apexchart"; include('partials/title-meta.php'); ?>

    <?php include('./partials/head-css.php'); ?>
</head>

<body>
    <div class="wrapper">
        <?php $subtitle = "Charts"; $title = "Timeline Apexchart"; include('./partials/topbar.php'); ?>

        <?php include('./partials/sidenav.php'); ?>

        <!-- Start Page Content here -->
        <div class="page-content">
            <main>

                <?php $subtitle = "Charts"; $title = "Timeline Apexchart"; include('./partials/page-title.php'); ?>

                <div class="container-fluid">
                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-base">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Basic Timeline</h4>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div id="basic-timeline" class="apex-charts"></div>
                                </div>
                            </div>
                            <!-- end card body-->
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Distributed Timeline</h4>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div id="distributed-timeline" class="apex-charts"></div>
                                </div>
                            </div>
                            <!-- end card body-->
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Multi Series Timeline</h4>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div id="multi-series-timeline" class="apex-charts"></div>
                                </div>
                            </div>
                            <!-- end card body-->
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Advanced Timeline</h4>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div id="advanced-timeline" class="apex-charts"></div>
                                </div>
                            </div>
                            <!-- end card body-->
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Multiple Series - Group Rows</h4>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div id="group-rows-timeline" class="apex-charts"></div>
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

    <!-- Moment js -->
    <script src="assets/plugins/moment/moment.min.js"></script>

    <!-- Apex Chart Timeline Demo js -->
    <script src="assets/js/pages/chart-apex-timeline.js"></script>
</body>

</html>