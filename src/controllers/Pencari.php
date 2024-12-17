<?php

require_once "Controller.php";
require_once "./models/PencariModel.php";


use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints as Assert;

class Pencari extends Controller {
    public $default = "homepage";
    private $model; 

    function __construct() {
        $this->model = new PencariModel();
    }

    function homepage($params = []) {
        $this->view("Pencari/homepage", [
            "title" => "Homepage",
        ]);
    }
    

    function chat($params = []) {
        $this->view("Pencari/chat", [
            "title" => "Chat",
            "contact" => $this->model->getContact(),
        ]);
    }

    function regPenyewa($params = []) {
        $this->view("Pencari/regPenyewa", [
            "title" => "regPenyewa",
        ]);
    }

    function kode($params = []) {
        $this->view("Pencari/kode", [
            "title" => "kode"
        ]);
    }

    function berita($params = []) {
        $this->view("Pencari/berita", [
            "title" => "berita"
        ]);
    }
 

    function lupapassword($params = []) {
        $this->view("Pencari/lupapassword", [
            "title" => "lupapassword"
        ]);
    }

    function ubahpassword($params = []) {
        $this->view("Pencari/ubahpassword", [
            "title" => "ubahpassword"
        ]);
    }

    function finishpassword($params = []) {
        $this->view("Pencari/finishpassword", [
            "title" => "finishpassword"
        ]);
    }

    function finishreg($params = []) {
        $this->view("Pencari/finishreg", [
            "title" => "finishreg"
        ]);
    }

    function kodegagal($params = []) {
        $this->view("Pencari/kodegagal", [
            "title" => "kodegagal"
        ]);
    }

    function finishregpemilik($params = []) {
        $this->view("Pencari/finishregpemilik", [
            "title" => "finishregpemilik"
        ]);
    }
    function homeberita($params = []) {
        $this->view("Pencari/homeberita", [
            "title" => "homeberita"
        ]);
    }
    function isiberita($params = []) {
        $this->view("Pencari/isiberita", [
            "title" => "isiberita"
        ]);
    }

    function kostPage($params = []) {
        $this->view("Pencari/KostPage", [
            "title" => "Kost Page"
        ]);
    }
    function kebijakan($params = []) {
        $this->view("Pencari/kebijakan", [
            "title" => "kebijakan"
        ]);
    }
    function tentangkami($params = []) {
        $this->view("Pencari/tentangkami", [
            "title" => "tentangkami"
        ]);
    }
    function riwayatpemesanan($params = []) {
        $this->view("Pencari/riwayatpemesanan", [
            "title" => "riwayatpemesanan"
        ]);
    }
    function pembayaran($params = []) {
        $this->view("Pencari/pembayaran", [
            "title" => "pembayaran"
        ]);
    }

    function favorit($params = []){
        $this->view("Pencari/favorit",[
            "title" => "favorit"
        ]);
    }

    function profile($params = []){
        $this->view("Pencari/profile", [
            "title" => "Profile"
        ]);
    }

    function reviewGambarKost($params = []){
        $this->view("Pencari/reviewGambarKost", [
            "title" => "ReviewGambarKost"
        ]);
    }

    function test()
    {
        var_dump(count($this->model->unique("username_user", "zanuar", "user")));
    }

    function getChat($idPengirim, $noUpdate = true)
    {
        if ($noUpdate)
        {
            $this->DB->query("UPDATE chat SET status_chat = 1 WHERE id_user_penerima = ? AND id_user_pengirim = ?", "ii", [$_SESSION['id_user'], $idPengirim]);
        }
        $this->DB->query("SELECT * FROM chat WHERE (id_user_penerima = ? AND id_user_pengirim = ?) OR (id_user_penerima = ? AND id_user_pengirim = ?) ORDER BY tanggal_chat ASC", 'iiii', [$_SESSION['id_user'], $idPengirim, $idPengirim, $_SESSION['id_user']]);
        return $this->DB->getAll();
    }


    function getMessage($params = [])
    {
        echo json_encode($this->model->getChat($params[0]));
    }

    
    function chatting($params = [])
    {
        $this->view("Pencari/chatting", [
            "title" => "Chat",
            "id_user" => $params[0],
            "user" => $this->model->getUserById($params[0]),
            "chat" => $this->model->getChat($params[0]),
            "contact" => $this->model->getContact(),
        ]);
    }

    function sendMessage($params = [])
    {
        
        $data = json_decode(file_get_contents('php://input'), true);
        $this->model->sendMessage($data['message'], $params[0]);
        echo json_encode("SUCCESS");
    }

    function getContact()
    {
        echo json_encode($this->model->getContact());
    }
}