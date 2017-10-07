<?php 
include('access1.php'); 
include('connection.php');
$fm_id = (isset($_REQUEST['fm_id'])?$_REQUEST['fm_id']:"");
if($fm_id!="" && isset($_SESSION['acrefin_user']) && $_SESSION['acrefin_user']!="")
{
		$no_of_crops=1;
		$crops_arr  = array();
		$result = lookup_value('tbl_yield_details',array(),array("fm_id"=>$fm_id),array(),array(),array());
		if($result)
		{
		
			while($row = mysqli_fetch_array($result))
			{
			  array_push($crops_arr ,$row);
			}
			$no_of_crops = sizeof($crops_arr);
		}
?>
<!DOCTYPE html>
<!--[if IE 7]>                  <html class="ie7 no-js" lang="en">     <![endif]-->
<!--[if lte IE 8]>              <html class="ie8 no-js" lang="en">     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" lang="en">  <!--<![endif]-->

<head>

	<title> Previous Year Yield Details     </title>
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
            
       
		function calTotal(){
			var diseases    =0;
			var fertilizers =0;
			var achieved 	=0;
			var income 		=0;

			
			
			for(var i=1; i<=contentCount; i++){
				diseases    += parseInt($('option:selected','#f11_diseases'+i).attr('point')) || 0;
				fertilizers += parseInt($('option:selected','#f11_fertilizers'+i).attr('point')) || 0;
				achieved_pt 	= parseInt($('#f11_achieved'+i).val()) || 0;
				income_pt 		= parseInt($('#f11_income'+i).val()) || 0;

				achieved += convertAchievedToPoint(achieved_pt);
				income   += convertIncomeToPoint(income_pt);
			}
		
            g_total = diseases + fertilizers + achieved + income ;
			document.getElementById('g_total').innerHTML=g_total;
			f11_pt     = g_total/(contentCount * 4)
			f11_pt     = f11_pt.toFixed(2);
			$('#f11_points').val(f11_pt);
			$('#f11_pt').html(f11_pt);
			
			$('#no_of_yield').val(contentCount);
			if(contentCount==1)
			 {
				 $('.removeCrop').hide('swing');
			 }
		}


		function convertAchievedToPoint(x){
			if(x >= 0 && x <= 2)
			{
			  return 3;
			}
			else if(x >= 3 && x <= 4)
			{
			  return 5;
			}
			else if(x >= 5 && x <= 6)
			{
			  return 7;
			}
			/*else if(x >= 7 && x <= 10)
			{
			  return 10;
			}*/
			else if(x >= 7)
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
			else if(x >= 25001 && x <= 75000)
			{
			  return 5;
			}
			else if(x >= 75001 && x <= 150000)
			{
			  return 7;
			}
			else if(x >= 150001 && x <= 300000)
			{
			  return 9;
			}
			else if(x >= 300000 && x <= 1000000)
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
			var html = `  <input type="hidden" name="id[]" id="id" value="">
			               <div id="crop`+contentCount+`" style="padding:5px;border:1px solid #d6d6d6;margin:5px; display:none" >
		                  	<h3>Crop `+contentCount+`</h3>
							<div class="control-group">
								<label for="text" class="control-label" style="margin-top:10px">Yield Achieved Last Year In tonnes <span style="color:#F00">*</span> </label>
								<div class="controls">
                                    <input type="text" id="f11_achieved`+contentCount+`" name="f11_achieved`+contentCount+`" class="input-xlarge" data-rule-number="true" onchange="calTotal()" data-rule-required="true" placeholder="Yield Achieved">
								</div>
                            </div><!--Yield Achieved Last Year  -->

                            <div class="control-group">
								<label for="text" class="control-label" style="margin-top:10px">Income Achieved Last Year in Rs. <span style="color:#F00">*</span></label>
								<div class="controls">
                                    <input type="text" id="f11_income`+contentCount+`" name="f11_income`+contentCount+`" class="input-xlarge" data-rule-number="true" onchange="calTotal()" data-rule-required="true" placeholder="Income Achieved">
								</div>
                            </div><!--Income Achieved Last Year  -->

                            <div class="control-group">
								<label for="text" class="control-label" style="margin-top:10px">Any Pest or Diseases That The Yield Was Prone To? <span style="color:#F00">*</span></label>
								<div class="controls">
                                    <select id="f11_diseases`+contentCount+`" name="f11_diseases`+contentCount+`" class="input-xlarge" data-rule-required="true" onchange="calTotal()">
										<option value="" disabled selected> Select here</option>
										<option point="2" value="Land Preparation"> Yes</option>
										<option point="10" value="Seed Selection"> No</option>
									</select>
								</div>
                            </div><!--Any pest or diseases that the yield was prone to?-->
                            
                            <div class="control-group">
								<label for="text" class="control-label" style="margin-top:10px">What Kind Of Fertilizers Did You Use <span style="color:#F00">*</span></label>
								<div class="controls">
                                    <select id="f11_fertilizers`+contentCount+`" name="f11_fertilizers`+contentCount+`" class="input-xlarge" data-rule-required="true" onchange="calTotal()">
										<option value="" disabled selected> Select here</option>
										<option point="5" value="inorganic"> Inorganic</option>
										<option point="7" value="organic"> Organic</option>
									</select>
								</div>
                            </div><!--What kind of Fertilizers did you use -->
                            
                        </div>`;

                 if(contentCount>1)
				 {
					 $('.removeCrop').show('swing');
				 }

				$('#formContent').append(html).find('#crop'+contentCount).slideDown("slow");
		}

		function removeContent(){
			if(contentCount > 1){
				$('#formContent').find('#crop'+contentCount).slideUp("slow", function(){
					$(this).remove();
					contentCount--;
					if(contentCount==1)
					 {
						 $('.removeCrop').hide('swing');
					 }
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
			
			calTotal();
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
								Previous Year Yield Details
								</h3>
                                 
							</div>
                            <div class="box-content nopadding">
								<form enctype="multipart/form-data" method="POST" class='form-horizontal form-wizard wizard-vertical' id="frm_yield_detail">
									<div class="step" id="Step1">
										<?php include('side_menu.php'); ?>
										<div class="form-content" >
                                             <input type="hidden" name="add_yield_detail" value="1">
                                             <input type="hidden" value="<?php echo $fm_id ?>" name="fm_id">
                                             <input type="hidden" name="fm_caid" value="<?php echo $_SESSION['fm_caid']; ?>">
                                             <input type="hidden" name="f11_points" id="f11_points" value="">
                                             <input type="hidden" name="no_of_yield" id="no_of_yield" value="1">
                                             <div id="formContent">
                                             <?php 
											 
											 for($i=0;$i<$no_of_crops;$i++)
											 { 
											   $id =$i+1;
											   
											 ?>
                                            	<div id="crop<?php echo $id; ?>" style="padding:5px;border:1px solid #d6d6d6;margin:5px;">
								                  	<input type="hidden" name="id[]" id="id" value="<?php echo @$crops_arr[$i]['id']; ?>">    
                                                <h3>Crop <?php echo $id; ?></h3>
													
                                                    <div class="control-group">
														<label for="text" class="control-label" style="margin-top:10px">Yield Achieved Last Year In tonnes <span style="color:#F00">*</span></label>
														<div class="controls">
		                                                    <input type="text" id="f11_achieved<?php echo $id; ?>" name="f11_achieved<?php echo $id; ?>" class="input-xlarge"  onKeyPress="return numsonly(event);" maxlength="10" data-rule-required="true" onchange="calTotal()" placeholder="Yield Achieved">
														</div>
		                                            </div>	<!--Yield Achieved Last Year  -->

		                                            <div class="control-group">
														<label for="text" class="control-label" style="margin-top:10px">Income Achieved Last Year in Rs. <span style="color:#F00">*</span></label>
														<div class="controls">
		                                                    <input type="text" id="f11_income<?php echo $id; ?>" name="f11_income<?php echo $id; ?>" class="input-xlarge" onKeyPress="return numsonly(event);" maxlength="10" data-rule-required="true" onchange="calTotal()" placeholder="Income Achieved">
														</div>
		                                            </div><!--Income Achieved Last Year  -->

		                                            <div class="control-group">
														<label for="text" class="control-label" style="margin-top:10px">Any Pest or Diseases That The Yield Was Prone To? <span style="color:#F00">*</span></label>
														<div class="controls">
		                                                    <select id="f11_diseases<?php echo $id; ?>" name="f11_diseases<?php echo $id; ?>" class="input-xlarge" data-rule-required="true" onchange="calTotal()">
																<option value="" disabled selected> Select here</option>
																<option point="2" value="Land Preparation"> Yes</option>
																<option point="10" value="Seed Selection"> No</option>
															</select>
														</div>
		                                            </div><!--Any pest or diseases that the yield was prone to?-->
		                                            
		                                            <div class="control-group">
														<label for="text" class="control-label" style="margin-top:10px">What Kind Of Fertilizers Did You Use <span style="color:#F00">*</span></label>
														<div class="controls">
		                                                    <select id="f11_fertilizers<?php echo $id; ?>" name="f11_fertilizers<?php echo $id; ?>" class="input-xlarge" data-rule-required="true" onchange="calTotal()">
																<option value="" disabled selected> Select here</option>
																<option point="5" value="inorganic"> Inorganic</option>
																<option point="7" value="organic"> Organic</option>
															</select>
														</div>
		                                            </div><!--What kind of Fertilizers did you use -->
		                                            
	                                            </div>
	                                       
                                            
                                            <script>
											 <?php 
													echo '$("#f11_achieved'.$id.'").val("'.@$crops_arr[$i]['f11_achieved'].'");';
													echo '$("#f11_income'.$id.'").val("'.@$crops_arr[$i]['f11_income'].'");';
													echo '$("#f11_diseases'.$id.'").val("'.@$crops_arr[$i]['f11_diseases'].'");';
													echo '$("#f11_fertilizers'.$id.'").val("'.@$crops_arr[$i]['f11_fertilizers'].'");';
													
													
													echo 'contentCount='.$id.';';
											 ?>
											 </script>
                                            
                                           <?php  } ?>
                                            </div>
 
											<div style="padding:5px;border:1px solid #d6d6d6;margin:5px;">
											    <a class="btn btn-sm btn-warning addCrop">Add New</a>
											    <a class="btn btn-sm btn-danger pull-right removeCrop" data-toggle="modal" data-target="#confirm_box" data-backdrop="static" >Remove</a>
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
        <p >Are you sure want to remove yield?</p>
        
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-primary removeCrop_btn"  data-dismiss="modal">Yes</button>&nbsp;
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
      </div>
     </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
      
      <script type="text/javascript">
    	
		    $('#frm_yield_detail').on('submit', function(e) {
			e.preventDefault();
			if ($('#frm_yield_detail').valid())
			{
				loading_show();	
				$.ajax({
						type: "POST",
						url: "action_pages/action_frm11.php",
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
							window.location.href="acrefinfrm_12.php?pag=farmers&fm_id=<?php echo $fm_id; ?>";
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



