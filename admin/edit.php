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
    <title>Edit Profile</title>
</head>
<body style="baxkground-color: #004528;">
    <h2 class="text-center text-white">Edit Information</h2>
    <div class="profile_info text-center">
        <span class="text-white">Welcome,</span>
        <h4 class="text-white"><?php echo $_SESSION['login_user']; ?></h4>
    </div>
    <br><br>
    <form action="" method="post">
        <input type="text" class="form-control" name="firstname"><br>
        <input type="text" class="form-control" name="lastname"><br>
        <input type="text" class="form-control" name="username"><br>
        <input type="text" class="form-control" name="password"><br>
        <input type="text" class="form-control" name="email"><br>
        <input type="text" class="form-control" name="contact"><br>
    </form>


</body>
</html>