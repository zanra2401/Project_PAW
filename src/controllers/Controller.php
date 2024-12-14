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

  protected function isLogInPemilik()
  {
    return (isset($_SESSION["loged_in"]) && $_SESSION["role"] == "pemilik" );
  }

  protected function isLogInPencari()
  {
    return (isset($_SESSION["loged_in"]) && $_SESSION["role"] == "pencari" );
  }


}
