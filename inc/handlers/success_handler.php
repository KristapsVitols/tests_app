<?php
//Checking if user has started a test and if its completed
if(isset($_SESSION['name']) && $_SESSION['q'] == $_SESSION['total_q_amount']) {
	$name = $_SESSION['name'];
	$correctAnswers = $_SESSION['correct_answers'];
	$totalQAmount = $_SESSION['total_q_amount'];

	//destroy session
	session_destroy();
} else {
	//do not allow visit success page if no test in progress and if it is not completed
	header("Location: index.php");
}