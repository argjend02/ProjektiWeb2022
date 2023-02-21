<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Product Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
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


</body>

</html>