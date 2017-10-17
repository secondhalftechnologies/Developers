<?php
	include('access1.php');
	include('include/connection.php');
	

	$feature_name 	= 'Farmer';
	$home_name    	= "Home";
	$title			= 'View Farmer';
	$home_url 	  	= "home.php";
	$filename		= 'view_farmers.php';
	
	if(!isset($_SESSION['sqyard_user']) && $_SESSION['sqyard_user']=="")
	{
		?>
		<script type="text/javascript">
        history.go(-1);
        </script>
        <?php	
	}
	$fm_id = $_REQUEST['fm_id'];
	$ca_id = $_SESSION['ca_id'];
    if($_SESSION['userType']=="Admin")
    {
        $sql   = "select * from tbl_farmers order by id desc";
    }
    else
    {
       $sql = "select * from tbl_farmers where fm_caid='".$ca_id."' order by id desc";
    }
	$res	= mysqli_query($db_con,$sql) or die(mysqli_error($db_con));
	$r		= 1;	
?>	
<!doctype html>
<html>
    <head>
        <?php
        /* This function used to call all header data like css files and links */
        headerdata($feature_name);
        /* This function used to call all header data like css files and links */
    	?>

        <script>
        $(document).ready(function(){
            $.validator.addMethod(
                "filesize",
                function(value, element) {
                    if (window.File && window.FileList) {
                        if ($(element).attr('type') == "file"
                            && ($(element).hasClass('required')
                                || element.files.length > 0)) {
                            var size  = 0;
                        var $form = $(element).parents('form').first();
                        var $fel = $form.find('input[type=file]');
                        var $max = $form.find('input[name=MAX_FILE_SIZE]').first();
                        if ($max) {
                            for (var j=0, fo; fo=$fel[j]; j++) {
                                files  = fo.files;
                                for (var i=0, f; f=files[i]; i++) {
                                    size += f.size;
                                }
                            }
                            return size <= $max.val();
                        }
                    }
                }
                return true;
            },
            "The file(s) selected exceed the file size limit. Please choose another file."
            );
        });
    </script>
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
       
       <!-- Page Content -->
            <section class="page-content">
                <div class="container">

                    

                    <div class="col-md-12">
                            <hr class="visible-sm visible-xs lg">
                            
                            <div class="box box-color box-bordered green">
                            <div class="box-title">
                                <h3>
                                 Upload Images, Document and Forms
                                </h3>
                            </div>
                            <div class="box-content nopadding">
                                <form action="farmerdoc_upload.php?pag=farmers&fm_id=<?php echo $fm_id;  ?>" method="POST" class='form-horizontal form-validate' enctype="multipart/form-data" id="ssss12">
                                    
                                     <input type="hidden" value="5048576" name="MAX_FILE_SIZE">
                                     <div class="control-group">
                                         <label for="textfield" class="control-label">Upload Aadhar </label>
                                         <div class="controls">
                                            <input type="file" class="filesize" name="files1[]" multiple data-rule-extension="true"  accept="application/pdf,image/jpeg,image/png"/><span class="help-block" style="font-weight:bold;color:#7ebd28">max size 5MB (jpg,png,pdf)</span>
                                         </div>
                                     </div> <!-- aadhar -->
                                     <div class="control-group">
                                         <label for="textfield" class="control-label">Upload Pancard </label>
                                         <div class="controls">
                                            <input type="file" class="filesize" name="files2[]" multiple data-rule-extension="true" accept="application/pdf,image/jpeg,image/png"/><span class="help-block" style="font-weight:bold;color:#7ebd28">max size 5MB (jpg,png,pdf)</span>
                                         </div>
                                     </div>

                                     <div class="control-group">
                                         <label for="textfield" class="control-label">Upload 7/12 </label>
                                         <div class="controls">
                                            <input type="file" class="filesize" name="files3[]" multiple data-rule-extension="true"   accept="application/pdf,image/jpeg,image/png"/><span class="help-block" style="font-weight:bold;color:#7ebd28">max size 5MB (jpg,png,pdf)</span>
                                         </div>
                                     </div>

                                     <div class="control-group">
                                         <label for="textfield" class="control-label">Upload Land Registration </label>
                                         <div class="controls">
                                            <input type="file" class="filesize" name="files4[]" multiple data-rule-extension="true"  accept="application/pdf,image/jpeg,image/png"/><span class="help-block" style="font-weight:bold;color:#7ebd28">max size 5MB (jpg,png,pdf)</span>
                                         </div>
                                     </div>

                                     <div class="control-group">
                                         <label for="textfield" class="control-label">Upload Land Valuation</label>
                                         <div class="controls">
                                            <input type="file" class="filesize" name="files5[]" multiple data-rule-extension="true"  accept="application/pdf,image/jpeg,image/png"/><span class="help-block" style="font-weight:bold;color:#7ebd28">max size 5MB</span>
                                            
                                         </div>
                                     </div>

                                     <div class="control-group">
                                         <label for="textfield" class="control-label">Upload Soil Test Documents </label>
                                         <div class="controls">
                                            <input type="file" class="filesize" name="files6[]" multiple  data-rule-extension="true" accept="application/pdf,image/jpeg,image/png"/><span class="help-block" style="font-weight:bold;color:#7ebd28">max size 5MB (jpg,png,pdf)</span>
                                         </div>
                                     </div>

                                     <div class="control-group">
                                         <label for="textfield" class="control-label">Kisan Credit Card </label>
                                         <div class="controls">
                                            <input type="file" class="filesize" name="files7[]" multiple  data-rule-extension="true" accept="application/pdf,image/jpeg,image/png"/><span class="help-block" style="font-weight:bold;color:#7ebd28">max size 5MB (jpg,png,pdf)</span>
                                         </div>
                                     </div>
                                     
                                    <div class="form-actions">
                                        <input type="reset" class="btn" value="Back" id="back">
                                        <input type="submit" class="btn btn-primary" name="U_Submit" id="U_Submit" value="Submit" id="next">
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                          
                            
                            
                        </div>
                </div>
            </section>
            <!-- Page Content / End -->



	</body>
</html>
