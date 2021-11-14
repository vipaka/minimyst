<?php
	class Database{
		protected $connection;

		function __construct(){
			$this->connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME);
			$this->connect();
		}

		function connect(){
			if ($this->connection->connect_error) {
				die('Failed to connect to MySQL database: ' . $this->connection->connect_error);
			}//Connected
		}

		function prepare($sql, $variable){
			$statement = $this->connection->prepare($sql);
			$statement->bind_param("s", $preparedVariable);
			$preparedVariable = $variable;
			$statement->execute();
			$statement->close();
		}

		function query($sql){
			return $this->connection->query($sql);
		}
	}
?>