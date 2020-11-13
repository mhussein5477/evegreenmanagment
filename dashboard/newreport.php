<div>
	 <div id="id06" class="modal" style="color: black">


    <div class="modal-content animated slideInDown">
      <span onclick="document.getElementById('id06').style.display='none'" class="close" title="Close Modal" style="margin-top: 3%;">&times;</span>
     
    
<h6>Report Book Payment Details</h6>

      <form style=" margin-top: 2%;"  method="POST" action="newreportdb.php" enctype="multipart/form-data"> 


         <div class="search-box">
        <input type="text" autocomplete="off" class="form-control" placeholder="Student name" name="name" style="margin-bottom: 2%" />
        <div class="result"></div>
      </div>


        <div class="form-group">
          <input type="number" class="form-control" placeholder="Amount" name="amount" style=" width: 50%" required>
        </div>

          <select  class="form-control" style="width: 50%" name="class" >
            <?php

            $classes = $db -> query("SELECT * FROM class");

            ?>
             <?php  while ($classesdetails = mysqli_fetch_assoc($classes)): ?> 
              <option value="<?php echo $classesdetails['name']; ?>"><?= $classesdetails['name'] ?></option>
                    <?php endwhile; ?>
          </select>

          <select name="term" class="form-control" style="width: 50% ; margin-top: 2%" >
            <option>1st Term</option>
            <option>2nd Term</option>
            <option>3rd Term</option>
          </select>

        


  
        <br>
              <input type="submit" style="margin-top: 3%;" class="btn btn-primary py-2 px-4" >  


 
       </form>


        
      </div>    
    </div>
</div>

<style type="text/css">
    body{
        font-family: Arail, sans-serif;
    }
    /* Formatting search box */
    .search-box{
        width: 570px;
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
