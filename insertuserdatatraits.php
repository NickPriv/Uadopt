<?php
/*this is the page for inputing in user information only
*/

//connects to the database
//uses the setup.ini file so it will hide my username and password when putting code onto github
//header("Location: https://uadopt.netlify.com/preference_selection.html");

connectToDB();
enterUser();
header('Location: https://uadopt.netlify.com/calculate.html');


function connectToDB(){

        $cfg = parse_ini_file('setup.ini');
        $conn = oci_connect($cfg['db_user'], $cfg['db_pass'],$cfg['db_path']);
        if(!$conn){
                print "<br> connection failed:";
                exit;
        }
        return $conn;
}

function checkEmpty($array)
{
	foreach ($array as $value) {
		if(empty($value)){
			return false;
		}
	}
	return true;
}

function prepareInput($inputData){
    $inputData = trim($inputData);
    $inputData  = htmlspecialchars($inputData);
    return $inputData;
}

function enterUser(){

	if ($_SERVER["REQUEST_METHOD"] == "POST") {  
     // collect input data of the 11 traits for user preferences barking, energy, 
     // intelligence, sheddding, kids, cuddle, temperament, time, training, health,
    //size
	 // the varable name is single quotes must match the name from the html file 
    //$variableFromHtml = array("barking", "energy", "intelligence", "sheddding", "kids", "cuddle", "temperament", "time", "training", "health", "size");
    //print_r($_POST[$variableFromHtml]);
    if (!isset($_POST['barking']))
        {
        $barking = 3;
        } 
    else
        {
        $barking = $_POST['barking'];
        }
    if (!isset($_POST['energy']))
        {
        $energy = 3;
        } 
    else
        {
        $energy = $_POST['energy'];
        }
    if (!isset($_POST['intelligence']))
        {
        $intelligence = 3;
        } 
    else
        {
        $intelligence= $_POST['intelligence'];
        }
    if (!isset($_POST['shedding']))
        {
        $shedding = 3;
        } 
    else
        {
        $shedding= $_POST['shedding'];
        }
    if (!isset($_POST['kids']))
        {
        $kids = 3;
        } 
    else
        {
        $kids= $_POST['kids'];
        }
    if (!isset($_POST['cuddle']))
        {
        $cuddle = 3;
        } 
    else
        {
        $cuddle= $_POST['cuddle'];
        }
    if (!isset($_POST['temperament']))
        {
        $temperament = 3;
        } 
    else
        {
        $temperament= $_POST['temperament'];
        }
    if (!isset($_POST['time']))
        {
        $time = 3;
        } 
    else
        {
        $time= $_POST['time'];
        }
    if (!isset($_POST['training']))
        {
        $training = 3;
        } 
    else
        {
        $training= $_POST['training'];
        }
    if (!isset($_POST['health']))
        {
        $health = 3;
        } 
    else
        {
        $health= $_POST['health'];
        }
    if (!isset($_POST['size']))
        {
        $size = 3;
        } 
    else
        {
        $size= $_POST['size'];
        }

     $userInfo = array(
     			$barking,
     			$energy,
     			$intelligence,
                $shedding,
                $kids,
                $cuddle,
                $temperament,
                $time,
                $training,
                $health,
                $size);
     if(checkEmpty($userInfo)){
     	foreach ($userInfo as $attribute) {
     		prepareInput($attribute);
     	  }
     	insertToDB($userInfo);
        }
     else{
     	echo "Not all the required fields were completed";
        }    			
    }    
}

function insertToDB($userInfo){
	$conn = connectToDB();
    //sql statement that will read into the database
	$sqlStatement = oci_parse($conn, "UPDATE Adopter 
            SET noise = :barking,
                activityLevelDog = :energy,
                intellegence = :intellegence,
                hairShedding = :shedding,
                goodWithKids = :kids,
                cuddly = :cuddle,
                temperment = :temperament,
                timeCommitment = :timeForDog,
                easeToTrain = :training,
                heath = :health,
                userSize = b_size
            WHERE userID = (SELECT MAX(userID) from Adopter);
        ");
    /*binding each variable to the sql statement above with the php variable in the user info array */
    /*barking, energy, intelligence, sheddding, kids, cuddle, temperament, time, training, health, size are temp variables that must match with what is in the  sql statement above */
    oci_bind_by_name($sqlStatement, ':barking', $userInfo[0]);
	oci_bind_by_name($sqlStatement, ':energy', $userInfo[1]); 
	oci_bind_by_name($sqlStatement, ':intelligence', $userInfo[2]);
    oci_bind_by_name($sqlStatement, ':shedding', $userInfo[3]);
    oci_bind_by_name($sqlStatement, ':kids', $userInfo[4]);
    oci_bind_by_name($sqlStatement, ':cuddle', $userInfo[5]);
    oci_bind_by_name($sqlStatement, ':temperament', $userInfo[6]);
    oci_bind_by_name($sqlStatement, ':timeForDog', $userInfo[7]);
    oci_bind_by_name($sqlStatement, ':training', $userInfo[8]);
    oci_bind_by_name($sqlStatement, ':health', $userInfo[9]);
    oci_bind_by_name($sqlStatement, ':b_size', $userInfo[10]);

	$res = oci_execute($sqlStatement);
    if ($res)
        echo '<br><br> <p style="color:green;font-size:20px">Data successfully inserted</p>';
    else{
        $e = oci_error($sqlStatement); 
            echo $e['the data was not inserted']; 
    }  
	oci_free_statement($sqlStatement);
	oci_close($conn);
}

?>
