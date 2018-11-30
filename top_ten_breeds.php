<html>
<head>
	<link href="https://uadopt.netlify.com/overall_style.css" rel="stylesheet" type="text/css">
        <link href="https://uadopt.netlify.com/logo.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,300,500" rel="stylesheet">
    <script src="https://uadopt.netlify.com/search_script.js"></script>
</head>
<body>
    <a href="https://uadopt.netlify.com/index.html">
        <img src="uadoptLogo.png" id="logo">
	<?php

	$cfg = parse_ini_file('setup.ini');
    $conn = oci_connect($cfg['db_user'], $cfg['db_pass'],$cfg['db_path']);
    if(!$conn){
        echo "<br> connection failed:";
        exit;
    }
    $sqlUserdata = oci_parse($conn, "SELECT userID, noise, activityLevelDog, intelligence, hairShedding, goodWithKids, cuddly, temperment, timeCommitment, easeToTrain, health, userSize, name FROM Adopter WHERE userID = (SELECT MAX(userID) from Adopter)");
    $res = oci_execute($sqlUserdata);


    if(!$res ) {
    	die('Could not get data: ');
    }        

    //if statement to see if data is full 


    while(($row = oci_fetch_array($sqlUserdata, OCI_BOTH)) != false){
        $userTraits = array($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11]);
        echo "<h1>".$row[12].", here are your top 5 compatible breeds: </h1>";
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
	for ($i = 1; $i<=11; $i++)
	{
		$matchIndex=0; 
		if (abs($userTraits[$i] - $rowPetTraits[$i]) > 0)
		{
 			$matchIndex+= abs($userTraits[$i] - $rowPetTraits[$i])+ abs($userTraits[$i] - $rowPetTraits[$i])-1;
		}
	}   

	$sqlMatch = oci_parse($conn, "INSERT INTO Match values(:userId, :breed, :matchPercentage)");
	oci_bind_by_name($sqlMatch, ':userId', $userTraits[0]);
    oci_bind_by_name($sqlMatch, ':breed', $rowPetTraits[0]);
    oci_bind_by_name($sqlMatch, ':matchPercentage', $matchIndex);
    $res = oci_execute($sqlMatch);
    }
    
    

    $sqlGetMatch = oci_parse($conn, "SELECT breed FROM match 
    WHERE userID = (SELECT MAX(userID) from Adopter) 
    ORDER BY matchpercentage asc");
    $resMatch = oci_execute($sqlGetMatch);

    for($x = 1; $x <= 5; $x++) {
        if (($rowMatch = oci_fetch_array($sqlGetMatch, OCI_BOTH)) != false)
        {
            echo "<p> Dog ".$x. ": " . $rowMatch[0]. "</p>";
        }
    }
 
     /*while(($rowMatch = oci_fetch_array($sqlGetMatch, OCI_BOTH)) != false){
        echo "<p> Dog ".$counter.": " . $rowMatch[0]. "</p>";
        $counter++;
    }*/



    


	?>
</p>
	<button type="button" class="button" onclick="location.href='https://uadopt.netlify.com/most_important_traits_selection.html';">Adjust preferences</button><br><br>
	</body>
</html>
