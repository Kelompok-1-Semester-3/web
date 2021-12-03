<?php

class Login
{
    function login($username, $password){
        include 'koneksi.php';

        $login = mysqli_query($koneksi,"select * from user where email_user='$username' and password='$password'");
        $ambil = mysqli_num_rows($login);

        if($ambil>0){
            $data = mysqli_fetch_assoc($login);

            return 'berhasil';

        }else{
            return 'gagal';
        }
    }
}
?>