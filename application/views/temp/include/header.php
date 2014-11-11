<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]>
<html class="no-js" lang="en"> <![endif]-->
<html>
    <head>

        <?php if ((isset($show_distribution_popup) && $show_distribution_popup) || (isset($show_distribution_preview_popup) && $show_distribution_preview_popup) || (isset($email_success)) || (isset($show_verification_popup) && $show_verification_popup)) { ?>
            <script>
                history.forward(100);
                base_url = '<?php echo base_url(); ?>';
            </script>
            <?php
        }
        $bln_block_email_by_cookie = true;
        ?>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?php
            if (isset($title)) {
                echo $title;
            }
            ?>
        </title>
        <base href="<?php echo site_url(''); ?>">
        <!-- beware of these lines order. Changing the order of some of those lines could affect or cause the entire site to malfunctioning -->
        <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/template/css/bootstrap.css'); ?>"
              media="screen">


        <script type="text/javascript" src="<?php echo site_url('assets/template/js/jquery-1.11.0.min.js'); ?>"></script>
        <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <!-- Also lets asure the correct order of the following 3 lines-->
        <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/template/css/msdropdown/dd.css'); ?>" />
        <script type="text/javascript"  src="<?php echo site_url('assets/template/js/msdropdown/jquery.dd.js'); ?>"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/template/css/msdropdown/flags.css'); ?>" />

        <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/template/css/font-awesome.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/template/css/bootstrap-select.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/template/css/style.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/template/css/style_repos.css'); ?>"
              media="screen">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/master/css/flipclock.css'); ?>"
              media="screen">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/master/css/welcome.css'); ?>"
              media="screen">



        <script type="text/javascript" src="<?php echo site_url('assets/template/js/bootstrap.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo site_url('assets/template/js/lang_select.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo site_url('assets/template/js/bootstrap-select.min.js'); ?>"></script>

        <script type="text/javascript" src="<?php echo site_url('assets/template/js/countdown.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo site_url('assets/master/js/flipclock.js'); ?>"></script>


        <link rel="stylesheet" type="text/css"
              href="<?php echo site_url('assets/template/css/bootstrap-datetimepicker.min.css'); ?>">
        <script type="text/javascript"
        src="<?php echo site_url('assets/template/js/bootstrap-datetimepicker.min.js'); ?>"></script>

        <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/template/css/lightbox.css'); ?>"
              media="screen">
        <script type="text/javascript" src="<?php echo site_url('assets/template/js/lightbox-2.6.min.js'); ?>"></script>

        <script type="text/javascript" src="<?php echo site_url('assets/template/js/promotion.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo site_url('assets/template/js/quicksearch.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo site_url('assets/template/js/productslist.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo site_url('assets/template/js/cart.js'); ?>"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/template/css/avstyles.css'); ?>">

        <link rel="stylesheet" href="<?php echo site_url('assets/template/css/demo.css'); ?>" type="text/css"
              media="screen"/>
        <script type="text/javascript" src="<?php echo site_url('assets/template/js/modernizr.custom.min.js'); ?>"></script>
        <script src="<?php echo site_url('assets/template/js/jquery.wmuslider.js'); ?>"></script>
        <script src="<?php echo site_url('assets/home/js/home.js'); ?>" type="text/javascript"></script>

        <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/home/css/home.css'); ?>">



        <?php if (isset($GLOBALS['css'])) : foreach ($GLOBALS['css'] as $css): ?>
                <link rel="stylesheet" href="<?php echo substr($css, 0, 4) == "http" ? $css : site_url($css); ?>"/>
                <?php
            endforeach;
        endif;
        ?>

        <?php if (isset($GLOBALS['js'])) : foreach ($GLOBALS['js'] as $js): ?>
                <script src="<?php echo substr($js, 0, 4) == "http" ? $js : site_url($js); ?>"></script>
                <?php
            endforeach;
        endif;
        ?>

        <?php
        if (isset($head_css) && $head_css) {
            print($head_css);
        }
        ?>
        <link href="<?php echo site_url('assets/template/css/inlinestylesalt.css'); ?>" rel="stylesheet" type="text/css">
        <?php
        if (strpos($_SERVER['REQUEST_URI'], 'distribution') != false)
            include 'distribution_script.php';
        ?>

        <link href="assets/template/css/video-js.css" rel="stylesheet" type="text/css">
        <!-- video.js must be in the <head> for older IEs to work. -->
        <script src="assets/template/js/video.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                var base_url = "<?php echo base_url(); ?>";
            });
        </script>

        <link href="assets/template/css/inlinestylesalt.css" rel="stylesheet" type="text/css">
        
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
            #modal_success a .floatright1, #modal_success .floatright1{float:right;}

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
    <body>
        <div class="bodywrapper">
<?php include 'menu.php'; ?>
       