<?php 
include('access1.php'); 
include('connection.php');
$fm_id = (isset($_REQUEST['fm_id'])?$_REQUEST['fm_id']:"");
if($fm_id!="" && isset($_SESSION['acrefin_user']) && $_SESSION['acrefin_user']!="")
{
	$no_of_loan = "";
	$loan_arr  = array();
	
	$result     = lookup_value('tbl_loan_details',array(),array("fm_id"=>$fm_id),array(),array(),array());
  if($result)
  {
	  $num    = mysqli_num_rows($result);
	  if($num !=0)
	  {
		  $row     = mysqli_fetch_array($result);
		  $data['fx_monthly_income']              = $row['fx_monthly_income'];
		  $data['f8_loan_taken']		          = $row['f8_loan_taken'];
		  $data['f8_private_lenders'] 	          = $row['f8_private_lenders'];
		  $data['f8_borrowed_amount']	          = $row['f8_borrowed_amount'];
		  $data['f8_borrowed_amount_date']        = $row['f8_borrowed_amount_date'];
		  $data['f8_borrowed_outstanding_amount'] = $row['f8_borrowed_outstanding_amount'];
		  $data['f8_borrowed_outstanding_principal']= $row['f8_borrowed_outstanding_principal'];
		  $data['f8_borrowed_amount_emi'] 		  = $row['f8_borrowed_amount_emi'];
		  $data['f8_borrowed_amount_emi_rem']	  = $row['f8_borrowed_amount_emi_rem'];
		  $data['f8_borrowed_loan_per']		      = $row['f8_borrowed_loan_per'];
		  
		  $data['f8_borrowed_loan_month'] 		  = $row['f8_borrowed_loan_month'];
		  $data['f8_borrowed_emi_paid'] 		  = $row['f8_borrowed_emi_paid'];
		  $data['f8_borrowed_total_amount']		  = $row['f8_borrowed_total_amount'];
		  $data['f8_borrowed_total_int']		  = $row['f8_borrowed_total_int'];
		  
		  $loan_result     = lookup_value('tbl_bank_loan_detail',array(),array("fk_loan_detailsid"=>$row['id']),array(),array(),array());
		 
		  if($loan_result)
		  {
			  while($ln_row = mysqli_fetch_array($loan_result))
			 {
				array_push($loan_arr ,$ln_row);
			 }
			  $no_of_loan = sizeof($loan_arr);
		  }
		  
		  
	  }
  }
 
?>
<!DOCTYPE html>
<!--[if IE 7]>                  <html class="ie7 no-js" lang="en">     <![endif]-->
<!--[if lte IE 8]>              <html class="ie8 no-js" lang="en">     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" lang="en">  <!--<![endif]-->

<head>

	<title> Loan and liabilities Details     </title>
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
    
    <script>

		var g_total = 0;
        var no_of_points =1;
		
         function numsonly(e)
		 {
  			  var unicode=e.charCode? e.charCode : e.keyCode
			  if (unicode !=8 && unicode !=32 && unicode !=46)
			  {  // unicode<48||unicode>57 &&
     		  if ( unicode<48||unicode>57  )  //if not a number
          	  return false //disable key press
              }
		}
		
		function cal_fx_monthly_income_point(x)
		{
			
			if(x=='500-2500')
			{
			  return 2;
			}
			else if(x=='2501-5000')
			{
			  return 3;
			}
			else if(x =='5001-10000')
			{
			  return 4;
			}
			else if(x=='10001-25000')  
			{
			  return 5;
			}
			else if(x =='25001-50000')
			{
			  return 6;
			}
			else if(x=='50001-100000')
			{
			  return 7;
			}
			else if(x=='100001-200000')
			{
			  return 8;
			}
			else if(x=='200001-300000')
			{
				return 10;
			}
			else
			{
				return 0
			}
		}

	    function cal_outstanding_loan_point(x)
		{
			if(x >= 0 && x <= 50000)
			{
			  return 10;
			}
			else if(x >= 50001 && x <= 100000)
			{
			  return 8;
			}
			else if(x >= 100001 && x <= 150000)
			{
			  return 6;
			}
			else if(x >= 150001 && x <= 200000)
			{
			  return 4;
			}
			else if(x >= 200001 && x <= 250000)
			{
			  return 2;
			}
			else
			{
				return 0;
			}
		}

		function cal_loan_emi_point(x)
		{
			if(x >= 0 && x <= 2500)
			{
			  return 10;
			}
			else if(x >= 2501 && x <= 5000)
			{
			  return 8;
			}
			else if(x >= 5001 && x <= 7500)
			{
			  return 6;
			}
			else if(x >= 7501 && x <= 10000)
			{
			  return 4;
			}
			else if(x >= 10001 && x <= 12500)
			{
			  return 2;
			}
			else if(x >=12501 && x <=15000)
			{
			  return 1;
			}
			else
			{
				return 0;
			}
		}
		
		function cal_remaining_emi_point(x)
		{
			if(x >= 0 && x <= 6)
			{
			  return 10;
			}
			else if(x >= 7 && x <= 12)
			{
			  return 8;
			}
			else if(x >= 13 && x <= 18)
			{
			  return 6;
			}
			else if(x >= 19 && x <= 24)
			{
			  return 4;
			}
			else if(x >= 25 && x <= 30)
			{
			  return 2;
			}
			else
			{
				return 0;
			}
		}

		

		function calTotal()
		{
			no_of_points=1;
			
			var fx_monthly_income    = $('#fx_monthly_income').val() || 0;
		    var fx_monthly_income_pt = cal_fx_monthly_income_point(fx_monthly_income);
			
			loan_taken               = $('#f8_loan_taken').val();
			f8_outstanding_loan_pt   = 0;
			f8_loan_emi_pt           = 0;
			remaining_emi_pt         = 0;
			
			var f8_borrowed_outstanding_amount_pt = 0;
			var f8_borrowed_amount_emi_pt         = 0;
			var borrowed_amount_emi_rem_pt        = 0;
			
			
			var num_of_loan =parseInt($('#num_of_loan').val());
			if(loan_taken === 'yes')
			{
				for(var i=1;i<=num_of_loan;i++)
				{
					f8_loan_amount      = $('#f8_loan_amount'+i).val();
				    f8_outstanding_loan = $('#f8_outstanding_loan'+i).val();
					
					if(f8_outstanding_loan > f8_loan_amount)
					{
						/*alert(" outstnading loan amount must be less than or equal to loan amount for loan "+i);
						$('#f8_outstanding_loan'+i).val("");*/
					}
					
					if(f8_outstanding_loan !="")
					{
						outstanding_loan_pt =cal_outstanding_loan_point(parseInt(f8_outstanding_loan));
			            f8_outstanding_loan_pt =parseInt(f8_outstanding_loan_pt) +parseInt(outstanding_loan_pt);
					}
					f8_loan_emi        = $('#f8_loan_emi'+i).val();
					if(f8_loan_emi!="")
					{
						loan_emi_pt        =cal_loan_emi_point(parseInt(f8_loan_emi));
						f8_loan_emi_pt     = parseInt(f8_loan_emi_pt) +parseInt(loan_emi_pt);
					}
					if(f8_loan_emi!="" && f8_outstanding_loan !="")
					{
						var  remaining_emi      =parseInt(f8_outstanding_loan)/parseInt(f8_loan_emi);
						
				     	$('#f8_remaining_emi'+i).val(remaining_emi.toFixed(0));
						var f8_remaining_emi_pt  =cal_remaining_emi_point(remaining_emi);
						remaining_emi_pt     = parseInt(remaining_emi_pt) +parseInt(f8_remaining_emi_pt);
					}
					
				}
			}
			
			private_lenders    = $('#f8_private_lenders').val();
			if(private_lenders === 'yes')
			{
			        f8_borrowed_amount             = $('#f8_borrowed_amount').val();
				    f8_borrowed_outstanding_amount = $('#f8_borrowed_outstanding_amount').val();
					if(f8_borrowed_outstanding_amount !="")
					{
						if(f8_borrowed_outstanding_amount > f8_borrowed_amount)
						{
							/*alert('Outstanding amount must be less than or equal to borrowed loan amount');
							$('#f8_borrowed_amount').val("");*/
						}
						borrowed_outstanding_amount_pt =cal_outstanding_loan_point(f8_borrowed_outstanding_amount);
			            f8_borrowed_outstanding_amount_pt =parseInt(f8_borrowed_outstanding_amount_pt) + parseInt(borrowed_outstanding_amount_pt);
					}
					
					f8_borrowed_amount_emi        =$('#f8_borrowed_amount_emi').val() ;
					if(f8_borrowed_amount_emi!="")
					{
						borrowed_amount_emi_pt       =cal_loan_emi_point(parseInt(f8_borrowed_amount_emi));
						f8_borrowed_amount_emi_pt     = parseInt(f8_borrowed_amount_emi_pt) +parseInt(borrowed_amount_emi_pt);
					}
					if(f8_borrowed_amount_emi!="" && f8_borrowed_outstanding_amount !="")
					{
						var  remaining_emi      =parseInt(f8_borrowed_outstanding_amount)/parseInt(f8_borrowed_amount_emi);
						
						
				     	$('#f8_borrowed_amount_emi_rem').val(remaining_emi.toFixed(0));
						var f8_borrowed_amount_emi_rem_pt  =cal_remaining_emi_point(remaining_emi);
						borrowed_amount_emi_rem_pt     = parseInt(borrowed_amount_emi_rem_pt) +parseInt(f8_borrowed_amount_emi_rem_pt);
					}
			}
            
     g_total = fx_monthly_income_pt + f8_outstanding_loan_pt + f8_loan_emi_pt +remaining_emi_pt ;
	 g_total = g_total + f8_borrowed_outstanding_amount_pt + f8_borrowed_amount_emi_pt + borrowed_amount_emi_rem_pt;
	 document.getElementById('g_total').innerHTML=g_total;
	 if(loan_taken=="yes")
	 {
		no_of_points +=(num_of_loan * 3); 
	}
	if(private_lenders=='yes')
	{
		 no_of_points +=3;
	}
	
	 g_total   = g_total/no_of_points;
	 $('#f8_points').val(g_total.toFixed(2));
	 $('#f8_pt').html(g_total.toFixed(2));
 }


		$(document).ready(function(){

			$('#fx_monthly_income').on('change', function(){
				calTotal();
			});
			
			

			$('#f8_loan_taken').on('change', function(){
				if($(this).val() == 'yes')
				{
					$('#loan_taken').show('swing');
					$('#num_of_loan').val(1);
				}
				else
				{
					$('#loan_taken').hide('swing');
					$('#num_of_loan').val();
				}
				calTotal();
			});
			
			$('#f8_private_lenders').on('change', function(){
				if($(this).val() == 'yes')
				{
					$('#private_lenders').show('swing');
				}
				else
				{
					$('#private_lenders').hide('swing');
				}
				calTotal();
			});
			
			
			$('#f8_outstanding_loan1').on('change', function(){
				calTotal();
			});
			$('#f8_loan_emi1').on('change', function(){
				calTotal();
			});
			
			
			$('#f8_borrowed_outstanding_amount').on('change', function(){
				calTotal();
			});
			$('#f8_borrowed_amount_emi').on('change', function(){
				calTotal();
			});
			

			
			
		});

      
		
		function addMoreLoan(remove)
		{
			curr_count =parseInt($('#num_of_loan').val());
			if(remove==1)
			{
				    $('#loans_type').find('#loan'+curr_count).slideUp("slow");
					//$('#loan'+curr_count).remove();
					curr_count    = curr_count - 1
					if(curr_count==1)
					{
						$('#removeLoanType').hide('swing');
					}
					$('#num_of_loan').val(curr_count)
					calTotal();
					return false;
				 
			}
			 curr_count =curr_count + 1;
			 data           ='<div id="loan'+curr_count+'" style="padding:5px;border:1px solid #d6d6d6;margin:5px;display:none">';
			 data       = data +'<input type="hidden" name="id[]" id="id" value="">   ';
			 data       = data + '<div id="loan'+curr_count+'"><h3>Loan '+curr_count+'</h3>';
			 
			 data       = data +'<div class="control-group"><label for="numberfield" class="control-label">Loan Sanctioned Date<span style="color:#F00">*</span></label><div class="controls"><input type="text" data-provide="datepicker" class="input-xlarge ui-wizard-content datepicker" placeholder="Sanction Date" name="f8_sanction_date'+curr_count+'" id="f8_sanction_date'+curr_count+'" data-rule-required="true"    data-rule-maxlength="10"></div></div>';
			 
			 data       = data +'<div class="control-group"><label for="text" class="control-label" style="margin-top:10px">Mention the Loan Type<span style="color:#F00">*</span></label><div class="controls"><select id="f8_loan_type'+curr_count+'" name="f8_loan_type'+curr_count+'" class="input-xlarge" data-rule-required="true"><option value="" disabled selected>Select here</option><option value="Education">Education</option><option value="Land">Land</option><option value="Agriculture">Agriculture</option><option value="Two Wheeler">Two Wheeler</option><option value="Equipment">Equipment</option><option value="Irrigation">Irrigation</option><option value="Fencing">Fencing</option><option value="Housing">Housing</option><option value="Construction/Renovation">Construction/Renovation</option><option value="Four Wheeler">Four Wheeler</option><option value="Electronics">Electronics</option><option value="NA">NA</option><option value="Others">Others</option></select></div></div>';
			 
			  data =data + '<div class="control-group"><label for="numberfield" class="control-label">Provider<span style="color:#F00">*</span></label><div class="controls"><input type="text" class="input-xlarge ui-wizard-content" data-rule-required="true" placeholder="Loan Provider" name="f8_loan_provider'+curr_count+'" id="f8_loan_provider'+curr_count+'" ></div></div>'; 
			 
			data =data + '<div class="control-group"><label for="numberfield" class="control-label">Total Loan Amount<span style="color:#F00">*</span></label><div class="controls"><input type="text" data-rule-required="true" class="input-xlarge ui-wizard-content" placeholder="Loan Amount" name="f8_loan_amount'+curr_count+'" id="f8_loan_amount'+curr_count+'"  onKeyPress=" return numsonly(event);"   data-rule-maxlength="10"></div></div>'; 
			
            
			  data =data + '<div class="control-group"><label for="numberfield" class="control-label">Rate of Interest<span style="color:#F00">*</span></label><div class="controls"><input type="text" class="input-xlarge  onKeyPress=" return numsonly(event);"  ui-wizard-content" data-rule-required="true" placeholder="Rate of Interest" name="f8_loan_per'+curr_count+'" id="f8_loan_per'+curr_count+'" ></div></div>'; 
			 
			data =data + '<div class="control-group"><label for="numberfield" class="control-label">Loan tenure in Months<span style="color:#F00">*</span></label><div class="controls"><input type="text" data-rule-required="true" class="input-xlarge ui-wizard-content" placeholder="Tenure in Months" name="f8_loan_months'+curr_count+'" id="f8_loan_months'+curr_count+'"   onKeyPress=" return numsonly(event);" onchange="cal_loanEMI('+curr_count+')"   data-rule-maxlength="10"></div></div>'; 
	        
			 
			  data =data + '<div class="control-group"><label for="numberfield" class="control-label">EMI per month<span style="color:#F00">*</span></label><div class="controls"><input type="text" class="input-xlarge ui-wizard-content" data-rule-required="true" placeholder="EMI per month" onchange="calTotal();" name="f8_loan_emi'+curr_count+'" id="f8_loan_emi'+curr_count+'"  readonly onKeyPress=" return numsonly(event);"   data-rule-maxlength="10"></div></div>';
			  
			  
			   data =data + '<div class="control-group"><label for="numberfield" class="control-label">Total Loan Amount<span style="color:#F00">*</span></label><div class="controls"><input type="text" class="input-xlarge ui-wizard-content" data-rule-required="true" placeholder="Total Loan Amount" onchange="calTotal();" name="f8_total_amount'+curr_count+'" id="f8_total_amount'+curr_count+'"  readonly onKeyPress=" return numsonly(event);"   data-rule-maxlength="10"></div></div>';
			   
			   
			    data =data + '<div class="control-group"><label for="numberfield" class="control-label">Total Interest<span style="color:#F00">*</span></label><div class="controls"><input type="text" class="input-xlarge ui-wizard-content" data-rule-required="true" placeholder="Total Interest" name="f8_total_interest'+curr_count+'" id="f8_total_interest'+curr_count+'"  readonly    data-rule-maxlength="10"></div></div>';
			  
			  
			  data =data + '<div class="control-group"><label for="numberfield" class="control-label">No. Of EMI Paid<span style="color:#F00">*</span></label><div class="controls"><input type="text" class="input-xlarge ui-wizard-content" data-rule-required="true" placeholder="No. of emi Paid" onchange="cal_loanEMI('+curr_count+',1)" name="f8_emi_paid'+curr_count+'" id="f8_emi_paid'+curr_count+'"  onKeyPress=" return numsonly(event);"   data-rule-maxlength="10"></div></div>';
			 
                                                    
             data =data + '<div class="control-group"><label for="numberfield" class="control-label">Current Outstanding Loan Amount with Interest<span style="color:#F00">*</span></label><div class="controls"><input type="text" data-rule-required="true" class="input-xlarge ui-wizard-content" onKeyPress="return numsonly(event);" placeholder="Outstanding Loan Amount" data-rule-required="true" name="f8_outstanding_loan'+curr_count+'" id="f8_outstanding_loan'+curr_count+'" onchange="calTotal();" data-rule-number="true"   data-rule-maxlength="10"></div></div>';
                                                    
                
			data =data + '<div class="control-group"><label for="numberfield" class="control-label">Current Outstanding Loan Amount<span style="color:#F00">*</span></label><div class="controls"><input type="text" data-rule-required="true" class="input-xlarge ui-wizard-content" onKeyPress="return numsonly(event);" placeholder="Outstanding Loan Amount" data-rule-required="true" name="f8_outstanding_principal'+curr_count+'" id="f8_outstanding_principal'+curr_count+'" onchange="calTotal();" data-rule-number="true"   data-rule-maxlength="10"></div></div>';                                    
           

		     data = data + '<div class="control-group"><label for="numberfield" class="control-label">Therefore, No. of Months to clear Outstanding</label><div class="controls"><input type="text" data-rule-required="true" class="input-xlarge ui-wizard-content" placeholder="No. Of EMI Remaining" name="f8_remaining_emi'+curr_count+'" id="f8_remaining_emi'+curr_count+'" data-rule-number="true" onchange="calTotal();"   data-rule-maxlength="10">    													</div></div>';
             data = data + '</div> ';
			 
			 /*data =data +'<input type="hidden" value="" name="f8_total_amount'+curr_count+'"   id="f8_total_amount'+curr_count+'"><input type="hidden" value="" name="f8_total_interest'+curr_count+'" id="f8_total_interest'+curr_count+'">';*/
			 
			// $('body').find('.datepicker').datepicker({format:'yyyy-mm-dd'});	
			  $( ".datepicker" ).datepicker('update');
			 $('#num_of_loan').val(curr_count);
			 // $("#loans_type").append(data).fadeIn('fast');
			  $('#loans_type').append(data).find('#loan'+curr_count).slideDown("slow");
			 
			  if(curr_count>=2)
			  {
				  $('#removeLoanType').show('swing');
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
								Loan and liabilities Details    
								</h3>
                                 
							</div>
                            <div class="box-content nopadding">
								<form enctype="multipart/form-data" method='post' class='form-horizontal form-wizard wizard-vertical' id="frm_loan_detail">
									<div class="step" id="Step1">
										<?php include('side_menu.php'); ?>
										<div class="form-content">
											
                                             <input type="hidden" name="add_loan_detail" value="1">
                                             <input type="hidden" value="<?php echo $fm_id ?>" name="fm_id">
                                             <input type="hidden" name="fm_caid" value="<?php echo $_SESSION['fm_caid']; ?>">
                                             <input type="hidden" name="f8_points" id="f8_points" value="">
                                            <div id="loan_detail" style="padding:5px;border:1px solid #d6d6d6;margin:5px;">
                                            	<h2>Loan Details</h2>
                                            	<div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">How Much is your Avg or Fixed Monthly Income?
<span style="color:#F00">*</span></label>
													<div class="controls">
                                                    
                                                    <select   id="fx_monthly_income" name="fx_monthly_income" class="input-xlarge" data-rule-required="true">
                                                    <option value="" selected disabled>Select Income</option>
                                                    <option value="500-2500" >500-2500</option>
                                                    <option value="2501-5000" >2501-5000</option>
                                                    <option value="5001-10000" >5001-10000</option>
                                                    <option value="10001-25000" >10001-25000</option>
                                                    <option value="25001-50000" >25001-50000</option>
                                                    <option value="50001-100000">50001-100000</option>
                                                    <option value="100001-200000" >100001-200000</option>
                                                    <option value="200001-300000">200001-300000</option>
                                                    </select>
														
													</div>
												</div><!--Fixed Monthly Income-->

												<div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Any Loan taken?
													<span style="color:#F00">*</span></label>
													<div class="controls">
														<select id="f8_loan_taken" name="f8_loan_taken" class="input-xlarge" data-rule-required="true">
															<option value="" disabled selected> Select here</option>
															<option value="yes"> Yes</option>
															<option value="no"> No</option>
														</select>
													</div>
	                                            </div><!--Any Loan Taken?-->
                                                
                                                
												<div id="loan_taken" style="display: none;">
                                                    <input type="hidden" class="btn btn-primary" value="<?php echo $no_of_loan; ?>" name="num_of_loan" id="num_of_loan">
                                                    <div id="loans_type">
                                                    <?php
													 if($no_of_loan=="")
													 {
														 $no_of_loan =1;
													 }
													 for($i=0;$i<$no_of_loan;$i++)
													 {
														  $id =$i+1;
													 ?>
                                                    <div id="loan<?php echo $id; ?>" style="padding:5px;border:1px solid #d6d6d6;margin:5px;">
                                                    <h3>Loan <?php echo $id; ?></h3>
                                                    <input type="hidden" name="id[]" id="id" value="<?php echo @$loan_arr[$i]['id']; ?>">   
                                                    
                                                    <div class="control-group">
	                                                    <label for="numberfield" class="control-label">Loan Sanctioned Date<span style="color:#F00">*</span></label>
	                                                    <div class="controls">
	                                                        <input type="text" data-provide="datepicker" class="input-xlarge ui-wizard-content datepicker" placeholder="Sanction Date" name="f8_sanction_date<?php echo $id; ?>" id="f8_sanction_date<?php echo $id; ?>" data-rule-required="true"    data-rule-maxlength="10">
	                                                        </div>
	                                            	</div>
                                                    
                                                    
		                                            <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Mention the Loan Type<span style="color:#F00">*</span></label>
													<div class="controls">
														<select onchange="calTotal();" id="f8_loan_type<?php echo $id; ?>" name="f8_loan_type<?php echo $id; ?>" class="input-xlarge" data-rule-required="true">
															<option value="" disabled selected> Select here</option>
															<option value="Education">Education</option>
															<option value="Land">Land</option>
                                                            <option value="Agriculture">Agriculture</option>
															<option value="Two Wheeler">Two Wheeler</option>
															<option value="Equipment">Equipment</option>
                                                            <option value="Irrigation">Irrigation</option>
                                                            <option value="Fencing">Fencing</option>
															<option value="Housing">Housing</option>
                                                            <option value="Construction/Renovation">Construction/Renovation</option>
															<option value="Four Wheeler">Four Wheeler</option>
															<option value="Electronics">Electronics</option>
                                                            <option value="NA">NA</option>
                                                            <option value="Others">Others</option>
														</select>
													</div>
	                                            </div><!--Is your Spouse a part of any SHG?-->

 													<div class="control-group">
	                                                    <label for="numberfield" class="control-label">Provider<span style="color:#F00">*</span></label>
	                                                    <div class="controls">
	                                                        <input type="text" class="input-xlarge ui-wizard-content" placeholder="Loan Provider" name="f8_loan_provider<?php echo $id; ?>" id="f8_loan_provider<?php echo $id; ?>"  data-rule-required="true"   >
	                                                        <label id="f8_loan_provider1_err" style="color:#FF0000;width:200px;margin-left:100px;"></label>    
	                                                    </div>
	                                            	</div><!--f9_loan_provider1-->
                                                      
													<div class="control-group">
	                                                    <label for="numberfield" class="control-label">Total Loan Amount<span style="color:#F00">*</span></label>
	                                                    <div class="controls">
	                                                        <input onchange="cal_loanEMI(<?php echo $id; ?>)" type="text" class="input-xlarge ui-wizard-content" placeholder="Loan Amount" name="f8_loan_amount<?php echo $id; ?>" id="f8_loan_amount<?php echo $id; ?>"  onKeyPress=" return numsonly(event);"  data-rule-required="true"  maxlength="10">
	                                                    </div>
	                                            	</div><!--f9_loan_amount1-->
                                                    
                                                    <div class="control-group">
	                                                    <label for="numberfield" class="control-label">Rate of Interest<span style="color:#F00">*</span></label>
	                                                    <div class="controls">
	                                                        <input onchange="cal_loanEMI(<?php echo $id; ?>)" type="text" class="input-xlarge ui-wizard-content" placeholder="Rate of Interest" name="f8_loan_per<?php echo $id; ?>" id="f8_loan_per<?php echo $id; ?>"  onKeyPress=" return numsonly(event);"  data-rule-required="true"  maxlength="5">
	                                                     </div>
	                                            	</div><!--f9_loan_amount1-->
                                                    
                                                    <div class="control-group">
	                                                    <label for="numberfield" class="control-label">Loan tenure in Months<span style="color:#F00">*</span></label>
	                                                    <div class="controls">
	                                                        <input onchange="cal_loanEMI(<?php echo $id; ?>)" type="text" class="input-xlarge ui-wizard-content" placeholder="Tenure in Months" name="f8_loan_months<?php echo $id; ?>" id="f8_loan_months<?php echo $id; ?>"  onKeyPress=" return numsonly(event);"  data-rule-required="true"  maxlength="10">
	                                                    </div>
	                                            	</div><!--f9_loan_amount1-->

	                                            	 <div class="control-group">
	                                                    <label for="numberfield" class="control-label">EMI per month<span style="color:#F00">*</span></label>
	                                                    <div class="controls">
	                                                        <input onchange="calTotal();" data-rule-required="true" type="text" class="input-xlarge ui-wizard-content" readonly placeholder="EMI per month" name="f8_loan_emi<?php echo $id; ?>" id="f8_loan_emi<?php echo $id; ?>"  onKeyPress=" return numsonly(event);"   data-rule-maxlength="10">
														</div>
	                                            	</div><!--EMI per month-->
                                                    
                                                    <div class="control-group">
	                                                    <label for="numberfield" class="control-label">Total Loan Amount</label>
	                                                    <div class="controls">
	                                                        <input onchange="calTotal();" data-rule-required="true" type="text" class="input-xlarge ui-wizard-content" readonly placeholder="Total Loan Amount" value="" name="f8_total_amount<?php echo $id; ?>"   id="f8_total_amount<?php echo $id; ?>" onKeyPress=" return numsonly(event);"   data-rule-maxlength="10">
														</div>
	                                            	</div><!--EMI per month-->
                                                    
                                                    <div class="control-group">
	                                                    <label for="numberfield" class="control-label">Total Interest</label>
	                                                    <div class="controls">
	                                                        <input data-rule-required="true" type="text" class="input-xlarge ui-wizard-content" readonly placeholder="Total Interest" value="" name="f8_total_interest<?php echo $id; ?>" id="f8_total_interest<?php echo $id; ?>"  onKeyPress=" return numsonly(event);"   data-rule-maxlength="10">
														</div>
	                                            	</div><!--EMI per month-->
                                                    
                                                    
                                                    <div class="control-group">
	                                                    <label for="numberfield" class="control-label">No. Of EMI Paid<span style="color:#F00">*</span></label>
	                                                    <div class="controls">
	                                                        <input onchange="cal_loanEMI(<?php echo $id; ?>,1);" data-rule-required="true" type="text" class="input-xlarge ui-wizard-content" onKeyPress="return numsonly(event);" placeholder="No. Of EMI Paid" name="f8_emi_paid<?php echo $id; ?>" id="f8_emi_paid<?php echo $id; ?>" data-rule-number="true"   data-rule-maxlength="10">
	                                                     </div>
	                                            	</div><!--f9_outstanding_loan1-->
                                                    
                                                    <div class="control-group">
	                                                    <label for="numberfield" class="control-label">Current Outstanding Loan Amount With Interest<span style="color:#F00">*</span></label>
	                                                    <div class="controls">
	                                                        <input onchange="calTotal();" data-rule-required="true" type="text" class="input-xlarge ui-wizard-content" onKeyPress="return numsonly(event);" readonly placeholder="Outstanding Loan Amount With Interest" name="f8_outstanding_loan<?php echo $id; ?>" id="f8_outstanding_loan<?php echo $id; ?>" data-rule-number="true"   data-rule-maxlength="10">
	                                                    </div>
	                                            	</div><!--f9_outstanding_loan1-->
                                                    
                             <div class="control-group">
	                                                    <label for="numberfield" class="control-label">Current Outstanding Loan Amount<span style="color:#F00">*</span></label>
	                                                    <div class="controls">
	                                                        <input onchange="calTotal();" data-rule-required="true" type="text" class="input-xlarge ui-wizard-content" onKeyPress="return numsonly(event);" readonly placeholder="Outstanding Loan Amount" name="f8_outstanding_principal<?php echo $id; ?>" id="f8_outstanding_principal<?php echo $id; ?>" data-rule-number="true"   data-rule-maxlength="10">
	                                                    </div>
	                                            	</div><!--f9_outstanding_loan1-->
                                                   

		                                            <div class="control-group">
	                                                    <label for="numberfield" class="control-label">Therefore, No. of Months to clear Outstanding</label>
	                                                    <div class="controls">
	                                                        <input  type="text" class="input-xlarge ui-wizard-content" placeholder="No. Of EMI Remaining" name="f8_remaining_emi<?php echo $id; ?>" id="f8_remaining_emi<?php echo $id; ?>" readonly data-rule-number="true" data-rule-required="true"  data-rule-maxlength="10">
	                                                    </div>
	                                            	</div><!--f9_outstanding_loan1-->
                                                    </div> <!--Loan 1 end-->
                                                    
                    
                     
                                                    
                                                     
                                                    <script>
													<?php 
													    echo '$("#f8_loan_type'.$id.'").val("'.@$loan_arr[$i]['f8_loan_type'].'");';
														echo '$("#f8_loan_amount'.$id.'").val("'.@$loan_arr[$i]['f8_loan_amount'].'");';
														echo '$("#f8_loan_provider'.$id.'").val("'.@$loan_arr[$i]['f8_loan_provider'].'");';
														echo '$("#f8_outstanding_loan'.$id.'").val("'.@$loan_arr[$i]['f8_outstanding_loan'].'");';
														echo '$("#f8_loan_emi'.$id.'").val("'.@$loan_arr[$i]['f8_loan_emi'].'");';
														echo '$("#f8_remaining_emi'.$id.'").val("'.@$loan_arr[$i]['f8_remaining_emi'].'");';
														
														echo '$("#f8_loan_per'.$id.'").val("'.@$loan_arr[$i]['f8_loan_per'].'");';
														echo '$("#f8_loan_months'.$id.'").val("'.@$loan_arr[$i]['f8_loan_months'].'");';
														echo '$("#f8_emi_paid'.$id.'").val("'.@$loan_arr[$i]['f8_emi_paid'].'");';
														echo '$("#f8_total_amount'.$id.'").val("'.@$loan_arr[$i]['f8_total_amount'].'");';
														echo '$("#f8_total_interest'.$id.'").val("'.@$loan_arr[$i]['f8_total_interest'].'");';
														echo '$("#f8_outstanding_principal'.$id.'").val("'.@$loan_arr[$i]['f8_outstanding_principal'].'");';
														echo '$("#f8_sanction_date'.$id.'").val("'.@$loan_arr[$i]['f8_sanction_date'].'");';
													?>
													</script>
                                                    <?php 
													  
													 
													 }
													?>
                                                    
                                                    </div><!--loans_type End-->
                                                    
                                                    <div style="padding:5px;border:1px solid #d6d6d6;margin:5px;">
	                                            	<input type="button" class="btn btn-warning" value="Add New" onClick="addMoreLoan();" id="addLoanType"/>
                                                    <input type="button" style="display:none; float:right" class="btn btn-danger " value="Remove" data-toggle="modal" data-target="#confirm_box" data-backdrop="static" id="removeLoanType"/>  
                                                    </div>

												</div>

	                                            <div class="control-group">
													<label for="text" class="control-label" style="margin-top:10px">Amount Borrowed from the Private Lenders / Friends and Family / Pawn Brokers?
													<span style="color:#F00">*</span></label>
													<div class="controls">
														<select id="f8_private_lenders" name="f8_private_lenders" class="input-xlarge" data-rule-required="true">
															<option value="" disabled selected> Select here</option>
															<option value="yes"> Yes</option>
															<option value="no"> No</option>
														</select>
													</div>
	                                            </div><!--from the Private Lenders ?-->
                                                
                                                
                                                
                                                <div id="private_lenders" style="display: none;background-color: rgba(0,0,0,0.02); padding: 10px; box-shadow: 1px 1px 2px gray; margin: 20px;">                
                                                   
                                                    <div class="control-group">
	                                                    <label for="numberfield" class="control-label">When did you borrow the loan?<span style="color:#F00">*</span></label>
	                                                    <div class="controls">
	                                                        <input type="text" data-provide="datepicker" class="input-xlarge ui-wizard-content datepicker" placeholder="Borrowed Date" name="f8_borrowed_amount_date" id="f8_borrowed_amount_date" data-rule-required="true"    data-rule-maxlength="10">
	                                                        </div>
	                                            	</div>
                                                   
                                             	  	<div class="control-group">
	                                                    <label for="numberfield" class="control-label">Mention the Borrowed amount<span style="color:#F00">*</span></label>
	                                                    <div class="controls">
	                                                        <input type="text" class="input-xlarge ui-wizard-content" placeholder="Borrowed amount" name="f8_borrowed_amount" id="f8_borrowed_amount" data-rule-required="true"  onKeyPress="return numsonly(event);"    data-rule-maxlength="10">
	                                                    </div>
	                                            	</div>
                                                    
                                                    <div class="control-group">
	                                                    <label for="numberfield" class="control-label">Rate of Interest<span style="color:#F00">*</span></label>
	                                                    <div class="controls">
	                                                        <input data-rule-required="true" type="text" class="input-xlarge ui-wizard-content" placeholder="Rate of Interest" name="f8_borrowed_loan_per" id="f8_borrowed_loan_per" data-rule-number="true"   data-rule-maxlength="5">
	                                                    </div>
	                                            	</div>
                                                    
                                                    <div class="control-group">
	                                                    <label for="numberfield" class="control-label">Loan tenure in Months<span style="color:#F00">*</span></label>
	                                                    <div class="controls">
	                                                        <input data-rule-required="true" type="text" class="input-xlarge ui-wizard-content" placeholder="No.Of Months" name="f8_borrowed_loan_month" id="f8_borrowed_loan_month" onChange="cal_borrowedEMI(0)" data-rule-number="true"   data-rule-maxlength="5">
	                                                    </div>
	                                            	</div>
                                                    
                                                    <div class="control-group">
	                                                    <label for="numberfield" class="control-label">Total Loan Amount<span style="color:#F00">*</span></label>
	                                                    <div class="controls">
	                                                        <input data-rule-required="true" type="text" class="input-xlarge ui-wizard-content" placeholder="Total Loan Amount" name="f8_borrowed_total_amount" id="f8_borrowed_total_amount"  readonly data-rule-number="true"   data-rule-maxlength="10">
	                                                    </div>
	                                            	</div>
                                                    
                                                    <div class="control-group">
	                                                    <label for="numberfield" class="control-label">Total Loan Interest</label>
	                                                    <div class="controls">
	                                                        <input data-rule-required="true" type="text" class="input-xlarge ui-wizard-content" placeholder="Total Loan Interest" name="f8_borrowed_total_int" id="f8_borrowed_total_int"  readonly data-rule-number="true"   data-rule-maxlength="10">
	                                                    </div>
	                                            	</div>
                                                    
                                                    <div class="control-group">
	                                                    <label for="numberfield" class="control-label">EMI per month<span style="color:#F00">*</span></label>
	                                                    <div class="controls">
	                                                        <input type="text" class="input-xlarge ui-wizard-content" placeholder="EMI" name="f8_borrowed_amount_emi" id="f8_borrowed_amount_emi" readonly onKeyPress="return numsonly(event);"    data-rule-maxlength="10">
	                                                        </div>
	                                            	</div>
                                                    
                                                    <div class="control-group">
	                                                    <label for="numberfield" class="control-label">How Much Emi Paid?<span style="color:#F00">*</span></label>
	                                                    <div class="controls">
	                                                        <input type="text" data-provide="datepicker" class="input-xlarge ui-wizard-content" placeholder="Emi Paid" name="f8_borrowed_emi_paid" id="f8_borrowed_emi_paid" onChange="cal_borrowedEMI(1)"  data-rule-required="true" onKeyPress="return numsonly(event);"  maxlength="10">
	                                                        </div>
	                                            	</div>
                                                    
                                                    
                                                    
                                                    
                                                    <div class="control-group">
	                                                    <label for="numberfield" class="control-label">How much loan is Outstanding to be paid with Interest?<span style="color:#F00">*</span></label>
	                                                    <div class="controls">
	                                                        <input data-rule-required="true" type="text" class="input-xlarge ui-wizard-content" placeholder="Outstanding Amount With Interest" name="f8_borrowed_outstanding_amount" readonly id="f8_borrowed_outstanding_amount"  onKeyPress="return numsonly(event);"    data-rule-maxlength="10">
	                                                        </div>
	                                            	</div>
                                                    
                                                    
                                                    
                                                    <div class="control-group">
	                                                    <label for="numberfield" class="control-label">How much loan is Outstanding to be paid?<span style="color:#F00">*</span></label>
	                                                    <div class="controls">
	                                                        <input data-rule-required="true" type="text" class="input-xlarge ui-wizard-content" placeholder="Outstanding Amount" name="f8_borrowed_outstanding_principal" readonly id="f8_borrowed_outstanding_principal"  onKeyPress="return numsonly(event);"    data-rule-maxlength="10">
	                                                        </div>
	                                            	</div>
                                                    
                                                    <div class="control-group">
	                                                    <label for="numberfield" class="control-label">Therefore, No. of Months to clear Outstanding</label>
	                                                    <div class="controls">
	                                                        <input data-rule-required="true" type="text" class="input-xlarge ui-wizard-content" placeholder="Remaining EMI" name="f8_borrowed_amount_emi_rem" id="f8_borrowed_amount_emi_rem" data-rule-number="true" readonly   data-rule-maxlength="10">
	                                                        </div>
	                                            	</div>
                                                    
                                                
                                                </div>

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
        <p >Are you sure want to remove loan?</p>
        
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-primary" onclick="addMoreLoan(1);" data-dismiss="modal">Yes</button>&nbsp;
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
      </div>
     </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
      
      <script type="text/javascript">
    	
		    $('#frm_loan_detail').on('submit', function(e) {
			e.preventDefault();
			if ($('#frm_loan_detail').valid())
			{
				loading_show();	
				$.ajax({
						type: "POST",
						url: "action_pages/action_frm8.php",
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
							window.location.href="acrefinfrm_9.php?pag=farmers&fm_id=<?php echo $fm_id; ?>";
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
			$('#fx_monthly_income').val('<?= @$data['fx_monthly_income']; ?>');
			$('#f8_loan_taken').val('<?= @$data['f8_loan_taken']; ?>');
			$('#f8_private_lenders').val('<?= @$data['f8_private_lenders']; ?>');
			
			$('#f8_borrowed_amount').val('<?= @$data['f8_borrowed_amount']; ?>');
			$('#f8_borrowed_amount_date').val('<?= @$data['f8_borrowed_amount_date']; ?>');
			$('#f8_borrowed_outstanding_amount').val('<?= @$data['f8_borrowed_outstanding_amount']; ?>');
			$('#f8_borrowed_outstanding_principal').val('<?= @$data['f8_borrowed_outstanding_principal']; ?>');
			$('#f8_borrowed_amount_emi').val('<?= @$data['f8_borrowed_amount_emi']; ?>');
			$('#f8_borrowed_amount_emi_rem').val('<?= @$data['f8_borrowed_amount_emi_rem']; ?>');
			$('#f8_borrowed_loan_per').val('<?= @$data['f8_borrowed_loan_per']; ?>');
			
			$('#f8_borrowed_loan_month').val('<?= @$data['f8_borrowed_loan_month']; ?>');
			$('#f8_borrowed_emi_paid').val('<?= @$data['f8_borrowed_emi_paid']; ?>');
			$('#f8_borrowed_total_amount').val('<?= @$data['f8_borrowed_total_amount']; ?>');
			$('#f8_borrowed_total_int').val('<?= @$data['f8_borrowed_total_int']; ?>');
		
			
			calTotal();
			
		
		   if($('#num_of_loan').val()>1)
		   {
			  $('#removeLoanType').css('display','block');
		   }
		   var f8_loan_taken = $('#f8_loan_taken').val();
			
			    if(f8_loan_taken == 'yes')
				{
					$('#loan_taken').show('swing');
				}
				else
				{
					$('#loan_taken').hide('swing');
				}
				
			var private_lenders = $('#f8_private_lenders').val();	
			
				if(private_lenders == 'yes'){
					$('#private_lenders').show('swing');
				}
				else
				{
					$('#private_lenders').hide('swing');
				}
				calTotal();
			
		});
	
    </script>
    
    
    <script type="text/javascript">
			
		$('.datepicker').datepicker({format:'yyyy-mm-dd'});		
					  
		function cal_borrowedEMI(outstanding)
		{
			
				/*E = P * r (1+r)^n / ((1+r)^n - 1) 
				where E = Emi
 	 				  P = Principal Amount
 	 	 			  r = rate of interest per month (r/12/100)
 	  				  n=  no of months	 */
			
			var r   		= 0; // Rate of Interest per month
		    var p           = $('#f8_borrowed_amount').val();
			var r1          = $('#f8_borrowed_loan_per').val();
			var n           = $('#f8_borrowed_loan_month').val();
			var E   		= 0; // Emi Per Month
			var totPayment = 0; // Total Payment (Principal + Interest)
			var totInt     = 0; // Total Interest Payable
			
		
		    if(outstanding==1)
			{
			
				f8_borrowed_emi_paid = parseInt($('#f8_borrowed_emi_paid').val());
				
				if(f8_borrowed_emi_paid > n)
				{
						alert('Please Enter Correct Value');
						$('#f8_borrowed_emi_paid').val("");
				}
			
			}
		if(p!="" && r1!="" && n !="")
		{	 
			r = (r1/1200);
			E = p * r * Math.pow((1+r),n) / (Math.pow((1+r),n)- 1);
			totPayment = E * n;
			totInt	= totPayment - p;
			final_E = Math.round(E);
			
			final_totInt = Math.round(totInt);
			
			final_totPayment = Math.round(totPayment);
			
            $('#f8_borrowed_amount_emi').val(final_E);
			$('#f8_borrowed_total_int').val(final_totInt);
			$('#f8_borrowed_total_amount').val(final_totPayment);
			
			if(outstanding==1)
			{
				f8_borrowed_emi_paid = $('#f8_borrowed_emi_paid').val();
			
				if(f8_borrowed_emi_paid!="")
				{
					var oustanding_loan_interest = Number(totPayment) -(Number(E) * Number(f8_borrowed_emi_paid));
					
					$('#f8_borrowed_outstanding_amount').val(Math.round(oustanding_loan_interest));
					
					remaining_int =(totInt/n);
					remaining_int =(remaining_int * (n-f8_borrowed_emi_paid))
					
					oustanding_loan    =oustanding_loan_interest-remaining_int;
					if(oustanding_loan_interest==0)
					{
						oustanding_loan =0;
					}
					$('#f8_borrowed_outstanding_principal').val(Math.round(oustanding_loan));
					
					
				}
			}
		}
			calTotal();
		}
		
		function cal_loanEMI(num,outstanding)
		{
			var r   		= 0; // Rate of Interest per month
		    var p           = parseInt($('#f8_loan_amount'+num).val()) || 0;
			var r1          = parseFloat($('#f8_loan_per'+num).val()) || 0;
			var n           = parseInt($('#f8_loan_months'+num).val()) || 0;
			var E   		= 0; // Emi Per Month
			var totPayment  = 0; // Total Payment (Principal + Interest)
			var totInt      = 0; // Total Interest Payable
			oustanding_loan_amt =0;
			
			if(outstanding==1)
			{
				f8_emi_paid = parseInt($('#f8_emi_paid'+num).val());
				if(f8_emi_paid>n)
				{
						alert('Please Enter Correct Value');
						$('#f8_emi_paid'+num).val("");
				}
			
			}
			
			
			if(p!="" && r1!="" && n !="")
			{
				r = (r1/1200);
				E = p * r * Math.pow((1+r),n) / (Math.pow((1+r),n)- 1);
				totPayment = E * n;
				totInt	= totPayment - p;
				
				final_E = Math.round(E);
				
				final_totInt = Math.round(totInt);
		
				final_totPayment = Math.round(totPayment);
				
				$('#f8_loan_emi'+num).val(final_E);
				$('#f8_total_interest'+num).val(final_totInt);
				$('#f8_total_amount'+num).val(final_totPayment);
				
				if(outstanding==1)
				{
					var f8_loan_emi_paid = $('#f8_emi_paid'+num).val();
					if(f8_loan_emi_paid!="")
					{
						oustanding_loan_amt_interest = Number(totPayment) -(Number(E) * Number(f8_loan_emi_paid));
						$('#f8_outstanding_loan'+num).val(Math.round(oustanding_loan_amt_interest));
						
						remaining_int =(totInt/n);
						remaining_int =(remaining_int * (n-f8_loan_emi_paid))
						
						oustanding_loan_amt    =oustanding_loan_amt_interest-remaining_int;//totInt;
						
						if(oustanding_loan_amt_interest==0)
						{
							oustanding_loan_amt =0;
						}
						
						
						
						
						$('#f8_outstanding_principal'+num).val(Math.round(oustanding_loan_amt));
						
					}
				}
			}
			
			
			
			
			calTotal();
		}
		
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



                                        