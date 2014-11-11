

<!-- This file needs "assets/user/js/jquery-1.10.1.min.js" and will use header.php file -->



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
                <h5><i class="font-user"></i><?php echo $this->lang->line('') . $product_name; ?></h5>
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
                                                <h5> <?php echo $this->lang->line('') . 'Add ' . $product_name; ?></h5>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Category:</label>

                                            <div class="controls">
                                                <select name="category" required>
                                                    <option value="">Select</option>
                                                    <option value="Permanent Job">Permanent Job</option>
                                                    <option value="Internship Program">Internship Program</option>
                                                    <option value="Part Time Job">Part Time Job</option>
                                                    <option value="Projects Contractors">Projects Contractors</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Job Title:</label>

                                            <div class="controls"><input id="title2" name="title"
                                                                         class="focustip span12" type="text"
                                                                         value="<?php echo set_value('title'); ?>">
                                            </div>
                                            <span class="red1"><?php echo form_error('title'); ?></span>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Scope:</label>

                                            <div class="controls"><textarea id="content" name="scope"
                                                                            class="focustip span12"
                                                                            rows="10"></textarea>
                                               
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Qualification:</label>

                                            <div class="controls"><textarea id="content" name="qualification"
                                                                            class="focustip span12"
                                                                            rows="10"></textarea>
                                                
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Photo:</label>

                                            <div class="controls"><input type="file" name="file"/>

                                                <p class="red1">Please file must be : jpg, png, gif. maximum 800KB
                                                    and maximum 1024X768</p>

                                            </div>
                                        </div>
                                        <div id='TextBoxesGroup'></div>
                                        <input type='button' value='Add Question' id="addButton" class="btn">


                                        <div class="form-actions align-right">
                                            <input class="btn btn-primary" value="Add" id="send" type="submit">
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