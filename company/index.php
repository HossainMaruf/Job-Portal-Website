<?php 
include_once('../inc/dbconnect.php');
//check if company is login or not. 
//If company is loged in then redirect him/her to dashboard

if(isset($_SESSION['COMPANY_ID']))
{
  header('location: company_dashboard.php');
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
  
     



      $sql = "SELECT * FROM tblcompany_reg WHERE Email='".$email."' AND Password='".$password."'";
      $result = $conn->query($sql);
      // echo "<br>".$sql;
       //exit();
      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
              $_SESSION["COMPANY_ID"] = $row["Id"];
              $_SESSION["COMPANY_NAME"] = $row["Company"];
              $_SESSION["COMPANY_EMAIL"] = $row["Email"];
              $_SESSION["COMPANY_Phone"] = $row["Phone_Number"];
              $_SESSION["COMPANY_ADDRESS"] = $row["Address"];

  
          }
          
          // echo "login successfull";
          header("Location: company_dashboard.php");
          
      } else {
          // header("Location: index.php?error=password or username is not correct");
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
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/index_style.css">
    <link rel="stylesheet" href="company_assets/style.css">
    <title>Company</title>
</head>
<body>
<header class="">
</header>    

    <div class="container mt-5 py-4">
      <div class="row">
         <div class="col-lg-3"></div>
         <div class="col-lg-6 ">
            <div class="m-5 p-3 login-form">
              <h2 class="text-center mb-3 tilte">Employer Login </h2>
              <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <div class="mb-3">
                      <label for="email" class="form-label">Email </label>
                      <input type="email" name="email" id="email" class="form-control">
                      <p class="text-danger"><?php echo   $emailErr ; ?></p>
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" name="password" id="password" class="form-control">
                      <p class=""><a href="#" class="">Forgot Password?</a></p>
                      <p class="text-danger"><?php echo   $passwordErr ; ?></p>
                    </div>
                    <div class="mt-3 d-flex justify-content-center align-content-center">
                       <input type="submit" class="form-control w-50" value="Submit">
                      
                    </div>
                    <p class="my-2 text-center">Not a member? <span class=""><a href="Company_reg.php" class="sign-link">SignUp</a> Now</span></p>
                
              </form>
            </div>
         </div>
         <div class="col-lg-3"></div>
      </div>
    </div>

    <footer class="">
    
     </footer>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>