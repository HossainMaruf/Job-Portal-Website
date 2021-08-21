<?php
    include_once('../inc/dbconnect.php');
  if (isset($_SESSION['ADMIN_ID'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       
        if ( (!empty($_POST["job_id"]) && isset($_POST["job_id"])) &&
        (!empty($_POST["status"]) && isset($_POST["status"]) && $_POST['status']=='1' )
        ) {
             // approved functionality       
            $sql = "UPDATE tbl_jobs SET status='".$_POST["status"]."' WHERE id='".$_POST["job_id"]."' ";

            if ($conn->query($sql) === TRUE) {
                header('location: approved_job.php?status=Succesfully job approved');
            } else {
                echo "<br>Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        }
        else if ( (!empty($_POST["job_id"]) && isset($_POST["job_id"])) &&
        (!empty($_POST["status"]) && isset($_POST["status"]) && $_POST['status']=='3' )
        ) {
             // disapproved functionality       
             $sql = "UPDATE tbl_jobs SET status='".$_POST["status"]."' WHERE id='".$_POST["job_id"]."' ";
 
             if ($conn->query($sql) === TRUE) {
                header('location:disapproved_job.php?status=Succesfully job disapproved');
             } else {
                 echo "<br>Error: " . $sql . "<br>" . $conn->error;
             }
             $conn->close();
        }
    }
}


?>