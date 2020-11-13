<?php

include '../helpers/dbconfig.php';

$class_id = $_POST['class_id'];
$student_id = $_POST['student_id'];
$amountpaid = $_POST['amountpaid'];

$balances_id = $_POST['balance_id'];

/* 
1.get the fees amount 
2.Substract from the given amount 
3 insert to the payment .
4 get the new balance and update the student table 

 */


$updatenewbalance = $db -> query("
						UPDATE balances  SET 
					amount  = amount - $amountpaid  WHERE id = '$balances_id'
				");

$getnewbalance = $db -> query(" SELECT * FROM balances WHERE student_id = '$student_id' AND class_id = '$class_id' AND id = '$balances_id' ");
$getnewbalancedetails = mysqli_fetch_assoc($getnewbalance);
$pendingbalance = $getnewbalancedetails['amount'];



$addpayment = $db -> query(" INSERT INTO payments( student_id , class_id , balances_id , amount_paid , balance  ) 
								VALUES(  '$student_id' , '$class_id' , '$balances_id' , '$amountpaid' , '$pendingbalance'  ) ");





?>
<script>
		        alert(' Successfully added a payment !!  . Print the receipt to have a physical copy');   
		        window.location.pathname="schoolmanagement/dashboard/dashboard.php";
		    </script>