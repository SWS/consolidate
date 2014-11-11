<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/user/career/css/career.css'); ?>">
<script type="text/javascript" src="<?php echo site_url('assets/template/js/jquery.iframe-transport.js'); ?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/user/career/js/resume_form.js'); ?>"></script>
<div class="bodywrapper">

    <div class="container">

        <div class="main-page">

            <div class="car-lists">

                <div class="form-fill-cart">

                    <div class="row">

                    </div>

                </div>

            </div>

        </div>
        <!--End content-->

    </div>
</div>




<div class="modal fade" id="modal_success">

    <div class="modal-dialog">

        <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">

            <div class="modal-content">

                <div class="modal-body">

                    <div class="box-content-modal">

                        <div class="questions_history">

                            <?php
                            $i = 0;

                            foreach ($all_answers as $answer): $i++;
                                ?>

                                <div class="one_ques_hist">

                                    <div class="ques_text">

                                        <?php echo lang('Question') ?> <?php echo $i; ?>: <?php echo $answer['name'] ?>

                                    </div>

                                    <div class="ques_answer">

                                        <?php echo $answer['answer'] ?>

                                    </div>

                                </div>

                            <?php endforeach; ?>

                        </div>

                        <div>

                            <br/>

                            <?php echo $career_msg[0]['thank_you_for_answering']; ?>

                            <?php echo lang('Please upload you resume now.') ?>
                            <br/>

                            <br/>

                        </div>

                        <div class="container">

                            <h1 class="modal-title"></h1>


                            <div class="floatright1">

                                <div id="timer33" class="kgt15">


                                </div>

                                <div class="floatright1">


                                </div>

                                <div class="clear-fix1"></div>

                            </div>



                            <input type="hidden" name="operation" value="set">

                            <div class="form-group col-md-6 col-sm-6 col-xs-12">

                                <div class="col-sm-6">

                                    <div class="file-upload-container">

                                        <div class="file-upload-override-button left">

                                            <?php echo lang('Upload Resume') ?>



                                            <input name="file" type="file" class="file-upload-button" id="file-upload-button"/>

                                        </div>

                                        <div class="both"></div>

                                    </div>

                                </div>

                            </div>


                            <div class="form-group col-md-6 col-sm-6 col-xs-12">

                            &nbsp;

                            <div class="">


                            </div>

                        </div>


                        <span class="floatleft1"><?php echo str_replace('Note', '<b>Note</b>', $career_msg[0]['resume_upload_warning']); ?></span>


                            <?php
                            if ($this->session->flashdata('success')) {

                                $msg = $this->session->flashdata('success');
                                ?>

                                <div class="notice outer">

                                    <div class="note">

                                        <?php echo $msg; ?>

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

                                    <div class="error">

                                        <?php echo $msg; ?>

                                    </div>

                                </div>

                                <?php
                            }
                            ?>

                        </div>


                    <div class="visibilityhidden" id="please_wait">Welcome to KGT Global!</div>

                        <div class="filepreview">



                        </div>



                        <div class="clearfix"></div>

                        <div class="btn-modal">

                        <input id="submit" type="submit"
                               value="Submit" class="kgt3 btn btn-primary btn-sm"/>

                        </div>

                    </div>

                </div>

    </div>
    <!-- /.modal-content -->

        </form>

    </div><!-- /.modal-dialog -->

</div>

<div class="modal fade" id="modal_block_timeout">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="box-content-modal">
                    <span class="blink"><h2 class="title-modal">Warning</h2></span>
          
                    <?php
                    $user_data = $this->session->userdata("user_interview_data");
                    ?>
                    <p id="block_message"><?php echo preg_replace('/\bPHRASE\b/', $user_data['email'], $career_msg[0]['upload_resume']); ?></p>

                    <div class="clearfix"></div>
                    <div class="btn-modal"><a href="javascript:void(0)"
                                              onClick="$('.modal_block').modal('hide');document.location='<?php echo site_url('career') ?>'"
                                              class="floatright1 block_bttn btn btn-primary btn-sm"><?php echo lang('OK'); ?> <i
                                class="glyphicon glyphicon-chevron-right"></i></a></div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<div class="modal fade modal_block">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-body">

                <div class="box-content-modal">

                    <h2 class="title-modal"><?php echo lang('Time Over') ?></h2>


                    <div id="modal_alert"></div>

                    <div class="clearfix"></div>

                    <div class="btn-modal">


                        <a href="javascript:void(0)"
                           onClick="$('.modal_block').modal('hide');document.location='<?php echo site_url('/career/index') ?>'"
                           class="floatright1 block_bttn btn btn-primary btn-sm">OK <i
                                class="glyphicon glyphicon-chevron-right"></i></a>

                    </div>

                </div>

            </div>

        </div>
        <!-- /.modal-content -->

    </div>
    <!-- /.modal-dialog -->

</div>