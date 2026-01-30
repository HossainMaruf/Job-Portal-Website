<?php 
include_once('../inc/dbconnect.php');

//check if admin is login or not. 
//If admin is loged in then redirect him/her to dashboard

if(isset($_SESSION['ADMIN_ID']))
{
  header('location: admin_dashboard.php');
}


$emailErr = $passwordErr="";
$email = $password= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else {
    $password = $_POST["password"];
    }
  
    
  if( isset($email) &&  isset($password) )
  {

   
    $sql = "SELECT * FROM tbladmin_reg WHERE Email='".$email."' AND Password='".$password."'";
    $result = $conn->query($sql);
    // echo "<br>".$sql;
    // exit();
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $_SESSION["ADMIN_ID"] = $row["ID"];
            $_SESSION["ADMIN_FNAME"] = $row["FirstName"];
            $_SESSION["ADMIN_LNAME"] = $row["LastName"];
            $_SESSION["ADMIN_EMAIL"] = $row["Email"];
            $_SESSION["ADMIN_ADDRESS"] = $row["Address"];
        }
        echo "login successfull";
      
        header("Location: admin_dashboard.php");
           
    } else {
        header("Location: index.php?error=password or username is not correct");
    }
    $conn->close();



     
  }

 
}

function test_input($data) {
  $data = trim($data); //space remove
  $data = stripslashes($data); // slash 
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
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/index_style.css">
    <link rel="stylesheet" href="admin_assets/admin_style.css">
    <title>Admin</title>
</head>
<body>
<header class="">
<nav class="navbar navbar-expand-lg navbar-dark  fixed-top">
          <div class="container">
            <a class="navbar-brand" href="index.php">Job Portal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                </li>
                
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Admin
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="admin_reg.php">Admin Registration</a></li>
                    <li><a class="dropdown-item" href="index.php"> Admin LogIn</a></li>
                    
                    <li><a class="dropdown-item" href="admin_dashboard.php">Admin Dashboard</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Employer
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="../company/company_reg.php">Employer Registration</a></li>
                    <li><a class="dropdown-item" href="../company/index.php"> Employer LogIn</a></li>
                    
                    <li><a class="dropdown-item" href="../company/company_dashboard.php">Employer Dashboard</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Candidate
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="../candidate/candidate_reg.php">Candidate Registration</a></li>
                    <li><a class="dropdown-item" href="../candidate/index.php">Candidate LogIn</a></li>
                    <li><a class="dropdown-item" href="../candidate/candidate_dashboard.php">Candidate Dashboard</a></li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="job_details.php">Jobs</a>
                </li>
                
              </ul>
             
            </div>
          </div>
      </nav>
</header>   


    <div class="container mt-5 py-4">
      <div class="row">
         <div class="col-lg-3"></div>
         <div class="col-lg-6">
            <div class="login-form m-5 p-4">
              <h2 class="text-center mb-3 tilte">Admin Login </h2>
              <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <div class="mb-3 form-group">
                      <label for="email" class="form-label">Email </label>
                      <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="mb-3 form-group">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" name="password" id="password" class="form-control">
                      <p class=""><a href="#" class="">Forgot Password?</a></p>
                      <p class="text-danger"><?php echo   $passwordErr ; ?></p>
                    </div>
                    <div class="mt-3 d-flex justify-content-center align-content-center">
                       <input type="submit" class="form-control w-50 " value="Submit">
                    </div>
                    <p class="my-2 text-center">Not a member? <span class=""><a href="Company_reg.php" class="sign-link">SignUp</a> Now</span></p>
                
              </form>
            </div>
         </div>
         <div class="col-lg-3"></div>
      </div>
    </div>

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
                <li class=""><a href="#" class="">International Job</a></li>
                <li class=""><a href="#" class="">Create Account</a></li>
                <li class=""><a href="#" class="">Upload Resume</a></li>
                <li class=""><a href="#" class="">Resume Help</a></li>
                <li class=""><a href="#" class="">Career Advice</a></li>
              </ul>
            </div>
            <div class="col-lg-4">
              <div class="me-auto">
              <h4 class="text-center py-2">Employer</h4>
              <ul class="info">
              <li class=""><a href="#" class="">Get Employee</a></li>
              <li class=""><a href="#" class="">Create Account</a></li>
              <li class=""><a href="#" class="">Post Job</a></li>
              <li class=""><a href="#" class="">Browse Resume</a></li>
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
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>