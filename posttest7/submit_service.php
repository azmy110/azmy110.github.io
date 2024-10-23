<?php
include 'koneksi.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mendapatkan data dari form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact_number = $_POST['contactNumber'];
    $isSubmit = $_POST['isSubmit'] ?? 'false'; // Memeriksa jika tombol Submit ditekan

    // Jika tombol Submit ditekan
    if ($isSubmit === 'true') {
        // Menyimpan data ke tabel services
        $stmt = $conn->prepare("INSERT INTO services (name, email, contact_number) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $contact_number);

        if ($stmt->execute()) {
            $service_id = $stmt->insert_id;

            // Proses upload file
            if (isset($_FILES['fileupload']) && $_FILES['fileupload']['error'] == 0) {
                $upload_dir = __DIR__ . '/resi/';
                $file_name = basename($_FILES['fileupload']['name']);
                $target_file = $upload_dir . $file_name;

                // Buat folder jika belum ada
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }

                if (move_uploaded_file($_FILES['fileupload']['tmp_name'], $target_file)) {
                    // Simpan path file ke tabel resi
                    $stmt = $conn->prepare("INSERT INTO resi (service_id, file_path) VALUES (?, ?)");
                    $stmt->bind_param("is", $service_id, $target_file);
                    $stmt->execute();
                }
            }

            echo json_encode(['status' => 'success', 'message' => 'Data dan file berhasil disimpan!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Gagal menyimpan data.']);
        }

        $stmt->close();
    } else {
        // Jika hanya untuk menampilkan preview, tidak ada proses penyimpanan
        echo json_encode(['status' => 'preview', 'data' => ['name' => $name, 'email' => $email, 'contact_number' => $contact_number]]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Metode request tidak valid.']);
}

$conn->close();
?>
