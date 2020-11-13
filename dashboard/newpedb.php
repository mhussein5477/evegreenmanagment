<?php

include '../helpers/dbconfig.php';

$name = $_POST['name'];
$amount = $_POST['amount'];
$grade = $_POST['class'];
$term = $_POST['term'];





$sql = $db -> query("INSERT INTO pe( name , amount , grade , term   ) 
VALUES(  '$name' , '$amount'  , '$grade' , '$term'  )");


  



?>

 <script>
		        alert(' Successfully added a pe uniform ');   
		        window.location.pathname="schoolmanagement/dashboard/peuniform.php";
		    </script>