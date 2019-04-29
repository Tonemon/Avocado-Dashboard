<?php
	$username = "username";
	$password = "password";
	$nonsense = "supernonsensenobodyknows";

	if (isset($_COOKIE['PrivatePageLogin'])) {
		if ($_COOKIE['PrivatePageLogin'] == md5($password.$nonsense)) {
?>
	<!-- LOGGED IN CONTENT HERE -->
	<html lang="en">
	  <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		
		<link rel="shortcut icon" type="image/ico" href="favicon.ico"/>
		<title>APUF (Avocado Plant Update Form)</title>

		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

		<!-- Custom styles for this template -->
		<link href="form-validation.css" rel="stylesheet">
	  </head>
	  <body class="bg-light">
		<div class="container">
		  <div class="py-4 text-center">
		  <?php if (isset($_GET['success'])) {
				echo "<div class='alert alert-success'><i class='fas fa-exclamation-triangle'></i> Status Submitted.</div>"; } ?>
			<h2>APUF (Avocado Plant Update Form)</h2>
			<p class="lead">Fill out the form below to update the avocado dashboard (that can be found <a href="http://gekkekoppenniettestoppen.ga/hoegaathetmetmijnplant/" target="_blank">here</a>). After the submit, the stats on the page will
			be automatically updated and can only be changed from within the database.</p>
		  </div>

		  <div class="row">
			<div class="col-md-12 order-md-1">
			  <form class="needs-validation" method="post" action="process.php" novalidate>
				<div class="row">
				  <div class="col-md-4 mb-4">
					<label for="fieldDate">
					<input type="radio" name="date" value="today" checked> Today (<i><?php echo date("d-m-Y"); ?></i>) <b>or</b>
					<input type="radio" name="date" value="custom"> Custom: 
					</label>
					<input type="date" class="form-control" name="aDate" id="fieldDate">
					<div class="invalid-feedback">
					  Date is required.
					</div>
				  </div>
				  <div class="col-md-4 mb-4">
					<label for="fieldWater">Water absorbed (cm of cup)</label>
					<input type="number" class="form-control" name="aWater" id="fieldWater" step="any" required>
					<div class="invalid-feedback">
					  'Water absorbed' field is required.
					</div>
				  </div>
				  <div class="col-md-4 mb-4">
					<label for="fieldPlant">Plant Growth (cm)</label>
					<input type="number" class="form-control" name="aPlant" id="fieldPlant" step="any" required>
					<div class="invalid-feedback">
					   'Plant Growth' field is required.
					</div>
				  </div>
				</div>
				<div class="row">
				  <div class="col-md-12 mb-3">
					<label for="fieldDesc">Description / Status. <br>
					<input type="radio" name="desc" value="preset" checked> Use a preset:
					<select name="description">
					  <option value="nothing"> Nothing yet.</option>
					  <option value="grow"> Plant growed.</option>
					  <option value="water"> Plant absorbed a lot of water.</option>
					  <option value="both"> Plant did both.</option>
					</select> <b>or</b>
					<input type="radio" name="desc" value="custom"> Custom description:
					</label>
					<input type="text" class="form-control" name="aDesc" id="fieldDesc" placeholder="A Description/status of the plant. If nothing happened, you could write for example: 'Nothing yet.'">
					<div class="invalid-feedback">
					   A description is required.
					</div>
				  </div>
				</div>
				<hr class="mb-4">
				<button class="btn btn-primary btn-lg btn-block" type="submit">Submit Status</button>
			  </form>
			</div>
		  </div>

		  <footer class="my-3 pt-3 text-muted text-center text-small">
			<p class="mb-1"> &copy <?php echo date("Y"); ?>. Designed and built by <a href="https://github.com/Tonemon/" target="_blank">Me</a>. All rights reserved.</p>
		  </footer>
		</div>

		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
		<script src="../../assets/js/vendor/popper.min.js"></script>
		<script src="../../dist/js/bootstrap.min.js"></script>
		<script src="../../assets/js/vendor/holder.min.js"></script>
		<script>
		  // Example starter JavaScript for disabling form submissions if there are invalid fields
		  (function() {
			'use strict';

			window.addEventListener('load', function() {
			  // Fetch all the forms we want to apply custom Bootstrap validation styles to
			  var forms = document.getElementsByClassName('needs-validation');

			  // Loop over them and prevent submission
			  var validation = Array.prototype.filter.call(forms, function(form) {
				form.addEventListener('submit', function(event) {
				  if (form.checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				  }
				  form.classList.add('was-validated');
				}, false);
			  });
			}, false);
		  })();
		</script>
	  </body>
	</html>
<?php
      exit;
   } else {
      echo "Bad Cookie.";
      exit;
   }
}
?>
<?php
	if (isset($_GET['p']) && $_GET['p'] == "login") {
	   if ($_POST['user'] != $username) {
		  echo "Sorry, that username does not match. Please go back to try again.";
		  exit;
	   } else if ($_POST['keypass'] != $password) {
		  echo "Sorry, that password does not match. Please go back to try again.";
		  exit;
	   } else if ($_POST['user'] == $username && $_POST['keypass'] == $password) {
		  setcookie('PrivatePageLogin', md5($_POST['keypass'].$nonsense));
		  header("Location: $_SERVER[PHP_SELF]");
	   } else {
		  echo "Sorry, you could not be logged in at this time. Please try again later.";
	   }
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>APUF (Avocado Plant Update Form)</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" action="<?php echo $_SERVER['PHP_SELF']; ?>?p=login" method="post">
      <img class="mb-4" src="favicon.ico" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal"><a href="..">&laquo;</a> Please sign in to continue</h1>
      <label for="inputEmail" class="sr-only">Username</label>
      <input type="text" id="inputEmail" class="form-control" name="user" placeholder="Username" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" name="keypass" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; <?php echo date("Y"); ?> Avocado. All rights reserved.</p>
    </form>
  </body>
</html>
