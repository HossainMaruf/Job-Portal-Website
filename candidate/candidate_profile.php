<?php
      include_once('../inc/dbconnect.php');
    //   if(!isset($_SESSION["Candidate_ID"])){
    //        header("Location:index.php?status= Please login");
    //  }


?>
  <!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/all.min.css">
  
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
          > <?php //echo  $_SESSION["Candidate_FNAME"] ." ". $_SESSION["Candidate_LNAME"]; ?></a>
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
            <li class="nav-item "><a href="candidate_dashboard.php" class="nav-link  ">Dashboard</a></li>
            <li class="nav-item"><a href="candidate_profile.php" class="nav-link acitve bg-light text-dark">Profile</a></li>
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
        <nav class="navbar-dark">
         
            
              <!-- <div class="text-muted small fw-bold text-uppercase px-3">
                CORE
              </div> -->
              <img src="../assets/img/flower.jpg" alt="Logo" class="">
              <p class="lead text-light text-capitalize "><?php //echo $_SESSION["Candidate_FNAME"]; ?></p>
            <ul class="navbar-nav" >
            <li>
              <a href="candidate_profile.php" class="nav-link px-3 active">
                <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                <span>My Profile</span>
              </a>
            </li>
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            <li>
              <a href="#" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-graph-up"></i></span>
                <span>Applied Jobs</span>
              </a>
            </li>
            <li>
              <a href="#" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-graph-up"></i></span>
                <span>Job Alert</span>
              </a>
            </li>
          
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            <li>
              <a href="#" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-graph-up"></i></span>
                <span>Edit Profile</span>
              </a>
            </li>
            <li>
             
              <a href="#" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-graph-up"></i></span>
                <span>Add Resume</span>
              </a>
            </li>
            <li>
              <a href="#" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-graph-up"></i></span>
                <span>Add Skill</span>
              </a>
            </li>
            
          </ul>
        </nav>
      </div>
    </div>
    <!-- offcanvas -->
      <main class="mt-3 pt-3">
          <div class="contanier m-3 p-3">
              <div class="row">
                  <div class="col-md-12">
                  <div class="card my-4">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Candidate Information</h5>
                           
                           <form class="row g-3" action="" method="post">
                           <div class="col-md-6">
                                    <label for="fname" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="fname" name="fname">
                                </div>
                                <div class="col-md-6">
                                    <label for="lname" class="form-label">Last Name</label>
                                    <input type="password" class="form-control" id="lname" name="lname">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="inputEmail4" name="email">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword4" class="form-label">Phone Number</label>
                                    <input type="password" class="form-control" id="inputPassword4" name="phnno">
                                </div>
                                <div class="col-6">
                                    <label for="inputAddress" class="form-label">Category</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="" name="cate">
                                </div>
                                <div class="col-6">
                                    <label for="inputAddress2" class="form-label">Job Title</label>
                                    <input type="text" class="form-control" id="inputAddress2" placeholder="" name="jobtitle">
                                </div>
                                <div class="col-6">
                                    <label for="inputAddress" class="form-label">Qualification</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="" name="qualification">
                                </div>
                                <div class="col-6 ml-2">
                                    <label for="inputAddress2" class="form-label">Gender</label><br/>
                                    <!-- <input type="text" class="form-control" id="inputAddress2" placeholder="" name="gender"> -->
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="male" id="inlineRadio1" value="male">
                                        <label class="form-check-label" for="inlineRadio1">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="female" id="inlineRadio2" value="female">
                                        <label class="form-check-label" for="inlineRadio2">Female</label>
                                        </div>
                                </div>
                                <div class="col-12">
                                    <label for="inputCity" class="form-label">About yourself</label>
                                    <textarea id="inputCity"class="form-control" name="description"></textarea>
                                    
                                </div>
                                
                               
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                                </form>
                          
                        </div>
                    </div>
                  </div>
              </div>
          </div>
      </main>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>
<!-- <script src="../assets/js/main.js"></script> -->
</body>
</html>