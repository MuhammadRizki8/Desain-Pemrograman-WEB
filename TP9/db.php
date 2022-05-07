<?php
    ini_set('display_errors', 1);

    class Database{
        private $host = "localhost";
        private $username = "root";
        private $password = "";
        private $database = "ester";
        public $connection = "";

        function __construct(){}

        function connectDatabase(){
            $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->database);
            
            if(!$this->connection){
                die("could not connect: " . mysql_error());
            }
        }
        
        function closeDatabase(){
            mysqli_close($this->connection);
        }

        function getCompanyData(){
            $this->connectDatabase();
            
            $query = "SELECT * FROM company_information";
            
            $result = mysqli_query($this->connection, $query);
    
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            mysqli_free_result($result);
    
            $this->closeDatabase();
    
            return $data;
        }

        function saveCompanyData($data, $value){//fungsi menyimpan data inputan ke database
            $this->connectDatabase();        //fungsi menghubungkan databbase

            $query = "INSERT INTO company_information(data, value) VALUES('$data', '$value')";//siapkan variabel untuk perintah query
           
            $result = mysqli_query($this->connection, $query);// menjalankan instruksi atau argumen ke mysql, lalu disimpan ke variabel result
   
            if(!$result){                    //tapilkan pesan jika terjadi error
                die('Could not get data: ' . mysqli_error());
            }
           
            $this->closeDatabase();          //fungsi menutup kembali database yang sebelumnya dibuka
        }

        function deleteCompanyData($id){
            // memanggil koneksi global
            $this->connectDatabase(); 

            // query menghapus data berdasarkan parameter id
            $query = "DELETE FROM company_information WHERE id=$id;";

            $result = mysqli_query($this->connection, $query);// menjalankan instruksi atau argumen ke mysql, lalu disimpan ke variabel result
   
            if(!$result){                    //tapilkan pesan jika terjadi error
                die('Could not get data: ' . mysqli_error());
            }
           
            $this->closeDatabase();          //fungsi menutup kembali database yang sebelumnya dibuka
        }

        function getDepartementData(){
            $this->connectDatabase();
            
            $query = "SELECT * FROM department";
            
            $result = mysqli_query($this->connection, $query);
    
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            mysqli_free_result($result);
    
            $this->closeDatabase();
    
            return $data;
        }

        function saveDepartementData($departement_id, $department_name, $department_address){//fungsi menyimpan data inputan ke database
            $this->connectDatabase();        //fungsi menghubungkan databbase

            $query = "INSERT INTO  department VALUES ('$departement_id', '$department_name', '$department_address')";//siapkan variabel untuk perintah query
           
            $result = mysqli_query($this->connection, $query);// menjalankan instruksi atau argumen ke mysql, lalu disimpan ke variabel result
   
            if(!$result){                    //tapilkan pesan jika terjadi error
                die('Could not get data: ' . mysqli_error());
            }
           
            $this->closeDatabase();          //fungsi menutup kembali database yang sebelumnya dibuka
        }

        function getEmployeeData(){
            $this->connectDatabase();
            
            $query = "SELECT * FROM employee";
            
            $result = mysqli_query($this->connection, $query);
    
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            mysqli_free_result($result);
    
            $this->closeDatabase();
    
            return $data;
        }
        
        function saveEmployeeData($employee_id, $employee_name, $employee_department, $employee_email){//fungsi menyimpan data inputan ke database
            $this->connectDatabase();        //fungsi menghubungkan databbase

            $query = "INSERT INTO employee(employee_id, employee_name, employee_department, employee_email) VALUES ('$employee_id', '$employee_name', '$employee_department', '$employee_email')";//siapkan variabel untuk perintah query
           
            $result = mysqli_query($this->connection, $query);// menjalankan instruksi atau argumen ke mysql, lalu disimpan ke variabel result
   
            if(!$result){                    //tapilkan pesan jika terjadi error
                die('Could not get data: ' . mysqli_error());
            }
           
            $this->closeDatabase();          //fungsi menutup kembali database yang sebelumnya dibuka
        }

    }
?>