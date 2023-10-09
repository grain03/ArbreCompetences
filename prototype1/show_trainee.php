<?php
include "./manage_trainee.php";

$Trainee = new TraineeManagement;
$traineeData = $Trainee->getAll();
?>

<!DOCTYPE html>
<html>

<head>
    <style>
    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
    }
    </style>
</head>

<body>

    <h1>Prototype 1</h1>

    <table id="customers">
        <tr>
            <th>Id</th>
            <th>Full Name</th>
            <th>CNE</th>
        </tr>
        <?php foreach ($traineeData as $trainee) { ?>
        <tr>
            <td><?php echo $trainee->getId(); ?></td>
            <td><?php echo $trainee->getFullName(); ?></td>
            <td><?php echo $trainee->getCNE(); ?></td>

        </tr>
        <?php } ?>

    </table>

</body>

</html>