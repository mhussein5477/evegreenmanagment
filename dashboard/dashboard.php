<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
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

  $sql = $db->query("SELECT * FROM class");

?>



	<section style="margin-bottom: 1%;">
			<div class="navbar" >
			<?php include 'navbar.php'; ?>
		
	</section>




  <section>

    <div class="container" style="margin-top: 2%">
    
    <center>
   
      <button class="btn btn-outline-success  py-2 px-4" onclick="document.getElementById('id01').style.display='block'" style="margin-top: 2%"> <span class="fa fa-plus" ></span>  Add New Grade</button>

        <?php include 'addclass.php'; ?>
      <a href="allstudents.php"> <button class="btn btn-info  py-2 px-5" style="margin-top: 2%">All Students</button></a>

    </center>

      
    <div class="row" style="margin-bottom: 5%">

 <?php  while ($class = mysqli_fetch_assoc($sql)): ?> 
      <div class="box" style="width: 30%; padding: 3%; text-align: center;  box-shadow: 1px 1px 5px grey; margin-left: 3%; margin-top: 3%; border-radius: 2px; border-radius: 5px">
      <a href="deleteclass.php?info=<?= $class['id'] ?>" title="delete" class="delete" onclick="return confirm('Are you sure you want to delete this class')" style="color: red; font-size: 20px">  
      <span class="fa fa-trash" style="margin-left: 95%; " ></span>
    </a>
      <br>
          <a href="class-single.php?info=<?= $class['id'] ?>" style="color: black; text-decoration: none">
          <img src="../images/class1.png" style="width: 70%">
      <h4 style="margin-top: 8%; color: green"><?= $class['name']?></h4>
      </a>

        </div>

<?php endwhile; ?>

 
</div>
  
  </section>



</body>
<script>
    function ConfirmDelete()
    {
      var x = confirm("Are you sure you want to delete?");
      if (x)
          return true;
      else
        return false;
    }
</script>   





		
		


 

</html>