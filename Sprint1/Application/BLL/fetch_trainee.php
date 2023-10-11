<?php
include_once "./Application/DAL/connection.php";

class TraineeManagement
{
    public function getAll()
    {
        $db = new DB("localhost", "prototype1", "root", "Apple2006@");

        $db->send_query("USE prototype1");
        $result = $db->send_query("SELECT * FROM stagaires Left JOIN city on stagaires.city_id = city.id_city");
        $Trainees = [];
        while ($row = $result->fetch()) {
            $Trainee = new Trainee();
            $Trainee->setId($row['id']);
            $Trainee->setFullName($row['f_name'], $row['l_name']);
            $Trainee->setcne($row['cne']);
            $Trainee->setCity($row['city_name']);
            array_push($Trainees, $Trainee);
        }
        return $Trainees;
    }
}
?>




