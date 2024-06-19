
<?php 
    
    if(isset($_SESSION["personData"])): 
        if($personData) {   
        ?>


    <!-- Side bar menu for USER-->
    <div id='isUser' class="mainbody-right">
        <h2> User Menu</h2>

        
            <div ><a href="menu_My_Data.php">My Data</a></div>
            <div ><a href="menu_Record_Data.php">Record Data</a></div>
    </div>
    <br>
    <hr>
    <br>

<?php 
}  
endif; 
?>




