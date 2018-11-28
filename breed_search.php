<html>
<head>
	<title>Search Breeds</title>
	<link href="overall_style.css" rel="stylesheet" type="text/css">
	<link href="logo.css" rel="stylesheet" type="text/css">
	<script src="https://uadopt.netlify.com/search_script.js"></script>
</head>
<body>
	<a href="index.html">
 		<img src="uadoptLogo.png" id="logo">
	</a>
	<div id="search bar">
	<input type="text" id="myInput" onkeyup="search()" placeholder="Search for breeds...">
	<span id="selected"></span>
	</div>
	<div class="search_table">
	<form id="frm1">
	<table id="myTable">

	<?php

	  $cfg = parse_ini_file('setup.ini');
            $conn = oci_connect($cfg['db_user'], $cfg['db_pass'],$cfg['db_path']);
            if(!$conn){
                echo "<br> connection failed:";
                exit;
            }
            $sql = oci_parse($conn, "SELECT photo, breed FROM pet");
            $res = oci_execute($sql);


            if(!$res ) {
            die('Could not get data: ');
            }        

            
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
<div class="continue">
	<button type="button" class="button" onclick="send()">Continue</button>
</div>
</body>
</html>


