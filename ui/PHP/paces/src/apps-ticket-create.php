<!doctype html>
<html lang="en">

<head>
    <?php $title = "Create New Ticket"; include('partials/title-meta.php'); ?>

    <?php include('./partials/head-css.php'); ?>
</head>

<body>
    <div class="wrapper">
        <?php $subtitle = "Support"; $title = "Create New Ticket"; include('./partials/topbar.php'); ?>

        <?php include('./partials/sidenav.php'); ?>

        <!-- Start Page Content here -->
        <div class="page-content">
            <main>

                <?php $subtitle = "Support"; $title = "Create New Ticket"; include('./partials/page-title.php'); ?>

                <div class="container-fluid">
                    <div class="2xl:w-10/12 w-full mx-auto">
                        <div class="card">
                            <div class="card-body">
                                <!-- form -->
                                <form action="#" method="post">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-base gap-y-5">
                                        <!-- Requester Name -->
                                        <div class="md:col-span-2">
                                            <label for="requester" class="form-label">Requester Name</label>
                                            <input type="text" class="form-input" id="requester" placeholder="Enter your full name" />
                                        </div>

                                        <!-- Email -->
                                        <div class="md:col-span-2">
                                            <label for="email" class="form-label">Email Address</label>
                                            <input type="email" class="form-input" id="email" placeholder="you&#64;example.com" />
                                        </div>

                                        <!-- Subject -->
                                        <div class="md:col-span-2">
                                            <label for="subject" class="form-label">Ticket Subject</label>
                                            <input type="text" class="form-input" id="subject" placeholder="Brief summary of the issue" />
                                        </div>

                                        <!-- Priority -->
                                        <div>
                                            <label for="priority" class="form-label">Priority</label>
                                            <select id="priority" class="form-select">
                                                <option selected="" disabled="">Choose...</option>
                                                <option value="Low">Low</option>
                                                <option value="Medium">Medium</option>
                                                <option value="High">High</option>
                                                <option value="Urgent">Urgent</option>
                                            </select>
                                        </div>

                                        <!-- Status -->
                                        <div>
                                            <label for="tickstatus" class="form-label">Status</label>
                                            <select id="tickstatus" class="form-select">
                                                <option selected="" disabled="">Choose...</option>
                                                <option value="Pending">Pending</option>
                                                <option value="In Progress">In Progress</option>
                                                <option value="Resolved">Resolved</option>
                                                <option value="Closed">Closed</option>
                                            </select>
                                        </div>

                                        <!-- Tags -->
                                        <div class="md:col-span-2">
                                            <label for="tags" class="form-label">Tags (comma-separated)</label>
                                            <input type="text" class="form-input" id="tags" placeholder="e.g. login, error, payment" />
                                        </div>

                                        <!-- Description -->
                                        <div class="mb-7.5 md:col-span-2">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea id="description" class="form-textarea" rows="5" placeholder="Describe the issue in detail..."></textarea>
                                        </div>
                                    </div>

                                    <!-- Buttons -->
                                    <div class="flex justify-center gap-3">
                                        <button type="submit" class="btn bg-primary text-white hover:bg-primary-hover">
                                            <i class="iconify tabler--plus"></i>
                                            Submit Ticket
                                        </button>

                                        <button type="reset" class="btn border-secondary hover:bg-secondary text-secondary hover:text-white">
                                            <i class="iconify tabler--refresh"></i>
                                            Reset
                                        </button>
                                    </div>
                                </form>
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