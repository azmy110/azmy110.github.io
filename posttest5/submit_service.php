<?php
include 'database.php'; // Memasukkan file koneksi database

// Mendapatkan data dari permintaan POST
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['name'], $data['email'], $data['contactNumber'])) {
    $name = $conn->real_escape_string($data['name']);
    $email = $conn->real_escape_string($data['email']);
    $contactNumber = $conn->real_escape_string($data['contactNumber']);

    // Menyimpan data ke dalam tabel
    $sql = "INSERT INTO services (name, email, contact_number) VALUES ('$name', '$email', '$contactNumber')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => $conn->error]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Data tidak lengkap']);
}

$conn->close();
?>
