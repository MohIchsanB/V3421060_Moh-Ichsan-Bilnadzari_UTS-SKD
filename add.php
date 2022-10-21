<?php 
session_start();
 
include('header.php');
//koneksi

if (!isset($_SESSION['login'])) {
    echo "<script>window.location.href='index.php'</script>";
}

include('database/config.php');
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}


?>

<div class="container-fluid px-4">
    <!-- <img src="../../assets/images/g" alt=""> -->
        <div class="row my-5">
        <h3 class="fs-4 mb-3">Tambah Data Siswa</h3>
        <div class="text-start">
                <button type="button" class="btn btn-primary mb-2" onclick="window.location.href='dashboard.php'"><i class="bi bi-arrow-return-left"></i></i>Kembali</button>
            </div>
                    
                <div class="col">
                <div class="card">
                    <div class="card-body">
                    <form id="contactForm" enctype="multipart/form-data" action="proses-tambah.php" method="POST">
                        
                        <div class="mb-3">
                            <label class="form-label" for="">NISN</label>
                            <input class="form-control" type="text" id="nisn" name="nisn" required/>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="">Nama</label>
                            <input class="form-control" type="text" id="nama" name="nama" required/>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"> Jenis Kelamin</label> <br>
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="laki - laki">Laki - laki
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="perempuan">Perempuan
        
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="">Tanggal lahir</label>
                            <input class="form-control" type="date" id="tgl_lahir" name="tgl_lahir" required/>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="">Alamat</label>
                            <input class="form-control" type="text" id="alamt" name="alamat" required/>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="">Nama Orang Tua</label>
                            <input class="form-control" type="text" id="ortu" name="ortu" required/>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="">Asal sekolah</label>
                            <input class="form-control" type="text" id="asal" name="asal" required/>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="kode_product">NIK</label>
                            <input class="form-control" type="text" id="nik" name="nik" required/>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"> KIP</label> <br>
                            <input class="form-check-input" type="radio" name="kip" id="kip" value="punya">Punya
                            <input class="form-check-input" type="radio" name="kip" id="kip" value="tidak">Tidak
        
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="">Foto Siswa</label>
                            <input class="form-control" id="foto" name="foto"  type="file" placeholder="Foto Siswa" required/>
                        </div>



                        <!-- Form submit button -->
                        <div class="mb-3">
                            <button type=" submit" name="submit" class="btn btn-primary">Kirim</button>
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