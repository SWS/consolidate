

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
                <h5><i class="font-user"></i><?php echo $this->lang->line('') . 'Edit Product Maker'; ?></h5>
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
                                                    <h5> <?php echo $this->lang->line('') . 'Edit Product Maker'; ?></h5>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Product Maker Name:</label>

                                                <div class="controls"><input id="pro_makername" name="pro_makername"
                                                                             class="focustip span12" type="text"
                                                                             value="<?php echo $edit_data['maker_name']; ?>">
                                                </div>
                                                <span class="red1"><?php echo form_error('pro_makername'); ?></span>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label">Upload Logo:</label>

                                                <div class="controls"><input id="pro_makerlogo" name="pro_makerlogo"
                                                                             class="focustip span12" type="file"
                                                                             value="">
                                                    <?php if ($edit_data['maker_logo'] != ''){ ?>
                                                    <img
                                                        src="<?php echo './assets/uploads/product_maker/' . $edit_data['maker_logo']; ?>"
                                                        id="makerimg_prvw" class="makerimg_prvw width100px1"/>

                                                    <div id="delimagebtn" class="margintop-10px"><input type="button"
                                                                                                           class="focustip padding2px"
                                                                                                           value="Delete Image"
                                                                                                           
                                                                                                           onclick='removeimg();'>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                                <span class="red1"><?php echo form_error('pro_makerlogo'); ?></span>
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