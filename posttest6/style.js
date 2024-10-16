const servicesForm = document.getElementById('servicesForm');
const output = document.getElementById('output');
const editToggle = document.getElementById('editToggle');
const submitOrder = document.getElementById('submitOrder');
const fileUpload = document.getElementById('fileupload'); 
let entries = [];
let editMode = false;

servicesForm.addEventListener('submit', function(event) {
    event.preventDefault();

    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const contactNumber = document.getElementById('contactNumber').value;
    const fileName = fileUpload.files[0] ? fileUpload.files[0].name : 'Tidak ada file diunggah';

    entries.push({ name, email, contactNumber, fileName });
    displayEntries();
    servicesForm.reset();
    fileUpload.value = ''; // Reset file input
});

function displayEntries() {
    output.innerHTML = 
        `<h2>Hasil Inputan:</h2>
        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <th style="padding: 10px; border: 1px solid #ccc; text-align: left;">No</th>
                <th style="padding: 10px; border: 1px solid #ccc; text-align: left;">Field</th>
                <th style="padding: 10px; border: 1px solid #ccc; text-align: left;">Nilai</th>
                <th style="padding: 10px; border: 1px solid #ccc; text-align: left;">Aksi</th>
            </tr>` + 
            entries.map((entry, index) => 
                `<tr>
                    <td style="padding: 10px; border: 1px solid #ccc;">${index + 1}</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Nama Lengkap</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">${entry.name} ${editMode ? '<button onclick="editEntry(' + index + ', \'name\')">✏️</button>' : ''}</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">${editMode ? `<button onclick="showDelete(${index})">❌</button>` : ''}</td>
                </tr>
                <tr>
                    <td></td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Email</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">${entry.email} ${editMode ? '<button onclick="editEntry(' + index + ', \'email\')">✏️</button>' : ''}</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Nomor Kontak</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">${entry.contactNumber} ${editMode ? '<button onclick="editEntry(' + index + ', \'contactNumber\')">✏️</button>' : ''}</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="padding: 10px; border: 1px solid #ccc;">File Upload</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">${entry.fileName} ${editMode ? '<button onclick="editEntry(' + index + ', \'fileName\')">✏️</button>' : ''}</td>
                    <td></td>
                </tr>`
            ).join('') + 
        `</table>`;
    
    output.style.display = 'block'; // Tampilkan output
    editToggle.style.display = 'block'; // Tampilkan tombol Edit
    submitOrder.style.display = 'block'; // Tampilkan tombol Submit
}

// Event listener untuk tombol edit
editToggle.addEventListener('click', function() {
    editMode = !editMode; // Toggle edit mode
    displayEntries();
});

function editEntry(index, field) {
    const entry = entries[index];
    let newValue;

    if (field === 'fileName') {
        alert('File tidak dapat diedit. Silakan hapus dan unggah ulang.');
        return;
    } else {
        newValue = prompt(`Edit ${field}:`, entry[field]);
    }

    if (newValue !== null) {
        entry[field] = newValue;
        displayEntries();
    }
}

function showDelete(index) {
    if (confirm("Apakah Anda yakin ingin menghapus entri ini?")) {
        deleteEntry(index);
    }
}

function deleteEntry(index) {
    entries.splice(index, 1);
    displayEntries();
}

submitOrder.addEventListener('click', function() {
    if (confirm("Apakah Anda yakin dengan pesanan ini?")) {
        // Logika untuk mengirim data ke server bisa ditambahkan di sini.
        alert('Pesanan berhasil dikirim!');
        entries = []; // Kosongkan entries
        output.style.display = 'none'; // Sembunyikan output
        editToggle.style.display = 'none'; // Sembunyikan tombol Edit
        submitOrder.style.display = 'none'; // Sembunyikan tombol Submit
    }
});

const slides = document.querySelectorAll('.bgservices .slide');
let currentSlide = 0;

function showSlide(index) {
    slides.forEach((slide, i) => {
        slide.style.opacity = i === index ? '1' : '0';
    });
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % slides.length;
    showSlide(currentSlide);
}

showSlide(currentSlide);
setInterval(nextSlide, 5000); // Ganti slide setiap 5 detik
