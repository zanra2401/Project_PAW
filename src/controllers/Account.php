<?php

require_once "./models/AccountModel.php";
require_once "Controller.php";


use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints as Assert;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class Account extends Controller {
    private $model;
    public $default;

    function __construct()
    {
        $this->model = new AccountModel();
        $this->default = 'login';
    }

    function registerAkunPencari($params = []){
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $password_verif = $_POST["password-verif"];
            $validator = Validation::createValidator();

            $errors = [];

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

            $uniqueUsername = $this->model->unique("username_user", $username, "user");
            if (!$uniqueUsername) $errors[] = "Username Telah Di gunakan";

            $violatiolnEmail = $validator->validate($email, [
                new Assert\Email(["message" => "Email Tidak Valid"]),
                new Assert\NotBlank(["message" => "Email Tidak Boleh Kosong"]),
            ]);


            $uniqueEmail = $this->model->unique("email_user", $email, 'user');
            if (!$uniqueEmail) $errors[] = "Email Telah Terdaftar";

            $violationPassword = $validator->validate($password, [
                new Assert\NotBlank(["message" => "Password tidak boleh kosong"]),
                new Assert\Regex([
                    'pattern' => "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/",
                    'message' => "Password Minimal ada huruf kecil, besar dan angka"
                ]),
                new Assert\Length([
                    "min" => 8,
                    "minMessage" => "Password minimal 8 character"
                ])
            ]);

            $violationPasswordVerif = $validator->validate($password, [
                new Assert\NotBlank([
                    'message' => "Password Verifikasi tidak boleh kosong",
                ])
            ]);

            if (!$password == $password_verif)
            {
                $errors['password'] = "password dan password verifikasi tidak sama";
            }

            foreach ($violationUsername as $violation)
            {
                $errors[] = $violation->getMessage();
                break;
            }

            foreach ($violatiolnEmail as $violation)
            {
                $errors[] = $violation->getMessage();
                break;
            }

            foreach ($violationPassword as $violation)
            {
                $errors[] = $violation->getMessage();
                break;
            }

            foreach ($violationPasswordVerif as $violation)
            {
                $errors[] = $violation->getMessage();
                break;
            }
            
            if (count($errors) > 0)
            {
                $_SESSION['errors'] = $errors;
                header("Location: /project_paw/pencari/regPenyewa");
            } else {
                $id = $this->model->register($username, $email, $password, "pencari");
                $_SESSION['id_user'] = $id;
                $this->verifikasiAkun();
                $_SESSION['berhasil'] = ["Berhasil membuat akun, silakan aktifasi akun anda"];
                header("Location: /project_paw/account/verifikasiakun/$id");
            }

        }
    }


    function registerAkunPemilik($params = []){
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $username = $_POST["username"];
            $email = $_POST["email"];
            $no_hp = $_POST["no-hp"];
            $password = $_POST["password"];
            $password_verif = $_POST["password-verif"];
            $validator = Validation::createValidator();

            $errors = [];

            $violationNoHp = $validator->validate($no_hp, [
                new Assert\NotBlank(["message" => "Nomor Hanphone tidak boleh kosong"]),
                new Assert\Regex([
                    'pattern' => "/^[0-9]+$/",
                    'message' => "No handphone hanya boleh angka"
                ]),
                new Assert\Length([
                    'min' => 10,
                    'minMessage' => "no handphone minimal 10 character",
                    'max' => 13,
                    'maxMessage' => "no handphone maximal 13 character"
                ])
            ]);

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

            $uniqueUsername = $this->model->unique("username_user", $username, "user");
            if (!$uniqueUsername) $errors[] = "Username Telah Di gunakan";

            $violatiolnEmail = $validator->validate($email, [
                new Assert\Email(["message" => "Email Tidak Valid"]),
                new Assert\NotBlank(["message" => "Email Tidak Boleh Kosong"]),
            ]);

            $violationPassword = $validator->validate($password, [
                new Assert\NotBlank(["message" => "Password tidak boleh kosong"]),
                new Assert\Regex([
                    'pattern' => "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/",
                    'message' => "Password Minimal ada huruf kecil, besar dan angka"
                ]),
                new Assert\Length([
                    "min" => 8,
                    "minMessage" => "Password minimal 8 character"
                ])
            ]);

            $violationPasswordVerif = $validator->validate($password, [
                new Assert\NotBlank([
                    'message' => "Password Verifikasi tidak boleh kosong",
                ])
            ]);

            if (!$password == $password_verif)
            {
                $errors[] = "password dan password verifikasi tidak sama";
            }

            foreach ($violationUsername as $violation)
            {
                $errors[] = $violation->getMessage();
            }

            foreach ($violatiolnEmail as $violation)
            {
                $errors[] = $violation->getMessage();
            }

            foreach ($violationPassword as $violation)
            {
                $errors[] = $violation->getMessage();
            }

            foreach ($violationPasswordVerif as $violation)
            {
                $errors[] = $violation->getMessage();
            }

            foreach ($violationNoHp as $violation)
            {
                $errors[] = $violation->getMessage();
            }
            
            if (count($errors) > 0)
            {
                $_SESSION['errors'] = $errors;
                $this->verifikasiAkun();
                header("Location: /project_paw/pemilik/regPemilik");
            } else {
                $id = $this->model->register($username, $email, $password, "pemilik");
                $_SESSION['id_user'] = $id;
                $this->verifikasiAkun();
                $_SESSION['success'] = ["Berhasil membuat akun, silakan verifikasi akun anda"];
                header("Location: /project_paw/account/verifikasiakun/$id");
            }

        }
    }


    function loginUser($params = [])
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {   
            $username = $_POST["username"];
            $password = $_POST["password"];
            $validator = Validation::createValidator();


            $errors = [];

            $violationUsername = $validator->validate($username, [
                new Assert\NotBlank(["message" => "Username Tidak Boleh Kosong"]),
                new Assert\Length([
                    "min" => 5,
                    "minMessage" => "Username atau password tidak valid",
                    "max" => 30,
                    "maxMessage" => "Username atau password tidak valid"
                ]),
                new Assert\Regex([
                    'pattern' => '/^[A-Za-z0-9]+$/',
                    'message' => 'Username atau password tidak valid'
                ])
            ]);


            $violationPassword = $validator->validate($password, [
                new Assert\NotBlank(["message" => "Password tidak boleh kosong"]),
                new Assert\Regex([
                    'pattern' => "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/",
                    'message' => "Username atau password tidak valid"
                ]),
                new Assert\Length([
                    "min" => 8,
                    "minMessage" => "Username atau password tidak valid"
                ])
            ]);



            $dbUsername = $this->model->getOneData('username_user', $username, 'user');
            $hashPass = $this->model->getData($username)['password_user'];
           
            if ($dbUsername == NULL or $hashPass == NULL)
            {
                $errors[] = "Username atau Password tidak vali1d";
            }

            
            if (!password_verify($password, $hashPass))
            {
                $errors[] = "Username atau Password tidak valid";
            }

            if (count($errors) > 0)
            {
                $_SESSION["error_login"] = [$errors[0]];
                header("Location: /" . PROJECT_NAME ."/account/login");
            }
            else
            {
                $_SESSION["loged_in"] = true;
                $_SESSION["username"] = $username;
                $role =  ($this->model->getData($username))["role_user"];
                $id =  ($this->model->getData($username))["id_user"];
                $_SESSION["role_user"] = $role;
                $_SESSION["id_user"] = $id;
                if ($role == "pemilik")
                {
                    header("Location: /" . PROJECT_NAME ."/pemilik");
                } else {
                    header("Location: /" . PROJECT_NAME ."/pencari");
                }
            }
        }
    }

    function login($params = []){
        if ($this->isLogIn())
        {
            $role = $this->model->getData($_SESSION["username"])['role_user'];
            var_dump($role);
            if ($role = "pemilik")
            {
                header("Location: /" . PROJECT_NAME ."/pemilik"); 
            }

            else

            {
                header("Location: /" . PROJECT_NAME ."/pencari");

            }
        }

        $this->view("Account/login", [
            "title" => "Login"
        ]);
    }

    function logOut()
    {
        session_destroy();
        header("Location: /" . PROJECT_NAME . "/account/login");
    }

    function lupapassword($params = []) {
        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $message = "";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $email = $_POST['email'];


                if ($this->model->isEmailExist($email)) {
                    // Generate token unik
                    $token = bin2hex(random_bytes(50));
                    // $expire_time = date("Y-m-d H:i:s", strtotime("+1 hour")); // Token berlaku 1 jam

                    // Simpan token ke database
                    
                    $this->model->updateResetCode($token, $email);

                    // Kirim email menggunakan PHPMailer
                    $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'nabiilahrizqiamal@gmail.com';                     //SMTP username
                    $mail->Password   = 'qzhaeghaehcyulpw';                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
                    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                    $mail->setFrom('from@example.com', 'Admin');
                    $mail->addAddress($email, 'User');     //Add a recipient              //Name is optional
                    $mail->addReplyTo('no-reply@example.com', 'Information');
                    $id = $this->model->getUserByEmail($email)['id_user'];
                    //Content
                    $mail->isHTML(true);    
                    $resetLink = "http://localhost/project_paw/account/resetpassword/$token/$id";
                    $email_template = "
                        <h2>Klik tautan berikut</h2>
                        Klik link berikut untuk mereset password Anda: <a href='$resetLink'>Reset Password</a>
                    ";                             
                    $mail->Subject = 'verifikasi email';
                    $mail->Body    = $email_template;
                    

                    $mail->send();
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
            } else {
                    $message = "<div class='alert alert-danger'>Email tidak ditemukan.</div>";
                }
            }
            } else {
            $this->view("Account/lupapassword", [
                "title" => "lupapassword"
            ]);
        }
    }
    
    function resetpassword($params = []) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
           
            $errors = [];
            $id = $_POST['id'];
            $password = $_POST['new-password'];
            $verifPass = $_POST['confirm-password'];
            $token = $_POST['token'];
            $validator = Validation::createValidator();

           
            if ($this->model->checkToken($id, $token))
            {
                $violationPassword = $validator->validate($password, [
                    new Assert\NotBlank(["message" => "Password tidak boleh kosong"]),
                    new Assert\Regex([
                        'pattern' => "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/",
                        'message' => "password tidak valid"
                    ]),
                    new Assert\Length([
                        "min" => 8,
                        "minMessage" => "password tidak valid"
                    ])
                ]);
                
                foreach ($violationPassword as $violation)
                {
                    $errors[] = $violation->getMessage();
                }
    
                if ($password !=  $verifPass)
                {
                    $errors[] = "Password tidak cocok";
                }
    
                if (count($errors) < 1)
                {
                    $this->model->resetPassword($id, $password);
                    header("Location: /" . PROJECT_NAME . "/account/login");
                } else {
                    $_SESSION['error-reset'] = [$errors[0]];
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                }
            }

        } else {
            $this->view("Account/resetpassword", [
                "title" => "Reset Page",
                "token" => $params[0],
                "id_user" => $params[1] 
            ]);
        }
    }

    function verifikasiAkun($params = []) {
        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $message = "";
            $email = $_POST['email'];
        
            if ($this->model->isEmailExist($email)) {
                $message = "<div class='alert alert-danger'>Email sudah terdaftar.</div>";
                //generate kode angka random
                $kodeAcak = rand(100000,999999);// 6 digit
                
                $this->model->verifCode($kodeAcak, $_SESSION['id_user']);
                unset($_SESSION['id_user']);
                // Kirim email menggunakan PHPMailer
                $mail = new PHPMailer(true);
            try {
                    //Server settings
                    $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'nabiilahrizqiamal@gmail.com';                     //SMTP username
                    $mail->Password   = 'qzhaeghaehcyulpw';                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
                    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                    //Recipients
                    $mail->setFrom('no-reply@example.com', 'Admin');
                    $mail->addAddress($email, 'User');     //Add a recipient              //Name is optional
                    // $id = $this->model->getUserByEmail($email)['id_user'];
                    //Content
                    $mail->isHTML(true);   
                    // $resetLink = "http://localhost/project_paw/account/resetpassword/$token/$id";
                    $email_template = "
                        <h2>Kode Verifikasi Anda</h2>
                        <p>Kode verifikasi Anda adalah : <b>$kodeAcak</b></p>
                        <p>Masukkan kode ini untuk melanjutkan proses registrasi.</p>
                    ";                             
                    $mail->Subject = 'Kode Verifikasi';
                    $mail->Body    = $email_template;

                    $mail->send();
                    $message = "<div class='alert alert-success'>Kode verifikasi telah dikirim ke email Anda.</div>";
                } catch (Exception $e) {
                    $message = "<div class='alert alert-danger'>Pesan gagal dikirim. Kesalahan: {$mail->ErrorInfo}</div>";
                }
            }    
            } else {
                if (isset($params[0]))
                {
                    $this->view("Account/verifikasiakun", [
                        "title" => "verifikasiAKun",
                        "id_user" => $params[0],
                        "email_user" => $this->model->getEmailByID($params[0])
                    ]);
                }
                else
                {
                    header("Location: /". PROJECT_NAME . "/account/login");
                }
        }
    }

    function isCodeMatch($params = [])
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $id = $_POST['id_user'];
            $codeAcak = $_POST['verif_code'];
            if ($this->model->isCodeMatch($id, $codeAcak))
            {
                $_SESSION['success'] = ["Verifikasi Code Berhasil Silahkan Log In"];
                header("Location: /". PROJECT_NAME . "/account/login");
            } else 
            {
                $_SESSION['errors'] = ["Verifikasi Code Gagal Silahkan"];
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
    }


}