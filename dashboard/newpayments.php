<div>
	 <div id="id04" class="modal" style="color: black">


    <div class="modal-content animated slideInDown">
      <span onclick="document.getElementById('id04').style.display='none'" class="close" title="Close Modal" style="margin-top: 3%;">&times;</span>
     
    
<h5>Payment Details</h5>

      <form style=" margin-top: 2%;"  method="POST" action="newpaymentsdb.php" enctype="multipart/form-data"> 
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Amount Paid" name="amountpaid" style=" width: 50%" required>
        </div>

    
        <select name="balance_id" class="form-control" style="width: 50%">
           <option selected>Choose the Term Paying</option>
          <?php 
          $term_paying =  $db->query("SELECT DISTINCT term , amount , id , month from balances WHERE student_id = '$student_id ' ORDER BY id DESC  ");
          ?>
          <?php  while ($term_payingdetails = mysqli_fetch_assoc($term_paying)): ?> 
          <option value="<?php  echo $term_payingdetails['id'] ?>"><?= $term_payingdetails['term'].' of '.$term_payingdetails['month'].' -------' ?> <?php 
          $paid_pending =  $term_payingdetails['amount'];
          if ($paid_pending <= 0) {
            echo "Paid";
          }else{
            echo "Pending";
          }
           ?> </option>
          }
         <?php endwhile; ?>
        </select>

  <input type="text" name="class_id" value="<?php echo $class_id ?>" style="visibility: hidden;">
  <input type="text" name="student_id" value="<?php echo $student_id  ?>" style="visibility: hidden;">
        
              <br>
              <input type="submit" style="margin-top: 3%;" class="btn btn-success py-2 px-4" >  


 
       </form>


        
      </div>    
    </div>
</div>




<style type="text/css">
  
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0%;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.1); /* Black w/ opacity */
  padding-top: 70px;
 
  padding-left: 20%;
  padding-right:  20%;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 2% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #2ed5a8;
  width: 90%; /* Could be more or less, depending on screen class */
  padding:2%;
height:auto; 

}
/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-class: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

.modal-content input[type=text]{
  font-class: 15px;
  width: 70%;
  position: center;
  text-align: left;
  display:inline-block;
}



@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}
@media(max-width:768px){
  .modal {
    width: 100%;
    margin-left: 0%;
    padding-right: 5%;
    padding-left: 5%;
  }
  }

</style>
