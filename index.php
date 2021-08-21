<?php
  include_once('inc/dbconnect.php');
?>
<?php
// Define variable set them empty
 $nameErr = $emailErr = $messageErr = "";
 $name = $email = $message = "";
 $checkBlankName = FALSE;
 $checkBlankEmail = FALSE;
 $checkBlankMessage = FALSE;
  if($_SERVER['REQUEST_METHOD']=="POST"){
     if(empty($_POST['name'])  ){
       $nameErr= "Name is required";
       $checkBlankName = TRUE;
    } else{
     $name = test_input($_POST['name']);
          if(!preg_match("/^[a-zA-Z ]*$/",$name)){
           $nameErr = "Only letter and white space allowed";
         }
      }

     if(empty($_POST['email']) ){
            $emailErr = "Email Address is required";
            $checkBlankEmail = TRUE;
     } else{
       $email = test_input($_POST['email']);
      //  Check if e-mail address is well formate 
       if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
         $emailErr = "Invalid Email Address";
       }
     }

     if(empty($_POST['msz']) ){
       $messageErr="Write some message";
       $checkBlankMessage = TRUE;
     } else{
       $message = test_input($_POST['msz']);
     }
     if($checkBlankName == FALSE && $checkBlankEmail == FALSE && $checkBlankMessage == FALSE){
         //  Data insert into database
      $m_sql = "INSERT INTO tbl_message(Name,Email,Message) VALUES('".$name."', '".$email."', '".$message."')";

      if($conn->query($m_sql) === TRUE){
        // echo"New record insert successfully.";
      }else{
        echo"<br>Error:".$m_sql."<br>".$conn->error;
      }
     }
   
    //  $conn->close();
  }
  

  function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
  
    <link rel="stylesheet" href="assets/css/index_style.css">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->

    <title>Job Portal</title>
</head>
<body>
 <header id="index-hero">
   
 <nav class="navbar navbar-expand-lg navbar-dark  fixed-top">
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
      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Admin
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="admin/admin_reg.php">Admin Registration</a></li>
          <li><a class="dropdown-item" href="admin/index.php"> Admin LogIn</a></li>
          
          <li><a class="dropdown-item" href="admin/admin_dashboard.php">Admin Dashboard</a></li>
        </ul>
      </li> -->
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
        <a class="nav-link " href="#contact">Contact Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="about.php">About Us</a>
      </li>
      
    </ul>
   
  </div>
</div>
</nav>
        <section id="banner">
              <div class="banner-container d-flex justify-content-center align-items-center">
                  <div class="banner-contents text-center text-white">
                      <h2 class="font-weight-bolder  mb-5">Find the Job That Fits Your Life
and Start up Your Career</h2>
                   <div class="">
                   <form action="search.php" method="get" class="d-flex  justify-content-center align-items-center">
                        <input class="form-control me-2" type="search" placeholder="Search" name="search">
                        <button class="btn btn-light" type="submit"><i class="fas fa-search text-dark"></i></button>
                    </form>
                   </div>

                  </div>
              </div>
          </section>
 </header>

<main class="">
      <!-- Job list section -->
       <section class="my-5">
       <div class="container">
              <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-10">
                    <div class="postlist">
                  <h6 class="fw-2 fs-1 text-center">Latest Jobs</h6>
                  <?php
                   $count_query = "SELECT count(*) as allcount FROM tbl_jobs";
                   $count_result = $conn->query($count_query);
                   $count_fetch = $count_result->fetch_array();
                   $postCount = $count_fetch['allcount'];
                  $limit = 3;
                      $sql = "SELECT * FROM tbl_jobs where status=1 ORDER BY Id desc LIMIT 0,".$limit;
                      $result = $conn->query($sql);
                        if($result-> num_rows>0){
                          // output data of each row
                          while($row = $result->fetch_assoc()){?>

                    <div class="card mb-3 mt-3 bg-light p-3">
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
                          
                            <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                            <div class="mb-2">
                           
                           <?php echo'<span class="me-auto-4 p-5"><i class="fas fa-user-graduate"></i>   '.$row['Education'].'</span>'?>
                          
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

                        
                  <div class="col-md-1"></div>
                  </div>
                  
              </div>
       </section>
       <!-- End job list section -->
       <!--Find Job by Service Section-->
       
    <section class="bg-light text-center mt-4 mb-3 py-4" >
      
            <div class="container ">
                <div class="row">
                <div class="my-4">
                  <h5 class="fw-2 fs-1">
                   Our Service
                      </h5>
                  <p class=""></p>
                    
                    
                </div>
                </div>
               
          <div class="row row-cols-2 row-cols-lg-3 g-2 g-lg-3">
          <div class="col">
              <div class="p-3 catagory-col "><i class="fas fa-search icon-style rounded-circle"></i>
                    <h4 class="">Search Job</h4>
                    <h5 class=""></h5></div>
            </div>
           
            <div class="col">
              <div class="p-3 catagory-col "><i class="fas fa-chart-line icon-style rounded-circle "></i>
                    <h4 class="">Post Job </h4>
                    <h5 class=""></h5></div>
            </div>
          
            
            <div class="col">
              <div class="p-3 catagory-col "><i class="fas fa-handshake icon-style rounded-circle"></i>
                    <h4 class="">Get Job</h4>
                    <h5 class=""></h5></div>
            </div>
            <div class="col">
              <div class="p-3 catagory-col "><i class="fas fa-search-plus icon-style rounded-circle"></i>
                    <h4 class="">Browse CV</h4>
                    <h5 class=""></h5></div>
            </div>
            <div class="col ">
              <div class="p-3 catagory-col "><i class="fas fa-bullhorn icon-style rounded-circle"></i>
                    <h4 class="">Advertise job</h4>
                    <h5 class=""></h5>
                    </div>
            </div>
          
            
            
          </div>
         
                  
              
              
        
      
        </div> 
        
     
    </section>
    <!-- End Catagory section -->

    <!-- Start help seciton -->
      <section class="mt-4 mb-3 py-4">
        <div class="container mt-5">
          <div class="row text-center">
            <div class="col-lg-12"><h5 class="fw-2 fs-1 py-3">Let us help you get started</h5></div>
          </div>
          <div class="row ">
            
              <div class="col-lg-4 hlp-style d-flex">
                <div class="card  card-help p-2 m-3 text-center" >
                  <img src="assets/img/find_job.jpg" class="card-img-top " alt="Find Job">
                        <div class="card-body mt-2">
                          <h5 class="card-title">Are You Looking for a Job?</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Find a Job</a>
                        </div>
                  </div>
                </div>
                <div class="col-lg-4 hlp-style d-flex">
                <div class="card card-help p-2 m-3 text-center" >
                  <img src="assets/img/podcast.svg" class="card-img-top " alt="Post Job">
                        <div class="card-body mt-2">
                          <h5 class="card-title">Employers Looking to Post a Job?</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Post Job</a>
                        </div>
                  </div>
                </div>
                <div class="col-lg-4 hlp-style d-flex">
                <div class="card card-help p-2 m-3 text-center" >
                  <img src="assets/img/data-points.svg" class="card-img-top " alt="Job Data">
                        <div class="card-body mt-2">
                          <h5 class="card-title">Job Market Data</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Get Data</a>
                        </div>
                  </div>
                
                          </div>
          </div>
        </div>
      </section>
      <!-- End help section -->
      <!-- About Section -->
     
      <!-- Start Contact section -->
      <section class="bg-light " id="contact">
        <div class="container ">
          <div class="row">
            <div class="col-xl-6 col-lg-6 msz-img d-flex d-xl-flex justify-content-center align-content-center">
              <img src="assets/img/msz-img.jpg" alt="Message Image" class="img-fluid d-none d-lg-block">
            </div>
            <div class="col-xl-6 col-lg-6 d-flex d-xl-flex justify-content-center align-content-center">
              <div class="m-3 p-5">
              <h2 class="text-info my-5 fw-1 fs-2 py-3  ">Get In Touch With Us</h2>
              <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="msz-form">
                      <div class="mb-4">
                      <input type="text" class="form-control" name="name" id="fullname" placeholder="Name" required>
                      <p class="text-danger">
                          <?php echo $nameErr;?>
                      </p>
                      </div>
                      <div class="mb-4">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" required>
                        <p class="text-danger">
                          <?php echo $emailErr;?>
                        </p>
                      </div>
                      <div class="mb-4">
                        <textarea name="msz" id=""  class="form-control" placeholder="Message" required></textarea>
                        <p class="text-danger">
                          <?php echo $messageErr;?>
                        </p>
                      </div>
                      <div class="text-center">
                        <input type="submit" value="Send" class="btn btn-info w-50 ">
                      </div>
                
              </form>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End Section -->
     
</main>
    <footer class="">
      <section class="text-center footer-section mt-3 p-3">
        <div class="container">
          <div class="row mb-2 p-3">
            <div class="col-lg-4">
              <h4 class="py-4">Contact Us</h4>
             
              
                <ul class="social-network social-circle">
          <li><a href="#" class="icoRss" title="Rss"><i class="fa fa-rss"></i></a></li>
          <li><a href="#" class="icoFacebook" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
          <li><a href="#" class="icoTwitter" title="Twitter"><i class="fab fa-twitter"></i></a></li>
          <li><a href="#" class="icoGoogle" title="Google +"><i class="fab fa-google-plus"></i></a></li>
          <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
        </ul>
                         
               
              
            </div>
            <div class="col-lg-4">
              <h4 class="text-center py-2">Job Seekers</h4>
              <ul class="info">
                <li class=""><a href="" class="">International Job</a></li>
                <li class=""><a href="" class="">Create Account</a></li>
                <li class=""><a href="" class="">Upload Resume</a></li>
                <li class=""><a href="" class="">Resume Help</a></li>
                <li class=""><a href="" class="">Career Advice</a></li>
              </ul>
            </div>
            <div class="col-lg-4">
              <div class="me-auto">
              <h4 class="text-center py-2">Employer</h4>
              <ul class="info">
              <li class=""><a href="" class="">Get Employee</a></li>
              <li class=""><a href="" class="">Create Account</a></li>
              <li class=""><a href="" class="">Post Job</a></li>
              <li class=""><a href="" class="">Browse Resume</a></li>
              </ul>
              </div>
              
            </div>
          </div>
          <hr class="text-white">
          <div class="row p-3 ">
          <div class="col-lg-12 text-center text-lg-left mb-2 mb-lg-0 mt-3">
                    <span class=" mb-0 mt-1 ">&copy; Copyright 2021 </span>
                    <p class=""><a href="https://www.facebook.com/rajiashultana.mohona" class="text-danger"> Rajia Shultana</a></p>
                </div>
          </div>
        </div>

      </section>
    </footer>
   <script src="assets/js/bootstrap.bundle.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
  $(document).ready(function () {
    $(document).on('click', '#loadBtn', function () {
      var row = Number($('#row').val());
      var count = Number($('#postCount').val());
      var limit = 3;
      row = row + limit;
      $('#row').val(row);
      $("#loadBtn").val('Loading...');
 
      $.ajax({
        type: 'POST',
        url: 'loadmore_data.php',
        data: 'row=' + row,
        success: function (data) {
          var rowCount = row + limit;
          $('.postList').append(data);
          if (rowCount >= count) {
            $('#loadBtn').css("display", "none");
          } else {
            $("#loadBtn").val('Load More');
          }
        }
      });
    });
  });
</script>

   
</body>
</html>