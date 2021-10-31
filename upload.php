<!DOCTYPE html>
<?php
    include "koneksi.php";

    $id_surat ="";
    $no_surat = "";
    $ktg_surat = "";
    $jdl_surat = "";
    
    if(isset($_GET['ubah'])){
        $id_surat = $_GET['ubah'];

        $query = "SELECT * FROM tb_arsip WHERE id_surat = '$id_surat';";
        $sql = mysqli_query($connect, $query);
        
        $result = mysqli_fetch_assoc($sql);

        $no_surat = $result['no_surat'];
        $ktg_surat = $result['ktg_surat'];
        $jdl_surat = $result['jdl_surat'];
    }
?>
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
       <h1 class="mt-3">Arsip Data >> Unggah</h1>
        <figure>
            <blockquote class="blockquote">
                <p>
                Unggah surat yang telah terbit pada form ini untuk diarsipkan<br/>
                Catatan :
                </p>
                <figcaption class="blockquote-footer text-white">
                    Gunakan file berformat PDF
                </figcaption>
            </blockquote>
        </figure>
        <form method="POST" action="proses.php" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo $id_surat;?>" name="id_surat">
            <div class="mb-3 row mb-4">
                <label for="no_surat" class="col-sm-2 col-form-label">
                    Nomor Surat
                </label>
                <div class="col-sm-10">
                <input required type="text" class="form-control" name="no_surat" id="no_surat" placeholder="2021/PST/TU/NO" value="<?php echo $no_surat; ?>">
                </div>
            </div>
            <div class="mb-3 row mb-4">
                <label for="ktg_surat" class="col-sm-2 col-form-label">
                    Kategori
                </label>
                <div class="col-sm-10">
                    <select required class="form-select" name="ktg_surat" id="ktg_surat">
                        <option <?php if($ktg_surat == 'Nota Dinas') {echo "selected";}?> value="Nota Dinas">Nota Dinas</option>
                        <option <?php if($ktg_surat == 'Pengumuman') {echo "selected";}?> value="Pengumuman">Pengumuman</option>
                        <option <?php if($ktg_surat == 'Pemberitahuan') {echo "selected";}?> value="Pemberitahuan">Pemberitahuan</option>
                        <option <?php if($ktg_surat == 'Undangan') {echo "selected";}?> value="Undangan">Undangan</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row mb-4">
                <label for="jdl_surat" class="col-sm-2 col-form-label">
                Judul Surat
                </label>
                <div class="col-sm-10">
                <input required type="text" class="form-control" name="jdl_surat" id="jdl_surat" placeholder="Masukkan Judul Surat" value="<?php echo $jdl_surat; ?>">
                </div>
            </div>
            <div class="mb-3 row mb-4">
                <label for="nama_surat" class="col-sm-2 col-form-label">
                    File Surat (PDF)
                </label>
                <div class="col-sm-10">
                    <input <?php if(!isset($_GET['ubah'])) echo "required";?> class="form-control"  type="file" name="nama_surat" id="nama_surat">
                    <input type="hidden" name="wkt_surat" value="<?php echo date("d-m-Y H:i:s A"); ?>">
                </div>
            </div>
            <div class="mb-3 row mb-4">
                <div class="col">
                    <a href="arsip.php" type="button" class="btn btn-info text-white">
                        <i class="fa fa-backward "></i>
                        Kembali
                    </a>
                    <?php
                        if(isset($_GET['ubah'])){
                    ?>
                            <button type="submit" name="aksi" value="edit" class="btn btn-success">
                                Replace
                                <i class="fa fa-floppy-o "></i>
                            </button>
                    <?php
                        }else{
                    ?>
                            <button type="submit" name="aksi" value="add" class="btn btn-success">
                                Simpan
                                <i class="fa fa-floppy-o "></i>
                            </button>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </form>
    </div>  
</body>
</html>