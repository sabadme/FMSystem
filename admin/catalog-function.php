<?php

    $servername ="localhost";
    $username="root";
    $password="";
    $db="monitoringsystemdatabase";


    $conn =mysql_connect($servername,$username,$password);
    mysql_select_db($db); 

/* Shows "The Horse's Mouth" Blog at 10 entries per
page, including links to see the other pages. */

$perpage = 6;
$lynx = $html = "";
$startat = $_REQUEST['page'] * $perpage;

$q = mysql_query("SELECT count(id) FROM equipment");
$row = mysql_fetch_array($q);
$pages = ($row[0] + $perpage - 1) / $perpage;
?>
<div class="catalog-container">
    <div class="equipments-container">
<?php
            

$q = mysql_query("SELECT * FROM equipment ORDER BY id desc limit $startat,$perpage");

while ($row = mysql_fetch_assoc($q)) {
    $images=$row['equipment_filename'];
    $image = "EquipmentPicture/".$images;

    
    $html .= "<div class='equipments'>
            <img src='images/placeholder-grid.png' style='background-image: url($image)'/>
            <span class='equipment-code'>$row[equipment_code]</span>
            <span class='equipment-name'>$row[equipment_name]</span>
            <span class='equipment-start'>$row[equipment_start]</span>
            <span class='equipment-end'>$row[equipment_end]</span>
            <form action='' method='POST'>
            <button name='equipment_page' type='submit' value=$row[id]>View Equipment</button>
            </form></div>";

};

for ($k=0; $k<$pages; $k++) {
        if ($k != $_REQUEST['page']) {
         $lynx .= " <a href=catalog-index.php"."?page=$k>".($k+1)."</a>";
        } else {
         $lynx .= " <b>".($k+1)."</b>";
        }

}
?>


<?= $html ?>
    </div>
<div class="pagination">
<span>SHOW </span>
<?= $lynx ?>
</div>
</div>

  