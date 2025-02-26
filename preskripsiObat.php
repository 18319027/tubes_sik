<!-- Connect to the DB -->
<?php 
include "include/configDB.php";

 ?>

<!DOCTYPE html>
<html>

<!-- HEAD -->
<head>
    <title>Puskesmas Ganesha : Preskripsi Obat </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- STYLE -->
    <?php include "templates/style.php"; ?>
</head>

<!-- BODY -->
<body>
    <!-- Navbar (sit on top) -->
    <?php include "templates/navbarWithMenuApoteker.php"; ?>

    <!-- Sidebar (hidden by default) -->
    <?php include "templates/sidebarApoteker.php"; ?>

    <!-- Header with full-height image -->
    <?php include "templates/header.php"; ?>

    <!-- 'Preskripsi' Section -->
    
    <div class="w3-container" style="padding:64px 16px" id="preskripsi">
        <h3 class="w3-center"><b> Obat</b></h3>
        <div class="w3-row-padding" style="margin-top:32px">

        <table class="w3-table-all w3-hoverable w3-card">
        <thead>
          <tr class="w3-light-grey">
            <th>Waktu Pemeriksaan</th>
            <th>Preskripsi Obat</th>
            <th>Nama Pasien</th>
          </tr>
        </thead>

        <!-- PHP CODE TO FETCH DATA FROM ROWS -->
        <?php
                $sql = mysqli_query($configDB,"SELECT time_stamp,preskripsi_obat,nama_pasien FROM pemeriksaan,pasien WHERE pemeriksaan.id_pasien = pasien.id_pasien  order by time_stamp DESC LIMIT 3");
                // LOOP TILL END OF DATA
                while($row = mysqli_fetch_row($sql))
                {
            ?>
        
        <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><?php echo $row[0];?></td>
                <td><?php echo $row[1];?></td>
                <td><?php echo $row[2];?></td>
        </tr>
        
        <?php
                }
            ?>
      </table>

        </div>

        <div class="w3-row-padding" style="margin-top:32px">
        <p class="w3-center">Menampilkan 3 Data Preskripsi Obat Terbaru.</p>
        </div>
    </div>

    <!-- Footer -->
    <?php include "templates/footer.php"; ?>

    <!-- Script -->
    <?php include "include/script.php"; ?>
</body>

</html>
