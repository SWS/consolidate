

<div class="content zerorightmargin">
<?php
if ($this->session->flashdata('success')) {
    $msg = $this->session->flashdata('success');
    ?>
    <div class="notice outer">
        <div class="note"><?php echo $msg; ?>
        </div>
    </div>
<?php
}
?>
<?php
if ($this->session->flashdata('error')) {
    $msg = $this->session->flashdata('error');
    ?>
    <div class="notice outer">
        <div class="error"><?php echo $msg; ?>
        </div>
    </div>
<?php
}
?>

<div class="outer">
<div class="inner">
<div class="page-header">
<!-- page title -->
<h5><i class="font-user"></i><?php echo $this->lang->line('') . 'Product Type'; ?></h5>
<!-- End page title -->
<div class="body">


<!-- Content container -->
<div class="container">
<?php
if (isset($edit_data) && !empty($edit_data)) {

    $privilage = explode('#', $edit_data['menu_privilages']);
    $admin_menuprivilage = explode('#', $edit_data['menu_privilages_admin']);


    ?>
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
    <input type="hidden" name="operation" value="set"/>

    <div class="row-fluid">
    <input type="hidden" id="delimageid" value="<?php echo $edit_data['id']; ?>"/>
    <!-- Column -->
    <div class="span12">
    <!-- Time pickers -->
    <div class="block well">
    <div class="navbar">
        <div class="navbar-inner"><h5> <?php echo $this->lang->line('') . 'Edit Product Type'; ?></h5></div>
    </div>
    <div class="control-group">
        <label class="control-label">Product Type Name:</label>

        <div class="controls"><input id="pro_typename" name="pro_typename" class="focustip span12" type="text"
                                     value="<?php echo $edit_data['product_type_name']; ?>"></div>
        <span class="red1"><?php echo form_error('pro_typename'); ?></span>
    </div>

    <div class="control-group">
        <label class="control-label">Upload Photo:</label>

        <div class="controls">
            <input id="pro_image" name="pro_image" class="focustip span12" type="file" value="">
            <?php if ($edit_data['Product_Type_Photo']) { ?>
                <img src="<?php echo './assets/uploads/product_type_images/' . $edit_data['Product_Type_Photo']; ?>"
                     id="typeimg_prvw" class="typeimg_prvw width100px1" />
                <div id="delimagebtn" class="margintop-10px"><input type="button" class="focustip padding2px"
                                                                       value="Delete Image"
                                                                       onclick="removeimg();"></div>
            <?php } else { ?>
                <img src="./assets/admin/previewimage.jpg" id="typeimg_prvw" class="typeimg_prvw width100px1"
                     />
                <div id="delimagebtn" class="margintop-10px"><input type="button" class="focustip padding2px"
                                                                       value="Delete Image"
                                                                       onclick="removeimg();"></div>
            <?php } ?>
        </div>
        <span class="red1"><?php echo form_error('pro_image'); ?></span>
    </div>

    <div class="control-group">
        <label class="control-label">Category:</label>

        <div class="controls">
            <select name="vehicle_category_id" id="vehicle_category_id" class="focustip span12">
                <?php foreach ($product_catagory as $catagory) { ?>
                    <option
                        value="<?php echo $catagory['id']; ?>" <?php if ($catagory['id'] == $edit_data['vehicle_category_id']) { ?> selected="selected"<?php } ?>><?php echo $catagory['category_name']; ?></option>
                <?php } ?>
            </select>
        </div>
        <span class="red1"><?php echo form_error('part_number'); ?></span>
    </div>

    <div class="control-group">
        <label class="control-label">Status:</label>

        <div class="controls">

            <input type="checkbox" name="status" value="1" <?php if ($edit_data['status'] == 1) {
                echo 'checked="checked"';
            } ?>  />
        </div>
        <span class="red1"><?php echo form_error('status'); ?></span>
    </div>


    <div class="control-group">
        <label class="control-label">Menu items to display: Front End</label>

        <div class="controls">
            <div class="fieldalign"><input <?php if (in_array("kgt_ref_number", $privilage)) {
                    echo 'checked="checked"';
                } ?>name="menu[]" type="checkbox" class="focustip" value="<?php echo KGT_REFERENCE_NUMBER; ?>"/><label
                    class="marginleft-10px">KGT Ref</label></div>

            <div class="fieldalign"><input <?php if (in_array("vehicle_category_id", $privilage)) {
                    echo 'checked="checked"';
                } ?>name="menu[]" type="checkbox" class="focustip" value="<?php echo VEHICLE_CATEGORY; ?>"/><label
                    class="marginleft-10px">KGT Vehicle Category Title</label></div>

            <div><input <?php if (in_array("maker_id", $privilage)) {
                    echo 'checked="checked"';
                } ?>name="menu[]" type="checkbox" class="focustip" value="<?php echo MAKER; ?>"/><label
                    class="marginleft-10px">Vehicle Brand Name</label></div>
            <div class="clear-fix1"></div>
        </div>

        <div class="controls">
            <div class="fieldalign"><input <?php if (in_array("model_id", $privilage)) {
                    echo 'checked="checked"';
                } ?>name="menu[]" type="checkbox" class="focustip" value="<?php echo MODEL; ?>"/><label
                    class="marginleft-10px">Vehicle Model Name</label></div>

            <div class="fieldalign"><input <?php if (in_array("product_type_id", $privilage)) {
                    echo 'checked="checked"';
                } ?>name="menu[]" type="checkbox" class="focustip" value="<?php echo PRODUCT_TYPE; ?>"/><label
                    class="marginleft-10px">Product Type Title</label></div>

            <div><input <?php if (in_array("drawing_photo", $privilage)) {
                    echo 'checked="checked"';
                } ?>name="menu[]" type="checkbox" class="focustip" value="<?php echo DRAWING_PHOTO; ?>"/><label
                    class="marginleft-10px">Product type drawing photo</label></div>

            <div class="clear-fix1"></div>
        </div>

        <div class="controls">
            <div class="fieldalign"><input <?php if (in_array("product_photo", $privilage)) {
                    echo 'checked="checked"';
                } ?>name="menu[]" type="checkbox" class="focustip" value="<?php echo PRODUCT_PHOTO; ?>"/><label
                    class="marginleft-10px">Product Type Photo</label></div>
            <div class="fieldalign"><input <?php if (in_array("knect", $privilage)) {
                    echo 'checked="checked"';
                } ?>name="menu[]" type="checkbox" class="focustip" value="<?php echo KNECT; ?>"/><label
                    class="marginleft-10px">Knecht</label></div>
            <div><input <?php if (in_array("filtron", $privilage)) {
                    echo 'checked="checked"';
                } ?>name="menu[]" type="checkbox" class="focustip" value="<?php echo FILTRON; ?>"/><label
                    class="marginleft-10px">Filtron</label></div>
            <div class="clear-fix1"></div>
        </div>

        <div class="controls">
            <div class="fieldalign"><input <?php if (in_array("purflux", $privilage)) {
                    echo 'checked="checked"';
                } ?>name="menu[]" type="checkbox" class="focustip" value="<?php echo PURFLUX; ?>"/><label
                    class="marginleft-10px">Purflux</label></div>
            <div class="fieldalign"><input <?php if (in_array("mann", $privilage)) {
                    echo 'checked="checked"';
                } ?>name="menu[]" type="checkbox" class="focustip" value="<?php echo MANN; ?>"/><label
                    class="marginleft-10px">Mann</label></div>
            <div><input <?php if (in_array("mecafilter", $privilage)) {
                    echo 'checked="checked"';
                } ?>name="menu[]" type="checkbox" class="focustip" value="<?php echo MECAFILTER; ?>"/><label
                    class="marginleft-10px">Mecafilter</label></div>
            <div class="clear-fix1"></div>
        </div>

        <div class="controls">
            <div class="fieldalign"><input <?php if (in_array("oem_part_number", $privilage)) {
                    echo 'checked="checked"';
                } ?>name="menu[]" type="checkbox" class="focustip" value="<?php echo OEM_PART_NUMBER; ?>"/><label
                    class="marginleft-10px">OEM Part Number</label></div>
            <div class="fieldalign"><input <?php if (in_array("application", $privilage)) {
                    echo 'checked="checked"';
                } ?>name="menu[]" type="checkbox" class="focustip" value="<?php echo APPLICATION; ?>"/><label
                    class="marginleft-10px">Application</label></div>
            <div><input <?php if (in_array("fleet", $privilage)) {
                    echo 'checked="checked"';
                } ?>name="menu[]" type="checkbox" class="focustip" value="<?php echo FLEET; ?>"/><label
                    class="marginleft-10px">Fleetguard</label></div>
            <div class="clear-fix1"></div>
        </div>

        <div class="controls">
            <div class="fieldalign"><input <?php if (in_array("baldwin", $privilage)) {
                    echo 'checked="checked"';
                } ?>name="menu[]" type="checkbox" class="focustip" value="<?php echo BALDWIN; ?>"/><label
                    class="marginleft-10px">Baldwin</label></div>
            <div class="fieldalign"><input <?php if (in_array("others", $privilage)) {
                    echo 'checked="checked"';
                } ?>name="menu[]" type="checkbox" class="focustip" value="<?php echo OTHERS; ?>"/><label
                    class="marginleft-10px">Others</label></div>
            <div><input <?php if (in_array("fmsi_ref_number", $privilage)) {
                    echo 'checked="checked"';
                } ?>name="menu[]" type="checkbox" class="focustip" value="<?php echo FMSI_REFERENCE_NUMBER; ?>"/><label
                    class="marginleft-10px">FMSI Ref.</label></div>
            <div class="clear-fix1"></div>
        </div>

        <div class="controls">
            <div class="fieldalign"><input <?php if (in_array("year", $privilage)) {
                    echo 'checked="checked"';
                } ?>name="menu[]" type="checkbox" class="focustip" value="<?php echo YEAR; ?>"/><label
                    class="marginleft-10px">Model Manufacturing Year</label></div>
            <div class="fieldalign"><input <?php if (in_array("front_rear", $privilage)) {
                    echo 'checked="checked"';
                } ?>name="menu[]" type="checkbox" class="focustip" value="<?php echo FRONT_REAR; ?>"/><label
                    class="marginleft-10px">Front/rear(wheel)</label></div>
            <div><input <?php if (in_array("designation", $privilage)) {
                    echo 'checked="checked"';
                } ?>name="menu[]" type="checkbox" class="focustip" value="<?php echo DESIGNATION; ?>"/><label
                    class="marginleft-10px">Designation</label></div>
            <div class="clear-fix1"></div>
        </div>

        <div class="controls">
            <div class="fieldalign"><input <?php if (in_array("wva", $privilage)) {
                    echo 'checked="checked"';
                } ?>name="menu[]" type="checkbox" class="focustip" value="<?php echo WVA; ?>"/><label
                    class="marginleft-10px">WVA</label></div>
            <div class="fieldalign"><input <?php if (in_array("qty", $privilage)) {
                    echo 'checked="checked"';
                } ?>name="menu[]" type="checkbox" class="focustip" value="<?php echo QTY; ?>"/><label
                    class="marginleft-10px">QTY</label></div>
            <div><input <?php if (in_array("diameter", $privilage)) {
                    echo 'checked="checked"';
                } ?>name="menu[]" type="checkbox" class="focustip" value="<?php echo DIAMETER; ?>"/><label
                    class="marginleft-10px">Diameter</label></div>
            <div class="clear-fix1"></div>
        </div>

        <div class="controls">
            <div class="fieldalign"><input <?php if (in_array("width", $privilage)) {
                    echo 'checked="checked"';
                } ?>name="menu[]" type="checkbox" class="focustip" value="<?php echo WIDTH; ?>"/><label
                    class="marginleft-10px">Width</label></div>
            <div class="fieldalign"><input <?php if (in_array("holes_no", $privilage)) {
                    echo 'checked="checked"';
                } ?>name="menu[]" type="checkbox" class="focustip" value="<?php echo HOLES_NO; ?>"/><label
                    class="marginleft-10px">Holes No.</label></div>
            <div class="fieldalign"><input <?php if (in_array("vehicle_photo", $privilage)) {
                    echo 'checked="checked"';
                } ?>name="menu[]" type="checkbox" class="focustip" value="<?php echo VEHICLE_PHOTO; ?>"/><label
                    class="marginleft-10px">Vehicle Model Photo</label></div>
            <div class="clear-fix1"></div>
        </div>

        <div class="controls">
            <div class="fieldalign"><input <?php if (in_array("vehicle_brand_logo", $admin_menuprivilage)) {
                    echo 'checked="checked"';
                } ?>name="menu[]" type="checkbox" class="focustip" value="<?php echo VEHICLE_BRAND_LOGO; ?>"/><label
                    class="marginleft-10px">Vehicle Brand Logo</label></div>

            <div class="fieldalign"><input <?php if (in_array("vehicle_category_photo", $admin_menuprivilage)) {
                    echo 'checked="checked"';
                } ?>name="menu[]" type="checkbox" class="focustip"
                                           value="<?php echo VEHICLE_CATEGORY_GENERIC_PHOTO; ?>"/><label
                    class="marginleft-10px">KGT Vehicle Category Generic Photo</label></div>

            <div class="fieldalign"><input <?php if (in_array("product_type_photo", $admin_menuprivilage)) {
                    echo 'checked="checked"';
                } ?>name="menu[]" type="checkbox" class="focustip"
                                           value="<?php echo PRODUCT_TYPE_GENERIC_PHOTO; ?>"/><label
                    class="marginleft-10px">Product Type Generic Photo</label></div>

            <div class="clear-fix1"></div>
        </div>

    </div>


    <!--  ------------------------------------------------------------ back end menus --------------------------------------------------------------    -->

    <div class="control-group">
        <label class="control-label">Menu items to display in Admin:</label>

        <div class="controls">
            <div class="fieldalign"><input <?php if (in_array("kgt_ref_number", $admin_menuprivilage)) {
                    echo 'checked="checked"';
                } ?>name="menuadmin[]" type="checkbox" class="focustip"
                                           value="<?php echo KGT_REFERENCE_NUMBER; ?>"/><label
                    class="marginleft-10px">KGT Ref</label></div>
            <div class="fieldalign"><input <?php if (in_array("vehicle_category_id", $admin_menuprivilage)) {
                    echo 'checked="checked"';
                } ?>name="menuadmin[]" type="checkbox" class="focustip" value="<?php echo VEHICLE_CATEGORY; ?>"/><label
                    class="marginleft-10px">KGT Vehicle Category Title</label></div>
            <div><input <?php if (in_array("maker_id", $admin_menuprivilage)) {
                    echo 'checked="checked"';
                } ?>name="menuadmin[]" type="checkbox" class="focustip" value="<?php echo MAKER; ?>"/><label
                    class="marginleft-10px">Vehicle Brand Name</label></div>
            <div class="clear-fix1"></div>
        </div>

        <div class="controls">
            <div class="fieldalign"><input <?php if (in_array("model_id", $admin_menuprivilage)) {
                    echo 'checked="checked"';
                } ?>name="menuadmin[]" type="checkbox" class="focustip" value="<?php echo MODEL; ?>"/><label
                    class="marginleft-10px">Vehicle Model Name</label></div>

            <div class="fieldalign"><input <?php if (in_array("product_type_id", $admin_menuprivilage)) {
                    echo 'checked="checked"';
                } ?>name="menuadmin[]" type="checkbox" class="focustip" value="<?php echo PRODUCT_TYPE; ?>"/><label
                    class="marginleft-10px">Product Type Title</label></div>

            <div><input <?php if (in_array("drawing_photo", $admin_menuprivilage)) {
                    echo 'checked="checked"';
                } ?>name="menuadmin[]" type="checkbox" class="focustip" value="<?php echo DRAWING_PHOTO; ?>"/><label
                    class="marginleft-10px">Product type drawing photo</label></div>

            <div class="clear-fix1"></div>
        </div>

        <div class="controls">
            <div class="fieldalign"><input <?php if (in_array("product_photo", $admin_menuprivilage)) {
                    echo 'checked="checked"';
                } ?>name="menuadmin[]" type="checkbox" class="focustip" value="<?php echo PRODUCT_PHOTO; ?>"/><label
                    class="marginleft-10px">Product Type Photo</label></div>
            <div class="fieldalign"><input <?php if (in_array("knect", $admin_menuprivilage)) {
                    echo 'checked="checked"';
                } ?>name="menuadmin[]" type="checkbox" class="focustip" value="<?php echo KNECT; ?>"/><label
                    class="marginleft-10px">Knecht</label></div>
            <div><input <?php if (in_array("filtron", $admin_menuprivilage)) {
                    echo 'checked="checked"';
                } ?>name="menuadmin[]" type="checkbox" class="focustip" value="<?php echo FILTRON; ?>"/><label
                    class="marginleft-10px">Filtron</label></div>
            <div class="clear-fix1"></div>
        </div>

        <div class="controls">
            <div class="fieldalign"><input <?php if (in_array("purflux", $admin_menuprivilage)) {
                    echo 'checked="checked"';
                } ?>name="menuadmin[]" type="checkbox" class="focustip" value="<?php echo PURFLUX; ?>"/><label
                    class="marginleft-10px">Purflux</label></div>
            <div class="fieldalign"><input <?php if (in_array("mann", $admin_menuprivilage)) {
                    echo 'checked="checked"';
                } ?>name="menuadmin[]" type="checkbox" class="focustip" value="<?php echo MANN; ?>"/><label
                    class="marginleft-10px">Mann</label></div>
            <div><input <?php if (in_array("mecafilter", $admin_menuprivilage)) {
                    echo 'checked="checked"';
                } ?>name="menuadmin[]" type="checkbox" class="focustip" value="<?php echo MECAFILTER; ?>"/><label
                    class="marginleft-10px">Mecafilter</label></div>
            <div class="clear-fix1"></div>
        </div>

        <div class="controls">
            <div class="fieldalign box250px"><input
                    <?php if (in_array("oem_part_number", $admin_menuprivilage)) {
                        echo 'checked="checked"';
                    } ?>name="menuadmin[]" type="checkbox" class="focustip"
                    value="<?php echo OEM_PART_NUMBER; ?>"/><label class="marginleft-10px">OEM Part Number</label>
            </div>

            <div class="fieldalign"><input <?php if (in_array("application", $admin_menuprivilage)) {
                    echo 'checked="checked"';
                } ?>name="menuadmin[]" type="checkbox" class="focustip" value="<?php echo APPLICATION; ?>"/><label
                    class="marginleft-10px">Application</label></div>

            <div><input <?php if (in_array("fleet", $admin_menuprivilage)) {
                    echo 'checked="checked"';
                } ?>name="menuadmin[]" type="checkbox" class="focustip" value="<?php echo FLEET; ?>"/><label
                    class="marginleft-10px">Fleetguard</label></div>

            <div class="clear-fix1"></div>
        </div>

        <div class="controls">
            <div class="fieldalign"><input <?php if (in_array("baldwin", $admin_menuprivilage)) {
                    echo 'checked="checked"';
                } ?>name="menuadmin[]" type="checkbox" class="focustip" value="<?php echo BALDWIN; ?>"/><label
                    class="marginleft-10px">Baldwin</label></div>
            <div class="fieldalign"><input <?php if (in_array("others", $admin_menuprivilage)) {
                    echo 'checked="checked"';
                } ?>name="menuadmin[]" type="checkbox" class="focustip" value="<?php echo OTHERS; ?>"/><label
                    class="marginleft-10px">Others</label></div>
            <div><input <?php if (in_array("fmsi_ref_number", $admin_menuprivilage)) {
                    echo 'checked="checked"';
                } ?>name="menuadmin[]" type="checkbox" class="focustip"
                        value="<?php echo FMSI_REFERENCE_NUMBER; ?>"/><label class="marginleft-10px">FMSI Ref.</label>
            </div>
            <div class="clear-fix1"></div>
        </div>

        <div class="controls">
            <div class="fieldalign"><input <?php if (in_array("year", $admin_menuprivilage)) {
                    echo 'checked="checked"';
                } ?>name="menuadmin[]" type="checkbox" class="focustip" value="<?php echo YEAR; ?>"/><label
                    class="marginleft-10px">Model Manufacturing Year</label></div>
            <div class="fieldalign"><input <?php if (in_array("front_rear", $admin_menuprivilage)) {
                    echo 'checked="checked"';
                } ?>name="menuadmin[]" type="checkbox" class="focustip" value="<?php echo FRONT_REAR; ?>"/><label
                    class="marginleft-10px">Front/rear(wheel)</label></div>
            <div><input <?php if (in_array("designation", $admin_menuprivilage)) {
                    echo 'checked="checked"';
                } ?>name="menuadmin[]" type="checkbox" class="focustip" value="<?php echo DESIGNATION; ?>"/><label
                    class="marginleft-10px">Designation</label></div>
            <div class="clear-fix1"></div>
        </div>

        <div class="controls">
            <div class="fieldalign"><input <?php if (in_array("wva", $admin_menuprivilage)) {
                    echo 'checked="checked"';
                } ?>name="menuadmin[]" type="checkbox" class="focustip" value="<?php echo WVA; ?>"/><label
                    class="marginleft-10px">WVA</label></div>
            <div class="fieldalign"><input <?php if (in_array("qty", $admin_menuprivilage)) {
                    echo 'checked="checked"';
                } ?>name="menuadmin[]" type="checkbox" class="focustip" value="<?php echo QTY; ?>"/><label
                    class="marginleft-10px">QTY</label></div>
            <div><input <?php if (in_array("diameter", $admin_menuprivilage)) {
                    echo 'checked="checked"';
                } ?>name="menuadmin[]" type="checkbox" class="focustip" value="<?php echo DIAMETER; ?>"/><label
                    class="marginleft-10px">Diameter</label></div>
            <div class="clear-fix1"></div>
        </div>

        <div class="controls">
            <div class="fieldalign"><input <?php if (in_array("width", $admin_menuprivilage)) {
                    echo 'checked="checked"';
                } ?>name="menuadmin[]" type="checkbox" class="focustip" value="<?php echo WIDTH; ?>"/><label
                    class="marginleft-10px">Width</label></div>
            <div class="fieldalign"><input <?php if (in_array("holes_no", $admin_menuprivilage)) {
                    echo 'checked="checked"';
                } ?>name="menuadmin[]" type="checkbox" class="focustip" value="<?php echo HOLES_NO; ?>"/><label
                    class="marginleft-10px">Holes No.</label></div>
            <div class="fieldalign"><input <?php if (in_array("vehicle_photo", $admin_menuprivilage)) {
                    echo 'checked="checked"';
                } ?>name="menuadmin[]" type="checkbox" class="focustip" value="<?php echo VEHICLE_PHOTO; ?>"/><label
                    class="marginleft-10px">Vehicle Model Photo</label></div>
            <div class="clear-fix1"></div>
        </div>


        <div class="controls">
            <div class="fieldalign"><input <?php if (in_array("vehicle_brand_logo", $admin_menuprivilage)) {
                    echo 'checked="checked"';
                } ?>name="menuadmin[]" type="checkbox" class="focustip"
                                           value="<?php echo VEHICLE_BRAND_LOGO; ?>"/><label class="marginleft-10px">Vehicle
                    Brand Logo</label></div>
            <div class="fieldalign"><input <?php if (in_array("vehicle_category_photo", $admin_menuprivilage)) {
                    echo 'checked="checked"';
                } ?>name="menuadmin[]" type="checkbox" class="focustip"
                                           value="<?php echo VEHICLE_CATEGORY_GENERIC_PHOTO; ?>"/><label
                    class="marginleft-10px">KGT Vehicle Category Generic Photo</label></div>
            <div class="fieldalign"><input <?php if (in_array("product_type_photo", $admin_menuprivilage)) {
                    echo 'checked="checked"';
                } ?>name="menuadmin[]" type="checkbox" class="focustip"
                                           value="<?php echo PRODUCT_TYPE_GENERIC_PHOTO; ?>"/><label
                    class="marginleft-10px">Product Type Generic Photo</label></div>
            <div class="clear-fix1"></div>
        </div>

    </div>

    <div class="form-actions align-right">
        <input class="btn btn-primary" value="Update" id="send" type="submit">
    </div>

    </div>
    </div>
    <!-- /time pickers -->


    </div>
    <!-- /column -->

    </form>
<?php
}?>
<!-- Pickers -->
</div>

<!-- /pickers -->

</div>
<!-- /content container -->

</div>
</div>
</div>
</div>