<script type="text/javascript">
    var base_url = '<?php echo base_url(); ?>';
    

    function data_show_from_session(){
        var name = '<?php if (isset($block_email_info[0]->name) && $block_email_info[0]->name != "") echo $block_email_info[0]->name; else echo ""; ?>';
        if(name!=""){
            var split_name = name.split(".");
            $('#salutation option[value="' + split_name[0] + '"]').prop('selected', true);
            var split_name_space = name.split(" ");
            $("#name").val(split_name_space[1]);
            
        }
        var email = '<?php if (isset($block_email_info[0]->email) && $block_email_info[0]->email != "") echo $block_email_info[0]->email; else echo ""; ?>';
        if(email!=""){
            $("#email").val(email);
            contact_timer('edit');
        }
        var company = '<?php if (isset($block_email_info[0]->company) && $block_email_info[0]->company != "") echo $block_email_info[0]->company; else echo ""; ?>';
        if(company!=""){
            $("#company").val(company);
        }
        var branch = '<?php if (isset($block_email_info[0]->branch) && $block_email_info[0]->branch != "") echo $block_email_info[0]->branch; else echo ""; ?>';
        if(branch!=""){
            $('#branch option[value="' + branch + '"]').prop('selected', true);
        }
        var designation = '<?php if (isset($block_email_info[0]->designation) && $block_email_info[0]->designation != "") echo $block_email_info[0]->designation; else echo ""; ?>';
        if(designation!=""){
            $("#designation").val(designation);
        }
        var country = '<?php if (isset($block_email_info[0]->country) && $block_email_info[0]->country != "") echo $block_email_info[0]->country; else echo ""; ?>';
        if(country!=""){
            $('#country option[value="' + country + '"]').prop('selected', true);
        }
        var contact = '<?php if (isset($block_email_info[0]->contact) && $block_email_info[0]->contact != "") echo $block_email_info[0]->contact; else echo ""; ?>';
        if(contact!=""){
            $("#contact_num").val(contact);
        }
        var message = '<?php if (isset($block_email_info[0]->message) && $block_email_info[0]->message != "") echo $block_email_info[0]->message; else echo ""; ?>';
        if(message!=""){
            $("#message").val(message);
        }
        
        
    }
</script>
<script type="text/javascript" src="<?php echo site_url('assets/master/js/promotion_form.js'); ?>"></script>
<div>
    <div class="container">
        <div class="main-page contact-us-page">
            <div class="car-lists">
                <div class="form-fill-cart dis-form margintop30px">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="contact-opacity">
                                <h5 id="kgtnomargin"><?php echo lang('Head Office:') ?></h5>

                                <div class="marginleft50px">
                                    <p><?php echo lang('7339 Macpherson Avenue, Office 405') ?> </p>

                                    <p><?php echo lang('Burnaby, British Columbia') ?> </p>
<?php echo lang('V5J0B1, Canada') ?>
                                    <p><?php echo lang('TEL/FAX:') ?> <b>+16043608805</b></p>
                                </div>
                            </div>
                            <div class="kgt70" id="promotion_msg"></div>
                            <div id="countdownplace" class="kgt71"></div>
                            <div class="contact-opacity">
                                <form class="form-horizontal" id="myForm" role="form" method="post">
                                    <!-- the form is submitted though the piece of code : $("form").submit(function() {  in this file in the script section -->
                                    <input type="hidden" id="operation" name="operation" value="set">
                                    <input type="hidden" id="user_code" name="user_code" value="<?php echo $user_code; ?>">
                                    <input type="hidden" id="promotion_id" name="promotion_id" value="<?php echo $promotion_id; ?>">
                                    <div class="form-group">
                                        <label for="branch" class="col-sm-4 control-label"><?php echo lang('Branch') ?></label>
                                        <div class="col-sm-8">
                                            <select name="branch" id="branch" class="width100percent1">
                                                <option value='Canada, Vancouver' data-image="assets/template/images/msdropdown/icons/blank.gif"
                                                        data-imagecss="flag ca" data-title="Andorra">Canada, Vancouver
                                                </option>
                                                <option value='UK, London' data-image="assets/template/images/msdropdown/icons/blank.gif"
                                                        data-imagecss="flag gb" data-title="United Arab Emirates">UK, London
                                                </option>
                                                <option value='UAE, Dubai' data-image="assets/template/images/msdropdown/icons/blank.gif"
                                                        data-imagecss="flag ae" data-title="Afghanistan">UAE, Dubai
                                                </option>
                                                <option value='Tunisia, Tunis' data-image="assets/template/images/msdropdown/icons/blank.gif"
                                                        data-imagecss="flag tn" data-title="Antigua and Barbuda">Tunisia, Tunis
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Title</label>
                                        <div class="col-sm-8">
                                            <select name="salutation" id="promotion_salutation" class="width100percent1">
                                                <option value='Mr' data-title="Mr">Mr.</option>
                                                <option value='Ms' data-title="Ms">Ms.</option>
                                            </select>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label for="name" class="col-sm-4 control-label kgt45"
                                               ><?php echo lang('Name and Surname') ?></label>

                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Name and Surname" required>
                                            <span class="red1"><?php echo form_error('name'); ?></span></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="company" class="col-sm-4 control-label"><?php echo lang('Company') ?></label>
                                        <div class="col-sm-8">
                                            <input type="text" name="company" id="company" class="form-control" placeholder="<?php echo lang('Company') ?>"
                                                   required>
                                            <span class="red1"><?php echo form_error('company'); ?></span></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="designation" class="col-sm-4 control-label"><?php echo lang('Designation') ?></label>
                                        <div class="col-sm-8">
                                            <input type="text" name="designation" id="designation" class="form-control"
                                                   placeholder="<?php echo lang('Designation') ?>" required>
                                            <span class="red1"><?php echo form_error('designation'); ?></span></div>
                                    </div>
                                    <input type="hidden" name="country_flag" id="country_flag"/>
                                    <div class="form-group">
                                        <label for="countries" class="col-sm-4 control-label"><?php echo lang('Country') ?></label>
                                        <div class="col-sm-8">
                                            <select name="country" id="countries" class="width100percent1">
<?php foreach ($countries as $country) { ?>
                                                    <option value='<?php echo htmlentities($country['countryName'], ENT_QUOTES); ?>' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag <?php echo htmlentities($country['alpha_2']); ?>" data-title="<?php echo htmlentities($country['countryName']); ?>" <?php if ($country['countryName'] == "Canada") { ?> selected="selected"<?php } ?>><?php echo $country['countryName']; ?></option>
<?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="contact_num" class="col-sm-4 control-label"><?php echo lang('Telephone') ?></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="contact" id="contact_num"
                                                   placeholder="<?php echo lang('Telephone') ?>" required>
                                            <span class="red1"><?php echo form_error('contact'); ?></span></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-4 control-label"><?php echo lang('Email') ?></label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control" placeholder="<?php echo lang('Email') ?>" name="email" id="email"
                                                   required onblur="block_email_check();">
                                            <span class="red1"><?php echo form_error('email'); ?></span></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="message" class="col-sm-4 control-label"><?php echo lang('Message') ?></label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" name="message" id="message" placeholder="<?php echo lang('Message') ?>"
                                                      required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group btn_rightalign">&nbsp;
                                        <div class="col-sm-12">
                                            <input type="submit" value="Submit" class="btn btn-primary btn-sm"/>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </form>
<?php
if ($this->session->flashdata('success')) {
    $msg = $this->session->flashdata('success');
    ?>
                                    <div class="note color0f0"><?php echo $msg; ?></div>
    <?php
}
?>
<?php
if ($this->session->flashdata('error')) {
    $msg = $this->session->flashdata('error');
    ?>
                                    <div class="error"><?php echo $msg; ?> </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="div-map"><img src="assets/template/images/bg-map.png" alt="map" class="img-responsive"/> <img
                                    src="assets/template/0.gif" alt="" width="20" height="20" ckass="kgt72"
                                    title="Canada, Vancouver Tel: +1-604-360-8805"> <img src="assets/template/0.gif" alt="" width="20"
                                    height="20"
                                    class="kgtukphone"
                                    title="UK, London Tel: +44-7455-224987"> <img
                                    src="assets/template/0.gif" alt="" width="20" height="20" class="kgttunisiaphone"
                                    title="Tunisia, Tunis Tel: +216-20-999-851"> <img src="assets/template/0.gif" alt="" width="20" height="20"
                                    class="kgtdubaiphone"
                                    title="UAE, Dubai Tel: +971-56-297-2148"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End content-->
    </div>
    <div class="modal fade" id="modal_block">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="box-content-modal">
                        <h2 class="title-modal"><?php echo lang('Your Form') ?></h2>

                        <div class="kgt74"
                             id="promotion_preview_msg"></div>
                        <div class="marginleft2percent" id="countdownplace_preview"></div>
                        <div class="clear"></div>
                        <div class="show_data"></div>
                        <div class="clearfix"></div>
                        <div class="btn-modal"> <br />
                            <div class="row">
                                <div class="col-xs-4 col-md-4 text-center"><a href="#" class="btn btn-primary btn-sm"
                                                                              id="send_form"><?php echo lang('Send') ?> <i
                                            class="glyphicon glyphicon-chevron-right"></i></a></div>
                                <div class="col-xs-4 col-md-4 text-center"><a href="javascript:void(0)"
                                                                              id="edit_bttn"
                                                                              onClick="$('#modal_block').modal('hide');"
                                                                              class="floatright1 btn btn-primary btn-sm"><?php echo lang('EDIT') ?>
                                        <i class="glyphicon glyphicon-chevron-right"></i></a></div>
                            </div>
                        </div>
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
                        <h2 class="title-modal"><span class="blink"><?php echo lang('Success') ?>&nbsp;</span></h2>
                        <p id="success_msge"></p>
                        <div class="clearfix"></div>
                        <div class="btn-modal"><a href="javascript:void(0)" id="ok_bttn"
                                                  onClick="$('#modal_success').modal('hide')"
                                                  class="floatright1 btn btn-primary btn-sm"><?php echo lang('OK') ?> <i
                                    class="glyphicon glyphicon-chevron-right"></i></a></div>
                    </div>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="modal_error">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="box-content-modal">
                        <h2 class="title-modal blink">Warning: </h2>
                        <p id="error_msge"></p>
                        <div class="clearfix"></div>
                        <div class="btn-modal"><a href="javascript:void(0)" id="error_bttn"
                                                  onClick="edit_promotion();"
                                                  class="floatright1 btn btn-primary btn-sm"><?php echo lang('OK') ?> <i
                                    class="glyphicon glyphicon-chevron-right"></i></a></div>
                    </div>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <div class="modal fade" id="timeout_modal_block_promotion" data-refresh="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="box-content-modal">
                        <h2 class="title-modal blink">Warning: </h2>

                        <?php
                        $user_data = $this->session->userdata('new_session');

                        $msg = "Unfortunately, you did not accomplish the required task within the given lead-time.  Therefore, you will be welcome to use an alternative email or wait for 120 minutes to use the current email " . $user_data['email'] . " within our website. ";
                        ?>
                        <p><?php echo $msg; ?></p>
                        <div class="clearfix"></div>
                        <div class="btn-modal">
                            <a href="javascript:void(0)" onClick="$('.modal').modal('hide');"
                               class="floatright1 block_bttn1 btn btn-primary btn-sm">OK <i
                                    class="glyphicon glyphicon-chevron-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="timeout_modal_block_promotion_edit" data-refresh="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="box-content-modal">
                        <h2 class="title-modal blink">Warning: </h2>

                        <?php
                        $user_data = $this->session->userdata('new_session');

                        $msg = preg_replace('/\bPHRASE\b/', $user_data['email'], $promotion_message[0]['preview_contactus_timeout']);
                        ?>
                        <p><?php echo $msg; ?></p>
                        <div class="clearfix"></div>
                        <div class="btn-modal">
                            <a href="javascript:void(0)" id="block_bttn2"
                               onClick="$('.modal').modal('hide');
                                       contact_timer('main');" class="floatright1 btn btn-primary btn-sm">OK
                                <i class="glyphicon glyphicon-chevron-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <div class="modal fade" id="block_email_check_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="box-content-modal">
                        <h2 class="title-modal blink">Warning: </h2>


                        <p id="block_message"></p>
                        <div class="clearfix"></div>
                        <div class="btn-modal">
                            <a href="javascript:void(0)" onClick="$('.modal').modal('hide')"
                               class="floatright1 block_bttn1 btn btn-primary btn-sm">OK <i
                                    class="glyphicon glyphicon-chevron-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="block_email_timeout_modal">
        <div class="modal-dialog">
            <div class="modal-content">               
                <div class="modal-body">
                    <div class="box-content-modal">
                        <h2 class="title-modal blink">Warning: </h2>
                        <p id="timeout_msg"></p>
                        <div class="clearfix"></div>
                        <div class="btn-modal">
                            <a href="javascript:void(0)" onClick="$('.modal').modal('hide');
                                    $('#myForm')[0].reset();
                                    $('#countdownplace').html('');" class="floatright1 block_bttn1 btn btn-primary btn-sm">OK <i
                                    class="glyphicon glyphicon-chevron-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
