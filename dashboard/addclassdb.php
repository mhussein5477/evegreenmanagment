<?php

include '../helpers/dbconfig.php';

$class = $_POST['class'];



$sql = $db -> query("INSERT INTO class( name ) 
VALUES(  '$class' )");
?>
 <script>
		        alert(' Successfully added a class');   
		        window.location.pathname="schoolmanagement/dashboard/dashboard.php";
		    </script>

