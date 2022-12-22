<?php 
include 'config.php';
include'header.php';
?>
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3 mt-5 shadow">
				<form method="post" class="bg-white p-5" action="register_action.php">
					<div class="bg-success text-center text-white fbold fs-6"><?= get_alert()?></div>
				<?php
					/*if captcha code is posted*/
					if(isset($_POST["captcha"]))					
						if($_SESSION["captcha"]==strtolower($_POST["captcha"])):/*CAPTCHA is valid. You can process the form now.*/?>
							<p class="text-success"> CAPTCHA is valid. You can process the form now.</p>
						<?php else: /*Invalid CAPTCHA*/ 
								header("location: index.php");
							?>
							<p class="text-danger">Invalid <strong>CAPTCHA.</strong> Pls Try again!</p>
						<?php endif; ?>
						<h2>Registration</h2>
						<div class="mb-3">
							<label>Fullname <span class="text-danger">*</span></label>
							<input type="text" id="captchha" name="fullname" size="20" class="form-control m-1">			
						</div>
						<div class="mb-3">
							<label>Gender <span class="text-danger">*</span></label>
							<input type="text" id="captchha" name="gender" size="20" class="form-control m-1">			
						</div>
						<div class="mb-3">
							<label>Email <span class="text-danger">*</span></label>
							<input type="email" id="captchha" name="email" size="20" class="form-control m-1">			
						</div>
						<div class="mb-3">
							<input type="submit" name="submit" value="Submit" class="btn btn-success col-12 m-1">
						</div>
				</form>
			</div>
		</div>
	</div>

	<?php include 'footer.php'; ?>