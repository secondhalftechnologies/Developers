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
?>
<!DOCTYPE html>
<html>
    <head>
    	<?php
        	headerdata($feature_name);
		?>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!-- <title>Farmer Details</title> -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <!-- Apple devices fullscreen -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!-- Apple devices fullscreen -->
        <meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
        <!-- Bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- jQuery UI -->
        <link rel="stylesheet" href="css/plugins/jquery-ui/smoothness/jquery-ui.html">
        <link rel="stylesheet" href="css/plugins/jquery-ui/smoothness/jquery.ui.theme.html">
        <!-- Notify -->
        <link rel="stylesheet" href="css/plugins/gritter/jquery.gritter.css">
        <!-- Theme CSS -->
        <link rel="stylesheet" href="css/style.css">
        <!-- Color CSS -->
        <link rel="stylesheet" href="css/themes.css">
        
        <!-- jQuery -->
        <script src="js/jquery.min.js"></script>
    
        <!-- Nice Scroll -->
        <script src="js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
        <!-- imagesLoaded -->
        <script src="js/plugins/imagesLoaded/jquery.imagesloaded.min.js"></script>
        <!-- jQuery UI -->
        <script src="js/plugins/jquery-ui/jquery.ui.core.min.html"></script>
        <script src="js/plugins/jquery-ui/jquery.ui.widget.min.html"></script>
        <script src="js/plugins/jquery-ui/jquery.ui.mouse.min.html"></script>
        <script src="js/plugins/jquery-ui/jquery.ui.resizable.min.html"></script>
        <script src="js/plugins/jquery-ui/jquery.ui.sortable.min.html"></script>
        <!-- slimScroll -->
        <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Bootbox -->
        <script src="js/plugins/bootbox/jquery.bootbox.js"></script>
        <!-- Notify -->
        <script src="js/plugins/gritter/jquery.gritter.min.js"></script>
    
        <!-- Theme framework -->
        <script src="js/eakroko.min.js"></script>
        <!-- Theme scripts -->
        <script src="js/application.min.js"></script>
        <!-- Just for demonstration -->
        <script src="js/demonstration.min.js"></script>
    	
        
        <!-- Favicon -->
        <link rel="shortcut icon" href="img/favicon.ico" />
        <!-- Apple devices Homescreen icon -->
        <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-precomposed.png" />
        <style type="text/css">
        .tabs.tabs-inline.tabs-left 
        {
            background: #eee none repeat scroll 0 0;
            position: absolute;
            width: 150px;
        }
        </style>
    </head>
    
    <body class="<?php echo $theme_name; ?>" data-theme="<?php echo $theme_name; ?>">
    	<?php
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
                                                            <li class='active'>
                                                                <a href="#div_spouse_details" data-toggle='tab'>
                                                                    <i class="fa fa-lock"></i>Spouse Details
                                                               	</a>
                                                            </li>	<!-- Spouse Details -->
                                                            <li>
                                                                <a href="#div_appli_knowledge" data-toggle='tab'>
                                                                    <i class="fa fa-user"></i>Applicant's Knowledge
                                                                </a>
                                                            </li>	<!-- Applicant's Knowledge -->
                                                            <li>
                                                                <a href="#div_phone_details" data-toggle='tab'>
                                                                    <i class="fa fa-twitter"></i>Phone Details
                                                                </a>
                                                            </li>	<!-- Applicant's Phone Details -->
                                                            <li>
                                                                <a href="#div_family_details" data-toggle='tab'>
                                                                    <i class="fa fa-twitter"></i>Family Details
                                                                </a>
                                                            </li>	<!-- Family Details -->
                                                            <li>
                                                                <a href="#div_appliances_motors" data-toggle='tab'>
                                                                    <i class="fa fa-twitter"></i>Appliances / Motors 
                                                                </a>
                                                            </li>	<!-- Appliances / Motors -->
                                                        </ul>
                                                    </div>	<!-- Side Menu [Form Name] -->
                                                    <div class="tab-content padding tab-content-inline">
                                                        <div class="tab-pane active" id="div_spouse_details">
                                                    		Spouse Details
                                                            <form method="POST" enctype="multipart/form-data" class='form-horizontal form-bordered form-validate' id="frm_spouse_details" name="frm_spouse_details">
                                                            	
                                                                <div class="control-group">
                                                                    <label for="text" class="control-label" style="margin-top:10px">
                                                                        Spouse Name <span style="color:#F00">*</span>
                                                                    </label>
                                                                    <div class="controls">
                                                                        <input type="text" id="txt_spouse_name" name="txt_spouse_name" class="input-xlarge v_name" data-rule-required="true" data-rule-lettersonly="true" placeholder="Entre Your Spouse Name">
                                                                    </div>
                                                                </div>	<!-- Spouse Name -->
                                                                
                                                                <div class="control-group">
                                                                    <label for="text" class="control-label" style="margin-top:10px">
                                                                        Spouse Age <span style="color:#F00">*</span>
                                                                    </label>
                                                                    <div class="controls">
                                                                        <input type="text" id="txt_spouse_age" name="txt_spouse_age" class="input-xlarge v_name" data-rule-required="true" data-rule-number="true" maxlength="3" size="3" placeholder="Entre Your Spouse Age">
                                                                    </div>
                                                                </div>	<!-- Spouse Age -->
                                                                
                                                                <div class="control-group">
                                                                    <label for="numberfield" class="control-label">
                                                                        Spouse Mobile Number <span style="color:#F00">*</span>
                                                                    </label>
                                                                
                                                                    <div class="controls">
                                                                        <input type="text" placeholder="Spouse Mobile Number" name="txt_spouse_mobile_no" id="txt_spouse_mobile_no" data-rule-number="true" maxlength="10"  autocomplete="off" data-rule-required="true" data-rule-minlength="10"  data-rule-maxlength="10" class="input-xlarge v_number">
                                                                        <label id="comp_2" style="color:#FF0000;width:200px;margin-left:100px;"></label>    
                                                                    </div>
                                                                </div>	<!-- Spouse Mobile Number -->
                                                                
                                                                <div class="control-group">
                                                                    <label for="numberfield" class="control-label">
                                                                        Spouse Aadhaar No. <span style="color:#F00">*</span>
                                                                    </label>
                                                                    <div class="controls">
                                                                        <input type="text" placeholder="Spouse Aadhaar no" name="txt_spouse_aadhar" id="txt_spouse_aadhar" data-rule-number="true" maxlength="12" data-rule-required="true" onBlur="Aadhaar(this.value);"  data-rule-minlength="12"  data-rule-maxlength="12" class="input-xlarge v_number">
                                                                        <label id="comp_1" style="color:#FF0000;width:200px;margin-left:100px;"></label>
                                                                    </div>
                                                                </div> <!-- Spouse Aadhaar Number -->
                                                                
                                                                <div class="control-group">
                                                                    <label for="tasktitel" class="control-label">
                                                                        Part of any SHG? <span style="color:#F00">*</span>
                                                                    </label>
                                                                    <div class="controls">
                                                                        <select id="ddl_part_of_shg" name="ddl_part_of_shg" class="select2-me input-xlarge" onchange="changeDivDisplay(this.value, 'div_shg_name');">
                                                                            <option value="">Select here</option>
                                                                            <option value="yes">Yes</option>
                                                                            <option value="no">No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>	<!-- Part of any SHG [Radio] -->
                                                                
                                                                <div id="div_shg_name" style="display: none;">
                                                                    <div class="control-group">
                                                                        <label for="text" class="control-label" style="margin-top:10px">
                                                                            SHG Name <span style="color:#F00">*</span>
                                                                        </label>
                                                                        <div class="controls">
                                                                            <input type="text" id="txt_shg_name" name="txt_shg_name" class="input-xlarge v_name" placeholder="Entre Your SHG Name">
                                                                        </div>
                                                                    </div>    
                                                                </div>  <!-- SHG Name [If Yes] -->
                                                                
                                                                <div class="control-group">
                                                                    <label for="tasktitel" class="control-label">Spouse Occupation</label>
                                                                    <div class="controls">
                                                                        <select id="ddl_spouse_occupation" name="ddl_spouse_occupation" class="select2-me input-large" onchange="changeDivDisplay(this.value, 'div_spouse_income');">
                                                                            <option value="">Select Spouse Occupation</option>
                                                                            <option value="Housewife">Housewife</option>
                                                                            <option value="Farmer">Farmer</option>
                                                                            <option value="Other">Other</option>
                                                                        </select>
                                                                    </div>
                                                                </div>	<!-- Spouse Occupation [DDL] -->
                                                                
                                                                <div id="div_spouse_income" style="display: none;">
                                                                    <div class="control-group">
                                                                        <label for="tasktitel" class="control-label">Spouse Income</label>
                                                                        <div class="controls">
                                                                            <input type="text" placeholder="Spouse Income" name="txt_spouse_incode" id="txt_spouse_incode" data-rule-number="true" maxlength="10"  autocomplete="off" data-rule-required="true" data-rule-maxlength="10" class="input-xlarge v_number">
                                                                        </div>
                                                                    </div>
                                                                </div>  <!-- Spouse Income [If not Housewife] -->
                                                                
                                                                <div class="control-group">
                                                                    <label for="tasktitel" class="control-label">
                                                                        Mony Taken From Microfinance? <span style="color:#F00">*</span>
                                                                    </label>
                                                                    <div class="controls">
                                                                        <select id="ddl_mony_isTaken" name="ddl_mony_isTaken" class="select2-me input-xlarge" onchange="changeDivDisplay(this.value, 'div_microfinance_display');">
                                                                            <option value="">Select here</option>
                                                                            <option value="yes">Yes</option>
                                                                            <option value="no">No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>	<!-- Microfinance help taken [DDL] -->
                                                                
                                                                <div id="div_microfinance_display" style="display: none;">
                                                                    <div class="control-group">
                                                                        <label for="text" class="control-label" style="margin-top:10px">
                                                                            Microfinance Name <span style="color:#F00">*</span>
                                                                        </label>
                                                                        <div class="controls">
                                                                            <input type="text" id="txt_microfinance_name" name="txt_microfinance_name" class="input-xlarge v_name" placeholder="Entre Your Microfinance Name">
                                                                        </div>
                                                                    </div>	<!-- Name of the Microfinance [If Yes] -->
                                                                    
                                                                    <div class="control-group">
                                                                        <label for="tasktitel" class="control-label">Mony Taken From Microfinance</label>
                                                                        <div class="controls">
                                                                            <input type="text" placeholder="Mony Taken From Microfinance" name="txt_mony_taken_from_mf" id="txt_mony_taken_from_mf" data-rule-number="true" maxlength="10"  autocomplete="off" data-rule-required="true" data-rule-maxlength="10" class="input-xlarge v_number">
                                                                        </div>
                                                                    </div>	<!-- How much mony taken from Microfinance [DDL] [If yes] -->
                                                                </div>  <!-- If Micro-Finance DDL Yes -->
                                                                
                                                                <div class="control-group">
                                                                    <label for="tasktitel" class="control-label">
                                                                        Affliation to any association? <span style="color:#F00">*</span>
                                                                    </label>
                                                                    <div class="controls">
                                                                        <select id="ddl_affliation" name="ddl_affliation" class="select2-me input-xlarge" onchange="changeDivDisplay(this.value, 'div_affliation_display');">
                                                                            <option value="">Select here</option>
                                                                            <option value="yes">Yes</option>
                                                                            <option value="no">No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>	<!-- Affliation to any association [DDL] -->
                                                                
                                                                <div id="div_affliation_display" style="display: none;">
                                                                    <div class="control-group">
                                                                        <label for="text" class="control-label" style="margin-top:10px">
                                                                            FPO/FPC Name <span style="color:#F00">*</span>
                                                                        </label>
                                                                        <div class="controls">
                                                                            <input type="text" id="txt_fpo_name" name="txt_fpo_name" class="input-xlarge v_name" data-rule-lettersonly="true" placeholder="Entre FPO/FPC Name">
                                                                        </div>
                                                                    </div>	<!-- Name Of FPO / FPC [If Yes] -->
                                                                </div>  <!-- If affliation DDL Yes -->

                                                                <div class="control-group">
                                                                    <label for="text" class="control-label" style="margin-top:10px">
                                                                        Co-operative society / Bank Name <span style="color:#F00">*</span>
                                                                    </label>
                                                                    <div class="controls">
                                                                        <input type="text" id="txt_spouse_bank_name" name="txt_spouse_bank_name" class="input-xlarge v_name" data-rule-required="true" data-rule-lettersonly="true" placeholder="Co-operative society / Bank Name">
                                                                    </div>
                                                                </div>	<!-- Co-operative society / Bank Name -->
                                                                
                                                                <div class="form-actions" style="clear:both;">
                                                                    <button id="submit" name="Submit" type="submit" class="btn btn-primary" >Submit</button>
                                                                    <button id="reset" type="button" class="btn" onclick="window.history.back()">Cancel</button>
                                                                </div> <!-- Submit -->
                                
                                                            </form>
                                                        </div>	<!-- Spouse Details -->
                                                        <div class="tab-pane" id="div_appli_knowledge">
                                                           	Applicant's Knowledge
                                                          	<form method="POST" enctype="multipart/form-data" class='form-horizontal form-bordered form-validate' id="div_appli_knowledge" name="div_appli_knowledge">
                                                            	
                                                                <div class="control-group">
                                                                    <label for="text" class="control-label" style="margin-top:10px">Educational Qualification Details <span style="color:#F00">*</span></label>
                                                                    <div class="controls">
                                                                        <select id="ddl_edudetails" name="ddl_edudetails" class="select2-me input-xlarge" data-rule-required="true" onchange="calTotal()">
                                                                            <option value="" disabled selected> Select here</option>
                                                                            <option value="illiterate" point="2">Illiterate</option>
                                                                            <option value="primary_education" point="4">Primary Education</option>
                                                                            <option value="matriculate" point="6">Matriculate</option>
                                                                            <option value="graduate" point="8">Graduate</option>
                                                                            <option value="post_graduate" point="10">Post Graduate</option>
                                                                        </select>
                                                                    </div>
                                                                </div>	<!-- Educational Qualification Details [DDL] -->
                                                                
                                                                <div class="control-group">
                                                                    <label for="text" class="control-label" style="margin-top:10px">Regional Language Knowledge <span style="color:#F00">*</span></label>
                                                                    <div class="controls">
                                                                        <select id="ddl_regional_lang" name="ddl_regional_lang" class="select2-me input-xlarge" data-rule-required="true" onchange="calTotal()">
                                                                            <option value="" disabled selected> Select here</option>
                                                                            <option value="read_write" point="10">Read and Write</option>
                                                                            <option value="read_only" point="5">Read Only</option>
                                                                            <option value="understand_only" point="0">Understand Only</option>
                                                                        </select>
                                                                    </div>
                                                                </div>	<!-- Regional Language Knowledge [DDL] -->
                                                                
                                                                <div class="control-group">
                                                                    <label for="text" class="control-label" style="margin-top:10px">Participation in Farming Programs</label>
                                                                    <div class="controls">
                                                                        <select id="ddl_participation" name="ddl_participation" data-rule-required="true" class="select2-me input-xlarge" onchange="changeDivDisplay(this.value, 'program_detail');">
                                                                            <option value="" disabled selected> Select here</option>
                                                                            <option value="yes" point="10"> Yes</option>
                                                                            <option value="no" point="0"> No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>	<!-- Participation in any Farming Program / Trainings [DDL] -->
                                                                
                                                                <div id="program_detail" style="display: none; padding: 10px; border:1px solid #d6d6d6; margin: 20px;">
                                                                
                                                                    <div class="control-group">
                                                                        <label for="text" class="control-label" style="margin-top:10px">Type of the training Programs<span style="color:#F00">*</span></label>
                                                                        <div class="controls">
                                                                            <select id="ddl_typeprog" name="ddl_typeprog" class="select2-me input-xlarge" data-rule-required="true">
                                                                                <option value="" disabled selected> Select here</option>
                                                                                <option value="organic_farming_training"> Organic Farming Training</option>
                                                                                <option value="equipment_training"> Equipment Training</option>
                                                                                <option value="technology_training"> Technology Training</option>
                                                                                <option value="pesticide_fertilizer_training"> Pesticide/Fertilizer Training</option>
                                                                                <option value="other_farming_training"> Other Farming Training</option>
                                                                                <option value="others"> Others</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>	<!-- Type of Training Programs [If Yes] -->
                                                                    
                                                                    <div class="control-group">
                                                                        <label for="numberfield" class="control-label">
                                                                            What was the duration of the program?<span style="color:#F00">*</span>
                                                                        </label>
                                                                    
                                                                        <div class="controls">
                                                                            <input type="text" placeholder="What was the duration of the program?" name="txt_farm_prog_duration" id="txt_farm_prog_duration" data-rule-number="true" maxlength="2" autocomplete="off" data-rule-maxlength="2" class="input-xlarge v_number">
                                                                        </div>
                                                                    </div>  <!-- What was the duration of the program [If Yes] -->
                                                                    
                                                                    <div class="control-group">
                                                                        <label for="text" class="control-label" style="margin-top:10px">
                                                                            Who conducted the Program? <span style="color:#F00">*</span>
                                                                        </label>
                                                                        <div class="controls">
                                                                            <input type="text" id="txt_farm_prog_conducted_by" name="txt_farm_prog_conducted_by" class="input-xlarge v_name" data-rule-required="true" data-rule-lettersonly="true" placeholder="Who conducted the Program?">
                                                                        </div>
                                                                    </div>  <!-- Who conducted the Program [If Yes] -->
                                                                    
                                                                    <div class="control-group">
                                                                        <label for="text" class="control-label" style="margin-top:10px">
                                                                            For which crop was the program held? <span style="color:#F00">*</span>
                                                                        </label>
                                                                        <div class="controls">
                                                                            <input type="text" id="txt_farm_prog_crop" name="txt_farm_prog_crop" class="input-xlarge v_name" data-rule-required="true" placeholder="For which crop was the program held?">
                                                                        </div>
                                                                    </div>  <!-- For which crop was the program held [If Yes] -->
                                                                </div> 	<!-- [If Yes wala div] -->
                                                                
                                                                <div class="form-actions" style="clear:both;">
                                                                    <button id="submit" name="Submit" type="submit" class="btn btn-primary" >Submit</button>
                                                                    <button id="reset" type="button" class="btn" onclick="window.history.back()">Cancel</button>
                                                                </div> <!-- Submit -->
                                                                
                                                            </form>
                                                        </div>	<!-- Applicant's Knowledge -->
                                                        <div class="tab-pane" id="div_phone_details">
                                                           	Applicant's Phone Details
                                                        	<form method="POST" enctype="multipart/form-data" class='form-horizontal form-bordered form-validate' id="frm_phone_details" name="frm_phone_details">
																
                                                                <div class="control-group">
                                                                    <label for="text" class="control-label" style="margin-top:10px">Type of phone ownership <span style="color:#F00">*</span></label>
                                                                    <div class="controls">
                                                                        <select id="ddl_phonetype" name="ddl_phonetype" class="select2-me input-xlarge" data-rule-required="true" onchange="changeDivDisplay(this.value, 'div_smartphone_display')">
                                                                            <option value="" disabled selected> Select here</option>
                                                                            <option value="smartphone" >Smartphone</option>
                                                                            <option value="featurephone" >Featurephone</option>
                                                                        </select>
                                                                    </div>
                                                                </div>	<!-- Type of phone ownership -->
                                                                
                                                                <div class="control-group">
                                                                    <label for="text" class="control-label" style="margin-top:10px">Does any of your family member own a Smart Phone? <span style="color:#F00">*</span></label>
                                                                    <div class="controls">
                                                                        <select id="ddl_own_sp" name="ddl_own_sp" class="select2-me input-xlarge" data-rule-required="true">
                                                                            <option value="" disabled selected> Select here</option>
                                                                            <option value="yes" >Yes</option>
                                                                            <option value="no" >No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>	<!-- Does any of your family member own a Smart Phone?  -->
                                                                
                                                                <div class="control-group">
                                                                    <label for="text" class="control-label" style="margin-top:10px">Who is the Service Provider?</label>
                                                                    <div class="controls">
                                                                        <select data-rule-required="true" id="ddl_servpro" name="ddl_servpro" class="input-xlarge" >
                                                                            <option value="" disabled selected> Select here</option>
                                                                            <option value="aircel">Aircel</option>
                                                                            <option value="airtel">Airtel</option>
                                                                            <option value="jio">Jio</option>
                                                                            <option value="relience">Relience</option>
                                                                            <option value="tata docomo">Tata Docomo</option>
                                                                            <option value="tata">Tata</option>
                                                                            <option value="uninor">Uninor</option>
                                                                            <option value="vodafone">Vodafone</option>
                                                                        </select>
                                                                    </div>
                                                                </div>	<!-- Who is the Service Provider -->
                                                                
                                                                <div class="control-group">
                                                                    <label for="text" class="control-label" style="margin-top:10px">Do you receive sufficeint network Coverage?</label>
                                                                    <div class="controls">
                                                                        <select data-rule-required="true" id="ddl_network" name="ddl_network" class="input-xlarge">
                                                                            <option value="" disabled selected> Select here</option>
                                                                            <option value="yes"> Yes</option>
                                                                            <option value="no"> No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>	<!-- Do you receive sufficeint network coverage? -->
                                                                
                                                                <div id="div_smartphone_display" style="display: none;">

                                                                    <div class="control-group" >
                                                                        <label for="text" class="control-label" style="margin-top:10px">Do you have Data Pack on your Phone ?</label>
                                                                        <div class="controls">
                                                                            <select id="ddl_datapack" name="ddl_datapack" class="input-xlarge" onchange="changeDivDisplay(this.value, 'div_datapack_display');">
                                                                                <option value="" disabled selected> Select here</option>
                                                                                <option value="yes"> Yes</option>
                                                                                <option value="no"> No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>	<!-- Do you have data pack on your phone? -->
                                                                    
                                                                    <div id="div_datapack_display" style="display: none;">
                                                                        <div class="control-group" >
                                                                            <label for="text" class="control-label" style="margin-top:10px">Specify Data pack</label>
                                                                            <div class="controls">
                                                                                <select id="f5_datapackname" name="f5_datapackname" class="input-xlarge">
                                                                                    <option value="" disabled selected> Select here</option>
                                                                                    <option value="2g"> 2G</option>
                                                                                    <option value="3g"> 3G</option>
                                                                                    <option value="4g"> 4G</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>	<!-- Specify if it is [2G / 3G / 4G] -->
                                                                        
                                                                        <div class="control-group" id="farmappInput">
                                                                            <label for="text" class="control-label" style="margin-top:10px">Subscriptions to Farming Advisory Apps?</label>
                                                                            <div class="controls">
                                                                                <select id="ddl_farmapp" name="ddl_farmapp" class="input-xlarge">
                                                                                    <option value="" disabled selected> Select here</option>
                                                                                    <option value="yes"> Yes</option>
                                                                                    <option value="no"> No</option>
                                                                                </select>
                                                                            </div>
                                                                        </div><!-- Subscription to Farming Advisory Apps? -->
                                                                    </div>
                                                                   
                                                                    <div class="control-group" >
                                                                        <label for="text" class="control-label" style="margin-top:10px">Do you use apps regularly</label>
                                                                        <div class="controls">
                                                                            <select id="f5_appuse" name="f5_appuse" class="input-xlarge" onchange="changeDivDisplay(this.value, 'div_used_app_name_display');">
                                                                                <option value="" disabled selected> Select here</option>
                                                                                <option value="yes"> Yes</option>
                                                                                <option value="no"> No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>  <!-- Do you use apps regularly? -->
                                                                    
                                                                    <div id="div_used_app_name_display" style="display: none;">
                                                                        <div class="control-group">
                                                                            <label for="text" class="control-label" style="margin-top:10px">
                                                                                Specify name of the App <span style="color:#F00">*</span>
                                                                            </label>
                                                                            <div class="controls">
                                                                                <input type="text" id="txt_app_name" name="txt_app_name" class="input-xlarge v_name" data-rule-required="true" data-rule-lettersonly="true" placeholder="Specify name of the App">
                                                                            </div>
                                                                        </div>  <!-- Specify name of the App [If Yes] -->
                                                                    </div>
                                                                
                                                                </div>  <!-- If phone type will be smartphone only -->

                                                                <div class="form-actions" style="clear:both;">
                                                                    <button id="submit" name="Submit" type="submit" class="btn btn-primary" >Submit</button>
                                                                    <button id="reset" type="button" class="btn" onclick="window.history.back()">Cancel</button>
                                                                </div> <!-- Submit -->
                                                                
                                                            </form>
                                                        </div>	<!-- Applicant's Phone Details -->
                                                        <div class="tab-pane" id="div_family_details">
                                                            Family Details
                                                            <form method="POST" enctype="multipart/form-data" class='form-horizontal form-bordered form-validate' id="frm_family_details" name="frm_family_details">
                                                            	
                                                                <div class="control-group">
                                                                    <label for="text" class="control-label" style="margin-top:10px">Do you live in a Joint Family?<span style="color:#F00">*</span></label>
                                                                    <div class="controls">
                                                                        <select id="ddl_jointfamily" name="ddl_jointfamily" class="input-xlarge" data-rule-required="true" >
                                                                            <option value="" disabled selected> Select here</option>
                                                                            <option value="yes" point="10"> Yes</option>
                                                                            <option value="no" point="4"> No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>	<!-- Do you live in joint Family? -->
                                                                
                                                                <div class="control-group">
                                                                    <label for="text" class="control-label" style="margin-top:10px">How many members are there in your family?<span style="color:#F00">*</span></label>
                                                                    <div class="controls">
                                                                        <select id="ddl_members" name="ddl_members" class="input-xlarge" data-rule-required="true">
                                                                            <option value="" disabled selected> Select here</option>
                                                                            <?php 
                                                                                for($i=1; $i<21; $i++)
																				{
                                                                                    ?>
																					<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
																					<?php
                                                                                }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>	<!-- How many members are there in your family -->
                                                                
                                                                <div class="control-group">
                                                                    <label for="text" class="control-label" style="margin-top:10px">Number of Children<span style="color:#F00">*</span></label>
                                                                    <div class="controls">
                                                                        <select id="ddl_children" name="ddl_children" class="input-xlarge" data-rule-required="true" onchange="changeDivDisplay(this.value, 'div_IsChild_use_smartphone')">
                                                                            <option value="" disabled selected> Select here</option>
                                                                            <?php 
                                                                                for($i=0; $i<16; $i++)
																				{
                                                                                    ?>
																					<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
																					<?php
																				}
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>  <!-- Number of Children the farmer has -->
                                                                
                                                                <div id="div_IsChild_use_smartphone" style="display: none;">
                                                                    <div class="control-group" id="use_smartphone">
                                                                        <label for="text" class="control-label" style="margin-top:10px">Any of children use Smart Phones?<span style="color:#F00">*</span></label>
                                                                        <div class="controls">
                                                                            <select id="ddl_smartuse" name="ddl_smartuse" class="input-xlarge" data-rule-required="true">
                                                                                <option value="" disabled selected> Select here</option>
                                                                                <option value="yes" point="10"> Yes</option>
                                                                                <option value="no" point="1"> No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>	<!-- Any of your children use Smart Phone? -->
                                                                </div>  <!-- IF child will be more than Zero -->

                                                                <div class="form-actions" style="clear:both;">
                                                                    <button id="submit" name="Submit" type="submit" class="btn btn-primary" >Submit</button>
                                                                    <button id="reset" type="button" class="btn" onclick="window.history.back()">Cancel</button>
                                                                </div> <!-- Submit -->
                                                                
                                                            </form>
                                                        </div>	<!-- Family Details -->
                                                        <div class="tab-pane" id="div_appliances_motors">
                                                            <div class="span10" style="padding: 5px; border: 1px solid #d6d6d6; margin: 5px;">
                                                                <h3>What appliances are there in your house? Also mention their count.</h3>
                                                            	<form method="POST" enctype="multipart/form-data" class='form-horizontal form-bordered form-validate' id="frm_appliances_motors" name="frm_appliances_motors">
                                                                    
                                                                    <div class="control-group">
                                                                        <label for="text" class="control-label" style="margin-top:10px">Television<span style="color:#F00">*</span></label>
                                                                        <div class="controls">
                                                                            <input type="number" name="txt_television" id="txt_television" placeholder="Television" class="input-xlarge v_number cal_tcount" value="0">
                                                                        </div>
                                                                    </div>	<!-- Television -->
                                                                    
                                                                    <div class="control-group">
                                                                        <label for="text" class="control-label" style="margin-top:10px">Refrigerator<span style="color:#F00">*</span></label>
                                                                        <div class="controls">
                                                                            <input type="number" name="txt_refrigerator" id="txt_refrigerator" placeholder="Refrigerator" class="input-xlarge v_number cal_tcount" value="0">
                                                                        </div>
                                                                    </div>	<!-- Refrigerator -->
                                                                    
                                                                    <div class="control-group">
                                                                        <label for="text" class="control-label" style="margin-top:10px">Washing Machine<span style="color:#F00">*</span></label>
                                                                        <div class="controls">
                                                                            <input type="number" name="txt_wmachine" id="txt_wmachine" placeholder="Washing Machine" class="input-xlarge v_number cal_tcount" value="0">
                                                                        </div>
                                                                    </div>	<!-- Washing Machine -->
                                                                    
                                                                    <div class="control-group">
                                                                        <label for="text" class="control-label" style="margin-top:10px">Mixer<span style="color:#F00">*</span></label>
                                                                        <div class="controls">
                                                                            <input type="number" name="txt_mixer" id="txt_mixer" placeholder="Mixer" class="input-xlarge v_number cal_tcount" value="0">
                                                                        </div>
                                                                    </div>	<!-- Mixer -->
                                                                    
                                                                    <div class="control-group">
                                                                        <label for="text" class="control-label" style="margin-top:10px">Gas Stove<span style="color:#F00">*</span></label>
                                                                        <div class="controls">
                                                                            <input type="number" name="txt_stove" id="txt_stove" placeholder="Gas Stove" class="input-xlarge v_number cal_tcount" value="0">
                                                                        </div>
                                                                    </div>	<!-- Gas Stove -->
                                                                    
                                                                    <div class="control-group">
                                                                        <label for="text" class="control-label" style="margin-top:10px">Bicycle<span style="color:#F00">*</span></label>
                                                                        <div class="controls">
                                                                            <input type="number" name="txt_bicycle" id="txt_bicycle" placeholder="Bicycle" class="input-xlarge v_number cal_tcount" value="0">
                                                                        </div>
                                                                    </div>	<!-- Bicycle -->
                                                                    
                                                                    <div class="control-group">
                                                                        <label for="text" class="control-label" style="margin-top:10px">Cooking Cylinder<span style="color:#F00">*</span></label>
                                                                        <div class="controls">
                                                                            <input type="number" name="txt_ccylinder" id="txt_ccylinder" placeholder="Cooking Cylinder" class="input-xlarge v_number cal_tcount" value="0">
                                                                        </div>
                                                                    </div>	<!-- Cooking Cylinder -->
                                                                    
                                                                    <div class="control-group">
                                                                        <label for="text" class="control-label" style="margin-top:10px">Lights & Fans<span style="color:#F00">*</span></label>
                                                                        <div class="controls">
                                                                            <input type="number" name="txt_fans" id="txt_fans" placeholder="Lights & Fans" class="input-xlarge v_number cal_tcount" value="0">
                                                                        </div>
                                                                    </div>	<!-- Lights & Fans -->
                                                                    
                                                                    <div class="control-group">
                                                                        <label for="text" class="control-label" style="margin-top:10px">Motorcycle<span style="color:#F00">*</span></label>
                                                                        <div class="controls">
                                                                            <input type="number" name="txt_motorcycle" id="txt_motorcycle" placeholder="Motorcycle" class="input-xlarge v_number cal_tcount" value="0">
                                                                        </div>
                                                                    </div>	<!-- Motorcycle -->
                                                                    
                                                                    <div class="control-group">
                                                                        <label for="text" class="control-label" style="margin-top:10px">Car<span style="color:#F00">*</span></label>
                                                                        <div class="controls">
                                                                            <input type="number" name="txt_car" id="txt_car" placeholder="Bicycle" class="input-xlarge v_number cal_tcount" value="0">
                                                                        </div>
                                                                    </div>	<!-- Car -->
                                                                    
                                                                    <div class="form-actions" style="clear:both;">
                                                                        <button id="submit" name="Submit" type="submit" class="btn btn-primary" >Submit</button>
                                                                        <button id="reset" type="button" class="btn" onclick="window.history.back()">Cancel</button>
                                                                    </div> <!-- Submit -->
                                                                    
                                                                </form>
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
                                                                                            <select id="ddl_owner<?php echo $id; ?>" name="ddl_owner<?php echo $id; ?>" onChange="changeDivDisplay(this.value, '');" class="input-xlarge" data-rule-required="true">
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
	                                                                    <input type="button" class="btn btn-warning " value="Add New" onClick="addMoreLand();" id="addLoanType"/>
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
                                                        </div>	<!-- Crop And Cultivation Details -->
                                                        <div class="tab-pane" id="div_prev_crop_cycle">
                                                           Previous Crop Cycle Details
                                                        </div>	<!-- Previous Crop Cycle Details -->
                                                        <div class="tab-pane" id="div_cur_crop_cycle">
                                                           Current Crop Cycle Details
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
                                                        </div>	<!-- Assets Details -->
                                                        <div class="tab-pane" id="div_live_stock">
                                                           Live Stock
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
                                                        </div>	<!-- Home Loan Details -->
                                                        <div class="tab-pane" id="div_financial_details">
                                                           Financial Details
                                                        </div>	<!-- Financial Details -->
                                                        <div class="tab-pane" id="div_financial_history">
                                                           Financial History
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
        <script type="text/javascript">

            function changeDivDisplay(boolVal, divId)
            {
                //alert(boolVal);
                if(boolVal == 'yes')
                {
                    $('#'+divId).slideDown();
                }
                else if (boolVal == 'no')
                {
                    $('#'+divId).slideUp();
                }
                else if(boolVal == 'Housewife')
                {
                    $('#'+divId).slideUp();   
                }
                else if(boolVal == 'smartphone')
                {
                    $('#'+divId).slideDown();
                }
                else if(boolVal == '0')
                {
                    $('#'+divId).slideUp();
                }
                else if(boolVal == 'Rental')
                {
                    $('#div_leas_display').slideUp();
                    $('#div_contract_display').slideUp();
                    $('#div_rental_display').slideDown();
                }
                else if (boolVal == 'Leased') 
                {
                    $('#div_rental_display').slideUp();
                    $('#div_contract_display').slideUp();
                    $('#div_leas_display').slideDown();
                }
                else if (boolVal == 'Contracted')
                {
                    $('#div_leas_display').slideUp();
                    $('#div_rental_display').slideUp();
                    $('#div_contract_display').slideDown();
                }
                else
                {
                    $('#'+divId).slideDown();  
                }
            }

            function getDist(stateParameter, stateVal, distId, talId, villageId, distDivId, talDivId, VillageDivId)
            {
                var sendInfo    = {"stateVal":stateVal, "stateParameter":stateParameter, "distId":distId, "talId":talId, "villageId":villageId, "distDivId":distDivId, "talDivId":talDivId, "VillageDivId":VillageDivId, "load_dist":1};
                var dist_load   = JSON.stringify(sendInfo);
                
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
                var sendInfo    = {"distVal":distVal, "distParameter":distParameter, "talId":talId, "villageId":villageId, "talDivId":talDivId, "VillageDivId":VillageDivId, "load_tal":1};
                var tal_load    = JSON.stringify(sendInfo);
                
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
                var sendInfo        = {"talVal":talVal, "talParameter":talParameter, "villageId":villageId, "VillageDivId":VillageDivId, "load_village":1};
                var village_load    = JSON.stringify(sendInfo);
                
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
                    //$('#land'+contentCount).remove();
                     $('#lands').find('#land'+contentCount).slideUp("slow");
                    contentCount    = contentCount - 1
                    if(contentCount==1)
                    {
                        $('#removeLoanType').hide('swing');
                    }
                    //calTotal();
                    return false;
                    
                }
                
                contentCount    = contentCount + 1
                landData        = '<div id="land'+contentCount+'" style="padding:5px;border:1px solid #d6d6d6;margin:5px;">';
                    landData        += '<div id="loan_detail" style=" padding: 10px; margin: 5px;">';
                            landData    +=  '<input type="hidden" name="id[]" id="id" value="">';
                            landData    +=  '<h2>Farm Land '+contentCount+' Details</h2>';

                            landData    +=  '<div class="control-group">';
                                landData    += '<label for="text" class="control-label" style="margin-top:10px">Size in Acres<span style="color:#F00">*</span></label>';
                                landData    += '<div class="controls">';
                                    landData    += '<input placeholder="Size in Acres" type="text" id="txt_land_size'+contentCount+'" name="txt_land_size'+contentCount+'" class="input-xlarge" value="" data-rule-required="true" data-rule-number="true">';
                                landData    += '</div>';
                            landData    += '</div>';  // <!-- Size in Acres -->

                            landData    += '<div class="control-group">';
                                landData    += '<label for="text" class="control-label" style="margin-top:10px">Ownership<span style="color:#F00">*</span></label>';
                                landData    += '<div class="controls">';
                                    landData    += '<select id="ddl_owner'+contentCount+'" name="ddl_owner'+contentCount+'" onChange="changeDivDisplay(this.value, '');" class="input-xlarge" data-rule-required="true">';
                                        landData    += '<option value="" disabled selected> Select here</option>';
                                        landData    += '<option value="Owned">Owned</option>';
                                        landData    += '<option value="Rental">Rental</option>';
                                        landData    += '<option value="Leased">Leased</option>';
                                        landData    += '<option value="Contracted">Contracted</option>';
                                    landData    += '</select>';
                                landData    += '</div>';
                            landData    += '</div>';    // <!-- Ownership -->

                            landData    += '<div id="div_rental_display" style="display: none;">';
                                landData    += '<div class="control-group">';
                                    landData    += '<label for="text" class="control-label" style="margin-top:10px">Mention tha amount per month on rent<span style="color:#F00">*</span></label>';
                                    landData    += '<div class="controls">';
                                        landData    += '<input placeholder="Size in Acres" type="text" id="txt_land_rent_per_month'+contentCount+'" name="txt_land_rent_per_month'+contentCount+'" class="input-xlarge" value="" data-rule-required="true" data-rule-number="true">';
                                    landData    += '</div>';
                                landData    += '</div>';
                            landData    += '</div>';    // <!-- [If On Rent, Mention tha amount per month on rent] -->
                                                                                        
                            landData    += '<div id="div_leas_display" style="display: none;">';
                                landData    += '<div class="control-group">';
                                    landData    += '<label for="text" class="control-label" style="margin-top:10px">Number of years under leasing<span style="color:#F00">*</span></label>';
                                    landData    += '<div class="controls">';
                                        landData    += '<input placeholder="Size in Acres" type="text" id="txt_land_lease_year'+contentCount+'" name="txt_land_lease_year'+contentCount+'" class="input-xlarge" value="" data-rule-required="true" data-rule-number="true">';
                                    landData    += '</div>';
                                landData    += '</div>';
                            landData    += '</div>';    // <!-- [If on lease, Number of years under leasing] -->

                            landData    += '<div id="div_contract_display" style="display: none;">';
                                landData    += '<div class="control-group">';
                                    landData    += '<label for="text" class="control-label" style="margin-top:10px">Number of years under contract<span style="color:#F00">*</span></label>';
                                    landData    += '<div class="controls">';
                                        landData    += '<input placeholder="Size in Acres" type="text" id="txt_land_contract_year'+contentCount+'" name="txt_land_contract_year'+contentCount+'" class="input-xlarge" value="" data-rule-required="true" data-rule-number="true">';
                                    landData    += '</div>';
                                landData    += '</div>';
                            landData    += '</div>';    // <!-- [If On Contract, Number of years under contract] -->
                                                                                        
                            //  <!-- START : Land Address -->                                                           
                            landData    += '<div class="control-group" >';
                                landData    += '<label for="tasktitel" class="control-label">State <span style="color:#F00">*</span></label>';
                                landData    += '<div class="controls">';
                                    landData    += '<select id="ddl_p_state'+contentCount+'" name="ddl_p_state'+contentCount+'" onChange="getDist("p", this.value, "ddl_p_dist'+contentCount+'", "ddl_p_tal'+contentCount+'", "ddl_p_village'+contentCount+'", "div_p_dist'+contentCount+'", "div_p_tal'+contentCount+'", "div_p_village'+contentCount+'");" class="select2-me input-large" >';
                                        landData    += '<option value="" disabled selected>Select State</option>';
                                        landData    += '<option value="1">TELANGANA</option>';
                                    landData    += '</select>';
                                landData    += '</div>';
                            landData    += '</div>';    // <!-- State -->
                            
                            landData    += '<div class="control-group">';
                                landData    += '<label for="tasktitel" class="control-label">District <span style="color:#F00">*</span></label>';
                                landData    += '<div class="controls" id="div_p_dist'+contentCount+'">';
                                    landData    += '<select id="ddl_p_dist'+contentCount+'" name="ddl_p_dist'+contentCount+'" class="select2-me input-large" >';
                                        landData    += '<option value="" disabled selected>Select District</option>'
                                    landData    += '</select>';
                                landData    += '</div>';
                            landData    += '</div>';  // <!-- District -->                  
                            
                            landData    += '<div class="control-group">';
                                landData    += '<label for="tasktitel" class="control-label">Taluka <span style="color:#F00">*</span></label>';
                                landData    += '<div class="controls" id="div_p_tal'+contentCount+'">';
                                    landData    += '<select id="ddl_p_tal'+contentCount+'" name="ddl_p_tal'+contentCount+'" class="select2-me input-large" >';
                                        landData    += '<option value="" disabled selected>Select Taluka</option>';
                                    landData    += '</select>';
                                landData    += '</div>';
                            landData    += '</div>';  // <!-- Taluka -->
                            
                            landData    += '<div class="control-group" >';
                                landData    += '<label for="tasktitel" class="control-label">Village Name <span style="color:#F00">*</span></label>';
                                landData    += '<div class="controls" id="div_p_village'+contentCount+'">';
                                    landData    += '<select id="ddl_p_village'+contentCount+'" name="ddl_p_village'+contentCount+'" class="select2-me input-large" >';
                                        landData    += '<option value="" disabled selected>Select Village</option>';
                                    landData    += '</select>';
                                landData    += '</div>';
                            landData    += '</div>';  // <!-- Village -->
                            
                            landData    += '<div class="control-group">';
                                landData    += '<label for="text" class="control-label" style="margin-top:10px">Survey Number<span style="color:#F00">*</span></label>';
                                landData    += '<div class="controls">';
                                    landData    += '<input placeholder="Size in Acres" type="text" id="txt_survey_no'+contentCount+'" name="txt_survey_no'+contentCount+'" class="input-xlarge" value="" data-rule-required="true" data-rule-number="true">';
                                landData    += '</div>';
                            landData    += '</div>';  // <!-- Survey Number -->

                            landData    += '<div class="control-group" >';
                                landData    += '<label for="tasktitel" class="control-label">Pin-Code <span style="color:#F00">*</span></label>';
                                landData    += '<div class="controls">';
                                    landData    += '<input type="text" id="txt_p_pincode'+contentCount+'" name="txt_p_pincode'+contentCount+'" placeholder="Pin-Code" class="input-large" data-rule-required="true" data-rule-number="true" minlength="6" maxlength="6" size="6" />';
                                landData    += '</div>';
                            landData    += '</div>';  // <!-- Pincode -->
                            
                            // <!-- END : Land Address -->

                            landData    += '<div class="control-group">';
                                landData    += '<label for="text" class="control-label" style="margin-top:10px">Type of Soil<span style="color:#F00">*</span></label>';
                                landData    += '<div class="controls">';
                                    landData    += '<select id="ddl_soil_type'+contentCount+'" name="ddl_soil_type'+contentCount+'" class="input-xlarge" data-rule-required="true" onChange="calTotal()">';
                                        landData    += '<option value="" disabled selected> Select here</option>';
                                        landData    += '<option value="Alluvial Soil">Alluvial Soil</option>';
                                        landData    += '<option value="Black Soil">Black Soil</option>';
                                        landData    += '<option value="Red Soil">Red Soil</option>';
                                        landData    += '<option value="Mountain Soil">Mountain Soil</option>';
                                        landData    += '<option value="Peat">Peat</option>';
                                        landData    += '<option value="Laterite Soil">Laterite Soil</option>';
                                        landData    += '<option value="Desert Soil">Desert Soil</option>';
                                    landData    += '</select>';
                                landData    += '</div>';
                            landData    += '</div>';  // <!-- Type of soil -->

                            landData    += '<div class="control-group">';
                                landData    += '<label for="text" class="control-label" style="margin-top:10px">Soil Depth<span style="color:#F00">*</span></label>';
                                landData    += '<div class="controls">';
                                    landData    += '<input placeholder="Size in Acres" type="text" id="txt_soil_depth'+contentCount+'" name="txt_soil_depth'+contentCount+'" class="input-xlarge" value="" data-rule-required="true" data-rule-number="true">';
                                landData    += '</div>';
                            landData    += '</div>';  // <!-- Soil Depth -->

                            landData    += '<div class="control-group">';
                                landData    += '<label for="text" class="control-label" style="margin-top:10px">Have you had the soil tested in your land?<span style="color:#F00">*</span></label>';
                                landData    += '<div class="controls">';
                                    landData    += '<select id="ddl_soil_tested'+contentCount+'" name="ddl_soil_tested'+contentCount+'" class="input-xlarge" data-rule-required="true" onChange="calTotal()">';
                                        landData    += '<option value="" disabled selected> Select here</option>';
                                        landData    += '<option value="yes">Yes</option>';
                                        landData    += '<option value="no">no</option>';
                                    landData    += '</select>';
                                landData    += '</div>';
                            landData    += '</div>';  // <!-- Have you Tested the Soil -->
                            
                            landData    += '<div class="control-group">';
                                landData    += '<label for="text" class="control-label" style="margin-top:10px">Source Of Water<span style="color:#F00">*</span></label>';
                                landData    += '<div class="controls">';
                                    landData    += '<select id="ddl_water_source'+contentCount+'" name="ddl_water_source'+contentCount+'" class="input-xlarge" data-rule-required="true" onChange="calTotal()">';
                                        landData    += '<option value="" disabled selected> Select here</option>';
                                        landData    += '<option value="well_water">Well Water</option>';
                                        landData    += '<option value="tube_water">Tube Water</option>';
                                        landData    += '<option value="tank_water">Tank Water</option>';
                                        landData    += '<option value="canals">Canals</option>';
                                        landData    += '<option value="perennial_water">Perennial Water</option>';
                                        landData    += '<option value="multipurpose_river_valley">Multipurpose River Valley</option>';
                                        landData    += '<option value="rain_fed">Rain Fed</option>';
                                        landData    += '<option value="drip_irrigation">Drip Irrigation</option>';
                                        landData    += '<option value="sprinkler">Sprinkler</option>';
                                        landData    += '<option value="furrow">Furrow</option>';
                                        landData    += '<option value="ditch">Ditch</option>';
                                        landData    += '<option value="surge">Surge</option>';
                                        landData    += '<option value="seepage">Seepage</option>';
                                    landData    += '</select>';
                                landData    += '</div>';
                            landData    += '</div>';  // <!-- Source of water -->

                    landData    += '</div>';        
                landData    += '</div>';                                          
                
                // $("#lands").append(loan).slideDown('slow');
                $('#lands').append(landData).find('#land'+contentCount).slideDown("slow");
                 
                if(contentCount>=2)
                {
                    $('#removeLoanType').show('swing');
                }
            }
        </script>
    </body>
</html>