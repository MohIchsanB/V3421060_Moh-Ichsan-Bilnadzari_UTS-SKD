<?php 
session_start();
 
include('header.php');
//koneksi
include('database/config.php');
include('caesar.php');

if (!isset($_SESSION['login'])) {
    echo "<script>window.location.href='index.php'</script>";
}

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM siswa WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if(!$result){
      die ("Query Error: ".mysqli_errno($conn).
         " - ".mysqli_error($conn));
    }
    // mengambil data dari database
    $edit = mysqli_fetch_assoc($result);
      // apabiproduct tidak ada pada database maka akan dijalankan perintah ini
       if (!count($edit)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='dashboard.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke dashboard
    echo "<script>alert('Masukkan data id.');window.location='dashboard.php';</script>";
  }         


?>

<div class="container-fluid px-4">
        <div class="row my-5">
        
        <div class="text-start">
                <button type="button" class="btn btn-primary mb-2" onclick="window.location.href='dashboard.php'"><i class="bi bi-arrow-return-left"></i></i>Kembali</button>
            </div>
                    
                <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit data <?= $edit['nama']; ?></h3>
                    </div>
                    <div class="card-body">
                    <form id="contactForm" enctype="multipart/form-data" action="proses-edit.php" method="POST">
                          
                        <div class="mb-3">
                        <input name="id" value="<?php echo $edit['id']; ?>"  hidden />  
                            

                        <div class="mb-3">
                            <label class="form-label" for="">NISN</label>
                            <input class="form-control" type="text" id="nisn" name="nisn" required value="<?= $edit['nisn']; ?>"/>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="">Nama</label>
                            <input class="form-control" type="text" id="nama" name="nama" required value="<?= $edit['nama']; ?>"/>
                        </div>

                        <div class="mb-3">
                        <label class="form-label"> Jenis Kelamin</label> <br>
                        <?php 

                        $radio = mysqli_query($conn,"SELECT * FROM siswa WHERE id='$id' ");
                        $r = mysqli_fetch_array($radio);

                            $query = mysqli_query($conn, "SELECT * FROM gender");
                            while($row = mysqli_fetch_array($query)){   
                        ?>
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="<?= $row['jenis_kelamin']; ?>" <?= ($row['jenis_kelamin'] == $r['gender'])?"checked":"" ?> ><?= $row['jenis_kelamin']; ?>

                        <?php  } ?>
                        </div>

                        

                        <div class="mb-3">
                            <label class="form-label" for="">Tanggal lahir</label>
                            <input class="form-control" type="date" id="tgl_lahir" name="tgl_lahir" required value="<?= $edit['tgl_lahir']; ?>"/>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="">Alamat</label>
                            <input class="form-control" type="text" id="alamt" name="alamat" required value="<?= $edit['alamat']; ?>"/>
                        </div>

                        <div class="mb-3">
                            <?php $ortu1= $edit['ortu']; ?>
                            <label class="form-label" for="">Nama Orang Tua</label>
                            <input class="form-control" type="text" id="ortu" name="ortu" required value="<?= $ortu = dekripsi($ortu1 , 3);  ?>"/>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="">Asal sekolah</label>
                            <input class="form-control" type="text" id="asal" name="asal" required value="<?= $edit['asal']; ?>"/>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="kode_product">NIK</label>
                            <input class="form-control" type="text" id="nik" name="nik" required value="<?= $edit['nik']; ?>"/>
                        </div>

                        <div class="mb-3">
                        <label class="form-label"> KIP</label> <br>
                            <?php 

                            $radio = mysqli_query($conn,"SELECT * FROM siswa  where id='$id' ");
                           $r = mysqli_fetch_array($radio);

                                $query = mysqli_query($conn, "SELECT * FROM gender ");
                                while($row = mysqli_fetch_array($query)){   
                            ?>
                            <input class="form-check-input" type="radio" name="kip" id="kip" value="<?= $row['kip']; ?>" <?= ($row['kip'] == $r['kip'])?"checked":"" ?> ><?= $row['kip']; ?>
                            
                            <?php  } ?>
                        </div>


                        <div class="mb-3">
                            <label class="form-label" for="">Foto Siswa</label>
                            <input class="form-control" id="foto" name="foto"  type="file" placeholder="Foto Siswa" required/>
                        </div>

                        <!-- Form submit button -->
                        <div class="mb-3">
                            <button type=" submit" name="submit" class="btn btn-primary">Update</button>
                            <!-- <button class="btn btn-lg" type="submit">Submit</button> -->
                        </div>
                        </form>
                    </div>
                    </div>    
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

<?php
    include('footer.php');
    
?>