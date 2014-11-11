
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
                <h5><i class="font-user"></i><?php echo $this->lang->line('') . 'Language'; ?></h5>
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

                                    <!-- Column -->
                                    <div class="span12">
                                        <!-- Time pickers -->
                                        <div class="block well">
                                            <div class="navbar">
                                                <div class="navbar-inner">
                                                    <h5> <?php echo $this->lang->line('') . 'Edit Language'; ?></h5>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Serial Number:</label>

                                                <div class="controls"><input id="code" name="code"
                                                                             class="focustip span12" type="text"
                                                                             value="<?php echo $edit_data['code']; ?>">
                                                </div>
                                                <span class="red1"><?php echo form_error('code'); ?></span>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label">Part Number:</label>

                                                <div class="controls"><input id="part_number" name="part_number"
                                                                             class="focustip span12" type="text"
                                                                             value="<?php echo $edit_data['part_number']; ?>">
                                                </div>
                                                <span class="red1"><?php echo form_error('part_number'); ?></span>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label">Winning Status:</label>

                                                <div class="controls">

                                                    <input type="checkbox" name="status"
                                                           value="1" <?php if ($edit_data['status'] == 1) {
                                                        echo '  checked="checked"';
                                                    } ?> <?php if (count($winners_entry) > 0) { ?> disabled="disabled"<?php } ?> />
                                                </div>
                                                <span class="red1"><?php echo form_error('status'); ?></span>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label">Remark:</label>

                                                <div class="controls"><input id="title2" name="title"
                                                                             class="focustip span12" type="text"
                                                                             value="<?php echo $edit_data['title']; ?>">
                                                </div>
                                                <span class="red1"><?php echo form_error('title'); ?></span>
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