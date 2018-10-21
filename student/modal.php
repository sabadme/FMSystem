<?php
if (isset($_REQUEST['equipment_report'])) {
    $equipment_report = $_REQUEST['equipment_report'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "monitoringsystemdatabase";


    $conn = mysql_connect($servername, $username, $password);
    mysql_select_db($db);

    $equipment_reportNAME = mysql_query("SELECT * FROM equipment WHERE id='$equipment_report'");
    $data_reportNAME = mysql_fetch_array($equipment_reportNAME);
    $name = $data_reportNAME['equipment_name'];


    $get_equipment = mysql_query("SELECT * FROM equipment WHERE equipment_name='$name'");
    $data_equipment = mysql_fetch_array($get_equipment);
    $equipment_filename = $data_equipment['equipment_filename'];
    $equipment_code = $data_equipment['equipment_code'];


    ?>
    <div class="product-page-container report-form">
        <strong class="title">Create Report</strong>
        <div class="product-inner-container">

            <div class="image-container">
                <img src="images/placeholder-product.png"
                     style="background: url(<?php echo "EquipmentPicture/$equipment_filename" ?>) no-repeat;">
            </div>

            <div class="product-info-container">
                <span class="equipment-code"><b>Equipment QR/Code: <?php echo $data_equipment['equipment_code']; ?></b> <?php echo $equipment_code; ?></span>
                <h1 class="equipment-name"><?php echo $name; ?></h1>

                <form action="" method="POST">
                    <textarea placeholder="Status/Problem" name="messagereport"></textarea>
                    <button class="action" type="submit" name="send_report" value="<?php echo $equipment_report; ?>">Send</button>
                </form>
            </div>

        </div>
    </div>


    <?php
}
?>






