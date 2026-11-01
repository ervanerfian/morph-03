<!doctype html>
<html lang="en">

<head>
    <?php $title = "GEO Maps"; include('partials/title-meta.php'); ?>

    <?php include('./partials/head-css.php'); ?>
</head>

<body>
    <div class="wrapper">
        <?php $subtitle = "Charts"; $title = "GEO Maps"; include('./partials/topbar.php'); ?>

        <?php include('./partials/sidenav.php'); ?>

        <!-- Start Page Content here -->
        <div class="page-content">
            <main>

                <?php $subtitle = "Charts"; $title = "GEO Maps"; include('./partials/page-title.php'); ?>

                <div class="container-fluid">
                    <div class="grid xl:grid-cols-2 gap-base">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">World Map</h4>
                            </div>
                            <div class="card-body">
                                <div id="world-map" style="min-height: 400px"></div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">USA Map</h4>
                            </div>
                            <div class="card-body">
                                <div id="usa-map" style="min-height: 400px"></div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Morphing between Map and Bar Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="map-bar-morphing" style="min-height: 400px"></div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Pie Chart on Geo Map</h4>
                            </div>
                            <div class="card-body">
                                <div id="pie-chart-on-map" style="min-height: 400px"></div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">GEO SVG Scatter</h4>
                            </div>
                            <div class="card-body">
                                <div id="geo-svg-scatter-map" style="min-height: 400px"></div>
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

    <script src="https://cdn.jsdelivr.net/npm/echarts/map/js/world.js"></script>

    <!-- E Charts Demo js -->
    <script src="assets/js/pages/chart-echart-geo-map.js"></script>
</body>

</html>