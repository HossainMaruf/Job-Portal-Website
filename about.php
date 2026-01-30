<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/index_style.css">
    <style class="">
      
    </style>

</head>
<body>
    <header id="headersection">
   
        <nav class="navbar navbar-expand-lg navbar-dark  fixed-top">
       <div class="container">
         <a class="navbar-brand" href="index.php">Job Portal</a>
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
       </nav>
      
       <section id="banner">
        <div class="banner-about d-flex justify-content-center align-items-center">
            <div class="banner-contents text-center text-white">
                <h2 class="font-weight-bolder  mb-5">About Us</h2>
             <div class="">
             
             </div>

            </div>
        </div>
    </section>
        </header>
    <main class="">
            <div class="container py-5 mt-3">
                <div class="row">
                    <div class="col">
                        <div class="">
                            <h2 class="fs-2 fw-2">Our Mission </h2>
                            <p class="lead">
                                To help people everywhere find a job and company they love.</p> 
                            
                        </div>
                        
                    </div>
                 
                </div>
                <div class="row">
                    <div class="col">
                        <div class="col">
                            <div class="">
                             <h2 class="fs-2 fw-2">Our Values</h2>
                             <p class="">
                                 <strong class=""> We are transparent.</strong>
                                 We are open and honest. We share information – the good and the bad – so we can continuously learn, collaborate and make the right decisions. See more about our commitment to transparency and what we’ve shared with the world from inside CareerGate.</p>
     
                                 <p class="">
                                    <strong class="">We are innovative.</strong>
                                      We actively pursue new and different ways to further CareerGate’s mission. We forget our own path by challenging the status too.</p>
     
                                 <p class="">
                                    <strong class=""> We are good people.</strong> 
                                    We work together with integrity, respect and compassion for one another. We have fun together. We are inclusive, fair and humble while remaining confident. We do the right thing, period.</p>
     
                                <p class=""> 
                                    <strong class="">We have grit.</strong>
                                     We are resilient, resourceful and scrappy. We see challenges as opportunities. With passion and courage, we come together to get the job done.</p> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
    <footer class="">
      <?php include_once("footer/footer.php");?>
    </footer>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>