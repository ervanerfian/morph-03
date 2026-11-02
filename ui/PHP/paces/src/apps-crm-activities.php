<!DOCTYPE html>
<html lang="en">

<head>
    <?php $title = "Activities"; include('partials/title-meta.php'); ?>

    <?php include('./partials/head-css.php'); ?>
</head>

<body>

    <div class="wrapper">

        <?php $subtitle = "CRM"; $title = "Activities"; include('./partials/topbar.php'); ?>

        <?php include('./partials/sidenav.php'); ?>

        <!-- Start Page Content here -->
        <div class="page-content">

            <main>

                <?php $subtitle = "CRM"; $title = "Activities"; include('./partials/page-title.php'); ?>

                <div class="container-fluid">
                    <div class="lg:w-3/4 w-full mx-auto">
                        <div class="card">
                            <div class="card-body">
                                <div class="space-y-5">
                                    <div>
                                        <h6 class="text-xs font-bold mb-5 text-default-400">01 Aug, 2025</h6>
                                        <!-- Item -->
                                        <div class="flex gap-x-5">
                                            <div class="text-sm text-default-400 w-30 text-end">09:30 AM</div>

                                            <div class="after:border-default-300 relative after:absolute after:start-1/2 after:top-7 after:bottom-0 after:w-px after:border-e -ms-px after:border-dashed last:after:hidden">
                                                <div class="relative z-10">
                                                    <div class="flex justify-center items-center border border-dashed border-default-300 rounded-full size-7.5">
                                                        <i class="iconify tabler--user-plus text-lg text-success"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="grow pb-7.5">
                                                <p class="mb-1.25">
                                                    <strong>New lead:</strong>
                                                    <a href="#" class="text-primary">John Carter</a>
                                                    added to the "Enterprise" pipeline by
                                                    <span class="font-semibold text-primary">Sarah Lee</span>.
                                                </p>

                                                <div class="flex items-center gap-2.5 my-2.5">
                                                    <button class="btn btn-sm border-secondary text-secondary hover:bg-secondary hover:text-white text-nowrap">Follow Up</button>

                                                    <button class="btn btn-sm border-primary text-primary hover:bg-primary hover:text-white text-nowrap">Log Note</button>
                                                </div>

                                                <div class="flex flex-wrap items-center gap-2.5">
                                                    <span class="badge bg-default-100 border border-default-300 text-default-400">Cold Lead</span>
                                                    <div>
                                                        <small class="text-default-400">01 Aug, 2025, 09:30 AM</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Item -->

                                        <!-- Item -->
                                        <div class="flex gap-x-5">
                                            <div class="text-sm text-default-400 w-30 text-end">10:15 AM</div>

                                            <div class="after:border-default-300 relative after:absolute after:start-1/2 after:top-7 after:bottom-0 after:w-px after:border-e -ms-px after:border-dashed last:after:hidden">
                                                <div class="relative z-10">
                                                    <div class="flex justify-center items-center border border-dashed border-default-300 rounded-full size-7.5">
                                                        <i class="iconify tabler--briefcase text-lg text-info"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="grow pb-7.5">
                                                <p class="mb-1.25"><strong>Deal created: </strong>Q3 Licensing for John Carter added by <span class="font-semibold text-primary">Sarah Lee </span>with value $15,000.</p>

                                                <div class="my-2.5">
                                                    <button class="btn btn-sm border-primary text-primary hover:bg-primary hover:text-white">View Deal</button>
                                                </div>

                                                <div class="flex flex-wrap items-center gap-2.5">
                                                    <span class="badge bg-info/15 text-info">High Priority</span>
                                                    <div>
                                                        <small class="text-default-400 align-middle">01 Aug, 2025, 10:15 AM</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Item -->

                                        <!-- Item -->
                                        <div class="flex gap-x-5">
                                            <div class="text-sm text-default-400 w-30 text-end">11:45 AM</div>

                                            <div class="relative">
                                                <div class="relative z-10">
                                                    <div class="flex justify-center items-center border border-dashed border-default-300 rounded-full size-7.5">
                                                        <i class="iconify tabler--pencil text-lg text-default-400"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="grow pb-7.5">
                                                <p class="mb-1.25">
                                                    <strong>Note added:</strong>
                                                    Client requested a 15-day extension on proposal deadline. Logged by
                                                    <span class="font-semibold text-primary">Sarah Lee.</span>
                                                </p>

                                                <div class="my-2.5">
                                                    <button class="btn btn-sm border-info text-info hover:bg-info hover:text-white">Edit Note</button>
                                                </div>

                                                <div class="flex flex-wrap items-center gap-2.5">
                                                    <span class="badge bg-warning/15 text-warning">Client Requested</span>
                                                    <div>
                                                        <small class="text-default-400">01 Aug, 2025, 11:45 AM</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Item -->
                                    </div>

                                    <div>
                                        <h6 class="text-xs font-bold mb-5 text-default-400">31 Jul, 2025</h6>
                                        <!-- Item -->
                                        <div class="flex gap-x-5">
                                            <div class="text-sm text-default-400 w-30 text-end">03:30 PM</div>

                                            <div class="after:border-default-300 relative after:absolute after:start-1/2 after:top-7 after:bottom-0 after:w-px after:border-e -ms-px after:border-dashed last:after:hidden">
                                                <div class="relative z-10">
                                                    <div class="flex justify-center items-center border border-dashed border-default-300 rounded-full size-7.5">
                                                        <i class="iconify tabler--phone-call text-lg text-success"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="grow pb-7.5">
                                                <p class="mb-1.25">
                                                    <strong>Call completed:</strong>
                                                    Follow-up call with
                                                    <strong>Emily Watson</strong>
                                                    to discuss contract renewal.
                                                </p>

                                                <div class="my-2.5">
                                                    <button class="btn btn-sm border-success text-success hover:bg-success hover:text-white">Call Again</button>
                                                </div>

                                                <div class="flex flex-wrap items-center gap-2.5">
                                                    <span class="badge bg-warning/15 text-warning">Follow Up Needed</span>
                                                    <div>
                                                        <small class="text-default-400">31 Jul, 2025, 03:30 PM</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Item -->

                                        <!-- Item -->
                                        <div class="flex gap-x-5">
                                            <div class="text-sm text-default-400 w-30 text-end">01:00 PM</div>

                                            <div class="relative">
                                                <div class="relative z-10">
                                                    <div class="flex justify-center items-center border border-dashed border-default-300 rounded-full size-7.5">
                                                        <i class="iconify tabler--mail text-lg text-danger"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="grow pb-7.5">
                                                <p class="mb-1.25">
                                                    <strong>Email: </strong>
                                                    Welcome email with demo link sent to
                                                    <span class="font-semibold text-primary">Michael Barnes</span>.
                                                </p>

                                                <div class="my-2.5">
                                                    <button class="btn btn-sm border border-dark text-dark hover:bg-dark hover:text-white">Resend</button>
                                                </div>

                                                <div class="flex flex-wrap items-center gap-2.5">
                                                    <span class="badge bg-default-100 border border-default-300 text-default-400">Automated</span>
                                                    <div>
                                                        <small class="text-default-400 align-middle">31 Jul, 2025, 01:00 PM</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Item -->
                                    </div>

                                    <div>
                                        <h6 class="text-xs font-bold mb-5 text-default-400">30 Jul, 2025</h6>
                                        <!-- Item -->
                                        <div class="flex gap-x-5">
                                            <div class="text-sm text-default-400 w-30 text-end">02:45 PM</div>

                                            <div class="after:border-default-300 relative after:absolute after:start-1/2 after:top-7 after:bottom-0 after:w-px after:border-e -ms-px after:border-dashed last:after:hidden">
                                                <div class="relative z-10">
                                                    <div class="flex justify-center items-center border border-dashed border-default-300 rounded-full size-7.5">
                                                        <i class="iconify tabler--calendar-event text-lg text-primary"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="grow pb-7.5">
                                                <p class="mb-1.25">
                                                    <strong>Demo scheduled:</strong>
                                                    A demo was booked with
                                                    <strong>Linda Rowe</strong>
                                                    for 02 Aug at 4:00 PM. Invite sent with Google Meet link.
                                                </p>

                                                <div class="my-2.5">
                                                    <button class="btn btn-sm border-success text-success hover:bg-success hover:text-white">Send Reminder</button>
                                                </div>

                                                <div class="flex flex-wrap items-center gap-2.5">
                                                    <span class="badge bg-default-100 border border-default-300 text-default-400">Scheduled</span>
                                                    <div>
                                                        <small class="text-default-400">30 Jul, 2025, 02:45 PM</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Item -->

                                        <!-- Item -->
                                        <div class="flex gap-x-5">
                                            <div class="text-sm text-default-400 w-30 text-end">10:00 AM</div>

                                            <div class="relative">
                                                <div class="relative z-10">
                                                    <div class="flex justify-center items-center border border-dashed border-default-300 rounded-full size-7.5">
                                                        <i class="iconify tabler--user-circle text-lg text-secondary"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="grow pb-7.5">
                                                <p class="mb-1.25">
                                                    <strong>Lead reassigned: </strong>
                                                    Lead <strong>Alice Monroe</strong>
                                                    was reassigned from James Parker to
                                                    <strong>Lisa Turner</strong>
                                                    for better regional alignment.
                                                </p>

                                                <div class="my-2.5">
                                                    <button class="btn btn-sm border border-dark text-dark hover:bg-dark hover:text-white">Resend</button>
                                                </div>

                                                <div class="flex flex-wrap items-center gap-2.5">
                                                    <span class="badge bg-default-100 border border-default-300 text-default-400">Internal</span>
                                                    <div>
                                                        <small class="text-default-400 align-middle">30 Jul, 2025, 10:00 AM</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Item -->
                                    </div>

                                    <div>
                                        <h6 class="text-xs font-bold mb-5 text-default-400">29 Jul, 2025</h6>
                                        <!-- Item -->
                                        <div class="flex gap-x-5">
                                            <div class="text-sm text-default-400 w-30 text-end">05:30 PM</div>

                                            <div class="after:border-default-300 relative after:absolute after:start-1/2 after:top-7 after:bottom-0 after:w-px after:border-e -ms-px after:border-dashed last:after:hidden">
                                                <div class="relative z-10">
                                                    <div class="flex justify-center items-center border border-dashed border-default-300 rounded-full size-7.5">
                                                        <i class="iconify tabler--star text-lg text-success"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="grow pb-7.5">
                                                <p class="mb-1.25">
                                                    <strong>Lead converted:</strong>
                                                    Jacob Wells converted into customer after final proposal approval. Contract sent for signing.
                                                </p>

                                                <div class="my-2.5">
                                                    <button class="btn btn-sm border-primary text-primary hover:bg-primary hover:text-white">View Client</button>
                                                </div>

                                                <div class="flex flex-wrap items-center gap-2.5">
                                                    <span class="badge bg-success/15 text-success">Won</span>
                                                    <div>
                                                        <small class="text-default-400">29 Jul, 2025, 05:30 PM</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Item -->

                                        <!-- Item -->
                                        <div class="flex gap-x-5">
                                            <div class="text-sm text-default-400 w-30 text-end">11:15 AM</div>

                                            <div class="relative">
                                                <div class="relative z-10">
                                                    <div class="flex justify-center items-center border border-dashed border-default-300 rounded-full size-7.5">
                                                        <i class="iconify tabler--message text-lg text-default-400"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="grow pb-7.5">
                                                <p class="mb-1.25">
                                                    <strong>Note added:</strong>
                                                    Added post-call notes for <strong>Emily Watson</strong>
                                                    Follow-up set for next week to review proposal edits.
                                                </p>

                                                <div class="flex flex-wrap items-center gap-2.5">
                                                    <span class="badge bg-default-100 border border-default-300 text-default-400">Internal Note</span>
                                                    <div>
                                                        <small class="text-default-400 align-middle">29 Jul, 2025, 11:15 AM</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Item -->
                                    </div>

                                    <div>
                                        <h6 class="text-xs font-bold mb-5 text-default-400">27 Jul, 2025</h6>
                                        <!-- Item -->
                                        <div class="flex gap-x-5">
                                            <div class="text-sm text-default-400 w-30 text-end">03:00 PM</div>

                                            <div class="after:border-default-300 relative after:absolute after:start-1/2 after:top-7 after:bottom-0 after:w-px after:border-e -ms-px after:border-dashed last:after:hidden">
                                                <div class="relative z-10">
                                                    <div class="flex justify-center items-center border border-dashed border-default-300 rounded-full size-7.5">
                                                        <i class="iconify tabler--x text-lg text-danger"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="grow pb-7.5">
                                                <p class="mb-1.25">
                                                    <strong>Deal lost: </strong>
                                                    Deal <strong>IT Revamp - BetaSoft</strong>
                                                    marked as lost due to pricing mismatch. Feedback recorded.
                                                </p>

                                                <div class="my-2.5">
                                                    <button class="btn btn-sm border-dark text-dark hover:bg-dark hover:text-white">Review Notes</button>
                                                </div>

                                                <div class="flex flex-wrap items-center gap-2.5">
                                                    <span class="badge bg-danger/15 text-danger">Lost</span>
                                                    <div>
                                                        <small class="text-default-400">27 Jul, 2025, 03:00 PM</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Item -->

                                        <!-- Item -->
                                        <div class="flex gap-x-5">
                                            <div class="text-sm text-default-400 w-30 text-end">09:20 AM</div>

                                            <div class="relative">
                                                <div class="relative z-10">
                                                    <div class="flex justify-center items-center border border-dashed border-default-300 rounded-full size-7.5">
                                                        <i class="iconify tabler--edit text-lg text-primary"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="grow pb-7.5">
                                                <p class="mb-1.25">
                                                    <strong>Contact info updated:</strong>
                                                    Phone and email updated for <strong>Jessica Tran </strong>. New contact details logged.
                                                </p>

                                                <div class="flex flex-wrap items-center gap-2.5">
                                                    <span class="badge bg-default-100 border border-default-300 text-default-400">Updated</span>
                                                    <div>
                                                        <small class="text-default-400 align-middle">27 Jul, 2025, 09:20 AM</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Item -->
                                    </div>

                                    <div class="flex items-center justify-center gap-3 md:p-5 p-3">
                                        <strong>Loading...</strong>
                                        <div class="animate-spin inline-block size-4 border-2 border-current border-t-transparent text-danger rounded-full" role="status" aria-label="loading">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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