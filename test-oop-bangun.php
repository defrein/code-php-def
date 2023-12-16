<?php

$bangun_datar = new BangunDatar();
$bangun_datar->setBangunDatar('segitiga');
$luas = $bangun_datar->hitungLuasBangun(null, null, 8, 10);
echo $luas;

class BangunDatar
{
    public $bangunDatar;
    public function setBangunDatar($bangun)
    {
        $this->bangunDatar = $bangun;
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
        return $this->sisi = $sisi;
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
        return pi() * $radius * 2;
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
        return $this;
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
