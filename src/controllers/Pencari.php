<?php

require_once "Controller.php";
require_once "./models/UserModel.php";

class Pencari extends Controller {
    public $default = "homepage";
    private $model;

    function __construct() {
        $this->model = new UserModel();
    }

    function homepage($params = []) {
        $this->view("Pencari/homepage", [
            "title" => "Homepage",
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

    function kostPage($params = []) {
        $this->view("Pencari/KostPage", [
            "title" => "Kost Page"
        ]);
    }

    function favorit($params = []){
        $this->view("Pencari/favorit",[
            "title" => "favorit"
        ]);
    }
}