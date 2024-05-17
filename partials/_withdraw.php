<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = $_POST['withdrawAmount'];

    require './_backend.php';

    $user->withdraw($amount);
}
