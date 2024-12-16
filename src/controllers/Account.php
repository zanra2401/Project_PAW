<?php

require_once "./models/AccountModel.php";
require_once "Controller.php";


use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints as Assert;


class Account extends Controller {
    private $model;

    function __construct()
    {
        $this->model = new AccountModel();
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
            
            if (count($errors) > 0)
            {
                $_SESSION['errors_register'] = $errors;
                header("Location: /project_paw/pencari/regPenyewa");
            } else {
                $this->model->register($username, $email, $password, "pencari");
                $_SESSION['berhasil'] = ["Berhasil membuat akun"];
                header("Location: /project_paw/account/regPenyewa");
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
                $_SESSION['errors_register'] = $errors;
                header("Location: /project_paw/pencari/regPemilik");
            } else {
                $this->model->register($username, $email, $password, "pemilik");
                $_SESSION['berhasil'] = ["Berhasil membuat akun"];
                header("Location: /project_paw/account/login");
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
            $encryptedPassowrd = $this->model->getOneData('password_user', $username, 'user');

            if ($dbUsername == NULL or $encryptedPassowrd == NULL)
            {
                $errors[] = "Username atau Password tidak valid";
            }


            $ivLength = openssl_cipher_iv_length('aes-256-cbc');
            $iv = substr($encryptedPassowrd, 0, IV_LENGTH);

            $decryptedPassowrd = openssl_decrypt($encryptedPassowrd, 'aes-256-cbc', KEY, 0, IV);

            if ($password != $decryptedPassowrd)

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
                $role =  ($this->model->getOneData("role", $username, "user"))["role_user"];
                $_SESSION["role"] = $role;
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
            $role = $this->model->getOneData("role" ,$_SESSION["username"], "user");
            if ($role_user = "pemilik")
            {
                header("Location: /" . PROJECT_NAME ."/pemilik"); 
            }
        }

        $this->view("Account/login", [
            "title" => "Login"
        ]);
    }
}