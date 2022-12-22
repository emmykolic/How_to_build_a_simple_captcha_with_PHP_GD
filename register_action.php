<?php 
	include 'config.php';
	$error = 0;
	$error_msg="";
	if (isset($_POST['submit'])) {
		$fullname = get_post("fullname");
		$gender = get_post("gender");
		$email = get_post("email");
		if ($fullname == "") {
			$error = 1;
			$error_msg.="fullname is Empty";
		}
		if ($gender == "") {
			$error = 1;
			$error_msg.="gender is Empty";
		}
		if ($email == "") {
			$error = 1;
			$error_msg.="email is Empty";
		}

		$check=$db->query("SELECT * FROM users WHERE email='$email' OR fullname='$fullname'");
        if($check->num_rows>0){
            $error=1;
            $error_msg.="your Email or Fullname is already in use <br>"; 
        }
	}

	if($error==0){
    	$db->query("INSERT INTO users(fullname, gender, email) VALUES('$fullname','gender', '$email')");
    	set_alert("success", "your registration was successful");
	   	header("location:form.php");
	}else{
	    set_alert("danger", $error_msg);
	    header("location:index.php");
	}


?>