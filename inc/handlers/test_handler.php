<?php

//Check if test has been started
if(isset($_SESSION['q'])) {
	$question_id = $test->getTestQuestions($_SESSION['test_id'])[($_SESSION['q'] - 1)]->id;
}

//Check if begin test button is clicked
if(isset($_POST['begin_test'])) {
	//sanitize post array ( name )
	$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
	//set up all session varibles
	$_SESSION['name'] = trim($_POST['name']);
	$_SESSION['test_id'] = trim($_POST['test']);
	$_SESSION['q'] = 1;
	$_SESSION['test_key'] = rand(1, 1000);
	$_SESSION['total_q_amount'] = $_SESSION['q_amount_left'] = sizeof($test->getTestQuestions($_SESSION['test_id']));
	$_SESSION['correct_answers'] = 0;
	//redirect to questions page
	header("Location: test.php?t=".$_SESSION['test_id']."&q=".$_SESSION['q']."");
}

//Check if next question button is clicked
if(isset($_POST['next_question'])) {
	//Take off 1 from total questions left
	$_SESSION['q_amount_left'] -= 1;
	//Generate test_key
	$test_key = $_SESSION['name'] . '_' . $_SESSION['test_key'];

	//Keeps track of correct answers
	if($test->getCorrectAnswer($question_id)->answer_id == $test->getCurrentAnswer($question_id, $test_key)->answer) {
		$_SESSION['correct_answers'] += 1;
	}

	//Keeps track of questions left and redirects if test is finished
	if($_SESSION['q_amount_left'] > 0) {
		$_SESSION['q'] = $_SESSION['q'] + 1;
		header("Location: test.php?t=".$_SESSION['test_id']."&q=".$_SESSION['q']."");
	} else {
		//Saves completed test and redirects to success page
		if($test->saveFinalResult(
			$_SESSION['test_id'],
			$test_key,
			$_SESSION['name'],
			$_SESSION['total_q_amount'],
			$_SESSION['correct_answers']
		)) {
			header("Location: success.php");			
		} else {
			die('Something went wrong!');
		}

	}
}