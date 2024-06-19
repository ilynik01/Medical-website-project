<?php

$personData = 0;

if(isset($_SESSION["personData"])): 
    $personData = unserialize($_SESSION["personData"]); 
endif;

        if($personData) {
        
        
?>


    <div id="signed">
        <li class="user-signed">
            <div class="dropd">
                <button class="dropbutton"><img src="img/white-down-arrow-png-2.png" /></button>
                <div class="buttondrop">
                    <a href="profile.php">My profile</a>
                    <!-- <a href="#">Settings</a> -->
                    <a href="logout.php">Log out</a>
                </div>
            </div>
        </li>

        <li class="user-signed"><a href="profile.php"><?php echo $personData -> Firstname." ".$personData -> Lastname;?></a></li>
        <li class="user-signed">
            <?php
            if (($personData -> Sex) == 'Male'){
                echo '<img src="./img/profile_images/male.jpg" alt="avatar" height="25%" width="25%">';
            }
            elseif (($personData -> Sex) == 'Female'){
                echo '<img src="./img/profile_images/female.png" alt="avatar" height="25%" width="25%">';
            }
            else
                echo '<img src="./img/profile_images/other.png" alt="avatar" height="25%" width="25%">';
            ?>
        </li>
    </div>


<?php 

        }
        else {
        
?>


    <div class="register">
    <li><a href="Registration_Form.php">REGISTER</a></li>
    <li><a href="login_form.php">LOG IN</a></li>
    </div>


<?php 

        }

?>


