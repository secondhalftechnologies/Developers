<?php
include('access1.php');
include('connection.php');
if(isset($_SESSION['acrefin_user']) && $_SESSION['acrefin_user']!="")
{
//echo $_SESSION['ca_id'];    
?>	



<!doctype html>
<html>

<head>
	<title> View Farmers </title>
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
    	<!-- dataTables -->
	<link rel="stylesheet" href="css/plugins/datatable/TableTools.css">
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

	<script src="js/jquery-1.8.3.js"></script>

<script>
	$(document).ready(function(e) {
        
		$("#selectall").click(function(){
			$(".case").attr("checked",this.checked);
		});
		
		$(".case").click(function(){
			if($(".case").length==$(".case:checked").length){
				$("#selectall").attr("checked","checked");
			}
			else{
				$("#selectall").removeAttr("checked");
			}
		});
		
    });
	</script>	<!-- Nice Scroll -->
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
    	<!-- dataTables -->
	<script src="js/plugins/datatable/jquery.dataTables.min.js"></script>
	<script src="js/plugins/datatable/TableTools.min.js"></script>
	<script src="js/plugins/datatable/ColReorder.min.js"></script>
	<script src="js/plugins/datatable/ColVis.min.js"></script>
	<script src="js/plugins/datatable/jquery.dataTables.columnFilter.js"></script>

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
	<!-- Validation -->
	<script src="js/plugins/validation/jquery.validate.min.js"></script>
	<script src="js/plugins/validation/additional-methods.min.js"></script>
	<!-- Theme framework -->
	<script src="js/eakroko.min.js"></script>
	<!-- Theme scripts -->
	<script src="js/application.min.js"></script>
	<!-- Just for demonstration -->
	<script src="js/demonstration.min.js"></script>
    
<script type="text/javascript">
function confirmAction(id)
{
		var r = confirm("Do you want to delete?");
		if(r==true)
		{
			window.open('deletevideos.php?id='+id,'_self');
		}
		else
		{
		}
}
</script>
<script language="javascript">
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
	
	function sord(c_value,c_id,c_type) {
		
		
		var strURL="findspasorder.php?c_value="+c_value+"&c_id="+c_id+"&c_type="+c_type;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('comp_1').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}
	
	
	

	
</script>
	<!-- Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico" />
	<!-- Apple devices Homescreen icon -->
	<link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-precomposed.png" />

</head>

<body class="theme-green" data-theme="theme-green">
	<div id="new-task" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">Add new task</h3>
		</div>
		
	</div>
	<div id="navigation">
		<div class="container-fluid">
			<a href="#" id="brand">Admin Panel</a>
			<a href="#" class="toggle-nav" rel="tooltip" data-placement="bottom" title="Toggle navigation"><i class="icon-reorder"></i></a>
			<!-- main menu -->
            
            <?php
            include('admin_menu.php');
			?>
            
            <!-- main menu -->
			<div class="user">
				
				<div class="dropdown asdf">
					<a href="#" class='dropdown-toggle' data-toggle="dropdown"><?php echo $_SESSION['acrefin_user'] ?> <i class="icon-user"></i></a>
					<ul class="dropdown-menu pull-right">
						<li>
							<a href="#">Edit profile</a>
						</li>
						<li>
							<a href="logout.php">Sign out</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid" id="content">
			
		<div id="main" style="margin-left:0px ">
			<?php 
				date_default_timezone_set("Asia/Calcutta");
				$dt=date('F d, Y');
				$week=date('l');
			?>
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-right">
						<ul class="stats">
							<li class='lightred'>
								<i class="icon-calendar"></i>
								<div class="details">
									<span class="big"><?php echo $dt; ?></span>
									<span><?php echo $week; ?></span>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="home.php">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="#">Farmers</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="#">View Farmers</a>
						</li>
					</ul>
					<div class="close-bread">
						<a href="#"><i class="icon-remove"></i></a>
					</div>
				</div>
<?php 

$ca_id		= $_SESSION['ca_id'];
$sql="select * from tbl_farmers where fm_caid='".$ca_id."' order by id desc";
$res=mysqli_query($db_con,$sql);
  $r=1;
	?>
     <!-- Main content start -->

				<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-table"></i>
									Farmers
								</h3>
							</div>
							<div class="box-content nopadding">
                            <div style="padding:20px"><a href="add_farmers.php?pag=farmers" class="btn btn-primary">Add Farmer</a></div>
                            <form id="mainform" action="deletefarmers.php" method="post">
								<div id="comp_1">
                                <table class="table table-bordered dataTable dataTable-scroll-x">
									<thead>
										<tr>
                                        	
                                       		<th>Sr no.</th>
                                            <th>Forms</th>
											<th>Farmer ID</th>
                                            <th>Farmer Name</th>
                                            <th>Aadhaar No</th>
                                            <th>Mobile No</th>
                                            <th>Loan Require ( Rs.)</th>
                                            <th>Status</th>
                                            <th class='hidden-350'>Created Date</th>
											
                                            <?php /*?><th class='hidden-1024'>Edit</th>
                                            <th class='hidden-480'><a href="#"><input type="checkbox" id="selectall" /></a>
                    	<input type="submit" name="main" value="Delete" style="margin-left:10px; width:80px;height:30px;font-size:16px" /></th><?php */?>
                                            
										</tr>
									</thead>
									<tbody>
									  <?php
	  while($row=mysqli_fetch_array($res))
	  {

	  ?>
										<tr>
                    <td><?php echo $r; ?></td>
                    <td style="text-align:center;"><a href="acrefinfrm_1.php?pag=farmers&fm_id=<?php echo $row['fm_id']; ?>" class="btn btn-primary">Click Here</a></td>
					<td><?php echo $row['fm_id']; ?></td>
                    <td><?php echo ucwords($row['fm_name']); ?>
                    <?php
					$sql_check_point  =" SELECT * FROM tbl_points WHERE pt_frm1 !='' AND pt_frm2 !='' AND pt_frm3 !='' AND pt_frm4 !='' AND pt_frm6 !='' ";
					$sql_check_point .=" AND pt_frm7 !='' AND pt_frm8 !='' AND pt_frm9 !='' AND pt_frm10 !='' AND pt_frm5 !='' AND pt_frm12 !='' AND pt_frm13 !=''  AND pt_frm11 !='' AND fm_id='".$row['fm_id']."'";
					$res_check_point  = mysqli_query($db_con,$sql_check_point) or die(mysqli_error($db_con));
					$num_check_point  = mysqli_num_rows($res_check_point);
					if($num_check_point==0)
					{
						echo '<small style="color:red">Incomplete</small>';
					}
					else
					{
						echo '<small style="color:green">Complete</small>';
					}
					?>
                    
                    </td>
                    <td><?php echo $row['fm_aadhar']; ?></td>
                    <td><?php echo $row['fm_mobileno']; ?></td>
                    <td><?php echo $row['fm_amount']; ?></td>
                    <td><?php echo $row['fm_status']; ?></td>
                    <td><?php echo $row['fm_createddt']; ?></td>
                    
                   

        <?php /*?><td><div align="center"><a href="edit_banners.php?id=<?php echo $row['ban_id'] ?>"><img src="images/edit.png" width="16" height="16" border="0" /></a></div></td>
        <td><div align="center"><input type="checkbox" class="case" name="banners[]" value="<?php echo $row['ban_id']?>" /></div></td><?php */?>
										</tr>
                                        
                                        
                                         <?php
		$r++;
	  }
	  ?>
									</tbody>
								</table>
                                </div>
                                 </form>
							</div>
						</div>
					</div>
				</div>
                
    <!-- Main content end -->
				
				
			</div>
		</div></div>
		
	</body>

	
</html>
<?php
}
else
{
?>
<script type="text/javascript">
history.go(-1);
</script>
<?php	
}
?>
