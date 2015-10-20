<?php

class Login extends Controller {

  public function index($name = '') {
    $creds = $this->model('Credentials');
    $creds->name = $name;

    $this->view('login/index', ['name' => $creds->name]);
  }
}