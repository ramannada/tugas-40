<?php

namespace App;
class Config extends \PDO
{
    private $db;

    public function __construct()
    {
        try{
            $this->db = parent::__construct('mysql:host=localhost;
            dbname=toko','root','toor');
        } catch (PDOException $err){
            echo "Terjadi kesalahan " . $err->getMessage() . "<br/>".
            die;
        }
    }
}
?>
