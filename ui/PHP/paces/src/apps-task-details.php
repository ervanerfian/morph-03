<!doctype html>
<html lang="en">

<head>
    <?php $title = "Task Details"; include('partials/title-meta.php'); ?>

    <?php include('./partials/head-css.php'); ?>
</head>

<body>
    <div class="wrapper">
        <?php $subtitle = "Apps"; $title = "Task Details"; include('./partials/topbar.php'); ?>

        <?php include('./partials/sidenav.php'); ?>

        <!-- Start Page Content here -->
        <div class="page-content">
            <main>

                <?php $subtitle = "Apps"; $title = "Task Details"; include('./partials/page-title.php'); ?>

                <div class="container-fluid">
                    <div class="grid grid-cols-1 lg:grid-cols-4 lg:gap-0 gap-base">
                        <!-- Project Main Details -->
                        <div class="lg:col-span-3">
                            <div class="card h-full lg:rounded-e-none lg:border-e border-dashed border-default-300">
                                <div class="card-header flex flex-wrap items-start p-7.5">
                                    <div>
                                        <h3 class="mb-1.25 flex items-center text-lg">Complete Presentation Slides for Meeting</h3>
                                        <p class="text-default-400 text-2xs mb-2.5">Updated 10 minutes ago</p>
                                        <span class="badge badge-label bg-warning/15 text-warning">New</span>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="javascript: void(0);" class="btn bg-light hover:text-primary">
                                            <i class="iconify tabler--pencil"></i>
                                            Edit Task
                                        </a>
                                    </div>
                                </div>

                                <div class="card-body px-7.5">
                                    <div class="mb-7.5">
                                        <h5 class="mb-2.5">Task Description:</h5>
                                        <p class="text-default-400 mb-4">Prepare and finalize the presentation slides for the upcoming business strategy meeting. Include sections for overview, KPIs, and next quarter goals to ensure clarity and alignment.</p>
                                        <p class="text-default-400 mb-4">The task requires coordination with the marketing and finance teams for data verification. Final review and approval must be completed before the meeting date.</p>
                                    </div>

                                    <div class="mb-7.5">
                                        <div class="grid grid-cols-2 gap-base md:grid-cols-4">
                                            <div>
                                                <h6 class="text-2xs text-default-400 mb-1.25 uppercase">Created Date:</h6>
                                                <p class="font-medium">May 9, 2025</p>
                                            </div>

                                            <div>
                                                <h6 class="text-2xs text-default-400 mb-1.25 uppercase">Due Date:</h6>
                                                <p class="text-danger font-medium">Today</p>
                                            </div>

                                            <div>
                                                <h6 class="text-2xs text-default-400 mb-1.25 uppercase">Assigned To:</h6>
                                                <p class="font-medium">Cruise +2 Members</p>
                                            </div>

                                            <div>
                                                <h6 class="text-2xs text-default-400 mb-1.25 uppercase">Priority:</h6>
                                                <p class="text-danger font-medium">High</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Tabs -->
                                    <div class="border-default-300 border-b">
                                        <nav class="flex gap-x-1" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
                                            <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-primary hs-tab-active:text-primary hover:text-primary focus:text-primary active inline-flex items-center gap-x-2 border-b border-transparent px-4 py-2 text-sm whitespace-nowrap focus:outline-hidden disabled:pointer-events-none disabled:opacity-50" id="comments" aria-selected="true" data-hs-tab="#comments-tab" aria-controls="comments-tab" role="tab">
                                                <i class="iconify tabler--message-circle me-md-1 text-base align-middle"></i>
                                                <span class="hidden align-middle md:inline-block">Comments</span>
                                            </button>

                                            <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-primary hs-tab-active:text-primary hover:text-primary focus:text-primary inline-flex items-center gap-x-2 border-b border-transparent px-4 py-2 text-sm whitespace-nowrap focus:outline-hidden disabled:pointer-events-none disabled:opacity-50" id="activity" aria-selected="false" data-hs-tab="#activity-tab" aria-controls="activity-tab" role="tab">
                                                <i class="iconify tabler--activity me-md-1 text-base align-middle"></i>
                                                <span class="hidden align-middle md:inline-block">Activity</span>
                                            </button>
                                        </nav>
                                    </div>

                                    <div class="mt-5">
                                        <div id="comments-tab" role="tabpanel" aria-labelledby="comments">
                                            <div class="mb-5">
                                                <div class="mb-5">
                                                    <textarea class="form-textarea" id="form-control-textarea" rows="4" placeholder="Enter your messages..."></textarea>
                                                </div>

                                                <div class="text-end">
                                                    <button type="button" class="btn btn-sm bg-secondary text-white hover:bg-secondary-hover">Comment <i class="iconify tabler--send-2"></i></button>
                                                </div>
                                            </div>

                                            <h4 class="text-md mb-base">Comments (15)</h4>

                                            <div class="border-default-300 mb-2.5 rounded border border-dashed p-5">
                                                <div class="flex gap-2.5">
                                                    <div class="shrink-0">
                                                        <img src="assets/images/users/user-6.jpg" alt="" class="size-8 rounded-full" />
                                                    </div>

                                                    <div>
                                                        <div>
                                                            <h5 class="mb-1.25">
                                                                Daniel West
                                                                <small class="text-default-400">14 Apr 2025 · 04:15PM</small>
                                                            </h5>
                                                            <p class="mb-2.5">You can also clear the browser cache or try a different browser. We had a similar issue with Chrome extensions interfering before.</p>

                                                            <a href="javascript:void(0);" class="badge bg-light text-default-400">
                                                                <i class="iconify tabler--corner-up-left text-sm"></i>
                                                                Reply
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="border-default-300 mb-5 rounded border border-dashed p-5">
                                                <div class="flex gap-2.5">
                                                    <div class="shrink-0">
                                                        <img src="assets/images/users/user-10.jpg" alt="" class="size-8 rounded-full" />
                                                    </div>

                                                    <div>
                                                        <div>
                                                            <h5 class="mb-1.25">
                                                                Nina Bryant
                                                                <small class="text-default-400">16 Apr 2025 · 08:04AM</small>
                                                            </h5>
                                                            <p class="mb-4">
                                                                The
                                                                <a href="javascript:void(0)" class="text-primary underline">System Status Page</a>
                                                                has been updated. We're actively monitoring and will release a patch within 24 hours.
                                                            </p>

                                                            <a href="javascript:void(0);" class="badge bg-light text-default-400">
                                                                <i class="iconify tabler--corner-up-left text-sm"></i>
                                                                Reply
                                                            </a>
                                                        </div>

                                                        <div class="mt-7.5 flex gap-2.5">
                                                            <div class="shrink-0">
                                                                <img src="assets/images/users/user-6.jpg" alt="" class="size-8 rounded-full" />
                                                            </div>

                                                            <div>
                                                                <h5 class="mb-1.25">
                                                                    Daniel West
                                                                    <small class="text-default-400">16 Apr 2025 · 08:30AM</small>
                                                                </h5>
                                                                <p class="mb-2.5">Thanks for the update! We'll notify the customers and let them know the issue is being resolved.</p>

                                                                <a href="javascript:void(0);" class="badge bg-light text-default-400">
                                                                    <i class="iconify tabler--corner-up-left text-sm"></i>
                                                                    Reply
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <nav class="flex items-center justify-center gap-1.5" aria-label="Pagination">
                                                <button type="button" class="btn btn-icon size-8.5 border-default-300 hover:bg-default-100 hover:text-primary rounded-full" aria-label="Previous">
                                                    <i class="iconify tabler--chevron-left"></i>
                                                </button>
                                                <button type="button" class="btn btn-icon size-8.5 bg-primary rounded-full text-white">1</button>
                                                <button type="button" class="btn btn-icon size-8.5 border-default-300 hover:bg-default-100 hover:text-primary rounded-full">2</button>
                                                <button type="button" class="btn btn-icon size-8.5 border-default-300 hover:bg-default-100 hover:text-primary rounded-full">3</button>
                                                <button type="button" class="btn btn-icon size-8.5 border-default-300 hover:bg-default-100 hover:text-primary rounded-full">...</button>
                                                <button type="button" class="btn btn-icon size-8.5 border-default-300 hover:bg-default-100 hover:text-primary rounded-full">5</button>
                                                <button type="button" class="btn btn-icon size-8.5 border-default-300 hover:bg-default-100 hover:text-primary rounded-full">6</button>
                                                <button type="button" class="btn btn-icon size-8.5 border-default-300 hover:bg-default-100 hover:text-primary rounded-full" aria-label="Next">
                                                    <i class="iconify tabler--chevron-right"></i>
                                                </button>
                                            </nav>
                                        </div>

                                        <div id="activity-tab" class="hidden" role="tabpanel" aria-labelledby="activity">
                                            <div class="border-default-300 flex gap-1.5 border-b border-dashed pb-5">
                                                <div class="me-2.5 shrink-0">
                                                    <img src="assets/images/users/user-1.jpg" class="size-9 rounded-full" alt="" />
                                                </div>
                                                <div class="text-default-400 grow">
                                                    <span class="text-default-700 text-sm font-medium">Daniel Martinez</span>
                                                    uploaded a revised contract file.
                                                    <p class="text-default-400 text-xs">Today 10:15 am - 24 Apr, 2025</p>
                                                </div>
                                                <p class="text-default-400 text-xs">5m ago</p>
                                            </div>

                                            <div class="border-default-300 flex gap-1.5 border-b border-dashed py-5">
                                                <div class="me-2.5 shrink-0">
                                                    <img src="assets/images/users/user-2.jpg" class="size-9 rounded-full" alt="" />
                                                </div>
                                                <div class="text-default-400 grow">
                                                    <span class="text-default-700 text-sm font-medium">Nina Patel</span>
                                                    commented on your design update.
                                                    <p class="text-default-400 text-xs">Today 8:00 am - 24 Apr, 2025</p>
                                                </div>
                                                <p class="text-default-400 text-xs">2h ago</p>
                                            </div>

                                            <div class="border-default-300 flex gap-1.5 border-b border-dashed py-5">
                                                <div class="me-2.5 shrink-0">
                                                    <img src="assets/images/users/user-3.jpg" class="size-9 rounded-full" alt="" />
                                                </div>
                                                <div class="text-default-400 grow">
                                                    <span class="text-default-700 text-sm font-medium">Jason Lee</span>
                                                    completed the feedback review.
                                                    <p class="text-default-400 text-xs">Yesterday 6:10 pm - 23 Apr, 2025</p>
                                                </div>
                                                <p class="text-default-400 text-xs">16h ago</p>
                                            </div>

                                            <div class="border-default-300 flex gap-1.5 border-b border-dashed py-5">
                                                <div class="me-2.5 shrink-0">
                                                    <img src="assets/images/users/user-4.jpg" class="size-9 rounded-full" alt="" />
                                                </div>
                                                <div class="text-default-400 grow">
                                                    <span class="text-default-700 text-sm font-medium">Emma Davis</span>
                                                    shared a link in the marketing group chat.
                                                    <p class="text-default-400 mb-2.5 text-xs">Yesterday 3:25 pm - 23 Apr, 2025</p>
                                                    <a href="#!" class="btn border-default-300 hover:bg-default-50 text-default-700 border border-dashed px-1.5 py-0">
                                                        <i class="iconify tabler--link 1"></i>
                                                        View
                                                    </a>
                                                </div>
                                                <p class="text-default-400 text-xs">19h ago</p>
                                            </div>

                                            <div class="border-default-300 flex gap-1.5 border-b border-dashed py-5">
                                                <div class="me-2.5 shrink-0">
                                                    <img src="assets/images/users/user-5.jpg" class="size-9 rounded-full" alt="" />
                                                </div>
                                                <div class="text-default-400 grow">
                                                    <span class="text-default-700 text-sm font-medium">Leo Zhang</span>
                                                    sent you a private message.
                                                    <p class="text-default-400 mb-2.5 text-xs">2 days ago 11:45 am - 22 Apr, 2025</p>
                                                    <div class="bg-light/50 px-5 py-3">"Let’s sync up on the product roadmap tomorrow afternoon, does 2 PM work for you?"</div>
                                                </div>
                                                <p class="text-default-400 text-xs">30h ago</p>
                                            </div>

                                            <div class="flex items-center justify-center gap-2.5 p-3 md:p-5">
                                                <strong>Loading...</strong>
                                                <div class="text-danger inline-block size-4 animate-spin rounded-full border-2 border-current border-t-transparent" role="status" aria-label="loading">
                                                    <span class="sr-only">Loading...</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Team Sidebar -->
                        <div class="card h-full lg:rounded-s-none shadow-none">
                            <div class="border-default-300 border-b border-dashed p-5">
                                <h5 class="mb-2.5">Status</h5>
                                <div class="input-icon-group">
                                    <i class="iconify tabler--calendar-clock input-icon"></i>
                                    <select class="form-select">
                                        <option>Status</option>
                                        <option selected value="New">New</option>
                                        <option value="In Progress">In Progress</option>
                                        <option value="On Hold">On Hold</option>
                                        <option value="Completed">Completed</option>
                                    </select>
                                </div>
                            </div>

                            <div class="border-default-300 border-b border-dashed p-5">
                                <div class="mb-5 flex items-center justify-between">
                                    <h5 class="font-semibold">Team Members:</h5>
                                    <a href="javascript: void(0);" class="btn bg-light btn-icon size-7.75 rounded-full">
                                        <i class="iconify tabler--plus"></i>
                                    </a>
                                </div>

                                <!-- team member -->
                                <div class="flex items-center justify-between pb-2.5">
                                    <div class="flex items-center gap-2.5 py-1.25">
                                        <div class="size-8">
                                            <img src="assets/images/users/user-3.jpg" alt="avatar-3" class="img-fluid rounded-full" />
                                        </div>
                                        <div>
                                            <h5 class="text-nowrap">
                                                <a href="#!" class="hover:text-primary">Ava Brooks</a>
                                            </h5>
                                            <p class="text-default-400 text-2xs">UI/UX Designer</p>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="#" class="btn btn-sm btn-icon btn-default border-default-300 hover:border-default-400 hover:bg-default-100 size-7.75 border" title="Message">
                                            <i class="iconify tabler--message text-default-400 text-base"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between pb-2.5">
                                    <div class="flex items-center gap-2.5 py-1.25">
                                        <div class="size-8">
                                            <img src="assets/images/users/user-4.jpg" alt="avatar-4" class="img-fluid rounded-full" />
                                        </div>
                                        <div>
                                            <h5 class="text-nowrap">
                                                <a href="#!" class="hover:text-primary">Liam Carter</a>
                                            </h5>
                                            <p class="text-default-400 text-2xs">Frontend Developer</p>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="#" class="btn btn-sm btn-icon btn-default border-default-300 hover:border-default-400 hover:bg-default-100 size-7.75 border" title="Message">
                                            <i class="iconify tabler--message text-default-400 text-base"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between pb-2.5">
                                    <div class="flex items-center gap-2.5 py-1.25">
                                        <div class="size-8">
                                            <img src="assets/images/users/user-9.jpg" alt="avatar-9" class="img-fluid rounded-full" />
                                        </div>
                                        <div>
                                            <h5 class="text-nowrap">
                                                <a href="#!" class="hover:text-primary">Olivia Reed</a>
                                            </h5>
                                            <p class="text-default-400 text-2xs">Product Owner</p>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="#" class="btn btn-sm btn-icon btn-default border-default-300 hover:border-default-400 hover:bg-default-100 size-7.75 border" title="Message">
                                            <i class="iconify tabler--message text-default-400 text-base"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2.5">
                                        <div class="size-8">
                                            <img src="assets/images/users/user-10.jpg" alt="avatar-10" class="img-fluid rounded-full" />
                                        </div>
                                        <div>
                                            <h5 class="text-nowrap">
                                                <a href="#!" class="hover:text-primary">Daniel Craig</a>
                                            </h5>
                                            <p class="text-default-400 text-2xs">Data Scientist</p>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="#" class="btn btn-sm btn-icon btn-default border-default-300 hover:border-default-400 hover:bg-default-100 size-7.75 border" title="Message">
                                            <i class="iconify tabler--message text-default-400 text-base"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="border-default-300 border-b border-dashed px-5 pt-5">
                                <div class="mb-5 flex items-center justify-between">
                                    <h5 class="font-semibold">Files:</h5>
                                    <a href="javascript: void(0);" class="btn bg-light btn-icon size-7.75 rounded-full">
                                        <i class="iconify tabler--plus"></i>
                                    </a>
                                </div>

                                <!-- Download Files -->
                                <div class="flex items-center justify-between pb-2.5">
                                    <div class="flex items-center gap-2.5 py-1.25">
                                        <div class="btn bg-light btn-icon size-9">
                                            <i class="iconify tabler--file-text text-default-400 text-lg"></i>
                                        </div>
                                        <div>
                                            <h5 class="text-nowrap">
                                                <a href="#!" class="hover:text-primary">Project-Brief.pdf</a>
                                            </h5>
                                            <p class="text-default-400 text-2xs">2.1MB</p>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="#" class="btn btn-sm btn-icon btn-default border-default-300 hover:border-default-400 hover:bg-default-100 size-7.75 border" title="Download">
                                            <i class="iconify tabler--download text-base"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between pb-2.5">
                                    <div class="flex items-center gap-2.5 py-1.25">
                                        <div class="btn bg-light btn-icon size-9">
                                            <i class="iconify tabler--music text-default-400 text-lg"></i>
                                        </div>
                                        <div>
                                            <h5 class="text-nowrap">
                                                <a href="#!" class="hover:text-primary">Team-Intro.mp3</a>
                                            </h5>
                                            <p class="text-default-400 text-2xs">5.6MB</p>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="#" class="btn btn-sm btn-icon btn-default border-default-300 hover:border-default-400 hover:bg-default-100 size-7.75 border" title="Download">
                                            <i class="iconify tabler--download text-base"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="flex items-center justify-center gap-2.5 p-3 md:p-5">
                                    <strong>Loading...</strong>
                                    <div class="text-danger inline-block size-4 animate-spin rounded-full border-2 border-current border-t-transparent" role="status" aria-label="loading">
                                        <span class="sr-only">Loading...</span>
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