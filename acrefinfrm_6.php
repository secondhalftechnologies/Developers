<?php 
include('access1.php'); 
include('connection.php');
$fm_id = (isset($_REQUEST['fm_id'])? $_REQUEST['fm_id']:"");

if($fm_id!="" && isset($_SESSION['acrefin_user']) && $_SESSION['acrefin_user']!="")
{
  $result = lookup_value('tbl_family_details',array(),array("fm_id"=>$fm_id),array(),array(),array());
  if($result)
  {
	  $num    = mysqli_num_rows($result);
	  if($num !=0)
	  {
		$row                      = mysqli_fetch_array($result);
		
		$data['f6_points']        = $row['f6_points'];
		$data['f6_jointfamily']   = $row['f6_jointfamily'];
		$data['f6_members']       = $row['f6_members'];
		$data['f6_children']      = $row['f6_children'];
		$data['f6_smartuse']      = $row['f6_smartuse'];
	  }
  }
?>
<!DOCTYPE html>
<!--[if IE 7]>                  <html class="ie7 no-js" lang="en">     <![endif]-->
<!--[if lte IE 8]>              <html class="ie8 no-js" lang="en">     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" lang="en">  <!--<![endif]-->

<head>

	<title> Family Details </title>
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
								Family Details 
								</h3>
                                 
							</div>
                            <div class="box-content nopadding">
								<form enctype="multipart/form-data" method="POST" class='form-horizontal form-wizard wizard-vertical' id="frm_knowledge_detail">
									<div class="step" id="Step1">
										<?php include('side_menu.php'); ?>
										<div class="form-content">

                                            <div class="control-group">
												<label for="text" class="control-label" style="margin-top:10px">Do you live in a Joint Family?<span style="color:#F00">*</span></label>
												<div class="controls">
													<select id="f6_jointfamily" name="f6_jointfamily" class="input-xlarge" data-rule-required="true" onchange="calTotal()">
														<option value="" disabled selected> Select here</option>
														<option value="yes" point="10"> Yes</option>
														<option value="no" point="4"> No</option>
													</select>
												</div>
                                            </div><!--Do you live in a Joint Family?-->

                                            <div class="control-group">
												<label for="text" class="control-label" style="margin-top:10px">How many members are there in your family?<span style="color:#F00">*</span></label>
												<div class="controls">

                                                    <select id="f6_members" name="f6_members" class="input-xlarge" data-rule-required="true">
														<option value="" disabled selected> Select here</option>
														<?php 
															for($i=1; $i<21; $i++){
																echo '<option value="'.$i.'">'.$i.'</option>';
															}
														?>
														
													</select>
												</div>
                                            </div><!--members-->

                                            <div class="control-group">
												<label for="text" class="control-label" style="margin-top:10px">Number of Children<span style="color:#F00">*</span></label>
												<div class="controls">
                                                    <select id="f6_children" name="f6_children" class="input-xlarge" data-rule-required="true">
														<option value="" disabled selected> Select here</option>
														<?php 
															for($i=0; $i<16; $i++){
																echo '<option value="'.$i.'">'.$i.'</option>';
															}
														?>
														
													</select>
												</div>
                                            </div><!--children-->

                                            <div class="control-group" id="use_smartphone">
												<label for="text" class="control-label" style="margin-top:10px">Any of children use Smart Phones?<span style="color:#F00">*</span></label>
												<div class="controls">
                                                    <select id="f6_smartuse" name="f6_smartuse" class="input-xlarge" data-rule-required="true" onchange="calTotal()">
														<option value="" disabled selected> Select here</option>
														<option value="yes" point="10"> Yes</option>
														<option value="no" point="1"> No</option>
													</select>
												</div>
                                            </div><!--smartuse-->


	                                        <div class="form-actions">
												<input type="reset" class="btn" value="Back" id="back">
												<input type="submit" class="btn btn-primary" value="Save" id="save">
	                                        </div>
	                                    </div>
	                                </div>
	                                 <input type="hidden" name="add_knowledge_detail" value="1">
                                     <input type="hidden" value="<?php echo $fm_id ?>" name="fm_id">
                                     <input type="hidden" name="fm_caid" value="<?php echo $_SESSION['fm_caid']; ?>">
                                     <input type="hidden" name="f6_points" value="" id="f6_points">
								</form>
                                <!--<input type="text" id="hid_total" name="hid_total" value="0">-->
                                <h1 id="g_total">0</h1> 
                            </div>
                            
				 </div>   

			</div>
		</div>
      </div>
    <script type="text/javascript">

		function convertMemebersToPoint(x)
		{
			if(x >= 0 && x <= 2)
			{
			  return 5;
			}
			else if(x >= 3 && x <= 5)
			{
			  return 7;
			}
			else if(x >= 6 && x <= 7)
			{
			  return 4;
			}
			else if(x >= 8 && x <= 20)
			{
			  return 3;
			}
			else
			{
			  return 0;
			}
		}

		var g_total = 0;
		function calTotal()
		{
			var a = parseInt($('option:selected','#f6_jointfamily').attr('point')) || 0;
			var b = $('#f6_children').val() != '' ? parseInt($('#f6_children').val()) : '';
			var c = parseInt($('option:selected','#f6_smartuse').attr('point')) || 0;

			b = convertMemebersToPoint(b);


			g_total = a + b + c;
			document.getElementById('g_total').innerHTML=g_total;
			var f6_pt = '';
			if($('#f6_children').val() == '' || $('#f6_children').val() == 0)
			{
				f6_pt =g_total/2;
			}
			else
			{
				f6_pt =g_total/3;
			}

			f6_pt     =f6_pt.toFixed(2);
			$('#f6_points').val(f6_pt);
			$('#f6_pt').html(f6_pt);
		}

		$('#frm_knowledge_detail').on('submit', function(e) {
			e.preventDefault();
			if ($('#frm_knowledge_detail').valid())
			{
				loading_show();	
				$.ajax({
					type: "POST",
					url: "action_pages/action_frm6.php",
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
							window.location.href="acrefinfrm_7.php?pag=farmers&fm_id=<?php echo $fm_id; ?>";
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

			$('#f6_jointfamily').val('<?= @$data['f6_jointfamily']; ?>');
			$('#f6_members').val('<?= @$data['f6_members']; ?>');
			$('#f6_children').val('<?= @$data['f6_children']; ?>');
			$('#f6_smartuse').val('<?=  @$data['f6_smartuse']; ?>');

			$('#f6_children').on('change', function(){
				if($('#f6_children').val() == 0 || !$('#f6_children').val()){
					$('#use_smartphone').hide('swing');
					$('#use_smartphone').find('input, select').val('');
				}
				else
				{
					$('#use_smartphone').show('swing');
				}
				calTotal();
			});

			$('#f6_children').trigger('change');
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



                                        
                                        