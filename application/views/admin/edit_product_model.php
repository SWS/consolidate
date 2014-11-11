

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
                <h5><i class="font-user"></i><?php echo $this->lang->line('') . 'Product Model'; ?></h5>
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
                                                    <h5> <?php echo $this->lang->line('') . 'Edit Product Model'; ?></h5>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Product Model Name:</label>

                                                <div class="controls"><input id="pro_modelname" name="pro_modelname"
                                                                             class="focustip span12" type="text"
                                                                             value="<?php echo $edit_data['model_name']; ?>">
                                                </div>
                                                <span class="red1"><?php echo form_error('pro_modelname'); ?></span>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label">Upload Photo:</label>

                                                <div class="controls">
                                                    <input id="pro_modelimage" name="pro_modelimage"
                                                           class="focustip span12" type="file" value="">
                                                    <?php if ($edit_data['model_photo'] != "") { ?>
                                                        <img
                                                            src="<?php echo './assets/uploads/product_model/' . $edit_data['model_photo']; ?>"
                                                            id="modelimg_prvw" class="modelimg_prvw width100px1"
                                                            />
                                                        <div id="delimagebtn" class="margintop-10px"><input
                                                                type="button" class="focustip padding2px" value="Delete Image"
                                                                onclick="removeimg();"></div>
                                                    <?php } else { ?>
                                                        <img src="./assets/admin/previewimage.jpg" id="modelimg_prvw"
                                                             class="modelimg_prvw width100px1"/>
                                                        <div id="delimagebtn" class="margintop-10px"></div>
                                                    <?php } ?>
                                                </div>


                                                <span class="red1"><?php echo form_error('pro_modelimage'); ?></span>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label">KGT Reference No:</label>

                                                <div class="controls"><input id="pro_modelref_no" name="pro_modelref_no"
                                                                             class="focustip span12" type="text"
                                                                             value="<?php echo $edit_data['kgt_ref_number']; ?>">
                                                </div>
                                                <span class="red1"><?php echo form_error('pro_modelref_no'); ?></span>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label">Maker Name</label>

                                                <div class="controls">
                                                    <select id="maker_id" name="maker_id" class="focustip span12">
                                                        <?php foreach ($maker_info as $maker_data) { ?>
                                                            <option
                                                                value="<?php echo $maker_data['id']; ?>" <?php if ($edit_data['maker_id'] == $maker_data['id']) {
                                                                echo 'selected="selected"';
                                                            } ?>><?php echo $maker_data['maker_name']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <span class="red1"><?php echo form_error('maker_id'); ?></span>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label">Status:</label>

                                                <div class="controls">

                                                    <input type="checkbox" name="status"
                                                           value="1" <?php if ($edit_data['status'] == 1) {
                                                        echo 'checked="checked"';
                                                    } ?>  />
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