<?php include 'header.php'; ?>
<form name="form" method="post" action="" class="bg-white mt-5 p-5">
	<label><strong>Enter Captcha:</strong></label><br />
		<input type="text" name="captcha" class="form-control" />
	<p><br />
		<img src="captcha2.php?rand=<?= rand(); ?>" id='captcha_image'>
	</p>
	<p>Can't read the image?
		<a href='javascript: refreshCaptcha();'>click here</a>
		to refresh
	</p>
	<input type="submit" name="submit" class="col-12 btn btn-success" value="Submit">
</form>
<?php 
	session_start();
$status = '';
if ( isset($_POST['captcha']) && ($_POST['captcha']!="") ){
    // Validation: Checking entered captcha code with the generated captcha code
    if(strcasecmp($_SESSION['captcha'], $_POST['captcha']) != 0){
        // Note: the captcha code is compared case insensitively.
        // if you want case sensitive match, check above with strcmp()
        $status = "<p style='color:#FFFFFF; font-size:20px'>
        <span style='background-color:#FF0000;'>The captcha code entered does not match! Kindly try again.</span></p>";
    }else{
        $status = "<p style='color:#FFFFFF; font-size:20px'>
        <span style='background-color:#46ab4a;'>Your captcha code is correct.</span></p>";  
    }
}
echo $status;
?>
	<?php include'footer.php'; ?>