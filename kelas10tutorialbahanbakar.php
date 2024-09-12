<?php
// Sediakan Kotak pembungkus yang akan digunakan (sesuai dengan fitur)
class DataBahanBakar {
    private $HargaSSuper;
    private $HargaSVPower;
    private $HargaSVPowerDiesel;
    private $HargaSVPowerNitro;
    // Attr harga2 dibuat private karena sudah ada getter yang akan menampilkan datanya,
    public $jenisYangDipilih;
    public $totalLiter;
    // attr diatas diset public karena nilainya akan diisi dari luar
    protected $totalPembayaran;
    // set protected karena hanya digunakan oleh class dia dan turunan untuk proses data
    public function setHarga($valSSuper, $valSVPower, $valSVPowerDiesel, $valSVPowerNitro) {
        // mengisi nilai attribute, nilai nantinya diisi dari luar class melalui 
        // nilai dari luar diambil kedalam class melalui parameter (variabel yang ada didalan)
        // penamaan parameter bebas asal urutan pengisian dari luarnya sesuai
        $this->HargaSSuper = $valSSuper;
        $this->HargaSVPower = $valSVPower;
        $this->HargaSVPowerDiesel = $valSVPowerDiesel;
        $this->HargaSVPowerNitro = $valSVPowerNitro;
    }
        public function getHarga() {
            // setelah nilai dari attribute di simpan, fungsi getter akan mengembalikan/menampilkannya untuk digunakan ditempat lain
            // karna data yang akan dikirim/dikeluarkan lebih dari satu, maka data2 tersebut disatukan terlebih dahulu
            $semuaDataSolar["SSuper"] = $this->HargaSSuper;
            $semuaDataSolar["SVPower"] = $this->HargaSVPower;
            $semuaDataSolar["SVPowerDiesel"] = $this->HargaSVPowerDiesel;
            $semuaDataSolar["SVPowerNitro"] = $this->HargaSVPowerNitro;
            // tujuan utama dari getter : return
            return $semuaDataSolar;
        }
    }
    class Pembelian extends DataBahanBakar {
        // data sudah disediakan, tinggal proses penghitungan jumlah pembelian
        public function totalHarga() {
            $this->totalPembayaran = $this->getHarga()[$this->jenisYangDipilih] * $this->totalLiter;
        }
        public function cetakBukti() {
            echo "---------------------------------";
            echo "Jenis Bahan Bakar : " . $this->jenisYangDipilih;
            echo "Total Liter : " . $this->totalLiter;
            echo "Harga Bayar : Rp. " . number_format($this->totalPembayaran, 0,',','.');
            echo "---------------------------------";
        }
    }
?>