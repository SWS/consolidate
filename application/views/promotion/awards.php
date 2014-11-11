
<script type="text/javascript">

    var result = '<?php echo $result; ?>';
    var successmsg = '<?php echo $msg; ?>';
    var sesstion_user_email = '<?php echo $sesstion_user_email; ?>';


    $(document).ready(function() {
       
	  var base_url = $("#base_url").val();
	 

    if ($.trim(result) == 'true') {
        if ($.trim(successmsg) == '1') {
            $('#notify_award_w0n_thanks_submsg').hide();
            $('#notify_award_w0n_thanks_msg').hide();
            $('#notify_award_w0n_thanks_msg1').show();
            successmsg = 0;

        }
        else {
            $('#notify_award_w0n_thanks_submsg').show();
            $('#notify_award_w0n_thanks_msg').show();
            $('#notify_award_w0n_thanks_msg1').hide();
        }
        $("#claim_award_form")[0].reset();
        sesstion_user_email = "";
        result = "";
        $('#awardstab').trigger('click');
        $('#claim_award_data').modal('hide');
        $('#notify_award_w0n_thanks').modal('show');
    }


         }); 
</script>
<script type="text/javascript" src="<?php echo site_url('assets/master/js/awards.js'); ?>"></script>
<div class="container">
    <div class="row bread displaynon">
        <div class="col-md-6">
            <div class="text-bread">
                <?php
                if (isset($page_data)) {
                    ?>
                    <a href="home"><?php echo lang('Home') ?></a>    / <a
                        href="promotion"><?php echo lang('Promotion') ?></a> / <?php echo lang('awards'); ?>
                <?php } else { ?>
                    <a href="home"><?php echo lang('Home') ?></a>     / <a
                        href="promotion"><?php echo lang('Promotion') ?></a>

                    <?php
                }
                ?>

                <?php echo lang('PROMOTION SECTION') ?> / <?php echo lang('AWARDS') ?>
            </div>
        </div>

    </div>
</div>

<div class="container">
    <div class="main-page">

        <div class="car-lists">
            <div class="form-fill-cart dis-form">
                <div class="row">
                    <div class="col-md-12">
                        <div class="promotion-page">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li>
                                    <a href="<?php echo base_url(); ?>promotion/index/#download-material"><?php echo lang('DOWNLOAD MATERIALS') ?>
                                        (<?php echo count($download_material); ?>)</a></li>
                                <li>
                                    <a href="<?php echo base_url(); ?>promotion/index/#profile"><?php echo lang('PRESS RELEASE') ?>
                                        (<?php echo count($press_release); ?>)</a></li>
                                <li>
                                    <a href="<?php echo base_url(); ?>promotion/index/#messages"><?php echo lang('CLIENT TESTIMONIAL') ?>
                                        (<?php echo count($client_testi); ?>) </a></li>
                                <li>
                                    <a href="<?php echo base_url(); ?>promotion/index/#knowledge_center"><?php echo lang('KNOWLEDGE CENTER') ?>
                                        (<?php echo count($knowledge_center); ?>)</a></li>
                                <li class="active"><a href="<?php echo base_url(); ?>promotion/awards"
                                                      id="awardstab"><?php echo lang('AWARDS') ?> </a></li>
                                <!-- data-toggle="tab"-->
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">


                                <div class="tab-pane active" id="awards">
                                    <div class="row">
                                        <div class="col-md-12 col-xs-12">
                                            <div class="main-tab-award text-center">
                                                <img
                                                    src="<?php echo base_url(); ?>/assets/template/images/enter_serial_number.png"
                                                    class="img-responsive marginauto margintop30px" alt=""
                                                    />

                                                <div class="clearfix"></div>
                                                <div class="col-xs-12">
                                                    <input class="serial_number" type="text" name="serial_number"
                                                           id="serial_number" value="" placeholder="">
                                                </div>

                                                <div class="clearfix"></div>
                                                <div class="nav-prex-next text-center">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <a href="javascript:void(0);" id="checkSerialNumber"
                                                               class="btn btn-primary btn-sm width50px">OK</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <h5><?php echo $award[0]['name']; ?></h5>

                                            <div><?php echo $award[0]['sort']; ?></div>
                                            <br/>
                                            <div>
                                                <?php echo $award[0]['description']; ?>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!--end of awards-->


                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
    <!--End content-->
</div>



<!--Modal shopping decision cart-->
<div class="modal fade" id="enter_user_details"> 
    <div class="modal-dialog"> 
        <div class="modal-content"> 

            <div class="modal-body nopadmodal_na"> 
                <div class="box-content-modal"> 

                    <div class="clearfix"></div>
                    <h2 class="title-modal normaltext"><?php echo $award_msg[0]['dealing_msg']; ?></h2>
                    <div class="clearfix"></div>
                    <div class="row">
                        <form method="post" enctype="multipart/form-data" id="saveBasicDetailsForm">
                            <input type="hidden" class="form-control" name="code" id="code" value="">
                            <input type="hidden" class="country_title1" name="country_title1" id="country_title1"
                                   value="">

                            <div class="col-md-10">

                                <div class="margin_bottom_50 form-group">
                                    <label class="col-sm-5"><?php echo lang('Title') ?></label>
                                    <div class="col-sm-7">
                                        <select name="salutation" class="form-control">
                                            <option value='Mr.' data-title="Mr">Mr.</option>
                                            <option value='Ms.'  data-title="Ms">Ms.</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="clearfix"></div>

                                <div class="margin_bottom_50 form-group">
                                    <label class="col-sm-5"><?php echo lang('Name and Surname') ?></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="name" id="name" value=""
                                               placeholder="Name and Surname">
                                    </div>

                                </div>
                                <div class="clearfix"></div>
                                <div class="margin_bottom_50 form-group">
                                    <label class="col-sm-5"><?php echo lang('Country') ?></label>
                                    <div class="col-sm-7" id="popupboxcountrywrap">

                                        <select name="country" id="country" class="kgt49">
                                            <?php foreach ($countries as $country) { ?>
                                                <option value='<?php echo $country['idCountry']; ?>'
                                                        data-image="images/msdropdown/icons/blank.gif"
                                                        data-imagecss="flag <?php echo $country['alpha_2']; ?>"
                                                        data-title="<?php echo $country['countryName']; ?>" <?php
                                                if ($country['countryName'] == "Canada") {
                                                    echo "selected='selected'";
                                                }
                                                ?>><?php echo $country['countryName']; ?></option>
                                                    <?php } ?>
                                        </select>
                                    </div>

                                </div>
                                <div class="clearfix"></div>
                                <div class="margin_bottom_50 form-group">
                                    <label class="col-sm-5"><?php echo lang('Telephone') ?></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="telephone" id="telephone" value=""
                                               placeholder="Telephone">
                                    </div>

                                </div>
                                <div class="clearfix"></div>
                                <div class="margin_bottom_50 form-group">
                                    <label class="col-sm-5"><?php echo lang('Email') ?></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="email" id="email" value=""
                                               placeholder="Email">
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="btn-modal">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 text-right">
                                <img class="displaynon" src="images/loading.gif" alt="Loading" class="loaderimage"/>&nbsp;<a
                                    href="javascript:void(0);" class="btn btn-primary btn-sm"
                                    id="saveBasicDetails"><?php echo lang('Continue') ?> <i
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

<input type="hidden" value="<?php echo base_url() ?>"  id="base_url">
<!--Modal shopping decision cart-->
<div class="modal fade" id="check_mail_code"> 
    <div class="modal-dialog"> 
        <div class="modal-content"> 

            <div class="modal-body"> 
                <div class="box-content-modal"> 

                    <div class="clearfix"></div>

                    <h2 class="title-modal text-align-center kgt50"
                        ><?php echo lang('Email verification process') ?></h2>

                    <div class="blink alert-danger emailcode-error kgt51" ></div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <form method="post" enctype="multipart/form-data" id="checkVerificationCode">
                            <input type="hidden" class="form-control" name="code_VerificationCode"
                                   id="code_VerificationCode" value="">
                            <input type="hidden" class="form-control" name="user_email" id="user_email" value="">
                            <input type="hidden" class="form-control" name="user_details_name" id="user_details_name"
                                   value="">
                            <input type="hidden" class="form-control" name="user_details_countries"
                                   id="user_details_countries" value="">
                            <input type="hidden" class="form-control" name="user_details_telephone"
                                   id="user_details_telephone" value="">

                            <div class="col-md-10 col-md-offset-1">

                                <div class="verification_msg">
                                    <div id="emailawardtyped"></div>
                                    <span id="replaceEmail">
                                    <?php 
                                     echo $award_msg[0]['email_verification_message'];
                                    ?>
                                    </span>

                                </div>
                                <div class="kgt52">
                                    <div id="timer1"></div>
                                </div>
                                <div class="margin_bottom_80 form-group">
                                    <label class="col-sm-5"><?php echo lang('Verification Code') ?></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="emailVerificationCode"
                                               id="emailVerificationCode" value="" placeholder="Verification Code">
                                    </div>

                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                    <div class="btn-modal">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 text-right">
                                <img id="loaderimagecontinue" class="displaynon" src="images/loading.gif"
                                     alt="Loading"/> <a href="javascript:void(0);" class="btn btn-primary btn-sm"
                                                        id="emailVerificationCodeSubmit"><?php echo lang('Continue') ?>
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
<div class="modal fade" id="notify_award_fail">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="box-content-modal">
                    <img src="<?php echo base_url(); ?>assets/template/images/award_fail.jpg" alt=""
                         class="img-responsive">

                    <h2 class="title-modal"><?php echo $award_msg[0]['not_winning_no'] ?></h2>

                    <div class="clearfix"></div>
                    <div class="btn-modal">
                        <div class="row">

                            <div class="col-md-12 col-xs-12 text-right">
                                <a href="javascript:void(0);" onClick="$('#notify_award_fail').modal('hide');
                                    $('#serial_number').val('');"
                                   class="btn btn-primary btn-sm"><?php echo lang('OK') ?> <i
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
<div class="modal fade" id="notify_award_w0n">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="box-content-modal">
                    <img src="<?php echo base_url(); ?>assets/template/images/won.jpg" alt="" class="img-responsive">
                    <h2 class="title-modal newstylewinner"><span id="awards_file"></span></h2>
                    <div class="clearfix"></div>
                    <div class="btn-modal">
                        <div class="row">

                            <div class="col-md-12 col-xs-12 text-right">
                                <a href="javascript:void(0);" onClick="ClaimAwardForm();"
                                   class="btn btn-primary btn-sm"><?php echo lang('Claim Award') ?> <i
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
<div class="modal fade" id="user_block_box">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="box-content-modal">
                    
                    <div class="blockElementWrap">
                        <div class="blockMsg" id="blockMsg"><?php echo $award_msg[0]['verification_timeout'];  ?></div>
                    </div>
                                    
                    <div class="clearfix"></div>
                    <div class="btn-modal">
                        <div class="row">

                            <div class="col-md-12 col-xs-12 text-right">
                                <a href="javascript:void(0);" onClick="$('#user_block_box').modal('hide');
                                    $('#serial_number').val('');" class="btn btn-primary btn-sm"
                                   id="block_confirm_msg"><?php echo lang('OK') ?> <i
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
<div class="modal fade" id="not_kgt_part_no">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="box-content-modal">


                    <div class="not_kgt_part_no_title not_kgt_part_no_title1"><?php echo lang('This is not a KGT Part Number.') ?></div>
                    <div class="not_kgt_part_no_sub_title kgt53" ><?php echo lang('Please double check your record.') ?></div>
                    <div class="clearfix"></div>
                    <div class="btn-modal">
                        <div class="row">

                            <div class="col-md-12 col-xs-12 text-right">
                                <a href="javascript:void(0);" onClick="$('#not_kgt_part_no').modal('hide');
                                    $('#serial_number').val('');"
                                   class="btn btn-primary btn-sm"><?php echo lang('OK') ?> <i
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
<div class="modal fade" id="notify_award_w0n_thanks">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="box-content-modal">

                    <div class="not_kgt_part_no_title not_kgt_part_no_title1" 
                         id="notify_award_w0n_thanks_msg"><?php echo $award_msg[0]['Thank_you_header']; ?></div>
                    <div class="not_kgt_part_no_title not_kgt_part_no_title1" 
                         id="notify_award_w0n_thanks_msg1"><?php echo $award_msg[0]['already_submitted']; ?></div>
                    <div class="not_kgt_part_no_sub_title kgt53" id="notify_award_w0n_thanks_submsg"><?php echo $award_msg[0]['Thank_you_msg']; ?></div>
                    <div class="clearfix"></div>
                    <div class="btn-modal">
                        <div class="row">

                            <div class="col-md-12 col-xs-12 text-right">
                                <a href="javascript:void(0);" onClick="$('#notify_award_w0n_thanks').modal('hide');
                                    $('#serial_number').val('');"
                                   class="btn btn-primary btn-sm"><?php echo lang('OK') ?> <i
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
<div class="modal fade" id="claim_award">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="box-content-modal">
                    <div class="clearfix"></div>
                    <h2 class="title-modal text-align-center"><?php echo lang('Please enter Your details') ?></h2>
                    <div class="clearfix"></div>
                    <div class="kgt54">
                        <div id="promotiontimer"></div>
                    </div>
                    <div class="row">

                        <div class="col-md-11">
                            <form class="form-horizontal" role="form" enctype="multipart/form-data"
                                  id="claim_award_form" method="post">
                                <input type="hidden" name="claim_award_countries_title1"
                                       id="claim_award_countries_title1" class="form-control">

                                <div class="form-group">
                                    <label class="col-sm-5 control-label"><?php echo lang('WINNING NUMBER') ?> </label>
                                    <input type="hidden" name="claim_award_code_VerificationCode"
                                           id="claim_award_code_VerificationCode" value="#arva#asd50">

                                    <div class="col-sm-7" id="claim_award_winning_number">
                                        012012-54525485648-4590458345-45435
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label"><?php echo lang('Title') ?></label>
                                    <div class="col-sm-7">
                                        <select name="salutation" id="salutation" class="form-control">
                                            <option value='Mr.' data-title="Mr">Mr.</option>
                                            <option value='Ms.'  data-title="Ms">Ms.</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label
                                        class="col-sm-5 control-label"><?php echo lang('Name and Surname') ?> </label>

                                    <div class="col-sm-7">
                                        <input type="text" name="claim_award_name" id="claim_award_name"
                                               class="form-control" placeholder="Name and Surname">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label"><?php echo lang('Country') ?></label>
                                    <div class="col-sm-7" id="popupboxcountrywrap2">
                                        <select name="claim_award_countries" id="claim_award_countries"
                                                class="kgt55">
                                            <?php
                                            foreach ($countries as $country) {
                                                if ($country['countryName'] == 'Canada') {
                                                    ?>
                                                    <option selected="selected"
                                                            value='<?php echo $country['idCountry']; ?>'
                                                            data-image="images/msdropdown/icons/blank.gif"
                                                            data-imagecss="flag <?php echo $country['alpha_2']; ?>"
                                                            data-title="<?php echo $country['countryName']; ?>"><?php echo $country['countryName']; ?></option>
                                                <?php } else { ?>
                                                    <option value='<?php echo $country['idCountry']; ?>'
                                                            data-image="images/msdropdown/icons/blank.gif"
                                                            data-imagecss="flag <?php echo $country['alpha_2']; ?>"
                                                            data-title="<?php echo $country['countryName']; ?>"><?php echo $country['countryName']; ?></option>
                                                <?php
                                                }
                                            }
                                            ?>                                 
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label"><?php echo lang('Telephone') ?></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="claim_award_telephone"
                                               id="claim_award_telephone" placeholder="Telephone">
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="form-group">
                                    <label class="col-sm-5 control-label"><?php echo lang('Email') ?></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="claim_award_email"
                                               name="claim_award_email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label"><?php echo lang('Passport ID') ?> </label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control input-address"
                                               id="claim_award_passport_id" name="passport_id"
                                               placeholder="Passport ID">
                                    </div>
                                </div>

                                <div class="form-group imgInp">
                                    <label
                                        class="col-sm-5 control-label"><?php echo lang('Upload passport copy') ?></label>

                                    <div class="col-sm-7 imgInp">

                                        <input type="file" class="floatleft1" id="imgInp2" name="passport_copy">
                                        <span class="help kgt56">
                                            <?php echo lang('Png. jpeg, pdf with 1Mb size acceptable') ?>
                                        </span>



                                    </div>
                                    <div class="form-group">
                                        <div class="filepreview">                                                            


                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-5 control-label"><?php echo lang('Address') ?></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="claim_award_address" name="address"
                                               placeholder="Address">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label"><?php echo lang('Occupation') ?></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="claim_award_occupation"
                                               name="occupation" placeholder="Occupation">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label"><?php echo lang('Product supplier') ?></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="claim_award_product_supplier"
                                               name="product_supplier" placeholder="Product supplier">
                                    </div>
                                </div>

                                <div class="form-group imgInp1">
                                    <label class="col-sm-5 control-label"><?php echo lang('Receipt copy') ?></label>
                                    <div class="col-sm-7 imgInp1">
                                        <input type="file" class="floatleft1" id="imgInp1" name="receipt_copy" value="">
                                        <span class="help kgt56">
                                            <?php echo lang('Png. jpeg, pdf with 1Mb size acceptable') ?>
                                        </span>


                                    </div>

                                    <div class="form-group">
                                        <div class="filepreview1">                                                            


                                        </div>
                                    </div>
                                </div>


                            </form>

                        </div>
                    </div>
                    <div class="btn-modal">
                        <div class="row">

                            <div class="col-md-12 col-xs-12 text-right">
                                <a href="javascript:void(0);" class="btn btn-primary btn-sm"
                                   id="claim_award_button"><?php echo lang('Continue') ?> <i
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
<div class="modal fade" id="claim_award_data">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="box-content-modal">
                    <div class="clearfix"></div>
                    <h2 class="title-modal text-align-center"><?php echo lang('Please check Your details') ?></h2>
                    <div class="clearfix"></div>
                    <div class="kgt54">
                        <div id="timer3"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-11">
                            <div class="form-group">
                                <label class="col-sm-5 control-label"><?php echo lang('WINNING NUMBER') ?> </label>
                                <div class="col-sm-7" id="claim_award_winning_number_data" >

                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label"><?php echo lang('Title') ?> </label>
                                <div class="col-sm-7" id="claim_award_salutation">
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label"><?php echo lang('Name and Surname') ?> </label>
                                <div class="col-sm-7" id="claim_award_data_name">
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label"><?php echo lang('Country') ?></label>
                                <div class="col-sm-7" id="claim_award_data_country">


                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label"><?php echo lang('Telephone') ?></label>
                                <div class="col-sm-7" id="claim_award_data_telephone">
                                </div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="form-group">
                                <label class="col-sm-5 control-label"><?php echo lang('Email') ?></label>
                                <div class="col-sm-7" id="claim_award_data_email">
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label"><?php echo lang('Passport ID') ?> </label>
                                <div class="col-sm-7"  id="claim_award_data_passport_id">
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <label class="col-sm-5 control-label"><?php echo lang('Upload passport copy') ?></label>
                            <div class="form-group">



                                <div class="filepreview" id="img-preview1"></div>

                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label"><?php echo lang('Address') ?></label>
                                <div class="col-sm-7"   id="claim_award_data_address">
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label"><?php echo lang('Occupation') ?></label>
                                <div class="col-sm-7"   id="claim_award_data_occupation">
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label"><?php echo lang('Product supplier') ?></label>
                                <div class="col-sm-7"  id="claim_award_data_product_supplier">
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <label class="col-sm-5 control-label"><?php echo lang('Receipt copy') ?></label>
                            <div class="form-group">


                                <div class="filepreview" id="img-preview2"></div>

                            </div>

                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="clearfix"></div>
                    <div class="btn-modal">
                        <div class="row margin_bottom_top_20">
                            <div class="col-md-5 col-xs-5 text-left">
                                <a href="javascript:void(0);" class="btn btn-primary btn-sm" id="backtoconfirmpage"><i
                                        class="glyphicon glyphicon-chevron-left"></i><?php echo lang('Back') ?> </a>
                            </div>
                            <div class="col-md-6 col-xs-6 text-right">
                                <img id="loaderclaimawarddatabutton" class="displaynon" src="images/loading.gif"
                                     alt="Loading"/> <a href="javascript:void(0);" class="btn btn-primary btn-sm"
                                                        id="claim_award_data_button"><?php echo lang('Continue') ?> <i
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
