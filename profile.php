<?php
include("class_Person.php");

session_start();
if(!isset($_SESSION['personData'])) {
    //check if session is set
    header('Location: index.php');
}
if(isset($_SESSION["personData"])):
    $personData = unserialize($_SESSION["personData"]);
endif;

?>



<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.00, maximum-scale=2.00, minimum-scale=1.00">

    <title>Profile</title>
    
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/navbar.css">
    <link rel="stylesheet" href="./styles/user-profile.css">
    <link rel="icon" href="img/logo.png">
</head>
<body class="text-document">

      <!-- NAVIGATION MENU -->
      <?php include("Navigation_bar.php") ?>



    <div class="mainbody">
        <section class="koty">
            <h2 style="text-align:center">User Profile</h2>

            <div class="card">


                <div class = "profile-i">

            
                    

                    <!-- Choosing avatar according to sex-->
                    <?php  
                    if (($personData -> Sex) == 'Male'){
                        echo '<img src="./img/profile_images/male.jpg" alt="avatar">';
                    }
                    elseif (($personData -> Sex) == 'Female'){
                        echo '<img src="./img/profile_images/female.png" alt="avatar">';
                    }
                    else
                        echo '<img src="./img/profile_images/other.png" alt="avatar">';
                    ?>

                    <p>Sex: <?php echo $personData -> Sex; ?></p>
                </div>

                <!-- Outputting Firstname/Lastname/Email/Phone-->
                <div class = "profile-t">
                    <h1><?php echo $personData -> Firstname." ".$personData -> Lastname;?></h1>
                    <p>E-mail: <?php echo $personData -> Email; ?></p>
                    <p>Phone number: <?php echo $personData -> Phone; ?></p>
                
                </div>

            </div>
            
        </section>

        
        <aside class = "aside">
        
            <!-- SIDE MENU -->
            <?php include("side_menu.php") ?>

        </aside>
    
    
    </div>

</body>

</html>
