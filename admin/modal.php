<?php 
if(isset($_REQUEST['equipment_report']))
    $equipment_report=$_REQUEST['equipment_report'];
{
 ?>

<div id="myModal" class="modal" style="display: none;">

    <!-- Modal content -->
    <div class="modal-content">
        <h1>Create Report</h1>

        <strong>Lenuel Betita <?php echo $equipment_report; ?></strong>
        <strong>Room: MC-504</strong>
        <strong>Equipment: Aircon</strong>
        <span class="close">&times; </span>


        <form action="" method="POST">
            <textarea placeholder="Status/Problem"></textarea>
            <button type="submit" name="report">Send</button>
        </form>


    </div>
</div>
<?php
} 
 ?>

<!--<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var btn = document.getElementById("reportBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal

    $(btn).click(function(){

    });
    btn.onclick = function() {
        modal.style.display = "block";
    };

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    };

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>-->