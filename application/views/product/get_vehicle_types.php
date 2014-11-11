<?php foreach ($vehicle_categories as $vehicle) { ?>
    <div class="col-md-6 VehicleBlockItems">
        <div class="pro-item vehicle_category_image_wrap step1 <?php
        if (in_array($vehicle['id'], $vehicle_category_ids)) {
            echo 'boarder_2_red';
        }
        ?>">
            <div class="height180px overflowhidden">
                <div class="product_image_wrap" data-rel="<?php echo $vehicle['id']; ?>">
                    <img src="assets/uploads/vehicle_categories/<?php echo $vehicle['VehicleType_Photo']; ?>"
                         width="165" id="image_id_<?php echo $vehicle['id']; ?>"
                         alt="<?php echo $vehicle['category_name']; ?>"/>
                </div>
                <input type="hidden" name="vehicle_type_id[]" value="<?php
                if (in_array($vehicle['id'], $vehicle_category_ids)) {
                    echo $vehicle['id'];
                }
                ?>" class="vehicle_category_id">
            </div>
            <div class="clearfix"></div>
            <div class="btn btn-primary btn-sm"><?php echo $vehicle['category_name']; ?></div>
        </div>
    </div>
<?php } ?>