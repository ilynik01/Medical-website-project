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

        <!-- size configurations -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- social links stylesheet -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="icon" href="img/logo.png">
        <title>Stay healthy</title>

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




    <!-- Main paragraph area-->  
    <div class="mainbody">  
        <section>  
            <h1 class="h1">  
            Easy Ways to Stay Healthy</h1>  
            <!-- H1 tag-->  
            <p class="p">  
                Posted by user1</p>  
            <!-- Paragraph tag-->  
            <p class="p">  
            Growing up your mom always tells you to wash your hands. And it's super important! You should be washing your hands every time you come inside. Whether that's using soap and hot water (the best) or hand sanitizer, keep those hands clean. And when you're out and about, avoid touching your face. We touch a million different surfaces a day and those germs and bacteria get onto our hands and ultimately into our system. So try to fight it off by keeping your hands as clean as possible.
            </p>  
            <br>  
            <br>
            <img src="./img/wayhealth.jpg" alt="Healthcare" width="600">  
            <br>  
            <!-- Social networks -->
            <a href="#" class="fa fa-facebook"></a>
            <a href="#" class="fa fa-twitter"></a>
            <a href="#" class="fa fa-google"></a>
        

            <br>  <br>
            <h1 class="h1">  
            Remember to stay hydrated</h1>  
            <p class="p">  
                Posted by user1</p>  
             
            <p class="p">  
                Drinking enough water and staying hydrated is again one of the best ways to stay healthy. It's key in flushing out toxins and waste materials from the body so that your immune system is more effectively able to fight infections. When your system is clogged up with toxins, your immune system can't do its job. Water also carries oxygen into our cells which allows our entire body to function properly. Without adequate hydration, we risk a host of issues. I recommend that you aim to drink at least half of your body weight (lbs) in ouches of water per day. So if you weighed 150lbs, you'd be drinking 75 ounces of water minimum.            </p> 
            <br>  
            <br>
            <img src="img/dwawdaw.PNG" alt="Healthcare" width="600">
            <br>  
            <!-- Social networks -->
            <a href="#" class="fa fa-facebook"></a>
            <a href="#" class="fa fa-twitter"></a>
            <a href="#" class="fa fa-google"></a>
                
        </section>

        <aside>
        <?php include("side_menu.php") ?>


        <?php include("News_API.php") ?>
        </aside>

    </div>  

    
     


    
    </body>
    
    
    
</html>
