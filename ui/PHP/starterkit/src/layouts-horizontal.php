<!doctype html>
<html lang="en" data-layout="horizontal">

<head>
    <?php $title = "Horizontal"; include('partials/title-meta.php'); ?>

    <?php include('./partials/head-css.php'); ?>
</head>

<body>
    <div class="wrapper">

        <?php $subtitle = "Layouts"; $title = "Horizontal"; include('./partials/topbar.php'); ?>

        <?php include('./partials/horizontal-nav.php'); ?>

        <!-- Start Page Content here -->
        <div class="page-content">
            <main>
                <div class="container-fluid">

                    <?php $subtitle = "Layouts"; $title = "Horizontal"; include('./partials/page-title.php'); ?>

                    <div class="card">
                        <div class="card-body text-center">
                            <h4 class="text-lg">Your custom content here</h4>
                        </div>
                        <!-- end card-body-->
                    </div>
                    <!-- end card -->
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