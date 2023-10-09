<?php

include "./connection.php";
include "./get_stagaire.php";

class TraineeManagement
{
    public function getAll()
    {
        $sql = "SELECT * FROM `stagaires` ";
        $result = DB::connect()->query($sql);
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

//  `id`, `f_name`, `l_name`, `cne` 
