<?php
    include("config.php");

    if(isset($_POST['aksi'])){
        // ambil data dari formulir
        if($_POST['aksi']== 'add'){
        $nama = $_POST['nama'];

        $tl = $_POST['tanggal_lahir'];
        
        $alamat = $_POST['alamat'];

        $desa = $_POST['desa'];

        $kecamatan = $_POST['kecamatan'];

        $kota = $_POST['kota'];

        $provinsi = $_POST['provinsi'];

        $kp = $_POST['kode_pos'];

        $jk = $_POST['jenis_kelamin'];

        $agama = $_POST['agama'];

        $nt = $_POST['no_tel'];

        $email = $_POST['email'];

        $sekolah = $_POST['sekolah_asal'];

        $tl_mysql = date("Y-m-d", strtotime($tl));

        // buat query

        $sql = "INSERT INTO pendaftaran (nama, alamat, jenis_kelamin, agama, sekolah_asal, tanggal_lahir, no_tel, email, desa, kecamatan, kota, provinsi, kode_pos) 
        VALUE ('$nama', '$alamat', '$jk', '$agama', '$sekolah', '$tl_mysql', '$nt', '$email', '$desa', '$kecamatan', '$kota', '$provinsi', '$kp')";

        $query = mysqli_query($db, $sql);

        // apakah query simpan berhasil?

        if($query) {
            header('Location: index.php?status=sukses');
        // kalau berhasil alihkan ke halaman index.php dengan status-sukses header('Location: index.php?status=sukses');
        }else{
            
            header('Location: index.php?status=gagal');
        }
    }else if($_POST['aksi']== 'edit'){
        $id_pendaftaran =$_POST['id_pendaftaran'];
        $nama = $_POST['nama'];
        $tl = $_POST['tanggal_lahir'];
        $alamat = $_POST['alamat'];
        $desa = $_POST['desa'];
        $kecamatan = $_POST['kecamatan'];
        $kota = $_POST['kota'];
        $provinsi = $_POST['provinsi'];
        $kp = $_POST['kode_pos'];
        $jk = $_POST['jenis_kelamin'];
        $agama = $_POST['agama'];
        $nt = $_POST['no_tel'];
        $email = $_POST['email'];
        $sekolah = $_POST['sekolah_asal'];
        $tl_mysql = date("y-m-d" , strtotime ($tl));
        $sql ="UPDATE pendaftaran SET nama='$nama',alamat='$alamat',jenis_kelamin='$jk',agama='$agama',sekolah_asal='$sekolah',
        no_tel='$nt',email='$email',desa='$desa',kecamatan='$kecamatan',kota='$kota',provinsi='$provinsi',kode_pos='$kp'
        WHERE id_pendaftaran='$id_pendaftaran'";
        $query = mysqli_query($db, $sql);

        if($query){
            header('Location: index.php?status=sukses');
        // kalau berhasil alihkan ke halaman index.php dengan status-sukses header('Location: index.php?status=sukses');
        }else{
            
            header('Location: index.php?status=gagal');
        }
    }
}
if(isset($_GET['hapus'])){

    $id_pendaftaran = $_GET['hapus'];

    $sql ="DELETE FROM pendaftaran WHERE id_pendaftaran='$id_pendaftaran';";
    $query = mysqli_query($db, $sql);

    if($query){
        header('Location: index.php?status=sukses');
    }else{
        header('Location: index.php?status=gagal');
    }
}
?>