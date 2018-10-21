<?php 
if(isset($_REQUEST['add_new_set'])){
    $add_new_set=$_REQUEST['add_new_set'];

 ?>
<div class="manage-container">
    <div class="table-container" id="wrapper">
            <form action="" method="POST">
            <table>
                <thead>
                <th></th>
                <th>Code</th>
                <th>Name</th>
                <th>Registered</th>
                <th>Expiration</th>
                </thead>

                <tbody>
            <?php include"admin/set_equipment_table.php"; ?>
                </tbody>
            </table>
            <button name="add_new_set_function" type="submit" value="<?php echo $add_new_set; ?>">Add</button>
            </form>
        </div>
</div>
<?php 
}
 ?>
