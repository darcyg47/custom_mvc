<?php

class Compose extends Controller {

  public function index() {
    $this->view('compose/index', ['name' => 'testing']);
  }

  public function template() {
    $this->view('compose/template', ['name' => 'testing']);
  }

  public function maillist() {
    $this->view('compose/maillist', ['name' => 'testing']);
  }

  public function message() {
    $this->view('compose/message', ['name' => 'testing']);
  }
}