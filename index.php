<?php

// $bangun_datar = new BangunDatar();
// $bangun_datar->setBangunDatar('segitiga');
// $luas = $bangun_datar->hitungLuasBangun(null, null, 8, 10);
// echo $luas;

class BangunDatar
{
    public string $bangunDatar;

    public array $shapes = [
        [
            'slug' => 'persegi',
            'name' => 'Persegi'
        ],
        [
            'slug' => 'segitiga',
            'name' => 'Segitiga'
        ],
        [
            'slug' => 'persegi-panjang',
            'name' => 'Persegi Panjang'
        ],
    ];



    public $luas;

    // $orang['nama'];
    // $orang->nama;
    // new Orang;

    public function setBangunDatar()
    {
        $this->bangunDatar = $slug;
        return $this;
    }

    public function hitungLuasBangun($sisi = null, $radius = null, $alas = null, $tinggi = null)
    {
        switch ($this->bangunDatar) {
            case 'persegi':
                $bangun_luas = new Persegi();
                $luas = $bangun_luas->hitungLuas($sisi);
                break;
            case 'lingkaran':
                $bangun_luas = new Lingkaran();
                $luas = $bangun_luas->hitungLuas($radius);
                break;
            case 'segitiga':
                $bangun_luas = new Segitiga();
                $luas = $bangun_luas->hitungLuas($alas, $tinggi);
        }

        return $luas;
    }

    public function _hitungKelilingBangun() {

    }

    public function hitungKelilingBangun($sisi = null, $radius = null, $alas = null, $tinggi = null)
    {
        switch ($this->bangunDatar) {
            case 'persegi':
                $bangun_keliling = new Persegi();
                $keliling = $bangun_keliling->hitungKeliling($sisi);
                break;
            case 'lingkaran':
                $bangun_keliling = new Lingkaran();
                $keliling = $bangun_keliling->hitungKeliling($radius);
                break;
            case 'segitiga':
                $bangun_keliling = new Segitiga();
                $keliling = $bangun_keliling->hitungKeliling($alas, $tinggi);
        }

        return $keliling;
    }
}

class Persegi extends BangunDatar
{
    public $sisi;

    public function set_sisi($sisi)
    {
        $this->sisi = $sisi;
        return $this;
    }
    public function get_sisi($sisi)
    {
        $this->sisi = $sisi;
        return $this;
    }

    public function hitungLuas($sisi)
    {
        return $sisi * $sisi;
    }

    public function hitungKeliling($sisi)
    {
        return $sisi * 4;
    }
}

class Lingkaran extends BangunDatar
{
    public $radius;

    public function set_radius($radius)
    {
        $this->radius = $radius;
        return $this;
    }
    public function get_radius($radius)
    {
        $this->radius = $radius;
        return $this;
    }


    public function hitungLuas($radius)
    {
        return pi() * $radius * $radius;
    }

    public function hitungKeliling($radius)
    {
        return round((pi() * $radius * 2), 2); // hanya dua digit koma yang muncul
    }
}


class Segitiga extends BangunDatar
{
    public $alas;
    public $tinggi;

    public function set_alas($alas)
    {
        $this->alas = $alas;
        return $this;
    }
    public function get_alas()
    {
        
        return $this->alas;
    }

    public function set_tinggi($tinggi)
    {
        $this->tinggi = $tinggi;
    }

    public function get_tinggi()
    {
        return $this->tinggi;
    }

    public function hitungLuas($alas, $tinggi)
    {
        return (1 / 2) * $alas * $tinggi;
    }

    // keliling segitiga siku-siku
    public function hitungKeliling($alas, $tinggi)
    {
        // hitung sisi ketiga dengan rumus phytagoras
        $sisi_ketiga = sqrt(pow($alas, 2) + pow($tinggi, 2));
        $keliling = $alas + $tinggi + $sisi_ketiga;
        return round($keliling, 2);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Luas dan Keliling Segitiga</title>
    <style>
        .container {
        min-height: 200px;
            width: 40%;
            margin: auto;
            background: #ccc;
            padding: 20px;
            display: flex;
            flex-direction: row;
        }

        .inputan {
            flex: 1;
            padding: 20px;
        }

        .bagian-hasil {
            flex: 1;
        }

        .form-group {
            margin-bottom: 10px;
            width: 100%;
        }

        input {
            width: 80%;
        }

        #muncul-hasil {
            padding-left: 20px;
            padding-right: 0;
            height: 80%;
            width: 80%;
            border: 1px solid #000;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>


    <?php

    function saveUserInput()
    {
        global $input_alas;
        global $input_tinggi;
        global $input_sisi;
        global $input_radius;
        global $input_bangun_datar;

        $input_alas = $_POST['alas'];
        $input_tinggi = $_POST['tinggi'];
        $input_sisi = $_POST['sisi'];
        $input_radius = $_POST['radius'];
        $input_bangun_datar = $_POST['bangun_datar'];
    }


    
    if (isset($_POST['h-luas'])) {
        saveUserInput();

        $post = (object) $_POST;

        $bangun_datar = new BangunDatar($post->bangun_datar);
        
        $bangun_datar->setBangunDatar($post->bangun_datar);
        switch ($input_bangun_datar) {
            case 'persegi':
                $luas = $bangun_datar->hitungLuasBangun($input_sisi);
                break;
            case 'lingkaran':
                $luas = $bangun_datar->hitungLuasBangun(null, $input_radius);
                break;
            case 'segitiga':
                $luas = $bangun_datar->hitungLuasBangun(null, null, $input_alas, $input_tinggi);
                break;
        }

        $hasil = 'Luas: ' . $luas;
    }

    if (isset($_POST['h-keliling'])) {
        saveUserInput();

        $bangun_datar = new BangunDatar();
        $bangun_datar->setBangunDatar($input_bangun_datar);
        switch ($input_bangun_datar) {
            case 'persegi':
                $keliling = $bangun_datar->hitungKelilingBangun($input_sisi);
                break;
            case 'lingkaran':
                $keliling = $bangun_datar->hitungKelilingBangun(null, $input_radius);
                break;
            case 'segitiga':
                $keliling = $bangun_datar->hitungKelilingBangun(null, null, $input_alas, $input_tinggi);
                break;
        }

        $hasil = 'Keliling: ' . $keliling;
    }
    ?>

    <div class="container">
        <form class="inputan" method="post" action="">

            <div class="form-group">
                <!-- <label for="bangun-datar">Pilih Bangun datar</label> -->
                <select name="bangun-datar" id="bangun-datar">
                    <option value="0">-- Pilih bangun datar --</option>
                    <option value="persegi" >Persegi</option>
                    <option value="lingkaran">Lingkaran</option>
                    <option value="segitiga">Segitiga</option>
                </select>
            </div>


            <div class="form-group" id="group-sisi">
                <label for="sisi" >Masukkan sisi</label>
                <input type="number" name="sisi" id="sisi" >
            </div>
            <div class="form-group" id="group-radius">
                <label for="radius">Masukkan radius</label>
                <input type="number" name="radius" id="radius" >
            </div>

            <div class="form-group" id="group-alas">
                <label for="alas">Masukkan alas</label>
                <input type="number" name="alas" id="alas" >
            </div>

            <div class="form-group" id="group-tinggi">
                <label for="tinggi">Masukkan tinggi</label>
                <input type="number" name="tinggi" id="tinggi" >
            </div>

            <div class="form-group">
                <button id="hitung-luas" type="submit" name="h-luas">Hitung Luas</button>
                <button id="hitung-keliling" type="submit" name="h-keliling">Hitung Keliling</button>
                <button id="reset" onclick="hapusHasil()" type="button">Reset</button>
            </div>
        </form>
        <div class="bagian-hasil">
            <label for="muncul-hasil">Hasil</label>
            <div id="muncul-hasil" disabled>
                <?php if($input_bangun_datar== 'persegi'):  ?>
                    <p>Persegi</p>
                    <p>Sisi: <?= $input_sisi ?></p>
                <?php endif ?>

                <?php if($input_bangun_datar== 'lingkaran'):  ?>
                    <p>Lingkaran</p>
                    <p>Sisi: <?= $input_radius?></p>
                <?php endif ?>

                <?php if($input_bangun_datar== 'segitiga'):  ?>
                    <p>Segitiga</p>
                    <p>Alas:<?= $input_alas; ?> </p>
                    <p>Tinggi:<?= $input_tinggi; ?> </p>
                <?php endif ?>
                <?= $hasil ?>
            </div>
        </div>
    </div>

    <script>
        function hapusHasil() {
            $('#muncul-hasil').html('')
            // const munculHasil = document.getElementById("muncul-hasil");
            // munculHasil.innerHTML = '';
        }

        $('#group-sisi').hide();
        $('#group-radius').hide();
        $('#group-alas').hide();
        $('#group-tinggi').hide();

        $(function() {
            
            // $('.inputan').hide();
            $('#bangun-datar').change(function() {
                if ($('#bangun-datar').val() == 'persegi') {
                    $('#group-sisi').show();
                    $('#group-radius').hide();
                    $('#group-alas').hide();
                    $('#group-tinggi').hide();
                }

                if ($('#bangun-datar').val() == 'lingkaran') {
                    $('#group-sisi').hide();
                    $('#group-radius').show();
                    $('#group-alas').hide();
                    $('#group-tinggi').hide();
                }

                if ($('#bangun-datar').val() == 'segitiga') {
                    $('#group-sisi').hide();
                    $('#group-radius').hide();
                    $('#group-alas').show();
                    $('#group-tinggi').show();
                }
                
            });
        });
    </script>
</body>

</html>