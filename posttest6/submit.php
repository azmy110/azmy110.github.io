<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'servicesdb');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data dari form
$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];

// Query untuk memasukkan data ke tabel services
$sql = "INSERT INTO services (name, email, contact_number) VALUES ('$name', '$email', '$contact')";
if ($conn->query($sql) === TRUE) {
    // Ambil ID dari service yang baru diinsert
    $service_id = $conn->insert_id;

    // Proses upload file
    $target_dir = "/Applications/XAMPP/xamppfiles/htdocs/posttest6/resi/";
    $file_name = basename($_FILES["fileupload"]["name"]);
    $target_file = $target_dir . $file_name;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Cek apakah file benar-benar gambar
    $check = getimagesize($_FILES["fileupload"]["tmp_name"]);
    if($check !== false) {
        if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file)) {
            // Simpan path file ke tabel resi
            $sql_resi = "INSERT INTO resi (id_service, file_path) VALUES ('$service_id', '$target_file')";
            if ($conn->query($sql_resi) === TRUE) {
                echo "Data dan file berhasil diupload!";
            } else {
                echo "Error: " . $sql_resi . "<br>" . $conn->error;
            }
        } else {
            echo "Terjadi kesalahan saat mengupload file.";
        }
    } else {
        echo "File yang diupload bukan gambar.";
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
