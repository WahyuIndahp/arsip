<?php
    include 'koneksi.php';
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css/bootstrap.min.css" rel="stylesheet" >
    <script src="js/bootstrap.bundle.min.js" ></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="fontAwesome/css/font-awesome.min.css">
    <title>Arsip Surat</title>
</head>
<body>
    <div class="sidebar">
        <input type="checkbox" id="check">
        <div class="btn_bar">
            <label for="check">
            </label>
        </div>
    <div class="container text-white">
        <h1 class="mt-3">Arsip Data >> Lihat</h1>
        <b>Data File PDF</b>
        <hr>
        <?php
            $id_surat = $_GET['lihat'];
            $query = "SELECT * FROM tb_arsip WHERE nama_surat='$id_surat'";
            $sql = mysqli_query($connect, $query);
            $lihat = mysqli_fetch_assoc($sql);
        ?>
        <table width="100%" border="0" class="text bg-secondary">
            <tr>
                <td>
                    <td>Nomor Surat: </td>
                    <td>: <?php echo $lihat['no_surat']?></td>
                </td>
            </tr>
            <tr>
                <td>
                    <td>Kategori: </td>
                    <td>: <?php echo $lihat['ktg_surat']?></td>
                </td>
            </tr>
            <tr>
                <td>
                    <td>Judul: </td>
                    <td>: <?php echo $lihat['jdl_surat']?></td>
                </td>
            </tr>
            <tr>
                <td>
                    <td>Waktu Unggah: </td>
                    <td>: <?php echo $lihat['wkt_surat']?></td>
                </td>
            </tr>
        </table>
        
        <hr>
        <embed src="file/<?php echo $lihat['nama_surat'];?>" type="application/pdf" width="100%" height="500">

        <a href="arsip.php" type="button" class="btn btn-info text-white">
            <i class="fa fa-backward "></i>
            Kembali
        </a>
        <a href="proses.php?unduh=<?php echo $lihat['nama_surat'];?>" type="button" class="btn btn-warning btn-sm text-white">
            Unduh                
            <i class=" fa fa-download"></i>
        </a>
        <a href="upload.php?ubah=<?php echo $lihat['id_surat'];?>" type="button" class="btn btn-secondary btn-sm text-white">
            Edit/Ganti File                
            <i class=" fa fa-edit"></i>
         </a>
    </div>  
</body>
</html>