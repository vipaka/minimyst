<?php
  class PagesController{
    public $router;

    public function __construct(){
      $this->router = new Router();
    }

    public function index(){
      $page = 'login';
      $this->router->validateView('login');
    }

    public function error(){
      $page = 'error';
      $this->router->validateView('error');
    }

    public function home(){
      $page = 'home';
      $this->router->validateView('home');
    }

    public function login(){
      $page = 'login';
      $this->router->validateView('login');
    }

    public function yourPage(){
      $page = 'yourPage';
      $this->router->validateView('yourPage');
    }
  }
?>