<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>Register - HRMS admin template</title>

		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }} ">

        <link rel="manifest" href="/manifest.json">
        <meta name="msapplication-TileColor" content="#FFA500">

        <meta name="theme-color" content="#FFA500">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">

		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">

		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body class="account-page">

		<!-- Main Wrapper -->
        <div class="main-wrapper">
			<div class="account-content">
				<div class="container">
					<!-- Account Logo -->
					<div class="account-logo">
						<a href="">
                            <img src="{{ asset('assets/img/logo/logo.png') }} " alt="Abbm CRM">
                        </a>
					</div>
					<!-- /Account Logo -->

					<div class="account-box">
						<div class="account-wrapper">
							<h3 class="account-title">Register</h3>
							<p class="account-subtitle">Access to our dashboard</p>

							<!-- Account Form -->
							<form>

								<div class="form-group text-center">
									<p>Get in touch with admin please!</p>
								</div>
								<div class="account-footer">
									<p>Already have an account? <a href="{{ route('login') }} ">Login</a></p>
								</div>
							</form>
							<!-- /Account Form -->
						</div>
					</div>
				</div>
			</div>
        </div>
		<!-- /Main Wrapper -->

		<!-- jQuery -->
        <script src="assets/js/jquery-3.5.1.min.js"></script>

		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>

		<!-- Custom JS -->
		<script src="assets/js/app.js"></script>

    </body>
</html>
