<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/template/css/msdropdown/flags.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/template/css/msdropdown/dd.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/user/career/css/career.css'); ?>">
<script type="text/javascript" src="http://www.marghoobsuleman.com/misc/jquery.js"></script>
<script type="text/javascript" src="<?php echo site_url('assets/template/js/msdropdown/jquery.dd.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/user/career/js/apply_form.js'); ?>"></script>

<div class="bodywrapper">
    <div class="modal fade" id="modal_success_applyform">
        <div class="modal-dialog">
            <div class="modal-content">
                <!--coded by Arun -->

                <a href="javascript:" onClick="$('.modal_block').modal('hide');window.location.href = 'career/index';" id="kgt1" >Close<i class="block_bttn glyphicon glyphicon-chevron-right"></i></a>
                <!-- end-->
                <form class="form-horizontal" role="form" method="post">
                    <div class="modal-body">
                        <div class="box-content-modal" id="career_countries">
                            <h2 class="title-modal"><?php echo lang('Apply For') ?> <?php echo $apply_form['name']; ?></h2>
                            <input type="hidden" name="operation" value="set">

                            <div class="form-group">
                                <label for="salutation"
                                       class="col-sm-5 control-label"><?php echo lang('Title') ?></label>

                                <div class="col-sm-6">
                                    <select name="salutation" id="salutation" 
                                            class="form-control selectpicker1 kgt2">
                                        <option value='Mr.' data-title="Mr">Mr.</option>
                                        <option value='Ms.'  data-title="Ms">Ms.</option>
                                    </select>
                                </div>
                            </div> 


                            <div class="form-group">
                                <label for="inputEmail3"
                                       class="col-sm-5 control-label"><?php echo lang('Name and Surname') ?></label>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="name" id="inputEmail3"
                                           placeholder="<?php echo lang('Name and Surname') ?>"
                                           value="<?php echo set_value('name'); ?>">
                                    <span class="red1"><?php echo form_error('name'); ?></span></div>
                            </div>
                            <div class="form-group">
                                <label for="countries"
                                       class="col-sm-5 control-label"><?php echo lang('Country') ?></label>

                                <div class="col-sm-6">
                                    
                                     <select name="country" id="countries" style="width:245px"> <!--  class="width245px"/* Tried every possible option to remove inline style but noting worked so leaving it as is to keep the site functionality as the original website*/-->
                                        <?php foreach ($countries as $country) { ?>
                                        <option value='<?php echo htmlentities($country['countryName'],ENT_QUOTES); ?>' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag <?php echo htmlentities($country['alpha_2']); ?>" data-title="<?php echo htmlentities($country['countryName']); ?>" <?php if ($country['countryName'] == "Canada") { ?> selected="selected"<?php } ?>><?php echo $country['countryName']; ?></option>
                                        <?php } ?>
                                     </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputContact"
                                       class="col-sm-5 control-label"><?php echo lang('Telephone') ?></label>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="contact" id="inputContact"
                                           placeholder="<?php echo lang('Telephone') ?>"
                                           value="<?php echo set_value('contact'); ?>">
                                    <span class="red1"><?php echo form_error('contact'); ?></span></div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3"
                                       class="col-sm-5 control-label"><?php echo lang('Email') ?></label>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="inputPassword3"
                                           placeholder="<?php echo lang('Email') ?>" name="email"
                                           value="<?php echo set_value('email'); ?>">
                                    <span class="red1"><?php echo form_error('email'); ?></span></div>
                            </div>
                            <?php
                            if ($this->session->flashdata('success')):
                                $msg = $this->session->flashdata('success');
                                ?>
                                <div class="notice outer">
                                    <div class="note">
                                        <script type="text/javascript">$(document).ready(function () {
                                                $('#modal_success_applyform').modal('hide');
                                                $('.modal_block').modal('show');
                                            }); </script> </div>
                                </div>


                            <?php
                            endif;
                            ?>
                            <?php
                            if ($this->session->flashdata('error')) :

                                $msg = $this->session->flashdata('error');
                                ?>
                                <div class="notice outer">
                                    <div class="error"><?php echo $msg; ?> </div>
                                </div>
                                <?php
                            endif;
                            ?>
                            <div class="clearfix"></div>
                            <div class="btn-modal">
                                <input type="submit" value="Apply"
                                       class="kgt3 btn btn-primary btn-sm"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade modal_block kgt4">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="box-content-modal">
                        <h2 class="title-modal blink">Warning</h2>
                        <p><?php if(isset($msg)) { echo $msg; } ?></p>
                        <div class="clearfix"></div>
                        <div class="btn-modal">
                            <a href="javascript:"
                               onClick="$('.modal_block').modal('hide');window.location.href = 'career/index'"
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
</div>