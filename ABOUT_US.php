<?php
    include("class_Person.php");
    session_start();
    if(isset($_SESSION["personData"])): 
        $personData = unserialize($_SESSION["personData"]); 
    endif;
?>



<!DOCTYPE html>
<html lang="en">
    <head>
    <link rel="stylesheet" href="./styles/style.css">
        <link rel="stylesheet" href="./styles/slideshow.css">
        <link rel="stylesheet" href="./styles/navbar.css">
        <link rel="stylesheet" href="./styles/about.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.00, maximum-scale=2.00, minimum-scale=1.00">
        <link rel="icon" href="img/logo.png">
        <title>About us</title>
    
    
    </head>
    <body class="text-document">

      <!-- NAVIGATION MENU -->
      <?php include("Navigation_bar.php") ?>





        <!-- Main paragraph area-->  
        <div class="mainbody">  
            <section>  
            <br>
            <h2>Contact our team of doctors!</h2>
                <p>Send your data to us for analysis!</p>
                <br>

                <div class="contactus">
                <div class="contactumn">
                    <div class="one">
                    <img src="img/doctor-5477972_960_720.png" style="width:100%">
                    <div class="container">
                        <h2>Example name</h2>
                        <p class="titlecontact">Example professtion</p>
                        <p>mymail@gmail.com</p>
                        <a href="mailto:"><button class="buttonsimple"  >Contact</button></a>
                    </div>
                    </div>
                </div>
                <div class="contactumn">
                    <div class="one">
                    <img src="img/doctor-5477972_960_720.png" style="width:100%">
                    <div class="container">
                        <h2>Example name</h2>
                        <p class="titlecontact">Example professtion</p>
                        <p>mymail@gmail.com</p>
                        <a href="mailto:"><button class="buttonsimple"  >Contact</button></a>
                    </div>
                    </div>
                </div>
                </div>

                <br>

                <hr>
                        <!-- Main paragraph area-->  
                <h1 class="h1">  
                    Read about our healthcare application!</h1>  
                
                <br>  
                
                <p class="p">  
                    As the flagship location of the INTEGRIS Health Network, INTEGRIS Baptist Medical Center is Oklahoma’s center for health care excellence. Our award-winning and nationally recognized hospital has a decades-long proven track record of providing an unsurpassed level of care that Oklahomans deserve, reaching beyond the walls of our Oklahoma City facility into the neighborhoods and communities that need us most.
                    Our mission has always been to improve the lives of you and your family by providing The Most Challenging Healing through the most trusted name in health care – INTEGRIS Health. Our commitment and investment in our community and you only continue to grow, and at INTEGRIS Baptist Medical Center, you’ll never have to think twice about getting the best in cutting-edge care available from the finest, highly-trained physicians. Challenging standards, exceeding expectations and building hope. That’s INTEGRIS Health.    
                </p>  
                <br>  
                
                <br>
                <img src="img/doctors-hospital-design.jpg" alt="Healthcare" width="600">
                <br>  
                <br>  
                <h1 class="h1">  
                    Understanding of health by our members</h1>  
        
                <br>  
                <p class="p">  
                    ext message-based health interventions provide patients with reminders, education, or self-management assistance for a broad spectrum of health conditions. Interventions are most frequently used as a part of broader health promotion efforts or to help individuals manage chronic diseases1. Text messages may be standardized or tailored to specific patients and sent at varied frequencies based on the intervention2. Text messaging can be combined with other approaches or delivered as part of a stepped care or progressive intervention that is tailored to patients’ needs, beginning with the least intensive treatment and moving to more intensive, and often expensive, treatments as needed1. Text message software and smartphone apps can be integrated into electronic health records (EHRs) to send alerts and reminders to patients
                </p>  
                <br>
                <p class="p">  
                    The final set of documents consists of 50 blogs written by patients. We collected parts of the blogs that described diseases, conditions, or treatments. Such blogs are available from WebMD and other major blog sites such as www.blogger.com.     
                </p>   
                
                <br>
                <img src="img/doctors.jpg" alt="Healthcare" width="600">





                                
               
                                    
                
            </section>
            <aside>


                <!-- SIDE MENU -->
                <?php include("side_menu.php") ?>

                <!-- GOOGLE NEWS -->
                <?php include("News_API.php") ?>


            </aside>
        </div> 



    </body>
</html>

