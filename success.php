<?php 
require_once 'init.php';
require_once 'inc/handlers/success_handler.php';
?>

<?php require_once 'inc/partials/header.php'; ?>

		<h1 class="main-title">Paldies, <?php echo $name ?></h1>
		<p>Tu atbildēji pareizi uz <?php echo $correctAnswers; ?> no <?php echo $totalQAmount; ?> jautājumiem</p>
		<a class="go-back" href="index.php">Atgriezties uz sākumu</a>
	</div>
	<script src="assets/js/regexp.js"></script>
	<script src="assets/js/ui.js"></script>
</body>
</html>