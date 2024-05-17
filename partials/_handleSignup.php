<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['userName'];
    $email = $_POST['userEmail'];
    $phone = $_POST['userPhone'];
    $pass = $_POST['userPass'];
    $cPass = $_POST['userCPass'];

    require './_backend.php';

    $user->user_information($username, $email, $phone, $pass, $cPass);
}
