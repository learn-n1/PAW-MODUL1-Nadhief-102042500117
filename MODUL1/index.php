<?php
$products = [
    [
        "name" => "Monitor 24 Inch",
        "category" => "Monitor",
        "price" => 2700000,
        "stock" => 4,
        "image" => "img/Monitor.jpg"
    ],
    [
        "name" => "Asus Vivobook 14 Flip",
        "category" => "Laptop",
        "price" => 20000000,
        "stock" => 3,
        "image" => "img/Vivobook.jpg"
    ],
    [
        "name" => "Mouse Wireless",
        "category" => "Aksesoris",
        "price" => 120000,
        "stock" => 12,
        "image" => "img/Mouse.jpg"
    ],
    [
        "name" => "Keyboard Mechanical",
        "category" => "Aksesoris",
        "price" => 350000,
        "stock" => 0,
        "image" => "img/Keyboard.jpg"
    ],
    [
        "name" => "Headset Gaming",
        "category" => "Audio",
        "price" => 1200000,
        "stock" => 5,
        "image" => "img/Headset.jpg"
    ],
    [
        "name" => "Webcam Full HD",
        "category" => "Aksesoris",
        "price" => 1450000,
        "stock" => 0,
        "image" => "img/Webcam.jpg"
    ]
];

$total_products = count($products);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DNA Store - Tech Store</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <div class="container navbar">
            <div class="logo">DNA STORE</div>
            <nav>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#products">Products</a></li>
                    <li><a href="#about">About</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="home" class="hero-section">
        <div class="container">
            <div class="hero-card">
                <span class="hero-tag">DNA STORE</span>
                <h1>All you need, Starts right here!</h1>
                <p>Temukan berbagai perangkat dan aksesoris teknologi untuk kebutuhanmu.</p>
                <a href="#products" class="btn-hero">Lihat Produk</a>
            </div>
        </div>
    </section>

    <main id="products" class="container main-content">
        <div class="section-header">
            <div>
                <span class="sub-title">OUR PRODUCTS</span>
                <h2>Katalog Produk</h2>
            </div>
            <div class="product-count">
                Total Produk: <strong><?php echo $total_products; ?></strong>
            </div>
        </div>

        <div class="product-grid">
            <?php foreach ($products as $item): ?>
                <?php
                $original_price = $item['price'];
                $has_discount = $original_price >= 1000000;
                $final_price = $has_discount ? $original_price * 0.9 : $original_price;

                $is_available = $item['stock'] > 0;
                ?>

                <article class="product-card">
                    <?php if ($has_discount): ?>
                        <span class="badge-discount">DISKON 10%</span>
                    <?php endif; ?>

                    <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>">
                    
                    <div class="product-info">
                        <span class="category"><?php echo $item['category']; ?></span>
                        <h3 class="product-name"><?php echo $item['name']; ?></h3>

                        <div class="price-container">
                            <?php if ($has_discount): ?>
                                <span class="old-price">Rp<?php echo number_format($original_price, 0, ',', '.'); ?></span>
                                <span class="final-price">Rp<?php echo number_format($final_price, 0, ',', '.'); ?></span>
                            <?php else: ?>
                                <span class="final-price">Rp<?php echo number_format($original_price, 0, ',', '.'); ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="stock-status">
                            <span>Stok: <?php echo $item['stock']; ?></span>
                            <?php if ($is_available): ?>
                                <span class="status-badge available">Tersedia</span>
                            <?php else: ?>
                                <span class="status-badge out-of-stock">Stok Habis</span>
                            <?php endif; ?>
                        </div>

                        <div class="card-action">
                            <?php if ($is_available): ?>
                                <button class="btn-buy">Beli Sekarang</button>
                            <?php else: ?>
                                <button class="btn-buy disabled" disabled>Stok Habis</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </main>

    <footer>
        <div class="container footer-content">
            <p>&copy; <?php echo date('Y'); ?> DNA Store. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>