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

                        <!-- Pickers -->
                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="operation" value="set"/>

                            <div class="row-fluid">

                                <!-- Column -->
                                <div class="span12">
                                    <!-- Time pickers -->
                                    <div class="block well">
                                        <div class="navbar">
                                            <div class="navbar-inner">
                                                <h5> <?php echo $this->lang->line('') . 'Add Vehicle Category'; ?></h5>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Category Name:</label>

                                            <div class="controls"><input id="category_name" name="category_name"
                                                                         class="focustip span12" type="text"
                                                                         value="<?php echo set_value('category_name'); ?>">
                                            </div>
                                            <span class="red1"><?php echo form_error('category_name'); ?></span>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Vehicle Photo:</label>

                                            <div class="controls">
                                                <input id="VehicleType_Photo" name="VehicleType_Photo"
                                                       class="focustip span12" type="file"
                                                       value="<?php echo set_value('VehicleType_Photo'); ?>">
                                                <img id="modelimg_prvw1" src="./assets/admin/previewimage.jpg"
                                                     alt=" image preview"
                                                     class="modelimgpreviewbox"/>

                                                <div id="modelimg_prvw1_delete" class="margintop-10px"></div>
                                            </div>

                                            <span class="red1"><?php echo form_error('VehicleType_Photo'); ?></span>

                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Category Icon:</label>

                                            <div class="controls"><input id="vehicle_category_icon"
                                                                         name="vehicle_category_icon"
                                                                         class="focustip span12" type="file"
                                                                         value="<?php echo set_value('vehicle_category_icon'); ?>">
                                                <img id="modelimg_prvw2" src="./assets/admin/previewimage.jpg"
                                                     alt=" image preview"
                                                     class="modelimgpreviewbox"/>

                                                <div id="modelimg_prvw2_delete" class="margintop-10px"></div>
                                            </div>
                                            <span class="red1"><?php echo form_error('vehicle_category_icon'); ?></span>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Menu Image:</label>

                                            <div class="controls"><input id="menu_image" name="menu_image"
                                                                         class="focustip span12" type="file"
                                                                         value="<?php echo set_value('menu_image'); ?>">
                                                <img id="modelimg_prvw3" src="./assets/admin/previewimage.jpg"
                                                     alt=" image preview"
                                                     class="modelimgpreviewbox"/>

                                                <div id="modelimg_prvw3_delete" class="margintop-10px"></div>
                                            </div>
                                            <span class="red1"><?php echo form_error('menu_image'); ?></span>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Status:</label>

                                            <div class="controls">
                                                <input type="checkbox" name="status" value="1"/>
                                            </div>
                                            <span class="red1"><?php echo form_error('status'); ?></span>
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