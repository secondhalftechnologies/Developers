<?php 
include('access1.php'); 
include('connection.php');
$fm_id = (isset($_REQUEST['fm_id'])? $_REQUEST['fm_id']:"");

if($fm_id!="" && isset($_SESSION['acrefin_user']) && $_SESSION['acrefin_user']!="")
{
  $result = lookup_value('tbl_spouse_details',array(),array("fm_id"=>$fm_id),array(),array(),array());
  if($result)
  {
	  $num    = mysqli_num_rows($result);
	  if($num !=0)
	  {
		  $row = mysqli_fetch_array($result);
		  
		  	$data['f3_points']                  = $row['f3_points'];

			$data['f3_married']				    = $row['f3_married'];
			$data['f3_spouse_fname']		    = $row['f3_spouse_fname'];
			$data['f3_spouse_mname']		    = $row['f3_spouse_mname'];
			$data['f3_spouse_sname']		    = $row['f3_spouse_sname'];
			$data['f3_spouse_age']			    = $row['f3_spouse_age'];
			$data['f3_spouse_mobno']		    = $row['f3_spouse_mobno'];
			$data['f3_spouse_adhno']		    = $row['f3_spouse_adhno'];
			$data['f3_spouse_shg']			    = $row['f3_spouse_shg'];
			$data['f3_spouse_shgname']		    = $row['f3_spouse_shgname'];
			$data['f3_spouse_occp']			    = $row['f3_spouse_occp'];
			$data['f3_spouse_income']		    = $row['f3_spouse_income'];
			$data['f3_spouse_mfi']			    = $row['f3_spouse_mfi'];
			$data['f3_spouse_mfiname']		    = $row['f3_spouse_mfiname'];
			$data['f3_spouse_mfiamount']	    = $row['f3_spouse_mfiamount'];
			$data['f3_spouse_purpose']		    = $row['f3_spouse_purpose'];
			$data['f3_spouse_mfiremain']	    = $row['f3_spouse_mfiremain'];
			$data['f3_spouse_mfiemi']		    = $row['f3_spouse_mfiemi'];
			$data['f3_spouse_mfimonth'] 	    = $row['f3_spouse_mfimonth'];
			
			$data['f3_spouse_mfioutstanding'] 	= $row['f3_spouse_mfioutstanding'];
			$data['f3_spouse_mfirate'] 	        = $row['f3_spouse_mfirate'];
			$data['f3_spouse_mfitenure'] 	    = $row['f3_spouse_mfitenure'];
			$data['f3_spouse_mfiinterest'] 	    = $row['f3_spouse_mfiinterest'];
			$data['f3_spouse_mfitotalamount'] 	= $row['f3_spouse_mfitotalamount'];
			$data['f3_spouse_mfiemipaid'] 	    = $row['f3_spouse_mfiemipaid'];


			
			
			
			
			
			
	  }
  }
?>
<!DOCTYPE html>
<!--[if IE 7]>                  <html class="ie7 no-js" lang="en">     <![endif]-->
<!--[if lte IE 8]>              <html class="ie8 no-js" lang="en">     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" lang="en">  <!--<![endif]-->

<head>

	<title> Spouse Details   </title>
	<meta charset="utf8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!-- Apple devices fullscreen -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<!-- Apple devices fullscreen -->
	<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	

	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap responsive -->
	<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
	<!-- jQuery UI -->
	<link rel="stylesheet" href="css/plugins/jquery-ui/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="css/plugins/jquery-ui/smoothness/jquery.ui.theme.css">
	<!-- PageGuide -->
	<link rel="stylesheet" href="css/plugins/pageguide/pageguide.css">
	<!-- Fullcalendar -->
	<link rel="stylesheet" href="css/plugins/fullcalendar/fullcalendar.css">
	<link rel="stylesheet" href="css/plugins/fullcalendar/fullcalendar.print.css" media="print">
	<!-- chosen -->
	<link rel="stylesheet" href="css/plugins/chosen/chosen.css">
	<!-- select2 -->
	<link rel="stylesheet" href="css/plugins/select2/select2.css">
	<!-- icheck -->
	<link rel="stylesheet" href="css/plugins/icheck/all.css">
	<!-- Theme CSS -->
	<link rel="stylesheet" href="css/style.css">
	<!-- Color CSS -->
	<link rel="stylesheet" href="css/themes.css">


	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- Nice Scroll -->
	<script src="js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
	<!-- jQuery UI -->
	<script src="js/plugins/jquery-ui/jquery.ui.core.min.js"></script>
	<script src="js/plugins/jquery-ui/jquery.ui.widget.min.js"></script>
	<script src="js/plugins/jquery-ui/jquery.ui.mouse.min.js"></script>
	<script src="js/plugins/jquery-ui/jquery.ui.draggable.min.js"></script>
	<script src="js/plugins/jquery-ui/jquery.ui.resizable.min.js"></script>
	<script src="js/plugins/jquery-ui/jquery.ui.sortable.min.js"></script>
	<!-- Touch enable for jquery UI -->
	<script src="js/plugins/touch-punch/jquery.touch-punch.min.js"></script>
	<!-- slimScroll -->
	<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- vmap -->
	<script src="js/plugins/vmap/jquery.vmap.min.js"></script>
	<script src="js/plugins/vmap/jquery.vmap.world.js"></script>
	<script src="js/plugins/vmap/jquery.vmap.sampledata.js"></script>
	<!-- Bootbox -->
	<script src="js/plugins/bootbox/jquery.bootbox.js"></script>
	<!-- Flot -->
	<script src="js/plugins/flot/jquery.flot.min.js"></script>
	<script src="js/plugins/flot/jquery.flot.bar.order.min.js"></script>
	<script src="js/plugins/flot/jquery.flot.pie.min.js"></script>
	<script src="js/plugins/flot/jquery.flot.resize.min.js"></script>
	<!-- imagesLoaded -->
	<script src="js/plugins/imagesLoaded/jquery.imagesloaded.min.js"></script>
	<!-- PageGuide -->
	<script src="js/plugins/pageguide/jquery.pageguide.js"></script>
	<!-- FullCalendar -->
	<script src="js/plugins/fullcalendar/fullcalendar.min.js"></script>
	<!-- Chosen -->
	<script src="js/plugins/chosen/chosen.jquery.min.js"></script>
	<!-- select2 -->
	<script src="js/plugins/select2/select2.min.js"></script>
	<!-- icheck -->
	<script src="js/plugins/icheck/jquery.icheck.min.js"></script>

	<!-- Theme framework -->
	<script src="js/eakroko.min.js"></script>
	<!-- Theme scripts -->
	<script src="js/application.min.js"></script>
    
    <script src="js/plugins/jquery-ui/jquery.ui.widget.min.js"></script>
	<!--	<script src="js/bootstrap.min.js"></script> -->	
	<script src="js/plugins/validation/jquery.validate.min.js"></script>
	<script src="js/plugins/validation/additional-methods.min.js"></script>
	<script src="js/plugins/wizard/jquery.form.wizard.min.js"></script>
    
    <script src="js/js_validator.js"></script>
    
   	<!-- Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico" />
	<!-- Apple devices Homescreen icon -->
	<link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-precomposed.png" /> 
</head>
<body class="theme-green" data-theme="theme-green">

	<?php loader(); ?>                
							
	<div id="navigation">
		<div class="container-fluid">
			<a href="#" id="brand">Admin Panel</a>
			<a href="#" class="toggle-nav" rel="tooltip" data-placement="bottom" title="Toggle navigation"><i class="icon-reorder"></i></a>
			 <!-- main menu -->
            
            <?php
            include('admin_menu.php');
			?>
            
			 
			
            <!-- main menu -->
			<div class="user">
				
				<div class="dropdown asdf">
					<a href="#" class='dropdown-toggle' data-toggle="dropdown"><?php echo $_SESSION['acrefin_user']; ?> <i class="icon-user"></i></a>
					<ul class="dropdown-menu pull-right">
						<li>
							<a href="#">Edit profile</a>
						</li>
						<li>
							<a href="logout.php">Sign out</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid" id="content">
			<div id="main" style="margin-left:0;">
            <?php 
				date_default_timezone_set("Asia/Calcutta");
				$dt=date('F d, Y');
				$week=date('l');
			?>
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-right">
						<ul class="stats">
							<li class='lightred' id="total_p">
							<i class="" id="avg" ></i>
								<div class="details">
									<span class="big">&nbsp;Avg. </span>
									<span>Points</span>
								</div>
							</li>
							<li class='lightred'>
								<i class="icon-calendar"></i>
								<div class="details">
									<span class="big"><?php echo $dt; ?></span>
									<span><?php echo $week; ?></span>
								</div>
							</li>
						</ul>
					</div>
				</div>
                
                <style type="text/css">
				.span6{
					width:300px !important;
				}
                </style>
        		
                <div class="box box-color box-bordered lightgreen" style="padding:0px;">
							<div class="box-title">
								<h3>
								Spouse Details 
								</h3>
                                 
							</div>
                            <div class="box-content nopadding">
								<form enctype="multipart/form-data" method="POST" class='form-horizontal form-wizard wizard-vertical' id="frm_knowledge_detail">
									<div class="step" id="Step1">
										<?php include('side_menu.php'); ?>
										<div class="form-content">
											<div class="control-group">
												<label for="text" class="control-label" style="margin-top:10px">Are You Married? <span style="color:#F00">*</span></label>
												<div class="controls">
													<select id="f3_married" name="f3_married" class="input-xlarge" data-rule-required="true">
														<option value="" disabled selected> Select here</option>
														<option value="yes" point="10"> Yes</option>
														<option value="no" point="2"> No</option>
													</select>
												</div>
                                            </div><!--Are You Married?-->

                                            <div id="spouse_detail" style="padding:5px;border:1px solid #d6d6d6;margin:5px;display: none;">
                                            	<h2>Spouse Details</h2>
                                            	<div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">First Name <span style="color:#F00">*</span></label>
													<div class="controls">
														<input type="text" id="f3_spouse_fname" name="f3_spouse_fname" class="input-xlarge v_name" data-rule-minlength="3" data-rule-maxlength="50" data-rule-required="true" placeholder="First Name">
													</div>
												</div><!--first name-->

												<div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Middle Name <span style="color:#F00">*</span></label>
													<div class="controls">
														<input type="text" id="f3_spouse_mname" name="f3_spouse_mname" class="input-xlarge v_name" data-rule-minlength="3" data-rule-maxlength="50" data-rule-required="true"  placeholder="Middle Name">
													</div>
												</div><!--Middle name-->

												<div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Surname <span style="color:#F00">*</span></label>
													<div class="controls">
														<input type="text" id="f3_spouse_sname" name="f3_spouse_sname" class="input-xlarge v_name" data-rule-minlength="3" data-rule-maxlength="50" data-rule-required="true" placeholder="Surname ">
													</div>
												</div><!--surname-->

												<div class="control-group">
                                                    <label for="text" class="control-label" style="margin-top:10px">Age <span style="color:#F00">*</span></label>
                                                    <div class="controls">
                                                    	<input type="text" id="f3_spouse_age" name="f3_spouse_age" class="v_number input-xlarge" data-rule-number="true" data-rule-minlength="2" data-rule-maxlength="2" data-rule-required="true" placeholder="Age">
                                                    </div>
                                              	</div><!--age-->

                                              	<div class="control-group">
                                                    <label for="numberfield" class="control-label">Mobile no.<span style="color:#F00">*</span></label>
                                                    <div class="controls">
                                                        <input type="text" placeholder="Mobile no." name="f3_spouse_mobno" id="f3_spouse_mobno" class="input-xlarge v_number" data-rule-number="true"  data-rule-minlength="10"  data-rule-maxlength="10" data-rule-required="true" >
                                                      
                                                    </div>
                                            	</div><!--Mobile no-->

                                            	<div class="control-group">
                                                    <label for="numberfield" class="control-label">Aadhaar no.<span style="color:#F00">*</span></label>
                                                    <div class="controls">
                                                        <input type="text" placeholder="Aadhaar no." name="f3_spouse_adhno" id="f3_spouse_adhno" class="input-xlarge v_number" data-rule-number="true"  data-rule-minlength="12"  data-rule-maxlength="12" data-rule-required="true">
                         							</div>
                                            	</div> <!--aadhar no-->

                                            	<div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Is your Spouse a part of any SHG?<span style="color:#F00">*</span></label>
													<div class="controls">
														<select id="f3_spouse_shg" name="f3_spouse_shg" class="input-xlarge" data-rule-required="true">
															<option value="" disabled selected> Select here</option>
															<option value="yes" point="10"> Yes</option>
															<option value="no" point="0"> No</option>
														</select>
													</div>
	                                            </div><!--Is your Spouse a part of any SHG?-->

	                                            <div class="control-group" id="shg_name" style="display: none">
													<label for="text" class="control-label" style="margin-top:10px">Name of SHG <span style="color:#F00">*</span></label>
													<div class="controls">
														<input type="text" id="f3_spouse_shgname" name="f3_spouse_shgname" class="input-xlarge v_name" data-rule-required="true" placeholder="Name of SHG">
													</div>
												</div><!--shgname-->

												<div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Occupation<span style="color:#F00">*</span></label>
													<div class="controls">
														<select id="f3_spouse_occp" name="f3_spouse_occp" class="input-xlarge" data-rule-required="true">
															<option value="" disabled selected> Select here</option>
															<option value="housewife" point="1"> Housewife</option>
															<option value="farmer"    point="2"> Farmer</option>
															<option value="tailoring" point="4"> Tailoring</option>
															<option value="weaving"   point="4"> Weaving</option>
															<option value="handicrafts" point="4"> Handicrafts</option>
															<option value="seller vendor"    point="4"> Seller/Vendor</option>
															<option value="daily wage worker"     point="3"> Daily Wage worker</option>
															<option value="other"     point="3"> Other</option>
														</select>
													</div>
	                                            </div>

	                                            <div class="control-group" id="input_income" style="display: none;">
                                                    <label for="numberfield" class="control-label">Spouse Income per month<span style="color:#F00">*</span></label>
                                                    <div class="controls">
                                                        <input type="text" placeholder="Spouse Income per month" name="f3_spouse_income" id="f3_spouse_income" data-rule-number="true"  class="input-xlarge" data-rule-maxlength="10" data-rule-required="true">
                                                         
                                                    </div>
                                            	</div><!--income-->

                                            	<div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Any micro finance help taken by spouse?<span style="color:#F00">*</span></label>
													<div class="controls">
														<select id="f3_spouse_mfi" name="f3_spouse_mfi" class="input-xlarge" data-rule-required="true">
															<option value="" disabled selected> Select here</option>
															<option value="yes"> Yes</option>
															<option value="no"> No</option>
														</select>
													</div>
	                                            </div><!--Any micro finance help taken by spouse?-->


	                                            <div id="microfinance" style="display:none;padding: 5px; border: 1px solid #d6d6d6; margin: 5px;">

	                                            	<div class="control-group">
														<label for="text" class="control-label" style="margin-top:10px">Purpose for which the loan was taken?<span style="color:#F00">*</span></label>
														<div class="controls">
															<select id="f3_spouse_purpose" name="f3_spouse_purpose" class="input-xlarge" data-rule-required="true">
																<option value="" disabled selected> Select here</option>
																<option value="agriculture"> Agriculture</option>
																<option value="small vendor"> Small Vendor</option>
															</select>
														</div>
		                                            </div> <!-- purpose of the loan -->

		                                            <div class="control-group">
														<label for="text" class="control-label" style="margin-top:10px">Name of Micro finance firm <span style="color:#F00">*</span></label>
														<div class="controls">
															<input type="text" id="f3_spouse_mfiname" name="f3_spouse_mfiname" class="input-xlarge v_name" data-rule-required="true" data-rule-minlength="4"  data-rule-maxlength="100" placeholder="Micro finance firm">
														</div>
													</div><!--micro finance firm name-->

													<div class="control-group">
	                                                    <label for="numberfield" class="control-label">Amount taken from Micro finance firm<span style="color:#F00">*</span></label>
	                                                    <div class="controls">
	                                                        <input type="text" placeholder="Amount Taken" name="f3_spouse_mfiamount" id="f3_spouse_mfiamount" class="input-xlarge v_number" data-rule-number="true" data-rule-required="true"  data-rule-maxlength="8">
	                                                    </div>
	                                            	</div><!--mfiamount-->


		                                            <div class="control-group">
	                                                    <label for="numberfield" class="control-label">Rate Of Interest<span style="color:#F00">*</span></label>
	                                                    <div class="controls">
	                                                        <input type="text" placeholder="Rate Of Interest" name="f3_spouse_mfirate" id="f3_spouse_mfirate" class="input-xlarge v_number" data-rule-number="true" data-rule-required="true" data-rule-maxlength="8">
	                                                    </div>
	                                            	</div><!--Rate Of Interest-->

	                                            	<div class="control-group">
	                                                    <label for="numberfield" class="control-label">Loan Tenure In Months<span style="color:#F00">*</span></label>
	                                                    <div class="controls">
	                                                        <input type="text" placeholder="Loan Tenure" name="f3_spouse_mfitenure" id="f3_spouse_mfitenure" class="input-xlarge v_number" data-rule-number="true" data-rule-required="true"  data-rule-maxlength="3">
	                                                    </div>
	                                            	</div><!--Loan Tenure In Months-->

	                                            	<div class="control-group">
	                                                    <label for="numberfield" class="control-label">EMI Per Month</label>
	                                                    <div class="controls">
	                                                        <input type="text" placeholder="EMI  Paid to MFF" name="f3_spouse_mfiemi" id="f3_spouse_mfiemi" class="v_number" data-rule-number="true" data-rule-required="true"  readonly>
	                                                    </div>
	                                            	</div><!--EMI Per Month-->

	                                            	<div class="control-group">
	                                                    <label for="numberfield" class="control-label">Total Loan Amount</label>
	                                                    <div class="controls">
	                                                        <input type="text" placeholder="Loan Amount in rupees" name="f3_spouse_mfitotalamount" id="f3_spouse_mfitotalamount" class="input-xlarge v_number" data-rule-number="true" data-rule-required="true"  readonly>
	                                                    </div>
	                                            	</div><!--Total Loan Amount-->

	                                            	<div class="control-group">
	                                                    <label for="numberfield" class="control-label">Total Interest</label>
	                                                    <div class="controls">
	                                                        <input type="text" placeholder="Total Interests" name="f3_spouse_mfiinterest" id="f3_spouse_mfiinterest" class="input-xlarge v_number" data-rule-number="true" data-rule-required="true"  readonly>
	                                                    </div>
	                                            	</div><!--Total Interest-->

	                                            	<div class="control-group">
	                                                    <label for="numberfield" class="control-label">No. Of EMI Paid<span style="color:#F00">*</span></label>
	                                                    <div class="controls">
	                                                        <input type="text" placeholder="EMI Paid" name="f3_spouse_mfiemipaid" id="f3_spouse_mfiemipaid" class="input-xlarge v_number" data-rule-number="true" data-rule-required="true"  data-rule-maxlength="3" >
	                                                    </div>
	                                            	</div><!--No. Of EMI Paid-->

	                                            	<div class="control-group">
	                                                    <label for="numberfield" class="control-label">Current Outstanding Loan Amount With Interest</label>
	                                                    <div class="controls">
	                                                        <input type="text" placeholder="Outstanding Loan Amount With Interest" name="f3_spouse_mfioutstanding" id="f3_spouse_mfioutstanding" class="input-xlarge v_number" data-rule-number="true" data-rule-required="true" readonly>
	                                                    </div>
	                                            	</div><!--Current Outstanding Loan Amount-->
                                                    
                                                    
                                                    <div class="control-group">
	                                                    <label for="numberfield" class="control-label">Current Outstanding Loan Amoun</label>
	                                                    <div class="controls">
	                                                        <input type="text" placeholder="Outstanding" name="f3_spouse_mfioutstanding_principal" id="f3_spouse_mfioutstanding_principal" class="v_number" data-rule-number="true" data-rule-required="true" readonly>
	                                                    </div>
	                                            	</div><!--Current Outstanding Loan Amount-->

	                                            	<div class="control-group">
	                                                    <label for="numberfield" class="control-label">Therefore, No. of Months of EMI<span style="color:#F00">*</span></label>
	                                                    <div class="controls">

	                                                        <!-- <h4 id="spouse_mfimonth_view"></h4> -->
	                                                        <input type="text" placeholder="Remaining months" name="f3_spouse_mfimonth" id="f3_spouse_mfimonth" data-rule-number="true" data-rule-required="true" readonly>
	                                                    </div>
	                                            	</div><!--No. of Months of EMI-->

												</div>

                                            </div>
                                        
	                                        <div class="form-actions">
												<input type="reset" class="btn" value="Back" id="back">
												<input type="submit" class="btn btn-primary" value="Save" id="save">
	                                        </div>
	                                    </div>

	                                </div>
		                                <input type="hidden" name="add_knowledge_detail" value="1">
                                        <input type="hidden" value="<?php echo $fm_id ?>" name="fm_id">
                                        <input type="hidden" name="fm_caid" value="<?php echo $_SESSION['fm_caid']; ?>">
                                        <input type="hidden" name="f3_points" value="" id="f3_points">
								</form>
                                <!--<input type="text" id="hid_total" name="hid_total" value="0">-->
                                <h1 id="g_total">0</h1> 
                            </div>
                            
				 </div>   

			</div>
		</div>
      </div>

	<script>

		var g_total = 0;
		function convertAgeToPoint(x){
			if(x >= 21 && x <= 25)
			{
			  return 10;
			}
			else if(x >= 26 && x <= 30)
			{
			  return 8;
			}
			else if(x >= 31 && x <= 35)
			{
			  return 6;
			}
			else if(x >= 36 && x <= 45)
			{
			  return 4;
			}
			else if(x >= 46 && x <= 100)
			{
			  return 2;
			}
			else
			{
			  return 0;
			}
		}

		function convertIncomeToPoint(x){
			if(x >= 500 && x <= 1000)
			{
			  return 2;
			}
			else if(x >= 1001 && x <= 1500)
			{
			  return 4;
			}
			else if(x >= 1501 && x <= 2000)
			{
			  return 6;
			}
			else if(x >= 2001 && x <= 3000)
			{
			  return 8;
			}
			else if(x >= 3001 && x <= 5000)
			{
			  return 10;
			}
			else
			{
			  return 0;
			}
		}

		function convertMfiremainToPoint(x){
			if(x >= 0 && x <= 50000)
			{
			  return 10;
			}
			else if(x >= 50001 && x <= 100000)
			{
			  return 8;
			}
			else if(x >= 100001 && x <= 150000)
			{
			  return 6;
			}
			else if(x >= 150001 && x <= 200000)
			{
			  return 4;
			}
			else if(x >= 200001 && x <= 250000)
			{
			  return 2;
			}
			else
			{
			  return 0;
			}
		}

		function convertMfiemiToPoint(x){
			if(x >= 0 && x <= 2500)
			{
			  return 10;
			}
			else if(x >= 2501 && x <= 5000)
			{
			  return 8;
			}
			else if(x >= 5001 && x <= 7500)
			{
			  return 6;
			}
			else if(x >= 7501 && x <= 10000)
			{
			  return 4;
			}
			else if(x >= 10001 && x <= 12500)
			{
			  return 2;
			}
			else if(x >= 12501 && x <= 15000)
			{
			  return 1;
			}
			else
			{
			  return 0;
			}
		}

		function convertMfimonthToPoint(x){
			if(x >= 0 && x <= 6)
			{
			  return 10;
			}
			else if(x >= 7 && x <= 12)
			{
			  return 8;
			}
			else if(x >= 13 && x <= 18)
			{
			  return 6;
			}
			else if(x >= 19 && x <= 24)
			{
			  return 4;
			}
			else if(x >= 25 && x <= 30)
			{
			  return 2;
			}
			else
			{
			  return 0;
			}
		}

		function cal_loanEMI(outstanding)
		{
			var r   		= 0; // Rate of Interest per month
		    var p           = parseInt($('#f3_spouse_mfiamount').val()) || 0;
			var r1          = parseFloat($('#f3_spouse_mfirate').val()) || 0;
			var n           = parseInt($('#f3_spouse_mfitenure').val()) || 0;
			var E   		= 0; // Emi Per Month
			var totPayment  = 0; // Total Payment (Principal + Interest)
			var totInt      = 0; // Total Interest Payable
			oustanding_loan_amt =0;
			
			if(outstanding==1)
			{
				f8_emi_paid = $('#f3_spouse_mfiemipaid').val();
				if(f8_emi_paid>n)
				{
						alert('Please Enter Correct Value');
						$('#f3_spouse_mfiemipaid').val("");
						$('#f3_spouse_mfimonth').val('');
				}
				else
				{
					$('#f3_spouse_mfimonth').val(n - f8_emi_paid);
				}
			
			}
			
			
			if(p!="" && r1!="" && n !="")
			{
				r = (r1/1200);
				E = p * r * Math.pow((1+r),n) / (Math.pow((1+r),n)- 1);
				totPayment = E * n;
				totInt	= totPayment - p;
				
				final_E = Math.round(E);
				
				final_totInt = Math.round(totInt);
		
				final_totPayment = Math.round(totPayment);
				
				$('#f3_spouse_mfiemi').val(final_E);
				$('#f3_spouse_mfiinterest').val(final_totInt);
				$('#f3_spouse_mfitotalamount').val(final_totPayment);
				
				if(outstanding==1)
				{
					var f8_loan_emi_paid = $('#f3_spouse_mfiemipaid').val();
					if(f8_loan_emi_paid!="")
					{
						oustanding_loan_amt_interest = Number(totPayment) -(Number(E) * Number(f8_loan_emi_paid));
						$('#f3_spouse_mfioutstanding').val(Math.round(oustanding_loan_amt_interest));
						
						
						remaining_int =(totInt/n);
						remaining_int =(remaining_int * (n-f8_loan_emi_paid))
						
						oustanding_loan_amt    =oustanding_loan_amt_interest-remaining_int;//totInt;
						
						if(oustanding_loan_amt_interest==0)
						{
							oustanding_loan_amt =0;
						}
						$('#f3_spouse_mfioutstanding_principal').val(Math.round(oustanding_loan_amt));
						
					}
				}
			}
			
			calTotal();
		}


		function calTotal()
		{
			
			var married = parseInt($('option:selected','#f3_married').attr('point')) || 0;
			if(married === 10)
			{
				var age = parseInt($('#f3_spouse_age').val()) || 0;
				var shg = parseInt($('option:selected','#f3_spouse_shg').attr('point')) || 0;
				var occp = parseInt($('option:selected','#f3_spouse_occp').attr('point')) || 0;
				var income = parseInt($('#f3_spouse_income').val()) || 0;

				age = convertAgeToPoint(age);
				income = convertIncomeToPoint(income);

				if($('#f3_spouse_mfi').val() === 'yes')
				{
					var mfiremain = parseInt($('#f3_spouse_mfiremain').val()) || 0;
					var mfiemi = parseInt($('#f3_spouse_mfiemi').val()) || 0;
					var mfimonth = parseInt($('#f3_spouse_mfimonth').val()) || 0;

					mfiremain = convertMfiremainToPoint(mfiremain);
					mfiemi = convertMfiemiToPoint(mfiemi);
					mfimonth = convertMfimonthToPoint(mfimonth);
				
					g_total = married + age + shg + occp + income + mfiremain + mfiemi + mfimonth;
				}
				else
				{
					g_total = married + age + shg + occp + income;
				}

			}
			else
			{
				g_total = married ;
			}

			document.getElementById('g_total').innerHTML=g_total;
			
			var no_of_point =1;
			if(married === 10){
				
				no_of_point +=3;
				
				if(shg =='yes')
				{
					no_of_point +=1;
				}
				if($('#f3_spouse_mfi').val() === 'yes')
				{
					no_of_point +=3;
				}
			}
			

            var f3_pt =g_total/no_of_point;
			
			f3_pt     =f3_pt.toFixed(2);
			$('#f3_points').val(f3_pt);
			$('#f3_pt').html(f3_pt);
		}


		$(document).ready(function(){

			$('body').on('change','#f3_spouse_age, #f3_spouse_shg, #f3_spouse_occp, #f3_spouse_income', function(){
				calTotal();
			});

			$('body').on('change','#f3_spouse_mfiremain, #f3_spouse_mfiemi', function(){
				var tot = (parseInt( $('#f3_spouse_mfiremain').val() ) || 0) / (parseInt( $('#f3_spouse_mfiemi').val() ) || 1);
				tot = tot.toFixed(2);
				$('#f3_spouse_mfimonth').val(tot);
				$('#spouse_mfimonth_view').html(tot);
				calTotal();
			});

			$('#f3_spouse_mfiamount, #f3_spouse_mfirate, #f3_spouse_mfitenure')
			.on('change', function(){
				cal_loanEMI();
			});

			$('#f3_spouse_mfiemipaid')
			.on('change', function(){
				cal_loanEMI(1);
			});

			$('#f3_married').on('change', function(){
				if($(this).val() == 'yes'){
					$('#spouse_detail').show('swing');
				}
				else
				{
					$('#spouse_detail').hide('swing');
					$('#spouse_detail').find('input, select').val('').trigger('change');
				}
				calTotal();
			});

			$('#f3_spouse_mfi').on('change', function(){
				if($(this).val() == 'yes'){
					$('#microfinance').show('swing');
				}
				else
				{
					$('#microfinance').hide('swing');
					$('#microfinance').find('input, select').val('').trigger('change');
				}
				calTotal();
			});

			$('#f3_spouse_shg').on('change', function(){
				if($(this).val() == 'yes'){
					$('#shg_name').show('swing');
				}
				else
				{
					$('#shg_name').hide('swing');
					$('#shg_name').val('');
				}
				calTotal();
			});


			$('#f3_spouse_occp').on('change', function(){
				if($(this).val() == 'housewife'){
					$('#input_income').hide('swing').find('input').val('');
				}
				else
				{
					$('#input_income').show('swing');
					$('#input_income').val('');
				}
				calTotal();
			});


			$('#frm_knowledge_detail').on('submit', function(e) {
				e.preventDefault();
				if ($('#frm_knowledge_detail').valid())
				{
					loading_show();	
					$.ajax({
							type: "POST",
							url: "action_pages/action_frm3.php",
							data: new FormData(this),
							processData: false,
								contentType: false,
							cache: false,
							success: function(msg)
							{
								data = JSON.parse(msg);
							
								if(data.Success == "Success")
								{
									alert(data.resp);
									window.location.href="acrefinfrm_4.php?pag=farmers&fm_id=<?php echo $fm_id; ?>";
									loading_hide();
								}
								else if(data.Success == "fail") 
								{
									alert(data.resp);
									loading_hide();	
								}	
							},
							error: function (request, status, error)
							{
								loading_hide();	
							},
							complete: function()
							{
								loading_hide();	
							}	
						});
				}
			});
			
			
			$('#f3_married')     		  .val('<?= @$data['f3_married']; ?>');
			$('#f3_spouse_fname')		  .val('<?= @$data['f3_spouse_fname']; ?>');
			$('#f3_spouse_mname')		  .val('<?= @$data['f3_spouse_mname']; ?>');
			$('#f3_spouse_sname')		  .val('<?= @$data['f3_spouse_sname']; ?>');
			$('#f3_spouse_age')  		  .val('<?= @$data['f3_spouse_age']; ?>');
			$('#f3_spouse_mobno')		  .val('<?= @$data['f3_spouse_mobno']; ?>');
			$('#f3_spouse_adhno')		  .val('<?= @$data['f3_spouse_adhno']; ?>');
			$('#f3_spouse_shg')  		  .val('<?= @$data['f3_spouse_shg']; ?>');
			$('#f3_spouse_shgname')		  .val('<?= @$data['f3_spouse_shgname']; ?>');
			$('#f3_spouse_occp')		  .val('<?= @$data['f3_spouse_occp']; ?>');
			$('#f3_spouse_income')		  .val('<?= @$data['f3_spouse_income']; ?>');
			$('#f3_spouse_mfi')			  .val('<?= @$data['f3_spouse_mfi']; ?>');
			$('#f3_spouse_mfiname')       .val('<?= @$data['f3_spouse_mfiname']; ?>');
			$('#f3_spouse_mfiamount')	  .val('<?= @$data['f3_spouse_mfiamount']; ?>');
			$('#f3_spouse_purpose')		  .val('<?= @$data['f3_spouse_purpose']; ?>');
			$('#f3_spouse_mfiremain')     .val('<?= @$data['f3_spouse_mfiremain']; ?>');
			$('#f3_spouse_mfiemi')        .val('<?= @$data['f3_spouse_mfiemi']; ?>');
			$('#f3_spouse_mfimonth')      .val('<?= @$data['f3_spouse_mfimonth']; ?>');

			$('#f3_spouse_mfioutstanding').val('<?= @$data['f3_spouse_mfioutstanding']; ?>');
			$('#f3_spouse_mfirate')       .val('<?= @$data['f3_spouse_mfirate']; ?>');
			$('#f3_spouse_mfitenure')     .val('<?= @$data['f3_spouse_mfitenure']; ?>');
			$('#f3_spouse_mfiinterest')   .val('<?= @$data['f3_spouse_mfiinterest']; ?>');
			$('#f3_spouse_mfitotalamount').val('<?= @$data['f3_spouse_mfitotalamount']; ?>');
			$('#f3_spouse_mfiemipaid')    .val('<?= @$data['f3_spouse_mfiemipaid']; ?>');
			$('#f3_points').val('<?= @$data['f3_points']; ?>');

			if($('#f3_married').val() == 'yes'){
				$('#spouse_detail').show('swing');
			}

			if($('#f3_spouse_shg').val() == 'yes')
			{
				$('#shg_name').show('swing');
			}

			if($('#f3_spouse_mfi').val() == 'yes')
			{
				$('#microfinance').show('swing');
				$('#f3_spouse_mfiremain').trigger('change');

			}
			else
			{
				$('#microfinance').find('input, select').val('');
			}

			$('#spouse_detail').find('input, select').trigger('change');
			calTotal();
			
		});
	</script>

</body>
</html>
<?php
}
else
{
?>
<script type="text/javascript">
history.go(-1);
</script>
<?php	
}
?>
