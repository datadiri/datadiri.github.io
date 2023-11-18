<?php

    //panggil koneksi database
    include "koneksi.php"

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DATA - DIRI - SISWA - SISWI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>


<div class="container">
    <div class="mt-3">
    <h3 class="text-center">INPUT - DATA - DIRI - KALIAN</h3>
    <h3 class="text-center">SMK NEGERI 1 DEMAK</h3>
</div>

    <div class="card mt-3">
  <div class="card-header bg-primary text-white">
    DATA MAHASISWA
  </div>
  <div class="card-body">
    <!-- Button trigger modal -->
<button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
  TAMBAH DATA
</button>


  <table class="table table-boarder table-striped table-hover">
    <tr>
        <th>NO.</th>
        <th>NISN</th>
        <th>NAMA LENGKAT</th>
        <th>ALAMAT</th>
        <th>JURUSAN</th>
        <th>AKSI</th>
    </tr>

<?php

//persiapan nemampilkan data
$no = 1;
$tampil = mysqli_query($koneksi, "select * from tmhs order by id_mhs desc");
while($data = mysqli_fetch_array($tampil)) :

?>

    <tr>
        <td>1<?= $no++?></td>
        <td><?= $data['nisn']?></td>
        <td><?= $data['nama']?></td>
        <td><?= $data['alamat']?></td>
        <td><?= $data['jurusan']?></td>
        <td>
 <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalubah<?= $no ?>">UBAH</a>
            <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalhapus<?= $no ?>">HAPUS</a>
        </td>
    </tr>

    <!-- awal Modal ubah -->
<div class="modal fade" id="modalubah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">FROM DATA MAHASISWA</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="aksi_crud.php">
        <input type="hidden" name="id_mhs" value="<?= $data['id_mhs']?>">
      <div class="modal-body">
      

        <div class="mb-3">
  <label class="form-label">NISN</label>
  <input type="text" class="form-control" name="tnisn" value="<?= $data['nisn']?>" placeholder="MASUKKAN NISN">
</div>

<div class="mb-3">
  <label class="form-label">NAMA LENGKAP</label>
  <input type="text" class="form-control" name="tnama" value="<?= $data['nama']?>"placeholder="MASUKKAN NAMA LENGKAP!">
</div>

<div class="mb-3">
  <label class="form-label">ALAMAT</label>
  <textarea class="form-control" name="talamat" rows="3"><?= $data['alamat']?></textarea>
</div>

<div class="mb-3">
  <label class="form-label">JURUSAN</label>
  <select class="from-select" name="tjurusan">
    <option value="<?= $data['jurusan']?>"><?= $data['jurusan']?></option>
    <option value="MANAGEMEN PERKANTORAN DAN LAYANAN BISNIS ">MANAGEMEN PERKANTORAN DAN LAYANAN BISNIS</option>
    <option value="BISNIS DARING DAN PEMASARAN">BISNIS DARING DAN PEMASARAN</option>
    <option value="AKUNTANSI KEUANGAN LEMBAGA">AKUNTANSI KEUANGAN LEMBAGA</option>
    <option value="DESAIN KOMUNIKASI VISUAL">DESAIN KOMUNIKASI VISUAL</option>
    <option value="BROAD CASTING PERFILMAN">BROAD CASTING PERFILEMAN</option>
    <option value="TATA BUSANA">TATA BUSANA</option>
    </select>
</div>


      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="bubah">UBAH</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">KELUAR</button>
      </div>
      </form>
    </div>
  </div>
</div>
   <!-- akhir Modal ubah-->



   <!-- awal Modal hapus-->
<div class="modal fade" id="modalhapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">KONFIRMASI HAPUS DATA</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form method="POST" action="aksi_crud.php">
        <input type="hidden" name="id_mhs" value="<?= $data['id_mhs']?>">
      <div class="modal-body">

      <h5 class="text-center"> APAKAH ANDA YAKIN AKAN MENGHAPUS DATA INI?<br>
        <span class="text-danger"><?=$data['nisn']?>- <?=$data['nama']?></span>
      </h5>


      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="bhapus">YA, HAPUS AJA</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">KELUAR</button>
      </div>
      </form>
    </div>
  </div>
</div>
   <!-- akhir Modal hapus-->

    <?php endwhile; ?>
</table>




<!-- awal Modal -->
<div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">FROM DATA MAHASISWA</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="aksi_crud.php">
      <div class="modal-body">
      

        <div class="mb-3">
  <label class="form-label">NISN</label>
  <input type="text" class="form-control" name="tnisn" placeholder="MASUKKAN NISN">
</div>

<div class="mb-3">
  <label class="form-label">NAMA LENGKAP</label>
  <input type="text" class="form-control" name="tnama" placeholder="MASUKKAN NAMA LENGKAP!">
</div>

<div class="mb-3">
  <label class="form-label">ALAMAT</label>
  <textarea class="form-control" name="talamat" rows="3"></textarea>
</div>

<div class="mb-3">
  <label class="form-label">JURUSAN</label>
  <select class="from-select" name="tjurusan">
    <option></option>
    <option value="MANAGEMEN PERKANTORAN DAN LAYANAN BISNIS ">MANAGEMEN PERKANTORAN DAN LAYANAN BISNIS</option>
    <option value="BISNIS DARING DAN PEMASARAN">BISNIS DARING DAN PEMASARAN</option>
    <option value="AKUNTANSI KEUANGAN LEMBAGA">AKUNTANSI KEUANGAN LEMBAGA</option>
    <option value="DESAIN KOMUNIKASI VISUAL">DESAIN KOMUNIKASI VISUAL</option>
    <option value="BROAD CASTING PERFILMAN">BROAD CASTING PERFILEMAN</option>
    <option value="TATA BUSANA">TATA BUSANA</option>
    </select>
</div>


      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="bsimpan">SIMPAN</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">KELUAR</button>
      </div>
      </form>
    </div>
  </div>
</div>
   <!-- akhir Modal -->
  </div>
</div>

</div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>