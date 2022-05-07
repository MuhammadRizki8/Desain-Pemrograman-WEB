<?php
    include('db.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "DELETE FROM company_information WHERE id=$id";
        $query = mysqli_query($conn, $sql);

        if($query){
            back();
        }else{
            die("data gagal dihapus...");
            back();
        }
    }
    else{
        die("Akses dilarang");
        back();
    }

    function back(){        //fungsi kembali ke halaman index
        header('Location: ' . $_SERVER['HTTP_REFERER']);//mengalihkan ke halaman sebelumnya
    }

?>