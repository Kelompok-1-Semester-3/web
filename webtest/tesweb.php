<?php
use PHPUnit\Framework\TestCase;

require_once "Login.php";

class tesweb extends TestCase
{
    public function tesweb()
    {
        $insert = new Login();

        $username="raf";
        $password="raf";
        $hasil= $insert->login($username,$password);

        $this->assertEquals($hasil,'berhasil');
        echo $hasil;
       

    }
}
