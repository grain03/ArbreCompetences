<?php
include_once "./loader.php";

if (isset($_GET['id'])) {
    if (isset($_POST["submite"])) {
        $id = $_GET["id"];
        $f_name = $_POST["f_name"];
        $l_name = $_POST["l_name"];
        $cne  = $_POST["cne"];

        $Update = new Update($id, $f_name, $l_name, $cne);
        header("Location: ./index.php");

    }

}



class Update{
    public $id;
    public $f_name;
    public $l_name;
    public $cne;



    public function __construct($id, $f_name, $l_name, $cne){
        $this->id = $id;
        
        $db = new DB("localhost", "prototype1", "root", "Apple2006@");

        $db->send_query("USE prototype1");
        $sql = "UPDATE `stagaires` SET `f_name` = '$f_name', `l_name` = '$l_name',`cne` = '$cne' WHERE `stagaires`.`id` = $this->id";
        $db->send_query($sql);
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
        <input type="text" id="cne" name="cne" maxlength="7" required><br><br>

        <button name="submite">Update</button>
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