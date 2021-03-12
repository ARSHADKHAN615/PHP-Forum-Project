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

    <!--  GET HERE CATEGORIES ID WITH GET METHOD SHOW CLICK <A> TAG   -->
    <div class="container my-4">
        <?php
        $catId = $_GET['catId'];
        $sql1 = "SELECT * FROM categories WHERE category_id=$catId";
        $result = mysqli_query($connection, $sql1);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "   
         <div class='jumbotron'>
            <h1 class='display-4'>" . $row['category_name'] . "</h1>
            <p class='lead'>" . $row['category_description'] . "</p>
            <hr class='my-4'>
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <a class='btn btn-primary btn-lg' href='#' role='button'>Learn more</a>
        </div>
                ";
        }
        ?>
    </div>



    <!-- GET QUESTION FROM DATA HERE AND INSERT TO DATABASE WITH REPLACE STR  AND SHOW ALERT -->
    <div class="container">
        <h1>Ask a Question</h1>
        <?php

        $showAlert = false;
        $method = $_SERVER["REQUEST_METHOD"];
        if ($method == "POST") {


            $title = $_POST["title"];
            $title = str_replace(">", "&gt", "$title");
            $title = str_replace("<", "&lt", "$title");

            $desc = $_POST["desc"];
            $desc = str_replace(">", "&gt", "$desc");
            $desc = str_replace("<", "&lt", "$desc");

            $sno = $_POST["sno"];
            $sql2 = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`) VALUES ('$title','$desc','$catId','$sno');";
            $result2 = mysqli_query($connection, $sql2);


            if ($result2) {
                $showAlert = true;
            }
            if ($showAlert) {
                echo '
                 <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Congratulation!</strong> Your thread is added successfully,please wait for community to Respond.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                 </div>
                 ';
            }
        }
        ?>

        <!-- CHECK HERE, USER LOGIN OR NOT AND SHOW FROM  -->
        <?php

        if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]) {
            echo "<form class='my-5' action='" . $_SERVER['REQUEST_URI'] . "' method='POST'>
                    <div class='form-group'>
                        <label for='title'>Problem Title</label>
                        <input type='text' class='form-control' id='title' name='title' aria-describedby='emailHelp'>
                        <small id='emailHelp' class='form-text text-muted'>Keep your title as short and crisp as possible</small>
                    </div>
                    <div class='form-group'>
                        <label for='desc'>Elaborate Your Concern</label>
                        <textarea class='form-control' id='desc' name='desc' rows='3'></textarea>
                    </div>
                        <input type='hidden' name='sno' value='" . $_SESSION['sno'] . "'>
                        <button type='submit' class='btn btn-primary'>Submit</button>
                         </div>
                </form>   ";
        } else {
            echo '<div class="container-fluid">
                     <p><b>Your Are Not logged in</b></p>
                 </div>';
        }

        ?>

        <!-- GET CATEGORIES ID AND FETCH DATA FROM DB  -->
        <div class="container">
            <h1>User Question</h1>
            <?php
            $catId = $_GET['catId'];
            $sql3 = "SELECT * FROM threads WHERE thread_cat_id=$catId";
            $result3 = mysqli_query($connection, $sql3);
            $noResult = false;

            while ($row1 = mysqli_fetch_assoc($result3)) {

                $noResult = true;
                $threadId = $row1['thread_id'];
                $date = date_create($row1['thread_time']);


                $userId = $row1['thread_user_id'];
                $sql4 = "SELECT username FROM `users` WHERE sno= $userId";
                $result4 = mysqli_query($connection, $sql4);
                $row2 = mysqli_fetch_assoc($result4);

                echo "   
           <div class='media my-5'>
            <img src='img/users.png' width='100px' class='mr-3 bg-dark rounded-circle' alt='userImg'>
            <div class='media-body'>
                <p class='font-weight-bold my-0'>" . $row2['username'] . ". at " . date_format($date, 'd M Y') . "</p>
                <h5 class='mt-0'><a href='thread.php?threadId=" . $threadId . "'>" . $row1['thread_title'] . "</h5></a>
               <p>" . $row1['thread_desc'] . "</p>
            </div>
        </div>
                ";
            }

            // JO KOIYE DATA NAHI MELTA HAI TO YE DEKHANA HAI 
            if (!$noResult) {
                echo "<div class='jumbotron jumbotron-fluid'>
                    <div class='container'>
                        <h1 class='display-4'>No Thread Found</h1>
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