<script>var size =<?php echo $all_data[0]['min_words']; ?></script>
<link rel="stylesheet" type="text/css" href="assets/user/career/css/career.css" />
<script> var warning_qus1_msg = "<?php echo str_replace('REPLACE_CHAR', $all_data[0]['min_words'], $career_msg[0]['warning_qus1_min_chr']); ?>";</script>
<script src="assets/user/career/js/interview.js" type="text/javascript"></script>
<link href="<?php echo site_url('assets/template/css/inlinestylesalt.css'); ?>" rel="stylesheet" type="text/css">





<div class="bodywrapper">

    <div class="container">

        <div class="main-page">	        	

            <div class="car-lists">

                <div class="form-fill-cart dis-form">

                    <div class="row">

                        <div class="col-md-12">



                        </div>



                    </div>

                </div>



            </div>



        </div><!--End content-->

    </div>







    <div class="modal fade" id="modal_success">

        <div class="modal-dialog">

            <div class="modal-content">

                <form action="" method="post" onsubmit="return show(this)">


                    <div class="modal-body">

                        <div class="box-content-modal">

                            <div class="promotion-page marginbot11px">

                                <div class="download-material">

                                    <div class="row">

                                        <div class="col-md-12 floatleft1">

                                            <?php
                                            if (isset($all_data) && !empty($all_data)) {

                                                $check = $this->session->userdata('question_detail');

                                                if (isset($check) && !empty($check)) {

                                                    $check = $this->session->userdata('question_detail');

                                                    array_push($check, array('question_id' => $all_data[0]['id']));

                                                    $this->session->set_userdata('question_detail', $check);
                                                } else {

                                                    $ar = array('question_id' => $all_data[0]['id']);

                                                    $this->session->set_userdata('question_detail', array($ar));
                                                }
                                                ?>



                                                <div class="media">

                                                    <div class="media-body">

                                                        <h4 class="media-heading"></h4>

                                                        <input type="hidden" name="operation" value="set"/>

                                                        <input type="hidden" name="question_id" id="question_id"
                                                               value="<?php echo $all_data[0]['id']; ?>"/>


                                                        <div class="questions_history">

                                                            <?php
                                                            $i = 0;

                                                            foreach ($all_answers as $answer): $i++;
                                                                ?>

                                                                <div class="one_ques_hist">

                                                                    <div class="ques_text">

                                                                        <?php echo lang('Question') ?> <?php echo $i; ?>
                                                                        : <?php echo $answer['name'] ?>

                                                                    </div>

                                                                    <div class="ques_answer">

                                                                        <?php echo $answer['answer'] ?>

                                                                    </div>

                                                                </div>

                                                            <?php endforeach; ?>

                                                        </div>


                                                        <table border="0" class="positionrelative">
                                                            <tr>
                                                                <td colspan="2">
                                                                    <div class="floatright1">

                                                                        <div id="timer22" class="floatright1">


                                                                        </div>

                                                                        <div class="floatright1"></div>

                                                                        <div class="clear-fix1"></div>

                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr height="40">

                                                                <td valign="top" width="110">

                                                                    <span>

                                                                        <?php echo lang('Question') ?> <?php echo $question_number; ?>
                                                                        of <?php echo(count($all_data) + $question_number - 1) ?>
                                                                        :

                                                                    </span></td>

                                                                <td valign="top"><?php echo $all_data[0]['name']; ?></td>



                                                                <td>



                                                                </td>

                                                            </tr>







                                                            <tr>

                                                                <td><label class="marginbot111px">Answer:</label></td>

                                                                <td colspan="2"><textarea name="answer"
                                                                                          class="kgt13"
                                                                                          cols="157" onkeyup="countChar(this)"></textarea>

                                                                </td>

                                                            </tr>

                                                            <tr>

                                                                <td>&nbsp;</td>

                                                                <td>
                                                                    <div
                                                                        id="charNum"><?php echo $all_data[0]['min_words'] ?> <?php echo lang('characters remaining') ?></div>

                                                                </td>

                                                            </tr>

                                                            <tr>

                                                                <td>&nbsp;</td>

                                                                <td></td>

                                                            </tr>

                                                        </table>

                                                        <span class="red1a"><b><?php echo lang('Note') ?>
                                                                : </b><?php echo lang('Please dont refresh the page.') ?></span>

                                                    </div>

                                                </div>

                                                <div class="clear-fix1"></div>





                                                <?php
                                            }
                                            ?>									  	

                                        </div>

                                    </div>

                                </div>	

                            </div>
                            <!--End download-material-->



                            <div class="clearfix"></div>

                            <div class="btn-modal">


                                <input type="submit" class="btn btn-primary btn-sm kgt14"
                                       value="<?php echo lang('Next') ?>"/>

                            </div>



                        </div>







                    </div>

            </div>

            </form>

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
                           onClick="$('.modal_block').modal('hide');
                                   document.location = '<?php echo site_url("/career/index"); ?>'"
                           class="floatright1 block_bttn btn btn-primary btn-sm"><?php echo lang('OK') ?> <i
                                class="glyphicon glyphicon-chevron-right"></i></a>

                    </div>

                </div>

            </div>

        </div>
        <!-- /.modal-content -->

    </div>
    <!-- /.modal-dialog -->

</div>



<div class="modal fade" id="modal_text">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-body">

                <div class="box-content-modal">

                    <h2 class="title-modal blink">Warning<</h2>

                    <p id="text_msge"></p>

                    <div class="clearfix"></div>

                    <div class="btn-modal">


                        <a href="javascript:void(0)" id="check_bttn"
                           onClick="$('#modal_text').modal('hide')"
                           class="floatright1 btn btn-primary btn-sm"><?php echo lang('OK') ?> <i
                                class="glyphicon glyphicon-chevron-right"></i></a>

                    </div>

                </div>

            </div>

        </div>
        <!-- /.modal-content -->

    </div>
    <!-- /.modal-dialog -->

</div>                





<script type="text/javascript">
    clock = $('#timer22').FlipClock('<?php echo 60 * $all_data[0]['duration']; ?>', {
        clockFace: 'HourCounter',
        countdown: true,
        callbacks: {
            stop: function() {
                blockHandler(true);
            }
        }
    });

</script>