<?php 
include('access1.php'); 
include('connection.php');
$fm_id = (isset($_REQUEST['fm_id'])? $_REQUEST['fm_id']:"");

if($fm_id!="" && isset($_SESSION['acrefin_user']) && $_SESSION['acrefin_user']!="")
{

  $spouse_result = lookup_value('tbl_spouse_details',array(),array("fm_id"=>$fm_id),array(),array(),array());
  if($spouse_result)
  {
  	$spouse_num    = mysqli_num_rows($spouse_result);
	if($spouse_num !=0)
	{
	    $spouse_row = mysqli_fetch_array($spouse_result);
	    if($spouse_row['f3_married']=='no')
	    { ?>
         <script type="text/javascript">
         	
         	alert("You have no Spouse..!");
         	window.location.href="acrefinfrm_5.php?pag=farmers&fm_id=<?php echo $fm_id; ?>"
         </script>
	     

              
  <?php }
	}
  }


  $result = lookup_value('tbl_spouse_knowledge',array(),array("fm_id"=>$fm_id),array(),array(),array());
  if($result)
  {
	  $num    = mysqli_num_rows($result);
	  if($num !=0)
	  {
	    $row = mysqli_fetch_array($result);
	    $data['f4_edudetail']     = $row['f4_edudetail'];
		$data['f4_proficiency']   = $row['f4_proficiency'];
		$data['f4_participation'] = $row['f4_participation'];
		$data['f4_points']        = $row['f4_points'];

		$data['f4_progtype']      = $row['f4_progtype'];
		$data['f4_progname']      = $row['f4_progname'];
		$data['f4_duration']      = $row['f4_duration'];
		$data['f4_dateprog']      = $row['f4_dateprog'];
		$data['f4_conducted']     = $row['f4_conducted'];
		$data['f4_crop']          = $row['f4_crop'];
	  }
  }
?>
<!DOCTYPE html>
<!--[if IE 7]>                  <html class="ie7 no-js" lang="en">     <![endif]-->
<!--[if lte IE 8]>              <html class="ie8 no-js" lang="en">     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" lang="en">  <!--<![endif]-->

<head>

	<title> Spouse's Knowledge    </title>
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
								Spouse's Knowledge 
								</h3>
                                 
							</div>
                            <div class="box-content nopadding">
								<form enctype="multipart/form-data" method="POST" class='form-horizontal form-wizard wizard-vertical' id="frm_spouse_detail">
									<div class="step" id="Step1">
										<?php include('side_menu.php'); ?>
										<div class="form-content">
 											 <input type="hidden" name="add_spouse_detail" value="1">
                                             <input type="hidden" value="<?php echo $fm_id ?>" name="fm_id">
                                             <input type="hidden" name="fm_caid" value="<?php echo $_SESSION['fm_caid']; ?>">
                                             <input type="hidden" name="f4_points" value="" id="f4_points">
                                        	<div class="control-group">
												<label for="text" class="control-label" style="margin-top:10px">Spouse Educational Qualification Details<span style="color:#F00">*</span></label>
												<div class="controls">
													<select id="f4_edudetail" name="f4_edudetail" class="input-xlarge" data-rule-required="true" onchange="calTotal()">
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
													<select id="f4_proficiency" name="f4_proficiency" class="input-xlarge" onchange="calTotal()">
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
												<label for="text" class="control-label" style="margin-top:10px">Any participation in Farming Programs?</label>
												<div class="controls">
													<select id="f4_participation" name="f4_participation" class="input-xlarge" onchange="calTotal()">
														<option value="" disabled selected> Select here</option>
														<option value="yes" point="10"> Yes</option>
														<option value="no" point="0"> No</option>
													</select>
												</div>
                                            </div><!--Participation in Farming Programs-->

                                            <div id="program_detail" style="padding:5px;border:1px solid #d6d6d6;margin:5px;display: none;">

                                                <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Type of the training Programs<span style="color:#F00">*</span></label>
													<div class="controls">
														<select id="f4_progtype" name="f4_progtype" class="input-xlarge" data-rule-required="true">
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
														<input type="text" id="f4_progname" name="f4_progname" class="input-xlarge v_name" data-rule-required="true" data-rule-minlength="4" data-rule-maxlength="100" placeholder="Training Program">
													</div>
												</div>
	                                        	<!-- Please specify the name of the training Program -->
              

                                                <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Date of the program<span style="color:#F00">*</span></label>
													<div class="controls">
														<input type="text" id="f4_dateprog" name="f4_dateprog" class="input-xlarge datepicker" placeholder="Date of the program" data-rule-required="true">
													</div>
												</div>
		                                        <!-- Date of the program -->

		                                        <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Duration of the program(in days)<span style="color:#F00">*</span></label>
													<div class="controls">
														<input type="text" id="f4_duration" name="f4_duration" class="input-xlarge v_number" data-rule-number="true"  data-rule-maxlength="3" placeholder="Duration of the program(in days)" data-rule-required="true">
													</div>
												</div>
		                                        <!-- Duration of the program -->


                                                <div class="control-group">
                                                      <label for="text" class="control-label" style="margin-top:10px">Who conducted the programs?<span style="color:#F00">*</span></label>
                                                      <div class="controls">
                                                      	<input type="text" id="f4_conducted" name="f4_conducted" class="input-xlarge v_name" data-rule-minlength="4" data-rule-maxlength="100" data-rule-required="true" placeholder="Who Conducted">
                                                      </div>
                                                </div><!--Who conducted the programs?-->

                                                <div class="control-group">
                                                      <label for="text" class="control-label" style="margin-top:10px">For What <span id="programType"></span> the program for?<span style="color:#F00">*</span></label>
                                                      <div class="controls">
                                                      	<input type="text" id="f4_crop" name="f4_crop" class="input-xlarge v_name" data-rule-minlength="4" data-rule-maxlength="100" placeholder="Name" data-rule-required="true">
                                                      </div>
                                                </div><!--For What crop the program for?-->
                                            	
                                            	
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
		var a = parseInt($('option:selected','#f4_proficiency').attr('point')) || 0;
		var b = parseInt($('option:selected','#f4_edudetail').attr('point')) || 0;
		var c = parseInt($('option:selected','#f4_participation').attr('point')) || 0;
		g_total = a + b + c;
		document.getElementById('g_total').innerHTML=g_total;
		var f4_pt =g_total/3;
		if(c==0)
		{
			var f4_pt =g_total/2;
		}
		
		f4_pt     =f4_pt.toFixed(2);
		$('#f4_points').val(f4_pt);
		$('#f4_pt').html(f4_pt);
	}

    $('#frm_spouse_detail').on('submit', function(e) {
		e.preventDefault();
		if ($('#frm_spouse_detail').valid())
		{
			loading_show();	
			$.ajax({
				type: "POST",
				url: "action_pages/action_frm4.php",
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
						window.location.href="acrefinfrm_5.php?pag=farmers&fm_id=<?php echo $fm_id; ?>";
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
    	$('.datepicker').datepicker({format:'yyyy-mm-dd'});
    	$('#f4_participation').on('change', function(){
	    	if($(this).val() == 'yes'){
				$('#program_detail').show('swing');
	    	}
	    	else
	    	{
				$('#program_detail').hide('swing');
				$('#program_detail').find('input, select').val('').trigger('chnage');
	    	}
			calTotal();
		});

    	$('#f4_progtype').on('change', function(){
			if($(this).val()){
				if($(this).val()=='others')
				{
					$('#programType').text('purpose');
				}
				else
				{
					$('#programType').text($(this).val());
				}
				
			}
			else{
				$('#programType').text('Crop');
			}
		});

		$('#f4_edudetail').val('<?php echo @$data['f4_edudetail']; ?>');
		$('#f4_proficiency').val('<?= @$data['f4_proficiency']; ?>');
		$('#f4_participation').val('<?= @$data['f4_participation']; ?>');

		$('#f4_progtype').val('<?= @$data['f4_progtype']; ?>');
		$('#f4_progname').val('<?= @$data['f4_progname']; ?>');
		$('#f4_duration').val('<?= @$data['f4_duration']; ?>');
		$('#f4_dateprog').val('<?= @$data['f4_dateprog']; ?>');
		$('#f4_conducted').val('<?= @$data['f4_conducted']; ?>');
		$('#f4_crop').val('<?= @$data['f4_crop']; ?>');

		$('#f4_participation').trigger('change');
		$('#f4_progtype').trigger('change');

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
