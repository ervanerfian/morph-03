<!doctype html>
<html lang="en">

<head>
    <?php $title = "Child Row"; include('partials/title-meta.php'); ?>

    <?php include('./partials/head-css.php'); ?>
</head>

<body>
    <div class="wrapper">
        <?php $subtitle = "Tables"; $title = "Child Row"; include('./partials/topbar.php'); ?>

        <?php include('./partials/sidenav.php'); ?>

        <!-- Start Page Content here -->
        <div class="page-content">
            <main>

                <?php $subtitle = "Tables"; $title = "Child Row"; include('./partials/page-title.php'); ?>

                <div class="container-fluid">
                    <div class="grid grid-cols-1 gap-base">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Example</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-wrapper -mb-4">
                                    <table id="child-rows-data" class="table table-striped">
                                        <thead class="text-2xs font-semibold uppercase">
                                            <tr>
                                                <th></th>
                                                <th>Company</th>
                                                <th>Symbol</th>
                                                <th>Price</th>
                                                <th>Change</th>
                                                <th>Volume</th>
                                                <th>Market Cap</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
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

    <!-- Jquery for Datatables-->
    <script src="assets/plugins/jquery/jquery.min.js"></script>

    <!-- Datatables js -->
    <script src="assets/plugins/datatables-dt/dataTables.min.js"></script>
    <script src="assets/plugins/datatables-dt/dataTables.responsive.min.js"></script>

    <!-- Page js -->
    <script src="assets/js/pages/datatables-child-rows.js"></script>
</body>

</html>