<?php

include '../helpers/dbconfig.php';

$name = $_POST['name'];
$class_id = $_POST['class_id'];


$sql = $db -> query("INSERT INTO student( name , class_id  ) 
VALUES(  '$name' ,  '$class_id'  )");


    header("Location: class-single.php?info=".$class_id);



?>