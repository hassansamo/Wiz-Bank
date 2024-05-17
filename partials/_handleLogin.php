<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['userLoginEmail'];
    $pass = $_POST['userLoginPass'];

    require './_backend.php';

    $user->login($email, $pass);
}
