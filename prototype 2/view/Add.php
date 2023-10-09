<?php

include_once "../managment/connection.php";



class Add_Stagaire {
    public $f_name;
    public $l_name;
    public $cne;

    
    public function Add($f_name,$l_name,$cne){
        $this->f_name = $f_name;
        $this->l_name = $l_name;
        $this->cne = $cne;
        $db = new DB("localhost", "prototype1", "root", "");
        $db->send_query("USE prototype1");
        $sql = "INSERT INTO stagaires (f_name, l_name,cne) VALUES ('$this->f_name', '$this->l_name', '$this->cne')";
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

    $add_stagaire = new Add_Stagaire();
    if ($add_stagaire->Add($f_name, $l_name, $cne)) {
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

        <button name="submite">Register</button>
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