<?php
    include "connect.php";
    include "navbar.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
    
    <section>
        <div class="log_img">
            <br><br><br>
            <div class="box1">
                <h1 style="text-align: center; font-size:25px;">User Registration Form</h1>

                <div class="d-flex align-items-center justify-content-center">
                    <form action="" method="post" name="registrationform">
                        <input type="text" class="form-control" name="fname" placeholder="Enter First Name" required><br>
                        <input type="text" class="form-control" name="lname" placeholder="Enter Last Name" required><br>
                        <input type="text" class="form-control" name="uname" placeholder="Enter Username" required><br>
                        <input type="password" class="form-control" name="password" placeholder="Enter password" required><br>
                        <input type="text" class="form-control" name="rollno" placeholder="Enter Roll No" required><br>
                        <input type="email" class="form-control" name="email" placeholder="Enter Email" required><br>
                        <input type="text" class="form-control" name="phone" placeholder="Enter Phone Number" required><br>
                        <button class="btn btn-primary w-100" name="registerbtn">Sign Up</button>
                        <p><a href=""class="text-decoration-none">Forgot password?</a> <br>
                            Already Registered? <a href="student_login.php" class="text-decoration-none">Login</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php
        if(isset($_POST['registerbtn'])){
            //username to be unique
            $count = 0;
            $sq = "SELECT userName FROM student";
            $res = mysqli_query($conn, $sq);
            while($row = mysqli_fetch_assoc($res)){
                if($row['userName'] == $_POST['uname']){
                    $count = $count + 1;
                } 
            } 
            

            $fName = $_POST['fname'];
            $lName = $_POST['lname'];
            $userName = $_POST['uname'];
            $password = $_POST['password'];
            $rollNumber = $_POST['rollno'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            if($count == 0 ){
                $sql = "INSERT INTO `student` VALUES('$fName', '$lName', '$userName', '$password', '$rollNumber', '$email', '$phone')";
                $query = mysqli_query($conn, $sql);

                
                    ?>
                    <script>alert("Successful Registration")</script>
                <?php 
                
            }
            else{
                //if username already exists
                ?>
                    <script>
                        alert("Username Already Exists");
                        
                    </script>
                <?php
                //header("location:registration.php");
            }

        }
    ?>
</body>
</html>