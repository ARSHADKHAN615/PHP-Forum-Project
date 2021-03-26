<?php
require "component/_dbConnect.php";
session_start();

//! SESSION START HERE KARNA HAI BECAUSE HEADER SAB FILE ME HAI 
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-fixed-top">
    <a class="navbar-brand" href="index.php">DiscussWithKhan</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/Forum  project/about.php">About</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Categorise
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">';


//! FETCH CATEGORIES TITLE 
$sql = "SELECT  category_name,category_id FROM categories";
$result = mysqli_query($connection, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    echo '<a class="dropdown-item" href="threadList.php?catId=' . $row['category_id']  . '">' . $row['category_name'] . '</a>';
}
echo '  
                  </div>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="contact.php">Contact</a>
            </li>
        </ul>
        <div class="row">';



//! CHECK USER IS LOGIN AND SHOW HIS NAME AND LOGOUT BUTTON
if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]) {
    echo
    '<form class="form-inline my-2 my-lg-0" action="/Forum  project/search.php" method="GET">
                        <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
                                        <div class="dropdown">
                                            <button class="btn dropdown-toggle text-light mx-2 outline-none" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Welcome , ' . $_SESSION['username'] . ' 
                                            </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">                                    
                                            <a href="component/_logout.php" type="button" class="dropdown-item">Logout</a>
                                        </div>
                                        </div>
            </form>';
} else {

    echo    '<form class="form-inline my-2 my-lg-0" action="/Forum  project/search.php" method="GET">
                        <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
                    </form>
                    <button type="button" class="btn btn-primary mx-2" data-toggle="modal" data-target="#login">Login</button>
                    <button type="button" class="btn btn-primary mx-2" data-toggle="modal" data-target="#signup">Sign Up</button>
                </div>';
}

echo ' 
            </div>
</nav>';


//! SIGNUP CHECK HERE 
if (isset($_GET['signupSuccess']) && $_GET['signupSuccess'] == "true") {
    echo "
    <div class='alert alert-success alert-dismissible fade show my-0' role='alert'>
    <strong>Success!</strong> You are successfully Signup please login.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>
    ";
}

//! Login Error SHOW HERE WITH GET METHOD 
if (isset($_GET['lError'])) {
    $error = $_GET['lError'];
    echo "
    <div class='alert alert-danger alert-dismissible fade show my-0' role='alert'>
    <strong>error!</strong>  " . $error . "
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>
    ";
}

//! SignUp Error 
if (isset($_GET['error'])) {
    $error = $_GET['error'];
    echo "
    <div class='alert alert-danger alert-dismissible fade show my-0' role='alert'>
    <strong>error!</strong>  " . $error . "
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>
    ";
}
require "_loginModal.php";
require "_signupModal.php";
