<?php
    include "connect.php";
    include "navbar.php";
    //include "sidebar.php";
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link rel="stylesheet" href="bootstrap/fontawesome/css/all.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/webfonts/">
    
    <style>
        .sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    margin-top: 85px;
    padding-top: 60px;
  }
  
  .sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
  }
  
  .sidenav a:hover {
    color: #f1f1f1;
  }
  
  .sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
  }
  
  #main {
    transition: margin-left .5s;
    padding: 16px;
  }
  
  @media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
  }
  .h:hover{
    color: white;
    min-width: 200px;
    height: 50px;
    background-color: red;
  }
    </style>
    
    
</head>
<body>
    <!--side nav-->
    
    <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="h"><a href="profile.php">Profile</a></div>
    <div class="h"><a href="books.php ">Books</a></div>
    <div class="h"><a href="request.php">Book Request</a></div>
    <div class="h"><a href="issue_info.php">Issue Information</a></div>
    </div>

    <div id="main">
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
    

    <script>
    function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    }

    function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    }
    </script>
 
    <!-- Seach Bar -->
    <div class='mt-2'>
        <form action="" class='navbar-form' method='post' name='form1'>
            <div class='d-flex'>
                <input type="text" class='form-control w-25 ' name='search' placeholder='Search Books' required> &nbsp;
                <button type='submit' name='searchbks' class='btn btn-secondary' style='background-color: #6db6b9e6;'>
                search
                </button>
            </div>
        </form>
    </div>

    <!-- Request Book -->
    <div class='mt-2'>
        <form action="" class='navbar-form' method='post' name='form1'>
            <div class='d-flex'>
                <input type="text" class='form-control w-25 ' name='bid' placeholder='Enter Book ID to Request' required> &nbsp;
                <button type='submit' name='requestbk' class='btn btn-secondary' style='background-color: #6db6b9e6;'>
                    Request
                </button>
            </div>
        </form>
    </div>

    <h2 class="text-center">List Of Books</h2>
    <?php
        if(isset($_POST['searchbks'])){
            $books = "SELECT * FROM `books` WHERE name like '%$_POST[search]%'  ";
            $q = mysqli_query($conn, $books );
            if(mysqli_num_rows($q) == 0){
                //no book found
                ?>
                <script>alert'Sorry! No Books Found. Try searching again';</script>
                <?php

            }
            else{
                ?>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr style='background-color: #6db6b9e6;'>
                                <th>book id</th>
                                <th>name</th>
                                <th>authors</th>
                                <th>edition</th>
                                <th>status</th>
                                <th>quantity</th>
                                <th>department</th>
                            </tr>
                        </thead>
                        <tbody>
                
                        <?php
                            while($row=mysqli_fetch_assoc($q)){
                                ?>
                                <tr>
                                    <td><?php echo $row['bid']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['authors']; ?></td>
                                    <td><?php echo $row['edition']; ?></td>
                                    <td><?php echo $row['status']; ?></td>
                                    <td><?php echo $row['quantity']; ?></td>
                                    <td><?php echo $row['department']; ?></td> 
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
                <th>book id</th>
                <th>name</th>
                <th>authors</th>
                <th>edition</th>
                <th>status</th>
                <th>quantity</th>
                <th>department</th>
            </tr>
        </thead>
        <tbody>
            
                <?php
                    $res = mysqli_query($conn,"SELECT * FROM books;" );
                    while($row=mysqli_fetch_assoc($res)){
                        ?>
                        <tr>
                            <td><?php echo $row['bid']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['authors']; ?></td>
                            <td><?php echo $row['edition']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td><?php echo $row['quantity']; ?></td>
                            <td><?php echo $row['department']; ?></td> 
                        </tr>

                        <?php
                    }
                ?>
            
        </tbody>
    </table>
    <?php
        }
        if(isset($_POST['requestbk'])){
            if(isset($_SESSION['login_user'])){
                $insert = "INSERT INTO `issue_book` VALUES('$_SESSION[login_user]', '$_POST[bid]', '', '', '')";
                mysqli_query($conn, $insert) or die("Error: " .mysqli_error($conn));
                ?>
                <script>
                    window.location = "request.php";
                </script>

                <?php
            }
            else{
                // not logged in
                ?>
                    <script>alert("You must login First to Request the book");</script>
                <?php
            }
            
        }
    ?> 

    
    
                          
    </div>
</body>
</html>