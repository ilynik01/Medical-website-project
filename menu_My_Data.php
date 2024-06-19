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
<html lang="en">
<head>
    <meta charset = "utf-8">
    <link rel="stylesheet" href="styles/statistics-main.css">
    <link rel="stylesheet" href="styles/buttons.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="./styles/navbar.css">

    <base href="My-Data.html">
    <link rel="icon" href="img/logo.png">
    <title>My Data</title>
    <style>
        .headingstyle{
            font-size: 40px;
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
            margin-top: 50px;
            color: rgb(255, 0, 0);
}
    </style>
</head>
<body class="my-data">


      <!-- NAVIGATION MENU -->
      <?php include("Navigation_bar.php") ?>


        <!-- Content section of the document -->

        
            <!-- heading and description -->
            
                <div class="heading1">
                    <div class="heading2">
                        <h1>My Data</h1>
                        <p>
                            In this section you can record and manage your health data. 
                        </p>
                    </div>
                </div>
            

            <br>
       

            <div class="mainbody">  
                <section>


                <!-- TABLE section for recorded data -->

                <!-- upper scroller, script below -->
                <div id="scr">
                    <div class="part"></div>
                </div>
                <div id="scrtbl">

                <table class="table">
                    <thead>
                        <tr>
                            <th>Oxygen in blood</th>
                            <th>Heart rate</th>
                            <th>Blood pressure systolic</th>
                            <th>Blood pressure diastolic</th>
                            <th>Hemoglobin</th>
                            <th>Temperature</th>
                            <th>Created at</th>

                        </tr>
                    </thead>
                    <tbody>
                      <?php

                      include_once "dbconnection_data.php";
                      try{
                          //connect to the database
                          $link = new PDO("mysql:host=".$server.";dbname=".$database,$user,$password);
                          $link -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                          //Output medical data from database
                          $queryString = "SELECT oxygen_in_blood, heart_rate, blood_pressure_systolic, blood_pressure_diastolic, hemoglobin, temperature, created_at
                                            FROM medical_data
                                            WHERE user_id=:userId";
                          $query = $link -> prepare($queryString);
                          $query->bindValue(':userId', $personData->ID);
                          $query -> execute();
                          $result = $query -> setFetchMode(PDO::FETCH_ASSOC);





                          while($row = $query -> fetch()){

                              $oxygenClass = "";
                              if(($row["oxygen_in_blood"])>=95){
                                  $oxygenClass = "green";
                              }
                              elseif (($row["oxygen_in_blood"])>=90){
                                  $oxygenClass = "yellow";
                              }
                              else{
                                  $oxygenClass = "red";
                              }


                              $heartRateClass = "";
                              if(($row["heart_rate"])>=60 && ($row["heart_rate"])<=100){
                                  $heartRateClass = "green";
                              }
                              elseif (($row["heart_rate"])>=40 && ($row["heart_rate"])<=120){
                                  $heartRateClass = "yellow";
                              }
                              else{
                                  $heartRateClass = "red";
                              }


                              $systolicClass = "";
                              if(($row["blood_pressure_systolic"])>=100 && ($row["blood_pressure_systolic"])<=120){
                                  $systolicClass = "green";
                              }
                              elseif (($row["blood_pressure_systolic"])>=90 && ($row["blood_pressure_systolic"])<=130){
                                  $systolicClass = "yellow";
                              }
                              else{
                                  $systolicClass = "red";
                              }


                              $diastolicClass = "";
                              if(($row["blood_pressure_diastolic"])>=60 && ($row["blood_pressure_diastolic"])<=80){
                                  $diastolicClass = "green";
                              }
                              elseif (($row["blood_pressure_diastolic"])>=50 && ($row["blood_pressure_diastolic"])<=90){
                                  $diastolicClass = "yellow";
                              }
                              else{
                                  $diastolicClass = "red";
                              }


                              $hemoglobinClass = "";
                              if(($row["hemoglobin"])>=11.6 && ($row["hemoglobin"])<=16.6){
                                  $hemoglobinClass = "green";
                              }
                              elseif (($row["hemoglobin"])>=9 && ($row["hemoglobin"])<=19){
                                  $hemoglobinClass = "yellow";
                              }
                              else{
                                  $hemoglobinClass = "red";
                              }


                              $temperatureClass = "";
                              if(($row["temperature"])>=36.0 && ($row["temperature"])<=37.0){
                                  $temperatureClass = "green";
                              }
                              elseif (($row["temperature"])>=35.5 && ($row["temperature"])<=37.5){
                                  $temperatureClass = "yellow";
                              }
                              else{
                                  $temperatureClass = "red";
                              }



                              echo "<tr><td class='".$oxygenClass."'>".$row["oxygen_in_blood"]." %"."</td>";
                              echo "<td class='".$heartRateClass."'>".$row["heart_rate"]." bpm"."</td>";
                              echo "<td class='".$systolicClass."'>".$row["blood_pressure_systolic"]." mm Hg"."</td>";
                              echo "<td class='".$diastolicClass."'>".$row["blood_pressure_diastolic"]." mm Hg"."</td>";
                              echo "<td class='".$hemoglobinClass."'>".$row["hemoglobin"]." g/dl"."</td>";
                              echo "<td class='".$temperatureClass."'>".$row["temperature"]." °C"."</td>";
                              echo "<td><b>".$row["created_at"]."</b></td></tr>";


                          }


                      }
                      catch (PDOException $exception){
                          echo "Connection to DB failed: " . $exception->getMessage();
                      }

                      ?>
                    </tbody>
                </table>
                <!-- DONT TOUCH THIS DIV!
                it shows the borders of content from the upper part -->    
                </div>
                    

                <!-- Scrolling script of TABLE -->
                <script src="script/table-scroll.js"></script>

                    
            </section>
            <aside>
                <?php include("side_menu.php") ?>

            </aside>

            </div>



   

        <!-- Footer and fun -->
        <footer>
            <hr>
            <h2 style="margin-left: 200px; margin-top: 40px; font-family: Comic Sans MS; color: rgb(255, 250, 180);">Funny game: Catch the doctor!</h2>
            <div class="vrach">   
                <p style="font-family: Jazz LET, fantasy;"><b> Catch me! </b></p> 
                <a href="https://i.pinimg.com/564x/19/66/37/19663760c3943a42edd978c8c5008fd6.jpg"><img src="img/doctor.png" style="height: 80px; width: auto;" alt="Funny Doctor!"></a>
            </div>

        </footer>


</body>
</html>