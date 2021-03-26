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
    <title>Search - <?php echo $_GET['search'] ?></title>
</head>

<body>
    <?php
    require "component/_header.php";
    require "component/_dbConnect.php";
    ?>



    <!-- SEARCH RESULTS  -->
    <div class="searchResult container">
        <h1 class="mt-4">Search result for <em>"<?php echo $_GET['search'] ?>"</em></h1>
        <?php
        $searchQuery = $_GET["search"];
        $sql = "SELECT * FROM threads WHERE MATCH (thread_title,thread_desc)against('$searchQuery')";

        $result = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $title = $row['thread_title'];
                $desc = $row['thread_desc'];
                $url = "thread.php?threadId=" . $row['thread_id'];
                echo "<div class='result my-5'>
                            <h1><a href='" . $url . "'> " . $title . "</a></h1>
                            <p>" . $desc . " </p>
                     </div>";
            }
        } else {

            echo "<div class='jumbotron jumbotron-fluid mt-5'>
                    <div class='container'>
                        <h1 class='display-4'>No Result Found</h1>
                    </div>
                    </div>";
        }



        ?>

    </div>


    <?php
    require "component/_footer.php";
    ?><script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.1/jquery.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>