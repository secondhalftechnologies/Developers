<?php 
include('access1.php'); 
include('connection.php');
$fm_id = (isset($_REQUEST['fm_id'])? $_REQUEST['fm_id']:"");

if($fm_id!="" && isset($_SESSION['acrefin_user']) && $_SESSION['acrefin_user']!="")
{
  $result = lookup_value('tbl_residence_details',array(),array("fm_id"=>$fm_id),array(),array(),array());
  if($result)
  {
	  $num    = mysqli_num_rows($result);
	  if($num !=0)
	  {
		$row                      = mysqli_fetch_array($result);
		$data['f7_resistatus']    = @$row['f7_resistatus'];
		$data['f7_phouse']        = @$row['f7_phouse'];
		$data['f7_pstreet']       = @$row['f7_pstreet'];
		$data['f7_parea']     	  = @$row['f7_parea'];
		$data['f7_pstate']        = @$row['f7_pstate'];
		$data['f7_pdistrict']     = @$row['f7_pdistrict'];
		$data['f7_ptaluka']       = @$row['f7_ptaluka'];
		$data['f7_pvillage']      = @$row['f7_pvillage'];
		$data['f7_ppin']          = @$row['f7_ppin'];
		// $data['f7_platlon']       = @$row['f7_platlon'];
		$data['f7_chouse']        = @$row['f7_chouse'];
		$data['f7_cstreet']       = @$row['f7_cstreet'];
		$data['f7_carea']         = @$row['f7_carea'];
		$data['f7_cstate']        = @$row['f7_cstate'];
		$data['f7_cdistrict']     = @$row['f7_cdistrict'];
		$data['f7_ctaluka']       = @$row['f7_ctaluka'];
		$data['f7_cvillage']      = @$row['f7_cvillage'];
		$data['f7_cpin']          = @$row['f7_cpin'];
		// $data['f7_clatlon']       = @$row['f7_clatlon'];

		$data['f7_television']    = @$row['f7_television'];
		$data['f7_refrigerator']  = @$row['f7_refrigerator'];
		$data['f7_wmachine']      = @$row['f7_wmachine'];
		$data['f7_mixer']         = @$row['f7_mixer'];
		$data['f7_stove']         = @$row['f7_stove'];
		$data['f7_bicycle']       = @$row['f7_bicycle'];
		$data['f7_ccylinder']     = @$row['f7_ccylinder'];
		$data['f7_fans']          = @$row['f7_fans'];
		$data['f7_motorcycle']    = @$row['f7_motorcycle'];
		$data['f7_car']           = @$row['f7_car'];

	  }
  }
?>
<!DOCTYPE html>
<!--[if IE 7]>                  <html class="ie7 no-js" lang="en">     <![endif]-->
<!--[if lte IE 8]>              <html class="ie8 no-js" lang="en">     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" lang="en">  <!--<![endif]-->

<head>

	<title> Residence Status & Details  </title>
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
					<a href="#" class='dropdown-toggle' data-toggle="dropdown"><?php echo $_SESSION['acrefin_user']; ?>
					<i class="icon-user"></i>
</a>
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
                
        		
                <div class="box box-color box-bordered lightgreen" style="padding:0px;">
							<div class="box-title">
								<h3>
								Residence Status & Details  
								</h3>
                                 
							</div>
                            <div class="box-content nopadding">
								<form enctype="multipart/form-data" method="POST" class='form-horizontal form-wizard wizard-vertical' id="frm_knowledge_detail">
									<div class="step" id="Step1">
										<?php include('side_menu.php'); ?>
										<div class="form-content">

											<div class="control-group">
												<label for="text" class="control-label" style="margin-top:10px">Residence status</label>
												<div class="controls">
													<select id="f7_resistatus" name="f7_resistatus" class="input-xlarge" data-rule-required="true" onchange="calTotal()">
														<option value="" disabled selected> Select here</option>
														<option value="rented" point="2"> Rented</option>
														<option value="ancestral" point="6"> Ancestral</option>
														<option value="owned" point="8"> Owned</option>
													</select>
												</div>
                                            </div><!--Residence status-->

										    <!-- permanent address -->
											<div class="span5" style="padding: 5px; border: 1px solid #d6d6d6; margin: 5px;">
												<h3>Permanent Residence Address</h3>
	                                            
	                                            <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">House No.</label>
													<div class="controls">
	                                                    <input type="text" id="f7_phouse" name="f7_phouse" class="input-xlarge v_text" maxlength="50" placeholder="House No.">
													</div>
	                                            </div><!--house no.-->

	                                            <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Street Name</label>
													<div class="controls">
	                                                    <input type="text" id="f7_pstreet" name="f7_pstreet" class="input-xlarge v_text" data-rule-maxlength="50" placeholder="Street Name">
													</div>
	                                            </div><!--street name-->

	                                            <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Area Name<span style="color:#F00">*</span></label>
													<div class="controls">
	                                                    <input type="text" id="f7_parea" name="f7_parea" class="input-xlarge v_text" data-rule-required="true" data-rule-maxlength="50" placeholder="Area Name">
													</div>
	                                            </div><!--Area Name-->

	                                            <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">State<span style="color:#F00">*</span></label>
													<div class="controls">
	                                                    <select id="f7_pstate" name="f7_pstate" class="input-xlarge" data-rule-required="true" >
															<option value="" disabled selected> Select here</option>
														</select>
													</div>
	                                            </div><!--State-->

	                                            <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">District<span style="color:#F00">*</span></label>
													<div class="controls">
	                                                    <select id="f7_pdistrict" name="f7_pdistrict" class="input-xlarge" data-rule-required="true">
															<option value="" disabled selected> Select here</option>
														</select>
													</div>
	                                            </div><!--District-->

	                                            <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Taluka<span style="color:#F00">*</span></label>
													<div class="controls">
	                                                    <select id="f7_ptaluka" name="f7_ptaluka" class="input-xlarge" data-rule-required="true">
															<option value="" disabled selected> Select here</option>
														</select>
													</div>
	                                            </div><!--Taluka-->

	                                            <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Village Name<span style="color:#F00">*</span></label>
													<div class="controls">
	                                                    <select id="f7_pvillage" name="f7_pvillage" class="input-xlarge" data-rule-required="true">
															<option value="" disabled selected> Select here</option>
														</select>
													</div>
	                                            </div><!--Village-->

	                                            <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Pin code<span style="color:#F00">*</span></label>
													<div class="controls">
	                                                    <input type="text" id="f7_ppin" name="f7_ppin" class="input-xlarge v_number" data-rule-minlength="6" data-rule-maxlength="6" placeholder="Pin code" data-rule-required="true">
													</div>
	                                            </div><!--Pin code-->

	                                            <!-- <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Lat / Lon<span style="color:#F00">*</span></label>
													<div class="controls">
														
														<a class="btn btn-primary btn-sm btnlatlon">Get Current Location</a>
	                                                    <input type="text" id="f7_platlon" name="f7_platlon" class="input-xlarge" data-rule-required="true" placeholder="latitude - longitude">
													</div>
	                                            </div> -->
	                                        </div>

	                                        <!-- Current Address -->
	                                        <div class="span5" style="padding: 5px; border: 1px solid #d6d6d6; margin: 5px;">
												<h3>Current Residence Address 
                                                <small>
                                                <a id="btnsame" class="btn btn-warning btn-sm">
                                                	Same as Permanent
                                                </a>
                                                </small>
                                                </h3>
	                                            
	                                            <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">House No.</label>
													<div class="controls">
	                                                    <input type="text" id="f7_chouse" name="f7_chouse" class="input-xlarge v_name" data-rule-maxlength="50" placeholder="House No.">
													</div>
	                                            </div><!--house no.-->

	                                            <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Street Name</label>
													<div class="controls">
	                                                    <input type="text" id="f7_cstreet" name="f7_cstreet" class="input-xlarge v_name" data-rule-maxlength="50" placeholder="Street Name">
													</div>
	                                            </div><!--street name-->

	                                            <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Area Name<span style="color:#F00">*</span></label>
													<div class="controls">
	                                                    <input type="text" id="f7_carea" name="f7_carea" class="input-xlarge v_name" data-rule-required="true" data-rule-maxlength="50" placeholder="Area Name">
													</div>
	                                            </div><!--Area Name-->

	                                            <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">State<span style="color:#F00">*</span></label>
													<div class="controls">
	                                                    <select id="f7_cstate" name="f7_cstate" class="input-xlarge" data-rule-required="true">
															<option value="" disabled selected> Select here</option>
														</select>
													</div>
	                                            </div><!--State-->

	                                            <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">District<span style="color:#F00">*</span></label>
													<div class="controls">
	                                                    <select id="f7_cdistrict" name="f7_cdistrict" class="input-xlarge" data-rule-required="true">
															<option value="" disabled selected> Select here</option>
														</select>
													</div>
	                                            </div><!--District-->

	                                            <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Taluka<span style="color:#F00">*</span></label>
													<div class="controls">
	                                                    <select id="f7_ctaluka" name="f7_ctaluka" class="input-xlarge" data-rule-required="true">
															<option value="" disabled selected> Select here</option>
														</select>
													</div>
	                                            </div><!--Taluka-->

	                                            <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Village Name<span style="color:#F00">*</span></label>
													<div class="controls">
	                                                    <select id="f7_cvillage" name="f7_cvillage" class="input-xlarge" data-rule-required="true">
															<option value="" disabled selected> Select here</option>
														</select>
													</div>
	                                            </div><!--Village-->

	                                            <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Pin code<span style="color:#F00">*</span></label>
													<div class="controls">
	                                                    <input type="text" id="f7_cpin" name="f7_cpin" class="input-xlarge v_number" data-rule-maxlength="6" data-rule-minlength="6" placeholder="Pin code" data-rule-required="true">
													</div>
	                                            </div><!--Pin code-->

	                                           <!--  <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Lat / Lon<span style="color:#F00">*</span></label>
													<div class="controls">
														
														<a class="btn btn-primary btn-sm btnlatlon">Get Current Location</a>
	                                                    <input type="text" id="f7_clatlon" name="f7_clatlon" class="input-xlarge" data-rule-required="true" placeholder="latitude - longitude">
													</div>
	                                            </div> -->
	                                        </div>
	                                        
	                                        <div class="span10" style="padding: 5px; border: 1px solid #d6d6d6; margin: 5px;">
	                                        <h3>What appliances are there in your house? Also mention their count.</h3>

	                                         <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Television
													<span style="color:#F00">*</span></label>
													<div class="controls">
														<input type="number" name="f7_television" id="f7_television" placeholder="Television" class="input-xlarge v_number cal_tcount" value="0">
													</div>
                                              </div>
												 <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Refrigerator<span style="color:#F00">*</span></label>
													<div class="controls">
														<input type="number" name="f7_refrigerator" id="f7_refrigerator" placeholder="Refrigerator" class="input-xlarge v_number cal_tcount" value="0">
													</div>
												</div>
												 <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Washing Machine<span style="color:#F00">*</span></label>
													<div class="controls">
														<input type="number" name="f7_wmachine" id="f7_wmachine" placeholder="Washing Machine" class="input-xlarge v_number cal_tcount" value="0">
													</div>
											     </div>

											     <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Mixer<span style="color:#F00">*</span></label>
													<div class="controls">
														<input type="number" name="f7_mixer" id="f7_mixer" placeholder="Mixer" class="input-xlarge v_number cal_tcount" value="0">
													</div>
                                              </div>
												 <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Gas Stove<span style="color:#F00">*</span></label>
													<div class="controls">
														<input type="number" name="f7_stove" id="f7_stove" placeholder="Gas Stove" class="input-xlarge v_number cal_tcount" value="0">
													</div>
												</div>
												 <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Bicycle<span style="color:#F00">*</span></label>
													<div class="controls">
														<input type="number" name="f7_bicycle" id="f7_bicycle" placeholder="Bicycle" class="input-xlarge v_number cal_tcount" value="0">
													</div>
											     </div>

											     <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Cooking Cylinder<span style="color:#F00">*</span></label>
													<div class="controls">
														<input type="number" name="f7_ccylinder" id="f7_ccylinder" placeholder="Cooking Cylinder" class="input-xlarge v_number cal_tcount" value="0">
													</div>
											     </div>

											     <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Lights & Fans<span style="color:#F00">*</span></label>
													<div class="controls">
														<input type="number" name="f7_fans" id="f7_fans" placeholder="Lights & Fans" class="input-xlarge v_number cal_tcount" value="0">
													</div>
                                              </div>
												 <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Motorcycle<span style="color:#F00">*</span></label>
													<div class="controls">
														<input type="number" name="f7_motorcycle" id="f7_motorcycle" placeholder="Motorcycle" class="input-xlarge v_number cal_tcount" value="0">
													</div>
												</div>
												 <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Car<span style="color:#F00">*</span></label>
													<div class="controls">
														<input type="number" name="f7_car" id="f7_car" placeholder="Bicycle" class="input-xlarge v_number cal_tcount" value="0">
													</div>
											     </div>
	                                        </div>
                                            
	                                        <div class="span10" style="text-align: center;">
	                                        <br>
												<input type="reset" class="btn" value="Back" id="back">
												<input type="submit" class="btn btn-primary" value="Save" id="save">
	                                        </div>
	                                    </div>
	                                </div>

  	                                 <input type="hidden" name="add_knowledge_detail" value="1">
                                     <input type="hidden" value="<?php echo $fm_id ?>" name="fm_id">
                                     <input type="hidden" name="fm_caid" value="<?php echo $_SESSION['fm_caid']; ?>">
                                     <input type="hidden" name="f7_points" value="" id="f7_points">

								</form>
                                <!--<input type="text" id="hid_total" name="hid_total" value="0">-->
                                <h1 id="g_total">0</h1> 
                            </div>
                            
				 </div>   

			</div>
		</div>
      </div>
    <script type="text/javascript">

		var g_total = 0;
		function calTotal()
		{
			var a = parseInt($('option:selected','#f7_resistatus').attr('point')) || 0;

			g_total = a;
			document.getElementById('g_total').innerHTML=g_total;

			var f7_pt =g_total
			f7_pt     =f7_pt.toFixed(2);
			$('#f7_points').val(f7_pt);
			$('#f7_pt').html(f7_pt);
		}

		$('#frm_knowledge_detail').on('submit', function(e) {
			e.preventDefault();
			if ($('#frm_knowledge_detail').valid())
			{
				loading_show();	
				$.ajax({
					type: "POST",
					url: "action_pages/action_frm7.php",
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
							window.location.href="acrefinfrm_8.php?pag=farmers&fm_id=<?php echo $fm_id; ?>";
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

		$(document).ready(function(){

			$.ajax({
				type: "POST",
				url: "action_pages/_states.php",
				data: '',
				processData: false,
				contentType: false,
				cache: false,
				success: function(data)
				{
					$('#f7_pstate').html(data);
					$('#f7_cstate').html(data);
					$('#f7_pstate').val('<?= @$data['f7_pstate']; ?>');
					$('#f7_cstate').val('<?= @$data['f7_cstate']; ?>');
					$('#f7_pstate, #f7_cstate').trigger('change');
				},
				error: function (request, status, error)
				{
					//loading_hide();	
				}
			});


			$('#f7_resistatus').val('<?= @$data['f7_resistatus']; ?>');
			$('#f7_phouse').val('<?= @$data['f7_phouse']; ?>');
			$('#f7_pstreet').val('<?= @$data['f7_pstreet']; ?>');
			$('#f7_parea').val('<?= @$data['f7_parea']; ?>');
			$('#f7_pstate').val('<?= @$data['f7_pstate']; ?>');
			$('#f7_pdistrict').val('<?= @$data['f7_pdistrict']; ?>');
			$('#f7_ptaluka').val('<?= @$data['f7_ptaluka']; ?>');
			$('#f7_pvillage').val('<?= @$data['f7_pvillage']; ?>');
			$('#f7_ppin').val('<?= @$data['f7_ppin']; ?>');
			// $('#f7_platlon').val('<?= @$data['f7_platlon']; ?>');
			$('#f7_chouse').val('<?= @$data['f7_chouse']; ?>');
			$('#f7_cstreet').val('<?= @$data['f7_cstreet']; ?>');
			$('#f7_carea').val('<?= @$data['f7_carea']; ?>');
			$('#f7_cstate').val('<?= @$data['f7_cstate']; ?>');
			$('#f7_cdistrict').val('<?= @$data['f7_cdistrict']; ?>');
			$('#f7_ctaluka').val('<?= @$data['f7_ctaluka']; ?>');
			$('#f7_cvillage').val('<?= @$data['f7_cvillage']; ?>');
			$('#f7_cpin').val('<?= @$data['f7_cpin']; ?>');
			// $('#f7_clatlon').val('<?= @$data['f7_clatlon']; ?>');
  
            $('#f7_television').val('<?= @$data['f7_television']; ?>');
			$('#f7_refrigerator').val('<?= @$data['f7_refrigerator']; ?>');
			$('#f7_wmachine').val('<?= @$data['f7_wmachine']; ?>');
			$('#f7_mixer').val('<?= @$data['f7_mixer']; ?>');
			$('#f7_stove').val('<?= @$data['f7_stove']; ?>');
			$('#f7_bicycle').val('<?= @$data['f7_bicycle']; ?>');
			$('#f7_ccylinder').val('<?= @$data['f7_ccylinder']; ?>');
			$('#f7_fans').val('<?= @$data['f7_fans']; ?>');
			$('#f7_motorcycle').val('<?= @$data['f7_motorcycle']; ?>');
			$('#f7_car').val('<?= @$data['f7_car']; ?>');
			
              $('#btnsame').on('click', function(e){
				e.preventDefault();

				$('#f7_cstate').html($('#f7_pstate').html());
				$('#f7_cdistrict').html($('#f7_pdistrict').html());
				$('#f7_ctaluka').html($('#f7_ptaluka').html());
				$('#f7_cvillage').html($('#f7_pvillage').html());

				$('#f7_chouse').val($('#f7_phouse').val()).hide().show('swing');
				$('#f7_cstreet').val($('#f7_pstreet').val()).hide().show('swing');
				// $('#f7_clatlon').val($('#f7_platlon').val()).hide().show('swing');
				$('#f7_cpin').val($('#f7_ppin').val()).hide().show('swing');
				$('#f7_cvillage').val($('#f7_pvillage').val()).hide().show('swing');
				$('#f7_ctaluka').val($('#f7_ptaluka').val()).hide().show('swing');
				$('#f7_cdistrict').val($('#f7_pdistrict').val()).hide().show('swing');
				$('#f7_cstate').val($('#f7_pdistrict').val()).hide().show('swing');
				$('#f7_carea').val($('#f7_parea').val()).hide().show('swing');
			});

			$('.btnlatlon').on('click', function(){
				var this_ = $(this);
				console.log(navigator);
                check_is_mob=mobilecheck();
              console.log(check_is_mob);
              if(check_is_mob)
              {
                 alert();
                 var posOptions = {timeout: 10000, enableHighAccuracy: false};
				  $cordovaGeolocation
				    .getCurrentPosition(posOptions)
				    .then(function (position) {
				      var lat  = position.coords.latitude
				      var long = position.coords.longitude
                       this_.siblings('h4').html(position.coords.latitude + '-' + position.coords.longitude).show('swing');

				    }, function(err) {
				      // error
				    });
              }
              else
              {
              	if (navigator.geolocation) {
			        navigator.geolocation.getCurrentPosition(function(position){
			        	console.log(position.coords.latitude + '-' + position.coords.longitude);
			        	this_.siblings('input').val(position.coords.latitude + '-' + position.coords.longitude);
						this_.siblings('h4').html(position.coords.latitude + '-' + position.coords.longitude).show('swing');
			        });
			    } else {
					this_.siblings('h4').html('Geolocation is not supported by this browser.').show('swing');
			    }

              }
				


			});

			$('body').on('change', '#f7_pstate, #f7_cstate', function(){
				var _dist = '';
				if($(this).attr('id') == 'f7_pstate')
				{
					_dist = $('#f7_pdistrict');
				}
				else
				{
					_dist = $('#f7_cdistrict');
				}
				$.ajax({
					type: "POST",
					url: "action_pages/_districts.php",
					data: {'dt_stid' : $(this).val()},
					success: function(data)
					{
						_dist.html(data);
						if(_dist.attr('id') == 'f7_pdistrict'){
							$('#f7_pdistrict').val('<?= @$data['f7_pdistrict']; ?>');
						}
						else{
							$('#f7_cdistrict').val('<?= @$data['f7_cdistrict']; ?>');
						}
						_dist.trigger('change');
					},
					error: function (request, status, error)
					{
						//loading_hide();	
					}
				});
			});


			$('body').on('change', '#f7_pdistrict, #f7_cdistrict', function(){
				var _taluka = '';
				if($(this).attr('id') == 'f7_pdistrict')
				{
					_taluka = $('#f7_ptaluka');
				}
				else
				{
					_taluka = $('#f7_ctaluka');
				}
				$.ajax({
					type: "POST",
					url: "action_pages/_talukas.php",
					data: {'tk_dtid' : $(this).val()},
					success: function(data)
					{
						_taluka.html(data);
						if(_taluka.attr('id') == 'f7_ptaluka'){
							$('#f7_ptaluka').val('<?= @$data['f7_ptaluka']; ?>');
						}
						else{
							$('#f7_ctaluka').val('<?= @$data['f7_ctaluka']; ?>');
						}
						_taluka.trigger('change');
					},
					error: function (request, status, error)
					{
						//loading_hide();	
					}
				});
			});

			$('body').on('change', '#f7_ptaluka, #f7_ctaluka', function(){
				var _village = '';
				if($(this).attr('id') == 'f7_ptaluka')
				{
					_village = $('#f7_pvillage');
				}
				else
				{
					_village = $('#f7_cvillage');
				}
				$.ajax({
					type: "POST",
					url: "action_pages/_villages.php",
					data: {'vl_tkid' : $(this).val()},
					success: function(data)
					{
						_village.html(data);
						if(_village.attr('id') == 'f7_pvillage'){
							$('#f7_pvillage').val('<?= @$data['f7_pvillage']; ?>');
						}
						else{
							$('#f7_cvillage').val('<?= @$data['f7_cvillage']; ?>');
						}
					},
					error: function (request, status, error)
					{
						//loading_hide();	
					}
				});
			});

			calTotal();
		});



  window.mobilecheck = function() {
  var check = false;
  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
  
  return check;
};

     
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





                                        
