<!doctype html>
<html lang="en">

<head>
    <?php $title = "Add Staff"; include('partials/title-meta.php'); ?>

    <?php include('./partials/head-css.php'); ?>
</head>

<body>
    <div class="wrapper">
        <?php $subtitle = "HRM"; $title = "Add Staff"; include('./partials/topbar.php'); ?>

        <?php include('./partials/sidenav.php'); ?>

        <!-- Start Page Content here -->
        <div class="page-content">
            <main>

                <?php $subtitle = "HRM"; $title = "Add Staff"; include('./partials/page-title.php'); ?>

                <div class="container-fluid">
                    <!-- Add New Staff Form -->
                    <div class="card">
                        <div class="card-header border-solid">
                            <h4 class="card-title">Fill Details</h4>

                            <!-- Nav Tabs -->
                            <nav class="nav-tabs gap-0" aria-label="Tabs" id="staffTabs" role="tablist" aria-orientation="horizontal">
                                <button type="button" class="nav-link hs-tab-active:border-primary border-b border-transparent active" id="personal-tab" aria-selected="true" data-hs-tab="#personal" aria-controls="personal" role="tab">Personal Info</button>

                                <button type="button" class="nav-link hs-tab-active:border-primary border-b border-transparent" id="job-tab" aria-selected="false" data-hs-tab="#job" aria-controls="job" role="tab">Job Details</button>

                                <button type="button" class="nav-link hs-tab-active:border-primary border-b border-transparent" id="bank-tab" aria-selected="false" data-hs-tab="#bank" aria-controls="bank" role="tab">Bank & Salary</button>

                                <button type="button" class="nav-link hs-tab-active:border-primary border-b border-transparent" id="emergency-tab" aria-selected="false" data-hs-tab="#emergency" aria-controls="emergency" role="tab">Emergency Contact</button>

                                <button type="button" class="nav-link hs-tab-active:border-primary border-b border-transparent" id="access-tab" aria-selected="false" data-hs-tab="#access" aria-controls="access" role="tab">System Access</button>
                            </nav>
                        </div>

                        <div class="card-body">
                            <form id="addStaffForm">
                                <div id="staffTabsContent">
                                    <!-- Personal Info -->
                                    <div class="active" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-x-base gap-y-5">
                                            <div>
                                                <label for="firstName" class="form-label">First Name</label>
                                                <input id="firstName" type="text" class="form-input" required="" />
                                            </div>
                                            <div>
                                                <label for="lastName" class="form-label">Last Name</label>
                                                <input id="lastName" type="text" class="form-input" required="" />
                                            </div>
                                            <div>
                                                <label for="email" class="form-label">Email</label>
                                                <input id="email" type="email" class="form-input" required="" />
                                            </div>
                                            <div>
                                                <label for="phone" class="form-label">Phone</label>
                                                <input id="phone" type="text" class="form-input" />
                                            </div>
                                            <div>
                                                <label for="gender" class="form-label">Gender</label>
                                                <select id="gender" class="form-input">
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                    <option>Other</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label for="dob" class="form-label">Date of Birth</label>
                                                <input id="dob" type="text" class="form-input flatpickr-input" data-provider="flatpickr" data-date-format="d M, Y" readonly="readonly" />
                                            </div>
                                            <div>
                                                <label for="maritalStatus" class="form-label">Marital Status</label>
                                                <select id="maritalStatus" class="form-input">
                                                    <option>Single</option>
                                                    <option>Married</option>
                                                    <option>Divorced</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label for="nationality" class="form-label">Nationality</label>
                                                <input id="nationality" type="text" class="form-input" />
                                            </div>
                                            <div>
                                                <label for="bloodGroup" class="form-label">Blood Group</label>
                                                <select id="bloodGroup" class="form-input">
                                                    <option>O+</option>
                                                    <option>O-</option>
                                                    <option>A+</option>
                                                    <option>A-</option>
                                                    <option>B+</option>
                                                    <option>B-</option>
                                                    <option>AB+</option>
                                                    <option>AB-</option>
                                                </select>
                                            </div>
                                            <div class="md:col-span-3">
                                                <label for="address" class="form-label">Address</label>
                                                <textarea id="address" class="form-textarea" rows="2"></textarea>
                                            </div>
                                            <div>
                                                <label for="city" class="form-label">City</label>
                                                <input id="city" type="text" class="form-input" />
                                            </div>
                                            <div>
                                                <label for="state" class="form-label">State</label>
                                                <input id="state" type="text" class="form-input" />
                                            </div>
                                            <div>
                                                <label for="country" class="form-label">Country</label>
                                                <input id="country" type="text" class="form-input" />
                                            </div>
                                            <div>
                                                <label for="postalCode" class="form-label">Postal Code</label>
                                                <input id="postalCode" type="text" class="form-input" />
                                            </div>
                                            <div>
                                                <label for="idType" class="form-label">ID Type</label>
                                                <select id="idType" class="form-input">
                                                    <option>Passport</option>
                                                    <option>National ID</option>
                                                    <option>Driving License</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label for="idNumber" class="form-label">ID Number</label>
                                                <input id="idNumber" type="text" class="form-input" />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Job Details -->
                                    <div class="hidden" id="job" role="tabpanel" aria-labelledby="job-tab">
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-x-base gap-y-5">
                                            <div>
                                                <label for="employeeId" class="form-label">Employee ID</label>
                                                <input id="employeeId" type="text" class="form-input" value="EMP-8941" placeholder="EMP-XXXX" />
                                            </div>
                                            <div>
                                                <label for="department" class="form-label">Department</label>
                                                <select id="department" class="form-input">
                                                    <option>IT</option>
                                                    <option>HR</option>
                                                    <option>Finance</option>
                                                    <option>Design</option>
                                                    <option>Sales</option>
                                                    <option>Operations</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label for="designation" class="form-label">Designation</label>
                                                <input id="designation" type="text" class="form-input" placeholder="e.g., Software Engineer" />
                                            </div>
                                            <div>
                                                <label for="team" class="form-label">Team</label>
                                                <input id="team" type="text" class="form-input" />
                                            </div>
                                            <div>
                                                <label for="joiningDate" class="form-label">Joining Date</label>
                                                <input id="joiningDate" type="text" class="form-input flatpickr-input" data-provider="flatpickr" data-date-format="d M, Y" readonly="readonly" />
                                            </div>
                                            <div>
                                                <label for="shift" class="form-label">Shift</label>
                                                <select id="shift" class="form-input">
                                                    <option>Morning</option>
                                                    <option>Mid Shift</option>
                                                    <option>Night Shift</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label for="employmentType" class="form-label">Employment Type</label>
                                                <select id="employmentType" class="form-input">
                                                    <option>Full-Time</option>
                                                    <option>Part-Time</option>
                                                    <option>Contract</option>
                                                    <option>Intern</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label for="workMode" class="form-label">Work Mode</label>
                                                <select id="workMode" class="form-input">
                                                    <option>Onsite</option>
                                                    <option>Hybrid</option>
                                                    <option>Remote</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label for="manager" class="form-label">Manager / Reporting To</label>
                                                <input id="manager" type="text" class="form-input" />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Bank & Salary -->
                                    <div class="hidden" id="bank" role="tabpanel" aria-labelledby="bank-tab">
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-x-base gap-y-5">
                                            <div>
                                                <label for="bankName" class="form-label">Bank Name</label>
                                                <input id="bankName" type="text" class="form-input" />
                                            </div>
                                            <div>
                                                <label for="accountNumber" class="form-label">Account Number</label>
                                                <input id="accountNumber" type="text" class="form-input" />
                                            </div>
                                            <div>
                                                <label for="ifscCode" class="form-label">IFSC / SWIFT Code</label>
                                                <input id="ifscCode" type="text" class="form-input" />
                                            </div>
                                            <div>
                                                <label for="branch" class="form-label">Branch</label>
                                                <input id="branch" type="text" class="form-input" />
                                            </div>
                                            <div>
                                                <label for="taxId" class="form-label">PAN / Tax ID</label>
                                                <input id="taxId" type="text" class="form-input" />
                                            </div>
                                            <div>
                                                <label for="salary" class="form-label">Salary (Monthly)</label>
                                                <input id="salary" type="number" class="form-input" placeholder="USD $" />
                                            </div>
                                            <div>
                                                <label for="paymentMode" class="form-label">Payment Mode</label>
                                                <select id="paymentMode" class="form-input">
                                                    <option>Bank Transfer</option>
                                                    <option>Cheque</option>
                                                    <option>Cash</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label for="pfNumber" class="form-label">PF Number</label>
                                                <input id="pfNumber" type="text" class="form-input" />
                                            </div>
                                            <div>
                                                <label for="esiNumber" class="form-label">ESI Number</label>
                                                <input id="esiNumber" type="text" class="form-input" />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Emergency Contact -->
                                    <div class="hidden" id="emergency" role="tabpanel" aria-labelledby="emergency-tab">
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-x-base gap-y-5">
                                            <div>
                                                <label for="emergencyName" class="form-label">Name</label>
                                                <input id="emergencyName" type="text" class="form-input" />
                                            </div>
                                            <div>
                                                <label for="emergencyRelation" class="form-label">Relation</label>
                                                <input id="emergencyRelation" type="text" class="form-input" placeholder="e.g., Mother" />
                                            </div>
                                            <div>
                                                <label for="emergencyPhone" class="form-label">Phone Number</label>
                                                <input id="emergencyPhone" type="text" class="form-input" />
                                            </div>
                                            <div class="md:col-span-3">
                                                <label for="emergencyAddress" class="form-label">Address</label>
                                                <textarea id="emergencyAddress" class="form-textarea" rows="2"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- System Access -->
                                    <div class="hidden" id="access" role="tabpanel" aria-labelledby="access-tab">
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-x-base gap-y-5">
                                            <div>
                                                <label for="username" class="form-label">Username</label>
                                                <input id="username" type="text" class="form-input" />
                                            </div>
                                            <div>
                                                <label for="password" class="form-label">Password</label>
                                                <input id="password" type="password" class="form-input" />
                                            </div>
                                            <div>
                                                <label for="role" class="form-label">Role</label>
                                                <select id="role" class="form-input">
                                                    <option>Admin</option>
                                                    <option>Manager</option>
                                                    <option>Staff</option>
                                                    <option>HR</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label for="ac-status" class="form-label">Status</label>
                                                <select id="ac-status" class="form-input">
                                                    <option>Active</option>
                                                    <option>Inactive</option>
                                                    <option>Suspended</option>
                                                </select>
                                            </div>
                                            <div class="md:col-span-3">
                                                <div class="items-cneter flex gap-2">
                                                    <input id="sendCredentials" class="form-checkbox" type="checkbox" />
                                                    <label for="sendCredentials" class="font-normal">Send login credentials to staff via email</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Buttons -->
                                <div class="mt-7.5 flex justify-end gap-3">
                                    <button type="reset" class="btn bg-light hover:text-primary">Reset</button>
                                    <button type="submit" class="btn bg-success text-white hover:bg-success-hover">Save Staff</button>
                                </div>
                            </form>
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