<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>

	<!-- Bootstrap CDN -->
	<!-- Latest compiled and minified CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- Latest compiled JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>

	<!-- Google fonts here -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<!-- Inter font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

	<!-- Mulish font -->
	<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

	<!-- Lato font -->
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

	<!-- fontawesome icons -->
	<script src="https://kit.fontawesome.com/858dca1c9d.js" crossorigin="anonymous"></script>

	<?php include "partials/_dbconnect.php";?>

	<!-- Stylesheet -->
	<style type="text/css">
		<?php include 'assets/style.css'; ?>
	</style>

	<style>
		html, body {
			background: #3D80D9;
		}
	</style>
</head>
<body>

	<!-- Code for signing up -->
	<?php

	if (isset($_POST['submit'])) {
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

		$pass = password_hash($password, PASSWORD_BCRYPT);
		$cpass = password_hash($cpassword, PASSWORD_BCRYPT);

		$emailquery = "select * from registration where email = '$email' ";
		$query = mysqli_query($conn, $emailquery);

		$emailcount = mysqli_num_rows($query);

		if ($emailcount > 0) {
			// code...
			?>

			<script type="text/javascript">
				alert("Email already exists");
			</script>

			<?php
		}else {
			if ($password === $cpassword) {
				
				// code...
				$insertquery = "insert into registration(username, email, password, cpassword) values('$username' ,'$email' ,'$pass' ,'$cpass')";

				$iquery = mysqli_query($conn, $insertquery);

				if ($iquery) {
					?>

					<script>
						alert("Signed up successfully. Please login to continue !");
						location.replace("login.php");
					</script>

					<?php
				}
			}else {
				?>

				<script type="text/javascript">
					alert("Confirm password does not match");
				</script>

				<?php
			}
		}
	}

	?>
	<!-- ends here -->

	<!-- Header navbar -->
	<?php include 'header.php'  ?>

	<section class="login">
		<div class="container-fluid" >
			<div class="row h-100">
				<div class="col-md-4 col-sm-3 bluebg my-auto">
					<img src="assets/img/login/man.png" class="img-fluid" alt="man">
					
				</div>

				<div class="col-md-8 col-sm-9 whitebg " >

					<div class="row height">
						<div class="col-sm-8 col-md-6 m-auto">

							<form  method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>">
								<div class="form-floating mb-3">
									<input type="text" name="username" class="form-control" id="floatingInput" placeholder="Full Name" required>
									<label for="floatingInput">Full Name</label>
								</div>

								<div class="form-floating mb-3">
									<input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
									<label for="floatingInput">Email Address</label>
								</div>

								<div class="form-floating mb-3" style="position: relative;">
									<input type="password" class="form-control" id="id_password" placeholder="Password" required name="password">
									<label for="floatingPassword">Password</label>
									<i class="far fa-eye" id="togglePassword" style="position: absolute; right: 20px; bottom: 35%;  cursor: pointer;"></i>
								</div>

								<div class="form-floating mb-3">
									<input type="password" name="cpassword" class="form-control"  placeholder="Password" required>
									<label for="floatingPassword">Confirm Password</label>
								</div>

								<button type="submit" name="submit" class=" mb-3 btn btn-primary hover-underline-animation w-100">Sign Up</button>

								Already have an account? <a href="login.php" style="text-decoration: underline;">Login here</a>
							</form>

							
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>

	<?php include 'footer.php'  ?>


	<script type="text/javascript">
		const togglePassword = document.querySelector('#togglePassword');
		const password = document.querySelector('#id_password');

		togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
</script>	
</body>
</html>