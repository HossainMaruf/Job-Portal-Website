<?php
     include_once('../inc/dbconnect.php');
     if(!isset($_SESSION['COMPANY_ID'])){
          header("Location:index.php?status= Please login");
     }


?>
  <!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="company_assets/style_dashboard.css">
  
</head>
<body>
 <!-- top navigation bar -->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container-fluid">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#sidebar"
          aria-controls="offcanvasExample"
        >
          <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
        </button>
        <a
          class="navbar-brand me-auto ms-lg-0 ms-5  text-uppercase fw-bold"
          href="#"
          > <?php echo $_SESSION["COMPANY_NAME"]; ?></a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#topNavBar"
          aria-controls="topNavBar"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-center" id="topNavBar">
          
          <ul class="navbar-nav ms-auto">
           
            <li class="nav-item"><a href="../index.php" class="nav-link">Home</a></li>
            <li class="nav-item "><a href="company_dashboard.php" class="nav-link acitve bg-light text-dark">Dashboard</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Profile</a></li>
            <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- top navigation bar -->
    <!-- offcanvas -->
    <div
      class="offcanvas offcanvas-start text-center sidebar-nav bg-dark"
      tabindex="-1"
      id="sidebar"
    >
      <div class="offcanvas-body p-0">
      <img src="../assets/img/flower.jpg" alt="Logo" class="">
      <p class="lead text-light text-capitalize "><?php echo $_SESSION["COMPANY_NAME"]; ?></p>
        
          <nav class="navbar-dark">
             <ul class="navbar-nav" >
            <li>
              <a href="company_dashboard.php" class="nav-link px-3 active">
                <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                <span>Dashboard</span>
              </a>
            </li>
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            <li>
              <a href="#" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-graph-up"></i></span>
                <span>Manage Jobs</span>
              </a>
            </li>
            <li>
              <a href="#" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-graph-up"></i></span>
                <span>Manage Applicants</span>
              </a>
            </li>
          
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            <li>
             
              <a href="#" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-graph-up"></i></span>
                <span>Browse Resume</span>
              </a>
            </li>
            <li>
              <a href="post-job.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-graph-up"></i></span>
                <span>Post Job</span>
              </a>
            </li>
            
          </ul>
        </nav>
      </div>
    </div>
    <!-- offcanvas -->
        <main class="mt-5 pt-3">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <h4>Dashboard</h4>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 mb-3">
                <div class="card bg-primary text-white h-100">
                  <div class="card-body py-5">Primary Card</div>
                  <div class="card-footer d-flex">
                    View Details
                    <span class="ms-auto">
                      <i class="bi bi-chevron-right"></i>
                    </span>
                  </div>
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <div class="card bg-warning text-dark h-100">
                  <div class="card-body py-5">Warning Card</div>
                  <div class="card-footer d-flex">
                    View Details
                    <span class="ms-auto">
                      <i class="bi bi-chevron-right"></i>
                    </span>
                  </div>
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <div class="card bg-success text-white h-100">
                  <div class="card-body py-5">Success Card</div>
                  <div class="card-footer d-flex">
                    View Details
                    <span class="ms-auto">
                      <i class="bi bi-chevron-right"></i>
                    </span>
                  </div>
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <div class="card bg-danger text-white h-100">
                  <div class="card-body py-5">Danger Card</div>
                  <div class="card-footer d-flex">
                    View Details
                    <span class="ms-auto">
                      <i class="bi bi-chevron-right"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="fw-bold">
           
               <p class="">Company Name</p>
               
            </div>

        </main>

<script src="../assets/js/bootstrap.bundle.min.js"></script>
<!-- <script src="../assets/js/main.js"></script> -->
</body>
</html>