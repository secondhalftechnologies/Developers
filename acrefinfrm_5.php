<?php 
include('access1.php'); 
include('connection.php');
$fm_id = (isset($_REQUEST['fm_id'])?$_REQUEST['fm_id']:"");
if($fm_id!="" && isset($_SESSION['acrefin_user']) && $_SESSION['acrefin_user']!="")
{
  $result = lookup_value('tbl_applicant_phone',array(),array("fm_id"=>$fm_id),array(),array(),array());
  if($result)
  {
	  $num    = mysqli_num_rows($result);
	  if($num !=0)
	  {
		  $row                      = mysqli_fetch_array($result);
		  $data['f5_phonetype']     = $row['f5_phonetype'];
		  $data['f5_servpro']       = $row['f5_servpro'];
		  $data['f5_network']       = $row['f5_network'];
		  $data['f5_datapack']      = $row['f5_datapack'];
		  $data['f5_datapackname']  = $row['f5_datapackname'];
		  $data['f5_appuse']        = $row['f5_appuse'];
		  $data['f5_farmapp']       = $row['f5_farmapp'];
		 
	  }
  }
?>
<!DOCTYPE html>
<!--[if IE 7]>                  <html class="ie7 no-js" lang="en">     <![endif]-->
<!--[if lte IE 8]>              <html class="ie8 no-js" lang="en">     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" lang="en">  <!--<![endif]-->

<head>

	<title> Details of Applicant's Phone    </title>
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
								Details of Applicant's Phone  
								</h3>
                                 
							</div>
                            <div class="box-content nopadding">
								<form enctype="multipart/form-data" method="POST" class='form-horizontal form-wizard wizard-vertical' id="frm_applicant_detail">
									<div class="step" id="Step1">
										<?php include('side_menu.php'); ?>
										<div class="form-content">
                                        
        									 <input type="hidden" name="add_applicant_detail" value="1">
                                             <input type="hidden" value="<?php echo $fm_id ?>" name="fm_id">
                                             <input type="hidden" name="fm_caid" value="<?php echo $_SESSION['fm_caid']; ?>">
                                             
                                             <div class="control-group">
												<label for="text" class="control-label" style="margin-top:10px">Type of Phone Ownership<span style="color:#F00">*</span></label>
												<div class="controls">
													<select id="f5_phonetype" name="f5_phonetype" class="input-xlarge" data-rule-required="true">
														<option value="" disabled selected> Select here</option>
														<option value="smartphone" > Smart Phone</option>
														<option value="featurephone" > Feature Phone</option>
													</select>
												</div>
                                            </div><!--Phone Type-->

                                            <div class="control-group">
												<label for="text" class="control-label" style="margin-top:10px">Who is the service Provider?</label>
												<div class="controls">
													<select data-rule-required="true" id="f5_servpro" name="f5_servpro" class="input-xlarge" >
														<option value="" disabled selected> Select here</option>
														<option value="aircel">Aircel</option>
														<option value="airtel">Airtel</option>
														<option value="jio">Jio</option>
														<option value="relience">Relience</option>
														<option value="tata docomo">Tata Docomo</option>
														<option value="tata">Tata</option>
														<option value="uninor">Uninor</option>
														<option value="vodafone">Vodafone</option>
													</select>
												</div>
                                            </div><!--Who is the service Provider?-->


                                            <div class="control-group">
												<label for="text" class="control-label" style="margin-top:10px">Do you receive sufficeint network Coverage?</label>
												<div class="controls">
													<select data-rule-required="true" id="f5_network" name="f5_network" class="input-xlarge">
														<option value="" disabled selected> Select here</option>
														<option value="yes"> Yes</option>
														<option value="no"> No</option>
													</select>
												</div>
                                            </div><!--Do you receive sufficeint network Coverage?-->

                                            <div class="control-group" style="display: none" id="datapackInput">
												<label for="text" class="control-label" style="margin-top:10px">Do you have Data Pack on your Phone ?</label>
												<div class="controls">
													<select id="f5_datapack" name="f5_datapack" class="input-xlarge">
														<option value="" disabled selected> Select here</option>
														<option value="yes"> Yes</option>
														<option value="no"> No</option>
													</select>
												</div>
                                            </div><!--Do you have Data Pack on your Phone ?-->

                                            <div class="control-group" style="display: none" id="datapacknameInput">
												<label for="text" class="control-label" style="margin-top:10px">Specify Data pack</label>
												<div class="controls">
                                                    <select id="f5_datapackname" name="f5_datapackname" class="input-xlarge">
														<option value="" disabled selected> Select here</option>
														<option value="2g"> 2G</option>
														<option value="3g"> 3G</option>
														<option value="4g"> 4G</option>
													</select>
												</div>
                                            </div><!--specify data pack-->

                                            <div class="control-group" style="display: none" id="appuseInput">
												<label for="text" class="control-label" style="margin-top:10px">Do you use apps regularly</label>
												<div class="controls">
													<select id="f5_appuse" name="f5_appuse" class="input-xlarge">
														<option value="" disabled selected> Select here</option>
														<option value="yes"> Yes</option>
														<option value="no"> No</option>
													</select>
												</div>
                                            </div><!--Do you use apps regularly-->

                                            <div class="control-group" style="display: none;" id="farmappInput">
												<label for="text" class="control-label" style="margin-top:10px">Subscriptions to Farming Advisory Apps?</label>
												<div class="controls">
													<select id="f5_farmapp" name="f5_farmapp" class="input-xlarge">
														<option value="" disabled selected> Select here</option>
														<option value="yes"> Yes</option>
														<option value="no"> No</option>
													</select>
												</div>
                                            </div><!--Subscriptions to Farming Advisory Apps?-->
                                            

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
		    $('#frm_applicant_detail').on('submit', function(e) {
			e.preventDefault();
			if ($('#frm_applicant_detail').valid())
			{
				loading_show();	
				$.ajax({
						type: "POST",
						url: "action_pages/action_frm5.php",
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
							window.location.href="acrefinfrm_6.php?pag=farmers&fm_id=<?php echo $fm_id; ?>";
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

	     	$('#f5_phonetype').on('change', function(){
				if($(this).val() == 'smartphone'){
					$('#appuseInput').show('swing');
					$('#datapackInput').show('swing');
				}
				else
				{
					$('#appuseInput').hide('swing').find('input, select').val('');
					$('#datapackInput').hide('swing').find('input, select').val('');
					$('#farmappInput').hide('swing').find('input, select').val('');
					$('#datapacknameInput').hide('swing').find('input, select').val('');
				}
			});

			$('#f5_datapack').on('change', function(){
				if($(this).val() == 'yes'){
					$('#farmappInput').show('swing');
					$('#datapacknameInput').show('swing');
				}
				else
				{
					$('#farmappInput').hide('swing').find('input, select').val('');
					$('#datapacknameInput').hide('swing').find('input, select').val('');
				}
			});


			$('#f5_phonetype').val('<?= @$data['f5_phonetype']; ?>');
			$('#f5_servpro').val('<?= @$data['f5_servpro']; ?>');
			$('#f5_network').val('<?= @$data['f5_network']; ?>');
			$('#f5_datapack').val('<?= @$data['f5_datapack']; ?>');
			$('#f5_datapackname').val('<?= @$data['f5_datapackname']; ?>');
			$('#f5_appuse').val('<?= @$data['f5_appuse']; ?>');
			$('#f5_farmapp').val('<?= @$data['f5_farmapp']; ?>');
			
			$('input, select').trigger('change');
			

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


                            
                            