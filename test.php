<?php 
require_once 'init.php';
require_once 'inc/handlers/test_handler.php';
//Can't access test page if a test hasn't been started
if(!isset($_SESSION['name'])) {
	header("Location: index.php");
}
 ?>
 
<?php require_once 'inc/partials/header.php'; ?>

		<p class="question-tracker"><?php echo $_SESSION['q']; ?> / <?php echo $_SESSION['total_q_amount']; ?></p>
		<progress id="progress-bar" max="<?php echo $_SESSION['total_q_amount']; ?>" value="<?php echo $_SESSION['q']; ?>"></progress>
		<div class="warning-box">
			<span class="answerWarning">Atbilde nav izvēlēta</span>
		</div>
		<h1 class="question-title"><?php echo $test->getSingleQuestion($question_id)->question; ?></h1>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<ul class="answer-list">
				<?php foreach($test->getTestQuestionAnswers($question_id) as $answer): ?>
				<li data-answer="<?php echo $answer->id; ?>"><?php echo $answer->answer; ?></li>
			<?php endforeach; ?>
			</ul>
			<input type="hidden" name="username" value="<?php echo $_SESSION['name']; ?>" id="username">
			<input type="hidden" name="test_id" value="<?php echo $_SESSION['test_id']; ?>" id="test_id">
			<input type="hidden" name="question_id" value="<?php echo $question_id; ?>" id="question_id">
			<input type="hidden" name="test_key" value="<?php echo $_SESSION['test_key']; ?>" id="test_key">
			<input type="submit" value="Nākamais" class="submit-start" name="next_question" id="nextQuestion">
		</form>
	</div>
	<script src="assets/js/regexp.js"></script>
	<script src="assets/js/fetch.js"></script>
	<script src="assets/js/ui.js"></script>
	<script src="assets/js/app.js"></script>
</body>
</html>