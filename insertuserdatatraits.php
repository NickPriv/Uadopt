<?php
/*this is the page for inputing in user information only
*/

//connects to the database
//uses the setup.ini file so it will hide my username and password when putting code onto github
//header("Location: https://uadopt.netlify.com/preference_selection.html");

echo "does it get to this page after the presference selection";
echo "this should come up";
connectToDB();
enterUser();


function connectToDB(){

        echo "<p>this is in the connectToDB funciton</p>";
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
    echo "<p>this is in the check empty </p>";
	foreach ($array as $value) {
		if(empty($value)){
			return false;
		}
	}
	return true;
}

function prepareInput($inputData){
    echo "<p>this is in the prepareInput </p>";
    $inputData = trim($inputData);
    $inputData  = htmlspecialchars($inputData);
    return $inputData;
}

function enterUser(){

    echo "<p>this is in the enter user </p>";
    print_r($_SERVER["REQUEST_METHOD"]);
	if ($_SERVER["REQUEST_METHOD"] == "POST") {  
     // collect input data of the 11 traits for user preferences barking, energy, 
     // intelligence, sheddding, kids, cuddle, temperament, time, training, health,
    //size
	 // the varable name is single quotes must match the name from the html file 
    echo "<p>before the if loop</p>";
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
    if (!isset($_POST['energy']))
        {
        $energy = 3;
        } 
    else
        {
        $energy = $_POST['energy'];
        }
    print_r($barking);
    print_r($energy);

    echo "after the if loop";
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
     echo "<p>this after the array part</p>";
     if(checkEmpty($userInfo)){
     	foreach ($userInfo as $attribute) {
     		prepareInput($attribute);
     	  }
     	insertToDB($userInfo);
    echo "<p>this is after the data is suposed to be passed </p>";
        }
     else{
     	echo "Not all the required fields were completed";
        }    			
    }    
}

function insertToDB($userInfo){
	$conn = connectToDB();
    echo "got into the insertto db";
    //sql statement that will read into the database
	$sqlStatement = oci_parse($conn, "INSERT INTO Adopter Values(100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, :barking, :energy, :intelligence, :sheddding, :kids, :cuddle, :temperament, :timeForDog, :training, :health, :size) ");
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
