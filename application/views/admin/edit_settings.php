
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
                <h5><i class="font-user"></i><?php echo $this->lang->line('') . 'Settings'; ?></h5>
                <!-- End page title -->
                <div class="body">


                    <!-- Content container -->
                    <div class="container">
                        <?php

                        if (isset($edit_data) && !empty($edit_data)) {
                            ?>
                            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="settings" value="set"/>

                                <div class="row-fluid">

                                    <!-- Column -->
                                    <div class="span12">
                                        <!-- Time pickers -->
                                        <div class="block well">
                                            <div class="navbar">
                                                <div class="navbar-inner">
                                                    <h5> <?php echo $this->lang->line('') . 'Edit Settings'; ?></h5>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label">Select All Checkbox:</label>

                                                <div class="controls">
                                                    <select class="width100px" name="is_product_selectall">
                                                        <?php
                                                        if ($edit_data['is_product_selectall'] == 'Y') {
                                                            echo '<option value="Y" selected="selected">Active</option>';
                                                            echo '<option value="N">Inactive</option>';
                                                        } else if ($edit_data['is_product_selectall'] == 'N') {
                                                            echo '<option value="Y">Active</option>';
                                                            echo '<option value="N" selected="selected">Inactive</option>';
                                                        }
                                                        ?>

                                                    </select>
                                                </div>
                                                <span class="red1"><?php echo form_error('Is Select'); ?></span>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">PAGINATION LIMIT:</label>

                                                <div class="controls">
                                                    <input type="number" name="pagination_limit"
                                                           value="<?php echo $edit_data['pagination_limit']; ?>"
                                                           required/>
                                                </div>
                                                <span class="red1"><?php echo form_error('Is Select'); ?></span>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label">PAGINATION LIMIT in Product list:</label>

                                                <div class="controls">
                                                    <input type="number" name="pagination_limit_product_list"
                                                           value="<?php echo $edit_data['pagination_limit_product_list']; ?>"
                                                           required/>
                                                </div>
                                                <span class="red1"><?php echo form_error('Is Select'); ?></span>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label">PAGINATION LIMIT in PRODUCT LIST FIRST
                                                    PAGE:</label>

                                                <div class="controls">
                                                    <input type="number" name="pagination_limit_product_list_frist_page"
                                                           value="<?php echo $edit_data['pagination_limit_product_list_frist_page']; ?>"
                                                           required/>
                                                </div>
                                                <span class="red1"><?php echo form_error('Is Select'); ?></span>
                                            </div>


                                            <div class="form-actions align-right">
                                                <input class="btn btn-primary" value="Update" id="send" type="submit">
                                            </div>
                                        </div>
                                        <!-- /time pickers -->
                                    </div>
                                    <!-- /column -->
                            </form>
                        <?php
                        }
                        ?>
                        <!-- Pickers -->
                    </div>

                    <!-- /pickers -->

                </div>
                <!-- /content container -->

            </div>
        </div>
    </div>
</div>