<!DOCTYPE html>
<html lang="en">

<head>
    <?php $title = "Profile"; include('partials/title-meta.php'); ?>

    <?php include('./partials/head-css.php'); ?>
</head>

<body>

    <div class="wrapper">
        <?php $subtitle = "Pages"; $title = "Profile"; include('./partials/topbar.php'); ?>

        <?php include('./partials/sidenav.php'); ?>

        <!-- Start Page Content here -->
        <div class="page-content">
            <main>

                <?php $subtitle = "Pages"; $title = "Profile"; include('./partials/page-title.php'); ?>

                <div class="container-fluid">
                    <div>
                        <article class="card">
                            <div class="relative overflow-hidden h-62.5 bg-cover bg-center rounded-md" style="min-height: 300px; background-image: url(assets/images/profile-bg.jpg);">
                                <div class="absolute inset-0 flex flex-col items-center justify-center p-9 bg-linear-to-t from-[#313A46] via-[#313a46cc] to-[#313a4680] text-center">
                                    <h3 class="text-white italic text-2xl mb-1.5">
                                        "Crafting innovation through clean design"
                                    </h3>
                                    <p class="text-white mb-base">– MyStatus</p>
                                </div>
                            </div>
                        </article>
                    </div>

                    <div class="-mt-7.5 md:px-6 px-4">
                        <div class="grid lg:grid-cols-3 grid-cols-1 gap-base">
                            <div>
                                <div class="card sticky top-[calc(var(--topbar-height)+1.5rem)]">
                                    <div class="card-body">
                                        <div class="flex justify-between items-center mb-7.5">
                                            <div class="flex items-center gap-base">
                                                <img src="assets/images/users/user-1.jpg" alt="avatar" class="size-18 rounded-full object-cover" />

                                                <div>
                                                    <div class="flex items-center gap-3">
                                                        <h4 class="text-md"><a href="#!">David Dev</a></h4>
                                                        <img src="assets/images/flags/us.svg" alt="US" class="rounded-full size-4" />
                                                    </div>
                                                    <p class="text-default-400 text-sm mb-3">Senior Developer</p>
                                                    <span class="badge badge-label bg-light">Team Lead</span>
                                                </div>
                                            </div>
                                            <div class="ms-auto relative">
                                                <div class="hs-dropdown [--placement:bottom-right] relative inline-flex">
                                                    <button type="button" class="hs-dropdown-toggle btn btn-icon text-default-500 hover:bg-default-100" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                                        <i class="iconify tabler--dots-vertical text-xl"></i>
                                                    </button>

                                                    <div class="hs-dropdown-menu" role="menu" aria-orientation="vertical">
                                                        <a class="dropdown-item" href="#">Edit profile</a>
                                                        <a class="dropdown-item text-danger" href="#">Report</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="space-y-3">
                                            <div class="flex items-center gap-3">
                                                <div>
                                                    <div class="size-8 flex items-center justify-center rounded-full bg-light">
                                                        <i class="iconify tabler--briefcase text-lg"></i>
                                                    </div>
                                                </div>
                                                <p class="text-sm">UI/UX Designer & Full-Stack Developer</p>
                                            </div>

                                            <div class="flex items-center gap-3">
                                                <div class="size-8 flex items-center justify-center rounded-full bg-light">
                                                    <i class="iconify tabler--school text-lg"></i>
                                                </div>

                                                <p class="text-sm">
                                                    Studied at
                                                    <span class="font-semibold text-default-700">Stanford University</span>
                                                </p>
                                            </div>

                                            <div class="flex items-center gap-3">
                                                <div class="size-8 flex items-center justify-center rounded-full bg-light">
                                                    <i class="iconify tabler--map-pin text-lg"></i>
                                                </div>

                                                <p class="text-sm">
                                                    Lives in
                                                    <span class="font-semibold text-default-700">San Francisco, CA</span>
                                                </p>
                                            </div>

                                            <div class="flex items-center gap-3">
                                                <div class="size-8 flex items-center justify-center rounded-full bg-light">
                                                    <i class="iconify tabler--users text-lg"></i>
                                                </div>

                                                <p class="text-sm">
                                                    Followed by
                                                    <span class="font-semibold text-default-700">25.3k People</span>
                                                </p>
                                            </div>

                                            <div class="flex items-center gap-3">
                                                <div class="size-8 flex items-center justify-center rounded-full bg-light">
                                                    <i class="iconify tabler--mail text-lg"></i>
                                                </div>

                                                <p class="text-sm">
                                                    Email
                                                    <a href="mailto:hello&#64;example.com" class="text-primary font-semibold">hello&#64;example.com</a>
                                                </p>
                                            </div>

                                            <div class="flex items-center gap-3">
                                                <div class="size-8 flex items-center justify-center rounded-full bg-light">
                                                    <i class="iconify tabler--link text-lg"></i>
                                                </div>

                                                <p class="text-sm">
                                                    Website
                                                    <a href="https://www.example.dev" class="text-primary font-semibold">www.example.dev</a>
                                                </p>
                                            </div>

                                            <div class="flex items-center gap-3">
                                                <div>
                                                    <div class="size-8 flex items-center justify-center rounded-full bg-light">
                                                        <i class="iconify tabler--world text-lg"></i>
                                                    </div>
                                                </div>

                                                <p class="text-sm">
                                                    Languages
                                                    <span class="font-semibold text-default-700">English, Hindi, Japanese</span>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="flex flex-wrap items-center md:justify-center justify-start gap-3 mt-7.5 mb-3">
                                            <a href="#" class="btn btn-icon bg-primary hover:bg-primary-hover rounded-full">
                                                <svg class="text-lg text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                                                </svg>
                                            </a>

                                            <a href="#" class="btn btn-icon bg-info hover:bg-info-hover rounded-full">
                                                <svg class="text-lg text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M4 4l11.733 16h4.267l-11.733 -16z" />
                                                    <path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772" />
                                                </svg>
                                            </a>

                                            <a href="#" class="btn btn-icon bg-danger hover:bg-danger-hover rounded-full">
                                                <svg class="text-lg text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M4 8a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" />
                                                    <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                                    <path d="M16.5 7.5v.01" />
                                                </svg>
                                            </a>

                                            <a href="#" class="btn btn-icon bg-success hover:bg-success-hover rounded-full">
                                                <svg class="text-lg text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                                    <path d="M9 3.6c5 6 7 10.5 7.5 16.2" />
                                                    <path d="M6.4 19c3.5 -3.5 6 -6.5 14.5 -6.4" />
                                                    <path d="M3.1 10.75c5 0 9.814 -.38 15.314 -5" />
                                                </svg>
                                            </a>

                                            <a href="#" class="btn btn-icon bg-secondary hover:bg-secondary-hover rounded-full">
                                                <svg class="text-lg text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M8 11v5" />
                                                    <path d="M8 8v.01" />
                                                    <path d="M12 16v-5" />
                                                    <path d="M16 16v-3a2 2 0 1 0 -4 0" />
                                                    <path d="M3 7a4 4 0 0 1 4 -4h10a4 4 0 0 1 4 4v10a4 4 0 0 1 -4 4h-10a4 4 0 0 1 -4 -4z" />
                                                </svg>
                                            </a>

                                            <a href="#" class="btn btn-icon bg-danger hover:bg-danger-hover rounded-full">
                                                <svg class="text-lg text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M2 8a4 4 0 0 1 4 -4h12a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-12a4 4 0 0 1 -4 -4v-8z" />
                                                    <path d="M10 9l5 3l-5 3z" />
                                                </svg>
                                            </a>
                                        </div>

                                        <h4 class="card-title md:mt-7.5 mt-7 mb-base">Skills</h4>

                                        <div class="flex flex-wrap itmes-center gap-1.5">
                                            <a href="#" class="btn btn-sm bg-light hover:text-primary">Product Design</a>
                                            <a href="#" class="btn btn-sm bg-light hover:text-primary">UI/UX</a>
                                            <a href="#" class="btn btn-sm bg-light hover:text-primary">Tailwind CSS</a>
                                            <a href="#" class="btn btn-sm bg-light hover:text-primary">Bootstrap</a>
                                            <a href="#" class="btn btn-sm bg-light hover:text-primary">React.js</a>
                                            <a href="#" class="btn btn-sm bg-light hover:text-primary">Next.js</a>
                                            <a href="#" class="btn btn-sm bg-light hover:text-primary">Vue.js</a>
                                            <a href="#" class="btn btn-sm bg-light hover:text-primary">Figma</a>
                                            <a href="#" class="btn btn-sm bg-light hover:text-primary">Design Systems</a>
                                            <a href="#" class="btn btn-sm bg-light hover:text-primary">Template Authoring</a>
                                            <a href="#" class="btn btn-sm bg-light hover:text-primary">Responsive Design</a>
                                            <a href="#" class="btn btn-sm bg-light hover:text-primary">Component Libraries</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="lg:col-span-2">
                                <div class="card">
                                    <div class="card-header border-solid">
                                        <h4 class="card-title">My Account</h4>

                                        <nav class="nav-tabs" aria-label="Tabs" id="staffTabs" role="tablist" aria-orientation="horizontal">
                                            <button type="button" class="nav-link hs-tab-active:border-primary hs-tab-active:text-primary border-b px-4 font-semibold border-transparent" id="about-tab" aria-selected="true" data-hs-tab="#about" aria-controls="about" role="tab">
                                                <span class="md:block hidden">About Me</span>
                                                <i class="iconify tabler--user-circle md:hidden block text-base"></i>
                                            </button>
                                            <button type="button" class="nav-link hs-tab-active:border-primary hs-tab-active:text-primary border-b px-4 font-semibold border-transparent active" id="timeline-tab" aria-selected="false" data-hs-tab="#timeline" aria-controls="timeline" role="tab">
                                                <span class="md:block hidden">Timeline</span>
                                                <i class="iconify tabler--clock md:hidden block text-base"></i>
                                            </button>
                                            <button type="button" class="nav-link hs-tab-active:border-primary hs-tab-active:text-primary border-b px-4 font-semibold border-transparent" id="Settings-tab" aria-selected="false" data-hs-tab="#Settings" aria-controls="Settings" role="tab">
                                                <span class="md:block hidden">Settings</span>
                                                <i class="iconify tabler--settings md:hidden block text-base"></i>
                                            </button>
                                        </nav>
                                    </div>

                                    <div class="card-body">
                                        <div class="hidden" id="about" role="tabpanel" aria-labelledby="about-tab">
                                            <p class="mb-4">I'm an Admin Template Author dedicated to building clean, efficient, and highly customizable dashboards for developers and businesses. My goal is to create UI solutions that are modern, scalable, and easy to integrate.</p>
                                            <p class="mb-4">I specialize in crafting developer-friendly admin panels and UI kits using frameworks like Bootstrap, Tailwind CSS, React, Vue, Angular, Laravel, and Next.js. My templates are designed to accelerate development and provide a strong foundation for web apps, SaaS platforms, and enterprise tools.</p>
                                            <p>I focus on delivering well-structured, pixel-perfect layouts with a user-centric approach—ensuring responsive design, clean code, and seamless user experiences. Whether you're building a CRM, analytics dashboard, or backend system, my templates are made to help you build faster and smarter.</p>
                                            <div class="my-5 flex items-center gap-1">
                                                <i class="iconify tabler--briefcase"></i>
                                                <h4 class="card-title uppercase text-sm">Professional Experience:</h4>
                                            </div>
                                            <div>
                                                <!-- Experience 1 -->
                                                <div class="flex gap-x-base">
                                                    <div class="md:w-25 w-15 text-end">
                                                        <span class="text-default-400">2023 – Present</span>
                                                    </div>

                                                    <div class="relative after:absolute after:top-3 after:bottom-0 after:start-1/2 after:w-px after:border-default-300 after:border after:border-dashed last:after:hidden">
                                                        <div class="relative z-10 flex justify-center items-center">
                                                            <div class="size-3.25 rounded-full bg-primary ms-0.5"></div>
                                                        </div>
                                                    </div>

                                                    <div class="flex-1 pb-7.5">
                                                        <h5 class="mb-1">Lead UI Developer</h5>
                                                        <p class="mb-1 text-default-400">Developing scalable and reusable UI components for SaaS dashboards using React, Tailwind CSS, and TypeScript.</p>
                                                        <span class="text-default-400 font-semibold">at CraftCode Studio</span>
                                                    </div>
                                                </div>

                                                <!-- Experience 2 -->
                                                <div class="flex gap-x-base">
                                                    <div class="md:w-25 w-15 text-end">
                                                        <span class="text-default-400">2021 – 2023</span>
                                                    </div>

                                                    <div class="relative after:absolute after:top-0 after:bottom-0 after:start-1/2 after:w-px after:border-default-300 after:border after:border-dashed last:after:hidden">
                                                        <div class="relative z-10 flex justify-center items-center">
                                                            <div class="size-3.25 rounded-full ms-0.5 bg-success"></div>
                                                        </div>
                                                    </div>

                                                    <div class="flex-1 pb-7.5">
                                                        <h5 class="mb-1">Frontend Engineer</h5>
                                                        <p class="mb-1 text-default-400">Built modern, responsive admin templates and UI kits using Vue, Tailwind 4, and Laravel Blade.</p>
                                                        <span class="text-default-400 font-semibold">at CodeNova</span>
                                                    </div>
                                                </div>

                                                <!-- Experience 3 -->
                                                <div class="flex gap-x-base">
                                                    <div class="md:w-25 w-15 text-end">
                                                        <span class="text-default-400">2019 – 2021</span>
                                                    </div>

                                                    <div class="relative after:absolute after:top-0 after:bottom-0 after:start-1/2 after:w-px after:border-default-300 after:border after:border-dashed last:after:hidden">
                                                        <div class="relative z-10 flex justify-center items-center">
                                                            <div class="size-3.25 rounded-full ms-0.5 bg-warning"></div>
                                                        </div>
                                                    </div>

                                                    <div class="flex-1 pb-7.5">
                                                        <h5 class="mb-1">UI/UX Designer & Developer</h5>
                                                        <p class="mb-1 text-default-400">Designed and developed dashboard layouts and admin panel concepts, focusing on accessibility and performance.</p>
                                                        <span class="text-default-400 font-semibold">as Freelancer</span>
                                                    </div>
                                                </div>

                                                <!-- Experience 4 -->
                                                <div class="flex gap-x-base">
                                                    <div class="md:w-25 w-15 text-end">
                                                        <span class="text-default-400">2017 – 2019</span>
                                                    </div>

                                                    <div class="relative after:absolute after:top-0 after:bottom-0 after:start-1/2 after:w-px after:border-default-300 after:border after:border-dashed last:after:hidden">
                                                        <div class="relative z-10 flex justify-center items-center">
                                                            <div class="size-3.25 rounded-full ms-0.5 bg-info"></div>
                                                        </div>
                                                    </div>

                                                    <div class="flex-1 pb-7.5">
                                                        <h5 class="mb-1">Web Designer</h5>
                                                        <p class="mb-1 text-default-400">Created responsive HTML/CSS templates and themes for clients in eCommerce and portfolio niches.</p>
                                                        <span class="text-default-400 font-semibold">at PixelFrame Agency</span>
                                                    </div>
                                                </div>

                                                <!-- Experience 5 -->
                                                <div class="flex gap-x-base">
                                                    <div class="md:w-25 w-15 text-end">
                                                        <span class="text-default-400">2015 – 2017</span>
                                                    </div>

                                                    <div>
                                                        <div class="relative z-10 flex justify-center items-center">
                                                            <div class="size-3.25 rounded-full ms-0.5 bg-secondary"></div>
                                                        </div>
                                                    </div>

                                                    <div class="flex-1">
                                                        <h5 class="mb-1">Junior Frontend Developer</h5>
                                                        <p class="mb-1 text-default-400">Maintained and updated legacy UI projects, gaining hands-on experience in HTML, CSS, jQuery, and Tailwind 4.</p>
                                                        <span class="text-primary font-semibold">at DevLaunch</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="my-5 flex items-center gap-1">
                                                <i class="iconify tabler--list-check"></i>
                                                <h4 class="card-title uppercase text-sm">Tasks Overview:</h4>
                                            </div>

                                            <div class="table-wrapper">
                                                <table class="min-w-full text-sm">
                                                    <thead class="border-b border-default-300 uppercase text-2xs font-semibold tracking-wider">
                                                        <tr>
                                                            <th data-table-sort="task">Task</th>
                                                            <th data-table-sort class="py-2 px-2 text-start">Status</th>
                                                            <th data-table-sort="name" class="py-2 px-2 text-start">Assigned By</th>
                                                            <th data-table-sort class="py-2 px-2 text-start">Start Date</th>
                                                            <th data-table-sort class="py-2 px-2 text-start">Priority</th>
                                                            <th data-table-sort class="py-2 px-2 text-start">Progress</th>
                                                            <th data-table-sort class="py-2 px-2 text-start">Total Time Spent</th>
                                                            <th class="py-2 px-2 w-7.5"></th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <tr class="hover:bg-default-50 transition">
                                                            <td class="py-2 ps-4.5 pe-2">
                                                                <h5 class="text-default-700 my-1">
                                                                    <a href="#">Blazor Admin Theme – Final QA</a>
                                                                </h5>
                                                                <span class="text-xs text-default-400">Due in 3 days</span>
                                                            </td>
                                                            <td class="p-2">
                                                                <span class="badge bg-warning/10 text-warning">In-progress</span>
                                                            </td>
                                                            <td class="p-2">
                                                                <div class="flex items-center gap-2">
                                                                    <img src="assets/images/users/user-7.jpg" alt="Jordan Walsh" class="size-8 rounded-full object-cover" />
                                                                    <div>
                                                                        <h5 class="text-nowrap">Jordan Walsh</h5>
                                                                        <p class="text-xs text-default-400">jordan&#64;uxlabs.io</p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="p-3">Jul 20, 2025</td>
                                                            <td class="p-2">
                                                                <span class="badge bg-danger/10 text-danger">High</span>
                                                            </td>
                                                            <td class="p-2">60%</td>
                                                            <td class="p-2">9h 10min</td>
                                                            <td>
                                                                <a href="#">
                                                                    <i class="iconify tabler--pencil text-lg text-default-400"></i>
                                                                </a>
                                                            </td>
                                                        </tr>

                                                        <tr class="hover:bg-default-50 transition">
                                                            <td class="py-2 ps-4.5 pe-2">
                                                                <h5 class="text-default-700 my-1">
                                                                    <a href="#">Vue 3 UI Kit Refactor</a>
                                                                </h5>
                                                                <span class="text-xs text-default-400">Due in 8 days</span>
                                                            </td>
                                                            <td class="p-2">
                                                                <span class="badge bg-success/10 text-success">Completed</span>
                                                            </td>
                                                            <td class="p-2">
                                                                <div class="flex items-center gap-2">
                                                                    <img src="assets/images/users/user-8.jpg" class="size-8 rounded-full object-cover" alt="Emily Foster" />
                                                                    <div>
                                                                        <h5 class="text-nowrap">Emily Foster</h5>
                                                                        <p class="text-xs text-default-400">emily&#64;devspark.pro</p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="p-3">Jul 10, 2025</td>
                                                            <td class="p-2">
                                                                <span class="badge bg-success/10 text-success">Low</span>
                                                            </td>
                                                            <td class="p-2">100%</td>
                                                            <td class="p-2">27h 20min</td>
                                                            <td>
                                                                <a href="#">
                                                                    <i class="iconify tabler--pencil text-lg text-default-400"></i>
                                                                </a>
                                                            </td>
                                                        </tr>

                                                        <tr class="hover:bg-default-50 transition">
                                                            <td class="py-2 ps-4.5 pe-2">
                                                                <h5 class="text-default-700 my-1">
                                                                    <a href="#">HTML Email Templates Pack</a>
                                                                </h5>
                                                                <span class="text-xs text-default-400">Due in 1 day</span>
                                                            </td>
                                                            <td class="p-2">
                                                                <span class="badge bg-warning/10 text-warning">In-progress</span>
                                                            </td>
                                                            <td class="p-2">
                                                                <div class="flex items-center gap-2">
                                                                    <img src="assets/images/users/user-9.jpg" class="size-8 rounded-full object-cover" alt="Ella Newman" />
                                                                    <div>
                                                                        <h5 class="text-nowrap">Ella Newman</h5>
                                                                        <p class="text-xs text-default-400">ella&#64;mailgenius.app</p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="p-3">Jul 18, 2025</td>
                                                            <td class="p-2">
                                                                <span class="badge bg-primary/10 text-primary">Medium</span>
                                                            </td>
                                                            <td class="p-2">55%</td>
                                                            <td class="p-2">5h 40min</td>
                                                            <td>
                                                                <a href="#">
                                                                    <i class="iconify tabler--pencil text-lg text-default-400"></i>
                                                                </a>
                                                            </td>
                                                        </tr>

                                                        <tr class="hover:bg-default-50 transition">
                                                            <td class="py-2 ps-4.5 pe-2">
                                                                <h5 class="text-default-700 my-1">
                                                                    <a href="#">Admin Migration</a>
                                                                </h5>
                                                                <span class="text-xs text-default-400">Due in 6 days</span>
                                                            </td>
                                                            <td class="p-2">
                                                                <span class="badge bg-default-400/20 text-default-600">On Hold</span>
                                                            </td>
                                                            <td class="p-2">
                                                                <div class="flex items-center gap-2">
                                                                    <img src="assets/images/users/user-10.jpg" class="size-8 rounded-full object-cover" alt="Daniel Rhodes" />
                                                                    <div>
                                                                        <h5 class="text-nowrap">Daniel Rhodes</h5>
                                                                        <p class="text-xs text-default-400">daniel&#64;uideck.net</p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="p-3">Jul 16, 2025</td>
                                                            <td class="p-2">
                                                                <span class="badge bg-secondary/10 text-secondary">Low</span>
                                                            </td>
                                                            <td class="p-2">25%</td>
                                                            <td class="p-2">4h 15min</td>
                                                            <td>
                                                                <a href="#">
                                                                    <i class="iconify tabler--pencil text-lg text-default-400"></i>
                                                                </a>
                                                            </td>
                                                        </tr>

                                                        <tr class="hover:bg-default-50 transition">
                                                            <td class="py-2 ps-4.5 pe-2">
                                                                <h5 class="text-default-700 my-1">
                                                                    <a href="#">SaaS Dashboard: UX Testing</a>
                                                                </h5>
                                                                <span class="text-xs text-default-400">Due in 9 days</span>
                                                            </td>
                                                            <td class="p-2">
                                                                <span class="badge bg-danger/10 text-danger">Outdated</span>
                                                            </td>
                                                            <td class="p-2">
                                                                <div class="flex items-center gap-2">
                                                                    <img src="assets/images/users/user-2.jpg" class="size-8 rounded-full object-cover" alt="Leo Patterson" />
                                                                    <div>
                                                                        <h5 class="text-nowrap">Leo Patterson</h5>
                                                                        <p class="text-xs text-default-400">leo&#64;uxcore.studio</p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="p-3">Jul 05, 2025</td>
                                                            <td class="p-2">
                                                                <span class="badge bg-danger/10 text-danger">High</span>
                                                            </td>
                                                            <td class="p-2">20%</td>
                                                            <td class="p-2">12h 30min</td>
                                                            <td>
                                                                <a href="#">
                                                                    <i class="iconify tabler--pencil text-lg text-default-400"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="active" id="timeline" role="tabpanel" aria-labelledby="timeline-tab">
                                            <!-- comment box -->
                                            <form action="#" class="mb-5">
                                                <textarea rows="3" class="form-textarea" placeholder="Write something..."></textarea>
                                                <div class="flex py-3 justify-between">
                                                    <div>
                                                        <a href="#" class="btn size-7.5 btn-icon bg-light hover:text-primary">
                                                            <i class="iconify tabler--user"></i>
                                                        </a>
                                                        <a href="#" class="btn size-7.5 btn-icon bg-light hover:text-primary">
                                                            <i class="iconify tabler--map-pin"></i>
                                                        </a>
                                                        <a href="#" class="btn size-7.5 btn-icon bg-light hover:text-primary">
                                                            <i class="iconify tabler--camera"></i>
                                                        </a>
                                                        <a href="#" class="btn size-7.5 btn-icon bg-light hover:text-primary">
                                                            <i class="iconify tabler--mood-smile"></i>
                                                        </a>
                                                    </div>
                                                    <button type="submit" class="btn btn-sm bg-dark text-white">Post</button>
                                                </div>
                                            </form>
                                            <!-- end comment box -->

                                            <!-- Story Box-->
                                            <div class="border border-light border-dashed rounded p-3 mb-base">
                                                <div class="flex items-center gap-3 mb-3">
                                                    <img class="size-9 rounded-full" src="assets/images/users/user-3.jpg" alt="Jeremy Tomlinson" />
                                                    <div class="w-full">
                                                        <h5 class="text-sm">Jeremy Tomlinson</h5>
                                                        <p class="text-default-400">
                                                            <small>about 2 minutes ago</small>
                                                        </p>
                                                    </div>
                                                </div>

                                                <p class="mb-4 text-sm">Story based around the idea of time lapse, animation to post soon!</p>

                                                <div class="flex flex-wrap items-center gap-3">
                                                    <img src="assets/images/stock/small-1.jpg" alt="post-img" class="rounded h-15" />
                                                    <img src="assets/images/stock/small-2.jpg" alt="post-img" class="rounded h-15" />
                                                    <img src="assets/images/stock/small-3.jpg" alt="post-img" class="rounded h-15" />
                                                </div>

                                                <div class="mt-3">
                                                    <a href="javascript: void(0);" class="btn btn-sm text-default-400 text-sm">
                                                        <i class="iconify tabler--corner-up-left text-sm"></i>
                                                        Reply
                                                    </a>

                                                    <a href="javascript: void(0);" class="btn btn-sm text-default-400 text-sm">
                                                        <div class="relative">
                                                            <span id="like-count-one"></span>
                                                            <button type="button" data-hs-toggle-password='{"target": "#like-count-one" }'>
                                                                <div class="hs-password-active:hidden flex items-center gap-1">
                                                                    <i class="iconify tabler--heart-filled text-danger"></i>
                                                                    Liked!
                                                                </div>

                                                                <div class="hs-password-active:flex hidden items-center gap-1">
                                                                    <i class="iconify tabler--heart text-default-400"></i>
                                                                    Like
                                                                </div>
                                                            </button>
                                                        </div>
                                                    </a>

                                                    <a href="javascript: void(0);" class="btn btn-sm text-default-400 text-sm">
                                                        <i class="iconify tabler--share text-sm"></i>
                                                        Share
                                                    </a>
                                                </div>
                                            </div>

                                            <!-- Story Box-->
                                            <div class="border border-light border-dashed rounded p-3 mb-base">
                                                <!-- Top User -->
                                                <div class="flex items-center gap-3 mb-3">
                                                    <img class="size-9 rounded-full" src="assets/images/users/user-4.jpg" alt="avatar-4" />
                                                    <div class="w-full">
                                                        <h5 class="m-0 font-semibold">Sophia Martinez</h5>
                                                        <p class="text-default-400 text-sm">
                                                            <small>about 30 minutes ago</small>
                                                        </p>
                                                    </div>
                                                </div>

                                                <!-- Main Quote -->
                                                <div class="text-lg text-center my-5 italic">
                                                    <i class="iconify tabler--quote text-xl"></i>
                                                    Just finished a weekend project! Built a small weather app using React and OpenWeather API. Feeling excited to share the results with everyone soon. 🚀
                                                </div>

                                                <!-- Replies Box -->
                                                <div class="bg-light/15 -mx-3 p-3 border-t border-b border-dashed border-default-300">
                                                    <!-- First Reply -->
                                                    <div class="flex items-start gap-2">
                                                        <img class="size-9 rounded-full" src="assets/images/users/user-1.jpg" alt="avatar-1" />
                                                        <div class="w-full">
                                                            <h5 class="mt-0 mb-1.25 font-semibold">
                                                                Liam Johnson
                                                                <small class="text-default-400 ms-1">10 minutes ago</small>
                                                            </h5>
                                                            <p class="text-default-600">That sounds awesome! Can't wait to see how you designed the UI.</p>

                                                            <a href="#" class="text-default-500 text-sm inline-block mt-3">
                                                                <i class="iconify tabler--corner-up-left"></i>
                                                                Reply
                                                            </a>

                                                            <!-- Nested Reply -->
                                                            <div class="flex items-start gap-2 mt-5">
                                                                <img src="assets/images/users/user-2.jpg" class="size-9 rounded-full" alt="avatar-2" />

                                                                <div class="w-full">
                                                                    <h5 class="mb-1.25 font-semibold">
                                                                        Olivia Carter
                                                                        <small class="text-default-400 text-xs ms-1">15 minutes ago</small>
                                                                    </h5>
                                                                    <p class="text-default-600">I recently built something similar with Vue. Let's collaborate sometime!</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Add a Comment -->
                                                    <div class="flex items-start gap-2 mt-3">
                                                        <img src="assets/images/users/user-3.jpg" class="size-9 rounded-full" alt="avatar-3" />

                                                        <div class="w-full">
                                                            <input type="text" class="form-input form-input-sm" placeholder="Add a comment..." />
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Bottom Buttons -->
                                                <div class="mt-3 flex items-center gap-4">
                                                    <a href="#" class="text-sm text-default-400 flex items-center gap-1">
                                                        <i class="iconify tabler--corner-up-left"></i>
                                                        Reply
                                                    </a>

                                                    <div class="relative">
                                                        <span id="like-count-two"></span>
                                                        <button
                                                            type="button"
                                                            data-hs-toggle-password='{
                                                            "target": "#like-count-two"
                                                            }'
                                                        >
                                                            <div class="hidden hs-password-active:flex items-center gap-1 text-default-400">
                                                                <i class="iconify tabler--heart fill-danger text-danger"></i>
                                                                Liked!
                                                            </div>
                                                            <div class="flex hs-password-active:hidden items-center gap-1 text-default-400">
                                                                <i class="iconify tabler--heart"></i>
                                                                Likes(45)
                                                            </div>
                                                        </button>
                                                    </div>

                                                    <a href="#" class="text-sm text-default-400 flex items-center gap-1">
                                                        <i class="iconify tabler--share"></i>
                                                        Share
                                                    </a>
                                                </div>
                                            </div>

                                            <!-- Story Box -->
                                            <div class="border border-light border-dashed rounded p-3 mb-base">
                                                <div class="flex items-center gap-3 mb-2">
                                                    <img class="size-9 rounded-full" src="assets/images/users/user-2.jpg" alt="avatar-2" />
                                                    <div class="w-full">
                                                        <h5>Anika Roy</h5>
                                                        <p class="text-default-400">
                                                            <small class="text-xs">2 hours ago</small>
                                                        </p>
                                                    </div>
                                                </div>

                                                <p class="mb-4">Sharing a couple of timelapses from my recent Iceland trip. Let me know which one you like most!</p>

                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                    <!-- Video 1 -->
                                                    <div class="w-full rounded-lg overflow-hidden bg-default-200">
                                                        <div class="relative w-full pb-[56.25%]">
                                                            <iframe src="https://player.vimeo.com/video/1084537" class="absolute inset-0 w-full h-full rounded-lg" allowfullscreen></iframe>
                                                        </div>
                                                    </div>

                                                    <!-- Video 2 -->
                                                    <div class="w-full rounded-lg overflow-hidden bg-default-200">
                                                        <div class="relative w-full pb-[56.25%]">
                                                            <iframe src="https://player.vimeo.com/video/76979871" class="absolute inset-0 w-full h-full rounded-lg" allowfullscreen> </iframe>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Story Box -->
                                            <div class="flex items-center justify-center gap-3 md:p-6 p-3">
                                                <strong>Loading...</strong>
                                                <div class="animate-spin inline-block size-4 border-2 border-current border-t-transparent text-danger rounded-full" role="status" aria-label="loading">
                                                    <span class="sr-only">Loading...</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="hidden" id="Settings" role="tabpanel" aria-labelledby="Settings-tab">
                                            <!-- Personal Info -->
                                            <h5 class="mb-5 uppercase bg-default-50 p-1.25 text-sm border-dashed border rounded border-default-300 flex justify-center items-center gap-1.5">
                                                <i class="iconify tabler--user-circle text-base"></i>
                                                Personal Info
                                            </h5>

                                            <div class="grid lg:grid-cols-2 grid-cols-1 gap-base mb-base">
                                                <div>
                                                    <label for="firstname" class="form-label">First Name</label>
                                                    <input type="text" class="form-input" id="firstname" placeholder="Enter first name" />
                                                </div>

                                                <div>
                                                    <label for="lastname" class="form-label">Last Name</label>
                                                    <input type="text" class="form-input" id="lastname" placeholder="Enter last name" />
                                                </div>

                                                <div>
                                                    <label for="jobtitle" class="form-label">Job Title</label>
                                                    <input type="text" class="form-input" id="jobtitle" placeholder="e.g. UI Developer, Designer" />
                                                </div>

                                                <div>
                                                    <label for="phone" class="form-label">Phone Number</label>
                                                    <input type="text" class="form-input" id="phone" placeholder="+1 234 567 8901" />
                                                </div>

                                                <div class="lg:col-span-2 col-span-1">
                                                    <label for="userbio" class="form-label">Bio</label>
                                                    <textarea rows="4" class="form-textarea" id="userbio" placeholder="Write something about yourself..."> </textarea>
                                                </div>

                                                <div>
                                                    <label for="useremail" class="form-label">Email Address</label>
                                                    <input type="email" class="form-input" id="useremail" placeholder="Enter email" />
                                                    <span class="text-xs italic text-default-400">
                                                        <a href="#" class="hover:text-primary">Click here to change your email</a>
                                                    </span>
                                                </div>

                                                <div>
                                                    <label for="userpassword" class="form-label">Password</label>
                                                    <input type="password" class="form-input" id="userpassword" placeholder="Enter new password" />
                                                    <span class="text-xs italic text-default-400">
                                                        <a href="#" class="hover:text-primary">Click here to change your email</a>
                                                    </span>
                                                </div>

                                                <div class="lg:col-span-2 col-span-1">
                                                    <label for="profilephoto" class="form-label">Password</label>
                                                    <input type="file" name="file-input" id="profilephoto" class="block w-full border border-default-300 rounded disabled:opacity-50 disabled:pointer-events-none file:bg-default-100 file:border-0 file:me-4 file:py-2 file:px-3" />
                                                </div>
                                            </div>

                                            <!-- Address Info -->
                                            <h5 class="mb-5 uppercase bg-default-50 p-1.25 text-sm border-dashed border rounded border-default-300 flex justify-center items-center gap-1.5">
                                                <i class="iconify tabler--map-pin text-base"></i>
                                                Address Info
                                            </h5>

                                            <div class="grid lg:grid-cols-6 grid-cols-1 gap-base mb-base">
                                                <div class="lg:col-span-3 col-span-1">
                                                    <label for="address-line1" class="form-label">Address Line 1</label>
                                                    <input type="text" class="form-input" id="address-line1" placeholder="Street, Apartment, Unit, etc." />
                                                </div>

                                                <div class="lg:col-span-3 col-span-1">
                                                    <label for="address-line2" class="form-label">Address Line 2</label>
                                                    <input type="text" class="form-input" id="address-line2" placeholder="Optional" />
                                                </div>

                                                <div class="lg:col-span-2 col-span-1">
                                                    <label for="city" class="form-label">City</label>
                                                    <input type="text" class="form-input" id="city" placeholder="City" />
                                                </div>

                                                <div class="lg:col-span-2 col-span-1">
                                                    <label for="state" class="form-label">State / Province</label>
                                                    <input type="text" class="form-input" id="state" placeholder="State or Province" />
                                                </div>

                                                <div class="lg:col-span-2 col-span-1">
                                                    <label for="zipcode" class="form-label">Postal / ZIP Code</label>
                                                    <input type="text" class="form-input" id="zipcode" placeholder="Postal Code" />
                                                </div>

                                                <div class="lg:col-span-3 col-span-1">
                                                    <label for="country" class="form-label">Country</label>
                                                    <input type="text" class="form-input" id="country" placeholder="Country" />
                                                </div>
                                            </div>

                                            <!-- Company Info -->
                                            <h5 class="mb-5 uppercase bg-default-50 p-1.25 text-sm border-dashed border rounded border-default-300 flex justify-center items-center gap-1.5">
                                                <i class="iconify tabler--building text-base"></i>
                                                Company Info
                                            </h5>

                                            <div class="grid lg:grid-cols-2 grid-cols-1 gap-base mb-base">
                                                <div>
                                                    <label for="companyname" class="form-label">Company Name</label>
                                                    <input type="text" class="form-input" id="companyname" placeholder="Enter company name" />
                                                </div>

                                                <div>
                                                    <label for="cwebsite" class="form-label">Website</label>
                                                    <input type="text" class="form-input" id="cwebsite" placeholder="https://yourcompany.com" />
                                                </div>
                                            </div>

                                            <!-- Social -->
                                            <h5 class="mb-5 uppercase bg-default-50 p-1.25 text-sm border-dashed border rounded border-default-300 flex justify-center items-center gap-1.5">
                                                <i class="iconify tabler--world text-base"></i>
                                                Social
                                            </h5>

                                            <div class="grid lg:grid-cols-2 grid-cols-1 gap-base mb-base">
                                                <div>
                                                    <label for="social-fb" class="form-label">Facebook</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">
                                                            <svg class="text-default-800 text-base" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                                                            </svg>
                                                        </span>
                                                        <input id="social-fb" type="text" class="form-input" placeholder="Facebook URL" required="" />
                                                    </div>
                                                </div>

                                                <div>
                                                    <label for="social-tw" class="form-label">Twitter X</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">
                                                            <svg class="text-default-800 text-base" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path d="M4 4l11.733 16h4.267l-11.733 -16z" />
                                                                <path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772" />
                                                            </svg>
                                                        </span>
                                                        <input id="social-tw" type="text" class="form-input" placeholder="&#64;username" required="" />
                                                    </div>
                                                </div>

                                                <div>
                                                    <label for="social-insta" class="form-label">Instagram</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">
                                                            <svg class="text-default-800 text-base" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path d="M4 8a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" />
                                                                <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                                                <path d="M16.5 7.5v.01" />
                                                            </svg>
                                                        </span>
                                                        <input id="social-insta" type="text" class="form-input" placeholder="Instagram URL" required="" />
                                                    </div>
                                                </div>

                                                <div>
                                                    <label for="social-lin" class="form-label">LinkedIn</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">
                                                            <svg class="text-default-800 text-base" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path d="M8 11v5" />
                                                                <path d="M8 8v.01" />
                                                                <path d="M12 16v-5" />
                                                                <path d="M16 16v-3a2 2 0 1 0 -4 0" />
                                                                <path d="M3 7a4 4 0 0 1 4 -4h10a4 4 0 0 1 4 4v10a4 4 0 0 1 -4 4h-10a4 4 0 0 1 -4 -4z" />
                                                            </svg>
                                                        </span>
                                                        <input id="social-lin" type="text" class="form-input" placeholder="LinkedIn Profile" required="" />
                                                    </div>
                                                </div>

                                                <div>
                                                    <label for="social-gh" class="form-label">GitHub</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">
                                                            <svg class="text-default-800 text-base" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5" />
                                                            </svg>
                                                        </span>
                                                        <input id="social-gh" type="text" class="form-input" placeholder="GitHub Username" required="" />
                                                    </div>
                                                </div>

                                                <div>
                                                    <label for="social-sky" class="form-label">Dribbble</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">
                                                            <svg class="text-default-800 text-base" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                                                <path d="M9 3.6c5 6 7 10.5 7.5 16.2" />
                                                                <path d="M6.4 19c3.5 -3.5 6 -6.5 14.5 -6.4" />
                                                                <path d="M3.1 10.75c5 0 9.814 -.38 15.314 -5" />
                                                            </svg>
                                                        </span>
                                                        <input id="social-sky" type="text" class="form-input" placeholder="&#64;username" required="" />
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Submit -->
                                            <div class="mt-7.5 text-end">
                                                <button type="submit" class="btn bg-success text-white hover:bg-success-hover">Save Changes</button>
                                            </div>
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