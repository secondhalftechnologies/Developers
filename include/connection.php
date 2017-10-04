<?php 
	//error_reporting(1);
	//ini_set('display_errors','on');
	ini_set('memory_limit','-1');
	date_default_timezone_set('Asia/Kolkata');
	$fm_caid 	= "";
	$date 		= new DateTime(null, new DateTimeZone('Asia/Kolkata'));
	$datetime 	= $date->format('Y-m-d H:i:s');
	
	$theme_name = "theme-green";
	
	$json 	= file_get_contents('php://input');
	$obj 	= json_decode($json);
	
	if ($_SERVER['HTTP_HOST'] == "localhost" || preg_match("/^192\.168\.0.\d+$/",$_SERVER['HTTP_HOST'])) 
	{
        $dbserver = "localhost"; // Database Server
        $dbuname = "root"; // Database Username
        $dbpass = ""; // Database Password
        $dbname = "sqyard_2017"; // Database Name
		if ($_SERVER['HTTP_HOST'] == "localhost")
		{
			$BaseFolder = "http://localhost/sqoreyard/";	
		}
		else
		{
			$BaseFolder = "http://192.168.0.13/sqoreyard/";
		}
	}
	else
	{
        $dbserver = "localhost"; // Database Server
        $dbuname = "sqyard_2017"; // Database Username
        $dbpass = "Sqyard@!2017"; // Database Password
        $dbname = "sqyard_2017"; // Database Name
        $BaseFolder = "http://www.sqoreyard.com/sqyardpanel/"; // BaseFolder Path have to write here	
	}
	
	$db_con = mysqli_connect("localhost",$dbuname, $dbpass) or die("Can not connect to Database");
	if($db_con)
	{
		mysqli_select_db($db_con,$dbname) or die(mysqli_error($db_con));
		$_SESSION['backend_user'] 	= "";
		$logged_uid 			= 0;
		define('BASE_FOLDER',$BaseFolder);
	}
	
	
	
	if(isset($_REQUEST['fm_id']) && $_REQUEST['fm_id']!=  "")
	{
		include('query-helper.php');
	  	$check_exist = checkExist('tbl_farmers',array('fm_id'=>$_REQUEST['fm_id']),array(),array(),array());
			           
			if(!$check_exist)
			{ ?>

		    <script type="text/javascript">
	alert("Farmer Id not Found...!");
	window.open('view_farmers.php?pag=farmers','_self');
	</script>
			<?php }
	}
	
	if((isset($obj->getLogin)) == '1' && (isset($obj->getLogin)))
	{
		 
		$response_array	= array();
		$username		= $obj->username;
		$password		= $obj->password;
		
		// Query for checking user is exist or not
		$sql_isexist	= " SELECT * FROM `tbl_change_agents` WHERE `emailId`='".$username."' ";
		$res_isexist	= mysqli_query($db_con, $sql_isexist) or die(mysqli_error($db_con));
		$num_isexist	= mysqli_num_rows($res_isexist);
		
		if($num_isexist != 0)
		{
			$row_isexist	= mysqli_fetch_array($res_isexist);
			$reg_name       = $row_isexist['fname'];
			$reg_status		= $row_isexist['reg_status'];
			$reg_caid 		= $row_isexist['id'];
			
			if($reg_status == 1)
			{
				$tbl_pssword	= $row_isexist['password'];
						
				if(strcmp($password, $tbl_pssword) === 0)
				{
					session_start();
					$_SESSION['acrefin_user'] 	= $reg_name;
					$_SESSION['userType']     	=  'changeagent';
					$_SESSION['ca_id']			=	$reg_caid;
					$_SESSION['fm_caid']	  	=	$reg_caid;
					
					$response_array	= array("Success"=>"Success", "resp"=>"home.php");
				}
				else
				{
					$response_array	= array("Success"=>"fail", "resp"=>"Password not matched");	
				} 
			}
			else
			{
				$response_array	= array("Success"=>"Success", "resp"=>"checkmail.php");			
			}
		}	
		else
		{
			$response_array	= array("Success"=>"fail", "resp"=>"User not exist");	
		}
		echo json_encode($response_array);	
	}
	
/* START : SMS Gateway [By Prathamesh on 15-03-2017] */
function send_sms_msg($mob, $data_msg)
{
	$data_msg = str_replace("<p>","",$data_msg);
	$data_msg = str_replace("</p>","",$data_msg);
	$data = '<?xml version="1.0" encoding="UTF-8"?>';
	$data .=<<<EOF
<xmlapi>
<auth>
<apikey>9422pzc28y9ud2ul3y5e</apikey>
</auth>
<sendSMS>
<to></to>
<text></text>
<msgid>0</msgid>
<sender>ACREFIN</sender>
</sendSMS>
<response>Y</response>
</xmlapi>
EOF;

	 if (preg_match("/^\d{10}$/",$mob)) 
	 {
		//$count_sms++;
		$data = str_replace("<to></to>","<to>".$mob."</to>",$data);
		$data = str_replace("<text></text>","<text>".$data_msg."</text>",$data);
		//print sprintf("%04d",$count_sms)." => ".$mobile_num." => ".$data."<br/><hr/>";

		$url = "http://alerts.sinfini.com/api/xmlapi.php?data=".urlencode($data);
		$ch=curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$output=curl_exec($ch);
		curl_close($ch);
		//return $output;
	}
}
/* END : SMS Gateway [By Prathamesh on 15-03-2017] */
	
	function generateRandomStringMobileVerification($length)
	{
		$characters = '123456789';
		$randomString = '';
		for ($i = 0; $i < $length; $i++) 
		{
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $randomString;
	}
	
	if((isset($obj->sendOTP)) == '1' && (isset($obj->sendOTP)))
	{
		$response_array		= array();
		$mobile_num			= $obj->mobile_num;
		$verify_count		= 1;
		$cust_mobile_status	= 0;
		
		if($mobile_num != '')
		{
			$cust_mobile_status	= generateRandomStringMobileVerification(5);
			
			if(strlen($cust_mobile_status) == 5)
			{
				$sql_cust_mobile_query	= " SELECT * FROM `tbl_mobile_otp` WHERE `mobile_num`='".$mobile_num."' ";
				$res_cust_mobile_query	= mysqli_query($db_con, $sql_cust_mobile_query) or die(mysqli_error($db_con));
				$num_cust_mobile_query	= mysqli_num_rows($res_cust_mobile_query);
				
				if($num_cust_mobile_query == 0)
				{
					// Query For Inserting the OTP Record into tbl_mobile_otp table
					$sql_insert_otp	= " INSERT INTO `tbl_mobile_otp`(`mobile_num`, `otp_val`, verify_count, created_date) ";
					$sql_insert_otp	.= " VALUES ('".$mobile_num."', '".$cust_mobile_status."', '1', '".$datetime."') ";
					$res_insert_otp	= mysqli_query($db_con, $sql_insert_otp) or die(mysqli_error($db_con));
				}
				else
				{
					$row_cust_mobile_query	= mysqli_fetch_array($res_cust_mobile_query);
					$cust_mobile_status	= $row_cust_mobile_query['otp_val'];
					$verify_count		= $row_cust_mobile_query['verify_count'] + 1;
					
					if($verify_count < 4)
					{
						// Query For Updating the OTP Value
						$sql_update_otp	= " UPDATE `tbl_mobile_otp` ";
						$sql_update_otp	.= " 	SET `verify_count`='".$verify_count."', ";
						$sql_update_otp	.= " 	 	`modified_date`='".$datetime."' ";
						$sql_update_otp	.= " WHERE `mobile_num`='".$mobile_num."' ";
						$res_update_otp	= mysqli_query($db_con, $sql_update_otp) or die(mysqli_error($db_con));			
					}
				}
				
				if($cust_mobile_status != 1)
				{
					if($verify_count < 4)
					{
						// Send SMS of register verify
						$sms_text	= '';
						$sms_text	.= "Your unique verification code for Times Women's Drive 2017 is ".$cust_mobile_status.". Thank you";
						 
						send_sms_msg($mobile_num, $sms_text);
						
						$response_array	= array("Success"=>"Success", "resp"=>"Success");	
					}
					else
					{
						$response_array	= array("Success"=>"limit_over", "resp"=>"Sorry, SMS Limit is Over");
					}
				}
				else
				{
					$response_array	= array("Success"=>"verify", "resp"=>"Already Verified User, Please Use any other number");
				}
			}
			else
			{
				$response_array	= array("Success"=>"fail", "resp"=>"OTP Not Sent, Please Try again");	
			}
		}
		else
		{
			$response_array	= array("Success"=>"fail", "resp"=>"Please Enter a valid Mobile Number");	
		}
		echo json_encode($response_array);	
	}
	
	if((isset($obj->verifyOTP))=='1' && (isset($obj->verifyOTP)))
	{
		$response_array	= array();
		$mobile_num		= $obj->mobile_num;
		$otp_val		= $obj->otp_val;
		
		if($otp_val	!= '' && $mobile_num != '')
		{
			// Query For getting the record
			$sql_get_record	= " SELECT * FROM `tbl_mobile_otp` WHERE `mobile_num`='".$mobile_num."' AND otp_val = '".$otp_val."' ";
			$res_get_record	= mysqli_query($db_con, $sql_get_record) or die(mysqli_error($db_con));
			$num_get_record	= mysqli_num_rows($res_get_record);
			
			if($num_get_record != 0)
			{
				// Query For Update the Records
				$sql_update_mobile_otp	= " UPDATE `tbl_mobile_otp` ";
				$sql_update_mobile_otp	.= " 	SET `otp_val`='1' ";
				$sql_update_mobile_otp	.= " WHERE `mobile_num`='".$mobile_num."' ";
				$sql_update_mobile_otp	.= " 	AND `otp_val`='".$otp_val."' ";
				$res_update_mobile_otp	= mysqli_query($db_con, $sql_update_mobile_otp) or die(mysqli_error($db_con));
				
				if($res_update_mobile_otp)
				{
					$response_array	= array("Success"=>"Success", "resp"=>"Success");	
				}
				else
				{
					$response_array	= array("Success"=>"fail", "resp"=>"Ooops, Someting went wrong");
				}
			}
			else
			{
				$response_array	= array("Success"=>"fail", "resp"=>"OTP Not Matched");	
			}
		}
		else
		{
			$response_array	= array("Success"=>"fail", "resp"=>"Empty Data");	
		}
		echo json_encode($response_array);	
	}
	
	// ======================================================================================
	// START : PayU Money
	// ======================================================================================
	if((isset($obj->placeOrder)) == '1' && (isset($obj->placeOrder)))
	{
		$response_array	= array();
		$cust_session	= trim(mysqli_real_escape_string($db_con, $obj->cust_session));
		$hid_user_id	= trim(mysqli_real_escape_string($db_con, $obj->hid_user_id));
		$hid_user_name	= trim(mysqli_real_escape_string($db_con, $obj->hid_user_name));
		$phone			= trim(mysqli_real_escape_string($db_con, $obj->hid_user_phone));
		
		if($cust_session != '')
		{
			$ord_id         = 'TORD-'.date('dmy').'-ON-'.$hid_user_id;
			
			// Query For checking the user is exist or not in order table with status 0
			$sql_chk_user	= " SELECT * FROM `tbl_order` WHERE `ord_custid`='".$hid_user_id."' AND `ord_status`='0' ";
			$res_chk_user	= mysqli_query($db_con, $sql_chk_user) or die(mysqli_error($db_con));
			$num_chk_user	= mysqli_num_rows($res_chk_user);
			
			if($num_chk_user == 0)
			{
				// Insert Query
				$sql_insrt_into_tbl_ord	= " INSERT INTO `tbl_order`(`ord_id`, `ord_custid`, `ord_amount`, `ord_resp_code`, `ord_resp`, ";
				$sql_insrt_into_tbl_ord	.= " `ord_status`, `ord_created_date`) ";
				$sql_insrt_into_tbl_ord	.= " VALUES ('".$ord_id."', '".$hid_user_id."', '24150', '', '', ";
				$sql_insrt_into_tbl_ord	.= " '0', '".$datetime."') ";
				$res_insrt_into_tbl_ord	= mysqli_query($db_con, $sql_insrt_into_tbl_ord) or die(mysqli_error($db_con));
			}
			else
			{
				// Update Query
				$sql_update_tbl_ord		= " UPDATE `tbl_order` ";
				$sql_update_tbl_ord		.= " 	SET `ord_id`='".$ord_id."', ";
				$sql_update_tbl_ord		.= " 		`ord_custid`='".$hid_user_id."', ";
				$sql_update_tbl_ord		.= " 		`ord_amount`='24150', ";
				$sql_update_tbl_ord		.= " 		`ord_resp_code`='', ";
				$sql_update_tbl_ord		.= " 		`ord_resp`='', ";
				$sql_update_tbl_ord		.= " 		`ord_status`='0', ";
				$sql_update_tbl_ord		.= " 		`ord_modified_date`='".$datetime."' ";
				$sql_update_tbl_ord		.= " WHERE `ord_custid`='".$hid_user_id."' ";
				$sql_update_tbl_ord		.= " 	AND `ord_status`='0' ";
				$res_update_tbl_ord		= mysqli_query($db_con, $sql_update_tbl_ord	) or die(mysqli_error($db_con));
			}
			
			$ord_total		= '24150';
			//$ord_total		= '1';
			$buyer_name		= $hid_user_name;
			// Merchant key here as provided by Payu
			$MERCHANT_KEY 	= "TLi2BwqU";

			// Merchant Salt as provided by Payu
			$SALT 			= "BGwdXEzUgn";

			// End point - change to https://secure.payu.in for LIVE mode						
			
			$PAYU_BASE_URL = "https://payu.in";
			$hash_string = $MERCHANT_KEY.'|'.$ord_id.'|'.$ord_total.'|test|'.$buyer_name.'|'.$cust_session.'|||||||||||'.$SALT;
			$hash = hash('sha512', $hash_string);	
			
			$success_url = $BaseFolder.'/payment/page-order-success.php';
			$failure_url = $BaseFolder.'/payment/page-order-wait.php';
					
			$payudata = '<form method="post" action="https://secure.payu.in/_payment" id="payuPayment">';
			//$payudata = '<form method="post" action="https://test.payu.in/_payment" id="payuPayment">';
			$payudata .= '<input type="hidden" name="key" value="'.$MERCHANT_KEY.'" />';
			$payudata .= '<input type="hidden" name="hash" value="'.$hash.'"/>';
			//$payudata .= '<input type="hidden" name="hashstring" value="'.$hash_string.'"/>';
			$payudata .= '<input type="hidden" name="txnid" value="'.$ord_id.'" />';
			$payudata .= '<input type="hidden" name="amount" value="'.$ord_total.'" />';
			$payudata .= '<input type="hidden" name="firstname" value="'.$buyer_name.'" />';
			$payudata .= '<input type="hidden" name="email" value="'.$cust_session.'" />';
			$payudata .= '<input type="hidden" name="phone" value="'.$phone.'" />';
			$payudata .= '<input type="hidden" name="productinfo" value="test" />';
			$payudata .= '<input type="hidden" name="service_provider" value="payu_paisa" size="64" />';
			$payudata .= '<input type="hidden" name="surl" value="'.$success_url.'" />';
			$payudata .= '<input type="hidden" name="furl" value="'.$failure_url.'" />';
			$payudata .= '</form>';
			
			$response_array = array("Success"=>"Success","resp"=>"Order process","url"=>"payu","paymentData"=>"".utf8_encode($payudata));
		}
		else
		{
			$response_array	= array("Success"=>"fail", "resp"=>"Ooops, something went wrong, Please try again after sometime.");
		}
		echo json_encode($response_array);
	}
	// ======================================================================================
	// END : PayU Money
	// ======================================================================================
	
	function loader()
	{
		?>
        <div id="lodermodal"></div>
        <div id="loderfade"></div>
        <script type="text/javascript">
            
           $(document).ready(function()
           {
        
                $('.frm-link').on('click', function(){
                        var ids    =this.id;
                        var ids    = ids.split('_');
                        var fm_id  =ids[1];
                        var frm_id =ids[0];
                        go_to_form(frm_id,fm_id);
                    });
               
           });
        
        
           function loading_show()
            {
                document.getElementById('lodermodal').style.display = 'block';
                document.getElementById('loderfade').style.display = 'block';
            }
            function loading_hide()
            {
                document.getElementById('lodermodal').style.display = 'none';
                document.getElementById('loderfade').style.display = 'none';
            }
        
            function go_to_form(frm_id,fm_id)
            {
                loading_show();
                location.assign("acrefinfrm_"+frm_id+".php?pag=farmers&fm_id="+fm_id); 
                loading_hide();
            }
            
        </script>
		<?php 
	}
	
	function headerdata($feature_name)
	{
		?>
		<title><?php echo $feature_name; ?></title>
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
    
        
        <script src="js/plugins/jquery-ui/jquery.ui.widget.min.js"></script>
        <!--	<script src="js/bootstrap.min.js"></script> -->	
        <script src="js/plugins/validation/jquery.validate.min.js"></script>
        <script src="js/plugins/validation/additional-methods.min.js"></script>
        <script src="js/plugins/wizard/jquery.form.wizard.min.js"></script>
        <script src="js/plugins/datepicker/bootstrap-datepicker.js"></script>
        <script src="js/js_validator.js"></script>
		
		<script type="text/javascript">
        	$(document).ready(function(){
				$('.datepicker').datepicker({format:'yyyy-mm-dd'});	
			});
        </script>
                
        <!-- Favicon -->
        <link rel="shortcut icon" href="img/favicon.ico" />
        <!-- Apple devices Homescreen icon -->
        <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-precomposed.png" />
		<?php
	}
	
	function modelPopUp()
	{
		?>
		<div class="modal fade" id="error_model" role="dialog">
		<div class="modal-dialog">    
		  <!-- Modal content-->
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body text-center" id="model_body">
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		  </div>      
		</div>
	  </div>
		<?php
	}
	
	function navigation_menu()
	{
		?>
			<div id="navigation">
				<div class="container-fluid" >
					<a href="view_dashboard.php?pag=Dashboard" id="brand">
                    	Admin Panel<!--<img src="img/logo.png" style="height:40px;">-->
                    </a>
                    <!-- main menu -->
					<?php 
						$filepath = "include/admin_menu.php";
						include($filepath);
					?>
					<!-- main menu -->
				</div>
			</div>	
		<?php
	}
	
	function breadcrumbs($home_url,$home_name,$title,$filename,$feature_name)
	{
		?>
			<div class="page-header">
				<div class="pull-left">
					<h1><?php print $feature_name ?></h1>
				</div>
				<?php 
					date_default_timezone_set("Asia/Calcutta");
					$dt=date('F d, Y');
					$week=date('l');
				?>
				<div class="pull-right" style="margin-left:5px;">
					<ul class="stats">
						<li class='lightred'>
							<i class="icon-calendar"></i>
							<div class="details">
								<span class="big"><?php echo $dt; ?></span>
								<span><?php echo $week; ?></span>
							</div>
						</li>
					</ul>
				</div>
			</div> <!-- date BOX on right side-->
			<div class="breadcrumbs">
				<ul>
					<li>
						<a href="<?php echo $home_url; ?>"><?php echo $home_name; ?></a>
						<i class="icon-angle-right"></i>
					</li>
					<li>
						<a href="<?php echo $filename; ?>?pag=<?php echo $feature_name; ?>"><?php echo $feature_name; ?></a>
						<i class="icon-angle-right"></i>
					</li>
					<li>
						<a href="#"><?php echo $title; ?></a>
					</li>
				</ul>
				<?php /*?><div class="close-bread">
					<a href="#"><i class="icon-remove"></i></a>
				</div><?php */?>
			</div> <!--breadcrumb-->
		<?php
	}
?>