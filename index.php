<?php include 'config/database.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>EllateCreamy</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins', sans-serif;
        }

        body{
            background:#f8f5f1;
            overflow-x:hidden;
        }

        html{
            scroll-behavior:smooth;
        }

        /* NAVBAR */
        .navbar{
            background:rgba(0,0,0,0.7);
            backdrop-filter:blur(10px);
            padding:20px 0;
        }

        .navbar-brand{
            color:white !important;
            font-size:32px;
            font-weight:700;
        }

        .nav-link{
            color:white !important;
            margin-left:20px;
            transition:0.3s;
        }

        .nav-link:hover{
            color:#d4a373 !important;
        }

        /* HERO */
        .hero{
            height:100vh;
            background:
            linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),
            url('https://images.unsplash.com/photo-1509042239860-f550ce710b93?q=80&w=1974&auto=format&fit=crop');
            background-size:cover;
            background-position:center;
            display:flex;
            align-items:center;
            color:white;
        }

        .hero h1{
            font-size:85px;
            font-weight:700;
        }

        .hero p{
            font-size:20px;
            margin-top:20px;
            color:#eee;
            line-height:1.6;
            font-weight:300;
        }

        .hero-btn{
            margin-top:30px;
        }

        .btn-menu{
            background:#d4a373;
            color:white;
            padding:15px 35px;
            border-radius:15px;
            text-decoration:none;
            margin-right:15px;
            transition:0.3s;
        }

        .btn-menu:hover{
            background:#b08968;
        }

        .btn-about{
            border:1px solid white;
            color:white;
            padding:15px 35px;
            border-radius:15px;
            text-decoration:none;
            transition:0.3s;
        }

        .btn-about:hover{
            background:white;
            color:black;
        }

        /* MENU */
        .menu-section{
            padding:100px 0;
        }

        .section-title{
            text-align:center;
            margin-bottom:50px;
        }

        .section-title h2{
            font-size:60px;
            font-weight:700;
            color:#3b2a22;
        }

        .menu-card{
            background:white;
            border-radius:25px;
            overflow:hidden;
            transition:0.4s;
            box-shadow:0 5px 20px rgba(0,0,0,0.1);
        }

        .menu-card:hover{
            transform:translateY(-10px);
        }

        .menu-card img{
            width:100%;
            height:250px;
            object-fit:cover;
        }

        .menu-content{
            padding:20px;
        }

        .menu-content h4{
            font-weight:600;
            color:#3b2a22;
        }

        .price{
            color:#d4a373;
            font-size:22px;
            font-weight:700;
        }

        .btn-cart{
            background:#3b2a22;
            color:white;
            border:none;
            width:100%;
            padding:12px;
            border-radius:15px;
            transition:0.3s;
        }

        .btn-cart:hover{
            background:#d4a373;
        }

        /* PROMO */
        .promo{
            background:#efe6dc;
            border-radius:30px;
            padding:50px;
            margin-top:80px;
        }

        .promo h2{
            color:#3b2a22;
            font-weight:700;
        }

        .promo-btn{
            background:#3b2a22;
            color:white;
            padding:15px 35px;
            border-radius:15px;
            text-decoration:none;
        }

        /* FOOTER */
        footer{
            background:#2b1d17;
            color:white;
            padding:80px 0 30px;
            margin-top:100px;
        }

        footer h3{
            margin-bottom:20px;
        }

        footer p{
            color:#ccc;
        }

        .social i{
            margin-right:15px;
            font-size:22px;
            cursor:pointer;
            transition:0.3s;
        }

        .social i:hover{
            color:#d4a373;
        }

        .copyright{
            text-align:center;
            margin-top:50px;
            color:#aaa;
        }

        /* RESPONSIVE */
        @media(max-width:768px){
            .hero h1{
                font-size:50px;
            }

            .section-title h2{
                font-size:40px;
            }
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            EllateCreamy ☕
        </a>

        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#menu">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<section class="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <h1>EllateCreamy</h1>
                <p>Sentuhan <b>creamy</b> di setiap cangkir, estetika di setiap sudut. Nikmati harmoni kopi premium kami untuk menemani setiap cerita dan produktivitas harimu. ☕✨</p>
                <div class="hero-btn">
                    <a href="#menu" class="btn-menu">Explore Menu</a>
                    <a href="#" class="btn-about">About Us</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="menu-section" id="menu">
    <div class="container">
        <div class="section-title">
            <h2>Our Coffee & Dessert Menu</h2>
            <p>Creamy coffee and sweet treats for your best mood ✨</p>
        </div>

        <div class="row g-4">
        <?php
        $menus = [
            [
                "id" => 1,
                "name" => "Caramel Latte",
                "price" => "28000",
                "image" => "https://images.unsplash.com/photo-1461023058943-07fcbe16d735?q=80&w=1974&auto=format&fit=crop",
                "desc" => "Creamy premium coffee with aesthetic taste ☕"
            ],
            [
                "id" => 2,
                "name" => "Cappuccino",
                "price" => "25000",
                "image" => "https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=1974&auto=format&fit=crop",
                "desc" => "Creamy premium coffee with aesthetic taste ☕"
            ],
            [
                "id" => 3,
                "name" => "Vanilla Latte",
                "price" => "27000",
                "image" => "https://images.unsplash.com/photo-1517701604599-bb29b565090c?q=80&w=1974&auto=format&fit=crop",
                "desc" => "Creamy premium coffee with aesthetic taste ☕"
            ],
            [
                "id" => 4,
                "name" => "Mocha Coffee",
                "price" => "30000",
                "image" => "https://images.unsplash.com/photo-1509042239860-f550ce710b93?q=80&w=1974&auto=format&fit=crop",
                "desc" => "Creamy premium coffee with aesthetic taste ☕"
            ],
            [
                "id" => 5,
                "name" => "Americano",
                "price" => "22000",
                "image" => "https://images.unsplash.com/photo-1494314671902-399b18174975?q=80&w=1974&auto=format&fit=crop",
                "desc" => "Creamy premium coffee with aesthetic taste ☕"
            ],
            [
                "id" => 6,
                "name" => "Hazelnut Latte",
                "price" => "32000",
                "image" => "https://images.unsplash.com/photo-1485808191679-5f86510681a2?q=80&w=1974&auto=format&fit=crop",
                "desc" => "Creamy premium coffee with aesthetic taste ☕"
            ],
            [
                "id" => 7,
                "name" => "Matcha Latte",
                "price" => "29000",
                "image" => "https://images.unsplash.com/photo-1515823064-d6e0c04616a7?q=80&w=1974&auto=format&fit=crop",
                "desc" => "Creamy premium coffee with aesthetic taste ☕"
            ],
            [
                "id" => 8,
                "name" => "Affogato",
                "price" => "35000",
                "image" => "https://images.unsplash.com/photo-1512568400610-62da28bc8a13?q=80&w=1974&auto=format&fit=crop",
                "desc" => "Creamy premium coffee with aesthetic taste ☕"
            ],
            [
                "id" => 9,
                "name" => "Butterscotch Latte",
                "price" => "33000",
                "image" => "https://images.unsplash.com/photo-1511920170033-f8396924c348?q=80&w=1974&auto=format&fit=crop",
                "desc" => "Creamy premium coffee with aesthetic taste ☕"
            ],
            [
                "id" => 10,
                "name" => "Chocolate Cream",
                "price" => "31000",
                "image" => "https://images.unsplash.com/photo-1464306076886-da185f6a9d05?q=80&w=1974&auto=format&fit=crop",
                "desc" => "Creamy premium coffee with aesthetic taste ☕"
            ],
            /* TAMBAHAN MENU DESSERT */
            [
                "id" => 11,
                "name" => "Butter Croissant",
                "price" => "25000",
                "image" => "https://images.unsplash.com/photo-1555507036-ab1f4038808a?q=80&w=1926&auto=format&fit=crop",
                "desc" => "Flaky, buttery, and perfectly baked golden pastry 🥐"
            ],
            [
                "id" => 12,
                "name" => "Classic Tiramisu",
                "price" => "38000",
                "image" => "https://images.unsplash.com/photo-1571877227200-a0d98ea607e9?q=80&w=1974&auto=format&fit=crop",
                "desc" => "Layers of espresso-soaked ladyfingers and creamy mascarpone 🍰"
            ],
            [
                "id" => 13,
                "name" => "Strawberry Cheesecake",
                "price" => "40000",
                "image" => "https://images.unsplash.com/photo-1533134242443-d4fd215305ad?q=80&w=1974&auto=format&fit=crop",
                "desc" => "Rich and creamy cheesecake topped with sweet strawberry glaze 🍓"
            ]
        ];

        foreach($menus as $menu){
        ?>
        <div class="col-md-6 col-lg-4">
            <div class="menu-card">
                <img src="<?php echo $menu['image']; ?>">
                <div class="menu-content">
                    <h4><?php echo $menu['name']; ?></h4>
                    <p><?php echo $menu['desc']; ?></p>
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="price">
                            Rp <?php echo number_format($menu['price']); ?>
                        </div>
                    </div>

                    <a href="detail.php?id=<?php echo $menu['id']; ?>" class="btn-cart mt-3 d-block text-center text-decoration-none">
                        <i class="fa-solid fa-cart-shopping"></i> Add To Cart
                    </a>
                </div>
            </div>
        </div>
        <?php } ?>
        </div>

        <div class="promo">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h2>Coffee Makes Everything Better ☕</h2>
                    <p>Nikmati kopi terbaik dengan rasa premium dan suasana cozy khas EllateCreamy ✨</p>
                </div>
                <div class="col-lg-4 text-end">
                    <a href="#menu" class="promo-btn">Order Now</a>
                </div>
            </div>
        </div>
    </div>
</section>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h3>EllateCreamy ☕</h3>
                <p>Coffee shop aesthetic untuk menemani harimu dengan kopi creamy premium ✨</p>
                <div class="social">
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-facebook"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-tiktok"></i>
                </div>
            </div>

            <div class="col-lg-4">
                <h3>Menu</h3>
                <p>Coffee</p>
                <p>Non Coffee</p>
                <p>Dessert</p>
                <p>Signature</p>
            </div>

            <div class="col-lg-4">
                <h3>Contact</h3>
                <p>📍 Jakarta, Indonesia</p>
                <p>📞 0812-3456-7890</p>
                <p>✉ eca@ellatecreamy.com</p>
            </div>
        </div>

        <div class="copyright">
            © 2026 EllateCreamy. All Rights Reserved.
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>