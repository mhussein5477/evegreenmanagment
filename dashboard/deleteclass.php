<?php 

include '../helpers/dbconfig.php';

$classid = $_GET['info'];



$sql1 = $db -> query("DELETE FROM class WHERE id  = '$classid' ");
$sql2 = $db -> query("DELETE FROM student WHERE class_id = '$classid' ");
$sql2 = $db -> query("DELETE FROM balances WHERE class_id = '$classid' ");




?>

 <script>
		        alert('Deleted a class');   
		        window.location.pathname="schoolmanagement/dashboard/dashboard.php";
		    </script>
