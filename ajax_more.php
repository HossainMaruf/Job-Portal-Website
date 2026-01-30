<?php
  include_once('inc/dbconnect.php');
  $currentId = -1;
  if(!empty($_POST["id"])){
    
    // Count all records except already displayed
    $sql = "SELECT COUNT(*) as num_rows FROM tbl_jobs WHERE status=1 AND Id > ".$_POST['id']." ORDER BY Id";
    $count = $conn->query($sql)->fetch_assoc()['num_rows'];

    $showLimit = 2;
    
    // Get records from the database
    $sql = "SELECT * FROM tbl_jobs WHERE status=1 AND Id > ".$_POST['id']." ORDER BY Id LIMIT $showLimit";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) { $currentId = $row['Id']; 
?>

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


<?php } ?>
<?php 
  if($count > $showLimit) { ?>
<div class="text-center">
    <input type="button" id="<?php echo $currentId; ?>" class="loadMore" value="Load More">
</div>
<?php }}} ?>
