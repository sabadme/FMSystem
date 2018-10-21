

    <script>
         $(document).ready(function() {
            $("#content-slider").lightSlider({
                loop:true,
                keyPress:true
            });
            $('#image-gallery').lightSlider({
                gallery:true,
                item:1,
                thumbItem:9,
                slideMargin: 0,
                speed:500,
                auto:true,
                loop:true,
                onSliderLoad: function() {
                    $('#image-gallery').removeClass('cS-hidden');
                }  
            });
        });
    </script>

    <div class="item">            
            <div class="clearfix" style="max-width:474px;">
                <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                    <li data-thumb="<?php echo "<img src='EquipmentPicture/" . $image_filename . "'>" ?>"> 
                        <img src="<?php echo "<img src='EquipmentPicture/" . $image_filename . "'>" ?>" />
                    </li>
                    <li data-thumb="<?php echo "<img src='EquipmentPicture/" . $image_filename . "'>" ?>"> 
                        <img src="<?php echo "<img src='EquipmentPicture/" . $image_filename . "'>" ?>" />
                    </li>
                    <li data-thumb="<?php echo "<img src='EquipmentPicture/" . $image_filename . "'>" ?>"> 
                        <img src="<?php echo "<img src='EquipmentPicture/" . $image_filename . "'>" ?>" />
                    </li>
                    <li data-thumb="<?php echo "<img src='EquipmentPicture/" . $image_filename . "'>" ?>"> 
                        <img src="<?php echo "<img src='EquipmentPicture/" . $image_filename . "'>" ?>" />
                    </li>
                    <li data-thumb="<?php echo "<img src='EquipmentPicture/" . $image_filename . "'>" ?>"> 
                        <img src="<?php echo "<img src='EquipmentPicture/" . $image_filename . "'>" ?>" />
                    </li>
                    <li data-thumb="<?php echo "<img src='EquipmentPicture/" . $image_filename . "'>" ?>"> 
                        <img src="<?php echo "<img src='EquipmentPicture/" . $image_filename . "'>" ?>" />
                    </li>
                    <li data-thumb="<?php echo "<img src='EquipmentPicture/" . $image_filename . "'>" ?>"> 
                        <img src="<?php echo "<img src='EquipmentPicture/" . $image_filename . "'>" ?>" />
                    </li>
                </ul>
            </div>
        </div>
