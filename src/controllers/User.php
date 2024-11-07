<?php

require "Controller.php";
require "./models/UserModel.php";

class User extends Controller {
    public $default = "dashboard";
    private $model;

    function __construct() {
        $this->model = new UserModel();
    }

    function dashboard($params = []) {
        $this->view("User/dashboard", [
            "title" => "DashBoard",
        ]);
    }
    function login($params = []){
        $this->view("User/login", [
            "title" => "Login"
        ]);
    }

    function chat($params = []) {
        $this->view("User/chat", [
            "title" => "Chat"
        ]);
    }
}