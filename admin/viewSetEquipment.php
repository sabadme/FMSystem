<?php

if(isset($_REQUEST['viewSetEquipment'])){
	$viewSetEquipment=$_REQUEST['viewSetEquipment'];

  include"admin/connection.php";	
	?>
<div class="manage-container with-banner">
	<strong class="title"><?php echo $viewSetEquipment; ?></strong>

    <div class="manage-inner-container">
    	

        <div class="table-container" id="wrapper">
            <table id='myTable'>
                <thead>
                <th></th>
                <th>Name</th>
                <th>Code</th>
                <th>Registered</th>
                <th>Expiration</th>
                <th>Action</th>
                </thead>

                <tbody>
  <?php
	
	$select_equipmentSet=mysql_query("SELECT * FROM equipmentset WHERE set_name='$viewSetEquipment'");
	while($data_equipment=mysql_fetch_array($select_equipmentSet)){
	$equipment_id=$data_equipment['quipment_id'];
	$set_name=$data_equipment['set_name'];

	$equipment_pic=mysql_query("SELECT * FROM equipment WHERE id='$equipment_id'");
	$data_pic=mysql_fetch_array($equipment_pic);
	$equipment_filename=$data_pic['equipment_filename'];
   $drop_equipment=$data_equipment['drop_equipment'];

  if($drop_equipment=="0"){
  

  }else{
  ?>
  <tr>
    <td data-th="Image"><?php echo "<img style='width: 150px; src='EquipmentPicture/" . $equipment_filename . "'>" ?></td>
    <td><form action="" method="POST">
      <button class="equipment-name" name="equipmentPage" type="submit" value="<?php echo $data_pic['id']; ?>"><u><?php echo $data_pic['equipment_name']; ?></u></button>
      </form>
    </td>
    <td data-th="QR Code"><?php echo $data_pic['equipment_code']; ?></td>
    <td data-th="Date Start"><?php echo $data_pic['equipment_start']; ?></td>
    <td data-th="Date End"><?php echo $data_pic['equipment_end']; ?></td>
    <td data-th="Action"><form action="" method="POST"><button name="drop_equipmentSet" type="submit" value="<?php echo $data_equipment['quipment_id']; ?>">Drop</button></form></td>
  </tr>

  <?php
  }

	

}	
  
?>
                </tbody>
            </table>
           <form action="" method="POST">
           	<button class="action" name="add_new_set" value="<?php echo $viewSetEquipment; ?>">Add New</button>
           	<button class="action" type="submit" name="edit_set_equipment" value="<?php echo $viewSetEquipment; ?>">Edit Set</button>
           </form>
        </div>
    </div>
</div>
<?php
}else if(isset($_REQUEST['add_new_set_function'])){


    $add_new_set_function=$_REQUEST['add_new_set_function'];

  include"admin/connection.php";  
  ?>
<div class="manage-container with-banner">
  <strong class="title"><?php echo $add_new_set_function; ?></strong>

    <div class="manage-inner-container">
      

        <div class="table-container" id="wrapper">
            <table id='myTable'>
                <thead>
                <th></th>
                <th>Name</th>
                <th>Code</th>
                <th>Registered</th>
                <th>Expiration</th>
                <th>Action</th>
                </thead>

                <tbody>
  <?php
  
  $select_equipmentSet=mysql_query("SELECT * FROM equipmentset WHERE set_name='$add_new_set_function'");
  while($data_equipment=mysql_fetch_array($select_equipmentSet)){
  $equipment_id=$data_equipment['quipment_id'];
  $set_name=$data_equipment['set_name'];

  $equipment_pic=mysql_query("SELECT * FROM equipment WHERE id='$equipment_id'");
  $data_pic=mysql_fetch_array($equipment_pic);
  $equipment_filename=$data_pic['equipment_filename'];
   $drop_equipment=$data_equipment['drop_equipment'];

  if($drop_equipment=="0"){
  

  }else{
  ?>
  <tr>
    <td  data-th="Image"><?php echo "<img style='width: 150px; src='EquipmentPicture/" . $equipment_filename . "'>" ?></td>
    <td  data-th="Equipment"><form action="" method="POST">
      <button class="equipment-name" name="equipmentPage" type="submit" value="<?php echo $data_pic['id']; ?>"><u><?php echo $data_pic['equipment_name']; ?></u></button>
      </form>
    <td data-th="QR Code"><?php echo $data_pic['equipment_code']; ?></td>
    <td data-th="Date Start"><?php echo $data_pic['equipment_start']; ?></td>
    <td data-th="Date End"><?php echo $data_pic['equipment_end']; ?></td>
    <td  data-th="Action"><form action="" method="POST"><button name="drop_equipmentSet" type="submit" value="<?php echo $data_equipment['quipment_id']; ?>">Drop</button></form></td>
  </tr>

  <?php
  }

  

} 
  
?>
                </tbody>
            </table>
           <form action="" method="POST">
            <button class="action" name="add_new_set" value="<?php echo $viewSetEquipment; ?>">Add New</button>
            <button class="action" type="submit" name="edit_set_equipment" value="<?php echo $viewSetEquipment; ?>">Edit Set</button>
           </form>
        </div>
    </div>
</div>
<?php

}else if(isset($_REQUEST['drop_equipmentSet'])){


  include"admin/connection.php"; 
    $drop_equipmentSet =$_REQUEST['drop_equipmentSet'];

   $SqlSet =mysql_query("SELECT * FROM equipmentset WHERE quipment_id='$drop_equipmentSet'");
   $dataSet = mysql_fetch_array($SqlSet);
   $setName =$dataSet['set_name'];
 
  ?>
<div class="manage-container with-banner">
  <strong class="title"><?php echo $setName; ?></strong>

    <div class="manage-inner-container">
      

        <div class="table-container" id="wrapper">
            <table id='myTable'>
                <thead>
                <th></th>
                <th>Name</th>
                <th>Code</th>
                <th>Registered</th>
                <th>Expiration</th>
                <th>Action</th>
                </thead>

                <tbody>
  <?php
  
  $select_equipmentSet=mysql_query("SELECT * FROM equipmentset WHERE set_name='$setName'");
  while($data_equipment=mysql_fetch_array($select_equipmentSet)){
  $equipment_id=$data_equipment['quipment_id'];
  $set_name=$data_equipment['set_name'];

  $equipment_pic=mysql_query("SELECT * FROM equipment WHERE id='$equipment_id'");
  $data_pic=mysql_fetch_array($equipment_pic);
  $equipment_filename=$data_pic['equipment_filename'];
   $drop_equipment=$data_equipment['drop_equipment'];

  if($drop_equipment=="0"){
  

  }else{
  ?>
  <tr>
    <td><?php echo "<img style='width: 50px; height: 50px' src='EquipmentPicture/" . $equipment_filename . "'>" ?></td>
    <td><form action="" method="POST">
      <button class="equipment-name" name="equipmentPage" type="submit" value="<?php echo $data_pic['id']; ?>"><u><?php echo $data_pic['equipment_name']; ?></u></button>
      </form>
    </td>
    <td><?php echo $data_pic['equipment_code']; ?></td>
    <td><?php echo $data_pic['equipment_start']; ?></td>
    <td><?php echo $data_pic['equipment_end']; ?></td>
    <td><form action="" method="POST"><button name="drop_equipmentSet" type="submit" value="<?php echo $data_equipment['quipment_id']; ?>">Drop</button></form></td>
  </tr>

  <?php
  }

  

} 
  
?>
                </tbody>
            </table>
           <form action="" method="POST">
            <button class="action" name="add_new_set" value="<?php echo $viewSetEquipment; ?>">Add New</button>
            <button class="action" type="submit" name="edit_set_equipment" value="<?php echo $viewSetEquipment; ?>">Edit Set</button>
           </form>
        </div>
    </div>
</div>
<?php

}
?>