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
        <title>For partners</title>
    
    
    </head>
    <body class="text-document">

      <!-- NAVIGATION MENU -->
      <?php include("Navigation_bar.php") ?>





        <!-- Main paragraph area-->  
        <div class="mainbody">  
                <section>  
                    <h1 class="h1">  
                        Medical data business</h1>  
                    <!-- H1 tag-->  
                    <p class="p">  
                        Establish partnership with us!</p>  
                    <br>  
                    <!-- Paragraph tag-->  
                    <p class="p">  
                    General partnerships and limited partnerships are fairly uncommon forms of business in Estonia. They are suitable when a larger number of stakeholders are involved or for supporting the economic activity of shareholders.

The partners shall make contributions in the amount prescribed by the partnership agreement. A contribution may be monetary or non-monetary. A non-monetary contribution may also be the provision of services to the general partnership, or the transfer to or use of assets by the general partnership. The monetary value of a non-monetary contribution shall be determined by the partnership agreement.

                    </p>  
                    <br>  
                
                    <br>
                    <img src="./img/health.png" alt="Healthcare" width="600">  
                    <br>  
                    <br>  
                    <h1 class="h1">  
                        Health</h1>  
                
                    <br>  
                    <p class="p">  
                        B Natural Language Resources
                        To evaluate         the language used in the different types of documents we compare them with three existing vocabularies that are more or less medical in nature. The first vocabulary is the Metathesaurus included in the Unified Medical Language System (UMLS). We used the 2005AB version as one vocabulary to represent different specialties in medicine and included all vocabularies that do not need an extra license. Our set contains 1,570,372 terms mapped to 840,605 concepts. This resource is the most intense medical resource we use.    
                    </p>  
                    <br>  
                    
                    <br>
                    <img src="img/doctors-hospital-design.jpg" alt="Healthcare" width="600">
                    
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
