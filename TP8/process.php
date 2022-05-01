<?php
    include('db.php');      //menyisipkan file db.php

    if(isset($_GET["add"])){//jika tombol submit ditekan
        $countryName = $_GET["countryName"];//siapkan variabel penampung masing-masing data
        $countryCode = $_GET["countryCode"];
        $cityName = $_GET["cityName"];
        $mayor = $_GET["mayor"];
        $cityPopulation = $_GET["cityPopulation"];

        $db = new Database();

        $db->saveCountryCityData($countryName, $countryCode, $cityName, $mayor, $cityPopulation);//simpan data inputan ke database

        back();             //kembali ke halaman index

    }else{
        back();             //kembali ke halaman index
    }

    function back(){        //fungsi kembali ke halaman index
        header('Location: ' . $_SERVER['HTTP_REFERER']);//mengalihkan ke halaman sebelumnya
    }
?>