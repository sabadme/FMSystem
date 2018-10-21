<?php 
if(isset($_REQUEST['generate'])){

$equipment=$_REQUEST['equipment'];
$condition=$_REQUEST['condition'];
$date=$_REQUEST['date'];

//$name="Equipment Name:   ";
//$conditionname="Condition:  ";
//$datename="Date:  ";

//$value=$name.''.$equipment;
//$value1=$conditionname.''.$condition;
//$value2=$datename.''.$date;
$final_value=$equipment.''.$condition.''.$date;
echo "<img src='qr_img.php?d=$final_value'>";
}
  ?>