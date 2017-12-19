<?php
require_once '../../init.php';

//Check if fetch request has been sent
if(isset($_POST['username'])) {
	$username = $_POST['username'];
	$test_id = $_POST['test_id'];
	$question_id = $_POST['question_id'];
	$answer = $_POST['answer'];
	$test_key = $_POST['test_key'];

	//saves user's answer and all the details for every question
	if($test->saveUserEntry($username, $test_id, $question_id, $answer, $test_key)) {
		echo 'success!';
	} else {
		echo 'failed!';
	}
}