<!doctype html>
<html lang="en">

<head>
    <?php $title = "400 Error"; include('partials/title-meta.php'); ?>

    <?php include('./partials/head-css.php'); ?>
</head>

<body>

    <!-- Start Page Content here -->
    <div class="flex min-h-screen items-center">
        <div class="container">
            <div class="flex justify-center lg:p-0 p-12.5">
                <div class="2xl:w-4/10 md:w-1/2 sm:w-2/3 w-full">
                    <div class="absolute end-0 top-0">
                        <img src="assets/images/auth-card-bg.svg" alt="auth-card-bg" />
                    </div>

                    <div class="absolute start-0 bottom-0 rotate-180">
                        <img src="assets/images/auth-card-bg.svg" alt="auth-card-bg" />
                    </div>

                    <div class="card rounded-2xl">
                        <div class="card-body p-7.5">
                            <div class="mb-4 flex flex-col items-center justify-center text-center">
                                <a href="index.php" class="auth-logo">
                                    <img src="assets/images/logo-black.png" alt="logo" class="flex dark:hidden" />
                                    <img src="assets/images/logo.png" alt="dark logo" class="hidden dark:flex" />
                                </a>
                            </div>
                            <div class="p-3 text-center">
                                <div
                                    class="from-primary my-4 bg-linear-to-r to-danger bg-clip-text text-7xl font-bold text-transparent">
                                    400</div>
                                <h3 class="mb-2 text-xl font-bold uppercase">Oops! Invalid Request</h3>
                                <p class="text-default-400">The request couldn’t be processed. Please check the URL or
                                    try again.</p>
                                <div class="flex justify-center gap-3 mt-7.5">
                                    <a href="#!"
                                        class="btn border border-secondary text-secondary hover:text-white hover:bg-secondary">
                                        Go Back</a>
                                    <a href="index.php" class="btn bg-primary text-white hover:bg-primary-hover"> Back
                                        to Dashboard</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Auth Footer -->
                    <p class="text-default-400 mt-7.5 text-center">
                        &copy;
                        <span data-current-year></span>
                        Paces - by
                        <span>Coderthemes</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page content -->

    <?php include('./partials/customizer.php'); ?>
</body>

</html>