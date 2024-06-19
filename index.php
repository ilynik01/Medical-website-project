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
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.00, maximum-scale=2.00, minimum-scale=1.00">
        <link rel="icon" href="img/logo.png">
        <title>Main Page</title>
        

        <!-- social links stylesheet -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



    </head>
    <body class="js-document">

    <!-- NAVIGATION MENU -->
        <?php include("Navigation_bar.php") ?>


         <!-- heading and description -->
        

        <div class="slideshow-container">

            <!-- Full-width images with number and caption text -->
   

            <div class="heading1 ani">
                <img src="img/header_wallpapers/1wallpaper.PNG" alt="">
                <div class="heading2">
                    <h1> Healthy Experience is waiting for you! </h1>
                    <p>
                        Sign in to our application and start improving your health! 
                    </p>
                </div>
            </div>

            <div class="heading1 ani">
                <img src="img/header_wallpapers/2wallpaper.PNG" alt="">
                <div class="heading2">
                    <h1> Your health matters! </h1>
                    <p>
                         We are always happy to help you! 
                    </p>
                </div>
            </div>
   
            <div class="heading1 ani">
                <img src="img/header_wallpapers/3wallpaper.PNG" alt="">
                <div class="heading2">
                    <h1> Explore a healthy lifestyle! </h1>
                    <p>
                        Check out our articles! 
                    </p>
                </div>
            </div>

            <div class="heading1 ani">
                <img src="img/header_wallpapers/4wallpaper.PNG" alt="">
                <div class="heading2">
                    <h1> Keep your health secured! </h1>
                    <p>
                        Monitor your health daily! 
                    </p>
                </div>
            </div>

        </div>


        <script src="script/header.js" ></script>




        


        <!-- MAIN BODY -->
        <div class="mainbody">  

            <!-- Main text area-->
            <section>  
                <div>
                    <h2>Medicine</h2>  
                    <p>Medicine is the science and practice of caring for a patient, managing the diagnosis, prognosis, prevention, treatment, palliation of their injury or disease, and promoting their health. Medicine encompasses a variety of health care practices evolved to maintain and restore health by the prevention and treatment of illness. Contemporary medicine applies biomedical sciences, biomedical research, genetics, and medical technology to diagnose, treat, and prevent injury and disease, typically through pharmaceuticals or surgery, but also through therapies as diverse as psychotherapy, external splints and traction, medical devices, biologics, and ionizing radiation, amongst others.</p>
                    <img src="./img/drugs.jpg" height="100" alt="">
                    <br>  
                    <!-- Social networks -->
                    <?php include("social_networks.php") ?>
                    <br> <br> <br>
                </div>

                <div>
                    <h2>Clinical practice</h2>  
                    <p> Medical availability and clinical practice varies across the world due to regional differences in culture and technology. Modern scientific medicine is highly developed in the Western world, while in developing countries such as parts of Africa or Asia, the population may rely more heavily on traditional medicine with limited evidence and efficacy and no required formal training for practitioners.[8]

                        In the developed world, evidence-based medicine is not universally used in clinical practice; for example, a 2007 survey of literature reviews found that about 49% of the interventions lacked sufficient evidence to support either benefit or harm </p>
                    <img src="./img/doctors2.jpg" height="100" alt="">

                    <br>  
                    <!-- Social networks -->
                    <?php include("social_networks.php") ?>
                </div>

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
