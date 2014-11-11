<!--End footer-->
<?php
$permanent_job = $this->comman_model->get_all_data_by_id('job_section', array('category' => 'Permanent Job', 'status' => 1));

$internship_program = $this->comman_model->get_all_data_by_id('job_section', array('category' => 'Internship Program', 'status' => 1));

$part_time = $this->comman_model->get_all_data_by_id('job_section', array('category' => 'Part Time Job', 'status' => 1));

$projects_contractors = $this->comman_model->get_all_data_by_id('job_section', array('category' => 'Projects Contractors', 'status' => 1));
?>


<div class="footer1 colorf6f6f6">

    <div class="footer">

        <div class="container footer_wrap paddingtop10px">
            <div class="col-md-2 nopadding noleftmargin">

                <div class="fb1">

                    <div>

                        <ul class="kgtclientul">

                            <li><span class="font18pxbold"><?php echo lang('Client') ?></span>
                            </li>

                            <li><a href="javascript:" class="login_pop"><?php echo lang('Follow Up Orders') ?></a></li>

                            <li><a href="products" class="login_pop1"><?php echo lang('Get Instant Quote') ?></a></li>

                            <li><a href="javascript:" class="login_pop"><?php echo lang('Claim Warranty') ?></a></li>

                            <li><a href="promotion/awards" class="login_pop1"><?php echo lang('Claim Award') ?></a></li>

                            <li><img src="assets/template/images/white_bottom_line.png" alt="" /></li>

                            <li><span
                                    class="font18pxbold"><?php echo lang('Media and Press') ?></span>
                            </li>

                            <li><a href="promotion/#profile"><?php echo lang('Press Release') ?></a></li>

                            <li><a href="promotion/#messages"><?php echo lang('Client Testimonial') ?></a></li>

                        </ul>

                    </div>

                </div>

            </div>

            <div class="fb2 col-md-7">

                <div class="row">

                    <div class="col-md-6 col-xs-6">

                        <div class="fb2_inside1">

                            <h2 class="heading2b"><?php echo lang('Knowledge Center') ?></h2>

                            <?php
                            $download = $this->comman_model->get_all_data_by_id('promotion_section', array('type' => 'knowledge_center'));

                            if (!empty($download)) {

                                foreach ($download as $set_data) {
                                    ?>

                                    <a href="promotion/index#knowledge_center"> <span
                                            class="font575757-a"><?php echo $set_data['name']; ?></span></a>
                                    <br/>

                                    <?php
                                }
                            }
                            ?>

                        </div>

                    </div>

                    <div class="col-md-6 col-xs-6">

                        <div class="fb2_inside2">

                            <h2 class="heading2b"><?php echo lang('Downloads') ?></h2>

                            <a href="promotion/index"><span
                                    class="font575757-a"><?php echo lang('Reading Materials') ?></span></a><br/>

                            <a href="promotion/index"><span
                                    class="font575757-a"><?php echo lang('Videos') ?></span></a>
                        </div>

                    </div>

                </div>

                <div class="clearfix"></div>

                <div class="row">

                    <div class="col-md-6 col-xs-6">

                        <div class="fb2_inside3">

                            <h2 class="heading2b"><?php echo lang('Legal Notices') ?></h2>

                            <a href="promotion/view_promotion/38"><span
                                    class="font575757-a"><?php echo lang('Privacy Policy') ?></span></a><br/>

                            <a href="promotion/view_promotion/39"><span
                                    class="font575757-a"><?php echo lang('Disclaimer') ?></span></a>
                            <a href="contact"><h2 class="blink heading2b"><?php echo lang('Contact us'); ?></h2></a>

                        </div>	
                    </div>

                    <div class="col-md-6 col-xs-6">

                        <div class="fb2_inside4 col-md-6 col-xs-6">

                            <h2 class="heading2b"><?php echo lang('Work With KGT') ?></h2>

                            <a href="<?= base_url() ?>career" onClick="goUrl('<?= base_url() ?>career')"><span
                                    class="font575757-a">Permanent Job  &nbsp;(<?php echo count($permanent_job); ?>
                                    )</span></a><br/>

                            <a href="<?= base_url() ?>career#internship_program"
                               onClick="goUrl('<?= base_url() ?>career#internship_program')"><span
                                    class="font575757-a"><?php echo lang('Intership Program') ?>
                                    &nbsp;(<?php echo count($internship_program); ?>)</span></a><br/>

                            <a href="<?= base_url() ?>career#part_time_job"
                               onClick="goUrl('<?= base_url() ?>career#part_time_job')"><span
                                    class="font575757-a"><?php echo lang('Part Time Job') ?>
                                    &nbsp;(<?php echo count($part_time); ?>)</span></a><br/>

                            <a href="<?= base_url() ?>career#projects_contractors"
                               onClick="goUrl('<?= base_url() ?>career#projects_contractors')"><span
                                    class="font575757-a"><?php echo lang('Contractors') ?>
                                    &nbsp;(<?php echo count($projects_contractors); ?>)</span> </a></div>

                    </div>

                </div>

            </div>

            <div class="fb3 col-md-3 pull-right nopadding norightmargin">
                <a href="<?= base_url() ?>promotion/view_promotion/17">
                    <div class="kgtimage1">
                        <img src="assets/template/images/new.png" alt="" class="kgtimage1margin"/>
                    </div>
                </a> <a href="<?= base_url() ?>promotion/view_promotion/17" class="login_pop"><span
                        class="displaynon">Investor Section</span>
                    <div class="kgtimage2">
                        <img src="assets/template/images/button2.png" alt="" class="kgtimage2style"/>
                    </div>
                </a>
                
            </div>


        </div>

        <div class="container">

            <div class="fb4">

                <div class="row nomargin">

                    <div class="col-md-6 copyright-area floatleft1 margintop10px"><span
                            class="font12pxb"><?php echo lang('Copy Right &copy 2014 Kondar Global. All rights Reserved') ?></span>
                    </div>

                    <div class="col-md-6 social text-right">

                        <div class="displayinlineblock margintop10px"><span
                                class="font12pxc"><?php echo lang('Keep in Touch with us') ?></span>
                        </div>

                        <div class="displayinlineblock margintop10px">
                            <a href="javascript:" onClick="$('#underconstruction_popup').modal('show');"> <img
                                    src="assets/template/images/facebook_icon.png" alt=""/> </a>
                            <a href="javascript:" onClick="$('#underconstruction_popup').modal('show');"> <img
                                    src="assets/template/images/icon2.png" alt=""/> </a>
                            <a href="javascript:" onClick="$('#underconstruction_popup').modal('show');"> <img
                                    src="assets/template/images/youtube_icon.png" alt=""/> </a></div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!--End footer-->

</div>

<!--End footer-->






<div class="modal fade" id="client_section">

    <div class="modal-dialog">

        <div class="modal-content">

            

            <div class="modal-body">

                <div class="box-content-modal">

                    <h2 class="title-modal client_name" >&nbsp;</h2>

                    <p id="error_msge1"></p>

                    <div>

                        <table class="marginleft105px">

                            <tr>

                                <td><strong><?php echo lang('Username') ?></strong></td>	

                                <td><input type="text" placeholder="Username" class="form-control" id="login_username"/>
                                </td>

                            </tr>

                            <tr>

                                <td><strong><?php echo lang('Password') ?></strong></td>	

                                <td><input type="password" placeholder="Password" class="form-control"
                                           id="login_password"/></td>

                            </tr>

                            <tr>

                                <td>&nbsp;</td>

                                <td></td>


                            </tr>
                             </table>

                    </div>

                    <div class="clearfix"></div>

                    <div class="btn-modal"> <br />

                        <div class="row marginleft65px">

                            <div class="col-xs-4 col-md-4 text-center"><a href="javascript:void(0);"
                                                                          class="btn btn-primary btn-sm popuplogin"><?php echo lang('Login') ?>
                                    <i class="glyphicon glyphicon-chevron-right"></i></a></div>

                            <div class="col-xs-4 col-md-4 text-center"><a href="javascript:void(0)"
                                                                          onClick="$('#client_section').modal('hide')"
                                                                          class="floatright1 btn btn-primary btn-sm"><?php echo lang('Cancel') ?>
                                    <i class="glyphicon glyphicon-chevron-right"></i></a></div>

                        </div>

                    </div>

                </div>

            </div>

        </div>



    </div>





</div>





<div class="modal fade" id="login_redirect">
    <div class="modal-dialog width57percent">
        <div class="modal-content">
            <div class="modal-body">
                <div class="box-content-modal">
                    <h2 class="title-modal client_name">The user name or the password entered are not correct</h2>
                    <div class="clearfix"></div>
                    <div class="btn-modal"><br/>

                        <div class="row marginleftright10px">
                            <div class="col-xs-3 col-md-3 text-center"><a href="contact" class="btn btn-primary btn-sm"
                                                                          id="contact-popuplogin">Contact KGT <i
                                        class="glyphicon glyphicon-chevron-right"></i></a></div>

                            <div class="col-xs-3 col-md-3 text-center"><a href="contact"
                                                                          onClick="$('#client_section').modal('hide')"
                                                                          class="floatright1 btn btn-primary btn-sm">Forget password
                                    <i class="glyphicon glyphicon-chevron-right"></i></a></div>

                            <div class="col-xs-3 col-md-3 text-center"><a href="contact" class="btn btn-primary btn-sm"
                                                                          id="popuplogin2">Forget user name <i
                                        class="glyphicon glyphicon-chevron-right"></i></a></div>

                            <div class="col-xs-3 col-md-2 text-center"><a href="javascript:void(0)"
                                                                          onClick="$('#login_redirect').modal('hide')"
                                                                          class="floatright1 btn btn-primary btn-sm"><?php echo lang('Cancel') ?>
                                    <i class="glyphicon glyphicon-chevron-right"></i></a></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="underconstruction_popup">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="box-content-modal">
                    <h2 class="title-modal client_name">This version is still under development. Thank you</h2>
                    <div class="clearfix"></div>
                    <div class="btn-modal"><br/>

                        <div class="row floatright1">
                            <div class="col-xs-3 col-md-2 text-center"><a href="javascript:void(0)"
                                                                          onClick="$('#underconstruction_popup').modal('hide');"
                                                                          class="floatright1 btn btn-primary btn-sm">Ok <i
                                        class="glyphicon glyphicon-chevron-right"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>









<div class="modal fade" id="language_popup">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="box-content-modal">
                    <h2 class="title-modal client_name">This version is still under development. Thank you</h2>
                    <div class="clearfix"></div>
                    <div class="btn-modal"><br/>

                        <div class="row floatright1">
                            <div class="col-xs-3 col-md-2 text-center"><a href="javascript:void(0)"
                                                                          onClick="$('#language_popup').modal('hide');lang_redirct();"
                                                                          class="floatright1 btn btn-primary btn-sm">Ok <i
                                        class="glyphicon glyphicon-chevron-right"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script type="text/javascript">
    function goUrl(url_link){
        var url = url_link.split("#"); 
        var id = url[1];
        $("#"+id+"1").click();           
    }
        
        
    function blink(n) {
        var blinks = document.getElementsByTagName("blink");
        var visibility = n % 2 === 0 ? "visible" : "hidden";
        for (var i = 0; i < blinks.length; i++) {
            blinks[i].style.visibility = visibility;
        }
        setTimeout(function() {
            blink(n + 1);
        }, 500);
    }
    window.onload=function(){
        blink(1);
    };
</script>
</body>
</html>