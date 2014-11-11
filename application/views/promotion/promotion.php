<?php
if ($this->session->flashdata('error')) {
    $msg = $this->session->flashdata('error');
    ?>
    <script>
	  
        $(document).ready(function(){
			
            $('#modal_block').modal('show');
            $('#block_bttn').click(function(){
                return false;	
            });
            blink(1);
        });

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

    </script>
    <?php
}
?>    

<script>
    $(document).ready(function(){
		var base_url = '<?php echo base_url(); ?>'; // on 08 - oct - 2014 Rakesh kumar 
        $('.openPop').click(function(){
            var id = $(this).attr('id');
            var name = $(this).attr('title');
            $('#promotion_id').attr('value',id);
            $.ajax({
                type: "POST",
                url: "promotion/get_promotion_msg",
                success: function(msg){
                    msg = JSON.parse(msg)
                    $('#show_header').html(msg[0].firstThank_you_header);
                    $('#show_msge').html(msg[0].firstThank_you_msg.replace(/PHRASE/g, name));
                    $('#modal_success').modal('show');
                }
            });
            
            return false;
        });
        $('#ok_bttn').click(function(){
            //		alert('');
            var pro_id = $('#promotion_id').attr('value');
            window.location.href = base_url+"promotion/promotion_form/"+pro_id;
            return false;
        });
	
    });
</script>


<div class="container">
    <div class="main-page">

        <div class="car-lists">
            <div class="form-fill-cart dis-form">
                <div class="row">
                    <div class="col-md-12">
                        <div id="kgtpromo" class="promotion-page">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#download-material" data-toggle="tab"
                                                      id="download-material1"><?php echo lang('DOWNLOAD MATERIALS') ?>
                                        (<?php echo count($download_material); ?>)</a></li>
                                <li><a href="#profile" data-toggle="tab" id="profile1"><?php echo lang('PRESS RELEASE') ?>
                                        (<?php echo count($press_release); ?>)</a></li>
                                <li><a href="#messages" data-toggle="tab" id="messages1"><?php echo lang('CLIENT TESTIMONIAL') ?>
                                        (<?php echo count($client_testi); ?>)</a></li>
                                <li><a href="#knowledge_center" data-toggle="tab" id="knowledge_center1"><?php echo lang('KNOWLEDGE CENTER') ?>
                                        (<?php echo count($knowledge_center); ?>)</a></li>
                                <li><a href="<?php echo base_url(); ?>promotion/awards" id="awardstab"><?php echo lang('AWARDS') ?> </a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div class="tab-pane active" id="download-material">                                    
                                    <div class="download-material">
                                        <div class="row">
                                            <?php
                                            if (isset($download_material) && !empty($download_material)) {
                                                foreach ($download_material as $set_data1) {
                                                    if (isset($set_data1['image']) && $set_data1['image'] != '') {
                                                        $image1 = 'assets/uploads/promotion_section/thumbnails/' . $set_data1['image'];
                                                    }
                                                    ?>
                                                    <div class="col-md-6 marginright50px">
                                                        <div class="media">
                                                            <div class="floatleft1 marginright10px">
                                                                <img class="media-object" src="<?php echo $image1; ?>" alt="..." width="169"
                                                                     height="180">

                                                                <div class="visible-xs media-heading black1"><?php echo $set_data1['name']; ?></div>

                                                                <?php
                                                                if (!empty($set_data1['file'])) {
                                                                    ?>
                                                                    <a class="openPop btn btn-primary" href="#" id="<?php echo $set_data1['id']; ?>"
                                                                       title="<?php echo $set_data1['name']; ?>"><?php echo lang('Download') ?></a>
                                                                       <?php
                                                                   }
                                                                   ?>
                                                            </div>
                                                            <div class="media-body hidden-xs height187px">
                                                                <h4 class="media-heading"><?php echo $set_data1['name']; ?></h4>

                                                                <div><?php echo $set_data1['sort']; ?></div>
                                                            </div>
                                                            <a class="readmore1 marginleft10px"
                                                               href="promotion/view_promotion/<?php echo $set_data1['id']; ?>"
                                                               target="_blank"><?php echo lang('Read More') ?></a>

                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            } else {
                                                echo '<class="col-md-6 marginleft10px">' . lang('There is no data.') . '</h3>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <!--End download-material-->


                                <div class="tab-pane" id="profile">
                                    <div class="row">
                                        <?php
                                        if (isset($press_release) && !empty($press_release)) {
                                            foreach ($press_release as $set_data1) {
                                                if (isset($set_data1['image']) && $set_data1['image'] != '') {
                                                    $image1 = 'assets/uploads/promotion_section/thumbnails/' . $set_data1['image'];
                                                }
                                                ?>
                                                <div class="col-md-6 marginright50px marginbottom20px">
                                                    <div class="media">
                                                        <div class="floatleft1 marginright10px">
                                                            <img class="media-object" src="<?php echo $image1; ?>" alt="..." width="169" height="180">

                                                            <div class="visible-xs media-heading black1"><?php echo $set_data1['name']; ?></div>

                                                            <?php
                                                            if (!empty($set_data1['file'])) {
                                                                ?>

                                                                <a class="openPop btn btn-primary" href="#" id="<?php echo $set_data1['id']; ?>"
                                                                   title="<?php echo $set_data1['name']; ?>"><?php echo lang('Download') ?></a>
                                                                   <?php
                                                               }
                                                               ?>
                                                        </div>
                                                        <div class="media-body hidden-xs height187px">
                                                            <h4 class="media-heading"><?php echo $set_data1['name']; ?></h4>
                                                            <div><?php echo $set_data1['sort']; ?></div>
                                                        </div>
                                                        <a class="readmore1 marginleft10px"
                                                           href="promotion/view_promotion/<?php echo $set_data1['id']; ?>"
                                                           target="_blank"><?php echo lang('Read More') ?></a>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        } else {
                                            echo '<class="col-md-6 marginleft10px">' . lang('There is no data.') . '</h3>';
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="tab-pane" id="messages">
                                    <div class="row">
                                        <?php
                                        if (isset($client_testi) && !empty($client_testi)) {
                                            foreach ($client_testi as $set_data1) {
                                                if (isset($set_data1['image']) && $set_data1['image'] != '') {
                                                    $image1 = 'assets/uploads/promotion_section/thumbnails/' . $set_data1['image'];
                                                }
                                                ?>
                                                <div class="col-md-6 marginright50px">
                                                    <div class="media">
                                                        <div class="floatleft1 marginright10px">
                                                            <img class="media-object" src="<?php echo $image1; ?>" alt="..." width="169" height="180">

                                                            <div class="visible-xs media-heading black1"><?php echo $set_data1['name']; ?></div>

                                                            <?php
                                                            if (!empty($set_data1['file'])) {
                                                                ?>
                                                                <a class="openPop btn btn-primary" href="#" id="<?php echo $set_data1['id']; ?>"
                                                                   title="<?php echo $set_data1['name']; ?>"><?php echo lang('Download') ?></a>
                                                                   <?php
                                                               }
                                                               ?>
                                                        </div>
                                                        <div class="media-body hidden-xs height187px">
                                                            <h4 class="media-heading"><?php echo $set_data1['name']; ?></h4>
                                                            <div><?php echo $set_data1['sort']; ?></div>
                                                        </div>
                                                        <a class="readmore1 marginleft10px"
                                                           href="promotion/view_promotion/<?php echo $set_data1['id']; ?>"
                                                           target="_blank"><?php echo lang('Read More') ?></a>

                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        } else {
                                            echo '<class="col-md-6 marginleft10px">' . lang('There is no data.') . '</h3>';
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="tab-pane" id="awards"></div>
                                <div class="tab-pane" id="knowledge_center">
                                    <div class="knowledge_center">
                                        <div class="row">
                                            <div class="col-md-3 notopmargin">
                                                <ul class="nav nav-pills nav-stacked">
                                                    <?php
                                                    if (isset($knowledge_center) && !empty($knowledge_center)) {
                                                        foreach ($knowledge_center as $set_data1) {
                                                            $know = $this->comman_model->get_all_data_by_id('promotion_section', array('parent_id' => $set_data1['id']));
                                                            echo '<li><h3><a href="#know_' . $set_data1['id'] . '" class="font20pxbold" data-toggle="tab">' . $set_data1['name'] . '</a></h3></li>';
                                                            foreach ($know as $set_data2) {
                                                                echo '<li><a href="#know_' . $set_data2['id'] . '" data-toggle="tab">' . $set_data2['name'] . '</a></li>';
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </ul>

                                            </div>

                                            <div class="col-md-9">
                                                <div class="tab-content boxshadownone">
                                                    <?php
                                                    if (isset($knowledge_center) && !empty($knowledge_center)) {
                                                        $i = 1;
                                                        foreach ($knowledge_center as $set_data1) {
                                                            $know_desc = $this->comman_model->get_all_data_by_id('promotion_section', array('parent_id' => $set_data1['id']));
                                                            if (isset($set_data1['image']) && $set_data1['image'] != '') {
                                                                $image1 = 'assets/uploads/promotion_section/thumbnails/' . $set_data1['image'];
                                                            }
                                                            ?>
                                                            <div
                                                                id="know_<?php echo $set_data1['id']; ?>" <?php echo $i == 1 ? 'class="tab-pane active"' : 'class="tab-pane"'; ?> >
                                                                <div>
                                                                    <h3><?php echo $set_data1['name']; ?>&nbsp;</h3>

                                                                    <div><?php echo $set_data1['sort']; ?></div>
                                                                    <?php
                                                                    if ($image1) {
                                                                        ?>
                                                                        <img src="<?php echo $image1; ?>"
                                                                             class="img-responsive kgtimage225px" alt="<?php echo $set_data1['name']; ?>"/>
                                                                             <?php
                                                                         }
                                                                         ?>
                                                                    <div><?php echo $set_data1['description']; ?></div>

                                                                    <!-- video.js must be in the <head> for older IEs to work. -->
                                                                    <script src="assets/template/js/video.js"></script>

                                                                    <!-- Unless using the CDN hosted version, update the URL to the Flash SWF -->
                                                                    <script>
                                                                        videojs.options.flash.swf = "video-js.swf";
                                                                    </script>
                                                                    <?php
                                                                    $i++;
                                                                    if (isset($set_data1['video']) && !empty($set_data1['video'])) {
                                                                        ?>

                                                                        <video id="example_video_1" class="video-js vjs-default-skin" controls
                                                                               preload="none" width="640" height="264"
                                                                               poster="http://video-js.zencoder.com/oceans-clip.png" data-setup="{}">
                                                                            <source
                                                                                src="assets/uploads/promotion_section/video/<?php echo $set_data1['video']; ?>"
                                                                                type='video/mp4'/>
                                                                        </video>

                                                                        <?php
                                                                    }

                                                                    ?>


                                                                </div>
                                                            </div>
                                                            <?php
                                                            foreach ($know_desc as $set_data2) {
                                                                if (isset($set_data2['image']) && $set_data2['image'] != '') {
                                                                    $image2 = 'assets/uploads/promotion_section/thumbnails/' . $set_data2['image'];
                                                                }
                                                                ?>
                                                                <div id="know_<?php echo $set_data2['id']; ?>" class="tab-pane">
                                                                    <div>
                                                                        <h3><?php echo $set_data2['name']; ?>&nbsp;</h3>
                                                                        <div><?php echo $set_data2['sort']; ?></div>
                                                                        <?php
                                                                        if ($image2) {
                                                                            ?>
                                                                            <img src="<?php echo $image2; ?>"
                                                                                 class="img-responsive marginleftrightauto" alt="<?php echo $set_data2['name']; ?>&nbsp;"/>
                                                                                 <?php
                                                                             }
                                                                             ?>
                                                                        <div><?php echo $set_data2['description']; ?></div>

                                                                        <!-- video.js must be in the <head> for older IEs to work. -->
                                                                        <script src="assets/template/js/video.js"></script>

                                                                        <!-- Unless using the CDN hosted version, update the URL to the Flash SWF -->
                                                                        <script>
                                                                            videojs.options.flash.swf = "video-js.swf";
                                                                        </script>
                                                                        <?php
                                                                        if (isset($set_data2['video']) && !empty($set_data2['video'])) {
                                                                            ?>

                                                                            <video id="example_video_1" class="video-js vjs-default-skin" controls
                                                                                   preload="none" width="640" height="264"
                                                                                   poster="http://video-js.zencoder.com/oceans-clip.png"
                                                                                   data-setup="{}">
                                                                                <source
                                                                                    src="assets/uploads/promotion_section/video/<?php echo $set_data2['video']; ?>"
                                                                                    type='video/mp4'/>
                                                                            </video>

                                                                            <?php
                                                                        }

                                                                        ?>
                                                                    </div>
                                                                </div>
            <?php
        }
    }
}
?>
                                                </div>
                                            </div>

                                        </div>
                                    </div>



                                    <div class="row">
                                        <?php
                                        if (isset($knowledge_center) && !empty($knowledge_center)) {
                                            foreach ($knowledge_center as $set_data1) {
                                                if (isset($set_data1['image']) && $set_data1['image'] != '') {
                                                    $image1 = 'assets/uploads/promotion_section/thumbnails/' . $set_data1['image'];
                                                }
                                                ?>

                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <!--End knowledge center-->

                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
    <!--End content-->
</div>
<!--click show msge-->
<div class="modal fade" id="modal_success">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="box-content-modal">
                    <h2 id="show_header" class="title-modal"><?php echo lang('THANK YOU') ?></h2>
                    <input type="hidden" name="id" id="promotion_id" value="" />
                    <div id="show_msge"></div>
                    <div class="clearfix"></div>
                    <div class="btn-modal">

                        <a href="javascript:void(0)" id="ok_bttn"
                           onClick="$('#modal_success').modal('hide')"
                           class="floatright1 btn btn-primary btn-sm"><?php echo lang('OK') ?> <i
                                class="glyphicon glyphicon-chevron-right"></i></a>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!--block msge-->                
<div class="modal fade" id="modal_block">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="box-content-modal">
                    <h2 class="title-modal blink"><?php echo lang('Warning') ?></h2>

                    <div>unfortunately, you entered wrong verification code during the 3 attempts. Therefore, you will
                        be welcome to use an alternative email or wait for 120 minutes to use the current
                        email <?php echo $this->session->userdata['new_session']['email']; ?> within our website
                    </div>
                    <div class="clearfix"></div>
                    <div class="btn-modal">

                        <a href="javascript:void(0)" id="block_bttn"
                           onClick="$('#modal_block').modal('hide')"
                           class="floatright1 btn btn-primary btn-sm"><?php echo lang('OK') ?> <i
                                class="glyphicon glyphicon-chevron-right"></i></a>
                    </div>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
