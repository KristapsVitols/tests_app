<?php
/*
	TEST CLASS
*/

class Test {
	private $db;

	public function __construct() {
		$this->db = new Database();
	}

	//Get all tests
	public function getAllTests() {
		$sql = 'SELECT * FROM test_titles';
		$this->db->query($sql);
		return $this->db->resultSet();
	}

	//Get all answers for single test
	public function getTestQuestionAnswers($id) {
		$sql = 'SELECT * FROM test_answers WHERE question_id=:id';
		$this->db->query($sql);
		$this->db->bind(':id', $id, PDO::PARAM_INT);
		return $this->db->resultSet();
	}

	//Get all questions for single test
	public function getTestQuestions($id) {
		$sql = 'SELECT * FROM test_questions WHERE test_id=:id';
		$this->db->query($sql);
		$this->db->bind(':id', $id, PDO::PARAM_INT);
		return $this->db->resultSet();
	}

	//Get one specific question
	public function getSingleQuestion($id) {
		$sql = 'SELECT * FROM test_questions WHERE id=:id';
		$this->db->query($sql);
		$this->db->bind(':id', $id, PDO::PARAM_INT);
		return $this->db->single();
	}

	//Save user's answer every time "next question" is clicked
	public function saveUserEntry($username, $test_id, $question_id, $answer, $test_key) {
		$sql = 'INSERT INTO user_entries(name, test_id, question_id, answer, test_key) VALUES(:username, :test_id, :question_id, :answer, :test_key)';
		$this->db->query($sql);
		$this->db->bind(':username', $username, PDO::PARAM_STR);
		$this->db->bind(':test_id', $test_id, PDO::PARAM_INT);
		$this->db->bind(':question_id', $question_id, PDO::PARAM_INT);
		$this->db->bind(':answer', $answer, PDO::PARAM_INT);
		$this->db->bind(':test_key', $test_key, PDO::PARAM_STR);
		if($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}

	//Get correct answer for a specific question
	public function getCorrectAnswer($question_id) {
		$sql = 'SELECT * FROM correct_answer WHERE question_id=:question_id';
		$this->db->query($sql);
		$this->db->bind(':question_id', $question_id, PDO::PARAM_INT);
		return $this->db->single();
	}

	//Get user's current answer
	public function getCurrentAnswer($question_id, $test_key) {
		$sql = 'SELECT * FROM user_entries WHERE question_id=:question_id AND test_key=:test_key';

		$this->db->query($sql);
		$this->db->bind(':question_id', $question_id, PDO::PARAM_INT);
		$this->db->bind(':test_key', $test_key, PDO::PARAM_STR);
		return $this->db->single();
	}

	//Save the test results when user has finished entire test
	public function saveFinalResult($test_id, $test_key, $name, $question_amount, $correct_answers) {
		$sql = 'INSERT INTO completed_tests(test_id, test_key, name, question_amount, correct_answers) VALUES(:test_id, :test_key, :name, :question_amount, :correct_answers)';
		$this->db->query($sql);
		$this->db->bind(':test_id', $test_id, PDO::PARAM_INT);
		$this->db->bind(':test_key', $test_key, PDO::PARAM_STR);
		$this->db->bind(':name', $name, PDO::PARAM_STR);
		$this->db->bind(':question_amount', $question_amount, PDO::PARAM_INT);
		$this->db->bind(':correct_answers', $correct_answers, PDO::PARAM_INT);
		if($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}
}