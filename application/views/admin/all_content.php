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
                <h5><i class="font-user"></i><?php echo $this->lang->line(''); ?> All Content</h5>
                <!-- End page title -->
                <div class="body">


                    <!-- Content container -->
                    <div class="container">
                        <!-- Default datatable -->
                        <div class="block well margintop-30px">
                            <div class="navbar">
                                <div class="navbar-inner">
                                    <h5><?php echo $this->lang->line(''); ?>Content</h5>
                                </div>
                            </div>
                            
                            <div class="table-overflow">
                                <div id="data-table_wrapper" class="dataTables_wrapper" role="grid">
                                    <div class="datatable-header padding10px">
                                        <a href="admin/index/menu_category" class="floatleft">
                                            <div id=""
                                                 class="selector1"><?php echo $this->lang->line('menu_category'); ?></div>
                                        </a>

                                        <div class="clear-fix"></div>

                                        <a href="admin/index/menu_content" class="floatleft">
                                            <div id=""
                                                 class="selector1"><?php echo $this->lang->line('menu_content'); ?></div>
                                        </a>

                                        <div class="clear-fix"></div>

                                        <a href="admin/index/content" class="floatleft">
                                            <div id=""
                                                 class="selector1"><?php echo $this->lang->line('content'); ?></div>
                                        </a>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /default datatable -->


                        <!-- Pickers -->
                    </div>

                    <!-- /pickers -->

                </div>
                <!-- /content container -->

            </div>
        </div>
    </div>
</div>
<script src="assets/user/js/jquery-1.10.1.min.js" type="text/javascript"></script>
                    <script>
                        function get_status(name, id, value) {

                            $.ajax({
                                type: "POST",
                                url: "user/update_status", /* The country id will be sent to this file */
                                data: "table_name=" + name + "&id=" + id + "&status=" + value,
                                beforeSend: function () {

                                    $("#show_class").html("Loading ...");
                                },
                                success: function (msg) {

                                }
                            });
                        }
                    </script>