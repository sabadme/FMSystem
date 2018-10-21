
<div class="form-container">
    <div class="inner-form-container">

        <form action="" method="POST"  enctype="multipart/form-data">
            <input type="file" name="imgs"/>
            <input type="text" name="equipment_code" value="<?php echo $data_select['equipment_code']; ?>" >
            <input type="text" name="equipment_name" value="<?php echo $data_select['equipment_name']; ?>">
            <input type="date" name="equipment_start" value="<?php echo $data_select['equipment_start']; ?>">
            <input type="date" name="equipment_end" value="<?php echo $data_select['equipment_end']; ?>">
            <button type="submit" name="update_equipment_single" value="<?php echo $data_select['id']; ?>">Update</button>
        </form>
        <div class="generate-container">    
       
        </div>
        

        <div class="table-container" id="wrapper">
            <table>
                <thead>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Registered</th>
                    <th>Expiration</th>
                </thead>

                <tbody>
                    <?php include"admin/equipment_table.php"; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
