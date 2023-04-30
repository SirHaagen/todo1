<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP - TODO LIST - PART 1</title>
</head>

<body>

  <form action="002_todo1.php" method="post">
    <label>Element:</label><input type="text" name="element" placeholder="Todo element..."><br>
    <button type="submit">Add element</button>
  </form>

  <?php

  $server = "localhost";
  $user = "root";
  $password = '';
  $db = 'todolist';

  $connection = new mysqli($server, $user, $password, $db);

  if ($connection->connect_error) {
    die("Connection Failed ==>" . $connection->connect_error);
  }

  //NEW DB. If u r creating the DB, $connection = new mysqli($server, $user, $password); above
  /*
    $sql = "CREATE DATABASE todo";
    if($connection->query($sql) === true){
        echo "Database created succesfully";
    }else{
      die("An error occured while creating the DB". $connection->error);
    } 
  */

  //NEW TABLE
  /*
  $sql = "CREATE TABLE todotable(
      id INT(11) AUTO_INCREMENT PRIMARY KEY,
      text VARCHAR(50) NOT NULL,
      checked BOOLEAN NOT NULL,
      timestamp TIMESTAMP
      )";

  if ($connection->query($sql) === true) {
    echo "Table created succesfully";
  } else {
    die("An error occured while creating the table" . $connection->error);
  }
  */

  if ($_POST) {
    $element = $_POST['element'];
    if (empty($element)) {
      echo "<div style='color:red'>Insert a proper text</div>";
    } else {
      echo "<input type='checkbox'>" . $element;
      $sql = "INSERT INTO todotable (text,checked) 
      VALUES ('$element', false)";
      if ($connection->query($sql) === true) {
        echo "<br>Todo element added";
      } else {
        die("Error adding todo element" . $connection->error);
      }
    }
  }
  ?>

</body>

</html>