<?php include_once("inc/dbconnect.php");?>
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
        <nav class="navbar navbar-expand-lg navbar-dark  fixed-top">
<div class="container">
  <a class="navbar-brand" href="index.php">CareerGate</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="index.php"><i class="fas fa-home fx-2"></i></a>
      </li>
      
      
    </ul>
   
  </div>
</div>
</nav>
<section id="banner">
              <div class="banner-jlist d-flex justify-content-center align-items-center">
                  <div class="banner-contents text-center text-white">
                      <h2 class="font-weight-bolder  my-5 pt-5">Job List</h2>
                   <div class="">
                  
                   </div>

                  </div>
              </div>
          </section>
        <!-- Header End -->
    </header>
    <main class="py-4 my-5">
         
          <!-- Hero Area Start-->
         
        <!-- Hero Area End -->
        <!-- Job List Area Start -->
       
        <div class="container ">
               <div class="row">
               
               </div>
                <div class="row">
                    <!-- Left content -->
                     
                    <!-- Right content -->
                    <div class="col-xl-9 col-lg-9 col-md-8">
                    <div class="postlist mt-1">
                            <h6 class="fw-2 fs-1 text-center"></h6>
                            <?php
                            $limit = 3;
                                $sql = "SELECT * FROM tbl_jobs where status=1  ORDER BY Id desc LIMIT 0,".$limit;
                                $result = $conn->query($sql);
                                    if($result-> num_rows>0){
                                    // output data of each row
                                    while($row = $result->fetch_assoc()){?>

                                    <div class="card mb-3  bg-light p-3">
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
                                            <div class="mb-2">
                                        
                                        <?php echo'<span class="me-auto-4 p-5"><i class="fas fa-user-graduate"></i> Education:   '.$row['Education'].'</span>'?>
                                       
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
                                              <?php }?>
                                                
                                
                                              <?php } 
                                                  else{
                                  
                                                    echo'<h3 class="display-5">No job found!</h3>';
                                                  }            
                                            
                                            ?>
                     
                     <div class=" text-center">
                      <input type="button" id="loadBtn" value="Load More">
                    
                    </div>
                    </div>
					</div>
					  <div class="col-xl-3 col-lg-3 col-md-4">
					     <div class="card p-4"> 
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
								   </div>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    </body>
</html>