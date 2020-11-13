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
<style type="text/css">
    body{
        font-family: Arail, sans-serif;
    }
    /* Formatting search box */
    .search-box{
        width: 300px;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .search-box input[type="text"]{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
    }
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        background-color: white;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result p:hover{
        background: #f2f2f2;
    }
</style>

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

<body>

	<?php

	include '../helpers/dbconfig.php';
	$class_id = $_GET['info'];
   $sql = $db->query("SELECT * FROM student WHERE class_id =  '$class_id'  ");
	$no_item = 	mysqli_num_rows ( $sql );

	


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
			<a href="" style='text-decoration: none;color: black'><?php echo $details['name'] ?></a>  




		</h7>
		
		
	</div>
</section>






<!-- Search area and proceeding to next class and add button with print ---------------------------->
<section >
  
<!-- <div class="search" style="float: right; margin-top: 1% ; margin-right: 5%" >
           <form action="studentresult.php" method="post" class="form-inline" >
              <input type="text" name="class_id" value="<?php echo $class_id  ?>" style="visibility: hidden">
             <div class="search-box">
        <input type="text" autocomplete="off" placeholder="Search Student " name="entry" style="" />
        <div class="result"></div>
      </div>
              
                <button type="submit" class="btn btn-info" id="label" style="margin-left: 0%"><i class="fa fa-search"></i></button>
                   
            </form>
    </div>-->
    <br>
 <form style="float: right;  margin-top: -0.5%" action="nextclass.php" method="post" onsubmit="return confirm('Are you sure you want to proceed this class ( Have you made a new class for the next class so as not to mix them !!! )')" >
  <?php 
  $availableclasses = $db->query("SELECT * FROM class WHERE id != '$class_id' "); 

  ?>
     <font style="color: grey">Proceed this class to:</font> 

      <select class="form-group" name="newclass" style="padding: 1%">
      <?php  while ($classestogo = mysqli_fetch_assoc($availableclasses)): ?> 
        <option value="<?= $classestogo['id'] ?>"><?= $classestogo['name'] ?></option>
      <?php endwhile; ?>
      </select>
      <input type="submit" class="btn btn-info py-1" name="">
      <input type="text" name="oldclass" value="<?php echo $class_id ?>" style="visibility: hidden;">
    </form>
		<div class="container" style="margin-top: 0%">
		
		<center>
      <img src="../images/class1.png" style="margin-left: 27%">
	 <h4 style="text-align: center; margin-top: 0.5%"><?php echo $details['name'] ?> ( <font style="color: green"> <?php echo $no_item; ?> Students</font> )</h4>
			<button class="btn btn-outline-success  py-2 px-5" onclick="document.getElementById('id02').style.display='block'" style="margin-top: 4%"> <span class="fa fa-plus" ></span> Add New Student</button>
<br>
				<?php include 'addstudent.php'; ?>


				

		</center>
  </section>








<!-- Table area  ---------------------------------------------->
  <section id="printableArea" style="margin-top: 2%" >
    <a  onclick="printDiv('printableArea')" style="float: right; margin-right: 25%; "><button class="btn btn-danger"><span class="fa fa-print" ></span> Print</button></a>


    <center>
      <button class="btn btn-success  py-2 px-4" onclick="document.getElementById('id03').style.display='block'" style="margin-right: 7%">Add  New-Term Balance</button>
      <?php  include 'newbalances.php'; ?>

    <br>
    <table class="table" style="margin-top: -1%; width: 50%; margin-bottom: 10%">
  <thead>
    <tr>
      <th>Admission no</th>
      <th scope="col">Name</th>
      <th>Total Fee Balance</th>
      <th>View</th>
  
    </tr>
  </thead>
  <tbody>

     <?php  while ($student = mysqli_fetch_assoc($sql)): ?> 
       <?php
      $singlestudent_id =  $student['id'];
      $totalbalance = $db -> query("SELECT sum(amount) as totalpending FROM balances WHERE student_id = '$singlestudent_id' ");
      $totalbalanceamount = mysqli_fetch_assoc($totalbalance);
      ?>
    
    <tr>
      <td><b><?= $student['id'] ?></b></td>
      <td><?= $student['name'] ?></td> 

      <td><?php 


       $checkifnew =  $totalbalanceamount['totalpending'];
       if ($checkifnew == NULL) {
          ?>  New Student View to add fees
       <?php 
            } else{?>
              <?= $totalbalanceamount['totalpending'] ?>
          
          <?php }


        ?> </td>
   
        <td><a href="student-single.php?info=<?= $student['id']?>&info1=<?= $student['class_id'] ?>&info2=<?= $checkifnew   ?>"><button class="btn btn-success">View</button></a></td>
   
        
    </tr>

    <?php endwhile; ?>

  </tbody>
</table>
    </center>
    
  
    
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

<script>
    function ConfirmDelete()
    {
      var x = confirm("Are you sure you want to proceed this class  ?");
      if (x)
          return true;
      else
        return false;
    }
</script>    

</html>