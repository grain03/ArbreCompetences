<?php
include_once "./Application/DAL/connection.php";

class Fetch_City
{
    public function getAll()
    {
        $db = new DB("localhost", "prototype1", "root", "Apple2006@");

        $db->send_query("USE prototype1");

        $result = $db->send_query("SELECT * FROM city");
        $city = $result->fetchAll(PDO::FETCH_ASSOC);
        return $city;
    }
}

