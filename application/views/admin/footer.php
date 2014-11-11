</div>

<?php
$addscripts = isset($_POST['addscripts']) ? $_POST['addscripts'] : '';
switch ($addscripts) {
    case 'add_job':
        ?>
        <script src="assets/user/js/ckeditor.js"></script>
        <script src="assets/user/js/jquery-1.10.1.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(function () {
                var counter = 1;
                $("#addButton").click(function () {
                    for (i = 0; i < 1; i++) {
                        var newTextBoxDiv = $(document.createElement('div'))
                                .attr("id", 'TextBoxDiv' + counter)
                                .attr("class", 'control-group');
                        newTextBoxDiv.html('<label class="control-label">Question ' + counter + ' :</label><div class="controls"><input id="title2" name="question[]" class="focustip span10" type="text" value="" required ></div><br /><label class="control-label">Duration :</label><div class="controls"><select name="duration[]" required><option  value="">Select</option><option value="1">1</option><option value="5">5</option><option value="10">10</option><option value="20">20</option><option value="30">30</option><option value="40">40</option><option value="50">50</option><option value="60">60</option></select></div><br /><label class="control-label">Minimum Word:</label><div class="controls"><input type="text" name="minword[]" value=""></div>');

                        var removeLink = $('<span class="kgtremove"/>').html("Remove").click(function () {
                            $(newTextBoxDiv).remove();
                            $(this).remove();
                        });


                        $("#TextBoxesGroup").append(newTextBoxDiv).append(removeLink);
                        counter++;
                    }
                    $('#cont').val(counter);
                });
            });
        </script>
        <script>
            CKEDITOR.replace('scope', {
                uiColor: '#F5F5F5',
                toolbar: [
                    ['Bold', 'Italic', 'Underline', '-', 'NumberedList', 'BulletedList', '-'],
                    ['Strike', 'Subscript', 'Superscript'],
                    ['TextColor', 'BGColor', 'FontFamily'],
                    ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
                    ['Styles', 'Format', 'FontSize'],
                ]
            });
        </script>

        <script>
            CKEDITOR.replace('qualification', {
                uiColor: '#F5F5F5',
                toolbar: [
                    ['Bold', 'Italic', 'Underline', '-', 'NumberedList', 'BulletedList', '-'],
                    ['Strike', 'Subscript', 'Superscript'],
                    ['TextColor', 'BGColor', 'FontFamily'],
                    ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
                    ['Styles', 'Format', 'FontSize'],
                ]
            });
        </script>
        <?php
        break;
    case 'add_knowledge':
        ?>

        <script>
            $(function () {

                $('#content_sort .content').summernote({
                    height: 150   //set editable area's height
                });

                $('#content_desc .content').summernote({
                    height: 150   //set editable area's height
                });

                $("#content_sort ul.dropdown-menu li a").attr("href", "javascript:void");
                $("#content_desc ul.dropdown-menu li a").attr("href", "javascript:void");

                $("#send").hover(function () {

                    $("#sort").val($("#content_sort .note-editable").html());
                    $("#desc").val($("#content_desc .note-editable").html());

                });

            });

        </script>
        <script type="text/javascript">
            //<![CDATA[

            // This call can be placed at any point after the
            // <textarea>, or inside a <head><script> in a
            // window.onload event handler.

            // Replace the <textarea id="editor"> with an CKEditor
            // instance, using default configurations.
            CKEDITOR.replace('content',
                    {
                        filebrowserBrowseUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/browser/default/browser.html?Connector=<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/connector.php',
                        filebrowserImageBrowseUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/browser/default/browser.html?Type=Image&Connector=<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/connector.php',
                        filebrowserFlashBrowseUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/browser/default/browser.html?Type=Flash&Connector=<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/connector.php',
                        filebrowserUploadUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/upload.php?Type=File',
                        filebrowserImageUploadUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/upload.php?Type=Image',
                        filebrowserFlashUploadUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/upload.php?Type=Flash'
                    });

            CKEDITOR.replace('content1',
                    {
                        filebrowserBrowseUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/browser/default/browser.html?Connector=<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/connector.php',
                        filebrowserImageBrowseUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/browser/default/browser.html?Type=Image&Connector=<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/connector.php',
                        filebrowserFlashBrowseUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/browser/default/browser.html?Type=Flash&Connector=<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/connector.php',
                        filebrowserUploadUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/upload.php?Type=File',
                        filebrowserImageUploadUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/upload.php?Type=Image',
                        filebrowserFlashUploadUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/upload.php?Type=Flash'
                    });

            //]]>
        </script>
        <?php
        break;
    case 'add_model':
        ?>

        <?php
        break;
    case 'add_product':
        ?>

        <?php
        break;
    case 'add_productmakers':
        ?>

        <?php
        break;
    case 'add_producttype':
        ?>

        <?php
        break;
    case 'add_product_category':
        ?>

        <?php
        break;
    case 'add_promotion':
        ?>

        <?php
        break;
    case 'add_promotion_back':
        ?>

        <script>
            $(function () {

                $('#description').summernote({
                    height: 150   //set editable area's height
                });

                $('#sort').summernote({
                    height: 150   //set editable area's height
                });

                $("#content1 ul.dropdown-menu li a").attr("href", "javascript:void");
                $("#content2 ul.dropdown-menu li a").attr("href", "javascript:void");

                $("#send").hover(function () {


                    $("#content_sort").val($("#content1 .note-editable").html());


                    $("#content_desc").val($("#content2 .note-editable").html());

                });


            });

        </script>

        <script type="text/javascript">


            // This call can be placed at any point after the
            // <textarea>, or inside a <head><script> in a
            // window.onload event handler.

            // Replace the <textarea id="editor"> with an CKEditor
            // instance, using default configurations.
            CKEDITOR.replace('content',
                    {
                        filebrowserBrowseUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/browser/default/browser.html?Connector=<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/connector.php',
                        filebrowserImageBrowseUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/browser/default/browser.html?Type=Image&Connector=<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/connector.php',
                        filebrowserFlashBrowseUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/browser/default/browser.html?Type=Flash&Connector=<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/connector.php',
                        filebrowserUploadUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/upload.php?Type=File',
                        filebrowserImageUploadUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/upload.php?Type=Image',
                        filebrowserFlashUploadUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/upload.php?Type=Flash'
                    });

            CKEDITOR.replace('content1',
                    {
                        filebrowserBrowseUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/browser/default/browser.html?Connector=<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/connector.php',
                        filebrowserImageBrowseUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/browser/default/browser.html?Type=Image&Connector=<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/connector.php',
                        filebrowserFlashBrowseUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/browser/default/browser.html?Type=Flash&Connector=<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/connector.php',
                        filebrowserUploadUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/upload.php?Type=File',
                        filebrowserImageUploadUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/upload.php?Type=Image',
                        filebrowserFlashUploadUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/upload.php?Type=Flash'
                    });


        </script>



        <?php
        break;
    case 'all_content':
        ?>

        <?php
        break;
    case 'blocked_list':
        ?>

        <?php
        break;
    case 'blocks_list':
        ?>

        <?php
        break;
    case 'cart_blocked_list':
        ?>

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
        <script type="text/javascript">
        //moved from line 50 of edit_job.php
            $(function () {
                var counter = <?php echo count($count) + 1; ?>
                ;
                $(document).on('click', '.removeques', function (e) {
                    e = e.target;
                    $(e).closest(".onequstion").remove();
                    countQuestions();
                });
                $("#addButton").click(function () {
                    var el = $(".onequstiontemplate").clone().removeClass('onequstiontemplate').addClass('onequstion');
                    $(el).find('label.quesnum').text('<?php echo lang('Question') ?> ' + counter + ' :');
                    $(el).appendTo('#TextBoxesGroup').show();
                    counter++;
                    $('#cont').val(counter);

                    countQuestions();
                });
            });

            function countQuestions() {
                var i = 0;
                $('#TextBoxesGroup .onequstion .quesnum').each(function () {
                    i++;
                    $(this).text('<?php echo 'Question' ?> ' + i + ' :')
                });
            }
        </script>
        <script type="text/javascript" src="<?php echo site_url('assets/admin/js/jquery.iframe-transport.js') ?>"></script>
        <script type="text/javascript">
            $(document).on('change', 'input[type="file"]', function (event) {
                $.ajax(document.location + "?ajaxupload=1", {
                    files: $(":file"),
                    iframe: true,
                }).success(function (data) {
                    data = $(data).text() ? $(data).text() : data;
                    $(".divjobimage img").prop('src', data).show();
                    $(".job_delete_image").show();
                });
            });
            $(document).on('click', '.job_delete_image', function (event) {
                event.preventDefault();
                $.get($(event.target).prop('href'), function () {
                    $(".divjobimage img").prop('src', '').hide();
                    $(".job_delete_image").hide();
                });
            });
        </script>

        <?php
        break;
    case 'edit_knowledge_subtitle':
        ?>
        <script>
            $(function () {

                $('#content_sort .content').summernote({
                    height: 150   //set editable area's height
                });

                $('#content_desc .content').summernote({
                    height: 150   //set editable area's height
                });

                $("#content_sort ul.dropdown-menu li a").attr("href", "javascript:void");
                $("#content_desc ul.dropdown-menu li a").attr("href", "javascript:void");

                $("#send").hover(function () {

                    $("#sort").val($("#content_sort .note-editable").html());
                    $("#desc").val($("#content_desc .note-editable").html());

                });

            });

        </script>
        <script type="text/javascript">
            //<![CDATA[

            // This call can be placed at any point after the
            // <textarea>, or inside a <head><script> in a
            // window.onload event handler.

            // Replace the <textarea id="editor"> with an CKEditor
            // instance, using default configurations.
            CKEDITOR.replace('content',
                    {
                        filebrowserBrowseUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/browser/default/browser.html?Connector=<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/connector.php',
                        filebrowserImageBrowseUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/browser/default/browser.html?Type=Image&Connector=<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/connector.php',
                        filebrowserFlashBrowseUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/browser/default/browser.html?Type=Flash&Connector=<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/connector.php',
                        filebrowserUploadUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/upload.php?Type=File',
                        filebrowserImageUploadUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/upload.php?Type=Image',
                        filebrowserFlashUploadUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/upload.php?Type=Flash'
                    });

            CKEDITOR.replace('content1',
                    {
                        filebrowserBrowseUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/browser/default/browser.html?Connector=<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/connector.php',
                        filebrowserImageBrowseUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/browser/default/browser.html?Type=Image&Connector=<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/connector.php',
                        filebrowserFlashBrowseUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/browser/default/browser.html?Type=Flash&Connector=<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/connector.php',
                        filebrowserUploadUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/upload.php?Type=File',
                        filebrowserImageUploadUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/upload.php?Type=Image',
                        filebrowserFlashUploadUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/upload.php?Type=Flash'
                    });

            //]]>
        </script>

        <?php
        break;
    case 'edit_maker':
        ?>

        <?php
        break;
    case 'edit_menu':
        ?>

        <?php
        break;
    case 'edit_product':
        ?>

        <?php
        break;
    case 'edit_producttype':
        ?>

        <?php
        break;
    case 'edit_product_category':
        ?>

        <?php
        break;
    case 'edit_product_model':
        ?>

        <?php
        break;
    case 'edit_promotion':
        ?>

        <script>
            $(function () {

                $('#description').summernote({
                    height: 150   //set editable area's height
                });

                $('#sort').summernote({
                    height: 150   //set editable area's height
                });

                $("#content1 ul.dropdown-menu li a").attr("href", "javascript:void");
                $("#content2 ul.dropdown-menu li a").attr("href", "javascript:void");


                $("#send").hover(function () {


                    $("#content_sort").val($("#content1 .note-editable").html());


                    $("#content_desc").val($("#content2 .note-editable").html());

                });

            });

        </script>
        <script type="text/javascript">


            // This call can be placed at any point after the
            // <textarea>, or inside a <head><script> in a
            // window.onload event handler.

            // Replace the <textarea id="editor"> with an CKEditor
            // instance, using default configurations.
            CKEDITOR.replace('content',
                    {
                        filebrowserBrowseUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/browser/default/browser.html?Connector=<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/connector.php',
                        filebrowserImageBrowseUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/browser/default/browser.html?Type=Image&Connector=<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/connector.php',
                        filebrowserFlashBrowseUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/browser/default/browser.html?Type=Flash&Connector=<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/connector.php',
                        filebrowserUploadUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/upload.php?Type=File',
                        filebrowserImageUploadUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/upload.php?Type=Image',
                        filebrowserFlashUploadUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/upload.php?Type=Flash'
                    });

            CKEDITOR.replace('content1',
                    {
                        filebrowserBrowseUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/browser/default/browser.html?Connector=<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/connector.php',
                        filebrowserImageBrowseUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/browser/default/browser.html?Type=Image&Connector=<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/connector.php',
                        filebrowserFlashBrowseUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/browser/default/browser.html?Type=Flash&Connector=<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/connector.php',
                        filebrowserUploadUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/upload.php?Type=File',
                        filebrowserImageUploadUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/upload.php?Type=Image',
                        filebrowserFlashUploadUrl: '<?php echo URLpath; ?>/ckeditor/filemanager/connectors/php/upload.php?Type=Flash'
                    });


        </script>



        <?php
        break;
    case 'globe_list':
        ?>

        <?php
        break;
    case 'home_page':
        ?>

        <?php
        break;
    case 'home_page_list':
        ?>

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

        <?php
        break;
    case 'library_product_list':
        ?>

        <?php
        break;
    case 'list_cart_details':
        ?>

        <?php
        break;
    case 'makers_list':
        ?>

        <?php
        break;
    case 'manage_menus':
        ?>

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

        <?php
        break;
    case 'welcome_page_list':
        ?>

        <?php
        break;
    case 'winner_list':
        ?>

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
        ?>
        
        <?php
        break;
}
?>
</body>
</html>
