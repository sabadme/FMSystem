
<div class="booking-container">
    <div class="top-container">
    <strong>Booking Lounge</strong>

    <div class="notifs-container">
        <strong class="notifs" value="<?php echo $accountname; ?>" id="OfficeBookingApproved"></strong>
        <span id="teacherBookingApproved" class="counter""></span>
   

        <div class="notifs-wrapper">
            <strong >Notifications</strong>

            <table id="myTable">
                <thead> 
                        <th>Venue</th>
                        <th>Date Start</th>
                        <th>Date End</th>
                </thead>    

                <tbody>
                    <?php include"Office/bookingApproved.php"; ?>
                </tbody>
            </table>

            <form action="" method="POST">
                <button title="Notifications" name="notifs" type="submit">View All</button>
            </form>
        </div>

    </div>
    <a href="logout.php" class="logout"></a>
</div>

    <strong class="title" id="bookingdate">
    
</strong>
    <div class="booking-wrapper-container">
        <div class="booking-wrapper">
            <form action="" method="POST">
                <div class="grid-container">
                    <div class="field">
                        <label>Where: </label>
                        <div class="search-venue">
                            <input type="text" autocomplete="off" placeholder="Search venue..." name="venue" />
                            <div class="Vresult"></div>
                        </div>
                    </div>        

                    <div class="field">
                       <label>Purpose: </label>
                        <input type="text"/>
                    </div>

                    <div class="field">
                       <label>Semester: </label>
                       <select name="sem">
                           <option value="" disabled selected>Select..</option>
                           <option>1st sem</option>
                           <option>2st sem</option>
                           <option>Summer</option>
                       </select>
                    </div>

                    <div class="field">
                       <label>Date Start: </label>
                       <input type="date" name="datestart"/>
                    </div>

                    <div class="field">
                       <label>Date End: </label>
                       <input type="date" name="dateend"/>
                    </div>

                    <div class="field">
                        <label>Start Time: </label>
                        <input type="time" name="timestart"/>
                    </div>

                    <div class="field">
                       <label>End Time: </label>
                        <input type="time" name="tameend"/>
                    </div>

                    <div class="equipments-field">
                    <label>Select Equipment(s)</label>
                    <input class="search" type="text" placeholder="search equipments..."/>
                    <div class="equipments-wrapper">
                        <?php
                        include "admin/connection.php";
                        $count="0";
                 /*           if (!empty('div')){
                        $equipment_sql = mysql_query("SELECT DISTINCT equipment_name,equipmentType FROM equipment WHERE carrier='Group' ORDER BY id desc");
                        while ($data_equipment = mysql_fetch_array($equipment_sql)) {   
                            
                            $equipment_name=$data_equipment['equipment_name'];

                            $get_equipment=mysql_query("SELECT * FROM booking WHERE equipment='$equipment_name' And status='Unassigned'");
                            $data_GETequipment=mysql_fetch_array($get_equipment);
                            $get_equipmentNAME=$data_GETequipment['equipment'];


                            $sql_count = mysql_query("SELECT `equipment_name`,  COUNT(*) AS `count`  FROM equipment WHERE equipment_name='$equipment_name' And status != 'Broken'");
                            $data_count = mysql_fetch_array($sql_count);
                            $count = $data_count['count'];

                            
                            ?>
                            <div>
                                <input type="checkbox" name="equipment[]" value="<?php echo $data_equipment['equipment_name']; ?>"/>
                                <label><?php echo $data_equipment['equipment_name']; ?><b>(<?php echo $count; ?>)</b></label> 
                                <input type="number" name="groupQuantity[]" placeholder="Quantity">     
                            </div>

                            <?php
                        

                        }
                        }*/
                        
                        if (!empty('div')){
                        $equipment_sql = mysql_query("SELECT * FROM equipment  ORDER BY id desc");
                        while ($data_equipment = mysql_fetch_array($equipment_sql)) {   
                            $status=$data_equipment['status'];
                            $equipment_name=$data_equipment['equipment_name'];

                            $get_equipment=mysql_query("SELECT * FROM booking WHERE equipment='$equipment_name'");
                            $data_GETequipment=mysql_fetch_array($get_equipment);
                            $get_equipmentNAME=$data_GETequipment['equipment'];

                            if($status=="Unassigned" && $get_equipmentNAME != $equipment_name){


                            ?>
                            <div>
                                <input type="checkbox" name="equipment[]" id="<?php echo $data_equipment['id']; ?>" value="<?php echo $data_equipment['id']; ?>"/>
                                <label for="<?php echo $data_equipment['id']; ?>"><?php echo $data_equipment['equipment_name']; ?></label> 
                                
                                
                                
                            </div>

                            <?php
                        }

                        }
                        }else {
                            echo "sdadsd";
                        }

                        

                        ?>
                    </div>
                </div>
                </div>



                <button type="submit" name="save_booking">Book</button>
            </form>
 
        </div>
        <div class="booking-table">
            <strong class="subtitle">Booking Information</strong>
            <div class="table-container" id="wrapper">
                
                <table>
                    <thead>
                    <th>Booker</th>
                    <th>Venue</th>
                    <th>Semester</th>
                    <th>Date Start</th>
                    <th>Date End</th>
                    <th>Time Start</th>
                    <th>Time End</th>
                    <th>Equipments</th>
                    <th>Action</th>
                    </thead>

                    <tbody>
                    <?php include"Office/booking_table.php"; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




<script type="text/javascript">
$(document).ready(function(){
    $('.search-venue input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".Vresult").css('display', 'block');
        if(inputVal.length){
            $.get("admin/backend-search-venue.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty().css('display', 'none');
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".Vresult p", function(){
        $(this).parents(".search-venue").find('input[type="text"]').val($(this).text());
        $(this).parent(".Vresult").empty();
    });
});
</script>