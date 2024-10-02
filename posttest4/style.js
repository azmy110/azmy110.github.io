const darkModeToggle = document.getElementById('darkModeToggle');
darkModeToggle.addEventListener('click', function() {
    document.body.classList.toggle('dark-mode');
});

const servicesForm = document.getElementById('servicesForm');
const output = document.getElementById('output');

servicesForm.addEventListener('submit', function(event) {
    event.preventDefault();
    
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const contactNumber = document.getElementById('contactNumber').value;

    output.innerHTML = `
        <h2>Hasil Inputan:</h2>
        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <th style="padding: 10px; border: 1px solid #ccc; text-align: left;">Field</th>
                <th style="padding: 10px; border: 1px solid #ccc; text-align: left;">Nilai</th>
            </tr>
            <tr>
                <td style="padding: 10px; border: 1px solid #ccc;">Nama Lengkap</td>
                <td style="padding: 10px; border: 1px solid #ccc;">${name}</td>
            </tr>
            <tr>
                <td style="padding: 10px; border: 1px solid #ccc;">Email</td>
                <td style="padding: 10px; border: 1px solid #ccc;">${email}</td>
            </tr>
            <tr>
                <td style="padding: 10px; border: 1px solid #ccc;">Nomor Kontak</td>
                <td style="padding: 10px; border: 1px solid #ccc;">${contactNumber}</td>
            </tr>
        </table>
    `;
    output.style.display = 'block'; // Tampilkan output
});
