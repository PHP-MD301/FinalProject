<?phpob_start();session_start();include_once('functions.php');?><table style='width:100%;height:600px;border:0px solid red;'><tr>	<td valign='top' style='width:250px;background-color:#eaeaea;'>		<h1 style='background:#cccccc;'>Categories</h1>		<a href='categories_add.php'>Add New Category</a> <br />		<a href='categories_view.php'>View All Categories</a> <br />				<h1 style='background:#cccccc;'>Users</h1>		<a href='users_view.php'>View All Users</a> <br />				<h1 style='background:#cccccc;'>Users Topics</h1>		<a href='topics_view.php'>View Users Topics</a> <br />					</td>	<td valign='top' style='border:5px solid blue;'>				<?php			/*			- Get all the data for this  course from database 			- draw Edit form with the previous data in it			*/				$result = mysql_query("		select course_id,course_title,course_keywords,course_description from courses where course_id = $_GET[CID] LIMIT 1	") or die(mysql_error());			if(mysql_num_rows($result) > 0)			{//found ..			$row = mysql_fetch_array($result);			$title	 		= $row['course_title'];			$keywords	 	= $row['course_keywords'];			$description	= $row['course_description'];						//draw the edit form .. 			print "						<table style='width:100%;border:1px dotted #cccccc;'>						<form action='courses_edit_save.php?CID=$_GET[CID]' method='post'>						<input type='hidden' name='form_name' value='courses_add' />						<input type='hidden' name='cat_id' value='$_GET[CID]' />							<tr>								<td>Course Name </td> 								<td><input type='text' name='course_name' value='$title' /> </td>							</tr>														<tr>								<td>Course descrition </td> 								<td><textarea name='course_description' style='width:90%;height:50px;'/>$description</textarea> </td>							</tr>														<tr>								<td>Course Keywords </td> 								<td><input type='text' name='course_keywords' value='$keywords' /> </td>							</tr>							<tr>								<td colspan='2'> <input type='submit' value='Update Course' /> </td> 							</tr>						</form>						</table>										";			}		else			{//Not Found.. he is playing..			print 'Not Authorized access .. go Away Ya mohammed';			}				?>			</td></tr></table>