<!-- Main content -->
<div class="content zerorightmargin">


    <div class="outer">
        <div class="inner">
            <div class="page-header">
                <!-- page title -->
                <h5><i class="font-user"></i>Promotion Section</h5>
                <!-- End page title -->
                <div class="body">

                    <!-- Content container -->
                    <div class="container">

                        <!-- Pickers -->

                        <!-- /pickers -->


                        <!-- Loaders, tooltips -->
                        <div class="row-fluid margintop-30px">

                            <!-- Column -->
                            <div class="span12">
                                <!-- News list -->
                                <div class="block well">
                                    <div class="navbar">
                                        <div class="navbar-inner"><h5>
                                                <?php

                                                if (isset($view_data)) {
                                                    echo $view_data['name'];
                                                }
                                                ?>
                                            </h5></div>
                                    </div>
                                    <table class="tablemargin" border="0">
                                        <?php

                                        if (isset($view_data)) {
                                            ?>
                                            </tr>
                                            <tr height="">
                                                <td width="130"><span class="FontLarge">Name:</span></td>
                                                <td><span class="Font16px"><?php echo $view_data['name']; ?></span>
                                                </td>
                                                <td rowspan="9">
                                                    <div class="span3 widthauto">
                                                        <div class="block well">
                                                            <div class="control-group">
                                                                <?php
                                                                if (isset($view_data['image']) && $view_data['image'] != '') {
                                                                    $image = 'assets/uploads/promotion_section/thumbnails/' . $view_data['image'];
                                                                }
                                                                ?>
                                                                <img src="<?php echo $image ?>" height="200"
                                                                     width="200"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr height="">
                                                <td><span class="FontLarge">Category:</span></td>
                                                <td width="700"><span class="Font16px"><?php echo $view_data['type']; ?></span>
                                                </td>
                                            </tr>

                                            <tr height="">
                                                <td><span class="FontLarge">Description:</span></td>
                                                <td width="700"><span class="Font16px"><?php echo $view_data['description']; ?></span>
                                                </td>
                                            </tr>

                                            <tr height="">
                                                <td><span class="FontLarge">Date:</span></td>
                                                <td><span class="Font16px"><?php echo date('d-m-Y', $view_data['update_date']); ?></span>
                                                </td>
                                            </tr>

                                            <tr height="">
                                                <td><span class="FontLarge">Status:</span></td>
                                                <td><span class="Font16px"><?php echo $view_data['status'] == 1 ? 'Active' : 'Inactive'; ?></span>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </table>


                                </div>
                                <!-- /news list -->

                            </div>
                        </div>
                        <!-- /loaders/ tooltips -->

                    </div>
                    <!-- /content container -->

                </div>
            </div>
        </div>
    </div>
    <!-- /content -->

    <!-- Right sidebar -->
    <div class="sidebar" id="right-sidebar">

    </div>
    <!-- /right sidebar -->
</div>
<!-- /main wrapper -->