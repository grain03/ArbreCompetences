<?php
include_once "../managment/connection.php";
include_once "../managment/get_stagaire.php";

class TraineeManagement
{
    public function getAll()
    {
        $db = new DB("localhost", "prototype1", "root", "");
        $db->send_query("USE prototype1");
        $result = $db->send_query("SELECT * FROM stagaires");
        $Trainees = [];
        while ($row = $result->fetch()) {
            $Trainee = new Trainee();
            $Trainee->setId($row['id']);
            $Trainee->setFullName($row['f_name'], $row['l_name']);
            $Trainee->setcne($row['cne']);
            array_push($Trainees, $Trainee);
        }
        return $Trainees;
    }
}

