<?php 

session_start();
 
include('header.php');
include('database/config.php');
include('caesar.php');


if (!isset($_SESSION['login'])) {
    echo "<script>window.location.href='index.php'</script>";
    # code...
}

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>
    <div class="container-fluid px-4">
        <div class="row my-5">
        <h3 class="fs-4 mb-3">Daftar siswa</h3>
            <div class="text-end">
                <button type="button" class="btn btn-primary mb-2" onclick="window.location.href='add.php'"><i class="bi bi-plus"></i>Tambah data</button>
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
                                <th scope="col" width="120">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 0;
                             $sql = "SELECT * FROM siswa ;";
                             $query = mysqli_query($conn, $sql);
                                while($list = mysqli_fetch_array($query)){
                                $no++;
                                $ortu1=$list['ortu'];
                            ?>
                           
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $list['nisn']; ?></td>
                                <td><?= $list['nama']; ?></td>
                                <td><?= $list['gender']; ?></td> 
                                <td><?= $list['tgl_lahir']; ?></td>
                                <td><?= $list['alamat']; ?></td>
                                <td><?= $ortu = dekripsi($ortu1 , 3); ?></td> 
                                <td><?= $list['asal']; ?></td>
                                <td><?= $list['nik']; ?></td>
                                <td><?= $list['kip']; ?></td>
                                
                                <td>
                                    <div class="btn-group">
                                        <!-- <a href="add-product.php" class="btn btn-primary"><i class="bi bi-plus-square"></i></a> -->
                                        <a href="delete.php?id=<?= $list['id']; ?>" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ini?')"><i class="bi bi-trash"></i></a>
                                        <a href="edit.php?id=<?= $list['id']; ?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                        <a href="detail.php?id=<?= $list['id']; ?>" class="btn btn-success"><i class="bi bi-eye-fill"></i></a>
                                    </div>
                                </td>
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