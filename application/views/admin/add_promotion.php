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
                        <form class="form-horizontal" id="add_form" method="post" enctype="multipart/form-data"
                              action="admin/index/add_promotion_section">
                            <input type="hidden" name="operation" value="set"/>

                            <div class="row-fluid">
                                <!-- Column -->
                                <div class="span12">
                                    <!-- Time pickers -->
                                    <div class="block well">
                                        <div class="navbar">
                                            <div class="navbar-inner">
                                                <h5> <?php echo $this->lang->line('') . 'add Promotion Section'; ?></h5>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Promotion Tab Name:</label>

                                            <div class="controls">
                                                <select name="type" required>
                                                    <option value="">Select</option>
                                                    <option value="download_materials">Download Materials</option>
                                                    <option value="knowledge_center">Knowledge Center</option>
                                                    <option value="client_testimonial">Client Testimonial</option>
                                                    <option value="press_release">Press Release</option>
                                                    <option value="award">Awards</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="control-group">
                                            <label class="control-label">Title:</label>

                                            <div class="controls"><input id="title2" name="title"
                                                                         class="focustip span12" type="text" requiredd>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Download File:</label>

                                            <div class="controls"><input type="file" name="file"/></div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Photo:</label>

                                            <div class="controls"><input type="file" name="photo"/></div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">video:</label>

                                            <div class="controls"><input type="file" id="video" name="video"></div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Sort Description:</label>

                                            <div class="controls">

                                                <textarea id="content" class="ckeditor" name="sort"></textarea>


                                            </div>
                                        </div>

                                        <div class="control-group">

                                            <label class="control-label">Description:</label>

                                            <div class="controls">


                                                <textarea id="content1" class="ckeditor" name="description"></textarea>
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