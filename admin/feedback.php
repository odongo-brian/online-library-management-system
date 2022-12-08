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
    <title>Feedback</title>
    <style type="text/css">
        body{
            background-image:url('images/feedback(1).jpg')
        }
        .wrapper{
            padding: 10px;
            margin:-8px auto;
            width:900px;
            height: 600px;
            background-color: black;
            opacity: .8;
            color: white;
        }   
        .form-control{
            height:70px;
            width:60%
        }
        .scroll{
           height: 350px;
           width: 100%;
           overflow: auto;
        }
   

    </style>
</head>
<body>
    <div class="wrapper">
        <h3 class="text-light">If you have any suggestions or questions please comment below.</h3>
        <form action="" method="post">
            <input type="text" class="form-control" name="comment" placeholder="Write Something...">
            <button class="btn btn-primary mt-3" name="commentbtn">comment</button>
        </form>
    <br><br>

    <div class="scroll">
        <?php
            if(isset($_POST['commentbtn'])){
                $comment = $_POST['comment'];
                $sql = "INSERT INTO  `comments` VALUES('', '$_SESSION[login_user]', '$comment' )";
                $query = mysqli_query($conn, $sql);
                if($query){
                    $q = "SELECT * FROM `comments` ORDER BY comments.id DESC";
                    $res = mysqli_query($conn, $q);
                    ?>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class='text-white'>username</th>
                                <th class='text-white'>comment</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while($row=mysqli_fetch_assoc($res)){
                                ?>
                                <tr>
                                    <td class='text-white'><?php echo "Admin ".$row['userName']; ?></td>
                                    <td class='text-white'><?php echo $row['comment']; ?></td>
                                </tr>

                                <?php
                            }

                            ?>
                        </tbody>

                    </table>

                    <?php
                }
            }
        ?>
        </div>
    </div>
</body>
</html>