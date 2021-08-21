<?php include_once("inc/dbconnect.php");
 $search = $_GET['search'];
?>
<!DOCTYPE html>
<html  lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
         <title>Job List </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico"> -->

		<!-- CSS here -->
            <link rel="stylesheet" href="assets/css/bootstrap.min.css">
           
            <link rel="stylesheet" href="assets/css/all.min.css">
            <link rel="stylesheet" href="assets/css/index_style.css">
   
            
       
           <style>
              .card a{
                text-decoration: none;
                color: #333;
              }
              .card a:hover{
                text-decoration: underline;
                
              }
           </style>
   </head>
     
   <body>
   
    <header>
        <!-- Header Start -->
        <!-- <nav class="navbar navbar-expand-lg navbar-dark  fixed-top">
<div class="container">
  <a class="navbar-brand" href="index.php">CareerGate</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="job_list.php">Jobs</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Admin
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="admin/admin_reg.php">Admin Registration</a></li>
          <li><a class="dropdown-item" href="admin/index.php"> Admin LogIn</a></li>
          
          <li><a class="dropdown-item" href="admin/admin_dashboard.php">Admin Dashboard</a></li>
        </ul>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Employer
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="company/company_reg.php">Employer Registration</a></li>
          <li><a class="dropdown-item" href="company/index.php"> Employer LogIn</a></li>
          
          <li><a class="dropdown-item" href="company/company_dashboard.php">Employer Dashboard</a></li>
        </ul>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Candidate
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="candidate/candidate_reg.php">Candidate Registration</a></li>
          <li><a class="dropdown-item" href="candidate/index.php">Candidate LogIn</a></li>
          <li><a class="dropdown-item" href="candidate/candidate_dashboard.php">Candidate Dashboard</a></li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="job_list.php">Contact Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="job_list.php">About Us</a>
      </li>
      
    </ul>
   
  </div>
</div>
</nav> -->
<section id="banner">
              <div class="banner-jlist d-flex justify-content-center align-items-center">
                  <div class="banner-contents text-center text-white">
                      <h2 class="font-weight-bolder  mb-5">Search result for <em>"<?php echo $_GET['search']?>"</em></h2>
                   <div class="">
                  
                   </div>

                  </div>
              </div>
          </section>
        <!-- Header End -->
    </header>
    <main class="py-3">
         
          <!-- Hero Area Start-->
         
        <!-- Hero Area End -->
        <!-- Job List Area Start -->
       
        <div class="container mt-3">
               <div class="row">
               
               </div>
                <div class="row">
                    <!-- Left content -->
                     
                    <!-- Right content -->
                    <div class="col-xl-1 col-lg-1 col-md-2"></div>

                    <div class="col-xl-9 col-lg-9 col-md-8">
                        <?php
                        ?>
                         <div class="postlist">
                  <h6 class="display-5"></h6>
                  <?php
                  // $count_query = "SELECT count(*) as allcount FROM tbl_jobs";
                  // $count_result = $conn->query($count_query);
                  // $count_fetch = $count_result->fetch_array();
                  // $postCount = $count_fetch['allcount'];
                //     $search = "SELECT * FROM tbl_jobs WHERE MATCH(Title) AGAINST('Devoloper')";
                //    if( $conn->query($search)===TRUE){
                    $limit = 5;
                   
                    $sql = "SELECT * FROM tbl_jobs where MATCH(Title) AGAINST('$search') and Status=1 ORDER BY Id desc";
                    
                     $result = $conn->query($sql);
                      if( $result == TRUE){
                        
                        // output data of each row
                        while($row = $result->fetch_assoc()){
                             
                            ?>
                              
                  <div class="card mb-3 mt-5 bg-light p-3">
                        <div class="row g-0">
                      <!-- <div class="col-md-3 text-center my-1">
                        <img src="../assets/img/flower.jpg" class=" rounded-circle " style="width:150px; height:150px;" alt="logo">
                      </div> -->
                    
                      <div class="col-md-12 ">
                        <div class="card-body m-1">
                         <?php echo'<span class="mb-2 p-2"><i class="fas fa-hourglass-start"></i>   '.$row['Post_Date'].'</span>'?>

                          
                          <h3 class="card-title display-6 ">
                          <?php echo '<a href="job_details.php?id='.$row['Id'].'" class="">'.$row['Title'].'</a>'?>
                          </h3>
                          <?php
                           //echo'<p class="card-text m-1 lead text-truncate">'.$row['Description']. '</p>'?> 
                          <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                          <div class="mb-2">
                         
                         <?php echo'<span class="me-auto-4 p-5"><i class="fas fa-user-graduate"></i>   '.$row['Education'].'</span>'?>
                         <?php //echo'<span class="ms-5">Requirement: '.$row['Requirement'].'</span>'?>
                          </div>
                          <div class="d-flex justify-content-around ">
                          <?php echo'<span class=""><i class="fas fa-map-marker-alt"></i>  '.$row['Location'].'</span>'?>
                         <?php echo'<span class=""><i class="fas fa-dollar-sign"></i>  '.$row['Salary'].'</span>'?>
                         <?php echo'<span class=""><i class="fas fa-clock"></i>   '.$row['Job_type'].'</span>'?>
                         <?php echo'<span class=""><i class="fas fa-hourglass-end"  ></i>  '.$row['Dead_line'].'</span>'?>
                          </div>
                         

                          </div>
                          <div class=" position-absolute top-0 end-0  ">
                            <form action="applied.php" class="py-4 mx-5" method="post">
                            <input type="hidden" name="job_id" value="<?php echo $row['Id'];?>" />
                             <input type="submit"  value="Apply" class="btn btn-outline-primary ">
                            </form>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                     <?php }
                      } 
                       else{
                        echo $search;
                        echo'<h3 class="display-5">No job found!</h3>';
                      }            
                
                
                 ?>


                 
                      <div class="loadmore text-center mt-4">
                        <input type="button" id="loadBtn " value="View More" class="btn btn-outline-info text-dark">
                        <input type="hidden" id="row" value="0">
                        <input type="hidden" id="postCount" value="<?php echo $postCount; ?>">
                      </div>
                    </div>
					</div>
					  <div class="col-xl-1 col-lg-1 col-md-2">
					     <!--<div class="card p-3 mt-5"> 
                          <form action="#">
                         <div class="input-group mb-3">
                                    
                                    <input type="search" class="form-control" placeholder="search" name="search" >
                                   
                                    <span class="input-group-text" id="basic-addon1"> <i class="fas fa-search"></i></span>
                                    </div>
								
                                    <label for="exampleDataList" class="form-label">Job Type</label>
                                    <input type="search" class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                                    <datalist id="datalistOptions">
                                      <option value="Part Time">
                                      <option value="Full Time">
                                      <option value="Remote">
                                      <option value="Freelancer">
                                      <option value="Internship">
                                    </datalist>
     
                                        <br>
     
                                        <h4></h4>
                                        <div class="">
                                          <form action="#" method="get">
                                            <label for="exampleDataList" class="form-label">Category</label>
                                            <input type="search" class="form-control" list="catlistOptions" id="exampleDataList" placeholder="Type to search...">
                                            <datalist id="catlistOptions">
                                              <option value="IT Sector">
                                              <option value="">
                                              <option value="Seattle">
                                              <option value="Los Angeles">
                                              <option value="Chicago">
                                            </datalist>   
                                          </form>
                                        </div>
     
                                      
     
                                        <br>
     
                                        <label for="exampleDataList" class="form-label">Location</label>
                                          <input type="search" class="form-control" list="locationlistOptions" id="exampleDataList" placeholder="Type location to search...">
                                          <datalist id="locationlistOptions">
                                            <option value="Dhaka">
                                            <option value="Rajshahi">
                                            <option value="Pabna">
                                            <option value="Citagong">
                                            <option value="Abroad">
                                          </datalist>
                                       
                                   </form>
								   </div> -->
                        <!-- Job Category Listing End -->
                    </div>
                </div>
           
			</div>
       
        <!-- Job List Area End -->
        <!--Pagination Start  -->
     
        <!--Pagination End  -->
        
    </main>
        <footer class="">
            <?php include_once("footer/footer.php")?>
        </footer>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
    </body>
</html>