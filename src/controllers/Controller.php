<?php

abstract class Controller
{
  protected function view($viewPath, $data = [])
  {
    require_once('./views/' . $viewPath . ".php");
  }

  protected function isLogIn()
  {
    return isset($_SESSION["loged_in"]);
  }


}
