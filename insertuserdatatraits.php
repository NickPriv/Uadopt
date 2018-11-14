<?php
/*this is the page for inputing in user information only
*/

//connects to the database
//uses the setup.ini file so it will hide my username and password when putting code onto github

echo "does it get to this page after the presference selection";
connectToDB();
enterUser();


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
     $userInfo = array(
     			$barking = $_POST['barking'],
     			$energy = $_POST['energy'],
     			$intelligence = $_POST['intelligence'],
                $shedding = $_POST['shedding'],
                $kids = $_POST['kids'],
                $cuddle = $_POST['cuddle'],
                $temperament = $_POST['temperament'],
                $timeForDog = $_POST['time'],
                $training = $_POST['training'],
                $health = $_POST['health'],
                $size = $_POST['size']);
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
	$sqlStatement = oci_parse($conn, "INSERT INTO Pet Values(100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, :barking, :energy, :intelligence, :sheddding, :kids, :cuddle, :temperament, :timeForDog, :training, :health, :size) ");
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
    oci_bind_by_name($sqlStatement, ':size', $userInfo[10]);

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