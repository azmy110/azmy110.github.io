<?php
require 'connect.php';  // Koneksi ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact_number = $_POST['contactNumber'];
    $resi_number = $_POST['resiNumber']; // Tambahkan inputan resi jika ada
    
    // Proses file upload
    if (isset($_FILES['paymentReceipt']) && $_FILES['paymentReceipt']['error'] == 0) {
        $file_name = $_FILES['paymentReceipt']['name'];
        $file_tmp = $_FILES['paymentReceipt']['tmp_name'];
        $file_destination = 'uploads/' . $file_name;  // Simpan file di folder uploads
        
        if (move_uploaded_file($file_tmp, $file_destination)) {
            // Proses pengisian tabel services
            $sql_services = "INSERT INTO services (name, email, contact_number) 
                             VALUES ('$name', '$email', '$contact_number')";
            
            if (mysqli_query($conn, $sql_services)) {
                $last_service_id = mysqli_insert_id($conn);  // Mendapatkan ID layanan yang baru saja dimasukkan
                
                // Proses pengisian tabel resi
                $sql_resi = "INSERT INTO resi (service_id, resi_number, file_name) 
                             VALUES ('$last_service_id', '$resi_number', '$file_name')";
                
                if (mysqli_query($conn, $sql_resi)) {
                    $success_message = "Data layanan dan resi berhasil disimpan!";
                } else {
                    $error_message = "Gagal menyimpan data resi: " . mysqli_error($conn);
                }
            } else {
                $error_message = "Gagal menyimpan data layanan: " . mysqli_error($conn);
            }
        } else {
            $error_message = "Gagal mengunggah file.";
        }
    } else {
        $error_message = "Harap unggah nota pembayaran.";
    }
}
?>
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
                </ul>
            </div>
        </div>
    </div>

    <div class="header">
        <div class="container">
            <div class="box">
                <h2>Hey There, Welcome to</h2>
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
            <div class="about-image"></div>
        </div>
    </section>

    <section id="services" class="services">
        <div class="bgservices">
            <div class="slide slide1"></div>
            <div class="slide slide2"></div>
            <div class="slide slide3"></div>
            <div class="slide slide4"></div>
        </div>
        <div class="gradient"></div>
        <div class="konten">
            <h1 class="title1">Layanan Kami</h1>
            <form id="servicesForm" action="submit.php" method="POST" enctype="multipart/form-data">
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
                <div class="form-group">
                    <label for="paymentReceipt">Upload Nota Pembayaran:</label>
                    <input type="file" id="fileupload" accept=".pdf, .jpg, .png" required>
                </div>
                <button type="submit" class="btn">Kirim</button>
            </form>
            <div id="output" class="output"></div>
            <button id="editToggle" class="edit-btn" style="display:none; border: 1px solid #0077B6; background: transparent; cursor: pointer; padding: 5px; border-radius: 5px;">Edit</button>
            <button id="submitOrder" class="submit-ord" style="display:none; border: 1px solid #0077B6; background: transparent; cursor: pointer; padding: 5px; border-radius: 5px;">Submit</button>
        </div>
    </section>

    <section id="works">
        <h2>Our Wedding Works</h2>
        <p class="quote">"I began to realize that the camera sees the world differently than the human eye and that sometimes those differences can make a photograph more powerful than what you actually observed." - Galen Rowell</p>
        
        <div class="portfolio-grid">
            <div class="portfolio-item">
            <a href="portfolio1.html">
                <div class="thumbnail" style="background-image: url('https://via.placeholder.com/250x150');"></div>
            </a>
            <p>Audi Marisa and Anthony | Jakarta</p>
            </div>
            <div class="portfolio-item">
            <a href="portfolio2.html">
                <div class="thumbnail" style="background-image: url('https://via.placeholder.com/250x150');"></div>
            </a>
            <p>Aulia and Irfan | Taman Kajoe Jakarta</p>
            </div>
            <div class="portfolio-item">
            <a href="portfolio3.html">
                <div class="thumbnail" style="background-image: url('https://via.placeholder.com/250x150');"></div>
            </a>
            <p>Dama and Kevin | The Sanctus Uluwatu Bali</p>
            </div>
            <div class="portfolio-item">
            <a href="portfolio4.html">
                <div class="thumbnail" style="background-image: url('https://via.placeholder.com/250x150');"></div>
            </a>
            <p>Desi and Yusuf | Lippo Kuningan Jakarta</p>
            </div>
            <div class="portfolio-item">
            <a href="portfolio5.html">
                <div class="thumbnail" style="background-image: url('https://via.placeholder.com/250x150');"></div>
            </a>
            <p>Feby and Fauzan | Sampoerna Jakarta</p>
            </div>
            <!-- Tambahkan lebih banyak item sesuai kebutuhan -->
        </div>
    </section>


    <script src="style.js"></script>
</body>

</html>
