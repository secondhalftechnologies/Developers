<?php
if($_SESSION['userType']=="changeagent")
{
?>
<ul class='main-nav'>
				<li>
					<a href="home.php">
						<i class="icon-home"></i>
						<span>Dashboard</span>
					</a>
				</li>
                <li <?php if(isset($_REQUEST['pag'])&&($_REQUEST['pag'])=='farmers'){?> class="active" <?php } ?>>
					<a href="view_farmers.php?pag=farmers">
						<i class="icon-th-large"></i>
						<span>Farmers</span>
					</a>
				</li> </ul>
<?php
}
elseif($_SESSION['userType']=="Admin")
{
	?>
<ul class='main-nav'>
				<li>
					<a href="home.php">
						<i class="icon-home"></i>
						<span>Dashboard</span>
					</a>
				</li>
				<li <?php if(isset($_REQUEST['pag'])&&($_REQUEST['pag'])=='banner'){?> class="active" <?php } ?>>
					<a href="view_banners.php?pag=banner" >
						<i class="icon-home"></i>
						<span>Banners</span>
					</a>
				</li> <!-- banners -->
                <li <?php if(isset($_REQUEST['pag'])&&($_REQUEST['pag'])=='about'){?> class="active" <?php } ?>>
					<a href="view_aboutus.php?pag=about">
						<i class="icon-th-large"></i>
						<span>About Us</span>
					</a>
				</li> <!-- About -->
                <li <?php if(isset($_REQUEST['pag'])&&($_REQUEST['pag'])=='services'){?> class="active" <?php } ?>>
					<a href="view_services.php?pag=services">
						<i class="icon-th-large"></i>
						<span>Services</span>
					</a>
				</li> <!-- Services -->
                <li <?php if(isset($_REQUEST['pag'])&&($_REQUEST['pag'])=='gifts'){?> class="active" <?php } ?>>
					<a href="view_gifts.php?pag=gifts">
						<i class="icon-th-large"></i>
						<span>Gifts</span>
					</a>
				</li> <!-- gifts -->
                <li <?php if(isset($_REQUEST['pag'])&&($_REQUEST['pag'])=='membership'){?> class="active" <?php } ?>>
					<a href="view_membership.php?pag=membership">
						<i class="icon-th-large"></i>
						<span>Membership</span>
					</a>
				</li> <!-- membership -->
                
                <li <?php if(isset($_REQUEST['pag'])&&($_REQUEST['pag'])=='locations'){?> class="active" <?php } ?>>
					<a href="view_locations.php?pag=locations">
						<i class="icon-th-large"></i>
						<span>Locations</span>
					</a>
				</li> <!-- Location -->
                
                <li <?php if(isset($_REQUEST['pag'])&&($_REQUEST['pag'])=='contactus'){?> class="active" <?php } ?>>
					<a href="view_contact.php?pag=contact">
						<i class="icon-th-large"></i>
						<span>Contact Us</span>
					</a>
				</li> <!-- Contact -->
                
				
</ul>
<?php
}
?>