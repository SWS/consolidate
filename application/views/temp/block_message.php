<!doctype html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en"> <!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>K G T Auto Spare Parts</title>
<link rel="stylesheet" type="text/css" href="./css/bootstrap.css" media="screen">
<link rel="stylesheet" type="text/css" href="./css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="./css/style.css">
<link rel="stylesheet" type="text/css" href="./css/style_repos.css" media="screen">
<link rel="stylesheet" type="text/css" href="./css/bootstrap-datetimepicker.min.css">
<script type="text/javascript" src="./js/jquery.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="./js/bootstrap.js"></script>
<script type="text/javascript" src="./js/lang_select.js"></script>
<script type="text/javascript" src="./js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#polyglotLanguageSwitcher').polyglotLanguageSwitcher({
        effect: 'fade',
        testMode: true,
        onChange: function(evt){
            alert("The selected language is: "+evt.selectedItem);
        }
    });

            $('#notify_submit').modal('show');
            $('.datetimepicker').datetimepicker({timepicker: false, format: 'Y-m-d'});
        });
    </script>
    <link href="<?php echo site_url('assets/template/css/inlinestylesalt.css'); ?>" rel="stylesheet" type="text/css">
</head>

<body>
	<div class="bodywrapper">
         <?php include('/../temp/include/header_child.php');?>

<div class="container">
    <div class="row bread">
        <div class="col-md-12">
            <div class="text-bread">
                PRODUCT GALLERY (APPLICATION) ./&nbsp;CARS &nbsp; <img src="images/car_icon.png"/>&nbsp;&nbsp; /&nbsp;&nbsp;BRAND
                &nbsp;/&nbsp;TOYOTA &nbsp;/&nbsp;CART
            </div>
        </div>

    </div>
</div>
<!--End bread-->

<div class="container">
    <div class="main-page">

        <div class="car-lists">
            <div class="form-fill-cart">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Fill in Cart and Contact Details</h3>

                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-6 control-label">Name and Surname</label>

                                <div class="col-sm-6">
                                    <input type="email" class="form-control" id="inputEmail3"
                                           placeholder="Name and Surname">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-6 control-label">Company</label>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="inputPassword3" placeholder="Company">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-6 control-label">Designation</label>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="inputPassword3"
                                           placeholder="Designation">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-6 control-label">Country</label>

                                <div class="col-sm-6">
                                    <select name="country" class="form-control selectpicker kgt2">
                                        <option value="">Select a country</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-6 control-label">Telephone</label>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="inputPassword3" placeholder="Telephone">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-6 control-label">Email</label>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="inputPassword3" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-6 control-label">Deadline</label>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control datetimepicker" id="inputPassword3"
                                           placeholder="Deadline">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-6 control-label">RFQ Number</label>

                                <div class="col-sm-6">
                                    012012-54525485648-4590458345-45435
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-6 control-label">Incoterms</label>

                                <div class="col-sm-6">
                                    <select name="incoterms" class="form-control selectpicker kgt2">
                                        <option value="">Incoterms</option>
                                    </select>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="col-md-6">
                        <div class="boxblack400"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered my-table">
                            <thead>
                            <tr>
                                <th>DELETE</th>
                                <th>No.</th>
                                <th>QYT</th>
                                <th>COMMENTS</th>
                                <th>KGT REF.</th>
                                <th>VEHICLE PHOTO</th>
                                <th>APPLICATION</th>
                                <th>OEM REF.</th>
                                <th>PRODUCT PHOTO</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="bgrgb219">
                                <td><span><a href="" class="black1"><i class="fa fa-times"></i></a></span></td>
                                <td><span
                                        class="font575757">1</span>
                                </td>
                                <td><span
                                        class="font575757">?</span>
                                </td>
                                <td class="font575757">
                                    <span>?</span></td>
                                <td class="font575757">
                                    KG9641504<span></span></td>
                                <td class="font575757">
                                    <span><img src="images/vehicle_truck_img03.png"/></span></td>
                                <td class="font575757">
                                    <span>MITSUBICHI CENTER NM</span></td>
                                <td class="font575757">
                                    <span>MEO017242</span></td>
                                <td class="font575757">
                                    <span><img src="images/product_truck_img03.png"/></span></td>


                            </tr>
                            </tbody>
                        </table>
                    </div>

						</div>
					</div>

	        	</div>

	        	<div class="clearfix"></div>
	        	<div class="nav-prex-next text-right">
	        		<div class="row">
	        			<div class="col-md-12">
	        				<a href="selected_brand_items_final.php" class="btn btn-primary btn-sm">Back</a>
	        				<a href="product.php" class="btn btn-primary btn-sm">CONTINUE SHOPPING</a>
	        				<a href="truck_varify_submit.php" class="btn btn-primary btn-sm">SUBMIT</a>	
	        			</div>
	        		</div>
	        	</div>

    </div>
    <!--End content-->
</div>

    	

<div class="footer">
    <div class="container">

        <div class="footer_wrap">
            <div class="row">
                <div class="col-md-2">
                    <div class="fb1">
                        <div>
                            <ul class="kgtclientul">
                                <li><span class="font18pxbold">Client</span></li>
                                <li><a href="#">Follow Up Orders</a></li>
                                <li><a href="#">Get Instant Quote</a></li>
                                <li><a href="#">Claim Warranty</a></li>
                                <li><a href="claim_award.php">Claim Award</a></li>
                                <li><img src="images/white_bottom_line.png" alt=""/></li>
                                <li><span class="font18pxbold">Media and Press</span></li>
                                <li><a href="#">Press Release</a></li>
                                <li><a href="#">Client Testimonial</a></li>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="fb2 col-md-7">
                    <div class="row">
                        <div class="col-md-6 col-xs-6">
                            <div class="fb2_inside1">
                                <h2 class="heading2b">
                                    Knowledge Center</h2>

                                <a href="promotion_knowledge_center.php"><span
                                        class="font575757-a">Friction Material</span></a>
                                <br/>
                                <a href="promotion_knowledge_center.php"><span class="font575757-b">Filtration System</span></a>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-6">
                            <div class="fb2_inside2">
                                <h2 class="heading2b">
                                    Downloads</h2>
                                <a href="#"><span
                                        class="font575757-a">Reading Materials</span></a><br/>
                                <a href="#"><span
                                        class="font575757-a">Videos</a>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-6 col-xs-6">
                            <div class="fb2_inside3">
                                <h2 class="heading2b">
                                    Legal Notices</h2>
                                <a href="#"><span
                                        class="font575757-a">Privacy Policy</span></a><br/>
                                <a href="#"><span
                                        class="font575757-a">Disclaimer</span></a>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-6">
                            <div class="fb2_inside4 col-md-6 col-xs-6">
                                <h2 class="heading2"b>
                                    Work With KGT</h2>
                                <a href="career.php"><span
                                        class="font575757-a">Careers</span></a><br/>
                                <a href="#"><span
                                        class="font575757-a">Intership Program</span></a><br/>
                                <a href="#"><span
                                        class="font575757-a">Part Time Job</span></a><br/>
                                <a href="#"><span
                                        class="font575757-a">Out sourcing</span></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="fb3 col-md-3">
                    <div class="kgtimage1">
                        <img src="images/new.png" alt="" class="kgtimage1margin"/>
                    </div>
                    <div
                        class="kgtimage2">
                        <img src="images/button2.png" alt=""
                             class="kgtimage2style"/>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="fb4">
            <div class="row nomargin">

                <div class="col-md-6 copyright-area floatleft1 margintop10px">
                    <span class="font12pxb">Copy Right &copy 2014 Kondar Global. All rights Reserved</span>
                </div>
                <div class="col-md-6 social text-right">
                    <div class="displayinlineblock margintop10px">
                        <span class="font12pxc">Keep in Touch with us</span>

                    </div>
                    <div class="displayinlineblock margintop10px">
                        <a href="#"> <img src="images/facebook_icon.png" alt=""/> </a>
                        <a href="#"> <img src="images/icon2.png" alt=""/> </a>
                        <a href="#"> <img src="images/youtube_icon.png" alt=""/> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End footer-->

</div>


<!--Modal shopping decision cart-->
    	<div class="modal fade" id="notify_submit">
		  <div class="modal-dialog">
		    <div class="modal-content">

            <div class="modal-body">
                <div class="box-content-modal">
                    <h2 class="title-modal">AFTER THREE TRIALS YOUR CODE IS STILL WRONG. PLEASE TRY AFTER 120
                        MINUTES.</h2>

                    <div class="clearfix"></div>
                    <div class="btn-modal">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="javascript:" onClick="$('#notify_submit').modal('hide')"
                                   class="btn btn-primary btn-sm">OK <i
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
</div>
<!-- /.modal -->


</body>
</html>
