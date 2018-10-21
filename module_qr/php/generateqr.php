<!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 <form action="generateqr.php" id="form1" method="POST" name="form1">
 	<input type="text" name="equipment" placeholder="Equipment name">
 	<input type="text" name="condition" placeholder="Condition">
 	<input type="date" name="date">
 	<input type="submit" name="generate">
 </form>	
 </body>
 </html>	
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
$value = "<img src='qr_img.php?d=$final_value'>";
echo $value;
}
  ?>


