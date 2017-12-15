<?php 
	include('access1.php'); 
	include('include/connection.php');
	include('include/query-helper.php');
	
	$feature_name 	= 'Dashboard';
	$home_name    	= "Home";
	$title			= 'SqoreYard | Home';
	$home_url 	  	= "home.php";
	$filename		= 'home.php';
	
    $num_get_farmer_count                 = isExist('tbl_farmers', array(), array(), array(), array());
    // Total Amount Of loan
    $num_total_loan_amt = 0;
    $res_total_loan_amt = lookup_value('tbl_personal_detail',array(),array(),array(),array(),array());
    if($res_total_loan_amt)
    {
        while($row_total_loan_amt = mysqli_fetch_array($res_total_loan_amt))
        {
            $num_total_loan_amt += $row_total_loan_amt['f1_required_loan_amt'];
        }
    }

    // setlocale(LC_MONETARY,"en_IN");
    // $num_total_loan_amt = money_format("%i", $num_total_loan_amt);

    $num_loan_required_count              = isExist('tbl_personal_detail', array('f1_required_loan'=>'yes'), array(), array(), array());
    $num_smartphone                       = isExist('tbl_applicant_phone', array('f5_phonetype'=>'smartphone'), array(), array(), array());
    $num_featuredphone                    = isExist('tbl_applicant_phone', array('f5_phonetype'=>'featurephone'), array(), array(), array());
    
    $sql_total_spend_on_seeds             = " SELECT SUM(`f10_spend_money`) AS total_spend_on_seeds FROM `tbl_cultivation_data` ";
    $res_total_spend_on_seeds             = mysqli_query($db_con, $sql_total_spend_on_seeds) or die(mysqli_error($db_con));
    $row_total_spend_on_seeds             = mysqli_fetch_array($res_total_spend_on_seeds);
    $total_spend_on_seeds                 = $row_total_spend_on_seeds['total_spend_on_seeds'];
    
    $sql_total_spend_on_fertilisers       = " SELECT SUM(`f10_spend_money_fertiliser`) AS total_spend_on_fertilisers FROM `tbl_cultivation_data` ";
    $res_total_spend_on_fertilisers       = mysqli_query($db_con, $sql_total_spend_on_fertilisers) or die(mysqli_error($db_con));
    $row_total_spend_on_fertilisers       = mysqli_fetch_array($res_total_spend_on_fertilisers);
    $total_spend_on_fertilisers           = $row_total_spend_on_fertilisers['total_spend_on_fertilisers'];
    
    $sql_total_spend_on_pesticide         = " SELECT SUM(`f10_spend_money_pesticide`) AS total_spend_on_pesticide FROM `tbl_cultivation_data` ";
    $res_total_spend_on_pesticide         = mysqli_query($db_con, $sql_total_spend_on_pesticide) or die(mysqli_error($db_con));
    $row_total_spend_on_pesticide         = mysqli_fetch_array($res_total_spend_on_pesticide);
    $total_spend_on_pesticide             = $row_total_spend_on_pesticide['total_spend_on_pesticide'];
    
    $sql_total_quantity_of_seeds          = " SELECT SUM(`f10_consumption_seeds`) AS total_quantity_of_seeds FROM `tbl_cultivation_data` ";
    $res_total_quantity_of_seeds          = mysqli_query($db_con, $sql_total_quantity_of_seeds) or die(mysqli_error($db_con));
    $row_total_quantity_of_seeds          = mysqli_fetch_array($res_total_quantity_of_seeds);
    $total_quantity_of_seeds              = $row_total_quantity_of_seeds['total_quantity_of_seeds'];
    
    $sql_total_quantity_of_fertilisers    = " SELECT SUM(`f10_consumption_fertilizer`) AS total_quantity_of_fertilisers FROM `tbl_cultivation_data` ";
    $res_total_quantity_of_fertilisers    = mysqli_query($db_con, $sql_total_quantity_of_fertilisers) or die(mysqli_error($db_con));
    $row_total_quantity_of_fertilisers    = mysqli_fetch_array($res_total_quantity_of_fertilisers);
    $total_quantity_of_fertilisers        = $row_total_quantity_of_fertilisers['total_quantity_of_fertilisers'];
    
    $sql_total_quantity_of_pesticide      = " SELECT SUM(`f10_consumption_pesticides`) AS total_quantity_of_pesticide FROM `tbl_cultivation_data` ";
    $res_total_quantity_of_pesticide      = mysqli_query($db_con, $sql_total_quantity_of_pesticide) or die(mysqli_error($db_con));
    $row_total_quantity_of_pesticide      = mysqli_fetch_array($res_total_quantity_of_pesticide);
    $total_quantity_of_pesticide          = $row_total_quantity_of_pesticide['total_quantity_of_pesticide'];
    
    $num_sugarcane_farmers                = isExist('tbl_current_crop_forecast', array('f14_cultivating'=>'68'), array(), array(), array());
    
    $sql_total_area_of_sugarcane          = " SELECT SUM(`f14_total_acrage`) AS total_sugarcane_area FROM `tbl_current_crop_forecast` WHERE `f14_cultivating`='68' ";
    $res_total_area_of_sugarcane          = mysqli_query($db_con, $sql_total_area_of_sugarcane) or die(mysqli_error($db_con));
    $row_total_area_of_sugarcane          = mysqli_fetch_array($res_total_area_of_sugarcane);
    
    $total_area_for_sugarcane             = $row_total_area_of_sugarcane['total_sugarcane_area'];
    
    $num_illiterate_count                 = isExist('tbl_applicant_knowledge', array('f2_edudetail'=>'illiterate'), array(), array(), array());
    $num_primary_education_count          = isExist('tbl_applicant_knowledge', array('f2_edudetail'=>'primary education'), array(), array(), array());
    $num_matriculate_count                = isExist('tbl_applicant_knowledge', array('f2_edudetail'=>'matriculate'), array(), array(), array());
    $num_12th_count                       = isExist('tbl_applicant_knowledge', array('f2_edudetail'=>'12th Standard'), array(), array(), array());
    $num_phd_count                        = isExist('tbl_applicant_knowledge', array('f2_edudetail'=>'phd'), array(), array(), array());
    $num_graduate_count                   = isExist('tbl_applicant_knowledge', array('f2_edudetail'=>'graduate'), array(), array(), array());
    $num_post_graduate_count              = isExist('tbl_applicant_knowledge', array('f2_edudetail'=>'post graduate'), array(), array(), array());
    
    $num_Education_count                  = isExist('tbl_bank_loan_detail', array('f8_loan_type'=>'Education'), array(), array(), array());
    $num_Land_count                       = isExist('tbl_bank_loan_detail', array('f8_loan_type'=>'Land'), array(), array(), array());
    $num_Agriculture_count                = isExist('tbl_bank_loan_detail', array('f8_loan_type'=>'Agriculture'), array(), array(), array());
    $num_Two_Wheeler_count                = isExist('tbl_bank_loan_detail', array('f8_loan_type'=>'Two Wheeler'), array(), array(), array());
    $num_Equipment_count                  = isExist('tbl_bank_loan_detail', array('f8_loan_type'=>'Equipment'), array(), array(), array());
    $num_Irrigation_count                 = isExist('tbl_bank_loan_detail', array('f8_loan_type'=>'Irrigation'), array(), array(), array());
    $num_Fencing_count                    = isExist('tbl_bank_loan_detail', array('f8_loan_type'=>'Fencing'), array(), array(), array());
    $num_Housing_count                    = isExist('tbl_bank_loan_detail', array('f8_loan_type'=>'Housing'), array(), array(), array());
    $num_Construction_OR_Renovation_count = isExist('tbl_bank_loan_detail', array('f8_loan_type'=>'Construction OR Renovation'), array(), array(), array());
    $num_Four_Wheeler_count               = isExist('tbl_bank_loan_detail', array('f8_loan_type'=>'Four Wheeler'), array(), array(), array());
    $num_Electronics_count                = isExist('tbl_bank_loan_detail', array('f8_loan_type'=>'Electronics'), array(), array(), array());
    $num_NA_count                         = isExist('tbl_bank_loan_detail', array('f8_loan_type'=>'NA'), array(), array(), array());
    $num_Others_count                     = isExist('tbl_bank_loan_detail', array('f8_loan_type'=>'Others'), array(), array(), array());

    // Count for Complete and Incomplete Farmers
    // 1] Count For Complete Farmers
    $num_get_complete_farmers_count = isExist('tbl_points', array(), array('pt_frm1'=>'', 'pt_frm2'=>'', 'pt_frm3'=>'', 'pt_frm5'=>'', 'pt_frm7'=>'', 'pt_frm8'=>'', 'pt_frm9'=>'', 'pt_frm10'=>'', 'pt_frm11'=>'', 'pt_frm12'=>'', 'pt_frm13'=>'', 'pt_frm14'=>''), array(), array()); // 'pt_frm6'=>'', , 'pt_frm8_fh'=>''

    // 2] Count For Incomlete Farmers
    $num_get_incomplete_farmers_count   = $num_get_farmer_count - $num_get_complete_farmers_count;

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
                                            <?php
                                            if($_SESSION['userType']=="Admin")
                                            {
                                                ?>
                                                <a href="report_user.php?pag=total_reg">
                                                    <div class="panel-footer">
                                                        <span class="pull-left">View Details</span>
                                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>	<!-- Registration Count -->
                                    
                                    <div class="span4" >
                                        <div class="panel panel-green">
                                            <div class="panel-heading">
                                                <div class="row" style="padding-left: 30px;">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-users fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="huge"><?php echo $num_get_complete_farmers_count; ?></div><br>
                                                        <div>Complete Farmers!</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            if($_SESSION['userType']=="Admin")
                                            {
                                                ?>
                                                <a href="report_user.php?pag=total_com">
                                                    <div class="panel-footer">
                                                        <span class="pull-left">View Details</span>
                                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>  <!-- Complete Farmers -->

                                    <div class="span4" >
                                        <div class="panel panel-red">
                                            <div class="panel-heading">
                                                <div class="row" style="padding-left: 30px;">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-users fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="huge"><?php echo $num_get_incomplete_farmers_count; ?></div><br>
                                                        <div>Incomplete Farmers!</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            if($_SESSION['userType']=="Admin")
                                            {
                                                ?>
                                                <a href="report_user.php?pag=total_incom">
                                                    <div class="panel-footer">
                                                        <span class="pull-left">View Details</span>
                                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>  <!-- Incomplete Farmers -->

                                </div>  <!-- User Section --> 
                                
                                <div class="row">
                                    <div class="span6" >
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
                                            <?php
                                            if($_SESSION['userType']=="Admin")
                                            {
                                                ?>
                                                <a href="report_loan.php?pag=report_loan">
                                                    <div class="panel-footer">
                                                        <span class="pull-left">View Details</span>
                                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>  <!-- Total Amount Of loan -->
                                    
                                    <div class="span6" >
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
                                            <?php
                                            if($_SESSION['userType']=="Admin")
                                            {
                                                ?>
                                                <a href="report_loan.php?pag=report_loan">
                                                    <div class="panel-footer">
                                                        <span class="pull-left">View Details</span>
                                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>  <!-- Farmer Count Who wants Loan -->
                                </div>  <!-- Loan Section -->

                               	<div class="row">
                                	
                                    <div class="span6" >
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
                                            <?php
                                            if($_SESSION['userType']=="Admin")
                                            {
                                                ?>
                                                <a href="report_phone.php?pag=smartphone">
                                                    <div class="panel-footer">
                                                        <span class="pull-left">View Details</span>
                                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>	<!-- Smart Phone Count -->
                                    
                                    <div class="span6" >
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
                                            <?php
                                            if($_SESSION['userType']=="Admin")
                                            {
                                                ?>
                                                <a href="report_phone.php?pag=featurephone">
                                                    <div class="panel-footer">
                                                        <span class="pull-left">View Details</span>
                                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>	<!-- Featured Phone Count -->

                                </div>  <!-- Phone Type Section -->
                                
                            </div>
                        </div>
                    </div>
              	</div>	<!-- Basic Counts -->
                
                <div class="container-fluid">
                    <div class="span12">
                        <div class="box box-bordered box-color" >
                            <div class="box-title">
                                <h3><i class="icon-dashboard"></i>Total Spend on Inputs (In Rs.)</h3>
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
                                                        <div class="huge"><?php echo $total_spend_on_seeds.' Rs.'; ?></div><br>
                                                        <div>Total Spend on Seeds!</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  <!-- Total Spend on Seeds -->
                                    
                                    <div class="span4" >
                                        <div class="panel panel-green">
                                            <div class="panel-heading">
                                                <div class="row" style="padding-left: 30px;">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-users fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="huge"><?php echo $total_spend_on_fertilisers.' Rs.'; ?></div><br>
                                                        <div>Total Spend on Fertilisers!</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  <!-- Total Spend on Fertilisers -->

                                    <div class="span4" >
                                        <div class="panel panel-red">
                                            <div class="panel-heading">
                                                <div class="row" style="padding-left: 30px;">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-users fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="huge"><?php echo $total_spend_on_pesticide.' Rs.'; ?></div><br>
                                                        <div>Total Spend on Pesticide!</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  <!-- Total Spend on Pesticide -->

                                </div>  <!-- Total Spend on Inputs: Seeds, Pesticide and Fertilisers --> 
                                
                            </div>
                        </div>
                    </div>
                </div>  <!-- Total Spend on Inputs -->

                <div class="container-fluid">
                    <div class="span12">
                        <div class="box box-bordered box-color" >
                            <div class="box-title">
                                <h3><i class="icon-dashboard"></i>Total Quantity (In Kg.)</h3>
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
                                                        <div class="huge"><?php echo $total_quantity_of_seeds.' Kg.'; ?></div><br>
                                                        <div>Total Quantity of Seeds!</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  <!-- Total Quantity of Seeds -->
                                    
                                    <div class="span4" >
                                        <div class="panel panel-green">
                                            <div class="panel-heading">
                                                <div class="row" style="padding-left: 30px;">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-users fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="huge"><?php echo $total_quantity_of_fertilisers.' Kg.'; ?></div><br>
                                                        <div>Total Quantity of Fertilisers!</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  <!-- Total Quantity of Fertilisers -->

                                    <div class="span4" >
                                        <div class="panel panel-red">
                                            <div class="panel-heading">
                                                <div class="row" style="padding-left: 30px;">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-users fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="huge"><?php echo $total_quantity_of_pesticide.' Kg.'; ?></div><br>
                                                        <div>Total Quantity of Pesticide!</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  <!-- Total Quantity of Pesticide -->

                                </div>  <!-- Total Quantity of: Seeds, Pesticide and Fertilisers --> 
                                
                            </div>
                        </div>
                    </div>
                </div>  <!-- Total Spend on Inputs -->

                <div class="container-fluid">
                    <div class="span12">
                        <div class="box box-bordered box-color" >
                            <div class="box-title">
                                <h3><i class="icon-dashboard"></i>Sugar cane Details</h3>
                            </div>
                            <div style="clear:both">&nbsp;</div>
                            <div class="container">
                                
                                <div class="row">
                                    <div class="span6" >
                                        <div class="panel panel-cadetblue">
                                            <div class="panel-heading">
                                                <div class="row" style="padding-left: 30px;">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-users fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="huge"><?php echo $num_sugarcane_farmers; ?></div><br>
                                                        <div>Total Number of farmers are growing Sugar Cane!</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  <!-- Total Number of farmers are growing Sugar Cane -->
                                    
                                    <div class="span6" >
                                        <div class="panel panel-cadetblue">
                                            <div class="panel-heading">
                                                <div class="row" style="padding-left: 30px;">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-users fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="huge"><?php echo round($total_area_for_sugarcane, 2); ?></div><br>
                                                        <div>Total area of Sugar cane grown in acre!</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  <!-- Total area of Sugar cane grown -->
                                </div>  <!-- Sugarcane Section -->
                            </div>
                        </div>
                    </div>
                </div>  <!-- Sugarcane Details -->

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
                                            <?php
                                            if($_SESSION['userType']=="Admin")
                                            {
                                                ?>
                                                <a href="report_qualification.php?pag=qualification&type=Illiterate">
                                                    <div class="panel-footer">
                                                        <span class="pull-left">View Details</span>
                                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                                <?php
                                            }
                                            ?>
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
                                            <?php
                                            if($_SESSION['userType']=="Admin")
                                            {
                                                ?>
                                                <a href="report_qualification.php?pag=qualification&type=Primary Education">
                                                    <div class="panel-footer">
                                                        <span class="pull-left">View Details</span>
                                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                                <?php
                                            }
                                            ?>
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
                                            <?php
                                            if($_SESSION['userType']=="Admin")
                                            {
                                                ?>
                                                <a href="report_qualification.php?pag=qualification&type=Matriculate">
                                                    <div class="panel-footer">
                                                        <span class="pull-left">View Details</span>
                                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                                <?php
                                            }
                                            ?>
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
                                                        <div class="huge"><?php echo $num_12th_count; ?></div><br>
                                                        <div>12th Standard!</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            if($_SESSION['userType']=="Admin")
                                            {
                                                ?>
                                                <a href="report_qualification.php?pag=qualification&type=HSC">
                                                    <div class="panel-footer">
                                                        <span class="pull-left">View Details</span>
                                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>  <!-- 12th Standard -->

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
                                            <?php
                                            if($_SESSION['userType']=="Admin")
                                            {
                                                ?>
                                                <a href="report_qualification.php?pag=qualification&type=Graduate">
                                                    <div class="panel-footer">
                                                        <span class="pull-left">View Details</span>
                                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                                <?php
                                            }
                                            ?>
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
                                            <?php
                                            if($_SESSION['userType']=="Admin")
                                            {
                                                ?>
                                                <a href="report_qualification.php?pag=qualification&type=Post Graduate">
                                                    <div class="panel-footer">
                                                        <span class="pull-left">View Details</span>
                                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>	<!-- Post Graduate -->
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
                                                        <div class="huge"><?php echo $num_phd_count; ?></div><br>
                                                        <div>Ph. D.!</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            if($_SESSION['userType']=="Admin")
                                            {
                                                ?>
                                                <a href="report_qualification.php?pag=qualification&type=phd">
                                                    <div class="panel-footer">
                                                        <span class="pull-left">View Details</span>
                                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>  <!-- Ph. D. -->
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
                                            <?php
                                            if($_SESSION['userType']=="Admin")
                                            {
                                                ?>
                                                <a href="report_loan_type.php?pag=loan_type&type_loan=Education">
                                                    <div class="panel-footer">
                                                        <span class="pull-left">View Details</span>
                                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                                <?php
                                            }
                                            ?>
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
                                            <?php
                                            if($_SESSION['userType']=="Admin")
                                            {
                                                ?>
                                                <a href="report_loan_type.php?pag=loan_type&type_loan=Land">
                                                    <div class="panel-footer">
                                                        <span class="pull-left">View Details</span>
                                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                                <?php
                                            }
                                            ?>
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
                                            <?php
                                            if($_SESSION['userType']=="Admin")
                                            {
                                                ?>
                                                <a href="report_loan_type.php?pag=loan_type&type_loan=Agriculture">
                                                    <div class="panel-footer">
                                                        <span class="pull-left">View Details</span>
                                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                                <?php
                                            }
                                            ?>
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
                                            <?php
                                            if($_SESSION['userType']=="Admin")
                                            {
                                                ?>
                                                <a href="report_loan_type.php?pag=loan_type&type_loan=Two Wheeler">
                                                    <div class="panel-footer">
                                                        <span class="pull-left">View Details</span>
                                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                                <?php
                                            }
                                            ?>
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
                                            <?php
                                            if($_SESSION['userType']=="Admin")
                                            {
                                                ?>
                                                <a href="report_loan_type.php?pag=loan_type&type_loan=Equipment">
                                                    <div class="panel-footer">
                                                        <span class="pull-left">View Details</span>
                                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                                <?php
                                            }
                                            ?>
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
                                            <?php
                                            if($_SESSION['userType']=="Admin")
                                            {
                                                ?>
                                                <a href="report_loan_type.php?pag=loan_type&type_loan=Irrigation">
                                                    <div class="panel-footer">
                                                        <span class="pull-left">View Details</span>
                                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                                <?php
                                            }
                                            ?>
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
                                            <?php
                                            if($_SESSION['userType']=="Admin")
                                            {
                                                ?>
                                                <a href="report_loan_type.php?pag=loan_type&type_loan=Fencing">
                                                    <div class="panel-footer">
                                                        <span class="pull-left">View Details</span>
                                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                                <?php
                                            }
                                            ?>
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
                                            <?php
                                            if($_SESSION['userType']=="Admin")
                                            {
                                                ?>
                                                <a href="report_loan_type.php?pag=loan_type&type_loan=Housing">
                                                    <div class="panel-footer">
                                                        <span class="pull-left">View Details</span>
                                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                                <?php
                                            }
                                            ?>
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
                                            <?php
                                            if($_SESSION['userType']=="Admin")
                                            {
                                                ?>
                                                <a href="report_loan_type.php?pag=loan_type&type_loan=Construction OR Renovation">
                                                    <div class="panel-footer">
                                                        <span class="pull-left">View Details</span>
                                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                                <?php
                                            }
                                            ?>
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
                                            <?php
                                            if($_SESSION['userType']=="Admin")
                                            {
                                                ?>
                                                <a href="report_loan_type.php?pag=loan_type&type_loan=Four Wheeler">
                                                    <div class="panel-footer">
                                                        <span class="pull-left">View Details</span>
                                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                                <?php
                                            }
                                            ?>
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
                                            <?php
                                            if($_SESSION['userType']=="Admin")
                                            {
                                                ?>
                                                <a href="report_loan_type.php?pag=loan_type&type_loan=Electronics">
                                                    <div class="panel-footer">
                                                        <span class="pull-left">View Details</span>
                                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                                <?php
                                            }
                                            ?>
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
                                            <?php
                                            if($_SESSION['userType']=="Admin")
                                            {
                                                ?>
                                                <a href="report_loan_type.php?pag=loan_type&type_loan=NA">
                                                    <div class="panel-footer">
                                                        <span class="pull-left">View Details</span>
                                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                                <?php
                                            }
                                            ?>
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
                                            <?php
                                            if($_SESSION['userType']=="Admin")
                                            {
                                                ?>
                                                <a href="report_loan_type.php?pag=loan_type&type_loan=Others">
                                                    <div class="panel-footer">
                                                        <span class="pull-left">View Details</span>
                                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                                <?php
                                            }
                                            ?>
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

