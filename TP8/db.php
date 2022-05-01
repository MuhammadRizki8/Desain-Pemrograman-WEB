<?php       //membuka tag php
   ini_set('display_errors', 1);            ///menampilkan error pada halaman web tanpa harus merubah file konfogurasi PHP
 
   class Database{                          //deklarasikan class
       private $host = "localhost";         //variabel konfigurasi
       private $username = "root";
       private $password = "";
       private $database = "country_data";
       public $connection = "";
 
       function __construct(){}             //function yang otomatis akan dijalankan saat class diinstansiasi (dibuat sebuah object)
 
       function connectDatabase(){          //fungsi untuk menyambungkan ke database
           $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->database);//menghubungkkan mysql dan php dengan teknik OOP
          
           if(!$this->connection){          //menampilkan pesan jika terjadi error
               die("could not connect: " . mysqli_error());
           }
       }

      
       function closeDatabase(){            //fungsi menutup kembali database yang sebelumnya dibuka
           mysqli_close($this->connection);
       }
	    
       function getCountryCityData(){       //fungsi mengambil data dari database    
           $this->connectDatabase();        //panggil fungsi koneksi database
           $query = "SELECT * FROM country_city";//siapkan variabel query
          
           $result = mysqli_query($this->connection, $query);// menjalankan instruksi atau argumen ke mysql, lalu disimpan ke variabel result
  
           $data = mysqli_fetch_all($result, MYSQLI_ASSOC);// mengambil semua baris hasil dan mengembalikan kumpulan hasil sebagai larik asosiatif, larik numerik, atau keduanya.
           mysqli_free_result($result);     //membebaskan memori yang berhubungan dengan hasilnya.

           $this->closeDatabase();          //fungsi menutup kembali database yang sebelumnya dibuka
  
           return $data;                    //nilai kembalian
       }
 
       function saveCountryCityData($countryName, $countryCode, $cityName, $mayor, $cityPopulation){//fungsi menyimpan data inputan ke database
           $this->connectDatabase();        //fungsi menghubungkan databbase
           $submittedAt= date("Y-m-d H:i:s");
           $query = "INSERT INTO country_city(id, countryName, countryCode, cityName, mayor, cityPopulation, 	submittedAt) VALUES('', '$countryName', '$countryCode', '$cityName', '$mayor', '$cityPopulation', '$submittedAt')";//siapkan variabel untuk perintah query
          
           $result = mysqli_query($this->connection, $query);// menjalankan instruksi atau argumen ke mysql, lalu disimpan ke variabel result
  
           if(!$result){                    //tapilkan pesan jika terjadi error
               die('Could not get data: ' . mysqli_error());
           }
          
           $this->closeDatabase();          //fungsi menutup kembali database yang sebelumnya dibuka
       }
   }
//menutup tag php
?> 
