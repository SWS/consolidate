<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/template/css/msdropdown/flags.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/user/career/css/career.css'); ?>">
<script type="text/javascript" src="<?php echo site_url('assets/user/career/js/verify_form.js'); ?>"></script>
 <script type="text/javascript">

	$(document).ready(function() {
	
	 var base_url = '<?php echo base_url(); ?>';
	 
	  $('#ok_bttn').click(function() {

		window.location.href = base_url+"career/interview";

		return false;

	});
	});

</script> 
<div class="bodywrapper">
    <div class="container">
        <div class="main-page">
            <div class="car-lists">
                <div class="form-fill-cart">
                    <div class="row">
                        <div class="col-md-6"> </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End content-->
    </div>
</div>
<div class="modal fade" id="notify_submit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="box-content-modal">
                    <form action="" method="post" id="target" onsubmit="return show(this)">

                        <h2 class="kgttitlemodal title-modal">We sent a
                            verification code to : <?php echo $user_email; ?></h2>
                        <span class="blink"><div class="show_error colorgray"></div></span>

                        <div class="alert-message block-message warning">
                            <div class="product_counter_msg counter_msg_wrap verfication_error_msg"> </div>
                        </div>
                        <div>
                            <div class="col-md-6">
                                <label><?php echo lang('Please enter the code'); ?>:
                                    <input type="text" name="code" required autofacus>
                                </label>
                            </div>
                            <div class="col-md-6">
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
                                <div class="col-xs-4 col-md-4 text-center"><a href="#" id="resend_mail"
                                                                              class="btn btn-primary btn-sm"><?php echo lang('resend'); ?>
                                        <i class="glyphicon glyphicon-chevron-right"></i></a></div>
                                <div class="col-xs-4 col-md-4 text-center"><a href="javascript:void(0)"
                                                                              onClick="$('#notify_submit').modal('hide');document.location='<?php echo site_url('career') ?>'"
                                                                              id="cancel_form"
                                                                              class="btn btn-primary btn-sm"><?php echo lang('cancel'); ?>
                                        <i class="glyphicon glyphicon-chevron-right"></i></a></div>
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
                    
                    <?php if(isset($user_data['email']) && $user_data['email'] != '') {
                            $user_email = $user_data['email'];
                         } else { 
                             $user_email = '';                            
                         }
                     ?>
                    <p><?php echo preg_replace('/\bPHRASE\b/', $user_email, $career_msg[0]['validate_confirm']); ?></p>
                   
                    <div class="clearfix"></div>
                    <div class="btn-modal"><a href="javascript:void(0)" id="ok_bttn"
                                              onClick="$('#modal_success').modal('hide')"
                                              class="floatright1 btn btn-primary btn-sm"><?php echo lang('OK'); ?> <i
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
                    <span class="blink"><h2 class="title-modal">Warning</h2></span>
          
                    <?php
                    $user_data = $this->session->userdata("user_interview_data");
                    ?>
                    <p id="block_message"><?php echo preg_replace('/\bPHRASE\b/', $user_data['email'], $career_msg[0]['error_code_block_msg']); ?></p>

                    <div class="clearfix"></div>
                    <div class="btn-modal"><a href="javascript:void(0)"
                                              onClick="$('.modal_block').modal('hide');document.location='<?php echo site_url('career') ?>'"
                                              class="floatright1 btn btn-primary btn-sm"><?php echo lang('OK'); ?> <i
                                class="block_bttn glyphicon glyphicon-chevron-right"></i></a></div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
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
                    <p id="block_message"><?php echo preg_replace('/\bPHRASE\b/', $user_data['email'], $career_msg[0]['code_timeout_block_msg']); ?></p>

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

<div class="modal fade" id="modal_block_email_sent">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="box-content-modal">
                    <span class="blink"><h2 class="title-modal">Warning</h2></span>
          
                    <?php
                    $user_data = $this->session->userdata("user_interview_data");
                    ?>
                    <p><?php echo preg_replace('/\bPHRASE\b/', $user_data['email'], $career_msg[0]['resend_block_msg']); ?></p>
                  
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
