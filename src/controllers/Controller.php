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
    return (isset($_SESSION["loged_in"]) && $_SESSION["role_user"] == "pemilik" );
  }

  protected function isLogInPencari()
  {
    return (isset($_SESSION["loged_in"]) && $_SESSION["role_user"] == "pencari" );
  }

  function isLogInAdmin()
  {
    return (isset($_SESSION['is_admin_login']) && $_SESSION['role_admin'] == "admin");
  }
}
