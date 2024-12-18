<?php require './views/Components/Head.php' ?>
<?php
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require 'vendor/autoload.php';

// $message = "";

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $email = $_POST['email'];
//     $email = $dbconfig->real_escape_string($email);

//     // Cek apakah email ada di database
//     email();

//     if ($result->num_rows > 0) {
//         // Generate token unik
//         $token = bin2hex(random_bytes(50));
//         $expire_time = date("Y-m-d H:i:s", strtotime("+1 hour")); // Token berlaku 1 jam

//         // Simpan token ke database
        
//         $dbconfig->query("UPDATE user SET reset_code = '$token' WHERE email = '$email'");

//         // Kirim email menggunakan PHPMailer
//         $mail = new PHPMailer(true);
//         try {
//             $mail->isSMTP();
//             $mail->Host = 'smtp.gmail.com'; // Host SMTP
//             $mail->SMTPAuth = true;
//             $mail->Username = 'nabiilahrizqiamalia@gmail.com'; // Email pengirim
//             $mail->Password = 'xtoajfkrwaluxlf'; // App Password Gmail
//             $mail->SMTPSecure = 'tls';
//             $mail->Port = 587;

//             $mail->setFrom('nabiilahrizqiamalia@gmail.com', 'Support');
//             $mail->addAddress($email);

//             $mail->isHTML(true);
//             $mail->Subject = 'Reset Password Request';
//             $resetLink = "http://localhost/project/reset_password.php?token=$token";
//             $mail->Body = "Klik link berikut untuk mereset password Anda: <a href='$resetLink'>$resetLink</a>";

//             $mail->send();
//             $message = "<div class='alert alert-success'>Silakan periksa email Anda untuk reset password.</div>";
//         } catch (Exception $e) {
//             $message = "<div class='alert alert-danger'>Gagal mengirim email. Error: {$mail->ErrorInfo}</div>";
//         }
//     } else {
//         $message = "<div class='alert alert-danger'>Email tidak ditemukan.</div>";
//     }
// }
?>

<body class="bg-gray-50 flex items-center justify-center min-h-screen">
  <div class="bg-white shadow-md rounded-lg p-8 w-full max-w-sm">
    <h1 class="text-2xl font-bold text-orange-500 mb-4 text-center">Reset Password</h1>
    <p class="text-gray-700 text-center mb-6">
      Masukkan alamat email Anda, kami akan mengirimkan kode untuk mengatur ulang kata sandi Anda.
    </p>
    <form method="POST" action="/<?= PROJECT_NAME ?>/account/lupapassword">
      <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input 
          type="email" 
          id="email" 
          name="email"
          placeholder="Masukkan Email" 
          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-orange-500 focus:border-orange-500 text-gray-900"
          required
        />
      </div>
      <button type="submit" class="w-full text-white py-2 px-4 rounded-md bg-red-500 hover:bg-base-color focus:outline-none focus:ring-2 focus:ring-[#c48d6e] focus:ring-offset-2">
        Lanjut
      </button>
    </form>
  </div>
</body>
<?php require './views/Components/Foot.php' ?>
