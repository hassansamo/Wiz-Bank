<!-- Navbar Section starts -->
<nav class="navbar navbar-expand bg-body-tertiary">
    <div class="container-fluid justify-content-start">

        <!-- Navbar Items -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="./index.php">Home</a>
            </li>
            <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                echo '<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Transaction</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" role="button" data-bs-toggle="modal" data-bs-target="#depositModal">Deposit</a></li>
                            <li><a class="dropdown-item" role="button" data-bs-toggle="modal" data-bs-target="#withdrawModal">Withdraw</a></li>
                        </ul>
                    </li>';
            }
            ?>
            <li class="nav-item">
                <a class="nav-link" href="#">About Us</a>
            </li>
        </ul>

        <!-- Logo Image -->
        <?php
        echo '<a class="navbar-brand p-0" href="./index.php" style="margin-left:';
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            echo '30rem"';
        } else {
            echo '37rem"';
        }
        echo '>
            <img src="../oop/img/logo.png" alt="logo of WizBank" style="width: 70px; height: 70px">
        </a>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end ms-auto">'; ?>

        <!-- Sign Up and Login Buttons -->
        <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            echo '<a class="btn btn-danger me-md-2" href="./partials/_handleLogout.php" role="button">Logout</a></div>';
        } else {
            echo '<button class="btn btn-success me-md-2" type="button" data-bs-toggle="modal" data-bs-target="#signupModal">Sign Up</button>
                <button class="btn btn-outline-success" type="button" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button></div>';
        }
        ?>
    </div>
</nav>

<!-- === Errors and Alerts === -->

<?php
// <!-- Error -->
if (isset($_GET['error'])) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> ' . $_GET['error'] . '
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>';
}

// <!-- Alert -->
if (isset($_GET['success'])) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> ' . $_GET['success'] . '
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>';
}
?>

<!-- === Modals === -->

<!-- SignUp Modal -->
<div class="modal fade" id="signupModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-3">Make an Account</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="./partials/_handleSignup.php">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="userName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="userName" name="userName" placeholder="Your Name">
                        <div class="form-text">Make sure to enter your full name.</div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="userEmail" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="userEmail" placeholder="example123@gmail.com" name="userEmail">
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="userPhone" class="form-label">Phone No</label>
                                <input type="tel" class="form-control" id="userPhone" placeholder="03xxxxxxxxx" name="userPhone" pattern="[0-9]{11}" maxlength="11">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="userPass" class="form-label">Password</label>
                            <input type="password" class="form-control" id="userPass" name="userPass">
                        </div>
                        <div class="col">
                            <label for="userCPass" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="userCPass" name="userCPass">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-3">Logging into an Account</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="./partials/_handleLogin.php">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="userLoginEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="userLoginEmail" name="userLoginEmail">
                    </div>
                    <div class="mb-3">
                        <label for="userLoginPass" class="form-label">Password</label>
                        <input type="password" class="form-control" id="userLoginPass" name="userLoginPass">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>