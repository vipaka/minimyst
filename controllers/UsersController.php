<?php
    require_once('./models/queryModel.php');

	class UsersController{
		protected $data;
		protected $queryModel;

		function __construct(){
			$this->queryModel = new QueryModel();
		}

		function getData(){
			$this->data = $this->queryModel->getDatabaseResults();
			$this->data = $this->queryModel->getDataArray();
			return $this->formatData();
		}

		function formatData(){
			$user = [];
		    foreach ($this->data as $userDataKey => $userData){
		        $user[] = [
		            'name' => $userData['username'],
		            'id' => $userData['user_id'],
		            'logged' => isset($_SESSION['user_id'])
		        ];
		    }
		    return $user;
		}

		function loginOrSignup($userName){
			$userRegistered = $this->queryModel->isRegisteredUser($userName);
			$userRegistered = $this->queryModel->getDataArray();

			if (empty($userRegistered)){
				$this->queryModel->insertNewUser($userName);
				$userRegistered = $this->queryModel->getMostRecentId();
			}

			if (count($userRegistered) > 1){
				throw new Exception('This user name exists multiple times already in the database... :(');
			}

			return $userRegistered[0];
		}
	}
?>