<?php 
include('access1.php'); 
include('connection.php');
$fm_id = (isset($_REQUEST['fm_id'])?$_REQUEST['fm_id']:"");
if($fm_id!="" && isset($_SESSION['acrefin_user']) && $_SESSION['acrefin_user']!="")
{

  $result = lookup_value('tbl_asset_details',array(),array("fm_id"=>$fm_id),array(),array(),array());
  if($result)
  {
	  $num    = mysqli_num_rows($result);
	  if($num !=0)
	  {
		  $row     = mysqli_fetch_array($result);
		  $machine  		  = $row['f12_machinery'];
		  $vehicle            = $row['f12_vehicle'];
		  $f12_is_immovable   =	$row['f12_is_immovable'];
		  $f12_immovable_asset=	$row['f12_immovable_asset'];
		 
	  }
  }
?>
<!DOCTYPE html>
<!--[if IE 7]>                  <html class="ie7 no-js" lang="en">     <![endif]-->
<!--[if lte IE 8]>              <html class="ie8 no-js" lang="en">     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" lang="en">  <!--<![endif]-->

<head>

	<title> Asset Details </title>
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
    
    
    
   	<!-- Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico" />
	<!-- Apple devices Homescreen icon -->
	<link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-precomposed.png" /> 
	
    </head>

	<body class="theme-green" data-theme="theme-green">
    <?php loader();  ?>
	                
							
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
								Asset Details    
								</h3>
                                 
							</div>
                            <div class="box-content nopadding">
								<form enctype="multipart/form-data"  method="POST" class='form-horizontal form-wizard wizard-vertical' id="frm_asset_detail">
									<div class="step" id="Step1">
										<?php include('side_menu.php'); ?>
										<div class="form-content">
											

                                            <div id="asset_detail" style="padding:5px;border:1px solid #d6d6d6;margin:5px;">
                                            	<h2>Asset Details</h2>
                                            	
                                             
                                                <input type="hidden" value="<?php echo $fm_id ?>" name="fm_id">
                                                <input type="hidden" value="1" name="add_asset_detail">
                                                <input type="hidden" name="fm_caid" value="<?php echo $_SESSION['fm_caid']; ?>">
                                                
                                                <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Vehicles Owned with Value in Rs.
													<span style="color:#F00">*</span></label>
                                                   
													<div class="controls">
                                                      <select id="f12_vehicle" name="f12_vehicle" class="input-xlarge" data-rule-required="true">
															<option value="" disabled selected> Select here</option>
															<option value="1 Vehicle below 5 lacs">1 Vehicle below 5 lacs</option>
															<option value="1 Vehicle above 5 lacs">1 Vehicle above 5 lacs</option>
                                                            <option value="2 + Vehicles">2 + Vehicles</option>
                                                            <option value="no">No</option>
														</select>
													</div>
	                                            </div><!--f3_dairy_cattle-->
                                                
                                                <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Machinery Owned with Value in RS.
													<span style="color:#F00">*</span></label>
													<div class="controls">
														<select id="f12_machinery" name="f12_machinery" class="input-xlarge" data-rule-required="true">
															<option value="" disabled selected> Select here</option>
															<option value="1 Machine below 5 lacs">1 Machine below 5 lacs</option>
															<option value="1 Machine above 5 lacs"> 1 Machine above 5 lacs</option>
                                                            <option value="2 + Machines"> 2 + Machines</option>
                                                            <option value="no">No</option>
														</select>
													</div>
	                                            </div><!--f13_draft_cattle-->
                                                
                                                
                                                <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Any Other Immovable Assets?
													<span style="color:#F00">*</span></label>
													<div class="controls">
														<select id="f12_is_immovable" name="f12_is_immovable" class="input-xlarge" data-rule-required="true">
															<option value="" disabled selected> Select here</option>
															<option value="yes">Yes</option>
															<option value="no">No</option>
                                                        </select>
													</div>
	                                            </div><!--f13_draft_cattle-->
                                                
                                                <div class="control-group" style=" display:none" id="immovable_asset">
													<label for="text" class="control-label" style="margin-top:10px">which immovable asset you own?
													<span style="color:#F00">*</span></label>
													<div class="controls">
														<select id="f12_immovable_asset" name="f12_immovable_asset" class="input-xlarge" data-rule-required="true">
                                                            <option value="" disabled selected> Select here</option>
															<option value="Building">Building</option>
															<option value="Land">Land</option>
                                                            <option value="House">House</option>
															<option value="Others">Others</option>
                                                        </select>
													</div>
	                                            </div><!--f13_draft_cattle-->
                                            </div>
                                            
                                            <div class="form-actions">
												<input type="reset" class="btn" value="Back" id="back">
                                                
												<input type="submit" class="btn btn-primary" value="" id="save">
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
    	
		
		  
		  
		     $('#frm_asset_detail').on('submit', function(e) {
			e.preventDefault();
			if ($('#frm_asset_detail').valid())
			{
				loading_show();	
				$.ajax({
						type: "POST",
						url: "action_pages/action_frm12.php",
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
							//window.location.href="acrefinfrm_13.php?pag=farmers&fm_id=<?php echo $fm_id; ?>";

							go_to_form('13',<?php echo $fm_id; ?>);
							
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
			$('#f12_vehicle').val('<?= @$vehicle; ?>');
			$('#f12_machinery').val('<?= @$machine; ?>');
			$('#f12_is_immovable').val('<?= @$f12_is_immovable; ?>');
			$('#f12_immovable_asset').val('<?= @$f12_immovable_asset; ?>');
			
			if($('#f12_is_immovable').val()=='yes')
			{
				$('#immovable_asset').show('swing');
			}
			
			$('#f12_is_immovable').on('change', function(){
				if($(this).val() == 'yes')
				{
					$('#immovable_asset').show('swing');
				}
				else 
				{
					$('#immovable_asset').hide('swing');
					$('#f12_immovable_asset').val("");
				}
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


