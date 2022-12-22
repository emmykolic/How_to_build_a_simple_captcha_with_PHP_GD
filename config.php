<?php
session_start();
$db=new mysqli("localhost", "root", "", "gd_test");
Define("SITE_NAME", "Rights.com");
Define("SITE_SLUG", "Taking action on abuse");
function get_post($index){
	$index=$_POST[$index];
	return $index;
}

function set_alert($msg, $alert_type="danger"){
	$_SESSION['msg']=$msg;
	$_SESSION['alert_type']=$alert_type;
}

function get_alert(){
	if(isset($_SESSION['msg']) && $_SESSION['msg']!=""){
		?>
			<div class="alert alert-<?=$_SESSION['alert_type']?>"><?=$_SESSION['msg']?></div>
		<?php
	}
	$_SESSION['msg']="";
	$_SESSION['alert_type']="";
}
?>