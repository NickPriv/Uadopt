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
    $sqlUserdata = oci_parse($conn, "SELECT noise, activityLevelDog, intelligence, hairShedding, goodWithKids, cuddly, temperment, timeCommitment, easeToTrain, health, userSize FROM Adopter WHERE userID = (SELECT MAX(userID) from Adopter)");
    $res = oci_execute($sql);


    if(!$res ) {
    	die('Could not get data: ');
    }        

            
    while(($row = oci_fetch_array($sql, OCI_BOTH)) != false){
        $userTraits = array($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10]);
    }

    echo $row[0];




	?>
</p>
	</body>
</html>
