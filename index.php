<?php 
require_once 'init.php';
require_once 'inc/handlers/test_handler.php';
?>

<?php require_once 'inc/partials/header.php'; ?>

		<i class="fa fa-comments-o fa-5x" aria-hidden="true"></i>
		<h1 class="main-title">Testa uzdevums</h1>
		<form id="starting-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<div class="form-group">
				<span class="nameWarning">Lūdzu ievadi vārdu</span>
				<input type="text" name="name" id="name" class="starting-input" placeholder="Ievadi savu vārdu...">
			</div>
			<div class="form-group">
				<span class="selectWarning">Lūdzu izvēlies testu</span>
				<select name="test" id="test" class="starting-input">
					<option value="" selected>Izvēlies testu</option>
					<?php foreach($test->getAllTests() as $singleTest): ?>
						<option value="<?php echo $singleTest->id; ?>"><?php echo $singleTest->name; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<input type="submit" value="Sākt" class="submit-start" name="begin_test">
		</form>
	</div>
	<script src="assets/js/regexp.js"></script>
	<script src="assets/js/ui.js"></script>
	<script src="assets/js/begin_test.js"></script>
</body>
</html>