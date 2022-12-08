<?php
    include "navbar.php";
    include "connect.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/fontawesome/css/all.css">
</head>
<body>
    <section>
        <div class="log_img">
            <br><br><br>
            <div class="box1">
                <h1 style="text-align: center; font-size:25px;">User Login Form</h1>

                <div class="d-flex align-items-center justify-content-center">
                    <form action="" method="post" name="loginform">
                        <input type="text" class="form-control" name="username" placeholder="Enter username" required><br>
                        <input type="password" class="form-control" name="password" placeholder="Enter password" required><br>
                        <button class="btn btn-primary w-100" name="loginbtn">Login</button>
                        <p><a href="update_password.php"class="text-decoration-none">Forgot password?</a> <br>
                            Not Registered? <a href="registration.php" class="text-decoration-none">Sign Up</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php
        if(isset($_POST['loginbtn'])){
            $count = 0;
            $res = mysqli_query($conn, "SELECT * FROM `student` WHERE userName = '$_POST[username]' && password = '$_POST[password]';");
            while($row = mysqli_fetch_assoc($res)){
                if($row['userName'] == $_POST['username'] && $row['password'] == $_POST['password']){
                    $count = $count + 1;
                }

            }

            if($count == 0){
                //no record selected
                ?>
                <!--
                <script>alert 'password or username incorrect';</script>
            -->
            <div class="alert alert-danger" stlye="width:600px; margin-left: 370px; background-color: #de1313; color: white;">
                <strong>Username or password incorrect</strong>

            </div>
                <?php
            }
            else{
                //redirect to index page if correct username and password given
                $_SESSION['login_user'] = $_POST['username'];
                header('location: index.php');
            }
        }

    ?>
</body> 
</html>