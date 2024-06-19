<?php

ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("class_Person.php");

// DB connection
include("dbconnect.php");

$errorArray = [];
if(isset($_POST['registerbtn'])){
    $personData = new Person ();
    $personData ->Firstname = $_POST['firstname'];
    $personData ->Lastname = $_POST['lastname'];
    $personData ->Sex = $_POST['sex'];
    $personData ->Phone = $_POST['phone'];
    $personData ->Email = $_POST['email'];
    $personData ->Password = $_POST['psw'];



    //initialising errorArray
    //if it is empty => Everything is validated correctly
    //if it is not empty => Program will write what is wrong


    //Server side validation
    //Name validation
    if ($personData ->Firstname ==''){
        $errorArray[] = "Empty First name";
    }
    else if(!preg_match("/^[a-zA-Z \-'šžõäöüŠŽÕÄÖÜ]{1,25}$/", $personData ->Firstname)) {
        $errorArray[] = "Only letters and white space allowed in First Name. <br> The maximum number of characters in first name is 25.";
    }

    //Last name validation
    if ($personData ->Lastname ==''){
        $errorArray[] = "Empty Last name";
    }
    else if(!preg_match("/^[a-zA-Z \-'šžõäöüŠŽÕÄÖÜ]{1,25}$/", $personData ->Lastname)) {
        $errorArray[] = "Only letters and white space allowed in Last Name. <br> The maximum number of characters in last name is 25.";
    }



    //Sex validation
    if($personData ->Sex != '' && $personData ->Sex!= 'Male' && $personData ->Sex!= 'Female' && $personData ->Sex!= 'Other'){
        $errorArray[] = "Invalid sex value";
    }



    // Phone validation
    // if ($personData ->Phone != '' && !preg_match("/^\+[0-9 ()]{5,20}$/", $personData->Phone)) {
    //   $errorArray[] = 'Invalid phone number format. Valid example: +123 456 (789)';
    // }

    if ($personData ->Phone != '' && !preg_match("/^\+?[0-9 ()]{5,20}$/", $personData->Phone)) {
      $errorArray[] = 'Invalid phone number format. Valid example: +123 456 (789)';
    }



    //email validation
    if ($personData ->Email ==''){
        $errorArray[] = "Empty Email";
    }

    elseif (!filter_var($personData ->Email, FILTER_VALIDATE_EMAIL) || strlen($personData->Email) > 255) {
        $errorArray[] = "Invalid email format";
    }


    // Validate password strength
    $uppercase = preg_match('@[A-Z]@', $personData ->Password);
    $lowercase = preg_match('@[a-z]@', $personData ->Password);
    $number    = preg_match('@[0-9]@', $personData ->Password);
    $specialChars = preg_match('@[^\w]@', $personData ->Password);

    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($personData ->Password) < 8 || strlen($personData->Password) > 25) {
        $errorArray[] = 'Password should be 8 to 25 characters in length and should include at least one upper case letter, one number, and one special character.';
    }


    if(empty($errorArray))
    {
        $line=[];
        $line[]=$personData ->Firstname;
        $line[]=$personData ->Lastname;
        $line[]=$personData ->Sex;
        $line[]=$personData ->Phone;
        $line[]=$personData ->Email;
        $line[]=$personData ->Password;
    
        switch (createAccount($personData)) {
          case 2: //Email error
            $errorArray[] = "Email is used";
          case 1: //Phone error
            $errorArray[] = "Phone number is used";
          case 0: //All is ok
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
      <title>Registration</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="./styles/formNEW.css">

      <link rel="stylesheet" href="./styles/style.css">
      <link rel="stylesheet" href="./styles/navbar.css">

      <link rel="icon" href="img/logo.png">
  </head>


  <body class="form-document">


      <!-- NAVIGATION MENU -->
      <?php include("Navigation_bar.php") ?>


    <!-- FORM -->
    <form action = "Registration_Form.php" method="Post">
      <div class="container-login">

      <h1> Registration </h1>  
      <br>
          <!-- Error Window -->
          <?php if (!empty($errorArray)){ ?>
              <form>
                  <div id="confirmedError" >
                      ERROR! <br> <br>
                      <?php
                      foreach ($errorArray as $value) {
                          echo "$value <br>";
                      }
                      ?>
                 </div>
              </form>
          <?php } ?>

        

        <div id="toprow">
        <input type="text" name="firstname" id="firstname" placeholder= "Firstname*" size="15" required />

        <input type="text" name="lastname" id="lastname" placeholder="Lastname*" size="15" required />
        <br>
        </div>

        <table id="form-table">
          <tr>
            <td rowspan="2" >
              <div id="sex">
                <label><b>Sex</b></label><br>
                <input type="radio" value="Male" name="sex" checked > Male <br>
                <input type="radio" value="Female" name="sex"> Female <br>
                <input type="radio" value="Other" name="sex"> Other
                <br>
              </div>
            </td>
            <td>
              <input type="text" placeholder="Phone*" name="phone" id="phone" required>
              <br>
            </td>
          </tr>
          <tr>
            <td>
              <input type="email" placeholder="Email*" name="email" id="email" required>
              <br>
            </td>
          </tr>
        </table>
        <input type="password" placeholder="Enter Password*" name="psw" id="psw" onclick="pswAllert()" required>
          <script>
              function pswAllert() {
                  alert("Password should be 8 to 25 characters in length and should include at least one upper case letter, one number, and one special character.");
              }
          </script>
        <br>
        <button type="submit" name = "registerbtn" id="registerbtn" class="registerbtn">Send</button> 

          <p>Already have account? <a href="login_form.php">Log In</a></p>

      </div>
    </form>
    





  </body>
</html>
