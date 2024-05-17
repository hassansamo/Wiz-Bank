<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = $_POST['depositAmount'];

    require './_backend.php';

    $user->deposit($amount);
}
