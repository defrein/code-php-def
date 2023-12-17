<?php
$input_bangun_datar = [
    'sisi' => 0,
    'radius' => 0,
    'alas' => 8,
    'tinggi' => 10,
    'panjang' => 10,
    'lebar' => 10,
    'atap' => 10,
];

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


$bangun_datar = new BangunDatar();
$bangun_datar->setBangunDatar('segitiga');
$luas = $bangun_datar->hitungLuasBangun($input_bangun_datar);
echo $luas;

class BangunDatar
{
    public string $bangunDatar;

    // public array $shapes = [
    //     [
    //         'slug' => 'persegi',
    //         'name' => 'Persegi'
    //     ],
    //     [
    //         'slug' => 'lingkaran',
    //         'name' => 'Lingkaran'
    //     ],
    //     [
    //         'slug' => 'segitiga',
    //         'name' => 'Segitiga'
    //     ],
    //     [
    //         'slug' => 'persegi-panjang',
    //         'name' => 'Persegi Panjang'
    //     ],
    //     [
    //         'slug' => 'trapesium',
    //         'name' => 'Trapesium'
    //     ],
    // ];

    // public array $input_bangun_datar = [
    //     'sisi', 'radius', 'alas', 'tinggi'
    // ];

    

    public function setBangunDatar($slug)
    {
        $this->bangunDatar = $slug;
        return $this;
    }



    public function hitungLuasBangun(array $input)
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
        }

        return $luas;
    }

    public function _hitungKelilingBangun() {

    }

    public function hitungKelilingBangun(array $input)
    {
        switch ($this->bangunDatar) {
            case 'persegi':
                $keliling = Persegi::hitungKeliling($input['sisi']);
                break;
            case 'lingkaran':
                $keliling = Lingkaran::hitungKeliling($input['radius']);
                break;
            case 'segitiga':
                $keliling = Segitiga::hitungKeliling($input['alas'], $input['tinggi']);
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

?>