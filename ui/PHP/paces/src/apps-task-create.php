<!doctype html>
<html lang="en">

<head>
    <?php $title = "Create Task"; include('partials/title-meta.php'); ?>

    <?php include('./partials/head-css.php'); ?>
</head>

<body>
    <div class="wrapper">
        <?php $subtitle = "Apps"; $title = "Create Task"; include('./partials/topbar.php'); ?>

        <?php include('./partials/sidenav.php'); ?>

        <!-- Start Page Content here -->
        <div class="page-content">
            <main>

                <?php $subtitle = "Apps"; $title = "Create Task"; include('./partials/page-title.php'); ?>

                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <form>
                                <!-- Task Title -->
                                <div class="mb-5">
                                    <label for="taskTitle" class="form-label">
                                        Task Title
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-input" id="taskTitle" placeholder="Enter task title" required />
                                </div>
                                <!-- End Task Title -->

                                <!-- Task Description -->
                                <div class="mb-5">
                                    <label for="taskDescription" class="form-label">Description</label>
                                    <textarea class="form-textarea" id="taskDescription" rows="4" placeholder="Write a short task description..."></textarea>
                                </div>
                                <!-- End Task Description -->

                                <!-- Dates -->
                                <div class="mb-5 grid grid-cols-1 md:grid-cols-2 gap-base">
                                    <!-- Start Date -->
                                    <div>
                                        <label for="startDate" class="form-label">Start Date</label>
                                        <input type="text" data-provider="flatpickr" data-date-format="d M, Y" class="form-input" id="startDate" />
                                    </div>
                                    <!-- End Start Date -->

                                    <!-- Due Date -->
                                    <div>
                                        <label for="dueDate" class="form-label">Due Date</label>
                                        <input type="text" data-provider="flatpickr" data-date-format="d M, Y" class="form-input" id="dueDate" />
                                    </div>
                                    <!-- End Due Date -->
                                </div>
                                <!-- End Dates -->

                                <!-- Assigned To -->
                                <div class="mb-5">
                                    <label for="assignedTo" class="form-label">Assigned To</label>
                                    <select class="form-input" id="assignedTo">
                                        <option selected disabled>Choose member</option>
                                        <option value="1">Cruise</option>
                                        <option value="2">Maria</option>
                                        <option value="3">Chris</option>
                                        <option value="4">Alex</option>
                                    </select>
                                </div>
                                <!-- End Assigned To -->

                                <!-- Priority and Status -->
                                <div class="mb-5 grid grid-cols-1 md:grid-cols-2 gap-base">
                                    <!-- Priority -->
                                    <div>
                                        <label for="priority" class="form-label">Priority</label>
                                        <select class="form-input" id="priority">
                                            <option selected disabled>Select priority</option>
                                            <option value="High">High</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                        </select>
                                    </div>
                                    <!-- End Priority -->

                                    <!-- Status -->
                                    <div>
                                        <label for="task-status" class="form-label">Status</label>
                                        <select class="form-input" id="task-status">
                                            <option selected value="New">New</option>
                                            <option value="In Progress">In Progress</option>
                                            <option value="On Hold">On Hold</option>
                                            <option value="Completed">Completed</option>
                                        </select>
                                    </div>
                                    <!-- End Status -->
                                </div>
                                <!-- End Priority and Status -->

                                <!-- Attachment -->
                                <div class="mb-5">
                                    <label for="fileUpload" class="form-label">Attachment</label>
                                    <input type="file" name="file-input" id="fileUpload" class="form-input" />
                                </div>
                                <!-- End Attachment -->

                                <!-- Buttons -->
                                <div class="mt-7.5 flex justify-end">
                                    <button type="reset" class="btn bg-light me-2.5 hover:text-primary">Cancel</button>

                                    <button type="submit" class="btn bg-primary text-white hover:bg-primary-hover">
                                        <i class="iconify tabler--plus me-1"></i>
                                        Create Task
                                    </button>
                                </div>
                                <!-- End Buttons -->
                            </form>
                        </div>
                    </div>
                </div>
            </main>

            <?php include('./partials/footer.php'); ?>
        </div>
    </div>

    <?php include('./partials/customizer.php'); ?>

    <?php include('./partials/footer-scripts.php'); ?>
</body>

</html>