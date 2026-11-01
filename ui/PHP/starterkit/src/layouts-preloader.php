<!doctype html>
<html lang="en" data-layout="preloader">

<head>
    <?php $title = "Preloader"; include('partials/title-meta.php'); ?>

    <?php include('./partials/head-css.php'); ?>
</head>

<body>
    <div class="wrapper">
        <?php $subtitle = "Layouts"; $title = "Preloader"; include('./partials/topbar.php'); ?>

        <?php include('./partials/sidenav.php'); ?>

        <!-- Start Page Content here -->
        <div class="page-content">
            <main>

                <?php $subtitle = "Layouts"; $title = "Preloader"; include('./partials/page-title.php'); ?>

                <div class="fixed inset-0 z-50 flex items-center justify-center bg-white animate-[preloader_1s_ease_forwards]">
                    <div class="size-8 animate-spin rounded-full border-3 border-primary border-t-transparent"></div>
                </div>

                <div class="card">
                    <div class="card-body text-center">
                        <h4 class="text-lg">Your custom content here</h4>
                    </div>
                    <!-- end card-body-->
                </div>
                <!-- end card-->
            </main>

            <?php include('./partials/footer.php'); ?>
        </div>
        <!-- End Page content -->
    </div>

    <?php include('./partials/customizer.php'); ?>

    <?php include('./partials/footer-scripts.php'); ?>
</body>

</html>