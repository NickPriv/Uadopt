<html>
<head>
	<!-- Initialize page-->
	<title>Search Breeds</title>
	<link href="https://uadopt.netlify.com/overallStyle.css" rel="stylesheet" type="text/css">
        <link href="https://uadopt.netlify.com/logo.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,300,500" rel="stylesheet">
	<script src="https://uadopt.netlify.com/searchScript.js"></script>
</head>
<body>
	<a href="https://uadopt.netlify.com/index.html">
 		<img src="uadoptLogo.png" id="logo">
	</a>
	<p> Please select the checkbox next to dog you are interested in and then click the continue button. </p>
	<div id="searchbar" class id= "searchbar">
		<input type="text" id="myInput" style= "width: 300px; font-size:18pt;" onkeyup="search()" placeholder="Search for breeds...">
		<span id="selected"></span>
	</div>
	<div class="continue" align="right">
		<button type="button" class="button" onclick="send()">Continue</button>
	</div>
	
	<!-- initialize table and form-->
	<div class="search_table">
		<form id="frm1">
		<table id="myTable">

	<?php
	//display breeds and breed photos
	  $cfg = parse_ini_file('setup.ini');
            $conn = oci_connect($cfg['db_user'], $cfg['db_pass'],$cfg['db_path']);
            if(!$conn){
                echo "<br> connection failed:";
                exit;
            }
            $sql = oci_parse($conn, "SELECT photo, breed FROM pet ORDER BY breed");
            $res = oci_execute($sql);


            if(!$res ) {
            die('Could not get data: ');
            }        

            //display checkboxes next to each breed
            while(($row = oci_fetch_array($sql, OCI_BOTH)) != false){
                echo "<tr>
                    <td><img src=". $row[0] . "></td>
                    <td>". $row[1] . "</td>
                    <td><input type='checkbox' name='". $row[1] ."' value='". $row[1] ."' class='mycheckbox' onclick='updateCheckboxes('". $row[1] ."');'></td>
                    <span class='checkmark'></span>
                     </tr>";
            }

	  ?>

	</table>
	</form>
</div>
</body>
</html>


