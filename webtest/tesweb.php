<?php
use PHPUnit\Framework\TestCase;

require_once "Login.php";

class tesweb extends TestCase
{
    public function tesweb()
    {
        $insert = new Login();

        $username="horizon";
        $password="haji123";
        $hasil= $insert->login($username,$password);

        $this->assertEquals($hasil,'berhasil');
        echo $hasil;
       

    }
}
