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
        font-family: "Lato", sans-serif;
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
    <div class="h"><a href="request.php">Book Request</a></div>
    <div class="h"><a href="issue_info.php">Issue Information</a></div>
    </div>

    <div id="main">
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
    

    <script>
    function openNav() {
    document.getElementById("mySidenav").style.width = "300px";
    document.getElementById("main").style.marginLeft = "300px";
    document.body.style.backgroundColor = 'rgba(0,0,0,0.4'
    }

    function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    }
    </script>


    <!-- Seach Bar -->
    <div class='mt-2 d-flex justify-content-around align-items-center'>
        <form action="" class='navbar-form' method='post' name='form1'>
            <div class='d-flex'>
                <input type="text" class='form-control w-75 ' name='search' placeholder='Search Books' required> &nbsp;
                <button type='submit' name='searchbks' class='btn btn-secondary' style='background-color: #6db6b9e6;'>
                search
                </button>
            </div>
        </form>
        <br>
        <!--form for deleting a book-->
        <form action="" class='navbar-form' method='post' name='form1'>
            <div class='d-flex'>
                <input type="text" class='form-control w-75 ' name='bid' placeholder='Enter Book ID' required> &nbsp;
                <button type='submit' name='deletebk' class='btn btn-secondary' style='background-color: #6db6b9e6;'>
                DELETE
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
                <script>alert('Sorry! No Books Found. Try searching again');</script>
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
        if(isset($_POST['deletebk'])){
            //checking if admin is logged in
            if(isset($_SESSION['login_user'])){
                //confirm before deleting
                ?>
                    <script>
                        let result = confirm("Do you want to DELETE this Book?");
                        if(result){
                            <?php
                                $delete = "DELETE FROM `books` WHERE bid = '$_POST[bid]' ";
                                $query = mysqli_query($conn, $delete);
                            ?>

                            alert("Book Deleted");
                        }
                        
                    </script>
                <?php
                //$delete = "DELETE FROM `books` WHERE bid = '$_POST[bid]' ";
                //$query = mysqli_query($conn, $delete);
                //if($query){
                    ?>
                        <script>//alert("Book Deleted")</script>
                    <?php

                //}
                //else{

                //}
            }
            else{
                //admin not logged in
                ?>
                    <script>alert("Admin MUST login to Delete a book");</script>
                <?php

            }
        }
    ?> 

    
    
</div>                        

</body>
</html>