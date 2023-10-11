<?php
include_once "./loader.php";

if (isset($_GET['id'])) {
    $delete = new Delete($_GET['id']);
    header("Location: ./Application/index.php");
}

class Delete{
    public $id;
    public function __construct($id){
        $this->id = $id;
        
        $db = new DB("localhost", "prototype1", "root", "Apple2006@");

        $db->send_query("USE prototype1");
        $sql = "DELETE FROM `stagaires` WHERE `stagaires`.`id` = $this->id";
        $db->send_query($sql);
    }
}






