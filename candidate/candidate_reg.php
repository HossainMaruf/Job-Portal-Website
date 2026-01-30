<?php
include_once('../inc/dbconnect.php');
?>
<?php
// define variables and set to empty values
$fstnameErr =$lstnameErr =$emailErr =$passwordErr =$phnErr= $addressErr=$varsityErr=$departmentErr="";
$fstname =$lstname = $phn= $email =  $password = $address= $filename=$varsity=$department="";
$checkBlankFirstname = FALSE;
$checkBlankEmail = FALSE;
$checkBlankPhnNo = FALSE;
$checkBlankPassword = FALSE;
$checkBlankAddress = FALSE;
$checkBlankDept = FALSE;
$checkBlankVarsity = FALSE;

$showErr= FALSE;
$showAlert = FALSE;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["firstname"])) {
      $fstnameErr = "Name is required";
      $checkBlankFirstname= TRUE;
    } else {
      $fstname = test_input($_POST["firstname"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/",$fstname)) {
        $fstnameErr = "Only letters and white space allowed";
      }
    }
    if (empty($_POST["lastname"])) {
      $lstnameErr = "";
    } else {
      $lstname = test_input($_POST["lastname"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/",$lstname)) {
        $lstnameErr = "Only letters and white space allowed";
      }
    }
    
    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
      $checkBlankEmail= TRUE;
    } else {
      $email = test_input($_POST["email"]);
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
    }
      
    if (empty($_POST["password"])) {
      $passwordErr = "Empty";
      $checkBlankPassword = TRUE;
    } else {
      $password = test_input($_POST["password"]);
  
    }
    if(empty($_POST["num"])){
        $phnErr="Empty";
        $checkBlankPhnNo = TRUE;
    }
    else{
        $phn = test_input($_POST["num"]);
    }
    if(empty($_POST["varsity"])){
        $varsityErr="Empty";
        $checkBlankVarsity = TRUE;
    }
    else{
        $varsity = test_input($_POST["varsity"]);
    }
    if(empty($_POST["dept"])){
        $departmentErr="Empty";
        $checkBlankDept = TRUE;
    }
    else{
        $department= test_input($_POST["dept"]);
    }
    if (empty($_POST["address"])) {
        $addressErr = "Empty";
        $checkBlankAddress = TRUE;
      } else {$address = test_input($_POST["address"]);
    
      }
     if($_FILES["cv"]){
          $filename = $_FILES["cv"]["name"];
          $tempname= $_FILES["cv"]["tmp_name"];
          $folder = "../assets/CV/".$filename;
          move_uploaded_file($tempname,$folder);
      }
      //Check whether any field left blank
      if($checkBlankFirstname == FALSE && $checkBlankEmail == FALSE && $checkBlankPassword == FALSE && $checkBlankPhnNo == FALSE && $checkBlankVarsity == FALSE && $checkBlankVarsity == FALSE && $checkBlankAddress == FALSE){
        $existEmail = "SELECT * FROM tblemployee_reg WHERE Email ='".$email."'";
        $result = $conn->query($existEmail);
        if($result->num_rows >0){
          $showErr ="User already exist!";
        } else{
           
            //data insert into table 
            $sql = "INSERT INTO tblemployee_reg(FirstName,LastName,Email,Password,Phone_Number,University,Department,Address,CV_or_Resume)
            VALUES('".$fstname."','".$lstname."','".$email."','".$password."','".$phn."','".$varsity."','".$department."','".$address."','".$filename."')";

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
    <link rel="stylesheet" href="candidate_assets/style.css">
    <title>Document</title>
</head>
<body>
<header class=""></header> 

<main  class="my-3">
<div class="container">
      <div class="row">
         <div class="col-lg-2"></div>
         <div class="col-lg-8">
            <div class="m-2 p-2 reg-form">
                <h2 class="mb-3 text-center form-title p-4">Candidate Sign-Up Form</h2>
                <?php if($showAlert){
        
                      echo'<div class="alert alert-success mt-3 p-2 py-4 mx-3 " role="alert">
                      <h4 class="alert-heading text-center"> <span class="font-weight-bold fs-2">Welcome! </span> You are a new member.</h4>
                      <p></p>
                      <hr>
                      <div class="text-center">
                      <button class="btn btn-dark mx-3">Back</button>
                      <button class="btn btn-info mx-x-3">Continue</button>
                      </div>
                    
                    </div>';
              } ?>
                <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data" class="p-3 mx-3 ">
                <div class="mb-3">
                      <label for="first-name" class="form-label">First Name</label>
                      <input type="text" name="firstname" id="first-name" class="form-control" required>
                      <span class="text-danger"> <?php echo $fstnameErr;?></span>
                    </div>
                    <div class="mb-3">
                      <label for="last-name" class="form-label">Last Name</label>
                      <input type="text" name="lastname" id="last-name" class="form-control">
                      <span class="text-danger"><?php echo $lstnameErr ?></span>
                    </div>
                    
                    <div class="mb-3">
                      <label for="email" class="form-label">Email </label>
                      <input type="email" name="email" id="email" class="form-control" required>
                      <span class="text-danger"><?php ?></span>
                      <span class="text-danger"><?php echo  $showErr;?></span>
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" name="password" id="password" class="form-control" required>
                      <span class="text-danger"><?php echo $passwordErr; ?></span>

                    </div>
                    <div class="mb-3">
                      <label for="address" class="form-label">Address</label>
                      <textarea name="address" id="address" class="form-control"></textarea>
                      <span class="text-danger"><?php echo $addressErr; ?></span>

                    </div>
                    <div class="mb-3">
                      <label for="contact" class="form-label">Contact Number</label>
                      <input type="tel" name="num" id="contact" class="form-control">
                      <span class="text-danger"><?php echo $phnErr ?></span>


                    </div>
                    <div class="mb-3">
                      <label for="varsity" class="form-label">University</label>
                      <input type="text" name="varsity" id="varsity" class="form-control">
                      <span class="text-danger"><?php echo $varsityErr; ?></span>

                    </div>
                    <div class="mb-3">
                      <label for="dept" class="form-label">Department</label>
                      <input type="text" name="dept" id="dept" class="form-control">
                      <span class="text-danger"><?php echo $departmentErr ?></span>

                    </div>
                    <div class="mb-3">
                      <label for="cv" class="form-label">CV/Resume</label>
                      <input type="file" name="cv" class="form-control" id="cv" >
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