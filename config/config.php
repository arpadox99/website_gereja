<?php
try {
    //koneksi..
    $con = new PDO('mysql:host=localhost;dbname=websitegereja', "root", "");
    //set.eror
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    //jika.ada.eror
    echo "Koneksi Gagal : " . $e->getMessage() . "<br>";
    die();
}
