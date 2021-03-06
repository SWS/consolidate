
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

<!-- Pickers -->
<form class="form-horizontal" method="post" enctype="multipart/form-data">
<input type="hidden" name="operation" value="set"/>

<div class="row-fluid">

<!-- Column -->
<div class="span12">
<!-- Time pickers -->
<div class="block well">
<div class="navbar">
    <div class="navbar-inner"><h5> <?php echo $this->lang->line('') . 'Add Product Type'; ?></h5></div>
</div>

<div class="control-group">
    <label class="control-label">Product Type Name:</label>

    <div class="controls"><input id="pro_typename" name="pro_typename" class="focustip span12" type="text" value="">
    </div>
    <span class="red1"><?php echo form_error('pro_typename'); ?></span>
</div>


<div class="control-group">
    <label class="control-label">Upload Photo:</label>

    <div class="controls">
        <input id="pro_image" name="pro_image" class="focustip span12" type="file" value="">
        <img id="typeimg_prvw" src="./assets/admin/previewimage.jpg" alt=" image preview"
             class="modelimgpreviewbox"/>

        <div id="delimagebtn" class="margintop-10px"></div>
    </div>
    <span class="red1"><?php echo form_error('pro_image'); ?></span>
</div>

<div class="control-group">
    <label class="control-label">Product Type:</label>

    <div class="controls">
        <select name="vehicle_category_id" id="vehicle_category_id" class="focustip span12">
            <?php foreach ($product_catagory as $product_catagory) { ?>
                <option
                    value="<?php echo $product_catagory['id']; ?>"><?php echo $product_catagory['category_name']; ?></option>
            <?php } ?>
        </select>
    </div>
    <span class="red1"><?php echo form_error('product_type_id'); ?></span>
</div>

<div class="control-group">
    <label class="control-label">Status:</label>

    <div class="controls">
        <input type="checkbox" name="status" value="1"/>
    </div>
    <span class="red1"><?php echo form_error('status'); ?></span>
</div>

<!--Front end menu -->
<div class="control-group">
    <label class="control-label">Menu items to display: Front End:</label>

    <div class="controls">
        <div class="fieldalign"><input name="menu[]" type="checkbox" class="focustip"
                                       value="<?php echo KGT_REFERENCE_NUMBER; ?>" checked
                                       onclick="return false"/><label class="marginleft-10px">KGT Ref</label></div>
        <div class="fieldalign"><input name="menu[]" type="checkbox" class="focustip"
                                       value="<?php echo VEHICLE_CATEGORY; ?>"/ checked onclick="return false"><label class="marginleft-10px">KGT Vehicle Category Title</label></div>
        <div><input name="menu[]" type="checkbox" class="focustip" value="<?php echo MAKER; ?>" checked
                    onclick="return false"/><label class="marginleft-10px">Vehicle Brand Name</label></div>
        <div class="clear-fix1"></div>
    </div>

    <div class="controls">
        <div class="fieldalign"><input name="menu[]" type="checkbox" class="focustip"
                                       value="<?php echo MODEL; ?>"/><label class="marginleft-10px">Vehicle Model
                Name</label></div>
        <div class="fieldalign"><input name="menu[]" type="checkbox" class="focustip"
                                       value="<?php echo PRODUCT_TYPE; ?>" checked onclick="return false"/><label class="marginleft-10px">Product Type Title</label></div>
        <div><input name="menu[]" type="checkbox" class="focustip" value="<?php echo DRAWING_PHOTO; ?>"/><label class="marginleft-10px">Product type drawing photo</label></div>
        <div class="clear-fix1"></div>
    </div>

    <div class="controls">
        <div class="fieldalign"><input name="menu[]" type="checkbox" class="focustip"
                                       value="<?php echo PRODUCT_PHOTO; ?>"/><label class="marginleft-10px">Product
                Type Photo</label></div>
        <div class="fieldalign"><input name="menu[]" type="checkbox" class="focustip"
                                       value="<?php echo KNECT; ?>"/><label class="marginleft-10px">Knecht</label>
        </div>
        <div><input name="menu[]" type="checkbox" class="focustip" value="<?php echo FILTRON; ?>"/><label class="marginleft-10px">Filtron</label></div>
        <div class="clear-fix1"></div>
    </div>

    <div class="controls">
        <div class="fieldalign"><input name="menu[]" type="checkbox" class="focustip"
                                       value="<?php echo PURFLUX; ?>"/><label class="marginleft-10px">Purflux</label>
        </div>
        <div class="fieldalign"><input name="menu[]" type="checkbox" class="focustip"
                                       value="<?php echo MANN; ?>"/><label class="marginleft-10px">Mann</label></div>
        <div><input name="menu[]" type="checkbox" class="focustip" value="<?php echo MECAFILTER; ?>"/><label class="marginleft-10px">Mecafilter</label></div>
        <div class="clear-fix1"></div>
    </div>

    <div class="controls">
        <div class="fieldalign"><input name="menu[]" type="checkbox" class="focustip"
                                       value="<?php echo OEM_PART_NUMBER; ?>"/><label class="marginleft-10px">OEM Part
                Number</label></div>
        <div class="fieldalign"><input name="menu[]" type="checkbox" class="focustip"
                                       value="<?php echo APPLICATION; ?>"/><label class="marginleft-10px">Application</label></div>
        <div><input name="menu[]" type="checkbox" class="focustip" value="<?php echo FLEET; ?>"/><label class="marginleft-10px">Fleetguard</label></div>
        <div class="clear-fix1"></div>
    </div>

    <div class="controls">
        <div class="fieldalign"><input name="menu[]" type="checkbox" class="focustip"
                                       value="<?php echo BALDWIN; ?>"/><label class="marginleft-10px">Baldwin</label>
        </div>
        <div class="fieldalign"><input name="menu[]" type="checkbox" class="focustip"
                                       value="<?php echo OTHERS; ?>"/><label class="marginleft-10px">Others</label>
        </div>
        <div><input name="menu[]" type="checkbox" class="focustip" value="<?php echo FMSI_REFERENCE_NUMBER; ?>"/><label class="marginleft-10px">FMSI Ref.</label></div>
        <div class="clear-fix1"></div>
    </div>

    <div class="controls">
        <div class="fieldalign"><input name="menu[]" type="checkbox" class="focustip"
                                       value="<?php echo YEAR; ?>"/><label class="marginleft-10px">Model Manufacturing
                Year</label></div>
        <div class="fieldalign fieldalignleft"><input name="menu[]" type="checkbox" class="focustip"
                                                                         value="<?php echo FRONT_REAR; ?>"/><label class="marginleft-10px">Front/rear(wheel)</label></div>
        <div><input name="menu[]" type="checkbox" class="focustip" value="<?php echo DESIGNATION; ?>"/><label class="marginleft-10px">Designation</label></div>
        <div class="clear-fix1"></div>
    </div>

    <div class="controls">
        <div class="fieldalign"><input name="menu[]" type="checkbox" class="focustip" value="<?php echo WVA; ?>"/><label class="marginleft-10px">WVA</label></div>
        <div class="fieldalign"><input name="menu[]" type="checkbox" class="focustip" value="<?php echo QTY; ?>"/><label class="marginleft-10px">QTY</label></div>
        <div><input name="menu[]" type="checkbox" class="focustip" value="<?php echo DIAMETER; ?>"/><label class="marginleft-10px">Diameter</label></div>
        <div class="clear-fix1"></div>
    </div>

    <div class="controls">
        <div class="fieldalign"><input name="menu[]" type="checkbox" class="focustip"
                                       value="<?php echo WIDTH; ?>"/><label class="marginleft-10px">Width</label>
        </div>
        <div class="fieldalign"><input name="menu[]" type="checkbox" class="focustip"
                                       value="<?php echo HOLES_NO; ?>"/><label class="marginleft-10px">Holes
                No.</label></div>

        <div class="fieldalign"><input name="menu[]" type="checkbox" class="focustip"
                                       value="<?php echo VEHICLE_PHOTO; ?>"/><label class="marginleft-10px">Vehicle
                Model Photo</label></div>
        <div class="clear-fix1"></div>
    </div>

    <div class="controls">
        <div class="fieldalign"><input name="menu[]" type="checkbox" class="focustip"
                                       value="<?php echo VEHICLE_BRAND_LOGO; ?>"/><label class="marginleft-10px">Vehicle
                Brand Logo</label></div>
        <div class="fieldalign"><input name="menu[]" type="checkbox" class="focustip"
                                       value="<?php echo VEHICLE_CATEGORY_GENERIC_PHOTO; ?>"/><label class="marginleft-10px">KGT Vehicle Category Generic Photo</label></div>
        <div class="fieldalign"><input name="menu[]" type="checkbox" class="focustip"
                                       value="<?php echo PRODUCT_TYPE_GENERIC_PHOTO; ?>"/><label class="marginleft-10px">Product Type Generic Photo</label></div>

        <div class="clear-fix1"></div>
    </div>
</div>


<!-- ---------------------------------------------------------------------Back end menu-------------------------------------------------------------- -->

<div class="control-group">
    <label class="control-label">Menu items to display in Admin:</label>

    <div class="controls">
        <div class="fieldalign"><input name="menuadmin[]" type="checkbox" class="focustip"
                                       value="<?php echo KGT_REFERENCE_NUMBER; ?>" checked
                                       onclick="return false"/><label class="marginleft-10px">KGT Ref</label></div>
        <div class="fieldalign"><input name="menuadmin[]" type="checkbox" class="focustip"
                                       value="<?php echo VEHICLE_CATEGORY; ?>"/ checked onclick="return false"><label class="marginleft-10px">KGT Vehicle Category Title</label></div>
        <div><input name="menuadmin[]" type="checkbox" class="focustip" value="<?php echo MAKER; ?>" checked
                    onclick="return false"/><label class="marginleft-10px">Vehicle Brand Name</label></div>
        <div class="clear-fix1"></div>
    </div>

    <div class="controls">
        <div class="fieldalign fieldalignleft"><input name="menuadmin[]" type="checkbox"
                                                                         class="focustip" value="<?php echo MODEL; ?>"/><label class="marginleft-10px">Vehicle Model Name</label></div>
        <div class="fieldalign fieldalignleft"><input name="menuadmin[]" type="checkbox"
                                                                         class="focustip"
                                                                         value="<?php echo PRODUCT_TYPE; ?>" checked
                                                                         onclick="return false"/><label class="marginleft-10px">Product Type Title</label></div>
        <div><input name="menuadmin[]" type="checkbox" class="focustip" value="<?php echo DRAWING_PHOTO; ?>"/><label class="marginleft-10px">Product type drawing photo</label></div>
        <div class="clear-fix1"></div>
    </div>

    <div class="controls">
        <div class="fieldalign fieldalignleft"><input name="menuadmin[]" type="checkbox"
                                                                         class="focustip"
                                                                         value="<?php echo PRODUCT_PHOTO; ?>"/><label class="marginleft-10px">Product Type Photo</label></div>
        <div class="fieldalign fieldalignleft"><input name="menuadmin[]" type="checkbox"
                                                                         class="focustip" value="<?php echo KNECT; ?>"/><label class="marginleft-10px">Knecht</label></div>
        <div><input name="menuadmin[]" type="checkbox" class="focustip" value="<?php echo FILTRON; ?>"/><label class="marginleft-10px">Filtron</label></div>
        <div class="clear-fix1"></div>
    </div>

    <div class="controls">
        <div class="fieldalign fieldalignleft"><input name="menuadmin[]" type="checkbox"
                                                                         class="focustip"
                                                                         value="<?php echo PURFLUX; ?>"/><label class="marginleft-10px">Purflux</label></div>
        <div class="fieldalign fieldalignleft"><input name="menuadmin[]" type="checkbox"
                                                                         class="focustip"
                                                                         value="<?php echo MANN; ?>"/><label class="marginleft-10px">Mann</label></div>
        <div><input name="menuadmin[]" type="checkbox" class="focustip" value="<?php echo MECAFILTER; ?>"/><label class="marginleft-10px">Mecafilter</label></div>
        <div class="clear-fix1"></div>
    </div>

    <div class="controls">
        <div class="fieldalign"><input name="menuadmin[]" type="checkbox" class="focustip"
                                       value="<?php echo OEM_PART_NUMBER; ?>"/><label class="marginleft-10px">OEM Part
                Number</label></div>
        <div class="fieldalign fieldalignleft"><input name="menuadmin[]" type="checkbox"
                                                                         class="focustip"
                                                                         value="<?php echo APPLICATION; ?>"/><label class="marginleft-10px">Application</label></div>
        <div><input name="menuadmin[]" type="checkbox" class="focustip" value="<?php echo FLEET; ?>"/><label class="marginleft-10px">Fleetguard</label></div>
        <div class="clear-fix1"></div>
    </div>

    <div class="controls">
        <div class="fieldalign fieldalignleft"><input name="menuadmin[]" type="checkbox"
                                                                         class="focustip"
                                                                         value="<?php echo BALDWIN; ?>"/><label class="marginleft-10px">Baldwin</label></div>
        <div class="fieldalign"><input name="menuadmin[]" type="checkbox" class="focustip"
                                       value="<?php echo OTHERS; ?>"/><label class="marginleft-10px">Others</label>
        </div>
        <div><input name="menuadmin[]" type="checkbox" class="focustip"
                    value="<?php echo FMSI_REFERENCE_NUMBER; ?>"/><label class="marginleft-10px">FMSI Ref.</label>
        </div>
        <div class="clear-fix1"></div>
    </div>

    <div class="controls">
        <div class="fieldalign"><input name="menuadmin[]" type="checkbox" class="focustip" value="<?php echo YEAR; ?>"/><label class="marginleft-10px">Model Manufacturing Year</label></div>
        <div class="fieldalign fieldalignleft"><input name="menuadmin[]" type="checkbox"
                                                                         class="focustip"
                                                                         value="<?php echo FRONT_REAR; ?>"/><label class="marginleft-10px">Front/rear(wheel)</label></div>
        <div><input name="menuadmin[]" type="checkbox" class="focustip" value="<?php echo DESIGNATION; ?>"/><label class="marginleft-10px">Designation</label></div>
        <div class="clear-fix1"></div>
    </div>

    <div class="controls">
        <div class="fieldalign"><input name="menuadmin[]" type="checkbox" class="focustip"
                                       value="<?php echo WVA; ?>"/><label class="marginleft-10px">WVA</label></div>
        <div class="fieldalign fieldalignleft"><input name="menuadmin[]" type="checkbox"
                                                                         class="focustip"
                                                                         value="<?php echo QTY; ?>"/><label class="marginleft-10px">QTY</label></div>
        <div><input name="menuadmin[]" type="checkbox" class="focustip" value="<?php echo DIAMETER; ?>"/><label class="marginleft-10px">Diameter</label></div>
        <div class="clear-fix1"></div>
    </div>

    <div class="controls">
        <div class="fieldalign fieldalignleft"><input name="menuadmin[]" type="checkbox"
                                                                         class="focustip" value="<?php echo WIDTH; ?>"/><label class="marginleft-10px">Width</label></div>
        <div class="fieldalign"><input name="menuadmin[]" type="checkbox" class="focustip"
                                       value="<?php echo HOLES_NO; ?>"/><label class="marginleft-10px">Holes
                No.</label></div>
        <div class="fieldalign width270px"><input name="menuadmin[]" type="checkbox"
                                                                        class="focustip"
                                                                        value="<?php echo VEHICLE_PHOTO; ?>"/><label class="marginleft-10px">Vehicle Model Photo</label></div>
        <div class="clear-fix1"></div>
    </div>

    <div class="controls">
        <div class="fieldalign fieldalignleft"><input name="menuadmin[]" type="checkbox"
                                                                         class="focustip"
                                                                         value="<?php echo VEHICLE_BRAND_LOGO; ?>"/><label class="marginleft-10px">Vehicle Brand Logo</label></div>
        <div class="fieldalign"><input name="menuadmin[]" type="checkbox" class="focustip"
                                       value="<?php echo VEHICLE_CATEGORY_GENERIC_PHOTO; ?>"/><label class="marginleft-10px">KGT Vehicle Category Generic Photo</label></div>
        <div class="fieldalign"><input name="menuadmin[]" type="checkbox" class="focustip"
                                       value="<?php echo PRODUCT_TYPE_GENERIC_PHOTO; ?>"/><label class="marginleft-10px">Product Type Generic Photo</label></div>

        <div class="clear-fix1"></div>
    </div>

</div>


<div class="form-actions align-right">
    <input class="btn btn-primary" value="Add" id="send" type="submit">
    <input class="btn btn-danger" type="reset">
</div>

</div>

</div>
<!-- /time pickers -->


</div>
<!-- /column -->

</form>
</div>

<!-- /pickers -->

</div>
<!-- /content container -->

</div>
</div>
</div>
</div>