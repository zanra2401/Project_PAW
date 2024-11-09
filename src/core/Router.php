<?php

require_once "./controllers/Pencari.php";
require_once "./controllers/Pemilik.php";

class Router
{
  private static $instance = null;
  private static $url;
  private static $controller;

  public static function getInstance($routes)
  {
    if (self::$instance == null) {
      self::$instance = new Router($routes);
    }
  }

  private static function sanitizeUrl()
  {
    self::$url = filter_var($_GET['url'], FILTER_SANITIZE_URL);
    self::getRoute(self::$url);
  }


  public static function route()
  {
    self::sanitizeUrl();
  }

  private static function getRoute($url)
  {

    $url_arr = explode('/', self::$url);
    if ($url_arr[0] != "") 
    {

      if (file_exists("./controllers/" . ucfirst($url_arr[0]) . ".php")) 
      {
  
        self::$controller = new (ucfirst($url_arr[0]))();
        if (count($url_arr) > 1) {
          if (method_exists(self::$controller, $url_arr[1])) 
          {
  
            call_user_func([self::$controller, $url_arr[1]], ((count($url_arr) > 2) ? array_slice($url_arr, 2, count($url_arr) - 2) : []));
          
          } 
          else 
          {
  
            echo "Jalur Tidak Ditemukan 404";
          
          }
        } 
        else 
        {
  
          call_user_func([self::$controller, self::$controller->default]);
  
        }
      } 
      else
      {
  
        echo "Jalur Tidak Ditemukan 404";
      
      }

    } 
    else 
    {

      // Ubah ini ke default Controller
      self::$controller = new User();
      call_user_func([self::$controller, self::$controller->default]);
    
    }
    
  }
}



// Halaman Router Berfungsi Untuk Merutekan Berdasarkan URL
