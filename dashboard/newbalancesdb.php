<?php 

include '../helpers/dbconfig.php';

$amount = $_POST['amount'];
$term = $_POST['Term'];
$month = date('Y-m', strtotime($_POST['month']));

$class_id = $_POST['class_id'];






$sql1= $db->query("SELECT * FROM student where class_id = '$class_id' ");

while ($students = mysqli_fetch_assoc($sql1)){
$student_id = $students['id'];
$sql2 = $db->query("INSERT INTO balances ( student_id , class_id , amount , term , month  )
					VALUES( '$student_id' , '$class_id' , '$amount' , '$term' , '$month'  )
	");
}

	




header("Location: class-single.php?info=".$class_id);


?>