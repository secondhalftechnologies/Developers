<?php 
include('access1.php'); 
include('connection.php');
$fm_id = (isset($_REQUEST['fm_id'])? $_REQUEST['fm_id']:"");

if($fm_id!="" && isset($_SESSION['acrefin_user']) && $_SESSION['acrefin_user']!="")
{
  $result = lookup_value('tbl_personal_detail',array(),array("fm_id"=>$fm_id),array(),array(),array());
  if($result)
  {
	  $num    = mysqli_num_rows($result);
	  if($num !=0)
	  {
		$row                      = mysqli_fetch_array($result);
		
		$data['f1_mfname']        = $row['f1_mfname'];
		$data['f1_mmname']        = $row['f1_mmname'];
		$data['f1_age']           = $row['f1_age'];
		$data['f1_altno']         = $row['f1_altno'];
		$data['f1_ppno']          = $row['f1_ppno'];
		$data['f1_pancard']       = $row['f1_pancard'];
		$data['f1_vote']          = $row['f1_vote'];
		$data['f1_licno']         = $row['f1_licno'];
		$data['f1_otherno']       = $row['f1_otherno'];
		$data['f1_expfarm']       = $row['f1_expfarm'];
		$data['f1_father']        = $row['f1_father'];
		$data['f1_dob']           = $row['f1_dob'];
		$data['f1_requireloan']   = $row['f1_requireloan'];
		
	  }




  }
?>

<!doctype html>
<html>

<head>
	<title> Applicant's Personal Details  </title>
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

<body  class="theme-green" data-theme="theme-green">
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
								 Applicant's Personal Details  
								</h3>
                                
							</div>
                <div class="box-content nopadding">
								<form enctype="multipart/form-data" method="POST" class='form-horizontal form-wizard wizard-vertical' id="frm_knowledge_detail">
										<div class="step" id="Step1">
										<?php include('side_menu.php'); ?>
										<div class="form-content">
									
                                             <div class="control-group">
                                                      <label for="text" class="control-label" style="margin-top:10px">Mother's First name</label>
                                                      <div class="controls">
                                                      <input type="text" id="f1_mfname" name="f1_mfname" class="input-xlarge v_name" data-rule-minlength="3" data-rule-maxlength="50" placeholder="First Name">
                                                      </div>
                                              </div><!--Mother First name-->
                                             <div class="control-group">
                                                      <label for="text" class="control-label" style="margin-top:10px">Mother's Middle Name</label>
                                                      <div class="controls">
                                                      <input type="text" id="f1_mmname" name="f1_mmname" class="input-xlarge v_name" data-rule-minlength="3" data-rule-maxlength="50" placeholder="Middle Name">
                                                      </div>
                                              </div><!--Mother Middle name-->

                                             <!-- <div class="control-group">
                                                      <label for="text" class="control-label" style="margin-top:10px">Father's / Husband's Name<span style="color:#F00">*</span></label>
                                                      <div class="controls">
                                                      <input type="text" id="f1_father" name="f1_father" class="input-xxlarge v_name" data-rule-minlength="3" data-rule-maxlength="255">
                                                      </div>
                                              </div> --><!--Father's / Husband's Name-->

											 
											 <div class="control-group">
                                                      <label for="text" class="control-label " style="margin-top:10px">Applicant's  Date of Birth<span style="color:#F00">*</span></label>
                                                      <div class="controls">
                                                      	<input type="text" id="f1_dob" name="f1_dob" class="datepicker input-xlarge" data-rule-required="true" placeholder="Date of Birth">
                                                      </div>
                                              </div><!--Dob-->

                                             <div class="control-group">
                                                      <label for="text" class="control-label" style="margin-top:10px">Applicant's Age (in years)<span style="color:#F00">*</span></label>
                                                      <div class="controls">
                                                      <input type="text" id="f1_age" name="f1_age" onChange="calTotal();" data-rule-number="true" class="v_number" readonly>
                                                      </div>
                                              </div><!--age-->

                                             <div class="control-group">
                                                    <label for="numberfield" class="control-label">Alternate no </label>
                                                    <div class="controls">
                                                        <input type="text" placeholder="Alternate No." name="f1_altno" id="f1_altno" class="v_number input-xlarge" data-rule-number="true"  data-rule-minlength="10"  data-rule-maxlength="10" >
                                                         
                                                    </div>
                                                </div><!--Alternate no-->
                                             <p for="text"  style="margin-top:10px"><strong></strong></p>   
                                            
                                            <div class="control-group">
                                                <label for="" class="control-label">Any Other ID proof</label>
                                                <div class="controls">
                                                	<select id="any_other_select" class="input-xlarge">
                                                		<option value="">Select here</option>
                                                		<option value="yes">Yes</option>
                                                		<option value="no">No</option>
                                                	</select>
                                                </div>
                                            </div><!--Alternate no-->

                                            <div id="any_other" style="display: none;">
	                                             <div class="control-group">
	                                                        <label for="numberfield" class="control-label">Passport No </label>
	                                                        <div class="controls">
	                                                            <input type="text"  name="f1_ppno" id="f1_ppno" class="v_text input-xlarge"  data-rule-minlength="6"  data-rule-maxlength="12" placeholder="Passport No">
	                             							</div>
	                                             </div> <!--Passport no-->

	                                             <div class="control-group">
	                                                    <label for="numberfield" class="control-label">Pan Card </label>
	                                                    <div class="controls">
	                                                        <input type="text"  name="f1_pancard" id="f1_pancard" class="v_text input-xlarge" data-rule-minlength="6"  data-rule-maxlength="10" placeholder="Pan Card">
	                         							</div>
	                                             </div> <!--pan card -->

	                                             <div class="control-group">
	                                                    <label for="numberfield" class="control-label">Voting no </label>
	                                                    <div class="controls">
	                                                        <input type="text"  name="f1_vote" id="f1_vote" class="v_text input-xlarge"  data-rule-minlength="6"  data-rule-maxlength="12" placeholder="Voting No">
	                             						</div>
	                                             </div> <!--Voting card no-->

	                                             <div class="control-group">
	                                                    <label for="numberfield" class="control-label">Driving licence no </label>
	                                                    <div class="controls">
	                                                        <input type="text"  name="f1_licno" id="f1_licno" class="v_text input-xlarge"   data-rule-minlength="6"  data-rule-maxlength="12" placeholder="Driving Licence No.">
	                             						</div>
	                                             </div> <!--Driving licence no-->

	                                             <div class="control-group">
	                                                    <label for="numberfield" class="control-label">Any Other no </label>
	                                                    <div class="controls">
	                                                        <input type="text"  name="f1_otherno" class="v_text input-xlarge" id="f1_otherno" data-rule-maxlength="20" placeholder="Any Other No. ">
	                         							</div>
	                                             </div> <!--other-->     
	                                        </div>

                                             <div class="control-group">
                                                    <label for="numberfield" class="control-label">Experience in Farming (in years) <span style="color:#F00">*</span></label>
                                                    <div class="controls">
                                                        <input type="text" placeholder="Experience" name="f1_expfarm" id="f1_expfarm" class="v_number input-xlarge" data-rule-number="true" data-rule-required="true" onChange="calTotal();"   data-rule-maxlength="2">
                             						</div>
                                             </div> <!-- experience in farming  -->                  

                                             <!-- <div class="control-group">
												<label for="text" class="control-label" style="margin-top:10px">Do you require a loan?<span style="color:#F00">*</span></label>
												<div class="controls">
                                                    <select id="f1_requireloan" name="f1_requireloan" class="input-xxlarge" data-rule-required="true">
														<option value="" disabled selected> Select here</option>
														<option value="yes"> Yes</option>
														<option value="no"> No</option>
													</select>
												</div>
                                        	 </div> --><!--Do you require a loan-->
                                             
                                        </div>
										</div>
                                        
                                        <div class="form-actions" style="text-align: center;">
											<input type="reset" class="btn" value="Back" id="back">
											<input type="submit" class="btn btn-primary" value="Save" id="save">
                                        </div>

                                     <input type="hidden" name="add_knowledge_detail" value="1">
                                     <input type="hidden" value="<?php echo $fm_id ?>" name="fm_id">
                                     <input type="hidden" name="fm_caid" value="<?php echo $_SESSION['fm_caid']; ?>">
                                     <input type="hidden" name="f1_points" value="" id="f1_points">

								</form>
                                 <!-- <input type="text" id="hid_total" name="hid_total" value="0"> -->
                                 <h1 id="g_total">0</h1> 
                               
							</div>

                 </div>   

			</div>
		</div>
      </div>
		

<script>
	 
	var g_total = 0;

	function f1_myAge()
	{
	 var a = 0;
	 var a_total = 0;
	 a = document.getElementById('f1_age').value;
	 
	 if(a!=null && a!="")
	 {
	 
	  if(a >= 21 && a <= 25)
	  {
		  a_total = 10; 	
	  }
	  else if(a >= 26 && a <= 30)
	  {
		  a_total = 8;
	  }
	  else if(a >= 31 && a <= 35)
	  {
		  a_total = 6;
	  }
	  else if(a >= 36 && a <= 45)
	  {
		  a_total = 4;
	  }
	  else if(a >= 46 && a <= 100)
	  {
		  a_total = 2;
	  }
	  else
	  {
		  a_total = 0;
	  }
	 }
	 else
	 {
		a_total = 0; 
	 }
	  
	  
	 return a_total;
	 
	 // g_total = parseInt(cont) + total;
	 // document.getElementById('hid_total').value = g_total;
	 // document.getElementById('total').innerHTML = g_total;	
	}

	function expFarm()
	{
	 var b = 0;
	 var b_total = 0;
	 b = document.getElementById('f1_expfarm').value;
	 
	 if(b!=null && b!="")
	 {
	 
	  if(b >= 0 && b <= 2)
	  {
		  b_total = 2; 	
	  }
	  else if(b >= 3 && b <= 5)
	  {
		  b_total = 4;
	  }
	  else if(b >= 6 && b <= 10)
	  {
		  b_total = 6;
	  }
	  else if(b >= 11 && b <= 20)
	  {
		  b_total = 8;
	  }
	  else if(b >= 21 && b <= 100)
	  {
		  b_total = 10;
	  }
	  else
	  {
		  b_total = 0;
	  }
	  
	 }
	 else
	 {
		b_total = 0; 
	 }
	  
	  return b_total;
	  
	  //g_total = parseInt(cont) + total1;
	  //document.getElementById('hid_total').value = g_total;
	  //document.getElementById('total').innerHTML=g_total;	  
	}

	function calTotal()
	{
	  var a1 = 0;
	  var b1 = 0;
	  a1 = f1_myAge();
	  b1 = expFarm();
	  
	  g_total = a1 + b1;
	  document.getElementById('g_total').innerHTML=g_total;

	    var f2_pt =g_total/2;
		f2_pt     =f2_pt.toFixed(2);
		$('#f1_points').val(f2_pt);
		$('#f1_pt').html(f2_pt);

	}

	$('#frm_knowledge_detail').on('submit', function(e) {
		e.preventDefault();
		if ($('#frm_knowledge_detail').valid())
		{
			loading_show();	
			$.ajax({
				type: "POST",
				url: "action_pages/action_frm1.php",
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
						window.location.href="acrefinfrm_2.php?pag=farmers&fm_id=<?php echo $fm_id; ?>";
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
		

		$('#f1_mfname').val('<?= @$data['f1_mfname'] ?>');
		$('#f1_mmname').val('<?= @$data['f1_mmname'] ?>');
		$('#f1_age').val('<?= @$data['f1_age'] ?>');
		$('#f1_altno').val('<?= @$data['f1_altno'] ?>');
		$('#f1_ppno').val('<?= @$data['f1_ppno'] ?>');
		$('#f1_pancard').val('<?= @$data['f1_pancard'] ?>');
		$('#f1_vote').val('<?= @$data['f1_vote'] ?>');
		$('#f1_licno').val('<?= @$data['f1_licno'] ?>');
		$('#any_other_select').val('<?= @$data['f1_otherno'] ?>');
		$('#f1_expfarm').val('<?= @$data['f1_expfarm'] ?>');

		$('#f1_father').val('<?= @$data['f1_father'] ?>');
		$('#f1_dob').val('<?= @$data['f1_dob'] ?>');
		$('#f1_requireloan').val('<?= @$data['f1_requireloan'] ?>');

		if($('#f1_ppno').val() || $('#f1_pancard').val() || $('#f1_vote').val() || $('#f1_licno').val() || $('#f1_otherno').val()){
			$('#any_other_select').val('yes');
		}
		else
		{
			$('#any_other_select').val('no');
		}

		$('.datepicker').datepicker({format:'yyyy-mm-dd'});		

		$('.datepicker').on('changeDate', function(e){
			var date1 = new Date($(this).val());
			var date2 = new Date();
			var timeDiff = Math.abs(date2.getTime() - date1.getTime());
			var diffyears = Math.ceil(timeDiff / (365 * 1000 * 3600 * 24)); 
			
			$('#f1_age').val(diffyears);
			calTotal();
		});

		$('#any_other_select').on('change', function(){
			if($(this).val() == 'yes')
			{
				$('#any_other').show('swing');
			}
			else
			{
				$('#any_other').hide('swing');
			}
		});

		$('#any_other_select').trigger('change');
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

