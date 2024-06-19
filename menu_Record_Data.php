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

<?php

ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("class_MedicalData.php");


$errorArray = [];
if(isset($_POST['submitData'])){
    $medicalData = new MedicalData();
    $medicalData ->oxygenInBlood = $_POST['oxygenInBlood'];
    $medicalData ->heartRate = $_POST['heartRate'];
    $medicalData ->bloodPressureSystolic = $_POST['bloodPressureSystolic'];
    $medicalData ->bloodPressureDiastolic = $_POST['bloodPressureDiastolic'];
    $medicalData ->hemoglobin = $_POST['hemoglobin'];
    $medicalData ->temperature = $_POST['temperature'];


    //initialising errorArray
    //if it is empty => Everything is validated correctly
    //if it is not empty => Program will write what is wrong


    //Server side validation
    //oxygen in blood validation
    if ($medicalData->oxygenInBlood ==''){
        $errorArray[] = "Empty Oxygen in 'Oxygen in blood'";
    }
    else if(!preg_match("/^[0-9]*$/", $medicalData->oxygenInBlood)) {
        $errorArray[] = "Only numbers are allowed in 'Oxygen in blood' input.";
    }
    else if(($medicalData->oxygenInBlood)>100 || ($medicalData->oxygenInBlood)<0){
        $errorArray[] = "'Oxygen in blood' can't be less than 0% or more than 100%";
    }

    //heartrate validation
    if ($medicalData->heartRate ==''){
        $errorArray[] = "Empty 'Heart rate' input";
    }
    else if(!preg_match("/^[0-9]*$/", $medicalData->heartRate)) {
        $errorArray[] = "Only numbers are allowed in 'Heart rate' input.";
    }
    else if(($medicalData->heartRate)>500 || ($medicalData->heartRate)<0){
        $errorArray[] = "'Heart rate' can't be that fast/slow";
    }


    //blood Pressure Systolic validation
    if ($medicalData ->bloodPressureSystolic  ==''){
        $errorArray[] = "Empty 'Blood pressure(systolic)' input";
    }
    else if(!preg_match("/^[0-9]*$/", $medicalData->bloodPressureSystolic)) {
        $errorArray[] = "Only numbers are allowed in 'Blood pressure(systolic)' input.";
    }
    else if(($medicalData->bloodPressureSystolic)>500 || ($medicalData->bloodPressureSystolic)<0){
        $errorArray[] = "'Blood pressure(systolic)' can't be that high/low";
    }


    //blood Pressure diastolic validation
    if ($medicalData ->bloodPressureDiastolic  ==''){
        $errorArray[] = "Empty 'Blood pressure(diastolic)' input";
    }
    else if(!preg_match("/^[0-9]*$/", $medicalData->bloodPressureDiastolic)) {
        $errorArray[] = "Only numbers are allowed in 'Blood pressure(diastolic)' input.";
    }
    else if(($medicalData->bloodPressureDiastolic)>500 || ($medicalData->bloodPressureDiastolic)<0){
        $errorArray[] = "'Blood pressure(diastolic)' can't be that high/low";
    }



    //hemoglobin validation
    if ($medicalData ->hemoglobin  ==''){
        $errorArray[] = "Empty 'Hemoglobin' input";
    }
    else if(!preg_match("/^[0-9.]*$/", $medicalData->hemoglobin)) {
        $errorArray[] = "Only numbers and dot are allowed in 'Hemoglobin' input.";
    }
    else if(($medicalData->hemoglobin)>50 || ($medicalData->hemoglobin)<0){
        $errorArray[] = "'Hemoglobin' can't be that high/low";
    }


    //temperature validation
    if ($medicalData ->temperature  ==''){
        $errorArray[] = "Empty 'Temperature' input";
    }
    else if(!preg_match("/^[0-9.]*$/", $medicalData->temperature)) {
        $errorArray[] = "Only numbers and dot are allowed in 'Temperature' input.";
    }
    else if(($medicalData->temperature)>50 || ($medicalData->temperature)<0){
        $errorArray[] = "Temperature can't be that high/low";
    }



    //no errors
    if(empty($errorArray))
    {
        include_once "dbconnection_data.php";
        try{
            //connect to db

            $link = new PDO("mysql:host=".$server.";dbname=".$database,$user,$password);
            $link -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            function sanitizeInputVar($var){
                $var = stripslashes($var);
                $var = htmlentities($var);
                $var = strip_tags($var);
                return $var;
            }

            //Insert medical data of the user to the database
            $queryString = "INSERT INTO medical_data (oxygen_in_blood, heart_rate, blood_pressure_systolic, blood_pressure_diastolic, hemoglobin, temperature, user_id)
                            VALUES (".$medicalData->oxygenInBlood.",".$medicalData->heartRate.",".$medicalData->bloodPressureSystolic.",".$medicalData->bloodPressureDiastolic.",".$medicalData->hemoglobin.",".$medicalData->temperature.",".$personData->ID.")";

            $query = $link -> prepare($queryString);

            
            $query -> execute();
            $result = $query -> setFetchMode(PDO::FETCH_ASSOC);

            header( 'Location: menu_My_Data.php' );


        }
        catch (PDOException $exception){
            echo "Connection to DB failed: " . $exception->getMessage();
        }

    }
}


?>







<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset = "utf-8">        
        <meta name="description" content="Patient's health recording page. Hemoglobin, temperature, blood pressure, etc.">

        <link rel="stylesheet" href="styles/recording-form.css">
        <link rel="stylesheet" href="styles/buttons.css">

        <link rel="stylesheet" href="styles/style.css">
        <link rel="stylesheet" href="./styles/navbar.css">

        <link rel="icon" href="img/logo.png">

        <title>Record data</title>
        <style>

        </style>
    </head>
    <body class="my-record">


      <!-- NAVIGATION MENU -->
      <?php include("Navigation_bar.php") ?>


        <!-- heading and description -->
    
        <div class="heading1">
            <div class="heading2">
                <h1>Record Data</h1>
                <p>
                    Here you can record your new health data. 
                </p>
            </div>
        </div>
        

        <br>
   
  


        <div class="mainbody">  
            <section>

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
                <form action="menu_Record_Data.php" method="POST" id="formMedicalData">

                    <div id="IDrecordData">

                        <!-- oxygen in blood -->
                        <label for="oxygenInBlood">Oxygen in blood: </label>
                        <input type="number" id="oxygenInBlood" name="oxygenInBlood" min="0" max="100" value="98" required> percent %<span class="required"></span><br>

                        <!-- Heart rate -->
                        <label for="heartRate">Heart rate: </label>
                        <input type="number" id="heartRate" name="heartRate" min="0" max="500" value="80" required> bpm (beats per minute)<span class="required"></span><br>

                        <!-- Blood pressure systolic -->
                        <label for="bloodPressureSystolic">Blood pressure(systolic): </label>
                        <input type="number" id="bloodPressureSystolic" name="bloodPressureSystolic" min="0" max="500" value="120" required> mm Hg (lower number)<span class="required"></span><br>

                        <!-- Blood pressure diastolic -->
                        <label for="bloodPressureDiastolic">Blood pressure(diastolic): </label>
                        <input type="number" id="bloodPressureDiastolic" name="bloodPressureDiastolic" min="0" max="500" value="80" required> mm Hg (upper number)<span class="required"></span><br>

                        <!-- Hemoglobin -->
                        <label for="hemoglobin">Hemoglobin: </label>
                        <input type="number" step="0.1" id="hemoglobin" name="hemoglobin" min="0" max="50" value="14.2" required> g/dl (grams per deciliter)<span class="required"></span><br>

                        <!-- Temperature -->
                        <label for="temperature">Temperature: </label>
                        <input type="number" step="0.1" id="temperature" name="temperature" min="0" max="50" value="36.6" required> °C (celsius)<span class="required"></span><br>


                        <!-- Submit -->
                        <input class="reg-button" type="submit"  value="Submit Data" id="submitData" name="submitData">

                        <!-- Reset -->
                        <input class="reg-button-delete" type="reset" value="Reset">

                    </div>

                </form>

            </section>
            <aside>

            <?php include("side_menu.php") ?>



            </aside>

        </div>


    </body>
    
</html>