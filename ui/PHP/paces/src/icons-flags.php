<!doctype html>
<html lang="en">

<head>
    <?php $title = "Flags"; include('partials/title-meta.php'); ?>

    <?php include('./partials/head-css.php'); ?>
</head>

<body>
    <div class="wrapper">
        <?php $subtitle = "icons"; $title = "Flags"; include('./partials/topbar.php'); ?>

        <?php include('./partials/sidenav.php'); ?>

        <!-- Start Page Content here -->
        <div class="page-content">
            <main>
                <?php $subtitle = "icons"; $title = "Flags"; include('./partials/page-title.php'); ?>

                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <h4 class="card-title mb-1.5">Flags Listing (SVG)</h4>
                                <p class="text-default-400">We offer a set of scalable SVG flags, perfect for language selectors and international content.</p>
                            </div>

                            <!-- Search -->
                            <div class="relative flex items-center">
                                <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                                    <i class="iconify tabler--search text-default-400 text-lg"></i>
                                </div>
                                <input type="search" id="countrySearch" class="form-input w-57.5 ps-10" placeholder="Search country..." />
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="flagTable" class="table-bordered table w-full text-center align-middle">
                                    <thead>
                                        <tr class="text-xs font-bold">
                                            <th>Flag</th>
                                            <th>Country Name</th>
                                            <th>Path</th>
                                            <th>Flag</th>
                                            <th>Country Name</th>
                                            <th>Path</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                        <!-- end card-body-->
                    </div>
                    <!-- end card-->
                </div>
            </main>

            <?php include('./partials/footer.php'); ?>
        </div>
        <!-- End Page content -->
    </div>

    <?php include('./partials/customizer.php'); ?>

    <?php include('./partials/footer-scripts.php'); ?>

    <!-- Page only -->
    <script src="assets/js/pages/flags-listing.js"></script>
</body>

</html>