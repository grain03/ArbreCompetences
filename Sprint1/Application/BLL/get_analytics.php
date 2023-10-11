<?php
include_once "./Application/DAL/connection.php";



class Get_Analytics
{
    public function analytics()
    {
        $cities = array();
        $db = new DB("localhost", "prototype1", "root", "Apple2006@");

        $db->send_query("USE prototype1");

        $result = $db->send_query("SELECT city.city_name AS CityName , COUNT(stagaires.id) AS CityCount 
        FROM stagaires
        INNER JOIN city ON stagaires.city_id = city.id_city 
        GROUP BY city.id_city , city.city_name;");

        $analytics = $result->fetchAll(PDO::FETCH_ASSOC);
        // echo "<pre>";
        // print_r($analytics);
        // echo "</pre>";
        

        foreach ($analytics as $analytic) {
            // $cities = [] = $analytic['CityName'];
            array_push($cities, $analytic);
        }
        return $cities;


    }
}




// foreach ($cities->analytics() as $city_name => $count) {
//     echo "City of ".$city_name." has ".$count." Students </br>";
// }




// print_r($cities->analytics());