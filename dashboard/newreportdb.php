<?php

include '../helpers/dbconfig.php';

$name = $_POST['name'];
$amount = $_POST['amount'];
$grade = $_POST['class'];
$term = $_POST['term'];





$sql = $db -> query("INSERT INTO reportbooks( name , amount , grade , term   ) 
VALUES(  '$name' , '$amount'  , '$grade' , '$term'  )");


  



?>

 <script>
		        alert(' Successfully added report book ');   
		        window.location.pathname="schoolmanagement/dashboard/report-books.php";
		    </script>