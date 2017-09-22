<?php
include('connection.php');
$comp1=strtolower($_REQUEST['comp1']);
if($comp1!="")
{
$sql_pin1="select * from tbl_farmers where fm_aadhar='$comp1'";
$res_pin1=mysqli_query($db_con,$sql_pin1) or die(mysqli_error($db_con));
$tot_pin1=mysqli_num_rows($res_pin1);

?>

				<?php
				if($tot_pin1==0)
				{	
				?>			
				<input type="text" id="mailid"  style="display:none" value="1"  /><span style="color:#063"></span>
                
				<?php
			
			  }
			  else
			  {
				  ?>
				<input type="text" id="mailid"  style="display:none"  value="2"   /> <span>Aadhaar No. already in use</span>
			  
              <?php
			   }
}
			  ?>
