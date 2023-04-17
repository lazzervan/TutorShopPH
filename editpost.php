<?php
 include ( "inc/connection.inc.php" );

ob_start();
session_start();
if (!isset($_SESSION['user_login'])) {
	$user = "";
	$utype_db = "";
	header("Location: login.php");
}
else {
	$user = $_SESSION['user_login'];
	$result = $con->query("SELECT * FROM user WHERE id='$user'");
		$get_user_name = $result->fetch_assoc();
			$uname_db = $get_user_name['fullname'];
			$utype_db = $get_user_name['type'];
}

if (isset($_REQUEST['pid'])) {
	$pstid = mysqli_real_escape_string($con, $_REQUEST['pid']);
	$result3 = $con->query("SELECT * FROM post WHERE id='$pstid'");
		$get_user_pid = mysqli_fetch_assoc($result3);
		$uid_db = $get_user_pid['postby_id'];
		$sub = $get_user_pid['subject'];
		$cls = $get_user_pid['class'];
		$medium = $get_user_pid['medium'];
		$salary = $get_user_pid['salary'];
		$location = $get_user_pid['location'];
		$p_uni = $get_user_pid['p_university'];
		$deadline = $get_user_pid['deadline'];
		$posttime = $get_user_pid['post_time'];
	if($user != $uid_db){
		header('location: index.php');
	}else{

	}
}else {
	header('location: index.php');
}

if (isset($_POST['deletepost'])) {
		$pstid = mysqli_real_escape_string($con, $_REQUEST['pid']);
		$result3 = $con->query("SELECT * FROM post WHERE id='$pstid'");
			$get_user_pid = mysqli_fetch_assoc($result3);
			$uid_db = $get_user_pid['postby_id'];
		if($user != $uid_db){
			header('location: index.php');
		}else{
			$result = $con->query("DELETE FROM post WHERE id='$pstid'");
			header('location: profile.php?uid='.$user.'');
		}
	}


//posting
if (isset($_POST['submit'])) {
	try {
		if(empty($_POST['location'])) {
			throw new Exception('Location can not be empty');
			
		}
		if(empty($_POST['class_list'])) {
			throw new Exception('Class can not be empty');
			
		}
		if(empty($_POST['deadline'])) {
			throw new Exception('Deadline can not be empty');
			
		}
		if(empty($_POST['sal_range'])) {
			throw new Exception('Price range can not be empty');
			
		}
		if(empty($_POST['sub_list'])) {
			throw new Exception('Subject can not be empty');
			
		}
		if(empty($_POST['p_university'])) {
			throw new Exception('Details can not be empty');
			
		}
		if(empty($_POST['medium_list'])) {
			throw new Exception('Language can not be empty');
			
		}
		
		// Check if email already exists
						$d = date("Y-m-d"); //Year - Month - Day
							//throw new Exception('Email is not valid!');
							$sublist = implode(',', $_POST['sub_list']);
							$classlist = implode(',', $_POST['class_list']);
							$mediumlist = implode(',', $_POST['medium_list']);
							$result = mysqli_query($con, "UPDATE post SET subject='$sublist',class='$classlist',medium='$mediumlist',salary='$_POST[sal_range]',location='$_POST[location]',p_university='$_POST[p_university]',deadline='$_POST[deadline]', post_time='$posttime' WHERE id='$pstid'");
						
						//success message
						$success_message = '
						<div class="signupform_content"><h2><font face="bookman">Edit successfull!</font></h2>
						<div class="signupform_text" style="font-size: 18px; text-align: center;"></div></div>';
						
						header("Location: profile.php?uid=".$user."");
					}
				catch(Exception $e) {
					$error_message = $e->getMessage();
				}
}


?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="css/footer.css" rel="stylesheet" type="text/css" media="all" />
	
	<!-- date link -->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="/resources/demos/style.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
	$( function() {
	$( "#datepicker" ).datepicker();
	} );
	</script>
	<!-- date link end -->
	<!-- menu tab link -->
	<link rel="stylesheet" type="text/css" href="css/homemenu.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">


</head>
<body class="body1">
<div>
	<div>
		<header class="header">

			<div class="header-cont">

				<?php
					include 'inc/banner.inc.php';
				?>

			</div>
		</header>
		<div class="w3-sidebar w3-bar-block w3-collapse w3-card-2 w3-animate-left" style="width:100px;" id="mySidebar">
		  <button class="w3-bar-item w3-button w3-large w3-hide-large" onclick="w3_close()">Close &times;</button>
		  <a href="index.php" class="w3-bar-item w3-button">Tution</a>
		  <a href="photography.php" class="w3-bar-item w3-button">Photography</a>
		  <a href="#" class="w3-bar-item w3-button">IT</a>
		</div>
		<div class="topnav">
			<div class="parent2">
		  <div class="test1 bimage1"><a href=""><img src="image/tech.png" title="IT Solution" style="border-radius: 50%;" width="42" height="42"></a></div>
		  <div class="test2"><a href="#"><img src="image/eventmgt.png" title="Event Management" width="42" height="42" style="border-radius: 50%;"></a></div>
		  <div class="test3"><a href="#"><img src="image/photography.png" title="Photography" width="42" height="42" style="border-radius: 50%;"></a></div>
		  <div class="test4"><a href="#"><img src="image/teaching.png" title="Tution" style="border-radius: 50%;" width="42" height="42"></a></div>
		  <div class="mask2"><i class="fa fa-home fa-3x"></i></div>
		</div>
			<a class="navlink" href="index.php" style="margin: 0px 0px 0px 100px;">Newsfeed</a>
			<a class="navlink" href="#news">Search Tutor</a>
			<?php 
			if($utype_db == "teacher")
				{

				}else {
					echo '<a class="active navlink" href="postform.php">Post</a>';
				}

			 ?>
			<a class="navlink" href="#contact">Contact</a>
			<a class="navlink" href="#about">About</a>
			<div style="float: right;" >
				<table>
					<tr>
						<?php
							if($user != ""){
								echo '<td>
							<a class="navlink" href="profile.php?uid='.$user.'">'.$uname_db.'</a>
						</td>
						<td>
							<a class="navlink" href="logout.php">Logout</a>
						</td>';
							}else{
								echo '<td>
							<a class="navlink" href="login.php">Login</a>
						</td>
						<td>
							<a class="navlink" href="registration.php">Register</a>
						</td>';
							}
						?>
						
					</tr>
				</table>
			</div>
		</div>
	</div>

	<!-- newsfeed -->
	<div class="nbody" style="margin: 0px 100px; overflow: hidden;">
		<div class="nfeedleft">
			<div class="postbox">
			<h3>Post Edit Form</h3>
			<?php
				echo '<div class="signup_error_msg">';
					
						if (isset($error_message)) {echo $error_message;}
						
					
				echo'</div>';
				?>
			  	<form action="#" method="post">
			  	<div class="itemrow">
			  			<div style="width: 20%; float: left;">
			  				<label>Subject: </label>
			  			</div>
			  			<div style="width: 80%; float: left;">
			  				<div class="divp35"><input <?php $sub1=strstr($sub, "Filipino/Tagalog"); if($sub1 != '') echo 'checked'; ?> type="checkbox" name="sub_list[]" value="Filipino/Tagalog"><span>Filipino/Tagalog</span></div>
							<div class="divp35"><input <?php $sub1=strstr($sub, "English"); if($sub1 != '') echo 'checked'; ?> type="checkbox" name="sub_list[]" value="English"><span>English</span></div>
							<div class="divp35"><input <?php $sub1=strstr($sub, "Math"); if($sub1 != '') echo 'checked'; ?> type="checkbox" name="sub_list[]" value="Math"><span>Math</span></div>
							<div class="divp35"><input <?php $sub1=strstr($sub, "Social Science"); if($sub1 != '') echo 'checked'; ?> type="checkbox" name="sub_list[]" value="Social Science"><span>Social Science</span></div>
							<div class="divp35"><input <?php $sub1=strstr($sub, "General Science"); if($sub1 != '') echo 'checked'; ?> type="checkbox" name="sub_list[]" value="General Science"><span>General Science</span></div>
							<div class="divp35"><input <?php $sub1=strstr($sub, "Religion"); if($sub1 != '') echo 'checked'; ?> type="checkbox" name="sub_list[]" value="Religion"><span>Religion</span></div>
							<div class="divp35"><input <?php $sub1=strstr($sub, "ICT"); if($sub1 != '') echo 'checked'; ?> type="checkbox" name="sub_list[]" value="ICT"><span>ICT</span></div>
							<div class="divp35"><input <?php $sub1=strstr($sub, "Physics"); if($sub1 != '') echo 'checked'; ?> type="checkbox" name="sub_list[]" value="Physics"><span>Physics</span></div>
							<div class="divp35"><input <?php $sub1=strstr($sub, "Chemistry"); if($sub1 != '') echo 'checked'; ?> type="checkbox" name="sub_list[]" value="Chemistry"><span>Chemistry</span></div>
							<div class="divp35"><input <?php $sub1=strstr($sub, "Higher Math"); if($sub1 != '') echo 'checked'; ?> type="checkbox" name="sub_list[]" value="Higher Math"><span>Higher Math</span></div>
							<div class="divp35"><input <?php $sub1=strstr($sub, "Biology"); if($sub1 != '') echo 'checked'; ?> type="checkbox" name="sub_list[]" value="Biology"><span>Biology</span></div>
							<div class="divp35"><input <?php $sub1=strstr($sub, "Sociology"); if($sub1 != '') echo 'checked'; ?> type="checkbox" name="sub_list[]" value="Sociology"><span>Sociology</span></div>
							<div class="divp35"><input <?php $sub1=strstr($sub, "Economics"); if($sub1 != '') echo 'checked'; ?> type="checkbox" name="sub_list[]" value="Economics"><span>Economics</span></div>
							<div class="divp35"><input <?php $sub1=strstr($sub, "Accounting"); if($sub1 != '') echo 'checked'; ?> type="checkbox" name="sub_list[]" value="Accounting"><span>Accounting</span></div>
							<div class="divp35"><input <?php $sub1=strstr($sub, "History"); if($sub1 != '') echo 'checked'; ?> type="checkbox" name="sub_list[]" value="History"><span>History</span></div>
							<div class="divp35"><input <?php $sub1=strstr($sub, "Finance"); if($sub1 != '') echo 'checked'; ?> type="checkbox" name="sub_list[]" value="Finance"><span>Finance</span></div>
							<div class="divp35"><input <?php $sub1=strstr($sub, "Statistics"); if($sub1 != '') echo 'checked'; ?> type="checkbox" name="sub_list[]" value="Statistics"><span>Statistics</span></div>
							<div class="divp35"><input <?php $sub1=strstr($sub, "Civics"); if($sub1 != '') echo 'checked'; ?> type="checkbox" name="sub_list[]" value="Civics"><span>Civics</span></div>
							<div class="divp35"><input <?php $sub1=strstr($sub, "Computer Science"); if($sub1 != '') echo 'checked'; ?> type="checkbox" name="sub_list[]" value="Computer Science"><span>Computer Science</span></div>
							<div class="divp35"><input <?php $sub1=strstr($sub, "Art"); if($sub1 != '') echo 'checked'; ?> type="checkbox" name="sub_list[]" value="Art"><span>Art</span></div>
			  			</div>
			  		</div>
			  	
				
					<div class="itemrow">
						<div style="width: 20%; float: left;">
							<label>Class: </label>
						</div>
						<div style="width: 80%; float: left;">
						
		
							<div class="divp35"><input <?php $class1=strstr($cls, "One Hour"); if($class1 != '') echo 'checked'; ?> type="checkbox" name="class_list[]" value="One Hour"><span>One Hour</span></div>
							<div class="divp35"><input <?php $class1=strstr($cls, "Two Hours"); if($class1 != '') echo 'checked'; ?> type="checkbox" name="class_list[]" value="Two Hours"><span>Two Hours</span></div>
							<div class="divp35"><input <?php $class1=strstr($cls, "Three Hours"); if($class1 != '') echo 'checked'; ?> type="checkbox" name="class_list[]" value="Three Hours"><span>Three Hours</span></div>
							<div class="divp35"><input <?php $class1=strstr($cls, "Four Hours"); if($class1 != '') echo 'checked'; ?> type="checkbox" name="class_list[]" value="Four Hours"><span>Four Hours</span></div>
							<div class="divp35"><input <?php $class1=strstr($cls, "Five Hours"); if($class1 != '') echo 'checked'; ?> type="checkbox" name="class_list[]" value="Five Hours"><span>Five Hours</span></div>
							<div class="divp35"><input <?php $class1=strstr($cls, "Flexible Hours"); if($class1 != '') echo 'checked'; ?> type="checkbox" name="class_list[]" value="Flexible Hours"><span>Flexible Hours</span></div>

						</div>
					</div>
				  	<div class="itemrow">
				  			<div style="width: 20%; float: left;">
				  				<label>Language: </label>
				  			</div>
				  			<div style="width: 80%; float: left;">
								<div class="divp35"><input <?php $medium1=strstr($medium, "Filipino/Tagalog"); if($medium1 != '') echo 'checked'; ?> type="checkbox" name="medium_list[]" value="Filipino/Tagalog"><span>Filipino/Tagalog</span></div>
								<div class="divp35"><input <?php $medium1=strstr($medium, "English"); if($medium1 != '') echo 'checked'; ?> type="checkbox" name="medium_list[]" value="English"><span>English</span></div>
								<div class="divp35"><input <?php $medium1=strstr($medium, "Any"); if($medium1 != '') echo 'checked'; ?> type="checkbox" name="medium_list[]" value="Any"><span>Any</span></div>
							</div>
					</div>
					<div class="itemrow">
				  			<div style="width: 20%; float: left;">
				  				<label>Price Range (Per Hour): </label>
				  			</div>
							<div style="width: 80%; float: left;">
								<select name="sal_range">
									<?php if($f_sal!="") echo '<option value="'.$f_sal.'">'.$f_sal.'</option>';  ?>
								  <option value="250-500">250-500</option>
								  <option value="500-1000">500-1000</option>
								  <option value="1000-2000">1000-2000</option>
								  <option value="2000-5000">2000-5000</option>
								  <option value="5000+">5000 or more</option>
								</select>
							</div>
						</div>
				  	<div class="itemrow">
				  			<div style="width: 20%; float: left;">
				  				<label>Location: </label>
				  			</div>
				  			<div style="width: 80%; float: left;">
				  				<?php echo '<input type="text" name="location" value="'.$location.'" placeholder="e.g: Nikunja 2, Banani">'; ?>
				  			</div>
				  		</div>
					<div class="itemrow">
				  			

							<div style="width: 20%; float: left;">
				  				<label>Details: </label>
				  			</div>
							  <div style="width: 80%; float: left;">
							 
				  				<?php echo '<input type="text" name="p_university" value="'.$p_uni.'" placeholder="e.g.: I need help on...">'; ?>
				  			</div>
						</div>
					<div class="itemrow">
				  			<div style="width: 20%; float: left;">
				  				<label>Deadline: </label>
				  			</div>
				  			<div style="width: 20%; float: left;">
				  				<p><?php echo '<input name="deadline" type="text" id="datepicker" placeholder="e.g: 30/10/2017" value="'.$deadline.'">'; ?></p>
				  			</div>
				  	</div>
				  		<input type="submit" style="float: left;" class="sub_button" name="submit" value="Update"/>
						<input type="submit" class="sub_button" name="deletepost" style="float: right;" value="Delete"/>
				</form></br></br>
			</div>
			</div>
		</div>
		<div class="nfeedright">
			
		</div>
	</div>
	<!-- footer -->
	<div>
	<?php
		include 'inc/footer.inc.php';
	?>
	</div>

</div>
<!-- homemenu tab script -->
<script  src="js/homemenu.js"></script>
</body>
</html>