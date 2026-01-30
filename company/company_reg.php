<?php
include_once('../inc/dbconnect.php');
?>
<?php
// define variables and set to empty values
$nameErr =$emailErr =$passwordErr =$phnErr= $addressErr="";
$name = $phn= $email =  $password = $address= $filename="";
$checkBlankFirstname = FALSE;
$checkBlankEmail = FALSE;
$checkBlankPhnNo = FALSE;
$checkBlankPassword = FALSE;
$checkBlankAddress = FALSE;
$showErr= FALSE;
$showAlert = FALSE;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(empty($_POST["company"])){
        $nameErr="Name is required";
    }
    else{
        $name = test_input($_POST["company"]);
    }
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
    $passwordErr = "Empty";
  } else {
    $password = test_input($_POST["password"]);

  }
  if(empty($_POST["phnno"])){
      $phnErr="Empty";
  }
  else{
      $phn = test_input($_POST["phnno"]);
  }
  if (empty($_POST["address"])) {
    $addressErr = "Empty";
  } else {$address = test_input($_POST["address"]);

  }
 if($_FILES["file"]){
      $filename = $_FILES["file"]["name"];
      $tempname= $_FILES["file"]["tmp_name"];
      $folder = "../assets/company_logo/".$filename;
      move_uploaded_file($tempname,$folder);
  }

  //check any field left empty
  if($checkBlankFirstname== FALSE && $checkBlankEmail== FALSE && $checkBlankPassword==FALSE && $checkBlankPhnNo== FALSE && $checkBlankAddress== FALSE){
    // Check any user exist
    $existEmail = "SELECT * FROM tblcompany_reg WHERE Email='".$email."'";
    $result = $conn->query($existEmail);
    if($result->num_rows >0){
      $showErr = "User alreadt exist";
    }else{
          //Data insert into table
        $sql = "INSERT INTO tblcompany_reg(Company,	Email,Password,	Contact_No,Address,Company_logo)
        VALUES('".$name."','".$email."','".$password."','".$phn."','".$address."','".$filename."')";

        if($conn->query($sql) === TRUE){
            $showAlert = TRUE;
            // echo "New record created successfully";
        } else {
            echo "<br>Error: " . $sql . "<br>" . $conn->error;
        }
    }
  }

 $conn->close();
}


function test_input($data) {
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
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/all.min.css">
  
  <link rel="stylesheet" href="../assets/css/index_style.css">
  <link rel="stylesheet" href="company_assets/style.css">
  
    <title>Document</title>
</head>
<body>
<header class="">

</header>
<main class="my-3">
  <div class="container">
      <div class="row">
         <div class="col-lg-2"></div>
         <div class="col-lg-8 ">
            <div class=" m-2 p-2 reg-form">
                <h2 class="text-center my-4 form-title">Employer Sign-Up Form</h2>
                <?php if($showAlert){
        
                     echo'<div class="alert alert-success mt-3 p-2 py-4 mx-3 " role="alert">
                        <h4 class="alert-heading text-center"> <span class="font-weight-bold fs-2">Welcome! </span> You are a new member.</h4>
                        <p></p>
                        <hr>
                        <div class="text-center">
                        <a  href="../index.php" class="btn btn-dark mx-3">Back</a>
                        <a href="index.php" class="btn btn-info mx-x-3">Continue</a>
                        </div>
                        </div>';
              } ?>
                <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data" class="p-3 mx-3 ">
                    <div class="mb-3">
                      <label for="name" class="form-label"> Company/Consultancy</label>
                      <input type="text" name="company" id="name" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                      <label for="email" class="form-label">Email </label>
                      <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <div class="mb-3">
                      <label for="address" class="form-label">Address</label>
                      <textarea name="address" id="address" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                      <label for="contact" class="form-label">Contact Number</label>
                      <input type="tel" name="phnno" id="contact" class="form-control" required>
                    </div>
                    <div class="mb-3">
                      <label for="logo" class="form-label">Company-logo</label>
                      <input type="file" name="file" class="form-control" id="logo" >
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