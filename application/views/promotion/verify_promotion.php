
<script type="text/javascript">

    var base_url = '<?php echo base_url(); ?>';
</script>
<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/master/css/verify_promotion.css'); ?>">
<script type="text/javascript" src="<?php echo site_url('assets/master/js/verify_promotion.js'); ?>"></script>

<div>
    <div class="container">
        <div class="main-page">
            <div class="car-lists">
                <div class="form-fill-cart">

                    <div class="row">

                        <div class="col-md-6">                            
                        </div>	        				

                    </div>

                </div>	        		

            </div>

        </div>
        <!--End content-->

    </div>



    <div class="modal fade" id="notify_submit">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-body">

                    <div class="box-content-modal">

                        <form method="post" id="target" onsubmit="return show(this)">

                            <h2 class="title-modal kgt42">We sent a
                                verification code to : <?php echo $user_email; ?></h2>

                            <div class="show_error blink colorgray">&nbsp;</div>

                            <div class="alert-message block-message warning col-md-12 red1 aligncenter"
                                 >
                                <div class="product_counter_msg counter_msg_wrap verfication_error_msg"></div>
                            </div>

                            <div class="">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <label><?php echo lang('Please enter the code:') ?> <input type="text" name="code"
                                                                                               required></label></div>

                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div id="timer"></div>
                            </div>
                            </div>
                            

                            <div class="clearfix"></div>

                            <div class="show_class red1 aligncenter"></div>



                            <div class="btn-modal toyota-page">

                                <div class="row">

                                    <div class="col-xs-4 col-md-4 text-center">

                                        <input type="submit" class="btn btn-primary btn-sm" value="Confirm"> 

                                    </div>

                                    <div class="col-xs-4 col-md-4 text-center">

                                        <a href="#" id="resend_mail"
                                           class="btn btn-primary btn-sm"><?php echo lang('resend') ?> <i
                                                class="glyphicon glyphicon-chevron-right"></i></a>

                                    </div>

                                    <div class="col-xs-4 col-md-4 text-center">

                                        <a href="#" id="cancel_form"
                                           class="btn btn-primary btn-sm"><?php echo lang('cancel') ?> <i
                                                class="glyphicon glyphicon-chevron-right"></i></a>

                                    </div>

                                </div>	        				

                            </div>

                        </form>

                    </div>

                </div>
            </div>
            <!-- /.modal-content -->

        </div>
        <!-- /.modal-dialog -->

    </div>



    <div class="modal fade" id="modal_success">

        <div class="modal-dialog">

            <div class="modal-content">            

                <div class="modal-body">

                    <div class="box-content-modal">

                        <h2 class="title-modal"><?php echo $promotion_message[0]['secondThank_you_header']; ?></h2>	

                        <p><?php echo $promotion_message[0]['secondThank_you_msg']; ?></p>		

                        <div class="clearfix"></div>

                        <div class="btn-modal">


                            <a href="javascript:void(0)" id="ok_bttn"
                               onClick="$('#modal_success').modal('hide')"
                               class="floatright1 btn btn-primary btn-sm"><?php echo lang('OK') ?>     <i
                                    class="glyphicon glyphicon-chevron-right"></i></a>

                        </div>

                    </div>

                </div>

            </div>
            <!-- /.modal-content -->

        </div>
        <!-- /.modal-dialog -->

    </div>

    <div class="modal fade" id="modal_block">
        <div class="modal-dialog">
            <div class="modal-content">               
                <div class="modal-body">
                    <div class="box-content-modal">
                        <h2 class="title-modal blink">Warning:</h2>
                        <p><?php  echo preg_replace('/\bPHRASE\b/', $user_email, $promotion_message[0]['verification_timeout']); ?></p>
                        <div class="clearfix"></div>
                        <?php
                        $user_data = $this->session->userdata('user_promotion_data');
                        $promotion_url = base_url() . "promotion/promotion_form/" . $user_data['promotion_id'];
                        ?>
                        <div class="btn-modal"><a href="javascript:void(0)"
                                                  onClick="$('#modal_block1').modal('hide');
                                                      window.location.href = '<?php echo $promotion_url ?>'"
                                                  class="floatright1 block_bttn1 btn btn-primary btn-sm">OK <i
                                    class="glyphicon glyphicon-chevron-right"></i></a></div>
                    </div>
                </div>              
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>              



    <div class="modal fade" id="modal_block1">
        <div class="modal-dialog">
            <div class="modal-content">           
                <div class="modal-body">
                    <div class="box-content-modal">
                        <h2 class="title-modal blink">Warning:</h2>
                        <p><?php  echo preg_replace('/\bPHRASE\b/', $user_email, $promotion_message[0]['resend_block_msg']); ?></p>
                        <div class="clearfix"></div>
                        <?php
                        $user_data = $this->session->userdata('user_promotion_data');
                        $promotion_url = base_url() . "promotion/promotion_form/" . $user_data['promotion_id'];
                        ?>
                        <div class="btn-modal"><a href="javascript:void(0)"
                                                  onClick="$('#modal_block1').modal('hide');
                                                      window.location.href = '<?php echo $promotion_url ?>'"
                                                  class="floatright1 block_bttn1 btn btn-primary btn-sm">OK <i
                                    class="glyphicon glyphicon-chevron-right"></i></a></div>
                    </div>
                </div>             
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modal_block2">
        <div class="modal-dialog">
            <div class="modal-content">               
                <div class="modal-body">
                    <div class="box-content-modal">
                        <h2 class="title-modal blink">Warning:</h2>
                        <p><?php  echo preg_replace('/\bPHRASE\b/', $user_email, $promotion_message[0]['error_code_block_msg']); ?></p>
                        <div class="clearfix"></div>
                        <?php
                        $user_data = $this->session->userdata('user_promotion_data');
                        $promotion_url = base_url() . "promotion/promotion_form/" . $user_data['promotion_id'];
                        ?>
                        <div class="btn-modal"><a href="javascript:void(0)"
                                                  onClick="$('#modal_block1').modal('hide');
                                                      window.location.href = '<?php echo $promotion_url ?>'"
                                                  class="floatright1 block_bttn1 btn btn-primary btn-sm">OK <i
                                    class="glyphicon glyphicon-chevron-right"></i></a></div>
                    </div>
                </div>               
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    </div>
    <script type="text/javascript">

        var url =  "promotion/get_timer";
        var postData = {
            value:'verify'
        };
        $.post(url, postData, function(data) {
            var time = data[0]['promotion_popup_timer']*60;

            clock = $('#timer').FlipClock(time, {
                clockFace: 'HourCounter',
                countdown: true,
                callbacks: {
                    stop: function() {
                        doneHandler(true);
                    }
                }
            });
        },'JSON');
    </script>