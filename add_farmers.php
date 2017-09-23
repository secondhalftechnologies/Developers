<?php 
	include('access1.php'); 
	include('include/connection.php');
	
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
                            <form  method="POST" enctype="multipart/form-data" class='form-horizontal form-bordered form-validate' id="frm_add_farmer" name="frm_add_farmer">
                            
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
                                    	Father's / Husband's Name <span style="color:#F00">*</span>
                                    </label>
                                    <div class="controls">
                                    	<input type="text" id="txt_father_name" name="txt_father_name" class="input-xlarge v_name" data-rule-required="true" data-rule-lettersonly="true" placeholder="Father's / Husband's Name">
                                    </div>
                                </div>	<!-- Father's / Husband's Name -->
                                
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
                                    	<input type="text" id="txt_dob" name="txt_dob" placeholder="Date Of Birth" class="input-large" data-rule-required="true" />
                                    </div>
                                </div>	<!-- DOB -->
                                
                                <div class="control-group">
                                	<label for="tasktitel" class="control-label">
                                    	Age In-Between<span style="color:#F00">*</span>
                                    </label>
                                    <div class="controls">
                                    	<select id="ddl_age_range" name="ddl_age_range" class="select2-me input-large">
                                        	<option value="">Select Age Range</option>
                                            <option value="21_25">21-25</option>
                                            <option value="26_30">26-30</option>
                                            <option value="31_35">31-35</option>
                                            <option value="36_45">36-45</option>
                                            <option value="46_60">46-60</option>
                                        </select>
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
                                    	<select id="ddl_farm_experience" name="ddl_farm_experience" class="select2-me input-large">
                                        	<option value="">Select Year Range</option>
                                            <option value="1_5">1 to 5</option>
                                            <option value="6_10">6 to 10</option>
                                            <option value="11_15">11 to 15</option>
                                            <option value="16_20">16 to 20</option>
                                            <option value="20_above">20 above</option>
                                        </select>
                                    </div>
                                </div>	<!-- Experience In Farming -->
                                
                                <div class="control-group">
                                	<label for="tasktitel" class="control-label">
                                    	Are You Married? <span style="color:#F00">*</span>
                                    </label>
                                    <div class="controls">
                                    	<input type="radio" name="rad_married_status" id="rad_married_status" autocomplete="off" data-rule-required="true" value="yes"> Yes
                                        &nbsp;&nbsp;
                                        <input type="radio" name="rad_married_status" id="rad_married_status" autocomplete="off" data-rule-required="true" value="no"> No
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
                                
                                <div class="control-group">
                                	<label for="tasktitel" class="control-label">Rent</label>
                                    <div class="controls">
                                    	<select id="ddl_rent" name="ddl_rent" class="select2-me input-large">
                                        	<option value="">Select Rent</option>
                                            <option value="0_500">0-500</option>
                                            <option value="501_800">501-800</option>
                                            <option value="801_1000">801-1000</option>
                                            <option value="1001_2500">1001-2500</option>
                                            <option value="2501_Above">2501 Above</option>
                                        </select>
                                    </div>
                                </div>	<!-- Rent [Only If Rental will select] -->
                                
                                <!-- START : Address Details -->
                                <div class="control-group">
                                    <div>
                                        <div style="float:left">
                                            <h3 style="margin:0px;">Address Details</h3>
                                        </div>
                                        <div style="margin-left:640px;">
                                            <input id="address_check" name="address_check" onClick="same_as_bill();" class="css-checkbox" value="CHK" type="checkbox">
                                            <label for="address_check" class="css-label" style="margin:12px;font-size:15px;">
                                            	Same As Permanent Address Details
                                            </label>
                                        </div>
                                    </div>
                                </div>	<!-- Address Details -->
                                
                                <div class="control-group span6" style="clear:both;">
                                    <label for="tasktitel" class="control-label">
                                    	Permanent Address <span style="color:#F00">*</span>
                                    </label>
                                    <div class="controls">
                                        <textarea id="far_permanent_addrs" name="far_permanent_addrs" ></textarea>
                                    </div>
                                </div>	<!-- Permanent Address -->
                                
                                <div class="control-group span6">
                                    <label for="tasktitel" class="control-label">Current Address <span style="color:#F00">*</span></label>
                                    <div class="controls">
                                        <textarea id="far_current_addrs" name="far_current_addrs" ></textarea>
                                    </div>
                                </div>	<!-- Current Address -->
                                
                                <div class="control-group span6" style="clear:both;">
                                	<label for="tasktitel" class="control-label">House No. <span style="color:#F00">*</span></label>
                                    <div class="controls">
                                    	<input type="text" id="txt_p_house_no" name="txt_p_house_no" placeholder="House Number" class="input-large" data-rule-required="true" data-rule-number="true" minlength="6" maxlength="6" size="6" />
                                    </div>
                                </div>	<!-- P House No. -->
                                
                                <div class="control-group span6">
                                	<label for="tasktitel" class="control-label">House No. <span style="color:#F00">*</span></label>
                                    <div class="controls">
                                    	<input type="text" id="txt_c_house_no" name="txt_c_house_no" placeholder="House Number" class="input-large" data-rule-required="true" data-rule-number="true" minlength="6" maxlength="6" size="6" />
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
                                	<label for="tasktitel" class="control-label">Village Name <span style="color:#F00">*</span></label>
                                    <div class="controls">
                                    	<input type="text" id="txt_p_village_name" name="txt_p_village_name" placeholder="Village Name" class="input-large" data-rule-required="true" />
                                    </div>
                                </div>	<!-- P Village Name -->
                                
                                <div class="control-group span6">
                                	<label for="tasktitel" class="control-label">Village Name <span style="color:#F00">*</span></label>
                                    <div class="controls">
                                    	<input type="text" id="txt_c_village_name" name="txt_c_village_name" placeholder="Village Name" class="input-large" data-rule-required="true" />
                                    </div>
                                </div>	<!-- C Village Name -->
                                
                                <div class="control-group span6" style="clear:both;">
                                	<label for="tasktitel" class="control-label">State <span style="color:#F00">*</span></label>
                                    <div class="controls">
                                    	<select id="ddl_p_state" name="ddl_p_state" class="select2-me input-large" >
                                        	<option value="">Select State</option>
                                        </select>
                                    </div>
                                </div>	<!-- P State -->
                                
                                <div class="control-group span6">
                                	<label for="tasktitel" class="control-label">State <span style="color:#F00">*</span></label>
                                    <div class="controls">
                                    	<select id="ddl_c_state" name="ddl_c_state" class="select2-me input-large" >
                                        	<option value="">Select State</option>
                                        </select>
                                    </div>
                                </div>	<!-- C State -->
                                
                                <div class="control-group span6" style="clear:both;">
                                	<label for="tasktitel" class="control-label">District <span style="color:#F00">*</span></label>
                                    <div class="controls">
                                    	<select id="ddl_p_dist" name="ddl_p_dist" class="select2-me input-large" >
                                        	<option value="">Select District</option>
                                        </select>
                                    </div>
                                </div>	<!-- P District -->
                                
                                <div class="control-group span6">
                                	<label for="tasktitel" class="control-label">District <span style="color:#F00">*</span></label>
                                    <div class="controls">
                                    	<select id="ddl_c_dist" name="ddl_c_dist" class="select2-me input-large" >
                                        	<option value="">Select District</option>
                                        </select>
                                    </div>
                                </div>	<!-- C District -->
                                
                                <div class="control-group span6" style="clear:both;">
                                	<label for="tasktitel" class="control-label">Taluka <span style="color:#F00">*</span></label>
                                    <div class="controls">
                                    	<select id="ddl_p_tal" name="ddl_p_tal" class="select2-me input-large" >
                                        	<option value="">Select Taluka</option>
                                        </select>
                                    </div>
                                </div>	<!-- P Taluka -->
                                
                                <div class="control-group span6">
                                	<label for="tasktitel" class="control-label">Taluka <span style="color:#F00">*</span></label>
                                    <div class="controls">
                                    	<select id="ddl_c_tal" name="ddl_c_tal" class="select2-me input-large" >
                                        	<option value="">Select Taluka</option>
                                        </select>
                                    </div>
                                </div>	<!-- C Taluka -->
                                
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
    
			function show_loan(status)
			{
				if(status==1)
				{
					$('#loan_req').show('swing');
				}
				else
				{
					$('#loan_req').hide('swing');
				}
			}
			
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