<?php

class App {

  protected $controller = 'home';
  protected $method = 'index';
  protected $params = [];

  public function __construct() {
    $url = $this->parseUrl();


    // Debug stuff
    echo '<i>Initial input: ';
    print_r($url);


    if (file_exists('../app/controllers/' . $url[0] . '.php')) {
      $this->controller = $url[0];
      unset($url[0]);
      echo ' ... Controller exists.<br>';
    } else {
      echo ' ... Controller file does not exist.<br>';
    }

    require_once '../app/controllers/' . $this->controller . '.php';

    $this->controller = new $this->controller;


    // Debug stuff
    echo 'Check for method (1st element): ';
    print_r($url);


    if (isset($url[1])) {
      if (method_exists($this->controller, $url[1])) {
        $this->method = $url[1];
        unset($url[1]);
        echo ' ... method exists.<br>';
      } else {
        echo ' ... method does not exist.<br>';
      }
    }


    // Debug stuff
    echo 'Params: ';
    print_r($url);
    echo '</i><hr>';


    $this->params = $url ? array_values($url) : [];

    call_user_func_array([$this->controller, $this->method], $this->params);
  }

  public function parseUrl() {
    if (isset($_GET['url'])) {
      return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
    }
  }
}