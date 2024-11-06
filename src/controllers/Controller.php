<?php

abstract class Controller
{
  protected function view($viewPath, $data = [])
  {
    require_once('./views/' . $viewPath . ".php");
  }
}
