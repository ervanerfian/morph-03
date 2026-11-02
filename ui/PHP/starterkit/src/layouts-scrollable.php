<!doctype html>
<html lang="en" data-layout-position="scrollable">

<head>
    <?php $title = "Scrollable"; include('partials/title-meta.php'); ?>

    <?php include('./partials/head-css.php'); ?>
</head>

<body>
    <div class="wrapper">

        <?php $subtitle = "Layouts"; $title = "Scrollable"; include('./partials/topbar.php'); ?>

        <?php include('./partials/sidenav.php'); ?>

        <!-- Start Page Content here -->
        <div class="page-content">
            <main>

                <?php $subtitle = "Layouts"; $title = "Scrollable"; include('./partials/page-title.php'); ?>

                <div class="container-fluid">
                    <div class="bg-info/10 text-info border-s-3 border-info rounded-md flex items-start gap-3 py-3 px-4 mb-4">
                        <div>
                            <i class="iconify tabler--info-circle text-xl"></i>
                        </div>
                        <div>
                            To enable full scrolling and view all content, please add
                            <code>data-layout-position="scrollable"</code>
                            to the
                            <code>&lt;html&gt;</code>
                            tag.
                        </div>
                    </div>

                    <div style="min-height: 100vh"></div>
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