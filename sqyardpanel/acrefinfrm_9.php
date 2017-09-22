<?php 
include('access1.php'); 
include('connection.php');
$table ='tbl_land_details';
$fm_id = (isset($_REQUEST['fm_id'])?$_REQUEST['fm_id']:"");

if($fm_id!="" && isset($_SESSION['acrefin_user']) && $_SESSION['acrefin_user']!="")
{  
  $no_of_land=1;
  $land_arr  = array();
  $result = lookup_value('tbl_land_details',array(),array("fm_id"=>$fm_id),array(),array(),array());
  if($result)
  {
	  $num    = mysqli_num_rows($result);
	  if($num !=0)
	  {
		  
		  while($row     = mysqli_fetch_array($result))
		  {
			  array_push($land_arr ,$row);
		  }
		 $no_of_land = sizeof($land_arr);
		  
	}
  }
?>
<!DOCTYPE html>
<!--[if IE 7]>                  <html class="ie7 no-js" lang="en">     <![endif]-->
<!--[if lte IE 8]>              <html class="ie8 no-js" lang="en">     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" lang="en">  <!--<![endif]-->

<head>

	<title> Land Details  </title>
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
   
    <script>

		var g_total  = 0;
		contentCount = <?php echo $no_of_land; ?>;

		function cal_land_size_pt(x)
		{
			if(x >= 0.25 && x <= 2)
			{
			  return 3;
			}
			else if(x >= 2.1 && x <= 5)
			{
			  return 5;
			}
			else if(x >= 5.1 && x <= 7)
			{
			  return 7;
			}
			else if(x >= 7.1 && x <= 10)
			{
			  return 9;
			}
			else if(x >= 10.1)
			{
			  return 10;
			}
			else
			{
				return 0;
			}
		}

	    function cal_soil_type_pt(x)
		{
			if(x=="Alluvial Soil")
			{
			  return 10;
			}
			else if(x=="Black Soil")
			{
			  return 9;
			}
			else if(x =="Red Soil")
			{
			  return 8;
			}
			else if(x =="Laterite Soil")
			{
			  return 5;
			}
			else if(x =="Mountain Soil" || x=="Peat")
			{
			  return 4;
			} 
			else if(x=="Desert Soil")
			{
				return 3;
			}
			else
			{
				return 0;
			}
		}

		function calTotal()
		{
			var no_of_points        = 2;
			var f9_land_size_tpt    = 0;
			var f9_soil_tested_pt   = 0;
			var f9_soil_type_tpt    = 0;
		
			for(var i=1; i<=contentCount; i++)
			{
				var f9_land_size     =  $('#f9_land_size'+i).val() || 0;
			
				var f9_land_size_pt  = cal_land_size_pt(f9_land_size);
				
				f9_land_size_tpt  += f9_land_size_pt;
				
				var f9_soil_tested  = $('#f9_soil_tested'+i).val() || 'no';
				
				if(f9_soil_tested=='yes')
				{
					f9_soil_tested_pt +=10;
					no_of_points        = 3;
				}
				else
				{
					f9_soil_tested_pt +=0;
				}
				
				var f9_soil_type = $('#f9_soil_type'+i).val() || ' ';
			
				var f9_soil_type_pt = cal_soil_type_pt(f9_soil_type);
				f9_soil_type_tpt    +=f9_soil_type_pt ;
			}
			
			
			g_total =f9_land_size_tpt + f9_soil_tested_pt + f9_soil_type_tpt ;
			document.getElementById('g_total').innerHTML=g_total;
			 
			var f9_pt =g_total/(no_of_points*contentCount) ;
			f9_pt     =f9_pt.toFixed(2);
			$('#f9_points').val(f9_pt);
			$('#f9_pt').html(f9_pt);
			$('#no_of_land').val(contentCount);
			
			
			if(contentCount > 1)
			{
				$('#removeLoanType').show('swing');
			}

		//	$('[id^="f9_state"]').change();
		}

      
	    function addMoreLand(remove)
		{
		
			if(remove==1)
			{
				
				//$('#land'+contentCount).remove();
				 $('#lands').find('#land'+contentCount).slideUp("slow");
				contentCount    = contentCount - 1
				if(contentCount==1)
				{
					$('#removeLoanType').hide('swing');
				}
				calTotal();
				return false;
				
			}
			
			contentCount    = contentCount + 1
			loan ='<div id="land'+contentCount+'" style="padding:5px;border:1px solid #d6d6d6;margin:5px;display:none">';
			loan =loan + ' <div  style="padding: 5px; margin: 5px;"><h2>Farm Land '+contentCount+' Details</h2>'
			loan =loan +'<input type="hidden" name="id[]" id="id" value="">';
			loan = loan +'<div class="control-group"><label for="text" class="control-label" style="margin-top:10px">Size in Acres<span style="color:#F00">*</span></label><div class="controls"><input placeholder="Size in Acres" type="text" onKeyPress="return numsonly(event);" id="f9_land_size'+contentCount+'" name="f9_land_size'+contentCount+'" class="input-xlarge" value="" data-rule-required="true" onChange="calTotal()"></div></div><!--Fixed Monthly Income-->';
	
				loan = loan +'<div class="control-group"><label for="text" class="control-label" style="margin-top:10px">Ownership<span style="color:#F00">*</span></label><div class="controls"><select id="f9_owner'+contentCount+'" name="f9_owner'+contentCount+'" onChange="ownership('+contentCount+',this.value)" class="input-xlarge" data-rule-required="true"><option value="" disabled selected> Select here</option><option value="Owned">Owned</option><option value="Ancestral">Ancestral</option><option value="Leased">Leased</option><option value="Contracted">Contracted</option></select></div></div><!--Owner-->';
						
				loan = loan +'<div class="control-group" id="lease_year'+contentCount+'" style="display:none"><label for="text" class="control-label" style="margin-top:10px">No. of Lease year<span style="color:#F00">*</span></label><div class="controls"><input value="" type="text" class="input-xlarge ui-wizard-content v_number" placeholder="Lease Year" name="f9_lease_year'+contentCount+'" id="f9_lease_year'+contentCount+'" data-rule-required="true"    maxlength="10"></div></div>';
						
						
				loan = loan +'<div class="control-group" id="contract_year'+contentCount+'" style="display:none"><label for="text" class="control-label" style="margin-top:10px"> No. of Contract year<span style="color:#F00">*</span></label><div class="controls"><input type="text" class="input-xlarge ui-wizard-content" placeholder="Contract Year" name="f9_contract_year'+contentCount+'" id="f9_contract_year'+contentCount+'" value="" data-rule-required="true" onKeyPress="return numsonly(event);"   data-rule-maxlength="10"></div></div>';
						
				loan = loan +'		<h3>Land Address</h3><div class="control-group"><label for="text" class="control-label" style="margin-top:10px">State<span style="color:#F00">*</span></label><div class="controls"><select name="f9_state'+contentCount+'" id="f9_state'+contentCount+'" data-rule-required="true" class="input-xlarge"><option value="">Select State</option><option value="1">TELANGANA</option></select></div></div> ';
						
				loan = loan +'<div class="control-group"><label for="text" class="control-label" style="margin-top:10px">District<span style="color:#F00">*</span></label><div class="controls"><select name="f9_district'+contentCount+'" id="f9_district'+contentCount+'" data-rule-required="true" class="input-xlarge"><option value="">Select District</option></select></div></div>';
						
				loan = loan +'<div class="control-group"><label for="text" class="control-label" style="margin-top:10px">Taluka<span style="color:#F00">*</span></label><div class="controls"><select name="f9_taluka'+contentCount+'" id="f9_taluka'+contentCount+'" data-rule-required="true" class="input-xlarge"><option value="">Select Taluka</option></select></div></div> ';
						
				loan = loan +'<div class="control-group"><label for="text" class="control-label" style="margin-top:10px">Village<span style="color:#F00">*</span></label><div class="controls"><select name="f9_vilage'+contentCount+'" id="f9_vilage'+contentCount+'" data-rule-required="true" class="input-xlarge"><option value="">Select Village</option></select></div></div> ';
						
						
				loan = loan +'<div class="control-group"><label for="text" class="control-label" style="margin-top:10px">Survey Number<span style="color:#F00">*</span></label><div class="controls"><select name="f9_survey_number'+contentCount+'" id="f9_survey_number'+contentCount+'" data-rule-required="true" class="input-xlarge"><option value="">Select Survey Number</option><option value="60">60</option></select></div></div>';
						 
						
				loan = loan +'<div class="control-group"><label for="text" class="control-label" style="margin-top:10px">Pincode<span style="color:#F00">*</span></label><div class="controls"><input type="text" class="input-xlarge ui-wizard-content" placeholder="Pincode" name="f9_pincode'+contentCount+'" id="f9_pincode'+contentCount+'" value="" data-rule-required="true" onKeyPress="return numsonly(event);" minlength="6" maxlength="6"></div></div>';
						
				loan = loan +'<div class="control-group"><label for="text" class="control-label" style="margin-top:10px">Have you had the soil tested in your land?<span style="color:#F00">*</span></label><div class="controls"><select id="f9_soil_tested'+contentCount+'" name="f9_soil_tested'+contentCount+'" class="input-xlarge" data-rule-required="true" onChange="calTotal()"><option value="" disabled selected> Select here</option><option value="yes">Yes</option><option value="no">no</option></select></div></div><!--f9_soil_tested-->';
						
				loan = loan +'<div class="control-group"><label for="text" class="control-label" style="margin-top:10px">Type of Soil<span style="color:#F00">*</span></label><div class="controls"><select id="f9_soil_type'+contentCount+'" name="f9_soil_type'+contentCount+'" class="input-xlarge" data-rule-required="true" onChange="calTotal()"><option value="" disabled selected> Select here</option><option value="Alluvial Soil">Alluvial Soil</option><option value="Black Soil">Black Soil</option><option value="Red Soil">Red Soil</option><option value="Mountain Soil">Mountain Soil</option><option value="Peat">Peat</option><option value="Laterite Soil">Laterite Soil</option><option value="Desert Soil">Desert Soil</option></select></div></div><!--f9_soil_tested--></div></div>';
						
				
			 // $("#lands").append(loan).slideDown('slow');
			  $('#lands').append(loan).find('#land'+contentCount).slideDown("slow");
			  
			 
			  if(contentCount>=2)
			  {
				  $('#removeLoanType').show('swing');
			  }
		}
	  
         function ownership(id,value)
		 {
			if(value == 'Leased')
		    {
				$('#lease_year'+id).show('swing');
				$('#contract_year'+id).hide('swing');
				$('#f9_contract_year'+id).val("");
			}
			else if(value == 'Contracted')
			{
				$('#lease_year'+id).hide('swing');
				$('#contract_year'+id).show('swing');
				$('#f9_lease_year'+id).val("");
			}
			else
			{
				$('#lease_year'+id).hide('swing');
				$('#contract_year'+id).hide('swing');
				$('#f9_lease_year'+id).val("");
				$('#f9_contract_year'+id).val("");
			}
		 }
	   

		function numsonly(e)
		 {
  			  var unicode=e.charCode? e.charCode : e.keyCode
			 
			  if (unicode !=8 && unicode !=32 &&  unicode !=46)
			  {  // unicode<48||unicode>57 &&
     		  if ( unicode<48||unicode>57)  //if not a number
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
								Land Details     
								</h3>
                                 
							</div>
                            <div class="box-content nopadding">
								<form enctype="multipart/form-data" method="POST" class='form-horizontal form-wizard wizard-vertical' id="frm_land_detail">
									<div class="step" id="Step1">
										<?php include('side_menu.php'); ?>
                                        
                                         <input type="hidden" name="add_land_detail" value="1">
                                         <input type="hidden" value="<?php echo $fm_id ?>" name="fm_id">
                                         <input type="hidden" name="fm_caid" value="<?php echo $_SESSION['fm_caid']; ?>">
                                         <input type="hidden" name="f9_points" value="" id="f9_points">
                                         <input type="hidden" name="no_of_land" value="" id="no_of_land">
                                    
										<div class="form-content">
											
                                          
                                               
                                            
                                                <div id="lands">
                                                
                                                <?php 
												  for($i=0;$i<$no_of_land;$i++)
											        { 
											         $id =$i+1;
												?>
											  <div id="land<?php echo $id; ?>" style="padding:5px;border:1px solid #d6d6d6;margin:5px;">
                                              <div id="loan_detail" style=" padding: 10px; margin: 5px;">  
                                                
                                                <input type="hidden" name="id[]" id="id" value="<?php echo @$land_arr[$i]['id']; ?>">
                                                <h2>Farm Land <?php echo $id; ?> Details</h2>
                                            	<div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Size in Acres<span style="color:#F00">*</span></label>
													<div class="controls">
														<input placeholder="Size in Acres" type="text" onKeyPress="return numsonly(event);" id="f9_land_size<?php echo $id; ?>" name="f9_land_size<?php echo $id; ?>" class="input-xlarge" value="" data-rule-required="true" onChange="calTotal()">
													</div>
												</div><!--Fixed Monthly Income-->

												<div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Ownership
													<span style="color:#F00">*</span></label>
													<div class="controls">
														<select id="f9_owner<?php echo $id; ?>" name="f9_owner<?php echo $id; ?>" onChange="ownership(<?php echo $id; ?>,this.value)" class="input-xlarge" data-rule-required="true">
															<option value="" disabled selected> Select here</option>
															<option value="Owned">Owned</option>
															<option value="Ancestral">Ancestral</option>
                                                            <option value="Leased">Leased</option>
															<option value="Contracted">Contracted</option>
														</select>
													</div>
	                                            </div><!--Owner-->
                                                
                                                <div class="control-group" id="lease_year<?php echo $id; ?>" style="display:none">
													<label for="text" class="control-label" style="margin-top:10px">No. of Lease year
													<span style="color:#F00">*</span></label>
													<div class="controls">
														 <input value="" type="text" class="input-xlarge ui-wizard-content v_number" placeholder="Lease Year" name="f9_lease_year<?php echo $id; ?>" id="f9_lease_year<?php echo $id; ?>" data-rule-required="true"    maxlength="10">
	                                                </div>
	                                            </div>
                                                
                                                
                                                <div class="control-group" id="contract_year<?php echo $id; ?>" style="display:none">
													<label for="text" class="control-label" style="margin-top:10px"> No. of Contract year
													<span style="color:#F00">*</span></label>
													<div class="controls">
														 <input type="text" class="input-xlarge ui-wizard-content" placeholder="Contract Year" name="f9_contract_year<?php echo $id; ?>" id="f9_contract_year<?php echo $id; ?>" value="" data-rule-required="true" onKeyPress="return numsonly(event);"   data-rule-maxlength="10">
	                                               </div>
	                                            </div>
                                                
                                                <h3>Land Address</h3>
                                                <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">State<span style="color:#F00">*</span></label>
													<div class="controls">
                                                    <select name="f9_state<?php echo $id; ?>" id="f9_state<?php echo $id; ?>" data-rule-required="true" class="input-xlarge">
                                                    <option value="">Select State</option>
                                                    <option value="1">TELANGANA</option>
                                                    </select>
													</div>
	                                            </div> 
                                                
                                                <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">District
													<span style="color:#F00">*</span></label>
													<div class="controls">
                                                    <select name="f9_district<?php echo $id; ?>" id="f9_district<?php echo $id; ?>" data-rule-required="true" class="input-xlarge">
                                                    <option value="">Select District</option>
                                                    <?php

                                                    if(isset($land_arr[$i]['f9_state']))
                                                    {
         												$result = lookup_value('tbl_district',array(),array("dt_stid"=>$land_arr[$i]['f9_state']),array(),array(),array());

														if($result)
														{
															while ($row = mysqli_fetch_array($result))
															{
																echo '<option value="'.$row['id'].'">'.strtoupper($row['dt_name']).'</option>';
															}
														}
                                                    }
                                                    ?>

                                                    </select>
													</div>
	                                            </div> 
                                                
                                                <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Taluka
													<span style="color:#F00">*</span></label>
													<div class="controls">
                                                    <select name="f9_taluka<?php echo $id; ?>" id="f9_taluka<?php echo $id; ?>" data-rule-required="true" class="input-xlarge">
                                                    <option value="">Select Taluka</option>
                                                    <?php

                                                    if(isset($land_arr[$i]['f9_district']))
                                                    {   
         												$tal_result = lookup_value('tbl_taluka',array(),array("tk_dtid"=>$land_arr[$i]['f9_district']),array(),array(),array());

														if($tal_result)
														{
															while ($tal_row = mysqli_fetch_array($tal_result) ) {
																echo '<option value="'.$tal_row['id'].'"';
 																if($tal_row['id']==$land_arr[$i]['f9_taluka'])
 																{
 																	echo ' selected ';
 																}
																echo '>'.strtoupper($tal_row['tk_name']).'</option>';
															}
														}
                                                    }
                                                    ?>
                                                    </select>
													</div>
	                                            </div> 
                                                
                                                <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Village
													<span style="color:#F00">*</span></label>
													<div class="controls">
                                                    <select name="f9_vilage<?php echo $id; ?>" id="f9_vilage<?php echo $id; ?>" data-rule-required="true" class="input-xlarge">
                                                    <option value="">Select Village</option>
                                                    <?php

                                                    if(isset($land_arr[$i]['f9_taluka']))
                                                    {   
         												$result = lookup_value('tbl_village',array(),array("vl_tkid"=>$land_arr[$i]['f9_taluka']),array(),array(),array());

														if($result)
														{
															while ($row = mysqli_fetch_array($result) ) {
																echo '<option value="'.$row['id'].'">'.strtoupper($row['vl_name']).'</option>';
															}
														}
                                                    }
                                                    ?>
                                                    </select>
													</div>
	                                            </div> 
                                                
                                                
                                                <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Survey Number
													<span style="color:#F00">*</span></label>
													<div class="controls">
                                                    <!--<select name="f9_survey_number<?php echo $id; ?>" id="f9_survey_number<?php echo $id; ?>" data-rule-required="true" class="input-xlarge">
                                                    <option value="">Select Survey Number</option>
                                                    <option value="60">60</option>
                                                    </select> -->
                                                        
                                                        <input type="text" class="input-xlarge ui-wizard-content" placeholder="Survey Number" name="f9_survey_number<?php echo $id; ?>" id="f9_survey_number<?php echo $id; ?>" value="" data-rule-required="true"  maxlength="10">
                                                    
													</div>
	                                            </div>
                                                 
                                                
                                                <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Pincode
													<span style="color:#F00">*</span></label>
													<div class="controls">
														 <input type="text" class="input-xlarge ui-wizard-content" placeholder="Pincode" name="f9_pincode<?php echo $id; ?>" id="f9_pincode<?php echo $id; ?>" value="" data-rule-required="true" onKeyPress="return numsonly(event);" minlength="6" maxlength="6">
	                                                 </div>
	                                            </div>
                                                
                                                <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Have you had the soil tested in your land?
													<span style="color:#F00">*</span></label>
													<div class="controls">
														<select id="f9_soil_tested<?php echo $id; ?>" name="f9_soil_tested<?php echo $id; ?>" class="input-xlarge" data-rule-required="true" onChange="calTotal()">
															<option value="" disabled selected> Select here</option>
															<option value="yes">Yes</option>
															<option value="no">no</option>
                                                         </select>
													</div>
	                                            </div><!--f9_soil_tested-->
                                                
                                                <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Type of Soil
													<span style="color:#F00">*</span></label>
													<div class="controls">
														<select id="f9_soil_type<?php echo $id; ?>" name="f9_soil_type<?php echo $id; ?>" class="input-xlarge" data-rule-required="true" onChange="calTotal()">
															<option value="" disabled selected> Select here</option>
															<option value="Alluvial Soil">Alluvial Soil</option>
															<option value="Black Soil">Black Soil</option>
                                                            <option value="Red Soil">Red Soil</option>
															<option value="Mountain Soil">Mountain Soil</option>
                                                            <option value="Peat">Peat</option>
															<option value="Laterite Soil">Laterite Soil</option>
                                                            <option value="Desert Soil">Desert Soil</option>
                                                         </select>
													</div>
	                                            </div><!--f9_soil_tested-->
                                                
                                                <script>
												 <?php


														echo '$("#f9_land_size'.$id.'").val("'.@$land_arr[$i]['f9_land_size'].'");';
														echo '$("#f9_owner'.$id.'").val("'.@$land_arr[$i]['f9_owner'].'");';
														echo '$("#f9_lease_year'.$id.'").val("'.@$land_arr[$i]['f9_lease_year'].'");';
														echo '$("#f9_contract_year'.$id.'").val("'.@$land_arr[$i]['f9_contract_year'].'");';
														echo '$("#f9_survey_number'.$id.'").val("'.@$land_arr[$i]['f9_survey_number'].'");';
														
														echo '$("#f9_vilage'.$id.'").val("'.@$land_arr[$i]['f9_vilage'].'");';
														echo '$("#f9_taluka'.$id.'").val("'.@$land_arr[$i]['f9_taluka'].'");';
														echo '$("#f9_district'.$id.'").val("'.@$land_arr[$i]['f9_district'].'");';
														echo '$("#f9_state'.$id.'").val("'.@$land_arr[$i]['f9_state'].'");';
														
														echo '$("#f9_pincode'.$id.'").val("'.@$land_arr[$i]['f9_pincode'].'");';
														echo '$("#f9_soil_tested'.$id.'").val("'.@$land_arr[$i]['f9_soil_tested'].'");';
														echo '$("#f9_soil_type'.$id.'").val("'.@$land_arr[$i]['f9_soil_type'].'");';
														echo '$("#f9_points'.$id.'").val("'.@$land_arr[$i]['f9_points'].'");';
														
														echo 'var f9_districts = [];';
														echo 'var f9_talukas = [];';
														echo 'var f9_villages =[];';
														// echo 'var f9_state'.$id.'= '.@$land_arr[$i]['f9_state'].';';
														echo 'f9_districts['.$id.'] = "'.@$land_arr[$i]['f9_district'].'";';
														echo 'f9_talukas['.$id.']= "'.@$land_arr[$i]['f9_taluka'].'";';
														echo ' f9_villages['.$id.']= "'.@$land_arr[$i]['f9_vilage'].'";';
														
														// echo '$("#f9_vilage'.$id.'").html("'.@$land_arr[$i]['f9_vilage'].'");';
														// echo '$("#f9_taluka'.$id.'").html("'.@$land_arr[$i]['f9_taluka'].'");';
														// echo '$("#f9_district'.$id.'").html("'.@$land_arr[$i]['f9_district'].'");';
														// echo '$("#f9_state'.$id.'").text("'.@$land_arr[$i]['f9_state'].'");';
														
														echo '
														    var f9_owner =$("#f9_owner'.$id.'").val();
															console.log(f9_owner);
														    if(f9_owner=="Leased")
															{
																$("#lease_year'.$id.'").show("swing");
																$("#contract_year'.$id.'").hide("swing");
															}
															else if(f9_owner == "Contracted")
															{
																$("#lease_year'.$id.'").hide("swing");
																$("#contract_year'.$id.'").show("swing");
															}
															else
															{
																$("#lease_year'.$id.'").hide("swing");
																$("#contract_year'.$id.'").hide("swing");
															}';
												 ?>
											 </script>
                                                 </div>
                                                   </div><!--loan_detail-->
                                                <?php } ?>
                                                
                                                </div><!--lands end here-->
                                                
                                                
                                             <div  style="padding:5px;border:1px solid #d6d6d6;margin:5px;"> 
                                             <input type="button" class="btn btn-warning " value="Add New" onClick="addMoreLand();" id="addLoanType"/>
                                             <input type="button" style="display:none; float:right" class="btn btn-danger " value="Remove" data-toggle="modal" data-target="#confirm_box" data-backdrop="static" id="removeLoanType"/>
                                             </div>
                                             
                                             
                                                
                                          
                                        
                                           
                                        
	                                        <div class="form-actions">
												<input type="reset" class="btn" value="Reset" id="Reset">
                                                
												<input type="submit" class="btn btn-primary" value="Save" id="save">
                                                
                                                
	                                        </div>
	                                    </div>
	                                </div>
								</form>
                                <!--<input type="text" id="hid_total" name="hid_total" value="0">-->
                            <div id="g_total"></div>
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
        <p >Are you sure want to remove land?</p>
        
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-primary" onclick="addMoreLand(1);" data-dismiss="modal">Yes</button>&nbsp;
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
      </div>
     </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

     <script type="text/javascript">
    	
		$('#frm_land_detail').on('submit', function(e) {
			e.preventDefault();
			if ($('#frm_land_detail').valid())
			{
				loading_show();	
				$.ajax({
						type: "POST",
						url: "action_pages/action_frm9.php",
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
							    window.location.href="acrefinfrm_10.php?pag=farmers&fm_id=<?php echo $fm_id; ?>";
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

			$('body').on('change', '[id^="f9_state"]', function(){
				var _no = $(this).attr('id').substring(8);

				$.ajax({
					type: "POST",
					url: "action_pages/_districts.php",
					data: {'dt_stid' : $(this).val()},
					success: function(data)
					{
						$('#f9_district'+_no).html(data);
						$('#f9_district'+_no).val(f9_districts[_no]);
						$('#f9_district'+_no).trigger('change');
						
						$('#f9_taluka'+_no).val(f9_talukas[_no]);
						$('#f9_taluka'+_no).trigger('change');
					
                        
					},
					error: function (request, status, error)
					{
						//loading_hide();	
					}
				});
			});
			

			$('body').on('change', '[id^="f9_district"]', function(){
				var _no = $(this).attr('id').substring(11);
				$.ajax({
					type: "POST",
					url: "action_pages/_talukas.php",
					data: {'tk_dtid' : $(this).val()},
					success: function(data)
					{
						$('#f9_taluka'+_no).html(data);
						$('#f9_taluka'+_no).val(f9_talukas[_no]);
						$('#f9_taluka'+_no).trigger('change');
					},
					error: function (request, status, error)
					{
						//loading_hide();	
					}
				});
			});


			$('body').on('change', '[id^="f9_taluka"]', function(){
				var _no = $(this).attr('id').substring(9);
				$.ajax({
					type: "POST",
					url: "action_pages/_villages.php",
					data: {'vl_tkid' : $(this).val()},
					success: function(data)
					{
						$('#f9_vilage'+_no).html(data);
     
						$('#f9_vilage'+_no).val(f9_villages[_no]);
					},
					error: function (request, status, error)
					{
						//loading_hide();	
					}
				});
			});
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


