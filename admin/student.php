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
    <title>Students</title>
    <link rel="stylesheet" href="../bootstrap/fontawesome/css/all.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/webfonts/">
    
    
</head>
<body>
    <!-- Seach Bar -->
    <div class='mt-2'>
        <form action="" class='navbar-form' method='post' name='form1'>
            <div class='d-flex'>
                <input type="text" class='form-control w-25 ' name='search' placeholder='Search Student' required> &nbsp;
                <button type='submit' name='searchstudents' class='btn btn-secondary' style='background-color: #6db6b9e6;'>
                search
                </button>
            </div>
        </form>
    </div>
    <h2 class="text-center">List Of Students</h2>
    <?php
        if(isset($_POST['searchstudents'])){
            $students = "SELECT firstName, lastName, userName, rollNo, email, phone FROM `student` WHERE userName like '%$_POST[search]%' ORDER BY student.firstName ASC ";
            $q = mysqli_query($conn, $students );
            if(mysqli_num_rows($q) == 0){
                //no book found
                ?>
                <script>alert'Sorry! No Student Found. Try searching again';</script>
                <?php

            }
            else{
                ?>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr style='background-color: #6db6b9e6;'>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Username</th>
                                <th>Roll Number</th>
                                <th>Email</th>
                                <th>Phone</th>
                            </tr>
                        </thead>
                        <tbody>
                
                        <?php
                            while($row=mysqli_fetch_assoc($q)){
                                ?>
                                <tr>
                                    <td><?php echo $row['firstName']; ?></td>
                                    <td><?php echo $row['lastName']; ?></td>
                                    <td><?php echo $row['userName']; ?></td>
                                    <td><?php echo $row['rollNo']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['phone']; ?></td>
                                  </tr>

                            <?php
                        }
                    ?>
                
            </tbody>
        </table>
        <?php

            }

        }
            /*if search button is not pressed */
        else{
            ?>
    <table class="table table-bordered table-hover">
        <thead>
            <tr style='background-color: #6db6b9e6;'>
                <th>firstName</th>
                <th>lastName</th>
                <th>userName</th>
                <th>rollNo</th>
                <th>email</th>
                <th>phone</th>
               </tr>
        </thead>
        <tbody>
            
                <?php
                    $res = mysqli_query($conn,"SELECT * FROM student" );
                    while($row=mysqli_fetch_assoc($res)){
                        ?>
                        <tr>
                            <td><?php echo $row['firstName']; ?></td>
                            <td><?php echo $row['lastName']; ?></td>
                            <td><?php echo $row['userName']; ?></td>
                            <td><?php echo $row['rollNo']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                        </tr>

                        <?php
                    }
                ?>
            
        </tbody>
    </table>
    <?php


        }


    //$res = mysqli_query($conn,"SELECT * FROM books;" );
    
    ?> 

    
    
                          

</body>
</html>