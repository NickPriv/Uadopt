<html>
<head>
	<link href="overall_style.css" rel="stylesheet" type="text/css">
</head> 
	<body>
<h1> Your top 5 compatible breeds are: </h1>
<p> dog 1 <br>
	dog 2 <br>
	dog 3 <br>
	dog 4 <br>
	dog 5 <br>
	<?php

	$cfg = parse_ini_file('setup.ini');
    $conn = oci_connect($cfg['db_user'], $cfg['db_pass'],$cfg['db_path']);
    if(!$conn){
        echo "<br> connection failed:";
        exit;
    }
    $sqlUserdata = oci_parse($conn, "SELECT userID, activityLevelDog, intelligence, hairShedding, goodWithKids, cuddly, temperment, timeCommitment, easeToTrain, health, userSize FROM Adopter WHERE userID = (SELECT MAX(userID) from Adopter)");
    $res = oci_execute($sqlUserdata);


    if(!$res ) {
    	die('Could not get data: ');
    }        

            
    while(($row = oci_fetch_array($sqlUserdata, OCI_BOTH)) != false){
        $userTraits = array($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10]);
    }

    $sqlPetTraits = oci_parse($conn, "SELECT breed, noise, activityLevelDog, intelligence, hairShedding, goodWithKids, cuddly, temperment, timeCommitment, easeToTrain, health, petSize from Pet");
    $resPetTraits = oci_execute($sqlPetTraits);


    if(!$resPetTraits ) {
    	die('Could not get data: ');
    }        


    //userTraits is the array that hold the userID and 11 traits after it 
    //rowPetTraits is the array that holds the petId and 11 traits after it 
    //the while loop goes through all of the pet rows in the database         
    while(($rowPetTraits = oci_fetch_array($sqlPetTraits, OCI_BOTH)) != false){
        
    }
    




	?>
</p>
	</body>
</html>
