


<div id="myModal" class="modal" style="display: none;">
<?php 
if(isset($_POST)){

   echo $equipment = $_POST['equipment'];
?>
    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">Close</span>

        <h1>Update</h1>

<table id="myTable">
    <thead>
        <tr>

            <th><?php echo $equipment; ?></th>
            <th>Name</th>
            <th>Code</th>
            <th>Registerd Date</th>
            <th>Expiry Date</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $equipment; ?></td>
            <td><?php echo $accountname; ?></td>
        </tr>
    </tbody>
</table>

    </div>
    <?php
}
 ?>
</div>







