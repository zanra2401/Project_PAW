<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil Pengguna</title>
  <style>
    .profile-container {
      text-align: center;
      margin-top: 50px;
    }
    .profile-container img {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      object-fit: cover;
    }
    .btn-change {
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    .btn-change:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>

<div class="profile-container">
  <h1>Profil Pengguna</h1>
  <img id="profile-picture" src="default-profile.jpg" alt="Foto Profil">
  <br>
  <button class="btn-change" onclick="document.getElementById('file-input').click()">Change Profile Picture</button>
  <input type="file" id="file-input" style="display:none" accept="image/*" onchange="changeProfilePicture(event)">
</div>

<script>
  function changeProfilePicture(event) {
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function(e) {
      const profilePic = document.getElementById('profile-picture');
      profilePic.src = e.target.result;
    };

    if (file) {
      reader.readAsDataURL(file);
    }
  }
</script>

</body>
</html>
