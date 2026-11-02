<!doctype html>
<html lang="en">

<head>
    <?php $title = "Lock Screen"; include('partials/title-meta.php'); ?>

    <?php include('./partials/head-css.php'); ?>
</head>

<body>
    <!-- Start Page Content here -->
    <div class="min-h-screen">
        <div class="flex h-full w-full">
            <div class="min-w-full md:min-w-106 md:max-w-118">
                <div class="card relative flex min-h-screen flex-col justify-between rounded-none p-12.5">
                    <div class="absolute end-0 top-0">
                        <img src="assets/images/auth-card-bg.svg" class="w-45" alt="auth-card-bg" />
                    </div>
                    <!-- Auth Brand Logo -->
                    <div class="mb-7.5 flex flex-col items-center justify-center text-center">
                        <a href="index.php" class="auth-logo">
                            <img src="assets/images/logo-black.png" alt="logo" class="flex dark:hidden" />
                            <img src="assets/images/logo.png" alt="dark logo" class="hidden dark:flex" />
                        </a>
                    </div>

                    <div>
                        <p class="text-default-400 mx-auto mb-4 w-full text-center lg:w-72">Let’s get you signed in.
                            Enter your password to continue.</p>
                        <form action="index.php" class="mt-6">
                            <div class="mb-9 text-center">
                                <div class="border-default-300 mx-auto mb-3 size-20 rounded-full border-4">
                                    <img src="assets/images/users/user-1.jpg" class="size-18 rounded-full"
                                        alt="thumbnail" />
                                </div>
                                <h5 class="text-base font-semibold">David Dev</h5>
                            </div>

                            <div class="mb-6">
                                <label for="userPassword" class="form-label">
                                    Password
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-icon-group">
                                    <i class="iconify tabler--lock-password input-icon"></i>
                                    <input type="password" class="form-input" id="userPassword" placeholder="••••••••"
                                        required />
                                </div>
                            </div>

                            <div class="flex justify-between items-center mb-6">
                                <div class="flex gap-2 items-center">
                                    <input class="form-checkbox size-4.25!" type="checkbox" checked=""
                                        id="rememberMe" />
                                    <label class="form-check-label" for="rememberMe">Keep me signed in</label>
                                </div>
                                <a href="auth-split-reset-pass.php" class="underline text-default-400">Forgot
                                    Password?</a>
                            </div>

                            <div>
                                <button type="submit"
                                    class="btn bg-primary w-full py-3 font-semibold text-white hover:bg-primary-hover">Sign
                                    In</button>
                            </div>
                        </form>

                        <p class="text-default-400 mt-7.5 text-center">
                            Not you? Return to
                            <a href="auth-split-sign-in.php"
                                class="text-primary font-semibold underline underline-offset-4">Sign in</a>
                        </p>
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

            <div class="hidden w-full md:block">
                <div
                    class="relative h-full overflow-hidden bg-[url('../images/auth.jpg')] bg-cover bg-center bg-no-repeat">
                    <div
                        class="from-zinc-800 via-zinc-800/80 to-zinc-800/50 absolute inset-0 flex items-end justify-center bg-linear-to-t p-9">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Page content -->

    <?php include('./partials/customizer.php'); ?>
</body>

</html>