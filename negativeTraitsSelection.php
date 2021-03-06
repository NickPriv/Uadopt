<!DOCTYPE html>
<html>
    <head>
	<!--Initialize page-->
        <title>Uadopt</title>
        <link href="https://uadopt.netlify.com/overallStyle.css" rel="stylesheet" type="text/css">
        <link href="https://uadopt.netlify.com/logo.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,300,500" rel="stylesheet">
        <script type="text/javascript" src="https://uadopt.netlify.com/searchScript.js"></script>
	
	    
    </head>
	
<body>
        <a href="https://uadopt.netlify.com/index.html">
 		<img src="uadoptLogo.png" id="logo">
	</a>
        <div>
            <h2>The traits of this dog breed have been ranked on a scale of 1 to 5, with 1= low and 5= high.</h2>
            <h2>Please select any boxes with a rank that you would not prefer in your ideal dog.</h2>
            <!-- initialize form -->
	    <form id="frm1">
            <span id="info">
            
	<?php

		    //retrieve user's breed in mind from the URL
            $myurl = $_SERVER['REQUEST_URI'];
            $temp = explode('?', $myurl);
            $breedName = end($temp);
            $addWhiteSpace = str_replace("%20"," ",$breedName);

		//initialize database
            $cfg = parse_ini_file('setup.ini');
            $conn = oci_connect($cfg['db_user'], $cfg['db_pass'],$cfg['db_path']);
            if(!$conn){
                echo "<br> connection failed:";
                exit;
            }
		    
            //get breed info
            $sql = oci_parse($conn, "SELECT breed, photo, description, noise, activityLevelDog, intelligence, hairShedding, goodWithKids, cuddly, temperment, timeCommitment, easeToTrain, health, petSize from Pet where breed = :breedNameSql");
            oci_bind_by_name($sql, ':breedNameSql', $addWhiteSpace);
            $res = oci_execute($sql);


            if(!$res ) {
            die('Could not get data: ');
            }        

            //display breed info
            while(($row = oci_fetch_array($sql, OCI_BOTH)) != false){
                echo "<u><em><strong><font size=\"20\">". $row[0] ."</font></strong></em></u>   <br>" .
                    "<img src=" . $row[1] . " height=112 > <br>" . 
        "<p1>" . $row[2] .
        "</p1>" .
            "<ul>" .
                "<li>Barking level: " . $row[3] . " <input type=\"checkbox\" name=\"barking\" > </li>" .
                "<li>Activity level: " . $row[4] . "  <input type=\"checkbox\" name=\"energy\" > </li>" .
                "<li>Intelligence: " . $row[5] . " <input type=\"checkbox\" name=\"intelligence\");\"> </li>" .
                "<li>Shedding: " . $row[6] . "  <input type=\"checkbox\" name=\"shedding\"> </li>" .
                "<li>Good with kids: " . $row[7] . "  <input type=\"checkbox\" name=\"kids\" > </li>" .
                "<li>Cuddliness: " . $row[8] . "  <input type=\"checkbox\" name=\"cuddle\" > </li>" .
                "<li>Temperament: " . $row[9] . "  <input type=\"checkbox\" name=\"temperament\"> </li>" .
                "<li>Time commitment: " . $row[10] . "  <input type=\"checkbox\" name=\"time\" > </li>" .
                "<li>Easy to train: " . $row[11] . "  <input type=\"checkbox\" name=\"training\"> </li>" .
                "<li>Health: " . $row[12] . "  <input type=\"checkbox\" name=\"health\" > </li>" .
                "<li>Size: " . $row[13] . "  <input type=\"checkbox\" name=\"size\"> </li>" .                  
            "</ul>" ;
            }

      ?>

            </span>     
            </form>  
        </div> 
	<!-- button runs selectInitialTraits to store responses and call the next page-->
        <button type="button" class="button" onclick="selectInitialTraits()">Next</button> 
	</body>
    
</html>
