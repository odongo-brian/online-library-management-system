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
    <title>Book Request</title>

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
    <div class="h"><a href="expired.php">Expired List</a></div>
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
        <h2 class="text-center">Information Of Borrowed Books </h2>
        <?php
                $c = 0;
            if(isset($_SESSION['login_user'])){
                $sql = "SELECT student.userName, student.rollNo, books.bid, books.name, 
                books.authors,  books.edition, issueDate, returnDate FROM student 
                INNER JOIN issue_book ON student.userName = issue_book.userName 
                INNER JOIN books ON issue_book.bookID = books.bid 
                WHERE issue_book.status = 'Yes' ORDER BY issue_book.returnDate ASC";
                $res = mysqli_query($conn, $sql) or die("Error occured " .mysqli_error($conn));

                ?>
                <table class="table table-bordered table-hover">
                        <thead>
                            <tr style='background-color: #6db6b9e6;'>
                                <th>Student Username</th>
                                <th>Roll No</th>
                                <th>Book ID</th>
                                <th>Book Name</th>
                                <th>Author Name</th>
                                <th>Edition</th>
                                <th>Issue Date</th>
                                <th>Return Date</th>
                            </tr>
                        </thead>
                        <tbody>
                
                        <?php
                            while($row=mysqli_fetch_assoc($res)){
                                $d = date("Y-m-d");
                                if($d > $row['returnDate']){
                                  $c = $c + 1; 
                                  $var = '<p style="color: yellow; background-color: red; ">EXPIRED</p>';
                                    
                                  $up =  "UPDATE issue_book 
                                  SET status = '$var' WHERE returnDate = '$row[returnDate]' 
                                  AND status = 'Yes' LIMIT = $c ";
                                  mysqli_query($conn, $up );
                                  echo $d."<br>";
                                }
                                
                        ?>
                                <tr>
                                    <td><?php echo $row['userName']; ?></td>
                                    <td><?php echo $row['rollNo']; ?></td>
                                    <td><?php echo $row['bid']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['authors']; ?></td>
                                    <td><?php echo $row['edition']; ?></td>
                                    <td><?php echo $row['issueDate']; ?></td>
                                    <td><?php echo $row['returnDate']; ?></td>
                                </tr>

                            <?php
                        }
                        
                        
                            ?>
                
                    </tbody>
                </table>

                <?php
            }
            else{
              ?>
              <h3 class="text-center">Login to see information of Borrowed books</h3>
              <?php
            }
            
            
        ?>
    </div>
    
    </body>
</html>
