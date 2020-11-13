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
</head>
<body>


	<?php

	include '../helpers/dbconfig.php';
	$student_id = $_GET['info'];
	$class_id = $_GET['info1'];
	$totalbalance = $_GET['info2'];
    $sql = $db->query("SELECT * FROM student WHERE id =  '$student_id'  ");
	$student_details = mysqli_fetch_assoc($sql);

	$payment = $db->query("SELECT * FROM payments WHERE student_id =  '$student_id' ORDER BY id DESC   ");

?>

<section style="margin-bottom: 1%;">
			<div class="navbar" >
			<?php include 'navbar.php'; ?>
		
</section>


<section>
	<?php 

  $class_details = $db->query("SELECT * FROM class WHERE id = '$class_id' ");
   $details = mysqli_fetch_assoc($class_details);

	?>
	<div style="background-color: #F1F1F1; padding-left:  5%; padding-bottom: 1%; padding-top: 1%; margin-left: 5%; margin-right: 5%">
		<h7><a href="dashboard.php" style="text-decoration: none;color: black">Home </a>  / 
			<a href="class-single.php?info=<?= $class_id ?>" style='text-decoration: none;color: black'><?php echo $details['name'] ?></a>  

			/ <?= $student_details['name'] ?>


		</h7>
		
		
	</div>
</section>




<!-- student details ------------------------------------------------------------>
<section>
	<div class="row" style="width: 100%">
		<div class="col">
			<div style="padding: 1%; margin-left: 10%; border: 2px solid #BABABA; border-radius: 10px; width: 90%; margin-top: 3%; padding-bottom: 2%">
			<div class="row" style="width: 100%">
				<div class="col-4">
						<img src="../images/student.png" style="width: 80%; margin:10%">
			   </div>
			<div class="col-6">
						<h5 style="margin-left: 0%; margin-top: 1%; font-style: italic">Admission No : <?php echo $student_id ; ?></h5>
				<h5 style="margin-top: 10%"><i class="fa fa-user" aria-hidden="true" style="margin-right: 10%;  font-size:  20px; color: green; margin-left: 5%"></i><?= $student_details['name'] ?></h5>

				<h5 style="color: green"><img src="../images/class1.png" style="width: 13% ; margin-right: 5%"><?php echo $details['name'] ?></h5>
				<h5><i class="fa fa-usd" aria-hidden="true" style="margin-right: 10%; font-size:  20px; color: green; margin-left: 5%"></i>Total Balance : <?php echo $totalbalance; ?> </h5>
				<?php 

				if ($totalbalance == NULL ) { ?>
					<button  onclick="document.getElementById('id05').style.display='block'" style="margin-top: 0%; margin-bottom: 2%; margin-left: 55%;margin-top: -13%" class="btn btn-info" > <span class="fa fa-plus" ></span> Add Fees</button>
          <?php include 'addfees.php'; ?> 
					
				<?PHP }


				?>

				
			</div>
			</div>
			</div>

		</div>

		<div class="col-md-auto">
				<div style="margin-left: 5%">
						<br>
					<?php
					$namereport = $student_details['name'];
						$reportbook = $db -> query("SELECT * FROM reportbooks WHERE name = '$namereport' ");
					 ?>
					<font style="color: blue; font-style: italic;">Report Book</font>
					 <table class="table" style="width: 50%">	
					 <thead>
	 
					 	<tr>
					 		<th>Grade</th>
					 		<th>Term</th>
					 		<th>Amount</th>
					 	</tr>				 	
					 </thead> 
					 	     <?php  while ($reportdetails = mysqli_fetch_assoc($reportbook)): ?> 
					 	<tr>
					 		<td><?=  $reportdetails['grade'] ?></td>
					 		<td><?= $reportdetails['term'] ?></td>
					 		<td><?= $reportdetails['amount'] ?></td>
					 	</tr>
					 	    <?php endwhile; ?>
					 </table>

					 


				</div>
		</div>

		<div class="col col-lg-2">
			<br>
			<?php
					$namereport = $student_details['name'];
						$pe = $db -> query("SELECT * FROM pe WHERE name = '$namereport' ");
					 ?>
					<font style="color: red; font-style: italic;">PE Uniform</font>
					 <table class="table" style="width: 50%">	
					 <thead>
	 
					 	<tr>
					 		<th>Grade</th>
					 		<th>Term</th>
					 		<th>Amount</th>
					 	</tr>				 	
					 </thead> 
					 	     <?php  while ($pedetails = mysqli_fetch_assoc($pe)): ?> 
					 	<tr>
					 		<td><?=  $pedetails['grade'] ?></td>
					 		<td><?= $pedetails['term'] ?></td>
					 		<td><?= $pedetails['amount'] ?></td>
					 	</tr>
					 	    <?php endwhile; ?>
					 </table>
			
		</div>
	</div>
	

</section>







<!-- Payment Details --------------------------------->
<section>
	<center>
	
		<button class="btn btn-outline-success  py-2 px-5" onclick="document.getElementById('id04').style.display='block'" style="margin-top: 5%"> <i class="fa fa-usd"> </i> <i>Add New Payments</i> </button>
<br>
				<?php include 'newpayments.php'; ?>

	<h4 style="margin-top: 3%; color: green ; font-style: italic">Payment History</h4>
	  <table class="table" style="margin-top: 1%; width: 50%; margin-bottom: 10%">
  <thead>
    <tr>
     
     <th>Receipt No</th>
      <th>Amount Paid</th>
      <th>Balance</th>
 		 <th>Payment Details</th>
  
    </tr>
  </thead>
  <tbody>

  <?php  while ($studentpayment = mysqli_fetch_assoc($payment)): ?> 
    <tr>
   		<td><?= $studentpayment['id'] ?></td>
    	<td><?= $studentpayment['amount_paid'] ?></td>
    	<td><?= $studentpayment['balance'] ?></td>

     	<td><a href="reciept.php?info=<?= $studentpayment['balances_id']?>&info1=<?= $studentpayment['amount_paid'] ?>&info2=<?= $studentpayment['balance'] ?>&info3=<?= $studentpayment['student_id'] ?>&info4=<?= $studentpayment['id'] ?> "><button class="btn btn-info">View</button>
     		</a></td>
    	

    </tr>

    <?php endwhile; ?>




  </tbody>
</table>
	</center>
</section>



</body>
</html>