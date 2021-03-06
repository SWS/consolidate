
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
                <h5><i class="font-user"></i><?php echo $this->lang->line('') . 'Globe'; ?></h5>
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
                                                    <h5> <?php echo $this->lang->line('') . 'Edit Globe'; ?></h5></div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Name:</label>

                                                <div class="controls"><input id="title2" name="title"
                                                                             class="focustip span12" type="text"
                                                                             value="<?php echo $edit_data['name']; ?>">
                                                </div>
                                                <span class="red1"><?php echo form_error('title'); ?></span>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label">Duration:</label>

                                                <div class="controls">
                                                    <select name="duration" required>
                                                        <?php

                                                        $durations = array('', '1', '5', '10', '20', '30', '40', '50', '60');
                                                        foreach ($durations as $dur):
                                                            ?>
                                                            <option <?php echo $edit_data['duration'] == $dur ? "selected" : "" ?>
                                                                value="<?php echo $dur ?>"><?php echo $dur ? $dur : "select" ?></option>
                                                        <?php
                                                        endforeach;
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label">Minimum Word:</label>

                                                <div class="controls">
                                                    <input type="text" name="minword"
                                                           value="<?php echo $edit_data['minword'] ?>">
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