<?php
    include_once('inc/dbconnect.php');
  if (isset($_SESSION['Candidate_ID'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo $_POST['job_id'];
        if (!empty($_POST['job_id']) && isset($_POST['job_id'])) {

            $sql = "INSERT INTO applied_job(job_id,	candidate_id)
            VALUES('" . $_POST['job_id'] . "','" .$_SESSION['Candidate_ID'] . "')";

            if ($conn->query($sql) === TRUE) {
                header('location: candidate/candidate_dashboard.php?id='.$_POST['job_id'].'&status=Succesfully apply');
            } else {
                echo "<br>Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        }
    }
}else{
    header('location: candidate/index.php');
}

?>

  