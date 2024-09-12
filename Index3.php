<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Pembelian Bahan Bakar</title>
    <style>
        body {
            background: #f2f2f2;
            font-family: sans-serif;
        }

        .input-container {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .input-container .h21 {
            margin-right: 20px;
            flex: 0 0 auto;
        }

        .input-container .bil1,
        .input-container .bil2,
        .opt {
            width: 100%;
            border: none;
            font-size: 16pt;
            border-radius: 5px;
            padding: 10px;
            margin: 5px;
        }

        .kalkulator {
            width: 400px;
            margin: 100px auto;
            padding: 35px;
            border-radius: 5px;
            box-shadow: 0px 10px 20px 0px #d1d1d1;
            background-color: white;
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

        .judul {
            text-align: center;
            color: black;
            font-weight: normal;
            margin-top: 50px;
            font-size: 3rem;
        }

    </style>
</head>
<body>
<h2 class="judul">Pembelian Bahan Bakar</h2>
<div class="kalkulator">
    <form method="post" action="fuel.php">
        <div class="container">
            <div class="input-container">
                <h2 class="h21">Nama Pelanggan:</h2>
                <input type="text" name="nama_pelanggan" class="bil1" autocomplete="off" placeholder="Masukkan nama pelanggan" required>
            </div>
            <div class="input-container">
                <h2 class="h21">Jumlah Liter:</h2>
                <input type="number" name="jumlah_liter" class="bil2" autocomplete="off" placeholder="Masukkan jumlah liter" required>
            </div>
        </div>
        <div class="container">
            <h2 class="h21">Jenis Bahan Bakar</h2>
            <select class="opt" name="bahan_bakar" required>
                <option value="" disabled selected>Pilih Bahan Bakar</option>
                <option value="Shell Super">Shell Super Rp.15.420</option>
                <option value="Shell V-Power">Shell V-Power Rp.16.130</option>
                <option value="Shell V-Power Diesel">Shell V-Power Diesel Rp.18.310</option>
                <option value="Shell V-Power Nitro">Shell V-Power Nitro Rp.16.510</option>
            </select>
        </div>
        <div class="container">
            <input type="submit" name="submit" value="Submit" class="tombol">
        </div>
    </form>
</div>
</body>
</html>
