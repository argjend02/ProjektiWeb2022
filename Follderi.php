<!DOCTYPE html>
<html>

<head>

    <?php include 'header.php';
    ?>
    <meta charset="UTF-8">
    <title>Product Dashboard</title>
    <link rel="stylesheet" href="style.css">

    <style>
        table {



            border-collapse: collapse;
            width: 100%;
            font-family: sans-serif;
            font-size: 14px;
            text-align: left;
            color: #444;

        }

        th {
            background-color: #236D59;
            font-weight: 700;
            text-transform: uppercase;
            padding: 10px;
            border: 1px solid black;
            color: #fff;


        }



        td {
            padding: 10px;
            border: 1px solid black;
        }

        td:hover {
            font-size: larger;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ACDFD2;
        }

        /* column-specific styling */
        td:nth-child(1) {
            width: 30%;
        }

        td:nth-child(2) {
            width: 20%;
        }

        td:nth-child(3) {
            width: 25%;
        }

        td:nth-child(4) {
            width: 25%;
        }
    </style>


</head>

<body>
    <?php
    include("database/Kontakto.php");
    $model = new Kontakto();
    $result = $model->getSubmission();
    ?>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Email</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $contact): ?>
                <tr>
                    <td>
                        <?php echo $contact['name'] ?>
                    </td>
                    <td>
                        <?php echo $contact['surname'] ?>
                    </td>
                    <td>
                        <?php echo $contact['email'] ?>
                    </td>
                    <td>
                        <?php echo $contact['request'] ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</html>

<?php include 'footer.php';
?>
</body>

</html>