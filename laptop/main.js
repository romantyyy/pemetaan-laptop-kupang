// Inisialisasi Peta
const map = L.map('map').setView([-10.1749407,123.5323165], 13);

// Tambahkan Tile Layer
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
}).addTo(map);

// Fungsi untuk memuat data polygon
function fetchAndDisplayInitialData() {
    const urls = ['admin/upload/polygon1.js'];

    urls.forEach(url => {
        // Muat file JavaScript secara dinamis
        const script = document.createElement('script');
        script.src = url;
        script.onload = () => {
            if (typeof polygonData !== 'undefined') {
                // Tampilkan polygon di peta
                const polygon = L.polygon(polygonData, { color: 'red' }).addTo(map);
                map.fitBounds(polygon.getBounds());
            } else {
                console.error('Polygon data not defined in ' + url);
            }
        };
        script.onerror = () => {
            console.error('Failed to load script: ' + url);
        };
        document.body.appendChild(script);
    });
}

// Panggil fungsi untuk memuat dan menampilkan polygon
fetchAndDisplayInitialData();
