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
<?php $selectedcat = '';
$defaultselectedfileds = ''; ?>


<div class="outer">
<div class="inner">
<div class="page-header">
<!-- page title -->
<h5><i class="font-user"></i><?php echo $this->lang->line('') . 'Product'; ?></h5>
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
    <div class="navbar-inner"><h5> <?php echo $this->lang->line('') . 'Add Product'; ?></h5></div>
</div>
<div class="control-group">
    <label class="control-label">KGT Vehicle Category Title:</label>

    <div class="controls">

        <select name="vehicle_category_id" id="vehicle_category_id" class="focustip span12">
            <?php foreach ($product_catagory as $catagory) { ?>
                <option value="<?php echo $catagory['id']; ?>"><?php echo $catagory['category_name']; ?></option>
                <?php
                if ($selectedcat == '')
                    $selectedcat = $catagory['id'];
            }?>
        </select>
    </div>
    <span class="red1"><?php echo form_error('part_number'); ?></span>
</div>
<div class="control-group">
    <label class="control-label">Product Type Title:</label>

    <div class="controls">
        <select name="product_type_id" id="product_type_id" class="focustip span12">
            <?php
            $selectedone = false;
            $selectedsetting = '';
            foreach ($product_types as $product_type) {
                if ($product_type['cat_id'] == $selectedcat && $selectedone == false) {
                    $selectedone = true;
                    $selectedsetting = "selected='selected'";
                } else
                    $selectedsetting = '';


                ?>
                <option value="<?php echo $product_type['id']; ?>"
                        class="<?php echo $product_type['cat_id']; ?> <?php if ($product_type['cat_id'] == $selectedcat) {
                            echo 'selected';
                        } ?>"  <?php if ($selectedsetting != '') {
                    echo $selectedsetting;
                } ?>
                        prev="<?php echo $product_type['menu_privilages_admin']; ?>"><?php echo $product_type['product_type_name']; ?></option>
                <?php
                if ($defaultselectedfileds == '')
                    $defaultselectedfileds = "#" . $product_type['menu_privilages_admin'];
            }?>
        </select>
    </div>
    <span class="red1"><?php echo form_error('product_type_id'); ?></span>
</div>
<div class="productfield_display">
    <div class="control-group <?php if (strpos($defaultselectedfileds, "kgt_ref_number") <= 0) {
        echo 'displaynon';
    } ?>" id="kgt_ref_number">
        <label class="control-label">KGT Ref:</label>

        <div class="controls"><input id="kgt_ref_number" name="kgt_ref_number" class="focustip span12" type="text"
                                     value="<?php echo set_value('kgt_ref_number'); ?>"></div>
        <span class="red1"><?php echo form_error('kgt_ref_number'); ?></span>
    </div>


    <div class="control-group <?php if (strpos($defaultselectedfileds, "maker_id") <= 0) {
        echo 'displaynon';
    } ?>" id="maker_id">
        <label class="control-label">Vehicle Brand Name:</label>

        <div class="controls">
            <select name="maker_id" id="maker_id" class="focustip span12">
                <?php foreach ($product_makers as $make) { ?>
                    <option value="<?php echo $make['id']; ?>"><?php echo $make['maker_name']; ?></option>
                <?php } ?>
            </select>
        </div>
        <span class="red1"><?php echo form_error('maker_id'); ?></span>
    </div>


    <div class="control-group <?php if (strpos($defaultselectedfileds, "model_id") <= 0) {
        echo 'displaynon';
    } ?>" id="model_id">
        <label class="control-label">Vehicle Model Name :</label>

        <div class="controls">
            <select name="model_id" id="model_id" class="focustip span12">
                <?php foreach ($product_models as $model) { ?>
                    <option value="<?php echo $model['id']; ?>"><?php echo $model['model_name']; ?></option>
                <?php } ?>
            </select>
        </div>
        <span class="red1"><?php echo form_error('model_id'); ?></span>
    </div>


    <div class="control-group <?php if (strpos($defaultselectedfileds, "drawing_photo") <= 0) {
        echo 'displaynon';
    } ?>" id="drawing_photo">
        <label class="control-label">Product Type Drawing Photo:</label>

        <div class="controls">
            <input id="drawing_photo_img" name="drawing_photo" class="focustip span12" type="file">
            <img id="modelimg_prvw1" src="./assets/admin/previewimage.jpg" alt=" image preview"
                 class="modelimgpreviewbox"/>

            <div id="modelimg_prvw1_delete" class="margintop-10px"></div>
        </div>
        <span class="red1"><?php echo form_error('drawing_photo'); ?></span>
    </div>

    <div class="control-group <?php if (strpos($defaultselectedfileds, "product_photo") <= 0) {
        echo 'displaynon';
    } ?>" id="product_photo">
        <label class="control-label">Product Type Photo:</label>

        <div class="controls">
            <input id="product_photo_img" name="product_photo" class="focustip span12" type="file">
            <img id="modelimg_prvw2" src="./assets/admin/previewimage.jpg" alt=" image preview"
                 class="modelimgpreviewbox"/>

            <div id="modelimg_prvw2_delete" class="margintop-10px"></div>
        </div>
        <span class="red1"><?php echo form_error('product_photo'); ?></span>
    </div>

    <div class="control-group <?php if (strpos($defaultselectedfileds, "vehicle_photo") <= 0) {
        echo 'displaynon';
    } ?>" id="vehicle_photo">
        <label class="control-label">Vehicle Model Photo:</label>

        <div class="controls">
            <input id="vehicle_photo_img" name="vehicle_photo" class="focustip span12" type="file">
            <img id="modelimg_prvw3" src="./assets/admin/previewimage.jpg" alt=" image preview"
                 class="modelimgpreviewbox"/>

            <div id="modelimg_prvw3_delete" class="margintop-10px"></div>
        </div>
        <span class="red1"><?php echo form_error('vehicle_photo'); ?></span>
    </div>

    <div class="control-group <?php if (strpos($defaultselectedfileds, "knect") <= 0) {
        echo 'displaynon';
    } ?>" id="knect">
        <label class="control-label">Knecht:</label>

        <div class="controls"><input id="knect" name="knect" class="focustip span12" type="text"
                                     value="<?php echo set_value('knect'); ?>"></div>
        <span class="red1"><?php echo form_error('knect'); ?></span>
    </div>

    <div class="control-group <?php if (strpos($defaultselectedfileds, "filtron") <= 0) {
        echo 'displaynon';
    } ?>" id="filtron">
        <label class="control-label">Filtron:</label>

        <div class="controls"><input id="filtron" name="filtron" class="focustip span12" type="text"
                                     value="<?php echo set_value('filtron'); ?>"></div>
        <span class="red1"><?php echo form_error('filtron'); ?></span>
    </div>

    <div class="control-group <?php if (strpos($defaultselectedfileds, "purflux") <= 0) {
        echo 'displaynon';
    } ?>" id="purflux">
        <label class="control-label">Purflux:</label>

        <div class="controls"><input id="purflux" name="purflux" class="focustip span12" type="text"
                                     value="<?php echo set_value('purflux'); ?>"></div>
        <span class="red1"><?php echo form_error('purflux'); ?></span>
    </div>

    <div class="control-group <?php if (strpos($defaultselectedfileds, "mann") <= 0) {
        echo 'displaynon';
    } ?>" id="mann">
        <label class="control-label">Mann:</label>

        <div class="controls"><input id="mann" name="mann" class="focustip span12" type="text"
                                     value="<?php echo set_value('mann'); ?>"></div>
        <span class="red1"><?php echo form_error('mann'); ?></span>
    </div>

    <div class="control-group <?php if (strpos($defaultselectedfileds, "mecafilter") <= 0) {
        echo 'displaynon';
    } ?>" id="mecafilter">
        <label class="control-label">Mecafilter:</label>

        <div class="controls">
            <input id="mecafilter" name="mecafilter" class="focustip span12" type="text"
                   value="<?php echo set_value('mecafilter'); ?>">
        </div>
        <span class="red1"><?php echo form_error('mecafilter'); ?></span>
    </div>


    <div class="control-group <?php if (strpos($defaultselectedfileds, "oem_part_number") <= 0) {
        echo 'displaynon';
    } ?>" id="oem_part_number">
        <label class="control-label">OEM Part Number:</label>

        <div class="controls"><input id="oem_part_number" name="oem_part_number" class="focustip span12" type="text"
                                     value="<?php echo set_value('oem_part_number'); ?>"></div>
        <span class="red1"><?php echo form_error('oem_part_number'); ?></span>
    </div>

    <div class="control-group <?php if (strpos($defaultselectedfileds, "application") <= 0) {
        echo 'displaynon';
    } ?>" id="application">
        <label class="control-label">Application:</label>

        <div class="controls"><input id="application" name="application" class="focustip span12" type="text"
                                     value="<?php echo set_value('application'); ?>"></div>
        <span class="red1"><?php echo form_error('application'); ?></span>
    </div>

    <div class="control-group <?php if (strpos($defaultselectedfileds, "fleet") <= 0) {
        echo 'displaynon';
    } ?>" id="fleet">
        <label class="control-label">Fleetguard:</label>

        <div class="controls"><input id="fleet" name="fleet" class="focustip span12" type="text"
                                     value="<?php echo set_value('fleet'); ?>"></div>
        <span class="red1"><?php echo form_error('fleet'); ?></span>
    </div>

    <div class="control-group <?php if (strpos($defaultselectedfileds, "baldwin") <= 0) {
        echo 'displaynon';
    } ?>" id="baldwin">
        <label class="control-label">Baldwin:</label>

        <div class="controls"><input id="baldwin" name="baldwin" class="focustip span12" type="text"
                                     value="<?php echo set_value('baldwin'); ?>"></div>
        <span class="red1"><?php echo form_error('baldwin'); ?></span>
    </div>

    <div class="control-group <?php if (strpos($defaultselectedfileds, "others") <= 0) {
        echo 'displaynon';
    } ?>" id="others">
        <label class="control-label">Others:</label>

        <div class="controls">
            <input id="others" name="others" class="focustip span12" type="text"
                   value="<?php echo set_value('others'); ?>">
        </div>
        <span class="red1"><?php echo form_error('others'); ?></span>
    </div>


    <div class="control-group <?php if (strpos($defaultselectedfileds, "fmsi_ref_number") <= 0) {
        echo 'displaynon';
    } ?>" id="fmsi_ref_number">
        <label class="control-label">FMSI Ref:</label>

        <div class="controls"><input id="fmsi_ref_number" name="fmsi_ref_number" class="focustip span12" type="text"
                                     value="<?php echo set_value('fmsi_ref_number'); ?>"></div>
        <span class="red1"><?php echo form_error('fmsi_ref_number'); ?></span>
    </div>

    <div class="control-group <?php if (strpos($defaultselectedfileds, "year") <= 0) {
        echo 'displaynon';
    } ?>" id="year">
        <label class="control-label">Model manufacturing year:</label>

        <div class="controls"><input id="year" name="year" class="focustip span12" type="text"
                                     value="<?php echo set_value('year'); ?>"></div>
        <span class="red1"><?php echo form_error('year'); ?></span>
    </div>

    <div class="control-group <?php if (strpos($defaultselectedfileds, "front_rear") <= 0) {
        echo 'displaynon';
    } ?>" id="front_rear">
        <label class="control-label">Front/Rear(wheel):</label>

        <div class="controls">
            <input id="front_rear" name="front_rear" class="focustip span12" type="text"
                   value="<?php echo set_value('front_rear'); ?>">
        </div>
        <span class="red1"><?php echo form_error('front_rear'); ?></span>
    </div>


    <div class="control-group <?php if (strpos($defaultselectedfileds, "designation") <= 0) {
        echo 'displaynon';
    } ?>" id="designation">
        <label class="control-label">Designation:</label>

        <div class="controls"><input id="designation" name="designation" class="focustip span12" type="text"
                                     value="<?php echo set_value('designation'); ?>"></div>
        <span class="red1"><?php echo form_error('designation'); ?></span>
    </div>

    <div class="control-group <?php if (strpos($defaultselectedfileds, "wva") <= 0) {
        echo 'displaynon';
    } ?>" id="wva">
        <label class="control-label">WVA:</label>

        <div class="controls"><input id="wva" name="wva" class="focustip span12" type="text"
                                     value="<?php echo set_value('wva'); ?>"></div>
        <span class="red1"><?php echo form_error('wva'); ?></span>
    </div>


    <div class="control-group <?php if (strpos($defaultselectedfileds, "qty") <= 0) {
        echo 'displaynon';
    } ?>" id="qty">
        <label class="control-label">Quantity:</label>

        <div class="controls"><input id="qty" name="qty" class="focustip span12" type="text"
                                     value="<?php echo set_value('qty'); ?>"></div>
        <span class="red1"><?php echo form_error('qty'); ?></span>
    </div>

    <div class="control-group <?php if (strpos($defaultselectedfileds, "diameter") <= 0) {
        echo 'displaynon';
    } ?>" id="diameter">
        <label class="control-label">Diameter:</label>

        <div class="controls"><input id="diameter" name="diameter" class="focustip span12" type="text"
                                     value="<?php echo set_value('diameter'); ?>"></div>
        <span class="red1"><?php echo form_error('diameter'); ?></span>
    </div>

    <div class="control-group <?php if (strpos($defaultselectedfileds, "width") <= 0) {
        echo 'displaynon';
    } ?>" id="width">
        <label class="control-label">Width:</label>

        <div class="controls"><input id="width" name="width" class="focustip span12" type="text"
                                     value="<?php echo set_value('width'); ?>"></div>
        <span class="red1"><?php echo form_error('width'); ?></span>
    </div>

    <div class="control-group <?php if (strpos($defaultselectedfileds, "holes_no") <= 0) {
        echo 'displaynon';
    } ?>" id="holes_no">
        <label class="control-label">Holes No:</label>

        <div class="controls"><input id="holes_no" name="holes_no" class="focustip span12" type="text"
                                     value="<?php echo set_value('holes_no'); ?>"></div>
        <span class="red1"><?php echo form_error('holes_no'); ?></span>
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