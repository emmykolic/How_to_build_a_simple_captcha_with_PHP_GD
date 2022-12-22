<?php include 'header.php'; ?>
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3 mt-4 shadow">
				<form method="POST" class="bg-white p-5" action="form.php">
					<h2>PROVE! YOU ARE NOT A ROBOT!!</h2><hr>
					<strong class="alert alert-danger text-muted pt-2">
						Type the text in the image to prove
						you are not a robot
					</strong>
					<img style="display: block; margin: 10%;" src="captcha.php" alt="image verification" />
					<input type="text" id="captchha" name="captcha" size="20" maxlength="6" class="form-control m-1">
					<input type="submit" value="Submit" class="btn btn-success col-12 m-1">
					<?php
						/*if captcha code is posted*/
						if(isset($_POST["captcha"]))					
							if($_SESSION["captcha"]==strtolower($_POST["captcha"])):/*CAPTCHA is valid. You can process the form now.*/?>
							<p class="text-success"> CAPTCHA is valid. You can process the form now.</p>
						<?php else: /*Invalid CAPTCHA*/ ?>
							<p class="text-danger">Invalid <strong>CAPTCHA.</strong> Pls Try again!</p>
						<?php endif; ?>
						<div>
								Can't read the image? Click
							<a style="text-decoration: none" href='<?= $_SERVER['PHP_SELF']; ?>'>
								<i class="fa fa-sync"></i>
							</a>
							to refresh!
						</div>
				</form>
			</div>
		</div>
	</div>
	<?php include 'footer.php'; ?>