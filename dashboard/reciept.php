<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/animated.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>

		<?php

	include '../helpers/dbconfig.php';
	$balance_id = $_GET['info'];
	$amount_paid = $_GET['info1'];
	$balance_for_amountpaid = $_GET['info2'];
	$student_id = $_GET['info3'];
	$receipt_no = $_GET['info4'];

	$sql = $db -> query("SELECT * FROM balances WHERE id = '$balance_id' ");
	$sql_details = mysqli_fetch_assoc($sql);


	$class_id = $sql_details['class_id'];
	$grade = $db -> query("SELECT * FROM class WHERE id = '$class_id' ");
	$grade_details =  mysqli_fetch_assoc($grade);


	$sql1 = $db -> query("SELECT * FROM student WHERE id = '$student_id' ");
	$sql1_details =  mysqli_fetch_assoc($sql1);

	$sql2 = $db -> query("SELECT sum(amount_paid) as totalamountpaid FROM payments WHERE balances_id = '$balance_id' ");
	$sql2_details =  mysqli_fetch_assoc($sql2);
   

?>

	<section>

		<a onclick="printDiv('printableArea')" ><button style="margin-top: 5%; float: right; margin-right: 10%" class="btn btn-danger">Print this Document</button></a><br>	
	</section>

	<section id="printableArea">
		<div style="margin-top: 10%; padding-left: 5%; padding-right: 5%; padding-top: 3%; padding-bottom: 3%; border: 1px solid grey; margin-left: 0% ; margin-right: 0%">	
			<h4 style="color: green; text-align: center;">EVERGREEN NURSERY AND PRIMARY SCHOOL</h4>
			<u><h5 style="text-align: center; font-style: italic;margin-top: 1%; margin-bottom: 3%">Fees Receipt Details</h5></u>
			<h6 style="float: right; margin-right: 5%">Receipt No : <?php echo  $receipt_no ; ?></h6>
			<h5>Name : <font style="font-size: 22px; margin-left: 2%"><?php echo $sql1_details['name']; ?> </font> </h5> 
		 <h5>Term Paid : <font style="font-size: 22px; margin-left: 2%"><?php echo $sql_details['term'].'--'.$sql_details['month']; ; ?></font>  </h5>	
			<h5>Grade Paid For : <font style="font-size: 22px; margin-left: 2%">  <?php echo 	$grade_details['name']; ?></font></h5>
			
			<h5 style="margin-top: 5%">Amount paid : <font style="font-size: 22px; margin-left: 2%; "> ksh <?php echo 	$amount_paid; ?></font></h5>
		<h5>Total amount Paid to Date :<font style="font-size: 22px; margin-left: 2%"> ksh <?php echo $sql2_details['totalamountpaid']; ?></font> </h5>	
		<h5>Balance : <font style="font-size: 22px; margin-left: 2%"> ksh <?php  echo $balance_for_amountpaid ?></font></h5>	

		<h6 style="margin-top: 5%">Date : ______________________________________________________  Name : _____________________________________________________________
			<br><br><br>Stamp : ________________________________________________</h6>
		This document is electronicaly generated , hence legal rights of use by The Head of Evergreen primary and Nursery School.
		</div>
	</section>

</body>

<script type="text/javascript">
	function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>

</html>