<!Doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title ?></title>
        <link rel="icon" href="<?php echo base_url() ?>favicon.ico" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/template/css/bootstrap.css'); ?>" />

        <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/template/css/font-awesome.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/template/css/bootstrap-select.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/template/css/style.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/template/css/style_repos.css'); ?>" media="screen">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/template/css/msdropdown/dd.css'); ?>" media="screen">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/template/css/msdropdown/flags.css'); ?>" media="screen">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/master/css/contact_us.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/master/css/flipclock.css'); ?>" media="screen">
        <script type="text/javascript" src="<?php echo base_url() ?>js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>js/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="<?php echo site_url('assets/template/js/bootstrap.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo site_url('assets/template/js/lang_select.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo site_url('assets/template/js/bootstrap-select.min.js'); ?>"></script>

        <script type="text/javascript" src="<?php echo site_url('assets/template/js/countdown.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo site_url('assets/master/js/flipclock.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo site_url('assets/template/js/msdropdown/jquery.dd.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo site_url('assets/template/js/quicksearch.js'); ?>"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/template/css/bootstrap-datetimepicker.min.css'); ?>">
        <script type="text/javascript" src="<?php echo site_url('assets/template/js/bootstrap-datetimepicker.min.js'); ?>"></script>
        <?php foreach ($css_src as $css) : ?>
            <link rel="stylesheet" href="<?php echo $css ?>" type="text/css" media="screen"/>
        <?php endforeach; ?>
    
        <script type="text/javascript">
            base_url = '<?php echo base_url(); ?>';
            
            /** show date time on header **/
            $(function(){
                $.ajaxSetup({
                    async:false
                })
                $.ajax({
                    type: "POST",
                    url: base_url+"front/get_current_time",
                    success: function(msg){
                        startTime(msg); 
                    }
                });
                $.ajaxSetup({
                    async:true
                })
            });      
        </script>
        <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/master/css/welcome.css'); ?>" media="screen">
<link href="<?php echo site_url('assets/template/css/inlinestylesalt.css'); ?>" rel="stylesheet" type="text/css">
<style type="text/css">
            // application\views\promotion\promotion.php"
            #kgtpromo .readmore1{color:red;} 
            #knowledge_center .font20pxbold{font-size:20px; font-weight: bold;}
            #knowledge_center .boxshadownone{box-shadow:none;padding:0px}

            // application\views\career\career.php, application\views\career\apply_form.php
            .red1{color:red;}  
            #kgt1{position:absolute; top:0px; right:0px; z-index:99999; color:#F00;}
            .readmore1{color:red;}  
            #permanent_job img.nobottommargin{margin-bottom:0px;}
             #countries .width245px, select #countries .width245px, #career_countries .width245px{width:245px;}


            // used in \application\views\promotion\promotion_form.php
            #countdownplace .floatright1{float:right;}
            .kgtmargin{margin: 0 18px 20px 18px;}
            .nomargin{margin:0px;}
            #kgtnomargin{margin:0px;}
            // application\views\distribution\distribution.php"
            #country .width100percent1, .width100percent1{width:100%;}

            //application\views\career\success.php"
            #modal_success a.floatright1, #modal_success.floatright1{float:right;}

            // application\views\cart\cart.php
            #not_empty_cart .black1, .black1{color:#000;} 
            //"C:\Users\spartan\Documents\My Web Sites\kondarglobal-codeignitor\shahla\application\views\cart\verify_submit.php"
            .floatright1{float:right;}
            .black2-nodisplay{display:none; color: black;  background-color: whitesmoke;}
            .black2-displayinline{display:inline; color: black;  background-color: whitesmoke;}
            .font575757-c{color: #575757; font-family: arial; font-size: 12px;}
            .alignleft{text-align: left;}
            .aligncenter{text-align:center;}
            .kgtmargin1{float: right; margin: 23px 7px 0px 0px; width:auto;}
            .margintop30px{margin-top: 30px;}
            .kgtmargin{margin: 0 18px 20px 18px;}
.kgtcanadaphone{position:relative;top:-294px;left:75px;}
.kgtukphone{position:relative;top:-294px;left:251px;}
.kgttunisiaphone{position:relative;top:-259px;left:246px;}
.kgtdubaiphone{position:relative;top:-233px;left:305px;}
        </style>
    </head>
