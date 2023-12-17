<?php

class BangunDatar
{
    public string $bangunDatar;

    public function setBangunDatar($slug)
    {
        $this->bangunDatar = $slug;
        return $this;
    }

    public function __hitungLuasBangun(array $input)
    {
        switch ($this->bangunDatar) {
            case 'persegi':
                $luas = Persegi::hitungLuas($input['sisi']);
                break;
            case 'lingkaran':
                $luas = Lingkaran::hitungLuas($input['radius']);
                break;
            case 'segitiga':
                $luas = Segitiga::hitungLuas($input['alas'], $input['tinggi']);
                break;
            case 'persegi-panjang':
                $luas = PersegiPanjang::hitungLuas($input['panjang'], $input['lebar']);
                break;
            case 'trapesium':
                $luas = Trapesium::hitungLuas($input['alas'], $input['atap'], $input['tinggi']);
                break;
        }

        return $luas;
    }
    public function hitungLuasBangun(object $input = null)
    {
        switch ($this->bangunDatar) {
            case 'persegi':
                $luas = Persegi::hitungLuas($input->sisi);
                break;
            case 'lingkaran':
                $luas = Lingkaran::hitungLuas($input->radius);
                break;
            case 'segitiga':
                $luas = Segitiga::hitungLuas($input->alas, $input->tinggi);
                break;
            case 'persegi-panjang':
                $luas = PersegiPanjang::hitungLuas($input->panjang, $input->lebar);
                break;
            case 'trapesium':
                $luas = Trapesium::hitungLuas($input->alas, $input->atap, $input->tinggi);
                break;
        }

        return $luas;
    }

    public function _hitungKelilingBangun()
    {
    }

    public function hitungKelilingBangun(object $input = null)
    {
        switch ($this->bangunDatar) {
            case 'persegi':
                $keliling = Persegi::hitungKeliling($input->sisi);
                break;
            case 'lingkaran':
                $keliling = Lingkaran::hitungKeliling($input->radius);
                break;
            case 'segitiga':
                $keliling = Segitiga::hitungKeliling($input->alas, $input->tinggi);
                break;
            case 'persegi-panjang':
                $keliling = PersegiPanjang::hitungKeliling($input->panjang, $input->lebar);
                break;
            case 'trapesium':
                $keliling = Trapesium::hitungKeliling($input->alas, $input->atap, $input->tinggi);
                break;
        }

        return $keliling;
    }
}

class Persegi extends BangunDatar
{
    public int $sisi;

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

    public static function hitungLuas($sisi)
    {
        return $sisi * $sisi;
    }

    public static function hitungKeliling($sisi)
    {
        return $sisi * 4;
    }
}

class Lingkaran extends BangunDatar
{
    public int $radius;

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


    public static function hitungLuas($radius)
    {
        return round((pi() * $radius * $radius), 2); // hanya dua digit koma yang muncul
    }

    public static function hitungKeliling($radius)
    {
        return round((pi() * $radius * 2), 2); // hanya dua digit koma yang muncul
    }
}


class Segitiga extends BangunDatar
{
    public int $alas;
    public int $tinggi;

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

    public static function hitungLuas($alas, $tinggi)
    {
        return (1 / 2) * $alas * $tinggi;
    }

    // keliling segitiga siku-siku
    public static function hitungKeliling($alas, $tinggi)
    {
        // hitung sisi ketiga dengan rumus phytagoras
        $sisi_ketiga = sqrt(pow($alas, 2) + pow($tinggi, 2));
        $keliling = $alas + $tinggi + $sisi_ketiga;
        return round($keliling, 2);
    }
}

class PersegiPanjang extends BangunDatar
{
    public int $panjang;
    public int $tinggi;

    public function set_panjang($panjang)
    {
        $this->panjang = $panjang;
        return $this;
    }
    public function get_panjang()
    {

        return $this->panjang;
    }

    public function set_lebar($lebar)
    {
        $this->lebar = $lebar;
    }

    public function get_lebar()
    {
        return $this->lebar;
    }

    public static function hitungLuas($panjang, $lebar)
    {
        return $panjang * $lebar;
    }

    public static function hitungKeliling($panjang, $lebar)
    {
        return 2 * $panjang + 2 * $lebar;
    }
}
class Trapesium extends BangunDatar
{
    public int $atap;
    public int $alas;
    public int $tinggi;

    public function set_atap($atap)
    {
        $this->atap = $atap;
        return $this;
    }
    public function get_atap()
    {

        return $this->atap;
    }

    public function set_alas($alas)
    {
        $this->alas = $alas;
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

    public static function hitungLuas($atap, $alas, $tinggi)
    {
        return ($alas + $atap) / 2 * $tinggi;
    }

    public static function hitungKeliling($atap, $alas, $tinggi)
    {
        $alas_segitiga = ($alas - $atap) / 2;
        $sisi_miring = sqrt(pow($tinggi, 2) + pow($alas_segitiga, 2));
        return round(($alas + $atap + 2 * $sisi_miring), 2);
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Luas dan Keliling Bangun Datar</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>


    <?php

    $shapes = [
        [
            'slug' => 'persegi',
            'name' => 'Persegi'
        ],
        [
            'slug' => 'lingkaran',
            'name' => 'Lingkaran'
        ],
        [
            'slug' => 'segitiga',
            'name' => 'Segitiga'
        ],
        [
            'slug' => 'persegi-panjang',
            'name' => 'Persegi Panjang'
        ],
        [
            'slug' => 'trapesium',
            'name' => 'Trapesium'
        ],
    ];

    (object) $post = null;
    $hasil = null;

    if (isset($_POST['h-luas'])) {

        $post = (object) $_POST;
        // var_dump($post);

        $bangun_datar = new BangunDatar();
        $bangun_datar->setBangunDatar($post->{'bangun-datar'});
        $luas = $bangun_datar->hitungLuasBangun($post);

        $hasil = 'Luas: ' . $luas;
    }

    if (isset($_POST['h-keliling'])) {
        $post = (object) $_POST;
        // var_dump($post);

        $bangun_datar = new BangunDatar();
        $bangun_datar->setBangunDatar($post->{'bangun-datar'});
        $keliling = $bangun_datar->hitungKelilingBangun($post);

        $hasil = 'Keliling: ' . $keliling;
    }
    ?>

    <div class="container">
        <form class="inputan" method="post" action="">

            <div class="form-group" id="select-bangun">
                <!-- <label for="bangun-datar">Pilih Bangun datar</label> -->
                <select name="bangun-datar" id="bangun-datar">
                    <option value="0">-- Pilih bangun datar --</option>
                    <?php foreach ($shapes as $shape): ?>
                    <option value="<?=$shape['slug']  ?>"><?= $shape['name'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="form-group" id="group-sisi">
                <label for="sisi">Masukkan sisi</label>
                <input type="number" name="sisi" id="sisi">
            </div>
            <div class="form-group" id="group-radius">
                <label for="radius">Masukkan radius</label>
                <input type="number" name="radius" id="radius">
            </div>

            <div class="form-group" id="group-alas">
                <label for="alas">Masukkan alas</label>
                <input type="number" name="alas" id="alas">
            </div>

            <div class="form-group" id="group-tinggi">
                <label for="tinggi">Masukkan tinggi</label>
                <input type="number" name="tinggi" id="tinggi">
            </div>
            <div class="form-group" id="group-atap">
                <label for="atap">Masukkan atap</label>
                <input type="number" name="atap" id="atap">
            </div>
            <div class="form-group" id="group-panjang">
                <label for="panjang">Masukkan panjang</label>
                <input type="number" name="panjang" id="panjang">
            </div>
            <div class="form-group" id="group-lebar">
                <label for="lebar">Masukkan lebar</label>
                <input type="number" name="lebar" id="lebar">
            </div>

            <div class="form-group" id="buttons">
                <button id="hitung-luas" type="submit" name="h-luas">Hitung Luas</button>
                <button id="hitung-keliling" type="submit" name="h-keliling">Hitung Keliling</button>
                <button id="reset" onclick="clearHasil()" type="button">Clear</button>
            </div>
        </form>
        <div class="bagian-hasil">
            <label for="muncul-hasil">Hasil</label>
            <div id="muncul-hasil" disabled>
                <?php if ($post?->{'bangun-datar'} === 'persegi') :  ?>
                    <p>Persegi</p>
                    <p>Sisi: <?= $post?->sisi ?></p>
                <?php endif ?>

                <?php if ($post?->{'bangun-datar'} === 'lingkaran') :  ?>
                    <p>Lingkaran</p>
                    <p>Sisi: <?= $post?->radius ?></p>
                <?php endif ?>

                <?php if ($post?->{'bangun-datar'} === 'segitiga') :  ?>
                    <p>Segitiga</p>
                    <p>Alas:<?= $post?->alas; ?> </p>
                    <p>Tinggi:<?= $post?->tinggi; ?> </p>
                <?php endif ?>

                <?php if ($post?->{'bangun-datar'} === 'persegi-panjang') :  ?>
                    <p>Persegi Panjang</p>
                    <p>Panjang:<?= $post?->panjang; ?> </p>
                    <p>Lebar:<?= $post?->lebar; ?> </p>
                <?php endif ?>

                <?php if ($post?->{'bangun-datar'} === 'trapesium') :  ?>
                    <p>Trapesium</p>
                    <p>Alas:<?= $post?->alas; ?> </p>
                    <p>Tinggi:<?= $post?->tinggi; ?> </p>
                    <p>Atap:<?= $post?->atap; ?> </p>
                <?php endif ?>
                <?= $hasil ?>
            </div>
        </div>
    </div>

    <script>
        function clearHasil() {
            $('#muncul-hasil').html('')
        }

        // $('#group-sisi').hide();
        // $('#group-radius').hide();
        // $('#group-alas').hide();
        // $('#group-tinggi').hide();

        $('.inputan').children().not(':first').not(':last').hide();

        $(function() {

            // $('.inputan').hide();
            $('#bangun-datar').change(function() {
                $('.inputan').children().not(':first').not(':last').hide();
                if ($('#bangun-datar').val() == 'persegi') {
                    $('#group-sisi').show();
                }

                if ($('#bangun-datar').val() == 'lingkaran') {
                    $('#group-radius').show();
                }

                if ($('#bangun-datar').val() == 'segitiga') {
                    $('#group-alas').show();
                    $('#group-tinggi').show();
                }
                if ($('#bangun-datar').val() == 'persegi-panjang') {
                    $('#group-panjang').show();
                    $('#group-lebar').show();
                }
                if ($('#bangun-datar').val() == 'trapesium') {
                    $('#group-alas').show();
                    $('#group-atap').show();
                    $('#group-tinggi').show();
                }

            });
        });
    </script>
</body>

</html>