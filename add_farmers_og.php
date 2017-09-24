<?php 
	include('access1.php'); 
	include('connection.php');
?>

<!DOCTYPE html>
<html class="not-ie no-js" lang="en">
    <head>
    <title>Farmers</title>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- Apple devices fullscreen -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <!-- Apple devices fullscreen -->
    <meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap responsive -->
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
    <!-- jQuery UI -->
    <link rel="stylesheet" href="css/plugins/jquery-ui/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="css/plugins/jquery-ui/smoothness/jquery.ui.theme.css">
    <!-- PageGuide -->
    <link rel="stylesheet" href="css/plugins/pageguide/pageguide.css">
    <!-- Fullcalendar -->
    <link rel="stylesheet" href="css/plugins/fullcalendar/fullcalendar.css">
    <link rel="stylesheet" href="css/plugins/fullcalendar/fullcalendar.print.css" media="print">
    <!-- chosen -->
    <link rel="stylesheet" href="css/plugins/chosen/chosen.css">
    <!-- select2 -->
    <link rel="stylesheet" href="css/plugins/select2/select2.css">
    <!-- icheck -->
    <link rel="stylesheet" href="css/plugins/icheck/all.css">
    <!-- Theme CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Color CSS -->
    <link rel="stylesheet" href="css/themes.css">

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- Nice Scroll -->
    <script src="js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- jQuery UI -->
    <script src="js/plugins/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/plugins/jquery-ui/jquery.ui.widget.min.js"></script>
    <script src="js/plugins/jquery-ui/jquery.ui.mouse.min.js"></script>
    <script src="js/plugins/jquery-ui/jquery.ui.draggable.min.js"></script>
    <script src="js/plugins/jquery-ui/jquery.ui.resizable.min.js"></script>
    <script src="js/plugins/jquery-ui/jquery.ui.sortable.min.js"></script>
    <!-- Touch enable for jquery UI -->
    <script src="js/plugins/touch-punch/jquery.touch-punch.min.js"></script>
    <!-- slimScroll -->
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- vmap -->
    <script src="js/plugins/vmap/jquery.vmap.min.js"></script>
    <script src="js/plugins/vmap/jquery.vmap.world.js"></script>
    <script src="js/plugins/vmap/jquery.vmap.sampledata.js"></script>
    <!-- Bootbox -->
    <script src="js/plugins/bootbox/jquery.bootbox.js"></script>
    <!-- Flot -->
    <script src="js/plugins/flot/jquery.flot.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.bar.order.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.pie.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.min.js"></script>
    <!-- imagesLoaded -->
    <script src="js/plugins/imagesLoaded/jquery.imagesloaded.min.js"></script>
    <!-- PageGuide -->
    <script src="js/plugins/pageguide/jquery.pageguide.js"></script>
    <!-- FullCalendar -->
    <script src="js/plugins/fullcalendar/fullcalendar.min.js"></script>
    <!-- Chosen -->
    <script src="js/plugins/chosen/chosen.jquery.min.js"></script>
    <!-- select2 -->
    <script src="js/plugins/select2/select2.min.js"></script>
    <!-- icheck -->
    <script src="js/plugins/icheck/jquery.icheck.min.js"></script>

    <!-- Theme framework -->
    <script src="js/eakroko.min.js"></script>
    <!-- Theme scripts -->
    <script src="js/application.min.js"></script>
    <!-- Just for demonstration -->

    <script src="js/plugins/jquery-ui/jquery.ui.widget.min.js"></script>
    <!--	<script src="js/bootstrap.min.js"></script> -->
    <script src="js/plugins/validation/jquery.validate.min.js"></script>
    <script src="js/plugins/validation/additional-methods.min.js"></script>
    <script src="js/plugins/wizard/jquery.form.wizard.min.js"></script>
    <script src="js/js_validator.js"></script>
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
    
    function getXMLHTTP() { //fuction to return the xml http object
    
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
    
    function Aadhaar(comp1) {		
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
    
    function Mobile(comp2) {		
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
    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" />
    <!-- Apple devices Homescreen icon -->
    <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-precomposed.png" />
    </head>
    <body  class="theme-green" data-theme="theme-green">
<div id="navigation">
      <div class="container-fluid"> <a href="#" id="brand">Admin Panel</a> <a href="#" class="toggle-nav" rel="tooltip" data-placement="bottom" title="Toggle navigation"><i class="icon-reorder"></i></a> 
    <!-- main menu -->
    
    <?php
                include('admin_menu.php');
                ?>
    
    <!-- main menu -->
    <div class="user">
          <div class="dropdown asdf"> <a href="#" class='dropdown-toggle' data-toggle="dropdown"><?php echo $_SESSION['acrefin_user']; ?> <i class="icon-user"></i></a>
        <ul class="dropdown-menu pull-right">
              <li> <a href="#">Edit profile</a> </li>
              <li> <a href="logout.php">Sign out</a> </li>
            </ul>
      </div>
        </div>
  </div>
    </div>
<div class="container-fluid" id="content">
      <div id="main" style="margin-left:0;">
    <?php 
                    date_default_timezone_set("Asia/Calcutta");
                    $dt=date('F d, Y');
                    $week=date('l');
                ?>
    <div class="container-fluid">
          <div class="page-header">
        <div class="pull-right">
              <ul class="stats">
            <li class='lightred'> <i class="icon-calendar"></i>
                  <div class="details"> <span class="big"><?php echo $dt; ?></span> <span><?php echo $week; ?></span> </div>
                </li>
          </ul>
            </div>
      </div>
          <style type="text/css">
                    .span6{
                        width:300px !important;
                    }
                    </style>
          <div class="box box-color box-bordered lightgreen" style="padding:0px;">
        <div class="box-title">
              <h3> Add Farmer </h3>
            </div>
        <div class="box-content nopadding">
              <form  method="POST" action="farmeraction.php" enctype="multipart/form-data" class='form-horizontal form-bordered form-validate' id="bb">
            <div class="control-group">
                  <label for="text" class="control-label" style="margin-top:10px">First Name <span style="color:#F00">*</span></label>
                  <div class="controls">
                <input type="text" id="f1_fname" name="f1_fname" class="input-xlarge v_name" data-rule-required="true" data-rule-lettersonly="true" placeholder="First Name">
              </div>
                </div>
            <!--first name-->
            <div class="control-group">
                  <label for="text" class="control-label" style="margin-top:10px">Middle Name <span style="color:#F00">*</span></label>
                  <div class="controls">
                <input type="text" id="f1_mname" name="f1_mname" class="input-xlarge v_name" data-rule-required="true" data-rule-lettersonly="true" placeholder="Middle Name">
              </div>
                </div>
            <!--Middle name-->
            <div class="control-group">
                  <label for="text" class="control-label" style="margin-top:10px">Last Name <span style="color:#F00">*</span></label>
                  <div class="controls">
                <input type="text" id="f1_lname" name="f1_lname" class="input-xlarge v_name" data-rule-required="true" data-rule-lettersonly="true" placeholder="Last Name" >
              </div>
                </div>
            <!--Last name-->
            <div class="control-group">
                  <label for="numberfield" class="control-label">Aadhaar No. <span style="color:#F00">*</span></label>
                  <div class="controls">
                <input type="text" placeholder="Aadhaar no" name="fm_aadhar" id="fm_aadhar" data-rule-number="true" maxlength="12" data-rule-required="true" onBlur="Aadhaar(this.value);"  data-rule-minlength="12"  data-rule-maxlength="12" class="input-xlarge v_number">
                <label id="comp_1" style="color:#FF0000;width:200px;margin-left:100px;"></label>
              </div>
                </div>
            <!--aadhar no-->
            <div class="control-group">
                  <label for="numberfield" class="control-label">Mobile No. <span style="color:#F00">*</span></label>
                  <div class="controls">
                <input type="text" placeholder="Mobile no" name="fm_mobileno" id="fm_mobileno" data-rule-number="true" maxlength="10"  autocomplete="off" data-rule-required="true" onBlur="Mobile(this.value);"  data-rule-minlength="10"  data-rule-maxlength="10" class="input-xlarge v_number">
                <label id="comp_2" style="color:#FF0000;width:200px;margin-left:100px;"></label>
              </div>
                </div>
            <!-- Mobile No -->
            
            <div class="control-group">
                  <label for="numberfield" class="control-label">Do You Want a Loan<span style="color:#F00">*</span></label>
                  <div class="controls">
                <input type="radio"  name="loan_want" id="loan_want"  autocomplete="off" data-rule-required="true" value="yes" onClick="show_loan(1)">
                Yes
                &nbsp;&nbsp;
                <input type="radio"  name="loan_want" id="loan_want"  autocomplete="off" data-rule-required="true" value="no" onClick="show_loan(0)">
                No
                <label id="comp_2" style="color:#FF0000;width:200px;margin-left:100px;"></label>
              </div>
                </div>
            <!-- Mobile No -->
            
            <div class="control-group" id="loan_req"  style="display:none">
                  <label for="numberfield" class="control-label">Loan Amount Required<span style="color:#F00">*</span></label>
                  <div class="controls">
                <input type="text" placeholder="Loan Amount" name="loan_amount" id="loan_amount" data-rule-number="true" maxlength="10"  autocomplete="off" data-rule-required="true"  data-rule-maxlength="10" class="input-xlarge v_number">
                <label id="comp_2" style="color:#FF0000;width:200px;margin-left:100px;"></label>
              </div>
                </div>
            <!-- Mobile No -->
            
            <div class="form-actions">
                  <button id="submit" name="Submit" type="submit" class="btn btn-primary" >Submit</button>
                  <button id="reset" type="button" class="btn" onclick="window.history.back()">Cancel</button>
                </div>
            <!-- Submit -->
            
          </form>
            </div>
      </div>
        </div>
  </div>
    </div>
</body>
</html>