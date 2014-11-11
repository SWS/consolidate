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
                <h5><i class="font-user"></i><?php echo $this->lang->line('') . 'Vehicle Category'; ?></h5>
                <!-- End page title -->
                <div class="body">


                    <!-- Content container -->
                    <div class="container">
                        <?php
                        if (isset($edit_data) && !empty($edit_data)) {

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
                                                <div class="navbar-inner">
                                                    <h5> <?php echo $this->lang->line('') . 'Edit Vehicle Category'; ?></h5>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Category Name:</label>

                                                <div class="controls"><input id="category_name" name="category_name"
                                                                             class="focustip span12" type="text"
                                                                             value="<?php echo $edit_data['category_name']; ?>">
                                                </div>
                                                <span class="red1"><?php echo form_error('category_name'); ?></span>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label">Vehicle Photo:</label>

                                                <div class="controls">
                                                    <input id="VehicleType_Photo" name="VehicleType_Photo"
                                                           class="focustip span12" type="file"
                                                           value="<?php echo $edit_data['VehicleType_Photo']; ?>">
                                                    <?php if ($edit_data['VehicleType_Photo'] != "") { ?>
                                                        <img id="modelimg_prvw1"
                                                             src="<?php echo './assets/uploads/vehicle_categories/' . $edit_data['VehicleType_Photo']; ?>"
                                                             alt=" image preview"
                                                             class="modelimgpreviewbox"/>
                                                        <div id="modelimg_prvw1_delete" class="margintop-10px">
                                                            <input type="button" class="focustip" value="Delete Image"
                                                                   class="nopadding"
                                                                   onclick="removeimg('modelimg_prvw1');">
                                                        </div>
                                                    <?php
                                                    } else {
                                                        ?>
                                                        <img id="modelimg_prvw1" src="./assets/admin/previewimage.jpg"
                                                             alt=" image preview"
                                                             class="modelimgpreviewbox"/>
                                                        <div id="modelimg_prvw1_delete" class="margintop-10px"></div>
                                                    <?php } ?>
                                                </div>
                                                <span class="red1"><?php echo form_error('VehicleType_Photo'); ?></span>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label">Category Icon:</label>

                                                <div class="controls">
                                                    <input id="vehicle_category_icon" name="vehicle_category_icon"
                                                           class="focustip span12" type="file"
                                                           value="<?php echo $edit_data['vehicle_category_icon']; ?>">
                                                    <?php if ($edit_data['vehicle_category_icon'] != "") { ?>
                                                        <img id="modelimg_prvw2"
                                                             src="<?php echo './assets/uploads/vehicle_categories/' . $edit_data['vehicle_category_icon']; ?>"
                                                             alt=" image preview"
                                                             class="modelimgpreviewbox"/>
                                                        <div id="modelimg_prvw2_delete" class="margintop-10px">
                                                            <input type="button" class="focustip" value="Delete Image"
                                                                   class="nopadding"
                                                                   onclick="removeimg('modelimg_prvw2');">
                                                        </div>
                                                    <?php
                                                    } else {
                                                        ?>
                                                        <img id="modelimg_prvw2" src="./assets/admin/previewimage.jpg"
                                                             alt=" image preview"
                                                             class="modelimgpreviewbox"/>
                                                        <div id="modelimg_prvw2_delete" class="margintop-10px"></div>
                                                    <?php } ?>
                                                </div>
                                                <span class="red1"><?php echo form_error('vehicle_category_icon'); ?></span>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label">Menu Image:</label>

                                                <div class="controls">
                                                    <input id="menu_image" name="menu_image" class="focustip span12"
                                                           type="file" value="<?php echo $edit_data['menu_image']; ?>">
                                                    <?php if ($edit_data['menu_image'] != "") { ?>
                                                        <img id="modelimg_prvw3"
                                                             src="<?php echo './assets/uploads/vehicle_categories/' . $edit_data['menu_image']; ?>"
                                                             alt=" image preview"
                                                             class="modelimgpreviewbox"/>
                                                        <div id="modelimg_prvw3_delete" class="margintop-10px">
                                                            <input type="button" class="focustip" value="Delete Image"
                                                                   class="nopadding"
                                                                   onclick="removeimg('modelimg_prvw3');">
                                                        </div>
                                                    <?php
                                                    } else {
                                                        ?>
                                                        <img id="modelimg_prvw3" src="./assets/admin/previewimage.jpg"
                                                             alt=" image preview"
                                                             class="modelimgpreviewbox"/>
                                                        <div id="modelimg_prvw3_delete" class="margintop-10px"></div>
                                                    <?php } ?>
                                                </div>
                                                <span class="red1"><?php echo form_error('menu_image'); ?></span>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label">Status:</label>

                                                <div class="controls">

                                                    <input type="checkbox" name="status"
                                                           value="1" <?php if ($edit_data['status'] == 1) {
                                                        echo '  checked="checked"';
                                                    } ?>/>
                                                </div>
                                                <span class="red1"><?php echo form_error('status'); ?></span>
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