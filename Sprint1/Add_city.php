<?php

include_once "./Application/DAL/connection.php";


include_once "../managment/fetch_city.php";



class Add_City {
    public $city_name;
    
    public function Add_City($city_name){
        $this->city_name = $city_name;
        $db = new DB("localhost", "prototype1", "root", "Apple2006@");

        $db->send_query("USE prototype1");
        $sql = "INSERT INTO city (city_name) VALUES ('$this->city_name')";
        try {
            $db->send_query($sql);
            return true;            
        } catch (PDOException $e ) {
            return false;
        }
    }

}


if (isset($_POST["submite"])) {
    $city_name = $_POST["city_name"];

    $add_stagaire = new Add_City();

    if ($add_stagaire->Add_City($city_name)) {
        echo "City added successfully.";
    } else {
        echo "Failed to add city.";
    }
}

$cities = new Fetch_City();
$city_name = $cities->getAll();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="POST">
        <label for="f_name">City:</label>
        <input type="text" id="city_name" name="city_name" required><br><br>

        <button name="submite">Add</button>
</form>
<a class="Back" href="../public/show_trainee.php">Back To Home</a>
</body>
</html>
<style>

.container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .container h2 {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button[name="submite"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button[name="submite"]:hover {
            background-color: #0056b3;
        }
    </style>