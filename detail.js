document.addEventListener('DOMContentLoaded', () => {
    // Data destinasi (nanti bisa diambil dari API)
    const destinations = {
        1: {
            title: "Curug Tujuh Cibolang",
            image: "../assets/images/best-destination/1.jpg",
            location: "Sandingtaman, Kec. Panjalu, Kabupaten Ciamis, Jawa Barat 46264",
            description: `Objek Wisata Curug Tujuh adalah wisata yang tidak boleh dilewatkan saat ke Kota Ciamis. Curug yang memiliki sejuta keindahan ini berada di tempat yang tersembunyi di balik pepohonan yang menjulang tinggi. Udara yang segar dengan suara jatuh membuat betah berlama-lama disana. Penduduk lokal-nya juga sangat ramah-ramah terhadap wisatawan lokal maupun wisatawan asing.

Sesuai dengan namanya curug ini memiliki 7 (tujuh) buah air terjun (curug) yang terkenal dan tidak berjatuhan letaknya. Bahkan curug 4 dan 5 lokasinya hanya terpisah kurang lebih 2 meter jaraknya, untuk dapat menikmati keindahan dari ketujuh air terjun tersebut adalah dengan cara mengikuti bukit, menelusuri jalan setapak mulai dari kaki ke puncak bukit dan sebalikali lagi.`
        },
        2: {
            title: "Situ Lengkong",
            image: "../assets/images/best-destination/2.jpg",
            location: "Panjalu, Kec. Panjalu, Kabupaten Ciamis, Jawa Barat",
            description: `Situ Lengkong merupakan suatu danau yang memiliki luas 57,95 Ha. Konon di kawasan Situ Lengkong dahulunya menjadi pusat pemerintahan Kerajaan Panjalu Ciamis. Terletak di sepanjang tepi utara Panjalu. Sekarang terdapat 3 buah nusa (pulau kecil). Masing-masing digunakan sebagai tempat bangunan istana kerajaan, kepatihan, dan staf kerajaan, juga sebagai taman rekreasi.

Situ Lengkong merupakan obyek wisata yang dikelola oleh pemerintah daerah Kabupaten Ciamis dengan mengedepankan wisata ziarah. Peziarah berbondong-bondong datang dari berbagai daerah di Indosesia untuk berziarah ke makam Prabu Hariang Kencana yang makamnya berada di tengah-tengah nusa. Selain berziarah, wisatawan yang datang ke Situ Lengkong juga bisa bermain kayak di Panjalu.`
        },
        3: {
            title: "Hutan Pinus Darmacaang",
            image: "../assets/images/best-destination/3.jpg",
            location: "P7PF+JC9, Darmacaang, Kec. Cikoneng, Kabupaten Ciamis, Jawa Barat 46261",
            description: `Hutan Pinus Darmacaang masuk dalam kawasan kaki Gunung Sawal, jadi udara disini pasti dingin dan sejuk. Disini bisa terlihat pemandangan dua kota sekaligus, yaitu Kota Tasikmalaya dan Kota Ciamis. Ada banyak aktivitas yang bisa dilakukan di Hutan Pinus Darmacaang, mulai dari berfoto, berkemah, hammocking, minum kopi, membuat suatu acara atau sekedar bersantai sambil menikmati makanan bahkan bisa dijadikan arena offroad yang sangat asik dan menantang loh. 
            Disana juga ada cafe yang bernama Kopinus, harga yang ditawarkan sangat affordable. Selain itu, banyak warung yang menjual nasi liwet lengkap dengan lauknya, cocok sekali disantap di bawah rindangnya pohon pinus sambil ditemani angin yang sejuk.`
        },
        4: {
            title: "Puncak Jamiaki",
            image: "../assets/images/best-destination/4.jpg",
            location: "Medanglayang, Kec. Panumbangan, Kabupaten Ciamis, Jawa Barat 46263",
            description: `uncak Jamiaki berada di ketinggian sekitar 1020 meter di atas permukaan laut itu mempunyai panorama indah saat siang hari, apalagi jika di malam hari wisatawan bisa melihat cahaya lampu perkotaan Ciamis dan Tasikmalaya dari atas.

Untuk menuju ke Puncak Jamiaki, harus menempuh jalur pendakian sekitar 1,5 km. Kondisi jalannya menanjak. Namun, semua rasa cape dan lelah setelah pendakian akan terbayar lunas dengan keindahan alamnya.

Salah satu yang istimewa di Puncak Jamiaki adalah pengelola telah menyediakan berbagai fasilitas, salah satunya adalah sumber air dan MCK. Meskipun begitu, fasilitas yang ada tidak menghalangi suasana alam bebas pegunungannya yang indah dan sejuk. Ada juga pedagang makanan dan tour guide yang bisa menemani bercamping ria serta dapat menjamin kebutuhan saat Camping di Puncak Jamiaki.`
        },
        5: {
            title: "Jahim Pass",
            image: "../assets/images/best-destination/5.jpg",
            location: "Puncak Jahim,, Jl. Cikijing-Panjalu, Cibeureum, Kec. Sukamantri, Kabupaten Ciamis, Jawa Barat",
            description: `Jahim Pass (Atraksi Wisata) terletak di Jawa Barat, Indonesia. Daerah atau landmark terdekat adalah Sukamantri. Alamat Jahim Pass adalah Puncak Jahim,, Jl. Cikijing-Panjalu, Cibeureum, Sukamantri, Kabupaten Ciamis, Jawa Barat 46264, Indonesia. 
            Jahim Pass memiliki cukup banyak tempat yang terdaftar di sekitarnya dan kami mencakup setidaknya 62 tempat di sekitarnya di Helpmecovid.com.`
        },
        6: {
            title: "Bukit Sampalan Asri",
            image: "../assets/images/best-destination/6.jpg",
            location: "Q67F+H5G, Sukamaju, Kec. Cihaurbeuti, Kabupaten Ciamis, Jawa Barat 46262",
            description: `Bukit Sampalan Asri merupakan tempat wisata alam yang memiliki panorama yang apik dan menarik, udaranya masih sangat segar, sehingga wisatawan dapat merasakan secara langsung nuansa keindahan alam Gunung Sawal. Disana juga terdapat spot foto, joglo, dan kolam anak-anak. Warga di daerah sana pun sangat ramah sekali kepada para wisatawan yang datang berkunjung.

Untuk sampai di Bukit Sampalan Asri, pengunjung harus jalan kaki sekitar kurang lebih 100 meter dari lokasi parkir kendaraan. Bagi para wisatawan yang hobi nge-camp bisa, Bukit Sampalan Asri cocok untuk dijadikan agenda liburan dengan melihat gemerlapnya lampu kota di malam hari.`
        },
        // Tambahkan destinasi lainnya jika perlu
    };

    // Ambil ID destinasi dari URL
    const urlParams = new URLSearchParams(window.location.search);
    const id = urlParams.get('id');

    // Tampilkan data destinasi jika ID valid
    if (id && destinations[id]) {
        const destination = destinations[id];

        // Set judul, gambar, dan deskripsi
        document.getElementById('destinationTitle').textContent = destination.title;
        document.getElementById('destinationImage').src = destination.image;
        document.getElementById('destinationDescription').textContent = destination.description;

        // Siapkan lokasi: teks + link Google Maps
        const locationElement = document.getElementById('destinationLocation');
        const locationText = destination.location;
        const encodedLocation = encodeURIComponent(locationText);

        // Isi elemen <a> dengan teks dan link ke Google Maps
        locationElement.innerHTML = `
            <a href="https://www.google.com/maps/search/?api=1&query=${encodedLocation}" 
               target="_blank" 
               style="color: #666; text-decoration: none;">
                <i class="fa-solid fa-location-dot"></i> ${locationText}
            </a>
        `;
    }
});
