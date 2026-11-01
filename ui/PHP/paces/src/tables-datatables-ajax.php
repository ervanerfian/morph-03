<!doctype html>
<html lang="en">

<head>
    <?php $title = "Ajax"; include('partials/title-meta.php'); ?>

    <?php include('./partials/head-css.php'); ?>
</head>

<body>
    <div class="wrapper">
        <?php $subtitle = "Tables"; $title = "Ajax"; include('./partials/topbar.php'); ?>

        <?php include('./partials/sidenav.php'); ?>

        <!-- Start Page Content here -->
        <div class="page-content">
            <main>

                <?php $subtitle = "Tables"; $title = "Ajax"; include('./partials/page-title.php'); ?>

                <div class="container-fluid">
                    <div class="grid grid-cols-1 gap-base">
                        <div class="card">
                            <div class="card-header justify-between">
                                <h4 class="card-title">Example</h4>

                                <a href="https://datatables.net/examples/ajax/" target="_blank" class="group text-primary font-semibold hover:text-primary-hover">
                                    View Docs
                                    <i class="iconify tabler--arrow-right group-hover:translate-x-1 transform-3d transition-transform duration-300 align-middle text-base"></i>
                                </a>
                            </div>

                            <div class="card-body">
                                <div id="table-alert" class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-warning/10 text-warning text-sm rounded-lg py-3 px-4 mb-5" role="alert" tabindex="-1" aria-labelledby="hs-dismiss-button-label">
                                    <div class="flex items-center">
                                        <div class="ms-2">
                                            <div id="hs-dismiss-button-label" class="">
                                                <strong>Note:</strong>
                                                This is a jQuery-based plugin, so you need to include jQuery for it to work.
                                            </div>
                                        </div>
                                        <div class="ps-3 ms-auto">
                                            <div class="-mx-1.5 -my-1.5">
                                                <button type="button" class="" data-hs-remove-element="#table-alert">
                                                    <span class="sr-only">Dismiss</span>
                                                    <i class="iconify tabler--x text-default-600 size-6"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-wrapper -mb-4">
                                    <table id="datatables-ajax" class="table-striped dt-responsive table align-middle">
                                        <thead class="thead-sm text-2xs uppercase">
                                            <tr>
                                                <th>Company</th>
                                                <th>Symbol</th>
                                                <th>Price</th>
                                                <th>Change</th>
                                                <th>Volume</th>
                                                <th>Market Cap</th>
                                                <th>Rating</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <!-- end card-body-->
                        </div>
                        <!-- end card-->
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

    <script src="assets/js/pages/datatables-ajax.js"></script>
</body>

</html>