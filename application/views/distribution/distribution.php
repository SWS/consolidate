<!--added for distributionby jluna-->
<script type="text/javascript" src="<?php echo site_url('assets/master/js/distribution.js'); ?>"></script>
<!--Modal shopping decision cart-->
<div class="modal fade" id="notify_panel">
    <div class="modal-dialog">modal_dist_preview_popup
        <div class="modal-content">
            <div class="modal-body">
                <div class="box-content-modal">
                    <div id="div_id_notifications_panel">
                        <h1 class="title-modal"><?php echo $this->lang->line('notify_panel_title'); ?></h1>
                        <div class="clearfix"></div>
                        <div class="btn-modal toyota-page">
                            <div class="row">
                                <div class="col-xs-4 col-md-4 text-center">
                                    <a id="notify_panel_close_button"
                                       class="btn btn-primary btn-sm"><?php echo $this->lang->line('close_button'); ?>
                                        <i class="glyphicon glyphicon-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->


<!--Modal shopping decision cart-->
<div class="modal fade" id="code_verification">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="box-content-modal">

                    <div class="div_id_verification_warning redunderline"></div>

                    <div class="div_id_verification_error"></div>
                    <div id="div_id_verification_panel">
                        <h2 class="title-modal kgtverification">We sent a
                            verification code to :<span
                                id="user_email"><?php echo isset($_POST['email']) ? $_POST['email'] : ""; ?></span></h2>

                        <div id="div_id_verification_message colorgray"></div>
                        <div class="send-verification-code-1">
                            <div class="clock-timer kgttimerstyle" 
                                 id="timer3"></div>
                        </div>
                        <p><label
                                for="txt_verification_code"><?php echo $this->lang->line('code_verification_please_enter_code'); ?></label><input
                                id="txt_verification_code" type="text" name="code" required></div>
                    <div class="clearfix"></div>
                    <div id="all_button" class="btn-modal toyota-page">
                        <div class="row">
                            <div class="col-xs-4 col-md-4 text-center">
                                <a id="code_verification_ok_verify_button"
                                   class="btn btn-primary btn-sm"><?php echo $this->lang->line('confirm_button'); ?> <i
                                        class="glyphicon glyphicon-chevron-right"></i></a>
                            </div>
                            <div class="loading kgtloadingmargin"></div>
                            <div class="col-xs-4 col-md-4 text-center">
                                <a id="code_verification_resend_code_button"
                                   class="btn btn-primary btn-sm"><?php echo $this->lang->line('resend_button'); ?> <i
                                        class="glyphicon glyphicon-chevron-right"></i></a>
                            </div>
                            <div class="col-xs-4 col-md-4 text-center">
                                <a id="code_verification_cancel_button"
                                   class="btn btn-primary btn-sm"><?php echo $this->lang->line('cancel_button'); ?> <i
                                        class="glyphicon glyphicon-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="div_id_verification_block">
                        <div class="clearfix"></div>
                        <div class="btn-modal toyota-page">
                            <div class="row">
                                <div class="padding10px" id="div_id_verification_message1"></div>
                                <div class="col-xs-4 pull-right col-md-4 text-center">

                                    <a class="code_verification_block_close_button btn btn-primary btn-sm"><?php echo $this->lang->line('close_button'); ?>
                                        <i class="glyphicon glyphicon-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="code_verification1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="box-content-modal">
                    <div class="div_id_verification_block">
                        <div class="clearfix"></div>
                        <div class="btn-modal toyota-page">
                            <div class="row padding5px">
                                <div class="div_id_verification_warning redunderline"></div>

                                <div class="div_id_verification_error"></div>

                                <a class="code_verification_block_close_button btn pull-right btn-primary btn-sm"><?php echo $this->lang->line('close_button'); ?>
                                    <i class="glyphicon glyphicon-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->


<!--Modal shopping decision cart-->
<div class="modal fade <?php echo (isset($email_message)) ? 'in' : ""; ?> <?php echo (isset($email_message)) ? 'displayblock' : ""; ?>"
     id="modal_success">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="box-content-modal">
                    <h1 class="title-modal"><?php echo $this->lang->line('modal_success_title'); ?></h1>

                    <div id="modal_success_message"><?php echo (isset($email_message)) ? $email_message : ""; ?></div>
                    <div id="modal_success_error"><?php echo (isset($email_error)) ? $email_error : ""; ?></div>
                    <div class="clearfix"></div>
                    <div class="btn-modal">
                        <a class="modal-success-1 btn btn-primary btn-sm"
                           href="distribution/index"><?php echo $this->lang->line('ok_button'); ?> <i
                                class="glyphicon glyphicon-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->


<!--Modal shopping decision cart-->
<div class="modal fade" id="block_box">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="box-content-modal">
                    <div class="blockElementWrap">
                        <div class="blockMsg" id="blckMsg"></div>
                    </div>
                    <br><br>
                    <input id="hidden" value="" type="hidden"/>
                    <div class="clearfix"></div>

                    <div class="clearfix"></div>
                    <div class="btn-modal">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 text-right">
                                <a class="btn btn-primary btn-sm"
                                   id="blck_confirm_msg"><?php echo $this->lang->line('ok_button'); ?> <i
                                        class="glyphicon glyphicon-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--Modal shopping decision cart-->
<div class="modal fade" id="block_box1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="box-content-modal">
                    <div class="blockElementWrap">
                        <div class="blockMsg" id="blckMsg1"></div>
                    </div>
                    <br><br>
                    <input id="hidden2" value="" type="hidden"/>

                    <div class="clearfix"></div>

                    <div class="clearfix"></div>
                    <div class="btn-modal">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 text-right">
                                <a class="btn btn-primary btn-sm"
                                   id="blck_confirm_msg1"><?php echo $this->lang->line('ok_button'); ?> <i
                                        class="glyphicon glyphicon-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--Modal shopping decision cart-->
<div class="modal fade" id="modal_dist_popup">
<div class="modal-dialog modal-dist-popup-width">
<div class="modal-content modal-dist-popup-width-2">
<div class="modal-body modal-dist-popup-width-3">
<div class="box-content-modal modal-dist-popup-width-4">
<div class="container modal-dist-popup-width-5">
<div class="index-page">
<div>
<div class="form-fill-cart dis-form">
    <h2 class="title-modal text-align-center"><?php echo $this->lang->line('modal_dist_popup_title'); ?></h2>

    <div class="modal-dist-popup-counter-styles">
        <div  class="clock-timer kgt47" id="timer1"></div>
    </div>
    <div class="modal-dist-popup-counter-styles">
        <div id="timer4"></div>
    </div>
    <p><?php echo $this->lang->line('modal_dist_popup_header'); ?></div>
<div>
<div class="modal-dist-popup">
<form enctype="multipart/form-data" name="frm_distribution_application" id="frm_id_distribution_application"
      action="distribution/index/do_upload" method="post" class="form-horizontal" role="form">
<div class="form-group">
    <label for="company"
           class="col-md-4 col-sm-4  col-xs-12 "><strong><?php echo $this->lang->line('modal_dist_popup_company_name'); ?></strong></label>

    <input type="text" required class="col-md-8 col-sm-8  col-xs-12  " name="company" id="company"
           value="<?php echo isset($_POST["company"]) ? $_POST["company"] : ""; ?>"
           placeholder="<?php echo $this->lang->line('modal_dist_popup_company_name'); ?>" maxlength="64">
    <?php echo form_error('company'); ?>

                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 col-sm-4  col-xs-12 "><strong>Title</strong></label>
                                                <select name="salutation" class="promotion_salutation col-md-8 col-sm-8   col-xs-12  ">

                                                    <option value='Mr'>Mr.</option>
                                                    <option value='Ms'>Ms.</option>
                                                </select>

</div>
<div class="form-group">
    <label
        class="col-md-4 col-sm-4  col-xs-12 "><strong><?php echo $this->lang->line('modal_dist_popup_applicant_name'); ?></strong></label>
    <input type="text" class="applicant col-md-8 col-sm-8   col-xs-12" required name="applicant"
           value="<?php echo isset($_POST["applicant"]) ? $_POST["applicant"] : ""; ?>"
           placeholder="<?php echo $this->lang->line('modal_dist_popup_applicant_name'); ?>" maxlength="64">
    <?php echo form_error('applicant'); ?>

                                            </div>

                                            <div class="form-group">
                                                <label for="country" class="col-md-4 col-sm-4  col-xs-12 "><strong><?php echo $this->lang->line('modal_dist_popup_country'); ?></strong></label>
                                                <div  class="col-md-8 col-sm-8 col-xs-12  ">
                                                    <select name="country" id="country" style="width: 100%;"> <!--  class="width100percent1" -->
                                                        <?php foreach ($countries as $country) { ?>
                                        <option value='<?php echo $country['idCountry']; ?>' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag <?php echo htmlentities($country['alpha_2']); ?>" data-title="<?php echo htmlentities($country['countryName']); ?>" <?php if ($country['countryName'] == "Canada") { ?> selected="selected"<?php } ?>><?php echo $country['countryName']; ?></option>
                                        <?php } ?>
</select><br>
<input type="hidden" name="hdn_country_label" class="hdn_country_label">
<input type="hidden" name="hdn_country_name" class="hdn_country_name">
<?php echo form_error('country'); ?>
</div>
</div>
<div class="clearfix"></div>
<div class="form-group">
    <label
        class="col-md-4 col-sm-4  col-xs-12 "><strong><?php echo $this->lang->line('modal_dist_popup_complete_address'); ?></strong></label>
    <input class="col-md-8 col-sm-8  col-xs-12  input-address address" required type="text" name="address"
           value="<?php echo isset($_POST["address"]) ? $_POST["address"] : ""; ?>"
           placeholder="<?php echo $this->lang->line('modal_dist_popup_complete_address'); ?>" maxlength="128">
    <?php echo form_error('address'); ?>

                                            </div>

                                            <div class="clearfix"></div>

<div class="form-group">
    <label
        class="col-md-4 col-sm-4  col-xs-12 "><strong><?php echo $this->lang->line('modal_dist_popup_designation'); ?></strong></label>
    <input required type="text" class="col-md-8 col-sm-8   col-xs-12  designation" name="designation"
           value="<?php echo isset($_POST["designation"]) ? $_POST["designation"] : ""; ?>"
           placeholder="<?php echo $this->lang->line('modal_dist_popup_designation'); ?>" maxlength="32">
    <?php echo form_error('designation'); ?>

                                            </div>

<div class="form-group">
    <label
        class="col-md-4 col-sm-4  col-xs-12 "><strong><?php echo $this->lang->line('modal_dist_popup_telephone'); ?></strong></label>
    <input required type="text" class="col-md-8 col-sm-8  col-xs-12  telephone" name="telephone"
           value="<?php echo isset($_POST["telephone"]) ? $_POST["telephone"] : ""; ?>"
           placeholder="<?php echo $this->lang->line('modal_dist_popup_telephone'); ?>" maxlength="32">
    <?php echo form_error('telephone'); ?>

                                            </div>

                                            <div class="clearfix"></div>

<div class="form-group">
    <label
        class="col-md-4 col-sm-4  col-xs-12 "><strong><?php echo $this->lang->line('modal_dist_popup_email'); ?></strong></label>
    <input required type="text" class="col-md-8 col-sm-8  col-xs-12 email " name="email"
           value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ""; ?>"
           placeholder="<?php echo $this->lang->line('modal_dist_popup_email'); ?>" maxlength="128">
    <?php echo form_error('email'); ?>

                                            </div>

<div class="form-group">
    <label
        class="col-md-4 col-sm-4  col-xs-12 "><strong><?php echo $this->lang->line('modal_dist_popup_upload_corporate_trade_licence_copy'); ?></strong></label>

    <div class="col-md-8 col-sm-8  col-xs-12  license">
        <input required type="file" name="license" class="license">
                                                    <span class="help modal-dist-popup-upload-help">
                                                        <?php echo $this->lang->line('modal_dist_popup_license_formats'); ?>
                                                    </span>
                                                </div>

                                            </div>

<div class="form-group">
    <div class="width100percent2 filepreview">
        <input type="hidden" name="hdn_license_preview" class="hdn_license_preview"
               value="<?php echo $license_picture_name; ?>">
        <?php echo $preview; ?>
    </div>
</div>


<div class="clearfix"></div>
<fieldset class="modal-dist-popup-fieldset-width">
    <legend><strong><?php echo $this->lang->line('modal_dist_popup_fieldset_1'); ?></strong></legend>
    <div><input type="radio" name="companysize"
                value="medium" <?php echo (isset($_POST["companysize"]) && $_POST["companysize"] == "medium") ? " checked " : ""; ?>
                class="modal-dist-popup-radio companysize_medium"><span
            class="companysize_html"><?php echo $this->lang->line('modal_dist_popup_fieldset_1_1'); ?></span></div>
    <div><input type="radio" name="companysize"
                value="big" <?php echo (isset($_POST["companysize"]) && $_POST["companysize"] == "big") ? " checked " : ""; ?>
                class="modal-dist-popup-radio companysize_big"><span
            class="companysize_html"><?php echo $this->lang->line('modal_dist_popup_fieldset_1_2'); ?></span></div>
    <?php echo form_error('companysize'); ?>
</fieldset>
<br>
<fieldset class="modal-dist-popup-fieldset-width">
    <legend><strong><?php echo $this->lang->line('modal_dist_popup_fieldset_2'); ?></strong></legend>
    <div><input type="radio" name="companystart"
                value="Brake Pads" <?php echo (isset($_POST["companystart"]) && $_POST["companystart"] == "Brake Pads") ? " checked " : ""; ?>
                class="modal-dist-popup-radio companystart_brake_pads"> <?php echo $this->lang->line('modal_dist_popup_fieldset_2_1'); ?>
    </div>
    <div><input type="radio" name="companystart"
                value="Filters" <?php echo (isset($_POST["companystart"]) && $_POST["companystart"] == "Filters") ? " checked " : ""; ?>
                class="modal-dist-popup-radio companystart_filters"><span
            class="companysize_html"> <?php echo $this->lang->line('modal_dist_popup_fieldset_2_2'); ?></span></div>
    <div><input type="radio" name="companystart"
                value="Brake Lining" <?php echo (isset($_POST["companystart"]) && $_POST["companystart"] == "Brake Lining") ? " checked " : ""; ?>
                class="modal-dist-popup-radio companystart_brake_lining"> <span
            class="companysize_html"><?php echo $this->lang->line('modal_dist_popup_fieldset_2_3'); ?></span></div>
    <?php echo form_error('companystart'); ?>
</fieldset>
<div class="loading"></div>
<h2 class="modal-dist-popup-kgt-support"><?php echo $this->lang->line('modal_dist_popup_kgt_support_1'); ?>(<span
        id="spn_id_Company_1"><?php echo isset($_POST['company']) ? $_POST['company'] : ""; ?></span>) <?php echo $this->lang->line('modal_dist_popup_kgt_support_2'); ?>
    (<span
        id="spn_id_Company_2"><?php echo isset($_POST['company']) ? $_POST['company'] : ""; ?></span>) <?php echo $this->lang->line('modal_dist_popup_kgt_support_3'); ?>
</h2>

<div>
    <input required type="checkbox" name="chk_agree" <?php echo (isset($_POST["chk_agree"])) ? " checked " : ""; ?>
           class="modal-dist-popup-checkbox chk_id_agree">
    <strong><?php echo $this->lang->line('modal_dist_popup_i_understand_1'); ?></strong>
    <?php echo form_error('chk_agree'); ?>
</div>
<div class="modal-dist-popup-fieldset-width">
    <div>
        <strong><?php echo $this->lang->line('modal_dist_popup_sales_force_1'); ?></strong><br>
        <label
            class="col-md-8"><strong><?php echo $this->lang->line('modal_dist_popup_sales_force_2'); ?></strong></label>
        <select class="col-md-4 sel_id_indoor_sales" required name="sel_indoor_sales">
            <option value="">----</option>
            <?php for ($i = 1; $i <= 100; $i++) { ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php } ?>
        </select>
    </div>
    <div>
        <label
            class="col-md-8"><strong><?php echo $this->lang->line('modal_dist_popup_sales_force_3'); ?></strong></label>
        <select class="col-md-4 sel_id_outdoor_sales" name="sel_outdoor_sales">
            <option value="">----</option>
            <?php for ($i = 1; $i <= 100; $i++) { ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php } ?>
        </select>
    </div>
    <?php echo form_error('sel_indoor_sales'); ?><br>
    <?php echo form_error('sel_outdoor_sales'); ?>
</div>
<div class="modal-dist-popup-fieldset-width">
    <label><strong><?php echo $this->lang->line('modal_dist_popup_sales_brief'); ?></strong></label><br>
    <textarea required name="salesbrief"
              class="modal-dist-popup-fieldset-width col-md-12 col-sm-12  col-xs-12 txt_id_salesbrief "><?php echo (isset($_POST['salesbrief'])) ? $_POST['salesbrief'] : ""; ?></textarea>
    <?php echo form_error('salesbrief'); ?>
</div>
<div class="modal-dist-popup-kgt-support">
    <input type="checkbox" name="chk_signup" <?php echo (isset($_POST["chk_signup"])) ? " checked " : ""; ?>
           class="modal-dist-popup-checkbox chk_id_signup">
    <strong><?php echo $this->lang->line('modal_dist_popup_i_am_1'); ?>(<span
            id="spn_id_Applicant_1"><?php echo isset($_POST['applicant']) ? $_POST['applicant'] : ""; ?></span>) <?php echo $this->lang->line('modal_dist_popup_i_am_2'); ?>
        (<span
            id="spn_id_Company_3"><?php echo isset($_POST['company']) ? $_POST['company'] : ""; ?></span>) <?php echo $this->lang->line('modal_dist_popup_i_am_3'); ?>
    </strong>
    <?php echo form_error('chk_signup'); ?>
</div>

<div class="clearfix"></div>
<div class="nav-prex-next text-right">
    <div class="row">
        <div class="col-md-12">
            <a id="cancel" class="btn btn-primary btn-sm"><?php echo $this->lang->line('cancel_button'); ?></a>
            <a id="modal_dist_popup_submit_button"
               class="btn btn-primary btn-sm"><?php echo $this->lang->line('submit_button'); ?></a>
        </div>
    </div>
</div>
</form>

                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>

</div>
<!--End content-->
</div>
</div>
</div>

<span class="dispalynon" id="timeout_msg"><?php echo $distribution_message[0]->timeout_msg; ?></span>
<span class="dispalynon" id="resent_msg"><?php echo $distribution_message[0]->resent_msg; ?></span>
<span class="dispalynon" id="wrong_code_msg"><?php echo $distribution_message[0]->wrong_code_msg; ?></span>
<span class="dispalynon"
      id="application_receipt_msg"><?php echo $distribution_message[0]->application_receipt_msg; ?></span>
<span class="dispalynon" id="blocked_email_msg"><?php echo $distribution_message[0]->blocked_email_msg; ?></span>


<!--Modal shopping decision cart-->
<div class="modal fade" id="modal_dist_preview_popup">
    <div class="modal-dialog modal-dist-popup-width">
        <div class="modal-content modal-dist-popup-width-2">
            <div class="modal-body modal-dist-popup-width-3">
                <div class="box-content-modal modal-dist-popup-width-4">
                    <div class="container modal-dist-popup-width-5">
                        <div class="main-page">
                            <div >
                                <div class="form-fill-cart dis-form">
                                    <h2 class="title-modal text-align-center"><?php echo $this->lang->line('modal_dist_preview_popup_title'); ?></h2>
                                    <div class="modal-dist-popup-counter-styles">
                                        <div   class="clock-timer"  id="timer2"></div>                         
                                    </div>
                                    <p><?php echo $this->lang->line('modal_dist_preview_popup_header'); ?></div>
                                <div >
                                    <div class="modal-dist-popup">

                                        <form name="frm_distribution_application_preview"
                                              id="frm_id_distribution_application_preview"
                                              action="distribution/index/do_send_email" method="post"
                                              class="form-horizontal" role="form">
                                            <input type="hidden" name="edit_distribution_popup" value="true">
                                            <div class="form-group">
                                                <div class="col-md-4 col-sm-4  col-xs-12 ">
                                                    <strong><?php echo $this->lang->line('modal_dist_popup_company_name'); ?></strong>
                                                </div>
                                                <div
                                                    class="col-md-8 col-sm-8  col-xs-12 company_preview"><?php echo isset($_POST['company']) ? $_POST['company'] : ""; ?></div>
                                                <input type="hidden" class="company_preview" name="company"
                                                       value="<?php echo isset($_POST['company']) ? $_POST['company'] : ""; ?>">

                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4 col-sm-4  col-xs-12 "><strong>Title</strong></div>

                                                <div
                                                    class="salutation col-md-8 col-sm-8  col-xs-12"> <?php echo isset($_POST['salutation']) ? $_POST['salutation'] : ""; ?></div>
                                                <input type="hidden" class="salutation" name="salutation"
                                                       value="<?php echo isset($_POST['salutation']) ? $_POST['salutation'] : ""; ?>">

                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4 col-sm-4  col-xs-12 ">
                                                    <strong><?php echo $this->lang->line('modal_dist_popup_applicant_name'); ?></strong>
                                                </div>
                                                <div
                                                    class="applicant col-md-8 col-sm-8  col-xs-12"><?php echo isset($_POST['applicant']) ? $_POST['applicant'] : ""; ?></div>
                                                <input type="hidden" name="applicant" class="applicant"
                                                       value="<?php echo isset($_POST['applicant']) ? $_POST['applicant'] : ""; ?>">

                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-4 col-sm-4  col-xs-12 ">
                                                    <strong><?php echo $this->lang->line('modal_dist_popup_country'); ?></strong>
                                                </div>
                                                <div class="col-md-8 col-sm-8  col-xs-12">
                                                    <img id="country_img"
                                                         src="assets/template/images/msdropdown/icons/blank.gif"
                                                         alt="Country"/><span
                                                        class="hdn_country_name"><?php echo isset($_POST['hdn_country_label']) ? urldecode($_POST['hdn_country_label']) : ""; ?></span>
                                                    <input type="hidden" name="country"
                                                           value="<?php echo isset($_POST['country']) ? $_POST['country'] : ""; ?>">
                                                    <input type="hidden" name="hdn_country_label"
                                                           class="hdn_country_label"
                                                           value="<?php echo isset($_POST['hdn_country_label']) ? $_POST['hdn_country_label'] : ""; ?>">
                                                    <input type="hidden" name="hdn_country_name"
                                                           class="hdn_country_name"
                                                           value="<?php echo isset($_POST['hdn_country_name']) ? $_POST['hdn_country_name'] : ""; ?>">
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="form-group">
                                                <div class="col-md-4 col-sm-4  col-xs-12 ">
                                                    <strong><?php echo $this->lang->line('modal_dist_popup_complete_address'); ?></strong>
                                                </div>

                                                <div
                                                    class="address col-md-8 col-sm-8  col-xs-12">  <?php echo isset($_POST['address']) ? $_POST['address'] : ""; ?></div>
                                                <input type="hidden" name="address" class="address"
                                                       value="<?php echo isset($_POST['address']) ? str_replace('\r', '', str_replace('\n', '', $_POST['address'])) : ""; ?>">

                                            </div>

                                            <div class="clearfix"></div>
                                            <a href="distribution.php"></a>
                                            <div class="form-group">
                                                <div class="col-md-4 col-sm-4  col-xs-12 ">
                                                    <strong><?php echo $this->lang->line('modal_dist_popup_designation'); ?></strong>
                                                </div>
                                                <div class="designation col-md-8 col-sm-8  col-xs-12">
                                                    <?php echo isset($_POST['designation']) ? $_POST['designation'] : ""; ?>
                                                </div>
                                                <input type="hidden" class="designation" name="designation"
                                                       value="<?php echo isset($_POST['designation']) ? $_POST['designation'] : ""; ?>">
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-4 col-sm-4   col-xs-12 ">
                                                    <strong><?php echo $this->lang->line('modal_dist_popup_telephone'); ?></strong>
                                                </div>

                                                <div
                                                    class="telephone col-md-8 col-sm-8  col-xs-12"> <?php echo isset($_POST['telephone']) ? $_POST['telephone'] : ""; ?></div>
                                                <input type="hidden" name="telephone" class="telephone"
                                                       value="<?php echo isset($_POST['telephone']) ? $_POST['telephone'] : ""; ?>">

                                            </div>

                                            <div class="clearfix"></div>
                                            <div class="form-group">
                                                <div class="col-md-4 col-sm-4  col-xs-12 ">
                                                    <strong><?php echo $this->lang->line('modal_dist_popup_email'); ?></strong>
                                                </div>

                                                <div
                                                    class="email col-md-8 col-sm-8  col-xs-12">    <?php echo isset($_POST['email']) ? $_POST['email'] : ""; ?></div>
                                                <input type="hidden" name="email" class="email"
                                                       value="<?php echo isset($_POST['email']) ? $_POST['email'] : ""; ?>">

                                            </div>

                                            <div class="modal-dist-preview-popup-license-styles">
                                                <strong><?php echo $this->lang->line('modal_dist_preview_popup_corporate_trade_licence_copy'); ?></strong>
                                            </div>
                                            <div class="form-group">
                                                <div class="width100percent2 filepreview">
                                                    <input type="hidden" name="hdn_license_preview"
                                                           class="hdn_license_preview"
                                                           value="<?php echo $license_picture_name; ?>">
                                                    <?php echo $preview; ?>
                                                </div>
                                            </div>

                                            <div class="clearfix"></div>
                                            <fieldset class="modal-dist-popup-fieldset-width">
                                                <legend>
                                                    <strong><?php echo $this->lang->line('modal_dist_popup_fieldset_1'); ?></strong>
                                                </legend>

                                                <div
                                                    class="companysize"><?php echo isset($_POST["companysize"]) && ($_POST["companysize"] == "medium") ? $this->lang->line('modal_dist_popup_fieldset_1_1') : $this->lang->line('modal_dist_popup_fieldset_1_2'); ?></div>
                                                <?php echo form_error('companysize'); ?>
                                            </fieldset>
                                            <input type="hidden" name="companysize" class="companysize"
                                                   value="<?php echo isset($_POST["companysize"]) ? $_POST["companysize"] : ""; ?>">
                                            <br>

                                            <fieldset class="modal-dist-popup-fieldset-width">
                                                <legend>
                                                    <strong><?php echo $this->lang->line('modal_dist_popup_fieldset_2'); ?></strong>
                                                </legend>
                                                <div
                                                    class="companystart"><?php echo isset($_POST["companystart"]) ? $_POST["companystart"] : ""; ?></div>
                                            </fieldset>
                                            <br>

                                            <input type="hidden" name="companystart" class="companystart"
                                                   value="<?php echo isset($_POST["companystart"]) ? $_POST["companystart"] : ""; ?>">

                                            <div
                                                class="modal-dist-popup-kgt-support"><?php echo $this->lang->line('modal_dist_popup_kgt_support_1'); ?>
                                                (<span
                                                    class="company_preview"><?php echo(isset($_POST["company"]) ? $_POST["company"] : ""); ?></span>) <?php echo $this->lang->line('modal_dist_popup_kgt_support_2'); ?>
                                                (<span
                                                    class="company_preview"><?php echo(isset($_POST["company"]) ? $_POST["company"] : ""); ?></span>) <?php echo $this->lang->line('modal_dist_popup_kgt_support_3'); ?>
                                            </div>
                                            <div>
                                                <strong><?php echo $this->lang->line('modal_dist_popup_i_understand_1'); ?></strong>
                                            </div>
                                            <div class="loading" ></div>
                                            <div class="modal-dist-popup-fieldset-width">
                                                <strong><?php echo $this->lang->line('modal_dist_popup_sales_force_1'); ?></strong>
                                                <br><strong><?php echo $this->lang->line('modal_dist_popup_sales_force_2'); ?></strong><span
                                                    class="sel_indoor_sales"><?php echo isset($_POST['sel_indoor_sales']) ? $_POST['sel_indoor_sales'] : ""; ?></span><br>
                                                <input type="hidden" name="sel_indoor_sales" class="sel_indoor_sales"
                                                       value="<?php echo isset($_POST["sel_indoor_sales"]) ? $_POST["sel_indoor_sales"] : ""; ?>">
                                                <strong><?php echo $this->lang->line('modal_dist_popup_sales_force_3'); ?></strong><span
                                                    class="sel_outdoor_sales"><?php echo isset($_POST['sel_outdoor_sales']) ? $_POST['sel_outdoor_sales'] : ""; ?></span><br>
                                                <input type="hidden" name="sel_outdoor_sales" class="sel_outdoor_sales"
                                                       value="<?php echo isset($_POST["sel_outdoor_sales"]) ? $_POST["sel_outdoor_sales"] : ""; ?>">
                                            </div>

                                            <div class="modal-dist-popup-fieldset-width">
                                                <strong><?php echo $this->lang->line('modal_dist_popup_sales_brief'); ?></strong><br>

                                                <div
                                                    class="salesbrief"> <?php echo(isset($_POST["salesbrief"]) ? $_POST["salesbrief"] : ""); ?></div>
                                                <input type="hidden" name="salesbrief" class="salesbrief"
                                                       value="<?php echo(isset($_POST["salesbrief"]) ? $_POST["salesbrief"] : ""); ?>">
                                            </div>
                                            <div class="modal-dist-popup-kgt-support">
                                                <strong><?php echo $this->lang->line('modal_dist_popup_i_am_1'); ?>
                                                    (<span
                                                        class="applicant"><?php echo(isset($_POST["applicant"]) ? $_POST["applicant"] : ""); ?></span>) <?php echo $this->lang->line('modal_dist_popup_i_am_2'); ?>
                                                    (<span
                                                        class="company_preview"><?php echo(isset($_POST["company"]) ? $_POST["company"] : ""); ?></span>) <?php echo $this->lang->line('modal_dist_popup_i_am_3'); ?>
                                                </strong>
                                            </div>
                                        </form> 

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="clearfix"></div>
                        <div class="nav-prex-next text-right">
                            <div class="row">
                                <div class="col-md-12">
                                    <a id="modal_dist_preview_popup_back_button"
                                       class="btn btn-primary btn-sm"><?php echo $this->lang->line('back_button'); ?></a>
                                    <a id="modal_dist_preview_popup_submit_button"
                                       class="btn btn-primary btn-sm"><?php echo $this->lang->line('submit_button'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!--End content-->
</div>


