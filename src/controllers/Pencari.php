<?php

require_once "Controller.php";
require_once "./models/PencariModel.php";


use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints as Assert;

class Pencari extends Controller
{
    public $default = "homepage";
    private $model;

    function __construct()
    {
        $this->model = new PencariModel();
    }
    
    function homepage($params = []) {
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $min_harga = isset($_POST['min_harga']) ? intval(str_replace(['Rp', ' ', '.'], '', $formatted = "{$_POST['min_harga']}")): '';
            $max_harga = isset($_POST['max_harga']) ? intval(str_replace(['Rp', ' ', '.'], '', $formatted = "{$_POST['max_harga']}")) : '';
            $nama_lokasi = isset($_POST['lokasi_nama'])? $_POST['lokasi_nama'] : '';
            $tipe = isset($_POST['tipe'])? $_POST['tipe'] : '';
            $urutan = isset($_POST['harga']) ? $_POST['harga'] : '';
            $filter = [

                'internet_wifi' => isset($_POST['1']) ? $_POST['1'] : '',
                'parkir' => isset($_POST['2']) ? $_POST['2'] : '',
                'kulkas' => isset($_POST['3']) ? $_POST['3'] : '',
                'dapur' => isset($_POST['4']) ? $_POST['4'] : '',
                'cctv' => isset($_POST['5']) ? $_POST['5'] : '',
                'ruang_tamu' => isset($_POST['6']) ? $_POST['6'] : '',
                'mesin_cuci' => isset($_POST['7']) ? $_POST['7'] : '',
                'dispenser' => isset($_POST['8']) ? $_POST['8'] : '',

                'jendela' => isset($_POST['9']) ? $_POST['9'] : '',
                'ac' => isset($_POST['10']) ? $_POST['10'] : '',
                'tv_kabel' => isset($_POST['11']) ? $_POST['11'] : '',
                'kursi' => isset($_POST['12']) ? $_POST['12'] : '',
                'kasur' => isset($_POST['13']) ? $_POST['13'] : '',
                'kamar_mandi_dalam' => isset($_POST['14']) ? $_POST['14'] : '',
                'meja' => isset($_POST['15']) ? $_POST['15'] : '',
                'lemari' => isset($_POST['16']) ? $_POST['16'] : '',
                'kipas_angin' => isset($_POST['17']) ? $_POST['17'] : '',
            ];

            $allEmpty = empty(array_filter($filter, function($value) {
                return $value !== '';  
            }));

            if ($nama_lokasi == "" && $tipe == "" && $allEmpty && $min_harga == 0 && $max_harga == 0 && $urutan == ''){
                $data = $this->model->getAllKost();
                if ($this->isLogInPencari()) 
                {
                    $profile = $this->model->getProfie($_SESSION['id_user']);
                }
                $fasi = $this->model->getFasilitasKost();
            } else {
                $data = $this->model->filterKost($nama_lokasi, $tipe, $filter, $min_harga, $max_harga, $urutan);
                if ($this->isLogInPencari()) 
                {
                    $profile = $this->model->getProfie($_SESSION['id_user']);
                }
                $fasi = $this->model->getFasilitasKost();
            }

            if ($this->isLogInPencari()) 
            {
                $this->view("Pencari/homepage", [
                    "title" => "Homepage",
                    "data" => $data,
                    "profile" => $profile,
                    "fasilitas" => $fasi,
                    "contact" => $this->model->getContact()
                ]);
            } else {
                $this->view("Pencari/homepage", [
                    "title" => "Homepage",
                    "data" => $data,
                    "fasilitas" => $fasi
                ]);
            }
        } else {
            if ($this->isLogInPencari()) 
            {
                $data = $this->model->getAllKost();
                $fasi = $this->model->getFasilitasKost();
                $profile = $this->model->getProfie($_SESSION['id_user']);
                $this->view("Pencari/homepage", [
                    "title" => "Homepage",
                    "data" => $data,
                    "profile" => $profile,
                    "fasilitas" => $fasi,
                    "contact" => $this->model->getContact()
                ]);
            } else {
                $data = $this->model->getAllKost();
                $fasi = $this->model->getFasilitasKost();
                $this->view("Pencari/homepage", [
                    "title" => "Homepage",
                    "data" => $data,
                    "fasilitas" => $fasi
                ]);
            }
        }
           

    }


    function chat($params = []) {
        if ($this->isLogInPencari()) 
        {
            $this->view("Pencari/chat", [
                "title" => "Chat",
                "contact" => $this->model->getContact(),
            ]);
        } else {
            header("Location: /" . PROJECT_NAME . "/account/login");
        }
    }

    function regPenyewa($params = [])
    {

        $this->view("Pencari/regPenyewa", [
            "title" => "regPenyewa",
        ]);
    }

    function verifikasiKode($params = [])
    {
        if ($this->isLogInPencari()) {
            $this->view("Pencari/verifikasiKode", [
                "title" => "verifikasiKode"
            ]);
        } else {
            header("Location: /" . PROJECT_NAME . "/account/login");
        }
    }

    function berita($params = [])
    {
        if ($this->isLogInPencari()) {
            $this->view("Pencari/berita", [
                "title" => "berita",
                "contact" => $this->model->getContact()
            ]);
        } else {
            header("Location: /" . PROJECT_NAME ."/account/login");
        }
    }

    function ubahpassword($params = [])
    {
        if ($this->isLogInPencari()) {
            $this->view("Pencari/ubahpassword", [
                "title" => "ubahpassword"
            ]);
        } else {
            header("Location: /" . PROJECT_NAME . "/account/login");
        }
    }

    function finishpassword($params = [])
    {
        if ($this->isLogInPencari()) {
            $this->view("Pencari/finishpassword", [
                "title" => "finishpassword"
            ]);
        } else {
            header("Location: /" . PROJECT_NAME . "/account/login");
        }
    }

    function finishreg($params = [])
    {
        if ($this->isLogInPencari()) {
            $this->view("Pencari/finishreg", [
                "title" => "finishreg"
            ]);
        } else {
            header("Location: /" . PROJECT_NAME . "/account/login");
        }
    }

    function kodegagal($params = [])
    {
        if ($this->isLogInPencari()) {
            $this->view("Pencari/kodegagal", [
                "title" => "kodegagal"
            ]);
        } else {
            header("Location: /" . PROJECT_NAME . "/account/login");
        }
    }

    function finishregpemilik($params = [])
    {
        if ($this->isLogInPencari()) {
            $this->view("Pencari/finishregpemilik", [
                "title" => "finishregpemilik"
            ]);
        } else {
            header("Location: /" . PROJECT_NAME . "/account/login");
        }
    }
    function homeberita($params = [])
    {
        if ($this->isLogInPencari()) {
            $profile = $this->model->getProfie($_SESSION['id_user']);
            $data = $this->model->getAllBerita();

            $this->view("Pencari/homeberita", [
                "title" => "homeberita",
                "data_berita" => $data,
                "profile" => $profile,
                "contact" => $this->model->getContact()
            ]);
        } else {
            $data = $this->model->getAllBerita();

            $this->view("Pencari/homeberita", [
                "title" => "homeberita",
                "data_berita" => $data
            ]);
        }
    }

    function isiberita($params = [])
    {
        $id = $params[0];
        $data = $this->model->getOneBerita($id);
        $this->view("Pencari/isiberita", [
            "data_berita" => $data,
            "title" => "isiberita"
        ]);
    }

    function kostPage($params = []) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {   
            if(isset($_POST['id_user_favorit'])){
                $id_user = $_POST['id_user_favorit'];
                $id_kost = $_POST['id_kost_favorit'];
                $isFavorited = $_POST['isFavorited'];

                if ($isFavorited === 'tidak ada') {
                    $this->model->removeFromFavorites($id_user, $id_kost);
                } else {
                    $this->model->addToFavorites($id_user, $id_kost);
                }

                header("Location: /project_paw/pencari/kostPage/$id_kost");
                exit;
            } else if (isset($_POST['review_suka'])) {

                $islike = $_POST['isLiked'];
                if ($islike == 'tidak ada'){
                    $this->model->addLikeReview( $_POST['review_suka'], $_SESSION['id_user']);
                } else {
                    $this->model->removeLikeReview( $_POST['review_suka'], $_SESSION['id_user']);
                }
                header("Location: /project_paw/pencari/kostPage/{$_POST['id_kost']}");
                exit;
            } else {
                $kategori = $_POST['kategori_laporan'];
                $detail = $_POST['detail_laporan'];
                $id = $_SESSION['id_user'];
                $id_kost = $_POST['id_kost'];

                $erors = [];

                if (empty($kategori)) {
                    $erors['kategori'] = "Pilih salah satu";
                }

                if (empty($detail)) {
                    $erors['detail'] = "inputan tidak boleh kosong";
                } else if (strlen($detail) <= 10) {
                    $erors['detail'] = "inputan harus lebih dari 11 karakter";
                }

                if (empty($erors)) {
                    $this->model->insertDataLaporan($kategori, $detail, $id, $id_kost);
                    header("Location: /project_paw/pencari/kostPage/$id_kost");
                    return;
                }
            }
        } else {
            if ($this->isLogInPencari()) {


                $id = (int) $params[0];
                $data = $this->model->getOneDataKost($id);
    
                $fasilitas = $this->model->getAllFasilitas($id);
                $profile = $this->model->getProfie($_SESSION['id_user']);
                
                $rekomendasi = $this->model->rekomendasiKost($id);
                $kategori_laporan = $this->model->getKategoriLaporan();
                $id_user = $_SESSION['id_user'];
                
                $review = $this->model->getAllReview($id);
                $udah_lapor = $this->model->cekPelapor($id_user, $id);
                $cekFavorit = $this->model->cekFavorit($id_user, $id);
                $this->view("Pencari/KostPage", [
                    "title" => "Kost Page",
                    "id" => $id,
                    "data" => $data,
                    "fasilitas" => $fasilitas,
                    "profile" => $profile,
                    "rekomendasi" => $rekomendasi,
                    "kategori_laporan" => $kategori_laporan,
                    "sudah_lapor" => $udah_lapor,
                    "id_user" => $id_user,
                    "check_favorit" => $cekFavorit,
                    "review" => $review,
                    "id_pemilik" => $data[$id]['id_pemilik'],
                    "contact" => $this->model->getContact()
                ]);
                
            } else {
                $id = (int) $params[0];
                $data = $this->model->getOneDataKost($id);
                $fasilitas = $this->model->getAllFasilitas($id);

                $rekomendasi = $this->model->rekomendasiKost($id);
                $kategori_laporan = $this->model->getKategoriLaporan();

                $review = $this->model->getAllReview($id);
                $rekomendasi = $this->model->rekomendasiKost($id);
                $this->view("Pencari/KostPage", [
                    "title" => "Kost Page",
                    "id" => $id,
                    "data" => $data,
                    "fasilitas" => $fasilitas,
                    "rekomendasi" => $rekomendasi,
                    "kategori_laporan" => $kategori_laporan,
                    "review" => $review,
                    "id_pemilik" => $data[$id]['id_pemilik']
                ]);
            }
        }
    }

    function kamar($params = [])
    {
        $id = (int) $params[0];
        $data_kamar = $this->model->getAllKamar($id);
        $judul = $this->model->getNamaKost($id);
        $this->view("Pencari/kamar", [
            "title" => "kamar",
            "id" => $id,
            "judul" => $judul,
            "data_kamar" => $data_kamar
        ]);
    }
    
    function kebijakan($params = [])
    {
        $this->view("Pencari/kebijakan", [
            "title" => "kebijakan"
        ]);
    }
    function tentangkami($params = [])
    {
        $this->view("Pencari/tentangkami", [
            "title" => "tentangkami"
        ]);
    }
    function riwayatpemesanan($params = [])
    {
        if ($this->isLogInPencari()) {
            $this->view("Pencari/riwayatpemesanan", [
                "title" => "riwayatpemesanan"
            ]);
        } else {
            header("Location: /" . PROJECT_NAME . "/account/login");
        }
    }
    function pembayaran($params = [])
    {
        if ($this->isLogInPencari()) {
            $this->view("Pencari/pembayaran", [
                "title" => "pembayaran"
            ]);
        } else {
            header("Location: /" . PROJECT_NAME . "/account/login");
        }
    }

    function favorit($params = [])
    {
        if ($this->isLogInPencari()) {
            $profile = $this->model->getProfie($_SESSION['id_user']);

            $kost = $this->model->getFavorit();
            $this->view("Pencari/favorit", [
                "title" => "favorit",
                "kosts" => $kost,
                "profile" => $profile,
                "contact" => $this->model->getContact()
            ]);
        } else {
            header("Location: /" . PROJECT_NAME . "/account/login");
        }
    }

    function profile($params = [])
    {
        if ($this->isLogInPencari()) {
            $erors = [];
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if(isset($_POST['reviewTextarea'])){
                    $this->model->addReview($_POST['reviewTextarea'], $_SESSION['id_user'],$_POST['id_kostnya']);
                } else {
                    $validator = Validation::createValidator();
                    $hapus = false;
    
                    // validasi foto profile
    
                    if (isset($_FILES['ubah_gambar'])) {
                        if (!isset($_POST['pp_default'])) {
                            $file_path = $_FILES['ubah_gambar']['tmp_name'];
                            if (!empty($file_path)) {
                                $mimeType = mime_content_type($file_path);
    
                                if (!in_array($mimeType, ['image/jpeg', 'image/png'])) {
                                    $erors['foto_profile'] = 'Gambar harus berformat JPEG atau PNG.';
                                }
                            }
                        }
                    }
    
                    // validasi username
    
                    $username = $_POST["username"];
    
                    $violationUsername = $validator->validate($username, [
                        new Assert\NotBlank(["message" => "Username Tidak Boleh Kosong"]),
                        new Assert\Length([
                            "min" => 5,
                            "minMessage" => "Username Minimal 5 character",
                            "max" => 30,
                            "maxMessage" => "Username Maximal 30 character"
                        ]),
                        new Assert\Regex([
                            'pattern' => '/^[A-Za-z0-9]+$/',
                            'message' => 'Username Hanya mengizinkan Huruf dan angka saja'
                        ])
                    ]);
    
                    // validasi nama lengkap 
    
                    $nama_lengkap = $_POST["nama_lengkap"];
    
                    $pattern = "/^[a-zA-Z\s\-]+$/";
    
                    if ($nama_lengkap != "") {
                        if (!preg_match($pattern, $nama_lengkap)) {
                            $erors['fullname'] = "Nama hanya boleh berupa alfabet";
                        }
                    }
    
                    // jenis kelamin
    
                    $jenis_kelamin = $_POST["kelamin"];
    
                    // validasi email
    
                    $email = $_POST["email"];
    
                    $violatiolnEmail = $validator->validate($email, [
                        new Assert\Email(["message" => "Email Tidak Valid"]),
                        new Assert\NotBlank(["message" => "Email Tidak Boleh Kosong"]),
                    ]);
    
                    // validasi no hp
    
                    $no_hp = $_POST['no_hp'];
                    $pattern = "/^[0-9]+$/";
                    if ($no_hp != "") {
                        if (!preg_match($pattern, $no_hp)) {
                            $erors['hp'] = "no hp hanya boleh berupa numerik";
                        }
                    }
    
    
                    // input eror username
    
                    foreach ($violationUsername as $violation) {
                        $erors['username'] = $violation->getMessage();
                    }
    
                    // input eror email
    
                    foreach ($violatiolnEmail as $violation) {
                        $erors['email'] = $violation->getMessage();
                    }
    
    
    
                    $provinsi = $_POST['provinsi'];
                    $kota = $_POST['kota'];
    
                    if (count($erors) == 0) {
                        $this->model->updateProfile($_FILES, $_POST, $_SESSION['id_user']);
                    }
                }
            }

            $profile = $this->model->getProfie($_SESSION['id_user']);
            $data = $this->model->getAllDataUser($_SESSION['id_user']);
            $riwayat = $this->model->getKostRiwayatBeli($_SESSION['id_user']);
            // var_dump($riwayat);
            // die();
            $this->view("Pencari/profile", [
                "title" => "Profile",
                "data_user" => $data,
                "profile" => $profile,
                "eror" => $erors,
                "contact" => $this->model->getContact(),
                "riwayat" => $riwayat
            ]);
        } else {
            header("Location: /" . PROJECT_NAME . "/account/login");
        }
    }


    function reviewGambarKost($params = [])
    {
        $id = (int) $params[0];
        $gambar = $this->model->getImageKost($id);
        $judul = $this->model->getNamaKost($id);
        $this->view("Pencari/reviewGambarKost", [
            "title" => "ReviewGambarKost",
            "gambar" => $gambar,
            "id" => $id,
            "judul" => $judul,
        ]);
    }


    function faq($params = [])
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            $this->model->tambahPertanyaan($_POST);
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } else  {
            $pertanyaan = $this->model->getAllPertanyaan();
            $this->view("Pencari/faq", [
                "title" => "faq",
                "pertanyaan" => $pertanyaan 
            ]);
        }
    }


    function getMessage($params = [])
    {

        echo json_encode($this->model->getChat($params[0]));
    }


    function chatting($params = [])
    {
        if ($this->isLogInPencari()) {
            $this->view("Pencari/chatting", [
                "title" => "Chat",
                "id_user" => $params[0],
                "user" => $this->model->getUserById($params[0]),
                "chat" => $this->model->getChat($params[0]),
                "contact" => $this->model->getContact(),
            ]);
        } else {
            header("Location: /" . PROJECT_NAME . "/account/login");
        }
    }

    function sendMessage($params = [])
    {
        if ($this->isLogInPencari()) {
            $data = json_decode(file_get_contents('php://input'), true);
            $this->model->sendMessage($data['message'], $params[0]);
            echo json_encode("SUCCESS");
        } else {
            header("Location: /" . PROJECT_NAME . "/account/login");
        }
    }

    function cariBerita($params = [])
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            // Read the JSON data from the POST body
            $data = file_get_contents('php://input');

            // Decode the JSON into an associative array
            $request = json_decode($data, true);
            $data = $this->model->searchBerita($request['search']);
            echo json_encode($data);
        }
    }

    function getContact()
    {
        echo json_encode($this->model->getContact());
    }

    function hapusFavorit($params = [])
    {
        if (isset($_POST['idKost'])) {
            $idKost = $_POST['idKost'];
            $this->model->hapusFavoritbyId($idKost);
            header("Location: /" . PROJECT_NAME . "/pencari/favorit");
        
        };
    }

    function saveTransaction($params = [])
    {
        $notif = json_decode(file_get_contents('php://input'), true);
        
        $this->model->saveTransaction($notif);
        echo json_encode($notif);
    }

    function notifikasi($params = [])
    {
        if (isset($_POST['id_pengumuman']))
        {
            $id_pengumuman = $_POST['id_pengumuman'];
            $id_user = $_POST['id_user'];

            $this->model->getReadNotifikasi($id_pengumuman, $id_user);
        }

        $id_pengumuman_sudah_dibaca = $this->model->cekSudahDIbaca($_SESSION["id_user"]);
        // var_dump($id_pengumuman_sudah_dibaca);
        // echo $id_pengumuman_sudah_dibaca[0]['id_pengumuman'];
        // die();
        $data = $this->model->getPengumuman($_SESSION["id_user"]);
        $this->view("Pencari/notifikasi", [
            "title" => "notifikasi",
            "data" => $data,
            "sudah_baca" => $id_pengumuman_sudah_dibaca
        ]);
    }

    function coba($params = [])
    {
        $this->view("Pencari/coba", [
            "title" => "coba"
        ]);
    }

    function pembayaranOffline($params = [])
    {
        if (isset($params[0]) and isset($params[1]))
        {
            $this->model->transaksiOffline($params[0], $params[1]);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            header("Location: /" . PROJECT_NAME . "/");
        }
    }

    
    function pembayaranOnline($params = [])
    {
        if (isset($params[0]) and isset($params[1])) {
            $kostID = $params[1];
            $pencariID = $_SESSION['id_user'];
            $pemilikID = $params[0];
            $hargaKost = $this->model->getOneDataKost($params[1])[$params[1]]['data_kost']['harga_kost'];

            $transaksi_id = (time() * 10000) + random_int(1000, 9999);
            $trans = array(
                'transaction_details' => array(
                    'order_id' => $kostID . "_" . $pemilikID . "_" . $pencariID . "_" . $transaksi_id,
                    'gross_amount' => $hargaKost,
                    'kostID' => $kostID,
                ),
                'callbacks' => [
                    'finish' => '/project_paw/',
                ],
            );
                $_SESSION['snapToken'] = \Midtrans\Snap::getSnapToken($trans);
                header("Location: " . $_SERVER['HTTP_REFERER']);
            } 
            else 
            {
                header("Location: " . $_SERVER['HTTP_REFERER']);
            }
    }

}


