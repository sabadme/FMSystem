<div class="manage-container list with-banner">

    <strong class="title">Equipments List</strong>
    <div class="manage-inner-container">
        <div class="tabs-container">

            <ul class="tabs list">
                <li class="active">
                    <span>Broken</span>
                </li>
                <?php include "admin/brooken_equipment.php"; ?>

                <li>
                    <span>Expired</span>
                </li>
                <?php include "admin/expired.php"; ?>

                <li>
                    <span>Unassigned</span>
                </li>
                <?php include "admin/unassigned.php"; ?>

                <li>
                    <span>Assigned</span>
                </li>
                <?php include "admin/assigned_equipment.php"; ?>

                <li style="margin-left: 500px;">
                    <span>Up to date</span>
                </li>
                <?php include "admin/Uptodate.php"; ?>
            </ul>

        </div>
    </div>

</div>

