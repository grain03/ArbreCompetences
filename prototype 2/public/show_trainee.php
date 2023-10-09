<?php
include_once "../managment/fetch_trainee.php";
$Trainee = new TraineeManagement;
$traineeData = $Trainee->getAll();

?>

<!DOCTYPE html>
<html>

<head>
</head>

<body>

    <h1>Prototype 2</h1>
    
    <div class="table">
        <a class="Add" href="../view/Add.php">+ Add Stagaire</a>
        <table id="customers">
            <tr>
                <th>Id</th>
                <th>Full Name</th>
                <th>CNE</th>
                <th>Delete</th>
                <th>Update</th>
            </tr>
            <?php foreach ($traineeData as $trainee) { ?>
            <tr>
                <td><?php echo $trainee->getId(); ?></td>
                <td><?php echo $trainee->getFullName(); ?></td>
                <td><?php echo $trainee->getCNE(); ?></td>
                <td><a class="dlt" href="../view/Delete.php?id=<?php echo $trainee->getId(); ?>">Delete</a></td>
                <td><a class="updt" href="../view/Update.php?id=<?php echo $trainee->getId(); ?>">Update</a></td>
            </tr>
            <?php } ?>
    
        </table>
    </div>

</body>

</html>

<style>
    body{
        font-family: Arial, Helvetica, sans-serif;
    }
    .table{
        display: grid;
    }
    #customers {
        border-collapse: collapse;
        width: 100%;
    }

    #customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even) {
        background-color: #eee;
    }



    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #1a73e8;
        color: white;
    }
    a{
        padding: 8px;        
        color: #fff;
        border: none;
        cursor: pointer;
        transition: 0.7s;
    }
    .add{
        background: #1a73e8;
        color: #fff;
        padding: 10px;
        margin: 10px 0 ;
        width:20%;
        border-radius: 4px;
        text-decoration:none;
        font-size: 1em;
    }
    .dlt{
        background-color: red;
    }.dlt:hover{
        background-color: #ac3a3a;
    }
    .updt{
        background-color: green;
    }.updt:hover{
        background-color: #00cb00;
    }

    </style>
