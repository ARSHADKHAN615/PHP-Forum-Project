<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require "_dbConnect.php";
    $username = $_POST['Username'];
    $Email = $_POST['Email'];
    $Password = trim($_POST['Password']);
    $cPassword = $_POST['cPassword'];
    $userSql = "SELECT * FROM users WHERE username='$username'";
    $result1 = mysqli_query($connection, $userSql);


    if (mysqli_num_rows($result1) > 0) {
        $showError = "userName Already Exist";
    } else {
        if ($Password == $cPassword) {
            $hash = password_hash($Password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users`(`username`, `email`, `user_pass`) VALUES ('$username','$Email','$hash')";
            $result2 = mysqli_query($connection, $sql);
            header("location:/Forum  project/index.php?signupSuccess=true");
            exit();
        } else {
            $showError = "password not matched";
        }
    }
    header("location:/Forum  project/index.php?signupSuccess=false&error=$showError");
}
