<?php
    include 'koneksi.php';

    $query = "SELECT * FROM tb_arsip";
    $sql = mysqli_query($connect, $query);
    $no = 0;

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
                <i class="fas fa-bars"></i>
            </label>
        </div>
        <div class="menu">
            <div class="logo">
                <a href="menu.php">E-ARSIP MENU</a>
            </div>
            <div class="btn_x"> <!--button untuk menutup sidebar -->
                <label for="check">
                    <i class="fas fa-times"></i>
                </label>
            </div>
            <div class="list_menu">
               <ul>
                    <li><a href="arsip.php"><i class="fas fa-star"></i>
                        Arsip</a></li>
                    <li><a href="about.php"><i class="fas fa-info-circle"></i>
                        About</a></li>
                </ul> 
            </div>
        </div> 
    <div class="container text-white" >
       <h1 class="mt-4">Arsip Data</h1>
        <figure>
            <blockquote class="blockquote">
                <p>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan</p>
            </blockquote>
            <figcaption class="blockquote-footer text-white">
                Klik "Lihat" <cite title="Source Title">pada kolom aksi untuk menampilkan surat</cite>
            </figcaption>
        </figure>
        <div class="table-responsive ">
            <table class="table align-middle table-info table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="30px">
                            <center>
                             No   
                            </center>
                        </th>
                        <th width="200px">
                            <center>
                            Nomor Surat
                            </center>
                        </th>
                        <th width="150px">
                            <center>
                            Kategori
                            </center>
                        </th>
                        <th width="350px">
                            <center>
                            Judul
                            </center>
                        </th>
                        <th width="200px">
                            <center>
                            Waktu Pengarsipan
                            </center>
                        </th>
                        <th width="220px">
                            <center>
                            Aksi
                            </center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    while($result = mysqli_fetch_assoc($sql)){
                  ?>
                    <tr>
                    <td>
                        <center>
                        <?php
                        echo ++$no;
                        ?>   
                        </center>
                    </td>    
                    <td>
                        <?php
                        echo $result['no_surat'];
                        ?>   
                        
                    </td>
                    <td>
                        <?php
                        echo $result['ktg_surat'];
                        ?>   
                    </td>
                    <td>
                        <?php
                        echo $result['jdl_surat'];
                        ?>
                    </td>
                    <td>
                        <center>
                        <?php
                        echo $result['wkt_surat'];
                        ?>    
                        </center>
                    </td>
                    <td>
                        <a href="proses.php?hapus=<?php echo $result['id_surat'];?>" type="button" class="btn btn-danger btn-sm" onClick="return confirm('Apakah anda yakin ingin menghapus arsip surat ini ?')">
                            Hapus
                            <i class=" fa fa-trash-o"></i>
                        </a>
                        <a href="proses.php?unduh=<?php echo $result['nama_surat'];?>" type="button" class="btn btn-warning btn-sm text-white">
                            Unduh
                            <i class=" fa fa-download"></i>
                        </a>
                        <a href="lihat.php?lihat=<?php echo $result['nama_surat'];?>" type="button" class="btn btn-primary btn-sm">
                            Lihat 
                            <i class=" fa fa-eye"></i>
                    </a>
                    </td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
        <a href="upload.php" type="button" class="btn btn-info mb-3 text-white">
            <i class="fa fa-plus"></i>
            Arsipkan Surat
        </a>
    </div>
</body>
</html>