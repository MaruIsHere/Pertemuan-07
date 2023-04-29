<?php
include "konfigurasi.php";
$psn = "";
if(isset($_POST['txNAMA'])) {
    $pass1 = $_POST['txPASS1'];
    $pass2 = $_POST['txPASS2'];
    if($pass1 == $pass2){
        $nama = $_POST['txNAMA'];
        $email = $_POST['txEMAIL'];
        $user = $_POST['txUSER'];

        $sql = "INSERT INTO tbuser (nama,email,username,passkey,iduser) VALUES ('$nama','$email','$user','".md5($pass1)."','".md5($nama)."')";
        $cnn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME,DBPORT) or die("Gagal koneksi ke dbms"); #posisi DB pada connect tidak boleh ketukar
        $hasil = mysqli_query($cnn,$sql);
        if($hasil){
            $psn = "Registrasi User Sukses,Silahkan login dengan user tersebut";
        }else{
            $psn = "Registrasi Gagal,Silahkan diulang";
        }

    }else{
        $psn = "Password tidak sama dengan konfirmasi password";
    }
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>

<?php
if(!$psn == ""){
echo "<div>".$psn."</div>"; #jika tidak kosong maka tampilkan pesan berhasil, jika kosong maka tampilkan pesan gagal
}
?>

<table border="1px solid black">
<form method="post" action="register.php">
    <tr>
        <td>
            <h1>Register</h1>
        </td>
        <td>
        </td>
    </tr>

    <tr>
        <td>
            <label>Nama Lengkap User :</label>
        </td>
        <td>
            <input type="text" name="txNAMA">
        </td>
    </tr>

    <tr>
        <td>
            <label>Email :</label>
        </td>
        <td>
            <input type="email" name="txEMAIL">
        </td>
    </tr>

    <tr>
        <td>
            <label>Username :</label>
        </td>
        <td>
            <input type="text" name="txUSER">
        </td>
    </tr>

    <tr>
        <td>
            <label>Passker :</label>
        </td>
        <td>
            <input type="password" name="txPASS1">
        </td>
    </tr>

    <tr>
        <td>
            <label>Passkey Konfirmasi :</label>
        </td>
        <td>
            <input type="password" name="txPASS2">
        </td>
    </tr>

    <tr>
        <td>
            <button type="submit" name="txREGISTER" id="register">Register</button>
        </td>
        <td>
            <button type="submit" name="txLOGIN" id="login">Login</button>
        </td>

    </tr>

</form>
</table>
    
</body>
</html>