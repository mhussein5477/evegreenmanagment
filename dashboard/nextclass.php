<?php
include '../helpers/dbconfig.php';

$newclass = $_POST['newclass'];
$oldclass = $_POST['oldclass'];

$sql = $db->query("
	UPDATE student SET 
	class_id  = '$newclass'

	 WHERE class_id = '$oldclass' ");



	echo "<script>
				alert('Successfully Proceeded to the next class');
				window.location.href='dashboard.php';
		  </script>";


?>