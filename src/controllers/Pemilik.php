<?php

require_once "Controller.php";

class Pemilik extends Controller {
    public $default;

    function __construct() {
        $this->default = "dashboard.php";
    }

    function dashboard() {
        $this->view("Pemilik/dashboard", [
            "title" => "dashboard"
        ]);
    }

    function review() {
        $this->view("Pemilik/review", [
            "title" => "review" 
        ]);
    }

    function chat($params = []) {
        $this->view("Pemilik/chat", [
            "title" => "Chat"
        ]);
    }
}