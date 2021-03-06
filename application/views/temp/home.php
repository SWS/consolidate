<div class="container kgt38" id="main-container-wrapper">
    <div class="main-content home-mainWrap kgt39">
        <div class="container">
            <div class="row">
                <div class="home-quick-search-wrap">
                    <?php include 'include/quicksearch.php'; ?>          
                </div>
            </div>
            <!--End Advance search-->

            <div class="clearfix"></div>
            <div class="row support-container">
                <div class="col-md-3 container_left position-relative">
                    <div class="leftcontentsupporter">
                        <div class="box-sp">
                            <img src="assets/template/images/call_center_women.png" class="support-wrap-image kgt40" alt="girl" />

                            <div class="support_24_7">
                                <h1 class="in_support_24_7">24/7</h1>
                                <div class="margin-top_-10 email_wrap"> 
                                    <span class="support-header"><?php echo lang('Support') ?></span> 
                                    <img src="assets/template/images/Email_icon.png" alt="email" />
                                </div>
                            </div>
                        </div>
                        <h1><?php echo lang('GET FREE QUOTE NOW') ?></h1>	
                        <div class="rows">
                            <img src="assets/uploads/country/small/gb.png" alt="" />
                            <div>
                                <h3><?php echo lang('VANCOUVER') ?></h3>	
                                <span id="timeActive2"><?php echo lang('23:59:00, Monday') ?></span>	
                            </div>
                            <div class="right">
                                <h2>+1-604-360-8805</h2>
                                <span id="dateActive2"><?php echo lang('DECEMBER 15, 2013') ?></span>	
                            </div>
                        </div>
                        <div class="rows">
                            <img src="assets/uploads/country/small/fr.png" alt="" />
                            <div>
                                <h3><?php echo lang('LONDON') ?></h3>	
                                <span id="timeActive1"><?php echo lang('23:59:00, Monday') ?></span>	
                            </div>
                            <div class="right">
                                <h2>+1-604-360-8805</h2>
                                <span id="dateActive1"><?php echo lang('DECEMBER 15, 2013') ?></span>	
                            </div>
                        </div>
                        <div class="rows">
                            <img src="assets/uploads/country/small/es.png" alt="" />
                            <div>
                                <h3><?php echo lang('DUBAI') ?></h3>	
                                <span id="timeActive3"><?php echo lang('23:59:00, Monday') ?></span>	
                            </div>
                            <div class="right">
                                <h2>+1-604-360-8805</h2>
                                <span id="dateActive3"><?php echo lang('DECEMBER 15, 2013') ?></span>	
                            </div>
                        </div>
                        <div class="rows">
                            <img src="assets/uploads/country/small/Tunisia.png" alt="" />
                            <div>
                                <h3><?php echo lang('DUBAI') ?></h3>	
                                <span id="timeActive4"><?php echo lang('23:59:00, Monday') ?></span>	
                            </div>
                            <div class="right">
                                <h2>+1-604-360-8805</h2>
                                <span id="dateActive4"><?php echo lang('DECEMBER 15, 2013') ?></span>	
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 nopadding">
                    <div class="container_center kgt36" >
                        <?php
                        if (isset($page_data) && !empty($page_data)) {
                            $count = 1;
                            foreach ($page_data as $set_data) {
                                if ($set_data['type'] != 'career') {
                                    $disply_con = $set_data['sort'];
                                    $hide_con = $set_data['description'];
                                    ?>
                                    <div class="about">
                                        <h2 class="heading2a" ><?php echo $set_data['type']; ?></h2>

                                        <div class="read_data"
                                             id="read_data<?php echo $count; ?>"><?php echo $disply_con; ?></div>
                                        <div class="hide_data"
                                             id="hide_data<?php echo $count; ?>"><?php echo $disply_con;
                                            echo "<br>";
                                            echo $hide_con; ?></div>
                                        <div class="nav-prex-next text-right">
                                            <div class="row">
                                                <div class="col-md-12"><a class="read_more kgtreadmore"
                                                                          id="read_more<?php echo $count; ?>"
                                                                          onClick="read_more('<?php echo $count; ?>');">Read
                                                        More>></a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                $count++;
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="container_right">
                     
                        <a href="#">
                            <div class="box1"> <img src="assets/template/images/warranty_icon.png" alt="" />
                                <h6> <?php echo lang('Get Free Shipping Now') ?> </h6>	
                            </div>
                        </a> <a href="#" >
                            <div class="box2"> <img src="assets/template/images/Laptop_icon.png" alt="" />
                                <h6> <?php echo lang('Win a Laptop') ?> </h6>	
                            </div>
                        </a> <a href="#">
                            <div class="box3"> <img src="assets/template/images/Free_shipping_icon.png" alt="" />
                                <h6> <?php echo lang('Discover our Warranty') ?> </h6>	
                            </div>
                        </a> </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="slider2 overflowhidden"><img src="assets/template/images/button1.png" alt=""
                                                                       class="kgt37" />
                        <?php
                        if ($all_data['library_image'] != '') {
                            ?>
                            <img class="background width100percent1" alt="library image"
                                 src="<?php echo 'assets/uploads/background/full/' . $all_data['library_image']; ?>"
                                 />
                        <?php
                        }
                        ?>
                        <script type="text/javascript" src="assets/template/js/jskgt.js"></script>
                        <div id="content">
                            <div id="container">
                                <div id="carousel"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!--End content-->
</div>
