<!doctype html>
<html lang="en">

<head>
    <?php $title = "Breadcrumb"; include('partials/title-meta.php'); ?>

    <?php include('./partials/head-css.php'); ?>
</head>

<body>
    <div class="wrapper">
        <?php $subtitle = "Base UI"; $title = "Breadcrumb"; include('./partials/topbar.php'); ?>

        <?php include('./partials/sidenav.php'); ?>

        <!-- Start Page Content here -->
        <div class="page-content">
            <main>

                <?php $subtitle = "Base UI"; $title = "Breadcrumb"; include('./partials/page-title.php'); ?>

                <div class="container-fluid">
                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-base">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Basic</h4>
                            </div>

                            <div class="card-body">
                                <nav class="py-2.5">
                                    <ol class="flex items-center whitespace-nowrap">
                                        <li class="text-default-400 inline-flex items-center truncate font-medium" aria-current="page">Home</li>
                                    </ol>
                                </nav>

                                <nav class="py-2.5">
                                    <ol class="flex items-center whitespace-nowrap">
                                        <li class="inline-flex items-center">
                                            <a class="text-default-600 hover:text-primary flex items-center font-medium" href="#">Home</a>
                                            <i class="iconify tabler--chevron-right text-default-400 m-0.75 text-base pe-1"></i>
                                        </li>

                                        <li class="text-default-400 inline-flex items-center truncate font-medium" aria-current="page">Library</li>
                                    </ol>
                                </nav>

                                <nav class="py-2.5">
                                    <ol class="flex items-center whitespace-nowrap">
                                        <li class="inline-flex items-center">
                                            <a class="text-default-600 hover:text-primary flex items-center font-medium" href="#">Home</a>
                                            <i class="iconify tabler--chevron-right text-default-400 m-0.75 text-base pe-1"></i>
                                        </li>

                                        <li class="inline-flex items-center">
                                            <a class="text-default-600 hover:text-primary flex items-center font-medium" href="#">Library</a>
                                            <i class="iconify tabler--chevron-right text-default-400 m-0.75 text-base pe-1"></i>
                                        </li>

                                        <li class="text-default-400 inline-flex items-center truncate font-medium" aria-current="page">Data</li>
                                    </ol>
                                </nav>
                            </div>
                            <!-- end card-body-->
                        </div>
                        <!-- end card-->

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">With Icons</h4>
                            </div>

                            <div class="card-body">
                                <nav class="bg-light/50 p-2.5 mb-2.5">
                                    <ol class="flex items-center whitespace-nowrap">
                                        <li class="text-default-400 inline-flex items-center truncate font-medium" aria-current="page">
                                            <i class="iconify tabler--smart-home me-2 text-sm"></i>
                                            Home
                                        </li>
                                    </ol>
                                </nav>

                                <nav class="bg-light/50 p-2.5 mb-2.5">
                                    <ol class="flex items-center whitespace-nowrap">
                                        <li class="inline-flex items-center">
                                            <a class="hover:text-primary flex items-center font-medium" href="#"> <i class="iconify tabler--smart-home me-1.25"></i> Home </a>
                                            <i class="iconify tabler--chevron-right text-default-400 m-0.75 text-base pe-1"></i>
                                        </li>

                                        <li class="text-default-400 inline-flex items-center truncate font-medium" aria-current="page">Library</li>
                                    </ol>
                                </nav>

                                <nav class="bg-light/50 p-2.5">
                                    <ol class="flex items-center whitespace-nowrap">
                                        <li class="inline-flex items-center">
                                            <a class="hover:text-primary flex items-center font-medium" href="#">
                                                <i class="iconify tabler--smart-home me-1 text-sm"></i>
                                                Home
                                            </a>
                                            <i class="iconify tabler--chevron-right text-default-400 m-0.75 text-base pe-1"></i>
                                        </li>

                                        <li class="inline-flex items-center">
                                            <a class="hover:text-primary flex items-center font-medium" href="#">Library</a>
                                            <i class="iconify tabler--chevron-right text-default-400 m-0.75 text-base pe-1"></i>
                                        </li>

                                        <li class="text-default-400 inline-flex items-center truncate font-medium" aria-current="page">Data</li>
                                    </ol>
                                </nav>
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
</body>

</html>