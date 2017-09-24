<?php
	include('access1.php');
	include('include/connection.php');
	
	$feature_name 	= 'Farmer Details';
	$home_name    	= "Home";
	$title			= 'Farmer Details';
	$home_url 	  	= "home.php";
	$filename		= 'view_farmers.php';
?>
<!DOCTYPE html>
<html>
    <head>
    	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Farmer Details</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <!-- Apple devices fullscreen -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!-- Apple devices fullscreen -->
        <meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
        <!-- Bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- jQuery UI -->
        <link rel="stylesheet" href="css/plugins/jquery-ui/smoothness/jquery-ui.html">
        <link rel="stylesheet" href="css/plugins/jquery-ui/smoothness/jquery.ui.theme.html">
        <!-- Notify -->
        <link rel="stylesheet" href="css/plugins/gritter/jquery.gritter.css">
        <!-- Theme CSS -->
        <link rel="stylesheet" href="css/style.css">
        <!-- Color CSS -->
        <link rel="stylesheet" href="css/themes.css">
        
        
        <!-- jQuery -->
        <script src="js/jquery.min.js"></script>
    
        <!-- Nice Scroll -->
        <script src="js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
        <!-- imagesLoaded -->
        <script src="js/plugins/imagesLoaded/jquery.imagesloaded.min.js"></script>
        <!-- jQuery UI -->
        <script src="js/plugins/jquery-ui/jquery.ui.core.min.html"></script>
        <script src="js/plugins/jquery-ui/jquery.ui.widget.min.html"></script>
        <script src="js/plugins/jquery-ui/jquery.ui.mouse.min.html"></script>
        <script src="js/plugins/jquery-ui/jquery.ui.resizable.min.html"></script>
        <script src="js/plugins/jquery-ui/jquery.ui.sortable.min.html"></script>
        <!-- slimScroll -->
        <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Bootbox -->
        <script src="js/plugins/bootbox/jquery.bootbox.js"></script>
        <!-- Notify -->
        <script src="js/plugins/gritter/jquery.gritter.min.js"></script>
    
        <!-- Theme framework -->
        <script src="js/eakroko.min.js"></script>
        <!-- Theme scripts -->
        <script src="js/application.min.js"></script>
        <!-- Just for demonstration -->
        <script src="js/demonstration.min.js"></script>
    
        <!-- Favicon -->
        <link rel="shortcut icon" href="img/favicon.ico" />
        <!-- Apple devices Homescreen icon -->
        <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-precomposed.png" />
        <style type="text/css">
        .tabs.tabs-inline.tabs-left {
        background: #eee none repeat scroll 0 0;
        position: absolute;
        width: 150px;
    }
        </style>
    </head>
    
    <body class="<?php echo $theme_name; ?>" data-theme="<?php echo $theme_name; ?>">
    	<?php
		/*include Bootstrap model pop up for error display*/
		modelPopUp();
		/*include Bootstrap model pop up for error display*/
		/* this function used to add navigation menu to the page*/
		navigation_menu();
		/* this function used to add navigation menu to the page*/
		?> <!-- Navigation Bar -->
        <div class="container-fluid" id="content">
            <div id="main" style="margin-left:0px !important">
                <?php
				/* this function used to add navigation menu to the page*/
				breadcrumbs($home_url,$home_name,'Farmer Details',$filename,$feature_name);
				/* this function used to add navigation menu to the page*/
				?>
                <div class="container-fluid">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="box box-color box-bordered">
                                <div class="box-title">
                                    <h3>
                                        <i class="icon-table"></i>
                                        Have to show Name of the Farmer and his respective overall score here...!!!
                                    </h3>
                                </div>
                                <div class="box-content nopadding tab-content-inline">
	                            	<ul class="tabs tabs-inline tabs-top">
                                        <li class='active'>
                                            <a href="#kyc" data-toggle='tab'>
                                                <i class="fa fa-inbox"></i>KYC
                                            </a>
                                        </li>	<!-- KYC -->
                                        <li>
                                            <a href="#land" data-toggle='tab'>
                                                <i class="fa fa-share"></i>LAND
                                            </a>
                                        </li>	<!-- LAND -->
                                        <li>
                                            <a href="#crop" data-toggle='tab'>
                                                <i class="fa fa-tag"></i>CROP
                                            </a>
                                        </li>	<!-- CROP -->
                                        <li>
                                            <a href="#assets" data-toggle='tab'>
                                                <i class="fa fa-trash-o"></i>ASSETS
                                            </a>
                                        </li>	<!-- ASSETS -->
                                        <li>
                                            <a href="#loan" data-toggle='tab'>
                                                <i class="fa fa-trash-o"></i>LOAN & LIABILITIES
                                            </a>
                                        </li>	<!-- LOAN & LIABILITIES -->
                                    </ul>
                                    <div class="tab-content padding tab-content-inline tab-content-bottom">
                                        <!-- =========== -->
                                        <!-- START : KYC -->
                                        <!-- =========== -->
                                        <div class="tab-pane active" id="kyc">
                                            <div class="box box-bordered box-color lightgrey">
                                                <div class="box-content nopadding">
                                                    <div class="tas-container">
                                                        <ul class="tabs tabs-inline tabs-left">
                                                            <li class='active'>
                                                                <a href="#div_spouse_details" data-toggle='tab'>
                                                                    <i class="fa fa-lock"></i>Spouse Details
                                                               	</a>
                                                            </li>	<!-- Spouse Details -->
                                                            <li>
                                                                <a href="#div_appli_knowledge" data-toggle='tab'>
                                                                    <i class="fa fa-user"></i>Applicant's Knowledge
                                                                </a>
                                                            </li>	<!-- Applicant's Knowledge -->
                                                            <li>
                                                                <a href="#frm_phone_details" data-toggle='tab'>
                                                                    <i class="fa fa-twitter"></i>Phone Details
                                                                </a>
                                                            </li>	<!-- Applicant's Phone Details -->
                                                            <li>
                                                                <a href="#frm_family_details" data-toggle='tab'>
                                                                    <i class="fa fa-twitter"></i>Family Details
                                                                </a>
                                                            </li>	<!-- Family Details -->
                                                            <li>
                                                                <a href="#frm_appliances_motors" data-toggle='tab'>
                                                                    <i class="fa fa-twitter"></i>Appliances / Motors 
                                                                </a>
                                                            </li>	<!-- Appliances / Motors -->
                                                        </ul>
                                                    </div>	<!-- Side Menu [Form Name] -->
                                                    <div class="tab-content padding tab-content-inline">
                                                        <div class="tab-pane active" id="div_spouse_details">
                                                    		Spouse Details
                                                            <form method="POST" enctype="multipart/form-data" class='form-horizontal form-bordered form-validate' id="frm_spouse_details" name="frm_spouse_details">
                                                            	
                                                                <div class="control-group">
                                                                    <label for="text" class="control-label" style="margin-top:10px">
                                                                        Spouse Name <span style="color:#F00">*</span>
                                                                    </label>
                                                                    <div class="controls">
                                                                        <input type="text" id="txt_spouse_name" name="txt_spouse_name" class="input-xlarge v_name" data-rule-required="true" data-rule-lettersonly="true" placeholder="Entre Your Spouse Name">
                                                                    </div>
                                                                </div>	<!-- Spouse Name -->
                                                                
                                                                <div class="control-group">
                                                                    <label for="text" class="control-label" style="margin-top:10px">
                                                                        Spouse Age <span style="color:#F00">*</span>
                                                                    </label>
                                                                    <div class="controls">
                                                                        <input type="text" id="txt_spouse_age" name="txt_spouse_age" class="input-xlarge v_name" data-rule-required="true" data-rule-number="true" maxlength="3" size="3" placeholder="Entre Your Spouse Age">
                                                                    </div>
                                                                </div>	<!-- Spouse Age -->
                                                                
                                                                <div class="control-group">
                                                                    <label for="numberfield" class="control-label">
                                                                        Spouse Mobile Number <span style="color:#F00">*</span>
                                                                    </label>
                                                                
                                                                    <div class="controls">
                                                                        <input type="text" placeholder="Spouse Mobile Number" name="txt_spouse_mobile_no" id="txt_spouse_mobile_no" data-rule-number="true" maxlength="10"  autocomplete="off" data-rule-required="true" data-rule-minlength="10"  data-rule-maxlength="10" class="input-xlarge v_number">
                                                                        <label id="comp_2" style="color:#FF0000;width:200px;margin-left:100px;"></label>    
                                                                    </div>
                                                                </div>	<!-- Spouse Mobile Number -->
                                                                
                                                                <div class="control-group">
                                                                    <label for="numberfield" class="control-label">
                                                                        Spouse Aadhaar No. <span style="color:#F00">*</span>
                                                                    </label>
                                                                    <div class="controls">
                                                                        <input type="text" placeholder="Spouse Aadhaar no" name="txt_spouse_aadhar" id="txt_spouse_aadhar" data-rule-number="true" maxlength="12" data-rule-required="true" onBlur="Aadhaar(this.value);"  data-rule-minlength="12"  data-rule-maxlength="12" class="input-xlarge v_number">
                                                                        <label id="comp_1" style="color:#FF0000;width:200px;margin-left:100px;"></label>
                                                                    </div>
                                                                </div> <!-- Spouse Aadhaar Number -->
                                                                
                                                                <div class="control-group">
                                                                    <label for="tasktitel" class="control-label">
                                                                        Part of any SHG? <span style="color:#F00">*</span>
                                                                    </label>
                                                                    <div class="controls">
                                                                        <input type="radio" name="rad_part_of_shg" id="rad_part_of_shg" autocomplete="off" data-rule-required="true" value="yes"> Yes
                                                                        &nbsp;&nbsp;
                                                                        <input type="radio" name="rad_part_of_shg" id="rad_part_of_shg" autocomplete="off" data-rule-required="true" value="no"> No
                                                                    </div>
                                                                </div>	<!-- Part of any SHG [Radio] -->
                                                                
                                                                <div class="control-group">
                                                                    <label for="text" class="control-label" style="margin-top:10px">
                                                                        SHG Name <span style="color:#F00">*</span>
                                                                    </label>
                                                                    <div class="controls">
                                                                        <input type="text" id="txt_shg_name" name="txt_shg_name" class="input-xlarge v_name" placeholder="Entre Your SHG Name">
                                                                    </div>
                                                                </div>	<!-- SHG Name [If Yes] -->
                                                                
                                                                <div class="control-group">
                                                                    <label for="tasktitel" class="control-label">Spouse Occupation</label>
                                                                    <div class="controls">
                                                                        <select id="ddl_spouse_occupation" name="ddl_spouse_occupation" class="select2-me input-large">
                                                                            <option value="">Select Spouse Occupation</option>
                                                                            <option value="Housewife">Housewife</option>
                                                                            <option value="Farmer">Farmer</option>
                                                                            <option value="Other">Other</option>
                                                                        </select>
                                                                    </div>
                                                                </div>	<!-- Spouse Occupation [DDL] -->
                                                                
                                                                <div class="control-group">
                                                                    <label for="tasktitel" class="control-label">Spouse Income</label>
                                                                    <div class="controls">
                                                                        <select id="ddl_spouse_income" name="ddl_spouse_income" class="select2-me input-large">
                                                                            <option value="">Select Spouse Income</option>
                                                                            <option value="500_2500">500-2500</option>
                                                                            <option value="2501_5000">2501-5000</option>
                                                                            <option value="5001_7500">5001-7500</option>
                                                                            <option value="7501_Above">7501 Above</option>
                                                                        </select>
                                                                    </div>
                                                                </div>	<!-- Spouse Income [DDL] -->
                                                                
                                                                <div class="control-group">
                                                                    <label for="tasktitel" class="control-label">
                                                                        Mony Taken From Microfinance? <span style="color:#F00">*</span>
                                                                    </label>
                                                                    <div class="controls">
                                                                        <input type="radio" name="rad_mony_isTaken" id="rad_mony_isTaken" autocomplete="off" data-rule-required="true" value="yes"> Yes
                                                                        &nbsp;&nbsp;
                                                                        <input type="radio" name="rad_mony_isTaken" id="rad_mony_isTaken" autocomplete="off" data-rule-required="true" value="no"> No
                                                                    </div>
                                                                </div>	<!-- Microfinance help taken [Radio] -->
                                                                
                                                                <div class="control-group">
                                                                    <label for="text" class="control-label" style="margin-top:10px">
                                                                        Microfinance Name <span style="color:#F00">*</span>
                                                                    </label>
                                                                    <div class="controls">
                                                                        <input type="text" id="txt_microfinance_name" name="txt_microfinance_name" class="input-xlarge v_name" placeholder="Entre Your Microfinance Name">
                                                                    </div>
                                                                </div>	<!-- Name of the Microfinance [If Yes] -->
                                                                
                                                                <div class="control-group">
                                                                    <label for="tasktitel" class="control-label">Mony Taken From Microfinance</label>
                                                                    <div class="controls">
                                                                        <select id="ddl_mony_from_mf" name="ddl_mony_from_mf" class="select2-me input-large">
                                                                            <option value="">Select Mony Range</option>
                                                                            <option value="100_2500">100-2500</option>
                                                                            <option value="2501_5000">2501-5000</option>
                                                                            <option value="5001_7500">5001-7500</option>
                                                                            <option value="7501_10000">7501-10000</option>
                                                                            <option value="10000_Above">10000 Above</option>
                                                                        </select>
                                                                    </div>
                                                                </div>	<!-- How much mony taken from Microfinance [DDL] [If yes] -->
                                                                
                                                                <div class="control-group">
                                                                    <label for="tasktitel" class="control-label">
                                                                        Affliation to any association? <span style="color:#F00">*</span>
                                                                    </label>
                                                                    <div class="controls">
                                                                        <input type="radio" name="rad_affliation" id="rad_affliation" autocomplete="off" data-rule-required="true" value="yes"> Yes
                                                                        &nbsp;&nbsp;
                                                                        <input type="radio" name="rad_affliation" id="rad_affliation" autocomplete="off" data-rule-required="true" value="no"> No
                                                                    </div>
                                                                </div>	<!-- Affliation to any association [Radio] -->
                                                                
                                                                <div class="control-group">
                                                                    <label for="text" class="control-label" style="margin-top:10px">
                                                                        FPO/FPC Name <span style="color:#F00">*</span>
                                                                    </label>
                                                                    <div class="controls">
                                                                        <input type="text" id="txt_fpo_name" name="txt_fpo_name" class="input-xlarge v_name" data-rule-lettersonly="true" placeholder="Entre FPO/FPC Name">
                                                                    </div>
                                                                </div>	<!-- Name Of FPO / FPC [If Yes] -->
                                                                
                                                                <div class="control-group">
                                                                    <label for="text" class="control-label" style="margin-top:10px">
                                                                        Co-operative society / Bank Name <span style="color:#F00">*</span>
                                                                    </label>
                                                                    <div class="controls">
                                                                        <input type="text" id="txt_spouse_bank_name" name="txt_spouse_bank_name" class="input-xlarge v_name" data-rule-required="true" data-rule-lettersonly="true" placeholder="Co-operative society / Bank Name">
                                                                    </div>
                                                                </div>	<!-- Co-operative society / Bank Name -->
                                                                
                                                                <div class="form-actions" style="clear:both;">
                                                                    <button id="submit" name="Submit" type="submit" class="btn btn-primary" >Submit</button>
                                                                    <button id="reset" type="button" class="btn" onclick="window.history.back()">Cancel</button>
                                                                </div> <!-- Submit -->
                                
                                                            </form>
                                                        </div>	<!-- Spouse Details -->
                                                        <div class="tab-pane" id="div_appli_knowledge">
                                                           	Applicant's Knowledge
                                                          	<form method="POST" enctype="multipart/form-data" class='form-horizontal form-bordered form-validate' id="div_appli_knowledge" name="div_appli_knowledge">
                                                            	
                                                            </form>
                                                        </div>	<!-- Applicant's Knowledge -->
                                                        <div class="tab-pane" id="frm_phone_details">
                                                           Applicant's Phone Details
                                                        </div>	<!-- Applicant's Phone Details -->
                                                        <div class="tab-pane" id="frm_family_details">
                                                            Family Details
                                                        </div>	<!-- Family Details -->
                                                        <div class="tab-pane" id="frm_appliances_motors">
                                                           Appliances / Motors
                                                        </div>	<!-- Appliances / Motors -->
                                                    </div>	<!-- Main Forms -->
                                                </div>
                                            </div>
                                        </div>	<!-- KYC -->
                                        <!-- =========== -->
                                        <!-- END   : KYC -->
                                        <!-- =========== -->
                                        
                                        <!-- ============ -->
                                        <!-- START : LAND -->
                                        <!-- ============ -->
                                        <div class="tab-pane" id="land">
                                            <div class="box box-bordered box-color lightgrey">
                                                <div class="box-content nopadding">
                                                    <div class="tas-container">
                                                        <ul class="tabs tabs-inline tabs-left">
                                                            <li class='active'>
                                                                <a href="#frm_farm_land_details" data-toggle='tab'>
                                                                    <i class="fa fa-lock"></i>Farm Land Details
                                                               	</a>
                                                            </li>	<!-- Farm Land Details -->
                                                        </ul>
                                                    </div>	<!-- Side Menu [Form Name] -->
                                                    <div class="tab-content padding tab-content-inline">
                                                        <div class="tab-pane active" id="frm_farm_land_details">
                                                    		Farm Land Details
                                                        </div>	<!-- Farm Land Details -->
                                                    </div>	<!-- Main Forms -->
                                                </div>
                                            </div>
                                        </div>	<!-- LAND -->
                                        <!-- ============ -->
                                        <!-- END :   LAND -->
                                        <!-- ============ -->
                                        
                                        <!-- ============ -->
                                        <!-- START : CROP -->
                                        <!-- ============ -->
                                        <div class="tab-pane" id="crop">
                                            <div class="box box-bordered box-color lightgrey">
                                                <div class="box-content nopadding">
                                                    <div class="tas-container">
                                                        <ul class="tabs tabs-inline tabs-left">
                                                            <li class='active'>
                                                                <a href="#frm_crop_cultivation" data-toggle='tab'>
                                                                    <i class="fa fa-lock"></i>Crop And Cultivation Details
                                                               	</a>
                                                            </li>	<!-- Crop And Cultivation Details -->
                                                            <li>
                                                                <a href="#frm_prev_crop_cycle" data-toggle='tab'>
                                                                    <i class="fa fa-user"></i>Previous Crop Cycle Details
                                                                </a>
                                                            </li>	<!-- Applicant's Knowledge -->
                                                            <li>
                                                                <a href="#frm_cur_crop_cycle" data-toggle='tab'>
                                                                    <i class="fa fa-twitter"></i>Current Crop Cycle Details
                                                                </a>
                                                            </li>	<!-- Applicant's Phone Details -->
                                                        </ul>
                                                    </div>	<!-- Side Menu [Form Name] -->
                                                    <div class="tab-content padding tab-content-inline">
                                                        <div class="tab-pane active" id="frm_crop_cultivation">
                                                    		Crop And Cultivation Details
                                                        </div>	<!-- Crop And Cultivation Details -->
                                                        <div class="tab-pane" id="frm_prev_crop_cycle">
                                                           Previous Crop Cycle Details
                                                        </div>	<!-- Previous Crop Cycle Details -->
                                                        <div class="tab-pane" id="frm_cur_crop_cycle">
                                                           Current Crop Cycle Details
                                                        </div>	<!-- Current Crop Cycle Details -->
                                                    </div>	<!-- Main Forms -->
                                                </div>
                                            </div>
                                        </div>	<!-- CROP -->
                                        <!-- ============ -->
                                        <!-- END :   CROP -->
                                        <!-- ============ -->
                                        
                                        <!-- ============== -->
                                        <!-- START : Assets -->
                                        <!-- ============== -->
                                        <div class="tab-pane" id="assets">
                                            <div class="box box-bordered box-color lightgrey">
                                                <div class="box-content nopadding">
                                                    <div class="tas-container">
                                                        <ul class="tabs tabs-inline tabs-left">
                                                            <li class='active'>
                                                                <a href="#frm_asset_details" data-toggle='tab'>
                                                                    <i class="fa fa-lock"></i>Assets Details
                                                               	</a>
                                                            </li>	<!-- Assets Details -->
                                                            <li>
                                                                <a href="#frm_live_stock" data-toggle='tab'>
                                                                    <i class="fa fa-user"></i>Live Stock
                                                                </a>
                                                            </li>	<!-- Live Stock -->
                                                        </ul>
                                                    </div>	<!-- Side Menu [Form Name] -->
                                                    <div class="tab-content padding tab-content-inline">
                                                        <div class="tab-pane active" id="frm_asset_details">
                                                    		Assets Details
                                                        </div>	<!-- Assets Details -->
                                                        <div class="tab-pane" id="frm_live_stock">
                                                           Live Stock
                                                        </div>	<!-- Live Stock -->
                                                    </div>	<!-- Main Forms -->
                                                </div>
                                            </div>
                                        </div>	<!-- ASSETS -->
                                        <!-- ============== -->
                                        <!-- END  : Assets -->
                                        <!-- ============== -->
                                        
                                        <!-- ============ -->
                                        <!-- START : LOAN -->
                                        <!-- ============ -->
                                        <div class="tab-pane" id="loan">
                                            <div class="box box-bordered box-color lightgrey">
                                                <div class="box-content nopadding">
                                                    <div class="tas-container">
                                                        <ul class="tabs tabs-inline tabs-left">
                                                            <li class='active'>
                                                                <a href="#frm_home_loan_details" data-toggle='tab'>
                                                                    <i class="fa fa-lock"></i>Home Loan Details
                                                               	</a>
                                                            </li>	<!-- Home Loan Details -->
                                                            <li>
                                                                <a href="#frm_financial_details" data-toggle='tab'>
                                                                    <i class="fa fa-user"></i>Financial Details
                                                                </a>
                                                            </li>	<!-- Financial Details -->
                                                            <li>
                                                                <a href="#frm_financial_history" data-toggle='tab'>
                                                                    <i class="fa fa-user"></i>Financial History
                                                                </a>
                                                            </li>	<!-- Financial History -->
                                                        </ul>
                                                    </div>	<!-- Side Menu [Form Name] -->
                                                    <div class="tab-content padding tab-content-inline">
                                                        <div class="tab-pane active" id="frm_home_loan_details">
                                                    		Home Loan Details
                                                        </div>	<!-- Home Loan Details -->
                                                        <div class="tab-pane" id="frm_financial_details">
                                                           Financial Details
                                                        </div>	<!-- Financial Details -->
                                                        <div class="tab-pane" id="frm_financial_history">
                                                           Financial History
                                                        </div>	<!-- Financial History -->
                                                    </div>	<!-- Main Forms -->
                                                </div>
                                            </div>
                                        </div>	<!-- LOAN -->
                                        <!-- ============ -->
                                        <!-- END : LOAN -->
                                        <!-- ============ -->
                                    </div>
                                </div>
                            </div>
                       	</div>
                   	</div>
               	</div>
           	</div>
        </div>
    </body>
</html>