<?php
$page_name = basename($_SERVER['PHP_SELF']);


$result = lookup_value('tbl_points',array(),array("fm_id"=>$fm_id),array(),array(),array());
  if($result)
  {
	  $num    = mysqli_num_rows($result);
	  if($num !=0)
	  {
		  $pt_row     = mysqli_fetch_array($result);
		  
		 
	  }
  }

?>
<style type="text/css">
	
	.badge {
    padding-right: 9px;
    padding-left: 9px;
    -webkit-border-radius: 9px;
    -moz-border-radius: 9px;
    border-radius: 9px;
    background-color: #c7c7c7;
    text-shadow: none !important;
    font-weight: unset !important;
    display: block;
	width: 25%;
	text-align: center;
	margin: 0px auto;
}

  li.active  .badge{
       
       background: #878787;
  }

  #g_total{
  	/*display: none;*/
  	visibility: hidden;
  }
  #total_p
  {
  	background-color: #4A8B71;
  	color: #fff;
  }
  #avg{
  	font-size: 27px;
  }
</style>
<ul class="wizard-steps steps-5">
											<li <?php if($page_name == "acrefinfrm_1.php") { ?> class="active" <?php } ?> >
												<div class="single-step">
													<a  href="acrefinfrm_1.php?pag=farmers&fm_id=<?php echo $fm_id; ?>" title="Personal Details">
														<span class="title">1</span>
														<span class="circle">
															<span class="active"></span>
														</span>
													    <span class="description">
														Applicant's Personal Details
                                                         <?php if(isset($pt_row['pt_frm1']) && $pt_row['pt_frm1']!="") {?>
                                                        <span id="f1_pt" class="badge " style="font-size:16px; font-weight:bold"><?php echo $pt_row['pt_frm1']; ?></span> 
                                                        <?php } 
														else
														{?>
                                                        <span id="f1_pt" class="badge " style="font-size:16px; color:red">Incomplete</span> 
                                                        <?php } ?>
													</span></a>
												</div>
											</li>
											<li <?php if($page_name == "acrefinfrm_2.php") { ?> class="active" <?php } ?> >
												<div class="single-step">
													<a  href="acrefinfrm_2.php?pag=farmers&fm_id=<?php echo $fm_id; ?>" title="Applicant's Knowledge">
														<span class="title" title="Applicant's Knowledge">2</span>
														<span class="circle">
														</span>
														<span class="description">
														Applicant's Knowledge  &nbsp;
                                                         <?php if(isset($pt_row['pt_frm2']) && $pt_row['pt_frm2']!="") {?>
                                                        <span class="badge " id="f2_pt" style="font-size:16px; font-weight:bold"><?php echo $pt_row['pt_frm2']; ?></span> 
                                                        <?php } 
														else
														{?>
                                                        <span class="badge " id="f2_pt" style="font-size:16px; color:red">Incomplete</span> 
                                                        <?php } ?>
													</span></a>
												</div>
											</li>
											<li <?php if($page_name == "acrefinfrm_3.php") { ?> class="active" <?php } ?> >
												<div class="single-step">
													<a  href="acrefinfrm_3.php?pag=farmers&fm_id=<?php echo $fm_id; ?>" title="Spouse Details">
													<span class="title" title="Spouse Details">3</span>
													<span class="circle">
													</span>
													<span class="description">
														 Spouse Details
                                                          <?php if(isset($pt_row['pt_frm3']) && $pt_row['pt_frm3']!="") {?>
                                                        <span class="badge " id="f3_pt" style="font-size:16px; font-weight:bold"><?php echo $pt_row['pt_frm3']; ?></span> 
                                                        <?php } 
														else
														{?>
                                                        <span class="badge " id="f3_pt" style="font-size:16px; color:red">Incomplete</span> 
                                                        <?php } ?>
													</span></a>
												</div>
											</li>
                                            <li <?php if($page_name == "acrefinfrm_4.php") { ?> class="active" <?php } ?>>
												<div class="single-step">
													<a  href="acrefinfrm_4.php?pag=farmers&fm_id=<?php echo $fm_id; ?>" title="Spouse's Knowledge">
													<span class="title" title="Spouse's Knowledge">4</span>
													<span class="circle">
													</span>
													<span class="description">
														Spouse's Knowledge 
                                                         <?php if(isset($pt_row['pt_frm4']) && $pt_row['pt_frm4']!="") {?>
                                                        <span class="badge " id="f4_pt" style="font-size:16px; font-weight:bold"><?php echo $pt_row['pt_frm4']; ?></span> 
                                                        <?php } 
														else
														{?>
                                                        <span class="badge " id="f4_pt" style="font-size:16px; color:red">Incomplete</span> 
                                                        <?php } ?>
													</span></a>
												</div>
											</li>
                                            <li <?php if($page_name == "acrefinfrm_5.php") { ?> class="active" <?php } ?>>
												<div class="single-step">
													
													<a  href="acrefinfrm_5.php?pag=farmers&fm_id=<?php echo $fm_id; ?>" title="Applicant's Phone ">
													<span class="title" title="Details of Applicant's Phone ">5</span>
													<span class="circle">
													</span>
													<span class="description">
														Details of Applicant's Phone 
                                                         <?php if(isset($pt_row['pt_frm5']) && $pt_row['pt_frm5']!="") {?>
                                                        <span class="badge " id="" style="font-size:16px; font-weight:bold"><?php echo $pt_row['pt_frm5']; ?></span> 
                                                        <?php } 
														else
														{?>
                                                        <span class="badge " id="" style="font-size:16px; color:red">Incomplete</span> 
                                                        <?php } ?>
													</span></a>
												</div>
											</li>
                                            <li <?php if($page_name == "acrefinfrm_6.php") { ?> class="active" <?php } ?>>
												<div class="single-step">
													
													<a  href="acrefinfrm_6.php?pag=farmers&fm_id=<?php echo $fm_id; ?>" title="Family Details">
													<span class="title" title="Family Details">6</span>
													<span class="circle">
													</span>
													<span class="description">
														Family Details
                                                         <?php if(isset($pt_row['pt_frm6']) && $pt_row['pt_frm6']!="") {?>
                                                        <span class="badge " id="f6_pt" style="font-size:16px; font-weight:bold"><?php echo $pt_row['pt_frm6']; ?></span> 
                                                        <?php } 
														else
														{?>
                                                        <span class="badge " id="f6_pt" style="font-size:16px; color:red">Incomplete</span> 
                                                        <?php } ?>
													</span></a>
												</div>
											</li>
                                            <li <?php if($page_name == "acrefinfrm_7.php") { ?> class="active" <?php } ?>>
												<div class="single-step">
													
													<a  href="acrefinfrm_7.php?pag=farmers&fm_id=<?php echo $fm_id; ?>" title="Residence Details">
													<span class="title" title="Residence Status & Details">7</span>
													<span class="circle">
													</span>
													<span class="description">
														Residence Status & Details
                                                         <?php if(isset($pt_row['pt_frm7']) && $pt_row['pt_frm7']!="") {?>
                                                        <span class="badge " id="f7_pt" style="font-size:16px; font-weight:bold"><?php echo $pt_row['pt_frm7']; ?></span> 
                                                        <?php } 
														else
														{?>
                                                        <span class="badge " id="f7_pt" style="font-size:16px; color:red">Incomplete</span> 
                                                        <?php } ?>
													</span></a>
												</div>
											</li>
                                            <li <?php if($page_name == "acrefinfrm_8.php") { ?> class="active" <?php } ?>>
												<div class="single-step">
													
													<a  href="acrefinfrm_8.php?pag=farmers&fm_id=<?php echo $fm_id; ?>" title="Loan and liabilities Details">
													<span class="title" title="Loan and liabilities Details">8</span>
													<span class="circle">
													</span>
													<span class="description">
														Loan and liabilities Details
                                                         <?php if(isset($pt_row['pt_frm8']) && $pt_row['pt_frm8']!="") {?>
                                                        <span class="badge " id="f8_pt" style="font-size:16px; font-weight:bold"><?php echo $pt_row['pt_frm8']; ?></span> 
                                                        <?php } 
														else
														{?>
                                                        <span class="badge " id="f8_pt" style="font-size:16px; color:red">Incomplete</span> 
                                                        <?php } ?>
													</span></a>
												</div>
											</li>
                                            <li <?php if($page_name == "acrefinfrm_9.php") { ?> class="active" <?php } ?>>
												<div class="single-step">
													
													<a  href="acrefinfrm_9.php?pag=farmers&fm_id=<?php echo $fm_id; ?>" title="Land Details">
													<span class="title" title="Land Details ">9</span>
													<span class="circle">
													</span>
													<span class="description">
														Land Details 
                                                         <?php if(isset($pt_row['pt_frm9']) && $pt_row['pt_frm9']!="") {?>
                                                        <span class="badge " id="f9_pt" style="font-size:16px; font-weight:bold"><?php echo $pt_row['pt_frm9']; ?></span> 
                                                        <?php } 
														else
														{?>
                                                        <span class="badge " id="f9_pt" style="font-size:16px; color:red">Incomplete</span> 
                                                        <?php } ?>
                                                        
													</span></a>
												</div>
											</li>
                                            <li <?php if($page_name == "acrefinfrm_10.php") { ?> class="active" <?php } ?>>
												<div class="single-step">
													
													<a  href="acrefinfrm_10.php?pag=farmers&fm_id=<?php echo $fm_id; ?>" title="Crop and Cultivation Data">
													<span class="title" title="Crop and Cultivation Data">10</span>
													<span class="circle">
													</span>
													<span class="description">
														Crop and Cultivation Data
                                                         <?php if(isset($pt_row['pt_frm10']) && $pt_row['pt_frm10']!="") {?>
                                                        <span class="badge" id="f10_pt" style="font-size:16px; font-weight:bold"><?php echo $pt_row['pt_frm10']; ?></span> 
                                                        <?php } 
														else
														{?>
                                                        <span class="badge" id="f10_pt" style="font-size:16px; color:red">Incomplete</span> 
                                                        <?php } ?>
													</span></a>
												</div>
											</li>
                                            <li <?php if($page_name == "acrefinfrm_11.php") { ?> class="active" <?php } ?>>
												<div class="single-step">
													
													<a  href="acrefinfrm_11.php?pag=farmers&fm_id=<?php echo $fm_id; ?>" title="Previous Year Yield Details">
													<span class="title" title="Previous Year Yield Details">11</span>
													<span class="circle">
													</span>
													<span class="description">
															Previous Year Yield Details
                                                         <?php if(isset($pt_row['pt_frm11']) && $pt_row['pt_frm11']!="") {?>
                                                        <span class="badge"  id="f11_pt" style="font-size:16px; font-weight:bold"><?php echo $pt_row['pt_frm11']; ?></span> 
                                                        <?php } 
														else
														{?>
                                                        <span class="badge"  id="f11_pt" style="font-size:16px; color:red">Incomplete</span> 
                                                        <?php } ?>
													</span></a>
												</div>
											</li>
                                             <li <?php if($page_name == "acrefinfrm_12.php") { ?> class="active" <?php } ?>>
												<div class="single-step">
													<a  href="#" id="12_<?php echo $fm_id; ?>" class="frm-link" title="Asset Details" >
													<span class="title" title="Asset Details">12</span>
													<span class="circle">
													</span>
													<span class="description">
														Asset Details
                                                         <?php if(isset($pt_row['pt_frm12']) && $pt_row['pt_frm12']!="") {?>
                                                        <span class="badge"  id="" style="font-size:16px; font-weight:bold"><?php echo $pt_row['pt_frm12']; ?></span> 
                                                        <?php } 
														else
														{?>
                                                        <span class="badge"  id="" style="font-size:16px; color:red">Incomplete</span> 
                                                        <?php } ?>
													</span></a>
												</div>
											</li>
                                            <li <?php if($page_name == "acrefinfrm_13.php") { ?> class="active" <?php } ?>>
												<div class="single-step">
													
													<a  href="#" id="13_<?php echo $fm_id; ?>" class="frm-link" title="Livestock Asset Details">
													<span class="title" title="Livestock Asset Details">13</span>
													<span class="circle">
													</span>
													<span class="description">
														Livestock Asset Details
                                                         <?php if(isset($pt_row['pt_frm13']) && $pt_row['pt_frm13']!="") {?>
                                                        <span class="badge"  id="" style="font-size:16px; font-weight:bold"><?php echo $pt_row['pt_frm13']; ?></span> 
                                                        <?php } 
														else
														{?>
                                                        <span class="badge"  id="" style="font-size:16px; color:red">Incomplete</span> 
                                                        <?php } ?>
													</span></a>
												</div>
											</li>
                                            <!--<li <?php if($page_name == "acrefinfrm_14.php") { ?> class="active" <?php } ?>>
												<div class="single-step">
													<span class="title">13</span>
													<span class="circle">
													</span>
													<a  href="javascript:void();"><span class="description">
														 Current year forcast
                                                          <?php if(isset($pt_row['pt_frm14']) && $pt_row['pt_frm14']!="") {?>
                                                        <span id="" style="font-size:16px; font-weight:bold"><?php echo $pt_row['pt_frm14']; ?></span> 
                                                        <?php } 
														else
														{?>
                                                        <span id="" style="font-size:16px; color:red">Incomplete</span> 
                                                        <?php } ?>
													</span></a>
												</div>
											</li>-->
                                            <?php
											$avg   =0;
											$color =0;
											$avg = @$pt_row['pt_frm1'] + @$pt_row['pt_frm2'] +@$pt_row['pt_frm3'] +@$pt_row['pt_frm4'] +@$pt_row['pt_frm6']+@$pt_row['pt_frm7']+@$pt_row['pt_frm8']+@$pt_row['pt_frm9']+@$pt_row['pt_frm10']+@$pt_row['pt_frm11'];
                                           
                                        $divider =10;
										
											
										$spouse_result = lookup_value('tbl_spouse_details',array(),array("fm_id"=>$fm_id),array(),array(),array());
										 if($spouse_result)
										 {
										  	$spouse_num    = mysqli_num_rows($spouse_result);
											if($spouse_num !=0)
											{
											    $spouse_row = mysqli_fetch_array($spouse_result);
											    if($spouse_row['f3_married']=='no')
											    {
											    	$divider =9;
											    }
											}
										}

										$avg = $avg/$divider;
										  //  echo $color;
											?>
                                            <script type="text/javascript">
                                            
                                            var t_avg =<?php echo $avg; ?>;	
                                             t_avg     =t_avg.toFixed(2);
											$('#avg').html(t_avg);

                                            </script>
                                            
                                            
										</ul>