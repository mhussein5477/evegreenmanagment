<?php 

include '../helpers/dbconfig.php';

$amount = $_POST['amount'];
$term = $_POST['Term'];
$month = date('Y-m', strtotime($_POST['month']));

$class_id = $_POST['class_id'];
$student_id = $_POST['student_id'];


$sql = $db->query("INSERT INTO balances ( student_id , class_id , amount , term , month  )
					VALUES( '$student_id' , '$class_id' , '$amount' , '$term' , '$month'  )
	");


	


?>
 <script>
		        alert(' Successfully added a Fees');   
		        window.location.pathname="schoolmanagement/dashboard/dashboard.php";
		    </script>
