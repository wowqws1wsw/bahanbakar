<style>
        body {
            background: #f2f2f2;
            font-family: sans-serif;
        }

        .tombol {
            background: lightgreen;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            color: rgb(29, 27, 27);
            font-size: 15pt;
            margin-top: 20px;
            cursor: pointer;
        }

        

        .hasil-container {
            text-align: center;
            width: 450px;
            margin: 150px auto;
            padding: 90px;
            border-radius: 5px;
            box-shadow: 0px 10px 20px 0px #d1d1d1;
            background-color: white;
        }

        .info {
            text-align: center;
            font-size: 1.2rem;
            margin-top: 20px;
        }
        
        @media print {
           .tombol{
            display: none;
           }
        }
    </style>

<?php

$harga_per_liter = [
    "Shell Super" => 15420,
    "Shell V-Power" => 16130,
    "Shell V-Power Diesel" => 18310,
    "Shell V-Power Nitro" => 16510
];

$ppn = 0.1;
$hasil = "";
$info = "";

class Shell {
    protected $jenis;
    protected $harga;
    protected $jumlah;
    protected $ppn;

    function __construct($jenis, $harga, $jumlah, $ppn) {
        $this->jenis = $jenis;
        $this->harga = $harga;
        $this->jumlah = $jumlah;
        $this->ppn = $ppn;
    }
}

class Beli extends Shell {
    function totalHarga() {
        $total = ($this->harga * $this->jumlah) + ($this->harga * $this->jumlah * $this->ppn);
        return $total;
    }
}

if(isset($_POST['submit'])) {
    if(!empty($_POST['nama_pelanggan']) && !empty($_POST['jumlah_liter']) && !empty($_POST['bahan_bakar'])) {
        $nama_pelanggan = htmlspecialchars($_POST['nama_pelanggan']);
        $jumlah_liter = htmlspecialchars($_POST['jumlah_liter']);
        $bahan_bakar = htmlspecialchars($_POST['bahan_bakar']);

        if(is_numeric($jumlah_liter) && $jumlah_liter > 0 && array_key_exists($bahan_bakar, $harga_per_liter)) {
            $pembelian = new Beli($bahan_bakar, $harga_per_liter[$bahan_bakar], $jumlah_liter, $ppn);
            $hasil = $pembelian->totalHarga();
            $info ="<h1>bukti pembayaran</h1> <li>$nama_pelanggan membeli bahan bakar ".$bahan_bakar."</li> <li>sebanyak ".$jumlah_liter." liter</li> <li>dengan total yang harus dibayar adalah </li> Rp. " . number_format($hasil, 0, ',', '.');
        } else {
            $info = "Input tidak valid";
        }
    } else {
        $info = "Semua input harus diisi";
    }
}

?>
<?php if($info != "") { ?>
    <div class="hasil-container">
        <p class="info"><?php echo $info; ?></p>
        <a href="index3.php"><input type="submit" name="submit" value="kembali" class="tombol"></a>
        <button type="button" class="tombol" onclick="window.print()">Cetak</button>
    </div>
<?php } ?>

   

    