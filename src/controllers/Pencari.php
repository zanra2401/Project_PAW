<?php

require_once "Controller.php";
require_once "./models/UserModel.php";

class Pencari extends Controller {
    public $default = "dashboard";
    private $model;

    function __construct() {
        $this->model = new UserModel();
    }

    function dashboard($params = []) {
        $this->view("Pencari/dashboard", [
            "title" => "DashBoard",
        ]);
    }
    function login($params = []){
        $this->view("Pencari/login", [
            "title" => "Login"
        ]);
    }

    function chat($params = []) {
        $this->view("Pencari/chat", [
            "title" => "Chat"
        ]);
    }
}