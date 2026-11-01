<!doctype html>
<html lang="en">

<head>
    <?php $title = "Two Factor"; include('partials/title-meta.php'); ?>

    <?php include('./partials/head-css.php'); ?>
</head>

<body>
    <!-- Start Page Content here -->
    <div class="flex min-h-screen items-center p-12.5">
        <div class="container">
            <div class="flex justify-center">
                <div class="xl:w-5/6">
                    <div class="absolute end-0 top-0">
                        <img src="assets/images/auth-card-bg.svg" alt="auth-card-bg" />
                    </div>
                    <div class="absolute start-0 bottom-0 rotate-180">
                        <img src="assets/images/auth-card-bg.svg" alt="auth-card-bg" />
                    </div>
                    <div class="card rounded-2xl">
                        <div class="grid grid-cols-1 lg:grid-cols-2">
                            <div class="card-body relative p-12.5">
                                <!-- Auth Brand Logo -->
                                <div class="mb-7.5 flex flex-col items-center justify-center text-center">
                                    <a href="index.php" class="auth-logo">
                                        <img src="assets/images/logo-black.png" alt="logo" class="flex dark:hidden" />
                                        <img src="assets/images/logo.png" alt="dark logo" class="hidden dark:flex" />
                                    </a>
                                    <h4 class="text-default-900 mt-7.5 mb-9 text-base font-bold">Request sent
                                        Successfully!</h4>
                                    <h4 class="text-default-400 mx-auto mb-6">We've emailed you a 6-digit verification
                                        code we sent to</h4>
                                    <div class="text-2xl font-bold">******6789</div>
                                </div>

                                <form action="index.php">
                                    <div class="mb-5">
                                        <label for="userEmail" class="form-label">
                                            Enter your 6-digit code
                                            <span class="text-danger">*</span>
                                        </label>

                                        <div class="two-factor flex gap-2">
                                            <input type="text" class="form-input text-center" required="" />
                                            <input type="text" class="form-input text-center" required="" />
                                            <input type="text" class="form-input text-center" required="" />
                                            <input type="text" class="form-input text-center" required="" />
                                            <input type="text" class="form-input text-center" required="" />
                                            <input type="text" class="form-input text-center" required="" />
                                        </div>
                                    </div>

                                    <div>
                                        <button type="submit"
                                            class="btn bg-primary w-full py-3 font-semibold text-white hover:bg-primary-hover">Confirm</button>
                                    </div>
                                </form>

                                <p class="text-default-400 mt-7.5 text-center">
                                    Don’t have a code?
                                    <a href="#"
                                        class="text-primary font-semibold underline underline-offset-3">Resend</a>
                                    or
                                    <a href="#" class="text-primary font-semibold underline underline-offset-3">Call
                                        Us</a>
                                </p>

                                <p class="text-default-400 mt-7.5 text-center">
                                    Return to
                                    <a href="auth-card-sign-in.php"
                                        class="text-primary font-semibold underline underline-offset-4">Sign in</a>
                                </p>

                                <!-- Auth Footer -->
                                <p class="text-default-400 mt-7.5 text-center">
                                    &copy;
                                    <span data-current-year></span>
                                    Paces - by
                                    <span>Coderthemes</span>
                                </p>
                            </div>
                            <div class="relative hidden h-full overflow-hidden rounded-e-2xl bg-cover bg-center object-cover lg:block"
                                style="background-image: url(&quot;assets/images/auth.jpg&quot;)">
                                <div
                                    class="absolute inset-0 flex items-end justify-center rounded-e-sm p-9 [background:linear-gradient(to_top,#313a46,rgba(49,58,70,.8),rgba(49,58,70,.5))]">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page content -->

    <!-- Two Factor Validator Js -->
    <script type="module" src="assets/js/pages/auth-two-factor.js"></script>
</body>

</html>