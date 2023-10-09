<?php

include_once "../managment/connection.php";
include_once "../managment/fetch_city.php";



class Add_Stagaire {
    public $f_name;
    public $l_name;
    public $cne;
    public $city_id;

    
    public function Add($f_name,$l_name,$cne, $city_id){
        $this->f_name = $f_name;
        $this->l_name = $l_name;
        $this->cne = $cne;
        $this->city_id = $city_id;
        $db = new DB("localhost", "prototype1", "root", "");
        $db->send_query("USE prototype1");
        $sql = "INSERT INTO stagaires (f_name, l_name,cne, city_id) VALUES ('$this->f_name', '$this->l_name', '$this->cne', '$this->city_id')";
        try {
            $db->send_query($sql);
            return true;            
        } catch (PDOException $e ) {
            return false;
        }
    }

}


if (isset($_POST["submite"])) {
    $f_name = $_POST["f_name"];
    $l_name = $_POST["l_name"];
    $cne  = $_POST["cne"];
    $city_id  = $_POST["city"];

    $add_stagaire = new Add_Stagaire();
    if ($add_stagaire->Add($f_name, $l_name, $cne, $city_id)) {
        echo "User added successfully.";
    } else {
        echo "Failed to add user.";
    }
}



?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="POST">
        <label for="f_name">First Name:</label>
        <input type="text" id="f_name" name="f_name" required><br><br>

        <label for="l_name">Last Name:</label>
        <input type="text" id="l_name" name="l_name" required><br><br>

        <label for="cne">CNE:</label>
        <input type="text" id="cne" name="cne" required><br><br>

        <label for="city">city:</label>
        <select name="city" id="city">
            <?php 
                $cities = new Fetch_City();
                $city_name = $cities->getAll();
                for ($i=0; $i < count($city_name); $i++) { 
                    // print_r($city_name[0][$i]);
                    echo "<option value=".$city_name[$i]['id_city'].">".$city_name[$i]['city_name']."</option>";  
                }                
            
            ?>
        </select>

        <button name="submite">Register</button>
        <a class="go" href="../view/Add_city.php">Add New City</a>
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

        input[type="text"], #city {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button[name="submite"], .go {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            text-decoration: none;
        }

        button[name="submite"]:hover {
            background-color: #0056b3;
        }
    </style>