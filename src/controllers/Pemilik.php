<?php

require_once "Controller.php";

class Pemilik extends Controller {
    public $default = "statistik";

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

    function halamanutama($params = []) {
        $this->view("Pemilik/halamanutama", [
            "title" => "halamanutama"
        ]);
    }
    function tambahkost($params = []) {
        $this->view("Pemilik/tambahkost", [
            "title" => "tambahkost"
        ]);
    }
    function statistik($params = []) {
        $this->view("Pemilik/statistik", [
            "title" => "statistik"
        ]);
    }
}