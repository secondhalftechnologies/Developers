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
		if($num != 0)
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
			
			$data['f3_married_reg_points']		= $row_spouse_details['f3_married_reg_points'];
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
		if($num_applicant_phone != 0)
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
			
			$data['f7_points']        = @$row_residence_details['f7_points'];
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
			$data['f7_reg_points']    = @$row_residence_details['f7_reg_points'];
			
		}
	}
	
	$no_of_land	= 1;
	$land_arr  	= array();
	$res_land_details 	= lookup_value('tbl_land_details',array(),array("fm_id"=>$fm_id),array(),array(),array());
	if($res_land_details)
	{
		$num_land_details    = mysqli_num_rows($res_land_details);
		if($num_land_details != 0)
		{
			while($row_land_details	= mysqli_fetch_array($res_land_details))
			{
				array_push($land_arr ,$row_land_details);
			}
			$no_of_land = sizeof($land_arr);
		}
	}
	
	$no_of_crops	= 1;
	$crops_arr  	= array();
	$res_cultivation_data = lookup_value('tbl_cultivation_data',array(),array("fm_id"=>$fm_id),array(),array(),array());
	if($res_cultivation_data)
	{
		while($row_cultivation_data = mysqli_fetch_array($res_cultivation_data))
		{
			array_push($crops_arr ,$row_cultivation_data);
		}
		$no_of_crops = sizeof($crops_arr);
	}
	
	$no_of_prev_crops	= 1;
	$prev_crops_arr		= array();
	$res_yield_details 	= lookup_value('tbl_yield_details',array(),array("fm_id"=>$fm_id),array(),array(),array());
	if($res_yield_details)
	{
		while($row_yield_details = mysqli_fetch_array($res_yield_details))
		{
		  array_push($prev_crops_arr ,$row_yield_details);
		}
		$no_of_prev_crops = sizeof($prev_crops_arr);
	}
	
	$no_of_cur_crops	= 1;
	$cur_crops_arr		= array();
	$res_current_crop_forecast 	= lookup_value('tbl_current_crop_forecast',array(),array("fm_id"=>$fm_id),array(),array(),array());
	if($res_current_crop_forecast)
	{
		while($row_current_crop_forecast = mysqli_fetch_array($res_current_crop_forecast))
		{
		  array_push($cur_crops_arr ,$row_current_crop_forecast);
		}
		$no_of_cur_crops = sizeof($cur_crops_arr);
	}
	
	$res_asset_details	= lookup_value('tbl_asset_details',array(),array("fm_id"=>$fm_id),array(),array(),array());
	if($res_asset_details)
	{
		$num_asset_details	= mysqli_num_rows($res_asset_details);
		if($num_asset_details != 0)
		{
			$row_asset_details					= mysqli_fetch_array($res_asset_details);
			$data['f12_machinery']				= $row_asset_details['f12_machinery'];
			$data['f12_vehicle']				= $row_asset_details['f12_vehicle'];
			$data['f12_total_val_of_vehical']	= $row_asset_details['f12_total_val_of_vehical'];
			$data['f12_total_val_of_machinery']	= $row_asset_details['f12_total_val_of_machinery'];
			$data['f12_any_other_assets']		= $row_asset_details['f12_any_other_assets'];
			$data['f12_name_of_other_assets']	= $row_asset_details['f12_name_of_other_assets'];
			$data['f12_mention_value_of_assets']= $row_asset_details['f12_mention_value_of_assets'];
		}
		else
		{
			$data['f12_machinery']				= '';
			$data['f12_vehicle']				= '';
			$data['f12_total_val_of_vehical']	= '';
			$data['f12_total_val_of_machinery']	= '';
			$data['f12_any_other_assets']		= '';
			$data['f12_name_of_other_assets']	= '';
			$data['f12_mention_value_of_assets']= '';  
		}
	}
	
	$res_livestock_details = lookup_value('tbl_livestock_details',array(),array("fm_id"=>$fm_id),array(),array(),array());
	if($res_livestock_details)
	{
		$num_livestock_details    = mysqli_num_rows($res_livestock_details);
		if($num_livestock_details != 0)
		{
			$row_livestock_details 			= mysqli_fetch_array($res_livestock_details);
			$data['f13_dairy_cattle']		= $row_livestock_details['f13_dairy_cattle'];
			$data['f13_draft_cattle']		= $row_livestock_details['f13_draft_cattle'];
			$data['f13_buffalo']			= $row_livestock_details['f13_buffalo'];
			$data['f13_ox']					= $row_livestock_details['f13_ox'];
			$data['f13_sheep']				= $row_livestock_details['f13_sheep'];
			$data['f13_goat']				= $row_livestock_details['f13_goat'];
			$data['f13_pig']				= $row_livestock_details['f13_pig'];
			$data['f13_poultry']			= $row_livestock_details['f13_poultry'];
			$data['f13_donkeys']			= $row_livestock_details['f13_donkeys'];
			$data['f13_livestock_count']	= $row_livestock_details['f13_livestock_count'];
			$data['f13_livestock_income']	= $row_livestock_details['f13_livestock_income'];
		}
		else
		{
			$data['f13_dairy_cattle']		= '';
			$data['f13_draft_cattle']		= '';
			$data['f13_buffalo']			= '';
			$data['f13_ox']					= '';
			$data['f13_sheep']				= '';
			$data['f13_goat']				= '';
			$data['f13_pig']				= '';
			$data['f13_poultry']			= '';
			$data['f13_donkeys']			= '';
			$data['f13_livestock_count']	= '';
			$data['f13_livestock_income']	= '';
		}
	}
	
	$no_of_loan	= "";
	$loan_arr  	= array();
	
	$res_loan_details	= lookup_value('tbl_loan_details',array(),array("fm_id"=>$fm_id),array(),array(),array());
	if($res_loan_details)
	{
		$num    = mysqli_num_rows($res_loan_details);
		if($num !=0)
		{
			$row_loan_details	= mysqli_fetch_array($res_loan_details);
			$data['fx_monthly_income']        		= $row_loan_details['fx_monthly_income'];
			$data['f8_loan_taken']		          	= $row_loan_details['f8_loan_taken'];
			$data['f8_points']						= $row_loan_details['f8_points'];
			
			$data['f8_loan_borrowed_from']			= $row_loan_details['f8_loan_borrowed_from'];
			$data['f8_any_insurance']				= $row_loan_details['f8_any_insurance'];
			$data['f8_reason_for_insurance']		= $row_loan_details['f8_reason_for_insurance'];
			$data['f8_insurance_name']				= $row_loan_details['f8_insurance_name'];
			$data['f8_other_insurance']				= $row_loan_details['f8_other_insurance'];
			$data['f8_prev_loan_details']			= $row_loan_details['f8_prev_loan_details'];
			$data['f8_use_of_prev_loan_amount']		= $row_loan_details['f8_use_of_prev_loan_amount'];
			$data['f8_any_subsidies']				= $row_loan_details['f8_any_subsidies'];
			$data['f8_subsidy_name']				= $row_loan_details['f8_subsidy_name'];
			$data['f8_any_loan_waivers']			= $row_loan_details['f8_any_loan_waivers'];
			$data['f8_waiver_name']					= $row_loan_details['f8_waiver_name'];
			$data['f8_financial_history_points']	= $row_loan_details['f8_financial_history_points'];
			
			$loan_result     = lookup_value('tbl_bank_loan_detail',array(),array("fk_loan_detailsid"=>$row_loan_details['id']),array(),array(),array());
			
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
																	if(isset($pt_row['pt_frm2']) && $pt_row['pt_frm2'] != '') 
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
                                                                    <input type="hidden" id="f3_married_reg_points" name="f3_married_reg_points" value="<?php echo $data['f3_married_reg_points']; ?>">
                                                                    <input type="hidden" id="f3_married" name="f3_married" value="<?php echo $married_status; ?>">
                                                                    
                                                                    
                                                                    <div class="form-content">
                                                                    	<!--<div class="control-group">
                                                                            <label for="text" class="control-label" style="margin-top:10px">Are You Married? <span style="color:#F00">*</span></label>
                                                                            <div class="controls">
                                                                                <select id="f3_married" name="f3_married" class="select2-me input-xlarge" data-rule-required="true">
                                                                                    <option value="" disabled > Select here</option>
                                                                                    <option value="yes" point="10" <?php //if($married_status == 'yes'){?> selected="selected" <?php //} ?>> Yes</option>
                                                                                    <option value="no" point="2" <?php //if($married_status == 'no'){?> selected="selected" <?php //} ?>> No</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>-->	<!-- Are You Married? -->
                                                                        
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
                                                                                        <option value="yes" point="10" <?php if((isset($data['f3_spouse_shg'])) && $data['f3_spouse_shg'] == 'yes'){ ?> selected <?php }  ?>> Yes</option>
                                                                                        <option value="no" point="0" <?php if((isset($data['f3_spouse_shg'])) && $data['f3_spouse_shg'] == 'no'){ ?> selected <?php }  ?>> No</option>
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
                                                                                        <option value="housewife" point="0" <?php if((isset($data['f3_spouse_occp'])) && $data['f3_spouse_occp'] == 'housewife'){ ?> selected <?php }  ?>> Housewife</option>
                                                                                        <option value="farmer"    point="10" <?php if((isset($data['f3_spouse_occp'])) && $data['f3_spouse_occp'] == 'farmer'){ ?> selected <?php }  ?>> Farmer</option>
                                                                                        <option value="other"     point="5" <?php if((isset($data['f3_spouse_occp'])) && $data['f3_spouse_occp'] == 'other'){ ?> selected <?php }  ?>> Other</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>	<!-- Spouse's Occupation -->
                            
                                                                            <div class="control-group" id="input_income" style="display: none;">
                                                                                <label for="numberfield" class="control-label">Spouse Income per month<span style="color:#F00">*</span></label>
                                                                                <div class="controls">
                                                                                    <input type="text" placeholder="Spouse Income per month" name="f3_spouse_income" id="f3_spouse_income" value="<?php if((isset($data['f3_spouse_income'])) && $data['f3_spouse_income'] != ''){ echo $data['f3_spouse_income']; } ?>" data-rule-number="true"  class="input-xlarge" data-rule-maxlength="10" data-rule-required="true">
                                                                                </div>
                                                                            </div>	<!-- Spouse's Income-->
                            
                                                                            <div class="control-group">
                                                                                <label for="text" class="control-label" style="margin-top:10px">Any micro finance help taken by spouse?<span style="color:#F00">*</span></label>
                                                                                <div class="controls">
                                                                                    <select id="f3_spouse_mfi" name="f3_spouse_mfi" class="select2-me input-xlarge" data-rule-required="true">
                                                                                        <option value="" disabled selected> Select here</option>
                                                                                        <option value="yes" point="10" <?php if((isset($data['f3_spouse_mfi'])) && $data['f3_spouse_mfi'] == 'yes'){ ?> selected <?php }  ?>> Yes</option>
                                                                                        <option value="no" point="0" <?php if((isset($data['f3_spouse_mfi'])) && $data['f3_spouse_mfi'] == 'no'){ ?> selected <?php }  ?>> No</option>
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
                                                                                        <input type="text" placeholder="Amount Taken" name="f3_spouse_mfiamount" id="f3_spouse_mfiamount" value="<?php if((isset($data['f3_spouse_mfiamount'])) && $data['f3_spouse_mfiamount'] != ''){ echo $data['f3_spouse_mfiamount']; } ?>" class="input-xlarge v_number" data-rule-number="true" data-rule-required="true"  data-rule-maxlength="8">
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
                                                                                        <option value="yes" point="10" <?php if((isset($data['f3_affliation_status'])) && $data['f3_affliation_status'] == 'yes'){ ?> selected <?php }  ?>> Yes</option>
                                                                                        <option value="no" point="0" <?php if((isset($data['f3_affliation_status'])) && $data['f3_affliation_status'] == 'no'){ ?> selected <?php }  ?>> No</option>
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
                                                                            <select id="f2_edudetail" name="f2_edudetail" class="select2-me input-xlarge" data-rule-required="true" onchange="calTotal_f2()">
                                                                                <option value="" disabled selected> Select here</option>
                                                                                <option value="illiterate" point="2" <?php if((isset($data['f2_edudetail'])) && $data['f2_edudetail'] == 'illiterate'){ ?> selected <?php } ?>>Illiterate</option>
                                                                                <option value="primary education" point="4" <?php if((isset($data['f2_edudetail'])) && $data['f2_edudetail'] == 'primary education'){ ?> selected <?php } ?>>Primary Education</option>
                                                                                <option value="matriculate" point="6" <?php if((isset($data['f2_edudetail'])) && $data['f2_edudetail'] == 'matriculate'){ ?> selected <?php } ?>>Matriculate</option>
                                                                                <option value="graduate" point="8" <?php if((isset($data['f2_edudetail'])) && $data['f2_edudetail'] == 'graduate'){ ?> selected <?php } ?>>Graduate</option>
                                                                                <option value="post graduate" point="10" <?php if((isset($data['f2_edudetail'])) && $data['f2_edudetail'] == 'post graduate'){ ?> selected <?php } ?>>Post Graduate</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>	<!-- Educational Qualification Details [DDL] -->
                                                                    
                                                                    <div class="control-group">
                                                                        <label for="text" class="control-label" style="margin-top:10px">Regional Language Knowledge <span style="color:#F00">*</span></label>
                                                                        <div class="controls">
                                                                            <select id="f2_proficiency" data-rule-required="true" name="f2_proficiency" class="select2-me input-xlarge" onchange="calTotal_f2()">
                                                                                <option value="" disabled selected> Select here</option>
                                                                                <option value="read write" point="10" <?php if((isset($data['f2_proficiency'])) && $data['f2_proficiency'] == 'read write'){ ?> selected <?php } ?>>Read and Write</option>
                                                                                <option value="read only" point="5" <?php if((isset($data['f2_proficiency'])) && $data['f2_proficiency'] == 'read only'){ ?> selected <?php } ?>>Read Only</option>
                                                                                <option value="understand only" point="0" <?php if((isset($data['f2_proficiency'])) && $data['f2_proficiency'] == 'understand only'){ ?> selected <?php } ?>>Understand Only</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>	<!-- Regional Language Knowledge [DDL] -->
                                                                    
                                                                    <div class="control-group">
                                                                        <label for="text" class="control-label" style="margin-top:10px">Participation in Farming Programs</label>
                                                                        <div class="controls">
                                                                            <select id="f2_participation" data-rule-required="true" name="f2_participation" class="select2-me input-xlarge">
                                                                                <option value="" disabled selected> Select here</option>
                                                                                <option value="yes" point="10" <?php if((isset($data['f2_participation'])) && $data['f2_participation'] == 'yes'){ ?> selected <?php } ?>> Yes</option>
                                                                                <option value="no" point="0" <?php if((isset($data['f2_participation'])) && $data['f2_participation'] == 'no'){ ?> selected <?php } ?>> No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>	<!-- Participation in any Farming Program / Trainings [DDL] -->
                                                                    
                                                                    <div id="program_detail" style="display: none; padding: 10px; border:1px solid #d6d6d6; margin: 20px;">
                                                                    	
                                                                        <div class="control-group">
                                                                            <label for="text" class="control-label" style="margin-top:10px">Type of the training Programs<span style="color:#F00">*</span></label>
                                                                            <div class="controls">
                                                                                <select id="f2_typeprog" name="f2_typeprog" class="select2-me input-xxlarge" data-rule-required="true">
                                                                                    <option value="" disabled selected> Select here</option>
                                                                                    <option value="organic farming training" <?php if((isset($data['f2_typeprog'])) && $data['f2_typeprog'] == 'organic farming training'){ ?> selected <?php } ?>> Organic Farming Training</option>
                                                                                    <option value="equipment training" <?php if((isset($data['f2_typeprog'])) && $data['f2_typeprog'] == 'equipment training'){ ?> selected <?php } ?>> Equipment Training</option>
                                                                                    <option value="technology training" <?php if((isset($data['f2_typeprog'])) && $data['f2_typeprog'] == 'technology training'){ ?> selected <?php } ?>> Technology Training</option>
                                                                                    <option value="pesticide fertilizer training" <?php if((isset($data['f2_typeprog'])) && $data['f2_typeprog'] == 'pesticide fertilizer training'){ ?> selected <?php } ?>> Pesticide/Fertilizer Training</option>
                                                                                    <option value="other farming training" <?php if((isset($data['f2_typeprog'])) && $data['f2_typeprog'] == 'other farming training'){ ?> selected <?php } ?>> Other Farming Training</option>
                                                                                    <option value="others" <?php if((isset($data['f2_typeprog'])) && $data['f2_typeprog'] == 'others'){ ?> selected <?php } ?>> Others</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>	<!-- Type of Training Programs [If Yes] -->
                                                                    
                                                                    	<div class="control-group">
                                                                            <label for="numberfield" class="control-label">
                                                                                What was the duration of the program?<span style="color:#F00">*</span>
                                                                            </label>
                                                                            <div class="controls">
                                                                                <input type="text" placeholder="00" id="f2_durprog" name="f2_durprog" value="<?php if((isset($data['f2_durprog'])) && $data['f2_durprog'] != ''){ echo $data['f2_durprog']; } ?>" class="input-xlarge v_number" data-rule-required="true" data-rule-number="true"  data-rule-maxlength="3"> Days
                                                                            </div>
                                                                        </div>  <!-- What was the duration of the program [If Yes] -->
                                                                        
                                                                        <div class="control-group">
                                                                            <label for="text" class="control-label" style="margin-top:10px">
                                                                                Who conducted the Program? <span style="color:#F00">*</span>
                                                                            </label>
                                                                            <div class="controls">
                                                                                <input type="text" placeholder="Who conducted the Program" id="f2_condprog" name="f2_condprog" value="<?php if((isset($data['f2_condprog'])) && $data['f2_condprog'] != ''){ echo $data['f2_condprog']; } ?>" class="input-xlarge v_name" data-rule-required="true" data-rule-minlength="4" data-rule-maxlength="100">
                                                                            </div>
                                                                        </div>  <!-- Who conducted the Program [If Yes] -->
                                                                        
                                                                        <div class="control-group">
                                                                            <label for="text" class="control-label" style="margin-top:10px">
                                                                                For which crop was the program held? <span style="color:#F00">*</span>
                                                                            </label>
                                                                            <div class="controls">
                                                                                <input type="text" placeholder="Name" id="f2_cropprog" name="f2_cropprog" class="input-xlarge v_name" value="<?php if((isset($data['f2_cropprog'])) && $data['f2_cropprog'] != ''){ echo $data['f2_cropprog']; } ?>" data-rule-required="true" data-rule-minlength="4" data-rule-maxlength="100">
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
                                                                <input type="hidden" id="f5_points" name="f5_points" value="">
                                                                
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
                                                                                <select id="f6_smartuse" name="f6_smartuse" class="select2-me input-xlarge" data-rule-required="true" onchange="calTotal_f6()">
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
                                                                    <input type="hidden" id="f7_reg_points" name="f7_reg_points" value="<?php echo $data['f7_reg_points']; ?>" >
                                                                    
                                                                    <div class="form-content">
                                                                    
                                                                        <div class="control-group">
                                                                            <label for="text" class="control-label" style="margin-top:10px">Television
                                                                            <span style="color:#F00">*</span></label>
                                                                            <div class="controls">
                                                                                <input type="text" onKeyPress="return numsonly(event);" name="f7_television" id="f7_television" placeholder="Television" class="input-xlarge v_number cal_tcount" value="<?php if((isset($data['f7_television'])) && $data['f7_television'] != '0'){ echo $data['f7_television']; } else { ?> 0 <?php } ?>">
                                                                            </div>
                                                                        </div>	<!-- Television -->
                                                                        
                                                                        <div class="control-group">
                                                                            <label for="text" class="control-label" style="margin-top:10px">Refrigerator<span style="color:#F00">*</span></label>
                                                                            <div class="controls">
                                                                                <input type="text" onKeyPress="return numsonly(event);" name="f7_refrigerator" id="f7_refrigerator" placeholder="Refrigerator" class="input-xlarge v_number cal_tcount" value="<?php if((isset($data['f7_refrigerator'])) && $data['f7_refrigerator'] != '0'){ echo $data['f7_refrigerator']; } else { ?> 0 <?php } ?>">
                                                                            </div>
                                                                        </div>	<!-- Refrigerator -->
                                                                        
                                                                        <div class="control-group">
                                                                            <label for="text" class="control-label" style="margin-top:10px">Washing Machine<span style="color:#F00">*</span></label>
                                                                            <div class="controls">
                                                                                <input type="text" onKeyPress="return numsonly(event);" name="f7_wmachine" id="f7_wmachine" placeholder="Washing Machine" class="input-xlarge v_number cal_tcount" value="<?php if((isset($data['f7_wmachine'])) && $data['f7_wmachine'] != '0'){ echo $data['f7_wmachine']; } else { ?> 0 <?php } ?>">
                                                                            </div>
                                                                        </div>	<!-- Washing Machine -->
                                                                        
                                                                        <div class="control-group">
                                                                            <label for="text" class="control-label" style="margin-top:10px">Mixer<span style="color:#F00">*</span></label>
                                                                            <div class="controls">
                                                                                <input type="text" onKeyPress="return numsonly(event);" name="f7_mixer" id="f7_mixer" placeholder="Mixer" class="input-xlarge v_number cal_tcount" value="<?php if((isset($data['f7_mixer'])) && $data['f7_mixer'] != '0'){ echo $data['f7_mixer']; } else { ?> 0 <?php } ?>">
                                                                            </div>
                                                                        </div>	<!-- Mixer -->
                                                                        
                                                                        <div class="control-group">
                                                                            <label for="text" class="control-label" style="margin-top:10px">Gas Stove<span style="color:#F00">*</span></label>
                                                                            <div class="controls">
                                                                                <input type="text" onKeyPress="return numsonly(event);" name="f7_stove" id="f7_stove" placeholder="Gas Stove" class="input-xlarge v_number cal_tcount" value="<?php if((isset($data['f7_stove'])) && $data['f7_stove'] != '0'){ echo $data['f7_stove']; } else { ?> 0 <?php } ?>">
                                                                            </div>
                                                                        </div>	<!-- Gas Stove -->
                                                                        
                                                                        <div class="control-group">
                                                                            <label for="text" class="control-label" style="margin-top:10px">Bicycle<span style="color:#F00">*</span></label>
                                                                            <div class="controls">
                                                                                <input type="text" onKeyPress="return numsonly(event);" name="f7_bicycle" id="f7_bicycle" placeholder="Bicycle" class="input-xlarge v_number cal_tcount" value="<?php if((isset($data['f7_bicycle'])) && $data['f7_bicycle'] != '0'){ echo $data['f7_bicycle']; } else { ?> 0 <?php } ?>">
                                                                            </div>
                                                                        </div>	<!-- Bicycle -->
                                                                        
                                                                        <div class="control-group">
                                                                            <label for="text" class="control-label" style="margin-top:10px">Cooking Cylinder<span style="color:#F00">*</span></label>
                                                                            <div class="controls">
                                                                                <input type="text" onKeyPress="return numsonly(event);" name="f7_ccylinder" id="f7_ccylinder" placeholder="Cooking Cylinder" class="input-xlarge v_number cal_tcount" value="<?php if((isset($data['f7_ccylinder'])) && $data['f7_ccylinder'] != '0'){ echo $data['f7_ccylinder']; } else { ?> 0 <?php } ?>">
                                                                            </div>
                                                                        </div>	<!-- Cooking Cylinder -->
                                                                        
                                                                        <div class="control-group">
                                                                            <label for="text" class="control-label" style="margin-top:10px">Lights & Fans<span style="color:#F00">*</span></label>
                                                                            <div class="controls">
                                                                                <input type="text" onKeyPress="return numsonly(event);" name="f7_fans" id="f7_fans" placeholder="Lights & Fans" class="input-xlarge v_number cal_tcount" value="<?php if((isset($data['f7_fans'])) && $data['f7_fans'] != '0'){ echo $data['f7_fans']; } else { ?> 0 <?php } ?>">
                                                                            </div>
                                                                        </div>	<!-- Lights & Fans -->
                                                                        
                                                                        <div class="control-group">
                                                                            <label for="text" class="control-label" style="margin-top:10px">Motorcycle<span style="color:#F00">*</span></label>
                                                                            <div class="controls">
                                                                                <input type="text" onKeyPress="return numsonly(event);" name="f7_motorcycle" id="f7_motorcycle" placeholder="Motorcycle" class="input-xlarge v_number cal_tcount" value="<?php if((isset($data['f7_motorcycle'])) && $data['f7_motorcycle'] != '0'){ echo $data['f7_motorcycle']; } else { ?> 0 <?php } ?>">
                                                                            </div>
                                                                        </div>	<!-- Motorcycle -->
                                                                        
                                                                        <div class="control-group">
                                                                            <label for="text" class="control-label" style="margin-top:10px">Car<span style="color:#F00">*</span></label>
                                                                            <div class="controls">
                                                                                <input type="text" onKeyPress="return numsonly(event);" name="f7_car" id="f7_car" placeholder="Car" class="input-xlarge v_number cal_tcount" value="<?php if((isset($data['f7_car'])) && $data['f7_car'] != '0'){ echo $data['f7_car']; } else { ?> 0 <?php } ?>">
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
                                        </div>	<!-- KYC [COMPLETE] -->
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
                                                                    <?php 
																	if(isset($pt_row['pt_frm9']) && $pt_row['pt_frm9']!="") 
																	{
																		?>
																		<span class="badge " id="f9_pt" style="font-size:16px; font-weight:bold">
																			<?php echo $pt_row['pt_frm9']; ?>
                                                                        </span>
                                                                    	<?php
                                                                    } 
																	else
																	{
																		?>
																		<span class="badge " id="f9_pt" style="font-size:16px; color:red">Incomplete</span> 
																		<?php 
																	} 
																	?>
                                                               	</a>
                                                            </li>	<!-- Farm Land Details -->
                                                        </ul>
                                                    </div>	<!-- Side Menu [Form Name] -->
                                                    <div class="tab-content padding tab-content-inline">
                                                        <div class="tab-pane active" id="div_farm_land_details">
                                                    		<form method="POST" enctype="multipart/form-data" class='form-horizontal form-bordered form-validate' id="frm_farm_land_details" name="frm_farm_land_details">
                                                            	
                                                                <input type="hidden" id="add_land_detail" name="add_land_detail" value="1">
                                                                <input type="hidden" id="fm_id" name="fm_id" value="<?php echo $fm_id ?>">
                                                                <input type="hidden" id="fm_caid" name="fm_caid" value="<?php echo $_SESSION['fm_caid']; ?>">
                                                                <input type="hidden" name="f9_points" value="" id="f9_points">
                                                                <input type="hidden" name="no_of_land" value="" id="no_of_land">
                                                                
                                                                <div class="form-content">

																	<div id="lands">
                                                                    	<?php
                                                                        for($i = 0; $i < $no_of_land; $i++)
																		{
																			$id	= $i+1;
																			?>
																			<div id="land<?php echo $id; ?>" style="padding:5px;border:1px solid #d6d6d6;margin:5px;">
                                                                            	<div id="land_detail" style=" padding: 10px; margin: 5px;">
                                                                                	
                                                                                    <input type="hidden" name="id[]" id="id" value="<?php echo @$land_arr[$i]['id']; ?>">
                                                                                    <h2>Farm Land <?php echo $id; ?> Details</h2>
                                                                                    
                                                                                    <div class="control-group">
                                                                                        <label for="text" class="control-label" style="margin-top:10px">Size in Acres<span style="color:#F00">*</span></label>
                                                                                        <div class="controls">
                                                                                        	<input placeholder="Size in Acres" type="text" onKeyPress="return numsonly(event);" id="f9_land_size<?php echo $id; ?>" name="f9_land_size<?php echo $id; ?>" class="input-xlarge" value="<?php if((isset($land_arr[$i]['f9_land_size'])) && $land_arr[$i]['f9_land_size'] != ''){ echo $land_arr[$i]['f9_land_size']; } ?>" data-rule-required="true" onChange="calTotal_f9()" maxlength="6">
                                                                                        </div>
                                                                                    </div>	<!-- Size in Acres -->
                                                                                    
                                                                                    <div class="control-group">
                                                                                        <label for="text" class="control-label" style="margin-top:10px">Ownership<span style="color:#F00">*</span></label>
                                                                                        <div class="controls">
                                                                                            <select id="f9_owner<?php echo $id; ?>" name="f9_owner<?php echo $id; ?>" onChange="ownership(<?php echo $id; ?>,this.value)" class="select2-me input-xlarge" data-rule-required="true">
                                                                                                <option value="" disabled selected> Select here</option>
                                                                                                <option value="Owned" point="10" <?php if((isset($land_arr[$i]['f9_owner'])) && $land_arr[$i]['f9_owner'] == 'Owned') { ?> selected <?php } ?>>Owned</option>
                                                                                                <option value="Ancestral" point="5" <?php if((isset($land_arr[$i]['f9_owner'])) && $land_arr[$i]['f9_owner'] == 'Ancestral') { ?> selected <?php } ?>>Ancestral</option>
                                                                                                <option value="Rented" point="5" <?php if((isset($land_arr[$i]['f9_owner'])) && $land_arr[$i]['f9_owner'] == 'Rented') { ?> selected <?php } ?>>Rented</option>
                                                                                                <option value="Contracted" point="5" <?php if((isset($land_arr[$i]['f9_owner'])) && $land_arr[$i]['f9_owner'] == 'Contracted') { ?> selected <?php } ?>>Contracted</option>
                                                                                                <option value="Leased" point="3" <?php if((isset($land_arr[$i]['f9_owner'])) && $land_arr[$i]['f9_owner'] == 'Leased') { ?> selected <?php } ?>>Leased</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>	<!-- Ownership -->
                                                                                    
                                                                                    <div id="div_lease_display<?php echo $id; ?>" style="display: none; padding: 10px; border:1px solid #d6d6d6; margin: 20px;">
                                                                                        <div class="control-group">
                                                                                            <label for="text" class="control-label" style="margin-top:10px">No. of Lease year<span style="color:#F00">*</span></label>
                                                                                            <div class="controls">
                                                                                            	<input value="<?php if((isset($land_arr[$i]['f9_lease_year'])) && $land_arr[$i]['f9_lease_year'] != ''){ echo $land_arr[$i]['f9_lease_year']; } ?>" type="text" class="input-xlarge v_number" placeholder="Lease Year" name="f9_lease_year<?php echo $id; ?>" id="f9_lease_year<?php echo $id; ?>" data-rule-required="true" onKeyPress="return numsonly(event);" maxlength="10">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>	<!-- [If on lease, Number of years under leasing] -->
                                                                                    
                                                                                    <div id="div_rental_display<?php echo $id; ?>" style="display: none; padding: 10px; border:1px solid #d6d6d6; margin: 20px;">
                                                                                    	<div class="control-group">
                                                                                            <label for="text" class="control-label" style="margin-top:10px">Mention tha amount per month on rent<span style="color:#F00">*</span></label>
                                                                                            <div class="controls">
                                                                                            	<input value="<?php if((isset($land_arr[$i]['f9_amount_on_rent'])) && $land_arr[$i]['f9_amount_on_rent'] != ''){ echo $land_arr[$i]['f9_amount_on_rent']; } ?>" type="text" class="input-xlarge v_number" placeholder="amount per month on rent" name="f9_amount_on_rent<?php echo $id; ?>" id="f9_amount_on_rent<?php echo $id; ?>" data-rule-required="true" onKeyPress="return numsonly(event);" maxlength="10">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>	<!-- [If On Rent, Mention tha amount per month on rent] -->
                                                                                    
                                                                                    <div id="div_contract_display<?php echo $id; ?>" style="display: none; padding: 10px; border:1px solid #d6d6d6; margin: 20px;">
                                                                                        <div class="control-group">
                                                                                            <label for="text" class="control-label" style="margin-top:10px"> No. of Contract year<span style="color:#F00">*</span></label>
                                                                                            <div class="controls">
                                                                                            	<input type="text" class="input-xlarge ui-wizard-content" placeholder="Contract Year" name="f9_contract_year<?php echo $id; ?>" id="f9_contract_year<?php echo $id; ?>" value="<?php if((isset($land_arr[$i]['f9_contract_year'])) && $land_arr[$i]['f9_contract_year'] != ''){ echo $land_arr[$i]['f9_contract_year']; } ?>" data-rule-required="true" onKeyPress="return numsonly(event);" maxlength="10">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>	<!-- [If On Contract, Number of years under contract] -->
                                                                                    
                                                                                    <h3>Land Address</h3>
                                                                                     
                                                                                    <div class="control-group" >
                                                                                        <label for="tasktitel" class="control-label">State <span style="color:#F00">*</span></label>
                                                                                        <div class="controls">
                                                                                            <select id="f9_state<?php echo $id; ?>" name="f9_state<?php echo $id; ?>" onChange="getDist('p', this.value, 'f9_district<?php echo $id; ?>', 'f9_taluka<?php echo $id; ?>', 'f9_vilage<?php echo $id; ?>', 'div_p_dist<?php echo $id; ?>', 'div_p_tal<?php echo $id; ?>', 'div_p_village<?php echo $id; ?>');" class="select2-me input-large" >
                                                                                                <option value="" disabled selected>Select State</option>
                                                                                                <?php
                                                                                                $res_get_state  = lookup_value('tbl_state',array(),array(),array(),array(),array());
                                                                                                
																									if($res_get_state)
																									{
																										while ($row = mysqli_fetch_array($res_get_state) ) 
																										{
																											//echo '<option value="'.$row['id'].'">'.strtoupper($row['st_name']).'</option>';
																											?>
																											<option value="<?php echo $row['id']; ?>" <?php if((isset($land_arr[$i]['f9_state'])) && $land_arr[$i]['f9_state'] == $row['id']) { ?> selected <?php } ?>>
                                                                                                            	<?php echo strtoupper($row['st_name']); ?>
                                                                                                            </option>	
																											<?php
																										}
                                                                                                	}
                                                                                                ?>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>  <!-- State -->
                                                                                    
                                                                                    <div class="control-group">
                                                                                        <label for="tasktitel" class="control-label">District <span style="color:#F00">*</span></label>
                                                                                        <div class="controls" id="div_p_dist<?php echo $id; ?>">
                                                                                            <select id="f9_district<?php echo $id; ?>" name="f9_district<?php echo $id; ?>" class="select2-me input-large" >
                                                                                            	<option value="" disabled selected>Select District</option>
                                                                                                <?php
																								if(isset($land_arr[$i]['f9_state']))
																								{
																									$result = lookup_value('tbl_district',array(),array("dt_stid"=>$land_arr[$i]['f9_state']),array(),array(),array());
											
																									if($result)
																									{
																										while ($row = mysqli_fetch_array($result))
																										{
																											//echo '<option value="'.$row['id'].'">'.strtoupper($row['dt_name']).'</option>';
																											?>
																											<option value="<?php echo $row['id']; ?>" <?php if((isset($land_arr[$i]['f9_district'])) && $land_arr[$i]['f9_district'] == $row['id']) { ?> selected <?php } ?>>
                                                                                                            	<?php echo strtoupper($row['dt_name']); ?>
                                                                                                           	</option>
																											<?php
																										}
																									}
																								}
																								?>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>  <!-- District -->
                                                                                    
                                                                                    <div class="control-group">
                                                                                        <label for="tasktitel" class="control-label">Taluka <span style="color:#F00">*</span></label>
                                                                                        <div class="controls" id="div_p_tal<?php echo $id; ?>">
                                                                                            <select id="f9_taluka<?php echo $id; ?>" name="f9_taluka<?php echo $id; ?>" class="select2-me input-large" >
                                                                                            	<option value="" disabled selected>Select Taluka</option>
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
                                                                                    </div>  <!-- Taluka -->
                                                                                    
                                                                                    <div class="control-group" >
                                                                                        <label for="tasktitel" class="control-label">Village Name <span style="color:#F00">*</span></label>
                                                                                        <div class="controls" id="div_p_village<?php echo $id; ?>">
                                                                                            <select id="f9_vilage<?php echo $id; ?>" name="f9_vilage<?php echo $id; ?>" class="select2-me input-large" >
                                                                                            	<option value="" disabled selected>Select Village</option>
                                                                                                <?php
																								if(isset($land_arr[$i]['f9_taluka']))
																								{   
																									$result = lookup_value('tbl_village',array(),array("vl_tkid"=>$land_arr[$i]['f9_taluka']),array(),array(),array());
											
																									if($result)
																									{
																										while ($row = mysqli_fetch_array($result) ) 
																										{
																											//echo '<option value="'.$row['id'].'">'.strtoupper($row['vl_name']).'</option>';
																											?>
																											<option value="<?php echo $row['id'];?>" <?php if((isset($land_arr[$i]['f9_vilage'])) && $land_arr[$i]['f9_vilage'] == $row['id']) { ?> selected <?php } ?>>
                                                                                                            	<?php echo strtoupper($row['vl_name']); ?>
                                                                                                            </option>
																											<?php
																										}
																									}
																								}
																								?>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>  <!-- Village -->
                                                                                    
                                                                                    <div class="control-group">
                                                                                        <label for="text" class="control-label" style="margin-top:10px">Survey Number<span style="color:#F00">*</span></label>
                                                                                        <div class="controls">
                                                                                        	<input placeholder="Survey Number" type="text" id="f9_survey_number<?php echo $id; ?>" name="f9_survey_number<?php echo $id; ?>" class="input-xlarge" value="<?php if((isset($land_arr[$i]['f9_survey_number'])) && $land_arr[$i]['f9_survey_number'] != ''){ echo $land_arr[$i]['f9_survey_number']; } ?>" data-rule-required="true" maxlength="10">
                                                                                        </div>
                                                                                    </div>  <!-- Survey Number -->
                                                                                    
                                                                                    <div class="control-group" >
                                                                                        <label for="tasktitel" class="control-label">Pin-Code <span style="color:#F00">*</span></label>
                                                                                        <div class="controls">
                                                                                        	<input type="text" value="<?php if((isset($land_arr[$i]['f9_pincode'])) && $land_arr[$i]['f9_pincode'] != ''){ echo $land_arr[$i]['f9_pincode']; } ?>" id="f9_pincode<?php echo $id; ?>" name="f9_pincode<?php echo $id; ?>" placeholder="Pin-Code" class="input-large" data-rule-required="true" onKeyPress="return numsonly(event);" minlength="6" maxlength="6" size="6" />
                                                                                        </div>
                                                                                    </div>  <!-- Pincode -->
                                                                                    
                                                                                    <div class="control-group" >
                                                                                        <label for="tasktitel" class="control-label">latitude <span style="color:#F00">*</span></label>
                                                                                        <div class="controls">
                                                                                        	<input type="text" value="<?php if((isset($land_arr[$i]['f9_lat'])) && $land_arr[$i]['f9_lat'] != ''){ echo $land_arr[$i]['f9_lat']; } ?>" id="f9_lat<?php echo $id; ?>" name="f9_lat<?php echo $id; ?>" placeholder="Latitude" class="input-large" data-rule-required="true" onKeyPress="return numsonly(event);" maxlength="15"/>
                                                                                        </div>
                                                                                    </div>  <!-- latitude -->
                                                                                    
                                                                                    <div class="control-group" >
                                                                                        <label for="tasktitel" class="control-label">longitude <span style="color:#F00">*</span></label>
                                                                                        <div class="controls">
                                                                                        	<input type="text" value="<?php if((isset($land_arr[$i]['f9_long'])) && $land_arr[$i]['f9_long'] != ''){ echo $land_arr[$i]['f9_long']; } ?>" id="f9_long<?php echo $id; ?>" name="f9_long<?php echo $id; ?>" placeholder="Longitude" class="input-large" data-rule-required="true" onKeyPress="return numsonly(event);" maxlength="15"/>
                                                                                        </div>
                                                                                    </div>  <!-- longitude -->
                                                                                    
                                                                                    <div class="control-group">
                                                                                        <label for="text" class="control-label" style="margin-top:10px">Type of Soil<span style="color:#F00">*</span></label>
                                                                                        <div class="controls">
                                                                                            <select id="f9_soil_type<?php echo $id; ?>" name="f9_soil_type<?php echo $id; ?>" class="select2-me input-xlarge" data-rule-required="true" onChange="calTotal_f9()">
                                                                                                <option value="" disabled selected> Select here</option>
                                                                                                <option value="Alluvial Soil" point="10" <?php if((isset($land_arr[$i]['f9_soil_type'])) && $land_arr[$i]['f9_soil_type'] == 'Alluvial Soil') { ?> selected <?php } ?>>Alluvial Soil</option>
                                                                                                <option value="Black Soil" point="9" <?php if((isset($land_arr[$i]['f9_soil_type'])) && $land_arr[$i]['f9_soil_type'] == 'Black Soil') { ?> selected <?php } ?>>Black Soil</option>
                                                                                                <option value="Red Soil" point="8" <?php if((isset($land_arr[$i]['f9_soil_type'])) && $land_arr[$i]['f9_soil_type'] == 'Red Soil') { ?> selected <?php } ?>>Red Soil</option>
                                                                                                <option value="Mountain Soil" point="6" <?php if((isset($land_arr[$i]['f9_soil_type'])) && $land_arr[$i]['f9_soil_type'] == 'Mountain Soil') { ?> selected <?php } ?>>Mountain Soil</option>
                                                                                                <option value="Peat" point="5" <?php if((isset($land_arr[$i]['f9_soil_type'])) && $land_arr[$i]['f9_soil_type'] == 'Peat') { ?> selected <?php } ?>>Peat</option>
                                                                                                <option value="Laterite Soil" point="5" <?php if((isset($land_arr[$i]['f9_soil_type'])) && $land_arr[$i]['f9_soil_type'] == 'Laterite Soil') { ?> selected <?php } ?>>Laterite Soil</option>
                                                                                                <option value="Desert Soil" point="2" <?php if((isset($land_arr[$i]['f9_soil_type'])) && $land_arr[$i]['f9_soil_type'] == 'Desert Soil') { ?> selected <?php } ?>>Desert Soil</option>
                                                                                             </select>
                                                                                        </div>
                                                                                    </div>	<!-- Type of soil -->
                                                                                    
                                                                                    <div class="control-group">
                                                                                        <label for="text" class="control-label" style="margin-top:10px">Have you had the soil tested in your land?<span style="color:#F00">*</span></label>
                                                                                        <div class="controls">
                                                                                            <select id="f9_soil_tested<?php echo $id; ?>" name="f9_soil_tested<?php echo $id; ?>" class="select2-me input-xlarge" data-rule-required="true" onChange="calTotal_f9()">
                                                                                                <option value="" disabled selected> Select here</option>
                                                                                                <option value="yes" point="10" <?php if((isset($land_arr[$i]['f9_soil_tested'])) && $land_arr[$i]['f9_soil_tested'] == 'yes') { ?> selected <?php } ?>>Yes</option>
                                                                                                <option value="no" point="0" <?php if((isset($land_arr[$i]['f9_soil_tested'])) && $land_arr[$i]['f9_soil_tested'] == 'no') { ?> selected <?php } ?>>no</option>
                                                                                             </select>
                                                                                        </div>
                                                                                    </div>	<!-- Have you had the soil tested in your land? -->
                                                                                    
                                                                                    <div class="control-group">
                                                                                        <label for="text" class="control-label" style="margin-top:10px">Soil Depth<span style="color:#F00">*</span></label>
                                                                                        <div class="controls">
                                                                                            <input placeholder="Soil Depth" type="text" id="f9_soil_depth<?php echo $id; ?>" name="f9_soil_depth<?php echo $id; ?>" class="input-xlarge" value="<?php if((isset($land_arr[$i]['f9_soil_depth'])) && $land_arr[$i]['f9_soil_depth'] != ''){ echo $land_arr[$i]['f9_soil_depth']; } ?>" data-rule-required="true">
                                                                                        </div>
                                                                                    </div>  <!-- Soil Depth -->
                                                                                    
                                                                                    <div class="control-group">
                                                                                        <label for="text" class="control-label" style="margin-top:10px">Source Of Water
                                                                                        <span style="color:#F00">*</span></label>
                                                                                        <div class="controls">
                                                                                            <select id="f9_source_of_water<?php echo $id; ?>" name="f9_source_of_water<?php echo $id; ?>" class="select2-me input-xlarge" data-rule-required="true" onChange="calTotal_f9()">
                                                                                                <option value="" disabled selected> Select here</option>
                                                                                                <option value="Well Water" point="5" <?php if((isset($land_arr[$i]['f9_source_of_water'])) && $land_arr[$i]['f9_source_of_water'] == 'Well Water') { ?> selected <?php } ?>>Well Water</option>
                                                                                                <option value="Tube Water" point="7" <?php if((isset($land_arr[$i]['f9_source_of_water'])) && $land_arr[$i]['f9_source_of_water'] == 'Tube Water') { ?> selected <?php } ?>>Tube Water</option>
                                                                                                <option value="Tank Water" point="5" <?php if((isset($land_arr[$i]['f9_source_of_water'])) && $land_arr[$i]['f9_source_of_water'] == 'Tank Water') { ?> selected <?php } ?>>Tank Water</option>
                                                                                                <option value="Canals" point="5" <?php if((isset($land_arr[$i]['f9_source_of_water'])) && $land_arr[$i]['f9_source_of_water'] == 'Canals') { ?> selected <?php } ?>>Canals</option>
                                                                                                <option value="Perennial Water" point="5" <?php if((isset($land_arr[$i]['f9_source_of_water'])) && $land_arr[$i]['f9_source_of_water'] == 'Perennial Water') { ?> selected <?php } ?>>Perennial Water</option>
                                                                                                <option value="Multipurpose River Valley" point="5" <?php if((isset($land_arr[$i]['f9_source_of_water'])) && $land_arr[$i]['f9_source_of_water'] == 'Multipurpose River Valley') { ?> selected <?php } ?>>Multipurpose River Valley</option>
                                                                                                <option value="Rain Fed" point="4" <?php if((isset($land_arr[$i]['f9_source_of_water'])) && $land_arr[$i]['f9_source_of_water'] == 'Rain Fed') { ?> selected <?php } ?>>Rain Fed</option>
                                                                                                <option value="Drip Irrigation" point="8" <?php if((isset($land_arr[$i]['f9_source_of_water'])) && $land_arr[$i]['f9_source_of_water'] == 'Drip Irrigation') { ?> selected <?php } ?>>Drip Irrigation</option>
                                                                                                <option value="Sprinkler" point="7" <?php if((isset($land_arr[$i]['f9_source_of_water'])) && $land_arr[$i]['f9_source_of_water'] == 'Sprinkler') { ?> selected <?php } ?>>Sprinkler</option>
                                                                                                <option value="Furrow" point="3" <?php if((isset($land_arr[$i]['f9_source_of_water'])) && $land_arr[$i]['f9_source_of_water'] == 'Furrow') { ?> selected <?php } ?>>Furrow</option>
                                                                                                <option value="Ditch" point="3" <?php if((isset($land_arr[$i]['f9_source_of_water'])) && $land_arr[$i]['f9_source_of_water'] == 'Ditch') { ?> selected <?php } ?>>Ditch</option>
                                                                                                <option value="Surge" point="3" <?php if((isset($land_arr[$i]['f9_source_of_water'])) && $land_arr[$i]['f9_source_of_water'] == 'Surge') { ?> selected <?php } ?>>Surge</option>
                                                                                                <option value="Seepage" point="3" <?php if((isset($land_arr[$i]['f9_source_of_water'])) && $land_arr[$i]['f9_source_of_water'] == 'Seepage') { ?> selected <?php } ?>>Seepage</option>
                                                                                             </select>
                                                                                        </div>
                                                                                    </div>  <!-- Source of water -->
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <script>
																				<?php 
																				echo 'contentCountLand='.$id.';';
																				?>
                                                                            </script>
                                                                            <?php
																		}
																		?>
                                                                    </div>

                                                                    <div  style="padding:5px;border:1px solid #d6d6d6;margin:5px;"> 
                                                                        <input type="button" class="btn btn-warning " value="Add New" onClick="addMoreLand();" id="addLoanType"/>
                                                                        <input type="button" style="<?php if($no_of_land != 1){ ?> display:none; <?php } ?>float:right" class="btn btn-danger " value="Remove" data-toggle="modal" data-target="#confirm_box_land" data-backdrop="static" id="removeLandType"/> <!--  -->
                                                                    </div>

                                                                    <div class="form-actions">
    	                                                                <input type="reset" class="btn" value="Reset" id="Reset">
	                                                                    <input type="submit" class="btn btn-primary" value="Save" id="save">
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                            </form>
                                                            <f1 id="farm_land_details_g_total"></f1>
                                                        </div>	<!-- Farm Land Details -->
                                                    </div>	<!-- Main Forms -->
                                                </div>
                                            </div>
                                        </div>	<!-- LAND [COMPLETE] -->
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
                                                                    <?php 
																	if(isset($pt_row['pt_frm10']) && $pt_row['pt_frm10']!="") 
																	{
																		?>
																		<span class="badge " id="f10_pt" style="font-size:16px; font-weight:bold">
																			<?php echo $pt_row['pt_frm10']; ?>
                                                                        </span>
                                                                    	<?php
                                                                    } 
																	else
																	{
																		?>
																		<span class="badge " id="f10_pt" style="font-size:16px; color:red">Incomplete</span> 
																		<?php 
																	} 
																	?>
                                                               	</a>
                                                            </li>	<!-- Crop And Cultivation Details -->
                                                            <li>
                                                                <a href="#div_prev_crop_cycle" data-toggle='tab'>
                                                                    <i class="fa fa-user"></i>Previous Crop Cycle Details
                                                                    <?php 
																	if(isset($pt_row['pt_frm11']) && $pt_row['pt_frm11']!="") 
																	{
																		?>
																		<span class="badge " id="f11_pt" style="font-size:16px; font-weight:bold">
																			<?php echo $pt_row['pt_frm11']; ?>
                                                                        </span>
                                                                    	<?php
                                                                    } 
																	else
																	{
																		?>
																		<span class="badge " id="f11_pt" style="font-size:16px; color:red">Incomplete</span> 
																		<?php 
																	} 
																	?>
                                                                </a>
                                                            </li>	<!-- Applicant's Knowledge -->
                                                            <li>
                                                                <a href="#div_cur_crop_cycle" data-toggle='tab'>
                                                                    <i class="fa fa-twitter"></i>Current Crop Forecast
                                                                    <?php 
																	if(isset($pt_row['pt_frm14']) && $pt_row['pt_frm14']!="") 
																	{
																		?>
																		<span class="badge " id="f14_pt" style="font-size:16px; font-weight:bold">
																			<?php echo $pt_row['pt_frm14']; ?>
                                                                        </span>
                                                                    	<?php
                                                                    } 
																	else
																	{
																		?>
																		<span class="badge " id="f14_pt" style="font-size:16px; color:red">Incomplete</span> 
																		<?php 
																	} 
																	?>
                                                                </a>
                                                            </li>	<!-- Applicant's Phone Details -->
                                                        </ul>
                                                    </div>	<!-- Side Menu [Form Name] -->
                                                    <div class="tab-content padding tab-content-inline">
                                                        <div class="tab-pane active" id="div_crop_cultivation">
                                                    		Crop And Cultivation Details
                                                            <form method="POST" enctype="multipart/form-data" class='form-horizontal form-bordered form-validate' id="frm_crop_cultivation" name="frm_crop_cultivation">
                                                            
                                                            	<input type="hidden" id="add_crop_detail" name="add_crop_detail" value="1">
                                                                <input type="hidden" id="fm_id" name="fm_id" value="<?php echo $fm_id ?>">
                                                                <input type="hidden" id="fm_caid" name="fm_caid" value="<?php echo $_SESSION['fm_caid']; ?>">
                                                                <input type="hidden" name="f10_points" id="f10_points" value="">
                                                                <input type="hidden" name="no_of_crops" id="no_of_crops" value="1">
                                                                
                                                                <div class="form-content">
                                                                	
                                                                    <div id="formContent">
                                                                    	<?php
                                                                        for($j = 0; $j < $no_of_crops; $j++)
																		{
																			$id	= $j+1;
																			?>
																			<div id="crop<?php echo $id; ?>" style="padding:5px;border:1px solid #d6d6d6;margin:5px;">
                                                                            	<input type="hidden" name="id[]" id="id" value="<?php echo @$crops_arr[$j]['id']; ?>">
                                                                                <div id="crop_detail" style=" padding: 10px; margin: 5px;">
                                                                                	<h2>Crop <?php echo $id; ?> Details</h2>
                                                                                    
                                                                                    
                                                                                    <div class="control-group">
                                                                                        <label for="tasktitel" class="control-label">Current Crop Season <span style="color:#F00">*</span>
                                                                                        </label>
                                                                                        <div class="controls">
                                                                                            <select id="f10_crop_season<?php echo $id; ?>" name="f10_crop_season<?php echo $id; ?>" class="select2-me input-xlarge" >
                                                                                                <option value="" disabled selected>Select here</option>
                                                                                                <option value="Kharif" <?php if((isset($crops_arr[$j]['f10_crop_season'])) && $crops_arr[$j]['f10_crop_season'] == 'Kharif') { ?> selected <?php } ?>>Kharif</option>
                                                                                                <option value="Rabi" <?php if((isset($crops_arr[$j]['f10_crop_season'])) && $crops_arr[$j]['f10_crop_season'] == 'Rabi') { ?> selected <?php } ?>>Rabi</option>
                                                                                                <option value="Summer" <?php if((isset($crops_arr[$j]['f10_crop_season'])) && $crops_arr[$j]['f10_crop_season'] == 'Summer') { ?> selected <?php } ?>>Summer</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>  <!-- Current Crop Season [DDL] -->
                                                                                    
                                                                                    <div class="control-group">
                                                                                        <label for="tasktitel" class="control-label">Type of crop cultivating this year <span style="color:#F00">*</span>
                                                                                        </label>
                                                                                        <div class="controls">
                                                                                            <select id="f10_cultivating<?php echo $id; ?>" name="f10_cultivating<?php echo $id; ?>" class="select2-me input-xlarge" data-rule-required="true" onchange="calTotal_f10();">
                                                                                                <option value="" disabled selected> Select here</option>
                                                                                                <?php
                                                                                                $crops = lookup_value('tbl_crops',array(),array("crop_status"=>1),array(),array(),array());
                                                                                                while($crop = mysqli_fetch_array($crops))
                                                                                                {
																									?>
                                                                                                    <option point="7" value="<?php echo $crop['crop_id']; ?>" <?php if((isset($crops_arr[$j]['f10_cultivating'])) && $crops_arr[$j]['f10_cultivating'] == $crop['crop_id']) { ?> selected <?php } ?>>
                                                                                                        <?php echo strtoupper($crop['crop_name']); ?>
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
                                                                                            <select id="f10_stage<?php echo $id; ?>" name="f10_stage<?php echo $id; ?>" class="select2-me input-xlarge" data-rule-required="true" onchange="calTotal_f10()">
                                                                                                <option value="" disabled selected> Select here</option>
                                                                                                <option point="5" value="Land Tilling" <?php if((isset($crops_arr[$j]['f10_stage'])) && $crops_arr[$j]['f10_stage'] == 'Land Tilling') { ?> selected <?php } ?>>Land Tilling</option>
                                                                                                <option point="7" value="Sowing" <?php if((isset($crops_arr[$j]['f10_stage'])) && $crops_arr[$j]['f10_stage'] == 'Sowing') { ?> selected <?php } ?>>Sowing</option>
                                                                                                <option point="6" value="Manure Adding OR Fertilizer" <?php if((isset($crops_arr[$j]['f10_stage'])) && $crops_arr[$j]['f10_stage'] == 'Manure Adding OR Fertilizer') { ?> selected <?php } ?>>Manure Adding / Fertilizer</option>
                                                                                                <option point="7" value="Irrigation" <?php if((isset($crops_arr[$j]['f10_stage'])) && $crops_arr[$j]['f10_stage'] == 'Irrigation') { ?> selected <?php } ?>>Irrigation</option>
                                                                                                <option point="7" value="Weeding" <?php if((isset($crops_arr[$j]['f10_stage'])) && $crops_arr[$j]['f10_stage'] == 'Weeding') { ?> selected <?php } ?>>Weeding</option>
                                                                                                <option point="8" value="Growing" <?php if((isset($crops_arr[$j]['f10_stage'])) && $crops_arr[$j]['f10_stage'] == 'Growing') { ?> selected <?php } ?>>Growing</option>
                                                                                                <option point="7" value="Harvesting" <?php if((isset($crops_arr[$j]['f10_stage'])) && $crops_arr[$j]['f10_stage'] == 'Harvesting') { ?> selected <?php } ?>>Harvesting</option>
                                                                                                <option point="5" value="Threshing" <?php if((isset($crops_arr[$j]['f10_stage'])) && $crops_arr[$j]['f10_stage'] == 'Threshing') { ?> selected <?php } ?>>Threshing</option>
                                                                                                <option point="2" value="Storing" <?php if((isset($crops_arr[$j]['f10_stage'])) && $crops_arr[$j]['f10_stage'] == 'Storing') { ?> selected <?php } ?>>Storing</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>  <!-- Current stage of crop [DDL] -->
                                                                                    
                                                                                    <div class="control-group">
                                                                                        <label for="tasktitel" class="control-label">Total Yield Expected [Per Acre Per Crop] <span style="color:#F00">*</span></label>
                                                                                        <div class="controls">
                                                                                            <input type="text" value="<?php if((isset($crops_arr[$j]['f10_expected'])) && $crops_arr[$j]['f10_expected'] != '') { echo $crops_arr[$j]['f10_expected']; } ?>" id="f10_expected<?php echo $id; ?>" name="f10_expected<?php echo $id; ?>" class="input-xlarge" onKeyPress="return numsonly(event);" data-rule-required="true" maxlength="10" onchange="calTotal_f10()" placeholder="Total Yield Expected"> Quintal
                                                                                        </div>
                                                                                    </div>  <!-- Total Yield Expected [In tonnes Per Acre] -->
                                                                                
                                                                                	<div class="control-group">
                                                                                        <label for="tasktitel" class="control-label">Potential market <span style="color:#F00">*</span></label>
                                                                                        <div class="controls">
                                                                                            <select id="f10_potential_market<?php echo $id; ?>" name="f10_potential_market<?php echo $id; ?>" class="select2-me input-xlarge" >
                                                                                                <option value="" disabled selected>Select here</option>
                                                                                                <option value="Local Mandis and Location" <?php if((isset($crops_arr[$j]['f10_potential_market'])) && $crops_arr[$j]['f10_potential_market'] == '') { ?> selected <?php } ?>>Local Mandis and Location</option>
                                                                                                <option value="FPO" <?php if((isset($crops_arr[$j]['f10_potential_market'])) && $crops_arr[$j]['f10_potential_market'] == 'FPO') { ?> selected <?php } ?>>FPO</option>
                                                                                                <option value="Private Buyer" <?php if((isset($crops_arr[$j]['f10_potential_market'])) && $crops_arr[$j]['f10_potential_market'] == 'Private Buyer') { ?> selected <?php } ?>>Private Buyer (Companies)</option>
                                                                                                <option value="Government" <?php if((isset($crops_arr[$j]['f10_potential_market'])) && $crops_arr[$j]['f10_potential_market'] == 'Government') { ?> selected <?php } ?>>Government</option>
                                                                                                <option value="Other" <?php if((isset($crops_arr[$j]['f10_potential_market'])) && $crops_arr[$j]['f10_potential_market'] == 'Other') { ?> selected <?php } ?>>Other</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>  <!-- Potential market [DDL] -->
                                                                                    
                                                                                    <div class="control-group">
                                                                                        <label for="tasktitel" class="control-label">Crop Storage <span style="color:#F00">*</span>
                                                                                        </label>
                                                                                        <div class="controls">
                                                                                            <select id="f10_crop_storage<?php echo $id; ?>" name="f10_crop_storage<?php echo $id; ?>" class="select2-me input-xlarge" >
                                                                                                <option value="" disabled selected>Select here</option>
                                                                                                <option value="Govt Warehouse" <?php if((isset($crops_arr[$j]['f10_crop_storage'])) && $crops_arr[$j]['f10_crop_storage'] == 'Govt Warehouse') { ?> selected <?php } ?>>Govt. Warehouse</option>
                                                                                                <option value="Pvt Warehouse" <?php if((isset($crops_arr[$j]['f10_crop_storage'])) && $crops_arr[$j]['f10_crop_storage'] == 'Pvt Warehouse') { ?> selected <?php } ?>>Pvt. Warehouse</option>
                                                                                                <option value="Factory" <?php if((isset($crops_arr[$j]['f10_crop_storage'])) && $crops_arr[$j]['f10_crop_storage'] == 'Factory') { ?> selected <?php } ?>>Factory</option>
                                                                                                <option value="Mandis Direct" <?php if((isset($crops_arr[$j]['f10_crop_storage'])) && $crops_arr[$j]['f10_crop_storage'] == 'Mandis Direct') { ?> selected <?php } ?>>Mandis Direct</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>  <!-- Crop Storage [DDL] --> 
                                                                                    
                                                                                    <div class="control-group">
                                                                                        <label for="text" class="control-label" style="margin-top:10px">Expected Price This Year [Per Quintal Per Acre]<span style="color:#F00">*</span></label>
                                                                                        <div class="controls">
                                                                                            <input type="text" value="<?php if((isset($crops_arr[$j]['f10_expectedprice'])) && $crops_arr[$j]['f10_expectedprice'] != '') { echo $crops_arr[$j]['f10_expectedprice']; } ?>" id="f10_expectedprice<?php echo $id; ?>" name="f10_expectedprice<?php echo $id; ?>" class="input-xlarge" data-rule-required="true"  onKeyPress="return numsonly(event);" maxlength="10" onchange="calTotal_f10()" placeholder="Expected Price"> In Rs.
                                                                                        </div>
                                                                                    </div>	<!--Expected price this year -->
                                                                                    
                                                                                    <div class="control-group">
                                                                                        <label for="text" class="control-label" style="margin-top:10px">Total Income Expected This Year [ Per Acre Per Crop ]<span style="color:#F00">*</span></label>
                                                                                        <div class="controls">
                                                                                            <input type="text" value="<?php if((isset($crops_arr[$j]['f10_expectedincome'])) && $crops_arr[$j]['f10_expectedincome'] != '') { echo $crops_arr[$j]['f10_expectedincome']; } ?>" id="f10_expectedincome<?php echo $id; ?>" name="f10_expectedincome<?php echo $id; ?>" class="input-xlarge"  data-rule-required="true"  onKeyPress="return numsonly(event);" maxlength="10" onchange="calTotal_f10()" placeholder="Total Income Expected"> In Rs.
                                                                                        </div>
                                                                                    </div><!--Total Income Expected this year [ Per Acre Per Crop ] -->
                                                                                    
                                                                                    <div class="control-group">
                                                                                        <label for="text" class="control-label" style="margin-top:10px">Potential Crop Diseases<span style="color:#F00">*</span></label>
                                                                                        <div class="controls">
                                                                                            <select id="f10_diseases<?php echo $id; ?>" name="f10_diseases<?php echo $id; ?>" class="select2-me input-xlarge" data-rule-required="true" onchange="calTotal_f10()">
                                                                                                <option value="" disabled selected> Select here</option>
                                                                                                <option point="1" value="Fungal" <?php if((isset($crops_arr[$j]['f10_diseases'])) && $crops_arr[$j]['f10_diseases'] == 'Fungal') { ?> selected <?php } ?>> Fungal</option>
                                                                                                <option point="4" value="Non-fungal" <?php if((isset($crops_arr[$j]['f10_diseases'])) && $crops_arr[$j]['f10_diseases'] == 'Non-fungal') { ?> selected <?php } ?>> Non-fungal</option>
                                                                                                <option point="0" value="Severe" <?php if((isset($crops_arr[$j]['f10_diseases'])) && $crops_arr[$j]['f10_diseases'] == 'Severe') { ?> selected <?php } ?>> Severe</option>
                                                                                                <option point="8" value="Treatable" <?php if((isset($crops_arr[$j]['f10_diseases'])) && $crops_arr[$j]['f10_diseases'] == 'Treatable') { ?> selected <?php } ?>> Treatable</option>
                                                                                                <option point="10" value="No potential of diseases" <?php if((isset($crops_arr[$j]['f10_diseases'])) && $crops_arr[$j]['f10_diseases'] == 'No potential of diseases') { ?> selected <?php } ?>> No potential of diseases</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div><!--Potential crop diseases-->
                                                                                    
                                                                                    <div class="control-group">
                                                                                        <label for="text" class="control-label" style="margin-top:10px">Potential Pest Control Problems <span style="color:#F00">*</span></label>
                                                                                        <div class="controls">
                                                                                            <select id="f10_pest<?php echo $id; ?>" name="f10_pest<?php echo $id; ?>" class="select2-me input-xlarge" data-rule-required="true" onchange="calTotal_f10()">
                                                                                                <option value="" disabled selected> Select here</option>
                                                                                                <option point="0" value="yes" <?php if((isset($crops_arr[$j]['f10_pest'])) && $crops_arr[$j]['f10_pest'] == 'yes') { ?> selected <?php } ?>> Yes</option>
                                                                                                <option point="0" value="no" <?php if((isset($crops_arr[$j]['f10_pest'])) && $crops_arr[$j]['f10_pest'] == 'no') { ?> selected <?php } ?>> No</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>	<!--Potential pest control problems-->
                                                                                
                                                                                	<div class="control-group">
                                                                                        <label for="tasktitel" class="control-label">What kind of Fertilizer and pesticides being used <span style="color:#F00">*</span></label>
                                                                                        <div class="controls">
                                                                                            <select id="f10_filt_type<?php echo $id; ?>" name="f10_filt_type<?php echo $id; ?>" class="select2-me input-xlarge" data-rule-required="true" onchange="calTotal_f10()">
                                                                                                <option value="" disabled selected>Select here</option>
                                                                                                <option point="10" value="Organic Fertilizers" <?php if((isset($crops_arr[$j]['f10_filt_type'])) && $crops_arr[$j]['f10_filt_type'] == 'Organic Fertilizers') { ?> selected <?php } ?>>Organic Fertilizers</option>
                                                                                                <option point="5" value="Inorganic Fertilizers" <?php if((isset($crops_arr[$j]['f10_filt_type'])) && $crops_arr[$j]['f10_filt_type'] == 'Inorganic Fertilizers') { ?> selected <?php } ?>>Inorganic Fertilizers</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>  <!-- What kind of Fertilizer and pesticides being used [DDL] -->
                                                                                
                                                                                </div>
                                                                            </div>
                                                                            
																			<script>
																				<?php 
																				echo 'contentCountCrop='.$id.';';
																				?>
                                                                            </script>
                                                                            
																			<?php
																		}
																		?>
                                                                    </div>
                                                                    
                                                                    <div style="padding:5px;border:1px solid #d6d6d6;margin:5px;">
                                                                        <a class="btn btn-sm btn-warning addCrop">Add New</a>
                                                                        <a class="btn btn-sm btn-danger pull-right removeCrop" data-toggle="modal" data-target="#confirm_box_crop" data-backdrop="static">Remove</a>
                                                                    </div>
                        
                                                                    <div class="form-actions">
                                                                        <input type="reset" class="btn" value="Back" id="back">
                                                                        <input type="submit" class="btn btn-primary" value="Save" id="save">
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                            </form>
                                                            <h1 id="crop_cultivation_g_total">0</h1>           
                                                        </div>	<!-- Crop And Cultivation Details -->
                                                        <div class="tab-pane" id="div_prev_crop_cycle">
                                                           	Previous Crop Cycle Details
                                                           	<form method="POST" enctype="multipart/form-data" class='form-horizontal form-bordered form-validate' id="frm_prev_crop_cycle" name="frm_prev_crop_cycle">
                                                           		
                                                           		<input type="hidden" name="add_yield_detail" value="1">
                                                                <input type="hidden" value="<?php echo $fm_id ?>" name="fm_id">
                                                                <input type="hidden" name="fm_caid" value="<?php echo $_SESSION['fm_caid']; ?>">
                                                                <input type="hidden" name="f11_points" id="f11_points" value="">
                                                                <input type="hidden" name="no_of_yield" id="no_of_yield" value="1">	
                                                           		
                                                                <div class="form-content">
                                                                	
                                                                    <div id="prev_crop">
                                                                    	<?php
                                                                        for($k=0;$k<$no_of_prev_crops;$k++)
																		{
																			$id =$k+1;
																			
																			?>
																			<div id="prevcrop<?php echo $id; ?>" style="padding:5px;border:1px solid #d6d6d6;margin:5px;">
                                                                                <input type="hidden" name="id[]" id="id" value="<?php echo @$prev_crops_arr[$k]['id']; ?>">    
                                                                                <h3>Previous Crop <?php echo $id; ?> Details</h3>
                                                                                
                                                                                <div class="control-group">
                                                                                    <label for="tasktitel" class="control-label">Type of crop cultivating previous year <span style="color:#F00">*</span></label>
                                                                                    <div class="controls">
                                                                                        <select id="f11_cultivating<?php echo $id; ?>" name="f11_cultivating<?php echo $id; ?>" class="select2-me input-xlarge" data-rule-required="true" onchange="calTotal_f11();">
                                                                                            <option value="" disabled selected> Select here</option>
                                                                                            <?php
                                                                                            $crops = lookup_value('tbl_crops',array(),array("crop_status"=>1),array(),array(),array());
                                                                                            while($crop = mysqli_fetch_array($crops))
                                                                                            {
                                                                                                ?>
                                                                                                <option point="7" value="<?php echo $crop['crop_id']; ?>" <?php if((isset($prev_crops_arr[$k]['f11_cultivating'])) && $prev_crops_arr[$k]['f11_cultivating'] == $crop['crop_id']) { ?> selected <?php } ?>>
                                                                                                    <?php echo strtoupper($crop['crop_name']); ?>
                                                                                                </option>	
                                                                                                <?php
                                                                                            }
                                                                                        ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>	<!-- Type of crop cultivating previous year [DDL] -->
                                                                                
                                                                                <div class="control-group">
                                                                                    <label for="text" class="control-label" style="margin-top:10px">Yield Achieved Last Year In tonnes <span style="color:#F00">*</span></label>
                                                                                    <div class="controls">
                                                                                        <input type="text" value="<?php if((isset($prev_crops_arr[$k]['f11_achieved'])) && $prev_crops_arr[$k]['f11_achieved'] != '') { echo $prev_crops_arr[$k]['f11_achieved']; } ?>" id="f11_achieved<?php echo $id; ?>" name="f11_achieved<?php echo $id; ?>" class="input-xlarge"  onKeyPress="return numsonly(event);" maxlength="10" data-rule-required="true" onchange="calTotal_f11()" placeholder="Yield Achieved">
                                                                                    </div>
                                                                                </div>	<!--Yield Achieved Last Year  -->
                                                    
                                                    							<div class="control-group">
                                                                                    <label for="text" class="control-label" style="margin-top:10px">Income Achieved Last Year in Rs. <span style="color:#F00">*</span></label>
                                                                                    <div class="controls">
                                                                                        <input type="text" value="<?php if((isset($prev_crops_arr[$k]['f11_income'])) && $prev_crops_arr[$k]['f11_income'] != '') { echo $prev_crops_arr[$k]['f11_income']; } ?>" id="f11_income<?php echo $id; ?>" name="f11_income<?php echo $id; ?>" class="input-xlarge" onKeyPress="return numsonly(event);" maxlength="10" data-rule-required="true" onchange="calTotal_f11()" placeholder="Income Achieved">
                                                                                    </div>
                                                                                </div>	<!--Income Achieved Last Year  -->
                                                                                
                                                                                <div class="control-group">
                                                                                    <label for="text" class="control-label" style="margin-top:10px">Any Pest or Diseases That The Yield Was Prone To? <span style="color:#F00">*</span></label>
                                                                                    <div class="controls">
                                                                                        <select id="f11_diseases<?php echo $id; ?>" name="f11_diseases<?php echo $id; ?>" class="select2-me input-xlarge" data-rule-required="true" onchange="calTotal_f11()">
                                                                                            <option value="" disabled selected> Select here</option>
                                                                                            <option point="0" value="yes" <?php if((isset($prev_crops_arr[$k]['f11_diseases'])) && $prev_crops_arr[$k]['f11_diseases'] == 'yes') { ?> selected <?php } ?>> Yes</option>
                                                                                            <option point="10" value="no" <?php if((isset($prev_crops_arr[$k]['f11_diseases'])) && $prev_crops_arr[$k]['f11_diseases'] == 'no') { ?> selected <?php } ?>> No</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>	<!--Any pest or diseases that the yield was prone to?-->
                                                                                
                                                                                <div class="control-group">
                                                                                    <label for="text" class="control-label" style="margin-top:10px">What Kind Of Fertilizers Did You Use <span style="color:#F00">*</span></label>
                                                                                    <div class="controls">
                                                                                        <select id="f11_fertilizers<?php echo $id; ?>" name="f11_fertilizers<?php echo $id; ?>" class="select2-me input-xlarge" data-rule-required="true" onchange="calTotal_f11()">
                                                                                            <option value="" disabled selected> Select here</option>
                                                                                            <option point="5" value="inorganic" <?php if((isset($prev_crops_arr[$k]['f11_fertilizers'])) && $prev_crops_arr[$k]['f11_fertilizers'] == 'inorganic') { ?> selected <?php } ?>> Inorganic</option>
                                                                                            <option point="10" value="organic" <?php if((isset($prev_crops_arr[$k]['f11_fertilizers'])) && $prev_crops_arr[$k]['f11_fertilizers'] == 'organic') { ?> selected <?php } ?>> Organic</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>	<!--What kind of Fertilizers did you use -->
                                                    							
                                                                                <div class="control-group">
                                                                                    <label for="text" class="control-label" style="margin-top:10px">How much was the total consumption of Fertilizer in KGs <span style="color:#F00">*</span></label>
                                                                                    <div class="controls">
                                                                                        <input type="text" value="<?php if((isset($prev_crops_arr[$k]['f11_consumption_fertilizer'])) && $prev_crops_arr[$k]['f11_consumption_fertilizer'] != '') { echo $prev_crops_arr[$k]['f11_consumption_fertilizer']; } ?>" id="f11_consumption_fertilizer<?php echo $id; ?>" name="f11_consumption_fertilizer<?php echo $id; ?>" class="input-xlarge" onKeyPress="return numsonly(event);" maxlength="10" data-rule-required="true" onchange="calTotal_f11()" placeholder="How much was the total consumption of Fertilizer in KGs">
                                                                                    </div>
                                                                                </div>	<!-- How much was the total consumption of Fertilizer in KGs -->
                                                                                
                                                                                <div class="control-group">
                                                                                    <label for="text" class="control-label" style="margin-top:10px">Was your crop damaged / destroyed last year <span style="color:#F00">*</span></label>
                                                                                    <div class="controls">
                                                                                        <select id="f11_damaged_prev_crop<?php echo $id; ?>" name="f11_damaged_prev_crop<?php echo $id; ?>" class="select2-me input-xlarge" data-rule-required="true" onchange="calTotal_f11()">
                                                                                            <option value="" disabled selected> Select here</option>
                                                                                            <option point="0" value="yes" <?php if((isset($prev_crops_arr[$k]['f11_damaged_prev_crop'])) && $prev_crops_arr[$k]['f11_damaged_prev_crop'] == 'yes') { ?> selected <?php } ?>> Yes</option>
                                                                                            <option point="10" value="no" <?php if((isset($prev_crops_arr[$k]['f11_damaged_prev_crop'])) && $prev_crops_arr[$k]['f11_damaged_prev_crop'] == 'no') { ?> selected <?php } ?>> No</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>	<!--Any pest or diseases that the yield was prone to?-->
                                                                                
                                                                                <div id="div_damaged_prev_crop_display<?php echo $id; ?>" style="display:none;padding: 5px; border: 1px solid #d6d6d6; margin: 5px;">
                                                                                
                                                                                	<div class="control-group">
                                                                                        <label for="text" class="control-label" style="margin-top:10px">What was the reason?<span style="color:#F00">*</span></label>
                                                                                        <div class="controls">
                                                                                            <select id="f11_what_was_the_reason<?php echo $id; ?>" name="f11_what_was_the_reason<?php echo $id; ?>" class="select2-me input-xlarge" data-rule-required="true" onchange="calTotal_f11()">
                                                                                                <option value="" disabled selected> Select here</option>
                                                                                                <option value="Flood" <?php if((isset($prev_crops_arr[$k]['f11_what_was_the_reason'])) && $prev_crops_arr[$k]['f11_what_was_the_reason'] == 'Flood') { ?> selected <?php } ?>> Flood</option>
                                                                                                <option value="Drought" <?php if((isset($prev_crops_arr[$k]['f11_what_was_the_reason'])) && $prev_crops_arr[$k]['f11_what_was_the_reason'] == 'Drought') { ?> selected <?php } ?>> Drought</option>
                                                                                                <option value="Fire" <?php if((isset($prev_crops_arr[$k]['f11_what_was_the_reason'])) && $prev_crops_arr[$k]['f11_what_was_the_reason'] == 'Fire') { ?> selected <?php } ?>> Fire</option>
                                                                                                <option value="Stolen" <?php if((isset($prev_crops_arr[$k]['f11_what_was_the_reason'])) && $prev_crops_arr[$k]['f11_what_was_the_reason'] == 'Stolen') { ?> selected <?php } ?>> Stolen</option>
                                                                                                <option value="Irrigation Issues" <?php if((isset($prev_crops_arr[$k]['f11_what_was_the_reason'])) && $prev_crops_arr[$k]['f11_what_was_the_reason'] == 'Irrigation Issues') { ?> selected <?php } ?>> Irrigation Issues</option>
                                                                                                <option value="Lack of Component" <?php if((isset($prev_crops_arr[$k]['f11_what_was_the_reason'])) && $prev_crops_arr[$k]['f11_what_was_the_reason'] == 'Lack of Component') { ?> selected <?php } ?>> Lack of Component</option>
                                                                                                <option value="Others" <?php if((isset($prev_crops_arr[$k]['f11_what_was_the_reason'])) && $prev_crops_arr[$k]['f11_what_was_the_reason'] == 'Others') { ?> selected <?php } ?>> Others</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>	<!-- What was the reason -->
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                            
																			<script>
																				$(document).ready(function(e) {
                                                                                	$('#f11_damaged_prev_crop'+<?php echo $id; ?>).on('change', function(){
																						if($(this).val() == 'yes'){
																							$('#div_damaged_prev_crop_display<?php echo $id; ?>').show('swing');
																						}
																						else
																						{
																							$('#div_damaged_prev_crop_display<?php echo $id; ?>').hide('swing');
																							$('#div_damaged_prev_crop_display<?php echo $id; ?>').find('input, select').val('').trigger('change');
																						}
																					});
																					
																					
																					if($('#f11_damaged_prev_crop<?php echo $id; ?>').val() == 'yes')
																					{
																						$('#div_damaged_prev_crop_display<?php echo $id; ?>').show('swing');
																					}
																					else
																					{
																						$('#div_damaged_prev_crop_display<?php echo $id; ?>').find('input, select').val('');
																					}    
                                                                                });
																				<?php 
																					echo 'contentCountPrevCrop='.$id.';';
																				?>
                                                                            </script>
                                                                            
																			<?php
																		}
																		?>
                                                                    </div>
                                                                    
                                                                    <div style="padding:5px;border:1px solid #d6d6d6;margin:5px;">
                                                                        <a class="btn btn-sm btn-warning addPrevCrop">Add New</a>
                                                                        <a class="btn btn-sm btn-danger pull-right removePrevCrop" data-toggle="modal" data-target="#confirm_box_prev_crop" data-backdrop="static" >Remove</a>
                                                                    </div>
                        
                                                                    <div class="form-actions">
                                                                        <input type="reset" class="btn" value="Back" id="back">
                                                                        <input type="submit" class="btn btn-primary" value="Save" id="save">
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                        	</form>
                                                            <h1 id="prev_crop_cycle_g_total">0</h1>
                                                        </div>	<!-- Previous Crop Cycle Details -->
                                                        <div class="tab-pane" id="div_cur_crop_cycle">
                                                           	Current Crop Cycle Forecast
                                                           	<form method="POST" enctype="multipart/form-data" class='form-horizontal form-bordered form-validate' id="frm_cur_crop_cycle" name="frm_cur_crop_cycle">
                                                           	
                                                            	<input type="hidden" id="add_cur_crop_deatils" name="add_cur_crop_deatils" value="1">
                                                                <input type="hidden" id="fm_id" name="fm_id" value="<?php echo $fm_id ?>">
                                                                <input type="hidden" id="fm_caid" name="fm_caid" value="<?php echo $_SESSION['fm_caid']; ?>">
                                                                <input type="hidden" id="f14_points" name="f14_points" value="">
                                                                <input type="hidden" name="no_of_cur_crop_forecast" id="no_of_cur_crop_forecast" value="1">
                                                                
                                                                <div class="form-content">
                                                                	
                                                                    <div id="cur_crop">
                                                                    	<?php
                                                                        for($l=0;$l<$no_of_cur_crops;$l++)
																		{
																			$id =$l+1;
																			
																			?>
                                                                            <div id="curcrop<?php echo $id; ?>" style="padding:5px;border:1px solid #d6d6d6;margin:5px;">
                                                                                <input type="hidden" name="id[]" id="id" value="<?php echo @$cur_crops_arr[$l]['id']; ?>">
                                                                                <h3>Current Crop <?php echo $id; ?> Forecast</h3>
                                                                        		
                                                                                <div class="control-group">
                                                                                    <label for="text" class="control-label" style="margin-top:10px">What type of crop planned?<span style="color:#F00">*</span></label>
                                                                                    <div class="controls">
                                                                                        <select id="f14_crop_type<?php echo $id; ?>" name="f14_crop_type<?php echo $id; ?>" class="select2-me input-xlarge" data-rule-required="true">
                                                                                            <option value="" disabled selected> Select here</option>
                                                                                            <option value="Commercial" <?php if((isset($cur_crops_arr[$l]['f14_crop_type'])) && $cur_crops_arr[$l]['f14_crop_type'] == 'Commercial'){ ?> selected <?php } ?>>Commercial</option>
                                                                                            <option value="Seasonal" <?php if((isset($cur_crops_arr[$l]['f14_crop_type'])) && $cur_crops_arr[$l]['f14_crop_type'] == 'Seasonal'){ ?> selected <?php } ?>>Seasonal</option>
                                                                                        </select>
                                                                                    </div>
                                                                              	</div>	<!--  Crop Type-->
                                                                                
                                                                                <div class="control-group">
                                                                                    <label for="text" class="control-label" style="margin-top:10px">Type Of Crop Cultivating This Year<span style="color:#F00">*</span></label>
                                                                                    <div class="controls">
                                                                                        <select id="f14_cultivating<?php echo $id; ?>" name="f14_cultivating<?php echo $id; ?>" class="select2-me input-xlarge" data-rule-required="true" onchange="calTotal_f14();get_variety(this.value,<?php echo $id; ?>)">
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
                                                                              	</div>	<!-- Type of crop cultivating previous year [DDL] -->
                                                                                    
                                                                                <div class="control-group">
                                                                                    <label for="text" class="control-label" style="margin-top:10px">Variety<span style="color:#F00">*</span></label>
                                                                                    <div class="controls">
                                                                                        <select id="f14_variety<?php echo $id; ?>" name="f14_variety<?php echo $id; ?>" class="select2-me input-xlarge" data-rule-required="true" onchange="calTotal_f14();">
                                                                                            <option value="" disabled selected> Select here</option>
                                                                                            <?php
                                                                                            if(isset($crops_arr[$i]['f14_cultivating']) && $crops_arr[$i]['f14_cultivating']!="")
                                                                                            {
																								$result     = lookup_value('tbl_crop_varieties',array(),array("fk_crop_id"=>$crops_arr[$i]['f14_cultivating']),array(),array(),array());
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
                                                                                </div>	<!-- Variety [Depending on the selected crop] [DDL] -->
                                                                                
                                                                                <div class="control-group">
                                                                                    <label for="text" class="control-label" style="margin-top:10px">What is the total acrage you are planning for crop <?php echo $id; ?><span style="color:#F00">*</span></label>
                                                                                    <div class="controls">
                                                                                        <input type="text" value="<?php if((isset($cur_crops_arr[$l]['f14_total_acrage'])) && $cur_crops_arr[$l]['f14_total_acrage'] != '') { echo $cur_crops_arr[$l]['f14_total_acrage']; } ?>" id="f14_total_acrage<?php echo $id; ?>" name="f14_total_acrage<?php echo $id; ?>" class="input-xlarge" onKeyPress="return numsonly(event);" maxlength="10" data-rule-required="true" placeholder="What is the total acrage you are planning for crop <?php echo $id; ?>">
                                                                                    </div>
                                                                                </div>	<!-- Total Acrage -->
                                                                                
                                                                                <div class="control-group">
                                                                                    <label for="text" class="control-label" style="margin-top:10px">Expected Yield<span style="color:#F00">*</span></label>
                                                                                    <div class="controls">
                                                                                        <input type="text" value="<?php if((isset($cur_crops_arr[$l]['f14_expected_yeild'])) && $cur_crops_arr[$l]['f14_expected_yeild'] != '') { echo $cur_crops_arr[$l]['f14_expected_yeild']; } ?>" id="f14_expected_yeild<?php echo $id; ?>" name="f14_expected_yeild<?php echo $id; ?>" class="input-xlarge" onKeyPress="return numsonly(event);" maxlength="10" data-rule-required="true" placeholder="Expected Yield">
                                                                                    </div>
                                                                                </div>	<!-- expected yeild -->
                                                                                
                                                                                <div class="control-group">
                                                                                    <label for="text" class="control-label" style="margin-top:10px">What type of seeds you plan to buy?<span style="color:#F00">*</span></label>
                                                                                    <div class="controls">
                                                                                        <select id="f14_seed_type<?php echo $id; ?>" name="f14_seed_type<?php echo $id; ?>" class="select2-me input-xlarge" data-rule-required="true" onChange="calTotal_f14();">
                                                                                            <option value="" disabled selected> Select here</option>
                                                                                            <option point="10" value="Hybrid" <?php if((isset($cur_crops_arr[$l]['f14_seed_type'])) && $cur_crops_arr[$l]['f14_seed_type'] == 'Hybrid'){ ?> selected <?php } ?>>Hybrid</option>
                                                                                            <option point="0" value="Non Hybrid" <?php if((isset($cur_crops_arr[$l]['f14_seed_type'])) && $cur_crops_arr[$l]['f14_seed_type'] == 'Non Hybrid'){ ?> selected <?php } ?>>Non-Hybrid</option>
                                                                                        </select>
                                                                                    </div>
                                                                              	</div>	<!-- seed type -->
                                                                                
                                                                                <div class="control-group">
                                                                                    <label for="text" class="control-label" style="margin-top:10px">How much is the quantity bought? [In Kg per acre]<span style="color:#F00">*</span></label>
                                                                                    <div class="controls">
                                                                                        <input type="text" value="<?php if((isset($cur_crops_arr[$l]['f14_seed_quantity'])) && $cur_crops_arr[$l]['f14_seed_quantity'] != '') { echo $cur_crops_arr[$l]['f14_seed_quantity']; } ?>" id="f14_seed_quantity<?php echo $id; ?>" name="f14_seed_quantity<?php echo $id; ?>" class="input-xlarge" onKeyPress="return numsonly(event);" maxlength="10" data-rule-required="true" placeholder="How much is the quantity bought">
                                                                                    </div>
                                                                                </div>	<!-- seed quality -->
                                                                                
                                                                                <div class="control-group">
                                                                                    <label for="text" class="control-label" style="margin-top:10px">How much money you spend in buying seeds?<span style="color:#F00">*</span></label>
                                                                                    <div class="controls">
                                                                                        <input type="text" value="<?php if((isset($cur_crops_arr[$l]['f14_spend_money'])) && $cur_crops_arr[$l]['f14_spend_money'] != '') { echo $cur_crops_arr[$l]['f14_spend_money']; } ?>" id="f14_spend_money<?php echo $id; ?>" name="f14_spend_money<?php echo $id; ?>" class="input-xlarge" onKeyPress="return numsonly(event);" maxlength="10" data-rule-required="true" placeholder="How much money you spend in buying seeds">
                                                                                    </div>
                                                                                </div>	<!-- spend money -->
                                                                                
                                                                                <div class="control-group">
                                                                                    <label for="text" class="control-label" style="margin-top:10px">Do you use self grown seeds from previous crop?<span style="color:#F00">*</span></label>
                                                                                    <div class="controls">
                                                                                        <select id="f14_use_self_grown_seeds<?php echo $id; ?>" name="f14_use_self_grown_seeds<?php echo $id; ?>" class="select2-me input-xlarge" data-rule-required="true">
                                                                                            <option value="" disabled selected> Select here</option>
                                                                                            <option value="yes" <?php if((isset($cur_crops_arr[$l]['f14_use_self_grown_seeds'])) && $cur_crops_arr[$l]['f14_use_self_grown_seeds'] == 'yes'){ ?> selected <?php } ?>>Yes</option>
                                                                                            <option value="no" <?php if((isset($cur_crops_arr[$l]['f14_use_self_grown_seeds'])) && $cur_crops_arr[$l]['f14_use_self_grown_seeds'] == 'no'){ ?> selected <?php } ?>>No</option>
                                                                                        </select>
                                                                                    </div>
                                                                              	</div>	<!-- use self grown seeds -->
                                                                                
                                                                                <div class="control-group">
                                                                                    <label for="text" class="control-label" style="margin-top:10px">Did you take loan to buy seeds?<span style="color:#F00">*</span></label>
                                                                                    <div class="controls">
                                                                                        <select id="f14_loan_taken<?php echo $id; ?>" name="f14_loan_taken<?php echo $id; ?>" class="select2-me input-xlarge" data-rule-required="true" onChange="calTotal_f14();">
                                                                                            <option value="" disabled selected> Select here</option>
                                                                                            <option point="0" value="yes" <?php if((isset($cur_crops_arr[$l]['f14_loan_taken'])) && $cur_crops_arr[$l]['f14_loan_taken'] == 'yes'){ ?> selected <?php } ?>>Yes</option>
                                                                                            <option point="10" value="no" <?php if((isset($cur_crops_arr[$l]['f14_loan_taken'])) && $cur_crops_arr[$l]['f14_loan_taken'] == 'no'){ ?> selected <?php } ?>>No</option>
                                                                                        </select>
                                                                                    </div>
                                                                              	</div>	<!-- loan taken [DDL] -->
                                                                                
                                                                                <div id="div_loan_taken_display<?php echo $id; ?>" style="display:none;padding: 5px; border: 1px solid #d6d6d6; margin: 5px;">
                                                                                
                                                                                    <div class="control-group">
                                                                                        <label for="text" class="control-label" style="margin-top:10px">How much is the loan amount?<span style="color:#F00">*</span></label>
                                                                                        <div class="controls">
                                                                                            <input type="text" value="<?php if((isset($cur_crops_arr[$l]['f14_loan_amount'])) && $cur_crops_arr[$l]['f14_loan_amount'] != '') { echo $cur_crops_arr[$l]['f14_loan_amount']; } ?>" id="f14_loan_amount<?php echo $id; ?>" name="f14_loan_amount<?php echo $id; ?>" class="input-xlarge" onKeyPress="return numsonly(event);" maxlength="10" data-rule-required="true" placeholder="How much is the loan amount" onBlur="calTotal_f14();">
                                                                                        </div>
                                                                                    </div>	<!-- loan amount -->
                                                                                    
                                                                                    <div class="control-group">
                                                                                        <label for="text" class="control-label" style="margin-top:10px">Where did you borrow the loan from?<span style="color:#F00">*</span></label>
                                                                                        <div class="controls">
                                                                                            <select id="f14_borrow_loan_from<?php echo $id; ?>" name="f14_borrow_loan_from<?php echo $id; ?>" class="select2-me input-xlarge" data-rule-required="true" onChange="calTotal_f14();">
                                                                                                <option value="" disabled selected> Select here</option>
                                                                                                <option point="10" value="Bank" <?php if((isset($cur_crops_arr[$l]['f14_borrow_loan_from'])) && $cur_crops_arr[$l]['f14_borrow_loan_from'] == 'Bank'){ ?> selected <?php } ?>>Bank</option>
                                                                                                <option point="8" value="MFI OR NBFC" <?php if((isset($cur_crops_arr[$l]['f14_borrow_loan_from'])) && $cur_crops_arr[$l]['f14_borrow_loan_from'] == 'MFI OR NBFC'){ ?> selected <?php } ?>>MFI/NBFC</option>
                                                                                                <option point="6" value="FPO" <?php if((isset($cur_crops_arr[$l]['f14_borrow_loan_from'])) && $cur_crops_arr[$l]['f14_borrow_loan_from'] == 'FPO'){ ?> selected <?php } ?>>FPO</option>
                                                                                                <option point="0" value="Money Lender" <?php if((isset($cur_crops_arr[$l]['f14_borrow_loan_from'])) && $cur_crops_arr[$l]['f14_borrow_loan_from'] == 'Money Lender'){ ?> selected <?php } ?>>Money Lender (Private)</option>
                                                                                                <option point="2" value="Other Lending Institutions" <?php if((isset($cur_crops_arr[$l]['f14_borrow_loan_from'])) && $cur_crops_arr[$l]['f14_borrow_loan_from'] == 'Other Lending Institutions'){ ?> selected <?php } ?>>Other Lending Institutions (Muthoot)</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>	<!-- borrow loan from -->
                                                                                
                                                                                </div> <!-- IF taken loan yes then display div -->
                                                                                
                                                                                <div class="control-group">
                                                                                    <label for="text" class="control-label" style="margin-top:10px">Potential Crop Diseases<span style="color:#F00">*</span></label>
                                                                                    <div class="controls">
                                                                                        <select id="f14_diseases<?php echo $id; ?>" name="f14_diseases<?php echo $id; ?>" class="select2-me input-xlarge" data-rule-required="true">
                                                                                            <option value="" disabled selected> Select here</option>
                                                                                            <option value="Fungal" <?php if((isset($cur_crops_arr[$l]['f14_diseases'])) && $cur_crops_arr[$l]['f14_diseases'] == 'Fungal') { ?> selected <?php } ?>> Fungal</option>
                                                                                            <option value="Non-fungal" <?php if((isset($cur_crops_arr[$l]['f14_diseases'])) && $cur_crops_arr[$l]['f14_diseases'] == 'Non-fungal') { ?> selected <?php } ?>> Non-fungal</option>
                                                                                            <option value="Severe" <?php if((isset($cur_crops_arr[$l]['f14_diseases'])) && $cur_crops_arr[$l]['f14_diseases'] == 'Severe') { ?> selected <?php } ?>> Severe</option>
                                                                                            <option value="Treatable" <?php if((isset($cur_crops_arr[$l]['f14_diseases'])) && $cur_crops_arr[$l]['f14_diseases'] == 'Treatable') { ?> selected <?php } ?>> Treatable</option>
                                                                                            <option value="No potential of diseases" <?php if((isset($cur_crops_arr[$l]['f14_diseases'])) && $cur_crops_arr[$l]['f14_diseases'] == 'No potential of diseases') { ?> selected <?php } ?>> No potential of diseases</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>	<!-- diseases -->
                                                                                
                                                                                <div class="control-group">
                                                                                    <label for="text" class="control-label" style="margin-top:10px">What type of water sources you are depending on?<span style="color:#F00">*</span></label>
                                                                                    <div class="controls">
                                                                                        <select id="f14_water_source_type<?php echo $id; ?>" name="f14_water_source_type<?php echo $id; ?>" class="select2-me input-xlarge" data-rule-required="true" onChange="calTotal_f14();">
                                                                                            <option value="" disabled selected> Select here</option>
                                                                                            <option point="2" value="Rainwater Only" <?php if((isset($cur_crops_arr[$l]['f14_water_source_type'])) && $cur_crops_arr[$l]['f14_water_source_type'] == 'Rainwater Only'){ ?> selected <?php } ?>>Rainwater Only</option>
                                                                                            <option point="8" value="Irrigation" <?php if((isset($cur_crops_arr[$l]['f14_water_source_type'])) && $cur_crops_arr[$l]['f14_water_source_type'] == 'Irrigation'){ ?> selected <?php } ?>>Irrigation</option>
                                                                                            <option point="4" value="Canals" <?php if((isset($cur_crops_arr[$l]['f14_water_source_type'])) && $cur_crops_arr[$l]['f14_water_source_type'] == 'Canals'){ ?> selected <?php } ?>>Canals</option>
                                                                                            <option point="6" value="Others" <?php if((isset($cur_crops_arr[$l]['f14_water_source_type'])) && $cur_crops_arr[$l]['f14_water_source_type'] == 'Others'){ ?> selected <?php } ?>>Others</option>
                                                                                        </select>
                                                                                    </div>
                                                                              	</div>	<!-- water source type -->
                                                                                
                                                                                <div class="control-group">
                                                                                    <label for="tasktitel" class="control-label">
                                                                                        When is the harvest date? <span style="color:#F00">*</span>
                                                                                    </label>
                                                                                    <div class="controls">
                                                                                        <input type="text" value="<?php if((isset($cur_crops_arr[$l]['f14_harvest_date'])) && $cur_crops_arr[$l]['f14_harvest_date'] != '') { echo $cur_crops_arr[$l]['f14_harvest_date']; } ?>" id="f14_harvest_date<?php echo $id; ?>" name="f14_harvest_date<?php echo $id; ?>" placeholder="When is the harvest date" class="datepicker input-large" data-rule-required="true" />
                                                                                    </div>
                                                                                </div>	<!-- harvest date -->
                                                                                
                                                                                <div class="control-group">
                                                                                    <label for="text" class="control-label" style="margin-top:10px">What is the net total income you are expecting in this crop cycle?<span style="color:#F00">*</span></label>
                                                                                    <div class="controls">
                                                                                        <input type="text" value="<?php if((isset($cur_crops_arr[$l]['f14_income'])) && $cur_crops_arr[$l]['f14_income'] != '') { echo $cur_crops_arr[$l]['f14_income']; } ?>" id="f14_income<?php echo $id; ?>" name="f14_income<?php echo $id; ?>" class="input-xlarge" onKeyPress="return numsonly(event);" maxlength="10" data-rule-required="true" placeholder="What is the net total income you are expecting in this crop cycle">
                                                                                    </div>
                                                                                </div>	<!-- income -->
                                                                                        
                                                                            </div>
                                                                            
                                                                            <script type="text/javascript">
                                                                            	$(document).ready(function(e) {
                                                                                	$('#f14_loan_taken'+<?php echo $id; ?>).on('change', function(){
																						if($(this).val() == 'yes'){
																							$('#div_loan_taken_display<?php echo $id; ?>').show('swing');
																						}
																						else
																						{
																							$('#div_loan_taken_display<?php echo $id; ?>').hide('swing');
																							$('#div_loan_taken_display<?php echo $id; ?>').find('input, select').val('').trigger('change');
																						}
																					});
																					
																					
																					if($('#f14_loan_taken<?php echo $id; ?>').val() == 'yes')
																					{
																						$('#div_loan_taken_display<?php echo $id; ?>').show('swing');
																					}
																					else
																					{
																						$('#div_loan_taken_display<?php echo $id; ?>').find('input, select').val('');
																					}    
                                                                                });
																				
																				<?php 
																					echo 'contentCountCurCrop='.$id.';';
																				?>
																				
                                                                            </script>
                                                                            
                                                            				<?php
                                                                        }
																		?>
                                                                  	</div>
                                                                    
                                                                    <div style="padding:5px;border:1px solid #d6d6d6;margin:5px;">
                                                                        <a class="btn btn-sm btn-warning addCurCrop">Add New</a>
                                                                        <a class="btn btn-sm btn-danger pull-right removeCurCrop" data-toggle="modal" data-target="#confirm_box_cur_crop" data-backdrop="static" >Remove</a>
                                                                    </div>
                        
                                                                    <div class="form-actions">
                                                                        <input type="reset" class="btn" value="Back" id="back">
                                                                        <input type="submit" class="btn btn-primary" value="Save" id="save">
                                                                    </div>
                                                                    
                                                               	</div>
                                                            </form>
                                                            <h1 id="cur_crop_cycle_g_total">0</h1>
                                                        </div>	<!-- Current Crop Cycle Details -->
                                                    </div>	<!-- Main Forms -->
                                                </div>
                                            </div>
                                        </div>	<!-- CROP [COMPLETE] -->
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
                                                                    <?php 
																	if(isset($pt_row['pt_frm12']) && $pt_row['pt_frm12']!="") 
																	{
																		?>
																		<span class="badge " id="f12_pt" style="font-size:16px; font-weight:bold">
																			<?php echo $pt_row['pt_frm12']; ?>
                                                                        </span>
                                                                    	<?php
                                                                    } 
																	else
																	{
																		?>
																		<span class="badge " id="f12_pt" style="font-size:16px; color:red">Incomplete</span> 
																		<?php 
																	} 
																	?>
                                                               	</a>
                                                            </li>	<!-- Assets Details -->
                                                            <li>
                                                                <a href="#div_live_stock" data-toggle='tab'>
                                                                    <i class="fa fa-user"></i>Live Stock
                                                                    <?php 
																	if(isset($pt_row['pt_frm13']) && $pt_row['pt_frm13']!="") 
																	{
																		?>
																		<span class="badge " id="f13_pt" style="font-size:16px; font-weight:bold">
																			<?php echo $pt_row['pt_frm13']; ?>
                                                                        </span>
                                                                    	<?php
                                                                    } 
																	else
																	{
																		?>
																		<span class="badge " id="f13_pt" style="font-size:16px; color:red">Incomplete</span> 
																		<?php 
																	} 
																	?>
                                                                </a>
                                                            </li>	<!-- Live Stock -->
                                                        </ul>
                                                    </div>	<!-- Side Menu [Form Name] -->
                                                    <div class="tab-content padding tab-content-inline">
                                                        <div class="tab-pane active" id="div_asset_details">
                                                    		Assets Details
                                                            <form method="POST" enctype="multipart/form-data" class='form-horizontal form-bordered form-validate' id="frm_asset_details" name="frm_asset_details">
                                                                
                                                            	<input type="hidden" id="fm_id" name="fm_id" value="<?php echo $fm_id ?>">
                                                                <input type="hidden" id="add_asset_detail" name="add_asset_detail" value="1">
                                                                <input type="hidden" id="fm_caid" name="fm_caid" value="<?php echo $_SESSION['fm_caid']; ?>">
                                                                <input type="hidden" id="f12_points" name="f12_points" value=""> 
                                                                
                                                                <div class="form-content">
                                                                	
                                                                    <div class="control-group">
                                                                        <label for="tasktitel" class="control-label">Vehical Owned <span style="color:#F00">*</span></label>
                                                                        <div class="controls">
                                                                            <select id="f12_vehicle" name="f12_vehicle" class="select2-me input-xlarge" data-rule-required="true" onChange="calTotal_f12();">
                                                                                <option value="" disabled selected>Select here</option>
                                                                                <option value="1" point="5" <?php if((isset($data['f12_vehicle'])) && $data['f12_vehicle'] == '1'){ ?> selected <?php }  ?>>1</option>
                                                                                <option value="2" point="7" <?php if((isset($data['f12_vehicle'])) && $data['f12_vehicle'] == '2'){ ?> selected <?php }  ?>>2</option>
                                                                                <option value="3" point="8" <?php if((isset($data['f12_vehicle'])) && $data['f12_vehicle'] == '3'){ ?> selected <?php }  ?>>3</option>
                                                                                <option value="4_or_more" point="10" <?php if((isset($data['f12_vehicle'])) && $data['f12_vehicle'] == '4_or_more'){ ?> selected <?php }  ?>>4 OR More</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>  <!-- Vehical Owned [DDL] -->
                                                                    
                                                                     <div class="control-group">
                                                                        <label for="tasktitel" class="control-label">Total Value of the Vehical<span style="color:#F00">*</span></label>
                                                                        <div class="controls">
                                                                            <input type="text" value="<?php if((isset($data['f12_total_val_of_vehical'])) && $data['f12_total_val_of_vehical'] != ''){ echo $data['f12_total_val_of_vehical']; } ?>" id="f12_total_val_of_vehical" name="f12_total_val_of_vehical" class="input-xlarge" data-rule-required="true" data-rule-number="true" maxlength="10" onchange="calTotal_f12()" placeholder="Total Value of Vehical" onBlur="calTotal_f12();">
                                                                        </div>
                                                                    </div>  <!-- Total Value of the Vehical -->
                                                                    
                                                                    <div class="control-group">
                                                                        <label for="tasktitel" class="control-label">Machinery Owned<span style="color:#F00">*</span>
                                                                        </label>
                                                                        <div class="controls">
                                                                            <select id="f12_machinery" name="f12_machinery" class="select2-me input-xlarge" data-rule-required="true" onChange="calTotal_f12();">
                                                                                <option value="" disabled selected>Select here</option>
                                                                                <option value="1" point="2" <?php if((isset($data['f12_machinery'])) && $data['f12_machinery'] == '1'){ ?> selected <?php }  ?>>1</option>
                                                                                <option value="2" point="4" <?php if((isset($data['f12_machinery'])) && $data['f12_machinery'] == '2'){ ?> selected <?php }  ?>>2</option>
                                                                                <option value="3" point="6" <?php if((isset($data['f12_machinery'])) && $data['f12_machinery'] == '3'){ ?> selected <?php }  ?>>3</option>
                                                                                <option value="4_or_more" point="10" <?php if((isset($data['f12_machinery'])) && $data['f12_machinery'] == '4_or_more'){ ?> selected <?php }  ?>>4 OR More</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>  <!-- Machinery Owned -->
                                                                    
                                                                    <div class="control-group">
                                                                        <label for="tasktitel" class="control-label">Total Value of the Machinery <span style="color:#F00">*</span>
                                                                        </label>
                                                                        <div class="controls">
                                                                            <input type="text" value="<?php if((isset($data['f12_total_val_of_machinery'])) && $data['f12_total_val_of_machinery'] != ''){ echo $data['f12_total_val_of_machinery']; } ?>" id="f12_total_val_of_machinery" name="f12_total_val_of_machinery" class="input-xlarge" data-rule-required="true" data-rule-number="true" maxlength="10" onchange="calTotal_f12()" placeholder="Total Value of the Machinery" onBlur="calTotal_f12();">
                                                                        </div>
                                                                    </div>  <!-- Total Value of the Machinery -->
                                                                    
                                                                    <div class="control-group">
                                                                        <label for="tasktitel" class="control-label">Any Other Assets <span style="color:#F00">*</span>
                                                                        </label>
                                                                        <div class="controls">
                                                                            <select id="f12_any_other_assets" name="f12_any_other_assets" class="select2-me input-xlarge" >
                                                                                <option value="" disabled selected>Select here</option>
                                                                                <option value="yes" <?php if((isset($data['f12_any_other_assets'])) && $data['f12_any_other_assets'] == 'yes'){ ?> selected <?php }  ?>>Yes</option>
                                                                                <option value="no" <?php if((isset($data['f12_any_other_assets'])) && $data['f12_any_other_assets'] == 'no'){ ?> selected <?php }  ?>>No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>  <!-- Any Other Assets [DDL] -->
                                                                    
                                                                    <div id="div_any_other_assets_display" style="display: none; padding: 10px; border:1px solid #d6d6d6; margin: 20px;">
                                                                    
                                                                    	<div class="control-group">
                                                                            <label for="tasktitel" class="control-label">Which Assets you owned <span style="color:#F00">*</span></label>
                                                                            <div class="controls">
                                                                                <select id="f12_name_of_other_assets" name="f12_name_of_other_assets" class="select2-me input-xlarge">
                                                                                    <option value="" disabled selected>Select here</option>
                                                                                    <option value="Other Buildings" <?php if((isset($data['f12_name_of_other_assets'])) && $data['f12_name_of_other_assets'] == 'Other Buildings'){ ?> selected <?php }  ?>>Other Buildings</option>
                                                                                    <option value="Land" <?php if((isset($data['f12_name_of_other_assets'])) && $data['f12_name_of_other_assets'] == 'Land'){ ?> selected <?php }  ?>>Land</option>
                                                                                    <option value="Residential Building" <?php if((isset($data['f12_name_of_other_assets'])) && $data['f12_name_of_other_assets'] == 'Residential Building'){ ?> selected <?php }  ?>>Residential Building</option>
                                                                                    <option value="Other" <?php if((isset($data['f12_name_of_other_assets'])) && $data['f12_name_of_other_assets'] == 'Other'){ ?> selected <?php }  ?>>Other</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>  <!-- Which Assets you owned [If Yes [DDL]] -->
    
                                                                        <div class="control-group">
                                                                            <label for="tasktitel" class="control-label">Mention the value of the assets <span style="color:#F00">*</span></label>
                                                                            <div class="controls">
                                                                                <input type="text" id="f12_mention_value_of_assets" name="f12_mention_value_of_assets" class="input-xlarge" data-rule-required="true" data-rule-number="true" maxlength="10" placeholder="Total Value of Vehical" onBlur="calTotal_f12();">
                                                                            </div>
                                                                        </div>    <!-- Mention the value of the assets [If Yes] -->
                                                                    
                                                                    </div>	<!-- div_any_other_assets_display -->
                                                                    
                                                                    <div class="form-actions">
                                                                    	<input type="reset" class="btn" value="Back" id="back">
                                                                    	<input type="submit" class="btn btn-primary" value="Save" id="save">
                                                                    </div>	<!-- Back And Save -->
                                                                    
                                                                </div>
                                                                
                                                            </form>
                                                            <h1 id="asset_details_g_total">0</h1>
                                                        </div>	<!-- Assets Details -->
                                                        <div class="tab-pane" id="div_live_stock">
                                                           	Live Stock
                                                        	<form method="POST" enctype="multipart/form-data" class='form-horizontal form-bordered form-validate' id="frm_live_stock" name="frm_live_stock">
                                                            	    
                                                                <input type="hidden" id="add_livestock_detail" name="add_livestock_detail" value="1">
                                                                <input type="hidden" id="fm_id" name="fm_id" value="<?php echo $fm_id ?>">
                                                                <input type="hidden" id="fm_caid" name="fm_caid" value="<?php echo $_SESSION['fm_caid']; ?>">
                                                                <input type="hidden" id="f13_points" name="f13_points" value="">
                                                                
                                                                <div class="form-content">
                                                                	
                                                                    <div class="control-group">
                                                                        <label for="text" class="control-label" style="margin-top:10px">Dairy Cattle
                                                                        <span style="color:#F00">*</span></label>
                                                                        <div class="controls">
                                                                           <input type="text" onKeyPress="return numsonly(event);" name="f13_dairy_cattle" id="f13_dairy_cattle" placeholder="Dairy Cattle Count" class="input-xlarge v_number cal_tcount" value="<?php if((isset($data['f13_dairy_cattle'])) && $data['f13_dairy_cattle'] != ''){ echo $data['f13_dairy_cattle']; } ?>">
                                                                        </div>
                                                                    </div>	<!--f3_dairy_cattle-->
                                                                    
                                                                    <div class="control-group">
                                                                        <label for="text" class="control-label" style="margin-top:10px">Draft Cattle
                                                                        <span style="color:#F00">*</span></label>
                                                                        <div class="controls">
                                                                            <input type="text" onKeyPress="return numsonly(event);" name="f13_draft_cattle" id="f13_draft_cattle" placeholder="Draft Cattle Count" class="input-xlarge v_number cal_tcount" value="<?php if((isset($data['f13_draft_cattle'])) && $data['f13_draft_cattle'] != ''){ echo $data['f13_draft_cattle']; } ?>">
                                                                        </div>
                                                                    </div>	<!--f13_draft_cattle-->
                                                                    
                                                                    <div class="control-group">
                                                                        <label for="text" class="control-label" style="margin-top:10px">Buffalo
                                                                        <span style="color:#F00">*</span></label>
                                                                        <div class="controls">
                                                                            <input type="text" onKeyPress="return numsonly(event);" name="f13_buffalo" id="f13_buffalo" placeholder="Buffalo Count" class="input-xlarge v_number cal_tcount" value="<?php if((isset($data['f13_buffalo'])) && $data['f13_buffalo'] != ''){ echo $data['f13_buffalo']; } ?>">
                                                                        </div>
                                                                    </div>	<!--f13_buffalo-->
                                                                    
                                                                    <div class="control-group">
                                                                        <label for="text" class="control-label" style="margin-top:10px">Ox
                                                                        <span style="color:#F00">*</span></label>
                                                                        <div class="controls">
                                                                            <input type="text" onKeyPress="return numsonly(event);" name="f13_ox" id="f13_ox" placeholder="Ox Count" class="input-xlarge v_number cal_tcount" value="<?php if((isset($data['f13_ox'])) && $data['f13_ox'] != ''){ echo $data['f13_ox']; } ?>">
                                                                        </div>
                                                                    </div>	<!--f13_ox-->
                                                                    
                                                                    <div class="control-group">
                                                                        <label for="text" class="control-label" style="margin-top:10px">Sheep
                                                                        <span style="color:#F00">*</span></label>
                                                                        <div class="controls">
                                                                            <input type="text" onKeyPress="return numsonly(event);" name="f13_sheep" id="f13_sheep" placeholder="Sheep Count" class="input-xlarge v_number cal_tcount" value="<?php if((isset($data['f13_sheep'])) && $data['f13_sheep'] != ''){ echo $data['f13_sheep']; } ?>">
                                                                        </div>
                                                                    </div>	<!--f13_sheep-->
                                                                    
                                                                    <div class="control-group">
                                                                        <label for="text" class="control-label" style="margin-top:10px">Goat
                                                                        <span style="color:#F00">*</span></label>
                                                                        <div class="controls">
                                                                            <input type="text" onKeyPress="return numsonly(event);" name="f13_goat" id="f13_goat" placeholder="Goat Count" class="input-xlarge v_number cal_tcount" value="<?php if((isset($data['f13_goat'])) && $data['f13_goat'] != ''){ echo $data['f13_goat']; } ?>">
                                                                        </div>
                                                                    </div>	<!--f13_goat-->
                                                                    
                                                                    <div class="control-group">
                                                                        <label for="text" class="control-label" style="margin-top:10px">Pig
                                                                        <span style="color:#F00">*</span></label>
                                                                        <div class="controls">
                                                                            <input type="text" onKeyPress="return numsonly(event);" name="f13_pig" id="f13_pig" placeholder="Pig Count" class="input-xlarge v_number cal_tcount" value="<?php if((isset($data['f13_pig'])) && $data['f13_pig'] != ''){ echo $data['f13_pig']; } ?>">
                                                                        </div>
                                                                    </div>	<!--f13_pig-->
                                                                    
                                                                    <div class="control-group">
                                                                        <label for="text" class="control-label" style="margin-top:10px">Poultry [ chicken, geese, turkey, duck]
                                                                        <span style="color:#F00">*</span></label>
                                                                        <div class="controls">
                                                                            <input type="text" onKeyPress="return numsonly(event);" name="f13_poultry" id="f13_poultry" placeholder="Poultry Count" class="input-xlarge v_number cal_tcount" value="<?php if((isset($data['f13_poultry'])) && $data['f13_poultry'] != ''){ echo $data['f13_poultry']; } ?>">
                                                                        </div>
                                                                    </div>	<!--f13_poultry-->
                                                                    
                                                                    <div class="control-group">
                                                                        <label for="text" class="control-label" style="margin-top:10px">Donkeys
                                                                        <span style="color:#F00">*</span></label>
                                                                        <div class="controls">
                                                                            <input type="text" onKeyPress="return numsonly(event);" name="f13_donkeys" id="f13_donkeys" placeholder="Donkeys Count" class="input-xlarge v_number cal_tcount" value="<?php if((isset($data['f13_donkeys'])) && $data['f13_donkeys'] != ''){ echo $data['f13_donkeys']; } ?>">
                                                                        </div>
                                                                    </div>	<!--f13_donkeys-->
                                                                    
                                                                    <div id="livestock_count" style="display:none">
                                                                        <div class="control-group" >
                                                                            <label for="text" class="control-label" style="margin-top:10px">Livestock Count<span style="color:#F00">*</span></label>
                                                                            <div class="controls">
                                                                                <input readonly type="text" onKeyPress="return numsonly(event);" id="f13_livestock_count" name="f13_livestock_count" class="input-xlarge" value="<?php echo @$f13_livestock_count; ?>"  data-rule-required="true" placeholder="Livestock Count">
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="control-group" >
                                                                            <label for="text" class="control-label" style="margin-top:10px">Income Gained From Livestock in Rs.<span style="color:#F00">*</span></label>
                                                                            <div class="controls">
                                                                                <input type="text" value="<?php echo @$f13_livestock_income; ?>" onKeyPress="return numsonly(event);" id="f13_livestock_income" name="f13_livestock_income" class="input-xlarge"  data-rule-required="true" placeholder="Income Gained">
                                                                            </div>
                                                                        </div>
                                                                    </div>	<!--livestock_count-->
                                                                    
                                                                    <div class="form-actions">
                                                                        <input type="reset" class="btn" value="Back" id="back">
                                                                        <input type="submit" class="btn btn-primary" value="Save" id="save">
                                                                    </div>	<!-- Back OR Save -->
                                                                    
                                                                </div>
                                                                
                                                            </form>
                                                            <h1 id="live_stock_g_total">0</h1>
                                                        </div>	<!-- Live Stock -->
                                                    </div>	<!-- Main Forms -->
                                                </div>
                                            </div>
                                        </div>	<!-- ASSETS [COMPLETE] -->
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
                                                                <a href="#div_financial_details" data-toggle='tab'>
                                                                    <i class="fa fa-user"></i>Financial Details
                                                                    <?php 
																	if(isset($pt_row['pt_frm8']) && $pt_row['pt_frm8']!="") 
																	{
																		?>
																		<span class="badge " id="f8_pt" style="font-size:16px; font-weight:bold">
																			<?php echo $pt_row['pt_frm8']; ?>
                                                                        </span>
                                                                    	<?php
                                                                    } 
																	else
																	{
																		?>
																		<span class="badge " id="f8_pt" style="font-size:16px; color:red">Incomplete</span> 
																		<?php 
																	} 
																	?>
                                                                </a>
                                                            </li>	<!-- Financial Details -->
                                                            <li>
                                                                <a href="#div_financial_history" data-toggle='tab'>
                                                                    <i class="fa fa-user"></i>Financial History
                                                                    <?php 
																	if(isset($pt_row['pt_frm8_fh']) && $pt_row['pt_frm8_fh']!="") 
																	{
																		?>
																		<span class="badge " id="f8_pt_fh" style="font-size:16px; font-weight:bold">
																			<?php echo $pt_row['pt_frm8_fh']; ?>
                                                                        </span>
                                                                    	<?php
                                                                    } 
																	else
																	{
																		?>
																		<span class="badge " id="f8_pt_fh" style="font-size:16px; color:red">Incomplete</span> 
																		<?php 
																	} 
																	?>
                                                                </a>
                                                            </li>	<!-- Financial History -->
                                                        </ul>
                                                    </div>	<!-- Side Menu [Form Name] -->
                                                    <div class="tab-content padding tab-content-inline">
                                                        <div class="tab-pane active" id="div_financial_details">
                                                           Financial Details
                                                           <form method="POST" enctype="multipart/form-data" class='form-horizontal form-bordered form-validate' id="frm_financial_details" name="frm_financial_details">
                                                                
                                                                <input type="hidden" id="add_loan_detail" name="add_loan_detail" value="1">
                                                                <input type="hidden" id="fm_id" name="fm_id" value="<?php echo $fm_id ?>">
                                                                <input type="hidden" id="fm_caid" name="fm_caid" value="<?php echo $_SESSION['fm_caid']; ?>">
                                                                <input type="hidden" id="f8_points" name="f8_points" value="">
                                                                
                                                                <div class="form-content">
                                                                
                                                                	<div id="loan_detail" style="padding:5px;border:1px solid #d6d6d6;margin:5px;">
                                                                    	
                                                                        <h2>Financial Details</h2>
                                                                        
                                                                        <div class="control-group">
                                                                            <label for="text" class="control-label" style="margin-top:10px">How Much is your Avg or Fixed Monthly Income?<span style="color:#F00">*</span></label>
                                                                            <div class="controls">
                                                                                <select   id="fx_monthly_income" name="fx_monthly_income" class="select2-me input-xlarge" data-rule-required="true">
                                                                                    <option value="" selected disabled>Select Here</option>
                                                                                    <option value="500-2500" <?php if((isset($data['fx_monthly_income'])) && $data['fx_monthly_income'] == '500-2500'){ ?> selected <?php } ?>>500-2500</option>
                                                                                    <option value="2501-5000" <?php if((isset($data['fx_monthly_income'])) && $data['fx_monthly_income'] == '2501-5000'){ ?> selected <?php } ?>>2501-5000</option>
                                                                                    <option value="5001-10000" <?php if((isset($data['fx_monthly_income'])) && $data['fx_monthly_income'] == '5001-10000'){ ?> selected <?php } ?>>5001-10000</option>
                                                                                    <option value="10001-25000" <?php if((isset($data['fx_monthly_income'])) && $data['fx_monthly_income'] == '10001-25000'){ ?> selected <?php } ?>>10001-25000</option>
                                                                                    <option value="25001-50000" <?php if((isset($data['fx_monthly_income'])) && $data['fx_monthly_income'] == '25001-50000'){ ?> selected <?php } ?>>25001-50000</option>
                                                                                    <option value="50001-100000" <?php if((isset($data['fx_monthly_income'])) && $data['fx_monthly_income'] == '50001-100000'){ ?> selected <?php } ?>>50001-100000</option>
                                                                                    <option value="100001-200000" <?php if((isset($data['fx_monthly_income'])) && $data['fx_monthly_income'] == '100001-200000'){ ?> selected <?php } ?>>100001-200000</option>
                                                                                    <option value="200001-300000" <?php if((isset($data['fx_monthly_income'])) && $data['fx_monthly_income'] == '200001-300000'){ ?> selected <?php } ?>>200001-300000</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>	<!--Fixed Monthly Income-->
                                                                        
                                                                        <div class="control-group">
                                                                            <label for="text" class="control-label" style="margin-top:10px">Any Loan taken?<span style="color:#F00">*</span></label>
                                                                            <div class="controls">
                                                                                <select id="f8_loan_taken" name="f8_loan_taken" class="select2-me input-xlarge" data-rule-required="true">
                                                                                    <option value="" disabled selected> Select here</option>
                                                                                    <option point="5" value="yes" <?php if((isset($data['f8_loan_taken'])) && $data['f8_loan_taken'] == 'yes'){ ?> selected <?php } ?> > Yes</option>
                                                                                    <option point="10" value="no" <?php if((isset($data['f8_loan_taken'])) && $data['f8_loan_taken'] == 'no'){ ?> selected <?php } ?>> No</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>	<!--Any Loan Taken?-->
                                                                        
                                                                        <div id="loan_taken" style="display: none;">
                                                                        	<input type="hidden" class="btn btn-primary" value="<?php echo $no_of_loan; ?>" name="num_of_loan" id="num_of_loan">
                                                                            <div id="loans_type">
                                                                            
                                                                            	<?php
																				if($no_of_loan=="")
																				{
																					$no_of_loan =1;
																				}
																				
																				for($m=0;$m<$no_of_loan;$m++)
																				{
																					$id = $m+1; 
																				
																					?>
																					<div id="loan<?php echo $id; ?>" style="padding:5px;border:1px solid #d6d6d6;margin:5px;">
                                                                                        <h3>Loan <?php echo $id; ?></h3>
                                                                                        <input type="hidden" name="id[]" id="id" value="<?php echo @$loan_arr[$m]['id']; ?>">
                                                                                        
                                                                                        <div class="control-group">
                                                                                            <label for="text" class="control-label" style="margin-top:10px">Mention the Loan Type<span style="color:#F00">*</span></label>
                                                                                            <div class="controls">
                                                                                                <select onchange="calTotal_f8();" id="f8_loan_type<?php echo $id; ?>" name="f8_loan_type<?php echo $id; ?>" class="select2-me input-xlarge" data-rule-required="true">
                                                                                                    <option value="" disabled selected> Select here</option>
                                                                                                    <option <?php if((isset($loan_arr[$m]['f8_loan_type'])) && $loan_arr[$m]['f8_loan_type'] == 'Education'){ ?> selected <?php } ?> value="Education" >Education</option>
                                                                                                    <option <?php if((isset($loan_arr[$m]['f8_loan_type'])) && $loan_arr[$m]['f8_loan_type'] == 'Land'){ ?> selected <?php } ?> value="Land">Land</option>
                                                                                                    <option <?php if((isset($loan_arr[$m]['f8_loan_type'])) && $loan_arr[$m]['f8_loan_type'] == 'Agriculture'){ ?> selected <?php } ?> value="Agriculture">Agriculture</option>
                                                                                                    <option <?php if((isset($loan_arr[$m]['f8_loan_type'])) && $loan_arr[$m]['f8_loan_type'] == 'Two Wheeler'){ ?> selected <?php } ?> value="Two Wheeler">Two Wheeler</option>
                                                                                                    <option <?php if((isset($loan_arr[$m]['f8_loan_type'])) && $loan_arr[$m]['f8_loan_type'] == 'Equipment'){ ?> selected <?php } ?> value="Equipment">Equipment</option>
                                                                                                    <option <?php if((isset($loan_arr[$m]['f8_loan_type'])) && $loan_arr[$m]['f8_loan_type'] == 'Irrigation'){ ?> selected <?php } ?> value="Irrigation">Irrigation</option>
                                                                                                    <option <?php if((isset($loan_arr[$m]['f8_loan_type'])) && $loan_arr[$m]['f8_loan_type'] == 'Fencing'){ ?> selected <?php } ?> value="Fencing">Fencing</option>
                                                                                                    <option <?php if((isset($loan_arr[$m]['f8_loan_type'])) && $loan_arr[$m]['f8_loan_type'] == 'Housing'){ ?> selected <?php } ?> value="Housing">Housing</option>
                                                                                                    <option <?php if((isset($loan_arr[$m]['f8_loan_type'])) && $loan_arr[$m]['f8_loan_type'] == 'Construction OR Renovation'){ ?> selected <?php } ?> value="Construction OR Renovation">Construction/Renovation</option>
                                                                                                    <option <?php if((isset($loan_arr[$m]['f8_loan_type'])) && $loan_arr[$m]['f8_loan_type'] == 'Four Wheeler'){ ?> selected <?php } ?> value="Four Wheeler">Four Wheeler</option>
                                                                                                    <option <?php if((isset($loan_arr[$m]['f8_loan_type'])) && $loan_arr[$m]['f8_loan_type'] == 'Electronics'){ ?> selected <?php } ?> value="Electronics">Electronics</option>
                                                                                                    <option <?php if((isset($loan_arr[$m]['f8_loan_type'])) && $loan_arr[$m]['f8_loan_type'] == 'NA'){ ?> selected <?php } ?> value="NA">NA</option>
                                                                                                    <option <?php if((isset($loan_arr[$m]['f8_loan_type'])) && $loan_arr[$m]['f8_loan_type'] == 'Others'){ ?> selected <?php } ?> value="Others">Others</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>	<!-- Mention the Loan Type -->
                                                                                        
                                                                                        <div class="control-group">
                                                                                            <label for="numberfield" class="control-label">Total Loan Amount<span style="color:#F00">*</span></label>
                                                                                            <div class="controls">
                                                                                                <input type="text" value="<?php if((isset($loan_arr[$m]['f8_loan_amount'])) && $loan_arr[$m]['f8_loan_amount'] != ''){ echo $loan_arr[$m]['f8_loan_amount']; } ?>" class="input-xlarge" placeholder="Loan Amount" name="f8_loan_amount<?php echo $id; ?>" id="f8_loan_amount<?php echo $id; ?>" onKeyPress=" return numsonly(event);"  data-rule-required="true"  maxlength="10">
                                                                                            </div>
                                                                                        </div>	<!-- Total Loan Amount -->
                                                                                        
                                                                                        <div class="control-group">
                                                                                            <label for="numberfield" class="control-label">Provider<span style="color:#F00">*</span></label>
                                                                                            <div class="controls">
                                                                                                <input type="text" class="input-xlarge" placeholder="Loan Provider" name="f8_loan_provider<?php echo $id; ?>" id="f8_loan_provider<?php echo $id; ?>" value="<?php if((isset($loan_arr[$m]['f8_loan_provider'])) && $loan_arr[$m]['f8_loan_provider'] != ''){ echo $loan_arr[$m]['f8_loan_provider']; } ?>"  data-rule-required="true"   >
                                                                                                <label id="f8_loan_provider1_err" style="color:#FF0000;width:200px;margin-left:100px;"></label>    
                                                                                            </div>
                                                                                        </div>	<!-- Provider -->
                                                                                        
                                                                                        <div class="control-group">
                                                                                            <label for="numberfield" class="control-label">Current Outstanding Loan Amount With Interest<span style="color:#F00">*</span></label>
                                                                                            <div class="controls">
                                                                                                <input onchange="calTotal_f8();" data-rule-required="true" type="text" class="input-xlarge" onKeyPress="return numsonly(event);" placeholder="Outstanding Loan Amount With Interest" name="f8_outstanding_loan<?php echo $id; ?>" id="f8_outstanding_loan<?php echo $id; ?>" value="<?php if((isset($loan_arr[$m]['f8_outstanding_loan'])) && $loan_arr[$m]['f8_outstanding_loan'] != ''){ echo $loan_arr[$m]['f8_outstanding_loan']; } ?>" data-rule-number="true" data-rule-maxlength="10"> <!-- readyonly -->
                                                                                            </div>
                                                                                        </div>	<!-- Current Outstanding Loan Amount With Interest -->
                                                                                        
                                                                                        <div class="control-group">
                                                                                            <label for="numberfield" class="control-label">Therefore, No. of Months to clear Outstanding</label>
                                                                                            <div class="controls">
                                                                                                <input  type="text" class="input-xlarge" placeholder="No. Of EMI Remaining" name="f8_remaining_emi<?php echo $id; ?>" id="f8_remaining_emi<?php echo $id; ?>" value="<?php if((isset($loan_arr[$m]['f8_remaining_emi'])) && $loan_arr[$m]['f8_remaining_emi'] != ''){ echo $loan_arr[$m]['f8_remaining_emi']; } ?>" data-rule-number="true" data-rule-required="true"  data-rule-maxlength="10"> <!-- readonly -->
                                                                                            </div>
	                                            										</div>	<!-- Therefore, No. of Months to clear Outstanding -->
                                                                                        
                                                                                    </div>
																					<?php
																				}
																				?>
                                                                            
                                                                            </div>
                                                                            
                                                                    		<div style="padding:5px;border:1px solid #d6d6d6;margin:5px;">
                                                                                <a class="btn btn-sm btn-warning addLoanFrm1">Add New</a>
                                                                                <a class="btn btn-sm btn-danger pull-right removeLoanFrm1" data-toggle="modal" data-target="#confirm_box_loan_frm1" data-backdrop="static" >Remove</a>
                                                                            </div>        
                       
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    
                                                                    <div class="form-actions">
                                                                        <input type="reset" class="btn" value="Back" id="back">
                                                                        <input type="submit" class="btn btn-primary" value="Save" id="save">
                                                                    </div>	<!-- Submit and Reset Button -->
                                                                	
                                                                </div>
                                                                
                                                            </form>
                                                            <h1 id="financial_details_g_total">0</h1> 
                                                        </div>	<!-- Financial Details -->
                                                        <div class="tab-pane" id="div_financial_history">
                                                           	Financial History
                                                           	<form method="POST" enctype="multipart/form-data" class='form-horizontal form-bordered form-validate' id="frm_financial_history" name="frm_financial_history">
                                                           		
                                                                <input type="hidden" id="add_loan_detail" name="add_loan_detail" value="1">
                                                                <input type="hidden" id="fm_id" name="fm_id" value="<?php echo $fm_id ?>">
                                                                <input type="hidden" id="fm_caid" name="fm_caid" value="<?php echo $_SESSION['fm_caid']; ?>">
                                                                <input type="hidden" id="f8_financial_history_points" name="f8_financial_history_points" value="">
                                                                
                                                                <div class="form-content">
                                                                	
                                                                    <div class="control-group">
                                                                        <label for="text" class="control-label" style="margin-top:10px">Loan Borrowed from?<span style="color:#F00">*</span></label>
                                                                        <div class="controls">
                                                                            <select id="f8_loan_borrowed_from" name="f8_loan_borrowed_from" class="select2-me input-xlarge" data-rule-required="true">
                                                                                <option value="" selected disabled>Select Here</option>
                                                                                <option point="6"  <?php if((isset($data['f8_loan_borrowed_from'])) && $data['f8_loan_borrowed_from'] == 'Pvt Banks'){ ?> selected <?php } ?> value="Pvt Banks">Pvt Banks</option>
                                                                                <option point="8"  <?php if((isset($data['f8_loan_borrowed_from'])) && $data['f8_loan_borrowed_from'] == 'MFI'){ ?> selected <?php } ?> value="MFI">MFI</option>
                                                                                <option point="4"  <?php if((isset($data['f8_loan_borrowed_from'])) && $data['f8_loan_borrowed_from'] == 'Co-operative Societies'){ ?> selected <?php } ?> value="Co-operative Societies">Co-operative Societies</option>
                                                                                <option point="10" <?php if((isset($data['f8_loan_borrowed_from'])) && $data['f8_loan_borrowed_from'] == 'NABARD'){ ?> selected <?php } ?> value="NABARD">NABARD</option>
                                                                                <option point="8"  <?php if((isset($data['f8_loan_borrowed_from'])) && $data['f8_loan_borrowed_from'] == 'NBFC'){ ?> selected <?php } ?> value="NBFC">NBFC</option>
                                                                                <option point="0"  <?php if((isset($data['f8_loan_borrowed_from'])) && $data['f8_loan_borrowed_from'] == 'Private'){ ?> selected <?php } ?> value="Private">Private</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>	<!-- Loan Borrowed from -->
                                                                    
                                                                    <div class="control-group">
                                                                        <label for="text" class="control-label" style="margin-top:10px">Did you claim any Insurance previously?<span style="color:#F00">*</span></label>
                                                                        <div class="controls">
                                                                            <select id="f8_any_insurance" name="f8_any_insurance" class="select2-me input-xlarge" data-rule-required="true">
                                                                                <option value="" selected disabled>Select Here</option>
                                                                                <option point="5"  <?php if((isset($data['f8_any_insurance'])) && $data['f8_any_insurance'] == 'yes'){ ?> selected <?php } ?> value="yes">Yes</option>
                                                                                <option point="10" <?php if((isset($data['f8_any_insurance'])) && $data['f8_any_insurance'] == 'no'){ ?> selected <?php } ?> value="no">No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>	<!-- Did you claim any Insurance previously -->
                                                                    
																	<div id="div_any_insurance_display" style="display:none;padding: 5px; border: 1px solid #d6d6d6; margin: 5px;">
                                                                        <div class="control-group">
                                                                            <label for="text" class="control-label" style="margin-top:10px">Reason for claimimg the Insurance<span style="color:#F00">*</span></label>
                                                                            <div class="controls">
                                                                                <select id="f8_reason_for_insurance" name="f8_reason_for_insurance" class="select2-me input-xlarge" data-rule-required="true">
                                                                                    <option value="" selected disabled>Select Here</option>
                                                                                    <option <?php if((isset($data['f8_reason_for_insurance'])) && $data['f8_reason_for_insurance'] == 'Flood'){ ?> selected <?php } ?> value="Flood">Flood</option>
                                                                                    <option <?php if((isset($data['f8_reason_for_insurance'])) && $data['f8_reason_for_insurance'] == 'Drought'){ ?> selected <?php } ?> value="Drought">Drought</option>
                                                                                    <option <?php if((isset($data['f8_reason_for_insurance'])) && $data['f8_reason_for_insurance'] == 'Fire'){ ?> selected <?php } ?> value="Fire">Fire</option>
                                                                                    <option <?php if((isset($data['f8_reason_for_insurance'])) && $data['f8_reason_for_insurance'] == 'Theft'){ ?> selected <?php } ?> value="Theft">Theft</option>
                                                                                    <option <?php if((isset($data['f8_reason_for_insurance'])) && $data['f8_reason_for_insurance'] == 'Other'){ ?> selected <?php } ?> value="Other">Other</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>	<!-- Reason for claimimg the Insurance -->
                                                                        
                                                                        <div class="control-group">
                                                                            <label for="numberfield" class="control-label">What was the name of the Insurance?</label>
                                                                            <div class="controls">
                                                                                <input  type="text" class="input-xlarge" placeholder="What was the name of the Insurance?" name="f8_insurance_name" id="f8_insurance_name" value="<?php if((isset($data['f8_insurance_name'])) && $data['f8_insurance_name'] != ''){ echo $data['f8_insurance_name']; } ?>" data-rule-required="true" > <!-- readonly -->
                                                                            </div>
                                                                        </div>	<!-- What was the name of the Insurance? -->
                                                                        
                                                                        <div class="control-group">
                                                                            <label for="text" class="control-label" style="margin-top:10px">What other insurance do you have?<span style="color:#F00">*</span></label>
                                                                            <div class="controls">
                                                                                <select id="f8_other_insurance" name="f8_other_insurance" class="select2-me input-xlarge" data-rule-required="true">
                                                                                    <option value="" selected disabled>Select Here</option>
                                                                                    <option point="10" <?php if((isset($data['f8_other_insurance'])) && $data['f8_other_insurance'] == 'Life Insurance'){ ?> selected <?php } ?> value="Life Insurance">Life Insurance</option>
                                                                                    <option point="8" <?php if((isset($data['f8_other_insurance'])) && $data['f8_other_insurance'] == 'Health Insurance'){ ?> selected <?php } ?> value="Health Insurance">Health Insurance</option>
                                                                                    <option point="6" <?php if((isset($data['f8_other_insurance'])) && $data['f8_other_insurance'] == 'Vehicle Insurance'){ ?> selected <?php } ?> value="Vehicle Insurance">Vehicle Insurance</option>
                                                                                    <option point="4" <?php if((isset($data['f8_other_insurance'])) && $data['f8_other_insurance'] == 'Property Insurance'){ ?> selected <?php } ?> value="Property Insurance">Property Insurance</option>
                                                                                    <option point="2" <?php if((isset($data['f8_other_insurance'])) && $data['f8_other_insurance'] == 'Other'){ ?> selected <?php } ?> value="Other">Other</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>	<!-- What other insurance do you have? -->
                                                                   	</div>
                                                                    
                                                                    <div class="control-group">
                                                                        <label for="numberfield" class="control-label">What previous loans have you taken?</label>
                                                                        <div class="controls">
                                                                            <input  type="text" class="input-xlarge" placeholder="What previous loans have you taken?" name="f8_prev_loan_details" id="f8_prev_loan_details" value="<?php if((isset($data['f8_prev_loan_details'])) && $data['f8_prev_loan_details'] != ''){ echo $data['f8_prev_loan_details']; } ?>" data-rule-required="true" > <!-- readonly -->
                                                                        </div>
                                                                    </div>	<!-- What previous loans have you taken? -->
                                                                    
                                                                    <div class="control-group">
                                                                        <label for="numberfield" class="control-label">What did you use these loan amount for?</label>
                                                                        <div class="controls">
                                                                            <input  type="text" class="input-xlarge" placeholder="What did you use these loan amount for?" name="f8_use_of_prev_loan_amount" id="f8_use_of_prev_loan_amount" value="<?php if((isset($data['f8_use_of_prev_loan_amount'])) && $data['f8_use_of_prev_loan_amount'] != ''){ echo $data['f8_use_of_prev_loan_amount']; } ?>" data-rule-required="true" > <!-- readonly -->
                                                                        </div>
                                                                    </div>	<!-- What did you use these loan amount for? -->
                                                                    
                                                                    <div class="control-group">
                                                                        <label for="text" class="control-label" style="margin-top:10px">Any subsidies received from the Government?<span style="color:#F00">*</span></label>
                                                                        <div class="controls">
                                                                            <select id="f8_any_subsidies" name="f8_any_subsidies" class="select2-me input-xlarge" data-rule-required="true">
                                                                                <option value="" selected disabled>Select Here</option>
                                                                                <option <?php if((isset($data['f8_any_subsidies'])) && $data['f8_any_subsidies'] == 'yes'){ ?> selected <?php } ?> value="yes">Yes</option>
                                                                                <option <?php if((isset($data['f8_any_subsidies'])) && $data['f8_any_subsidies'] == 'no'){ ?> selected <?php } ?> value="no">No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>	<!-- Any subsidies received from the Government -->

																	<div id="div_any_subsidies_display" style="display:none;padding: 5px; border: 1px solid #d6d6d6; margin: 5px;">
                                                                        <div class="control-group">
                                                                            <label for="numberfield" class="control-label">Name of the Subsidy?</label>
                                                                            <div class="controls">
                                                                                <input  type="text" class="input-xlarge" placeholder="Name of the Subsidy?" name="f8_subsidy_name" id="f8_subsidy_name" value="<?php if((isset($data['f8_subsidy_name'])) && $data['f8_subsidy_name'] != ''){ echo $data['f8_subsidy_name']; } ?>" data-rule-required="true" > <!-- readonly -->
                                                                            </div>
                                                                        </div>	<!-- Name of the Subsidy? -->
                                                                   	</div>
                                                             
                                                                    <div class="control-group">
                                                                        <label for="text" class="control-label" style="margin-top:10px">Any Waivers received from the Government?<span style="color:#F00">*</span></label>
                                                                        <div class="controls">
                                                                            <select id="f8_any_loan_waivers" name="f8_any_loan_waivers" class="select2-me input-xlarge" data-rule-required="true">
                                                                                <option value="" selected disabled>Select Here</option>
                                                                                <option <?php if((isset($data['f8_any_loan_waivers'])) && $data['f8_any_loan_waivers'] == 'yes'){ ?> selected <?php } ?> value="yes">Yes</option>
                                                                                <option <?php if((isset($data['f8_any_loan_waivers'])) && $data['f8_any_loan_waivers'] == 'no'){ ?> selected <?php } ?> value="no">No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>	<!-- Any Waivers received from the Government -->
																	
                                                                    <div id="div_any_loan_waivers_display" style="display:none;padding: 5px; border: 1px solid #d6d6d6; margin: 5px;">
                                                                        <div class="control-group">
                                                                            <label for="numberfield" class="control-label">Name of the Waivers</label>
                                                                            <div class="controls">
                                                                                <input  type="text" class="input-xlarge" placeholder="Name of the Waivers" name="f8_waiver_name" id="f8_waiver_name" value="<?php if((isset($data['f8_waiver_name'])) && $data['f8_waiver_name'] != ''){ echo $data['f8_waiver_name']; } ?>" data-rule-required="true" > <!-- readonly -->
                                                                            </div>
                                                                        </div>	<!-- Name of the Waivers? -->
                                                                    </div>
                                                                    
                                                                    <div class="form-actions">
                                                                        <input type="reset" class="btn" value="Back" id="back">
                                                                        <input type="submit" class="btn btn-primary" value="Save" id="save">
                                                                    </div>	<!-- Submit and Reset Button -->
                                                                    
                                                                </div>
                                                                     
                                                           	</form>
                                                            <h1 id="financial_history_g_total">0</h1> 
                                                        </div>	<!-- Financial History -->
                                                    </div>	<!-- Main Forms -->
                                                </div>
                                            </div>
                                        </div>	<!-- LOAN [COMPLETE] -->
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

        <div class="modal fade" id="confirm_box_land" tabindex="-1" role="dialog">
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
        </div>	<!-- confirm_box_land -->

		<div class="modal fade" id="confirm_box_crop" tabindex="-1" role="dialog">
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
        </div>	<!-- confirm_box_crop -->
        
        <div class="modal fade" id="confirm_box_prev_crop" tabindex="-1" role="dialog">
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
                        <button type="button" class="btn btn-primary removePrevCrop_btn"  data-dismiss="modal">Yes</button>&nbsp;
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>	<!-- confirm_box_prev_crop -->
        
        <div class="modal fade" id="confirm_box_cur_crop" tabindex="-1" role="dialog">
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
                        <button type="button" class="btn btn-primary removeCurCrop_btn"  data-dismiss="modal">Yes</button>&nbsp;
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>	<!-- confirm_box_cur_crop -->
        
        <div class="modal fade" id="confirm_box_loan_frm1" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    	<h4 class="modal-title">Remove Confirmation</h4>
                    </div>
                    <div class="modal-body">
                    	<p >Are you sure want to remove this Loan part?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary removeLoanFrm1_btn"  data-dismiss="modal">Yes</button>&nbsp;
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>	<!-- confirm_box_loan_frm1 -->

        <script type="text/javascript">
			var spouse_g_total 				= 0;
			var applicant_knowledge_g_total	= 0;
			var phone_details_g_total		= 0;
			var family_details_g_total		= 0;
			var appliances_motors_g_total	= 0;
			var farm_land_details_g_total	= 0;
			var asset_details_g_total		= 0;
			var live_stock_g_total			= 0;
			var crop_cultivation_g_total	= 0;
			var prev_crop_cycle_g_total		= 0;
			var cur_crop_cycle_g_total		= 0;
			var financial_details_g_total	= 0;
			var financial_history_g_total	= 0;
			
			var contentCountLand 			= <?php echo $no_of_land; ?>;
			var contentCountCrop 			= <?php echo $no_of_crops; ?>;
			var contentCountPrevCrop 		= <?php echo $no_of_prev_crops; ?>;
			var contentCountCurCrop			= <?php echo $no_of_cur_crops; ?>;
			var contentCountLoanFrm1		= <?php echo $no_of_loan; ?>;
			
			$(document).ready(function()
			{
				
				
				// START : f3
				$('body').on('change','#f3_spouse_age, #f3_spouse_shg, #f3_spouse_occp, #f3_spouse_income', function(){
					calTotal_f3();
				});
	
				/*$('#f3_married').on('change', function(){
					
					if($(this).val() == 'yes'){
						$('#spouse_detail').show('swing');
					}
					else
					{
						$('#spouse_detail').hide('swing');
						$('#spouse_detail').find('input, select').val('').trigger('change');
					}
					calTotal_f3();
				});*/
				
				if($('#f3_married').val() == 'yes')
				{
					$('#spouse_detail').show('swing');
					calTotal_f3();
				}
				else
				{
					$('#spouse_detail').hide('swing');
					$('#spouse_detail').find('input, select').val('').trigger('change');
					calTotal_f3();	
				}
	
				$('#f3_spouse_mfi').on('change', function(){
					if($(this).val() == 'yes'){
						$('#microfinance').show('swing');
					}
					else
					{
						$('#microfinance').hide('swing');
						$('#microfinance').find('input, select').val('').trigger('change');
					}
					calTotal_f3();
				});
	
				if($('#f3_spouse_mfi').val() == 'yes')
				{
					$('#microfinance').show('swing');
				}
				else
				{
					$('#microfinance').find('input, select').val('');
				}
	
				$('#f3_affliation_status').on('change', function(){
					if($(this).val() == 'yes'){
						$('#div_affliation_display').show('swing');
					}
					else
					{
						$('#div_affliation_display').hide('swing');
						$('#div_affliation_display').find('input, select').val('');
					}
					calTotal_f3();	
				});
				
				if($('#f3_affliation_status').val() == 'yes')
				{
					$('#div_affliation_display').show('swing');	
				}
				else
				{
					$('#div_affliation_display').find('input, select').val('');
				}
	
				$('#f3_spouse_shg').on('change', function(){
					if($(this).val() == 'yes'){
						$('#shg_name').show('swing');
					}
					else
					{
						$('#shg_name').hide('swing');
						$('#shg_name').find('input, select').val('');
					}
					calTotal_f3();
				});
				
				if($('#f3_spouse_shg').val() == 'yes')
				{
					$('#shg_name').show('swing');
				}
				else
				{
					$('#shg_name').find('input, select').val('');
				}
	
	
				$('#f3_spouse_occp').on('change', function(){
					if($(this).val() == 'housewife'){
						$('#input_income').hide('swing').find('input').val('');
					}
					else
					{
						$('#input_income').show('swing');
						$('#input_income').val('');
					}
					calTotal_f3();
				});
				
				if($('#f3_spouse_occp').val() == 'other' || $('#f3_spouse_occp').val() == 'farmer')
				{
					$('#input_income').show('swing');	
				}
				else
				{
					$('#input_income').find('input, select').val('');
				}
				
				$('#f3_spouse_fname').val('<?= @$data['f3_spouse_fname']; ?>');
				$('#f3_spouse_age').val('<?= @$data['f3_spouse_age']; ?>');
				$('#f3_spouse_mobno').val('<?= @$data['f3_spouse_mobno']; ?>');
				$('#f3_spouse_adhno').val('<?= @$data['f3_spouse_adhno']; ?>');
				$('#f3_spouse_shg').val('<?= @$data['f3_spouse_shg']; ?>');
				$('#f3_spouse_shgname').val('<?= @$data['f3_spouse_shgname']; ?>');
				$('#f3_spouse_occp').val('<?= @$data['f3_spouse_occp']; ?>');
				$('#f3_spouse_mfi').val('<?= @$data['f3_spouse_mfi']; ?>');
				$('#f3_spouse_mfiname').val('<?= @$data['f3_spouse_mfiname']; ?>');
				$('#f3_spouse_mfiamount').val('<?= @$data['f3_spouse_mfiamount']; ?>');
				$('#f3_fpo_name').val('<?= @$data['f3_fpo_name']; ?>');
				$('#f3_bank_name').val('<?= @$data['f3_bank_name']; ?>');
				$('#f3_points').val('<?= @$data['f3_points']; ?>');
				
				if($('#f3_married').val() == 'yes'){
					$('#spouse_detail').show('swing');
				}
				
				if($('#f3_spouse_occp').val() == 'other' || $('#f3_spouse_occp').val() == 'farmer')
				{
					$('#input_income').show('swing');	
				}
				// END : f3
				
				// START : f2
				$('#f2_edudetail').on('change', function(){
					calTotal_f2();
				});
				
				$('#f2_proficiency').on('change', function(){
					calTotal_f2();
				});
				//$('#f2_participation').trigger('change');
				//$('#f2_typeprog').trigger('change');
				// END : f2
				
				// START : f5
				$('#f5_phonetype').on('change', function(){
					if($(this).val() == 'smartphone'){
						$('#div_smartphone_display').show('swing');
					}
					else
					{
						$('#div_smartphone_display').hide('swing');
						$('#div_smartphone_display').find('input, select').val('').trigger('change');
					}
					calTotal_f5();
				});
				
				$('#f5_any_one_have_smart_phone').on('change', function(){
					calTotal_f5();
				}); 
				
				$('#f5_datapack').on('change', function(){ 
					calTotal_f5();
				});
				
				$('#f5_farmapp').on('change', function(){
					calTotal_f5();
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
				// END : f5
				
				// START : f6
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
					calTotal_f6();
				});
				// END : f6
				
				// START : f7
				$('#f7_television').on('blur', function(){
					if($(this).val() != '' && $(this).val() != 'null')
					{
						calTotal_f7();
					}
				});
				
				$('#f7_refrigerator').on('blur', function(){
					if($(this).val() != '' && $(this).val() != 'null')
					{
						calTotal_f7();
					}
				});
				
				$('#f7_wmachine').on('blur', function(){
					if($(this).val() != '' && $(this).val() != 'null')
					{
						calTotal_f7();
					}
				});
				   
				$('#f7_mixer').on('blur', function(){
					if($(this).val() != '' && $(this).val() != 'null')
					{
						calTotal_f7();
					}
				});
				
				$('#f7_stove').on('blur', function(){
					if($(this).val() != '' && $(this).val() != 'null')
					{
						calTotal_f7();
					}
				});
				
				$('#f7_bicycle').on('blur', function(){
					if($(this).val() != '' && $(this).val() != 'null')
					{
						calTotal_f7();
					}
				});
				   
				$('#f7_ccylinder').on('blur', function(){
					if($(this).val() != '' && $(this).val() != 'null')
					{
						calTotal_f7();
					}
				});
				
				$('#f7_fans').on('blur', function(){
					if($(this).val() != '' && $(this).val() != 'null')
					{
						calTotal_f7();
					}
				});
				
				$('#f7_motorcycle').on('blur', function(){
					if($(this).val() != '' && $(this).val() != 'null')
					{
						calTotal_f7();
					}
				});
				
				$('#f7_car').on('blur', function(){
					if($(this).val() != '' && $(this).val() != 'null')
					{
						calTotal_f7();
					}
				});
				// END : f7
				
				// START : f12
				$('#f12_any_other_assets').on('change', function(){
					if($(this).val() == 'yes'){
						$('#div_any_other_assets_display').show('swing');
					}
					else
					{
						$('#div_any_other_assets_display').hide('swing');
						$('#div_any_other_assets_display').find('input, select').val('').trigger('change');
					}
					calTotal_f12();
				});
				// END : f12
				
				// START : f13
				$('#f13_dairy_cattle').on('blur', function(){
					if($(this).val() != '' && $(this).val() != 'null')
					{
						calTotal_f13();
					}
				});
				
				$('#f13_draft_cattle').on('blur', function(){
					if($(this).val() != '' && $(this).val() != 'null')
					{
						calTotal_f13();
					}
				});
				
				$('#f13_buffalo').on('blur', function(){
					if($(this).val() != '' && $(this).val() != 'null')
					{
						calTotal_f13();
					}
				});
				   
				$('#f13_ox').on('blur', function(){
					if($(this).val() != '' && $(this).val() != 'null')
					{
						calTotal_f13();
					}
				});
				
				$('#f13_sheep').on('blur', function(){
					if($(this).val() != '' && $(this).val() != 'null')
					{
						calTotal_f13();
					}
				});
				
				$('#f13_goat').on('blur', function(){
					if($(this).val() != '' && $(this).val() != 'null')
					{
						calTotal_f13();
					}
				});
				   
				$('#f13_pig').on('blur', function(){
					if($(this).val() != '' && $(this).val() != 'null')
					{
						calTotal_f13();
					}
				});
				
				$('#f13_poultry').on('blur', function(){
					if($(this).val() != '' && $(this).val() != 'null')
					{
						calTotal_f13();
					}
				});
				
				$('#f13_livestock_income').on('blur', function(){
					if($(this).val() != '' && $(this).val() != 'null')
					{
						calTotal_f13();
					}
				});
				// END : f13
				
				$('#f5_phonetype').val('<?= @$data['f5_phonetype']; ?>');
				$('#f5_servpro').val('<?= @$data['f5_servpro']; ?>');
				$('#f5_network').val('<?= @$data['f5_network']; ?>');
				$('#f5_datapack').val('<?= @$data['f5_datapack']; ?>');
				$('#f5_datapackname').val('<?= @$data['f5_datapackname']; ?>');
				$('#f5_appuse').val('<?= @$data['f5_appuse']; ?>');
				$('#f5_farmapp').val('<?= @$data['f5_farmapp']; ?>');
				$('#f5_any_one_have_smart_phone').val('<?= @$data['f5_any_one_have_smart_phone']; ?>');
				$('#f5_app_name').val('<?= @$data['f5_app_name']; ?>');
				//$('input, select').trigger('change');
				
				$('#f6_jointfamily').val('<?= @$data['f6_jointfamily']; ?>');
				$('#f6_members').val('<?= @$data['f6_members']; ?>');
				$('#f6_children').val('<?= @$data['f6_children']; ?>');
				$('#f6_smartuse').val('<?=  @$data['f6_smartuse']; ?>');
				//$('#f6_children').trigger('change');
				
				$('#f12_machinery').val('<?= @$data['f12_machinery']; ?>');
				$('#f12_vehicle').val('<?= @$data['f12_vehicle']; ?>');	
				$('#f12_total_val_of_vehical').val('<?= @$data['f12_total_val_of_vehical']; ?>');	
				$('#f12_total_val_of_machinery').val('<?= @$data['f12_total_val_of_machinery']; ?>');	
				$('#f12_any_other_assets').val('<?= @$data['f12_any_other_assets']; ?>');		
				$('#f12_name_of_other_assets').val('<?= @$data['f12_name_of_other_assets']; ?>');
				$('#f12_mention_value_of_assets').val('<?= @$data['f12_mention_value_of_assets']; ?>');
				
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
				
				
				if($('#f12_any_other_assets').val() == 'yes')
				{
					$('#div_any_other_assets_display').show('swing');
				}
				else
				{
					$('#div_any_other_assets_display').find('input, select').val('');
				}
	
				$('#spouse_detail').find('input, select').trigger('change');
				
				
				$('body').on('change','#f13_dairy_cattle, #f13_donkeys,#f13_draft_cattle', function(){
					calTotal_f13();
				});
				
				$('body').on('change','#f13_poultry, #f13_pig,#f13_goat', function(){
					calTotal_f13();
				});
				
				$('body').on('change','#f13_sheep, #f13_ox, #f13_buffalo,f13_livestock_count', function(){
					calTotal_f13();
				});
				
				$('.addCrop').click(function(){
					appendContent();
				});
	
				$('.removeCrop_btn').click(function(){
					removeContent();
				});
				
				$('.addPrevCrop').click(function(){
					appendPrevCropContent();
				});
	
				$('.removePrevCrop_btn').click(function(){
					removePrevCropContent();
				});
				
				$('.addCurCrop').click(function(){
					appendCurCropContent();
				});
	
				$('.removeCurCrop_btn').click(function(){
					removeCurCropContent();
				});
				
				
				$('.addLoanFrm1').click(function(){
					appendLoanFrm1Content();
				});
	
				$('.removeLoanFrm1_btn').click(function(){
					removeLoanFrm1Content();
				});
				
				if($('#f8_loan_taken').val() == 'yes')
				{
					$('#loan_taken').show('swing');
				}
				else
				{
					$('#loan_taken').hide('swing');
					$('#loan_taken').find('input, select').val('');
				}
				
				if($('#f8_any_insurance').val() == 'yes')
				{
					$('#div_any_insurance_display').show('swing');
				}
				else
				{
					$('#div_any_insurance_display').hide('swing');
					$('#div_any_insurance_display').find('input, select').val('');
				}
				
				if($('#f8_any_subsidies').val() == 'yes')
				{
					$('#div_any_subsidies_display').show('swing');
				}
				else
				{
					$('#div_any_subsidies_display').hide('swing');
					$('#div_any_subsidies_display').find('input, select').val('');
				}
				
				if($('#f8_any_loan_waivers').val() == 'yes')
				{
					$('#div_any_loan_waivers_display').show('swing');
				}
				else
				{
					$('#div_any_loan_waivers_display').hide('swing');
					$('#div_any_loan_waivers_display').find('input, select').val('');
				}
				
				$('#f8_loan_borrowed_from').on('change', function(){
					calTotal_f8();
				});
				
				$('#f8_other_insurance').on('change', function(){
					calTotal_f8();
				});
				
				$('#f8_any_insurance').on('change', function(){
					
					if($(this).val() == 'yes')
					{
						$('#div_any_insurance_display').show('swing');
					}
					else
					{
						$('#div_any_insurance_display').hide('swing');
					}
					calTotal_f8();
				});
				
				$('#f8_any_subsidies').on('change', function(){
					
					if($(this).val() == 'yes')
					{
						$('#div_any_subsidies_display').show('swing');
					}
					else
					{
						$('#div_any_subsidies_display').hide('swing');
					}
				});
				
				$('#f8_any_loan_waivers').on('change', function(){
					
					if($(this).val() == 'yes')
					{
						$('#div_any_loan_waivers_display').show('swing');
					}
					else
					{
						$('#div_any_loan_waivers_display').hide('swing');
					}
				});
				/*calTotal_f2();
				calTotal_f3();
				calTotal_f5();
				calTotal_f6();
				calTotal_f7();
				calTotal_f8();
				calTotal_f9();
				calTotal_f10();
				calTotal_f11();
				calTotal_f12();
				calTotal_f13();
				calTotal_f14();*/
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
			
			function convertAppliancesToPoint(x, typeVal)
			{
				
				if(typeVal == 1)
				{
					if(x > 0)
					{
					  return 4;
					}
					else
					{
					  return 0;
					}
				}
				else if(typeVal == 2)
				{
					if(x > 0)
					{
					  return 8;
					}
					else
					{
					  return 0;
					}
				}
				else
				{
					if(x > 0)
					{
					  return 10;
					}
					else
					{
					  return 0;
					}	
				}
			}
			
			function convertAssetsToPoint(x)
			{
				if(x >= 0 && x <= 50000)
				{
					return 2;
				}
				else if(x >= 50001 && x <= 100000)
				{
				  return 4;
				}
				else if(x >= 100001 && x <= 500000)
				{
				  return 6;
				}
				else if(x >= 500001 && x <= 1000000)
				{
				  return 8;
				}
				else if(x >= 1000001)
				{
				  return 10;
				}
				else
				{
				  return 0;
				}	
			}
			
			function convertLiveAssetsToPoints(x, val)
			{
				if(val == 'dairy_cattle' && x != 0)
				{
					return 7;
				}
				if(val == 'donkeys' && x != 0)
				{
					return 3;
				}
				if(val == 'draft_cattle' && x != 0)
				{
					return 7;
				}
				if(val == 'poultry' && x != 0)
				{
					return 7;
				}
				if(val == 'pig' && x != 0)
				{
					return 6;
				}
				if(val == 'goat' && x != 0)
				{
					return 6;
				}
				if(val == 'sheep' && x != 0)
				{
					return 6;
				}
				if(val == 'ox' && x != 0)
				{
					return 4;
				}
				else if(val == 'buffalo' && x != 0)
				{
					return 7;	
				}
				else
				{
					return 0;	
				}
			}
			
			function convertLiveStockCountToPoints(x)
			{
				if(x >= 0 && x <= 50)
				{
					return 4;
				}
				else if(x >= 51 && x <= 100)
				{
				  return 6;
				}
				else if(x >= 101)
				{
				  return 10;
				}
				else
				{
				  return 0;
				}	
			}
			
			function convertLiveStockIncomeToPoints(x)
			{
				if(x >= 0 && x <= 5000)
				{
					return 4;
				}
				else if(x >= 5001 && x <= 20000)
				{
				  return 6;
				}
				else if(x >= 20001 && x <= 50000)
				{
				  return 8;
				}
				else if(x >= 50001)
				{
				  return 10;
				}
				else
				{
				  return 0;
				}	
			}
			
			function cal_land_size_pt(x)
			{
				if(x > 0 && x <= 3)
				{
				  return 5;
				}
				else if(x >= 4 && x <= 6)
				{
				  return 7;
				}
				else if(x >= 7 && x <= 10)
				{
				  return 8;
				}
				else if(x >= 11 && x <= 15)
				{
				  return 9;
				}
				else if(x >= 16 && x <= 20)
				{
				  return 10;
				}
				else if(x >= 21)
				{
				  return 10;
				}
				else
				{
					return 0;
				}
			}
			
			function convertTonnesToPoint(x)
			{
				if(x >= 0 && x <= 20)
				{
				  return 5;
				}
				else if(x >= 21 && x <= 40)
				{
				  return 6;
				}
				else if(x >= 41 && x <= 60)
				{
				  return 7;
				}
				else if(x >= 61 && x <= 80)
				{
				  return 8;
				}
				else if(x >= 81 && x <= 100)
				{
				  return 9;
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
			
			function convertIncomeToPointF10(x)
			{
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
			
			function convertIncomeToPointF11(x)
			{
				if(x > 0 && x <= 2500)
				{
				  return 4;
				}
				else if(x >= 2501 && x <= 5000)
				{
				  return 6;
				}
				else if(x >= 5001 && x <= 10000)
				{
				  return 7;
				}
				else if(x >= 10001 && x <= 25000)
				{
				  return 8;
				}
				else if(x >= 25001 && x <= 50000)
				{
				  return 9;
				}
				else if(x >= 50001)
				{
				  return 10;
				}
				else
				{
				  return 0;
				}
			}
			
			function convertAchievedToPoint(x)
			{
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
				else if(x >= 7)
				{
				  return 10;
				}
				else
				{
				  return 0;
				}
			}
			
			function convertLoanAmountToPointF14(x)
			{
				
				if(x > 0 && x <= 5000)
				{
				  return 10;
				}
				else if(x >= 5001 && x <= 15000)
				{
				  return 8;
				}
				else if(x >= 15001 && x <= 30000)
				{
				  return 6;
				}
				else if(x >= 30001 && x <= 45000)
				{
				  return 4;
				}
				else if(x >= 45001)
				{
				  return 2;
				}
				else
				{
				  return 0;
				}
			
			}
			
			function calTotal_f2()
			{
				// START : f2
				var a = parseInt($('option:selected','#f2_proficiency').attr('point')) || 0;
				var b = parseInt($('option:selected','#f2_edudetail').attr('point')) || 0;
				var c = parseInt($('option:selected','#f2_participation').attr('point')) || 0;
				applicant_knowledge_g_total = a + b + c;
				
				//alert(applicant_knowledge_g_total +'='+ a +'<>'+ b +'<>'+ c);
				
				document.getElementById('applicant_knowledge_g_total').innerHTML=applicant_knowledge_g_total;
				
				var f2_pt = applicant_knowledge_g_total/3;
				f2_pt     = f2_pt.toFixed(2);
				$('#f2_points').val(f2_pt);
				
				$('#f2_pt').html(f2_pt);
				// END : f2
			}
			
			function calTotal_f3()
			{
				// START : f3
				//var f3_married	= '<?php //echo $married_status; ?>';
				var f3_married	= $('#f3_married').val() || 'yes';
				var married	= 0;
				if(f3_married == 'yes')
				{
					married 	= 10;
				}
				else if(f3_married == 'no')
				{
					married 	= 2;
				}
				
				//var married	= parseInt($('option:selected','#f3_married').attr('point')) || 0;
				
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
						var f3_spouse_mfi	= 10
						var mfiamount	= parseInt($('#f3_spouse_mfiamount').val()) || 0;
						mfiamount	= convertMfiamountToPoint(mfiamount);
						spouse_g_total = married + shg + occp + income + affliation + mfiamount + f3_spouse_mfi;
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
				
				if(f3_married == 'yes')
				{
					document.getElementById('spouse_g_total').innerHTML = spouse_g_total;
					var no_of_point	= 5;
					
					if($('#f3_spouse_occp').val() != 'housewife')
					{
						no_of_point	+= 1;
					}
					
					if($('#f3_spouse_mfi').val() == 'yes')
					{
						no_of_point	+= 1;
					}
					
					var f3_pt = spouse_g_total/no_of_point;
					
					f3_pt     = f3_pt.toFixed(2);
					$('#f3_points').val(f3_pt);
					$('#f3_pt').html(f3_pt);
				}
				else if(f3_married == 'no')
				{
					document.getElementById('spouse_g_total').innerHTML = 0;
					$('#f3_points').val(0);
					$('#f3_pt').html(0);	
				}
				// END : f3
			}
			
			function calTotal_f5()
			{
				// START : f5
				var phoneType		= parseInt($('option:selected','#f5_phonetype').attr('point')) || 0;
				var anyOtherSPUser	= parseInt($('option:selected','#f5_any_one_have_smart_phone').attr('point')) || 0;
				var dataPack		= parseInt($('option:selected','#f5_datapack').attr('point')) || 0;
				var farmApp			= parseInt($('option:selected','#f5_farmapp').attr('point')) || 0;
				
				phone_details_g_total	= phoneType + anyOtherSPUser + dataPack + farmApp;
				//alert(phone_details_g_total	+' = '+ phoneType +'<>'+ anyOtherSPUser +'<>'+ dataPack +'<>'+ farmApp);
				document.getElementById('phone_details_g_total').innerHTML=phone_details_g_total;
				
				var f5_pt = phone_details_g_total/4;
				f5_pt     = f5_pt.toFixed(2);
				$('#f5_points').val(f5_pt);
				$('#f5_pt').html(f5_pt);
				// END : f5
			}
			
			function calTotal_f6()
			{
				// START : f6
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
					f6_pt = family_details_g_total/2;
				}
	
				f6_pt     = f6_pt.toFixed(2);
				$('#f6_points').val(f6_pt);
				$('#f6_pt').html(f6_pt);
				// END : f6
			}
			
			function calTotal_f7()
			{
				// START : f7
				var reg_resi_points	= "<?php echo $data['f7_reg_points']; ?>";
				
				var f7_television	= parseInt($('#f7_television').val()) || 0;
				var f7_refrigerator	= parseInt($('#f7_refrigerator').val()) || 0;
				var f7_wmachine 	= parseInt($('#f7_wmachine').val()) || 0;
				var f7_mixer 		= parseInt($('#f7_mixer').val()) || 0;
				var f7_stove 		= parseInt($('#f7_stove').val()) || 0;
				var f7_bicycle 		= parseInt($('#f7_bicycle').val()) || 0;
				var f7_ccylinder 	= parseInt($('#f7_ccylinder').val()) || 0;
				var f7_fans 		= parseInt($('#f7_fans').val()) || 0;
				var f7_motorcycle 	= parseInt($('#f7_motorcycle').val()) || 0;
				var f7_car			= parseInt($('#f7_car').val()) || 0;
				
				f7_television 		= convertAppliancesToPoint(f7_television, 1);
				f7_refrigerator 	= convertAppliancesToPoint(f7_refrigerator, 1);
				f7_wmachine 		= convertAppliancesToPoint(f7_wmachine, 1);
				f7_mixer 			= convertAppliancesToPoint(f7_mixer, 1);
				f7_stove 			= convertAppliancesToPoint(f7_stove, 1);
				f7_bicycle 			= convertAppliancesToPoint(f7_bicycle, 1);
				f7_ccylinder 		= convertAppliancesToPoint(f7_ccylinder, 1);
				f7_fans 			= convertAppliancesToPoint(f7_fans, 1);
				f7_motorcycle 		= convertAppliancesToPoint(f7_motorcycle, 2);
				f7_car				= convertAppliancesToPoint(f7_car, 3);
				
				appliances_motors_g_total	= f7_television + f7_refrigerator + f7_wmachine + f7_mixer + f7_stove + f7_bicycle + f7_ccylinder + f7_fans + f7_motorcycle + f7_car;
				
				document.getElementById('appliances_motors_g_total').innerHTML=appliances_motors_g_total;
				var f7_pt = appliances_motors_g_total/10;
				f7_pt     = f7_pt.toFixed(2);
				$('#f7_points').val(f7_pt);
				var display_f7_pts	= parseInt(reg_resi_points) + parseInt(f7_pt);
				$('#f7_pt').html(display_f7_pts);
				// END : f7
			}
			
			function calTotal_f8()
			{
				// START : f8 [Loan Frm 1]
				
				f8_loan_taken	= parseInt($('option:selected','#f8_loan_taken').attr('point')) || 0;
				
				financial_details_g_total = f8_loan_taken;
				
				document.getElementById('financial_details_g_total').innerHTML=financial_details_g_total;
				f8_pt     = financial_details_g_total/(contentCountLoanFrm1*1)
				f8_pt     = f8_pt.toFixed(2);
				$('#f8_points').val(f8_pt);
				$('#f8_pt').html(f8_pt);
				
				$('#num_of_loan').val(contentCountLoanFrm1);
				
				if(contentCountLoanFrm1 == 1)
				{
					$('.removeLoanFrm1').hide('swing');
				}
				// END : f8 [Loan Frm 1]
				
				// START : f8 [Loan frm 2]
				var divided_by	= 2;
				var f8_other_insurance	= 0;
				var f8_loan_borrowed_from 	= parseInt($('option:selected','#f8_loan_borrowed_from').attr('point')) || 0;
				var f8_any_insurance 		= parseInt($('option:selected','#f8_any_insurance').attr('point')) || 0;
				
				f8_any_insurance_val	= $('#f8_any_insurance').val();
				
				if(f8_any_insurance_val == 'yes')
				{
					f8_other_insurance 		= parseInt($('option:selected','#f8_other_insurance').attr('point')) || 0;		
					divided_by	+= 1;
				}
				
				financial_history_g_total	= f8_loan_borrowed_from + f8_any_insurance + f8_other_insurance;
				
				document.getElementById('financial_history_g_total').innerHTML = financial_history_g_total;
				
				var f8_pt_fh = financial_history_g_total/divided_by;
				f8_pt_fh     = f8_pt_fh.toFixed(2);
				$('#f8_financial_history_points').val(f8_pt_fh);
				$('#f8_pt_fh').html(f8_pt_fh); 
				// END : f8 [Loan frm 2]
			}
			
			function calTotal_f9()
			{
				// START : f9
				var no_of_points        	= 5;
				var f9_land_size_tpt		= 0;
				var f9_owner_tpt			= 0;
				var f9_soil_tested_pt   	= 0;
				var f9_soil_type_tpt    	= 0;
				var f9_source_of_water_tpt	= 0;
			
				for(var i=1; i <= contentCountLand; i++)
				{
					var f9_land_size     =  $('#f9_land_size'+i).val() || 0;
					var f9_land_size_pt  = cal_land_size_pt(f9_land_size);
					f9_land_size_tpt  += f9_land_size_pt;
					
					var f9_owner	= parseInt($('option:selected','#f9_owner'+i).attr('point')) || 0;
					f9_owner_tpt	+= f9_owner;
					
					var f9_soil_tested  = $('#f9_soil_tested'+i).val() || 'no';
					f9_soil_tested_pt 	+= parseInt($('option:selected','#f9_soil_tested'+i).attr('point')) || 0;
					
					var f9_soil_type 	= parseInt($('option:selected','#f9_soil_type'+i).attr('point')) || 0;
					f9_soil_type_tpt    += f9_soil_type ;
					
					var f9_source_of_water	= parseInt($('option:selected','#f9_source_of_water'+i).attr('point')) || 0;
					f9_source_of_water_tpt	+= f9_source_of_water; 
				}
				
				farm_land_details_g_total	= parseInt(f9_land_size_tpt) + parseInt(f9_soil_tested_pt) + parseInt(f9_soil_type_tpt) + parseInt(f9_owner_tpt) + parseInt(f9_source_of_water_tpt);
				
				//alert(farm_land_details_g_total);
				
				document.getElementById('farm_land_details_g_total').innerHTML = farm_land_details_g_total;
				
				//alert(no_of_points+'*'+contentCountLand);
				
				var f9_pt = farm_land_details_g_total/(no_of_points*contentCountLand) ;
				f9_pt     = f9_pt.toFixed(2);
				$('#f9_points').val(f9_pt);
				$('#f9_pt').html(f9_pt);
				$('#no_of_land').val(contentCountLand);
				
				/*if(contentCountLand > 1)
				{
					$('#removeLandType').show('swing');
				}*/
				
				if(contentCountLand == 1)
				{
				   $('#removeLandType').hide('swing');
				}
				else
				{
					$('#removeLandType').show('swing');
				}
				
				// END : f9
			}
			
			function calTotal_f10()
			{
				// START : f10
				var cultivating = 0;
				var stage       = 0;
				var diseases	= 0;
				var pest		= 0;
				var tonnes		= 0;
				var price       = 0;
				var income      = 0;
				var f10_filt_type	= 0;
				
				for(var i=1; i<=contentCountCrop; i++)
				{
					pnts = 0;
					cultivating 		+= parseInt($('option:selected','#f10_cultivating'+i).attr('point')) || 0;
					f10_filt_type 		+= parseInt($('option:selected','#f10_filt_type'+i).attr('point')) || 0;
					
					stage       		+= parseInt($('option:selected','#f10_stage'+i).attr('point')) || 0;
					diseases    		+= parseInt($('option:selected','#f10_diseases'+i).attr('point')) || 0;
					pest        		+= parseInt($('option:selected','#f10_pest'+i).attr('point')) || 0;
					tonnes_pt  			= $('#f10_expected'+i).val() ? (parseInt($('#f10_expected'+i).val()) || 0) : undefined;
					//price_pt    		= parseInt($('#f10_expectedprice'+i).val()) || 0;
					//income_pt  		= parseInt($('#f10_expectedincome'+i).val()) || 0;
					price_pt	= 0;
					income_pt	= 0;
	
					tonnes	+= convertTonnesToPoint(tonnes_pt);
					price 	+= convertPriceToPoint(price_pt);
					income 	+= convertIncomeToPointF10(income_pt);
				}
				
				crop_cultivation_g_total = cultivating + stage + diseases + pest + tonnes + price + income + f10_filt_type;
				
				//alert(cultivating +'<>'+ stage +'<>'+ diseases +'<>'+ pest +'<>'+ tonnes +'<>'+ price +'<>'+ income +'<>'+ f10_filt_type);
				
				document.getElementById('crop_cultivation_g_total').innerHTML=crop_cultivation_g_total;
				crop_cultivation_g_total =(crop_cultivation_g_total/(contentCountCrop*5));
				
				f10_pt     = crop_cultivation_g_total.toFixed(2);
				
				$('#f10_points').val(f10_pt);
				$('#f10_pt').html(f10_pt);
				$('#no_of_crops').val(contentCountCrop);
	
				if(contentCountCrop==1)
				{
				   $('.removeCrop').hide('swing');
				}
				else
				{
					$('.removeCrop').show('swing');
				}
				// END : f10
			}
			
			function calTotal_f11()
			{
				// START : f11
				var income 		= 0;
				var diseases    = 0;
				var fertilizers = 0;
				var achieved 	= 0;
				var f11_damaged_prev_crop	= 0;
				
				for(var i=1; i <= contentCountPrevCrop; i++)
				{
					income_pt 	= parseInt($('#f11_income'+i).val()) || 0;
					diseases   	+= parseInt($('option:selected','#f11_diseases'+i).attr('point')) || 0;
					fertilizers += parseInt($('option:selected','#f11_fertilizers'+i).attr('point')) || 0;
					f11_damaged_prev_crop += parseInt($('option:selected','#f11_damaged_prev_crop'+i).attr('point')) || 0;
					//achieved_pt = parseInt($('#f11_achieved'+i).val()) || 0;
					
					//achieved 	+= convertAchievedToPoint(achieved_pt);
					income   	+= convertIncomeToPointF11(income_pt);
				}
					
				prev_crop_cycle_g_total = diseases + fertilizers + achieved + income + f11_damaged_prev_crop;
				
				document.getElementById('prev_crop_cycle_g_total').innerHTML=prev_crop_cycle_g_total;
				
				f11_pt     = prev_crop_cycle_g_total/(contentCountPrevCrop * 4)
				f11_pt     = f11_pt.toFixed(2);
				$('#f11_points').val(f11_pt);
				$('#f11_pt').html(f11_pt);
				
				$('#no_of_yield').val(contentCountPrevCrop);
				/*if(contentCountPrevCrop == 1)
				{
					$('.removePrevCrop').hide('swing');
				}*/
				
				if(contentCountPrevCrop==1)
				{
				   $('.removePrevCrop').hide('swing');
				}
				else
				{
					$('.removePrevCrop').show('swing');
				}
				// END : f11
			}
			
			function calTotal_f12()
			{
				// START : f12
				var divided_by	= 4;
				var f12_mention_value_of_assets	= 0;
				
				var f12_vehicle					= parseInt($('option:selected','#f12_vehicle').attr('point')) || 0;
				var f12_total_val_of_vehical	= $('#f12_total_val_of_vehical').val();
				f12_total_val_of_vehical		= convertAssetsToPoint(f12_total_val_of_vehical);
				var f12_machinery				= parseInt($('option:selected','#f12_machinery').attr('point')) || 0;
				var f12_total_val_of_machinery	= $('#f12_total_val_of_machinery').val();
				f12_total_val_of_machinery		= convertAssetsToPoint(f12_total_val_of_machinery);
				
				var f12_any_other_assets	= $('#f12_any_other_assets').val();
				//alert(f12_any_other_assets);
				if(f12_any_other_assets == 'yes')
				{
					f12_mention_value_of_assets	= $('#f12_mention_value_of_assets').val();
					f12_mention_value_of_assets		= convertAssetsToPoint(f12_mention_value_of_assets);	
					divided_by	= 5;
				}
				
				asset_details_g_total	= f12_vehicle + f12_total_val_of_vehical + f12_machinery + f12_total_val_of_machinery + f12_mention_value_of_assets;
				
				//alert(asset_details_g_total	+'='+ f12_vehicle +'<>'+ f12_total_val_of_vehical +'<>'+ f12_machinery +'<>'+ f12_total_val_of_machinery +'<>'+ f12_mention_value_of_assets);
				
				document.getElementById('asset_details_g_total').innerHTML = asset_details_g_total;
				var f12_pt = asset_details_g_total/divided_by;
				f12_pt     = f12_pt.toFixed(2);
				$('#f12_points').val(f12_pt);
				$('#f12_pt').html(f12_pt);
				// END : f12
			}
			
			function calTotal_f13()
			{
				// START : f13
				f13_dairy_cattle = parseInt($('#f13_dairy_cattle').val() || '0');
				f13_donkeys      = parseInt($('#f13_donkeys').val()|| '0');
				f13_draft_cattle = parseInt($('#f13_draft_cattle').val()|| '0');
				f13_poultry		 = parseInt($('#f13_poultry').val()|| '0');
				f13_pig 		 = parseInt($('#f13_pig').val()|| '0');
				f13_goat  		 = parseInt($('#f13_goat').val()|| '0');
				f13_sheep		 = parseInt($('#f13_sheep').val()|| '0');
				f13_ox			 = parseInt($('#f13_ox').val()|| '0');
				f13_buffalo 	 = parseInt($('#f13_buffalo').val()|| '0');
				
				total_p          = f13_dairy_cattle + f13_donkeys + f13_draft_cattle + f13_poultry +f13_pig +f13_goat +f13_sheep + f13_ox +f13_buffalo;
				//alert(total_p +'='+ f13_dairy_cattle +'<>'+ f13_donkeys +'<>'+ f13_draft_cattle +'<>'+ f13_poultry +'<>'+ f13_pig +'<>'+ f13_goat +'<>'+ f13_sheep +'<>'+ f13_ox +'<>'+ f13_buffalo);
				if(total_p == 0)
				{
					$('#livestock_count').hide('wing');
					$('#f13_livestock_count').val("");
					$('#f13_livestock_income').val("");
				}
				else
				{
					$('#livestock_count').show('wing');
					$('#f13_livestock_count').val(total_p);
				}
				
				var f13_dairy_cattle_pt	= convertLiveAssetsToPoints(f13_dairy_cattle, 'dairy_cattle');
				var f13_donkeys_pt      = convertLiveAssetsToPoints(f13_donkeys, 'donkeys');
				var f13_draft_cattle_pt = convertLiveAssetsToPoints(f13_draft_cattle, 'draft_cattle');
				var f13_poultry_pt		= convertLiveAssetsToPoints(f13_poultry, 'poultry');
				var f13_pig_pt 		 	= convertLiveAssetsToPoints(f13_pig, 'pig');
				var f13_goat_pt  		= convertLiveAssetsToPoints(f13_goat, 'goat');
				var f13_sheep_pt		= convertLiveAssetsToPoints(f13_sheep, 'sheep');
				var f13_ox_pt			= convertLiveAssetsToPoints(f13_ox, 'ox');
				var f13_buffalo_pt		= convertLiveAssetsToPoints(f13_buffalo, 'buffalo');
				
				var f13_livestock_count	= $('#f13_livestock_count').val();
				var f13_livestock_count_pt	= convertLiveStockCountToPoints(f13_livestock_count);
				
				var f13_livestock_income	= $('#f13_livestock_income').val();
				var f13_livestock_income_pt	= convertLiveStockIncomeToPoints(f13_livestock_income);
				
				live_stock_g_total	= f13_dairy_cattle_pt + f13_donkeys_pt + f13_draft_cattle_pt + f13_poultry_pt + f13_pig_pt + f13_goat_pt + f13_sheep_pt + f13_ox_pt + f13_buffalo_pt + f13_livestock_count_pt + f13_livestock_income_pt;
				
				//alert(live_stock_g_total +'='+ f13_dairy_cattle_pt +'<>'+ f13_donkeys_pt +'<>'+ f13_draft_cattle_pt +'<>'+ f13_poultry_pt +'<>'+ f13_pig_pt +'<>'+ f13_goat_pt +'<>'+ f13_sheep_pt +'<>'+ f13_ox_pt +'<>'+ f13_buffalo_pt +'<>'+ f13_livestock_count_pt +'<>'+ f13_livestock_income_pt);
				
				document.getElementById('live_stock_g_total').innerHTML = live_stock_g_total;
				var f13_pt = live_stock_g_total/3;
				f13_pt     = f13_pt.toFixed(2);
				$('#f13_points').val(f13_pt);
				$('#f13_pt').html(f13_pt);
				// END : f13
			}
			
			function calTotal_f14()
			{
				// START : f14
				var f14_seed_type		= 0;
				var f14_loan_taken		= 0;
				var f14_loan_amount		= 0;
				var f14_loan_amount_pt		= 0;
				var f14_borrow_loan_from	= 0;
				var f14_water_source_type	= 0;
				var divided_by	= 3;
				
				for(var i=1; i <= contentCountCurCrop; i++)
				{
					f14_seed_type   		+= parseInt($('option:selected','#f14_seed_type'+i).attr('point')) || 0;
					f14_loan_taken   		+= parseInt($('option:selected','#f14_loan_taken'+i).attr('point')) || 0;
					alert(f14_loan_taken);
					f14_loan_taken_val	= $('#f14_loan_taken'+i).val();
					
					if(f14_loan_taken_val == 'yes')
					{
						f14_loan_amount 		= parseInt($('#f14_loan_amount'+i).val()) || 0;
						f14_loan_amount_pt   	+= convertLoanAmountToPointF14(f14_loan_amount);
						
						f14_borrow_loan_from	+= parseInt($('option:selected','#f14_borrow_loan_from'+i).attr('point')) || 0;	
						
						divided_by	= 5;
					}
					
					f14_water_source_type	+= parseInt($('option:selected','#f14_water_source_type'+i).attr('point')) || 0;
					
				}
					
				cur_crop_cycle_g_total = f14_seed_type + f14_loan_taken + f14_borrow_loan_from + f14_water_source_type + f14_loan_amount_pt;
				
				//alert(cur_crop_cycle_g_total +'='+ f14_seed_type +'<>'+ f14_loan_taken +'<>'+ f14_borrow_loan_from +'<>'+ f14_water_source_type +'<>'+ f14_loan_amount_pt);
				
				document.getElementById('cur_crop_cycle_g_total').innerHTML=cur_crop_cycle_g_total;
				f14_pt     = cur_crop_cycle_g_total/(contentCountCurCrop * divided_by)
				f14_pt     = f14_pt.toFixed(2);
				$('#f14_points').val(f14_pt);
				$('#f14_pt').html(f14_pt);
				
				$('#no_of_cur_crop_forecast').val(contentCountCurCrop);
				if(contentCountCurCrop == 1)
				{
					$('.removeCurCrop').hide('swing');
				}
				// END : f14
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
			
			$('#frm_appliances_motors').on('submit', function(e) 
			{
				e.preventDefault();
				if ($('#frm_appliances_motors').valid())
				{
					loading_show();	
					$.ajax({
						type: "POST",
						url: "action_pages/action_frm7.php",
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
			
			$('#frm_farm_land_details').on('submit', function(e) 
			{
				e.preventDefault();
				if ($('#frm_farm_land_details').valid())
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
			
			$('#frm_asset_details').on('submit', function(e) 
			{
				e.preventDefault();
				if ($('#frm_asset_details').valid())
				{
					loading_show();	
					$.ajax({
							type: "POST",
							url: "action_pages/action_frm12.php",
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
		
			$('#frm_live_stock').on('submit', function(e) 
			{
				e.preventDefault();
				if ($('#frm_live_stock').valid())
				{
					loading_show();	
					$.ajax({
							type: "POST",
							url: "action_pages/action_frm13.php",
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
			
			$('#frm_crop_cultivation').on('submit', function(e) 
			{
				e.preventDefault();
				if ($('#frm_crop_cultivation').valid())
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
			
			$('#frm_prev_crop_cycle').on('submit', function(e) 
			{
				e.preventDefault();
				if ($('#frm_prev_crop_cycle').valid())
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
			
			$('#frm_cur_crop_cycle').on('submit', function(e) 
			{
				e.preventDefault();
				if ($('#frm_cur_crop_cycle').valid())
				{
					loading_show();	
					$.ajax({
							type: "POST",
							url: "action_pages/action_frm14.php",
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
			
			$('#frm_financial_details').on('submit', function(e) 
			{
				e.preventDefault();
				if ($('#frm_financial_details').valid())
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
		
			$('#frm_financial_history').on('submit', function(e) 
			{
				e.preventDefault();
				if ($('#frm_financial_history').valid())
				{
					loading_show();	
					$.ajax({
							type: "POST",
							url: "action_pages/action_frm8_fh.php",
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
				calTotal_f2();
			});
			
			$('#f2_typeprog').on('change', function(){
				if($(this).val()){
					$('#progType').text($(this).val());
				}
				else{
					$('#progType').text('Crop');
				}
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
				calTotal_f8();
			});
			
			$('#f8_loan_borrowed_from').on('change', function(){
				calTotal_f8();
			});
			
			$('#f8_other_insurance').on('change', function(){
				calTotal_f8();
			});
			
			$('#f8_any_insurance').on('change', function(){
				
				if($(this).val() == 'yes')
				{
					$('#div_any_insurance_display').show('swing');
				}
				else
				{
					$('#div_any_insurance_display').hide('swing');
				}
				calTotal_f8();
			});
			
			$('#f8_any_subsidies').on('change', function(){
				
				if($(this).val() == 'yes')
				{
					$('#div_any_subsidies_display').show('swing');
				}
				else
				{
					$('#div_any_subsidies_display').hide('swing');
				}
			});
			
			$('#f8_any_loan_waivers').on('change', function(){
				
				if($(this).val() == 'yes')
				{
					$('#div_any_loan_waivers_display').show('swing');
				}
				else
				{
					$('#div_any_loan_waivers_display').hide('swing');
				}
			});
			
			$('#f12_any_other_assets').on('change', function(){
				if($(this).val() == 'yes'){
					$('#div_any_other_assets_display').show('swing');
				}
				else
				{
					$('#div_any_other_assets_display').hide('swing');
					$('#div_any_other_assets_display').find('input, select').val('').trigger('change');
				}
				calTotal_f12();
			});
			
			$('#f7_television').on('blur', function(){
				if($(this).val() != '' && $(this).val() != 'null')
				{
					calTotal_f7();
				}
			});
			
			$('#f7_refrigerator').on('blur', function(){
				if($(this).val() != '' && $(this).val() != 'null')
				{
					calTotal_f7();
				}
			});
			
			$('#f7_wmachine').on('blur', function(){
				if($(this).val() != '' && $(this).val() != 'null')
				{
					calTotal_f7();
				}
			});
			   
			$('#f7_mixer').on('blur', function(){
				if($(this).val() != '' && $(this).val() != 'null')
				{
					calTotal_f7();
				}
			});
			
			$('#f7_stove').on('blur', function(){
				if($(this).val() != '' && $(this).val() != 'null')
				{
					calTotal_f7();
				}
			});
			
			$('#f7_bicycle').on('blur', function(){
				if($(this).val() != '' && $(this).val() != 'null')
				{
					calTotal_f7();
				}
			});
			   
			$('#f7_ccylinder').on('blur', function(){
				if($(this).val() != '' && $(this).val() != 'null')
				{
					calTotal_f7();
				}
			});
			
			$('#f7_fans').on('blur', function(){
				if($(this).val() != '' && $(this).val() != 'null')
				{
					calTotal_f7();
				}
			});
			
			$('#f7_motorcycle').on('blur', function(){
				if($(this).val() != '' && $(this).val() != 'null')
				{
					calTotal_f7();
				}
			});
			
			$('#f7_car').on('blur', function(){
				if($(this).val() != '' && $(this).val() != 'null')
				{
					calTotal_f7();
				}
			});
			
			// START : f13
			$('#f13_dairy_cattle').on('blur', function(){
				if($(this).val() != '' && $(this).val() != 'null')
				{
					calTotal_f13();
				}
			});
			
			$('#f13_draft_cattle').on('blur', function(){
				if($(this).val() != '' && $(this).val() != 'null')
				{
					calTotal_f13();
				}
			});
			
			$('#f13_buffalo').on('blur', function(){
				if($(this).val() != '' && $(this).val() != 'null')
				{
					calTotal_f13();
				}
			});
			   
			$('#f13_ox').on('blur', function(){
				if($(this).val() != '' && $(this).val() != 'null')
				{
					calTotal_f13();
				}
			});
			
			$('#f13_sheep').on('blur', function(){
				if($(this).val() != '' && $(this).val() != 'null')
				{
					calTotal_f13();
				}
			});
			
			$('#f13_goat').on('blur', function(){
				if($(this).val() != '' && $(this).val() != 'null')
				{
					calTotal_f13();
				}
			});
			   
			$('#f13_pig').on('blur', function(){
				if($(this).val() != '' && $(this).val() != 'null')
				{
					calTotal_f13();
				}
			});
			
			$('#f13_poultry').on('blur', function(){
				if($(this).val() != '' && $(this).val() != 'null')
				{
					calTotal_f13();
				}
			});
			
			$('#f13_livestock_income').on('blur', function(){
				if($(this).val() != '' && $(this).val() != 'null')
				{
					calTotal_f13();
				}
			});
			// END : f13
			
			$('#f3_spouse_mfiamount').on('blur', function(){
			
				calTotal_f3();
				
			});
			
			function numsonly(e)
			{
				var unicode=e.charCode? e.charCode : e.keyCode
				
				if (unicode !=8 && unicode !=32 &&  unicode !=46)
				{  // unicode<48||unicode>57 &&
					if ( unicode<48||unicode>57)  //if not a number
					return false //disable key press
				}
			}
			
			function ownership(id,value)
			{
				if(value == 'Leased')
				{
					$('#div_lease_display'+id).show('swing');
					$('#div_rental_display'+id).hide('swing');
					$('#div_contract_display'+id).hide('swing');
					
					$('#f9_amount_on_rent'+id).val('');
					$('#f9_contract_year'+id).val('');
				}
				else if(value == 'Contracted')
				{
					$('#div_contract_display'+id).show('swing');
					$('#div_rental_display'+id).hide('swing');
					$('#div_lease_display'+id).hide('swing');
					
					$('#f9_amount_on_rent'+id).val('');
					$('#f9_lease_year'+id).val('');
				}
				else if(value == 'Rented')
				{
					$('#div_rental_display'+id).show('swing');
					$('#div_contract_display'+id).hide('swing');
					$('#div_lease_display'+id).hide('swing');
					
					$('#f9_contract_year'+id).val('');
					$('#f9_lease_year'+id).val('');
				}
				else if(value == 'Owned')
				{
					$('#div_rental_display'+id).hide('swing');
					$('#div_contract_display'+id).hide('swing');
					$('#div_lease_display'+id).hide('swing');
					
					$('#f9_contract_year'+id).val('');
					$('#f9_amount_on_rent'+id).val('');
					$('#f9_lease_year'+id).val('');
				}
				else if(value == 'Ancestral')
				{
					$('#div_rental_display'+id).hide('swing');
					$('#div_contract_display'+id).hide('swing');
					$('#div_lease_display'+id).hide('swing');
					
					$('#f9_contract_year'+id).val('');
					$('#f9_amount_on_rent'+id).val('');
					$('#f9_lease_year'+id).val('');	
				}
				
				calTotal_f9();
			}
			
			function getDist(stateParameter, stateVal, distId, talId, villageId, distDivId, talDivId, VillageDivId)
			{
				var sendInfo	= {"stateVal":stateVal, "stateParameter":stateParameter, "distId":distId, "talId":talId, "villageId":villageId, "distDivId":distDivId, "talDivId":talDivId, "VillageDivId":VillageDivId, "load_dist":1};
				var dist_load 	= JSON.stringify(sendInfo);
				
				$.ajax({
					url: "load_farmer.php?",
					type: "POST",
					data: dist_load,
					contentType: "application/json; charset=utf-8",						
					success: function(response) 
					{
						data = JSON.parse(response);
						
						if(data.Success == "Success") 
						{
							$('#'+distDivId).html(data.resp);
							$('#'+distId).select2();
						} 
						else if(data.Success == "fail") 
						{
							//alert(data.resp);
							console.log(data.resp);
						}
					},
					error: function (request, status, error) 
					{
						$("#model_body").html('<span style="style="color:#F00;">'+request.responseText+'</span>');							
						$('#error_model').modal('toggle');						
					},
					complete: function()
					{
						//loading_hide();
						//alert("complete");
					}
				});	
			}
			
			function getTal(distParameter, distVal, talId, villageId, talDivId, VillageDivId)
			{
				var sendInfo	= {"distVal":distVal, "distParameter":distParameter, "talId":talId, "villageId":villageId, "talDivId":talDivId, "VillageDivId":VillageDivId, "load_tal":1};
				var tal_load 	= JSON.stringify(sendInfo);
				
				$.ajax({
					url: "load_farmer.php?",
					type: "POST",
					data: tal_load,
					contentType: "application/json; charset=utf-8",						
					success: function(response) 
					{
						data = JSON.parse(response);
						
						if(data.Success == "Success") 
						{
							$('#'+talDivId).html(data.resp);
							$('#'+talId).select2();
						} 
						else if(data.Success == "fail") 
						{
							//alert(data.resp);
							console.log(data.resp);
						}
					},
					error: function (request, status, error) 
					{
						$("#model_body").html('<span style="style="color:#F00;">'+request.responseText+'</span>');							
						$('#error_model').modal('toggle');						
					},
					complete: function()
					{
						//loading_hide();
						//alert("complete");
					}
				});	
			}
			
			function getVillage(talParameter, talVal, villageId, VillageDivId)
			{
				var sendInfo		= {"talVal":talVal, "talParameter":talParameter, "villageId":villageId, "VillageDivId":VillageDivId, "load_village":1};
				var village_load 	= JSON.stringify(sendInfo);
				
				$.ajax({
					url: "load_farmer.php?",
					type: "POST",
					data: village_load,
					contentType: "application/json; charset=utf-8",						
					success: function(response) 
					{
						data = JSON.parse(response);
						
						if(data.Success == "Success") 
						{
							$('#'+VillageDivId).html(data.resp);
							$('#'+villageId).select2();
						} 
						else if(data.Success == "fail") 
						{
							//alert(data.resp);
							console.log(data.resp);
						}
					},
					error: function (request, status, error) 
					{
						$("#model_body").html('<span style="style="color:#F00;">'+request.responseText+'</span>');							
						$('#error_model').modal('toggle');						
					},
					complete: function()
					{
						//loading_hide();
						//alert("complete");
					}
				});	
			}
			
			function addMoreLand(remove)
			{
				if(remove==1)
				{
					if(contentCountLand > 1)
					{
						$('#lands').find('#land'+contentCountLand).slideUp("slow", function(){
							$(this).remove();
							contentCountLand--;
							calTotal_f9();
						});
					}
					/*$('#lands').find('#land'+contentCountLand).slideUp("slow");
					contentCountLand    = contentCountLand - 1
					if(contentCountLand==1)
					{
						$('#removeLandType').hide('swing');
					}
					calTotal_f9();*/
					return false;
				}
				
				contentCountLand    = contentCountLand + 1
				
				landData	= '';
				
				landData	+= '<div id="land'+contentCountLand+'" style="padding:5px;border:1px solid #d6d6d6;margin:5px;display:none;">';
					landData	+= '<div style=" padding: 10px; margin: 5px;">';
										
						landData	+= '<input type="hidden" name="id[]" id="id" value="">';
						landData	+= '<h2>Farm Land '+contentCountLand+' Details</h2>';
										
						landData	+= '<div class="control-group">';
						landData	+= '<label for="text" class="control-label" style="margin-top:10px">Size in Acres<span style="color:#F00">*</span></label>';
							landData	+= '<div class="controls">';
								landData	+= '<input placeholder="Size in Acres" type="text" onKeyPress="return numsonly(event);" id="f9_land_size'+contentCountLand+'" name="f9_land_size'+contentCountLand+'" class="input-xlarge" value="" data-rule-required="true" onChange="calTotal_f9()" maxlength="6">';
							landData	+= '</div>';
						landData	+= '</div>';
										
						landData	+= '<div class="control-group">';
							landData	+= '<label for="text" class="control-label" style="margin-top:10px">Ownership<span style="color:#F00">*</span></label>';
								landData	+= '<div class="controls">';
								landData	+= '<select id="f9_owner'+contentCountLand+'" name="f9_owner'+contentCountLand+'" onChange="ownership('+contentCountLand+',this.value)" class="select2-me input-xlarge" data-rule-required="true">';
									landData	+= '<option value="" disabled selected> Select here</option>';
									landData	+= '<option value="Owned" point="10">Owned</option>';
									landData	+= '<option value="Ancestral" point="5">Ancestral</option>';
									landData	+= '<option value="Rented" point="5">Rented</option>';
									landData	+= '<option value="Contracted" point="5">Contracted</option>';
									landData	+= '<option value="Leased" point="3">Leased</option>';
								landData	+= '</select>';
							landData	+= '</div>';
						landData	+= '</div>	';
										
						landData	+= '<div id="div_lease_display'+contentCountLand+'" style="display: none; padding: 10px; border:1px solid #d6d6d6; margin: 20px;">';
							landData	+= '<div class="control-group">';
								landData	+= '<label for="text" class="control-label" style="margin-top:10px">No. of Lease year<span style="color:#F00">*</span></label>';
								landData	+= '<div class="controls">';
									landData	+= '<input value="" type="text" class="input-xlarge v_number" placeholder="Lease Year" name="f9_lease_year'+contentCountLand+'" id="f9_lease_year'+contentCountLand+'" data-rule-required="true" onKeyPress="return numsonly(event);" maxlength="10">';
								landData	+= '</div>';
							landData	+= '</div>';
						landData	+= '</div>	';
										
						landData	+= '<div id="div_rental_display'+contentCountLand+'" style="display: none; padding: 10px; border:1px solid #d6d6d6; margin: 20px;">';
							landData	+= '<div class="control-group">';
								landData	+= '<label for="text" class="control-label" style="margin-top:10px">Mention tha amount per month on rent<span style="color:#F00">*</span></label>';
								landData	+= '<div class="controls">';
									landData	+= '<input value="" type="text" class="input-xlarge v_number" placeholder="amount per month on rent" name="f9_amount_on_rent'+contentCountLand+'" id="f9_amount_on_rent'+contentCountLand+'" data-rule-required="true" onKeyPress="return numsonly(event);" maxlength="10">';
								landData	+= '</div>';
							landData	+= '</div>';
						landData	+= '</div>	';
										
						landData	+= '<div id="div_contract_display'+contentCountLand+'" style="display: none; padding: 10px; border:1px solid #d6d6d6; margin: 20px;">';
							landData	+= '<div class="control-group">';
								landData	+= '<label for="text" class="control-label" style="margin-top:10px"> No. of Contract year<span style="color:#F00">*</span></label>';
								landData	+= '<div class="controls">';
									landData	+= '<input type="text" class="input-xlarge ui-wizard-content" placeholder="Contract Year" name="f9_contract_year'+contentCountLand+'" id="f9_contract_year'+contentCountLand+'" value="" data-rule-required="true" onKeyPress="return numsonly(event);" maxlength="10">';
								landData	+= '</div>';
							landData	+= '</div>';
						landData	+= '</div>	';
										
						landData	+= '<h3>Land Address</h3>';
										 
						landData	+= '<div class="control-group" >';
							landData	+= '<label for="tasktitel" class="control-label">State <span style="color:#F00">*</span></label>';
							landData	+= '<div class="controls">';
								landData	+= '<select name="f9_state'+contentCountLand+'" id="f9_state'+contentCountLand+'" data-rule-required="true" onChange="getDist(\'p\', this.value, \'f9_district'+contentCountLand+'\', \'f9_taluka'+contentCountLand+'\', \'f9_vilage'+contentCountLand+'\', \'div_p_dist'+contentCountLand+'\', \'div_p_tal'+contentCountLand+'\', \'div_p_village'+contentCountLand+'\');" class="input-xlarge">';
									landData	+= '<option value="">Select State</option>';
									landData	+= '<option value="1">TELANGANA</option>';
								landData	+= '</select>';
							landData	+= '</div>';
						landData	+= '</div>  ';
										
						landData	+= '<div class="control-group">';
							landData	+= '<label for="tasktitel" class="control-label">District <span style="color:#F00">*</span></label>';
							landData	+= '<div class="controls" id="div_p_dist'+contentCountLand+'">';
								landData	+= '<select id="f9_district'+contentCountLand+'" name="f9_district'+contentCountLand+'" class="select2-me input-large" >';
									landData	+= '<option value="" disabled selected>Select District</option>';
								landData	+= '</select>';
							landData	+= '</div>';
						landData	+= '</div> '; 
										
						landData	+= '<div class="control-group">';
							landData	+= '<label for="tasktitel" class="control-label">Taluka <span style="color:#F00">*</span></label>';
							landData	+= '<div class="controls" id="div_p_tal'+contentCountLand+'">';
								landData	+= '<select id="f9_taluka'+contentCountLand+'" name="f9_taluka'+contentCountLand+'" class="select2-me input-large" >';
									landData	+= '<option value="" disabled selected>Select Taluka</option>';
								landData	+= '</select>';
							landData	+= '</div>';
						landData	+= '</div>  ';
										
						landData	+= '<div class="control-group" >';
							landData	+= '<label for="tasktitel" class="control-label">Village Name <span style="color:#F00">*</span></label>';
							landData	+= '<div class="controls" id="div_p_village'+contentCountLand+'">';
								landData	+= '<select id="f9_vilage'+contentCountLand+'" name="f9_vilage'+contentCountLand+'" class="select2-me input-large" >';
									landData	+= '<option value="" disabled selected>Select Village</option>';
								landData	+= '</select>';
							landData	+= '</div>';
						landData	+= '</div> ';
										
						landData	+= '<div class="control-group">';
							landData	+= '<label for="text" class="control-label" style="margin-top:10px">Survey Number<span style="color:#F00">*</span></label>';
							landData	+= '<div class="controls">';
								landData	+= '<input placeholder="Survey Number" type="text" id="f9_survey_number'+contentCountLand+'" name="f9_survey_number'+contentCountLand+'" class="input-xlarge" value="" data-rule-required="true" maxlength="10">';
							landData	+= '</div>';
						landData	+= '</div>  ';
										
						landData	+= '<div class="control-group" >';
							landData	+= '<label for="tasktitel" class="control-label">Pin-Code <span style="color:#F00">*</span></label>';
							landData	+= '<div class="controls">';
								landData	+= '<input type="text" id="f9_pincode'+contentCountLand+'" name="f9_pincode'+contentCountLand+'" placeholder="Pin-Code" class="input-large" data-rule-required="true" onKeyPress="return numsonly(event);" minlength="6" maxlength="6" size="6" />';
							landData	+= '</div>';
						landData	+= '</div>  ';
										
						landData	+= '<div class="control-group" >';
							landData	+= '<label for="tasktitel" class="control-label">latitude <span style="color:#F00">*</span></label>';
							landData	+= '<div class="controls">';
								landData	+= '<input type="text" id="f9_lat'+contentCountLand+'" name="f9_lat'+contentCountLand+'" placeholder="Latitude" class="input-large" data-rule-required="true" onKeyPress="return numsonly(event);" maxlength="15"/>';
							landData	+= '</div>';
						landData	+= '</div>  ';
										
						landData	+= '<div class="control-group" >';
							landData	+= '<label for="tasktitel" class="control-label">longitude <span style="color:#F00">*</span></label>';
							landData	+= '<div class="controls">';
								landData	+= '<input type="text" id="f9_long'+contentCountLand+'" name="f9_long'+contentCountLand+'" placeholder="Longitude" class="input-large" data-rule-required="true" onKeyPress="return numsonly(event);" maxlength="15"/>';
							landData	+= '</div>';
						landData	+= '</div>  ';
										
						landData	+= '<div class="control-group">';
							landData	+= '<label for="text" class="control-label" style="margin-top:10px">Type of Soil<span style="color:#F00">*</span></label>';
							landData	+= '<div class="controls">';
								landData	+= '<select id="f9_soil_type'+contentCountLand+'" name="f9_soil_type'+contentCountLand+'" class="select2-me input-xlarge" data-rule-required="true" onChange="calTotal_f9()">';
									landData	+= '<option value="" disabled selected> Select here</option>';
									landData	+= '<option value="Alluvial Soil" point="10">Alluvial Soil</option>';
									landData	+= '<option value="Black Soil" point="9">Black Soil</option>';
									landData	+= '<option value="Red Soil" point="8">Red Soil</option>';
									landData	+= '<option value="Mountain Soil" point="6">Mountain Soil</option>';
									landData	+= '<option value="Peat" point="5">Peat</option>';
									landData	+= '<option value="Laterite Soil" point="5">Laterite Soil</option>';
									landData	+= '<option value="Desert Soil" point="2">Desert Soil</option>';
								landData	+= '				 </select>';
							landData	+= '</div>';
						landData	+= '</div>	';
										
						landData	+= '<div class="control-group">';
							landData	+= '<label for="text" class="control-label" style="margin-top:10px">Have you had the soil tested in your land?<span style="color:#F00">*</span></label>';
							landData	+= '<div class="controls">';
								landData	+= '<select id="f9_soil_tested'+contentCountLand+'" name="f9_soil_tested'+contentCountLand+'" class="select2-me input-xlarge" data-rule-required="true" onChange="calTotal_f9()">';
									landData	+= '<option value="" disabled selected> Select here</option>';
									landData	+= '<option value="yes" point="10">Yes</option>';
									landData	+= '<option value="no" point="0">no</option>';
								landData	+= '				 </select>';
							landData	+= '</div>';
						landData	+= '</div>	';
										
						landData	+= '<div class="control-group">';
							landData	+= '<label for="text" class="control-label" style="margin-top:10px">Soil Depth<span style="color:#F00">*</span></label>';
							landData	+= '<div class="controls">';
								landData	+= '<input placeholder="Soil Depth" type="text" id="f9_soil_depth'+contentCountLand+'" name="f9_soil_depth'+contentCountLand+'" class="input-xlarge" value="" data-rule-required="true">';
							landData	+= '</div>';
						landData	+= '</div>  ';
										
						landData	+= '<div class="control-group">';
							landData	+= '<label for="text" class="control-label" style="margin-top:10px">Source Of Water';
							landData	+= '<span style="color:#F00">*</span></label>';
							landData	+= '<div class="controls">';
								landData	+= '<select id="f9_source_of_water'+contentCountLand+'" name="f9_source_of_water'+contentCountLand+'" class="select2-me input-xlarge" data-rule-required="true" onChange="calTotal_f9()">';
									landData	+= '<option value="" disabled selected> Select here</option>';
									landData	+= '<option value="Well Water" point="5">Well Water</option>';
									landData	+= '<option value="Tube Water" point="7">Tube Water</option>';
									landData	+= '<option value="Tank Water" point="5">Tank Water</option>';
									landData	+= '<option value="Canals" point="5">Canals</option>';
									landData	+= '<option value="Perennial Water" point="5">Perennial Water</option>';
									landData	+= '<option value="Multipurpose River Valley" point="5">Multipurpose River Valley</option>';
									landData	+= '<option value="Rain Fed" point="4">Rain Fed</option>';
									landData	+= '<option value="Drip Irrigation" point="8">Drip Irrigation</option>';
									landData	+= '<option value="Sprinkler" point="7">Sprinkler</option>';
									landData	+= '<option value="Furrow" point="3">Furrow</option>';
									landData	+= '<option value="Ditch" point="3">Ditch</option>';
									landData	+= '<option value="Surge" point="3">Surge</option>';
									landData	+= '<option value="Seepage" point="3">Seepage</option>';
								landData	+= '</select>';
							landData	+= '</div>';
						landData	+= '</div>  ';
										
					landData	+= '</div>';
				landData	+= '</div>';
				
				/*alert(landData);
				return false;*/
				
				$('#f9_owner'+contentCountLand).select2();
				$('#f9_state'+contentCountLand).select2();
				$('#f9_district'+contentCountLand).select2();
				$('#f9_taluka'+contentCountLand).select2();
				$('#f9_vilage'+contentCountLand).select2();
				$('#f9_soil_type'+contentCountLand).select2();
				$('#f9_soil_tested'+contentCountLand).select2();
				$('#f9_source_of_water'+contentCountLand).select2();
				
				$('#lands').append(landData).find('#land'+contentCountLand).slideDown("slow");
				
				if(contentCountLand >= 2)
				{
					$('#removeLandType').show('swing');
				}
			}
			
			function removeContent()
			{
				if(contentCountCrop > 1){
					
					$('#formContent').find('#crop'+contentCountCrop).slideUp("slow", function(){
						$(this).remove();
						contentCountCrop--;
						calTotal_f10();
					});
				}
			}
			
			function appendContent()
			{
				contentCountCrop++;
				
				var cropData	= '';
				
				cropData	+= '<div id="crop'+contentCountCrop+'" style="padding:5px;border:1px solid #d6d6d6;margin:5px;display:none;">';
					cropData	+= '<input type="hidden" name="id[]" id="id" value="">';
					cropData	+= '<div id="crop_detail" style=" padding: 10px; margin: 5px;">';
						cropData	+= '<h2>Crop '+contentCountCrop+' Details</h2>';
										
										
						cropData	+= '<div class="control-group">';
							cropData	+= '<label for="tasktitel" class="control-label">Current Crop Season <span style="color:#F00">*</span></label>';
							cropData	+= '<div class="controls">';
								cropData	+= '<select id="f10_crop_season'+contentCountCrop+'" name="f10_crop_season'+contentCountCrop+'" class="select2-me input-xlarge" >';
									cropData	+= '<option value="" disabled selected>Select here</option>';
									cropData	+= '<option value="Kharif">Kharif</option>';
									cropData	+= '<option value="Rabi" >Rabi</option>';
									cropData	+= '<option value="Summer">Summer</option>';
								cropData	+= '</select>';
							cropData	+= '</div>';
						cropData	+= '</div>  ';
										
						cropData	+= '<div class="control-group">';
							cropData	+= '<label for="tasktitel" class="control-label">Type of crop cultivating this year <span style="color:#F00">*</span></label>';
							cropData	+= '<div class="controls">';
								cropData	+= '<select id="f10_cultivating'+contentCountCrop+'" name="f10_cultivating'+contentCountCrop+'" class="select2-me input-xlarge" data-rule-required="true" onchange="calTotal_f10();">';
									cropData	+= '<option value="" disabled selected> Select here</option>';
													<?php
													$crops = lookup_value('tbl_crops',array(),array("crop_status"=>1),array(),array(),array());
													while($crop = mysqli_fetch_array($crops))
													{
														?>
										cropData	+= '<option point="7" value="<?php echo $crop['crop_id']; ?>">';
											cropData	+= '<?php echo strtoupper(trim($crop['crop_name'])); ?>';
										cropData	+= '</option>';
														<?php
													}
												?>
								cropData	+= '</select>';
							cropData	+= '</div>';
						cropData	+= '</div>  ';
									
						cropData	+= '<div class="control-group">';
							cropData	+= '<label for="tasktitel" class="control-label">Current Stage Of Crop<span style="color:#F00">*</span></label>';
							cropData	+= '<div class="controls">';
								cropData	+= '<select id="f10_stage'+contentCountCrop+'" name="f10_stage'+contentCountCrop+'" class="select2-me input-xlarge" data-rule-required="true" onchange="calTotal_f10()">';
									cropData	+= '<option value="" disabled selected> Select here</option>';
									cropData	+= '<option point="5" value="Land Tilling" >Land Tilling</option>';
									cropData	+= '<option point="7" value="Sowing" >Sowing</option>';
									cropData	+= '<option point="6" value="Manure Adding OR Fertilizer" >Manure Adding / Fertilizer</option>';
									cropData	+= '<option point="7" value="Irrigation" >Irrigation</option>';
									cropData	+= '<option point="7" value="Weeding" >Weeding</option>';
									cropData	+= '<option point="8" value="Growing">Growing</option>';
									cropData	+= '<option point="7" value="Harvesting" >Harvesting</option>';
									cropData	+= '<option point="5" value="Threshing" >Threshing</option>';
									cropData	+= '<option point="2" value="Storing" >Storing</option>';
								cropData	+= '</select>';
							cropData	+= '</div>';
						cropData	+= '</div>';
										
						cropData	+= '<div class="control-group">';
							cropData	+= '<label for="tasktitel" class="control-label">Total Yield Expected [Per Acre Per Crop] <span style="color:#F00">*</span></label>';
							cropData	+= '<div class="controls">';
								cropData	+= '<input type="text" id="f10_expected'+contentCountCrop+'" name="f10_expected'+contentCountCrop+'" class="input-xlarge" onKeyPress="return numsonly(event);" data-rule-required="true" maxlength="10" onchange="calTotal_f10()" placeholder="Total Yield Expected"> Quintal';
							cropData	+= '</div>';
						cropData	+= '</div>';
									
						cropData	+= '<div class="control-group">';
							cropData	+= '<label for="tasktitel" class="control-label">Potential market <span style="color:#F00">*</span></label>';
							cropData	+= '<div class="controls">';
								cropData	+= '<select id="f10_potential_market'+contentCountCrop+'" name="f10_potential_market'+contentCountCrop+'" class="select2-me input-xlarge" >';
									cropData	+= '<option value="" disabled selected>Select here</option>';
									cropData	+= '<option value="Local Mandis and Location" >Local Mandis and Location</option>';
									cropData	+= '<option value="FPO">FPO</option>';
									cropData	+= '<option value="Private Buyer" >Private Buyer (Companies)</option>';
									cropData	+= '<option value="Government" >Government</option>';
									cropData	+= '<option value="Other" >Other</option>';
								cropData	+= '</select>';
							cropData	+= '</div>';
						cropData	+= '</div>';
										
						cropData	+= '<div class="control-group">';
							cropData	+= '<label for="tasktitel" class="control-label">Crop Storage <span style="color:#F00">*</span></label>';
							cropData	+= '<div class="controls">';
								cropData	+= '<select id="f10_crop_storage'+contentCountCrop+'" name="f10_crop_storage'+contentCountCrop+'" class="select2-me input-xlarge" >';
									cropData	+= '<option value="" disabled selected>Select here</option>';
									cropData	+= '<option value="Govt Warehouse" >Govt. Warehouse</option>';
									cropData	+= '<option value="Pvt Warehouse" >Pvt. Warehouse</option>';
									cropData	+= '<option value="Factory" >Factory</option>';
									cropData	+= '<option value="Mandis Direct" >Mandis Direct</option>';
								cropData	+= '</select>';
							cropData	+= '</div>';
						cropData	+= '</div>';
										
						cropData	+= '<div class="control-group">';
							cropData	+= '<label for="text" class="control-label" style="margin-top:10px">Expected Price This Year [Per Quintal Per Acre]<span style="color:#F00">*</span></label>';
							cropData	+= '<div class="controls">';
								cropData	+= '<input type="text" id="f10_expectedprice'+contentCountCrop+'" name="f10_expectedprice'+contentCountCrop+'" class="input-xlarge" data-rule-required="true"  onKeyPress="return numsonly(event);" maxlength="10" onchange="calTotal_f10()" placeholder="Expected Price">  In Rs.';
							cropData	+= '</div>';
						cropData	+= '</div>';
										
						cropData	+= '<div class="control-group">';
							cropData	+= '<label for="text" class="control-label" style="margin-top:10px">Total Income Expected This Year  [ Per Acre Per Crop ]<span style="color:#F00">*</span></label>';
							cropData	+= '<div class="controls">';
								cropData	+= '<input type="text" id="f10_expectedincome'+contentCountCrop+'" name="f10_expectedincome'+contentCountCrop+'" class="input-xlarge"  data-rule-required="true"  onKeyPress="return numsonly(event);" maxlength="10" onchange="calTotal_f10()" placeholder="Total Income Expected">  In Rs.';
							cropData	+= '</div>';
						cropData	+= '</div>';
										
						cropData	+= '<div class="control-group">';
							cropData	+= '<label for="text" class="control-label" style="margin-top:10px">Potential Crop Diseases<span style="color:#F00">*</span></label>';
							cropData	+= '<div class="controls">';
								cropData	+= '<select id="f10_diseases'+contentCountCrop+'" name="f10_diseases'+contentCountCrop+'" class="select2-me input-xlarge" data-rule-required="true" onchange="calTotal_f10()">';
									cropData	+= '<option value="" disabled selected> Select here</option>';
									cropData	+= '<option point="1" value="Fungal" > Fungal</option>';
									cropData	+= '<option point="4" value="Non-fungal" > Non-fungal</option>';
									cropData	+= '<option point="0" value="Severe" > Severe</option>';
									cropData	+= '<option point="8" value="Treatable" > Treatable</option>';
									cropData	+= '<option point="10" value="No potential of diseases"> No potential of diseases</option>';
								cropData	+= '</select>';
							cropData	+= '</div>';
						cropData	+= '</div>';
										
						cropData	+= '<div class="control-group">';
							cropData	+= '<label for="text" class="control-label" style="margin-top:10px">Potential Pest Control Problems <span style="color:#F00">*</span></label>';
							cropData	+= '<div class="controls">';
								cropData	+= '<select id="f10_pest'+contentCountCrop+'" name="f10_pest'+contentCountCrop+'" class="select2-me input-xlarge" data-rule-required="true" onchange="calTotal_f10()">';
									cropData	+= '<option value="" disabled selected> Select here</option>';
									cropData	+= '<option point="1" value="yes" > Yes</option>';
									cropData	+= '<option point="10" value="no"> No</option>';
								cropData	+= '</select>';
							cropData	+= '</div>';
						cropData	+= '</div>';
									
						cropData	+= '<div class="control-group">';
							cropData	+= '<label for="tasktitel" class="control-label">What kind of Fertilizer and pesticides being used <span style="color:#F00">*</span></label>';
							cropData	+= '<div class="controls">';
								cropData	+= '<select id="f10_filt_type'+contentCountCrop+'" name="f10_filt_type'+contentCountCrop+'" class="select2-me input-xlarge" data-rule-required="true" onchange="calTotal_f10()">';
									cropData	+= '<option value="" disabled selected>Select here</option>';
									cropData	+= '<option point="10" value="Organic Fertilizers" >Organic Fertilizers</option>';
									cropData	+= '<option point="5" value="Inorganic Fertilizers" >Inorganic Fertilizers</option>';
								cropData	+= '</select>';
							cropData	+= '</div>';
						cropData	+= '</div>';
									
					cropData	+= '</div>';
				cropData	+= '</div>';
				
				$('#formContent').append(cropData).find('#crop'+contentCountCrop).slideDown("slow");
				calTotal_f10();
			}
			
			function removePrevCropContent()
			{
				if(contentCountPrevCrop > 1){
					
					$('#prev_crop').find('#prevcrop'+contentCountPrevCrop).slideUp("slow", function(){
						$(this).remove();
						contentCountPrevCrop--;
						if(contentCountPrevCrop==1)
						{
							$('.removePrevCrop').hide('swing');
						}
						calTotal_f11();
					});
				}
			}
			
			function appendPrevCropContent()
			{
				contentCountPrevCrop++;
				
				var prevCropData	= '';
				
				prevCropData	+= '<div id="prevcrop'+contentCountPrevCrop+'" style="padding:5px;border:1px solid #d6d6d6;margin:5px; display:none;">';
					prevCropData	+= '<input type="hidden" name="id[]" id="id" value="">';   
					prevCropData	+= '<h3>Previous Crop '+contentCountPrevCrop+' Details</h3>';
										
					prevCropData	+= '<div class="control-group">';
						prevCropData	+= '<label for="tasktitel" class="control-label">Type of crop cultivating previous year <span style="color:#F00">*</span></label>';
						prevCropData	+= '<div class="controls">';
							prevCropData	+= '<select id="f11_cultivating'+contentCountPrevCrop+'" name="f11_cultivating'+contentCountPrevCrop+'" class="select2-me input-xlarge" data-rule-required="true" onchange="calTotal_f11();">';
								prevCropData	+= '<option value="" disabled selected> Select here</option>';
													<?php
													$crops = lookup_value('tbl_crops',array(),array("crop_status"=>1),array(),array(),array());
													while($crop = mysqli_fetch_array($crops))
													{
														?>
								prevCropData	+= '<option point="7" value="<?php echo $crop['crop_id']; ?>">';
									prevCropData	+= '<?php echo strtoupper(trim($crop['crop_name'])); ?>';
								prevCropData	+= '</option>';
														<?php
													}
												?>
							prevCropData	+= '</select>';
						prevCropData	+= '</div>';
					prevCropData	+= '</div>';
										
					prevCropData	+= '<div class="control-group">';
						prevCropData	+= '<label for="text" class="control-label" style="margin-top:10px">Yield Achieved Last Year In tonnes <span style="color:#F00">*</span></label>';
						prevCropData	+= '<div class="controls">';
							prevCropData	+= '<input type="text" id="f11_achieved'+contentCountPrevCrop+'" name="f11_achieved'+contentCountPrevCrop+'" class="input-xlarge"  onKeyPress="return numsonly(event);" maxlength="10" data-rule-required="true" onchange="calTotal_f11()" placeholder="Yield Achieved">';
						prevCropData	+= '</div>';
					prevCropData	+= '</div>';
			
					prevCropData	+= '<div class="control-group">';
						prevCropData	+= '<label for="text" class="control-label" style="margin-top:10px">Income Achieved Last Year in Rs. <span style="color:#F00">*</span></label>';
						prevCropData	+= '<div class="controls">';
							prevCropData	+= '<input type="text" id="f11_income'+contentCountPrevCrop+'" name="f11_income'+contentCountPrevCrop+'" class="input-xlarge" onKeyPress="return numsonly(event);" maxlength="10" data-rule-required="true" onchange="calTotal_f11()" placeholder="Income Achieved">';
						prevCropData	+= '</div>';
					prevCropData	+= '</div>';
										
					prevCropData	+= '<div class="control-group">';
						prevCropData	+= '<label for="text" class="control-label" style="margin-top:10px">Any Pest or Diseases That The Yield Was Prone To? <span style="color:#F00">*</span></label>';
						prevCropData	+= '<div class="controls">';
							prevCropData	+= '<select id="f11_diseases'+contentCountPrevCrop+'" name="f11_diseases'+contentCountPrevCrop+'" class="input-xlarge" data-rule-required="true" onchange="calTotal_f11()">';
								prevCropData	+= '<option value="" disabled selected> Select here</option>';
								prevCropData	+= '<option point="0" value="yes" > Yes</option>';
								prevCropData	+= '<option point="10" value="no" > No</option>';
							prevCropData	+= '</select>';
						prevCropData	+= '</div>';
					prevCropData	+= '</div>';
										
					prevCropData	+= '<div class="control-group">';
						prevCropData	+= '<label for="text" class="control-label" style="margin-top:10px">What Kind Of Fertilizers Did You Use <span style="color:#F00">*</span></label>';
						prevCropData	+= '<div class="controls">';
							prevCropData	+= '<select id="f11_fertilizers'+contentCountPrevCrop+'" name="f11_fertilizers'+contentCountPrevCrop+'" class="input-xlarge" data-rule-required="true" onchange="calTotal_f11()">';
								prevCropData	+= '<option value="" disabled selected> Select here</option>';
								prevCropData	+= '<option point="5" value="inorganic"> Inorganic</option>';
								prevCropData	+= '<option point="10" value="organic"> Organic</option>';
							prevCropData	+= '</select>';
						prevCropData	+= '</div>';
					prevCropData	+= '</div>';
										
					prevCropData	+= '<div class="control-group">';
						prevCropData	+= '<label for="text" class="control-label" style="margin-top:10px">How much was the total consumption of Fertilizer in KGs <span style="color:#F00">*</span></label>';
						prevCropData	+= '<div class="controls">';
							prevCropData	+= '<input type="text" id="f11_consumption_fertilizer'+contentCountPrevCrop+'" name="f11_consumption_fertilizer'+contentCountPrevCrop+'" class="input-xlarge" onKeyPress="return numsonly(event);" maxlength="10" data-rule-required="true" onchange="calTotal_f11()" placeholder="How much was the total consumption of Fertilizer in KGs">';
						prevCropData	+= '</div>';
					prevCropData	+= '</div>';
										
					prevCropData	+= '<div class="control-group">';
						prevCropData	+= '<label for="text" class="control-label" style="margin-top:10px">Was your crop damaged / destroyed last year <span style="color:#F00">*</span></label>';
						prevCropData	+= '<div class="controls">';
							prevCropData	+= '<select id="f11_damaged_prev_crop'+contentCountPrevCrop+'" name="f11_damaged_prev_crop'+contentCountPrevCrop+'" class="input-xlarge" data-rule-required="true" onchange="calTotal_f11()">';
								prevCropData	+= '<option value="" disabled selected> Select here</option>';
								prevCropData	+= '<option point="0" value="yes"> Yes</option>';
								prevCropData	+= '<option point="10" value="no"> No</option>';
							prevCropData	+= '</select>';
						prevCropData	+= '</div>';
					prevCropData	+= '</div>';
										
					prevCropData	+= '<div id="div_damaged_prev_crop_display" style="display:none;padding: 5px; border: 1px solid #d6d6d6; margin: 5px;">';
						prevCropData	+= '<div class="control-group">';
							prevCropData	+= '<label for="text" class="control-label" style="margin-top:10px">What was the reason?<span style="color:#F00">*</span></label>';
							prevCropData	+= '<div class="controls">';
								prevCropData	+= '<select id="f11_what_was_the_reason'+contentCountPrevCrop+'" name="f11_what_was_the_reason'+contentCountPrevCrop+'" class="input-xlarge" data-rule-required="true" onchange="calTotal_f11()">';
									prevCropData	+= '<option value="" disabled selected> Select here</option>';
									prevCropData	+= '<option value="Flood"> Flood</option>';
									prevCropData	+= '<option value="Drought"> Drought</option>';
									prevCropData	+= '<option value="Fire"> Fire</option>';
									prevCropData	+= '<option value="Stolen"> Stolen</option>';
									prevCropData	+= '<option value="Irrigation Issues"> Irrigation Issues</option>';
									prevCropData	+= '<option value="Lack of Component"> Lack of Component</option>';
									prevCropData	+= '<option value="Others"> Others</option>';
								prevCropData	+= '</select>';
							prevCropData	+= '</div>';
						prevCropData	+= '</div>';
					prevCropData	+= '</div>';
				prevCropData	+= '</div>';
				
				if(contentCountPrevCrop>1)
				{
					$('.removePrevCrop').show('swing');
				}
				
				$('#prev_crop').append(prevCropData).find('#prevcrop'+contentCountPrevCrop).slideDown("slow");
				calTotal_f11();
			}
			
			function removeCurCropContent()
			{
				if(contentCountCurCrop > 1){
					
					$('#cur_crop').find('#curcrop'+contentCountCurCrop).slideUp("slow", function(){
						$(this).remove();
						contentCountCurCrop--;
						if(contentCountCurCrop==1)
						{
							$('.removeCurCrop').hide('swing');
						}
						calTotal_f14();
					});
				}
			}
			
			function appendCurCropContent()
			{
				contentCountCurCrop++;
				
				var curCropData	= '';
				
				curCropData	+= '<div id="curcrop'+contentCountCurCrop+'" style="padding:5px;border:1px solid #d6d6d6;margin:5px;display:none;">';
					curCropData	+= '<input type="hidden" name="id[]" id="id" value="">';
					curCropData	+= '<h3>Current Crop '+contentCountCurCrop+' Forecast</h3>';
									
					curCropData	+= '<div class="control-group">';
						curCropData	+= '<label for="text" class="control-label" style="margin-top:10px">What type of crop planned?<span style="color:#F00">*</span></label>';
						curCropData	+= '<div class="controls">';
							curCropData	+= '<select id="f14_crop_type'+contentCountCurCrop+'" name="f14_crop_type'+contentCountCurCrop+'" class="select2-me input-xlarge" data-rule-required="true">';
								curCropData	+= '<option value="" disabled selected> Select here</option>';
								curCropData	+= '<option value="Commercial" >Commercial</option>';
								curCropData	+= '<option value="Seasonal" >Seasonal</option>';
							curCropData	+= '</select>';
						curCropData	+= '</div>';
					curCropData	+= '</div>';
									
					curCropData	+= '<div class="control-group">';
						curCropData	+= '<label for="text" class="control-label" style="margin-top:10px">Type Of Crop Cultivating This Year<span style="color:#F00">*</span></label>';
						curCropData	+= '<div class="controls">';
							curCropData	+= '<select id="f14_cultivating'+contentCountCurCrop+'" name="f14_cultivating'+contentCountCurCrop+'" class="select2-me input-xlarge" data-rule-required="true" onchange="calTotal_f14();get_variety(this.value,'+contentCountCurCrop+')">';
								curCropData	+= '<option value=""  selected> Select here</option>';
												<?php
												$crops = lookup_value('tbl_crops',array(),array("crop_status"=>1),array(),array(),array());
												while($crop = mysqli_fetch_array($crops))
												{
													?>
									curCropData	+= '<option value="<?php echo $crop['crop_id'] ?>" point="7" >';
										curCropData	+= '<?php echo trim($crop['crop_name']); ?>';
									curCropData	+= '</option>'; 
													<?php
												}
												?>
							curCropData	+= '</select>';
						curCropData	+= '</div>';
					curCropData	+= '</div>';
										
					curCropData	+= '<div class="control-group">';
						curCropData	+= '<label for="text" class="control-label" style="margin-top:10px">Variety<span style="color:#F00">*</span></label>';
						curCropData	+= '<div class="controls">';
							curCropData	+= '<select id="f14_variety'+contentCountCurCrop+'" name="f14_variety'+contentCountCurCrop+'" class="select2-me input-xlarge" data-rule-required="true" onchange="calTotal_f14();">';
								curCropData	+= '<option value="" disabled selected> Select here</option>';
												<?php
												if(isset($crops_arr[$i]['f14_cultivating']) && $crops_arr[$i]['f14_cultivating']!="")
												{
													$result     = lookup_value('tbl_crop_varieties',array(),array("fk_crop_id"=>$crops_arr[$i]['f14_cultivating']),array(),array(),array());
													if($result)
													{
														while($row = mysqli_fetch_array($result))
														{
															?>
								curCropData	+= '<option value="<?php echo $row['variety_id']; ?>">';
									curCropData	+= '<?php echo trim($row['variety_name']).' '.trim($row['variety_type']) ?>';
								curCropData	+= '</option>';
															<?php
														}
													}
													else
													{
														?>
								curCropData	+= '<option value="NA">NA</option>';
														<?php
													}
												}
												?>
							curCropData	+= '</select>';
						curCropData	+= '</div>';
					curCropData	+= '</div>';
									
					curCropData	+= '<div class="control-group">';
						curCropData	+= '<label for="text" class="control-label" style="margin-top:10px">What is the total acrage you are planning for crop '+contentCountCurCrop+'<span style="color:#F00">*</span></label>';
						curCropData	+= '<div class="controls">';
							curCropData	+= '<input type="text" value="" id="f14_total_acrage'+contentCountCurCrop+'" name="f14_total_acrage'+contentCountCurCrop+'" class="input-xlarge" onKeyPress="return numsonly(event);" maxlength="10" data-rule-required="true" placeholder="What is the total acrage you are planning for crop '+contentCountCurCrop+'">';
						curCropData	+= '</div>';
					curCropData	+= '</div>';
									
					curCropData	+= '<div class="control-group">';
						curCropData	+= '<label for="text" class="control-label" style="margin-top:10px">Expected Yield<span style="color:#F00">*</span></label>';
						curCropData	+= '<div class="controls">';
							curCropData	+= '<input type="text" value="" id="f14_expected_yeild'+contentCountCurCrop+'" name="f14_expected_yeild'+contentCountCurCrop+'" class="input-xlarge" onKeyPress="return numsonly(event);" maxlength="10" data-rule-required="true" placeholder="Expected Yield">';
						curCropData	+= '</div>';
					curCropData	+= '</div>';
									
					curCropData	+= '<div class="control-group">';
						curCropData	+= '<label for="text" class="control-label" style="margin-top:10px">What type of seeds you plan to buy?<span style="color:#F00">*</span></label>';
						curCropData	+= '<div class="controls">';
							curCropData	+= '<select id="f14_seed_type'+contentCountCurCrop+'" name="f14_seed_type'+contentCountCurCrop+'" class="select2-me input-xlarge" data-rule-required="true" onchange="calTotal_f14();">';
								curCropData	+= '<option value="" disabled selected> Select here</option>';
								curCropData	+= '<option point="10" value="Hybrid">Hybrid</option>';
								curCropData	+= '<option point="0" value="Non Hybrid">Non-Hybrid</option>';
							curCropData	+= '</select>';
						curCropData	+= '</div>';
					curCropData	+= '</div>';
									
					curCropData	+= '<div class="control-group">';
						curCropData	+= '<label for="text" class="control-label" style="margin-top:10px">How much is the quantity bought? [In Kg per acre]<span style="color:#F00">*</span></label>';
						curCropData	+= '<div class="controls">';
							curCropData	+= '<input type="text" value="" id="f14_seed_quantity'+contentCountCurCrop+'" name="f14_seed_quantity'+contentCountCurCrop+'" class="input-xlarge" onKeyPress="return numsonly(event);" maxlength="10" data-rule-required="true" placeholder="How much is the quantity bought">';
						curCropData	+= '</div>';
					curCropData	+= '</div>';
									
					curCropData	+= '<div class="control-group">';
						curCropData	+= '<label for="text" class="control-label" style="margin-top:10px">How much money you spend in buying seeds?<span style="color:#F00">*</span></label>';
						curCropData	+= '<div class="controls">';
							curCropData	+= '<input type="text" value="" id="f14_spend_money'+contentCountCurCrop+'" name="f14_spend_money'+contentCountCurCrop+'" class="input-xlarge" onKeyPress="return numsonly(event);" maxlength="10" data-rule-required="true" placeholder="How much money you spend in buying seeds">';
						curCropData	+= '</div>';
					curCropData	+= '</div>';
									
					curCropData	+= '<div class="control-group">';
						curCropData	+= '<label for="text" class="control-label" style="margin-top:10px">Do you use self grown seeds from previous crop?<span style="color:#F00">*</span></label>';
						curCropData	+= '<div class="controls">';
							curCropData	+= '<select id="f14_use_self_grown_seeds'+contentCountCurCrop+'" name="f14_use_self_grown_seeds'+contentCountCurCrop+'" class="select2-me input-xlarge" data-rule-required="true">';
								curCropData	+= '<option value="" disabled selected> Select here</option>';
								curCropData	+= '<option value="yes">Yes</option>';
								curCropData	+= '<option value="no">No</option>';
							curCropData	+= '</select>';
						curCropData	+= '</div>';
					curCropData	+= '</div>';
									
					curCropData	+= '<div class="control-group">';
						curCropData	+= '<label for="text" class="control-label" style="margin-top:10px">Did you take loan to buy seeds?<span style="color:#F00">*</span></label>';
						curCropData	+= '<div class="controls">';
							curCropData	+= '<select id="f14_loan_taken'+contentCountCurCrop+'" name="f14_loan_taken'+contentCountCurCrop+'" class="select2-me input-xlarge" data-rule-required="true" onchange="calTotal_f14();">';
								curCropData	+= '<option value="" disabled selected> Select here</option>';
								curCropData	+= '<option point="0" value="yes" >Yes</option>';
								curCropData	+= '<option point="10" value="no">No</option>';
							curCropData	+= '</select>';
						curCropData	+= '</div>';
					curCropData	+= '</div>';
									
					curCropData	+= '<div id="div_loan_taken_display'+contentCountCurCrop+'" style="display:none;padding: 5px; border: 1px solid #d6d6d6; margin: 5px;">';
									
						curCropData	+= '<div class="control-group">';
							curCropData	+= '<label for="text" class="control-label" style="margin-top:10px">How much is the loan amount?<span style="color:#F00">*</span></label>';
							curCropData	+= '<div class="controls">';
								curCropData	+= '<input type="text" value="" id="f14_loan_amount'+contentCountCurCrop+'" name="f14_loan_amount'+contentCountCurCrop+'" class="input-xlarge" onKeyPress="return numsonly(event);" maxlength="10" data-rule-required="true" placeholder="How much is the loan amount" onblur="calTotal_f14();">';
							curCropData	+= '</div>';
						curCropData	+= '</div>';
										
						curCropData	+= '<div class="control-group">';
							curCropData	+= '<label for="text" class="control-label" style="margin-top:10px">Where did you borrow the loan from?<span style="color:#F00">*</span></label>';
							curCropData	+= '<div class="controls">';
								curCropData	+= '<select id="f14_borrow_loan_from'+contentCountCurCrop+'" name="f14_borrow_loan_from'+contentCountCurCrop+'" class="select2-me input-xlarge" data-rule-required="true" onchange="calTotal_f14();">';
									curCropData	+= '<option value="" disabled selected> Select here</option>';
									curCropData	+= '<option point="10" value="Bank">Bank</option>';
									curCropData	+= '<option point="8" value="MFI OR NBFC" >MFI/NBFC</option>';
									curCropData	+= '<option point="6" value="FPO" >FPO</option>';
									curCropData	+= '<option point="0" value="Money Lender">Money Lender (Private)</option>';
									curCropData	+= '<option point="2" value="Other Lending Institutions">Other Lending Institutions (Muthoot)</option>';
								curCropData	+= '</select>';
							curCropData	+= '</div>';
						curCropData	+= '</div>';
									
					curCropData	+= '</div>';
									
					curCropData	+= '<div class="control-group">';
						curCropData	+= '<label for="text" class="control-label" style="margin-top:10px">Potential Crop Diseases<span style="color:#F00">*</span></label>';
						curCropData	+= '<div class="controls">';
							curCropData	+= '<select id="f14_diseases'+contentCountCurCrop+'" name="f14_diseases'+contentCountCurCrop+'" class="select2-me input-xlarge" data-rule-required="true">';
								curCropData	+= '<option value="" disabled selected> Select here</option>';
								curCropData	+= '<option value="Fungal" > Fungal</option>';
								curCropData	+= '<option value="Non-fungal"> Non-fungal</option>';
								curCropData	+= '<option value="Severe"> Severe</option>';
								curCropData	+= '<option value="Treatable"> Treatable</option>';
								curCropData	+= '<option value="No potential of diseases"> No potential of diseases</option>';
							curCropData	+= '</select>';
						curCropData	+= '</div>';
					curCropData	+= '</div>';
									
					curCropData	+= '<div class="control-group">';
						curCropData	+= '<label for="text" class="control-label" style="margin-top:10px">What type of water sources you are depending on?<span style="color:#F00">*</span></label>';
						curCropData	+= '<div class="controls">';
							curCropData	+= '<select id="f14_water_source_type'+contentCountCurCrop+'" name="f14_water_source_type'+contentCountCurCrop+'" class="select2-me input-xlarge" data-rule-required="true" onchange="calTotal_f14();">';
								curCropData	+= '<option value="" disabled selected> Select here</option>';
								curCropData	+= '<option point="2" value="Rainwater Only" >Rainwater Only</option>';
								curCropData	+= '<option point="8" value="Irrigation">Irrigation</option>';
								curCropData	+= '<option point="4" value="Canals">Canals</option>';
								curCropData	+= '<option point="6" value="Others" >Others</option>';
							curCropData	+= '</select>';
						curCropData	+= '</div>';
					curCropData	+= '</div>';
									
					curCropData	+= '<div class="control-group">';
						curCropData	+= '<label for="tasktitel" class="control-label">When is the harvest date? <span style="color:#F00">*</span></label>';
						curCropData	+= '<div class="controls">';
							curCropData	+= '<input type="text" value="" id="f14_harvest_date'+contentCountCurCrop+'" name="f14_harvest_date'+contentCountCurCrop+'" placeholder="When is the harvest date" class="datepicker input-large" data-rule-required="true" />';
						curCropData	+= '</div>';
					curCropData	+= '</div>';
									
					curCropData	+= '<div class="control-group">';
						curCropData	+= '<label for="text" class="control-label" style="margin-top:10px">What is the net total income you are expecting in this crop cycle?<span style="color:#F00">*</span></label>';
						curCropData	+= '<div class="controls">';
							curCropData	+= '<input type="text" value="" id="f14_income'+contentCountCurCrop+'" name="f14_income'+contentCountCurCrop+'" class="input-xlarge" onKeyPress="return numsonly(event);" maxlength="10" data-rule-required="true" placeholder="What is the net total income you are expecting in this crop cycle">';
						curCropData	+= '</div>';
					curCropData	+= '</div>';
				curCropData	+= '</div>';
				
				if(contentCountCurCrop>1)
				{
					$('.removeCurCrop').show('swing');
				}
				
				$('#cur_crop').append(curCropData).find('#curcrop'+contentCountCurCrop).slideDown("slow");
				calTotal_f14();
			}
			
			function removeLoanFrm1Content()
			{
				if(contentCountLoanFrm1 > 1){
					
					$('#loans_type').find('#loan'+contentCountLoanFrm1).slideUp("slow", function(){
						$(this).remove();
						contentCountLoanFrm1--;
						if(contentCountLoanFrm1==1)
						{
							$('.removeLoanFrm1').hide('swing');
						}
						calTotal_f8();
					});
				}
			}
			
			function appendLoanFrm1Content()
			{
				contentCountLoanFrm1++;
				
				var loanData	= '';
				
				loanData	+= '<div id="loan'+contentCountLoanFrm1+'" style="padding:5px;border:1px solid #d6d6d6;margin:5px;display:none">';
					loanData	+= '<h3>Loan '+contentCountLoanFrm1+'</h3>';
					loanData	+= '<input type="hidden" name="id[]" id="id" value="">';
									
					loanData	+= '<div class="control-group">';
						loanData	+= '<label for="text" class="control-label" style="margin-top:10px">Mention the Loan Type<span style="color:#F00">*</span></label>';
						loanData	+= '<div class="controls">';
							loanData	+= '<select onchange="calTotal_f8();" id="f8_loan_type'+contentCountLoanFrm1+'" name="f8_loan_type'+contentCountLoanFrm1+'" class="select2-me input-xlarge" data-rule-required="true">';
								loanData	+= '<option value="" disabled selected> Select here</option>';
								loanData	+= '<option value="Education" >Education</option>';
								loanData	+= '<option value="Land">Land</option>';
								loanData	+= '<option value="Agriculture">Agriculture</option>';
								loanData	+= '<option value="Two Wheeler">Two Wheeler</option>';
								loanData	+= '<option value="Equipment">Equipment</option>';
								loanData	+= '<option value="Irrigation">Irrigation</option>';
								loanData	+= '<option value="Fencing">Fencing</option>';
								loanData	+= '<option value="Housing">Housing</option>';
								loanData	+= '<option value="Construction OR Renovation">Construction/Renovation</option>';
								loanData	+= '<option value="Four Wheeler">Four Wheeler</option>';
								loanData	+= '<option value="Electronics">Electronics</option>';
								loanData	+= '<option value="NA">NA</option>';
								loanData	+= '<option value="Others">Others</option>';
							loanData	+= '</select>';
						loanData	+= '</div>';
					loanData	+= '</div>';
									
					loanData	+= '<div class="control-group">';
						loanData	+= '<label for="numberfield" class="control-label">Total Loan Amount<span style="color:#F00">*</span></label>';
						loanData	+= '<div class="controls">';
							loanData	+= '<input type="text" class="input-xlarge" placeholder="Loan Amount" name="f8_loan_amount'+contentCountLoanFrm1+'" id="f8_loan_amount'+contentCountLoanFrm1+'" onKeyPress=" return numsonly(event);"  data-rule-required="true"  maxlength="10">';
						loanData	+= '</div>';
					loanData	+= '</div>';
									
					loanData	+= '<div class="control-group">';
						loanData	+= '<label for="numberfield" class="control-label">Provider<span style="color:#F00">*</span></label>';
						loanData	+= '<div class="controls">';
							loanData	+= '<input type="text" class="input-xlarge ui-wizard-content" placeholder="Loan Provider" name="f8_loan_provider'+contentCountLoanFrm1+'" id="f8_loan_provider'+contentCountLoanFrm1+'" data-rule-required="true"   >';
							loanData	+= '<label id="f8_loan_provider1_err" style="color:#FF0000;width:200px;margin-left:100px;"></label>';
						loanData	+= '</div>';
					loanData	+= '</div>';
									
					loanData	+= '<div class="control-group">';
						loanData	+= '<label for="numberfield" class="control-label">Current Outstanding Loan Amount With Interest<span style="color:#F00">*</span></label>';
						loanData	+= '<div class="controls">';
							loanData	+= '<input onchange="calTotal_f8();" data-rule-required="true" type="text" class="input-xlarge ui-wizard-content" onKeyPress="return numsonly(event);" placeholder="Outstanding Loan Amount With Interest" name="f8_outstanding_loan'+contentCountLoanFrm1+'" id="f8_outstanding_loan'+contentCountLoanFrm1+'" data-rule-number="true" data-rule-maxlength="10">';
						loanData	+= '</div>';
					loanData	+= '</div>';
									
					loanData	+= '<div class="control-group">';
						loanData	+= '<label for="numberfield" class="control-label">Therefore, No. of Months to clear Outstanding</label>';
						loanData	+= '<div class="controls">';
							loanData	+= '<input  type="text" class="input-xlarge ui-wizard-content" placeholder="No. Of EMI Remaining" name="f8_remaining_emi'+contentCountLoanFrm1+'" id="f8_remaining_emi'+contentCountLoanFrm1+'" data-rule-number="true" data-rule-required="true"  data-rule-maxlength="10">';
						loanData	+= '</div>';
					loanData	+= '</div>';
									
				loanData	+= '</div>';
				
				if(contentCountLoanFrm1>1)
				{
					$('.removeLoanFrm1').show('swing');
				}
				
				$('#loans_type').append(loanData).find('#loan'+contentCountLoanFrm1).slideDown("slow");
				calTotal_f8();
			}
			
			function get_variety(crop_id,no_of_crop)
			{
				
				$('#f14_variety'+no_of_crop).html("");
				
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
								$('#f14_variety'+no_of_crop).html(data.resp);
							} 
							else
							{
																				
							}
						},
						error: function (request, status, error) 
						{
							//$("#model_body").html('<span style="style="color:#F00;">'+request.responseText+'</span>');							
							//$('#error_model').modal('toggle');						
							loading_hide();
						},
						complete: function()
						{
							loading_hide();
							//$("#model_body").html('<span style="style="color:#F00;">'+request.responseText+'</span>');
							//$('#error_model').modal('toggle');
						}
					});			
			}
			
        </script>
    </body>
</html>