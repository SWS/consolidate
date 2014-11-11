<script src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>

                    <script src="assets/admin/js/jquery-1.9.1.min.js"></script>

                    <script src="assets/admin/js/bootstrap.min.js"></script>

                    <link href="assets/admin/css/font-awesome.min.css" rel="stylesheet"/>
                    <link href="assets/admin/css/codemirror.min.css" rel="stylesheet"/>
                    <link href="assets/admin/css/blackboard.min.css" rel="stylesheet"/>
                    <link href="assets/admin/css/monokai.min.css" rel="stylesheet"/>
                    <link href="assets/admin/css/summernote.css" rel="stylesheet"/>

                    <script src="assets/admin/js/summernote.min.js"></script>

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
                <h5><i class="font-user"></i><?php echo $this->lang->line('') . 'Promotion Section'; ?></h5>
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
                                                    <h5> <?php echo $this->lang->line('') . 'Edit Promotion Section'; ?></h5>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Promotion Tab Name:</label>

                                                <div class="controls">
                                                    <select name="type" required>
                                                        <option value="">Select</option>
                                                        <option
                                                            value="download_materials" <?php echo $edit_data['type'] == 'download_materials' ? 'selected="selected"' : ''; ?>>
                                                            Download Materials
                                                        </option>
                                                        <option
                                                            value="knowledge_center" <?php echo $edit_data['type'] == 'knowledge_center' ? 'selected="selected"' : ''; ?>>
                                                            Knowledge Center
                                                        </option>
                                                        <option
                                                            value="client_testimonial" <?php echo $edit_data['type'] == 'client_testimonial' ? 'selected="selected"' : ''; ?>>
                                                            Client Testimonial
                                                        </option>
                                                        <option
                                                            value="press_release" <?php echo $edit_data['type'] == 'press_release' ? 'selected="selected"' : ''; ?>>
                                                            Press Release
                                                        </option>
                                                        <option
                                                            value="award" <?php echo $edit_data['type'] == 'award' ? 'selected="selected"' : ''; ?>>
                                                            Awards
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label">Title:</label>

                                                <div class="controls"><input id="title2" name="title"
                                                                             class="focustip span12" type="text"
                                                                             value="<?php echo $edit_data['name']; ?>">
                                                </div>
                                                <span class="red1"><?php echo form_error('title'); ?></span>
                                            </div>


                                            <div class="control-group">
                                                <label class="control-label">Upload File:</label>

                                                <div class="controls"><input type="file" name="file"/></div>

                                                <?php
                                                if (isset($edit_data['file']) && !empty($edit_data['file'])) {

                                                    if (!empty($edit_data['file'])) {
                                                        ?>
                                                        <iframe
                                                        src="<?php echo base_url(); ?>assets/uploads/promotion_section/file/<?php echo $edit_data['file']; ?>"
                                                        class="kgtiframe"></iframe><?php
                                                    }
                                                    echo '<a href="admin/index/delete/edit_file_section/' . $edit_data['id'] . '" onclick="return confirm_box();">Delete</a>';
                                                }
                                                ?>
                                            </div>


                                            <div class="control-group">
                                                <label class="control-label">Photo:</label>

                                                <div class="controls kgt11"><input
                                                        type="file" name="photo"/></div>
                                                <?php
                                                if (isset($edit_data['image']) && !empty($edit_data['image'])) {
                                                    echo '<div class="floatleft1"><img src="assets/uploads/promotion_section/small/' . $edit_data['image'] . '"><br></div>';
                                                    echo '<a href="admin/index/delete/edit_image_section/' . $edit_data['id'] . '" onclick="return confirm_box();">Delete</a></div>';
                                                }
                                                ?>
                                                <div class="clear-fix1"></div>
                                                <p class="red2">
                                                    <!--Please file must be : jpg, png, gif. maximum 800KB and maximum 1024X768--></p>


                                            </div>

                                            <div class="control-group">
                                                <label class="control-label">video:</label>

                                                <div class="controls"><input type="file" id="video" name="video"></div>
                                                <?php if (isset($edit_data['video']) && !empty($edit_data['video'])) { ?>
                                                    <iframe
                                                        src="<?php echo base_url(); ?>assets/uploads/promotion_section/video/<?php echo $edit_data['video']; ?>?autoplay=0"
                                                        AUTOPLAY="false"></iframe>
                                                    <?php
                                                    echo '<a href="admin/index/delete/edit_video_section/' . $edit_data['id'] . '" onclick="return confirm_box();">Delete</a>';
                                                }
                                                ?>


                                            </div>


                                            <div class="control-group">
                                                <label class="control-label">Sort Description:</label>

                                                <div class="controls">
                                                    <textarea id="content" class="ckeditor"
                                                              name="sort"><?php echo $edit_data['sort']; ?></textarea>

                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label">Description:</label>

                                                <div class="controls">
                                                    <textarea id="content1" class="ckeditor"
                                                              name="description"><?php echo $edit_data['description']; ?></textarea>


                                                </div>

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
<script>
    $(function(){        
         
        $('#description').summernote({
            height: 150   //set editable area's height
        });
        
        $('#sort').summernote({
            
            height: 150   //set editable area's height
        });
        
        $("#content1 ul.dropdown-menu li a").attr("href","javascript:void");
        $("#content2 ul.dropdown-menu li a").attr("href","javascript:void");
               


        $("#send").hover(function(){       
            
            
            
            $("#content_sort").val($("#content1 .note-editable").html());
            
            

            $("#content_desc").val($("#content2 .note-editable").html());
            
        });
       
    });
            
</script>