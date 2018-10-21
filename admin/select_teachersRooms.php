<?php 
include"admin/connection.php";
 ?>
<div class="form-container">
    <div class="inner-form-container">

        <div class="table-container" id="wrapper">
    <form action="" method="POST">
         <div class="field"> 
                <label>Booker: </label>
                     <div class="search-box">
                            <input type="text" autocomplete="off" placeholder="Search Name..." name="teacher" style="width: 50%;" />
        <div class="result"></div>
   

    </div>
            </div>

            <table>
                <thead>
                <th></th>
                <th>Room</th>
                <th>Update</th>
                </thead>

                <tbody>
                       <?php 
                        $get_room=mysql_query("SELECT * FROM rooms ORDER BY id");
                        while($data_room=mysql_fetch_array($get_room)){
                            $rooms=$data_room['room'];

                    ?>
                <tr>
                    <td data-th="Select"><input type="checkbox" name="SelectedRoom[]" value="<?php echo $rooms; ?>"></td>
                    <td data-th="Room"><?php echo $data_room['room']; ?></td>
                
                    <td data-th="Action">
                        <form action="" method="POST">
                        <button class="action secondary" name="view_roomE" type="submit" value="<?php echo $rooms; ?>">View</button>
                        </form>
                    </td>
                  
                </tr>
                  <?php 
                    }
                    ?>
                </tbody>
            </table>
          <button style="margin-top: 20px;" class="action" name="SaveSet_TeachersRoom" type="submit">Save</button>
           </form>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("admin/backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>