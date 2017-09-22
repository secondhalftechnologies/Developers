<?php 
include('access1.php'); 
include('connection.php');
$fm_id = (isset($_REQUEST['fm_id'])? $_REQUEST['fm_id']:"");

if($fm_id!="" && isset($_SESSION['acrefin_user']) && $_SESSION['acrefin_user']!="")
{
  $result = lookup_value('tbl_applicant_knowledge',array(),array("fm_id"=>$fm_id),array(),array(),array());
  if($result)
  {
	  $num    = mysqli_num_rows($result);
	  if($num !=0)
	  {
		$row                      = mysqli_fetch_array($result);
		$data['f2_edudetail']     = $row['f2_edudetail'];
		$data['f2_proficiency']   = $row['f2_proficiency'];
		$data['f2_participation'] = $row['f2_participation'];
		$data['f2_points']        = $row['f2_points'];
		
		$data['f2_typeprog']      = $row['f2_typeprog'];
		$data['f2_nameprog']      = $row['f2_nameprog'];
		$data['f2_condprog']      = $row['f2_condprog'];
		$data['f2_cropprog']      = $row['f2_cropprog'];
		$data['f2_dateprog']      = $row['f2_dateprog'];
		$data['f2_durprog']       = $row['f2_durprog'];
	  }
  }
?>
<!DOCTYPE html>
<!--[if IE 7]>                  <html class="ie7 no-js" lang="en">     <![endif]-->
<!--[if lte IE 8]>              <html class="ie8 no-js" lang="en">     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" lang="en">  <!--<![endif]-->

<head>

	<title> Applicant's Knowledge  </title>
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

	<link rel="stylesheet" href="css/plugins/datepicker/datepicker.css">


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
	<!-- Just for demonstration -->
	<!-- <script src="js/demonstration.min.js"></script> -->
    
    <script src="js/plugins/jquery-ui/jquery.ui.widget.min.js"></script>
	<!--	<script src="js/bootstrap.min.js"></script> -->	
	<script src="js/plugins/validation/jquery.validate.min.js"></script>
	<script src="js/plugins/validation/additional-methods.min.js"></script>
	<script src="js/plugins/wizard/jquery.form.wizard.min.js"></script>

	<script src="js/plugins/datepicker/bootstrap-datepicker.js"></script>
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
								Applicant's Knowledge 
								</h3>
                                 
							</div>
                            <div class="box-content nopadding">
								<form enctype="multipart/form-data" method="POST" class='form-horizontal form-wizard wizard-vertical' id="frm_knowledge_detail">
									<div class="step" id="Step1">
										<?php include('side_menu.php'); ?>
										<div class="form-content">
                                           
                                             <input type="hidden" name="add_knowledge_detail" value="1">
                                             <input type="hidden" value="<?php echo $fm_id ?>" name="fm_id">
                                             <input type="hidden" name="fm_caid" value="<?php echo $_SESSION['fm_caid']; ?>">
                                             <input type="hidden" name="f2_points" value="" id="f2_points">
                                         
											<div class="control-group">
                                                      <label for="text" class="control-label" style="margin-top:10px">Educational Qualification Details <span style="color:#F00">*</span></label>
                                                      <div class="controls">
                                                      	<select id="f2_edudetail" name="f2_edudetail" class="input-xlarge" data-rule-required="true" onchange="calTotal()">
                                                      		<option value="" disabled selected> Select here</option>
                                                      		<option value="illiterate" point="2"> Illiterate</option>
                                                      		<option value="primary education" point="4"> Primary Education</option>
                                                      		<option value="matriculate" point="6"> Matriculate</option>
                                                      		<option value="graduate" point="8"> Graduate</option>
                                                      		<option value="post graduate" point="10"> Post Graduate</option>
                                                      	</select>
                                                      </div>
                                            </div><!--Educational Qualification Details-->

                                            <div class="control-group">
                                                      <label for="text" class="control-label" style="margin-top:10px">What is your proficiency in English?</label>
                                                      <div class="controls">
                                                      	<select id="f2_proficiency" data-rule-required="true" name="f2_proficiency" class="input-xlarge" onchange="calTotal()">
                                                      		<option value="" disabled selected> Select here</option>
                                                      		<option value="fluent" point="10"> Fluent</option>
                                                      		<option value="read" point="8">  Read</option>
                                                      		<option value="write" point="8">  Write</option>
                                                      		<option value="speak" point="7">  Speak</option>
                                                      		<option value="understand only" point="3">  Understand Only</option>
                                                      	</select>
                                                      </div>

                                            </div><!--proficiency in English-->

                                            <div class="control-group">
                                                      <label for="text" class="control-label" style="margin-top:10px">Participation in Farming Programs</label>
                                                      <div class="controls">
                                                      	<select id="f2_participation" data-rule-required="true" name="f2_participation" class="input-xlarge">
                                                      		<option value="" disabled selected> Select here</option>
                                                      		<option value="yes" point="10"> Yes</option>
                                                      		<option value="no" point="0"> No</option>
                                                      	</select>
                                                      </div>
                                            </div><!--Participation in Farming Programs-->
                                        	
                                        	<div id="program_detail" style="display: none; padding: 10px; border:1px solid #d6d6d6; margin: 20px;">
                                            	
                                            	<div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Type of the training Programs<span style="color:#F00">*</span></label>
													<div class="controls">
														<select id="f2_typeprog" name="f2_typeprog" class="input-xxlarge" data-rule-required="true">
                                                      		<option value="" disabled selected> Select here</option>
                                                      		<option value="organic farming training"> Organic Farming Training</option>
                                                      		<option value="equipment training"> Equipment Training</option>
                                                      		<option value="technology training"> Technology Training</option>
                                                      		<option value="pesticide fertilizer training"> Pesticide/Fertilizer Training</option>
                                                      		<option value="other farming training"> Other Farming Training</option>
                                                      		<option value="others"> Others</option>
                                                      	</select>
													</div>
												</div>
	                                        	<!-- Please specify the type of the training Programs -->

	                                        	<div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Name of the training Program<span style="color:#F00">*</span></label>
													<div class="controls">
														<input type="text" placeholder="Program name" id="f2_nameprog" name="f2_nameprog" class="input-xlarge v_name" data-rule-required="true" data-rule-minlength="4" data-rule-maxlength="100">
													</div>
												</div>
	                                        	<!-- Please specify the name of the training Program -->

	                                        	<div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Date of the program<span style="color:#F00">*</span></label>
													<div class="controls">
														<input type="text" placeholder="yyyy-mm-dd" id="f2_dateprog" name="f2_dateprog" class="datepicker input-xlarge" data-rule-required="true">
													</div>
												</div>
		                                        <!-- Date of the program -->

		                                        <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Duration of the program(in days)<span style="color:#F00">*</span></label>
													<div class="controls">
														<input type="text" placeholder="00" id="f2_durprog" name="f2_durprog" class="input-xlarge v_number" data-rule-required="true" data-rule-number="true"  data-rule-maxlength="3">
													</div>
												</div>
		                                        <!-- Duration of the program -->

	                                        	<div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Who conducted the programs?<span style="color:#F00">*</span></label>
													<div class="controls">
														<input type="text" placeholder="Full name" id="f2_condprog" name="f2_condprog" class="input-xlarge v_name" data-rule-required="true" data-rule-minlength="4" data-rule-maxlength="100">
													</div>
												</div>
		                                        <!-- Who conducted the programs? -->

	                                        	<div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">For which <span id="progType"></span> was the program held?<span style="color:#F00">*</span></label>
													<div class="controls">
														<input type="text" placeholder="Name" id="f2_cropprog" name="f2_cropprog" class="input-xlarge v_name" data-rule-required="true" data-rule-minlength="6" data-rule-maxlength="100">
													</div>
												</div>
		                                        <!-- For which crop was the program held? -->
                                            </div>

	                                        <div class="form-actions">
												<input type="reset" class="btn" value="Back" id="back">
												<input type="submit" class="btn btn-primary" value="Save" id="save">
	                                        </div>

	                                    </div>

	                                </div>
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
		var a = parseInt($('option:selected','#f2_proficiency').attr('point')) || 0;
		var b = parseInt($('option:selected','#f2_edudetail').attr('point')) || 0;
		var c = parseInt($('option:selected','#f2_participation').attr('point')) || 0;
		g_total = a + b + c;
		document.getElementById('g_total').innerHTML=g_total;
		
		var f2_pt =g_total/3;
		f2_pt     =f2_pt.toFixed(2);
		$('#f2_points').val(f2_pt);
		$('#f2_pt').html(f2_pt);
	}

    $('#frm_knowledge_detail').on('submit', function(e) {
		e.preventDefault();
		if ($('#frm_knowledge_detail').valid())
		{
			loading_show();	
			$.ajax({
				type: "POST",
				url: "action_pages/action_frm2.php",
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
						window.location.href="acrefinfrm_3.php?pag=farmers&fm_id=<?php echo $fm_id; ?>";
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
		$('#f2_edudetail').val('<?= @$data['f2_edudetail']; ?>');
		$('#f2_proficiency').val('<?= @$data['f2_proficiency']; ?>');
		$('#f2_participation').val('<?= @$data['f2_participation']; ?>');

		$('#f2_typeprog').val('<?= @$data['f2_typeprog']; ?>');
		$('#f2_nameprog').val('<?= @$data['f2_nameprog']; ?>');
		$('#f2_condprog').val('<?= @$data['f2_condprog']; ?>');
		$('#f2_cropprog').val('<?= @$data['f2_cropprog']; ?>');
		$('#f2_durprog').val('<?= @$data['f2_durprog']; ?>');
		$('#f2_dateprog').val('<?= @$data['f2_dateprog']; ?>');

		$('.datepicker').datepicker({format:'yyyy-mm-dd'});	

		$('#f2_participation').trigger('change');
		$('#f2_typeprog').trigger('change');

		calTotal();
	});

    $('#f2_participation').on('change', function(){
    	if($(this).val() == 'yes'){
			$('#program_detail').show('swing');
    	}
    	else
    	{
			$('#program_detail').hide('swing');
			$('#program_detail').find('input, select').val('').trigger('change');
    	}
		calTotal();
	});

	$('#f2_typeprog').on('change', function(){
		if($(this).val()){
			$('#progType').text($(this).val());
		}
		else{
			$('#progType').text('Crop');
		}
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
