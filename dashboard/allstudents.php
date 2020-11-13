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
	$sql = $db -> query("SELECT * FROM student");
		$no_item = 	mysqli_num_rows ( $sql );


	?>




<section style="margin-bottom: 1%;">
			<div class="navbar" >
			<?php include 'navbar.php'; ?>
		
</section>


<section>
	
	<div style="background-color: #F1F1F1; padding-left:  5%; padding-bottom: 1%; padding-top: 1%; margin-left: 5%; margin-right: 5%">
		<h7><a href="dashboard.php" style="text-decoration: none;color: black">Home </a>  / 
			All students

		</h7>
		
		
	</div>
</section>

<section>
	<center>
		<img src="../images/student.png" style="width: 12%; margin-top: 1%">
		<h4><FONT style="color:green;"><?php echo $no_item; ?></FONT> Students</h4>

		<table class="table" style="width: 50%; margin-top: 1%">
			<thead>
				<tr>
					<th>Name</th>
					<th>Grade</th>
			
				</tr>
			</thead>

<?php  while ($student = mysqli_fetch_assoc($sql)): ?> 
			<tr>
				<td><?= $student['name'] ?></td>
				<td>
					<?php 
					$class_id = $student['class_id'];
					$grade= $db -> query("SELECT * FROM class where id = '$class_id' ");
					$gradename = mysqli_fetch_assoc($grade);
					?>
					<?php echo $gradename['name']; ?>
						

					</td>
			</tr>

<?php endwhile; ?>

			
		</table>
	</center>

</section>


</body>
</html>