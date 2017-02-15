<?php
	include('../config/connection.php');
	include('../includes/functions.php');
	//error_reporting(-1);
	$user_id = $_SESSION['user_id'];
	$employee_id=$_POST['employee_id'];
	$source=$_POST['source'];
	$name=$_POST['name'];
	$contact_no=$_POST['contact_no'];
	$designation=$_POST['designation'];
	$address=$_POST['address'];
	$address_temp=$_POST['address_temp'];
	$local_reference=$_POST['local_reference'];
	$qualification=$_POST['qualification'];
	$experience=$_POST['experience'];
	$skill_set=$_POST['skill_set'];
	$passport_no=$_POST['passport_no'];
	$driving_lisence=$_POST['driving_lisence'];
	
	insert_db('profile_details',"(user_id,employee_id,source1,name,contact_no,designation,address,address_tmp,local_reference,
		qualification,experience,skill_set,passport_no,driving_lisence)",
			  "('$user_id','$employee_id','$source','$name','$contact_no','$designation','$address','$address_temp','$local_reference',
			  '$qualification','$experience','$skill_set','$passport_no','$driving_lisence')");
	
	 if( isset($_FILES['file']) ){
      	//$errors= array();
		$file_name = $_FILES['file']['name'];
		$file_size =$_FILES['file']['size'];
		$file_tmp =$_FILES['file']['tmp_name'];
		$file_type=$_FILES['file']['type'];
		//$file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));
		
      	$info = pathinfo($_FILES['file']['name']);
		$ext = $info['extension']; // get the extension of the file
		$newname = $user_id.'.'.$ext;

		$target = '../img/'.$newname;
		if(move_uploaded_file( $_FILES['file']['tmp_name'], $target))
			echo 'true';
		else
			echo 'false';
		
		$target="http://www.onurfingertips.com/img/".$newname;
		update_db('users', 'profile_image', "$target", " username = '$user_id' ");
		update_db('user_profile', 'profile_image', "$target", " user_profile_email = '$user_id' ");
		
		//header('Location: ../index');
	
	}
	else{
		echo 'error';
	}
	 if( isset($_FILES['docs']) ){
      	//$errors= array();
		$file_name = $_FILES['docs']['name'];
		$file_size =$_FILES['docs']['size'];
		$file_tmp =$_FILES['docs']['tmp_name'];
		$file_type=$_FILES['docs']['type'];
		//$file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));
      		
      		$info = pathinfo($_FILES['docs']['name']);
		$ext = $info['extension']; // get the extension of the file
		$newname = $user_id.'.'.$ext;

		$target = '../docs/'.$newname;
		move_uploaded_file( $_FILES['docs']['tmp_name'], $target);
		
		$target="http://www.onurfingertips.com/docs/".$newname;
		update_db('users', 'docs', "$target", " username = '$user_id' ");
		update_db('user_profile', 'docs', "$target", " user_profile_email = '$user_id' ");
		
		//header('Location: ../index');
	
	}
	else{
		echo 'error';
	}
?>