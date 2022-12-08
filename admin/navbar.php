<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bootstrap/fontawesome/css/all.css">
</head>
<body>

<nav class="navbar navbar-inverse bg-dark text-light">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand text-light" href="#">Library Management System</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="index.php" class="active text-decoration-none">Home</a></li>
      <li><a href="books.php" class="text-decoration-none">Books</a></li>
      <li><a href="feedback.php" class="text-decoration-none">Feedback</a></li>
      
    </ul>
    <?php
    if(isset($_SESSION['login_user'])){
      ?>
      <ul class="nav navbar-nav">
        <li><a href="student.php" class="text-decoration-none">Students Info</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>
          
          <a href="profile.php">
            <div style="color:white">
              <?php
                echo "<img class='img-circle profile_img height=30 width=30' src='images/".$_SESSION['picture']."' alt= 'image Not Found'>";
                echo "". $_SESSION['login_user'];
              ?>
            </div>
          </a>
        </li>
        <li><a href="logout.php"  class="text-decoration-none">Logout</a></li>
        
        <!--
        <li><a href="registration.php" class='text-decoration-none'><span class=" glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li ><a href="student_login.php" class='text-decoration-none'><span class=" glyphicon glyphicon-log-in"></span> Login</a></li>
    -->
      </ul>
      <?php
    }
    else{
      ?>
      <ul class='nav navbar-nav navbar-right'>
        <li><a href="student_login.php"><i class='fa fa-user'></i>Login</a></li>
        <li><a href="registration.php">Sign Up</a></li>
      </ul>

    <?php  
    }
    ?>
  </div> 
</nav>
  

<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="bootstrap/js/jquery.js"></script>
</body>
</html>