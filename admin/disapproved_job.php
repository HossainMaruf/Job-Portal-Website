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
         
            
              <!-- <div class="text-muted small fw-bold text-uppercase px-3">
                CORE
              </div> -->
              
             
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
              <a href="disapproved_job.php" class="nav-link px-3 active">
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
              <a href="message.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-graph-up"></i></span>
                <span>Message</span>
              </a>
            </li>
            <li>
              <a href="add-job.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-graph-up"></i></span>
                <span>Add Job</span>
              </a>
            </li>
            
          </ul>
        </nav>
      </div>
    </div>
    <!-- offcanvas -->
    <main class="mt-5 pt-3 ml-4 px-4">
           <div class="container">
              <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-10">
                  <h3 class="display-4">Job List</h3>
                  <?php
                      $sql = "SELECT * FROM tbl_jobs where status=3 ";
                      $result = $conn->query($sql);
                        if($result-> num_rows>0){
                          // output data of each row
                          while($row = $result->fetch_assoc()){?>

                    <div class="card mb-3 mt-5  bg-light ">
                          <div class="row g-0">
                        <!-- <div class="col-md-3 text-center my-1">
                          <img src="../assets/img/flower.jpg" class=" rounded-circle " style="width:150px; height:150px;" alt="logo">
                        </div> -->
                        <div class="col-md-12 ">
                          <div class="card-body m-1">
                           <?php echo'<span class="mb-2 p-2"><i class="fas fa-hourglass-start"></i>   '.$row['Post_Date'].'</span>'?>

                            
                            <h3 class="card-title display-6 ">
                            <?php echo '<a href="job_details.php?id='.$row['Id'].'" class="">'.$row['Title'].'</a>'?>
                            </h3><?php echo'
                            <p class="card-text m-2 lead text-truncate">'.$row['Description']. '</p>'?> 
                            <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                            <div class="mb-2">
                           
                           <?php echo'<span class="me-auto-4 p-5"><i class="fas fa-user-graduate"></i>   '.$row['Education'].'</span>'?>
                           <?php echo'<span class="ms-5">Requirement: '.$row['Requirement'].'</span>'?>
                            </div>
                            <div class="d-flex justify-content-around ">
                            <?php echo'<span class=""><i class="fas fa-map-marker-alt"></i>  '.$row['Location'].'</span>'?>
                           <?php echo'<span class=""><i class="fas fa-dollar-sign"></i>  '.$row['Salary'].'</span>'?>
                           <?php echo'<span class=""><i class="fas fa-clock"></i>   '.$row['Job_type'].'</span>'?>
                           <?php echo'<span class=""><i class="fas fa-hourglass-end"  ></i>  '.$row['Dead_line'].'</span>'?>
                            </div>
                           

                            </div>
                          </div>
                        </div>
                      </div>
					   <?php }
                        } 
                         else{
                          
                          echo'<h3 class="display-5">No job found!</h3>';
                        }            
                  
                  ?>
                 
                   </div>


                        
                  <div class="col-md-1"></div>
                  </div>
                  
              </div>
 </main>


<script src="../assets/js/bootstrap.bundle.min.js"></script>
<!-- <script src="../assets/js/main.js"></script> -->
</body>
</html>