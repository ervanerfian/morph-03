<!doctype html>
<html lang="en">

<head>
    <?php $title = "Compact"; include('partials/title-meta.php'); ?>

    <?php include('./partials/head-css.php'); ?>
</head>

<body>
    <div class="wrapper">
        <?php $subtitle = "Layouts"; $title = "Compact"; include('./partials/topbar.php'); ?>

        <?php include('./partials/sidenav.php'); ?>

        <!-- Start Page Content here -->
        <div class="page-content">
            <main>

                <?php $subtitle = "Layouts"; $title = "Compact"; include('./partials/page-title.php'); ?>

                <div class="container">
                    <div class="bg-info/10 text-info border-s-3 border-info rounded-md flex items-start gap-3 py-3 px-4 mb-4">
                        <div>
                            <i class="iconify tabler--info-circle text-xl"></i>
                        </div>
                        <div>
                            To use the compact layout, follow this structure: wrap your page title in
                            <code>&lt;div class="container-fluid"&gt;</code>
                            and place your main content inside
                            <code>&lt;div class="container-xl"&gt;</code>
                            . This ensures proper spacing and alignment.
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body text-center">
                            <h4 class="text-lg">Your custom content here</h4>
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
</body>

</html>