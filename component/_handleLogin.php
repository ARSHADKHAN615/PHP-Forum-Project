<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require "_dbConnect.php";
    $username = $_POST['Username'];
    $Password = $_POST['Password'];

    $userSql = "SELECT * FROM users WHERE username= '$username'";
    $result1 = mysqli_query($connection, $userSql);
    $num = mysqli_num_rows($result1);


    if ($num == 1) {
        $row = mysqli_fetch_assoc($result1);
        if (password_verify($Password, $row['user_pass'])) {
            echo "yes";
            session_start();
            $_SESSION['loggedIn'] = true;
            $_SESSION['sno'] = $row['sno'];
            $_SESSION['username'] = $username;
            header("location:/Forum  project/index.php");
            exit;
        } else {
            $showLoginError = "Password Invalid";
        }

        // $check = $row['user_pass'];
        // if ($Password == $check) {
        //     echo "yes";
        // } else {
        //     echo "no";
        // }
    } else {
        $showLoginError = "In Valid Username";
    }
    header("location:/Forum  project/index.php?lError=$showLoginError");
}
