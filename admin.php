<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>

  <style>
    table {

      border-collapse: collapse;
      width: 90%;
      margin-left: 75px;
      margin-top: 50px;
      background-color: white;

    }

    th,
    td {
      text-align: center;
      padding: 8px;
      border: 2px solid #ddd;

    }

    th {
      background-color: #f2f2f2;
      color: #333;
      font-weight: bold;
    }

    td:hover {
      background-color: whitesmoke;
    }

    th:hover {
      background-color: #C2c8c8;
    }


    .buttonD {
      padding: 5px 15px;
      border-color: #df4759;
      border-radius: 20px;
      color: white;
      background-color: #df4759;
      cursor: pointer;
    }

    .buttonD:hover {
      background-color: #a32a34 !important;
    }

    h2 {
      margin-top: 20px;
      text-align: center;
    }
  </style>
</head>

<body>
  <?php include('header.php') ?>
  <?php
  include 'database/user.php';
  $model = new User();
  $users = $model->getAllUsers();
  $model->delete();
  ?>
  <table>

    <caption style="font-size:30px">Table of all the users</caption>
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $user): ?>
        <tr>
          <td>
            <?php echo $user['name'] ?>
          </td>
          <td>
            <?php echo $user['email'] ?>
          </td>
          <td>
            <?php if ($user['isAdmin']) {
              echo "Admin";
            } else {
              echo "User";
            } ?>
          </td>
          <td>
            <?php if (!$user['isAdmin']): ?>
              <form method="post" action="#">
                <input type="hidden" name="id" value="<?php echo $user['id']; ?>" id="">
                <button type="submit" class="buttonD">Delete</button>
              </form>
            <?php endif; ?>
          </td>
        </tr>
      <?php endforeach; ?>




    </tbody>
  </table>

  <?php
  include("database/Kontakto.php");
  $model = new Kontakto();
  $result = $model->getSubmission();
  $model->delete();
  ?>

  <table style="margin-top:100px">
    <caption style="font-size:30px">Table of all the requests</caption>
    <thead>
      <tr>
        <th>Name</th>
        <th>Surname</th>
        <th>Email</th>
        <th>Description</th>
        <th>Delete</th>
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
          <td>
            <form method="post" action="#">
              <input type="hidden" name="id" value="<?php echo $contact['id']; ?>" id="">
              <button type="submit" class="buttonD">Delete</button>
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>


  <?php include('footer.php') ?>

</body>

</html>