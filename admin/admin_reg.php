<?php  
   include_once('../inc/dbconnect.php');
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
    <title>Registration Form</title>
</head>
<body>
<header class="">
  <?php 
  // include_once('../header/navbar.php');
  ?>
</header>    





     <?php
        // Define variables and set them empty values
          $fstnameErr = $lstnameErr = $emailErr = $passErr = $addressErr = "";
          $fstname = $lstname = $email= $pass = $address = "";
          $checkBlankFirstname = FALSE;
          $checkBlankEmail = FALSE;
          $checkBlankPassword = FALSE;
          $checkBlankAddress = FALSE;
          $showErr= FALSE;
          $showAlert = FALSE;

          if($_SERVER["REQUEST_METHOD"] == "POST"){
             if(empty($_POST["fstname"])){
               $fstnameErr = "First name is required";
               $checkBlankFirstname = TRUE;
             } else{
               $fstname = test_input($_POST["fstname"]);
              //  check if name only contains letters and white space
              if(!preg_match("/^[a-zA-Z ]*$/",$fstname)){
                $fstnameErr = "Only letters and white space allowed";
              }
             }

             if(empty($_POST["lstname"])){
               $lstnameErr = "";
             } else{
               $lstname = test_input($_POST["lstname"]);
              //  Check if name only contains letters and white space
              if(!preg_match("/^[a-zA-Z-' ]*$/",$lstname)){
                $lstnameErr = "Only letters and white space allowed";
              }
             }
             if(empty($_POST["email"])){
               $emailErr = "Email address is required";
               $checkBlankEmail = TRUE;
             } else{
               $email = test_input($_POST["email"]);
              //  check if email address is well-formed 
                if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                  $emailErr = "Invalid email format";
                }
             }

             if(empty($_POST["pass"])){
               $passErr ="Password is required";
               $checkBlankPassword = TRUE;
             } else{
               $pass =test_input($_POST["pass"]);
             }

             if(empty($_POST["address"])){
               $addressErr= " This field is empty";
               $checkBlankAddress = TRUE;
             } else{
               $address = test_input($_POST["address"]);
             }
             
            //  Check whether any field blank
             if($checkBlankFirstname == FALSE && $checkBlankEmail == FALSE && $checkBlankPassword == FALSE && $checkBlankAddress == FALSE ){
                //  Check whether user-email is exist
            $existSql = "SELECT * FROM tbladmin_reg WHERE Email='".$email."'";
            $result = $conn->query($existSql);
            if($result->num_rows>0){
              $showErr = "User already exist";
            }else{
             

            //  Insert data into database table
            $sql = "INSERT INTO tbladmin_reg(FirstName, LastName, Email, Password, Address) VALUES('".$fstname."', '".$lstname."', '".$email."', '".$pass."', '".$address."')";

            if($conn->query($sql) === TRUE){
                 $showAlert = TRUE;
            } else{
              echo"Error:".$sql. "<br>".$conn->error;
            }
          
            $conn->close();
            }
             } 
           
        }


          function test_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }
     
     
     ?>
     <main class="my-3">
    <div class="container ">
      
      <div class="row  mt-3 ">
         <div class="col-lg-2"></div>
         <div class="col-lg-8">
            <div class=" m-2 p-2 reg-form">
         
                <h2 class="mb-3 text-center form-title p-4">Admin Sign-Up Form</h2>
                <?php if($showAlert){
        
        echo'<div class="alert alert-success mt-3 p-2 py-4 mx-3 " role="alert">
        <h4 class="alert-heading text-center"> <span class="font-weight-bold fs-2">Welcome! </span> You are a new admin.</h4>
        <p></p>
        <hr>
        <div class="text-center">
        <button class="btn btn-dark mx-3">Back</button>
        <button class="btn btn-info mx-x-3">Continue</button>
        </div>
       
      </div>';
              } ?>
                <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" class="p-3 mx-3 ">
                    <div class="mb-3">
                      <label for="first-name" class="form-label">First Name</label>
                      <input type="text" name="fstname" id="first-name" class="form-control" value="" required >
                     <span class="text-danger"> <?php echo $fstnameErr;?></span>
                    </div>
                    <div class="mb-3">
                      <label for="last-name" class="form-label">Last Name</label>
                      <input type="text" name="lstname" value="" id="last-name" class="form-control">
                     <span class="text-danger"> <?php echo $lstnameErr;?></span>
                       
                    </div>
                    <div class="mb-3">
                      <label for="email" class="form-label">Email </label>
                      <input type="email" name="email"  value="" id="email" class="form-control"  required>
                     <span class="text-danger"> <?php echo $emailErr;?></span>
                     <span class="text-danger"><?php echo  $showErr;?></span>

                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" name="pass"  value="" id="password" class="form-control"  required>
                     <span class="text-danger"> <?php echo $passErr;?></span>

                    </div>
                    <div class="mb-3">
                      <label for="address" class="form-label">Address</label>
                      <textarea name="address"  value="" id="address" class="form-control"  required></textarea>
                     <span class="text-danger"> <?php echo $addressErr;?></span>
                      
                    </div>
                    <div class="" >
                      <button class="btn btn-info btn-lg" type="submit" >Submit</button>
                      <button class="btn btn-warning btn-lg" type="reset">Reset</button>
                    </div>
                </form>
                 <h6 class="mt-1 p-2 mx-3">Have account already? <span class=""><a href="index.php" class="">SingIn</a></span></h6>
            </div>
         </div>
         <div class="col-lg-2"></div>
      </div>
    </div>
   </main>

    <footer class="">
    
    </footer>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>