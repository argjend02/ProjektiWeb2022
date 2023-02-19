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
      width: 100%;
    }

    th,
    td {
      text-align: left;
      padding: 8px;
      border: 1px solid #ddd;
    }

    th {
      background-color: #f2f2f2;
      color: #333;
      font-weight: bold;
    }

    button {
      padding: 5px 15px;
      border-color: #df4759;
      border-radius: 5px;
      color: white;
      background-color: #df4759;
      cursor: pointer;
    }

    button:hover {
      background-color: #a32a34 !important;
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
                <button type="submit" class="button">Delete</button>
              </form>
            <?php endif; ?>
          </td>
        </tr>
      <?php endforeach; ?>

    </tbody>
  </table>

  <?php include('footer.php') ?>

</body>

</html>