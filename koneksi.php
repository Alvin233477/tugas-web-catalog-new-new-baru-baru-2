<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "cihuy";

$koneksi = mysqli_connect($host, $user, $pass, $db);




// Jika tombol submit ditekan
$hasil = "";
if (isset($_POST["nama_barang"])) {

    // Ambil input
    $input = mysqli_real_escape_string($koneksi, $_POST["nama_barang"]);

    // Query pencarian
    $query = "SELECT nama_produk, harga FROM produk WHERE nama_produk = '$input'";
    $result = mysqli_query($koneksi, $query);

    // Menyimpan hasil untuk ditampilkan di bawah
    $hasil = $result;
}
?>

<form method="post">
    <input type="text" name="nama_barang" placeholder="Masukkan nama barang">
    <br>
    <button type="submit">Cari</button>
</form>

<br><br>

<?php
// Tampilkan hasil jika ada
if (!empty($hasil)) {

    if (mysqli_num_rows($hasil) > 0) {
        while ($row = mysqli_fetch_assoc($hasil)) {
            echo "Produk <b>" . $row['nama_produk'] . "</b> memiliki harga <b>" . $row['harga'] . "</b><br>";
        }
    } else {
        echo "Produk tidak ditemukan.";
    }
}
?>
