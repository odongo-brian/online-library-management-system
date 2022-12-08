<?php
    include "connect.php";
    include "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>change password</title>
    <style>
        body{
            
            height: 650px;
            background: red;
            background-image: url("images/feed.jpg");
            background-repeat: no-repeat;
        }
        .wrapper{
            width: 400px;
            height: 400px;
            background-color: grey;
            margin: 100px auto;
            opacity: .8;
            color: white;
            padding: 27px 15px; 
        }
        .form-control{
            width: 300px;
        }
    </style>
</head>
<body>
    <div class="wrapper">

        <div>
            <h1 style="text-align: center; font-size: 35px; font-family: Lucida Console;">
                Change Your Password
            </h1>
        </div>

        <div stlye="padding-left: 30px">
            <form action="" method="POST">
                <input type="text" name="username" class="form-control" placeholder="Enter Username" required><br>
                <input type="email" name="email" class="form-control" placeholder = "Enter Email" required><br>
                <input type="password" name="password" class="form-control" placeholder="Enter New Password" required><br>
                <button class="btn btn-primary" type="submit" name="update_password">update</button>
            </form>
        </div>
    </div>
    

    <?php
        if(isset($_POST['update_password'])){
            $update = "UPDATE admin SET password = '$_POST[password]' WHERE userName = '$_POST[username]' && email = '$_POST[email]' ";
            $sql = mysqli_query($conn,$update );
            if($sql){
                ?>
                    <script>alert("Password Updated successfully")</script>
                <?php 
            }
            else{
                ?>
                    <script>alert("password not Updated")</script>
                <?php 
            }
        }
    ?>
    
</body>
</html> 