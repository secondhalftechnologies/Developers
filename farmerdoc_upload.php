<?php
include('access1.php');
include('include/connection.php');

if(isset($_POST["U_Submit"]))
{


	$farmer_id = mysqli_real_escape_string($db_con,$_REQUEST['fm_id']);

	$res_get_farmer_info = lookup_value('tbl_farmers',array(),array("fm_id"=>$farmer_id),array(),array(),array());
	if($res_get_farmer_info)
	{
		$num_get_farmer_info	= mysqli_num_rows($res_get_farmer_info);
		if($num_get_farmer_info != 0)
		{
			$row_get_farmer_info	= mysqli_fetch_array($res_get_farmer_info);
			
		}
		else
		{
			 ?>
        		<script type="text/javascript">
            		history.go(-1);
        		</script>
        <?php
		}
	}



	if(isset($_FILES['files1'])) // for Declaration Documents
		{
			$errors1= array();
				foreach($_FILES['files1']['tmp_name'] as $key1 => $tmp_name1 )
				{
					
					$file_name1 =$_FILES['files1']['name'][$key1];
					$file_size1 =$_FILES['files1']['size'][$key1];
					$file_tmp1 =$_FILES['files1']['tmp_name'][$key1];
					$file_type1=$_FILES['files1']['type'][$key1];

					if($file_size1 > 5242880) // file size
					{
						$errors1[]='File size must be less than 5 MB';
					}
					
					if($file_size1 != 0)// files size less than 0
					{
						//for update		
						//$query="update farmerdoc set file_name = '$file_name1',file_size = '$file_size1',file_type= 'file_type1' where farmer_id = '$farmer_id'";

						//for insert
						// $query="INSERT into farmerdoc (farmer_id,file_name,file_size,file_type,applydate,document_type) VALUES('$farmer_id','$file_name1','$file_size1','$file_type1','$register_dt','Aadhar'); ";
										
						$desired_dir1= "data/".$farmer_id;
						
						if(empty($errors1)==true)
						{
							  if(is_dir($desired_dir1)==false)
							  {
									mkdir("$desired_dir1", 0777);// Create directory if it does not exist
							  }
							  
							  if(is_dir("$desired_dir1/".$file_name1)==false)
							  {
									move_uploaded_file($file_tmp1,"$desired_dir1/".$file_name1);
							  }
							  else
							  {		// rename the file if another one exist
									$new_dir1="$desired_dir1/".$file_name1.time();
									rename($file_tmp1,$new_dir1) ;				
							  }
							//mysql_query($query);
						 }
						 else
						 {
							 print_r($errors1);
						 }
						}
				 }//end of foreach
	} // supporting document
	

	if(isset($_FILES['files2'])) // for Declaration Documents
		{
			$errors2= array();
				foreach($_FILES['files2']['tmp_name'] as $key2 => $tmp_name2 )
				{
					
					$file_name2 =$_FILES['files2']['name'][$key2];
					$file_size2 =$_FILES['files2']['size'][$key2];
					$file_tmp2  =$_FILES['files2']['tmp_name'][$key2];
					$file_type2 =$_FILES['files2']['type'][$key2];

					if($file_size2 > 5242880) // file size
					{
						$errors2[]='File size must be less than 5 MB';
					}
					
					if($file_size2 != 0)// files size less than 0
					{
						
						
						//for update		
						//$query="update farmerdoc set file_name = '$file_name1',file_size = '$file_size1',file_type= 'file_type1' where farmer_id = '$farmer_id'";

						//for insert
						//$query="INSERT into farmerdoc (farmer_id,file_name,file_size,file_type,up_applydate) VALUES('$farmer_id','$file_name1','$file_size1','$file_type1','$register_dt'); ";
										
						$desired_dir2= "data/".$farmer_id;
						
						if(empty($errors2)==true)
						{
							  if(is_dir($desired_dir2)==false)
							  {
									mkdir("$desired_dir2", 0777);// Create directory if it does not exist
							  }
							  
							  if(is_dir("$desired_dir2/".$file_name2)==false)
							  {
									move_uploaded_file($file_tmp2,"$desired_dir2/".$file_name2);
							  }
							  else
							  {		// rename the file if another one exist
									$new_dir2="$desired_dir2/".$file_name2.time();
									rename($file_tmp2,$new_dir2) ;				
							  }
							// mysql_query($query);
						 }
						 else
						 {
							 print_r($errors2);
						 }
						}
				 }//end of foreach
	} // supporting document


	if(isset($_FILES['files3'])) // for Declaration Documents
		{
			$errors3= array();
				foreach($_FILES['files3']['tmp_name'] as $key3 => $tmp_name3 )
				{
					
					$file_name3 =$_FILES['files3']['name'][$key3];
					$file_size3 =$_FILES['files3']['size'][$key3];
					$file_tmp3 =$_FILES['files3']['tmp_name'][$key3];
					$file_type3 =$_FILES['files3']['type'][$key3];

					if($file_size3 > 5242880) // file size
					{
						$errors3[]='File size must be less than 5 MB';
					}
					
					if($file_size3 != 0)// files size less than 0
					{
						echo "file3";
						
						//for update		
						//$query="update farmerdoc set file_name = '$file_name1',file_size = '$file_size1',file_type= 'file_type1' where farmer_id = '$farmer_id'";

						//for insert
						//$query="INSERT into farmerdoc (farmer_id,file_name,file_size,file_type,up_applydate) VALUES('$farmer_id','$file_name1','$file_size1','$file_type1','$register_dt'); ";
										
						$desired_dir3= "data/".$farmer_id;
						
						if(empty($errors3)==true)
						{
							  if(is_dir($desired_dir3)==false)
							  {
									mkdir("$desired_dir3", 0777);// Create directory if it does not exist
							  }
							  
							  if(is_dir("$desired_dir3/".$file_name3)==false)
							  {
									move_uploaded_file($file_tmp3,"$desired_dir3/".$file_name3);
							  }
							  else
							  {		// rename the file if another one exist
									$new_dir3="$desired_dir3/".$file_name3.time();
									rename($file_tmp3,$new_dir3) ;				
							  }
							// mysql_query($query);
						 }
						 else
						 {
							 print_r($errors3);
						 }
						}
				 }//end of foreach
	} // supporting document


	if(isset($_FILES['files4'])) // for Declaration Documents
		{
			$errors4= array();
				foreach($_FILES['files4']['tmp_name'] as $key4 => $tmp_name4 )
				{
					
					$file_name4 =$_FILES['files4']['name'][$key4];
					$file_size4 =$_FILES['files4']['size'][$key4];
					$file_tmp4 =$_FILES['files4']['tmp_name'][$key4];
					$file_type4 =$_FILES['files4']['type'][$key4];

					if($file_size4 > 5242880) // file size
					{
						$errors4[]='File size must be less than 5 MB';
					}
					
					if($file_size4 != 0)// files size less than 0
					{
						
						//for update		
						//$query="update farmerdoc set file_name = '$file_name1',file_size = '$file_size1',file_type= 'file_type1' where farmer_id = '$farmer_id'";

						//for insert
						//$query="INSERT into farmerdoc (farmer_id,file_name,file_size,file_type,up_applydate) VALUES('$farmer_id','$file_name1','$file_size1','$file_type1','$register_dt'); ";
										
						$desired_dir4= "data/".$farmer_id;
						
						if(empty($errors4)==true)
						{
							  if(is_dir($desired_dir4)==false)
							  {
									mkdir("$desired_dir4", 0777);// Create directory if it does not exist
							  }
							  
							  if(is_dir("$desired_dir4/".$file_name4)==false)
							  {
									move_uploaded_file($file_tmp4,"$desired_dir4/".$file_name4);
							  }
							  else
							  {		// rename the file if another one exist
									$new_dir4="$desired_dir4/".$file_name4.time();
									rename($file_tmp4,$new_dir4) ;				
							  }
							// mysql_query($query);
						 }
						 else
						 {
							 print_r($errors4);
						 }
						}
				 }//end of foreach
	} // supporting document


	if(isset($_FILES['files5'])) // for Declaration Documents
		{
			$errors5= array();
				foreach($_FILES['files5']['tmp_name'] as $key5 => $tmp_name5 )
				{
					
					$file_name5 =$_FILES['files5']['name'][$key5];
					$file_size5 =$_FILES['files5']['size'][$key5];
					$file_tmp5 =$_FILES['files5']['tmp_name'][$key5];
					$file_type5 =$_FILES['files5']['type'][$key5];

					if($file_size5 > 5242880) // file size
					{
						$errors5[]='File size must be less than 5 MB';
					}
					
					if($file_size5 != 0)// files size less than 0
					{
						
						//for update		
						//$query="update farmerdoc set file_name = '$file_name1',file_size = '$file_size1',file_type= 'file_type1' where farmer_id = '$farmer_id'";

						//for insert
						//$query="INSERT into farmerdoc (farmer_id,file_name,file_size,file_type,up_applydate) VALUES('$farmer_id','$file_name1','$file_size1','$file_type1','$register_dt'); ";
										
						$desired_dir5= "data/".$farmer_id;
						
						if(empty($errors5)==true)
						{
							  if(is_dir($desired_dir5)==false)
							  {
									mkdir("$desired_dir5", 0777);// Create directory if it does not exist
							  }
							  
							  if(is_dir("$desired_dir5/".$file_name5)==false)
							  {
									move_uploaded_file($file_tmp5,"$desired_dir5/".$file_name5);
							  }
							  else
							  {		// rename the file if another one exist
									$new_dir5="$desired_dir5/".$file_name5.time();
									rename($file_tmp5,$new_dir5) ;				
							  }
							// mysql_query($query);
						 }
						 else
						 {
							 print_r($errors5);
						 }
						}
				 }//end of foreach
	} // supporting document

	if(isset($_FILES['files6'])) // for Declaration Documents
		{
			$errors6= array();
				foreach($_FILES['files6']['tmp_name'] as $key6 => $tmp_name6 )
				{
					
					$file_name6 =$_FILES['files6']['name'][$key6];
					$file_size6 =$_FILES['files6']['size'][$key6];
					$file_tmp6 =$_FILES['files6']['tmp_name'][$key6];
					$file_type6 =$_FILES['files6']['type'][$key6];

					if($file_size6 > 5242880) // file size
					{
						$errors6[]='File size must be less than 5 MB';
					}
					
					if($file_size6 != 0)// files size less than 0
					{
						
						//for update		
						//$query="update farmerdoc set file_name = '$file_name1',file_size = '$file_size1',file_type= 'file_type1' where farmer_id = '$farmer_id'";

						//for insert
						//$query="INSERT into farmerdoc (farmer_id,file_name,file_size,file_type,up_applydate) VALUES('$farmer_id','$file_name1','$file_size1','$file_type1','$register_dt'); ";
										
						$desired_dir6= "data/".$farmer_id;
						
						if(empty($errors6)==true)
						{
							  if(is_dir($desired_dir6)==false)
							  {
									mkdir("$desired_dir6", 0777);// Create directory if it does not exist
							  }
							  
							  if(is_dir("$desired_dir6/".$file_name6)==false)
							  {
									move_uploaded_file($file_tmp6,"$desired_dir6/".$file_name6);
							  }
							  else
							  {		// rename the file if another one exist
									$new_dir6="$desired_dir6/".$file_name6.time();
									rename($file_tmp6,$new_dir6) ;				
							  }
							// mysql_query($query);
						 }
						 else
						 {
							 print_r($errors6);
						 }
						}
				 }//end of foreach
	} // supporting document


	if(isset($_FILES['files7'])) // for Declaration Documents
		{
			$errors7= array();
				foreach($_FILES['files7']['tmp_name'] as $key7 => $tmp_name7 )
				{
					
					$file_name7 =$_FILES['files7']['name'][$key7];
					$file_size7 =$_FILES['files7']['size'][$key7];
					$file_tmp7 =$_FILES['files7']['tmp_name'][$key7];
					$file_type7 =$_FILES['files7']['type'][$key7];

					if($file_size7 > 5242880) // file size
					{
						$errors7[]='File size must be less than 5 MB';
					}
					
					if($file_size7 != 0)// files size less than 0
					{
						
						//for update		
						//$query="update farmerdoc set file_name = '$file_name1',file_size = '$file_size1',file_type= 'file_type1' where farmer_id = '$farmer_id'";

						//for insert
						//$query="INSERT into farmerdoc (farmer_id,file_name,file_size,file_type,up_applydate) VALUES('$farmer_id','$file_name1','$file_size1','$file_type1','$register_dt'); ";
										
						$desired_dir7= "data/".$farmer_id;
						
						if(empty($errors7)==true)
						{
							  if(is_dir($desired_dir7)==false)
							  {
									mkdir("$desired_dir7", 0777);// Create directory if it does not exist
							  }
							  
							  if(is_dir("$desired_dir7/".$file_name7)==false)
							  {
									move_uploaded_file($file_tmp7,"$desired_dir7/".$file_name7);
							  }
							  else
							  {		// rename the file if another one exist
									$new_dir7="$desired_dir7/".$file_name7.time();
									rename($file_tmp7,$new_dir7) ;				
							  }
							// mysql_query($query);
						 }
						 else
						 {
							 print_r($errors7);
						 }
						}
				 }//end of foreach
	} // supporting document

		?>
		<script type="text/javascript">
			alert ("Upload Complete!!!");	
			history.go(-1);
		</script>
		<?php				

}
else
{
		?>
		<script type="text/javascript">
			alert ("You Dont Have Access");	
			history.go(-1);
		</script>
		<?php

}

?>
