<?php
class dbase{
    private $host;
    private $user;
    private $pass;
    private $db;
    private $mysqli;
    public function connect()
    {
     $this->host='localhost';
     $this->user='root';
     $this->pass='';
     $this->db='testjson';
     $this ->mysqli = new mysqli($this->host,$this->user,$this->pass,$this->db);
     return  $this->mysqli;
    }
    public function query_insert($sql)
    {
       $res= mysqli_query($this->mysqli,$sql);
       return $res;

    }
}
  
?>