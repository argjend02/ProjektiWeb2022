<!DOCTYPE html>
<html>

<head>
    <title>Edit User</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .edit-user>body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        form {
            width: 50%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .edit-user>label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .edit-user>input[type="text"],
        .edit-user>input[type="date"],
        .edit-user>input[type="email"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 20px;
            font-size: 16px;
        }

        .edit-user>input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .edit-user>input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <?php include('header.php') ?>
    <?php
    include 'database/user.php';
    $model = new User();
    $user = $model->getLoggedInUser();
    $model->update();
    ?>
    <h1>Edit Your info</h1>
    <form class="edit-user" method="post">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $user['name']; ?>" required>

        <label for="surname">Surname:</label>
        <input type="text" id="surname" name="surname" value="<?php echo $user['surname']; ?>" required>

        <label for="birthdate">Birthdate:</label>
        <input type="date" id="birthdate" name="birthdate" value="<?php echo $user['birthdate']; ?>" required>

        <input type="submit" value="Save Changes">
    </form>

    <?php include 'footer.php' ?>
</body>

</html>