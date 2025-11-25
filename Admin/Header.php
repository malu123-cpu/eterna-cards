<!doctype html>
<html lang="en">

<head>
  <?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["loginid"])) {
    echo "<script>
        alert('Please login first');
        window.location.href = '../guest/login.php';
    </script>";
    exit();
}
?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <link rel="stylesheet" href="assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="full" data-header-position="fixed">

    <!--  App Topstrip -->
 
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-between">
          <a href="Admin/index.html" class="text-nowrap logo-img">
            
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-6"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            
            <!-- Dashboard Section -->
            <li class="nav-small-cap">
              <iconify-icon icon="solar:dashboard-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
              <span class="hide-menu">Dashboard</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="adminindex.php" aria-expanded="false">
                <i class="ti ti-layout-dashboard"></i>
                <span class="hide-menu">Dashboard Overview</span>
              </a>
            </li>

            <!-- Master Data Management -->
            <li class="nav-small-cap">
              <iconify-icon icon="solar:database-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
              <span class="hide-menu">Master Data</span>
            </li>
            
            <!-- Category Management -->
            <li class="sidebar-item">
              <a class="sidebar-link" href="category.php" aria-expanded="false">
                <i class="ti ti-category"></i>
                <span class="hide-menu">Add Category</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="categoryView.php" aria-expanded="false">
                <i class="ti ti-category-2"></i>
                <span class="hide-menu">View Categories</span>
              </a>
            </li>

            <!-- Card Management -->
            <li class="sidebar-item">
              <a class="sidebar-link" href="card.php" aria-expanded="false">
                <i class="ti ti-id"></i>
                <span class="hide-menu">Add Card</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="cardView.php" aria-expanded="false">
                <i class="ti ti-id-badge"></i>
                <span class="hide-menu">View Cards</span>
              </a>
            </li>

            <!-- Location Management -->
            <li class="sidebar-item">
              <a class="sidebar-link" href="district.php" aria-expanded="false">
                <i class="ti ti-map-pin"></i>
                <span class="hide-menu">Add District</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="districtView.php" aria-expanded="false">
                <i class="ti ti-map-pins"></i>
                <span class="hide-menu">View Districts</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="location.php" aria-expanded="false">
                <i class="ti ti-location"></i>
                <span class="hide-menu">Add Location</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="location_view.php" aria-expanded="false">
                <i class="ti ti-location-filled"></i>
                <span class="hide-menu">View Locations</span>
              </a>
            </li>

            <!-- Booking Management -->
            <li class="nav-small-cap">
              <iconify-icon icon="solar:calendar-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
              <span class="hide-menu">Booking Management</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="viewBookings.php" aria-expanded="false">
                <i class="ti ti-calendar-event"></i>
                <span class="hide-menu">Standard Bookings</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="viewCustomiztionBookings.php" aria-expanded="false">
                <i class="ti ti-calendar-star"></i>
                <span class="hide-menu">Customized Bookings</span>
              </a>
            </li>

            <!-- Payment Management -->
            <li class="nav-small-cap">
              <iconify-icon icon="solar:wallet-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
              <span class="hide-menu">Payment Management</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="viewBookingPayments.php" aria-expanded="false">
                <i class="ti ti-credit-card"></i>
                <span class="hide-menu">Standard Payments</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="viewCustomizationPayments.php" aria-expanded="false">
                <i class="ti ti-credit-card-filled"></i>
                <span class="hide-menu">Customization Payments</span>
              </a>
            </li>

            <!-- Analytics & Reports -->
            <li class="nav-small-cap">
              <iconify-icon icon="solar:chart-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
              <span class="hide-menu">Analytics & Reports</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="datewisereport.php" aria-expanded="false">
                <i class="ti ti-report-analytics"></i>
                <span class="hide-menu">Date-wise Report</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="categorybooking_report.php" aria-expanded="false">
                <i class="ti ti-chart-pie"></i>
                <span class="hide-menu">Booking by Category</span>
              </a>  
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="categorycustomization_report.php" aria-expanded="false">
                <i class="ti ti-chart-donut"></i>
                <span class="hide-menu">Customizations by Category</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="cardwise_report.php" aria-expanded="false">
                <i class="ti ti-chart-bar"></i>
                <span class="hide-menu">Bookings by Card</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="bookingpayment_report.php" aria-expanded="false">
                <i class="ti ti-file-dollar"></i>
                <span class="hide-menu">Booking Payments</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="custpayment_report.php" aria-expanded="false">
                <i class="ti ti-file-euro"></i>
                <span class="hide-menu">Customization Payments</span>
              </a>
            </li>

            <!-- System -->
            <li class="nav-small-cap">
              <iconify-icon icon="solar:user-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
              <span class="hide-menu">System</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="../Guest/Logout.php" aria-expanded="false">
                <i class="ti ti-logout"></i>
                <span class="hide-menu">Logout</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler " id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
          </ul>
        </nav>
      </header>