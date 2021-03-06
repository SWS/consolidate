<!-- Main content -->
<div class="content zerorightmargin">


    <div class="outer">
        <div class="inner">
            <div class="page-header">
                <!-- page title -->
                <h5><i class="font-user"></i><?php echo lang('View Interview') ?></h5>
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
                                        <div class="navbar-inner"><h5><?php echo lang('Answer') ?></h5></div>
                                    </div>
                                    <table class="tablemargin" border="0">

                                        <?php
                                        if (isset($view_data) && !empty($view_data)) {

                                            ?>

                                            <?php
                                            $i = 1;
                                            foreach ($view_data as $set_data) {
                                                $question = $this->comman_model->get_data_by_id('question', array('id' => $set_data['question_id']));
                                                ?>
                                                <tr height="30">
                                                    <td width="100"><span class="FontLarge"><?php echo lang('Question') ?> <?php echo $i; ?></span>
                                                    </td>
                                                    <td width="20"><span class="FontLarge">:</span></td>
                                                    <td width="700"><span class="Font16px"><?php echo $question['name']; ?></span>
                                                    </td>
                                                </tr>
                                                <tr height="">
                                                    <td><span class="FontLarge"><?php echo lang('Answer') ?></span>
                                                    </td>
                                                    <td width=""><span class="FontLarge">:</span></td>
                                                    <td width="700"><span class="Font16px"><?php echo $set_data['answer']; ?></span>
                                                    </td>
                                                </tr>

                                                <?php
                                                $i++;

                                            }
                                        } else {
                                            echo '<h3>' . lang('There is no data.') . '</h3>';
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