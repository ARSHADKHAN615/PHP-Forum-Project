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
    <?php
    require "component/_header.php";
    require "component/_dbConnect.php";
    ?>


    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/contact-bg.jpg" class="d-block w-100" alt="">
            </div>
            <div class="carousel-item">
                <img src="img/home-bg.jpg" class="d-block w-100" alt="">
            </div>
            <div class="carousel-item">
                <img src="img/post-bg.jpg" class="d-block w-100" alt="">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
    </div>

    <!-- container of category start here fetch from db  -->
    <h1 class="title text-center my-5">Category Browse</h1>
    <div class="container-fluid">
        <div class="row">
            <?php
            $sql = "SELECT * FROM categories";
            // $sql = "ALTER TABLE categories ADD  FOREIGN KEY (thread_id) REFERENCES threads(thread_id),";
            $result = mysqli_query($connection, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $date = date_create($row['created_time']);

                echo "
                <div class='col-md-4 mt-4'>
                    <div class='card mb-3'>
                        <img class='card-img-top' src='https://source.unsplash.com/1600x900/?" . $row['category_name'] . "' alt='Card image cap'>
                        <div class='card-body'>
                            <h5 class='card-title'>" . $row['category_name'] . "</h5>
                            <p class='card-text'>" . substr($row['category_description'], 0, 80) . "...</p>
                            <p class='card-text'><b class='text-muted'>" . date_format($date, 'd/m/y') . "</b></p>
                            <a href='threadList.php?catId=" . $row['category_id']  . "' class='btn btn-primary'>View Thread</a>
                        </div>
                    </div>
                </div>
                ";
            }
            ?>
        </div>

    </div>




    <?php
    require "component/_footer.php";
    ?><script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.1/jquery.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
