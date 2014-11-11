
<script type="text/javascript" src="<?php echo site_url('assets/master/js/contact_us.js'); ?>"></script>
<!-- <script type="text/javascript" src="<?php //echo site_url('assets/template/js/msdropdown/jquery.dd.min.js'); ?>"></script> -->
<script type="text/javascript">

    function data_show_from_session() {
        var name = '<?php if (isset($block_email_info[0]->name) && $block_email_info[0]->name != "")
    echo $block_email_info[0]->name;
else
    echo "";
?>';
        if (name != "") {
            var split_name = name.split(".");
            $('#salutation option[value="' + split_name[0] + '"]').prop('selected', true);
            var split_name_space = name.split(" ");
            $("#name").val(split_name_space[1]);

        }
        var email = '<?php if (isset($block_email_info[0]->email) && $block_email_info[0]->email != "")
    echo $block_email_info[0]->email;
else
    echo "";
?>';
        if (email != "") {
            $("#email").val(email);
            contact_timer("edit");
        }
        var company = '<?php if (isset($block_email_info[0]->company) && $block_email_info[0]->company != "")
    echo $block_email_info[0]->company;
else
    echo "";
?>';
        if (company != "") {
            $("#company").val(company);
        }
        var branch = '<?php if (isset($block_email_info[0]->branch) && $block_email_info[0]->branch != "")
    echo $block_email_info[0]->branch;
else
    echo "";
?>';
        if (branch != "") {
            $('#branch option[value="' + branch + '"]').prop('selected', true);
        }
        var designation = '<?php if (isset($block_email_info[0]->designation) && $block_email_info[0]->designation != "")
    echo $block_email_info[0]->designation;
else
    echo "";
?>';
        if (designation != "") {
            $("#designation").val(designation);
        }
        var country = '<?php if (isset($block_email_info[0]->country) && $block_email_info[0]->country != "")
    echo $block_email_info[0]->country;
else
    echo "";
?>';
        if (country != "") {
            $('#country option[value="' + country + '"]').prop('selected', true);
        }
        var contact = '<?php if (isset($block_email_info[0]->contact) && $block_email_info[0]->contact != "")
    echo $block_email_info[0]->contact;
else
    echo "";
?>';
        if (contact != "") {
            $("#contact_num").val(contact);
        }
        var message = '<?php if (isset($block_email_info[0]->message) && $block_email_info[0]->message != "")
    echo $block_email_info[0]->message;
else
    echo "";
?>';
        if (message != "") {
            $("#message").val(message);
        }


    }
  
</script> 

<div class="container">
    <div class="main-page contact-us-page">
        <div class="car-lists">
            <div class="form-fill-cart dis-form margintop30px">
                <div class="row">
                    <div class="col-md-5">
                        <div class="contact-opacity">
                            <h5 id="kgtnomargin">Head Office:</h5>

                            <div class="marginleft50px">
                                <p>7339 Macpherson Avenue, Office 405 </p>
                                <p>Burnaby, British Columbia </p> V5J0B1, Canada 
                                <p>TEL/FAX: <b>+16043608805</b></p>
                            </div>	
                        </div>
                        <div class="kgt60" id="contact_msg"></div>
                        <div id="countdownplace" class="kgt61" ></div>
                        <div class="contact-opacity">
                            <form class="form-horizontal" id="myForm" role="form" method="post" >
                                <input type="hidden" id="operation" name="operation" value="set">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Branch</label>
                                    <div class="col-md-8 controls">
                                        <select  name="branch" id="branch" class="width100percent1">                                            
                                            <option value='Canada-Vancouver' data-image="<?= global_img_link('blank.gif', 'template/images/msdropdown/icons/') ?>" data-imagecss="flag ca" data-title="Andorra">Canada, Vancouver</option>
                                            <option value='UK-London' data-image="<?= global_img_link('blank.gif', 'template/images/msdropdown/icons/') ?>" data-imagecss="flag gb" data-title="United Arab Emirates">UK, London</option>
                                            <option value='UAE-Dubai' data-image="<?= global_img_link('blank.gif', 'template/images/msdropdown/icons/') ?>" data-imagecss="flag ae" data-title="Afghanistan">UAE, Dubai</option>
                                            <option value='Tunisia-Tunis' data-image="<?= global_img_link('blank.gif', 'template/images/msdropdown/icons/') ?>" data-imagecss="flag tn" data-title="Antigua and Barbuda">Tunisia, Tunis</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Title</label>
                                    <div class="col-md-8 controls">
                                        <select class="col-md-12 nopadding width100percent1" name="salutation" id="salutation">
                                            <option value='Mr' data-title="Mr">Mr.</option>
                                            <option value='Ms' data-title="Ms">Ms.</option>
                                        </select>
                                    </div>
                                </div>                    

                                <div class="form-group">
                                    <label class="col-md-4 control-label kgt45">Name and Surname</label>

                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Name and Surname" required>
                                        <span class="red1"><?php echo form_error('name'); ?></span>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Company</label>
                                    <div class="col-md-8">
                                        <input type="text" name="company" id="company" class="form-control" placeholder="Company" required>
                                        <span class="red1"><?php echo form_error('company'); ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Designation</label>
                                    <div class="col-md-8">
                                        <input type="text" name="designation" id="designation" class="form-control" placeholder="Designation" required>
                                        <span class="red1"><?php echo form_error('designation'); ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Country</label>
                                    <div class="col-md-8 country_content">
                                        <select name="country" id="countries" class="width270px" >

<?php foreach ($countries as $country) { ?>
                                                <option value='<?php echo htmlentities($country['countryName'], ENT_QUOTES); ?>' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag <?php echo htmlentities($country['alpha_2']); ?>" data-title="<?php echo htmlentities($country['countryName']); ?>" <?php if ($country['countryName'] == "Canada") { ?> selected="selected"<?php } ?>><?php echo $country['countryName']; ?></option>
<?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Telephone</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="contact" id="contact_num" placeholder="Telephone" required>
                                        <span class="red1"><?php echo form_error('contact'); ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Email</label>
                                    <div class="col-md-8">
                                        <input type="email" class="form-control" placeholder="Email" name="email" id="email" required
                                               onblur="block_email_check();">
                                        <span class="red1"><?php echo form_error('email'); ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Message</label>
                                    <div class="col-md-8">
                                        <textarea class="form-control" name="message" id="message" placeholder="Message" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group btn_rightalign">&nbsp;
                                    <div class="col-md-12">
                                        <input type="submit" value="Submit" class="btn btn-primary btn-sm"/>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </form>            
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="div-map">
                            <img src="<?= global_img_link('bg-map.png', 'template/images/') ?>" alt="map" class="img-responsive"/>
                            <img src="<?= global_img_link('0.gif', 'template/') ?>" alt="" width="20" height="20"
                                 class="kgtcanadaphone" title="Canada, Vancouver Tel: +1-604-360-8805">
                            <img src="<?= global_img_link('0.gif', 'template/') ?>" alt="" width="20" height="20"
                                 class="kgtukphone" title="UK, London Tel: +44-7455-224987">
                            <img src="<?= global_img_link('0.gif', 'template/') ?>" alt="" width="20" height="20"
                                 class="kgttunisiaphone" title="Tunisia, Tunis Tel: +216-20-999-851">
                            <img src="<?= global_img_link('0.gif', 'template/') ?>" alt="" width="20" height="20"
                                 class="kgtdubaiphone" title="UAE, Dubai Tel: +971-56-297-2148">
                        </div>
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
                    <h2 class="title-modal floatleft1">Contact Us Form Preview</h2>

                    <div class="kgt9" id="contact_preview__msg"></div>
                    <div id="contact_view_timer" class="kgt62"></div>
                    <div class="clear-fix1"></div>
                    <div class="show_data"></div>
                    <div class="clearfix"></div>
                    <div class="btn-modal">				      				
                        <br />
                        <div class="row">
                            <div class="col-xs-4 col-md-4 text-center">
                                <a href="#" class="btn btn-primary btn-sm" id="send_form">Send <i class="glyphicon glyphicon-chevron-right"></i></a>
                            </div>
                            <div class="col-xs-4 col-md-4 text-center">
                                <a href="javascript:void(0)" id="edit_bttn" class="floatright1 btn btn-primary btn-sm">EDIT <i class="glyphicon glyphicon-chevron-right"></i></a>
                            </div>
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
                    <h2 class="title-modal">Success</h2>
                    <p id="success_msge"></p>
                    <div class="clearfix"></div>
                    <div class="btn-modal">
                        <a href="javascript:void(0)" id="ok_bttn" onClick="$('#modal_success').modal('hide')" class="floatright1 btn btn-primary btn-sm">OK <i class="glyphicon glyphicon-chevron-right"></i></a>
                    </div>
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
                    <p id="contact_form_error_msge"></p>
                    <div class="clearfix"></div>
                    <div class="btn-modal">
                        <a href="javascript:void(0)" id="error_bttn" onClick="$('#modal_error').modal('hide')" class="floatright1 btn btn-primary btn-sm">OK <i class="glyphicon glyphicon-chevron-right"></i></a>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--block msge-->                
<div class="modal fade" id="modal_block1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="box-content-modal">
                    <h2 class="title-modal blink">Warning: </h2>
<?php
$email = $this->session->flashdata("email_address");
?>
                    <p><?php echo preg_replace('/\bPHRASE\b/', $email, $contact_msg[0]['refreshed_msg']); ?></p>
                    <div class="clearfix"></div>
                    <div class="btn-modal">
                        <a href="javascript:void(0)" onClick="$('#modal_block1').modal('hide');" class="floatright1 block_bttn1 btn btn-primary btn-sm">OK <i class="glyphicon glyphicon-chevron-right"></i></a>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="timeout_modal_block">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="box-content-modal">
                    <h2 class="title-modal blink">Warning: </h2>

<?php
$user_data = $this->session->userdata('new_session');

$msg = preg_replace('/\bPHRASE\b/', $user_data['email'], $contact_msg[0]['preview_timeout']); //"Unfortunately, you did not accomplish the required task within the given lead-time.  Therefore, you will be welcome to use an alternative email or wait for 120 minutes to use the current email " . $user_data['email'] . " within our website. ";
?>
                    <p><?php echo $msg; ?></p>
                    <div class="clearfix"></div>
                    <div class="btn-modal">
                        <a href="javascript:void(0)" onClick="$('.modal').modal('hide');
                                if (typeof clock !== 'undefined') {
                                    clock.reset();
                                }
                                $('#countdownplace').html('');
                                contact_timer('edit');" class="floatright1 block_bttn1 btn btn-primary btn-sm">OK <i class="glyphicon glyphicon-chevron-right"></i></a>
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
                        <a href="javascript:void(0)" onClick="$('.modal').modal('hide');
                                if (typeof clock !== 'undefined') {
                                    clock.reset();
                                }
                                contact_timer('edit');" class="floatright1 block_bttn1 btn btn-primary btn-sm">OK <i class="glyphicon glyphicon-chevron-right"></i></a>
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
                                if (typeof clock !== 'undefined') {
                                    clock.reset();
                                }
                                document.location.href = '<?php echo site_url("contact") ?>';" class="floatright1 block_bttn1 btn btn-primary btn-sm">OK <i class="glyphicon glyphicon-chevron-right"></i></a>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
