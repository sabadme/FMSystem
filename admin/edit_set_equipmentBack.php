<?php 
if(isset($_REQUEST['edit_set_equipment_fucntion']))
{
 ?>

<div class="manage-container registration">
	<strong class="title">Equipments Registration</strong>

    <div class="tabs-container">
      
        
<div class="form-container">
    <div class="inner-form-container">

        <form action="" method="POST" enctype="multipart/form-data">
            <input type="file" name="editsetimg"/>
          
            <input type="text" name="edit_set_name" value="<?php echo $edit_set_equipment; ?>">
           
            <button type="submit" name="edit_set_equipment_fucntion" value="<?php echo $edit_set_equipment; ?>">Update</button>
        </form>
        


        <div class="table-container" id="wrapper">
            <table id='myTable'>
                <thead>
                <th>Code</th>
                <th>Name</th>
                <th>Registered</th>
                <th>Expiration</th>
                </thead>

                <tbody>
             <?php include"admin/set_table.php"; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

      
    </div>
</div>
<?php 
}
 ?>