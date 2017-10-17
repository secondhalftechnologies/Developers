<?php
session_start();
include('include/connection.php');
if(isset($_SESSION['sqyard_user']))
	{
		header('Location: '.$BaseFolder.'home.php'); 
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Form</title>


	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap responsive -->
	<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
	<!-- Theme CSS -->
	<link rel="stylesheet" href="css/style.css">
	<!-- Color CSS -->
	<link rel="stylesheet" href="css/themes.css">
    
    
    <!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- Nice Scroll -->
	<script src="js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
	<!-- Validation -->
	<script src="js/plugins/validation/jquery.validate.min.js"></script>
	<script src="js/plugins/validation/additional-methods.min.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<script src="js/eakroko.js"></script>
</head>

<body class="login theme-green" data-theme="theme-green">
<div class="wrapper">
		<!--<h1><a href="index.php"><img src="img/logo-big.png" alt="" class='retina-ready' width="59" height="49">Admin Panel</a></h1>-->
		<div class="login-body">
			<h2>SIGN IN</h2>
			<form enctype="multipart/form-data" method='post' class='form-validate' id="frm_login">
				<div class="control-group">
					<div class="pw controls">
						 <input type="text" autocomplete="off" name="emailId" id="emailId" placeholder="Enter Your Email Address" class="input-block-level" data-rule-email="true" data-rule-required="true">
					</div>
				</div>
				<div class="control-group">
					<div class="pw controls">
						<input type="password" autocomplete="off" name="pwfield" id="pwfield" class="input-block-level" data-rule-required="true" placeholder="Enter Your Password">
					</div>
				</div>
				<div class="submit">
					<input type="submit" value="Sign me in" class='btn btn-primary'>
				</div>
			</form>
            <!--<form  method="POST" enctype="multipart/form-data" class='form-horizontal form-bordered form-validate' >
            
                                                            
                                                    <div class="control-group">
															 <div class="pw controls">
														       <input type="text" autocomplete="off" name="emailId" id="emailId" placeholder="Enter Your Email Address" class="input-xxlarge" data-rule-email="true" data-rule-required="true">

                                                            </div>

                                                        </div> 
                                                        
                                                    <div class="control-group">

                                                            <div class="pw controls">

                                                                <input type="password" autocomplete="off" name="pwfield" id="pwfield"  class="input-xxlarge" data-rule-required="true" placeholder="Enter Your Password">

                                                            </div>

                                                        </div>
                                                    
                                                    <div class="form-actions" style="padding-left:0px;text-align:center">

                                                            <button id="submit" name="Submit" type="submit" class="btn" >Submit</button>

                                                            <button id="reset" type="button" class="btn" onclick="window.history.back()">Cancel</button>

                                                        </div> 

                                                    </form>-->
			<div class="forget">
				<a href="#"><span>Forgot password?</span></a>
			</div>
		</div>
	</div>
    
    <script type="text/javascript">
    	
			$('#frm_login').on('submit', function(e) 
			{
				e.preventDefault();
				if ($('#frm_login').valid())
				{
					var username	= $.trim($('input[name="emailId"]').val());
					var password 	= $.trim($('input[name="pwfield"]').val());
					var getLogin	= '1';
					var sendInfo	= {"username":username,"password":password, "getLogin":getLogin};
					var get_login	= JSON.stringify(sendInfo);
					
					$.ajax({
						url: "include/connection.php?",
						type: "POST",
						data: get_login,
						contentType: "application/json; charset=utf-8",						
						success: function(response) 
						{
							data = JSON.parse(response);
							if(data.Success == "Success") 
							{
								// Redirect to link_page.php
								window.location.assign("<?php echo $BaseFolder; ?>"+data.resp);
							} 
							else 
							{
								// reset the fields
								$('#emailId').val('');
								$('#pwfield').val('');
								alert(data.resp);
							}
						},
						error: function (request, status, error) 
						{
							alert(request.responseText);
						},
						complete: function()
						{
						}
					});	
				}				
			});
	
    </script>

</body>
</html>
