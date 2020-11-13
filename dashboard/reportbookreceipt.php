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
	$report_id = $_GET['info'];
	$sql = $db -> query("SELECT * FROM reportbooks WHERE id = '$report_id' ");
	$receipt =  mysqli_fetch_assoc($sql);


?>
</body>

	<section>

		<a onclick="printDiv('printableArea')" ><button style="margin-top: 5%; float: right; margin-right: 10%" class="btn btn-danger">Print this Document</button></a><br>	
	</section>

<section id="printableArea">
	<div style="margin-top: 10%; padding-left: 5%; padding-right: 5%; padding-top: 3%; padding-bottom: 3%; border: 1px solid grey; margin-left: 0% ; margin-right: 0%">

		<h4 style="text-align: center; color: green">EVERGREEN NURSERY AND PRIMARY SCHOOL</h4>
		<u><i><h5 style="text-align: center;">Report book receipt</h5></i></u>
		<h6 style="float: right; margin-right: 5%">Receipt No : <?php echo  $report_id ; ?></h6><br>
		<h5>Name : <font style="font-size: 22px; margin-left: 2%; margin-top: 2%"><?php echo $receipt['name']; ?> </font> </h5> 
			 <h5>Term Paid : <font style="font-size: 22px; margin-left: 2%"><?php echo $receipt['term'];  ?></font>  </h5>
			 <h5>Grade Paid For : <font style="font-size: 22px; margin-left: 2%">  <?php echo 	$receipt['grade']; ?></font></h5>
			 <h5 style="margin-top: 5%">Amount paid : <font style="font-size: 22px; margin-left: 2%; "> ksh <?php echo 	$receipt['amount']; ?></font></h5>

			 <h6 style="margin-top: 5%">Date : ______________________________________________________  Name : _____________________________________________________________
			<br><br><br>Stamp : ________________________________________________</h6>
		This document is electronicaly generated , hence legal rights of use by The Head of Evergreen primary and Nursery School.
		</div>
		
	</div>
</section>


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