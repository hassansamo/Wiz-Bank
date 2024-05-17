<?php
session_start();
class Bank
{
    private $conn;

    // ==== Connection to the database ====
    public function __construct($server, $username, $password, $database)
    {
        $this->conn = mysqli_connect($server, $username, $password, $database);
    }

    // Checks if the given email exists in the database
    private function checkEmail($email)
    {
        $sql = "SELECT * FROM `users` WHERE email = '$email'";
        $row = mysqli_num_rows(mysqli_query($this->conn, $sql));
        // returns true if the given email doesn't exist in the database
        return ($row > 0) ? true : false;
    }

    // Checks if the password matches the one in the database
    private function checkPassword($email, $password)
    {
        $sql = "SELECT password FROM `users` WHERE email = '$email'";
        $row = mysqli_fetch_assoc(mysqli_query($this->conn, $sql));
        // returns true if the entered password is correct 
        return (password_verify($password, $row['password'])) ? true : false;
    }

    // Generates a unique 10 character numeric text
    private function accNumGenerator()
    {
        do {
            $uniqueId = uniqid();

            $numericId = '';
            for ($i = 0; $i < strlen($uniqueId); $i++) {
                $numericId .= ord($uniqueId[$i]);
            }
            $accountNum = substr($numericId, -10);
        } while ($this->accountExists($accountNum));

        return $accountNum;
    }

    // Checks if the generated account number already exists or not
    private function accountExists($accountNum)
    {
        $sql = "SELECT * FROM `users` WHERE acc = $accountNum";
        $row = mysqli_num_rows(mysqli_query($this->conn, $sql));
        // returns false if the generated account number already exist in the database
        return ($row > 0) ? true : false;
    }

    // Checks if the entered amount is available
    private function checkBalance($withdrawAmount)
    {
        $email = $_SESSION['loggedin_email'];
        $sql = "SELECT balance FROM `users` WHERE email = '$email'";
        $row = mysqli_fetch_assoc(mysqli_query($this->conn, $sql));
        // returns true if the given amount is available
        return ($withdrawAmount <= $row['balance']) ? true : false;
    }

    // Inserting user information in the database
    public function user_information($userName, $userEmail, $userPhone, $userPass, $userCPass)
    {
        if (!$this->checkEmail($userEmail)) {
            if ($userPass === $userCPass) {
                $userAccNum = $this->accNumGenerator($userEmail);
                $userPass = password_hash($userPass, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `users` (`acc`, `name`, `email`, `password`, `phone`, `balance`, `dt`) VALUES ('$userAccNum', '$userName', '$userEmail', '$userPass', '$userPhone', '0', current_timestamp())";
                mysqli_query($this->conn, $sql);
                $showAlert = "Your Bank account has been created. Now you can activate it by logging into it.";
                header("location: ../index.php?success=" . $showAlert);
                exit;
            } else {
                $showError = "The passwords doesn't match";
            }
        } else {
            $showError = "This email already exists and is in use.";
        }
        header("location: ../index.php?error=" . $showError);
        exit;
    }

    // Function to deposit amount
    public function deposit($depositAmount)
    {
        $email = $_SESSION['loggedin_email'];
        $sql = "UPDATE users SET balance = balance + $depositAmount WHERE email = '$email'";
        mysqli_query($this->conn, $sql);
        $showAlert = $depositAmount . "Rs has been deposited in your account.";
        header("location: ../index.php?success=" . $showAlert);
        exit;
    }

    // Function to withdraw amount
    public function withdraw($withdrawAmount)
    {
        if ($this->checkBalance($withdrawAmount)) {
            $email = $_SESSION['loggedin_email'];
            $sql = "UPDATE users SET balance = balance - $withdrawAmount WHERE email = '$email'";
            mysqli_query($this->conn, $sql);
            $showAlert = $withdrawAmount . "Rs has been withdrawn from your account.";
            header("location: ../index.php?success=" . $showAlert);
            exit;
        } else {
            $showError = "Insufficient balance in your account.";
        }
        header("location: ../index.php?error=" . $showError);
        exit;
    }

    // Function to login to the user account
    public function login($userEmail, $userPass)
    {
        // Checking if the email is correct
        if ($this->checkEmail($userEmail)) {

            // Checking if the password is correct
            if ($this->checkPassword($userEmail, $userPass)) {
                $_SESSION['loggedin'] = true;
                $_SESSION['loggedin_email'] = $userEmail;
                $sql = "SELECT name FROM `users` WHERE email = '$userEmail'";
                $row = mysqli_fetch_assoc(mysqli_query($this->conn, $sql));
                $_SESSION['loggedin_name'] = $row['name'];
                header("location: ../index.php");
                exit;
            } else {
                $showError = "Invalid Password. Please make sure the password is correct.";
            }
        } else {
            $showError = "This account doesn't exists.";
        }
        header("location: ../index.php?error=" . $showError);
        exit;
    }

    // Function to show user account's information
    public function show_user_account_information($userEmail)
    {
        $sql = "SELECT * FROM `users` WHERE email = '$userEmail'";
        $row = mysqli_fetch_assoc(mysqli_query($this->conn, $sql));
        echo '<table class="table w-50 mx-auto table-striped-columns table-bordered">
                        <tr>
                            <th scope="row">Email</th>
                            <td>' . $row['email'] . '</td>
                        </tr>
                        <tr>
                            <th scope="row">Phone Number</th>
                            <td>' . $row['phone'] . '</td>
                        </tr>
                        <tr>
                            <th scope="row">Bank Account Number</th>
                            <td>' . $row['acc'] . '</td>
                        </tr>
                        <tr>
                            <th scope="row">Bank Balance</th>
                            <td>' . $row['balance'] . ' Rs</td>
                        </tr>
                    </table>';
    }
}

$user = new Bank("localhost", "root", "", "wizbank");
