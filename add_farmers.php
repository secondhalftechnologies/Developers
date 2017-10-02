<?php 
	include('access1.php'); 
	include('include/connection.php');
	include('include/query-helper.php');
	
	$feature_name 	= 'Farmer';
	$home_name    	= "Home";
	$title			= 'Add Farmer';
	$home_url 	  	= "home.php";
	$filename		= 'view_farmers.php';
?>

<!DOCTYPE html>
<html class="not-ie no-js" lang="en">
    <head>
    	<?php
        /* This function used to call all header data like css files and links */
        headerdata($feature_name);
        /* This function used to call all header data like css files and links */
    	?>
    </head>
    <body class="<?php echo $theme_name; ?>" data-theme="<?php echo $theme_name; ?>">
        <?php
		/*include Bootstrap model pop up for error display*/
		modelPopUp();
		/*include Bootstrap model pop up for error display*/
		/* this function used to add naigation menu to the page*/
		navigation_menu();
		/* this function used to add navigation menu to the page*/
		?> <!-- Navigation Bar -->
        <div class="container-fluid" id="content">
            <div id="main" style="margin-left:0px !important">
	            <?php
				/* this function used to add navigation menu to the page*/
				breadcrumbs($home_url,$home_name,'Add Farmer',$filename,$feature_name);
				/* this function used to add navigation menu to the page*/
				?>
                <div class="container-fluid">
                    <div class="box box-color box-bordered lightgreen" style="padding:0px;">
                        <div class="box-title">
                            <h3>
                            	Add Farmer  
                            </h3>
                            <button type="button" class="btn-info_1" style= "float:right" onClick="location.href='<?php echo $BaseFolder; ?>view_farmers.php';" >
                                <i class="icon-arrow-left"></i>&nbsp Back
                            </button>
                        </div>
                        <div class="box-content nopadding">
                            <form method="POST" enctype="multipart/form-data" class='form-horizontal form-bordered form-validate' id="frm_add_farmer" name="frm_add_farmer">
                            	
                                <input type="hidden" id="hid_farmer_reg" name="hid_farmer_reg" value="1">
                            
                                <div class="control-group">
                                    <label for="text" class="control-label" style="margin-top:10px">
                                    	Name <span style="color:#F00">*</span>
                                    </label>
                                    <div class="controls">
                                    	<input type="text" id="txt_name" name="txt_name" class="input-xlarge v_name" data-rule-required="true" data-rule-lettersonly="true" placeholder="Entre Your Name">
                                    </div>
                                </div>	<!-- Name -->
                                
                                <div class="control-group">
                                    <label for="text" class="control-label" style="margin-top:10px">
                                    	Father's / Spouse's Name <span style="color:#F00">*</span>
                                    </label>
                                    <div class="controls">
                                    	<input type="text" id="txt_father_name" name="txt_father_name" class="input-xlarge" data-rule-required="true" data-rule-lettersonly="true" placeholder="Father's / Spouse's Name">
                                    </div>
                                </div>	<!-- Father's / Spouse's Name -->
                                
                                <div class="control-group">
                                    <label for="text" class="control-label" style="margin-top:10px">
                                    	Mother's Name <span style="color:#F00">*</span>
                                    </label>
                                    <div class="controls">
                                    	<input type="text" id="txt_mother_name" name="txt_mother_name" class="input-xlarge v_name" data-rule-required="true" data-rule-lettersonly="true" placeholder="Mother Name" >
                                    </div>
                                </div>	<!-- Mother's Name -->
                                
                                <div class="control-group">
                                	<label for="tasktitel" class="control-label">
                                    	Date Of Birth <span style="color:#F00">*</span>
                                    </label>
                                    <div class="controls">
                                    	<input type="text" id="txt_dob" name="txt_dob" placeholder="Date Of Birth" class="datepicker input-large" data-rule-required="true" />
                                    </div>
                                </div>	<!-- DOB -->
                                
                                <div class="control-group">
                                	<label for="tasktitel" class="control-label">
                                    	Age [In Year]<span style="color:#F00">*</span>
                                    </label>
                                    <div class="controls">
                                    	<input type="text" id="txt_age" name="txt_age" placeholder="Age" class="input-large" data-rule-required="true" data-rule-number="true" readonly />
                                    </div>
                                </div>	<!-- Age In-Between -->
                                
                                <div class="control-group">
                                	<label for="numberfield" class="control-label">
                                    	Mobile No. <span style="color:#F00">*</span>
                                    </label>
                                
                                    <div class="controls">
                                        <input type="text" placeholder="Mobile no" name="fm_mobileno" id="fm_mobileno" data-rule-number="true" maxlength="10"  autocomplete="off" data-rule-required="true" onBlur="Mobile(this.value);"  data-rule-minlength="10"  data-rule-maxlength="10" class="input-xlarge v_number">
                                        <label id="comp_2" style="color:#FF0000;width:200px;margin-left:100px;"></label>    
                                    </div>
                                </div> <!-- Mobile No -->
                                
                                <div class="control-group">
                                	<label for="numberfield" class="control-label">
                                    	Alternative Mobile No.
                                    </label>
                                
                                    <div class="controls">
                                        <input type="text" placeholder="Alternative Mobile no" name="alt_mobileno" id="alt_mobileno" data-rule-number="true" maxlength="10" autocomplete="off" onBlur="Mobile(this.value);" data-rule-minlength="10"  data-rule-maxlength="10" class="input-xlarge v_number">
                                        <label id="comp_2" style="color:#FF0000;width:200px;margin-left:100px;"></label>    
                                    </div>
                                </div> <!-- Alternative Mobile No -->
                                
                                <div class="control-group">
                                    <label for="numberfield" class="control-label">
                                    	Aadhaar No. <span style="color:#F00">*</span>
                                    </label>
                                    <div class="controls">
                                    	<input type="text" placeholder="Aadhaar no" name="fm_aadhar" id="fm_aadhar" data-rule-number="true" maxlength="12" data-rule-required="true" onBlur="Aadhaar(this.value);"  data-rule-minlength="12"  data-rule-maxlength="12" class="input-xlarge v_number">
                                    	<label id="comp_1" style="color:#FF0000;width:200px;margin-left:100px;"></label>
                                    </div>
                                </div> <!-- Aadhar Number -->
                                
                                <div class="control-group">
                                	<label for="tasktitel" class="control-label">
                                    	Experience In Farming <span style="color:#F00">*</span>
                                    </label>
                                    <div class="controls">
                                    	<input type="text" placeholder="Experience In Farming" name="txt_farm_experience" id="txt_farm_experience" class="v_number input-xlarge" data-rule-number="true" data-rule-required="true" data-rule-maxlength="2">
                                        <!--<select id="ddl_farm_experience" name="ddl_farm_experience" class="select2-me input-large">
                                        	<option value="">Select Year Range</option>
                                            <option value="1_5">1 to 5</option>
                                            <option value="6_10">6 to 10</option>
                                            <option value="11_15">11 to 15</option>
                                            <option value="16_20">16 to 20</option>
                                            <option value="20_above">20 above</option>
                                        </select>-->
                                    </div>
                                </div>	<!-- Experience In Farming -->
                                
                                <div class="control-group">
                                	<label for="tasktitel" class="control-label">
                                    	Are You Married? <span style="color:#F00">*</span>
                                    </label>
                                    <div class="controls">
                                    	<select id="ddl_married_status" name="ddl_married_status" class="select2-me input-xlarge">
                                            <option value="">Select here</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                        
                                        <!-- <input type="radio" name="rad_married_status" id="rad_married_status" autocomplete="off" data-rule-required="true" value="yes"> Yes
                                        &nbsp;&nbsp;
                                        <input type="radio" name="rad_married_status" id="rad_married_status" autocomplete="off" data-rule-required="true" value="no"> No -->
                                    </div>
                                </div>	<!-- Married Or Not -->
                                
                                <div class="control-group">
                                	<label for="tasktitel" class="control-label">
                                    	Residence Status <span style="color:#F00">*</span>
                                    </label>
                                    <div class="controls">
                                    	<select id="ddl_residence_status" name="ddl_residence_status" class="select2-me input-large">
                                        	<option value="">Select Residence Status</option>
                                            <option value="Rented">Rented</option>
                                            <option value="Owned">Owned</option>
                                            <option value="Ancestral">Ancestral</option>
                                        </select>
                                    </div>
                                </div>	<!-- Residence Status -->
                                
                                <div id="div_ifRental" style="display:none;">
                                    <div class="control-group">
                                        <label for="tasktitel" class="control-label">Rent</label>
                                        <div class="controls">
                                        	<input type="text" id="txt_rent" name="txt_rent" placeholder="Rent" data-rule-number="true" class="input-large" data-rule-maxlength="5" maxlength="5" size="5">
                                            <!-- <select id="ddl_rent" name="ddl_rent" class="select2-me input-large">
                                                <option value="">Select Rent</option>
                                                <option value="0_500">0-500</option>
                                                <option value="501_800">501-800</option>
                                                <option value="801_1000">801-1000</option>
                                                <option value="1001_2500">1001-2500</option>
                                                <option value="2501_Above">2501 Above</option>
                                            </select> -->
                                        </div>
                                    </div>	<!-- Rent [Only If Rental will select] -->
								</div>	<!-- Rent [Only If Rental will select] -->
                                
                                <!-- START : Address Details -->
                                <div class="control-group">
                                    <div>
                                        <div style="float:left">
                                            <h3 style="margin:0px;">Address Details</h3>
                                        </div>
                                        <div style="margin-left:640px;">
                                            <!--<input id="address_check" name="address_check" onClick="same_as_perment();" class="css-checkbox" value="CHK" type="checkbox">
                                            <label for="address_check" class="css-label" style="margin:12px;font-size:15px;">
                                            	Same As Permanent Address Details
                                            </label>-->
                                            <small>
                                            <a id="btnsame" class="btn btn-warning btn-sm">
                                                Same as Permanent
                                            </a>
                                            </small>
                                        </div>
                                    </div>
                                </div>	<!-- Address Details -->
                                
                                <div class="control-group span6" style="clear:both;">
                                    <label for="tasktitel">
                                    	<h4>Permanent Address</h4>
                                    </label>
                                </div>	<!-- Permanent Address -->
                                
                                <div class="control-group span6">
                                    <label for="tasktitel">
                                    	<h4>Current Address</h4>
                                    </label>
                                </div>	<!-- Current Address -->
                                
                                <div class="control-group span6" style="clear:both;">
                                	<label for="tasktitel" class="control-label">House No. <span style="color:#F00">*</span></label>
                                    <div class="controls">
                                    	<input type="text" id="txt_p_house_no" name="txt_p_house_no" placeholder="House Number" class="input-large" data-rule-required="true" data-rule-number="true" maxlength="6" size="6" />
                                    </div>
                                </div>	<!-- P House No. -->
                                
                                <div class="control-group span6">
                                	<label for="tasktitel" class="control-label">House No. <span style="color:#F00">*</span></label>
                                    <div class="controls">
                                    	<input type="text" id="txt_c_house_no" name="txt_c_house_no" placeholder="House Number" class="input-large" data-rule-required="true" data-rule-number="true" maxlength="6" size="6" />
                                    </div>
                                </div>	<!-- C House No. -->
                                
                                <div class="control-group span6" style="clear:both;">
                                	<label for="tasktitel" class="control-label">Street Name <span style="color:#F00">*</span></label>
                                    <div class="controls">
                                    	<input type="text" id="txt_p_street_name" name="txt_p_street_name" placeholder="Street Name" class="input-large" data-rule-required="true" />
                                    </div>
                                </div>	<!-- P Street Name -->
                                
                                <div class="control-group span6">
                                	<label for="tasktitel" class="control-label">Street Name <span style="color:#F00">*</span></label>
                                    <div class="controls">
                                    	<input type="text" id="txt_c_street_name" name="txt_c_street_name" placeholder="Street Name" class="input-large" data-rule-required="true" />
                                    </div>
                                </div>	<!-- C Street Name -->
                                
                                <div class="control-group span6" style="clear:both;">
                                	<label for="tasktitel" class="control-label">Area Name <span style="color:#F00">*</span></label>
                                    <div class="controls">
                                    	<input type="text" id="txt_p_area_name" name="txt_p_area_name" placeholder="Area Name" class="input-large" data-rule-required="true" />
                                    </div>
                                </div>	<!-- P Area Name -->
                                
                                <div class="control-group span6">
                                	<label for="tasktitel" class="control-label">Area Name <span style="color:#F00">*</span></label>
                                    <div class="controls">
                                    	<input type="text" id="txt_c_area_name" name="txt_c_area_name" placeholder="Area Name" class="input-large" data-rule-required="true" />
                                    </div>
                                </div>	<!-- C Area Name -->
                                
                                <div class="control-group span6" style="clear:both;">
                                	<label for="tasktitel" class="control-label">State <span style="color:#F00">*</span></label>
                                    <div class="controls">
                                    	<select id="ddl_p_state" name="ddl_p_state" onChange="getDist('p', this.value, 'ddl_p_dist', 'ddl_p_tal', 'ddl_p_village', 'div_p_dist', 'div_p_tal', 'div_p_village');" class="select2-me input-large" >
                                        	<option value="" disabled selected>Select State</option>
                                        	<?php
                                            $res_get_state	= lookup_value('tbl_state',array(),array(),array(),array(),array());
											
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
                                </div>	<!-- P State -->
                                
                                <div class="control-group span6">
                                	<label for="tasktitel" class="control-label">State <span style="color:#F00">*</span></label>
                                    <div class="controls">
                                    	<select id="ddl_c_state" name="ddl_c_state"  onChange="getDist('c', this.value, 'ddl_c_dist', 'ddl_c_tal', 'ddl_c_village', 'div_c_dist', 'div_c_tal', 'div_c_village');" class="select2-me input-large" >
                                        	<option value="" disabled selected>Select State</option>
                                        	<?php
                                            $res_get_state	= lookup_value('tbl_state',array(),array(),array(),array(),array());
											
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
                                </div>	<!-- C State -->
                                
                                <div class="control-group span6" style="clear:both;">
                                	<label for="tasktitel" class="control-label">District <span style="color:#F00">*</span></label>
                                    <div class="controls" id="div_p_dist">
                                    	<select id="ddl_p_dist" name="ddl_p_dist" class="select2-me input-large" >
                                        	<option value="" disabled selected>Select District</option>
                                        </select>
                                    </div>
                                </div>	<!-- P District -->
                                
                                <div class="control-group span6">
                                	<label for="tasktitel" class="control-label">District <span style="color:#F00">*</span></label>
                                    <div class="controls" id="div_c_dist">
                                    	<select id="ddl_c_dist" name="ddl_c_dist" class="select2-me input-large" >
                                        	<option value="" disabled selected>Select District</option>
                                        </select>
                                    </div>
                                </div>	<!-- C District -->
                                
                                <div class="control-group span6" style="clear:both;">
                                	<label for="tasktitel" class="control-label">Taluka <span style="color:#F00">*</span></label>
                                    <div class="controls" id="div_p_tal">
                                    	<select id="ddl_p_tal" name="ddl_p_tal" class="select2-me input-large" >
                                        	<option value="" disabled selected>Select Taluka</option>
                                        </select>
                                    </div>
                                </div>	<!-- P Taluka -->
                                
                                <div class="control-group span6">
                                	<label for="tasktitel" class="control-label">Taluka <span style="color:#F00">*</span></label>
                                    <div class="controls" id="div_c_tal">
                                    	<select id="ddl_c_tal" name="ddl_c_tal" class="select2-me input-large" >
                                        	<option value="" disabled selected>Select Taluka</option>
                                        </select>
                                    </div>
                                </div>	<!-- C Taluka -->
                                
                                <div class="control-group span6" style="clear:both;">
                                	<label for="tasktitel" class="control-label">Village Name <span style="color:#F00">*</span></label>
                                    <div class="controls" id="div_p_village">
                                    	<select id="ddl_p_village" name="ddl_p_village" class="select2-me input-large" >
                                        	<option value="" disabled selected>Select Village</option>
                                        </select>
                                    </div>
                                </div>	<!-- P Village Name -->
                            
                                <div class="control-group span6">
                                	<label for="tasktitel" class="control-label">Village Name <span style="color:#F00">*</span></label>
                                    <div class="controls" id="div_c_village">
                                    	<select id="ddl_c_village" name="ddl_c_village" class="select2-me input-large" >
                                        	<option value="" disabled selected>Select Village</option>
                                        </select>
                                    </div>
                                </div>	<!-- C Village Name -->
                                
                                <div class="control-group span6" style="clear:both;">
                                	<label for="tasktitel" class="control-label">Pin-Code <span style="color:#F00">*</span></label>
                                    <div class="controls">
                                    	<input type="text" id="txt_p_pincode" name="txt_p_pincode" placeholder="Pin-Code" class="input-large" data-rule-required="true" data-rule-number="true" minlength="6" maxlength="6" size="6" />
                                    </div>
                                </div>	<!-- P Pin-Code -->
                                
                                <div class="control-group span6">
                                	<label for="tasktitel" class="control-label">Pin-Code <span style="color:#F00">*</span></label>
                                    <div class="controls">
                                    	<input type="text" id="txt_c_pincode" name="txt_c_pincode" placeholder="Pin-Code" class="input-large" data-rule-required="true" data-rule-number="true" minlength="6" maxlength="6" size="6" />
                                    </div>
                                </div>	<!-- C Pin-Code -->
								<!-- END : Address Details -->
                                
                                <div class="form-actions" style="clear:both;">
                                    <button id="submit" name="Submit" type="submit" class="btn btn-primary" >Submit</button>
                                    <button id="reset" type="button" class="btn" onclick="window.history.back()">Cancel</button>
                                </div> <!-- Submit -->
                            
                            </form>	
                    	</div>
                	</div>   
                </div>
	        </div>
        </div>
    	<script language="javascript">
    		
			var baseurll = '<?php echo $BaseFolder; ?>';
			
			$(document).ready(function(){
				//$('#div_ifRental').slideUp();	
				$("#txt_rent").keydown(function (e) {
					// Allow: backspace, delete, tab, escape, enter and .
					if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
					// Allow: Ctrl/cmd+A
					(e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
					// Allow: Ctrl/cmd+C
					(e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
					// Allow: Ctrl/cmd+X
					(e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
					// Allow: home, end, left, right
					(e.keyCode >= 35 && e.keyCode <= 39)) 
					{
					// let it happen, don't do anything
						return;
					}
					// Ensure that it is a number and stop the keypress
					if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
						e.preventDefault();
					}
				});
			});
		
			$('#txt_dob').on('changeDate', function(e){
				var date1 = new Date($(this).val());
				var date2 = new Date();
				var timeDiff = Math.abs(date2.getTime() - date1.getTime());
				var diffyears = Math.ceil(timeDiff / (365 * 1000 * 3600 * 24)); 
				
				$('#txt_age').val(diffyears);
			});
			
			$('#ddl_residence_status').on('change', function(e){
				var residence_status	= $('#ddl_residence_status').val();
				if(residence_status == "Rented")
				{
					$('#div_ifRental').slideDown();	
				}
				else
				{
					$('#div_ifRental').slideUp();	
				}
			});
			
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
			
			$('#btnsame').on('click', function(e){
				e.preventDefault();

				$('#ddl_c_state').html($('#ddl_p_state').html());
				$('#ddl_c_dist').html($('#ddl_p_dist').html());
				$('#ddl_c_tal').html($('#ddl_p_tal').html());
				$('#ddl_c_village').html($('#ddl_p_village').html());

				$('#txt_c_house_no').val($('#txt_p_house_no').val()).hide().show('swing');
				$('#txt_c_street_name').val($('#txt_p_street_name').val()).hide().show('swing');
				$('#txt_c_pincode').val($('#txt_p_pincode').val()).hide().show('swing');
				$('#ddl_c_village').val($('#ddl_p_village').val()).hide().show('swing');
				$('#ddl_c_tal').val($('#ddl_p_tal').val()).hide().show('swing');
				$('#ddl_c_dist').val($('#ddl_p_dist').val()).hide().show('swing');
				$('#ddl_c_state').val($('#ddl_p_state').val()).hide().show('swing');
				$('#txt_c_area_name').val($('#txt_p_area_name').val()).hide().show('swing');
			});
			
			$('#frm_add_farmer').on('submit', function(e) 
			{
				e.preventDefault();
				if ($('#frm_add_farmer').valid())
				{
					$.ajax({
						url: "load_farmer.php?",
						type: "POST",
						data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
						contentType: false,       // The content type used when sending data to the server.
						cache: false,             // To unable request pages to be cached
						processData:false,        // To send DOMDocument or non processed data file it is set to false
						async:true,						
							success: function(response) 
							{   data = JSON.parse(response);
								if(data.Success == "Success") 
								{  
									location.href	= baseurll + "/view_farmers.php?pag=farmers";
								} 
								else 
								{   
									alert(data.resp);
									location.href	= baseurll + "/error-404";
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
								//alert("complete");
								loading_hide();
							}
						});
				}
			});
			
			function getXMLHTTP()	//fuction to return the xml http object 
			{ 
			
					var xmlhttp=false;	
			
					try{
			
						xmlhttp=new XMLHttpRequest();
			
					}
			
					catch(e)	{		
			
						try{			
			
							xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			
						}
			
						catch(e){
			
							try{
			
							xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
			
							}
			
							catch(e1){
			
								xmlhttp=false;
			
							}
			
						}
			
					}
			
						
			
					return xmlhttp;
			
				}
			
			function Aadhaar(comp1) 
			{		
				if(!isNaN(comp1) && comp1 != '' && comp1 != 'undefined' && comp1.length === 12)
				{
					var strURL="viewaadhaar.php?comp1="+comp1;
					var req = getXMLHTTP();
					if (req) {
		
						
		
						req.onreadystatechange = function() {
		
							if (req.readyState == 4) {
		
								// only if "OK"
		
								if (req.status == 200) {						
		
									document.getElementById('comp_1').innerHTML=req.responseText;
		
										var g=document.getElementById('fm_aadhar').value;
		
										if(g==2)
		
										{
		
											<!--alert(" User Already registered with this username");-->
		
												document.getElementById('fm_aadhar').value="";
		
										}
		
										else
		
										{
		
											
		
										}						
		
								} else {
		
									alert("There was a problem while using XMLHTTP:\n" + req.statusText);
		
								}
		
							}				
		
						}			
		
						req.open("GET", strURL, true);
		
						req.send(null);
		
					}
				}
			}	
			
			function Mobile(comp2) 
			{		
				if(!isNaN(comp2) && comp2 != '' && comp2 != 'undefined' && comp2.length === 10)
				{
					
					var strURL="viewmobile.php?comp2="+comp2;
					var req = getXMLHTTP();
					if (req) {
		
						
		
						req.onreadystatechange = function() {
		
							if (req.readyState == 4) {
		
								// only if "OK"
		
								if (req.status == 200) {						
		
									document.getElementById('comp_2').innerHTML=req.responseText;
		
										var g=document.getElementById('fm_mobileno').value;
		
										if(g==2)
		
										{
		
											<!--alert(" User Already registered with this username");-->
		
												document.getElementById('fm_mobileno').value="";
		
										}
		
										else
		
										{
		
											
		
										}						
		
								} else {
		
									alert("There was a problem while using XMLHTTP:\n" + req.statusText);
		
								}
		
							}				
		
						}			
		
						req.open("GET", strURL, true);
		
						req.send(null);
		
					}
				}
			}		
				
	    </script>
    </body>
</html>