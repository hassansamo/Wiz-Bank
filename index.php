<?php
require './partials/_backend.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to WizBank</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="./img/favicon.png">
</head>

<body data-bs-theme="dark">
    <?php include './partials/_header.php' ?>
    <div class="container-fluid position-relative">

        <!-- Home's Background Image -->
        <img src="./img/home-img.jpg" class="w-100 opacity-25" alt="home image" style="height: 87vh;">

        <!-- Text upon Image -->
        <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            echo '<div class="imgText position-absolute p-4 top-0 start-0 end-0">
                    <h5 class="text-center fw-bold fs-1 mb-5">Welcome, ' . $_SESSION['loggedin_name'] . '</h5>';
            $user->show_user_account_information($_SESSION['loggedin_email']);
            echo '</div>';
        } else {
            echo '<div class="imgText position-absolute p-5" style="top: 0; right: 0;">
                    <h5 class="text-end fw-bold mb-0" style="font-size: 6em;">Welcome to <span class="text-decoration-underline text-uppercase">WizBank</span></h5>
                    <p class="text-end fw-semibold fs-4">To get started, click the button below. And you never have to worry about your finance ever again. </p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="button" class="btn btn-primary fs-2 fw-bold" data-bs-toggle="modal" data-bs-target="#signupModal">G<span class="fs-4">ET</span> S<span class="fs-4">TARTED</span> </button>
                    </div>
                </div>';
        }
        ?>

        <!-- ==== Transaction Modals Here ==== -->

        <!-- Withdraw Modal -->
        <div class="modal fade" tabindex="-1" id="withdrawModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Withdraw Money from your account</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="./partials/_withdraw.php">
                        <div class="modal-body">
                            <input type="text" class="form-control form-control-lg fs-1" id="withdrawAmount" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/^0+/, '')" name="withdrawAmount">
                        </div>
                        <div class="modal-footer">
                            <div class="d-grid col">
                                <button type="submit" class="btn btn-success btn-lg">Withdraw</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Deposit Modal -->
        <div class="modal fade" tabindex="-1" id="depositModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Deposit Money into your account</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="./partials/_deposit.php">
                        <div class="modal-body">
                            <input type="text" class="form-control form-control-lg fs-1" id="depositAmount" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/^0+/, '')" name="depositAmount">
                        </div>
                        <div class="modal-footer">
                            <div class="d-grid col">
                                <button type="submit" class="btn btn-success btn-lg">Deposit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>