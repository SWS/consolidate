
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
                                                <h5> <?php echo $this->lang->line('') . 'Add Product Model'; ?></h5>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Product Model Name:</label>

                                            <div class="controls"><input id="pro_modelname" name="pro_modelname"
                                                                         class="focustip span12" type="text" value="">
                                            </div>
                                            <span class="red1"><?php echo form_error('pro_modelname'); ?></span>
                                        </div>


                                        <div class="control-group">
                                            <label class="control-label">Upload Photo:</label>

                                            <div class="controls">
                                                <input id="pro_modelimage" name="pro_modelimage" class="focustip span12"
                                                       type="file">
                                                <img id="modelimg_prvw" src="./assets/admin/previewimage.jpg"
                                                     alt=" image preview"
                                                     class="modelimgpreviewbox"/>

                                                <div id="delimagebtn" class="margintop-10px"></div>
                                            </div>
                                            <span class="red1"><?php echo form_error('pro_modelimage'); ?></span>
                                        </div>


                                        <div class="control-group">
                                            <label class="control-label">KGT Reference No:</label>

                                            <div class="controls"><input id="ref_no" name="ref_no"
                                                                         class="focustip span12" type="text" value="">
                                            </div>
                                            <span class="red1"><?php echo form_error('ref_no'); ?></span>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Maker Name</label>

                                            <div class="controls">
                                                <select id="maker_id" name="maker_id" class="focustip span12">
                                                    <?php foreach ($maker_info as $maker_data) { ?>
                                                        <option
                                                            value="<?php echo $maker_data['id']; ?>"><?php echo $maker_data['maker_name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <span class="red1"><?php echo form_error('ref_no'); ?></span>
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