
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
                <h5><i class="font-user"></i><?php echo $this->lang->line('') . 'Model'; ?></h5>
                <!-- End page title -->
                <div class="body">


                    <!-- Content container -->
                    <div class="container">
                        <?php if (isset($menu_name)) { ?>
                            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="operation" value="set"/>

                                <div class="row-fluid">

                                    <!-- Column -->
                                    <div class="span12">
                                        <!-- Time pickers -->
                                        <div class="block well">
                                            <div class="navbar">
                                                <div class="navbar-inner">
                                                    <h5> <?php echo $this->lang->line('') . 'Edit ' . $menu_name; ?></h5>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label">Menu Label</label>

                                                <div class="controls"><input id="title2" name="menu_label"
                                                                             class="focustip span12" type="text"
                                                                             value="<?php echo $menu_info[0]['menu_label']; ?>">
                                                </div>
                                                <span class="red1"><?php echo form_error('fleet'); ?></span>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label">Photo:</label>

                                                <div class="controls floatleft2"><input
                                                        type="file" name="file" id="uploadImage"/></div>
                                                <?php
                                                if (isset($menu_info[0]['menu_image']) && !empty($menu_info[0]['menu_image'])) {
                                                    echo '<div class="floatleft1"><img id="uploadPreview" src="assets/uploads/menus/' . $menu_info[0]['menu_image'] . '" width="100" height="100"><br></div>';
                                                }
                                                ?>
                                                <div class="clear-fix1"></div>
                                                <p class="red2">
                                                    <!--Please file must be : jpg, png, gif. maximum 800KB and maximum 1024X768--></p>

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