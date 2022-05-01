<?php
include('db.php');          //menyisipkan file db.php
?>
<!DOCTYPE html>
<html lang="en">            <!-- membuka tag html -->
<!-- Header html -->
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>PHP Basic & CRUD</title><!-- judul -->
   <link rel="stylesheet" href="style.css"><!-- menghuubungkan dengan file css -->
</head>
<!-- body tampat isi html berada -->
<body>
    <!-- form yang isinya akan dikirim ke file process.php -->
   <form action="process.php" method="get">
       <!-- START_____bagian untuk inputan data user -->
       <h3>Country - City Data Entry</h3>
       <div class="container">
           <label for="countryName">Country Name</label>
           <input name="countryName" type="text">
 
           <label for="countryCode">Country Code</label>
           <input name="countryCode" type="text">
 
           <label for="cityName">City Name</label>
           <input name="cityName" type="text">

           <label for="mayor">Mayor</label>
           <input name="mayor" type="text">
 
           <label for="cityPopulation">City Population</label>
           <input name="cityPopulation" type="number">
       </div>
       <div>
           <!-- Tombol input untuk mengirim data inputan -->
            <input id="submit" type="submit" value="Submit" name="add">
            <!-- Tombol untuk menghapus isian yang belum disubmit -->
            <input id="reset" type="reset" value="Reset">
       </div>
       <!-- END_____bagian untuk inputan data user -->
   </form>
   <hr>
   <!-- START_____Tabel untuk menampilkan data inputan -->
   <table>
       <!-- baris header tabel -->
       <tr>
           <th>No</th>
           <th>Country Name</th>
           <th>Country Code</th>
           <th>City Name</th>
           <th>Mayor</th>
           <th>City Population</th>
           <th>Submitted at</th>
       </tr>
        <?php
        //menampilkan isi database ke tabel
            $db = new Database();
            //mengambil data dari database
            $datas = $db->getCountryCityData();
            foreach ($datas as $index => $data){//looping sebanyak data
                echo "<tr>" .                   //tampilkan record data pada tabel
                "<td>" . ($index + 1) . "</td>" .
                "<td>" . $data['countryName'] . "</td>" .
                "<td>" . $data['countryCode'] . "</td>" .
                "<td>" . $data['cityName'] . "</td>" .
                "<td>" . $data['mayor'] . "</td>" .
                "<td>" . $data['cityPopulation'] . "</td>" .
                "<td>" . $data['submittedAt'] . "</td>" .
                "</tr>";
            }
        ?>
   </table>
   <!-- END_____Tabel untuk menampilkan data inputan -->
</body>
</html>