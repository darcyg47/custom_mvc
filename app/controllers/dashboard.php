<?php

class Dashboard extends Controller {

  public function index($name = '') {
    $report = $this->model('Reports');
    $report->name = $name;

    $this->view('dashboard/index', ['name' => $report->name]);
  }
}