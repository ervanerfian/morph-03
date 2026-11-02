<!doctype html>
<html lang="en" data-topbar-color="gradient">

<head>
    <?php $title = "Topbar Gradient"; include('partials/title-meta.php'); ?>

    <?php include('./partials/head-css.php'); ?>
</head>

<body>
    <div class="wrapper">
        <?php $subtitle = "Layouts"; $title = "Topbar Gradient"; include('./partials/topbar.php'); ?>

        <?php include('./partials/sidenav.php'); ?>

        <!-- Start Page Content here -->
        <div class="page-content">
            <main>

                <?php $subtitle = "Layouts"; $title = "Topbar Gradient"; include('./partials/page-title.php'); ?>

                <div class="container-fluid">
                    <div class="bg-warning/10 text-warning border-s-3 border-warning rounded-md flex items-start gap-3 py-3 px-4 mb-4">
                        <div>
                            <i class="iconify tabler--info-circle text-xl"></i>
                        </div>
                        <div>
                            To enable the gradient topbar, add
                            <code>data-topbar-color="gradient"</code>
                            to the
                            <code>&lt;html&gt;</code>
                            tag in your layout.
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