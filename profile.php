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
        <title>Profile</title>
        <style>
            .wrapper{
                width: 500px;
                height: 100vh;
                margin: 0 auto;
                color: white;
                /*background-color: pink; */

            }
        </style>
    </head>
    <body style="background: #004528;">
        <div class="container">
            <form action="" method="post">
                <button class="btn btn-primary" style="float: right; width: 70px;" name="submit1">
                    Edit
                </button>
                
            </form>
            <div class="wrapper">
                <?php
                
                    $sql = "SELECT * FROM student WHERE username = '$_SESSION[login_user]'";
                    $q = mysqli_query($conn, $sql);

                ?>
                <h2 class="text-center">My Profile</h2>

                <?php 
                    $row = mysqli_fetch_assoc($q);
                    /*
                    echo "<div style='text-align: center; '> 
                        <img class='img-circle profile-img' height=110  width=120  src= 'images/".$_SESSION['picture']."'> 
                    </div>";
                    */ 
                    //var_dump($_SESSION);
                ?>
                <div style="text-align: center"><b >Welcome, <?php
                        echo $_SESSION['login_user'];
                        
                        ?></b>
                    <h4>

                        
                    </h4>
                </div>
                <table class = "table table-bordered table-hover text-white ">
                    
                        <tr>
                            <th>First Name</th>
                            <td><?php echo ' '.$row['firstName']; ?></td>
                        </tr>
                        <tr>
                            <th>Last Name</th>
                            <td><?php echo $row['lastName']; ?></td>
                        </tr>
                        <tr>
                            <th>Username</th>
                            <td><?php echo $row['userName']; ?></td>
                        </tr>
                        <tr>
                            <th>Password</th>
                            <td><?php echo $row['password']; ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?php echo $row['email']; ?></td>
                        </tr>
                        <tr>
                            <th >Contact</th>
                            <td><?php echo $row['phone']; ?></td>
                        </tr>

                    
                    
                </table>
            </div>
        </div>
    </body>
    </html>
