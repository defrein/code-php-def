<?php

$mahasiswa = [
    [
        'nama' => "wahni",
        'umur' => "21",
        'jenis_kelamin' => "perempuan",
    ],
    [
        'nama' => "adnani",
        'umur' => "20",
        'jenis_kelamin' => "laki-laki",
    ],
    [
        'nama' => "def",
        'umur' => "19",
        'jenis_kelamin' => "perempuan",
    ],


];

$mahasiswa_baru = [
    [
        'nama' => 'avian',
        'umur' => '19',
        'jenis_kelamin' => 'laki-laki',
    ],
    [
        'nama' => 'rein',
        'umur' => '18',
        'jenis_kelamin' => 'laki-laki',
    ],
    [
        'nama' => 'akaela',
        'umur' => '20',
        'jenis_kelamin' => 'perempuan',
    ]
    ];

foreach ($mahasiswa_baru as $mhs){
    $mahasiswa[] = $mhs;

}

// $mahasiswa[] = $mahasiswa_baru;
// $mhs = array_merge($mahasiswa, $mahasiswa_baru);


var_dump($mahasiswa);



// echo $mahasiswa[1]['nama'];

// array_push($mahasiswa, );

// foreach ($mahasiswa as $msh){
//     var_dump($msh);
// }


