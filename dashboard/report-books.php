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
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>


	<?php 
	include '../helpers/dbconfig.php';
	$report = $db -> query("SELECT * FROM reportbooks");


	?>



<section style="margin-bottom: 1%;">
			<div class="navbar" >
			<?php include 'navbar.php'; ?>
		
</section>


<section>
	
	<div style="background-color: #F1F1F1; padding-left:  5%; padding-bottom: 1%; padding-top: 1%; margin-left: 5%; margin-right: 5%">
		<h7><a href="dashboard.php" style="text-decoration: none;color: black">Home </a>  / 
			 Report Books 

		</h7>
		
		
	</div>
</section>

<section>
	<center>
		<img src="../images/report.png" style="width: 10%; margin-top: 1%"><br>
		<button class="btn btn-outline-primary  py-2 px-5" onclick="document.getElementById('id06').style.display='block'" style="margin-top: 1.5%"> <i class="fa fa-usd"> </i> <i>Add New Payments</i> </button>
<br>
				<?php include 'newreport.php'; ?>
		 <table class="table" style="margin-top: 1%; width: 50%; margin-bottom: 10%">
  <thead>
    <tr>
     
     <th>Student</th>
      <th>Amount Paid</th>
      <th>Grade</th>
      <th>Term</th>
      <th>Receipt</th>
 		
    </tr>
  </thead>
  <tbody>

  <?php  while ($reportdetails = mysqli_fetch_assoc($report)): ?> 
    <tr>
   		<td><?= $reportdetails['name'] ?></td>
   		<td><?= $reportdetails['amount'] ?></td>
   		<td><?= $reportdetails['grade'] ?></td>
   		<td><?= $reportdetails['term'] ?></td>
   		<td> <a href="reportbookreceipt.php?info=<?= $reportdetails['id'] ?>"><button class="btn btn-info">View</button></a>  </td>

    </tr>

    <?php endwhile; ?>




  </tbody>
</table>
	</center>
</section>

</body>
</html>