<?php
	include('access1.php');
	include('include/connection.php');

	$feature_name 	= 'Farmer';
	$home_name    	= "Home";
	$title			= 'View Farmer';
	$home_url 	  	= "home.php";
	$filename		= 'view_farmers.php';
	
	if(!isset($_SESSION['acrefin_user']) && $_SESSION['acrefin_user']=="")
	{
		?>
		<script type="text/javascript">
        history.go(-1);
        </script>
        <?php	
	}
	
	$ca_id	= $_SESSION['ca_id'];
	$sql	= "select * from tbl_farmers where fm_caid='".$ca_id."' order by id desc";
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
				breadcrumbs($home_url,$home_name,'View Farmers',$filename,$feature_name);
				/* this function used to add navigation menu to the page*/
				?>
                <div class="container-fluid">
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
	</body>
</html>
