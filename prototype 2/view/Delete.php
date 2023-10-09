<?php
include_once "../managment/connection.php";

if (isset($_GET['id'])) {
    $delete = new Delete($_GET['id']);
    header("Location: ../public/show_trainee.php");
}

class Delete{
    public $id;
    public function __construct($id){
        $this->id = $id;
        
        $db = new DB("localhost", "prototype1", "root", "");
        $db->send_query("USE prototype1");
        $sql = "DELETE FROM `stagaires` WHERE `stagaires`.`id` = $this->id";
        $db->send_query($sql);
    }
}






