<?php

session_start();
// memanggil file $conn.php untuk melakukan $conn database
include('database/config.php');
include('caesar.php');
	// membuat variabel untuk menampung data dari form
  $nisn = $_POST['nisn'];
  $nama = $_POST['nama'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $tgl_lahir = $_POST['tgl_lahir'];
  $alamat = $_POST['alamat'];
  $ortu1 = $_POST['ortu'];
  $ortu = enkripsi($ortu1 , 3);

  $asal = $_POST['asal'];
  $nik = $_POST['nik'];
  $kip = $_POST['kip'];
  $foto = $_FILES['foto']['name'];
  


//cek dulu jika ada gambar product jalankan coding ini
if($foto != "") {
  $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
  $x = explode('.', $foto); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['foto']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$foto; //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, 'assets/images/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                  // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                  $query = "INSERT INTO `siswa` (`id`, `nisn`, `nama`, `gender`, `tgl_lahir`, `alamat`, `ortu`, `asal`, `nik`, `kip`, `foto`) VALUES (NULL, '$nisn', '$nama', '$jenis_kelamin', '$tgl_lahir', '$alamat', '$ortu', '$asal', '$nik', '$kip', '$foto');" ;
                  $result = mysqli_query($conn, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($conn).
                           " - ".mysqli_error($conn));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='dashboard.php';</script>";
                  }

            } else {     
             //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='add.php';</script>";
            }
} else {
    $query =  "INSERT INTO `siswa` (`id`, `nisn`, `nama`, `gender`, `tgl_lahir`, `alamat`, `ortu`, `asal`, `nik`, `kip`, `foto`) VALUES (NULL, '$nisn', '$nama', '$jenis_kelamin', '$tgl_lahir', '$alamat', '$ortu', '$asal', '$nik', '$kip', NULL);" ;
                  $result = mysqli_query($conn, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($conn).
                           " - ".mysqli_error($conn));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='dashboard.php';</script>";
                  }
}

 

