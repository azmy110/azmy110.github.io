<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skyline Cinema & Photography</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="navbar">
        <div class="container">
            <div class="logo">
                <a id="darkModeToggle"><strong>SKYLINE</strong>Cinema & Photography</a>
            </div>
            <div class="nav-links">
                <ul>
                    <li><a href="#" class="">Home</a></li>
                    <li> <a href="#about" class="">About</a></li>
                    <li> <a href="#services" class="">Services</a></li>
                    <li> <a href="#works" class="">Works</a></li>
                    <li> <a href="#contact" class="">Contact</a></li>
            </div>

            </ul>
        </div>
    </div>

    <div class="header">
        <div class="container">
            <div class="box">
                <h2>Hey There, Welcome to</h4>
                    <h1>Skyline Cinema & Photography</h1>
                    <p>
                        We are photographer & videographer based on Samarinda, Capture any moment with us
                    </p>
                    <div class="btns">
                        <a href="#works" class="btn">Our Works</a>
                        <a href="#contact" class="btn">Contact Us</a>
                    </div>

            </div>
        </div>
    </div>

    <section id="about" class="about">
        <div class="container">
            <div class="box">
                <h1 class="title">
                    SKYLINE
                </h1>
                <p>
                    Kami hanya menggunakan peralatan dan teknik terbaru untuk memastikan setiap gambar yang diambil
                    berkualitas tinggi.
                </p>
                <ul>
                    <li>
                        <i class="fa fa-check"></i>
                        <span>Pengalaman kami, kepercayaan Anda.</span>
                    </li>
                    <li>
                        <i class="fa fa-check"></i>
                        <span>Tim profesional, hasil luar biasa.</span>
                    </li>
                    <li>
                        <i class="fa fa-check"></i>
                        <span>Komitmen kami, kepuasan Anda</span>
                    </li>
                </ul>
                <div class="signature">
                    <img src="./images/20231220_071223_0000.png" alt="" srcset="">
                    <div class="text">
                        <div class="name">Nandha Iskandar</div>
                        <div class="Job">Founder Skyline</div>
                    </div>
                </div>
            </div>
            <div class="about-image">
            </div>
        </div>

    </section>
    
    <section id="services" class="services">
    <div class="container">
        <h1 class="title">Layanan Kami</h1>
        <form id="servicesForm">
            <div class="form-group">
                <label for="name">Nama Lengkap:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="contactNumber">Nomor Kontak:</label>
                <input type="number" id="contactNumber" name="contactNumber" required>
            </div>
            <button type="submit" class="btn">Kirim</button>
        </form>
        <div id="output" class="output"></div>
    </div>
</section>

    <script src="style.js"></script>



</body>

</html>