<?php


connectToDB();
enterUser();
pagedirection();


function pagedirection()
{

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{

	//goes to breed search 

	if(isset($_POST['Yesbutton']))
	{
		header('Location: https://uadopt.netlify.com/breed_search.html');
	}
	//goes to most important traits selection
	else 
	{
		header('Location: https://uadopt.netlify.com/most_important_traits_selection.html');
	}
}


}


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
		if($value == NULL){
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
     // collect input data of the 11 characteristics of personal information
	 // the varable name is single quotes must match the name from the html file 
    
	print_r($_POST['name']);
	echo '<br/>';
    print_r($_POST['age']);
    echo '<br/>';
    print_r($_POST['marital']);
    echo '<br/>';
    print_r($_POST['home']);
    echo '<br/>';
    print_r($_POST['backyard']);
    echo '<br/>';
    print_r($_POST['children']);
    echo '<br/>';
    print_r($_POST['income']);
    echo '<br/>';
    print_r($_POST['activity']);
    echo '<br/>';
    print_r($_POST['time']);
    echo '<br/>';
    print_r($_POST['experience']);
    echo '<br/>';
    

     $userInfo = array(
     			$name = $_POST['name'],
     			$age = $_POST['age'],
     			$marital = $_POST['marital'],
     			$home = $_POST['home'],
     			$backyard = $_POST['backyard'],
     			$children = $_POST['children'],
     			$income = $_POST['income'],
     			$activity = $_POST['activity'],
     			$timeToSpend = $_POST['time'],
     			$experience = $_POST['experience']);

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
	$sqlStatement = oci_parse($conn, "INSERT INTO Adopter Values(sequence_1.nextval, :name, :age, :marital, :home, :backyard, :children, :income, :activity, :timeToSpend, :experience, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ");
    /*binding each variable to the sql statement above with the php variable in the user info array */
    oci_bind_by_name($sqlStatement, ':name', $userInfo[0]);
    oci_bind_by_name($sqlStatement, ':age', $userInfo[1]);
    oci_bind_by_name($sqlStatement, ':marital', $userInfo[2]);
 	oci_bind_by_name($sqlStatement, ':home', $userInfo[3]);
 	oci_bind_by_name($sqlStatement, ':backyard', $userInfo[4]);
 	oci_bind_by_name($sqlStatement, ':children', $userInfo[5]);
 	oci_bind_by_name($sqlStatement, ':income', $userInfo[6]);
 	oci_bind_by_name($sqlStatement, ':activity', $userInfo[7]);
 	oci_bind_by_name($sqlStatement, ':timeToSpend', $userInfo[8]);
 	oci_bind_by_name($sqlStatement, ':experience', $userInfo[9]);

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
