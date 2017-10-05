<?php
	include('access1.php');
	include('include/connection.php');

	$feature_name  = 'Farmer Details';
	$home_name     = "Home";
	$title		   = 'Farmer Details';
	$home_url      = "home.php";
	$filename      = 'view_farmers.php';
	$fm_id         = (isset($_REQUEST['fm_id'])?$_REQUEST['fm_id']:"");
	
	if($fm_id == "" && (!isset($_SESSION['acrefin_user'])) && $_SESSION['acrefin_user']=="")
    {
        ?>
        <script type="text/javascript">
            history.go(-1);
        </script>
        <?php
    }
	
	$result = lookup_value('tbl_points',array(),array("fm_id"=>$fm_id),array(),array(),array());
	if($result)
	{
		$num	= mysqli_num_rows($result);
		if($num !=0)
		{
			$pt_row	= mysqli_fetch_array($result);
		}
	}
	
    $res_spouse_details     = lookup_value('tbl_spouse_details',array(),array("fm_id"=>$fm_id),array(),array(),array());
    if($res_spouse_details)
    {
        $num_spouse_details = mysqli_num_rows($res_spouse_details);

        if($num_spouse_details != 0)
        {
            $row_spouse_details = mysqli_fetch_array($res_spouse_details);

            $data['f3_spouse_fname']            = $row_spouse_details['f3_spouse_fname'];
            $data['f3_spouse_age']              = $row_spouse_details['f3_spouse_age'];
            $data['f3_spouse_mobno']            = $row_spouse_details['f3_spouse_mobno'];
            $data['f3_spouse_adhno']            = $row_spouse_details['f3_spouse_adhno'];
            $data['f3_spouse_shg']              = $row_spouse_details['f3_spouse_shg'];
            $data['f3_spouse_shgname']          = $row_spouse_details['f3_spouse_shgname'];
            $data['f3_spouse_occp']             = $row_spouse_details['f3_spouse_occp'];
            $data['f3_spouse_income']           = $row_spouse_details['f3_spouse_income'];
            $data['f3_spouse_mfi']              = $row_spouse_details['f3_spouse_mfi'];
            $data['f3_spouse_mfiname']          = $row_spouse_details['f3_spouse_mfiname'];
            $data['f3_spouse_mfiamount']        = $row_spouse_details['f3_spouse_mfiamount'];
			$data['f3_affliation_status']		= $row_spouse_details['f3_affliation_status'];
			$data['f3_fpo_name']				= $row_spouse_details['f3_fpo_name'];
			$data['f3_bank_name']				= $row_spouse_details['f3_bank_name'];
        }
    }
	
	$res_applicant_knowledge = lookup_value('tbl_applicant_knowledge',array(),array("fm_id"=>$fm_id),array(),array(),array());
	if($res_applicant_knowledge)
	{
		$num_applicant_knowledge    = mysqli_num_rows($res_applicant_knowledge);
		if($num_applicant_knowledge !=0)
		{
			$row_applicant_knowledge  = mysqli_fetch_array($res_applicant_knowledge);
			$data['f2_edudetail']     = $row_applicant_knowledge['f2_edudetail'];
			$data['f2_proficiency']   = $row_applicant_knowledge['f2_proficiency'];
			$data['f2_participation'] = $row_applicant_knowledge['f2_participation'];
			$data['f2_points']        = $row_applicant_knowledge['f2_points'];
			
			$data['f2_typeprog']      = $row_applicant_knowledge['f2_typeprog'];
			$data['f2_condprog']      = $row_applicant_knowledge['f2_condprog'];
			$data['f2_cropprog']      = $row_applicant_knowledge['f2_cropprog'];
			$data['f2_durprog']       = $row_applicant_knowledge['f2_durprog'];
		}
	}
	
	$res_applicant_phone = lookup_value('tbl_applicant_phone',array(),array("fm_id"=>$fm_id),array(),array(),array());
	if($res_applicant_phone)
	{
		$num_applicant_phone    = mysqli_num_rows($res_applicant_phone);
		if($num_applicant_phone !=0)
		{
			$row_applicant_phone      				= mysqli_fetch_array($res_applicant_phone);
			$data['f5_phonetype']     				= $row_applicant_phone['f5_phonetype'];
			$data['f5_servpro']       				= $row_applicant_phone['f5_servpro'];
			$data['f5_network']       				= $row_applicant_phone['f5_network'];
			$data['f5_datapack']      				= $row_applicant_phone['f5_datapack'];
			$data['f5_datapackname']  				= $row_applicant_phone['f5_datapackname'];
			$data['f5_appuse']        				= $row_applicant_phone['f5_appuse'];
			$data['f5_farmapp']       				= $row_applicant_phone['f5_farmapp'];
			$data['f5_any_one_have_smart_phone']	= $row_applicant_phone['f5_any_one_have_smart_phone'];
			$data['f5_app_name']					= $row_applicant_phone['f5_app_name'];
		}
		else
		{
			$data['f5_phonetype']     				= '';
			$data['f5_servpro']       				= '';
			$data['f5_network']       				= '';
			$data['f5_datapack']      				= '';
			$data['f5_datapackname']  				= '';
			$data['f5_appuse']        				= '';
			$data['f5_farmapp']       				= '';
			$data['f5_any_one_have_smart_phone']	= '';
			$data['f5_app_name']					= '';
		}
	}
	
	$res_family_details = lookup_value('tbl_family_details',array(),array("fm_id"=>$fm_id),array(),array(),array());
	if($res_family_details)
	{
		$num_family_details    = mysqli_num_rows($res_family_details);
		if($num_family_details !=0)
		{
			$row_family_details       = mysqli_fetch_array($res_family_details);
			$data['f6_points']        = $row_family_details['f6_points'];
			$data['f6_jointfamily']   = $row_family_details['f6_jointfamily'];
			$data['f6_members']       = $row_family_details['f6_members'];
			$data['f6_children']      = $row_family_details['f6_children'];
			$data['f6_smartuse']      = $row_family_details['f6_smartuse'];
		}
		else
		{
			$data['f6_points']        = '';
			$data['f6_jointfamily']   = '';
			$data['f6_members']       = '';
			$data['f6_children']      = '';
			$data['f6_smartuse']      = '';
		}
	}
	
	$res_residence_details = lookup_value('tbl_residence_details',array(),array("fm_id"=>$fm_id),array(),array(),array());
	if($res_residence_details)
	{
		$num_residence_details    = mysqli_num_rows($res_residence_details);
		if($num_residence_details !=0)
		{
			$row_residence_details    = mysqli_fetch_array($res_residence_details);
			
			$data['f7_television']    = @$row_residence_details['f7_television'];
			$data['f7_refrigerator']  = @$row_residence_details['f7_refrigerator'];
			$data['f7_wmachine']      = @$row_residence_details['f7_wmachine'];
			$data['f7_mixer']         = @$row_residence_details['f7_mixer'];
			$data['f7_stove']         = @$row_residence_details['f7_stove'];
			$data['f7_bicycle']       = @$row_residence_details['f7_bicycle'];
			$data['f7_ccylinder']     = @$row_residence_details['f7_ccylinder'];
			$data['f7_fans']          = @$row_residence_details['f7_fans'];
			$data['f7_motorcycle']    = @$row_residence_details['f7_motorcycle'];
			$data['f7_car']           = @$row_residence_details['f7_car'];
		}
	}
	
    $no_of_land = 1;
    $land_arr   = array();
    $result     = lookup_value('tbl_land_details',array(),array("fm_id"=>$fm_id),array(),array(),array());
    if($result)
    {
        $num    = mysqli_num_rows($result);
        if($num != 0)
        {
            while($row = mysqli_fetch_array($result))
            {
                array_push($land_arr ,$row);
            }
            $no_of_land = sizeof($land_arr);
        }
    }

    $no_of_crops    = 1;
    $crops_arr      = array();
    $result         = lookup_value('tbl_cultivation_data',array(),array("fm_id"=>$fm_id),array(),array(),array());
    if($result)
    {
        while($row = mysqli_fetch_array($result))
        {
        array_push($crops_arr ,$row);
        }
        $no_of_crops = sizeof($crops_arr);
    }

    // Query for chacking user is married or not
    $sql_chk_married_status = " SELECT * FROM `tbl_spouse_details` WHERE `fm_id`='".$fm_id."' ";
    $res_chk_married_status = mysqli_query($db_con, $sql_chk_married_status) or die(mysqli_error($db_con));
    $row_chk_married_status = mysqli_fetch_array($res_chk_married_status);

    $married_status     = $row_chk_married_status['f3_married'];
?>
<!DOCTYPE html>
<html>
    <head>
    	<?php
        	headerdata($feature_name);
		?>
    </head>
    
    <body class="<?php echo $theme_name; ?>" data-theme="<?php echo $theme_name; ?>">
    	<?php
		/*START : Loader*/
		loader();
		/*END : Loader*/
		/*include Bootstrap model pop up for error display*/
		modelPopUp();
		/*include Bootstrap model pop up for error display*/
		/* this function used to add navigation menu to the page*/
		navigation_menu();
		/* this function used to add navigation menu to the page*/
		?> <!-- Navigation Bar -->
        <div class="container-fluid" id="content">
            <div id="main" style="margin-left:0px !important">
                <?php
				/* this function used to add navigation menu to the page*/
				breadcrumbs($home_url,$home_name,'Farmer Details',$filename,$feature_name);
				/* this function used to add navigation menu to the page*/
				?>
                <div class="container-fluid">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="box box-color box-bordered">
                                <div class="box-title">
                                    <h3>
                                        <i class="icon-table"></i>
                                        Have to show Name of the Farmer and his respective overall score here...!!!
                                    </h3>
                                </div>
                                <div class="box-content nopadding tab-content-inline">
	                            	<ul class="tabs tabs-inline tabs-top">
                                        <li class='active'>
                                            <a href="#kyc" data-toggle='tab'>
                                                <i class="fa fa-inbox"></i>KYC
                                            </a>
                                        </li>	<!-- KYC -->
                                        <li>
                                            <a href="#land" data-toggle='tab'>
                                                <i class="fa fa-share"></i>LAND
                                            </a>
                                        </li>	<!-- LAND -->
                                        <li>
                                            <a href="#crop" data-toggle='tab'>
                                                <i class="fa fa-tag"></i>CROP
                                            </a>
                                        </li>	<!-- CROP -->
                                        <li>
                                            <a href="#assets" data-toggle='tab'>
                                                <i class="fa fa-trash-o"></i>ASSETS
                                            </a>
                                        </li>	<!-- ASSETS -->
                                        <li>
                                            <a href="#loan" data-toggle='tab'>
                                                <i class="fa fa-trash-o"></i>LOAN & LIABILITIES
                                            </a>
                                        </li>	<!-- LOAN & LIABILITIES -->
                                    </ul>
                                    <div class="tab-content padding tab-content-inline tab-content-bottom">
                                        <!-- =========== -->
                                        <!-- START : KYC -->
                                        <!-- =========== -->
                                        <div class="tab-pane active" id="kyc">
                                            <div class="box box-bordered box-color lightgrey">
                                                <div class="box-content nopadding">
                                                    <div class="tas-container">
                                                        <ul class="tabs tabs-inline tabs-left">
                                                            <?php 
                                                            if($married_status == 'yes')
                                                            {
                                                                ?>
                                                                <li class='active'>
                                                                    <a href="#div_spouse_details" data-toggle='tab'>
                                                                        <i class="fa fa-lock"></i>Spouse Details
																		<?php 
																		if(isset($pt_row['pt_frm3']) && $pt_row['pt_frm3']!="") 
																		{
																			?>
                                                                        	<span class="badge " id="f3_pt" style="font-size:16px; font-weight:bold">
																				<?php echo $pt_row['pt_frm3']; ?>
                                                                            </span> 
                                                                        	<?php 
																		} 
                                                                        else
                                                                        {
																			?>
                                                                        	<span class="badge " id="f3_pt" style="font-size:16px; color:red">Incomplete</span> 
                                                                        	<?php 
																		} 
																		?>
                                                                    </a>
                                                                </li>   <!-- Spouse Details -->
                                                                <?php
                                                            }
                                                            ?>
                                                            <li <?php if($married_status == 'no'){ ?> class="active" <?php }  ?>>
                                                                <a href="#div_appli_knowledge" data-toggle='tab'>
                                                                    <i class="fa fa-user"></i>Applicant's Knowledge
                                                                    <?php 
																	if(isset($pt_row['pt_frm2']) && $pt_row['pt_frm2']!="") 
																	{
																		?>
																		<span class="badge " id="f2_pt" style="font-size:16px; font-weight:bold">
																			<?php echo $pt_row['pt_frm2']; ?>
																		</span> 
																		<?php 
																	} 
																	else
																	{
																		?>
																		<span class="badge " id="f2_pt" style="font-size:16px; color:red">Incomplete</span> 
																		<?php 
																	} 
																	?>
                                                                </a>
                                                            </li>	<!-- Applicant's Knowledge -->
                                                            <li>
                                                                <a href="#div_phone_details" data-toggle='tab'>
                                                                    <i class="fa fa-twitter"></i>Phone Details
                                                                    <?php 
																	if(isset($pt_row['pt_frm5']) && $pt_row['pt_frm5']!="") 
																	{
																		?>
																		<span class="badge " id="f5_pt" style="font-size:16px; font-weight:bold">
																			<?php echo $pt_row['pt_frm5']; ?>
																		</span> 
																		<?php 
																	} 
																	else
																	{
																		?>
																		<span class="badge " id="f5_pt" style="font-size:16px; color:red">Incomplete</span> 
																		<?php 
																	} 
																	?>
                                                                </a>
                                                            </li>	<!-- Applicant's Phone Details -->
                                                            <li>
                                                                <a href="#div_family_details" data-toggle='tab'>
                                                                    <i class="fa fa-twitter"></i>Family Details
                                                                    <?php 
																	if(isset($pt_row['pt_frm6']) && $pt_row['pt_frm6']!="") 
																	{
																		?>
																		<span class="badge " id="f6_pt" style="font-size:16px; font-weight:bold">
																			<?php echo $pt_row['pt_frm6']; ?>
																		</span> 
																		<?php 
																	} 
																	else
																	{
																		?>
																		<span class="badge " id="f6_pt" style="font-size:16px; color:red">Incomplete</span> 
																		<?php 
																	} 
																	?>
                                                                </a>
                                                            </li>	<!-- Family Details -->
                                                            <li>
                                                                <a href="#div_appliances_motors" data-toggle='tab'>
                                                                    <i class="fa fa-twitter"></i>Appliances / Motors
                                                                    <?php 
																	if(isset($pt_row['pt_frm7']) && $pt_row['pt_frm7']!="") 
																	{
																		?>
																		<span class="badge " id="f7_pt" style="font-size:16px; font-weight:bold">
																			<?php echo $pt_row['pt_frm7']; ?>
																		</span> 
																		<?php 
																	} 
																	else
																	{
																		?>
																		<span class="badge " id="f7_pt" style="font-size:16px; color:red">Incomplete</span> 
																		<?php 
																	} 
																	?>
                                                                </a>
                                                            </li>	<!-- Appliances / Motors -->
                                                        </ul>
                                                    </div>	<!-- Side Menu [Form Name] -->
                                                    <div class="tab-content padding tab-content-inline">
                                                        <?php
                                                        if($married_status == 'yes')
                                                        {
                                                            ?>
                                                            <div class="tab-pane active" id="div_spouse_details">
                                                                <form enctype="multipart/form-data" method="POST" class='form-horizontal form-bordered form-validate' id="frm_knowledge_detail">
                                                                    
                                                                    <input type="hidden" id="add_knowledge_detail" name="add_knowledge_detail" value="1">
                                                                    <input type="hidden" id="fm_id" name="fm_id" value="<?php echo $fm_id ?>">
                                                                    <input type="hidden" id="fm_caid" name="fm_caid" value="<?php echo $_SESSION['fm_caid']; ?>">
                                                                    <input type="hidden" id="f3_points" name="f3_points" value="">
                                                                    
                                                                    <div class="form-content">
                                                                    	<div class="control-group">
                                                                            <label for="text" class="control-label" style="margin-top:10px">Are You Married? <span style="color:#F00">*</span></label>
                                                                            <div class="controls">
                                                                                <select id="f3_married" name="f3_married" class="select2-me input-xlarge" data-rule-required="true">
                                                                                    <option value="" disabled > Select here</option>
                                                                                    <option value="yes" point="10" <?php if($married_status == 'yes'){?> selected="selected" <?php } ?>> Yes</option>
                                                                                    <option value="no" point="2"> No</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>	<!-- Are You Married? -->
                                                                        
                                                                        <div id="spouse_detail" style="padding:5px;border:1px solid #d6d6d6;margin:5px;">
                                                                            <div class="control-group">
                                                                                <label for="text" class="control-label" style="margin-top:10px">Spouse Name<span style="color:#F00">*</span></label>
                                                                                <div class="controls">
                                                                                    <input type="text" id="f3_spouse_fname" name="f3_spouse_fname" class="input-xlarge v_name" data-rule-minlength="3" data-rule-maxlength="50" data-rule-required="true" placeholder="Spouse Name">
                                                                                </div>
                                                                            </div>	<!-- Spouse Name -->
                            
                                                                            <div class="control-group">
                                                                                <label for="text" class="control-label" style="margin-top:10px">Age <span style="color:#F00">*</span></label>
                                                                                <div class="controls">
                                                                                    <input type="text" id="f3_spouse_age" name="f3_spouse_age" class="v_number input-xlarge" data-rule-number="true" data-rule-minlength="2" data-rule-maxlength="2" data-rule-required="true" placeholder="Age">
                                                                                </div>
                                                                            </div>	<!--age-->
                            
                                                                            <div class="control-group">
                                                                                <label for="numberfield" class="control-label">Mobile no.<span style="color:#F00">*</span></label>
                                                                                <div class="controls">
                                                                                    <input type="text" placeholder="Mobile no." name="f3_spouse_mobno" id="f3_spouse_mobno" class="input-xlarge v_number" data-rule-number="true"  data-rule-minlength="10"  data-rule-maxlength="10" data-rule-required="true" >
                                                                                </div>
                                                                            </div>	<!--Mobile no-->
                            
                                                                            <div class="control-group">
                                                                                <label for="numberfield" class="control-label">Aadhaar no.<span style="color:#F00">*</span></label>
                                                                                <div class="controls">
                                                                                    <input type="text" placeholder="Aadhaar no." name="f3_spouse_adhno" id="f3_spouse_adhno" class="input-xlarge v_number" data-rule-number="true"  data-rule-minlength="12"  data-rule-maxlength="12" data-rule-required="true">
                                                                                </div>
                                                                            </div>	<!--aadhar no-->
                            
                                                                            <div class="control-group">
                                                                                <label for="text" class="control-label" style="margin-top:10px">Is your Spouse a part of any SHG?<span style="color:#F00">*</span></label>
                                                                                <div class="controls">
                                                                                    <select id="f3_spouse_shg" name="f3_spouse_shg" class="select2-me input-xlarge" data-rule-required="true">
                                                                                        <option value="" disabled selected> Select here</option>
                                                                                        <option value="yes" point="10" <?php if($data['f3_spouse_shg'] == 'yes'){ ?> selected <?php }  ?>> Yes</option>
                                                                                        <option value="no" point="0" <?php if($data['f3_spouse_shg'] == 'no'){ ?> selected <?php }  ?>> No</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>	<!--Is your Spouse a part of any SHG?-->
                            
                                                                            <div class="control-group" id="shg_name" style="display: none">
                                                                                <label for="text" class="control-label" style="margin-top:10px">Name of SHG <span style="color:#F00">*</span></label>
                                                                                <div class="controls">
                                                                                    <input type="text" id="f3_spouse_shgname" name="f3_spouse_shgname" class="input-xlarge v_name" data-rule-required="true" placeholder="Name of SHG">
                                                                                </div>
                                                                            </div>	<!--shg name-->
                            
                                                                            <div class="control-group">
                                                                                <label for="text" class="control-label" style="margin-top:10px">Occupation<span style="color:#F00">*</span></label>
                                                                                <div class="controls">
                                                                                    <select id="f3_spouse_occp" name="f3_spouse_occp" class="select2-me input-xlarge" data-rule-required="true">
                                                                                        <option value="" disabled selected> Select here</option>
                                                                                        <option value="housewife" point="0" <?php if($data['f3_spouse_occp'] == 'housewife'){ ?> selected <?php }  ?>> Housewife</option>
                                                                                        <option value="farmer"    point="10" <?php if($data['f3_spouse_occp'] == 'farmer'){ ?> selected <?php }  ?>> Farmer</option>
                                                                                        <option value="other"     point="5" <?php if($data['f3_spouse_occp'] == 'other'){ ?> selected <?php }  ?>> Other</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>	<!-- Spouse's Occupation -->
                            
                                                                            <div class="control-group" id="input_income" style="display: none;">
                                                                                <label for="numberfield" class="control-label">Spouse Income per month<span style="color:#F00">*</span></label>
                                                                                <div class="controls">
                                                                                    <input type="text" placeholder="Spouse Income per month" name="f3_spouse_income" id="f3_spouse_income" data-rule-number="true"  class="input-xlarge" data-rule-maxlength="10" data-rule-required="true">
                                                                                </div>
                                                                            </div>	<!-- Spouse's Income-->
                            
                                                                            <div class="control-group">
                                                                                <label for="text" class="control-label" style="margin-top:10px">Any micro finance help taken by spouse?<span style="color:#F00">*</span></label>
                                                                                <div class="controls">
                                                                                    <select id="f3_spouse_mfi" name="f3_spouse_mfi" class="select2-me input-xlarge" data-rule-required="true">
                                                                                        <option value="" disabled selected> Select here</option>
                                                                                        <option value="yes" point="10" <?php if($data['f3_spouse_mfi'] == 'yes'){ ?> selected <?php }  ?>> Yes</option>
                                                                                        <option value="no" point="0" <?php if($data['f3_spouse_mfi'] == 'no'){ ?> selected <?php }  ?>> No</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>	<!--Any micro finance help taken by spouse?-->
                            
                                                                            <div id="microfinance" style="display:none;padding: 5px; border: 1px solid #d6d6d6; margin: 5px;">
                            
                                                                                <div class="control-group">
                                                                                    <label for="text" class="control-label" style="margin-top:10px">Name of Microfinance<span style="color:#F00">*</span></label>
                                                                                    <div class="controls">
                                                                                        <input type="text" id="f3_spouse_mfiname" name="f3_spouse_mfiname" class="input-xlarge v_name" data-rule-required="true" data-rule-minlength="4"  data-rule-maxlength="100" placeholder="Micro finance firm">
                                                                                    </div>
                                                                                </div>	<!-- Name of Microfinance -->
                            
                                                                                <div class="control-group">
                                                                                    <label for="numberfield" class="control-label">Amount taken from Microfinance<span style="color:#F00">*</span></label>
                                                                                    <div class="controls">
                                                                                        <input type="text" placeholder="Amount Taken" name="f3_spouse_mfiamount" id="f3_spouse_mfiamount" class="input-xlarge v_number" data-rule-number="true" data-rule-required="true"  data-rule-maxlength="8">
                                                                                    </div>
                                                                                </div>	<!-- Amount taken from Microfinance -->
                                                                            
                                                                            </div>	<!-- microfinance[If Yes] -->
                                                                            
                                                                            <div class="control-group">
                                                                                <label for="tasktitel" class="control-label">
                                                                                    Affliation to any association? <span style="color:#F00">*</span>
                                                                                </label>
                                                                                <div class="controls">
                                                                                    <select id="f3_affliation_status" name="f3_affliation_status" class="select2-me input-xlarge" data-rule-required="true">
                                                                                        <option value="" disabled selected> Select here</option>
                                                                                        <option value="yes" point="10" <?php if($data['f3_affliation_status'] == 'yes'){ ?> selected <?php }  ?>> Yes</option>
                                                                                        <option value="no" point="0" <?php if($data['f3_affliation_status'] == 'no'){ ?> selected <?php }  ?>> No</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>  <!-- Affliation to any association [DDL] -->
                                                                    
                                                                            <div id="div_affliation_display" style="display: none;">
                                                                                <div class="control-group">
                                                                                    <label for="text" class="control-label" style="margin-top:10px">
                                                                                        FPO/FPC Name <span style="color:#F00">*</span>
                                                                                    </label>
                                                                                    <div class="controls">
                                                                                        <input type="text" id="f3_fpo_name" name="f3_fpo_name" class="input-xlarge v_name" data-rule-required="true" data-rule-minlength="4"  data-rule-maxlength="100" placeholder="Entre FPO/FPC Name">
                                                                                    </div>
                                                                                </div>  <!-- Name Of FPO / FPC [If Yes] -->
                                                                            </div>  <!-- If affliation DDL Yes -->
        
                                                                            <div class="control-group">
                                                                                <label for="text" class="control-label" style="margin-top:10px">
                                                                                    Co-operative society / Bank Name <span style="color:#F00">*</span>
                                                                                </label>
                                                                                <div class="controls">
                                                                                    <input type="text" id="f3_bank_name" name="f3_bank_name" class="input-xlarge v_name" data-rule-required="true" data-rule-minlength="4"  data-rule-maxlength="100" placeholder="Co-operative society / Bank Name">
                                                                                </div>
                                                                            </div>  <!-- Co-operative society / Bank Name -->
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="form-actions">
                                                                            <input type="reset" class="btn" value="Back" id="back">
                                                                            <input type="submit" class="btn btn-primary" value="Save" id="save">
                                                                        </div>	<!-- Back and Save -->
                                                                    </div>
                                                                </form>
                                                                <h1 id="spouse_g_total">0</h1>
                                                            </div>  <!-- Spouse Details -->
                                                            <?php
                                                        }
                                                        ?>
                                                        <div class="tab-pane <?php if($married_status == 'no'){ ?> active <?php }  ?>" id="div_appli_knowledge">
                                                           	<form method="POST" enctype="multipart/form-data" class='form-horizontal form-bordered form-validate' id="frm_applicant_knowledge" name="frm_applicant_knowledge">
                                                            	
                                                                <input type="hidden" id="add_knowledge_detail" name="add_knowledge_detail" value="1">
                                                                <input type="hidden" id="fm_id" name="fm_id" value="<?php echo $fm_id ?>">
                                                                <input type="hidden" id="fm_caid" name="fm_caid" value="<?php echo $_SESSION['fm_caid']; ?>">
                                                                <input type="hidden" id="f2_points" name="f2_points" value="">
                                                                
                                                                <div class="form-content">
                                                                	
                                                                    <div class="control-group">
                                                                        <label for="text" class="control-label" style="margin-top:10px">Educational Qualification Details <span style="color:#F00">*</span></label>
                                                                        <div class="controls">
                                                                            <select id="f2_edudetail" name="f2_edudetail" class="select2-me input-xlarge" data-rule-required="true" onchange="calTotal()">
                                                                                <option value="" disabled <?php if($data['f2_edudetail'] == ''){ ?> selected <?php } ?>> Select here</option>
                                                                                <option value="illiterate" point="2" <?php if($data['f2_edudetail'] == 'illiterate'){ ?> selected <?php } ?>>Illiterate</option>
                                                                                <option value="primary education" point="4" <?php if($data['f2_edudetail'] == 'primary education'){ ?> selected <?php } ?>>Primary Education</option>
                                                                                <option value="matriculate" point="6" <?php if($data['f2_edudetail'] == 'matriculate'){ ?> selected <?php } ?>>Matriculate</option>
                                                                                <option value="graduate" point="8" <?php if($data['f2_edudetail'] == 'graduate'){ ?> selected <?php } ?>>Graduate</option>
                                                                                <option value="post graduate" point="10" <?php if($data['f2_edudetail'] == 'post graduate'){ ?> selected <?php } ?>>Post Graduate</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>	<!-- Educational Qualification Details [DDL] -->
                                                                    
                                                                    <div class="control-group">
                                                                        <label for="text" class="control-label" style="margin-top:10px">Regional Language Knowledge <span style="color:#F00">*</span></label>
                                                                        <div class="controls">
                                                                            <select id="f2_proficiency" data-rule-required="true" name="f2_proficiency" class="select2-me input-xlarge" onchange="calTotal()">
                                                                                <option value="" disabled <?php if($data['f2_proficiency'] == ''){ ?> selected <?php } ?>> Select here</option>
                                                                                <option value="read write" point="10" <?php if($data['f2_proficiency'] == 'read write'){ ?> selected <?php } ?>>Read and Write</option>
                                                                                <option value="read only" point="5" <?php if($data['f2_proficiency'] == 'read only'){ ?> selected <?php } ?>>Read Only</option>
                                                                                <option value="understand only" point="0" <?php if($data['f2_proficiency'] == 'understand only'){ ?> selected <?php } ?>>Understand Only</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>	<!-- Regional Language Knowledge [DDL] -->
                                                                    
                                                                    <div class="control-group">
                                                                        <label for="text" class="control-label" style="margin-top:10px">Participation in Farming Programs</label>
                                                                        <div class="controls">
                                                                            <select id="f2_participation" data-rule-required="true" name="f2_participation" class="select2-me input-xlarge">
                                                                                <option value="" disabled <?php if($data['f2_participation'] == ''){ ?> selected <?php } ?>> Select here</option>
                                                                                <option value="yes" point="10" <?php if($data['f2_participation'] == 'yes'){ ?> selected <?php } ?>> Yes</option>
                                                                                <option value="no" point="0" <?php if($data['f2_participation'] == 'no'){ ?> selected <?php } ?>> No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>	<!-- Participation in any Farming Program / Trainings [DDL] -->
                                                                    
                                                                    <div id="program_detail" style="display: none; padding: 10px; border:1px solid #d6d6d6; margin: 20px;">
                                                                    	
                                                                        <div class="control-group">
                                                                            <label for="text" class="control-label" style="margin-top:10px">Type of the training Programs<span style="color:#F00">*</span></label>
                                                                            <div class="controls">
                                                                                <select id="f2_typeprog" name="f2_typeprog" class="select2-me input-xxlarge" data-rule-required="true">
                                                                                    <option value="" disabled <?php if($data['f2_typeprog'] == ''){ ?> selected <?php } ?>> Select here</option>
                                                                                    <option value="organic farming training" <?php if($data['f2_typeprog'] == 'organic farming training'){ ?> selected <?php } ?>> Organic Farming Training</option>
                                                                                    <option value="equipment training" <?php if($data['f2_typeprog'] == 'equipment training'){ ?> selected <?php } ?>> Equipment Training</option>
                                                                                    <option value="technology training" <?php if($data['f2_typeprog'] == 'technology training'){ ?> selected <?php } ?>> Technology Training</option>
                                                                                    <option value="pesticide fertilizer training" <?php if($data['f2_typeprog'] == 'pesticide fertilizer training'){ ?> selected <?php } ?>> Pesticide/Fertilizer Training</option>
                                                                                    <option value="other farming training" <?php if($data['f2_typeprog'] == 'other farming training'){ ?> selected <?php } ?>> Other Farming Training</option>
                                                                                    <option value="others" <?php if($data['f2_typeprog'] == 'others'){ ?> selected <?php } ?>> Others</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>	<!-- Type of Training Programs [If Yes] -->
                                                                    
                                                                    	<div class="control-group">
                                                                            <label for="numberfield" class="control-label">
                                                                                What was the duration of the program?<span style="color:#F00">*</span>
                                                                            </label>
                                                                            <div class="controls">
                                                                                <input type="text" placeholder="00" id="f2_durprog" name="f2_durprog" class="input-xlarge v_number" data-rule-required="true" data-rule-number="true"  data-rule-maxlength="3">
                                                                            </div>
                                                                        </div>  <!-- What was the duration of the program [If Yes] -->
                                                                        
                                                                        <div class="control-group">
                                                                            <label for="text" class="control-label" style="margin-top:10px">
                                                                                Who conducted the Program? <span style="color:#F00">*</span>
                                                                            </label>
                                                                            <div class="controls">
                                                                                <input type="text" placeholder="Who conducted the Program" id="f2_condprog" name="f2_condprog" class="input-xlarge v_name" data-rule-required="true" data-rule-minlength="4" data-rule-maxlength="100">
                                                                            </div>
                                                                        </div>  <!-- Who conducted the Program [If Yes] -->
                                                                        
                                                                        <div class="control-group">
                                                                            <label for="text" class="control-label" style="margin-top:10px">
                                                                                For which crop was the program held? <span style="color:#F00">*</span>
                                                                            </label>
                                                                            <div class="controls">
                                                                                <input type="text" placeholder="Name" id="f2_cropprog" name="f2_cropprog" class="input-xlarge v_name" data-rule-required="true" data-rule-minlength="4" data-rule-maxlength="100">
                                                                            </div>
                                                                        </div>  <!-- For which crop was the program held [If Yes] -->
                                                                        
                                                                    </div>
                                                                    
                                                                    <div class="form-actions">
                                                                        <input type="reset" class="btn" value="Back" id="back">
                                                                        <input type="submit" class="btn btn-primary" value="Save" id="save">
                                                                    </div>	<!-- Back and Save -->
                                                                    
                                                                </div>
                                                            
                                                            </form>
                                                            <h1 id="applicant_knowledge_g_total">0</h1> 
                                                        </div>	<!-- Applicant's Knowledge -->
                                                        <div class="tab-pane" id="div_phone_details">
                                                           	Applicant's Phone Details
                                                        	<form method="POST" enctype="multipart/form-data" class='form-horizontal form-bordered form-validate' id="frm_applicant_phone" name="frm_applicant_phone">
                                                            	
                                                                <input type="hidden" id="add_applicant_detail" name="add_applicant_detail" value="1">
                                                                <input type="hidden" id="fm_id" name="fm_id" value="<?php echo $fm_id ?>">
                                                                <input type="hidden" id="fm_caid" name="fm_caid" value="<?php echo $_SESSION['fm_caid']; ?>">
                                                                
                                                                <div class="form-content">
                                                                	
                                                                    <div class="control-group">
                                                                        <label for="text" class="control-label" style="margin-top:10px">Type of phone ownership <span style="color:#F00">*</span></label>
                                                                        <div class="controls">
                                                                            <select id="f5_phonetype" name="f5_phonetype" class="select2-me input-xlarge" data-rule-required="true">
                                                                                <option value="" disabled selected> Select here</option>
                                                                                <option value="smartphone" point="10" <?php if((isset($data['f5_phonetype'])) && $data['f5_phonetype'] == 'smartphone') { ?> selected <?php } ?>>Smartphone</option>
                                                                                <option value="featurephone" point="5" <?php if((isset($data['f5_phonetype'])) && $data['f5_phonetype'] == 'featurephone') { ?> selected <?php } ?>>Featurephone</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>	<!-- Type of phone ownership -->
                                                                    
                                                                    <div class="control-group">
                                                                        <label for="text" class="control-label" style="margin-top:10px">Does any of your family member own a Smart Phone? <span style="color:#F00">*</span></label>
                                                                        <div class="controls">
                                                                            <select id="f5_any_one_have_smart_phone" name="f5_any_one_have_smart_phone" class="select2-me input-xlarge" data-rule-required="true">
                                                                                <option value="" disabled selected> Select here</option>
                                                                                <option value="yes" point="10" <?php if((isset($data['f5_any_one_have_smart_phone'])) && $data['f5_any_one_have_smart_phone'] == 'yes') { ?> selected <?php } ?>>Yes</option>
                                                                                <option value="no" point="0" <?php if((isset($data['f5_any_one_have_smart_phone'])) && $data['f5_any_one_have_smart_phone'] == 'no') { ?> selected <?php } ?>>No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>	<!-- Does any of your family member own a Smart Phone?  -->
                                                                    
                                                                    <div class="control-group">
                                                                        <label for="text" class="control-label" style="margin-top:10px">Who is the service Provider?</label>
                                                                        <div class="controls">
                                                                            <select data-rule-required="true" id="f5_servpro" name="f5_servpro" class="select2-me input-xlarge" >
                                                                                <option value="" disabled selected > Select here</option>
                                                                                <option value="aircel" <?php if((isset($data['f5_servpro'])) && $data['f5_servpro'] == 'aircel') { ?> selected <?php } ?>>Aircel</option>
                                                                                <option value="airtel" <?php if((isset($data['f5_servpro'])) && $data['f5_servpro'] == 'airtel') { ?> selected <?php } ?>>Airtel</option>
                                                                                <option value="jio" <?php if((isset($data['f5_servpro'])) && $data['f5_servpro'] == 'jio') { ?> selected <?php } ?>>Jio</option>
                                                                                <option value="relience" <?php if((isset($data['f5_servpro'])) && $data['f5_servpro'] == 'relience') { ?> selected <?php } ?>>Relience</option>
                                                                                <option value="tata docomo" <?php if((isset($data['f5_servpro'])) && $data['f5_servpro'] == 'tata docomo') { ?> selected <?php } ?>>Tata Docomo</option>
                                                                                <option value="tata" <?php if((isset($data['f5_servpro'])) && $data['f5_servpro'] == 'tata') { ?> selected <?php } ?>>Tata</option>
                                                                                <option value="uninor" <?php if((isset($data['f5_servpro'])) && $data['f5_servpro'] == 'uninor') { ?> selected <?php } ?>>Uninor</option>
                                                                                <option value="vodafone" <?php if((isset($data['f5_servpro'])) && $data['f5_servpro'] == 'vodafone') { ?> selected <?php } ?>>Vodafone</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>	<!-- Who is the Service Provider -->
                                                                    
                                                                    <div class="control-group">
                                                                        <label for="text" class="control-label" style="margin-top:10px">Do you receive sufficeint network Coverage?</label>
                                                                        <div class="controls">
                                                                            <select data-rule-required="true" id="f5_network" name="f5_network" class="select2-me input-xlarge">
                                                                                <option value="" disabled selected> Select here</option>
                                                                                <option value="yes" <?php if((isset($data['f5_network'])) && $data['f5_network'] == 'yes') { ?> selected <?php } ?>> Yes</option>
                                                                                <option value="no" <?php if((isset($data['f5_network'])) && $data['f5_network'] == 'no') { ?> selected <?php } ?>> No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>	<!--Do you receive sufficeint network Coverage?-->
                                                                    
                                                                    <div id="div_smartphone_display" style="display:none;padding: 5px; border: 1px solid #d6d6d6; margin: 5px;">
                                                                    
                                                                        <div class="control-group">
                                                                            <label for="text" class="control-label" style="margin-top:10px">Do you have Data Pack on your Phone ?</label>
                                                                            <div class="controls">
                                                                                <select id="f5_datapack" name="f5_datapack" class="select2-me input-xlarge">
                                                                                    <option value="" disabled selected> Select here</option>
                                                                                    <option value="yes" point="10" <?php if((isset($data['f5_datapack'])) && $data['f5_datapack'] == 'yes') { ?> selected <?php } ?>> Yes</option>
                                                                                    <option value="no" point="0" <?php if((isset($data['f5_datapack'])) && $data['f5_datapack'] == 'no') { ?> selected <?php } ?>> No</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>	<!--Do you have Data Pack on your Phone ? -->
                                                                        
                                                                        <div class="control-group">
                                                                            <label for="text" class="control-label" style="margin-top:10px">Specify Data pack</label>
                                                                            <div class="controls">
                                                                                <select id="f5_datapackname" name="f5_datapackname" class="select2-me input-xlarge">
                                                                                    <option value="" disabled selected> Select here</option>
                                                                                    <option value="2g" <?php if((isset($data['f5_datapackname'])) && $data['f5_datapackname'] == '2g') { ?> selected <?php } ?>> 2G</option>
                                                                                    <option value="3g" <?php if((isset($data['f5_datapackname'])) && $data['f5_datapackname'] == '3g') { ?> selected <?php } ?>> 3G</option>
                                                                                    <option value="4g" <?php if((isset($data['f5_datapackname'])) && $data['f5_datapackname'] == '4g') { ?> selected <?php } ?>> 4G</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>	<!--specify data pack-->
                                                                        
                                                                        <div class="control-group">
                                                                            <label for="text" class="control-label" style="margin-top:10px">Do you use apps regularly</label>
                                                                            <div class="controls">
                                                                                <select id="f5_appuse" name="f5_appuse" class="select2-me input-xlarge">
                                                                                    <option value="" disabled selected> Select here</option>
                                                                                    <option value="yes" <?php if((isset($data['f5_appuse'])) && $data['f5_appuse'] == 'yes') { ?> selected <?php } ?>> Yes</option>
                                                                                    <option value="no" <?php if((isset($data['f5_appuse'])) && $data['f5_appuse'] == 'no') { ?> selected <?php } ?>> No</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>	<!--Do you use apps regularly-->
                                                                        
                                                                        <div id="div_app_name_display" style="display:none;padding: 5px; border: 1px solid #d6d6d6; margin: 5px;">
                                                                        
                                                                            <div class="control-group">
                                                                                <label for="text" class="control-label" style="margin-top:10px">
                                                                                    Specify name of the App <span style="color:#F00">*</span>
                                                                                </label>
                                                                                <div class="controls">
                                                                                    <input type="text" id="f5_app_name" name="f5_app_name" class="input-xlarge v_name" data-rule-required="true" placeholder="Specify name of the App">
                                                                                </div>
                                                                            </div>  <!-- Specify name of the App [If Yes] -->
                                                                        
                                                                        </div>
                                                                        
                                                                        <div class="control-group">
                                                                            <label for="text" class="control-label" style="margin-top:10px">Subscriptions to Farming Advisory Apps?</label>
                                                                            <div class="controls">
                                                                                <select id="f5_farmapp" name="f5_farmapp" class="select2-me input-xlarge">
                                                                                    <option value="" disabled selected > Select here</option>
                                                                                    <option value="yes" point="10" <?php if((isset($data['f5_farmapp'])) && $data['f5_farmapp'] == 'yes') { ?> selected <?php } ?>> Yes</option>
                                                                                    <option value="no" point="0" <?php if((isset($data['f5_farmapp'])) && $data['f5_farmapp'] == 'no') { ?> selected <?php } ?>> No</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>	<!--Subscriptions to Farming Advisory Apps?-->
                                                                    
                                                                    </div>
                                                                    
                                                                    <div class="form-actions">
                                                                        <input type="reset" class="btn" value="Back" id="back">
                                                                        <input type="submit" class="btn btn-primary" value="Save" id="save">
                                                                    </div> 	<!-- Reset Or Save -->
                                                                
                                                                </div>
                                                            </form>
                                                            <h1 id="phone_details_g_total">0</h1>
                                                        </div>	<!-- Applicant's Phone Details -->
                                                        <div class="tab-pane" id="div_family_details">
                                                            Family Details
                                                            <form method="POST" enctype="multipart/form-data" class='form-horizontal form-bordered form-validate' id="frm_family_details" name="frm_family_details">
                                                            
                                                            	<input type="hidden" id="add_knowledge_detail" name="add_knowledge_detail" value="1">
                                                                <input type="hidden" id="fm_id" name="fm_id" value="<?php echo $fm_id ?>">
                                                                <input type="hidden" id="fm_caid" name="fm_caid" value="<?php echo $_SESSION['fm_caid']; ?>">
                                                                <input type="hidden" id="f6_points" name="f6_points" value="">
                                                                
                                                                <div class="form-content">
                                                                	
                                                                    <div class="control-group">
                                                                        <label for="text" class="control-label" style="margin-top:10px">Do you live in a Joint Family?<span style="color:#F00">*</span></label>
                                                                        <div class="controls">
                                                                            <select id="f6_jointfamily" name="f6_jointfamily" class="select2-me input-xlarge" data-rule-required="true">
                                                                                <option value="" disabled selected> Select here</option>
                                                                                <option value="yes" <?php if((isset($data['f6_jointfamily'])) && $data['f6_jointfamily'] == 'yes') { ?> selected <?php } ?>> Yes</option>
                                                                                <option value="no" <?php if((isset($data['f6_jointfamily'])) && $data['f6_jointfamily'] == 'no') { ?> selected <?php } ?>> No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>	<!--Do you live in a Joint Family?-->
                                                                    
                                                                    <div class="control-group">
                                                                        <label for="text" class="control-label" style="margin-top:10px">How many members are there in your family?<span style="color:#F00">*</span></label>
                                                                        <div class="controls">
                                                                            <select id="f6_members" name="f6_members" class="select2-me input-xlarge" data-rule-required="true">
                                                                                <option value="" disabled selected> Select here</option>
                                                                                <?php 
                                                                                    for($i=1; $i<21; $i++)
																					{
                                                                                        ?>
																						<option value="<?php echo $i; ?>" <?php if((isset($data['f6_members'])) && $data['f6_members'] == $i) { ?> selected <?php } ?>>
                                                                                        	<?php echo $i; ?>
                                                                                        </option>
																						<?php
                                                                                    }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>	<!-- How many members are there in your family -->
                                                                    
                                                                    <div class="control-group">
                                                                        <label for="text" class="control-label" style="margin-top:10px">Number of Children<span style="color:#F00">*</span></label>
                                                                        <div class="controls">
                                                                            <select id="f6_children" name="f6_children" class="select2-me input-xlarge" data-rule-required="true">
                                                                                <option value="" disabled selected> Select here</option>
                                                                                <?php 
                                                                                    for($i=0; $i<16; $i++)
																					{
                                                                                       ?>
																						<option value="<?php echo $i; ?>" <?php if((isset($data['f6_children'])) && $data['f6_children'] == $i) { ?> selected <?php } ?>>
                                                                                        	<?php echo $i; ?>
                                                                                        </option>
																						<?php
                                                                                    }
                                                                                ?>
                                                                                
                                                                            </select>
                                                                        </div>
                                                                    </div>	<!-- Number of Children the farmer has -->
                                                                    
                                                                    <div id="use_smartphone" style="display:none;padding: 5px; border: 1px solid #d6d6d6; margin: 5px;">
                                                                    
                                                                        <div class="control-group">
                                                                            <label for="text" class="control-label" style="margin-top:10px">Any of children use Smart Phones?<span style="color:#F00">*</span></label>
                                                                            <div class="controls">
                                                                                <select id="f6_smartuse" name="f6_smartuse" class="select2-me input-xlarge" data-rule-required="true" onchange="calTotal()">
                                                                                    <option value="" disabled selected> Select here</option>
                                                                                    <option value="yes" point="10" <?php if((isset($data['f6_smartuse'])) && $data['f6_smartuse'] == 'yes') { ?> selected <?php } ?>> Yes</option>
                                                                                    <option value="no" point="0" <?php if((isset($data['f6_smartuse'])) && $data['f6_smartuse'] == 'no') { ?> selected <?php } ?>> No</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>	<!-- Any of your children use Smart Phone? -->
                                                                    
                                                                    </div>
                                                                    
                                                                    <div class="form-actions">
                                                                        <input type="reset" class="btn" value="Back" id="back">
                                                                        <input type="submit" class="btn btn-primary" value="Save" id="save">
                                                                    </div>	<!-- Back Or Save -->
                                                                    
                                                                </div>
                                                                
                                                            </form>
                                                            <h1 id="family_details_g_total">0</h1> 
                                                        </div>	<!-- Family Details -->
                                                        <div class="tab-pane" id="div_appliances_motors">
                                                            <div class="span10" style="padding: 5px; border: 1px solid #d6d6d6; margin: 5px;">
                                                                <h3>What appliances are there in your house? Also mention their count.</h3>
                                                            	<form method="POST" enctype="multipart/form-data" class='form-horizontal form-bordered form-validate' id="frm_appliances_motors" name="frm_appliances_motors">
                                                                
                                                                	<input type="hidden" id="add_knowledge_detail" name="add_knowledge_detail" value="1">
                                                                    <input type="hidden" id="fm_id" name="fm_id" value="<?php echo $fm_id ?>">
                                                                    <input type="hidden" id="fm_caid" name="fm_caid" value="<?php echo $_SESSION['fm_caid']; ?>">
                                                                    <input type="hidden" id="f7_points" name="f7_points" value="" >
                                                                    
                                                                    <div class="form-content">
                                                                    
                                                                        <div class="control-group">
                                                                            <label for="text" class="control-label" style="margin-top:10px">Television
                                                                            <span style="color:#F00">*</span></label>
                                                                            <div class="controls">
                                                                                <input type="number" name="f7_television" id="f7_television" placeholder="Television" class="input-xlarge v_number cal_tcount" value="0">
                                                                            </div>
                                                                        </div>	<!-- Television -->
                                                                        
                                                                        <div class="control-group">
                                                                            <label for="text" class="control-label" style="margin-top:10px">Refrigerator<span style="color:#F00">*</span></label>
                                                                            <div class="controls">
                                                                                <input type="number" name="f7_refrigerator" id="f7_refrigerator" placeholder="Refrigerator" class="input-xlarge v_number cal_tcount" value="0">
                                                                            </div>
                                                                        </div>	<!-- Refrigerator -->
                                                                        
                                                                        <div class="control-group">
                                                                            <label for="text" class="control-label" style="margin-top:10px">Washing Machine<span style="color:#F00">*</span></label>
                                                                            <div class="controls">
                                                                                <input type="number" name="f7_wmachine" id="f7_wmachine" placeholder="Washing Machine" class="input-xlarge v_number cal_tcount" value="0">
                                                                            </div>
                                                                        </div>	<!-- Washing Machine -->
                                                                        
                                                                        <div class="control-group">
                                                                            <label for="text" class="control-label" style="margin-top:10px">Mixer<span style="color:#F00">*</span></label>
                                                                            <div class="controls">
                                                                                <input type="number" name="f7_mixer" id="f7_mixer" placeholder="Mixer" class="input-xlarge v_number cal_tcount" value="0">
                                                                            </div>
                                                                        </div>	<!-- Mixer -->
                                                                        
                                                                        <div class="control-group">
                                                                            <label for="text" class="control-label" style="margin-top:10px">Gas Stove<span style="color:#F00">*</span></label>
                                                                            <div class="controls">
                                                                                <input type="number" name="f7_stove" id="f7_stove" placeholder="Gas Stove" class="input-xlarge v_number cal_tcount" value="0">
                                                                            </div>
                                                                        </div>	<!-- Gas Stove -->
                                                                        
                                                                        <div class="control-group">
                                                                            <label for="text" class="control-label" style="margin-top:10px">Bicycle<span style="color:#F00">*</span></label>
                                                                            <div class="controls">
                                                                                <input type="number" name="f7_bicycle" id="f7_bicycle" placeholder="Bicycle" class="input-xlarge v_number cal_tcount" value="0">
                                                                            </div>
                                                                        </div>	<!-- Bicycle -->
                                                                        
                                                                        <div class="control-group">
                                                                            <label for="text" class="control-label" style="margin-top:10px">Cooking Cylinder<span style="color:#F00">*</span></label>
                                                                            <div class="controls">
                                                                                <input type="number" name="f7_ccylinder" id="f7_ccylinder" placeholder="Cooking Cylinder" class="input-xlarge v_number cal_tcount" value="0">
                                                                            </div>
                                                                        </div>	<!-- Cooking Cylinder -->
                                                                        
                                                                        <div class="control-group">
                                                                            <label for="text" class="control-label" style="margin-top:10px">Lights & Fans<span style="color:#F00">*</span></label>
                                                                            <div class="controls">
                                                                                <input type="number" name="f7_fans" id="f7_fans" placeholder="Lights & Fans" class="input-xlarge v_number cal_tcount" value="0">
                                                                            </div>
                                                                        </div>	<!-- Lights & Fans -->
                                                                        
                                                                        <div class="control-group">
                                                                            <label for="text" class="control-label" style="margin-top:10px">Motorcycle<span style="color:#F00">*</span></label>
                                                                            <div class="controls">
                                                                                <input type="number" name="f7_motorcycle" id="f7_motorcycle" placeholder="Motorcycle" class="input-xlarge v_number cal_tcount" value="0">
                                                                            </div>
                                                                        </div>	<!-- Motorcycle -->
                                                                        
                                                                        <div class="control-group">
                                                                            <label for="text" class="control-label" style="margin-top:10px">Car<span style="color:#F00">*</span></label>
                                                                            <div class="controls">
                                                                                <input type="number" name="f7_car" id="f7_car" placeholder="Bicycle" class="input-xlarge v_number cal_tcount" value="0">
                                                                            </div>
                                                                        </div>	<!-- Car -->
                                                                        
                                                                        <div class="form-actions">
                                                                            <input type="reset" class="btn" value="Back" id="back">
                                                                            <input type="submit" class="btn btn-primary" value="Save" id="save">
                                                                        </div>	<!-- Back Or Save -->
                                                                    
                                                                    </div>
                                                                    
                                                                </form>
                                                                <h1 id="appliances_motors_g_total">0</h1> 
                                                            </div>
                                                        </div>	<!-- Appliances / Motors -->
                                                    </div>	<!-- Main Forms -->
                                                </div>
                                            </div>
                                        </div>	<!-- KYC -->
                                        <!-- =========== -->
                                        <!-- END   : KYC -->
                                        <!-- =========== -->
                                        
                                        <!-- ============ -->
                                        <!-- START : LAND -->
                                        <!-- ============ -->
                                        <div class="tab-pane" id="land">
                                            <div class="box box-bordered box-color lightgrey">
                                                <div class="box-content nopadding">
                                                    <div class="tas-container">
                                                        <ul class="tabs tabs-inline tabs-left">
                                                            <li class='active'>
                                                                <a href="#div_farm_land_details" data-toggle='tab'>
                                                                    <i class="fa fa-lock"></i>Farm Land Details
                                                               	</a>
                                                            </li>	<!-- Farm Land Details -->
                                                        </ul>
                                                    </div>	<!-- Side Menu [Form Name] -->
                                                    <div class="tab-content padding tab-content-inline">
                                                        <div class="tab-pane active" id="div_farm_land_details">
                                                    		<form enctype="multipart/form-data" method="POST" class='form-horizontal form-wizard wizard-vertical' id="frm_farm_land_details" name="frm_farm_land_details">
																
                                                        		<!-- <div class="form-content"> -->
                                                                    <div id="lands">
                                                                    	<?php
                                                                        for($i=0; $i<$no_of_land; $i++)
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
                                                                                            <input placeholder="Size in Acres" type="text" id="txt_land_size<?php echo $id; ?>" name="txt_land_size<?php echo $id; ?>" class="input-xlarge" value="" data-rule-required="true" data-rule-number="true">
                                                                                        </div>
                                                                                    </div>  <!-- Size in Acres -->

                                                                                    <div class="control-group">
                                                                                        <label for="text" class="control-label" style="margin-top:10px">Ownership
                                                                                        <span style="color:#F00">*</span></label>
                                                                                        <div class="controls">
                                                                                            <select id="ddl_owner<?php echo $id; ?>" name="ddl_owner<?php echo $id; ?>" class="input-xlarge" data-rule-required="true">
                                                                                                <option value="" disabled selected> Select here</option>
                                                                                                <option value="Owned">Owned</option>
                                                                                                <option value="Rental">Rental</option>
                                                                                                <option value="Leased">Leased</option>
                                                                                                <option value="Contracted">Contracted</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>  <!-- Ownership -->

                                                                                    <div id="div_rental_display" style="display: none;">
                                                                                        <div class="control-group">
                                                                                            <label for="text" class="control-label" style="margin-top:10px">Mention tha amount per month on rent<span style="color:#F00">*</span></label>
                                                                                            <div class="controls">
                                                                                                <input placeholder="Size in Acres" type="text" id="txt_land_rent_per_month<?php echo $id; ?>" name="txt_land_rent_per_month<?php echo $id; ?>" class="input-xlarge" value="" data-rule-required="true" data-rule-number="true">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>  <!-- [If On Rent, Mention tha amount per month on rent] -->

                                                                                    <div id="div_leas_display" style="display: none;">
                                                                                        <div class="control-group">
                                                                                            <label for="text" class="control-label" style="margin-top:10px">Number of years under leasing<span style="color:#F00">*</span></label>
                                                                                            <div class="controls">
                                                                                                <input placeholder="Size in Acres" type="text" id="txt_land_lease_year<?php echo $id; ?>" name="txt_land_lease_year<?php echo $id; ?>" class="input-xlarge" value="" data-rule-required="true" data-rule-number="true">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>  <!-- [If on lease, Number of years under leasing] -->

                                                                                    <div id="div_contract_display" style="display: none;">
                                                                                        <div class="control-group">
                                                                                            <label for="text" class="control-label" style="margin-top:10px">Number of years under contract<span style="color:#F00">*</span></label>
                                                                                            <div class="controls">
                                                                                                <input placeholder="Size in Acres" type="text" id="txt_land_contract_year<?php echo $id; ?>" name="txt_land_contract_year<?php echo $id; ?>" class="input-xlarge" value="" data-rule-required="true" data-rule-number="true">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>  <!-- [If On Contract, Number of years under contract] -->

                                                                                    <!-- START : Land Address -->

                                                                                    <div class="control-group" >
                                                                                        <label for="tasktitel" class="control-label">State <span style="color:#F00">*</span></label>
                                                                                        <div class="controls">
                                                                                            <select id="ddl_p_state<?php echo $id; ?>" name="ddl_p_state<?php echo $id; ?>" onChange="getDist('p', this.value, 'ddl_p_dist<?php echo $id; ?>', 'ddl_p_tal<?php echo $id; ?>', 'ddl_p_village<?php echo $id; ?>', 'div_p_dist<?php echo $id; ?>', 'div_p_tal<?php echo $id; ?>', 'div_p_village<?php echo $id; ?>');" class="select2-me input-large" >
                                                                                                <option value="" disabled selected>Select State</option>
                                                                                                <?php
                                                                                                $res_get_state  = lookup_value('tbl_state',array(),array(),array(),array(),array());
                                                                                                
                                                                                                if($res_get_state)
                                                                                                {
                                                                                                    while ($row = mysqli_fetch_array($res_get_state) ) 
                                                                                                    {
                                                                                                        echo '<option value="'.$row['id'].'">'.strtoupper($row['st_name']).'</option>';
                                                                                                    }
                                                                                                }
                                                                                                ?>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>  <!-- State -->

                                                                                    <div class="control-group">
                                                                                        <label for="tasktitel" class="control-label">District <span style="color:#F00">*</span></label>
                                                                                        <div class="controls" id="div_p_dist<?php echo $id; ?>">
                                                                                            <select id="ddl_p_dist<?php echo $id; ?>" name="ddl_p_dist<?php echo $id; ?>" class="select2-me input-large" >
                                                                                                <option value="" disabled selected>Select District</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>  <!-- District -->

                                                                                    <div class="control-group">
                                                                                        <label for="tasktitel" class="control-label">Taluka <span style="color:#F00">*</span></label>
                                                                                        <div class="controls" id="div_p_tal<?php echo $id; ?>">
                                                                                            <select id="ddl_p_tal<?php echo $id; ?>" name="ddl_p_tal<?php echo $id; ?>" class="select2-me input-large" >
                                                                                                <option value="" disabled selected>Select Taluka</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>  <!-- Taluka -->

                                                                                    <div class="control-group" >
                                                                                        <label for="tasktitel" class="control-label">Village Name <span style="color:#F00">*</span></label>
                                                                                        <div class="controls" id="div_p_village<?php echo $id; ?>">
                                                                                            <select id="ddl_p_village<?php echo $id; ?>" name="ddl_p_village<?php echo $id; ?>" class="select2-me input-large" >
                                                                                                <option value="" disabled selected>Select Village</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>  <!-- Village -->

                                                                                    <div class="control-group">
                                                                                        <label for="text" class="control-label" style="margin-top:10px">Survey Number<span style="color:#F00">*</span></label>
                                                                                        <div class="controls">
                                                                                            <input placeholder="Size in Acres" type="text" id="txt_survey_no<?php echo $id; ?>" name="txt_survey_no<?php echo $id; ?>" class="input-xlarge" value="" data-rule-required="true" data-rule-number="true">
                                                                                        </div>
                                                                                    </div>  <!-- Survey Number -->

                                                                                    <div class="control-group" >
                                                                                        <label for="tasktitel" class="control-label">Pin-Code <span style="color:#F00">*</span></label>
                                                                                        <div class="controls">
                                                                                            <input type="text" id="txt_p_pincode<?php echo $id; ?>" name="txt_p_pincode<?php echo $id; ?>" placeholder="Pin-Code" class="input-large" data-rule-required="true" data-rule-number="true" minlength="6" maxlength="6" size="6" />
                                                                                        </div>
                                                                                    </div>  <!-- Pincode -->

                                                                                    <!-- END : Land Address -->

                                                                                    <div class="control-group">
                                                                                        <label for="text" class="control-label" style="margin-top:10px">Type of Soil
                                                                                        <span style="color:#F00">*</span></label>
                                                                                        <div class="controls">
                                                                                            <select id="ddl_soil_type<?php echo $id; ?>" name="ddl_soil_type<?php echo $id; ?>" class="input-xlarge" data-rule-required="true" onChange="calTotal()">
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
                                                                                    </div>  <!-- Type of soil -->

                                                                                    <div class="control-group">
                                                                                        <label for="text" class="control-label" style="margin-top:10px">Soil Depth<span style="color:#F00">*</span></label>
                                                                                        <div class="controls">
                                                                                            <input placeholder="Size in Acres" type="text" id="txt_soil_depth<?php echo $id; ?>" name="txt_soil_depth<?php echo $id; ?>" class="input-xlarge" value="" data-rule-required="true" data-rule-number="true">
                                                                                        </div>
                                                                                    </div>  <!-- Soil Depth -->

                                                                                    <div class="control-group">
                                                                                        <label for="text" class="control-label" style="margin-top:10px">Have you had the soil tested in your land?
                                                                                        <span style="color:#F00">*</span></label>
                                                                                        <div class="controls">
                                                                                            <select id="ddl_soil_tested<?php echo $id; ?>" name="ddl_soil_tested<?php echo $id; ?>" class="input-xlarge" data-rule-required="true" onChange="calTotal()">
                                                                                                <option value="" disabled selected> Select here</option>
                                                                                                <option value="yes">Yes</option>
                                                                                                <option value="no">no</option>
                                                                                             </select>
                                                                                        </div>
                                                                                    </div>  <!-- Have you Tested the Soil -->

                                                                                    <div class="control-group">
                                                                                        <label for="text" class="control-label" style="margin-top:10px">Source Of Water
                                                                                        <span style="color:#F00">*</span></label>
                                                                                        <div class="controls">
                                                                                            <select id="ddl_water_source<?php echo $id; ?>" name="ddl_water_source<?php echo $id; ?>" class="input-xlarge" data-rule-required="true" onChange="calTotal()">
                                                                                                <option value="" disabled selected> Select here</option>
                                                                                                <option value="well_water">Well Water</option>
                                                                                                <option value="tube_water">Tube Water</option>
                                                                                                <option value="tank_water">Tank Water</option>
                                                                                                <option value="canals">Canals</option>
                                                                                                <option value="perennial_water">Perennial Water</option>
                                                                                                <option value="multipurpose_river_valley">Multipurpose River Valley</option>
                                                                                                <option value="rain_fed">Rain Fed</option>
                                                                                                <option value="drip_irrigation">Drip Irrigation</option>
                                                                                                <option value="sprinkler">Sprinkler</option>
                                                                                                <option value="furrow">Furrow</option>
                                                                                                <option value="ditch">Ditch</option>
                                                                                                <option value="surge">Surge</option>
                                                                                                <option value="seepage">Seepage</option>
                                                                                             </select>
                                                                                        </div>
                                                                                    </div>  <!-- Source of water -->
                                                                                </div>
                                                                           </div> 
                                                                           <?php			
																		}
																		?>
                                                                    </div>	<!-- Input Fields for getting the land details -->
                                                                    
                                                                    <div  style="padding:5px;border:1px solid #d6d6d6;margin:5px;"> 
	                                                                    <input type="button" class="btn btn-warning " value="Add New" onClick="addMoreLand(0);" id="addLoanType"/>
    	                                                                <input type="button" style="display:none; float:right" class="btn btn-danger " value="Remove" data-toggle="modal" data-target="#confirm_box" data-backdrop="static" id="removeLoanType"/>
                                                                    </div>	<!-- Add More -->
                                                                    
                                                                    <div class="form-actions">
                                                                        <input type="submit" class="btn btn-primary" value="Save" id="save">
                                                                        <input type="reset" class="btn" value="Reset" id="Reset">
                                                                    </div>	<!-- Rest or Submit -->
                                                                <!-- </div> -->
                                                                
                                                            </form>
                                                        </div>	<!-- Farm Land Details -->
                                                    </div>	<!-- Main Forms -->
                                                </div>
                                            </div>
                                        </div>	<!-- LAND -->
                                        <!-- ============ -->
                                        <!-- END :   LAND -->
                                        <!-- ============ -->
                                        
                                        <!-- ============ -->
                                        <!-- START : CROP -->
                                        <!-- ============ -->
                                        <div class="tab-pane" id="crop">
                                            <div class="box box-bordered box-color lightgrey">
                                                <div class="box-content nopadding">
                                                    <div class="tas-container">
                                                        <ul class="tabs tabs-inline tabs-left">
                                                            <li class='active'>
                                                                <a href="#div_crop_cultivation" data-toggle='tab'>
                                                                    <i class="fa fa-lock"></i>Crop And Cultivation Details
                                                               	</a>
                                                            </li>	<!-- Crop And Cultivation Details -->
                                                            <li>
                                                                <a href="#div_prev_crop_cycle" data-toggle='tab'>
                                                                    <i class="fa fa-user"></i>Previous Crop Cycle Details
                                                                </a>
                                                            </li>	<!-- Applicant's Knowledge -->
                                                            <li>
                                                                <a href="#div_cur_crop_cycle" data-toggle='tab'>
                                                                    <i class="fa fa-twitter"></i>Current Crop Cycle Details
                                                                </a>
                                                            </li>	<!-- Applicant's Phone Details -->
                                                        </ul>
                                                    </div>	<!-- Side Menu [Form Name] -->
                                                    <div class="tab-content padding tab-content-inline">
                                                        <div class="tab-pane active" id="div_crop_cultivation">
                                                    		Crop And Cultivation Details
                                                            <form method="POST" enctype="multipart/form-data" class='form-horizontal form-bordered form-validate' id="frm_crop_cultivation" name="frm_crop_cultivation">

                                                                <div class="form-content" >
                                                                    <div id="crops">
                                                                        <?php
                                                                        for($j=0; $j < $no_of_crops; $j++)
                                                                        {
                                                                            $id =$j+1;

                                                                            ?>
                                                                            <div id="crop<?php echo $id; ?>" style="padding:5px;border:1px solid #d6d6d6;margin:5px;">
                                                                                <input type="hidden" name="id[]" id="id" value="<?php echo @$crops_arr[$j]['id']; ?>">    
                                                                                <h3>Crop <?php echo $id; ?></h3>

                                                                                <div class="control-group">
                                                                                    <label for="tasktitel" class="control-label">Current Crop Season <span style="color:#F00">*</span>
                                                                                    </label>
                                                                                    <div class="controls">
                                                                                        <select id="ddl_cur_crop_season<?php echo $id; ?>" name="ddl_cur_crop_season<?php echo $id; ?>" class="select2-me input-xlarge" >
                                                                                            <option value="" disabled selected>Select here</option>
                                                                                            <option value="Kharif">Kharif</option>
                                                                                            <option value="Rabi">Rabi</option>
                                                                                            <option value="Summer">Summer</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>  <!-- Current Crop Season [DDL] -->
                                                                                
                                                                                <div class="control-group">
                                                                                    <label for="tasktitel" class="control-label">Type of crop cultivating this year <span style="color:#F00">*</span>
                                                                                    </label>
                                                                                    <div class="controls">
                                                                                        <select id="ddl_cultivating<?php echo $id; ?>" name="ddl_cultivating<?php echo $id; ?>" class="input-xlarge" data-rule-required="true" > <!-- onchange="calTotal();" -->
                                                                                            <option value="" disabled selected> Select here</option>
                                                                                            <?php

                                                                                            $crops = lookup_value('tbl_crops',array(),array("crop_status"=>1),array(),array(),array());
                                                                                            while($crop = mysqli_fetch_array($crops))
                                                                                            {
                                                                                                ?>
                                                                                                <option value="<?php echo $crop['crop_id']; ?>">
                                                                                                    <?php echo $crop['crop_name']; ?>
                                                                                                </option>
                                                                                                <?php
                                                                                            }

                                                                                        ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>  <!-- Type of crop cultivating this year [DDL] -->
                                                                                
                                                                                <div class="control-group">
                                                                                    <label for="tasktitel" class="control-label">Current Stage Of Crop<span style="color:#F00">*</span>
                                                                                    </label>
                                                                                    <div class="controls">
                                                                                        <select id="ddl_stage<?php echo $id; ?>" name="ddl_stage<?php echo $id; ?>" class="input-xlarge" data-rule-required="true" > <!--onchange="calTotal()"-->
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
                                                                                </div>  <!-- Current stage of crop [DDL] -->
                                                                                
                                                                                <div class="control-group">
                                                                                    <label for="tasktitel" class="control-label">Total Yield Expected [In tonnes Per Acre] <span style="color:#F00">*</span>
                                                                                    </label>
                                                                                    <div class="controls">
                                                                                        <input type="text" id="txt_expected_yield<?php echo $id; ?>" name="txt_expected_yield<?php echo $id; ?>" class="input-xlarge" data-rule-required="true" data-rule-number="true" maxlength="10" onchange="calTotal()" placeholder="Total Yield Expected">
                                                                                    </div>
                                                                                </div>  <!-- Total Yield Expected [In tonnes Per Acre] -->
                                                                                
                                                                                <div class="control-group">
                                                                                    <label for="tasktitel" class="control-label">Potential market <span style="color:#F00">*</span>
                                                                                    </label>
                                                                                    <div class="controls">
                                                                                        <select id="ddl_potential_market<?php echo $id; ?>" name="ddl_potential_market<?php echo $id; ?>" class="select2-me input-xlarge" >
                                                                                            <option value="" disabled selected>Select here</option>
                                                                                            <option value="local_mandis">Local Mandis and Location</option>
                                                                                            <option value="FPO">FPO</option>
                                                                                            <option value="Private_Buyer">Private Buyer (Companies)</option>
                                                                                            <option value="Government">Government</option>
                                                                                            <option value="Other">Other</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>  <!-- Potential market [DDL] -->

                                                                                <div class="control-group">
                                                                                    <label for="tasktitel" class="control-label">Crop Storage <span style="color:#F00">*</span>
                                                                                    </label>
                                                                                    <div class="controls">
                                                                                        <select id="ddl_crop_storage<?php echo $id; ?>" name="ddl_crop_storage<?php echo $id; ?>" class="select2-me input-xlarge" >
                                                                                            <option value="" disabled selected>Select here</option>
                                                                                            <option value="Govt_warehouse">Govt. Warehouse</option>
                                                                                            <option value="Pvt_warehouse">Pvt. Warehouse</option>
                                                                                            <option value="Factory">Factory</option>
                                                                                            <option value="Mandis_direct">Mandis Direct</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>  <!-- Crop Storage [DDL] -->             
                                                                                <div class="control-group">
                                                                                    <label for="tasktitel" class="control-label">Expected Price This Year In Rs. <span style="color:#F00">*</span>
                                                                                    </label>
                                                                                    <div class="controls">
                                                                                        <input type="text" id="txt_expectedprice<?php echo $id; ?>" name="txt_expectedprice<?php echo $id; ?>" class="input-xlarge" data-rule-required="true" data-rule-number="true" maxlength="10" placeholder="Expected Price"> <!-- onchange="calTotal()" -->
                                                                                    </div>
                                                                                </div>  <!-- Expected Price This Year  -->
                                                                                
                                                                                <div class="control-group">
                                                                                    <label for="tasktitel" class="control-label">Total Income Expected This Year [ Per Acre Per Crop ] <span style="color:#F00">*</span>
                                                                                    </label>
                                                                                    <div class="controls">
                                                                                        <input type="text" id="txt_expectedincome<?php echo $id; ?>" name="txt_expectedincome<?php echo $id; ?>" class="input-xlarge"  data-rule-required="true" data-rule-number="true" maxlength="10"  placeholder="Total Income Expected">   <!-- onchange="calTotal()" -->
                                                                                    </div>
                                                                                </div>  <!-- Total income expected this year -->
                                                                                
                                                                                <div class="control-group">
                                                                                    <label for="tasktitel" class="control-label">Potential Crop Diseases <span style="color:#F00">*</span>
                                                                                    </label>
                                                                                    <div class="controls">
                                                                                        <select id="ddl_diseases<?php echo $id; ?>" name="ddl_diseases<?php echo $id; ?>" class="input-xlarge" data-rule-required="true" > <!-- onchange="calTotal()" -->
                                                                                            <option value="" disabled selected> Select here</option>
                                                                                            <option point="1" value="Fungal"> Fungal</option>
                                                                                            <option point="4" value="Non-fungal"> Non-fungal</option>
                                                                                            <option point="0" value="Severe"> Severe</option>
                                                                                            <option point="8" value="Treatable"> Treatable</option>
                                                                                            <option point="10" value="No potential of diseases"> No potential of diseases</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>  <!-- Potential crop diseases [DDL] -->
                                                                                
                                                                                <div class="control-group">
                                                                                    <label for="tasktitel" class="control-label">Potential Pest Control Problems <span style="color:#F00">*</span>
                                                                                    </label>
                                                                                    <div class="controls">
                                                                                        <select id="ddl_pest_problems<?php echo $id; ?>" name="ddl_pest_problems<?php echo $id; ?>" class="select2-me input-xlarge" >
                                                                                            <option value="" disabled selected>Select here</option>
                                                                                            <option value="yes">Yes</option>
                                                                                            <option value="no">No</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>  <!-- Potential Pest problems [DDL] -->
                                                                                
                                                                                <div class="control-group">
                                                                                    <label for="tasktitel" class="control-label">What kind of Fertilizer and pesticides being used <span style="color:#F00">*</span>
                                                                                    </label>
                                                                                    <div class="controls">
                                                                                        <select id="ddl_filt_type<?php echo $id; ?>" name="ddl_filt_type<?php echo $id; ?>" class="select2-me input-xlarge">
                                                                                            <option value="" disabled selected>Select here</option>
                                                                                            <option value="Organic Fertilizers">Organic Fertilizers</option>
                                                                                            <option value="Inorganic Fertilizers">Inorganic Fertilizers</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>  <!-- What kind of Fertilizer and pesticides being used [DDL] -->
                                                                            </div>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                   
                                                                    <div  style="padding:5px;border:1px solid #d6d6d6;margin:5px;"> 
                                                                        <input type="button" class="btn btn-warning " value="Add New Crop" onClick="addMoreCrop(0);" id="addCrop"/>
                                                                        <input type="button" style="display:none; float:right" class="btn btn-danger " value="Remove" data-toggle="modal" data-target="#confirm_box_crop" data-backdrop="static" id="removeCropType"/>
                                                                    </div>  <!-- Add More -->

                                                                    <div class="form-actions">
                                                                        <input type="submit" class="btn btn-primary" value="Save" id="save">
                                                                        <input type="reset" class="btn" value="Reset" id="Reset">
                                                                    </div>  <!-- Rest or Submit -->
                                                                </div>
                                                                
                                                            </form>            
                                                        </div>	<!-- Crop And Cultivation Details -->
                                                        <div class="tab-pane" id="div_prev_crop_cycle">
                                                           Previous Crop Cycle Details
                                                           <form method="POST" enctype="multipart/form-data" class='form-horizontal form-bordered form-validate' id="frm_prev_crop_cycle" name="frm_prev_crop_cycle">
                                                                
                                                            </form>
                                                        </div>	<!-- Previous Crop Cycle Details -->
                                                        <div class="tab-pane" id="div_cur_crop_cycle">
                                                           Current Crop Cycle Details
                                                           <form method="POST" enctype="multipart/form-data" class='form-horizontal form-bordered form-validate' id="frm_cur_crop_cycle" name="frm_cur_crop_cycle">
                                                            </form>
                                                        </div>	<!-- Current Crop Cycle Details -->
                                                    </div>	<!-- Main Forms -->
                                                </div>
                                            </div>
                                        </div>	<!-- CROP -->
                                        <!-- ============ -->
                                        <!-- END :   CROP -->
                                        <!-- ============ -->
                                        
                                        <!-- ============== -->
                                        <!-- START : Assets -->
                                        <!-- ============== -->
                                        <div class="tab-pane" id="assets">
                                            <div class="box box-bordered box-color lightgrey">
                                                <div class="box-content nopadding">
                                                    <div class="tas-container">
                                                        <ul class="tabs tabs-inline tabs-left">
                                                            <li class='active'>
                                                                <a href="#div_asset_details" data-toggle='tab'>
                                                                    <i class="fa fa-lock"></i>Assets Details
                                                               	</a>
                                                            </li>	<!-- Assets Details -->
                                                            <li>
                                                                <a href="#div_live_stock" data-toggle='tab'>
                                                                    <i class="fa fa-user"></i>Live Stock
                                                                </a>
                                                            </li>	<!-- Live Stock -->
                                                        </ul>
                                                    </div>	<!-- Side Menu [Form Name] -->
                                                    <div class="tab-content padding tab-content-inline">
                                                        <div class="tab-pane active" id="div_asset_details">
                                                    		Assets Details
                                                            <form method="POST" enctype="multipart/form-data" class='form-horizontal form-bordered form-validate' id="frm_asset_details" name="frm_asset_details">
                                                                
                                                                <div class="control-group">
                                                                    <label for="tasktitel" class="control-label">Vehical Owned <span style="color:#F00">*</span>
                                                                    </label>
                                                                    <div class="controls">
                                                                        <select id="ddl_vehical_owned" name="ddl_vehical_owned" class="select2-me input-xlarge" >
                                                                            <option value="" disabled selected>Select here</option>
                                                                            <option value="1">1</option>
                                                                            <option value="2">2</option>
                                                                            <option value="3">3</option>
                                                                            <option value="4_or_more">4 OR More</option>
                                                                        </select>
                                                                    </div>
                                                                </div>  <!-- Vehical Owned [DDL] -->

                                                                <div class="control-group">
                                                                    <label for="tasktitel" class="control-label">Total Value of the Vehical <span style="color:#F00">*</span>
                                                                    </label>
                                                                    <div class="controls">
                                                                        <input type="text" id="txt_total_value_of_vehical" name="txt_total_value_of_vehical" class="input-xlarge" data-rule-required="true" data-rule-number="true" maxlength="10" onchange="calTotal()" placeholder="Total Value of Vehical">
                                                                    </div>
                                                                </div>  <!-- Total Value of the Vehical -->

                                                                <div class="control-group">
                                                                    <label for="tasktitel" class="control-label">Vehical Owned <span style="color:#F00">*</span>
                                                                    </label>
                                                                    <div class="controls">
                                                                        <select id="ddl_machinery_owned" name="ddl_machinery_owned" class="select2-me input-xlarge" >
                                                                            <option value="" disabled selected>Select here</option>
                                                                            <option value="1">1</option>
                                                                            <option value="2">2</option>
                                                                            <option value="3">3</option>
                                                                            <option value="4_or_more">4 OR More</option>
                                                                        </select>
                                                                    </div>
                                                                </div>  <!-- Machinery Owned -->

                                                                <div class="control-group">
                                                                    <label for="tasktitel" class="control-label">Total Value of the Vehical <span style="color:#F00">*</span>
                                                                    </label>
                                                                    <div class="controls">
                                                                        <input type="text" id="txt_total_value_of_machinery" name="txt_total_value_of_machinery" class="input-xlarge" data-rule-required="true" data-rule-number="true" maxlength="10" onchange="calTotal()" placeholder="Total Value of Vehical">
                                                                    </div>
                                                                </div>  <!-- Total Value of the Machinery -->

                                                                <div class="control-group">
                                                                    <label for="tasktitel" class="control-label">Vehical Owned <span style="color:#F00">*</span>
                                                                    </label>
                                                                    <div class="controls">
                                                                        <select id="ddl_any_other_assets" name="ddl_any_other_assets" class="select2-me input-xlarge" >
                                                                            <option value="" disabled selected>Select here</option>
                                                                            <option value="yes">Yes</option>
                                                                            <option value="no">No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>  <!-- Any Other Assets [DDL] -->

                                                                <div id="div_any_other_assets_display" style="display: none;">
                                                                    
                                                                    <div class="control-group">
                                                                        <label for="tasktitel" class="control-label">Which Assets you owned <span style="color:#F00">*</span>
                                                                        </label>
                                                                        <div class="controls">
                                                                            <select id="ddl_which_assets_you_owned" name="ddl_which_assets_you_owned" class="select2-me input-xlarge">
                                                                                <option value="" disabled selected>Select here</option>
                                                                                <option value="Other Buildings">Other Buildings</option>
                                                                                <option value="Land">Land</option>
                                                                                <option value="Residential Building">Residential Building</option>
                                                                                <option value="Other">Other</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>  <!-- Which Assets you owned [If Yes [DDL]] -->

                                                                    <div class="control-group">
                                                                        <label for="tasktitel" class="control-label">Mention the value of the assets <span style="color:#F00">*</span>
                                                                        </label>
                                                                        <div class="controls">
                                                                            <input type="text" id="txt_mention_value_of_assets" name="txt_mention_value_of_assets" class="input-xlarge" data-rule-required="true" data-rule-number="true" maxlength="10" onchange="calTotal()" placeholder="Total Value of Vehical">
                                                                        </div>
                                                                    </div>    <!-- Mention the value of the assets [If Yes] -->
                                                                    
                                                                </div>  <!-- div_any_other_assets_display -->

                                                                <div class="form-actions" style="clear:both;">
                                                                    <button id="submit" name="Submit" type="submit" class="btn btn-primary" >Submit</button>
                                                                    <button id="reset" type="button" class="btn" onclick="window.history.back()">Cancel</button>
                                                                </div>  <!-- Cancel or Submit -->
                                                            </form>
                                                        </div>	<!-- Assets Details -->
                                                        <div class="tab-pane" id="div_live_stock">
                                                           Live Stock
                                                           <form method="POST" enctype="multipart/form-data" class='form-horizontal form-bordered form-validate' id="frm_live_stock" name="frm_live_stock">
                                                                
                                                                <div class="control-group">
                                                                    <label for="tasktitel" class="control-label">Type of Livestock <span style="color:#F00">*</span>
                                                                    </label>
                                                                    <div class="controls">
                                                                        <select id="ddl_type_of_livestock" name="ddl_type_of_livestock" class="select2-me input-xlarge" >
                                                                            <option value="" disabled selected>Select here</option>
                                                                            <option value="Dairy Cattle">Dairy Cattle</option>
                                                                            <option value="Darft Cattle">Darft Cattle</option>
                                                                            <option value="Buffalo">Buffalo</option>
                                                                            <option value="Ox">Ox</option>
                                                                            <option value="Sheep">Sheep</option>
                                                                            <option value="Goat">Goat</option>
                                                                            <option value="Pig">Pig</option>
                                                                            <option value="Poultry">Poultry</option>
                                                                            <option value="Donkey">Donkey</option>
                                                                        </select>
                                                                    </div>
                                                                </div>  <!-- Type of Livestock -->

                                                                <div class="control-group">
                                                                    <label for="tasktitel" class="control-label">Livestock Count <span style="color:#F00">*</span>
                                                                    </label>
                                                                    <div class="controls">
                                                                        <input type="text" id="txt_livestock_count" name="txt_livestock_count" class="input-xlarge" data-rule-required="true" data-rule-number="true" maxlength="10" onchange="calTotal()" placeholder="Livestock Count">
                                                                    </div>
                                                                </div>  <!-- Livestock Count -->
                                                                
                                                                <div class="control-group">
                                                                    <label for="tasktitel" class="control-label">Income Gained From Livestock <span style="color:#F00">*</span>
                                                                    </label>
                                                                    <div class="controls">
                                                                        <input type="text" id="txt_income_gained_from_livestock" name="txt_income_gained_from_livestock" class="input-xlarge" data-rule-required="true" data-rule-number="true" maxlength="10" onchange="calTotal()" placeholder="Income Gained From Livestock">
                                                                    </div>
                                                                </div>  <!-- Income Gained From Livestock -->

                                                                <div class="form-actions" style="clear:both;">
                                                                    <button id="submit" name="Submit" type="submit" class="btn btn-primary" >Submit</button>
                                                                    <button id="reset" type="button" class="btn" onclick="window.history.back()">Cancel</button>
                                                                </div>  <!-- Cancel or Submit -->

                                                            </form>
                                                        </div>	<!-- Live Stock -->
                                                    </div>	<!-- Main Forms -->
                                                </div>
                                            </div>
                                        </div>	<!-- ASSETS -->
                                        <!-- ============== -->
                                        <!-- END  : Assets -->
                                        <!-- ============== -->
                                        
                                        <!-- ============ -->
                                        <!-- START : LOAN -->
                                        <!-- ============ -->
                                        <div class="tab-pane" id="loan">
                                            <div class="box box-bordered box-color lightgrey">
                                                <div class="box-content nopadding">
                                                    <div class="tas-container">
                                                        <ul class="tabs tabs-inline tabs-left">
                                                            <li class='active'>
                                                                <a href="#div_home_loan_details" data-toggle='tab'>
                                                                    <i class="fa fa-lock"></i>Home Loan Details
                                                               	</a>
                                                            </li>	<!-- Home Loan Details -->
                                                            <li>
                                                                <a href="#div_financial_details" data-toggle='tab'>
                                                                    <i class="fa fa-user"></i>Financial Details
                                                                </a>
                                                            </li>	<!-- Financial Details -->
                                                            <li>
                                                                <a href="#div_financial_history" data-toggle='tab'>
                                                                    <i class="fa fa-user"></i>Financial History
                                                                </a>
                                                            </li>	<!-- Financial History -->
                                                        </ul>
                                                    </div>	<!-- Side Menu [Form Name] -->
                                                    <div class="tab-content padding tab-content-inline">
                                                        <div class="tab-pane active" id="div_home_loan_details">
                                                    		Home Loan Details
                                                            <form method="POST" enctype="multipart/form-data" class='form-horizontal form-bordered form-validate' id="frm_home_loan_details" name="frm_home_loan_details">

                                                                <!-- Any Loans taken against House Construction [DDL] -->

                                                                <!-- Loop Start -->
                                                                <!-- Total Amount [If Yes] -->

                                                                <!-- Bank Name [If Yes] -->

                                                                <!-- Outstanding Amount [If Yes] -->

                                                                <!-- EMI Amount paid per month [IF Yes] -->
                                                                <!-- Loop END -->

                                                                <!-- Add More Button -->

                                                                <!-- Submit and Reset Button -->

                                                            </form>
                                                        </div>	<!-- Home Loan Details -->
                                                        <div class="tab-pane" id="div_financial_details">
                                                           Financial Details
                                                           <form method="POST" enctype="multipart/form-data" class='form-horizontal form-bordered form-validate' id="frm_financial_details" name="frm_financial_details">
                                                                
                                                            </form>
                                                        </div>	<!-- Financial Details -->
                                                        <div class="tab-pane" id="div_financial_history">
                                                           Financial History
                                                           <form method="POST" enctype="multipart/form-data" class='form-horizontal form-bordered form-validate' id="frm_financial_history" name="frm_financial_history">
                                                                
                                                            </form>
                                                        </div>	<!-- Financial History -->
                                                    </div>	<!-- Main Forms -->
                                                </div>
                                            </div>
                                        </div>	<!-- LOAN -->
                                        <!-- ============ -->
                                        <!-- END : LOAN -->
                                        <!-- ============ -->
                                    </div>
                                </div>
                            </div>
                       	</div>
                   	</div>
               	</div>
           	</div>
        </div>

        <div class="modal fade" id="confirm_box" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Remove Confirmation</h4>
                    </div>
                    <div class="modal-body">
                        <p >Are you sure want to remove land?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="addMoreLand(1);" data-dismiss="modal">
                            Yes
                        </button>
                        &nbsp;
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            No
                        </button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="modal fade" id="confirm_box_crop" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Remove Confirmation</h4>
                    </div>
                    <div class="modal-body">
                        <p >Are you sure want to remove crop?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="addMoreCrop(1);" data-dismiss="modal">
                            Yes
                        </button>
                        &nbsp;
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            No
                        </button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <script type="text/javascript">
			var spouse_g_total 				= 0;
			var applicant_knowledge_g_total	= 0;
			var phone_details_g_total		= 0;
			var family_details_g_total		= 0;
			var appliances_motors_g_total	= 0;
			
			$(document).ready(function()
			{
				$('body').on('change','#f3_spouse_age, #f3_spouse_shg, #f3_spouse_occp, #f3_spouse_income', function(){
					calTotal();
				});
	
				$('#f3_married').on('change', function(){
					if($(this).val() == 'yes'){
						$('#spouse_detail').show('swing');
					}
					else
					{
						$('#spouse_detail').hide('swing');
						$('#spouse_detail').find('input, select').val('').trigger('change');
					}
					calTotal();
				});
	
				$('#f3_spouse_mfi').on('change', function(){
					if($(this).val() == 'yes'){
						$('#microfinance').show('swing');
					}
					else
					{
						$('#microfinance').hide('swing');
						$('#microfinance').find('input, select').val('').trigger('change');
					}
					calTotal();
				});
	
				$('#f3_affliation_status').on('change', function(){
					if($(this).val() == 'yes'){
						$('#div_affliation_display').show('swing');
					}
					else
					{
						$('#div_affliation_display').hide('swing');
						$('#div_affliation_display').val('');
					}
					calTotal();	
				});
	
				$('#f3_spouse_shg').on('change', function(){
					if($(this).val() == 'yes'){
						$('#shg_name').show('swing');
					}
					else
					{
						$('#shg_name').hide('swing');
						$('#shg_name').val('');
					}
					calTotal();
				});
	
	
				$('#f3_spouse_occp').on('change', function(){
					if($(this).val() == 'housewife'){
						$('#input_income').hide('swing').find('input').val('');
					}
					else
					{
						$('#input_income').show('swing');
						$('#input_income').val('');
					}
					calTotal();
				});
				
				$('#f5_phonetype').on('change', function(){
					if($(this).val() == 'smartphone'){
						$('#div_smartphone_display').show('swing');
					}
					else
					{
						$('#div_smartphone_display').hide('swing');
						$('#div_smartphone_display').find('input, select').val('').trigger('change');
					}
					calTotal();
				});
				
				$('#f5_any_one_have_smart_phone').on('change', function(){
					calTotal();
				}); 
				
				$('#f5_datapack').on('change', function(){ 
					calTotal();
				});
				
				$('#f5_farmapp').on('change', function(){
					calTotal();
				});
				
				$('#f5_appuse').on('change', function(){
					if($(this).val() == 'yes'){
						$('#div_app_name_display').show('swing');
					}
					else
					{
						$('#div_app_name_display').hide('swing');
						$('#div_app_name_display').find('input, select').val('').trigger('change');
					}
				});
				
				$('#f6_children').on('change', function(){
					if($(this).val() == '0' || $(this).val() == '' || $(this).val() == null){
						//$('#use_smartphone').show('swing');
						$('#use_smartphone').hide('swing');
						$('#use_smartphone').find('input, select').val('').trigger('change');
					}
					else
					{
						//$('#use_smartphone').hide('swing');
						//$('#use_smartphone').find('input, select').val('').trigger('change');
						$('#use_smartphone').show('swing');
					}
					calTotal();
				});
				
				$('#f7_television').on('blur', function(){
					alert($(this).val());
					if($(this).val() != '0' && $(this).val() != '')
					{
						alert('aala');
						calTotal();
					}
				});
				
				$('#f3_married').val('<?= @$data['f3_married']; ?>');
				$('#f3_spouse_fname').val('<?= @$data['f3_spouse_fname']; ?>');
				$('#f3_spouse_age').val('<?= @$data['f3_spouse_age']; ?>');
				$('#f3_spouse_mobno').val('<?= @$data['f3_spouse_mobno']; ?>');
				$('#f3_spouse_adhno').val('<?= @$data['f3_spouse_adhno']; ?>');
				$('#f3_spouse_shg').val('<?= @$data['f3_spouse_shg']; ?>');
				$('#f3_spouse_shgname').val('<?= @$data['f3_spouse_shgname']; ?>');
				$('#f3_spouse_occp').val('<?= @$data['f3_spouse_occp']; ?>');
				$('#f3_spouse_income').val('<?= @$data['f3_spouse_income']; ?>');
				$('#f3_spouse_mfi').val('<?= @$data['f3_spouse_mfi']; ?>');
				$('#f3_spouse_mfiname').val('<?= @$data['f3_spouse_mfiname']; ?>');
				$('#f3_spouse_mfiamount').val('<?= @$data['f3_spouse_mfiamount']; ?>');
				$('#f3_fpo_name').val('<?= @$data['f3_fpo_name']; ?>');
				$('#f3_bank_name').val('<?= @$data['f3_bank_name']; ?>');
				$('#f3_points').val('<?= @$data['f3_points']; ?>');
				
				$('#f2_edudetail').val('<?= @$data['f2_edudetail']; ?>');
				$('#f2_proficiency').val('<?= @$data['f2_proficiency']; ?>');
				$('#f2_participation').val('<?= @$data['f2_participation']; ?>');
				$('#f2_typeprog').val('<?= @$data['f2_typeprog']; ?>');
				$('#f2_condprog').val('<?= @$data['f2_condprog']; ?>');
				$('#f2_cropprog').val('<?= @$data['f2_cropprog']; ?>');
				$('#f2_durprog').val('<?= @$data['f2_durprog']; ?>');
				$('#f2_participation').trigger('change');
				$('#f2_typeprog').trigger('change');
				
				$('#f5_phonetype').val('<?= @$data['f5_phonetype']; ?>');
				$('#f5_servpro').val('<?= @$data['f5_servpro']; ?>');
				$('#f5_network').val('<?= @$data['f5_network']; ?>');
				$('#f5_datapack').val('<?= @$data['f5_datapack']; ?>');
				$('#f5_datapackname').val('<?= @$data['f5_datapackname']; ?>');
				$('#f5_appuse').val('<?= @$data['f5_appuse']; ?>');
				$('#f5_farmapp').val('<?= @$data['f5_farmapp']; ?>');
				$('#f5_any_one_have_smart_phone').val('<?= @$data['f5_any_one_have_smart_phone']; ?>');
				$('#f5_app_name').val('<?= @$data['f5_app_name']; ?>');
				$('input, select').trigger('change');
				
				$('#f6_jointfamily').val('<?= @$data['f6_jointfamily']; ?>');
				$('#f6_members').val('<?= @$data['f6_members']; ?>');
				$('#f6_children').val('<?= @$data['f6_children']; ?>');
				$('#f6_smartuse').val('<?=  @$data['f6_smartuse']; ?>');
				$('#f6_children').trigger('change');
				
				$('#f7_television').val('<?= @$data['f7_television']; ?>');
				$('#f7_refrigerator').val('<?= @$data['f7_refrigerator']; ?>');
				$('#f7_wmachine').val('<?= @$data['f7_wmachine']; ?>');
				$('#f7_mixer').val('<?= @$data['f7_mixer']; ?>');
				$('#f7_stove').val('<?= @$data['f7_stove']; ?>');
				$('#f7_bicycle').val('<?= @$data['f7_bicycle']; ?>');
				$('#f7_ccylinder').val('<?= @$data['f7_ccylinder']; ?>');
				$('#f7_fans').val('<?= @$data['f7_fans']; ?>');
				$('#f7_motorcycle').val('<?= @$data['f7_motorcycle']; ?>');
				$('#f7_car').val('<?= @$data['f7_car']; ?>');
				
				if($('#f3_married').val() == 'yes'){
					$('#spouse_detail').show('swing');
				}
	
				if($('#f3_spouse_shg').val() == 'yes')
				{
					$('#shg_name').show('swing');
				}
	
				if($('#f3_spouse_occp').val() == 'other' || $('#f3_spouse_occp').val() == 'farmer')
				{
					$('#input_income').show('swing');	
				}
				
				if($('#f3_affliation_status').val() == 'yes')
				{
					$('#div_affliation_display').show('swing');	
				}
				
				if($('#f3_spouse_mfi').val() == 'yes')
				{
					$('#microfinance').show('swing');
				}
				else
				{
					$('#microfinance').find('input, select').val('');
				}
				
				if($('#f5_phonetype').val() == 'smartphone')
				{
					$('#div_smartphone_display').show('swing');
				}
				else
				{
					$('#div_smartphone_display').find('input, select').val('');
				}
				
				if($('#f5_appuse').val() == 'yes')
				{
					$('#div_app_name_display').show('swing');
				}
				else
				{
					$('#div_app_name_display').find('input, select').val('');
				}
				
				
				if($('#f6_children').val() != '0' || $('#f6_children').val() != ''  || $(this).val() != null)
				{
					$('#use_smartphone').show('swing');
				}
				else
				{
					$('#use_smartphone').find('input, select').val('');
				}
	
				$('#spouse_detail').find('input, select').trigger('change');
				calTotal();
				
			});
			
			function convertIncomeToPoint(x)
			{
				if(x >= 500 && x <= 2500)
				{
					return 2;
				}
				else if(x >= 2501 && x <= 5000)
				{
					return 4;
				}
				else if(x >= 5001 && x <= 7500)
				{
					return 6;
				}
				else if(x > 7500)
				{
					return 8;	
				}
				else
				{
				  return 0;
				}
			}
			
			function convertMfiamountToPoint(x)
			{
				if(x >= 100 && x <= 2500)
				{
					return 2;
				}
				else if(x >= 2501 && x <= 5000)
				{
					return 4;
				}
				else if(x >= 5001 && x <= 7500)
				{
					return 8;
				}
				else if(x >= 7501 && x <= 10000)
				{
					return 10;
				}
				else if(x > 10000)
				{
					return 6;	
				}
				else
				{
				  return 0;
				}	
			}
			
			function convertMemebersToPoint(x)
			{
				if(x >= 0 && x <= 2)
				{
				  return 10;
				}
				else if(x >= 3 && x <= 5)
				{
				  return 4;
				}
				else if(x >= 6 && x <= 7)
				{
				  return 2;
				}
				else if(x >= 8)
				{
				  return 0;
				}
				else
				{
				  return 0;
				}
			}
			
			function calTotal()
			{
				var f3_married	= '<?php echo $married_status; ?>';
				if(f3_married == 'yes')
				{
					$('#f3_married').val('yes');	
				}
				else
				{
					$('#f3_married').val('no');
				}
				
				var married	= parseInt($('option:selected','#f3_married').attr('point')) || 0;
				
				if(married === 10)
				{
					var age 		= parseInt($('#f3_spouse_age').val()) || 0;
					var shg 		= parseInt($('option:selected','#f3_spouse_shg').attr('point'))  || 0;
					var occp 		= parseInt($('option:selected','#f3_spouse_occp').attr('point')) || 0;
					var affliation	= parseInt($('option:selected','#f3_affliation_status').attr('point')) || 0;
					var income 		= parseInt($('#f3_spouse_income').val()) || 0;
	
					//age 	= convertAgeToPoint(age);
					income 	= convertIncomeToPoint(income);
	
					if($('#f3_spouse_mfi').val() === 'yes')
					{
						var mfiamount	= parseInt($('#f3_spouse_mfiamount').val()) || 0;
						
						mfiamount	= convertMfiamountToPoint(mfiamount);
						spouse_g_total = married + shg + occp + income + affliation + mfiamount;
					}
					else
					{
						spouse_g_total = married + shg + occp + income + affliation;
					}
	
				}
				else
				{
					spouse_g_total = married ;
				}
				document.getElementById('spouse_g_total').innerHTML = spouse_g_total;
				var no_of_point	= 1;
				if(married === 10)
				{
					no_of_point += 3;
					
					if(shg == 'yes')
					{
						no_of_point +=1;
					}
					if($('#f3_spouse_mfi').val() === 'yes')
					{
						no_of_point +=3;
					}
				}
				var f3_pt = spouse_g_total/no_of_point;
				f3_pt     = f3_pt.toFixed(2);
				$('#f3_points').val(f3_pt);
				$('#f3_pt').html(f3_pt);
				
				
				var a = parseInt($('option:selected','#f2_proficiency').attr('point')) || 0;
				var b = parseInt($('option:selected','#f2_edudetail').attr('point')) || 0;
				var c = parseInt($('option:selected','#f2_participation').attr('point')) || 0;
				applicant_knowledge_g_total = a + b + c;
				
				document.getElementById('applicant_knowledge_g_total').innerHTML=applicant_knowledge_g_total;
				
				var f2_pt = applicant_knowledge_g_total/3;
				f2_pt     = f2_pt.toFixed(2);
				$('#f2_points').val(f2_pt);
				$('#f2_pt').html(f2_pt);
				
				
				var phoneType		= parseInt($('option:selected','#f5_phonetype').attr('point')) || 0;
				var anyOtherSPUser	= parseInt($('option:selected','#f5_any_one_have_smart_phone').attr('point')) || 0;
				var dataPack		= parseInt($('option:selected','#f5_datapack').attr('point')) || 0;
				var farmApp			= parseInt($('option:selected','#f5_farmapp').attr('point')) || 0;
				
				phone_details_g_total	= phoneType + anyOtherSPUser + dataPack + farmApp;
				
				document.getElementById('phone_details_g_total').innerHTML=phone_details_g_total;
				
				var f5_pt = phone_details_g_total/3;
				f5_pt     = f5_pt.toFixed(2);
				$('#f5_points').val(f5_pt);
				$('#f5_pt').html(f5_pt);
				
				
				var jointFamily = parseInt($('option:selected','#f6_jointfamily').attr('point')) || 0;
				var children 	= $('#f6_children').val() != '' ? parseInt($('#f6_children').val()) : '';
				var smartuse 	= parseInt($('option:selected','#f6_smartuse').attr('point')) || 0;
	
				children = convertMemebersToPoint(children);
	
				family_details_g_total = jointFamily + children + smartuse;
				document.getElementById('family_details_g_total').innerHTML=family_details_g_total;
				var f6_pt = '';
				if($('#f6_children').val() == '' || $('#f6_children').val() == 0)
				{
					f6_pt = family_details_g_total/2;
				}
				else
				{
					f6_pt = family_details_g_total/3;
				}
	
				f6_pt     = f6_pt.toFixed(2);
				$('#f6_points').val(f6_pt);
				$('#f6_pt').html(f6_pt);
			}
			
			$('#frm_knowledge_detail').on('submit', function(e) 
			{
				e.preventDefault();
				if ($('#frm_knowledge_detail').valid())
				{
					loading_show();	
					$.ajax({
							type: "POST",
							url: "action_pages/action_frm3.php",
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
									window.location.href="get_farmer_details.php?pag=farmers&fm_id=<?php echo $fm_id; ?>";
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
			
			$('#frm_applicant_knowledge').on('submit', function(e) 
			{
				e.preventDefault();
				if ($('#frm_applicant_knowledge').valid())
				{
					loading_show();	
					$.ajax({
						type: "POST",
						url: "action_pages/action_frm2.php",
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
								window.location.href="get_farmer_details.php?pag=farmers&fm_id=<?php echo $fm_id; ?>";
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
			
			$('#frm_applicant_phone').on('submit', function(e) 
			{
				e.preventDefault();
				if ($('#frm_applicant_phone').valid())
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
									window.location.href="get_farmer_details.php?pag=farmers&fm_id=<?php echo $fm_id; ?>";
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
		
			$('#frm_family_details').on('submit', function(e) 
			{
				e.preventDefault();
				if ($('#frm_family_details').valid())
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
								window.location.href="get_farmer_details.php?pag=farmers&fm_id=<?php echo $fm_id; ?>";
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
			
			$('#f2_participation').on('change', function(){
				if($(this).val() == 'yes'){
					$('#program_detail').show('swing');
				}
				else
				{
					$('#program_detail').hide('swing');
					$('#program_detail').find('input, select').val('').trigger('change');
				}
				calTotal();
			});
			
			$('#f2_typeprog').on('change', function(){
				if($(this).val()){
					$('#progType').text($(this).val());
				}
				else{
					$('#progType').text('Crop');
				}
			});
        </script>
    </body>
</html>