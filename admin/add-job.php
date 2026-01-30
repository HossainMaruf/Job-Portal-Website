<?php
include_once('../inc/dbconnect.php');

if (!isset($_SESSION['COMPANY_ID'])) {
    header("Location: company_login.php?status=please login");
}


// define variables and set to empty values
$titleErr = $descriptionErr = $educationErr = $requirementErr = $locationErr = $salaryErr = $categoryErr =$job_typeErr=$vacancyErr=$companyNameErr=$deadlineErr="";
$title = $description = $education =  $requirement = $location = $salary = $deadline = $category = $job_type=$vacancy=$companyName="";
$company_id = $_SESSION['COMPANY_ID'];
$checkblankTitle= FALSE;
$checkblankDescription = FALSE;
$checkblankEducation = FALSE;
$checkblankRequirment = FALSE;
$checkblankLocation = FALSE;
$checkblankSalary = FALSE;
$checkblankCategory = FALSE;
$checkblankJobtype = FALSE;
$checkblankVacancy = FALSE;
$checkblankCompanyName = FALSE;
$checkblankDeadline = FALSE;

$showalert = FALSE;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["title"])) {
        $titleErr = "title is required";
        $checkblankTitle = TRUE;
    } else {
        $title = test_input($_POST["title"]);
    }

    if (empty($_POST["description"])) {
        $descriptionErr = "description is required";
        $checkblankDescription = TRUE;
    } else {
        $description = test_input($_POST["description"]);
    }

    if (empty($_POST["education"])) {
        $educationErr = "education is required";
        $checkblankEducation = TRUE;
    } else {
        $education = test_input($_POST["education"]);
    }

    if (empty($_POST["requirement"])) {
        $requirementErr = "requirement is required";
        $checkblankRequirment = TRUE;
    } else {
        $requirement = test_input($_POST["requirement"]);
    }

    if (empty($_POST["location"])) {
        $locationErr = "Empty";
        $checkblankLocation = TRUE;
    } else {
        $location = test_input($_POST["location"]);
    }

    if (empty($_POST["salary"])) {
        $salaryErr = "Empty";
        $checkblankSalary = TRUE;
    } else {
        $salary = test_input($_POST["salary"]);
    }

    if (empty($_POST["deadline"])) {
        $deadlineErr = "deadline is required";
        $checkblankDeadline = TRUE;
    } else {
        $deadline = test_input($_POST["deadline"]);
    }

    if (empty($_POST["job_type"])) {
        $job_typeErr = "Empty";
        $checkblankJobtype = TRUE;
    } else {
        $job_type = test_input($_POST["job_type"]);
    }
     
    if (empty($_POST["category"])) {
      $categoryErr = "Empty";
      $checkblankCategory = TRUE;
  } else {
      $category = test_input($_POST["category"]);
  }
    if (empty($_POST["vacancy"])) {
        $vacancyErr = "Empty";
        $checkblankVacancy = True;
    } else {
        $vacancy = test_input($_POST["vacancy"]);
    }
    if (empty($_POST["company-name"])) {
      $companyNameErr = "Empty";
      $checkblankCompanyName = TRUE;
    } else {
      $companyName = test_input($_POST["company-name"]);
    }
  // Check any feild left empty
   /*if($checkblankTitle ==FALSE && $checkblankDescription==FALSE && $checkblankEducation==FALSE && $checkblankRequirment ==FALSE && $checkblankLocation && $checkblankSalary==FALSE && $checkblankJobtype ==FALSE && $checkblankCategory==FALSE && $checkblankVacancy==FALSE && $checkblankCompanyName==FALSE){
   
          
      }*/
       //Data insert into table
       $sql = "INSERT INTO  tbl_jobs(Title, Description, Requirement, Education, Location, Salary, Job_type, Comapany_id, Dead_line, Category, Vacancy, InstitutionalName)
       VALUES('" . $title . "','" . $description . "','" . $requirement . "','" . $education . "','" . $location . "','" . $salary . "','" . $job_type . "','" . $company_id . "','" . $deadline . "','".$category."','".$vacancy."','".$companyName."')";
   
       if ($conn->query($sql) === TRUE) {
            $showalert = TRUE;
           //echo $sql;
          // header("location:add-job.php");
       } else {
            
           header("location:add-job.php?error: " . $sql ." error no- " . $conn->error);
       }

 
    $conn->close();
        
            

    
}


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/all.min.css">
  <link rel="stylesheet" href="admin_assets/style.css">

  
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
          class="navbar-brand me-auto ms-lg-0 ms-3  text-uppercase fw-bold"
          href="#"
          ><?php echo $_SESSION["ADMIN_FNAME"]; ?></a
        >
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
            <li class="nav-item "><a href="admin_dashboard.php" class="nav-link acitve bg-light text-dark">Dashboard</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Profile</a></li>
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
      <img src="../assets/img/flower.jpg" alt="Logo" class="">
      <p class="lead text-light text-capitalize "><?php echo $_SESSION["ADMIN_FNAME"]; ?></p>
        <nav class="navbar-dark">
            <ul class="navbar-nav" >
            <li>
              <a href="admin_dashboard.php" class="nav-link px-3 ">
                <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                <span>Dashboard</span>
              </a>
            </li>
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            <li>
              <a href="approved_job.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-graph-up"></i></span>
                <span>Approved Jobs</span>
              </a>
            </li>
            <li>
              <a href="disapproved_job.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-graph-up"></i></span>
                <span>Disapproved Jobs</span>
              </a>
            </li>
          
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            <li>
             
              <a href="#" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-graph-up"></i></span>
                <span>Admin Details</span>
              </a>
            </li>
            <li>
              <a href="message.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-graph-up"></i></span>
                <span>Message</span>
              </a>
            </li>
            <li>
              <a href="add-job.php" class="nav-link px-3 active">
                <span class="me-2"><i class="bi bi-graph-up"></i></span>
                <span>Add Job</span>
              </a>
            </li>
            
          </ul>
        </nav>
      </div>
    </div>
    <!-- offcanvas -->
    <main class="mt-5 pt-3 ">
    <div class="container pb-3 px-5">
    <div class="row">
    <div class="col-md-2"></div>
      <div class="col-md-8">
              <h5 class="text-danger text-center"> 
                        <?php  
                            if(isset($_GET['error']))
                            {
                                echo $_GET['error'];
                                }
                          ?>
                         </h5> 
                         <h5 class="text-success text-center">
                           <?php
                            /*if(isset($_GET['status']))
                            {
                                echo $_GET['status'];
                            }*/
                                if($showalert==TRUE){
                            
                            echo "Successfully your job posted.";
                                }
                        ?> 
                    </h5>
                 <h3 class="display-4 mb-3">Add New Job</h3>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                       
                    <div class="mb-3">
                      <label for="title" class="form-label">Title </label>
                      <input type="title" name="title" id="title" class="form-control" required>
                      <?php?> <span class="text-danger fw-2"><?php echo $titleErr;?></span>
                    </div>
                    <div class="mb-3">
                      <label for="description" class="form-label">Description</label>
                      <textarea name="description" id="description" class="form-control" required></textarea>
                      <span class="text-danger fw-2"><?php echo $descriptionErr;?></span>
                      <?php?>
                    </div>
                    <div class="mb-3">
                      <label for="requirement" class="form-label">Requirement </label>
                      <textarea name="requirement" id="requirement" class="form-control" required></textarea>
                      <span class="text-danger fw-2"><?php echo $requirementErr;?></span>
                      <?php?>
                    </div>
                    <div class="mb-3">
                      <label for="education" class="form-label">Education</label>
                      <textarea name="education" id="education" class="form-control" required></textarea>
                      <span class="text-danger fw-2"><?php echo $educationErr;?></span>
                    </div>
                    <?php?>
                     <div class="mb-3">
                     <label for="job-type" class="form-label">Job Type</label>
                    <select class="form-select" id="job-type" name="job_type" required>
                      <option selected>Select Job Type </option>
                      <option  value="full-time">Full-time</option>
                      <option value="part-time">Part-time</option>
                      <option value="part-time">Internship</option>
                      <option value="part-time">Remote</option>
                    </select>
                    <span class="text-danger fw-2"><?php  echo $job_typeErr;?></span>
                     </div>
                        
                     <?php?>
                    <div class="mb-3">
                      <label for="location" class="form-label">Location</label>
                      <input type="text" name="location" id="location" class="form-control">
                      <span class="text-danger fw-2"><?php echo $locationErr;?></span>
                    </div>
                    <?php?>
                    <div class="mb-3">
                      <label for="category" class="form-label">Category</label>
                      <input type="text" name="category" id="category" class="form-control"  required>
                      <span class="text-danger fw-2"><?php echo $categoryErr;?></span>
                    </div>
                    <?php?>
                  
                    <div class="mb-3">
                      <label for="salary" class="form-label">Salary</label>
                      <input type="text" name="salary" id="salary" class="form-control"  required>
                      <span class="text-danger fw-2"><?php echo $salaryErr;?></span>
                    </div>
                    <div class="mb-3">
                      <label for="vacancy" class="form-label">Vacancy</label>
                      <input type="text" name="vacancy" id="vacancy" class="form-control"  required>
                      <span class="text-danger fw-2"><?php echo $vacancyErr;?></span>
                    </div>
                    <div class="mb-3">
                      <label for="company-name" class="form-label">Name of Institution</label>
                      <input type="text" name="company-name" id="company-name" class="form-control"  required>
                      <span class="text-danger fw-2"><?php echo $companyNameErr;?></span>
                    </div>
                    <?php?>
                    <div class="mb-3">
                      <label for="deadline" class="form-label">Deadline</label>
                      <input type="date" name="deadline" class="form-control" id="deadline" required>
                      <span class="text-danger fw-2"><?php echo $deadlineErr;?></span>
                    </div>
                    
                    <div class="text-center pt-3 ">
                    <button type="submit" class="btn btn-outline-primary w-50 fw-bold">Post</button>
                    </div>
                    
                  </form>
                 <!-- <?php /*echo $title;
                       echo $requirement;
                       echo $vacancy;
                       echo $deadline;
                  die();*/?> -->
                  
        </div>
        <div class="col-md-2"></div>
    </div>
    </div>
    </main>
    
        
       

<script src="../assets/js/bootstrap.bundle.min.js"></script>
<!-- <script src="../assets/js/main.js"></script> -->
</body>
</html>