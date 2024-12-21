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
                $_SESSION['errors_register'] = [$errors];
                header("Location: /project_paw/pencari/regPenyewa");
            } else {
                $this->model->register($username, $email, $password, "pencari");
                $_SESSION['berhasil'] = ["Berhasil membuat akun"];
                header("Location: /project_paw/account/login");
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

            $uniqueUsername = $this->model->unique("email_user", $email, "user");
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
                $_SESSION['errors_register'] = [$errors];
                header("Location: /project_paw/pemilik/regPemilik");
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
        $this->view("Account/lupapassword", [
            "title" => "lupapassword"
        ]);
    }

    function resetPassword($params = [])
    {
        $violations = [];
        $email = $_POST['email'];

        $violatiolnEmail = $validator->validate($email, [
            new Assert\Email(["message" => "Email Tidak Valid"]),
            new Assert\NotBlank(["message" => "Email Tidak Boleh Kosong"]),
        ]);

        if (!$this->model->isEmailExist($email))
        {
            $violations[] = "Email tidak di temukan";
        }
        
        foreach ($violatiolnEmail as $violation)
        {
            $violations[] = $violation->getMessage();
        }

        if (count($violations) < 1)
        {
            $token = bin2hex(random_bytes(32));
            $expires = date('Y-m-d H:i:s', strtotime('+1 hour'));

            $id = $this->model->getUserByEmail($email);

            $this->model->insertToken($id, $token, $expires);

            $resetLink = "http://yourwebsite.com/<?= PROJECT_NAME ?>/account/reset_password?token=" . $token;

            mail($email, "Reset Password", "Klik link berikut untuk reset password Anda: $resetLink");

            $_SESSION['reset_password'] = "link reset password telah di kirim ke ";
        }
    }
}