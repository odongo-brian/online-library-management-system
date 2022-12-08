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
    <title>Approve Requests</title>

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
  .srch{
    padding-left: 800px;

  }
  .form-control{ 
    width: 300px;
    background-color: black;
    color:white;
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
    
    <div class="container">
        <h2 class="text-center">Approve Requests</h2>
    </div>
        <div class = "d-flex justify-content-center align-items-center">
            <form action="" method="post" class="approve">
                <input type="text" class="form-control" name="approve" placeholder ="Yes or No" required> <br>
                <input type="text" class="form-control" name="issue" placeholder="Issue Date yyy-mm-dd" required> <br>
                <input type="text" class="form-control" name="return" placeholder="Return Date yyyy-mm-dd" required><br>
                <button class="btn btn-primary" name="submit" type="submit">Approve</button>
            </form>
        </div>

        <?php
            if(isset($_POST['submit'])){
                $update1 = "UPDATE `issue_book` SET status = '$_POST[approve]', issueDate = '$_POST[issue]', returnDate = '$_POST[return]' WHERE userName = '$_SESSION[name]' AND bookID = '$_SESSION[bid]' ";
                $query1 = mysqli_query($conn, $update1);

                $update2 = "UPDATE `books` SET quantity = quantity - 1 WHERE bid = '$_SESSION[bid]'";
                $query2 = mysqli_query($conn, $update2);

                $qnty = "SELECT quantity FROM books WHERE bid = '$_SESSION[bid]'";
                $res = mysqli_query($conn, $qnty);

                while($row = mysqli_fetch_assoc($res)){
                  if($row['quantity'] == 0){
                    $bks_satus = "UPDATE books SET status = 'Book Not Available' WHERE bid = '$_SESSION[bid]' ";
                  }
                }
               ?>
               
               <script>
                alert("Updated SuccessFully");
                window.location = "request.php";
               </script>
               
               <?php
            }
        ?>

    </body>
</html>
