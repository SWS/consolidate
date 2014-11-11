<div class="container">
    <div class="main-content kgtmain-content">
        <div class="container" id="kgtcontainer">
            <div class="row">
                <div class="home-quick-search-wrap">
                    <?php include(BASEPATH . '../application/views/master/include/quicksearch.php'); ?>
                </div>
            </div>
            <!--End Adv-search-->
            <a href="#"><img src="<?= global_img_link('chat.png', 'template/images/') ?>" alt="chat"
                             class="kgt17"/></a>

            <div class="clearfix"></div>
            <div class="row margintop30px">
                <div class="col-md-3 container_left positionrelative1">
                    <div class="box-sp"><a href="contact"><img
                                src="<?= global_img_link('call_center_women.png', 'template/images/') ?>" alt="girl"
                                class="kgt18"/> </a>

                        <div class="support_24_7">
                            <a href="contact"><h1 class="in_support_24_7">24/7</h1></a>
                            <a href="contact">
                                <div class="margintop-10px"><span
                                        class="kgt19">Support</span>
                                    <img src="<?= global_img_link('Email_icon.png', 'template/images/') ?>" alt="email"
                                         class="marginbot9px"/>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="left_side">
                        <h1 class="kgt20">
                            <a href="products"><span class="blink">GET FREE QUOTE NOW</span></a></h1>
                        <a href="contact">
                            <div  class="kgt21">
                                <div  class="kgt22">
                                    <img src="<?= global_img_link('flag_1.png', 'template/images/') ?>" alt=""/>
                                </div>
                                <div  class="kgt23"> 
                                    <span
                                        class="fontwhite">VANCOUVER
                                        <br/></span>
                                    <span id="timeActive2"
                                          class="fontwhite9px"></span>
                                </div>
                                <div  class="kgt24">
                                    <img src="<?= global_img_link('horizental_seperator.png', 'template/images/') ?>"
                                         alt=""/>
                                </div>
                                <div  class="kgt25">
                                    <span
                                         class="kgt26">+1-604-360-8805
                                        <br></span>
                                    <span id="dateActive2"
                                           class="kgt27"></span>
                                </div>
                                <div  class="kgt28"><img
                                        src="<?= global_img_link('left_seperator.png', 'template/images/') ?>" alt=""/>
                                </div>
                                <!--end country-->
                                <!--2 country-->
                                <div  class="kgt22"><img
                                        src="<?= global_img_link('flag_2.png', 'template/images/') ?>" alt=""/></div>
                                <div  class="kgt29"> 
                                    <span
                                        class="fontwhite">LONDON
                                        <br/></span>
                                    <span id="timeActive1"
                                          class="fontwhite9px"></span>
                                </div>
                                <div  class="kgt24"><img
                                        src="<?= global_img_link('horizental_seperator.png', 'template/images/') ?>"
                                        alt=""/></div>
                                <div  class="kgt30">
                                    <span
                                         class="kgt26">+44-7455-2249-87
                                        <br> </span>
                                    <span id="dateActive1"
                                           class="kgt27"></span>
                                </div>
                                <div  class="kgt31"><img
                                        src="<?= global_img_link('left_seperator.png', 'template/images/') ?>" alt=""/>
                                </div>
                                <!--end country-->
                                <!--3 country-->
                                <div  class="kgt22"><img
                                        src="<?= global_img_link('flag_3.png', 'template/images/') ?>" alt=""/></div>
                                <div  class="kgt32"> <span
                                        class="fontwhite">DUBAI
                                        <br/>
                                    </span> <span id="timeActive3"
                                                  class="fontwhite9px"></span>
                                </div>
                                <div  class="kgt24"><img
                                        src="<?= global_img_link('horizental_seperator.png', 'template/images/') ?>"
                                        alt=""/></div>
                                <div  class="kgt30"> <span
                                         class="kgt26">+971-56-297-2148
                                        <br>
                                    </span> <span id="dateActive3"
                                                   class="kgt27"></span>
                                </div>
                                <div  class="kgt31"><img
                                        src="<?= global_img_link('left_seperator.png', 'template/images/') ?>" alt=""/>
                                </div>
                                <!--end country-->
                                <!--4country-->
                                <div  class="kgt22"><img
                                        src="<?= global_img_link('flag_4.png', 'template/images/') ?>" alt=""/></div>
                                <div  class="kgt33"> <span
                                        class="fontwhite">TUNIS
                                        <br/>
                                    </span> <span id="timeActive4"
                                                  class="fontwhite9px"></span>
                                </div>
                                <div  class="kgt24"><img
                                        src="<?= global_img_link('horizental_seperator.png', 'template/images/') ?>"
                                        alt=""/></div>
                                <div  class="kgt34">
                                    <span
                                         class="kgt26">+216-20-999-851
                                        <br>
                                    </span> <span id="dateActive4"
                                                   class="kgt27"></span>
                                </div>
                                <!--end country-->
                            </div>
                        </a>
                        <span
                             class="kgt35"></span>
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
                                        <h2 class="heading2" ><?php echo $set_data['title']; ?></h2>

                                        <div class="read_data"
                                             id="read_data<?php echo $count; ?>"><?php echo $disply_con; ?></div>
                                        <div class="hide_data"
                                             id="hide_data<?php echo $count; ?>"><?php echo $disply_con;
                                            echo "<br>";
                                            echo $hide_con; ?></div>
                                        <div class="nav-prex-next text-right">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <a class="read_more kgtreadmore" id="read_more<?php echo $count; ?>"
                                                       onclick="read_more('<?php echo $count; ?>');">Read More>></a>
                                                </div>
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
                   
                        <a href="promotion/view_promotion/41">  
                            <div class="box1">
                                <img src="<?= global_img_link('warranty_icon.png', 'template/images/') ?>" alt="" />
                                <h6> Get Free Shipping Now </h6>
                            </div>  
                        </a>
                        <a href="promotion/view_promotion/40" >  
                            <div class="box2">
                                <img src="<?= global_img_link('Laptop_icon.png', 'template/images/') ?>" alt="" />
                                <h6> Win a Laptop </h6>
                            </div>
                        </a>
                        <a href="promotion/view_promotion/15">
                            <div class="box3">
                                <img src="<?= global_img_link('Free_shipping_icon.png', 'template/images/') ?>" alt="" />
                                <h6> Discover our Warranty </h6>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12">
                    <?php
                    $tmp_url = global_img_link($all_data['library_image'], 'uploads/background/full/');
                    $e_library_bg_image = (!empty($all_data['library_image']) && $tmp_url) ? $tmp_url : base_url() . 'assets/uploads/background/full/awards_bg11.jpg';

                    ?>
                    <div class="slider2"
                         style="background: url(<?= $e_library_bg_image ?>) no-repeat center center scroll !important;background-size:100% 100% !important;">
                        <img src="<?= global_img_link('button1.png', 'template/images/') ?>" alt=""
                             class="kgt37" />
                        <?php
                        if ($all_data['library_image'] != '') {
                            ?>
                           

                            <?php
                        }
                        //
                        ?>
                       <div id="content" >
                            <div id="container">
                                <div id="carousel"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End content-->
</div>
