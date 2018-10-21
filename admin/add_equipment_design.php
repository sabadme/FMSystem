<?php 
include"admin/generate_code.php";
 ?>
<div class="manage-container registration with-banner">
	<strong class="title">Equipments Registration</strong>
    <div class="manage-inner-container">
    <div class="tabs-container">
        <ul class="tabs">
            <li class="active">
                <span>Single</span> 
            </li>
        <?php include "admin/single_equipment.php"; ?>
            <li>
                <span>Set</span>
            </li>
           <?php include"admin/view_equipment_set.php"; ?> 
            <li style='margin-left: 176px;'>
                <span>Group Set</span>
            </li>
              <?php include"admin/groupSet.php"; ?> 
         
        </ul>
    </div>
    </div>  
</div>

