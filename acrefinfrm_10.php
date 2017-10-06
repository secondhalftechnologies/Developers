<?php 
include('access1.php'); 
include('connection.php');
$fm_id = (isset($_REQUEST['fm_id'])?$_REQUEST['fm_id']:"");
if($fm_id!="" && isset($_SESSION['acrefin_user']) && $_SESSION['acrefin_user']!="")
{
  $no_of_crops=1;
  $crops_arr  = array();
  $result = lookup_value('tbl_cultivation_data',array(),array("fm_id"=>$fm_id),array(),array(),array());
  if($result)
  {
	 while($row = mysqli_fetch_array($result))
	 {
		 array_push($crops_arr ,$row);
	 }
	 $no_of_crops = sizeof($crops_arr);
  }
  //print_r($crops_arr);
 
?>
<!DOCTYPE html>
<!--[if IE 7]>                  <html class="ie7 no-js" lang="en">     <![endif]-->
<!--[if lte IE 8]>              <html class="ie8 no-js" lang="en">     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" lang="en">  <!--<![endif]-->

<head>

	<title> Crop and Cultivation Data  </title>
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
    
    <script type="text/javascript">

		var g_total = 0;
		var contentCount = <?php echo $no_of_crops; ?>;

         function numsonly(e)
		 {
  			  var unicode=e.charCode? e.charCode : e.keyCode
			  if (unicode !=8 && unicode !=32)
			  {  // unicode<48||unicode>57 &&
     		  if ( unicode<48||unicode>57  )  //if not a number
          	  return false //disable key press
              }
		}

		function calTotal()
		{
			cultivating =0;
			stage       =0;
			diseases	=0;
			pest		=0;
			tonnes		=0;
			price       =0;
			income      =0;
			
			for(var i=1; i<=contentCount; i++)
			{
				pnts =0;
				cultivating += parseInt($('option:selected','#f10_cultivating'+i).attr('point')) || 0;
				stage       += parseInt($('option:selected','#f10_stage'+i).attr('point')) || 0;
				diseases    += parseInt($('option:selected','#f10_diseases'+i).attr('point')) || 0;
				pest        += parseInt($('option:selected','#f10_pest'+i).attr('point')) || 0;
				tonnes_pt      = $('#f10_expected'+i).val() ? (parseInt($('#f10_expected'+i).val()) || 0) : undefined;
				price_pt      = parseInt($('#f10_expectedprice'+i).val()) || 0;
				income_pt      = parseInt($('#f10_expectedincome'+i).val()) || 0;

				tonnes += convertTonnesToPoint(tonnes_pt);
				price += convertPriceToPoint(price_pt);
				income += convertIncomeToPoint(income_pt);
			}
			
            g_total = cultivating + stage + diseases + pest + tonnes + price + income;
			document.getElementById('g_total').innerHTML=g_total;
			g_total =(g_total/(contentCount*7));
			
			f10_pt     =g_total.toFixed(2);
			$('#f10_points').val(f10_pt);
			$('#f10_pt').html(f10_pt);
			$('#no_of_crops').val(contentCount);

			if(contentCount==1)
			{
               $('.removeCrop').hide('swing');
			}
			else
			{
				$('.removeCrop').show('swing');
			}
		}

		function convertTonnesToPoint(x)
		{
			if(x >= 0 && x <= 1)
			{
			  return 3;
			}
			else if(x >= 2 && x <= 4)
			{
			  return 5;
			}
			else if(x >= 5 && x <= 6)
			{
			  return 7;
			}
			else if(x >= 7 && x <= 9)
			{
			  return 9;
			}
			else if(x >= 10 && x <= 100)
			{
			  return 10;
			}
			else
			{
			  return 0;
			}
		}

		function convertPriceToPoint(x)
		{
			if(x >= 10000 && x <= 20000)
			{
			  return 4;
			}
			else if(x >= 20001 && x <= 30000)
			{
			  return 6;
			}
			else if(x >= 30001 && x <= 40000)
			{
			  return 10;
			}
			else
			{
			  return 0;
			}
		}

		function convertIncomeToPoint(x){
			if(x >= 5000 && x <= 25000)
			{
			  return 3;
			}
			else if(x >= 25001 && x <= 50000)
			{
			  return 4;
			}
			else if(x >= 50001 && x <= 75000)
			{
			  return 5;
			}
			else if(x >= 75001 && x <= 100000)
			{
			  return 8;
			}
			else if(x >= 100001 && x <= 500000)
			{
			  return 10;
			}
			else
			{
			  return 0;
			}
		}

		function appendContent(){
			contentCount++;
			var html = `<div id="crop`+contentCount+`" style="padding:5px;border:1px solid #d6d6d6;margin:5px; display:none">           <input type="hidden" name="id[]" id="id" value="">
		                  	<h3>Crop `+contentCount+`</h3>
		                  	<div class="control-group">
								<label for="text" class="control-label" style="margin-top:10px">Type Of Crop Cultivating This Year <span style="color:#F00">*</span></label>
								<div class="controls">
                                    <select id="f10_cultivating`+contentCount+`" name="f10_cultivating`+contentCount+`" class="input-xlarge" data-rule-required="true" onchange="calTotal() ; get_variety(this.value,contentCount)">
										<option value="" disabled selected> Select here</option>;
										
										<?php
																
										$crops = lookup_value('tbl_crops',array(),array("crop_status"=>1),array(),array(),array());
										while($crop = mysqli_fetch_array($crops))
										{?>
								html += <option value="<?php echo $crop['crop_id'] ?>" point="7"><?php echo $crop['crop_name'] ?></option>
								<?php	 }
																	
								?>
										html += 
									</select>
								</div>
                            </div><!--Type of crop cultivating this year [Per Acre Per Crop]:-->


                            <div class="control-group">
								<label for="text" class="control-label" style="margin-top:10px">Variety <span style="color:#F00">*</span></label>
								<div class="controls">
                                    <select onchange="calTotal()" id="f10_variety`+contentCount+`" name="f10_variety`+contentCount+`" class="input-xlarge" data-rule-required="true">
									   <option value="" disabled selected> Select here</option>
										
									</select>
								</div>
                            </div><!--Type of crop cultivating this year [Per Acre Per Crop]:-->


                            <div class="control-group">
								<label for="text" class="control-label" style="margin-top:10px">Current Stage Of Crop <span style="color:#F00">*</span> </label>
								<div class="controls">
                                    <select id="f10_stage`+contentCount+`" name="f10_stage`+contentCount+`" class="input-xlarge" data-rule-required="true" onchange="calTotal()">
										<option value="" disabled selected> Select here</option>
										<option point="3" value="Land Preparation"> Land Preparation</option>
										<option point="4" value="Seed Selection"> Seed Selection</option>
										<option point="5" value="Seed Sowing"> Seed Sowing</option>
										<option point="6" value="Irrigation">  Irrigation</option>
										<option point="7" value="Crop Growth">  Crop Growth</option>
										<option point="8" value="Fertilizing"> Fertilizing</option>
										<option point="9" value="Harvesting"> Harvesting</option>
									</select>
								</div>
                            </div><!--Current stage of crop-->

                            <div class="control-group">
								<label for="text" class="control-label" style="margin-top:10px">Total Yield Expected [In tonnes Per Acre]:<span style="color:#F00">*</span></label>
								<div class="controls">
                                    <input type="text" id="f10_expected`+contentCount+`" name="f10_expected`+contentCount+`" class="input-xlarge" onKeyPress="return numsonly(event);" data-rule-required="true" maxlength="10" onchange="calTotal()" placeholder="Total Yield Expected">
								</div>
                            </div><!--Total Yield Expected [In tonnes Per Acre]:-->

                            

                            <div class="control-group">
								<label for="text" class="control-label" style="margin-top:10px">Expected Price This Year in Rs. <span style="color:#F00">*</span></label>
								<div class="controls">
                                    <input type="text" id="f10_expectedprice`+contentCount+`" name="f10_expectedprice`+contentCount+`" class="input-xlarge" onKeyPress="return numsonly(event);" data-rule-required="true" maxlength="10" onchange="calTotal()" placeholder="Expected Price">
								</div>
                            </div><!--Expected price this year -->

                            <div class="control-group">
								<label for="text" class="control-label" style="margin-top:10px">Total Income Expected This Year [ Per Acre Per Crop ]<span style="color:#F00">*</span></label>
								<div class="controls">
                                    <input type="text" id="f10_expectedincome`+contentCount+`" name="f10_expectedincome`+contentCount+`" class="input-xlarge" onKeyPress="return numsonly(event);" data-rule-required="true" maxlength="10" onchange="calTotal()" placeholder="Total Income Expected">
								</div>
                            </div><!--Total Income Expected this year [ Per Acre Per Crop ] -->

                            <div class="control-group">
								<label for="text" class="control-label" style="margin-top:10px">Potential Crop Diseases<span style="color:#F00">*</span></label>
								<div class="controls">
                                    <select id="f10_diseases`+contentCount+`" name="f10_diseases`+contentCount+`" class="input-xlarge" data-rule-required="true" onchange="calTotal()" >
										<option value="" disabled selected> Select here</option>
										<option point="1" value="Fungal"> Fungal</option>
										<option point="4" value="Non-fungal"> Non-fungal</option>
										<option point="0" value="Severe"> Severe</option>
										<option point="8" value="Treatable"> Treatable</option>
										<option point="10" value="No potential of diseases"> No potential of diseases</option>
									</select>
								</div>
                            </div><!--Potential crop diseases-->


                            <div class="control-group">
								<label for="text" class="control-label" style="margin-top:10px">Potential Pest Control Problems<span style="color:#F00">*</span></label>
								<div class="controls">
                                    <select id="f10_pest`+contentCount+`" name="f10_pest`+contentCount+`" class="input-xlarge" data-rule-required="true" onchange="calTotal()">
										<option value="" disabled selected> Select here</option>
										<option point="1" value="yes"> Yes</option>
										<option point="10" value="no"> No</option>
									</select>
								</div>
                            </div><!--Potential pest control problems-->
                        </div>`;

            

				$('#formContent').append(html).find('#crop'+contentCount).slideDown("slow");
				calTotal();
		}

		function removeContent(){
			if(contentCount > 1){
				
				$('#formContent').find('#crop'+contentCount).slideUp("slow", function(){
					$(this).remove();
					contentCount--;
					calTotal();
				});
			}
		}

		$(document).ready(function(){
			$('.addCrop').click(function(){
				appendContent();
			});

			$('.removeCrop_btn').click(function(){
				removeContent();
			});
		});
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
								Crop and Cultivation Data   <span class="badge" ></span>  
								</h3>
                                 
							</div>
                            <div class="box-content nopadding">
								<form enctype="multipart/form-data" method="POST" class='form-horizontal form-wizard wizard-vertical' id="frm_crop_detail">
									<div class="step" id="Step1">
										<?php include('side_menu.php'); ?>
										<div class="form-content" >
                                             <div id="formContent"> 
                                             <input type="hidden" name="add_crop_detail" value="1">
                                             <input type="hidden" value="<?php echo $fm_id ?>" name="fm_id">
                                             <input type="hidden" name="fm_caid" value="<?php echo $_SESSION['fm_caid']; ?>">
                                             <input type="hidden" name="f10_points" id="f10_points" value="">
                                             <input type="hidden" name="no_of_crops" id="no_of_crops" value="1">
                                             <?php 
											 
											 for($i=0;$i<$no_of_crops;$i++)
											 { 
											   $id =$i+1;
											   
											 ?>
											
                                             
                                              
												<div id="crop<?php echo $id; ?>" style="padding:5px;border:1px solid #d6d6d6;margin:5px;">                                         <input type="hidden" name="id[]" id="id" value="<?php echo @$crops_arr[$i]['id']; ?>">    
                                                <h3>Crop <?php echo $id; ?></h3>
								                  	<div class="control-group">
														<label for="text" class="control-label" style="margin-top:10px">Type Of Crop Cultivating This Year<span style="color:#F00">*</span></label>
														<div class="controls">
		                                                    <select id="f10_cultivating<?php echo $id; ?>" name="f10_cultivating<?php echo $id; ?>" class="input-xlarge" data-rule-required="true" onchange="calTotal();get_variety(this.value,<?php echo $id; ?>)">
																<option value=""  selected> Select here</option>
																<?php
																
																	$crops = lookup_value('tbl_crops',array(),array("crop_status"=>1),array(),array(),array());
																	while($crop = mysqli_fetch_array($crops))
																	{
																	echo ' <option value="'.$crop['crop_id'].'" point="7" >'.$crop['crop_name'].'</option> '; 
																	 }
																
																?>
															</select>
														</div>
		                                            </div><!--Type of crop cultivating this year [Per Acre Per Crop]:-->


		                                            <div class="control-group">
														<label for="text" class="control-label" style="margin-top:10px">Variety<span style="color:#F00">*</span></label>
														<div class="controls">
		                                                    <select id="f10_variety<?php echo $id; ?>" name="f10_variety<?php echo $id; ?>" class="input-xlarge" data-rule-required="true" onchange="calTotal();">
																<option value="" disabled selected> Select here</option>
                                                                <?php
			if(isset($crops_arr[$i]['f10_cultivating']) && $crops_arr[$i]['f10_cultivating']!="")
			{
						$result     = lookup_value('tbl_crop_varieties',array(),array("fk_crop_id"=>$crops_arr[$i]['f10_cultivating']),array(),array(),array());
						if($result)
						{
							while($row = mysqli_fetch_array($result))
							{
								echo '<option value="'.$row['variety_id'].'">'.$row['variety_name'].' '.$row['variety_type'].'</option>';
							}
						}
						else
						{
							echo '<option value="NA">NA</option>';
						}
		}
																
																?>
                                                                
															</select>
														</div>
		                                            </div><!--Type of crop cultivating this year [Per Acre Per Crop]:-->


		                                            <div class="control-group">
														<label for="text" class="control-label" style="margin-top:10px">Current Stage Of Crop <span style="color:#F00">*</span></label>
														<div class="controls">
		                                                    <select id="f10_stage<?php echo $id; ?>" name="f10_stage<?php echo $id; ?>" class="input-xlarge" data-rule-required="true" onchange="calTotal()">
																<option value="" disabled selected> Select here</option>
																<option point="3" value="Land Preparation">Land Preparation</option>
																<option point="4" value="Seed Selection">Seed Selection</option>
																<option point="5" value="Seed Sowing">Seed Sowing</option>
																<option point="6" value="Irrigation">Irrigation</option>
																<option point="7" value="Crop Growth">Crop Growth</option>
																<option point="8" value="Fertilizing">Fertilizing</option>
																<option point="9" value="Harvesting">Harvesting</option>
															</select>
														</div>
		                                            </div><!--Current stage of crop-->

		                                            <div class="control-group">
														<label for="text" class="control-label" style="margin-top:10px">Total Yield Expected [In tonnes Per Acre]:<span style="color:#F00">*</span></label>
														<div class="controls">
		                                                    <input type="text" id="f10_expected<?php echo $id; ?>" name="f10_expected<?php echo $id; ?>" class="input-xlarge" onKeyPress="return numsonly(event);" data-rule-required="true" maxlength="10" onchange="calTotal()" placeholder="Total Yield Expected">
														</div>
		                                            </div><!--Total Yield Expected [In tonnes Per Acre]:-->

		                                            <div class="control-group">
														<label for="text" class="control-label" style="margin-top:10px">Expected Price This Year In Rs.<span style="color:#F00">*</span></label>
														<div class="controls">
		                                                    <input type="text" id="f10_expectedprice<?php echo $id; ?>" name="f10_expectedprice<?php echo $id; ?>" class="input-xlarge" data-rule-required="true"  onKeyPress="return numsonly(event);" maxlength="10" onchange="calTotal()" placeholder="Expected Price">
														</div>
		                                            </div><!--Expected price this year -->

		                                            <div class="control-group">
														<label for="text" class="control-label" style="margin-top:10px">Total Income Expected This Year [ Per Acre Per Crop ]<span style="color:#F00">*</span></label>
														<div class="controls">
		                                                    <input type="text" id="f10_expectedincome<?php echo $id; ?>" name="f10_expectedincome<?php echo $id; ?>" class="input-xlarge"  data-rule-required="true"  onKeyPress="return numsonly(event);" maxlength="10" onchange="calTotal()" placeholder="Total Income Expected">
														</div>
		                                            </div><!--Total Income Expected this year [ Per Acre Per Crop ] -->

		                                            <div class="control-group">
														<label for="text" class="control-label" style="margin-top:10px">Potential Crop Diseases<span style="color:#F00">*</span></label>
														<div class="controls">
		                                                    <select id="f10_diseases<?php echo $id; ?>" name="f10_diseases<?php echo $id; ?>" class="input-xlarge" data-rule-required="true" onchange="calTotal()">
																<option value="" disabled selected> Select here</option>
																<option point="1" value="Fungal"> Fungal</option>
																<option point="4" value="Non-fungal"> Non-fungal</option>
																<option point="0" value="Severe"> Severe</option>
																<option point="8" value="Treatable"> Treatable</option>
																<option point="10" value="No potential of diseases"> No potential of diseases</option>
															</select>
														</div>
		                                            </div><!--Potential crop diseases-->


		                                            <div class="control-group">
														<label for="text" class="control-label" style="margin-top:10px">Potential Pest Control Problems <span style="color:#F00">*</span></label>
														<div class="controls">
		                                                    <select id="f10_pest<?php echo $id; ?>" name="f10_pest<?php echo $id; ?>" class="input-xlarge" data-rule-required="true" onchange="calTotal()">
																<option value="" disabled selected> Select here</option>
																<option point="1" value="yes"> Yes</option>
																<option point="10" value="no"> No</option>
															</select>
														</div>
		                                            </div><!--Potential pest control problems-->
	                                            </div>
	                                       
                                            
                                             <script>
											 <?php 
													echo '$("#f10_cultivating'.$id.'").val("'.@$crops_arr[$i]['f10_cultivating'].'");';
													echo '$("#f10_variety'.$id.'").val("'.@$crops_arr[$i]['f10_variety'].'");';
													echo '$("#f10_stage'.$id.'").val("'.@$crops_arr[$i]['f10_stage'].'");';
													echo '$("#f10_expected'.$id.'").val("'.@$crops_arr[$i]['f10_expected'].'");';
													echo '$("#f10_expectedprice'.$id.'").val("'.@$crops_arr[$i]['f10_expectedprice'].'");';
													echo '$("#f10_expectedincome'.$id.'").val("'.@$crops_arr[$i]['f10_expectedincome'].'");';
													echo '$("#f10_diseases'.$id.'").val("'.@$crops_arr[$i]['f10_diseases'].'");';
													echo '$("#f10_pest'.$id.'").val("'.@$crops_arr[$i]['f10_pest'].'");';
													echo 'calTotal();';
													echo 'contentCount='.$id.';';
											 ?>
											 </script>
												<?php 
											 }
											 ?>
											 </div>

											<div style="padding:5px;border:1px solid #d6d6d6;margin:5px;">
											    <a class="btn btn-sm btn-warning addCrop">Add New</a>
											    <a class="btn btn-sm btn-danger pull-right removeCrop" data-toggle="modal" data-target="#confirm_box" data-backdrop="static">Remove</a>
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
      
 <div class="modal fade" id="confirm_box" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Remove Confirmation</h4>
      </div>
      <div class="modal-body">
        <p >Are you sure want to remove crop?</p>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-primary removeCrop_btn"  data-dismiss="modal">Yes</button>&nbsp;
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
      </div>
     </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

      <script type="text/javascript">
    	
		    $('#frm_crop_detail').on('submit', function(e) {
			e.preventDefault();
			if ($('#frm_crop_detail').valid())
			{
				loading_show();	
				$.ajax({
						type: "POST",
						url: "action_pages/action_frm10.php",
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
								window.location.href="acrefinfrm_11.php?pag=farmers&fm_id=<?php echo $fm_id; ?>";
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
		   
		   
		function get_variety(crop_id,no_of_crop)
		{
			
			$('#f10_variety'+no_of_crop).html("");
			
			var sendInfo 	= {"crop_id":crop_id,"get_variety":1};
			var crop_data 	= JSON.stringify(sendInfo);	
			
				$.ajax({
					url: "action_pages/action_frm10.php?",
					type: "POST",
					data: crop_data,
					contentType: "application/json; charset=utf-8",						
					async:true,					
					success: function(response) 
					{		
						data = JSON.parse(response);
						if(data.Success == "Success") 
						{	
							$('#f10_variety'+no_of_crop).html(data.resp);
						} 
						else
						{
																			
						}
					},
					error: function (request, status, error) 
					{
						$("#model_body").html('<span style="style="color:#F00;">'+request.responseText+'</span>');							
						$('#error_model').modal('toggle');						
						loading_hide();
					},
					complete: function()
					{
						loading_hide();
						$("#model_body").html('<span style="style="color:#F00;">'+request.responseText+'</span>');
			            $('#error_model').modal('toggle');
					}
				});			
		}
		   
		$(document).ready(function(){
			$('#f9_owner').val('<?= @$data['f9_owner']; ?>');
			$('#f9_soil_tested').val('<?= @$data['f9_soil_tested']; ?>');
			$('#f9_soil_type').val('<?= @$data['f9_soil_type']; ?>');
			calTotal();
			
			var f9_owner = $('#f9_owner').val();
			
			if(f9_owner=="Leased")
			{
				$('#lease_year').show('swing');
				$('#contract_year').hide('swing');
			}
			else if(f9_owner == 'Contracted')
			{
				$('#lease_year').hide('swing');
				$('#contract_year').show('swing');
			}
			else
			{
				$('#lease_year').hide('swing');
				$('#contract_year').hide('swing');
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



                                        
                                        