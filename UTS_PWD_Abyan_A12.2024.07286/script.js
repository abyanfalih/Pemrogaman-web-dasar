// Menjalankan skrip setelah semua elemen HTML dimuat
document.addEventListener('DOMContentLoaded', function() {

    // 1. Ambil elemen tombol
    const tombol = document.getElementById('pesanButton');
    
    // Variabel untuk nama (sesuai di HTML)
    const namaAnda = "Abyan Falih";

    // 2. Tambahkan event listener untuk 'click'
    tombol.addEventListener('click', function() {
        
        // Fitur 1: Tampilkan alert
        alert('Halo, ' + namaAnda + '! Selamat mengerjakan UTS.');
        
        // Fitur 2: Ubah warna latar saat tombol ditekan
        document.body.style.backgroundColor = '#e6f7ff'; // Warna biru muda
    });

});