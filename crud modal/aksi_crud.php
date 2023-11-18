<?php

//panggil koneksi database
include "koneksi.php";

//uji jika tombol simpan diklik
if(isset($_POST['bsimpan'])) {

    //persiapan simpan data baru
    $simpan = mysqli_query($koneksi, "insert into tmhs (nisn, nama, alamat, jurusan)
                                    values ('$_POST[tnisn]',
                                             '$_POST[tnama]',
                                             '$_POST[talamat]',
                                             '$_POST[tjurusan]') ");

    //jika simpan sukses
    if($simpan){
        echo "<script>alert('SIMPAN DATA SUKSES!');
            document.location='index.php';
                </script>";

    }else{
        echo "<script>alert('SIMPAN DATA GAGAL!');
        document.location='index.php';
            </script>";
    }

    }

    //uji jika tombol ubah diklik
if(isset($_POST['bubah'])) {

    //persiapan ubah data 
    $ubah = mysqli_query($koneksi, "update tmhs set
                                                    nisn = '$_POST[tnisn]',
                                                    nama= '$_POST[tnama]',
                                                    alamat= '$_POST[talamat]',
                                                    jurusan= '$_POST[tjurusan]'
                                                    where id_mhs = '$_POST[id_mhs]'
                                                    ");

    //jika ubah sukses
    if($ubah){
        echo "<script>alert('ubah DATA SUKSES!');
            document.location='index.php';
                </script>";

    }else{
        echo "<script>alert('ubah DATA GAGAL!');
        document.location='index.php';
            </script>";
    }
}


//uji jika tombol hapus diklik
if(isset($_POST['bhapus'])) {

    //persiapan hapus data 
    $hapus = mysqli_query($koneksi, " delete from tmhs where id_mhs='$_POST[id_mhs]' ");

    //jika hapus sukses
    if($hapus){
        echo "<script>alert('hapus DATA SUKSES!');
            document.location='index.php';
                </script>";

    }else{
        echo "<script>alert('HAPUS DATA GAGAL!');
        document.location='index.php';
            </script>";
    }
}



