<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("class_Person.php");

include("dbconnect.php");

$errorArray = [];
if (isset($_POST["loginbtn"])) {
    $loginData = new Person();
    $loginData -> Email = $_POST["email"];
    $loginData -> Password = $_POST["psw"];

    // email validation
    if ($loginData -> Email == ''){
        $errorArray[] = "Empty Email";
    }

    elseif (!filter_var($loginData -> Email, FILTER_VALIDATE_EMAIL)) {
        $errorArray[] = "Invalid email format";
    }

    // check if password is empty
    if ($loginData -> Password == '') {
        $errorArray[] = "Empty Password";
    }

    // if errorArray is empty we are trying to find the account.

    // IMPORTANT!
    // Will be changed after MySQL implementation. Now it is added just as the basic platform.
    if (empty($errorArray)) {
        $personData = loginToAccount($loginData);
        if (!$personData) {
            $errorArray[] = "Email or Password is invalid";
        }
        else {
            session_start();
            $_SESSION["personData"] = serialize($personData);
            header( 'Location: index.php' );
        }
    }

}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <link rel="stylesheet" href="./styles/formNEW.css">
        <link rel="stylesheet" href="./styles/style.css">
        <link rel="stylesheet" href="./styles/navbar.css">

        <link rel="icon" href="img/logo.png">
    </head>
    <body>

      <!-- NAVIGATION MENU -->
      <?php include("Navigation_bar.php") ?>



        <form action="login_form.php" method = "post">
            <div class="container-login">
                <?php
                if (!empty($errorArray)){
                    ?>
                    <div id="confirmedError" >
                        ERROR! <br>
                        <?php
                        foreach ($errorArray as $value) {
                            echo "$value <br>";
                        }
                        ?>
                    </div>
                    <?php
                }
                ?>
                <h1> Login </h1> 

                <span id="loginemail">    <input type="email" placeholder="Email" name="email" id="email" required> </span> <br>
                <input type="password" placeholder="Enter Password" name="psw" id="psw" required><br>

                <button type="submit" name = "loginbtn" id="loginbtn" class="loginbtn">Login</button>
                <p>Do not have account? <a href="Registration_Form.php">Register</a></p>


            </div>
        </form>
    </body>
</html>
