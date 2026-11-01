<!doctype html>
<html lang="en">

<head>
    <?php $title = "Empty"; include('partials/title-meta.php'); ?>

    <?php include('./partials/head-css.php'); ?>
</head>

<body>
    <div class="wrapper">
        <?php $subtitle = "Pages"; $title = "Empty"; include('./partials/topbar.php'); ?>

        <?php include('./partials/sidenav.php'); ?>

        <!-- Start Page Content here -->

        <div class="page-content">

            <main>
                <?php $subtitle = "Pages"; $title = "Empty"; include('./partials/page-title.php'); ?>
            </main>

            <?php include('./partials/footer.php'); ?>
        </div>

        <!-- End Page content -->
    </div>

    <?php include('./partials/customizer.php'); ?>

    <?php include('./partials/footer-scripts.php'); ?>
</body>

</html>