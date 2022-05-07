<?php
    include('db.php');      //menyisipkan file db.php

    if(isset($_GET["add_company_data"])){//jika tombol submit ditekan
        $data = $_GET["data"];//siapkan variabel penampung masing-masing data
        $value = $_GET["value"];

        $db = new Database();

        $db->saveCompanyData($data, $value);//simpan data inputan ke database

        back();             //kembali ke halaman index

    }
    else if(isset($_GET["add_departement_data"])){//jika tombol submit ditekan
        $departement_id = $_GET["departement_id"];//siapkan variabel penampung masing-masing data
        $departement_name = $_GET["departement_name"];
        $departement_address = $_GET["departement_address"];

        $db = new Database();

        $db->saveDepartementData($departement_id, $departement_name, $departement_address);//simpan data inputan ke database

        back();             //kembali ke halaman index

    }
    else if(isset($_GET["add_employee_data"])){//jika tombol submit ditekan
        $employee_id = $_GET["employee_id"];//siapkan variabel penampung masing-masing data
        $employee_name = $_GET["employee_name"];
        $employee_department = $_GET["employee_department"];
        $employee_email = $_GET["employee_email"];

        $db = new Database();

        $db->saveEmployeeData($employee_id, $employee_name, $employee_department, $employee_email);//simpan data inputan ke database

        back();             //kembali ke halaman index

    }
    else if ($id > 0) {
        // jalankan query menghapus data -> deleteBook($id)
        // simpan ke dalam variable untuk mengecek sukses atau gagalnya
        $isDeleteSucceed= deleteCompanyData($id);
        if ($isDeleteSucceed > 0) {
            // jika penghapusan sukses, tampilkan alert
            echo "
            <script>
                alert('Delete successfully!');
                document.location.href = 'admin.php';
            </script>
          ";
          back(); 
        } 
    }
    else{
        back();             //kembali ke halaman index
    }

    function back(){        //fungsi kembali ke halaman index
        header('Location: ' . $_SERVER['HTTP_REFERER']);//mengalihkan ke halaman sebelumnya
    }
?>