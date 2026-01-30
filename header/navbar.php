<?php
// include_once('../inc/dbconnect.php');?>
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
          <li><a class="dropdown-item" href="../admin/admin_reg.php">Admin Registration</a></li>
          <li><a class="dropdown-item" href="../admin/index.php"> Admin LogIn</a></li>
          
          <li><a class="dropdown-item" href="../admin/admin_dashboard.php">Admin Dashboard</a></li>
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
        <a class="nav-link " href="../job_list.php">Jobs</a>
      </li>
      
    </ul>
   
  </div>
</div>
</nav>