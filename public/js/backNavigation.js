document.addEventListener('DOMContentLoaded', function() {
    // Fungsi untuk menyimpan halaman asal
    function saveOrigin() {
        localStorage.setItem('originPage', window.location.pathname + window.location.search);
    }

    // Fungsi untuk kembali ke halaman asal
    function goBack() {
        var originPage = localStorage.getItem('originPage');
        if (originPage) {
            window.location.href = originPage;
        } else {
            // Fallback jika tidak ada halaman asal yang tersimpan
            window.history.back();
        }
    }

    // Tambahkan event listener ke semua link yang menuju ke halaman detail buku
    var detailLinks = document.querySelectorAll('.book-detail-link');
    detailLinks.forEach(function(link) {
        link.addEventListener('click', saveOrigin);
    });

    // Tambahkan event listener ke tombol kembali di halaman detail
    var backButton = document.getElementById('backButton');
    if (backButton) {
        backButton.addEventListener('click', function(e) {
            e.preventDefault();
            goBack();
        });
    }
});