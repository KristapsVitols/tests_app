<?php
/*
	DATABASE CLASS
*/

class Database {
	private $host = DB_HOST;
	private $user = DB_USER;
	private $pass = DB_PASS;
	private $dbname = DB_NAME;

	private $pdo;
	private $stmt;
	private $error;

	public function __construct() {
		$dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';charset=utf8';
		$options = array(
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
		);

		try {
			$this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
		} catch(PDOException $e) {
			$this->error = $e->getMessage();
			die($this->error);
		}
	}

	//Prepare sql query
	public function query($sql) {
		$this->stmt = $this->pdo->prepare($sql);
	}

	//Bind prepared statements
	public function bind($param, $value, $type) {
		$this->stmt->bindParam($param, $value, $type);
	}

	//Execute query
	public function execute() {
		return $this->stmt->execute();
	}

	//Return result array
	public function resultSet() {
		$this->execute();
		return $this->stmt->fetchAll();
	}

	//Return single result
	public function single() {
		$this->execute();
		return $this->stmt->fetch();
	}

	//Count rows
	public function rowCount() {
		return $this->stmt->rowCount();
	}
}

?>