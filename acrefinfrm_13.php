<?php 
include('access1.php'); 
include('connection.php');
$fm_id = (isset($_REQUEST['fm_id'])?$_REQUEST['fm_id']:"");
if($fm_id!="" && isset($_SESSION['acrefin_user']) && $_SESSION['acrefin_user']!="")
{
  $result = lookup_value('tbl_livestock_details',array(),array("fm_id"=>$fm_id),array(),array(),array());
  if($result)
  {
	  $num    = mysqli_num_rows($result);
	  if($num !=0)
	  {
		  $row     = mysqli_fetch_array($result);
		  $f13_dairy_cattle = $row['f13_dairy_cattle'];
		  $f13_draft_cattle = $row['f13_draft_cattle'];
		  $f13_buffalo 		= $row['f13_buffalo'];
		  $f13_ox			= $row['f13_ox'];
		  $f13_sheep 		= $row['f13_sheep'];
		  $f13_goat 		= $row['f13_goat'];
		  $f13_pig 			= $row['f13_pig'];
		  $f13_poultry 		= $row['f13_poultry'];
		  $f13_donkeys 		= $row['f13_donkeys'];
		  $f13_livestock_count  = $row['f13_livestock_count'];
		  $f13_livestock_income = $row['f13_livestock_income'];
		 
		}
  }
  
?>
<!DOCTYPE html>
<!--[if IE 7]>                  <html class="ie7 no-js" lang="en">     <![endif]-->
<!--[if lte IE 8]>              <html class="ie8 no-js" lang="en">     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" lang="en">  <!--<![endif]-->

<head>

	<title> Livestock Asset Details   </title>
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
    
    <script>

		var g_total = 0;

		function calTotal()
		{ 
		    total_p =0;
			f13_dairy_cattle = parseInt($('#f13_dairy_cattle').val() || '0');
			f13_donkeys      = parseInt($('#f13_donkeys').val()|| '0');
			f13_draft_cattle = parseInt($('#f13_draft_cattle').val()|| '0');
			f13_poultry		 = parseInt($('#f13_poultry').val()|| '0');
			f13_pig 		 = parseInt($('#f13_pig').val()|| '0');
			f13_goat  		 = parseInt($('#f13_goat').val()|| '0');
			f13_sheep		 = parseInt($('#f13_sheep').val()|| '0');
			f13_ox			 = parseInt($('#f13_ox').val()|| '0');
			f13_buffalo 	 = parseInt($('#f13_buffalo').val()|| '0');
			
			total_p          = f13_dairy_cattle + f13_donkeys + f13_draft_cattle + f13_poultry +f13_pig +f13_goat +f13_sheep + f13_ox +f13_buffalo;

			if(total_p == 0)
			{
				$('#livestock_count').hide('wing');
				$('#f13_livestock_count').val("");
				$('#f13_livestock_income').val("");
			}
			else
			{
				$('#livestock_count').show('wing');
				$('#f13_livestock_count').val(total_p);
				
			}
		}


		$(document).ready(function(){

			$('body').on('change','#f13_dairy_cattle, #f13_donkeys,#f13_draft_cattle', function(){
				calTotal();
			});
			
			$('body').on('change','#f13_poultry, #f13_pig,#f13_goat', function(){
				calTotal();
			});
			
			$('body').on('change','#f13_sheep, #f13_ox, #f13_buffalo,f13_livestock_count', function(){
				calTotal();
			});
			
		});

        function numsonly(e)
		 {
  			  var unicode=e.charCode? e.charCode : e.keyCode
			  if (unicode !=8 && unicode !=32)
			  {  // unicode<48||unicode>57 &&
     		  if ( unicode<48||unicode>57  )  //if not a number
          	  return false //disable key press
              }
		}
	
      
	</script>
    
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
								Livestock Asset Details   
								</h3>
                                 
							</div>
                            <div class="box-content nopadding">
								<form enctype="multipart/form-data" method="POST" class='form-horizontal form-wizard wizard-vertical' id="frm_livestock_detail">
									<div class="step" id="Step1">
										<?php include('side_menu.php'); ?>
										<div class="form-content">
											

                                            <div id="livestock_detail" style="padding:5px;border:1px solid #d6d6d6;margin:5px;">
                                            	<h2>Livestock Asset Details</h2>
                                            	
                 								 <input type="hidden" name="add_livestock_detail" value="1">
                                                 <input type="hidden" value="<?php echo $fm_id ?>" name="fm_id">
                                                 <input type="hidden" name="fm_caid" value="<?php echo $_SESSION['fm_caid']; ?>">
												
                                                
                                                <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Dairy Cattle
													<span style="color:#F00">*</span></label>
													<div class="controls">
														<!-- <select id="f13_dairy_cattle" name="f13_dairy_cattle" class="input-xlarge" data-rule-required="true">
															<option value="" disabled selected> Select here</option>
															<option value="yes"> Yes</option>
															<option value="no"> No</option>
														</select> -->
														<input type="number" name="f13_dairy_cattle" id="f13_dairy_cattle" placeholder="Dairy Cattle Count" class="input-xlarge v_number cal_tcount" value="0">

													</div>
	                                            </div><!--f3_dairy_cattle-->
                                                
                                                <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Draft Cattle
													<span style="color:#F00">*</span></label>
													<div class="controls">
														<!-- <select id="f13_draft_cattle" name="f13_draft_cattle" class="input-xlarge" data-rule-required="true">
															<option value="" disabled selected> Select here</option>
															<option value="yes"> Yes</option>
															<option value="no"> No</option>
														</select> -->
														<input type="number" name="f13_draft_cattle" id="f13_draft_cattle" placeholder="Draft Cattle Count" class="input-xlarge v_number cal_tcount" value="0">
													</div>
	                                            </div><!--f13_draft_cattle-->
                                                
                                                <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Buffalo
													<span style="color:#F00">*</span></label>
													<div class="controls">
														<!-- <select id="f13_buffalo" name="f13_buffalo" class="input-xlarge" data-rule-required="true">
															<option value="" disabled selected> Select here</option>
															<option value="yes"> Yes</option>
															<option value="no"> No</option>
														</select> -->
														<input type="number" name="f13_buffalo" id="f13_buffalo" placeholder="Buffalo Count" class="input-xlarge v_number cal_tcount" value="0">
													</div>
	                                            </div><!--f13_buffalo-->
                                                
                                                <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Ox
													<span style="color:#F00">*</span></label>
													<div class="controls">
														<!-- <select id="f13_ox" name="f13_ox" class="input-xlarge" data-rule-required="true">
															<option value="" disabled selected> Select here</option>
															<option value="yes"> Yes</option>
															option value="no"> No</option>
														</select>-->
														<input type="number" name="f13_ox" id="f13_ox" placeholder="Ox Count" class="input-xlarge v_number cal_tcount" value="0">
													</div>
	                                            </div><!--f13_ox-->
                                                
                                                <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Sheep
													<span style="color:#F00">*</span></label>
													<div class="controls">
														<!-- <select id="f13_sheep" name="f13_sheep" class="input-xlarge" data-rule-required="true">
															<option value="" disabled selected> Select here</option>
															<option value="yes"> Yes</option>
															<option value="no"> No</option>
														</select> -->
														<input type="number" name="f13_sheep" id="f13_sheep" placeholder="Sheep Count" class="input-xlarge v_number cal_tcount" value="0">
													</div>
	                                            </div><!--f13_sheep-->
                                                
                                                <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Goat
													<span style="color:#F00">*</span></label>
													<div class="controls">
														<!-- <select id="f13_goat" name="f13_goat" class="input-xlarge" data-rule-required="true">
															<option value="" disabled selected> Select here</option>
															<option value="yes"> Yes</option>
															<option value="no"> No</option>
														</select> -->
														<input type="number" name="f13_goat" id="f13_goat" placeholder="Goat Count" class="input-xlarge v_number cal_tcount" value="0">
													</div>
	                                            </div><!--f13_goat-->
                                                
                                                <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Pig
													<span style="color:#F00">*</span></label>
													<div class="controls">
														<!-- <select id="f13_pig" name="f13_pig" class="input-xlarge" data-rule-required="true">
															<option value="" disabled selected> Select here</option>
															<option value="yes"> Yes</option>
															<option value="no"> No</option>
														</select> -->
														<input type="number" name="f13_pig" id="f13_pig" placeholder="Pig Count" class="input-xlarge v_number cal_tcount" value="0">
													</div>
	                                            </div><!--f13_pig-->
                                                
                                                <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Poultry [ chicken, geese, turkey, duck]
													<span style="color:#F00">*</span></label>
													<div class="controls">
														<!-- <select id="f13_poultry" name="f13_poultry" class="input-xlarge" data-rule-required="true">
															<option value="" disabled selected> Select here</option>
															<option value="yes"> Yes</option>
															<option value="no"> No</option>
														</select> -->
														<input type="number" name="f13_poultry" id="f13_poultry" placeholder="Poultry Count" class="input-xlarge v_number cal_tcount" value="0">
													</div>
	                                            </div><!--f13_poultry-->
                                                
                                                <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Donkeys
													<span style="color:#F00">*</span></label>
													<div class="controls">
														<!-- <select id="f13_donkeys" name="f13_donkeys" class="input-xlarge" data-rule-required="true">
															<option value="" disabled selected> Select here</option>
															<option value="yes"> Yes</option>
															<option value="no"> No</option>
														</select> -->
														<input type="number" name="f13_donkeys" id="f13_donkeys" placeholder="Donkeys Count" class="input-xlarge v_number cal_tcount" value="0">
													</div>
	                                            </div><!--f13_donkeys-->
                                                
                                                <div id="livestock_count" style="display:none">
                                                <div class="control-group" >
													<label for="text" class="control-label" style="margin-top:10px">Livestock Count
<span style="color:#F00">*</span></label>
													<div class="controls">
														<input readonly type="text" onKeyPress="return numsonly(event);" id="f13_livestock_count" name="f13_livestock_count" class="input-xlarge" value="<?php echo @$f13_livestock_count; ?>"  data-rule-required="true" placeholder="Livestock Count">
													</div>
												</div>
                                                
                                                <div class="control-group" >
													<label for="text" class="control-label" style="margin-top:10px">Income Gained From Livestock in Rs.
<span style="color:#F00">*</span></label>
													<div class="controls">
														<input type="text" value="<?php echo @$f13_livestock_income; ?>" onKeyPress="return numsonly(event);" id="f13_livestock_income" name="f13_livestock_income" class="input-xlarge"  data-rule-required="true" placeholder="Income Gained">
													</div>
												</div>
                                                
                                                </div><!--livestock_count-->
                                                
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
    	
		
		  $('#frm_livestock_detail').on('submit', function(e) {
			e.preventDefault();
			if ($('#frm_livestock_detail').valid())
			{
				loading_show();	
				$.ajax({
						type: "POST",
						url: "action_pages/action_frm13.php",
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
							window.location.href="view_farmers.php?pag=farmers";
								//loading_hide();
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
			$('#f13_dairy_cattle').val('<?= @$f13_dairy_cattle; ?>');
			$('#f13_draft_cattle').val('<?= @$f13_draft_cattle; ?>');
			$('#f13_buffalo').val('<?= @$f13_buffalo; ?>');
			$('#f13_ox').val('<?= @$f13_ox; ?>');
			$('#f13_sheep').val('<?= @$f13_sheep; ?>');
			$('#f13_goat').val('<?= @$f13_goat; ?>');
			$('#f13_pig').val('<?= @$f13_pig; ?>');
			$('#f13_poultry').val('<?= @$f13_poultry; ?>');
			$('#f13_donkeys').val('<?= @$f13_donkeys; ?>');
			calTotal();


		$('.cal_tcount ').on('change', function(){

			calTotal();
		});
			
			
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


