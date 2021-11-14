<?php
	include_once('dbModel.php');

	class queryModel{
		protected $connection;
		protected $result;

		function __construct(){
			$this->connection = new Database();
			$this->result = $this->getDatabaseResults();
		}

		public function getDataArray() : array{
			$array = [];
			if ($this->result !== false && $this->result->num_rows > 0) {
				while($row = $this->result->fetch_assoc()) {
					$array[] = $row;
				}
			}
			return $array;
		}

		//Example of a direct query, no user input parameters.
		public function getDatabaseResults(){
			$sql = 'SELECT user_id, username, user_email
				FROM ' . TABLE_PREFIX . 'users 
				ORDER BY user_id DESC
				LIMIT 3';
			return $this->connection->query($sql);
		}

		//Example of a prepared statement query with 1 user input parameter.
		public function isRegisteredUser($username){
			$sql = "SELECT user_id, username, user_email
				FROM " . TABLE_PREFIX . "users 
				WHERE username = ?";
			$statement = $this->connection->prepare($sql, $username);
			return $this->connection->query($sql);
		}
	}
?>