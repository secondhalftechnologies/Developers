<?php 
	//error_reporting(1);
	//ini_set('display_errors','on');
	ini_set('memory_limit','-1');
	date_default_timezone_set('Asia/Kolkata');
	$fm_caid ="";
	$date 				= new DateTime(null, new DateTimeZone('Asia/Kolkata'));
	$datetime 			= $date->format('Y-m-d H:i:s');
	
	$json 	= file_get_contents('php://input');
	$obj 	= json_decode($json);
	
	if ($_SERVER['HTTP_HOST'] == "localhost" || preg_match("/^192\.168\.0.\d+$/",$_SERVER['HTTP_HOST'])) 
	{
        $dbserver = "localhost"; // Database Server
        $dbuname = "root"; // Database Username
        $dbpass = ""; // Database Password
        $dbname = "sqyard_2017"; // Database Name
		$BaseFolder = "http://localhost/sqoreyard/";
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
	  $check_exist = check_exist('tbl_farmers',array('fm_id'=>$_REQUEST['fm_id']),array(),array(),array());
			
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
					$_SESSION['acrefin_user'] = $reg_name;
					$_SESSION['userType']     =  'changeagent';
					$_SESSION['ca_id']			  =	$reg_caid;
					$_SESSION['fm_caid']	  =	$reg_caid;
					
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
	
	
function insert($table, $variables = array() )
{
			//Make sure the array isn't empty
			global $db_con;
			if( empty( $variables ) )
			{
				return false;
				exit;
			}
			
			$sql = "INSERT INTO ". $table;
			$fields = array();
			$values = array();
			foreach( $variables as $field => $value )
			{
				$fields[] = $field;
				$values[] = "'".$value."'";
			}
			$fields = ' (' . implode(', ', $fields) . ')';
			$values = '('. implode(', ', $values) .')';
			
			$sql .= $fields .' VALUES '. $values;
	
			$result		= mysqli_query($db_con,$sql) or die(mysqli_error($db_con));
			
			if($result)
			{
				return mysqli_insert_id($db_con);
			}
			else
			{
				return false;
			}
	}
	
function quit($msg,$Success="")
{
		if($Success ==1)
		{
			$Success="Success";
		}
		else
		{
			$Success="fail";
		}
		echo json_encode(array("Success"=>$Success,"resp"=>$msg));
		exit();
	}

function check_exist($table,$where,$not_where_array,$and_like_array,$or_like_array)
{
		
		global $db_con;
	
		$sql =" SELECT * FROM ".$table." ";
		$sql .=" WHERE 1 = 1 ";
		
		//==Check Where Condtions=====//
		if(!empty($where))
		{
			foreach($where as $field1 => $value1 )
			{   
				$sql  .= " AND ".$field1 ."='".$value1."' ";
			}
		}
		
		//==Check Not Equal Condtions=====//
		if(!empty($not_where_array))
		{
			foreach($not_where_array as $field2 => $value2 )
			{   
				$sql  .= " AND ".$field2 ."!='".$value2."' ";
			}
		}
		
		//==Check AND Like Condtions=====//
		if(!empty($and_like_array))
		{
			foreach($and_like_array as $field3 => $value3 )
			{   
				$sql  .= " AND ".$field3 ." like '".$value3."' ";
			}
		}
		//==Check AND Like Condtions=====//
		if(!empty($or_like_array))
		{
			foreach($or_like_array as $field4 => $value4 )
			{   
				$sql  .= " AND ".$field4 ." like '".$value4."' ";
			}
		}
	
		$result	   = mysqli_query($db_con,$sql) or die(mysqli_error($db_con));
		$nums      = mysqli_num_rows($result);
		if($nums ==0)
		{
			return false;
		}
		else
		{
			$row = mysqli_fetch_array($result);
			return $row['id'];
		}
	}


function lookup_value($table,$col_array,$where,$not_where_array,$and_like_array,$or_like_array)
{
	global $db_con;
	$colums  =implode(',',$col_array);
	$col     =1;
	if($colums=="")
	{
		$colums =' * ';
		$col    ="";
	}
	$sql =" SELECT ".$colums." FROM ".$table." ";
	$sql .=" WHERE 1 = 1 ";
	//==Check Where Condtions=====//
	if(!empty($where))
	{
		foreach($where as $field1 => $value1 )
		{   
			$sql  .= " AND ".$field1 ."='".$value1."' ";
		}
	}
	
	//==Check Not Equal Condtions=====//
	if(!empty($not_where_array))
	{
		foreach($not_where_array as $field2 => $value2 )
		{   
			$sql  .= " AND ".$field2 ."!='".$value2."' ";
		}
	}
	
	//==Check AND Like Condtions=====//
	if(!empty($and_like_array))
	{
		foreach($like_array as $field3 => $value3 )
		{   
			$sql  .= " AND ".$field3 ." like '".$value3."' ";
		}
	}
	//==Check AND Like Condtions=====//
	if(!empty($or_like_array))
	{
		foreach($or_like_array as $field4 => $value4 )
		{   
			$sql  .= " AND ".$field4 ." like '".$value4."' ";
		}
	}
	//return $sql;
	$result	   = mysqli_query($db_con,$sql) or die(mysqli_error($db_con));
	$nums      = mysqli_num_rows($result);
	if($nums !=0)
	{
		
		if($col=="")
		{
			return $result;
		}
		else
		{
			$row = mysqli_fetch_array($result);
			return $row[$colums];
		}
	}
	else
	{
		return false;
	}
}

function update($table, $variables = array(), $where,$not_where_array=array(),$and_like_array=array(),$or_like_array=array())
{
        //Make sure the array isn't empty
		global $db_con;
        if( empty( $variables ) )
        {
            return false;
            exit;
        }
        
        $sql = "UPDATE ". $table .' SET ';
        $fields = array();
        $values = array();
		
        foreach($variables as $field => $value )
        {   
            $sql  .= $field ."='".$value."' ,";
        }
        $sql   =chop($sql,',');
        
        $sql .=" WHERE 1 = 1 ";
		//==Check Where Condtions=====//
	if(!empty($where))
	{
		foreach($where as $field1 => $value1 )
		{   
			$sql  .= " AND ".$field1 ."='".$value1."' ";
		}
	}
	
	//==Check Not Equal Condtions=====//
	if(!empty($not_where_array))
	{
		foreach($not_where_array as $field2 => $value2 )
		{   
			$sql  .= " AND ".$field2 ."!='".$value2."' ";
		}
	}
	
	//==Check AND Like Condtions=====//
	if(!empty($and_like_array))
	{
		foreach($like_array as $field3 => $value3 )
		{   
			$sql  .= " AND ".$field3 ." like '".$value3."' ";
		}
	}
	//==Check AND Like Condtions=====//
	if(!empty($or_like_array))
	{
		foreach($or_like_array as $field4 => $value4 )
		{   
			$sql  .= " AND ".$field4 ." like '".$value4."' ";
		}
	}

        $result 		= mysqli_query($db_con,$sql) or die(mysqli_error($db_con));
        
        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }
}

function delete($table,$where,$not_where_array=array(),$and_like_array=array(),$or_like_array=array())
{
        //Make sure the array isn't empty
		global $db_con;
        
        
        $sql =" DELETE FROM ".$table." ";
        $sql .=" WHERE 1 = 1 ";
		
		//==Check Where Condtions=====//
		if(!empty($where))
		{
			foreach($where as $field1 => $value1 )
			{   
				$sql  .= " AND ".$field1 ."='".$value1."' ";
			}
		}
	
	//==Check Not Equal Condtions=====//
		if(!empty($not_where_array))
		{
			foreach($not_where_array as $field2 => $value2 )
			{   
				$sql  .= " AND ".$field2 ."!='".$value2."' ";
			}
		}
	
	//==Check AND Like Condtions=====//
		if(!empty($and_like_array))
		{
			foreach($like_array as $field3 => $value3 )
			{   
				$sql  .= " AND ".$field3 ." like '".$value3."' ";
			}
		}
	//==Check AND Like Condtions=====//
		if(!empty($or_like_array))
		{
			foreach($or_like_array as $field4 => $value4 )
			{   
				$sql  .= " AND ".$field4 ." like '".$value4."' ";
			}
		}
  // return $sql;
        $result_check_spec 		= mysqli_query($db_con,$sql) or die(mysqli_error($db_con));
        
        if($result_check_spec)
        {
            return true;
        }
        else
        {
            return false;
        }
}


//Added By Ejaz On 19 May 2017
	
	/*?>function validate($data){
		
		$res[] = [
			'validity' => false,
			'type'     => 'all',
			'message'  => ''
		];
		//required check
		if(isset($data['required'])){
			$dataForCheck = $data['required'];
			foreach ($dataForCheck as $key => $value) {
				if($value != null && $value != '' && !empty($value) && !is_null($value))
				{
					$res[] = [
						'validity' => true,
						'type'     => 'required',
						'message'  => 'Success'
					];
				}
				else
				{
					$res[] = [
						'validity' => false,
						'type'     => 'required',
						'message'  => 'Some required fields are missing'
					];
				}
			}
		}

		return $res;
	} */

//End of Added By Ejaz On 19 May 2017
function loader()
{?>




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


<?php }

	
	
?>