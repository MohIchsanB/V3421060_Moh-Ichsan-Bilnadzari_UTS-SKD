<?php 
session_start();
 
include('header.php');
include('database/config.php');
include('caesar.php');

if (!isset($_SESSION['login'])) {
    echo "<script>window.location.href='index.php'</script>";
    # code...
}
$id = ($_GET["id"]);
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>
 <div class="container-fluid px-4">
        <div class="row my-5">
        <h3 class="fs-4 mb-3">Detail Data Siswa</h3>
            <div class="text-start">
                <button type="button" class="btn btn-primary mb-2" onclick="window.location.href='dashboard.php'"><i class="bi bi-arrow-return-left"></i></i>Kembali</button>
            </div>
                   
                <div class="col">
                    <table class="table bg-white rounded shadow-sm  table-hover table-striped">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                                <th scope="col" width="50">NISN</th>
                                <th scope="col" width="50">Nama</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Tanggal Lahir</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Orang tua</th>
                                <th scope="col">Asal Sekolah</th>
                                <th scope="col">NIK</th>
                                <th scope="col">KIP</th>
                                <th scope="col">Foto</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            //  var_dump($id);
                            $no = 0;
                             $sql = "SELECT * FROM siswa  WHERE id = '$id';";
                             $query = mysqli_query($conn, $sql);
                                while($detail = mysqli_fetch_array($query)){
                                $no++;
                                $ortu1 = $detail['ortu'];
                            ?>
                            <tr>
                            <td><?= $no; ?></td>
                                <td><?= $detail['nisn']; ?></td>
                                <td><?= $detail['nama']; ?></td>
                                <td><?= $detail['gender']; ?></td> 
                                <td><?= $detail['tgl_lahir']; ?></td>
                                <td><?= $detail['alamat']; ?></td>
                                <td><?= $ortu = dekripsi($ortu1 , 3); ?></td> 
                                <td><?= $detail['asal']; ?></td>
                                <td><?= $detail['nik']; ?></td>
                                <td><?= $detail['kip']; ?></td>
                                <td><img src="assets/images/<?= $detail['foto']; ?>" width="200" alt=""></td>
                               
                            </tr>
                            <?php } ?>    
                            </tbody>
                        </table>
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