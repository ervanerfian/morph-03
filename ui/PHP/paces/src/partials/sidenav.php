<aside id="app-menu" class="app-menu">
    <!-- Sidenav Menu Brand Logo -->
    <a href="index.php" class="logo-box">
        <!-- Light Brand Logo -->
        <span class="logo logo-light">
            <span class="logo-lg">
                <img src="assets/images/logo.png" alt="logo">
            </span>
            <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt="small logo">
            </span>
        </span>

        <!-- Dark Brand Logo -->
        <span class="logo logo-dark">
            <span class="logo-lg">
                <img src="assets/images/logo-black.png" alt="dark logo">
            </span>
            <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt="small logo">
            </span>
        </span>
    </a>

    <!-- Sidenav Menu Toggle Button -->
    <div class="h-topbar justify absolute end-5 top-0 flex items-center">
        <button id="button-hover-toggle">
            <span class="btn-on-hover-icon"></span>
        </button>
    </div>

    <!-- Sidenav Menu Item Link -->
    <div class="relative min-h-0 grow">
        <div class="size-full" data-simplebar="">
            <div id="user-profile-settings" class="sidenav-user p-5 bg-[url(../images/user-bg-pattern.svg)]">
                <div class="flex items-center justify-between">
                    <div>
                        <a href="#!" class="link-reset">
                            <img src="assets/images/users/user-1.jpg" alt="user-image" class="mb-3 size-9 rounded-full">
                            <span class="sidenav-user-name block font-bold text-nowrap">David Dev</span>
                            <span class="text-xs font-semibold" data-lang="user-role">Art Director</span>
                        </a>
                    </div>

                    <div>
                        <!-- Profile Dropdown Button -->
                        <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                            <button class="cursor-pointer" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                <i class="iconify tabler--settings ms-1 size-6 align-middle"></i>
                            </button>

                            <div class="hs-dropdown-menu" role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-with-icons">
                                <!-- Header -->
                                <div class="py-2 px-3.5">
                                    <h6 class="text-xs">Welcome back 👋!</h6>
                                </div>

                                <!-- My Profile -->
                                <a href="#!" class="dropdown-item">
                                    <i class="iconify tabler--user-circle me-1 align-middle text-lg"></i>
                                    <span class="align-middle">Profile</span>
                                </a>

                                <!-- Settings -->
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="iconify tabler--settings-2 me-1 align-middle text-lg"></i>
                                    <span class="align-middle">Account Settings</span>
                                </a>

                                <!-- Lock -->
                                <a href="auth-lock-screen.php" class="dropdown-item">
                                    <i class="iconify tabler--lock me-1 align-middle text-lg"></i>
                                    <span class="align-middle">Lock Screen</span>
                                </a>

                                <!-- Logout -->
                                <a href="javascript:void(0);" class="dropdown-item text-danger">
                                    <i class="iconify tabler--logout me-1 align-middle text-lg"></i>
                                    <span class="align-middle">Log Out</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            

            

            <div id="sidenav-menu">
<ul class="side-nav hs-accordion-group px-2.5 pb-16.5">
<li class="menu-title" data-lang="main">
                    <span>Main</span>
                </li>
<li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="dashboards" class="hs-accordion-toggle menu-link">
                        <span class="menu-icon"><i class="iconify tabler--dashboard"></i></span>
                        <span class="menu-text" data-lang="dashboards">Dashboards</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item">
              <a href="index.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="dashboard-ecommerce">Ecommerce</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="dashboard-analytics.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="dashboard-analytics">Analytics</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="dashboard-crm.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="dashboard-crm">CRM</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="dashboard-finance.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="dashboard-finance">Finance</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="dashboard-projects.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="dashboard-projects">Projects</span>
                  
              </a>
            </li>
                    </ul>
                </li>
<li class="menu-title" data-lang="apps">
                    <span>Apps</span>
                </li>
<li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="ecommerce" class="hs-accordion-toggle menu-link">
                        <span class="menu-icon"><i class="iconify tabler--basket"></i></span>
                        <span class="menu-text" data-lang="ecommerce">Ecommerce</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="products" class="hs-accordion-toggle menu-link">
                        
                        <span class="menu-text" data-lang="products">Products</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item">
              <a href="apps-ecommerce-products.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-ecommerce-products">Products</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-ecommerce-products-grid.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-ecommerce-products-grid">Products Grid</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-ecommerce-product-details.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-ecommerce-product-details">Product Details</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-ecommerce-product-add.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-ecommerce-product-add">Add Product</span>
                  
              </a>
            </li>
                    </ul>
                </li>
<li class="menu-item">
              <a href="apps-ecommerce-categories.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-ecommerce-categories">Categories</span>
                  
              </a>
            </li>
<li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="orders" class="hs-accordion-toggle menu-link">
                        
                        <span class="menu-text" data-lang="orders">Orders</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item">
              <a href="apps-ecommerce-orders.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-ecommerce-orders">Orders</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-ecommerce-order-details.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-ecommerce-order-details">Order Details</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-ecommerce-order-add.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-ecommerce-order-add">Add/Edit Order</span>
                  
              </a>
            </li>
                    </ul>
                </li>
<li class="menu-item">
              <a href="apps-ecommerce-customers.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-ecommerce-customers">Customers</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-ecommerce-cart.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-ecommerce-cart">Cart</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-ecommerce-checkout.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-ecommerce-checkout">Checkout</span>
                  
              </a>
            </li>
<li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="sellers" class="hs-accordion-toggle menu-link">
                        
                        <span class="menu-text" data-lang="sellers">Sellers</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item">
              <a href="apps-ecommerce-sellers.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-ecommerce-sellers">Sellers</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-ecommerce-seller-details.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-ecommerce-seller-details">Sellers Details</span>
                  
              </a>
            </li>
                    </ul>
                </li>
<li class="menu-item">
              <a href="apps-ecommerce-refunds.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-ecommerce-refunds">Refunds</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-ecommerce-reviews.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-ecommerce-reviews">Reviews</span>
                  
              </a>
            </li>
<li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="inventory" class="hs-accordion-toggle menu-link">
                        
                        <span class="menu-text" data-lang="inventory">Inventory</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item">
              <a href="apps-ecommerce-warehouse.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-ecommerce-warehouse">Warehouse</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-ecommerce-product-stocks.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-ecommerce-product-stocks">Product Stocks</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-ecommerce-purchased-orders.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-ecommerce-purchased-orders">Purchased Orders</span>
                  
              </a>
            </li>
                    </ul>
                </li>
<li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="reports" class="hs-accordion-toggle menu-link">
                        
                        <span class="menu-text" data-lang="reports">Reports</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item">
              <a href="apps-ecommerce-product-views.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-ecommerce-product-views">Product Views</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-ecommerce-sales.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-ecommerce-sales">Sales</span>
                  
              </a>
            </li>
                    </ul>
                </li>
<li class="menu-item">
              <a href="apps-ecommerce-attributes.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-ecommerce-attributes">Attributes</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-ecommerce-settings.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-ecommerce-settings">Settings</span>
                  
              </a>
            </li>
                    </ul>
                </li>
<li class="menu-item">
              <a href="apps-chat.php" class="menu-link  ">
                  <span class="menu-icon"><i class="iconify tabler--message"></i></span>
                  <span class="menu-text " data-lang="apps-chat">Chat</span>
                  
              </a>
            </li>
<li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="projects" class="hs-accordion-toggle menu-link">
                        <span class="menu-icon"><i class="iconify tabler--briefcase"></i></span>
                        <span class="menu-text" data-lang="projects">Projects</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item">
              <a href="apps-projects-grid.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-projects-grid">My Projects</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-projects-list.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-projects-list">Projects List</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-projects-details.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-projects-details">View Project</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-projects-kanban.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-projects-kanban">Kanban Board</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-projects-team-board.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-projects-team-board">Team Board</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-projects-activity.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-projects-activity">Activity Steam</span>
                  
              </a>
            </li>
                    </ul>
                </li>
<li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="tasks" class="hs-accordion-toggle menu-link">
                        <span class="menu-icon"><i class="iconify tabler--list-check"></i></span>
                        <span class="menu-text" data-lang="tasks">Tasks</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item">
              <a href="apps-task-list.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-task-list">Task List</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-task-details.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-task-details">Task Details</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-task-create.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-task-create">Create Task</span>
                  
              </a>
            </li>
                    </ul>
                </li>
<li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="invoice" class="hs-accordion-toggle menu-link">
                        <span class="menu-icon"><i class="iconify tabler--invoice"></i></span>
                        <span class="menu-text" data-lang="invoice">Invoice</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item">
              <a href="apps-invoice-list.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-invoice-list">Invoices</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-invoice-details.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-invoice-details">Single Invoice</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-invoice-create.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-invoice-create">New Invoice</span>
                  
              </a>
            </li>
                    </ul>
                </li>
<li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="crm" class="hs-accordion-toggle menu-link">
                        <span class="menu-icon"><i class="iconify tabler--heart-handshake"></i></span>
                        <span class="menu-text" data-lang="crm">CRM</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item">
              <a href="apps-crm-contacts.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-crm-contacts">Contacts</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-crm-opportunities.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-crm-opportunities">Opportunities</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-crm-deals.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-crm-deals">Deals</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-crm-leads.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-crm-leads">Leads</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-crm-pipeline.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-crm-pipeline">Pipeline</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-crm-campaign.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-crm-campaign">Campaign</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-crm-proposals.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-crm-proposals">Proposals</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-crm-estimations.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-crm-estimations">Estimations</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-crm-customers.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-crm-customers">Customers</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-crm-activities.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-crm-activities">Activities</span>
                  
              </a>
            </li>
                    </ul>
                </li>
<li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="users" class="hs-accordion-toggle menu-link">
                        <span class="menu-icon"><i class="iconify tabler--users"></i></span>
                        <span class="menu-text" data-lang="users">Users</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item">
              <a href="apps-users-contacts.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-users-contacts">Contacts</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-users-profile.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-users-profile">Profile</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-users-account-settings.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-users-account-settings">Account Settings</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-users-roles.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-users-roles">Roles</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-users-role-details.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-users-role-details">Role Details</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-users-permissions.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-users-permissions">Permissions</span>
                  
              </a>
            </li>
                    </ul>
                </li>
<li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="finance" class="hs-accordion-toggle menu-link">
                        <span class="menu-icon"><i class="iconify tabler--wallet"></i></span>
                        <span class="menu-text" data-lang="finance">Finance</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="expenses" class="hs-accordion-toggle menu-link">
                        
                        <span class="menu-text" data-lang="expenses">Expenses</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item">
              <a href="apps-finance-expenses.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-finance-expenses">Expenses</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-finance-expense-category.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-finance-expense-category">Expense Category</span>
                  
              </a>
            </li>
                    </ul>
                </li>
<li class="menu-item">
              <a href="apps-finance-income.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-finance-income">Income</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-finance-transactions.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-finance-transactions">Transactions</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-finance-banks-cards.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-finance-banks-cards">Banks &amp; Cards</span>
                  
              </a>
            </li>
                    </ul>
                </li>
<li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="hrm" class="hs-accordion-toggle menu-link">
                        <span class="menu-icon"><i class="iconify tabler--accessible"></i></span>
                        <span class="menu-text" data-lang="hrm">HRM</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="staffs" class="hs-accordion-toggle menu-link">
                        
                        <span class="menu-text" data-lang="staffs">Staffs</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item">
              <a href="apps-hrm-staffs.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-hrm-staffs">Staffs List</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-hrm-staff-profile.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-hrm-staff-profile">Staff Profile</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-hrm-staff-add.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-hrm-staff-add">Add Staffs</span>
                  
              </a>
            </li>
                    </ul>
                </li>
<li class="menu-item">
              <a href="apps-hrm-departments.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-hrm-departments">Departments</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-hrm-attendance.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-hrm-attendance">Attendance</span>
                  
              </a>
            </li>
<li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="leaves" class="hs-accordion-toggle menu-link">
                        
                        <span class="menu-text" data-lang="leaves">Leaves</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item">
              <a href="apps-hrm-leaves.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-hrm-leaves">Leaves</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-hrm-leave-add.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-hrm-leave-add">Add Leave</span>
                  
              </a>
            </li>
                    </ul>
                </li>
<li class="menu-item">
              <a href="apps-hrm-holidays.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-hrm-holidays">Holidays</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-hrm-payroll.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-hrm-payroll">Payroll</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-hrm-create-salary-slip.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-hrm-create-salary-slip">Create Salary Slip</span>
                  
              </a>
            </li>
                    </ul>
                </li>
<li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="email" class="hs-accordion-toggle menu-link">
                        <span class="menu-icon"><i class="iconify tabler--mailbox"></i></span>
                        <span class="menu-text" data-lang="email">Email</span>
                        <span class="badge bg-danger text-white">New</span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item">
              <a href="apps-email-inbox.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-email-inbox">Inbox</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-email-details.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-email-details">Details</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-email-compose.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-email-compose">Compose</span>
                  
              </a>
            </li>
                    </ul>
                </li>
<li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="support-center" class="hs-accordion-toggle menu-link">
                        <span class="menu-icon"><i class="iconify tabler--headset"></i></span>
                        <span class="menu-text" data-lang="support-center">Support Center</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item">
              <a href="apps-ticket-list.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-ticket-list">Ticket List</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-ticket-details.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-ticket-details">Ticket Details</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-ticket-create.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-ticket-create">New Ticket</span>
                  
              </a>
            </li>
                    </ul>
                </li>
<li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="promo" class="hs-accordion-toggle menu-link">
                        <span class="menu-icon"><i class="iconify tabler--discount"></i></span>
                        <span class="menu-text" data-lang="promo">Promo</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item">
              <a href="apps-promo-coupons.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-promo-coupons">Coupons</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-promo-gift-cards.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-promo-gift-cards">Gift Cards</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-promo-discounts.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-promo-discounts">Discounts</span>
                  
              </a>
            </li>
                    </ul>
                </li>
<li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="more-apps" class="hs-accordion-toggle menu-link">
                        <span class="menu-icon"><i class="iconify tabler--apps"></i></span>
                        <span class="menu-text" data-lang="more-apps">More Apps</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item">
              <a href="apps-social-feed.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-social-feed">Social Feed</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-pro-ai.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-pro-ai">Pro AI</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-file-manager.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-file-manager">File Manager</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-calendar.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-calendar">Calendar</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-companies.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-companies">Companies</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-todo.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-todo">Todo</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-pin-board.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-pin-board">Pin Board</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-clients.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-clients">Clients</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-outlook.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-outlook">Outlook View</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-vote-list.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-vote-list">Vote List</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-issue-tracker.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-issue-tracker">Issue Tracker</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-api-keys.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-api-keys">API Keys</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-manage.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-manage">Manage Apps</span>
                  
              </a>
            </li>
<li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="blog" class="hs-accordion-toggle menu-link">
                        
                        <span class="menu-text" data-lang="blog">Blog</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item">
              <a href="apps-blog-list.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-blog-list">Blog List</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-blog-grid.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-blog-grid">Blog Grid</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-blog-article.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-blog-article">Article</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-blog-add.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-blog-add">Add Article</span>
                  
              </a>
            </li>
                    </ul>
                </li>
<li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="forum" class="hs-accordion-toggle menu-link">
                        
                        <span class="menu-text" data-lang="forum">Forum</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item">
              <a href="apps-forum-view.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-forum-view">Forum View</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="apps-forum-post.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="apps-forum-post">Forum Post</span>
                  
              </a>
            </li>
                    </ul>
                </li>
                    </ul>
                </li>
<li class="menu-title" data-lang="custom-pages">
                    <span>Custom Pages</span>
                </li>
<li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="pages" class="hs-accordion-toggle menu-link">
                        <span class="menu-icon"><i class="iconify tabler--files"></i></span>
                        <span class="menu-text" data-lang="pages">Pages</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item">
              <a href="pages-about-us.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="pages-about-us">About Us</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="pages-contact-us.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="pages-contact-us">Contact Us</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="pages-pricing.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="pages-pricing">Pricing</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="pages-empty.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="pages-empty">Empty Page</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="pages-timeline.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="pages-timeline">Timeline</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="pages-gallery.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="pages-gallery">Gallery</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="pages-faq.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="pages-faq">FAQ</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="pages-sitemap.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="pages-sitemap">Sitemap</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="pages-search-results.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="pages-search-results">Search Results</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="pages-coming-soon.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="pages-coming-soon">Coming Soon</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="pages-privacy-policy.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="pages-privacy-policy">Privacy Policy</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="pages-terms-conditions.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="pages-terms-conditions">Terms &amp; Conditions</span>
                  
              </a>
            </li>
                    </ul>
                </li>
<li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="plugins" class="hs-accordion-toggle menu-link">
                        <span class="menu-icon"><i class="iconify tabler--cpu"></i></span>
                        <span class="menu-text" data-lang="plugins">Plugins</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item">
              <a href="plugins-sortable.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="plugins-sortable">Sortable List</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="plugins-pdf-viewer.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="plugins-pdf-viewer">PDF Viewer</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="plugins-i18.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="plugins-i18">i18 Support</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="plugins-sweet-alerts.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="plugins-sweet-alerts">Sweet Alerts</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="plugins-idle-timer.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="plugins-idle-timer">Idle Timer</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="plugins-pass-meter.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="plugins-pass-meter">Password Meter</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="plugins-clipboard.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="plugins-clipboard">Clipboard</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="plugins-tree-view.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="plugins-tree-view">Tree View</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="plugins-masonry.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="plugins-masonry">Masonry</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="plugins-tour.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="plugins-tour">Tour</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="plugins-animation.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="plugins-animation">Animation</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="plugins-video-player.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="plugins-video-player">Video Player</span>
                  
              </a>
            </li>
                    </ul>
                </li>
<li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="authentication" class="hs-accordion-toggle menu-link">
                        <span class="menu-icon"><i class="iconify tabler--password-user"></i></span>
                        <span class="menu-text" data-lang="authentication">Authentication</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="auth-basic" class="hs-accordion-toggle menu-link">
                        
                        <span class="menu-text" data-lang="auth-basic">Basic</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item">
              <a href="auth-sign-in.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="auth-sign-in">Sign In</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="auth-sign-up.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="auth-sign-up">Sign Up</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="auth-reset-pass.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="auth-reset-pass">Reset Password</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="auth-new-pass.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="auth-new-pass">New Password</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="auth-two-factor.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="auth-two-factor">Two Factor</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="auth-lock-screen.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="auth-lock-screen">Lock Screen</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="auth-success-mail.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="auth-success-mail">Success Mail</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="auth-login-pin.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="auth-login-pin">Login with PIN</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="auth-delete-account.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="auth-delete-account">Delete Account</span>
                  
              </a>
            </li>
                    </ul>
                </li>
<li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="auth-card" class="hs-accordion-toggle menu-link">
                        
                        <span class="menu-text" data-lang="auth-card">Card</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item">
              <a href="auth-card-sign-in.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="auth-card-sign-in">Sign In</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="auth-card-sign-up.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="auth-card-sign-up">Sign Up</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="auth-card-reset-pass.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="auth-card-reset-pass">Reset Password</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="auth-card-new-pass.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="auth-card-new-pass">New Password</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="auth-card-two-factor.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="auth-card-two-factor">Two Factor</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="auth-card-lock-screen.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="auth-card-lock-screen">Lock Screen</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="auth-card-success-mail.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="auth-card-success-mail">Success Mail</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="auth-card-login-pin.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="auth-card-login-pin">Login with PIN</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="auth-card-delete-account.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="auth-card-delete-account">Delete Account</span>
                  
              </a>
            </li>
                    </ul>
                </li>
<li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="auth-split" class="hs-accordion-toggle menu-link">
                        
                        <span class="menu-text" data-lang="auth-split">Split</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item">
              <a href="auth-split-sign-in.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="auth-split-sign-in">Sign In</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="auth-split-sign-up.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="auth-split-sign-up">Sign Up</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="auth-split-reset-pass.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="auth-split-reset-pass">Reset Password</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="auth-split-new-pass.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="auth-split-new-pass">New Password</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="auth-split-two-factor.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="auth-split-two-factor">Two Factor</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="auth-split-lock-screen.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="auth-split-lock-screen">Lock Screen</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="auth-split-success-mail.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="auth-split-success-mail">Success Mail</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="auth-split-login-pin.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="auth-split-login-pin">Login with PIN</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="auth-split-delete-account.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="auth-split-delete-account">Delete Account</span>
                  
              </a>
            </li>
                    </ul>
                </li>
                    </ul>
                </li>
<li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="error-pages" class="hs-accordion-toggle menu-link">
                        <span class="menu-icon"><i class="iconify tabler--alert-triangle"></i></span>
                        <span class="menu-text" data-lang="error-pages">Error Pages</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item">
              <a href="error-400.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="error-400">400 Bad Request</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="error-401.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="error-401">401 Unauthorized</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="error-403.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="error-403">403 Forbidden</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="error-404.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="error-404">404 Not Found</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="error-408.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="error-408">408 Request Timeout</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="error-500.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="error-500">500 Internal Server</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="error-maintenance.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="error-maintenance">Maintenance</span>
                  
              </a>
            </li>
                    </ul>
                </li>
<li class="menu-title" data-lang="layouts">
                    <span>Layouts</span>
                </li>
<li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="layout-options" class="hs-accordion-toggle menu-link">
                        <span class="menu-icon"><i class="iconify tabler--layout"></i></span>
                        <span class="menu-text" data-lang="layout-options">Layout Options</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item">
              <a href="layouts-horizontal.php" class="menu-link  " target="_blank">
                  
                  <span class="menu-text " data-lang="layouts-horizontal">Horizontal</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="layouts-boxed.php" class="menu-link  " target="_blank">
                  
                  <span class="menu-text " data-lang="layouts-boxed">Boxed</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="layouts-scrollable.php" class="menu-link  " target="_blank">
                  
                  <span class="menu-text " data-lang="layouts-scrollable">Scrollable</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="layouts-compact.php" class="menu-link  " target="_blank">
                  
                  <span class="menu-text " data-lang="layouts-compact">Compact</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="layouts-preloader.php" class="menu-link  " target="_blank">
                  
                  <span class="menu-text " data-lang="layouts-preloader">Preloader</span>
                  
              </a>
            </li>
                    </ul>
                </li>
<li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="sidebars" class="hs-accordion-toggle menu-link">
                        <span class="menu-icon"><i class="iconify tabler--layout-sidebar-inactive"></i></span>
                        <span class="menu-text" data-lang="sidebars">Sidebars</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item">
              <a href="layouts-sidebar-light.php" class="menu-link  " target="_blank">
                  
                  <span class="menu-text " data-lang="layouts-sidebar-light">Light Menu</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="layouts-sidebar-gradient.php" class="menu-link  " target="_blank">
                  
                  <span class="menu-text " data-lang="layouts-sidebar-gradient">Gradient Menu</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="layouts-sidebar-gray.php" class="menu-link  " target="_blank">
                  
                  <span class="menu-text " data-lang="layouts-sidebar-gray">Gray Menu</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="layouts-sidebar-image.php" class="menu-link  " target="_blank">
                  
                  <span class="menu-text " data-lang="layouts-sidebar-image">Image Menu</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="layouts-sidebar-compact.php" class="menu-link  " target="_blank">
                  
                  <span class="menu-text " data-lang="layouts-sidebar-compact">Compact Menu</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="layouts-sidebar-on-hover.php" class="menu-link  " target="_blank">
                  
                  <span class="menu-text " data-lang="layouts-sidebar-on-hover">On Hover Menu</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="layouts-sidebar-offcanvas.php" class="menu-link  " target="_blank">
                  
                  <span class="menu-text " data-lang="layouts-sidebar-offcanvas">Offcanvas Menu</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="layouts-sidebar-no-icons.php" class="menu-link  " target="_blank">
                  
                  <span class="menu-text " data-lang="layouts-sidebar-no-icons">No Icons with Lines</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="layouts-sidebar-with-lines.php" class="menu-link  " target="_blank">
                  
                  <span class="menu-text " data-lang="layouts-sidebar-with-lines">Sidebar with Lines</span>
                  
              </a>
            </li>
                    </ul>
                </li>
<li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="topbar" class="hs-accordion-toggle menu-link">
                        <span class="menu-icon"><i class="iconify tabler--layout-bottombar"></i></span>
                        <span class="menu-text" data-lang="topbar">Topbar</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item">
              <a href="layouts-topbar-dark.php" class="menu-link  " target="_blank">
                  
                  <span class="menu-text " data-lang="layouts-topbar-dark">Dark Topbar</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="layouts-topbar-gray.php" class="menu-link  " target="_blank">
                  
                  <span class="menu-text " data-lang="layouts-topbar-gray">Gray Topbar</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="layouts-topbar-gradient.php" class="menu-link  " target="_blank">
                  
                  <span class="menu-text " data-lang="layouts-topbar-gradient">Gradient Topbar</span>
                  
              </a>
            </li>
                    </ul>
                </li>
<li class="menu-title" data-lang="components">
                    <span>Components</span>
                </li>
<li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="base-ui" class="hs-accordion-toggle menu-link">
                        <span class="menu-icon"><i class="iconify tabler--components"></i></span>
                        <span class="menu-text" data-lang="base-ui">Base UI</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item">
              <a href="ui-accordions.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="ui-accordions">Accordions</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="ui-alerts.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="ui-alerts">Alerts</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="ui-buttons.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="ui-buttons">Buttons</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="ui-badges.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="ui-badges">Badges</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="ui-colors.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="ui-colors">Colors</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="ui-breadcrumb.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="ui-breadcrumb">Breadcrumb</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="ui-cards.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="ui-cards">Cards</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="ui-carousel.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="ui-carousel">Carousel</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="ui-collapse.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="ui-collapse">Collapse</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="ui-images.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="ui-images">Images</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="ui-dropdowns.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="ui-dropdowns">Dropdowns</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="ui-videos.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="ui-videos">Videos</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="ui-links.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="ui-links">Links</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="ui-list-group.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="ui-list-group">List Group</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="ui-modals.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="ui-modals">Modals</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="ui-notifications.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="ui-notifications">Notifications</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="ui-offcanvas.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="ui-offcanvas">Offcanvas</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="ui-placeholders.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="ui-placeholders">Placeholders</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="ui-pagination.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="ui-pagination">Pagination</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="ui-popovers.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="ui-popovers">Popovers</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="ui-progress.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="ui-progress">Progress</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="ui-scrollspy.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="ui-scrollspy">Scrollspy</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="ui-spinners.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="ui-spinners">Spinners</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="ui-tabs.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="ui-tabs">Tabs</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="ui-tooltips.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="ui-tooltips">Tooltips</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="ui-typography.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="ui-typography">Typography</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="ui-utilities.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="ui-utilities">Utilities</span>
                  
              </a>
            </li>
                    </ul>
                </li>
<li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="widgets" class="hs-accordion-toggle menu-link">
                        <span class="menu-icon"><i class="iconify tabler--category"></i></span>
                        <span class="menu-text" data-lang="widgets">Widgets</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item">
              <a href="widgets-charts.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="widgets-charts">Charts</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="widgets-mixed.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="widgets-mixed">Mixed</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="widgets-social.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="widgets-social">Social</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="widgets-statistics.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="widgets-statistics">Statistics</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="widgets-weather.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="widgets-weather">Weather</span>
                  
              </a>
            </li>
                    </ul>
                </li>
<li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="charts" class="hs-accordion-toggle menu-link">
                        <span class="menu-icon"><i class="iconify tabler--chart-donut"></i></span>
                        <span class="menu-text" data-lang="charts">Charts</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="apex-charts" class="hs-accordion-toggle menu-link">
                        
                        <span class="menu-text" data-lang="apex-charts">Apex Charts</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item">
              <a href="charts-apex-area.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="charts-apex-area">Area</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="charts-apex-bar.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="charts-apex-bar">Bar</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="charts-apex-bubble.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="charts-apex-bubble">Bubble</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="charts-apex-candlestick.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="charts-apex-candlestick">Candlestick</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="charts-apex-column.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="charts-apex-column">Column</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="charts-apex-heatmap.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="charts-apex-heatmap">Heatmap</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="charts-apex-line.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="charts-apex-line">Line</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="charts-apex-mixed.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="charts-apex-mixed">Mixed</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="charts-apex-timeline.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="charts-apex-timeline">Timeline</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="charts-apex-boxplot.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="charts-apex-boxplot">Boxplot</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="charts-apex-treemap.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="charts-apex-treemap">Treemap</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="charts-apex-pie.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="charts-apex-pie">Pie</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="charts-apex-radar.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="charts-apex-radar">Radar</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="charts-apex-radialbar.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="charts-apex-radialbar">RadialBar</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="charts-apex-scatter.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="charts-apex-scatter">Scatter</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="charts-apex-polar-area.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="charts-apex-polar-area">Polar Area</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="charts-apex-sparklines.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="charts-apex-sparklines">Sparklines</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="charts-apex-range.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="charts-apex-range">Range</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="charts-apex-funnel.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="charts-apex-funnel">Funnel</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="charts-apex-slope.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="charts-apex-slope">Slope</span>
                  
              </a>
            </li>
                    </ul>
                </li>
<li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="echarts" class="hs-accordion-toggle menu-link">
                        
                        <span class="menu-text" data-lang="echarts">Echarts</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item">
              <a href="charts-echart-line.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="charts-echart-line">Line</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="charts-echart-bar.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="charts-echart-bar">Bar</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="charts-echart-pie.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="charts-echart-pie">Pie</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="charts-echart-scatter.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="charts-echart-scatter">Scatter</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="charts-echart-geo-map.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="charts-echart-geo-map">GEO Map</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="charts-echart-gauge.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="charts-echart-gauge">Gauge</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="charts-echart-candlestick.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="charts-echart-candlestick">Candlestick</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="charts-echart-area.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="charts-echart-area">Area</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="charts-echart-radar.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="charts-echart-radar">Radar</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="charts-echart-heatmap.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="charts-echart-heatmap">Heatmap</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="charts-echart-other.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="charts-echart-other">Other</span>
                  
              </a>
            </li>
                    </ul>
                </li>
<li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="chartjs" class="hs-accordion-toggle menu-link">
                        
                        <span class="menu-text" data-lang="chartjs">Chart Js</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item">
              <a href="charts-chartjs-area.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="charts-chartjs-area">Area</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="charts-chartjs-bar.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="charts-chartjs-bar">Bar</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="charts-chartjs-line.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="charts-chartjs-line">Line</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="charts-chartjs-other.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="charts-chartjs-other">Other</span>
                  
              </a>
            </li>
                    </ul>
                </li>
                    </ul>
                </li>
<li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="forms" class="hs-accordion-toggle menu-link">
                        <span class="menu-icon"><i class="iconify tabler--clipboard-list"></i></span>
                        <span class="menu-text" data-lang="forms">Forms</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item">
              <a href="form-elements.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="form-elements">Basic Elements</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="form-validation.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="form-validation">Validation</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="form-wizard.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="form-wizard">Wizard</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="form-select.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="form-select">Select</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="form-pickers.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="form-pickers">Pickers</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="form-fileuploads.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="form-fileuploads">File Uploads</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="form-text-editors.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="form-text-editors">Text Editors</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="form-range-slider.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="form-range-slider">Range Slider</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="form-cropper.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="form-cropper">Image Cropper</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="form-layout.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="form-layout">Layouts</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="form-other-plugin.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="form-other-plugin">Other Plugins</span>
                  
              </a>
            </li>
                    </ul>
                </li>
<li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="tables" class="hs-accordion-toggle menu-link">
                        <span class="menu-icon"><i class="iconify tabler--table-column"></i></span>
                        <span class="menu-text" data-lang="tables">Tables</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item">
              <a href="tables-static.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="tables-static">Static Tables</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="tables-custom.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="tables-custom">Custom Tables</span>
                  
              </a>
            </li>
<li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="datatables" class="hs-accordion-toggle menu-link">
                        
                        <span class="menu-text" data-lang="datatables">DataTables</span>
                        <span class="badge bg-success text-white">15</span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item">
              <a href="tables-datatables-basic.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="tables-datatables-basic">Basic</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="tables-datatables-export-data.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="tables-datatables-export-data">Export Data</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="tables-datatables-select.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="tables-datatables-select">Select</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="tables-datatables-ajax.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="tables-datatables-ajax">Ajax</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="tables-datatables-javascript.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="tables-datatables-javascript">Javascript Source</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="tables-datatables-rendering.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="tables-datatables-rendering">Data Rendering</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="tables-datatables-scroll.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="tables-datatables-scroll">Scroll</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="tables-datatables-fixed-columns.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="tables-datatables-fixed-columns">Fixed Columns</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="tables-datatables-fixed-header.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="tables-datatables-fixed-header">Fixed Header</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="tables-datatables-columns.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="tables-datatables-columns">Show &amp; Hide Column</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="tables-datatables-child-rows.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="tables-datatables-child-rows">Child Rows</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="tables-datatables-column-searching.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="tables-datatables-column-searching">Column Searching</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="tables-datatables-range-search.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="tables-datatables-range-search">Range Search</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="tables-datatables-rows-add.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="tables-datatables-rows-add">Add Rows</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="tables-datatables-checkbox-select.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="tables-datatables-checkbox-select">Checkbox Select</span>
                  
              </a>
            </li>
                    </ul>
                </li>
                    </ul>
                </li>
<li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="icons" class="hs-accordion-toggle menu-link">
                        <span class="menu-icon"><i class="iconify tabler--icons"></i></span>
                        <span class="menu-text" data-lang="icons">Icons</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item">
              <a href="icons-tabler.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="icons-tabler">Tabler</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="icons-lucide.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="icons-lucide">Lucide</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="icons-remix.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="icons-remix">Remix</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="icons-solar-duotone.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="icons-solar-duotone">Solar Duotone</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="icons-flags.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="icons-flags">Flags</span>
                  
              </a>
            </li>
                    </ul>
                </li>
<li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="maps" class="hs-accordion-toggle menu-link">
                        <span class="menu-icon"><i class="iconify tabler--map"></i></span>
                        <span class="menu-text" data-lang="maps">Maps</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item">
              <a href="maps-google.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="maps-google">Google Maps</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="maps-vector.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="maps-vector">Vector Maps</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="maps-leaflet.php" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="maps-leaflet">Leaflet Maps</span>
                  
              </a>
            </li>
                    </ul>
                </li>
<li class="menu-title" data-lang="menu-items">
                    <span>Menu Items</span>
                </li>
<li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="menu-levels" class="hs-accordion-toggle menu-link">
                        <span class="menu-icon"><i class="iconify tabler--sitemap"></i></span>
                        <span class="menu-text" data-lang="menu-levels">Menu Levels</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="second-level" class="hs-accordion-toggle menu-link">
                        
                        <span class="menu-text" data-lang="second-level">Second Level</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item">
              <a href="#" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="menu-item-1">Item 2.1</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="#" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="menu-item-2">Item 2.2</span>
                  
              </a>
            </li>
                    </ul>
                </li>
<li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="second-level-2" class="hs-accordion-toggle menu-link">
                        
                        <span class="menu-text" data-lang="second-level-2">Second Level</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item">
              <a href="#" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="menu-item-3">Item 2.1</span>
                  
              </a>
            </li>
<li class="menu-item hs-accordion">
                    <a href="javascript:void(0)" aria-expanded="false" aria-controls="menu-item-4" class="hs-accordion-toggle menu-link">
                        
                        <span class="menu-text" data-lang="menu-item-4">Item 2.2</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                        <li class="menu-item">
              <a href="#" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="menu-item-5">Item 3.1</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="#" class="menu-link  ">
                  
                  <span class="menu-text " data-lang="menu-item-6">Item 3.2</span>
                  
              </a>
            </li>
                    </ul>
                </li>
                    </ul>
                </li>
                    </ul>
                </li>
<li class="menu-item">
              <a href="#" class="menu-link  pointer-events-none opacity-50">
                  <span class="menu-icon"><i class="iconify tabler--ban"></i></span>
                  <span class="menu-text " data-lang="disabled-menu">Disabled Menu</span>
                  
              </a>
            </li>
<li class="menu-item">
              <a href="#" class="menu-link !bg-primary !text-white ">
                  <span class="menu-icon"><i class="iconify tabler--star"></i></span>
                  <span class="menu-text !bg-inherit" data-lang="special-menu">Special Menu</span>
                  
              </a>
            </li>
</ul>
</div>
        </div>
    </div>
</aside>
<!-- End Sidebar -->
