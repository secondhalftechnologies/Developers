<?php 
	include('access1.php'); 
	include('include/connection.php');
	
	echo $_SESSION['acrefin_user'];
	echo '<br>';
	echo $_SESSION['ca_id'];
	
	$feature_name 	= 'Dashboard';
	$home_name    	= "Home";
	$title			= 'SqoreYard | Home';
	$home_url 	  	= "home.php";
	$filename		= 'home.php';
?>
<!doctype html>
<html>

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
                    <div class="box box-color box-bordered lightgreen" style="padding:0px;">
                        <div class="box-title">
                            <h3>
                            	Dashboard 
                            </h3>
                        </div>
                        <div class="box-content nopadding">
                        </div>
                  	</div>
              	</div>                           
            </div>
        </div>	
    </body>
</html>

