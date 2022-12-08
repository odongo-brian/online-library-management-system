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
    <title>Books</title>
    <link rel="stylesheet" href="bootstrap/fontawesome/css/all.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/webfonts/">
    
    <style>
        body {
            background-color: #024629;
            font-family: "Lato", sans-serif;
            transition: background-color .5;
        }

        .sidenav {
        height: 100%;
        margin-top: 85px;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #111;
        overflow-x: hidden;
        transition: 0.5s;
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
        .book{
            width: 400px;
            margin: 0px auto;
        }

        .form-control{
            background-color: #080707;
            color: white;

        }
        .btn-primary{
            width: 70px;
            margin: 0px auto;
        }

    </style>
</head>
<body>
    <!--------Sidebar nav----------------->
    <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div style="color:white; margin-left: 80px;">
        <?php
            echo "<img class='img-circle profile_img height=120 width=120' src='images/".$_SESSION['picture']."' alt= 'image Not Found'>";
            echo "<br>";
            echo "Welcome ". $_SESSION['login_user'];
        ?>
    </div>
    <div class="h"><a href="add_books.php">Add Books </a></div>
    <div class="h"><a href="delete_books.php">DeleteBooks</a></div>
    <div class="h"><a href="request.php">Book Request</a></div>
    <div class="h"><a href="issue_info.php">Issue Information</a></div>
    </div>

    <div id="main">
        <span style="font-size:30px;color: black; cursor:pointer" onclick="openNav()">&#9776; open</span>
        <div class="container">
            <h2 class="text-center text-white" style="color: black; font-family: Lucida Console; ">Add New Books</h2>
            <form action="" method="post"class="text-center">
                
                <input type="text" class="form-control book" name="bid" placeholder="book id " required><br>
                <input type="text" class="form-control book" name="name" placeholder="book name" required><br>
                <input type="text" class="form-control book" name="authors" placeholder="Authors Name " required><br>
                <input type="text" class="form-control book" name="edition" placeholder="Edition " required><br>
                <input type="text" class="form-control book" name="status" placeholder="status " required><br>
                <input type="text" class="form-control book" name="quantity" placeholder="Quantity " required><br>
                <input type="text" class="form-control book" name="department" placeholder="Department " required><br>
                
                <button class="btn btn-primary" type="submit" name="submit_bk">ADD</button>
            </form>
        </div>

        <?php
            if(isset($_POST['submit_bk'])){
                if(isset($_SESSION['login_user'])){
                    $bid = $_POST['bid'];
                    $name = $_POST['name'];
                    $authors = $_POST['authors'];
                    $edition = $_POST['edition'];
                    $status = $_POST['status'];
                    $quantity = $_POST['quantity'];
                    $department = $_POST['department'];
                    $insert = "INSERT INTO `books` VALUES('$bid', '$name', '$authors', '$edition', '$status', '$quantity', '$department')";
                    $query = mysqli_query($conn, $insert) or die("Error ". mysqli_error($conn));
                    if($query){
                        ?>
                            <script>alert('Book Added');</script>
                        <?php

                    }
                    else{
                        ?>
                            <script>alert('Failed to Add Book');</script>
                        <?php
                    }
                }
                else{
                    ?>
                        <script>alert('Admin MUST login First in order to ADD Books');</script>
                    <?php
                }
            }
                    
        ?>
    </div>

    <script>
    function openNav() {
    document.getElementById("mySidenav").style.width = "300px";
    document.getElementById("main").style.marginLeft = "300px";
    document.body.style.backgroundColor = 'rgba(0,0,0,0.4'
    }

    function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.body.style.backgroundColor = "#024629";
    }
    </script>
    
    </body>
 </html>

