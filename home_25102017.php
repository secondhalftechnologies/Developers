<?php 
	include('access1.php'); 
	include('include/connection.php');
	include('include/query-helper.php');
	
	$feature_name 	= 'Dashboard';
	$home_name    	= "Home";
	$title			= 'SqoreYard | Home';
	$home_url 	  	= "home.php";
	$filename		= 'home.php';
	
	function getCount($table_name, $key, $value)
	{
		$num_	= 0;
		$res_ = lookup_value($table_name ,array(), array($key=>$value),array(),array(),array());
		if($res_)
		{
			$num_	= mysqli_num_rows($res_);
		}
		
		return $num_;
	}
	
	$num_get_farmer_count					= 0;
	$num_total_loan_amt						= 0;
	
	
	$num_loan_required_count				= getCount('tbl_personal_detail', 'f1_required_loan', 'yes');
	$num_smartphone							= getCount('tbl_applicant_phone', 'f5_phonetype', 'smartphone');
	$num_featuredphone						= getCount('tbl_applicant_phone', 'f5_phonetype', 'featurephone');
	
	$num_illiterate_count					= getCount('tbl_applicant_knowledge', 'f2_edudetail', 'illiterate');
	$num_primary_education_count			= getCount('tbl_applicant_knowledge', 'f2_edudetail', 'primary education');
	$num_matriculate_count					= getCount('tbl_applicant_knowledge', 'f2_edudetail', 'matriculate');
	$num_graduate_count						= getCount('tbl_applicant_knowledge', 'f2_edudetail', 'graduate');
	$num_post_graduate_count				= getCount('tbl_applicant_knowledge', 'f2_edudetail', 'post graduate');
	
	$num_Education_count					= getCount('tbl_bank_loan_detail', 'f8_loan_type', 'Education');
	$num_Land_count							= getCount('tbl_bank_loan_detail', 'f8_loan_type', 'Land');
	$num_Agriculture_count					= getCount('tbl_bank_loan_detail', 'f8_loan_type', 'Agriculture');
	$num_Two_Wheeler_count					= getCount('tbl_bank_loan_detail', 'f8_loan_type', 'Two Wheeler');
	$num_Equipment_count					= getCount('tbl_bank_loan_detail', 'f8_loan_type', 'Equipment');
	$num_Irrigation_count					= getCount('tbl_bank_loan_detail', 'f8_loan_type', 'Irrigation');
	$num_Fencing_count						= getCount('tbl_bank_loan_detail', 'f8_loan_type', 'Fencing');
	$num_Housing_count						= getCount('tbl_bank_loan_detail', 'f8_loan_type', 'Housing');
	$num_Construction_OR_Renovation_count	= getCount('tbl_bank_loan_detail', 'f8_loan_type', 'Construction OR Renovation');
	$num_Four_Wheeler_count					= getCount('tbl_bank_loan_detail', 'f8_loan_type', 'Four Wheeler');
	$num_Electronics_count					= getCount('tbl_bank_loan_detail', 'f8_loan_type', 'Electronics');
	$num_NA_count							= getCount('tbl_bank_loan_detail', 'f8_loan_type', 'NA');
	$num_Others_count						= getCount('tbl_bank_loan_detail', 'f8_loan_type', 'Others');
	
	// Registration Count
	$res_get_farmer_count = lookup_value('tbl_farmers',array(),array(),array(),array(),array());
	if($res_get_farmer_count)
	{
		$num_get_farmer_count	= mysqli_num_rows($res_get_farmer_count);
	}
	
	// Total Amount Of loan
	$res_total_loan_amt = lookup_value('tbl_personal_detail',array(),array(),array(),array(),array());
	if($res_total_loan_amt)
	{
		while($row_total_loan_amt = mysqli_fetch_array($res_total_loan_amt))
		{
			$num_total_loan_amt	+= $row_total_loan_amt['f1_required_loan_amt'];
		}
	}
?>
<!doctype html>
<html>

    <head>
        <?php
        /* This function used to call all header data like css files and links */
        headerdata($feature_name);
        /* This function used to call all header data like css files and links */
        ?>
        <link rel="stylesheet" href="css/font-awesome.min.css">
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
                breadcrumbs($home_url,$home_name,'Dashboard',$filename,$feature_name);
                /* this function used to add navigation menu to the page*/
                ?>
				<div class="container-fluid">
                    <div class="span12">
                    	<div class="box box-bordered box-color" >
                        	<div class="box-title">
                                <h3><i class="icon-dashboard"></i>Basic Counts</h3>
                            </div>
                            <div style="clear:both">&nbsp;</div>
                            <div class="container">
                            	
                                <div class="row">
                                	
                                    <div class="span4" >
                                    	<div class="panel panel-cadetblue">
                                        	<div class="panel-heading">
                                            	<div class="row" style="padding-left: 30px;">
                                                	<div class="col-xs-3">
                                                        <i class="fa fa-users fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                    	<div class="huge"><?php echo $num_get_farmer_count; ?></div><br>
                                                    	<div>Registration Count!</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>	<!-- Registration Count -->
                                    
                                    <div class="span4" >
                                    	<div class="panel panel-cadetblue">
                                        	<div class="panel-heading">
                                            	<div class="row" style="padding-left: 30px;">
                                                	<div class="col-xs-3">
                                                        <i class="fa fa-users fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                    	<div class="huge"><?php echo $num_total_loan_amt; ?></div><br>
                                                    	<div>Total Amount Of loan!</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>	<!-- Total Amount Of loan -->
                                    
                                    <div class="span4" >
                                    	<div class="panel panel-cadetblue">
                                        	<div class="panel-heading">
                                            	<div class="row" style="padding-left: 30px;">
                                                	<div class="col-xs-3">
                                                        <i class="fa fa-users fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                    	<div class="huge"><?php echo $num_loan_required_count; ?></div><br>
                                                    	<div>Farmer Count Who wants Loan!</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>	<!-- Farmer Count Who wants Loan -->
                                    
                                </div>
                                
                               	<div class="row">
                                	
                                    <div class="span4" >
                                    	<div class="panel panel-cadetblue">
                                        	<div class="panel-heading">
                                            	<div class="row" style="padding-left: 30px;">
                                                	<div class="col-xs-3">
                                                        <i class="fa fa-users fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                    	<div class="huge"><?php echo $num_smartphone; ?></div><br>
                                                    	<div>Smartphone Count!</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>	<!-- Smart Phone Count -->
                                    
                                    <div class="span4" >
                                    	<div class="panel panel-cadetblue">
                                        	<div class="panel-heading">
                                            	<div class="row" style="padding-left: 30px;">
                                                	<div class="col-xs-3">
                                                        <i class="fa fa-users fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                    	<div class="huge"><?php echo $num_featuredphone; ?></div><br>
                                                    	<div>Featuredphone Count!</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>	<!-- Featured Phone Count -->
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
              	</div>	<!-- Basic Counts -->
                
                <div class="container-fluid">
                    <div class="span12">
                    	<div class="box box-bordered box-color" >
                        	<div class="box-title">
                                <h3><i class="icon-dashboard"></i>Educational Qualification</h3>
                            </div>
                            <div style="clear:both">&nbsp;</div>
                            <div class="container">
                            	
                                <div class="row">
                                	
                                    <div class="span4" >
                                    	<div class="panel panel-cadetblue">
                                        	<div class="panel-heading">
                                            	<div class="row" style="padding-left: 30px;">
                                                	<div class="col-xs-3">
                                                        <i class="fa fa-users fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                    	<div class="huge"><?php echo $num_illiterate_count; ?></div><br>
                                                    	<div>Illiterate!</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>	<!-- Illiterate Count -->
                                    
                                    <div class="span4" >
                                    	<div class="panel panel-cadetblue">
                                        	<div class="panel-heading">
                                            	<div class="row" style="padding-left: 30px;">
                                                	<div class="col-xs-3">
                                                        <i class="fa fa-users fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                    	<div class="huge"><?php echo $num_primary_education_count; ?></div><br>
                                                    	<div>Primary Education!</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>	<!-- Primary Education -->
                                    
                                    <div class="span4" >
                                    	<div class="panel panel-cadetblue">
                                        	<div class="panel-heading">
                                            	<div class="row" style="padding-left: 30px;">
                                                	<div class="col-xs-3">
                                                        <i class="fa fa-users fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                    	<div class="huge"><?php echo $num_matriculate_count; ?></div><br>
                                                    	<div>Matriculate!</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>	<!-- Matriculate -->
                                    
                                </div>
                                
                               	<div class="row">

                                    <div class="span4" >
                                    	<div class="panel panel-cadetblue">
                                        	<div class="panel-heading">
                                            	<div class="row" style="padding-left: 30px;">
                                                	<div class="col-xs-3">
                                                        <i class="fa fa-users fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                    	<div class="huge"><?php echo $num_graduate_count; ?></div><br>
                                                    	<div>Graduate!</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>	<!-- Graduate -->
                                    
                                    <div class="span4" >
                                    	<div class="panel panel-cadetblue">
                                        	<div class="panel-heading">
                                            	<div class="row" style="padding-left: 30px;">
                                                	<div class="col-xs-3">
                                                        <i class="fa fa-users fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                    	<div class="huge"><?php echo $num_post_graduate_count; ?></div><br>
                                                    	<div>Post Graduate!</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>	<!-- Post Graduate -->
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
              	</div>	<!-- Educational Qualification -->
                
                <div class="container-fluid">
                    <div class="span12">
                    	<div class="box box-bordered box-color" >
                        	<div class="box-title">
                                <h3><i class="icon-dashboard"></i>Type Of Loans</h3>
                            </div>
                            <div style="clear:both">&nbsp;</div>
                            <div class="container">
                            	
                                <div class="row">
                                	
                                    <div class="span4" >
                                    	<div class="panel panel-cadetblue">
                                        	<div class="panel-heading">
                                            	<div class="row" style="padding-left: 30px;">
                                                	<div class="col-xs-3">
                                                        <i class="fa fa-users fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                    	<div class="huge"><?php echo $num_Education_count; ?></div><br>
                                                    	<div>Education!</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>	<!-- Education -->
                                    
                                    <div class="span4" >
                                    	<div class="panel panel-cadetblue">
                                        	<div class="panel-heading">
                                            	<div class="row" style="padding-left: 30px;">
                                                	<div class="col-xs-3">
                                                        <i class="fa fa-users fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                    	<div class="huge"><?php echo $num_Land_count; ?></div><br>
                                                    	<div>Land!</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>	<!-- Land -->
                                    
                                    <div class="span4" >
                                    	<div class="panel panel-cadetblue">
                                        	<div class="panel-heading">
                                            	<div class="row" style="padding-left: 30px;">
                                                	<div class="col-xs-3">
                                                        <i class="fa fa-users fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                    	<div class="huge"><?php echo $num_Agriculture_count; ?></div><br>
                                                    	<div>Agriculture!</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>	<!-- Agriculture -->
                                    
                                </div>
                                
                               	<div class="row">

                                    <div class="span4" >
                                    	<div class="panel panel-cadetblue">
                                        	<div class="panel-heading">
                                            	<div class="row" style="padding-left: 30px;">
                                                	<div class="col-xs-3">
                                                        <i class="fa fa-users fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                    	<div class="huge"><?php echo $num_Two_Wheeler_count; ?></div><br>
                                                    	<div>Two Wheeler!</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>	<!-- Two Wheeler -->
                                    
                                    <div class="span4" >
                                    	<div class="panel panel-cadetblue">
                                        	<div class="panel-heading">
                                            	<div class="row" style="padding-left: 30px;">
                                                	<div class="col-xs-3">
                                                        <i class="fa fa-users fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                    	<div class="huge"><?php echo $num_Equipment_count; ?></div><br>
                                                    	<div>Equipment!</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>	<!-- Equipment -->
                                    
                                    <div class="span4" >
                                    	<div class="panel panel-cadetblue">
                                        	<div class="panel-heading">
                                            	<div class="row" style="padding-left: 30px;">
                                                	<div class="col-xs-3">
                                                        <i class="fa fa-users fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                    	<div class="huge"><?php echo $num_Irrigation_count; ?></div><br>
                                                    	<div>Irrigation!</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>	<!-- Irrigation -->
                                    
                                </div>
                                
                                <div class="row">

                                    <div class="span4" >
                                    	<div class="panel panel-cadetblue">
                                        	<div class="panel-heading">
                                            	<div class="row" style="padding-left: 30px;">
                                                	<div class="col-xs-3">
                                                        <i class="fa fa-users fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                    	<div class="huge"><?php echo $num_Fencing_count; ?></div><br>
                                                    	<div>Fencing!</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>	<!-- Fencing -->
                                    
                                    <div class="span4" >
                                    	<div class="panel panel-cadetblue">
                                        	<div class="panel-heading">
                                            	<div class="row" style="padding-left: 30px;">
                                                	<div class="col-xs-3">
                                                        <i class="fa fa-users fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                    	<div class="huge"><?php echo $num_Housing_count; ?></div><br>
                                                    	<div>Housing!</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>	<!-- Housing -->
                                    
                                    <div class="span4" >
                                    	<div class="panel panel-cadetblue">
                                        	<div class="panel-heading">
                                            	<div class="row" style="padding-left: 30px;">
                                                	<div class="col-xs-3">
                                                        <i class="fa fa-users fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                    	<div class="huge"><?php echo $num_Construction_OR_Renovation_count; ?></div><br>
                                                    	<div>Construction OR Renovation!</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>	<!-- Construction OR Renovation -->
                                    
                                </div>
                                
                                <div class="row">

                                    <div class="span4" >
                                    	<div class="panel panel-cadetblue">
                                        	<div class="panel-heading">
                                            	<div class="row" style="padding-left: 30px;">
                                                	<div class="col-xs-3">
                                                        <i class="fa fa-users fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                    	<div class="huge"><?php echo $num_Four_Wheeler_count; ?></div><br>
                                                    	<div>Four Wheeler!</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>	<!-- Four Wheeler -->
                                    
                                    <div class="span4" >
                                    	<div class="panel panel-cadetblue">
                                        	<div class="panel-heading">
                                            	<div class="row" style="padding-left: 30px;">
                                                	<div class="col-xs-3">
                                                        <i class="fa fa-users fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                    	<div class="huge"><?php echo $num_Electronics_count; ?></div><br>
                                                    	<div>Electronics!</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>	<!-- Electronics -->
                                    
                                    <div class="span4" >
                                    	<div class="panel panel-cadetblue">
                                        	<div class="panel-heading">
                                            	<div class="row" style="padding-left: 30px;">
                                                	<div class="col-xs-3">
                                                        <i class="fa fa-users fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                    	<div class="huge"><?php echo $num_NA_count; ?></div><br>
                                                    	<div>NA!</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>	<!-- NA -->
                                    
                                </div>
                                
                                <div class="row">

                                    <div class="span4" >
                                    	<div class="panel panel-cadetblue">
                                        	<div class="panel-heading">
                                            	<div class="row" style="padding-left: 30px;">
                                                	<div class="col-xs-3">
                                                        <i class="fa fa-users fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                    	<div class="huge"><?php echo $num_Others_count; ?></div><br>
                                                    	<div>Others!</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>	<!-- Others -->
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
              	</div>	<!-- Type Of Loans -->
            
            </div>
        </div>	
    </body>
</html>

