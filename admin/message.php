<?php
     include_once('../inc/dbconnect.php');
     if(!isset($_SESSION['ADMIN_ID'])){
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
  <link rel="stylesheet" href="../assets/css/all.min.css">
  <link rel="stylesheet" href="admin_assets/style.css">
  <style>
    .media-img{
        width: 6rem;
        height: 6rem;
    }
    .media-body{
        border-bottom: 1px solid red;
        border-right:1px solid red;
        box-shadow: 6px 5px 6px rgba(155,0,0,.5);
    }
  </style>
  
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
          > <?php echo $_SESSION["ADMIN_FNAME"]?></a>
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
            <li class="nav-item "><a href="admin_dashboard.php" class="nav-link acitve bg-light text-dark">Dashboard</a></li>
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
      <p class="lead text-light text-capitalize "><?php echo $_SESSION["ADMIN_FNAME"]; ?></p>
        <nav class="navbar-dark">
         
            
             
            <ul class="navbar-nav" >
            <li>
              <a href="admin_dashboard.php" class="nav-link px-3 ">
                <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                <span>Dashboard</span>
              </a>
            </li>
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            <li>
              <a href="approved_job.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-graph-up"></i></span>
                <span>Approved Jobs</span>
              </a>
            </li>
            <li>
              <a href="disapproved_job.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-graph-up"></i></span>
                <span>Disapproved Jobs</span>
              </a>
            </li>
          
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            <li>
             
              <a href="#" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-graph-up"></i></span>
                <span>Admin Details</span>
              </a>
            </li>
            <li>
              <a href="message.php" class="nav-link px-3 active">
                <span class="me-2"><i class="bi bi-graph-up"></i></span>
                <span>Message</span>
              </a>
            </li>
            
          </ul>
        </nav>
      </div>
    </div>
    <!-- offcanvas -->
    <main class="mt-3 p-5">
            <div class="container mt-3 ">
            <div class="row">
            <div class="col-md-2"></div>
             <div class="col-md-8">
               <h3 class="text-center mb-5 fs-1">Message</h3>
                <?php
                   $sql = "SELECT * FROM tbl_message ORDER BY Id desc";
                   $result = $conn->query($sql);
                   if($result->num_rows> 0){
                    //    fetch data
                      while( $row = $result->fetch_assoc()){?>
                        <div class="d-flex mb-5  p-3 media-body">
                    <div class="flex-shrink-0">
                        <img src="../assets/img/user.jpg" alt="User" class="media-img">
                    </div>
                    <div class="flex-grow-1 ms-3">
                       <h5 class="fs-5"><?php echo $row['Name']; ?></h5>
                       <h6 class="fs-6 fw-light "><a href="" class="text-muted text-decoration-none"><?php echo $row['Email']; ?></a></h6>
                       <p class="lead">
                                <?php echo $row['Message'];?>
                       </p>
                    </div>
                  
                </div>
                <?php }
                   }

                ?>
             </div>

                     
               
            <div class="col-md-2"></div>

            </div>
            </div>
    
    </main>
    
</body>
</html>