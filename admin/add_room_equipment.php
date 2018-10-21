<div class="form-container">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="inner-form-container">
            <div class="field">
                
               
                   <div class="field"> 
                <label>Room Name: </label>  
             <div class="search-rooms">
        <input type="text" autocomplete="off" placeholder="Search Rooms..." name="Rooms" />
        <div class="result"></div>
    </div>
            </div>          
            </div>
            <div class="table-container" id="wrapper">
                <label>Equipments</label>
                <table>
                    <thead>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th></th>
                    </thead>

                    <tbody>
                    <?php
                  include"admin/connection.php";

                  //get equipment status
                    $equipment_sql = mysql_query("SELECT * FROM equipment ORDER BY id desc");
                    while ($data_equipment = mysql_fetch_array($equipment_sql)) {
                        $status = $data_equipment['status'];
                        $id = $data_equipment['id'];
                        $get_equipmentcode = $data_equipment['equipment_filename'];

                        if ($status == "Unassigned") {  
                               ?>
                            <tr>
                                <td data-th="Image"><?php echo "<img style='width: 150px;' src='EquipmentPicture/" . $get_equipmentcode . "'>" ?></td>
                                <td data-th="Name"><?php echo $data_equipment['equipment_name']; ?></td>
                                <td data-th="QR Code"><?php echo $data_equipment['equipment_code']; ?></td>
                                <td data-th="Select"><input type="checkbox" value="<?php echo $data_equipment['id']; ?>"
                                           name="check_list[]"></td>
                            </tr>
                            <?php
                        } 

                    }   

                    //get set equipment status  

                    $select_set=mysql_query("SELECT DISTINCT set_name FROM equipment WHERE status='Set'");
                    while($data_set=mysql_fetch_array($select_set)){
                        $set_set_name=$data_set['set_name'];

                $select_Setname=mysql_query("SELECT DISTINCT set_name,img_filename,assigned_unassigned FROM equipmentset WHERE set_name='$set_set_name' And assigned_unassigned='Unassigned'");
                        while($data_setname=mysql_fetch_array($select_Setname)){
                        $img_filenames=$data_setname['img_filename'];
                        $set_name=$data_setname['set_name'];


                     $equipmentset_Id=mysql_query("SELECT * FROM equipmentset WHERE set_name='$set_name'");
                        $data_equipmentID=mysql_fetch_array($equipmentset_Id);
                     
                       
 ?>
                            <tr>
                                <td data-th="Image"><?php echo "<img style='width: 150px;' src='EquipmentPicture/" . $img_filenames . "'>" ?></td>
                                <td data-th="Set Name"><?php echo $data_setname['set_name']; ?></td>
                                <td>NOne</td>
                                <td data-th="Select"><input type="checkbox" value="<?php echo $data_equipmentID['id']; ?>" name="check_list[]"></td>
                            </tr>
                            <?php
                    

                       }
                    }

                    ?>
                    </tbody>
                </table>
            </div>

            <button style="margin-top: 20px;" class="action" name="save_room" type="submit">Save</button>
        </div>
    </form>
</div>
<script type="text/javascript">

//ROOMS SEARCH  

$(document).ready(function(){
    $('.search-rooms input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("admin/room_search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-rooms").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>