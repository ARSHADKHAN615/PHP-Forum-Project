<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Title</title>
</head>

<body>

    <?php require "component/_header.php";
    require "component/_dbConnect.php";
    ?>


    <!-- GET HERE threadId SHOW THREAD IN JUMBOTRON  -->
    <!-- THREAD USERNAME SHOW  -->
    <div class="container my-4">
        <?php
        $threadId = $_GET['threadId'];
        $sql = "SELECT * FROM threads WHERE thread_id=$threadId";
        $result = mysqli_query($connection, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $userId = $row['thread_user_id'];


            $sql4 = "SELECT username FROM `users` WHERE sno= $userId";
            $result4 = mysqli_query($connection, $sql4);
            $row2 = mysqli_fetch_assoc($result4);

            echo "   
         <div class='jumbotron'>
            <h1 class='display-4'>" . $row['thread_title'] . "</h1>
            <p class='lead'>" . $row['thread_desc'] . "</p>
            <hr class='my-4'>
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <p><b>Posted By  ," . $row2['username'] . "</b></p>
        </div>
                ";
        }
        ?>

    </div>


    <div class="container">
        <h1>Post Comments</h1>
        <?php
        $showAlert = false;
        $method = $_SERVER["REQUEST_METHOD"];
        if ($method == "POST") {
            $comment_content = $_POST["comment"];
            $comment_content = str_replace(">", "&gt", "$comment_content");
            $comment_content = str_replace("<", "&lt", "$comment_content");
            $sno = $_POST["sno"];
            $sql2 = "INSERT INTO `comments` (`comment_content`, `thread_id`,`comment_by`) VALUES ('$comment_content','$threadId','$sno');";
            $result2 = mysqli_query($connection, $sql2);
            if ($result2) {
                $showAlert = true;
            }
            if ($showAlert) {
                echo '
                 <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Congratulation!</strong> Your comment is added successfully.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                 </div>
                 ';
            }
        }
        ?>
        <?php
        // session_start();
        if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]) {
            // print_r($_SESSION["sno"]);
            echo '<form class="my-5" action="' . $_SERVER['REQUEST_URI'] . '" method="POST">
            <div class="form-group">
            <label for="comment">Type Your Comment</label>
            <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
            <input type="hidden" name="sno" value="' . $_SESSION['sno'] . '">
            </div>
                <button type="submit" class="btn btn-primary">Post Comment</button>
           </form>
           </div>';
            // echo $_SESSION["sno"];
        } else {
            echo '<div class="container">
                     <p><b>Your Are Not logged in</b></p>
                 </div>';
        }

        ?>


        <div class="container">
            <h1>Discussion</h1>
            <?php
            $threadId = $_GET['threadId'];
            $sql = "SELECT * FROM comments WHERE thread_id=$threadId";
            $result1 = mysqli_query($connection, $sql);
            $noResult = false;
            while ($row1 = mysqli_fetch_assoc($result1)) {
                $noResult = true;
                $threadId = $row1['thread_id'];
                $date = date_create($row1['comment_time']);
                $userId = $row1['comment_by'];


                $sql4 = "SELECT username FROM `users` WHERE sno= $userId";
                $result4 = mysqli_query($connection, $sql4);
                $row2 = mysqli_fetch_assoc($result4);



                echo "   
         <div class='media my-5'>
               <img src='img/users.png' width='100px' class='mr-3 bg-dark rounded-circle' alt='userImg'>
            <div class='media-body'>
                <p class='font-weight-bold my-0'>" . $row2['username'] . " at . " . date_format($date, 'd M Y') . "</p>
               <p>" . $row1['comment_content'] . "</p>
            </div>
        </div>
                ";
            }
            if (!$noResult) {
                echo "<div class='jumbotron jumbotron-fluid'>
                    <div class='container'>
                        <h1 class='display-4'>No Comment Found</h1>
                        <p class='lead'>Be The First Person to  ask a Question</p>
                    </div>
                    </div>";
            }
            ?>
        </div>
    </div>

    <?php require "component/_footer.php"; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>