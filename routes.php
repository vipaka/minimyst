<?php
  class Router{
    function call($action) {
      require_once('controllers/Pages.php');
      $controller = new PagesController();
      $controller->{ $action }();
    }

    function validateAction($action){
      $allowedPages = ['index', 'home',  'login', 'yourPage'];
      if (in_array($action, $allowedPages)){
        $this->call($action);
      }else{
        $this->call('error');
      }
    }

    function validateView($view){
      $fileExists = file_exists('views/' . $view . '.php');
      try{
        if (!$fileExists){
          $this->showError('View could not be found.');
        }
        require_once('views/' . $view . '.php'); 
      } catch(Exception $e) {   
        $this->showError($e->getMessage());
      }
    }

    function showError($exception){
      echo "Message : " . $exception;
      require_once('views/error.php');
      return;
    }

    function getAction($currentPage){
      $action = 'login';
      if (isset($_GET['action'])){
          $action = $_GET['action'];
      }else if (isset($_POST['action'])){
          $action = $_POST['action'];
      }else{
          $action = $currentPage;
      }
      $action = str_replace('/', '', $action);
      $action = ($action === '') ? 'home': $action;
      return $action;
    }
  }

  $router = new Router();
  $action = $router->getAction($currentPage);
  $router->validateAction($action);
?>