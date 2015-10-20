<?php

class Home extends Controller {

  public function index($name = '') {

    // Pass the id instead of the name, then query the database for the user

    $user = $this->model('User');
    $user->name = $name;

    $this->view('home/index', ['name' => $user->name]);
  }
}