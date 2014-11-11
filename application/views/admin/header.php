<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title><?php
            if (isset($title)) {
                echo $title;
            }
            ?>
        </title>
        <base href="<?php echo base_url(); ?>">
            <link href="<?php echo site_url('assets/admin/css/mainc81e.css') ?>" rel="stylesheet" type="text/css"/>

           

            <?php
            $addscripts = isset($_POST['addscripts']) ? $_POST['addscripts'] : '';
            
            switch ($addscripts) {
                case 'add_job':
                    ?>
                    <script src="assets/user/js/jquery-1.10.1.min.js" type="text/javascript"></script>

                    <?php
                    break;
                case 'add_knowledge':
                    ?>
                    <script src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>

                    <script src="assets/admin/js/jquery-1.9.1.min.js"></script>

                    <script src="assets/admin/js/bootstrap.min.js"></script>

                    <link href="assets/admin/css/font-awesome.min.css" rel="stylesheet"/>
                    <link href="assets/admin/css/codemirror.min.css" rel="stylesheet"/>
                    <link href="assets/admin/css/blackboard.min.css" rel="stylesheet"/>
                    <link href="assets/admin/css/monokai.min.css" rel="stylesheet"/>
                    <link href="assets/admin/css/summernote.css" rel="stylesheet"/>

                    <script src="assets/admin/js/summernote.min.js"></script>
                    <?php
                    break;
                case 'add_model':
                    ?>
                    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
                    <script>
                        function readURL(input) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();

                                reader.onload = function (e) {
                                    $('#modelimg_prvw').attr('src', e.target.result);
                                }

                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                        $(document).ready(function (e) {
                            $("#pro_modelimage").change(function () {
                                readURL(this);
                                showdelbtn();
                            });
                        });
                        function showdelbtn() {
                            $("#delimagebtn").html("<input type='button' class='focustip padding2px' value='Delete Image' onclick='removeimg();'>");

                        }
                        function removeimg() {
                            $("#modelimg_prvw").attr("src", "./assets/admin/previewimage.jpg");
                        }
                    </script>


                    <?php
                    break;
                case 'add_product':
                    ?>

                    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

                    <script>
                        function readURL(input, wrapper) {


                            if (input.files && input.files[0]) {
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    $('#' + wrapper).attr('src', e.target.result);
                                    showdelbtn(wrapper);
                                }
                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                        $(document).ready(function (e) {
                            $('#vehicle_category_id').change(function () {
                                var selectedcategoryid = $(this).val();
                                var selclass = "#product_type_id option." + selectedcategoryid;
                                $("#product_type_id option").removeClass('selected');
                                $(selclass).addClass('selected');
                                $("#product_type_id option.selected:first").attr('selected', true);
                                AutosetfiledBoxesSelection();
                            });

                            $("#product_type_id").change(function () {
                                AutosetfiledBoxesSelection();

                            });

                            $("#drawing_photo_img").change(function () {
                                readURL(this, 'modelimg_prvw1');
                                //showdelbtn(this);
                            });
                            $("#product_photo_img").change(function () {
                                readURL(this, 'modelimg_prvw2');
                                //showdelbtn(this);
                            });
                            $("#vehicle_photo_img").change(function () {
                                readURL(this, 'modelimg_prvw3');
                                //showdelbtn(this);
                            });
                        });


                        function AutosetfiledBoxesSelection() {
                            var element = $("#product_type_id");

                            var selectedoption = $('option:selected', element).attr('prev');
                            $(".productfield_display div.control-group").addClass("displaynon");
                            var boxestodisplay = selectedoption.split('#');
                            for (i = 0; i < boxestodisplay.length; i++) {
                                var currentoption = "#" + boxestodisplay[i];
                                $(currentoption).removeClass("displaynon");

                            }
                        }
                        function showdelbtn(wrapper) {
                            $('#' + wrapper + '_delete').show();
                            $('#' + wrapper + '_delete').html('<input type="button" class="focustip nopadding" value="Delete Image" onclick="removeimg(\'' + wrapper + '\');">');
                        }
                        function removeimg(wrapper) {
                            $('#' + wrapper).attr("src", "./assets/admin/previewimage.jpg");
                            $('#' + wrapper + '_delete').hide();
                            if (wrapper == 'modelimg_prvw1')
                                $("#drawing_photo_img").val('');
                            if (wrapper == 'modelimg_prvw2')
                                $("#product_photo_img").val('');
                            if (wrapper == 'modelimg_prvw3')
                                $("#vehicle_photo_img").val('');
                        }
                        // not used ajax function - now changed with jquery
                        function setmenufields() {
                            $.ajax({
                                type: "POST",
                                data: '',
                                url: "admin/index/listfields/" + $('#product_type_id').val(),
                                success: function (msg) {
                                    $('.productfield_display').html(msg);
                                    readyfunctns();
                                }
                            });
                        }
                        function readyfunctns() {


                        }
                    </script>
                    <?php
                    break;
                case 'add_productmakers':
                    ?>
                    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
                    <script>
                        function readURL(input) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();

                                reader.onload = function (e) {
                                    $('#makerimg_prvw').attr('src', e.target.result);
                                }

                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                        $(document).ready(function (e) {
                            $("#pro_makerlogo").change(function () {
                                readURL(this);
                                showdelbtn();
                            });
                        });
                        function showdelbtn() {
                            $("#delimagebtn").html("<input type='button' class='focustip padding2px' value='Delete Image'onclick='removeimg();'>");

                        }
                        function removeimg() {
                            $("#makerimg_prvw").attr("src", "./assets/admin/previewimage.jpg");
                        }
                    </script>



                    <?php
                    break;
                case 'add_producttype':
                    ?>
                    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
                    <script>
                        function readURL(input) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();

                                reader.onload = function (e) {
                                    $('#typeimg_prvw').attr('src', e.target.result);
                                }

                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                        $(document).ready(function (e) {
                            $("#pro_image").change(function () {
                                readURL(this);
                                showdelbtn();
                            });
                        });
                        function showdelbtn() {
                            $("#delimagebtn").html("<input type='button' class='focustip padding2px' value='Delete Image' onclick='removeimg();'>");

                        }
                        function removeimg() {
                            $("#typeimg_prvw").attr("src", "./assets/admin/previewimage.jpg");
                            $('#pro_image').val('');
                        }
                    </script>


                    <?php
                    break;
                case 'add_product_category':
                    ?>
                    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

                    <script>
                        function readURL(input, wrapper) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    $('#' + wrapper).attr('src', e.target.result);
                                    showdelbtn(wrapper);
                                }
                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                        $(document).ready(function (e) {
                            $("#VehicleType_Photo").change(function () {
                                readURL(this, 'modelimg_prvw1');

                            });
                            $("#vehicle_category_icon").change(function () {
                                readURL(this, 'modelimg_prvw2');

                            });
                            $("#menu_image").change(function () {
                                readURL(this, 'modelimg_prvw3');

                            });

                        });
                        function showdelbtn(wrapper) {
                            $('#' + wrapper + '_delete').show();
                            $('#' + wrapper + '_delete').html('<input type="button" class="focustip nopadding" value="Delete Image" onclick="removeimg(\'' + wrapper + '\');">');
                        }
                        function removeimg(wrapper) {
                            $('#' + wrapper).attr("src", "./assets/admin/previewimage.jpg");
                            $('#' + wrapper + '_delete').hide();
                            if (wrapper == 'modelimg_prvw1')
                                $("#VehicleType_Photo").val('');
                            if (wrapper == 'modelimg_prvw2')
                                $("#vehicle_category_icon").val('');
                            if (wrapper == 'modelimg_prvw3')
                                $("#menu_image").val('');
                        }
                    </script>

                    <?php
                    break;
                case 'add_promotion':
                    ?>
                    <script src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>

                    <script src="assets/admin/js/jquery-1.9.1.min.js"></script>

                    <script src="assets/admin/js/bootstrap.min.js"></script>

                    <link href="assets/admin/css/font-awesome.min.css" rel="stylesheet"/>
                    <link href="assets/admin/css/codemirror.min.css" rel="stylesheet"/>
                    <link href="assets/admin/css/blackboard.min.css" rel="stylesheet"/>
                    <link href="assets/admin/css/monokai.min.css" rel="stylesheet"/>
                    <link href="assets/admin/css/summernote.css" rel="stylesheet"/>

                    <script src="assets/admin/js/summernote.min.js"></script>

                    <?php
                    break;
                case 'add_promotion_back':
                    ?>
                    <script src="assets/user/js/jquery-1.10.1.min.js" type="text/javascript"></script>
                    <script src="assets/user/js/ckeditor.js"></script>
                    <?php
                    break;
                case 'all_content':
                    ?>

                    <?php
                    break;
                case 'blocked_list':
                    ?>
                    <script src="assets/user/js/jquery-1.10.1.min.js" type="text/javascript"></script>

                    <script type="text/javascript">
                        function confirm_box() {
                            var answer = confirm("Are you sure?");
                            if (!answer)
                                return false;
                        }

                    </script>
                    <?php
                    break;
                case 'blocks_list':
                    ?>
                    <script src="assets/user/js/jquery-1.10.1.min.js" type="text/javascript"></script>
                    <script type="text/javascript">
                        function confirm_box(msg) {
                            var answer = confirm(msg);
                            if (!answer)
                                return false;
                        }

                        $(document).ready(function () {
                            $("#delete_all_blocks").click(function () {
                                if ($("#delete_all_blocks").is(':checked')) {
                                    $(".blocks").prop('checked', true);
                                } else {
                                    $(".blocks").prop('checked', false);
                                }
                            });
                            $("#delete_checked").click(function () {
                                if ($('input.blocks:checkbox:checked').length) {
                                    var msg = "Are you sure???\nYou Want to Delete All.";
                                    var answer = confirm(msg);
                                    if (answer) {
                                        var blocksarray = [];
                                        $('input.blocks:checkbox:checked').each(function () {
                                            blocksarray.push($(this).val());
                                            $(this).parents('tr').hide();
                                        });

                                        var url = "admin/blocks_list/blocksDeleteAll";
                                        $.ajax({
                                            type: "POST",
                                            url: url,
                                            data: {'block_ids': blocksarray},
                                            success: function (data) {
                                            }
                                        });

                                    }
                                } else {
                                    alert("Please select atleast one item.");
                                }

                            });

                        });
                    </script>

                    <?php
                    break;
                case 'cart_blocked_list':
                    ?>
                    <script src="assets/user/js/jquery-1.10.1.min.js" type="text/javascript"></script>
                    <script type="text/javascript">
                        function confirm_box() {
                            var answer = confirm("Are you sure?");
                            if (!answer)
                                return false;
                        }

                    </script>
                    <?php
                    break;
                case 'cart_list':
                    ?>                

                    <?php
                    break;
                case 'content_list':
                    ?>


                    <?php
                    break;
                case 'country_list':
                    ?>

                    <?php
                    break;
                case 'distribution_list':
                    ?>

                    <?php
                    break;
                case 'd_blocks_list':
                    ?>

                    <?php
                    break;
                case 'edit_content':
                    ?>

                    <?php
                    break;
                case 'edit_job':
                    ?>
                    <script src="ckeditor/ckeditor.js"></script>
                    <script type="text/javascript">

                        function confirm_box() {

                            var answer = confirm("Are you sure?");

                            if (!answer)
                                return false;

                        }


                    </script>
                    <script src="assets/user/js/jquery-1.10.1.min.js" type="text/javascript"></script>
                    <?php
                    break;
                case 'edit_knowledge_subtitle':
                    ?>
                    <script src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>

                    <script src="assets/admin/js/jquery-1.9.1.min.js"></script>

                    <script src="assets/admin/js/bootstrap.min.js"></script>

                    <link href="assets/admin/css/font-awesome.min.css" rel="stylesheet"/>
                    <link href="assets/admin/css/codemirror.min.css" rel="stylesheet"/>
                    <link href="assets/admin/css/blackboard.min.css" rel="stylesheet"/>
                    <link href="assets/admin/css/monokai.min.css" rel="stylesheet">
                        <link href="assets/admin/css/summernote.css" rel="stylesheet"/>

                        <script src="assets/admin/js/summernote.min.js"></script>
                        <?php
                        break;
                    case 'edit_maker':
                        ?>
                        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
                        <script>
                        function readURL(input) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();

                                reader.onload = function (e) {
                                    $('#makerimg_prvw').attr('src', e.target.result);
                                    $("#delimagebtn").show();
                                }

                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                        $(document).ready(function (e) {
                            $("#pro_makerlogo").change(function () {
                                readURL(this);
                                showdelbtn();
                            });
                        });
                        function showdelbtn() {
                            $("#delimagebtn").html("<input type='button' class='focustip' value='Delete Image' class='padding2px' onclick='removeimg();'>");

                        }
                        function removeimg() {
                            $("#makerimg_prvw").attr("src", "./assets/admin/previewimage.jpg");
                            $("#delimagebtn").hide();
                            del_makerimagepermanently();


                        }
                        </script>

                        <script>
                            function del_makerimagepermanently() {
                                $.ajax({
                                    type: "POST",
                                    data: '',
                                    url: "admin/index/delete_makerimage/" + $('#delimageid').val(),
                                    success: function (msg) {
                                    }
                                });
                            }
                        </script>


                        <?php
                        break;
                    case 'edit_menu':
                        ?>
                        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
                        <script src="assets/user/js/ckeditor.js"></script>
                        <script type="text/javascript" src="assets/template/js/jquery.imgareaselect.min.js"></script>
                        <script>
                            $(document).ready(function () {
                                var p = $("#uploadPreview");

                                // prepare instant preview
                                $("#uploadImage").change(function () {


                                    // prepare HTML5 FileReader
                                    var oFReader = new FileReader();
                                    oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

                                    oFReader.onload = function (oFREvent) {
                                        p.attr('src', oFREvent.target.result);
                                    };
                                });


                            });

                            function get_vehicle(name) {

                                $.ajax({
                                    type: "POST",
                                    url: "admin/get_vehicle", /* The country id will be sent to this file */
                                    data: "id=" + name,
                                    beforeSend: function () {
                                        $("#Show_vehicle").html("Loading ...");
                                    },
                                    success: function (msg) {
                                        $("#Show_vehicle").html(msg);
                                    }
                                });
                            }

                            function get_brand(name) {

                                $.ajax({
                                    type: "POST",
                                    url: "admin/get_brand", /* The country id will be sent to this file */
                                    data: "id=" + name,
                                    beforeSend: function () {
                                        $("#Show_brand").html("Loading ...");
                                    },
                                    success: function (msg) {
                                        $("#Show_brand").html(msg);
                                    }
                                });
                            }

                            function get_model(name) {

                                $.ajax({
                                    type: "POST",
                                    url: "admin/get_model", /* The country id will be sent to this file */
                                    data: "id=" + name,
                                    beforeSend: function () {
                                        $("#Show_model").html("Loading ...");
                                    },
                                    success: function (msg) {
                                        $("#Show_model").html(msg);
                                    }
                                });
                            }

                        </script>

                        <?php
                        break;
                    case 'edit_product':
                        ?>
                        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

                        <script>
                            function readURL(input, wrapper) {
                                if (input.files && input.files[0]) {
                                    var reader = new FileReader();
                                    reader.onload = function (e) {
                                        $('#' + wrapper).attr('src', e.target.result);
                                        showdelbtn(wrapper);
                                    }
                                    reader.readAsDataURL(input.files[0]);
                                }
                            }
                            $(document).ready(function (e) {
                                $('#vehicle_category_id').change(function () {
                                    var selectedcategoryid = $(this).val();
                                    var selclass = "#product_type_id option." + selectedcategoryid;

                                    $("#product_type_id option").removeClass('selected');
                                    $(selclass).addClass('selected');
                                    $("#product_type_id option.selected:first").attr('selected', true);
                                    AutosetfiledBoxesSelection();
                                });

                                $("#product_type_id").change(function () {
                                    AutosetfiledBoxesSelection();
                                });

                                $("#drawing_photo_img").change(function () {
                                    readURL(this, 'modelimg_prvw1');

                                });
                                $("#product_photo_img").change(function () {
                                    readURL(this, 'modelimg_prvw2');

                                });
                                $("#vehicle_photo_img").change(function () {
                                    readURL(this, 'modelimg_prvw3');

                                });
                            });
                            function AutosetfiledBoxesSelection() {
                                var element = $("#product_type_id");

                                var selectedoption = $('option:selected', element).attr('prev');
                                $(".productfield_display div.control-group").addClass("displaynon");
                                var boxestodisplay = selectedoption.split('#');
                                for (i = 0; i < boxestodisplay.length; i++) {
                                    var currentoption = "#" + boxestodisplay[i];
                                    $(currentoption).removeClass("displaynon");

                                }
                            }
                            function showdelbtn(wrapper) {
                                $('#' + wrapper + '_delete').show();
                                $('#' + wrapper + '_delete').html('<input type="button" class="focustip nopadding" value="Delete Image" onclick="removeimg(\'' + wrapper + '\');">');
                            }
                            function removeimg(wrapper) {
                                $('#' + wrapper).attr("src", "./assets/admin/previewimage.jpg");
                                $('#' + wrapper + '_delete').hide();
                                if (wrapper == 'modelimg_prvw1') {
                                    $("#drawing_photo_img").val('');
                                    var imagetodelete = 'drawing_photo';
                                    del_productimagepermanently(imagetodelete);
                                }
                                if (wrapper == 'modelimg_prvw2') {
                                    $("#product_photo_img").val('');
                                    var imagetodelete = 'product_photo';
                                    del_productimagepermanently(imagetodelete);
                                }
                                if (wrapper == 'modelimg_prvw3') {
                                    $("#vehicle_photo_img").val('');
                                    var imagetodelete = 'vehicle_photo';
                                    del_productimagepermanently(imagetodelete);
                                }
                            }
                            // not used ajax function - now changed with jquery
                            function setmenufields() {

                                $.ajax({
                                    type: "POST",
                                    data: '',
                                    url: "admin/index/listfields/" + $('#product_type_id').val(),
                                    success: function (msg) {
                                        $('.productfield_display').html(msg);
                                        readyfunctns();
                                    }
                                });
                            }
                            function readyfunctns() {

                            }

                            function del_productimagepermanently(imagetodelete) {
                                $.ajax({
                                    type: "POST",
                                    data: '',
                                    url: "admin/index/delete_productimagepermanently/" + $('#delimageid').val() + "/" + imagetodelete,
                                    success: function (msg) {
                                    }
                                });
                            }
                        </script>


                        <?php
                        break;
                    case 'edit_producttype':
                        ?>
                        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

                        <script>
                            function readURL(input) {
                                if (input.files && input.files[0]) {
                                    var reader = new FileReader();
                                    reader.onload = function (e) {
                                        $('#typeimg_prvw').attr('src', e.target.result);
                                        $("#delimagebtn").show();
                                    }
                                    reader.readAsDataURL(input.files[0]);
                                }
                            }
                            $(document).ready(function (e) {
                                $("#pro_image").change(function () {
                                    readURL(this);
                                    showdelbtn();
                                });
                            });
                            function showdelbtn() {
                                $("#delimagebtn").html("<input type='button' class='focustip padding2px' value='Delete Image' onclick='removeimg();'>");

                            }
                            function removeimg() {
                                $("#typeimg_prvw").attr("src", "./assets/admin/previewimage.jpg");
                                $("#delimagebtn").hide();
                                del_typeimagepermanently();
                            }
                        </script>

                        <script>
                            function del_typeimagepermanently() {
                                $.ajax({
                                    type: "POST",
                                    data: '',
                                    url: "admin/index/delete_typeimage/" + $('#delimageid').val(),
                                    success: function (msg) {
                                    }
                                });
                            }
                        </script>


                        <?php
                        break;
                    case 'edit_product_category':
                        ?>

                        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

                        <script>
                            function readURL(input, wrapper) {
                                if (input.files && input.files[0]) {
                                    var reader = new FileReader();
                                    reader.onload = function (e) {
                                        $('#' + wrapper).attr('src', e.target.result);
                                        showdelbtn(wrapper);
                                    }
                                    reader.readAsDataURL(input.files[0]);
                                }
                            }
                            $(document).ready(function (e) {
                                $("#VehicleType_Photo").change(function () {
                                    readURL(this, 'modelimg_prvw1');

                                });
                                $("#vehicle_category_icon").change(function () {
                                    readURL(this, 'modelimg_prvw2');

                                });
                                $("#menu_image").change(function () {
                                    readURL(this, 'modelimg_prvw3');

                                });

                            });
                            function showdelbtn(wrapper) {
                                $('#' + wrapper + '_delete').show();
                                $('#' + wrapper + '_delete').html('<input type="button" class="focustip nopadding" value="Delete Image" onclick="removeimg(\'' + wrapper + '\');">');
                            }
                            function removeimg(wrapper) {
                                $('#' + wrapper).attr("src", "./assets/admin/previewimage.jpg");
                                $('#' + wrapper + '_delete').hide();
                                if (wrapper == 'modelimg_prvw1') {
                                    $("#VehicleType_Photo").val('');
                                    var imagetodelete = 'VehicleType_Photo';
                                    del_vehiclecategoryimagepermanently(imagetodelete);
                                }
                                if (wrapper == 'modelimg_prvw2') {
                                    $("#vehicle_category_icon").val('');
                                    var imagetodelete = 'vehicle_category_icon';
                                    del_vehiclecategoryimagepermanently(imagetodelete);
                                }
                                if (wrapper == 'modelimg_prvw3') {
                                    $("#menu_image").val('');
                                    var imagetodelete = 'menu_image';
                                    del_vehiclecategoryimagepermanently(imagetodelete);
                                }
                            }
                            function del_vehiclecategoryimagepermanently(imagetodelete) {
                                $.ajax({
                                    type: "POST",
                                    data: '',
                                    url: "admin/index/del_vehiclecategoryimagepermanently/" + $('#delimageid').val() + "/" + imagetodelete,
                                    success: function (msg) {
                                    }
                                });
                            }
                        </script>


                        <?php
                        break;
                    case 'edit_product_model':
                        ?>
                        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

                        <script>
                            function readURL(input) {
                                if (input.files && input.files[0]) {
                                    var reader = new FileReader();

                                    reader.onload = function (e) {
                                        $('#modelimg_prvw').attr('src', e.target.result);
                                        $("#delimagebtn").show();
                                    }

                                    reader.readAsDataURL(input.files[0]);
                                }
                            }
                            $(document).ready(function (e) {
                                $("#pro_modelimage").change(function () {
                                    readURL(this);
                                    showdelbtn();
                                });
                            });
                            function showdelbtn() {
                                $("#delimagebtn").html("<input type='button' class='focustip nopadding' value='Delete Image' onclick='removeimg();'>");

                            }
                            function removeimg() {
                                $("#modelimg_prvw").attr("src", "./assets/admin/previewimage.jpg");
                                $("#delimagebtn").hide();
                                del_modelimagepermanently();
                            }
                        </script>

                        <script>
                            function del_modelimagepermanently() {
                                $.ajax({
                                    type: "POST",
                                    data: '',
                                    url: "admin/index/delete_modelimage/" + $('#delimageid').val(),
                                    success: function (msg) {
                                    }
                                });
                            }
                        </script>


                        <?php
                        break;
                    case 'edit_promotion':
                        ?>
                        <script src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>
                        <link href="assets/admin/css/font-awesome.min.css" rel="stylesheet"/>
                        <link href="assets/admin/css/codemirror.min.css" rel="stylesheet"/>
                        <link href="assets/admin/css/blackboard.min.css" rel="stylesheet"/>
                        <link href="assets/admin/css/monokai.min.css" rel="stylesheet"/>
                        <link href="assets/admin/css/summernote.css" rel="stylesheet"/>

                        <script src="assets/admin/js/jquery-1.9.1.min.js"></script>

                        <script src="assets/admin/js/bootstrap.min.js"></script>

                        <script src="assets/admin/js/summernote.min.js"></script>
                        <?php
                        break;
                    case 'globe_list':
                        ?>


                        <?php
                        break;
                    case 'home_page':
                        ?>
                        <script type="text/javascript">

                            function confirm_box() {

                                var answer = confirm("Are you sure?");

                                if (!answer)
                                    return false;

                            }


                        </script>
                        <?php
                        break;
                    case 'home_page_list':
                        ?>
                        <script src="assets/user/js/jquery-1.10.1.min.js" type="text/javascript"></script> <!-- was it in the actual code-->
                        <script type="text/javascript">
                            function confirm_box() {
                                var answer = confirm("Are you sure?");
                                if (!answer)
                                    return false;
                            }

                        </script>
                        <?php
                        break;
                    case 'interview_list':
                        ?>

                        <?php
                        break;
                    case 'job_list':
                        ?>


                        <?php
                        break;
                    case 'knowledge_sub_list':
                        ?>


                        <?php
                        break;
                    case 'left_menu':
                        ?>
                                      
                        <?php
                        break;
                    case 'library_list':
                        ?>
                                                       
                        <script type="text/javascript">
                            function confirm_box() {
                                var answer = confirm("Are you sure?");
                                if (!answer)
                                    return false;
                            }

                        </script>
                        <?php
                        break;
                    case 'library_product_list':
                        ?>

                        <?php
                        break;
                    case 'list_cart_details':
                        ?>
                        <script src="assets/user/js/jquery-1.10.1.min.js" type="text/javascript"></script>
                        <script>
                            $(document).ready(function (e) {
                                $(".mainrow .minimize_block").click(function () {
                                    if ($(this).val() == '+')
                                        $(this).val('-');
                                    else
                                        $(this).val('+');
                                    $(this).closest(".mainrow").next(".detailedrow").toggle(100);
                                });
                            });
                        </script>
                        <?php
                        break;
                    case 'makers_list':
                        ?>

                        <?php
                        break;
                    case 'manage_menus':
                        ?>

                        <script type="text/javascript">
                            function confirm_box() {
                                var answer = confirm("Are you sure?");
                                if (!answer)
                                    return false;
                            }

                        </script>
                        <?php
                        break;
                    case 'product_catagory_list':
                        ?>

                        <?php
                        break;
                    case 'product_list':
                        ?>

                        <?php
                        break;
                    case 'product_model_list':
                        ?>

                        <?php
                        break;
                    case 'product_type_list':
                        ?>

                        <?php
                        break;
                    case 'promotion_category_list':
                        ?>

                        <?php
                        break;
                    case 'promotion_list':
                        ?>

                        <?php
                        break;
                    case 'promotion_user_list':
                        ?>



                        <?php
                        break;
                    case 'question_list':
                        ?>

                        <?php
                        break;
                    case 'serial_list':
                        ?>

                        <?php
                        break;
                    case 'single_menu':
                        ?>

                        <?php
                        break;
                    case 'slider_list':
                        ?>



                        <?php
                        break;
                    case 'view_winner':
                        ?>
                        <script src="assets/user/js/jquery-1.10.1.min.js" type="text/javascript"></script>
                        <?php
                        break;
                    case 'welcome_page_list':
                        ?>
                        <script type="text/javascript">
                            function confirm_box() {
                                var answer = confirm("Are you sure?");
                                if (!answer)
                                    return false;
                            }

                        </script>
                        <?php
                        break;
                    case 'winner_list':
                        ?>
                        <script src="assets/user/js/jquery-1.10.1.min.js" type="text/javascript"></script>
                        <?php
                        break;
                    case 'career_add_job':
                        ?>


                        <?php
                        break;
                    case 'career_edit_job':
                        ?>


                        <?php
                        break;
                    case 'career_interview_list':
                        ?>


                        <?php
                        break;
                    case 'career_job_list':
                        ?>



                        <?php
                        break;
                    case 'career_question_list':
                        ?>


                        <?php
                        break;
                    default:
                        
                        break;
                }
                ?>
                         <script>
                function get_lang(name, id, value) {

                    $.ajax({
                        type: "POST",
                        url: "admin/index/set_lang", /* The country id will be sent to this file */
                        data: "lang=" + value,
                        beforeSend: function () {

                        },
                        success: function (msg) {
                            location.reload();

                        }
                    });
                }
            </script>

                </head>

                <body>
