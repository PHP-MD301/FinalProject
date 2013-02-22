<?php
ob_start();
session_start();

include_once('config.php');

##################################### Connectiont to Db
function connect()
	{
	global $db_host ,$db_name ,$db_user ,$db_pass ;
	mysql_connect("$db_host","$db_user","$db_pass") or die('Error Connecting to Database ..');
	mysql_select_db("$db_name") or die('Error Dealing with your database ..');
	}

##################################### Main menu
function main_menu()
	{
	global $site_name,$site_url ;
	$links = array(
				"$site_name"=>"$site_url",
				"Register"=>"register.php",
				"Contact Us"=>"contact.php",
				"About Us"=>"about.php",
				);
		
	$output .= "<ul>";		
	foreach($links as $link=>$url)
		{
		$output .= "<li><a href='$url'>$link</a></li>";	
		}
	$output .= "</ul>";	
	return $output ;
	}
##################################### category_links
function category_links()
	{
	global $site_name,$site_url ;
	connect();
	$result = mysql_query("		SELECT * from categories order by cat_title ASC	");
	if(mysql_num_rows($result) > 0)
		{//found cats
		$output = "<ul>";	
		while($row = mysql_fetch_array($result))
			{
			$cat_id = $row['cat_id'];
			$cat_title = $row['cat_title'];
					
			$output .= "
						<li><a href='courses.php?cat_id=$cat_id'>$cat_title </a> </li>
						";
			}
		$output .= "</ul>";		
		return $output ;
		}
	else
		{//No cats found 
		return output_message("No cats found" , 'failure');
		}
	}
##################################### Messges
function output_message($message , $type = 'success')
	{
	if($type == 'failure')
		{
		$style = 'border:1px solid red;height:75px;text-align:center;color:red;';
		}
	else
		{
		$style = 'border:1px solid green;height:75px;text-align:center;color:green;';
		}
	return "<div style='$style'>$message</div>";
	}


##################################### Site_Header
function site_header()
	{
	global $site_name,$site_url ;
	
	return "<div style='$style'>
				<table style='width:100%;border:1px solid #336699;'>
					<tr>
						<td style='width:150px;'>	
							<a href='$site_url'>
								<img src='images/logo.png' style='border:0px;' />
							</a>			
						</td>	
						<td style='text-align:center;font-size:36px;font-weight:bold;'>	
							$site_name
						</td>	
					</tr>
				</table>
			</div>";
	}

##################################### Site_footer
function site_footer()
	{
	global $site_name,$site_url ;
	
	return "<div style='$style'>
				<table style='width:100%;border:1px solid #336699;'>
					<tr>
						<td style='text-align:center;font-size:10px;font-weight:bold;color:#333;'>	
							All Rights Servsered for $site_name &copy; 2013
						</td>	
					</tr>
				</table>
			</div>";
	}	
	
##################################### Site_footer
function all_headers()
	{
	global $site_name,$site_url ;
	
	return "<meta name='keywords' content='tutorials,courses,IT courses,$site_name'>
			<link rel='stylesheet' type='text/css' href='styles/style.css' />
			";
	}	

##################################### redirect_to_after
function redirect_to_after($seconds,$where)
	{
	header("refresh:$seconds;url=$where");
	}
	
##################################### welcome
function welcome()
	{
	return "
			Welcome : $_SESSION[logged_in_user] <br />
			<a href='logout.php'>Logout</a>
			";
	}
	
	
##################################### login_or_welcome
function login_or_welcome()
	{
	if(is_logged() == true)
		{//welcome user
		return welcome();
		}
	else
		{//show login form
		return draw_login_form();
		}
	}


##################################### Site_footer
function draw_login_form()
	{
	global $site_name,$site_url ;
	
	return "
			<table style='width:150px;border:1px dotted #cccccc;'>
			<form action='login.php' method='post'>
				<tr>
					<td>Username </td> 
					<td><input type='text' name='login_username' /> </td>
				</tr>
				<tr>	
					<td>Password </td> 
					<td><input type='password' name='login_password' /> </td> 
				</tr>
				<tr>
					<td colspan='2'> <input type='submit' value='login' /> </td> 
				</tr>
			</form>
			</table>	
			";
	}	



##################################### Login Save
function draw_login_form_save($username,$password)
	{
	global $site_url ;
	connect();
	$result = mysql_query("	SELECT * from users where user_name='$username' and user_password='$password' LIMIT 1	");
	if(mysql_num_rows($result)>0)
		{//found
		$_SESSION['logged_in'] = 'yes';
		$_SESSION['logged_in_user'] = $username ;
		
		print output_message("Logged In Successfully" , 'success');
		redirect_to_after(3,$_SERVER['HTTP_REFERER']);	
		}
	else
		{//Not Found
		print output_message("Invalid username and/or password" , 'failure');
		redirect_to_after(3,$site_url);	
		}
	}	

	
##################################### Registration form
function draw_registration_form()
	{
	return "
			<table style='width:150px;border:1px dotted #cccccc;'>
			<form action='register_save.php' method='post'>
				<tr>
					<td>Username </td> 
					<td><input type='text' name='register_username' /> </td>
				</tr>
				<tr>	
					<td>Password </td> 
					<td><input type='password' name='register_password' /> </td> 
				</tr>
				<tr>
					<td colspan='2'> <input type='submit' value='Save..' /> </td> 
				</tr>
			</form>
			</table>	
			";
	}	
	
##################################### Login Save
function draw_registration_form_save()
	{
	global $site_url ;
	connect();
	
	//test for data validity 
	//check for username availability
	//save to DB ..

	if($_POST['regsiter_username'] == '' or $_POST['regsiter_password'] == '' or strpos("'",$_POST['username']) != false )
		{//invalid data
		print output_message("Invalid username and/or password" , 'failure');
		redirect_to_after(3,$_SERVER['HTTP_REFERER']);	
		}
	else
		{//Check for username
		
				$result = mysql_query("	SELECT * from users where user_name='$_POST[username]' LIMIT 1	");
				if(mysql_num_rows($result)>0)
					{//found
					print output_message("Not Available .. Plrease try anbother ysername" , 'failure');
					redirect_to_after(3,$_SERVER['HTTP_REFERER']);	
					}
				else
					{//Save data
					
					if(mysql_query("	insert into users(user_name,user_password) values('$_POST[username]','$_POST[password]')	"))
						{
						print output_message("Registeration Complete .. Thank ypi" , 'success');
						redirect_to_after(3,$site_url);	
						}
					else
						{
						print output_message("Error occured .. Please contact us <a href='#'>here</a> " , 'failure');
						}
					}
		}

	}	

	
##################################### is_logged
function is_logged()
	{	
	if($_SESSION['logged_in'] == 'yes')
		{
		return true ;
		}
	else
		{
		return false ;
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
?>