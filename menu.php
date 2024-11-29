<?php
// Data statis untuk menu
$menuCategories = ['Semua', 'Kopi', 'Non-Kopi', 'Dessert'];
$menuItems = [
    [
        'name' => 'Cafe Latte',
        'description' => 'Nikmati Espresso lembut yang berpadu dengan steamed milk, memberikan pengalaman kopi yang creamy dan memanjakan.',
        'price' => 28000,
        'category' => 'Kopi',
        'image' => 'https://i.pinimg.com/474x/35/9f/c1/359fc15a59e47967f1e95305c7ae194e.jpg'
    ],
    [
        'name' => 'Cappuccino',
        'description' => 'Espresso pekat yang diselimuti foam susu tebal, menciptakan sensasi rasa yang harmonis dan kaya.',
        'price' => 17000,
        'category' => 'Kopi',
        'image' => 'https://i.pinimg.com/474x/aa/58/db/aa58db1f67f7a048ea74029c59bb6adb.jpg'
    ],
    [
        'name' => 'Americano',
        'description' => 'Espresso yang dicampur dengan air panas, memberikan rasa kopi yang kuat dan menyegarkan.',
        'price' => 15000,
        'category' => 'Kopi',
        'image' => 'https://i.pinimg.com/736x/cb/48/db/cb48db04009801523739569e0f33cfc3.jpg'
    ],
    [
        'name' => 'Thai Tea',
        'description' => 'Minuman teh susu khas Thailand yang creamy dan sedikit manis, sempurna untuk dinikmati kapan saja.',
        'price' => 16000,
        'category' => 'Non-Kopi',
        'image' => 'https://i.pinimg.com/474x/2a/74/7d/2a747d0502b31ca988ccbb4b8ac9af84.jpg'
    ],
    [
        'name' => 'Lemon Squash',
        'description' => 'Paduan air lemon segar yang memberikan sensasi menyegarkan dan ringan, cocok di hari yang panas.',
        'price' => 18000,
        'category' => 'Non-Kopi',
        'image' => 'https://i.pinimg.com/474x/d8/30/a2/d830a224c35824f383249ca68b35cacb.jpg'
    ],
    [
        'name' => 'Matcha',
        'description' => 'Nikmati matcha asli Jepang yang kaya rasa, berpadu dengan tekstur creamy yang menenangkan.',
        'price' => 20000,
        'category' => 'Non-Kopi',
        'image' => 'https://i.pinimg.com/474x/97/84/40/978440fe09d65d3d1c461e614bd150d5.jpg'
    ],
    [
        'name' => 'Strawberry MilkShake',
        'description' => 'Milkshake kental dengan rasa strawberry yang manis dan creamy, cocok untuk kamu yang suka yang manis-manis.',
        'price' => 23000,
        'category' => 'Non-Kopi',
        'image' => 'https://i.pinimg.com/474x/17/c3/b9/17c3b99dd8df04df5674e7619abcd807.jpg'
    ],
    [
        'name' => 'Vanilla MilkShake',
        'description' => 'Milkshake dengan rasa vanilla yang lembut dan memanjakan lidah, menghadirkan kenikmatan yang tiada duanya.',
        'price' => 22000,
        'category' => 'Non-Kopi',
        'image' => 'https://i.pinimg.com/474x/fe/7d/55/fe7d55e005af26588e58ee4b21b4806f.jpg'
    ],
    [
        'name' => 'Chocolate Brownie',
        'description' => 'Brownies cokelat lembut dengan taburan kacang yang memberikan tekstur kontras, sempurna untuk para pencinta cokelat.',
        'price' => 25000,
        'category' => 'Dessert',
        'image' => 'https://i.pinimg.com/474x/bb/16/00/bb1600ca1db254f511ee0c3773715df7.jpg'
    ],
    [
        'name' => 'American Pancake',
        'description' => 'Pancake khas Amerika yang empuk dan tebal, dengan sirup maple yang manis, memberikan sensasi sarapan yang memuaskan.',
        'price' => 30000,
        'category' => 'Dessert',
        'image' => 'https://i.pinimg.com/474x/6a/4b/f8/6a4bf8fa226bb9ea4832695b403f3ae2.jpg'
    ],
    [
        'name' => 'Burnt Cheesecake Brownies',
        'description' => 'Chesecake lumer dengan lapisan brownies yang fudgy, menghadirkan kombinasi manis dan gurih yang menggoda.',
        'price' => 45000,
        'category' => 'Dessert',
        'image' => 'https://i.pinimg.com/474x/2c/3b/ac/2c3baca047623f96c8d8ff1b150039af.jpg'
    ],
    [
        'name' => 'Lava Cakes',
        'description' => 'Chocolate lava cake yang lembut dengan coklat meleleh saat dipotong, menghadirkan sensasi kenikmatan tak terlupakan.',
        'price' => 30000,
        'category' => 'Dessert',
        'image' => 'https://i.pinimg.com/474x/01/63/eb/0163ebec866f5665dc136e16b9a6c61f.jpg'
    ],
    [
        'name' => 'Tiramisu Cake',
        'description' => 'Tiramisu yang lembut dan creamy dengan lapisan kopi yang khas, cocok untuk para penggemar kopi manis.',
        'price' => 35000,
        'category' => 'Dessert',
        'image' => 'https://i.pinimg.com/474x/b7/46/ee/b746ee2653c180da2c34f6cfb3df2570.jpg'
    ],
    [
        'name' => 'Cookie Butter Biscoff Brownies',
        'description' => 'Brownies fudgy yang dipadukan dengan selai biscoff, memberikan rasa manis dan gurih yang luar biasa.',
        'price' => 45000,
        'category' => 'Dessert',
        'image' => 'https://i.pinimg.com/474x/1f/6b/ca/1f6bca9e6746f4dd59b38d247a9c063e.jpg'
    ],
];

// Fungsi untuk filter menu berdasarkan kategori
function filterMenu($category, $items) {
    if ($category == 'Semua') {
        return $items;
    }
    return array_filter($items, function($item) use ($category) {
        return $item['category'] == $category;
    });
}

// Kategori yang aktif (default 'Semua')
$activeCategory = isset($_GET['category']) ? $_GET['category'] : 'Semua';
$filteredMenuItems = filterMenu($activeCategory, $menuItems);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Kopi Kita</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .menu-item img {
            transition: transform 0.3s ease;
            border-radius: 0.75rem; /* Sudut tumpul */
        }
        .menu-item:hover img {
            transform: scale(1.1); /* Efek zoom */
        }
        /* Pastikan ketinggian kotak menu seragam */
        .menu-item {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Navigasi -->
    <nav class="bg-[#6f4e37] fixed w-full z-50 shadow-md">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="text-2xl font-bold text-white">KOPI KITA</div>
            <div class="flex space-x-6 text-white">
                <a href="index.php" class="flex items-center hover:text-[#d4a484] transition">
                    <i class="fas fa-home mr-2"></i> Beranda
                </a>
                <a href="menu.php" class="flex items-center hover:text-[#d4a484] transition">
                    <i class="fas fa-coffee mr-2"></i> Menu
                </a>
                <a href="#orders" class="flex items-center hover:text-[#d4a484] transition">
                    <i class="fas fa-shopping-cart mr-2"></i> Pesanan Saya
                </a>
                <a href="#rewards" class="flex items-center hover:text-[#d4a484] transition">
                    <i class="fas fa-award mr-2"></i> Rewards
                </a>
                <a href="#keranjang" class="flex items-center hover:text-[#d4a484] transition">
                    <i class="fas fa-shopping-cart mr-2"></i> Keranjang
                 <span id="cart-count" class="bg-red-500 text-white text-xs rounded-full px-2 ml-2">0</span>
                </a>
                <a href="logout.php" class="flex items-center hover:text-[#d4a484] transition">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </a>
            </div>
        </div>
    </nav>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kopi Kita</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>


<!-- Menu Section -->
<div class="container mx-auto pt-24 px-4">
    <h1 class="text-4xl font-bold text-center mb-8">Menu Kopi Kita</h1>
    
    <!-- Kategori Menu -->
    <div class="flex justify-center mb-8 space-x-4">
        <?php foreach($menuCategories as $category): ?>
            <a href="?category=<?= urlencode($category) ?>" 
               class="px-4 py-2 rounded-full <?= $activeCategory == $category ? 'bg-[#6f4e37] text-white' : 'bg-white text-[#6f4e37] border border-[#6f4e37]' ?> hover:bg-[#6f4e37] hover:text-white transition">
                <?= $category ?>
            </a>
        <?php endforeach; ?>
    </div>

      <!-- Daftar Menu -->
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
    <?php foreach ($filteredMenuItems as $item): ?>
        <div class="menu-item bg-white rounded-lg p-4 shadow-md">
            <!-- Image -->
            <img src="<?= $item['image'] ?>" alt="<?= $item['name'] ?>" class="w-full h-48 object-cover rounded-lg mb-4">
            
            <!-- Item Info -->
            <h3 class="text-xl font-semibold text-[#6f4e37]"><?= $item['name'] ?></h3>
            <p class="text-sm text-gray-600 mb-4"><?= $item['description'] ?></p>
            <p class="text-lg font-bold text-[#6f4e37]">Rp <?= number_format($item['price'], 0, ',', '.') ?></p>
            
            <!-- Buttons (Add to Cart or Order Now) -->
            <div class="flex space-x-4 mt-4">
                <button class="px-4 py-2 bg-[#6f4e37] text-white rounded-full hover:bg-[#5b3e26] transition">Tambah Keranjang</button>
                <button class="px-4 py-2 bg-[#ff5a00] text-white rounded-full hover:bg-[#e14c00] transition">Pesan Sekarang</button>
            </div>
        </div>
    <?php endforeach; ?>
</div>



    <!-- Pop-up untuk pemberitahuan penambahan -->
    <div id="popup" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <p>Menu berhasil ditambahkan ke keranjang!</p>
            <button onclick="closePopup()" class="mt-4 bg-[#6f4e37] text-white p-2 rounded">Tutup</button>
        </div>
    </div>
</div>

<!-- JavaScript untuk mengelola keranjang -->
<script>
let cartCount = 0;  // Variabel untuk menghitung jumlah item di keranjang
let cartItems = [];  // Array untuk menyimpan item yang ditambahkan ke keranjang

// Ambil data keranjang dari localStorage saat halaman dimuat
const savedCartItems = JSON.parse(localStorage.getItem('cartItems'));
if (savedCartItems) {
    cartItems = savedCartItems;
    cartCount = cartItems.length;
    document.getElementById("cart-count").textContent = cartCount;
}

// Fungsi untuk menambah item ke keranjang
function addToCart(itemName, itemPrice) {
    cartCount++;  // Tambah jumlah item
    document.getElementById("cart-count").textContent = cartCount;  // Update jumlah item di navbar

    cartItems.push({ name: itemName, price: itemPrice });  // Menambahkan item ke dalam array cartItems

    // Simpan data keranjang ke localStorage
    localStorage.setItem('cartItems', JSON.stringify(cartItems));

    showPopup();  // Menampilkan pop-up
}

// Fungsi untuk menampilkan pop-up
function showPopup() {
    document.getElementById("popup").classList.remove("hidden");  // Menampilkan pop-up
}

// Fungsi untuk menutup pop-up
function closePopup() {
    document.getElementById("popup").classList.add("hidden");  // Menyembunyikan pop-up
}

// Fungsi untuk menampilkan item di halaman keranjang
function displayCartItems() {
    const cartContainer = document.getElementById("cart-items");
    cartContainer.innerHTML = '';  // Menghapus item lama

    cartItems.forEach(item => {
        const div = document.createElement('div');
        div.classList.add('cart-item');
        div.textContent = item.name + ' - Rp ' + item.price.toLocaleString('id-ID');  // Menampilkan nama dan harga dalam format IDR
        cartContainer.appendChild(div);
    });
}

// Menampilkan item di keranjang saat halaman "Keranjang" dimuat
window.onload = function() {
    displayCartItems();
};

// Fungsi untuk memesan sekarang (misalnya, ke halaman checkout)
function orderNow(itemName, itemPrice) {
    alert(`Anda memesan: ${itemName} dengan harga Rp ${itemPrice.toLocaleString('id-ID')}`);  // Ini contoh, ganti dengan proses pesanan nyata
}
</script>


    <!-- Footer -->
    <footer class="bg-[#6f4e37] text-white py-12 mt-16">
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
                    <a href="#" class="hover:text-[#d4a484]">
                        <i class="fab fa-instagram"></i> Instagram
                    </a>
                    <a href="#" class="hover:text-[#d4a484]">
                        <i class="fab fa-facebook"></i> Facebook
                    </a>
                    <a href="#" class="hover:text-[#d4a484]">
                        <i class="fab fa-twitter"></i> Twitter
                    </a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
