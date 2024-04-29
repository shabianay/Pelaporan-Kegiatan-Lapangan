<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "logboom";

$conn = mysqli_connect($db_host,$db_user,$db_pass,$db_name);

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function insertPelaporan($data) {
    global $conn;
    date_default_timezone_set('Asia/Jakarta');
    $id = $data['id'];
    $np = htmlspecialchars($data["nama"]);
    $tp = htmlspecialchars($data["tim"]);
    $bp = htmlspecialchars($data["bidang"]);
    $nk= htmlspecialchars($data["nama_kegiatan"]);
    $lk= htmlspecialchars($data["lokasi"]);
    $kc= htmlspecialchars($data["kecamatan"]);
    $tgl_kegiatan= date($data["tgl_kegiatan"]);
    $j_kegiatan= htmlspecialchars($data["jam_kegiatan"]);
    $ket = mysqli_real_escape_string($conn, $data["ket"]);
    // $f = htmlspecialchars($data["foto"]);
    $status = "Sedang diajukan";
    $ket_petugas = "-";

    //Upload Foto
    $foto_pelaporan_awal= @$_FILES['foto']['tmp_name'];
    $foto_pelaporan_tujuan = uniqid().@$_FILES['foto']['name'];
   
   #-- Simpan gambar pada folder 'foto', jika belum ada maka buat saja :D
    if(!file_exists('foto')){
        mkdir('foto');
    }
    move_uploaded_file($foto_pelaporan_awal, 'foto/'.$foto_pelaporan_tujuan);
    mysqli_query($conn, "INSERT INTO pelaporan VALUES('$id', '$np', '$tp', '$bp', '$nk','$lk','$kc', '$tgl_kegiatan','$j_kegiatan', '$ket', 'foto/$foto_pelaporan_tujuan', '$status', '$ket_petugas')");
    return mysqli_affected_rows($conn);
}

function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $nama = htmlspecialchars($data["nama"]);
    $nip = htmlspecialchars($data["nip"]);
    $img = "default.jpg";
    $status = "0";

    $cek = mysqli_query($conn, "SELECT username, user_id FROM user WHERE username = '$username' OR user_id = '$nip'");

    if (mysqli_fetch_assoc($cek)) {
        echo "<script>alert('Username $username or NIP $nip was already registered!');</script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($conn, "INSERT INTO user VALUES('$nip', '$username', '$password', '$nama', '$img', '$status')");

    return mysqli_affected_rows($conn);
}

function updatePass($data) {
    global $conn;
    
    $id = $data['id'];
    $password_baru = mysqli_real_escape_string($conn, $data["password_baru"]);
    $password_baru = password_hash($password_baru, PASSWORD_DEFAULT);
    mysqli_query($conn, "UPDATE user SET password='$password_baru' WHERE user_id='$id'"); 

    return mysqli_affected_rows($conn);
}

function updatePelaporan($data) {
    global $conn;
    
    $id = $data['id'];
    $status = $data['status'];
    $ket_petugas = $data['ket_petugas'];
    mysqli_query($conn, "UPDATE pelaporan SET status = '$status', ket_petugas='$ket_petugas' WHERE id='$id'"); 

    return mysqli_affected_rows($conn);
}

function updatePhoto($data) {
    global $conn;
    
    $id = $_SESSION['login']['user_id'];
        
        $rand = rand();
        $ekstensi =  array('png','jpg','jpeg');
        $filename = $_FILES['foto']['nama'];
        $ukuran = $_FILES['foto']['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        
        if(!in_array($ext,$ekstensi) ) {
            echo "<script>alert('Ekstensi tidak diperbolehkan atau Anda belum memilih file apapun.'); window.location='profil.php';</script>";
        }else{
            if($ukuran < 2044070){		
                $xx = $rand.'_'.$filename;
                move_uploaded_file($_FILES['foto']['tmp_name'], '../assets/img/profile/'.$rand.'_'.$filename);

                mysqli_query($conn, "UPDATE user SET img = '$xx' WHERE user_id='$id'"); 
        
            } else {
                echo "<script>alert('Size file terlalu besar! Size yang diperbolehkan tidak melebihi 2 MB.'); window.location='profil.php';</script>";
            }
        }
    return mysqli_affected_rows($conn);
}

function deleteUser($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM user WHERE user_id = '$id'");
    return mysqli_affected_rows($conn);
}

function deletePelaporan($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM pelaporan WHERE id = '$id'");
    return mysqli_affected_rows($conn);
}

function searchPelaporan($keyword) {
    global $conn;
    $data = mysqli_query($conn, "SELECT * FROM pelaporan WHERE id = '$keyword'");
    return mysqli_affected_rows($conn);
}

?>