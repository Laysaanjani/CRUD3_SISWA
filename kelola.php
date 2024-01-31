<?php
  include'config.php';
    $id_pendaftaran = '';
    $nama = '';
    $alamat = '';
    $jk = '';
    $agama = '';
    $sekolah = '';
    $tl = '';
    $nt = '';
    $email = '';
    $desa = '';
    $kecamatan = '';
    $kota = '';
    $provinsi = '';
    $kp = '';

  if (isset($_GET['edit'])){
    $id_pendaftaran = $_GET['edit'];
    $sql = "SELECT * FROM pendaftaran WHERE id_pendaftaran = '$id_pendaftaran';";
    $query = mysqli_query($db, $sql);
    $result = mysqli_fetch_assoc($query);
    $nama = $result['nama'];
    $alamat = $result['alamat'];
    $jk = $result['jenis_kelamin'];
    $agama = $result['agama'];
    $sekolah = $result['sekolah_asal'];
    $tl = $result['tanggal_lahir'];
    $nt = $result['no_tel'];
    $email = $result['email'];
    $desa = $result['desa'];
    $kecamatan = $result['kecamatan'];
    $kota = $result['kota'];
    $provinsi = $result['provinsi'];
    $kp = $result['kode_pos'];
  }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK Negeri 1 Lagos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">SMK Negeri 1 Lagos</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        <a class="nav-link" href="form-daftar.php">Pendaftaran</a>
      </div>
    </div>
  </div>
</nav>
<div class="container mt-4">
<h2>Formulir Pendaftaran Siswa SMK Negeri 1 Lagos</h2><br>
<form action="proses.php" method="POST">
<input type="hidden" name="id_pendaftaran" value="<?php echo $id_pendaftaran;?>"/>
<div class="mb-3">
  <label for="nama" class="form-label">Nama: </label>
  <input type="text" class ="form-control" name="nama" value="<?php echo $nama;?>" placeholder="nama lengkap"/>
</div>
<div class="mb-3">
  <label for="tanggal_lahir" class="form-label">Tanggal lahir: </label>
  <input type="date" class ="form-control" name="tanggal_lahir"  value="<?php echo$tl;?>" placeholder="tanggal lahir" />
</div>
<div class="mb-3">
  <label for="alamat" class="form-label">Alamat</label>
  <textarea class="form-control" name="alamat" rows="3"><?php echo $alamat;?></textarea>
</div>
<div class="mb-3">
  <label for="desa" class="form-label">Desa/Kelurahan</label>
  <textarea class="form-control" name="desa" rows="3"><?php echo $desa;?></textarea>
</div>
<div class="mb-3">
  <label for="kecamatan" class="form-label">Kecamatan</label>
  <textarea class="form-control" name="kecamatan" rows="3"><?php echo $kecamatan;?></textarea>
</div>
<div class="mb-3">
  <label for="kota" class="form-label">Kabupaten/Kota</label>
  <select name="kota" class="form-control">
                <option <?php if($kota == 'kabupaten bandung'){echo "selected";}?> value="kabupaten bandung">Kota Bandung</option>
                <option <?php if($kota == 'kab.bandung'){echo "selected";}?> value="kab.bandung">>Kab. Bandung</option>
                <option <?php if($kota == 'kota cimahi'){echo "selected";}?> value="kota cimahi">>Kota Cimahi</option>
                <option <?php if($kota == 'kab. bandung barat'){echo "selected";}?> value="kab. bandung barat">>Kab. Bandung Barat</option>
                <option <?php if($kota == 'kab.sumedang'){echo "selected";}?> value="kab.sumedang">>Kab. Sumedang</option>
            </select>
</div>
<div class="mb-3">
  <label for="provinsi" class="form-label">Provinsi</label>
  <select name="provinsi" class="form-control">
                <option <?php if($provinsi == 'Banten'){echo "selected";}?> value="Banten">Banten</option>
                <option <?php if($provinsi == 'DKI Jakarta'){echo "selected";}?> value="DKI Jakarta">DKI Jakarta</option>
                <option <?php if($provinsi == 'Jawa Barat'){echo "selected";}?> value="Jawa Barat">Jawa Barat</option>
                <option <?php if($provinsi == 'Jawa Tengah'){echo "selected";}?> value="Jawa Tengah">Jawa Tengah</option>
                <option <?php if($provinsi == 'Jawa Timur'){echo "selected";}?> value="Jawa Timur">Jawa Timur</option>
                <option <?php if($provinsi == 'DIY Yogyakarta'){echo "selected";}?> value="DIY Yogyakarta">DIY Yogyakarta</option>
            </select>
</div>
<div class="mb-3">
  <label for="kode_pos" class="form-label">Kode Pos: </label>
  <input type="text" class ="form-control" name="kode_pos" value="<?php echo $kp;?>" placeholder="kode pos" />
</div>
<div class="mb-3">
<div class="form-check">
<label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label><br>
  <input class="form-check-input" type="radio" name="jenis_kelamin" <?php if($jk == 'laki-laki'){echo "checked";}?> value="laki-laki">
  <label class="form-check-label" for="laki-laki">Laki-Laki</label><br>
  <input class="form-check-input" type="radio" name="jenis_kelamin" <?php if($jk == 'perempuan'){echo "checked";}?> value="perempuan">
  <label class="form-check-label" for="laki-laki">Perempuan</label>
</div>
</div>
<div class="mb-3">
    <label for="agama" class="form-label">Agama: </label>
            <select name="agama" class="form-control">
                <option <?php if($agama == 'Islam'){echo "selected";}?> value="Islam">Islam</option>
                <option <?php if($agama == 'Kristen'){echo "selected";}?> value="Kristen">Kristen</option>
                <option <?php if($agama == 'Hindu'){echo "selected";}?> value="Hindu">Hindu</option>
                <option <?php if($agama == 'Budha'){echo "selected";}?> value="Budha">Budha</option>
                <option <?php if($agama == 'Atheis'){echo "selected";}?> value="Atheis">Atheis</option>
            </select>
</div>
<div class="mb-3">
  <label for="no_tel" class="form-label">No Telepon: </label>
  <input type="tel" class ="form-control" name="no_tel" value="<?php echo$nt;?>" placeholder="nomor telepon" />
</div>
<div class="mb-3">
  <label for="email" class="form-label">Email: </label>
  <input type="email" class ="form-control" name="email" value="<?php echo$email;?>" placeholder="email" />
</div>
<div class="mb-3">
    <label for="sekolah_asal" class="form-label">Sekolah Asal: </label>
    <input type="text" class ="form-control" name="sekolah_asal" value="<?php echo$sekolah;?>" placeholder="nama sekolah" />
</div>
<div class="mb-3 row mt-4">
  <div class="col">
    <?php
      if(isset($_GET['edit'])){
    ?>
      <button type="submit" name="aksi" value="edit" class="btn btn-primary">
        Simpan Perubahan
      </button>
      <?php    
      }else{
      ?>
        <button type="submit" name="aksi" value="add" class="btn btn-primary">
          Daftar
        </button>
        <?php
        }
        ?>
        <a href="index.php" type="button" class="btn btn-danger">Batal</a>
  </div>
</div>
    </form>
</div>
    </body>
</html>