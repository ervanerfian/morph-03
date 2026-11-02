<!doctype html>
<html lang="en">

<head>
    <?php $title = "New Password"; include('partials/title-meta.php'); ?>

    <?php include('./partials/head-css.php'); ?>
</head>

<body>
    <!-- Start Page Content here -->
    <div class="flex min-h-screen items-center p-12.5">
        <div class="container">
            <div class="flex justify-center px-2.5">
                <div class="2xl:w-4/10 md:w-1/2 sm:w-2/3 w-full">
                    <div class="absolute end-0 top-0">
                        <img src="assets/images/auth-card-bg.svg" alt="auth-card-bg" />
                    </div>

                    <div class="absolute start-0 bottom-0 rotate-180">
                        <img src="assets/images/auth-card-bg.svg" alt="auth-card-bg" />
                    </div>
                    <div class="card p-7.5 rounded-2xl">
                        <!-- Auth Brand Logo -->
                        <div class="mb-3 flex flex-col items-center justify-center text-center">
                            <a href="index.php" class="auth-logo">
                                <img src="assets/images/logo-black.png" alt="logo" class="flex dark:hidden" />
                                <img src="assets/images/logo.png" alt="dark logo" class="hidden dark:flex" />
                            </a>
                            <p class="text-default-400 mx-auto mt-6 mb-4 w-full lg:w-3/4">We've emailed you a 6-digit
                                verification code. Please enter it below to confirm your email address</p>
                        </div>

                        <form action="index.php">
                            <div class="mb-5">
                                <label for="userEmail" class="form-label">
                                    Email address
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <input type="email" class="form-input" id="userEmail"
                                        placeholder="you&#64;example.com" required />
                                </div>
                            </div>

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

                            <div class="mb-5" data-password="bar">
                                <label for="userPassword" class="form-label">
                                    Password
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="password" id="userPassword" class="form-input" placeholder="••••••••" />
                                <div class="password-bar my-3"></div>
                                <p class="text-default-400 text-xs">Use 8+ characters with letters, numbers & symbols.
                                </p>
                            </div>

                            <div class="mb-5">
                                <label for="userNewPassword" class="form-label">
                                    Confirm New Password
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <input type="password" class="form-input" id="userNewPassword"
                                        placeholder="••••••••" required />
                                </div>
                            </div>

                            <div class="mb-6">
                                <div class="flex items-center gap-2">
                                    <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox"
                                        id="termAndPolicy" />
                                    <label class="form-check-label" for="termAndPolicy">Agree the Terms & Policy</label>
                                </div>
                            </div>

                            <div>
                                <button type="submit"
                                    class="btn bg-primary w-full py-3 font-semibold text-white hover:bg-primary-hover">Update
                                    Password</button>
                            </div>
                        </form>

                        <p class="text-default-400 my-9 text-center">
                            Don’t have a code?
                            <a href="#" class="text-primary font-semibold underline underline-offset-3">Resend</a>
                            or
                            <a href="#" class="text-primary font-semibold underline underline-offset-3">Call Us</a>
                        </p>

                        <p class="text-default-400 text-center">
                            Return to
                            <a href="auth-sign-in.php" class="underline text-primary font-semibold">Sign in</a>
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
        </div>
    </div>
    <!-- End Page content -->

    <?php include('./partials/customizer.php'); ?>

    <!-- Two Factor Validator Js -->
    <script type="module" src="assets/js/pages/auth-two-factor.js"></script>

    <!-- Password Suggestion Js -->
    <script type="module" src="assets/js/pages/auth-password.js"></script>
</body>

</html>