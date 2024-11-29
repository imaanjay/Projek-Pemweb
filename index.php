<?php
session_start();


// Data statis untuk menu
$menuCategories = ['Semua', 'Kopi', 'Non-Kopi', 'Dessert'];
$menuItems = [
    [
        'name' => 'Cafe Latte',
        'description' => 'Espresso dengan steamed milk yang lembut',
        'price' => 28000,
        'image' => 'https://via.placeholder.com/400x300'
    ],
    [
        'name' => 'Cappuccino',
        'description' => 'Espresso dengan foam susu yang tebal',
        'price' => 17000,
        'image' => 'https://via.placeholder.com/400x300'
    ],
    [
        'name' => 'Thai Tea',
        'description' => 'Teh susu dari Thailand yang creamy',
        'price' => 16000,
        'image' => 'https://via.placeholder.com/400x300'
    ]
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kopi Kita</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-[#f4f1de] text-[#3d405b]">
    <!-- Navigasi -->
    <nav class="bg-[#6f4e37] fixed w-full z-50 shadow-md">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <div class="text-2xl font-bold text-white">KOPI KITA</div>
        <div class="flex space-x-6 text-white">
            <a href="#home" class="flex items-center hover:text-[#d4a484] transition">
                <i class="fas fa-home mr-2"></i> Beranda
            </a>
            <a href="<?php echo isset($_SESSION['user_id']) ? 'menu.php' : 'login.php'; ?>" class="flex items-center hover:text-[#d4a484] transition">
                <i class="fas fa-coffee mr-2"></i> Menu
            </a>
            </a>
            <a href="<?php echo isset($_SESSION['user_id']) ? 'order.php' : 'login.php'; ?>" class="flex items-center hover:text-[#d4a484] transition">
                <i class="fas fa-shopping-cart mr-2"></i> Pesanan
            </a>

            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="logout.php" class="flex items-center hover:text-[#d4a484] transition">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </a>
            <?php else: ?>
                <a href="login.php" class="flex items-center hover:text-[#d4a484] transition">
                    <i class="fas fa-sign-in-alt mr-2"></i> Login
                </a>
            <?php endif; ?>
        </div>
    </div>
</nav>


<!-- Hero Section -->
<header class="h-screen bg-center flex items-center justify-center relative"
    style="background: linear-gradient(rgba(62, 39, 35, 0.8), rgba(62, 39, 35, 0.8)),
            url('path/to/your/cafe-image.jpg');
            background-size: cover;
            background-position: center;">
    <!-- Overlay untuk teks agar lebih terbaca -->
    <div class="absolute inset-0 bg-black opacity-50"></div>
    
    <div class="relative z-10 text-center text-white p-10 md:p-20 rounded-xl bg-opacity-60 backdrop-blur-md" id="welcome-text">
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold text-shadow-lg mb-6" id="welcome-heading">
            Selamat Datang di Kopi Kita
        </h1>
        <p class="text-lg sm:text-xl md:text-2xl mb-8">
            Nikmati kemudahan memesan dan pembayaran digital melalui perangkat anda
        </p>
            <!-- Tombol untuk mengarahkan ke register.php -->
            <a href="<?php echo isset($_SESSION['user_id']) ? 'menu.php' : 'register.php'; ?>" 
   class="bg-[#6F4E37] text-white px-8 py-4 rounded-full shadow-lg hover:bg-[#D4A484] transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-2xl">
    Mulai Pesan
</a>
<script>
    const startBtn = document.getElementById('start-btn');
    const welcomeText = document.getElementById('welcome-text');

    startBtn.addEventListener('click', (e) => {
        e.preventDefault(); 

        // Cek apakah pengguna sudah login
        <?php
        // Menggunakan PHP untuk mengecek session login
        if (isset($_SESSION['user_id'])) {
            // Jika sudah login, arahkan ke menu
            echo "window.location.href = 'menu.php';";
        } else {
            // Jika belum login, arahkan ke register
            echo "window.location.href = 'register.php';";
        }
        ?>
    });
</script>
       
        </a>
    </div>
</header>

<!-- Fitur Unggulan -->
<section class="bg-[#e2d6c1] py-20 px-6 md:px-16">
    <div class="container mx-auto text-center">
        <h2 class="text-4xl font-bold mb-12 text-[#6F4E37]">Kenapa Harus Kopi Kita?</h2>
        <div class="grid md:grid-cols-3 gap-10">
            <div class="feature-card bg-white p-8 rounded-xl shadow-md transform transition duration-300 hover:scale-105 hover:shadow-lg">
                <i class="fas fa-coffee text-[#6F4E37] text-5xl mb-6"></i>
                <h3 class="text-2xl font-semibold mb-4 text-[#6F4E37]">Kopi yang Selalu Menggoda</h3>
                <p class="text-gray-600">Rasakan kenikmatan kopi berkualitas setiap tegukan!</p>
            </div>
            <div class="feature-card bg-white p-8 rounded-xl shadow-md transform transition duration-300 hover:scale-105 hover:shadow-lg">
                <i class="fas fa-map-marker-alt text-[#6F4E37] text-5xl mb-6"></i>
                <h3 class="text-2xl font-semibold mb-4 text-[#6F4E37]">Lokasi Strategis & Nyaman</h3>
                <p class="text-gray-600">Kami hadir di tempat yang mudah dijangkau, nyaman untuk bersantai atau bekerja.</p>
            </div>
            <div class="feature-card bg-white p-8 rounded-xl shadow-md transform transition duration-300 hover:scale-105 hover:shadow-lg">
                <i class="fas fa-clock text-[#6F4E37] text-5xl mb-6"></i>
                <h3 class="text-2xl font-semibold mb-4 text-[#6F4E37]">Waktu yang Fleksibel</h3>
                <p class="text-gray-600">Kami buka lebih lama, sehingga Anda bisa menikmati kopi kapan saja.</p>
            </div>
        </div>
    </div>
</section>

<!-- Pembatas -->
<div class="w-full bg-[#d4a484] my-16"></div>

<!-- Testimoni -->
<section class="bg-[#e2d6c1] py-16 px-6 md:px-16">
    <div class="container mx-auto text-center">
        <h2 class="text-4xl font-bold mb-12 text-[#6F4E37]">Apa Kata Mereka?</h2>
        <div class="grid md:grid-cols-3 gap-10">
            <div class="testimony-card bg-white p-8 rounded-xl shadow-md transform transition duration-300 hover:scale-105 hover:shadow-lg">
                <i class="fas fa-star text-yellow-500 text-4xl mb-6"></i>
                <p class="mb-6 italic">"Kopi yang luar biasa! Setiap hari saya ketagihan!"</p>
                <h4 class="font-semibold text-[#6F4E37]">- Budi Santoso</h4>
            </div>
            <div class="testimony-card bg-white p-8 rounded-xl shadow-md transform transition duration-300 hover:scale-105 hover:shadow-lg">
                <i class="fas fa-star text-yellow-500 text-4xl mb-6"></i>
                <p class="mb-6 italic">"Pelayanan cepat dan ramah, sangat nyaman untuk nongkrong lama!"</p>
                <h4 class="font-semibold text-[#6F4E37]">- Maria Kusuma</h4>
            </div>
            <div class="testimony-card bg-white p-8 rounded-xl shadow-md transform transition duration-300 hover:scale-105 hover:shadow-lg">
                <i class="fas fa-star text-yellow-500 text-4xl mb-6"></i>
                <p class="mb-6 italic">"Program rewards-nya keren! Dapat kopi gratis setelah beberapa kunjungan!"</p>
                <h4 class="font-semibold text-[#6F4E37]">- Ahmad Rifai</h4>
            </div>
        </div>
    </div>
</section>

    <!-- Footer -->
    <footer class="bg-[#6f4e37] text-white py-12 ">
        <div class="container mx-auto grid md:grid-cols-3 gap-8 text-center">
            <div>
                <h3 class="text-xl font-bold mb-4">Kontak</h3>
                <p>Email: info@kopikita.com</p>
                <p>Telepon: (021) 123-4567</p>
            </div>
            <div>
                <h3 class="text-xl font-bold mb-4">Jam Buka</h3>
                <p>Senin - Jumat: 07:00 - 22:00</p>
                <p>Sabtu - Minggu: 08:00 - 23:00</p>
            </div>
            <div>
            <h3 class="text-xl font-bold mb-4">Media Sosial</h3>
        <div class="flex justify-center space-x-4">
             <a href="https://www.instagram.com/imazinesyen/" class="hover:text-[#d4a484]">
                <i class="fab fa-instagram"></i> Instagram
        </a>
             <a href="https://www.facebook.com/CristianoRonaldo/" class="hover:text-[#d4a484]">
                <i class="fab fa-facebook"></i> Facebook
        </a>
            <a href="https://twitter.com/mfs_ub" class="hover:text-[#d4a484]">
                <i class="fab fa-twitter"></i> Twitter
        </a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
