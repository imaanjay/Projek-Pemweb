<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db_connect.php'; // Pastikan file ini sudah ada dan terkoneksi ke database
    $email = trim($_POST['email']); // Membersihkan input
    $password = trim($_POST['password']);
    
    // Gunakan prepared statement untuk keamanan
    $stmt = $conn->prepare("SELECT id, password FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    // Periksa apakah email ada di database
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        // Verifikasi password
        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $id; // Simpan user ID ke session
            header("Location: index.php"); // Redirect ke webcafe.html
            exit; // Hentikan eksekusi setelah redirect
        } else {
            $error = "Password salah. Coba lagi.";
        }
    } else {
        $error = "Email tidak ditemukan.";
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - KopiKita</title>
  <style>
    /* Background */
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(135deg, #6f4e37, #d7ccc8);
      color: #4E342E;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    /* Login Container */
    .container {
      background: #ffffff;
      padding: 30px;
      border-radius: 12px;
      text-align: center;
      width: 360px; 
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    /* Heading */
    h1 {
      color: #6f4e37;
      font-size: 26px;
      font-weight: bold;
      margin-bottom: 20px;
    }

    /* Input group */
    .input-group {
      margin-bottom: 15px;
      text-align: left;
    }

    /* Label */
    label {
      display: block;
      font-weight: bold;
      color: #6f4e37;
      margin-bottom: 5px;
    }

    /* Input */
    input {
      width: calc(100% - 20px); 
      padding: 10px;
      border: 1px solid #d7ccc8;
      border-radius: 8px;
      background-color: #f9f9f9;
      color: #4E342E;
      font-size: 14px;
      transition: border-color 0.3s ease;
      box-sizing: border-box;
    }

    /* Fokus input */
    input:focus {
      border-color: #6f4e37;
      outline: none;
    }

    /* Tombol */
    .btn {
      background: #6f4e37;
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      width: 100%; 
      font-weight: bold;
      font-size: 16px;
      transition: background-color 0.3s ease;
      margin-top: 10px;
      box-sizing: border-box;
    }

    /* Hover tombol */
    .btn:hover {
      background-color: #8d6e63;
    }

    /* Teks redirect */
    .redirect-text {
      color: #6f4e37;
      font-size: 14px;
      margin-top: 15px;
    }

    /* Link redirect */
    .redirect-text a {
      color: #d7ccc8;
      font-weight: bold;
      text-decoration: none;
    }

    .redirect-text a:hover {
      text-decoration: underline;
    }

    /* Pesan error */
    .error {
      color: #e57373;
      margin-bottom: 10px;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>KopiKita</h1>
    <!-- Tampilkan pesan error jika ada -->
    <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
    <form method="POST">
      <div class="input-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Masukkan email" required>
      </div>
      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Masukkan password" required>
      </div>
      <button type="submit" class="btn">Login</button>
    </form>
    <p class="redirect-text">Belum punya akun? <a href="register.php">Daftar</a></p>
  </div>
</body>
</html>
