<?php 


class Segitiga {
    public $alas;
    public $tinggi;

    public function set_alas($alas) {
        $this->alas = $alas;
        return $this;
    }
    public function get_alas() {
        return $this->alas;
        return $this;
    }

    public function set_tinggi($tinggi) {
        $this->tinggi = $tinggi;
    }

    public function get_tinggi() {
        return $this->tinggi;
    }

    public function hitungLuas($alas, $tinggi){
        return (1/2)* $alas * $tinggi;
    }

    // keliling segitiga siku-siku
    public function hitungKeliling($alas, $tinggi){
        // hitung sisi ketiga dengan rumus phytagoras
        $sisi_ketiga = sqrt(pow($alas, 2) + pow($tinggi, 2));
        $keliling = $alas + $tinggi + $sisi_ketiga ;
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
        

        .container{
            width: 40%;
            margin: auto;
            background: #ccc;
            padding: 20px ;
            display: flex;
            flex-direction: row;
        }

        .inputan{
            flex: 1;
            padding: 20px;
        }
        .bagian-hasil{
            flex: 1;
        }

        .form-group{
            margin-bottom: 10px;
            width: 100%;
        }
        input{
            width: 80%;
        }

        #muncul-hasil{
            padding-left: 20px;
            padding-right: 0;
            height: 80%;
            width: 80%;
            border: 1px solid #000;
        }
        


    </style>
</head>
<body>


<?php
global $input_alas;
global $input_tinggi;
$hasil = 0;

function getUserInput(){
    global $input_alas;
    global $input_tinggi;
    
    $input_alas = $_POST['alas']; 
    $input_tinggi = $_POST['tinggi']; 
}

function makeSegitiga(){
    global $input_alas;
    global $input_tinggi;

    $segitiga = new Segitiga();
    getUserInput();
    $segitiga->set_alas($input_alas)->set_tinggi($input_tinggi);
    return $segitiga;
}

$segitiga = makeSegitiga();
if(isset($_POST['h-luas'])){
    $hasil = "Luas Segitiga = ". $segitiga->hitungLuas($segitiga->get_alas(), $segitiga->get_tinggi());

}    
if(isset($_POST['h-keliling'])){ 
    $hasil = "Keliling Segitiga = ". $segitiga->hitungKeliling($segitiga->get_alas(), $segitiga->get_tinggi());
}    
?>
    <div class="container">
        <form class="inputan" method="post" action="">

            <div class="form-group">
                <label for="alas">Masukkan alas</label>
                <input type="number" name="alas" id="alas" required>
            </div>
    
            <div class="form-group">
    
                <label for="tinggi">Masukkan tinggi</label>
                <input type="number" name="tinggi" id="tinggi" required>
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
                <p>Alas:<?= $input_alas; ?> </p>
                <p>Tinggi:<?= $input_tinggi; ?> </p>
                <?= $hasil ?>
            </div>
        </div>
    </div>
    <script>
        function hapusHasil(){
            const munculHasil = document.getElementById("muncul-hasil");
            munculHasil.innerHTML = '';
        }
    </script>
</body>

</html>