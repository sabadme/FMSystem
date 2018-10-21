
<div class="booking-container">
    <div class="top-container">
        <strong>Booking</strong>
        <div class="notifs-container">
            <strong id="adminNotifHide" class="notifs"></strong>
            <span id="count" class="counter"></span>

            <div class="notifs-wrapper">
                <strong>Notifications</strong>

                <table id="myTable">
                    <thead>
                        <th>Name</th>
                        <th>Equipment</th>
                        <th>Message</th>
                    </thead>    

                    <tbody>
                        <?php include"admin/viewreport_table.php"; ?>
                    </tbody>
                </table>

                <form action="" method="POST">
                    <button title="Notifications" name="notifs" type="submit">View All</button>
                </form>
            </div>

        </div>
        <a href="logout.php" class="logout"></a>
    </div>

    <div class="booking-wrapper-container">
        <div class="booking-wrapper">
          
 <form action="" method="POST">
        <div class="grid-container">

            <div class="field">
                <label>Who: </label>
                <div class="search-box">
                  <input type="text" autocomplete="off" placeholder="Search Name..." name="booker" />
                 <div class="result"></div>
                </div>
            </div>

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

            



<!-- UBRAHON TANI TABLE -->
            <div class="equipments-field">
                <label>Select Equipment(s)</label>
                <!-- <input id="Search" class="search" type="text" placeholder="search equipments..."/> -->
                <input type="text" id="Search" onkeyup="myFunction()" placeholder="Search" class="search">
                <div class="equipments-wrapper">
                    <table id="myTable">
                        <thead> 
                            <tr>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Registered</th>
                                <th>Expired</th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                    <?php
                    include "admin/connection.php";
                    
                    if (!empty('div')){
                    $equipment_sql = mysql_query("SELECT * FROM equipment ORDER BY id desc");
                    while ($data_equipment = mysql_fetch_array($equipment_sql)) {   
                        $status=$data_equipment['status'];
                        $equipment_name=$data_equipment['equipment_name'];

                        $get_equipment=mysql_query("SELECT * FROM booking WHERE equipment='$equipment_name'");
                        $data_GETequipment=mysql_fetch_array($get_equipment);
                        $get_equipmentNAME=$data_GETequipment['equipment'];

                        if($status=="Unassigned" && $get_equipmentNAME != $equipment_name){


                        ?>
                        <tr>
                            <td><?php echo $data_equipment['equipment_name'];?></td>
                            <td><?php echo $data_equipment['equipment_code'];?></td>
                            <td><?php echo $data_equipment['equipment_start'];?></td>
                            <td><?php echo $data_equipment['equipment_end'];?></td>
                            <td> <input type="checkbox" name="equipment[]" id="<?php echo $data_equipment['id']; ?>" value="<?php echo $data_equipment['id']; ?>"/></td>
                        </tr>
                      

                 

                        <?php
                    }

                    }
                    }else {
                        echo "sdadsd";
                    }

                    

                    ?>
                    </tbody>
                </table>
                    </div>
                </div>
            </div>

           
                <button type="submit" name="save_booking">Book</button>
            </form>
        </div>
 <!--        <div class="booking-table">
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
                    <?php include"admin/booking_table.php"; ?>
                    </tbody>
                </table>
            </div>
        </div> -->
            <!--    <div class="target">
                            <input type="checkbox" name="equipment[]" id="<?php echo $data_equipment['id']; ?>" value="<?php echo $data_equipment['id']; ?>"/>

                            <label for="<?php echo $data_equipment['id']; ?>"><?php echo $data_equipment['equipment_name']; ?></label> 
                            
                            
                            
                        </div> -->
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result").css('display', 'block');
        if(inputVal.length){
            $.get("admin/backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty().css('display', 'none');
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>



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